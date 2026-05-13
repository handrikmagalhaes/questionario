// $(function () {
//     // Summernote
//     $('#descricao_usuario').summernote();
// })
$(document).ready(function() {
	listarUsuarios();
});

// Funcionalidade para ver a senha
document.addEventListener('DOMContentLoaded', function () {
	var toggle = document.getElementById('toggleSenhaUsuario');
	if (!toggle) return;
	toggle.addEventListener('click', function () {
		var senha = document.getElementById('senha_usuario');
		if (!senha) return;
		var isPassword = senha.getAttribute('type') === 'password';
		senha.setAttribute('type', isPassword ? 'text' : 'password');
		var icon = this.querySelector('i');
		if (icon) {
			icon.classList.toggle('fa-eye');
			icon.classList.toggle('fa-eye-slash');
		}
	});
});


function listarUsuarios(){
	$.get($("#url_base").text()+"usuario/listar", function(data){
		$("#tblUsuarios").empty(); //Apaga o conteúdo da tabela
		$("#tblUsuarios").html('<thead>\
                         		<tr class="py-3">\
								<th class="ps-4">Nome</th>\
								<th>Email</th>\
								<th class="text-center">Ações</th>\
                         		</tr>\
                     			</thead>\
                     			<tbody id="corpoTblUsuarios"></tbody>');//Insere o conteúdo atualizado na tabela
		var usuarios = data.usuarios || data;
		//console.log(usuarios);
		if (!$.isArray(usuarios)) {
			console.error('Resposta inesperada de listar usuários:', data);
			return;
		}
		$.each(usuarios, function(i, usuario){
			//console.log(usuario);
			$("#corpoTblUsuarios").append('<tr>\
								<td class="ps-4"><div class="fw-bold">'+usuario.nome_usuario+'</div><span class="small text-muted">ID: #'+usuario.id+'</span></td>\
								<td>'+usuario.email_usuario+'</td>\
								<td class="text-center">\
									<button class="btn btn-light btn-sm rounded-circle me-1" title="Excluir Usuário" onclick="excluirUsuario('+usuario.id+')"><i class="fa-solid fa-trash text-danger"></i></button>\
									<button class="btn btn-light btn-sm rounded-circle" title="Editar Usuário" onclick="editarUsuario('+usuario.id+')" data-bs-toggle="modal" data-bs-target="#formUsuarioModal"><i class="fa-solid fa-pen-to-square text-primary"></i></button>\
								</td>\
							</tr>');
		});
	}, 'json');
}

//Ação do botão de cadastrar usuário
$("#usuarioForm").submit(function(e){
	e.preventDefault();
	if ($("#id_usuario").val() !== "") {
		// Edição de usuário
		$.post($("#url_base").text()+"usuario/alterar", $(this).serialize(), function(data){
			if (data.alterou === true) {
				toastr.success('Usuário alterado com sucesso!');
				$("#formUsuarioModal").modal('hide');
				$("#usuarioForm")[0].reset();
				$("#id_usuario").val('');
				$("#btnCadastrarUsuario").text('Cadastrar');
				$("#senha_usuario").prop('required', true);
				listarUsuarios();
			} else {
				toastr.error('Erro ao alterar usuário.');
			}
		}, 'json');
	} else {
		// Cadastro de usuário
		$.post($("#url_base").text()+"usuario/cadastrar", $(this).serialize(), function(data){
			if (data.inseriu === true) {
				toastr.success('Usuário cadastrado com sucesso!');
				$("#formUsuarioModal").modal('hide');
				$("#usuarioForm")[0].reset();
				listarUsuarios();
			} else {
				toastr.error('Erro ao cadastrar usuário.');
			}
		}, 'json');
	}
});

$('#formUsuarioModal').on('hidden.bs.modal', function () {
	$("#usuarioForm")[0].reset();
	$("#id_usuario").val('');
	$("#btnCadastrarUsuario").text('Cadastrar');
	$("#senha_usuario").prop('required', true);
});

// Função de exclusão de usuários
function excluirUsuario(id) {
	if (confirm('Tem certeza que deseja excluir este usuário?')) {
		$.get($("#url_base").text()+"usuario/excluir", { id: id }, function(data) {
			if (data.excluiu === true) {
				toastr.success('Usuário excluído com sucesso!');
				listarUsuarios();
			} else {
				toastr.error('Erro ao excluir usuário.');
			}
		}, 'json');
	}
}

// Função de edição de usuários
function editarUsuario(id) {
	$.get($("#url_base").text()+"usuario/buscar", { id: id }, function(data) {
		// Preencher o formulário com os dados do usuário
		var usuario = JSON.parse(data);
		console.log(usuario.usuario.nome_usuario);
		if (!usuario) {
			toastr.error('Não foi possível carregar os dados do usuário.');
			return;
		}
		$("#id_usuario").val(usuario.usuario.id);
		$("#nome_usuario").val(usuario.usuario.nome_usuario);
		$("#email_usuario").val(usuario.usuario.email_usuario);
		$("#senha_usuario").val('');
		$("#senha_usuario").prop('required', false);
		$("#btnCadastrarUsuario").text('Alterar');
	});
}

function mudaNumeroRegistros(){
	window.location.href = '/usuario/lista/1/'+$('#texto_busca').val()+'/'+$("#texto-campo").val()+'/'+$("#texto-ord").val()+'/'+$("#select_paginas").val();
}

$('#buscar').click(function(){
	window.location.href = '/usuario/lista/1/'+$('#texto_busca').val()+'/'+$("#texto-campo").val()+'/'+$("#texto-ord").val()+'/'+$("#select_paginas").val();
});
$('.numero-pagina').click(function(){
	var pagina = $(this).text();
	$('.page-item').attr('page-active', pagina);
	window.location.href = '/usuario/lista/'+pagina+'/'+$('#texto_busca').val()+'/'+$("#texto-campo").val()+'/'+$("#texto-ord").val()+'/'+$("#texto-paginas").val();
});
$('.voltar-pagina').click(function(){
	var pagina = $(this).attr('page-active')-1;
	$('.page-item').attr('page-active', pagina);
	window.location.href = '/usuario/lista/'+pagina+'/'+$('#texto_busca').val()+'/'+$("#texto-campo").val()+'/'+$("#texto-ord").val()+'/'+$("#texto-paginas").val();
});
$('.proxima-pagina').click(function(){
	var pagina = $(this).attr('page-active')-1;
	$('.page-item').attr('page-active', pagina);
	window.location.href = '/usuario/lista/'+pagina+'/'+$('#texto_busca').val()+'/'+$("#texto-campo").val()+'/'+$("#texto-ord").val()+'/'+$("#texto-paginas").val();
});

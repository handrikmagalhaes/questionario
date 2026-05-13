// $(function () {
//     // Summernote
//     $('#descricao_usuario').summernote();
// })
$(document).ready(function() {
	listarRespostas();
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


function listarRespostas(){
	$.get($("#url_base").text()+"resposta/listar", function(data){
		$("#tblRespostas").empty(); //Apaga o conteúdo da tabela
		$("#tblRespostas").html('<thead>\
                         		<tr class="py-3">\
								<th class="ps-4">Resposta</th>\
								<th>SISPERJUD</th>\
								<th>LOAS</th>\
								<th class="text-center">Ações</th>\
                         		</tr>\
                     			</thead>\
                     			<tbody id="corpoTblRespostas"></tbody>');//Insere o conteúdo atualizado na tabela
		var respostas = data.respostas || data;
		//console.log(respostas);
		if (!$.isArray(respostas)) {
			console.error('Resposta inesperada de listar respostas:', data);
			return;
		}
		$.each(respostas, function(i, resposta){
			console.log(resposta);
			var sisperjudLabel = (resposta.sisperjud === 't') ? '<span class="badge bg-success">Sim</span>' : '<span class="badge bg-danger">Não</span>';
			var loasLabel = (resposta.loas === 't') ? '<span class="badge bg-success">Sim</span>' : '<span class="badge bg-danger">Não</span>';
			$("#corpoTblRespostas").append('<tr>\
						<td class="ps-4"><div class="fw-bold">'+resposta.resposta+'</div><span class="small text-muted">ID: #'+resposta.id+'</span></td>\
						<td>'+sisperjudLabel+'</td>\
						<td>'+loasLabel+'</td>\
								<td class="text-center">\
									<button class="btn btn-light btn-sm rounded-circle me-1" title="Excluir Resposta" onclick="excluirResposta('+resposta.id+')"><i class="fa-solid fa-trash text-danger"></i></button>\
									<button class="btn btn-light btn-sm rounded-circle" title="Editar Resposta" onclick="editarResposta('+resposta.id+')" data-bs-toggle="modal" data-bs-target="#formRespostaModal"><i class="fa-solid fa-pen-to-square text-primary"></i></button>\
								</td>\
							</tr>');
		});
	}, 'json');
}

//Ação do botão de cadastrar usuário
$("#respostaForm").submit(function(e){
	e.preventDefault();
	if ($("#id_resposta").val() !== "") {
		// Edição de resposta
		$.post($("#url_base").text()+"resposta/alterar", $(this).serialize(), function(data){
			if (data.alterou === true) {
				toastr.success('Resposta alterada com sucesso!');
				$("#formRespostaModal").modal('hide');
				$("#respostaForm")[0].reset();
				$("#id_resposta").val('');
				$("#btnCadastrarResposta").text('Cadastrar');
				listarRespostas();
			} else {
				toastr.error('Erro ao alterar resposta.');
			}
		}, 'json');
	} else {
		// Cadastro de resposta
		$.post($("#url_base").text()+"resposta/cadastrar", $(this).serialize(), function(data){
			if (data.inseriu === true) {
				toastr.success('Resposta cadastrada com sucesso!');
				$("#formRespostaModal").modal('hide');
				$("#respostaForm")[0].reset();
				listarRespostas();
			} else {
				toastr.error('Erro ao cadastrar resposta.');
			}
		}, 'json');
	}
});

$('#formRespostaModal').on('hidden.bs.modal', function () {
	$("#respostaForm")[0].reset();
	$("#id_resposta").val('');
	$("#btnCadastrarResposta").text('Cadastrar');
});

// Função de exclusão de respostas
function excluirResposta(id) {
	if (confirm('Tem certeza que deseja excluir esta resposta?')) {
		$.get($("#url_base").text()+"resposta/excluir", { id: id }, function(data) {
			if (data.excluiu === true) {
				toastr.success('Resposta excluída com sucesso!');
				listarRespostas();
			} else {
				toastr.error('Erro ao excluir resposta.');
			}
		}, 'json');
	}
}

// Função de edição de respostas
function editarResposta(id) {
	$.get($("#url_base").text()+"resposta/buscar", { id: id }, function(data) {
		// Preencher o formulário com os dados da resposta
		var parsed = typeof data === 'string' ? JSON.parse(data) : data;
		var resposta = parsed.resposta || parsed;
		console.log(resposta.resposta);
		if (!resposta) {
			toastr.error('Não foi possível carregar os dados da resposta.');
			return;
		}
		$("#id_resposta").val(resposta.id);
		$("#resposta").val(resposta.resposta);
		$("#sisperjud").prop('checked', resposta.sisperjud === 't');
		$("#loas").prop('checked', resposta.loas === 't');
		$("#btnCadastrarResposta").text('Alterar');
	});
}

function mudaNumeroRegistros(){
	window.location.href = '/resposta/lista/1/'+$('#texto_busca').val()+'/'+$("#texto-campo").val()+'/'+$("#texto-ord").val()+'/'+$("#select_paginas").val();
}

$('#buscar').click(function(){
	window.location.href = '/resposta/lista/1/'+$('#texto_busca').val()+'/'+$("#texto-campo").val()+'/'+$("#texto-ord").val()+'/'+$("#select_paginas").val();
});
$('.numero-pagina').click(function(){
	var pagina = $(this).text();
	$('.page-item').attr('page-active', pagina);
	window.location.href = '/resposta/lista/'+pagina+'/'+$('#texto_busca').val()+'/'+$("#texto-campo").val()+'/'+$("#texto-ord").val()+'/'+$("#texto-paginas").val();
});
$('.voltar-pagina').click(function(){
	var pagina = $(this).attr('page-active')-1;
	$('.page-item').attr('page-active', pagina);
	window.location.href = '/resposta/lista/'+pagina+'/'+$('#texto_busca').val()+'/'+$("#texto-campo").val()+'/'+$("#texto-ord").val()+'/'+$("#texto-paginas").val();
});
$('.proxima-pagina').click(function(){
	var pagina = $(this).attr('page-active')-1;
	$('.page-item').attr('page-active', pagina);
	window.location.href = '/resposta/lista/'+pagina+'/'+$('#texto_busca').val()+'/'+$("#texto-campo").val()+'/'+$("#texto-ord").val()+'/'+$("#texto-paginas").val();
});

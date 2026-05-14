// $(function () {
//     // Summernote
//     $('#descricao_usuario').summernote();
// })
$(document).ready(function() {
	$(".processo").mask("00000.000000/0000-00");
	$(".cpf").mask("000.000.000-00");
	listarPericias();
});

function listarPericias(){
	$.get($("#url_base").text()+"sisperjud/listar", function(data){
		$("#tblSisperjud").empty(); //Apaga o conteúdo da tabela
		$("#tblSisperjud").html('<thead>\
                         		<tr class="py-3">\
								<th class="ps-4">Nome do Periciando</th>\
								<th>Data da Perícia</th>\
								<th>Processo</th>\
								<th class="text-center">Ações</th>\
                         		</tr>\
                     			</thead>\
                     			<tbody id="corpoTblSisperjud"></tbody>');//Insere o conteúdo atualizado na tabela
		var pericias = data.pericias || data;
		//console.log(pericias);
		if (!$.isArray(pericias)) {
			console.error('Resposta inesperada de listar perícias:', data);
			return;
		}
		$.each(pericias, function(i, pericia){
			//console.log(pericia);
			$("#corpoTblSisperjud").append('<tr>\
								<td class="ps-4"><div class="fw-bold">'+pericia.nome_periciando+'</div><span class="small text-muted">ID: #'+pericia.id+'</span></td>\
								<td>'+pericia.data_pericia+'</td>\
								<td>'+pericia.processo+'</td>\
								<td class="text-center">\
									<button class="btn btn-light btn-sm rounded-circle me-1" title="Excluir Perícia" onclick="excluirPericia('+pericia.id+')"><i class="fa-solid fa-trash text-danger"></i></button>\
									<button class="btn btn-light btn-sm rounded-circle" title="Editar Perícia" onclick="editarPericia('+pericia.id+')" data-bs-toggle="modal" data-bs-target="#formPericiaModal"><i class="fa-solid fa-pen-to-square text-primary"></i></button>\
								</td>\
							</tr>');
		});
	}, 'json');
}

//Ação do botão de cadastrar usuário
/*$("#usuarioForm").submit(function(e){
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
});*/

/*$('#formUsuarioModal').on('hidden.bs.modal', function () {
	$("#usuarioForm")[0].reset();
	$("#id_usuario").val('');
	$("#btnCadastrarUsuario").text('Cadastrar');
	$("#senha_usuario").prop('required', true);
});*/

// Função de exclusão de perícias
function excluirPericia(id) {
	if (confirm('Tem certeza que deseja excluir esta perícia?')) {
		$.get($("#url_base").text()+"sisperjud/excluir", { id: id }, function(data) {
			if (data.excluiu === true) {
				toastr.success('Perícia excluída com sucesso!');
				listarPericias();
			} else {
				toastr.error('Erro ao excluir perícia.');
			}
		}, 'json');
	}
}

// Função de edição de perícias
function editarPericia(id) {
	$.get($("#url_base").text()+"sisperjud/buscar", { id: id }, function(data) {
		// Preencher o formulário com os dados da perícia
		var pericia = JSON.parse(data);
		console.log(pericia.pericia.nome_periciando);
		if (!pericia) {
			toastr.error('Não foi possível carregar os dados da perícia.');
			return;
		}
		$("#id_pericia").val(pericia.pericia.id);
		$("#nome_periciando").val(pericia.pericia.nome_periciando);
		$("#data_pericia").val(pericia.pericia.data_pericia);
		$("#btnCadastrarPericia").text('Alterar');
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

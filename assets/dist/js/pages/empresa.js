$(function () {
    // Summernote
    $('#descricao_empresa').summernote();
	$('#dados_bancarios').summernote();
	$('#historia').summernote();
	$('#atuacao').summernote();
	$('#atuacao').summernote();
	$('#missao').summernote();
	$('#visao').summernote();
	$('#valores').summernote();
})

function msg_alert(tipo, msg){
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 5000
    });
	Toast.fire({type: tipo, title: msg})
}

function mudaNumeroRegistros(){
	window.location.href = '/empresa/lista/1/'+$('#texto_busca').val()+'/'+$("#texto-campo").val()+'/'+$("#texto-ord").val()+'/'+$("#select_paginas").val();
}

$('#buscar').click(function(){
	window.location.href = '/empresa/1/'+$('#texto_busca').val()+'/';
});
$('.numero-pagina').click(function(){
	var pagina = $(this).text();
	$('.page-item').attr('page-active', pagina);
	window.location.href = '../../'+pagina+'/'+$('#texto_busca').val()+'/';
});
$('.voltar-pagina').click(function(){
	var pagina = $(this).attr('page-active')-1;
	$('.page-item').attr('page-active', pagina);
	window.location.href = '../../'+pagina+'/'+$('#texto_busca').val()+'/';
});
$('.proxima-pagina').click(function(){
	var pagina = $(this).attr('page-active')-1;
	$('.page-item').attr('page-active', pagina);
	window.location.href = '../../'+pagina+'/'+$('#texto_busca').val()+'/';
});

// CADASTRO
function cadastrar(funcao){
	var descricao = $('#descricao_empresa').val();
	if(titulo=='' || titulo==' '){
		msg_alert('warning', '&nbsp; Atenção! Preencha todos os campos!');
	} else {
		$.ajax({
			method: 'post',
			url: '/empresa/cadastrar',
			data: {	titulo: titulo, descricao: descricao, situacao: situacao},
			dataType: 'json',
			success: function(retorno){
				if(retorno.inseriu){
					if (funcao =="C"){
						msg_alert('success', '&nbsp; Empresa cadastrado com sucesso!');
						$('input').val('');
						$('select').val('');
						$('#descricao_empresa').summernote('code', '');
						$('#situacao_empresa').val('A');
					} else {
						history.back();
					}
				} else {
					msg_alert('error', '&nbsp; Falha ao cadastrar empresa!');
				}
			},
			error: function(retorno){
				msg_alert('error', '&nbsp; Erro ao cadastrar empresa!');
  			}
		});
	}
}
$('#btn_salvar').click(function(){
	cadastrar();
});
// FIM CADASTRO

// EXCLUSÃO
$('#lista-empresas').on('click', '.btn-excluir', function(){
	var id = $(this).attr('data-id');
	$('#btn-excluir').attr('data-id', id);
	$('#modal-excluir').modal('show');
});

$('#btn-excluir').click(function(){
	var id = $(this).attr('data-id');
	$.ajax({
		method: 'post',
		url: '/excluir',
		data: {id: id},
		dataType: 'json',
		success: function(retorno){
			if(retorno.excluiu){
				$('#titulo-modal-msg').text('Sucesso');
				$('#texto-modal-msg').text('Registro excluído!');
				$('#modal-msg').modal('show');
				window.location.reload()
			} else {
				alert('Falha');
				$('#titulo-modal-msg').text('Erro');
				$('#texto-modal-msg').text('Falha ao excluir registro!');
				$('#modal-msg').modal('show');
			}
		},
		error: function(retorno){
			alert('Erro');
			$('#titulo-modal-msg').text('Erro');
			$('#texto-modal-msg').text('Falha ao excluir registro!');
			$('#modal-msg').modal('show');
		}
	});
	$('#modal-excluir-empresa').modal('hide');
});
// FIM EXCLUSÃO

function editar(){
	var id = $('#id_empresa').val();
	var descricao = $('#descricao_empresa').val();
	var dados_bancarios = $('#dados_bancarios').val();
	var historia = $('#historia').val();
	var atuacao = $('#atuacao').val();
	var missao = $('#missao').val();
	var visao = $('#visao').val();
	var valores = $('#valores').val();
	if(descricao=='' || descricao==' '){
		msg_alert('warning', '&nbsp; Atenção! Preencha todos os campos!');
	} else {
		$.ajax({
			method: 'post',
			url: '../empresa/editar',
			data: {	id: id, descricao: descricao, dados_bancarios: dados_bancarios, historia: historia, atuacao: atuacao, missao: missao, visao: visao, valores: valores },
			dataType: 'json',
			success: function(retorno){
				if(retorno.editou){
					msg_alert('success', '&nbsp; Empresa editado com sucesso!');
				} else {
					msg_alert('error', '&nbsp; Falha ao editar empresa!');
				}
			},
			error: function(retorno){
				msg_alert('error', '&nbsp; Erro ao editar empresa!');
  			}
		});
	}
}
$('#btn_editar').click(function(){
	editar();
});
// FIM EDIÇÃO

$('#btn-escolher-arquivo').click(function(){
	$('#campo_midia').click();
});
$('#campo_midia').change(function(){
	$('#formMidia').submit();
});

// ENVIAR IMAGENS
$('#formMidia').submit(function(e) {
	e.preventDefault();
	$('#modal-loading').modal('show');
	$.ajax({
		method: 'post',
		url: "../../../../midia/upload_midias",
		data: new FormData(this),
		dataType: 'json',
		contentType: false,
		cache: false,
		processData: false,
		success: function(retorno)
		{
			for (i=0; i<retorno.qtd_imagens; i++) {
				if(!retorno[i].enviou){
					msg_alert('warning', '&nbsp; '+retorno[i].erro);
				}
			}
			window.location.reload();
		},
		error: function(retorno){
			msg_alert('warning', '&nbsp; Erro ao enviar imagem.');
		}
	});
});

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
	window.location.href = '/midia/lista/1/'+$('#texto_busca').val()+'/'+$("#texto-campo").val()+'/'+$("#texto-ord").val()+'/'+$("#select_paginas").val();
}

$('#buscar').click(function(){
	window.location.href = '../../1/'+$('#texto_busca').val()+'/';
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
function cadastrar(){
	var titulo = $('#titulo_midia').val();
	var descricao = $('#descricao_midia').val();
	var tipo = $('#tipo_midia').val();
	var nome = $('#nome_midia').val();
	var caminho = $('#caminho_midia').val();
	var situacao = $('#situacao_midia').val();
	if(titulo=='' || titulo==' ' || descricao=='' || descricao ==' '){
		msg_alert('warning', '&nbsp; Atenção! Preencha todos os campos!');
	} else {
		$.ajax({
			method: 'post',
			url: '../midia/cadastrar',
			data: {	titulo: titulo, descricao: descricao, tipo: tipo, nome: nome, caminho: caminho, situacao: situacao},
			dataType: 'json',
			success: function(retorno){
				if(retorno.inseriu){
					msg_alert('success', '&nbsp; Mídia cadastrada com sucesso!');
					$('#label-midia').text('');
					$('input').val('');
					$('select').val('');
					$('#descricao_midia').summernote('code', '');
					$('#situacao_midia').val('A');
				} else {
					msg_alert('error', '&nbsp; Falha ao cadastrar mídia!');
				}
			},
			error: function(retorno){
				msg_alert('error', '&nbsp; Erro ao cadastrar mídia!');
  			}
		});
	}
}
$('#btn_salvar').click(function(){
	cadastrar();
});
// FIM CADASTRO

// EXCLUSÃO
$('#lista-midias').on('click', '.btn-excluir', function(){
	var id = $(this).attr('data-id');
	var arquivo = $(this).attr('data-arquivo-midia');
	$('#btn-excluir').attr('data-id', id);
	$('#btn-excluir').attr('data-arquivo-midia', arquivo);
	$('#modal-excluir').modal('show');
});

$('#btn-excluir').click(function(){
	var id = $(this).attr('data-id');
	var arquivo = $(this).attr('data-arquivo-midia');
	$.ajax({
		method: 'post',
		url: '../../../excluir',
		data: {id: id, arquivo: arquivo},
		dataType: 'json',
		success: function(retorno){
			if(retorno.excluiu){
				msg_alert('success', '&nbsp; Mídia excluída com sucesso!');
				window.location.reload()
			} else {
				msg_alert('error', '&nbsp; Falha ao excluir mídia!');
			}
		},
		error: function(retorno){
			msg_alert('error', '&nbsp; Erro ao excluir mídia!');
		}
	});
	$('#modal-excluir-midia').modal('hide');	
});
// FIM EXCLUSÃO

function editar(){
	var id = $('#id_midia').val();
	var titulo = $('#titulo_midia').val();
	var descricao = $('#descricao_midia').val();
	var tipo = $('#tipo_midia').val();
	var nome = $('#nome_midia').val();
	var caminho = $('#caminho_midia').val();
	var situacao = $('#situacao_midia').val();
	if(titulo=='' || titulo==' ' || descricao=='' || descricao ==' '){
		msg_alert('warning', '&nbsp; Atenção! Preencha todos os campos!');
	} else {
		$.ajax({
			method: 'post',
			url: '../midia/editar',
			data: {	id: id, titulo: titulo, descricao: descricao, tipo: tipo, nome: nome, caminho: caminho, situacao: situacao},
			dataType: 'json',
			success: function(retorno){
				if(retorno.editou){
					msg_alert('success', '&nbsp; Mídia editada com sucesso!');
				} else {
					msg_alert('error', '&nbsp; Falha ao editar mídia!');
				}
			},
			error: function(retorno){
				msg_alert('error', '&nbsp; Erro ao editar mídia!');
  			}
		});
	}
}
$('#btn_editar').click(function(){
	editar();
});
// FIM EDIÇÃO

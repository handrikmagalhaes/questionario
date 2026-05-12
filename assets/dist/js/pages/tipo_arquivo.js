$(function () {
    // Summernote
    $('#descricao_tipo_arquivo').summernote();
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
	window.location.href = '/tipo_arquivo/lista/1/'+$('#texto_busca').val()+'/'+$("#texto-campo").val()+'/'+$("#texto-ord").val()+'/'+$("#select_paginas").val();
}

$('#buscar').click(function(){
	window.location.href = '/tipo_arquivo/lista/1/'+$('#texto_busca').val()+'/'+$("#texto-campo").val()+'/'+$("#texto-ord").val()+'/'+$("#texto-paginas").val();
});
$('.numero-pagina').click(function(){
	var pagina = $(this).text();
	$('.page-item').attr('page-active', pagina);
	window.location.href = '/tipo_arquivo/lista/'+pagina+'/'+$('#texto_busca').val()+'/'+$("#texto-campo").val()+'/'+$("#texto-ord").val()+'/'+$("#texto-paginas").val();
});
$('.voltar-pagina').click(function(){
	var pagina = $(this).attr('page-active')-1;
	$('.page-item').attr('page-active', pagina);
	window.location.href = '/tipo_arquivo/lista/'+pagina+'/'+$('#texto_busca').val()+'/'+$("#texto-campo").val()+'/'+$("#texto-ord").val()+'/'+$("#texto-paginas").val();
});
$('.proxima-pagina').click(function(){
	var pagina = $(this).attr('page-active')-1;
	$('.page-item').attr('page-active', pagina);
	window.location.href = '/tipo_arquivo/lista/'+pagina+'/'+$('#texto_busca').val()+'/'+$("#texto-campo").val()+'/'+$("#texto-ord").val()+'/'+$("#texto-paginas").val();
});

// CADASTRO
function cadastrar(funcao){
	var titulo = $('#titulo_tipo_arquivo').val();
	var descricao = $('#descricao_tipo_arquivo').val();
	var situacao = $('#situacao_tipo_arquivo').val();
	if(titulo=='' || titulo==' '){
		msg_alert('warning', '&nbsp; Atenção! Preencha todos os campos!');
	} else {
		$.ajax({
			method: 'post',
			url: '../tipo_arquivo/cadastrar',
			data: {	titulo: titulo, descricao: descricao, situacao: situacao},
			dataType: 'json',
			success: function(retorno){
				if(retorno.inseriu){
					if (funcao == "C"){
						msg_alert('success', '&nbsp; Tipo de arquivo cadastrado com sucesso!');
						$('input').val('');
						$('select').val('');
						$('#descricao_tipo_arquivo').summernote('code', '');
						$('#situacao_tipo_arquivo').val('A');
					} else {
						history.back();
					}
				} else {
					msg_alert('error', '&nbsp; Falha ao cadastrar tipo de arquivo!');
				}
			},
			error: function(retorno){
				msg_alert('error', '&nbsp; Erro ao cadastrar tipo de arquivo!');
  			}
		});
	}
}
$('#btn_salvar_continuar').click(function(){
	cadastrar("C");
});
$('#btn_salvar_voltar').click(function(){
	cadastrar("V");
});
// FIM CADASTRO

// EXCLUSÃO
$('#lista-tipos-arquivo').on('click', '.btn-excluir', function(){
	var id = $(this).attr('data-id');
	$('#btn-excluir').attr('data-id', id);
	$('#modal-excluir').modal('show');
});

$('#btn-excluir').click(function(){
	var id = $(this).attr('data-id');
	$.ajax({
		method: 'post',
		url: '../../../excluir',
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
	$('#modal-excluir-tipo-arquivo').modal('hide');
});
// FIM EXCLUSÃO

function editar(funcao){
	var id = $('#id_tipo_arquivo').val();
	var titulo = $('#titulo_tipo_arquivo').val();
	var descricao = $('#descricao_tipo_arquivo').val();
	var situacao = $('#situacao_tipo_arquivo').val();
	if(titulo=='' || titulo==' '){
		msg_alert('warning', '&nbsp; Atenção! Preencha todos os campos!');
	} else {
		$.ajax({
			method: 'post',
			url: '../tipo_arquivo/editar',
			data: {	id: id, titulo: titulo, descricao: descricao, situacao: situacao},
			dataType: 'json',
			success: function(retorno){
				if(retorno.editou){
					if (fruncao == "C"){
						msg_alert('success', '&nbsp; Tipo de arquivo editado com sucesso!');
					} else {
						history.back();
					}
				} else {
					msg_alert('error', '&nbsp; Falha ao editar tipo de arquivo!');
				}
			},
			error: function(retorno){
				msg_alert('error', '&nbsp; Erro ao editar tipo de arquivo!');
  			}
		});
	}
}
$('#btn_editar_continuar').click(function(){
	editar("C");
});
$('#btn_editar_voltar').click(function(){
	editar("V");
});
// FIM EDIÇÃO


function abreModal(id){
	//$("#modal-dados").html('');
	const vid = id;
	$.get('/tipo_arquivo/visualiza', {id:vid}, function(data){
		dados = JSON.parse(data);
		//console.log(dados);
		console.log(dados.tipo_arquivo.length);

		if (dados.tipo_arquivo.length > 0){
			$("#modalLabel").text('Tipo de Arquivo: '+dados.tipo_arquivo[0].TITULO_TIPO_ARQUIVO);
			$("#descricaoTipoArquivo").text(dados.tipo_arquivo[0].DESCRICAO_TIPO_ARQUIVO);
		}
	});
	$('#modalDados').modal('show');

}

function ordena(campo){
	var vCamponovo = campo;
	var vCampo = $("#texto-campo").val();
	var ord = $("#texto-ord").val();
	var registros = $("#texto-paginas").val();
	if (vCamponovo == vCampo){
		if (ord == 'asc'){
			ord = 'desc';
		} else {
			ord = 'asc';
		}
	} else {
		ord = 'desc';
	}	window.location.href = '/tipo_arquivo/lista/1/'+$('#texto_busca').val()+'/'+vCamponovo+'/'+ord+'/'+registros;
}
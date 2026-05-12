$(function () {
    // Summernote
    $('#descricao_dica_saude').summernote();
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
	window.location.href = '/dica_saude/lista/1/'+$('#texto_busca').val()+'/'+$("#texto-campo").val()+'/'+$("#texto-ord").val()+'/'+$("#select_paginas").val();
}

$('#buscar').click(function(){
	window.location.href = '/dica_saude/lista/1/'+$('#texto_busca').val()+'/'+$("#texto-campo").val()+'/'+$("#texto-ord").val()+'/'+$("#texto-paginas").val();
});
$('.numero-pagina').click(function(){
	var pagina = $(this).text();
	$('.page-item').attr('page-active', pagina);
	window.location.href = '/dica_saude/lista/'+pagina+'/'+$('#texto_busca').val()+'/'+$("#texto-campo").val()+'/'+$("#texto-ord").val()+'/'+$("#texto-paginas").val();
});
$('.voltar-pagina').click(function(){
	var pagina = $(this).attr('page-active')-1;
	$('.page-item').attr('page-active', pagina);
	window.location.href = '/dica_saude/lista/'+pagina+'/'+$('#texto_busca').val()+'/'+$("#texto-campo").val()+'/'+$("#texto-ord").val()+'/'+$("#texto-paginas").val();
});
$('.proxima-pagina').click(function(){
	var pagina = $(this).attr('page-active')-1;
	$('.page-item').attr('page-active', pagina);
	window.location.href = '/dica_saude/lista/'+pagina+'/'+$('#texto_busca').val()+'/'+$("#texto-campo").val()+'/'+$("#texto-ord").val()+'/'+$("#texto-paginas").val();
});

// CADASTRO
function cadastrar(funcao){
	var titulo = $('#titulo_dica_saude').val();
	var link = $('#link_dica_saude').val();
	var descricao = $('#descricao_dica_saude').val();
	var situacao = $('#situacao_dica_saude').val();
	if(titulo=='' || titulo==' '){
		msg_alert('warning', '&nbsp; Atenção! Preencha todos os campos!');
	} else {
		$.ajax({
			method: 'post',
			url: '/dica_saude/cadastrar',
			data: {	titulo: titulo, link: link, descricao: descricao, situacao: situacao},
			dataType: 'json',
			success: function(retorno){
				if(retorno.inseriu){
					if (funcao == "C"){
						msg_alert('success', '&nbsp; Dica de saúde cadastrada com sucesso!');
						$('input').val('');
						$('select').val('');
						$('#descricao_dica_saude').summernote('code', '');
						$('#situacao_dica_saude').val('A');
					} else {
						history.back();
					}
				} else {
					msg_alert('error', '&nbsp; Falha ao cadastrar Dica de saúde!');
				}
			},
			error: function(retorno){
				msg_alert('error', '&nbsp; Erro ao cadastrar Dica de saúde!');
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
$('#lista-dicas-saude').on('click', '.btn-excluir', function(){
	var id = $(this).attr('data-id');
	$('#btn-excluir').attr('data-id', id);
	$('#modal-excluir').modal('show');
});

$('#btn-excluir').click(function(){
	var id = $(this).attr('data-id');
	$.ajax({
		method: 'post',
		url: '/dica_saude/excluir',
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
	$('#modal-excluir-dica_saude').modal('hide');	
});
// FIM EXCLUSÃO

function editar(funcao){
	var id = $('#id_dica_saude').val();
	var titulo = $('#titulo_dica_saude').val();
	var link = $('#link_dica_saude').val();
	var descricao = $('#descricao_dica_saude').val();
	var situacao = $('#situacao_dica_saude').val();
	if(titulo=='' || titulo==' '){
		msg_alert('warning', '&nbsp; Atenção! Preencha todos os campos!');
	} else {
		$.ajax({
			method: 'post',
			url: '/dica_saude/editar',
			data: {	id: id, titulo: titulo, link: link, descricao: descricao, situacao: situacao},
			dataType: 'json',
			success: function(retorno){
				if(retorno.editou){
					if (funcao == "C"){
						msg_alert('success', '&nbsp; Dica de saúde editada com sucesso!');
					} else {
						history.back();
					}
				} else {
					msg_alert('error', '&nbsp; Falha ao editar Dica de saúde!');
				}
			},
			error: function(retorno){
				msg_alert('error', '&nbsp; Erro ao editar Dica de saúde!');
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
	$.get('/dica_saude/visualiza', {id:vid}, function(data){
		dados = JSON.parse(data);
		console.log(dados);
		var rootURL = location.hostname;

		if (dados.dica_saude.length > 0){
			$("#modalLabel").text(dados.dica_saude[0].TITULO_DICA_SAUDE);
			$("#descricaoDica").html(dados.dica_saude[0].DESCRICAO_DICA_SAUDE);
			if (dados.dica_saude[0].LINK_DICA_SAUDE){$("#linkDica").attr("href", dados.dica_saude[0].LINK_DICA_SAUDE);} else {$("#linkDica").removeAttr("href");}
			if (dados.dica_saude[0].IND_SITUACAO_DICA_SAUDE = 'A'){
				$("#situacaoDica").text('Ativo');
			} else {
				$("#situacaoDica").text('Inativo');
			}
			
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
	}	window.location.href = '/dica_saude/lista/1/'+$('#texto_busca').val()+'/'+vCamponovo+'/'+ord+'/'+registros;
}

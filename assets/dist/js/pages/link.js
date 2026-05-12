$(function () {
    // Summernote
    $('#descricao_link').summernote();
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
	window.location.href = '/link/lista/1/'+$('#texto_busca').val()+'/'+$("#texto-campo").val()+'/'+$("#texto-ord").val()+'/'+$("#select_paginas").val();
}

$('#buscar').click(function(){
	window.location.href = '/link/lista/1/'+$('#texto_busca').val()+'/';
});
$('.numero-pagina').click(function(){
	var pagina = $(this).text();
	$('.page-item').attr('page-active', pagina);
	window.location.href = '/link/lista/'+pagina+'/'+$('#texto_busca').val()+'/';
});
$('.voltar-pagina').click(function(){
	var pagina = $(this).attr('page-active')-1;
	$('.page-item').attr('page-active', pagina);
	window.location.href = '/link/lista/'+pagina+'/'+$('#texto_busca').val()+'/';
});
$('.proxima-pagina').click(function(){
	var pagina = $(this).attr('page-active')-1;
	$('.page-item').attr('page-active', pagina);
	window.location.href = '/link/lista/'+pagina+'/'+$('#texto_busca').val()+'/';
});

// CADASTRO
function cadastrar(funcao){
	var titulo = $('#titulo_link').val();
	var caminho = $('#caminho_link').val();
	var tipo = $('#tipo_link').val();
	var descricao = $('#descricao_link').val();
	var situacao = $('#situacao_link').val();
	if(titulo=='' || titulo==' ' || descricao=='' || descricao ==' '){
		msg_alert('warning', '&nbsp; Atenção! Preencha todos os campos!');
	} else {
		$.ajax({
			method: 'post',
			url: '{url_base}/link/cadastrar',
			data: {	titulo: titulo, caminho: caminho, tipo: tipo, descricao: descricao, situacao: situacao},
			dataType: 'json',
			success: function(retorno){
				if(retorno.inseriu){
					if (funcao == "C"){
						msg_alert('success', '&nbsp; Link cadastrado com sucesso!');
						$('input').val('');
						$('select').val('');
						$('#descricao_link').summernote('code', '');
						$('#situacao_link').val('A');
					} else {
						history.back();
					}
				} else {
					msg_alert('error', '&nbsp; Falha ao cadastrar link!');
				}
			},
			error: function(retorno){
				msg_alert('error', '&nbsp; Erro ao cadastrar link!');
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
$('#lista-links').on('click', '.btn-excluir', function(){
	var id = $(this).attr('data-id');
	$('#btn-excluir').attr('data-id', id);
	$('#modal-excluir').modal('show');
});

$('#btn-excluir').click(function(){
	var id = $(this).attr('data-id');
	$.ajax({
		method: 'post',
		url: '/link/excluir',
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
	$('#modal-excluir-link').modal('hide');	
});
// FIM EXCLUSÃO

function editar(funcao){
	var id = $('#id_link').val();
	var titulo = $('#titulo_link').val();
	var caminho = $('#caminho_link').val();
	var tipo = $('#tipo_link').val();
	var descricao = $('#descricao_link').val();
	var situacao = $('#situacao_link').val();
	if(titulo=='' || titulo==' ' || descricao=='' || descricao ==' '){
		msg_alert('warning', '&nbsp; Atenção! Preencha todos os campos!');
	} else {
		$.ajax({
			method: 'post',
			url: $("#url_base").text()+'link/editar',
			data: {	id: id, titulo: titulo, caminho: caminho, tipo: tipo, descricao: descricao, situacao: situacao},
			dataType: 'json',
			success: function(retorno){
				if(retorno.editou){
					if (funcao == "C"){
						msg_alert('success', '&nbsp; Link editado com sucesso!');
					} else {
						history.back();
					}
				} else {
					msg_alert('error', '&nbsp; Falha ao editar link!');
				}
			},
			error: function(retorno){
				msg_alert('error', '&nbsp; Erro ao editar link!');
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
	$.get('/link/visualiza', {id:vid}, function(data){
		dados = JSON.parse(data);
		console.log(dados);
		var rootURL = location.hostname;

		if (dados.link.length > 0){
			$("#modalLabel").text(dados.link[0].TITULO_LINK);
			$("#caminhoLink").text(dados.link[0].CAMINHO_LINK)
			if (dados.link[0].CAMINHO_LINK){$("#caminhoLink").attr("href", dados.link[0].CAMINHO_LINK);} else {$("#linkDica").removeAttr("href");}
			$("#caminhoLink").html(dados.link[0].CAMINHO_LINK);
			$("#tipoLink").html(dados.link[0].TIPO_LINK);
			if (dados.link[0].IND_SITUACAO_LINK = 'A'){
				$("#situacaoLink").text('Ativo');
			} else {
				$("#situacaoLink").text('Inativo');
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
	}	window.location.href = '/link/lista/1/'+$('#texto_busca').val()+'/'+vCamponovo+'/'+ord+'/'+registros;
}


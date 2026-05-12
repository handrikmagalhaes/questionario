$(function () {
    // Summernote
    $('#descricao_comunicado_interno').summernote();
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
	window.location.href = '/comunicado_interno/lista/1/'+$('#texto_busca').text()+'/'+$("#texto-campo").val()+'/'+$("#texto-ord").val()+'/'+$("#select_paginas").val();
}

$('#buscar').click(function(){
	window.location.href = '/comunicado_interno/lista/1/'+$('#texto_busca').val()+'/'+$("#texto-campo").val()+'/'+$("#texto-ord").val()+'/'+$("#texto-paginas").val();
});
$('.numero-pagina').click(function(){
	var pagina = $(this).text();
	$('.page-item').attr('page-active', pagina);
	window.location.href = '/comunicado_interno/lista/'+pagina+'/'+$('#texto_busca').val()+'/'+$("#texto-campo").val()+'/'+$("#texto-ord").val()+'/'+$("#texto-paginas").val();
});
$('.voltar-pagina').click(function(){
	var pagina = $(this).attr('page-active')-1;
	$('.page-item').attr('page-active', pagina);
	window.location.href = '/comunicado_interno/lista/'+pagina+'/'+$('#texto_busca').val()+'/'+$("#texto-campo").val()+'/'+$("#texto-ord").val()+'/'+$("#texto-paginas").val();
});
$('.proxima-pagina').click(function(){
	var pagina = $(this).attr('page-active')-1;
	$('.page-item').attr('page-active', pagina);
	window.location.href = '/comunicado_interno/lista/'+pagina+'/'+$('#texto_busca').val()+'/'+$("#texto-campo").val()+'/'+$("#texto-ord").val()+'/'+$("#texto-paginas").val();
});

// CADASTRO
function cadastrar(funcao){
	var titulo = $('#titulo_comunicado_interno').val();
	var descricao = $('#descricao_comunicado_interno').val();
	var departamento = $('#departamento_comunicado_interno').val();
	var situacao = $('#situacao_comunicado_interno').val();
	if(titulo=='' || titulo==' ' || descricao=='' || descricao ==' '){
		msg_alert('warning', '&nbsp; Atenção! Preencha todos os campos!');
	} else {
		$.ajax({
			method: 'post',
			url: $("#url_base").text()+`/comunicado_interno/cadastrar`,
			data: {	titulo: titulo, descricao: descricao, situacao: situacao, departamento: departamento},
			dataType: 'json',
			success: function(retorno){
				if(retorno.inseriu){
					if (funcao == "C"){
						msg_alert('success', '&nbsp; Comunicado interno cadastrado com sucesso!');
						$('input').val('');
						$('select').val('');
						$('#descricao_comunicado_interno').summernote('code', '');
						$('#situacao_comunicado_interno').val('A');
					} else {
						history.back();
					}
				} else {
					msg_alert('error', '&nbsp; Falha ao cadastrar comunicado interno!');
				}
			},
			error: function(retorno){
				msg_alert('error', '&nbsp; Erro ao cadastrar comunicado interno!');
  			}
		});
	}
}
$('#btn_salvar_voltar').click(function(){
	cadastrar("V");
});
$('#btn_salvar_continuar').click(function(){
	cadastrar("C");
});

// FIM CADASTRO

// EXCLUSÃO
$('#lista-comunicados-internos').on('click', '.btn-excluir', function(){
	var id = $(this).attr('data-id');
	$('#btn-excluir').attr('data-id', id);
	$('#modal-excluir').modal('show');
});

$('#btn-excluir').click(function(){
	var id = $(this).attr('data-id');
	$.ajax({
		method: 'post',
		url: $("#url_base").text()+`comunicado_interno/excluir`,
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
	$('#modal-excluir-comunicado_interno').modal('hide');	
});
// FIM EXCLUSÃO

function editar(funcao){
	var id = $('#id_comunicado_interno').val();
	var titulo = $('#titulo_comunicado_interno').val();
	var descricao = $('#descricao_comunicado_interno').val();
	var departamento = $('#departamento_comunicado_interno').val();
	var situacao = $('#situacao_comunicado_interno').val();
	if(titulo=='' || titulo==' ' || descricao=='' || descricao ==' '){
		msg_alert('warning', '&nbsp; Atenção! Preencha todos os campos!');
	} else {
		$.ajax({
			method: 'post',
			url: $("#url_base").text()+`/comunicado_interno/editar`,
			data: {	id: id, titulo: titulo, descricao: descricao, situacao: situacao, departamento: departamento},
			dataType: 'json',
			success: function(retorno){
				if (funcao == "C"){
					if(retorno.editou){
						msg_alert('success', '&nbsp; Comunicado interno editado com sucesso!');
					} else {
						msg_alert('error', '&nbsp; Falha ao editar comunicado interno!');
					}
				} else {
					history.back();
				}
			},
			error: function(retorno){
				msg_alert('error', '&nbsp; Erro ao editar comunicado interno!');
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
	$.get($("#url_base").text()+`/comunicado_interno/visualiza`, {id:vid}, function(data){
		dados = JSON.parse(data);
		//console.log(dados);
		var rootURL = location.hostname;

		if (dados.comunicado_interno.length > 0){
			if ($("#titulo"+vid).hasClass('text-bold')){
				$.get($("#url_base").text()+`/comunicado_interno/confirma`, {id:vid}, function(data){
					dados = JSON.parse(data);
					//console.log(dados);
					if (dados.leu){
						$("#titulo"+id).removeClass('text-bold');
						$("#departamento"+id).removeClass('text-bold');
						$("#data"+id).removeClass('text-bold');
					}
				});
			}
			$("#modalLabel").text(dados.comunicado_interno[0].TITULO_COMUNICADO_INTERNO);
			$("#descricaoComunicado").html(dados.comunicado_interno[0].DESCRICAO_COMUNICADO_INTERNO);
			if (dados.comunicado_interno[0].IND_SITUACAO_COMUNICADO_INTERNO = 'A'){
				$("#situacaoComunicado").text('Ativo');
			} else {
				$("#situacaoComunicado").text('Inativo');
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
	}	window.location.href = '/comunicado_interno/lista/1/'+$('#texto_busca').val()+'/'+vCamponovo+'/'+ord+'/'+registros;
}

$(function () {
    // Summernote
    $('#descricao_feedback').summernote();
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
	window.location.href = '/feedback/lista/1/'+$('#texto_busca').val()+'/'+$("#texto-campo").val()+'/'+$("#texto-ord").val()+'/'+$("#select_paginas").val();
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
function cadastrar(funcao){
	var titulo = $('#titulo_feedback').val();
	var departamento = $('#departamento_feedback').val();
	var tipo = $('#tipo_feedback').val();
	var situacao = $('#situacao_feedback').val();
	if ($('#anonimo').is(":checked")){
		var anonimo = 1
	} else {
		var anonimo = 0;
	}
	var descricao = $('#descricao_feedback').val();
	if(titulo=='' || titulo==' ' || descricao=='' || descricao ==' ' || tipo=='' || tipo==' '){
		msg_alert('warning', '&nbsp; Atenção! Preencha todos os campos!');
	} else {
		$.ajax({
			method: 'post',
			url: '../feedback/cadastrar',
			data: {	titulo: titulo, departamento: departamento, descricao: descricao, tipo: tipo, situacao: situacao, anonimo: anonimo},
			dataType: 'json',
			success: function(retorno){
				if(retorno.inseriu){
					if (funcao == "C"){
						msg_alert('success', '&nbsp; Feedback cadastrado com sucesso!');
						$('input').val('');
						$('select').val('');
						$('#dsituacao_feedback').summernote('code', '');
						$('#situacao_feedback').val('A');
						$('#anonimo').prop('checked', false);
					} else {
						history.back();
					}
				} else {
					msg_alert('error', '&nbsp; Falha ao cadastrar feedback!');
				}
			},
			error: function(retorno){
				msg_alert('error', '&nbsp; Erro ao cadastrar feedback!');
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
$('#lista-feedbacks').on('click', '.btn-excluir', function(){
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
	$('#modal-excluir-feedback').modal('hide');	
});
// FIM EXCLUSÃO

function editar(funcao){
	var id = $('#id_feedback').val();
	var titulo = $('#titulo_feedback').val();
	var descricao = $('#descricao_feedback').val();
	var tipo = $('#tipo_feedback').val();
	var situacao = $('#situacao_feedback').val();
	if ($('#anonimo').is(":checked")){
		var anonimo = 1
	} else {
		var anonimo = 0;
	}	
	if(titulo=='' || titulo==' ' || descricao=='' || descricao==' ' || tipo=='' || tipo==' '){
		msg_alert('warning', '&nbsp; Atenção! Preencha todos os campos!');
	} else {
		$.ajax({
			method: 'post',
			url: '../feedback/editar',
			data: {	id: id, titulo: titulo, descricao: descricao, tipo: tipo, situacao: situacao, anonimo: anonimo},
			dataType: 'json',
			success: function(retorno){
				if(retorno.editou){
					if (funcao == "C"){
						msg_alert('success', '&nbsp; Feedback editado com sucesso!');
					} else {
						history.back();
					}
				} else {
					msg_alert('error', '&nbsp; Falha ao editar feedback!');
				}
			},
			error: function(retorno){
				msg_alert('error', '&nbsp; Erro ao editar feedback!');
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

// FUNÇÃO MOSTRAR MENSAGENS DE FEEDBACK
function mostraFeedback(id){
	var vId = id;
	var vUsuario;

	$.ajax({
		method: 'get',
		url: '/feedback/listar_mensagens',
		data: {	id_feedback: vId },
		dataType: 'json',
		success: function(retorno){
			if(retorno){
				//dados=JSON.parse(retorno.feedbacks);
				//alert(retorno.feedbacks.length);
				//msg_alert('success', '&nbsp; Feedback editado com sucesso!');
				for (let i = 0; i < retorno.feedbacks.length; i++){
					if (retorno.feedbacks[i].ANONIMO != 0){
						vUsuario = 'Usuário Anônimo';
					} else {
						vUsuario = retorno.feedbacks[i].NOME_USUARIO;
					}
					if (retorno.feedbacks[i].ID_USUARIO == $("#idUsuario").val()){
						$("#feedbacks"+vId).append('<div class="row ml-5 justify-content-end">\
						<div class="alert col-sm-6 shadow p-3 mb-2 rounded" style="background-color: #c1e8b0;">\
						<span class="mb-0"><b>'+vUsuario+'</b> escreveu:</span><br>\
						<span class="text-muted"><small>Em '+retorno.feedbacks[i].DT_CRIACAO_MENSAGEM+' às '+retorno.feedbacks[i].HR_CRIACAO_MENSAGEM+'</small></span><br>\
						<span class="font-italic pl-3">'+retorno.feedbacks[i].MENSAGEM+'</span></div></div>');
	
					} else {
						$("#feedbacks"+vId).append('<div class="row mr-5 justify-content-start">\
						<div class="alert col-sm-6 shadow p-3 mb-2 rounded" style="background-color: #cee4ea;">\
						<span class="mb-0"><b>'+vUsuario+'</b> escreveu:</span><br>\
						<span class="text-muted"><small>Em '+retorno.feedbacks[i].DT_CRIACAO_MENSAGEM+' às '+retorno.feedbacks[i].HR_CRIACAO_MENSAGEM+'</small></span><br>\
						<span class="font-italic pl-3">'+retorno.feedbacks[i].MENSAGEM+'</span></div></div>');
					}
				}
			} else {
				msg_alert('error', '&nbsp; Falha ao editar feedback!');
			}
		},
		error: function(jqXHR, exception) {
            if (jqXHR.status === 0) {
                msg_alert('error','Não conectado.\n Verificar rede.');
            } else if (jqXHR.status == 404) {
                msg_alert('error','Página não encontrada. [404]');
            } else if (jqXHR.status == 500) {
                msg_alert('error','Erro interno do servidor [500].');
            } else if (exception === 'parsererror') {
                msg_alert('error','Verificação de JSON falhou.');
            } else if (exception === 'timeout') {
                msg_alert('error','Servidor não respondeu.');
            } else if (exception === 'abort') {
                msg_alert('error','Requisição AJAX abortada.');
            } else {
                msg_alert('error','Erro desconhecido.\n' + jqXHR.responseText);
            }
        }
	});
	if ($("#iconExpand").hasClass("fas fa-angle-double-down")){
		$("#iconExpand").removeClass("fa-angle-double-down");
		$("#iconExpand").addClass("fa-angle-double-up");
		$("#feedbacks"+vId).html('');
	} else {
		$("#iconExpand").removeClass("fa-angle-double-up");
		$("#iconExpand").addClass("fa-angle-double-down");
	}


}

//Enviar Feedback
function responderFeedback(id){
	var vId = id;
	if ($("#checkAnonimo"+vId).is(":checked")){
		$("#checkAnonimo"+vId).val(1);
		$("#checkAnonimo"+vId).prop("checked", false);
	} else {
		$("#checkAnonimo"+vId).val(0);
	}
	$.ajax({
		method: 'post',
		url: '/feedback/responder_feedback',
		data: {id_feedback: vId, mensagem: $("#inputMensagem"+vId).val(), anonimo: $("#checkAnonimo"+vId).val()},
		dataType: 'json',
		success: function(retorno){
			if(retorno.inseriu){
				msg_alert('success', '&nbsp; Feedback enviado com sucesso!');
				$("#inputMensagem"+vId).val("");
				//$("#feedbacks"+vId).append($("#inputMensagem"+vId).val());
				$("#feedbacks"+vId).html("");
				mostraFeedback(vId);
				

				
			} else {
				msg_alert('error', '&nbsp; Erro ao enviar feedback!');
			}
		},
		error: function(jqXHR, exception) {
            if (jqXHR.status === 0) {
                msg_alert('error','Não conectado.\n Verificar rede.');
            } else if (jqXHR.status == 404) {
                msg_alert('error','Página não encontrada. [404]');
            } else if (jqXHR.status == 500) {
                msg_alert('error','Erro interno do servidor [500].');
            } else if (exception === 'parsererror') {
                msg_alert('error','Verificação de JSON falhou.');
            } else if (exception === 'timeout') {
                msg_alert('error','Servidor não respondeu.');
            } else if (exception === 'abort') {
                msg_alert('error','Requisição AJAX abortada.');
            } else {
                msg_alert('error','Erro desconhecido.\n' + jqXHR.responseText);
            }
        }
	});
}

//Enviar Feedback
function mudaPublico(id, status){
	var vId = id;
	var vStatus = status;
	$.ajax({
		method: 'post',
		url: '/feedback/muda_status_publico',
		data: {id_feedback: vId, status: vStatus},
		dataType: 'json',
		success: function(retorno){
			if(retorno.editou){
				msg_alert('success', '&nbsp; Status modificado com sucesso!');
				if(vStatus == 0){
					$("#mostra"+vId).removeClass("btn btn-sm btn-outline-primary btn-ver border-0 pt-0 pb-0");
					$("#mostra"+vId).addClass("btn btn-sm btn-outline-secondary btn-ver border-0 pt-0 pb-0");
					$("#mostra"+vId).attr("onclick", "mudaPublico("+vId+",1)")
				} else {
					$("#mostra"+vId).removeClass("btn btn-sm btn-outline-secondary btn-ver border-0 pt-0 pb-0");
					$("#mostra"+vId).addClass("btn btn-sm btn-outline-primary btn-ver border-0 pt-0 pb-0");
					$("#mostra"+vId).attr("onclick", "mudaPublico("+vId+",0)")
				}
			} else {
				msg_alert('error', '&nbsp; Erro ao enviar solicitação');
			}
		},
		error: function(jqXHR, exception) {
            if (jqXHR.status === 0) {
                msg_alert('error','Não conectado.\n Verificar rede.');
            } else if (jqXHR.status == 404) {
                msg_alert('error','Página não encontrada. [404]');
            } else if (jqXHR.status == 500) {
                msg_alert('error','Erro interno do servidor [500].');
            } else if (exception === 'parsererror') {
                msg_alert('error','Verificação de JSON falhou.');
            } else if (exception === 'timeout') {
                msg_alert('error','Servidor não respondeu.');
            } else if (exception === 'abort') {
                msg_alert('error','Requisição AJAX abortada.');
            } else {
                msg_alert('error','Erro desconhecido.\n' + jqXHR.responseText);
            }
        }

	})
}
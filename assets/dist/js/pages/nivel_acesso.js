$(function () {
    // Summernote
    $('#descricao_nivel_acesso').summernote();
})

// MARCAR TODAS AS PERMISSÕES
$('#marcar-todas-permissoes').click(function(){
	$('#permissoes input[type="checkbox"]').prop("checked", true);
});
// DESMARCAR TODAS AS PERMISSÕES
$('#desmarcar-todas-permissoes').click(function(){
	$('#permissoes input[type="checkbox"]').prop("checked", false);
});
// MARCA OU DESMARCA CHCKS
$('.check-todas-permissoes').click(function(){
	$(this).tooltip('hide');
	if($(this).is(':checked')){
		$(this).parents('.grupo-permissoes').find('input[type="checkbox"]').prop("checked", true);
	} else if(!$(this).is(':checked')){
		$(this).parents('.grupo-permissoes').find('input[type="checkbox"]').prop("checked", false);
	}
});
$('.check-visualizar').click(function(){
	if(!$(this).is(':checked')){
		$(this).parents('.grupo-permissoes').find('input.acao').prop("checked", false);
	}
});
$('input.acao').click(function(){
	if($(this).is(':checked')){
		$(this).parents('.grupo-permissoes').find('.check-visualizar').prop("checked", true);
	}
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
	window.location.href = '/nivel_acesso/lista/1/'+$('#texto_busca').val()+'/'+$("#texto-campo").val()+'/'+$("#texto-ord").val()+'/'+$("#select_paginas").val();
}

$('#buscar').click(function(){
	window.location.href = '/nivel_acesso/lista/1/'+$('#texto_busca').val()+'/'+$("#texto-campo").val()+'/'+$("#texto-ord").val()+'/'+$("#texto-paginas").val();
});
$('.numero-pagina').click(function(){
	var pagina = $(this).text();
	$('.page-item').attr('page-active', pagina);
	window.location.href = '/nivel_acesso/lista/'+pagina+'/'+$('#texto_busca').val()+'/'+$("#texto-campo").val()+'/'+$("#texto-ord").val()+'/'+$("#texto-paginas").val();
});
$('.voltar-pagina').click(function(){
	var pagina = $(this).attr('page-active')-1;
	$('.page-item').attr('page-active', pagina);
	window.location.href = '/nivel_acesso/lista/'+pagina+'/'+$('#texto_busca').val()+'/'+$("#texto-campo").val()+'/'+$("#texto-ord").val()+'/'+$("#texto-paginas").val();
});
$('.proxima-pagina').click(function(){
	var pagina = $(this).attr('page-active')-1;
	$('.page-item').attr('page-active', pagina);
	window.location.href = '/nivel_acesso/lista/'+pagina+'/'+$('#texto_busca').val()+'/'+$("#texto-campo").val()+'/'+$("#texto-ord").val()+'/'+$("#texto-paginas").val();
});

// CADASTRO
function cadastrar(funcao){
	var permissoes = new Array();
	var titulo = $('#titulo_nivel_acesso').val();
	var descricao = $('#descricao_nivel_acesso').val();
	var situacao = $('#situacao_nivel_acesso').val();
	$('#permissoes input[type="checkbox"]:not(.check-todas-permissoes)').each(function(i) {
		if (!permissoes[i]) permissoes[i] = [];
		permissoes[i][0] = $(this).val();
		// 1 PARA MARCADO E 0 PARA DESMARCADO
		if($(this).prop("checked")){permissoes[i][1] = 1} else {permissoes[i][1] = 0};
	});
	if(titulo=='' || titulo==' ' || descricao=='' || descricao ==' '){
		msg_alert('warning', '&nbsp; Atenção! Preencha todos os campos!');
	} else {
		$.ajax({
			method: 'post',
			url: '../nivel_acesso/cadastrar',
			data: {	titulo: titulo, descricao: descricao, situacao: situacao, permissoes: permissoes},
			dataType: 'json',
			success: function(retorno){
				if(retorno.inseriu){
					if (funcao == "C"){
						msg_alert('success', '&nbsp; Nível de acesso cadastrado com sucesso!');
						$('input').val('');
						$('select').val('');
						$('#descricao_nivel_acesso').summernote('code', '');
						$('#situacao_nivel_acesso').val('A');
					} else {
						history.back();
					}
				} else {
					msg_alert('error', '&nbsp; Falha ao cadastrar nível de acesso!');
				}
			},
			error: function(retorno){
				msg_alert('error', '&nbsp; Erro ao cadastrar nível de acesso!');
  			}
		});
	}
}
$('#btn_salvar').click(function(){
	cadastrar();
});
// FIM CADASTRO

// EXCLUSÃO
$('#lista-niveis-acesso').on('click', '.btn-excluir', function(){
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
	$('#modal-excluir').modal('hide');	
});
// FIM EXCLUSÃO

function editar(){
	var permissoes = new Array();
	var id = $('#id_nivel_acesso').val();
	var titulo = $('#titulo_nivel_acesso').val();
	var descricao = $('#descricao_nivel_acesso').val();
	var situacao = $('#situacao_nivel_acesso').val();
	$('#permissoes input[type="checkbox"]:not(.check-todas-permissoes)').each(function(i) {
		if (!permissoes[i]) permissoes[i] = [];
		permissoes[i][0] = $(this).val();
		// 1 PARA MARCADO E 0 PARA DESMARCADO
		if($(this).prop("checked")){permissoes[i][1] = 1} else {permissoes[i][1] = 0};
	});
	if(titulo=='' || titulo==' ' || descricao=='' || descricao ==' '){
		msg_alert('warning', '&nbsp; Atenção! Preencha todos os campos!');
	} else {
		$.ajax({
			method: 'post',
			url: '../nivel_acesso/editar',
			data: {	id: id, titulo: titulo, descricao: descricao, situacao: situacao, permissoes: permissoes},
			dataType: 'json',
			success: function(retorno){
				if(retorno.editou){
					msg_alert('success', '&nbsp; Nível de acesso editado com sucesso!');
				} else {
					msg_alert('error', '&nbsp; Falha ao editar nível de acesso!');
				}
			},
			error: function(retorno){
				msg_alert('error', '&nbsp; Erro ao editar nível de acesso!');
  			}
		});
	}
}
$('#btn_editar').click(function(){
	editar();
});


function abreModal(id){
	//$("#modal-dados").html('');
	const vid = id;
	$.get('/nivel_acesso/visualiza', {id:vid}, function(data){
		dados = JSON.parse(data);
		//console.log(dados);
		console.log(dados.nivel_acesso.length);
		$("li").removeClass("text-danger");
		$("li").removeClass("text-success");

		if (dados.nivel_acesso.length > 0){
			$("#modalLabel").text('Perfil: '+dados.nivel_acesso[0].TITULO_NIVEL_ACESSO);
			$("#descricaoPerfil").text(dados.nivel_acesso[0].DESCRICAO_NIVEL_ACESSO);
			dados.nivel_acesso[0].EDITAR_CARGO == "0" ? $("#editar_cargo").attr("class", "text-danger") : $("#editar_cargo").attr("class", "text-success");
			dados.nivel_acesso[0].EDITAR_ARQUIVO == "0" ? $("#editar_arquivo").attr("class", "text-danger") : $("#editar_arquivo").attr("class", "text-success");
			dados.nivel_acesso[0].EDITAR_AVISO == "0" ? $("#editar_aviso").attr("class", "text-danger") : $("#editar_aviso").attr("class", "text-success");
			dados.nivel_acesso[0].EDITAR_COMUNICADO_INTERNO == "0" ? $("#editar_comunicado").attr("class", "text-danger") : $("#editar_comunicado").attr("class", "text-success");
			dados.nivel_acesso[0].EDITAR_DEPARTAMENTO == "0" ? $("#editar_departamento").attr("class", "text-danger") : $("#editar_departamento").attr("class", "text-success");
			dados.nivel_acesso[0].EDITAR_DICA_SAÚDE == "0" ? $("#editar_saude").attr("class", "text-danger") : $("#editar_saude").attr("class", "text-success");
			dados.nivel_acesso[0].EDITAR_EVENTO == "0" ? $("#editar_evento").attr("class", "text-danger") : $("#editar_evento").attr("class", "text-success");
			dados.nivel_acesso[0].EDITAR_FEEDBACK == "0" ? $("#editar_feedback").attr("class", "text-danger") : $("#editar_feedback").attr("class", "text-success");
			dados.nivel_acesso[0].EDITAR_LINK == "0" ? $("#editar_link").attr("class", "text-danger") : $("#editar_link").attr("class", "text-success");
			dados.nivel_acesso[0].EDITAR_MIDIA == "0" ? $("#editar_midia").attr("class", "text-danger") : $("#editar_midia").attr("class", "text-success");
			dados.nivel_acesso[0].EDITAR_NIVEL_ACESSO == "0" ? $("#editar_nivel_acesso").attr("class", "text-danger") : $("#editar_nivel_acesso").attr("class", "text-success");
			dados.nivel_acesso[0].EDITAR_RESULTADO == "0" ? $("#editar_resultado").attr("class", "text-danger") : $("#editar_resultado").attr("class", "text-success");
			dados.nivel_acesso[0].EDITAR_TIPO_ARQUIVO == "0" ? $("#editar_tipo_arquivo").attr("class", "text-danger") : $("#editar_tipo_arquivo").attr("class", "text-success");
			dados.nivel_acesso[0].EDITAR_USUARIO == "0" ? $("#editar_usuario").attr("class", "text-danger") : $("#editar_usuario").attr("class", "text-success");
			
			dados.nivel_acesso[0].EXCLUIR_CARGO == "0" ? $("#excluir_cargo").attr("class", "text-danger") : $("#excluir_cargo").attr("class", "text-success");
			dados.nivel_acesso[0].EXCLUIR_ARQUIVO == "0" ? $("#excluir_arquivo").attr("class", "text-danger") : $("#excluir_arquivo").attr("class", "text-success");
			dados.nivel_acesso[0].EXCLUIR_AVISO == "0" ? $("#excluir_aviso").attr("class", "text-danger") : $("#excluir_aviso").attr("class", "text-success");
			dados.nivel_acesso[0].EXCLUIR_COMUNICADO_INTERNO == "0" ? $("#excluir_comunicado").attr("class", "text-danger") : $("#excluir_comunicado").attr("class", "text-success");
			dados.nivel_acesso[0].EXCLUIR_DEPARTAMENTO == "0" ? $("#excluir_departamento").attr("class", "text-danger") : $("#excluir_departamento").attr("class", "text-success");
			dados.nivel_acesso[0].EXCLUIR_DICA_SAÚDE == "0" ? $("#excluir_saude").attr("class", "text-danger") : $("#excluir_saude").attr("class", "text-success");
			dados.nivel_acesso[0].EXCLUIR_EVENTO == "0" ? $("#excluir_evento").attr("class", "text-danger") : $("#excluir_evento").attr("class", "text-success");
			dados.nivel_acesso[0].EXCLUIR_FEEDBACK == "0" ? $("#excluir_feedback").attr("class", "text-danger") : $("#excluir_feedback").attr("class", "text-success");
			dados.nivel_acesso[0].EXCLUIR_LINK == "0" ? $("#excluir_link").attr("class", "text-danger") : $("#excluir_link").attr("class", "text-success");
			dados.nivel_acesso[0].EXCLUIR_MIDIA == "0" ? $("#excluir_midia").attr("class", "text-danger") : $("#excluir_midia").attr("class", "text-success");
			dados.nivel_acesso[0].EXCLUIR_NIVEL_ACESSO == "0" ? $("#excluir_nivel_acesso").attr("class", "text-danger") : $("#excluir_nivel_acesso").attr("class", "text-success");
			dados.nivel_acesso[0].EXCLUIR_RESULTADO == "0" ? $("#excluir_resultado").attr("class", "text-danger") : $("#excluir_resultado").attr("class", "text-success");
			dados.nivel_acesso[0].EXCLUIR_TIPO_ARQUIVO == "0" ? $("#excluir_tipo_arquivo").attr("class", "text-danger") : $("#excluir_tipo_arquivo").attr("class", "text-success");
			dados.nivel_acesso[0].EXCLUIR_USUARIO == "0" ? $("#excluir_usuario").attr("class", "text-danger") : $("#excluir_usuario").attr("class", "text-success");
			
			dados.nivel_acesso[0].INSERIR_CARGO == "0" ? $("#inserir_cargo").attr("class", "text-danger") : $("#inserir_cargo").attr("class", "text-success");
			dados.nivel_acesso[0].INSERIR_ARQUIVO == "0" ? $("#inserir_arquivo").attr("class", "text-danger") : $("#inserir_arquivo").attr("class", "text-success");
			dados.nivel_acesso[0].INSERIR_AVISO == "0" ? $("#inserir_aviso").attr("class", "text-danger") : $("#inserir_aviso").attr("class", "text-success");
			dados.nivel_acesso[0].INSERIR_COMUNICADO_INTERNO == "0" ? $("#inserir_comunicado").attr("class", "text-danger") : $("#inserir_comunicado").attr("class", "text-success");
			dados.nivel_acesso[0].INSERIR_DEPARTAMENTO == "0" ? $("#inserir_departamento").attr("class", "text-danger") : $("#inserir_departamento").attr("class", "text-success");
			dados.nivel_acesso[0].INSERIR_DICA_SAÚDE == "0" ? $("#inserir_saude").attr("class", "text-danger") : $("#inserir_saude").attr("class", "text-success");
			dados.nivel_acesso[0].INSERIR_EVENTO == "0" ? $("#inserir_evento").attr("class", "text-danger") : $("#inserir_evento").attr("class", "text-success");
			dados.nivel_acesso[0].INSERIR_FEEDBACK == "0" ? $("#inserir_feedback").attr("class", "text-danger") : $("#inserir_feedback").attr("class", "text-success");
			dados.nivel_acesso[0].INSERIR_LINK == "0" ? $("#inserir_link").attr("class", "text-danger") : $("#inserir_link").attr("class", "text-success");
			dados.nivel_acesso[0].INSERIR_MIDIA == "0" ? $("#inserir_midia").attr("class", "text-danger") : $("#inserir_midia").attr("class", "text-success");
			dados.nivel_acesso[0].INSERIR_NIVEL_ACESSO == "0" ? $("#inserir_nivel_acesso").attr("class", "text-danger") : $("#inserir_nivel_acesso").attr("class", "text-success");
			dados.nivel_acesso[0].INSERIR_RESULTADO == "0" ? $("#inserir_resultado").attr("class", "text-danger") : $("#inserir_resultado").attr("class", "text-success");
			dados.nivel_acesso[0].INSERIR_TIPO_ARQUIVO == "0" ? $("#inserir_tipo_arquivo").attr("class", "text-danger") : $("#inserir_tipo_arquivo").attr("class", "text-success");
			dados.nivel_acesso[0].INSERIR_USUARIO == "0" ? $("#inserir_usuario").attr("class", "text-danger") : $("#inserir_usuario").attr("class", "text-success");

			dados.nivel_acesso[0].VISUALIZAR_CARGO == "0" ? $("#visualizar_cargo").attr("class", "text-danger") : $("#visualizar_cargo").attr("class", "text-success");
			dados.nivel_acesso[0].VISUALIZAR_ARQUIVO == "0" ? $("#visualizar_arquivo").attr("class", "text-danger") : $("#visualizar_arquivo").attr("class", "text-success");
			dados.nivel_acesso[0].VISUALIZAR_AVISO == "0" ? $("#visualizar_aviso").attr("class", "text-danger") : $("#visualizar_aviso").attr("class", "text-success");
			dados.nivel_acesso[0].VISUALIZAR_COMUNICADO_INTERNO == "0" ? $("#visualizar_comunicado").attr("class", "text-danger") : $("#visualizar_comunicado").attr("class", "text-success");
			dados.nivel_acesso[0].VISUALIZAR_DEPARTAMENTO == "0" ? $("#visualizar_departamento").attr("class", "text-danger") : $("#visualizar_departamento").attr("class", "text-success");
			dados.nivel_acesso[0].VISUALIZAR_DICA_SAÚDE == "0" ? $("#visualizar_saude").attr("class", "text-danger") : $("#visualizar_saude").attr("class", "text-success");
			dados.nivel_acesso[0].VISUALIZAR_EVENTO == "0" ? $("#visualizar_evento").attr("class", "text-danger") : $("#visualizar_evento").attr("class", "text-success");
			dados.nivel_acesso[0].VISUALIZAR_FEEDBACK == "0" ? $("#visualizar_feedback").attr("class", "text-danger") : $("#visualizar_feedback").attr("class", "text-success");
			dados.nivel_acesso[0].VISUALIZAR_LINK == "0" ? $("#visualizar_link").attr("class", "text-danger") : $("#visualizar_link").attr("class", "text-success");
			dados.nivel_acesso[0].VISUALIZAR_MIDIA == "0" ? $("#visualizar_midia").attr("class", "text-danger") : $("#visualizar_midia").attr("class", "text-success");
			dados.nivel_acesso[0].VISUALIZAR_NIVEL_ACESSO == "0" ? $("#visualizar_nivel_acesso").attr("class", "text-danger") : $("#visualizar_nivel_acesso").attr("class", "text-success");
			dados.nivel_acesso[0].VISUALIZAR_RESULTADO == "0" ? $("#visualizar_resultado").attr("class", "text-danger") : $("#visualizar_resultado").attr("class", "text-success");
			dados.nivel_acesso[0].VISUALIZAR_TIPO_ARQUIVO == "0" ? $("#visualizar_tipo_arquivo").attr("class", "text-danger") : $("#visualizar_tipo_arquivo").attr("class", "text-success");
			dados.nivel_acesso[0].VISUALIZAR_USUARIO == "0" ? $("#visualizar_usuario").attr("class", "text-danger") : $("#visualizar_usuario").attr("class", "text-success");		
		}
	});
	$('#modalDados').modal('show');

}

// FIM EDIÇÃO

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
	}	window.location.href = '/nivel_acesso/lista/1/'+$('#texto_busca').val()+'/'+vCamponovo+'/'+ord+'/'+registros;
}
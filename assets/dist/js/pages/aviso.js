$(function () {
    // Summernote
    $('#descricao_aviso').summernote();
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
	window.location.href = '/aviso/lista/1/'+$('#texto_busca').val()+'/'+$("#texto-campo").val()+'/'+$("#texto-ord").val()+'/'+$("#select_paginas").val();
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
	var titulo = $('#titulo_aviso').val();
	var descricao = $('#descricao_aviso').val();
	var departamento = $('#departamento_aviso').val();
	var situacao = $('#situacao_aviso').val();
	if(titulo=='' || titulo==' ' || descricao=='' || descricao ==' '){
		msg_alert('warning', '&nbsp; Atenção! Preencha todos os campos!');
	} else {
		$.ajax({
			method: 'post',
			url: '../aviso/cadastrar',
			data: {	titulo: titulo, descricao: descricao, departamento: departamento, situacao: situacao},
			dataType: 'json',
			success: function(retorno){
				if (funcao == "C") {
					if(retorno.inseriu){
						msg_alert('success', '&nbsp; Aviso cadastrado com sucesso!');
						$('input').val('');
						$('select').val('');
						$('#descricao_aviso').summernote('code', '');
						$('#situacao_aviso').val('A');
					} else {
						msg_alert('error', '&nbsp; Falha ao cadastrar aviso!');
					}
				} else {
					if(retorno.inseriu){
						history.back();
					} else {
						msg_alert('error', '&nbsp; Falha ao cadastrar aviso!');
					}

				}
			},
			error: function(retorno){
				msg_alert('error', '&nbsp; Erro ao cadastrar aviso!');
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
$('#lista-avisos').on('click', '.btn-excluir', function(){
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
	$('#modal-excluir-aviso').modal('hide');	
});
// FIM EXCLUSÃO

function editar(funcao){
	var id = $('#id_aviso').val();
	var titulo = $('#titulo_aviso').val();
	var descricao = $('#descricao_aviso').val();
	var departamento = $('#departamento_aviso').val();
	var situacao = $('#situacao_aviso').val();
	if(titulo=='' || titulo==' ' || descricao=='' || descricao ==' '){
		msg_alert('warning', '&nbsp; Atenção! Preencha todos os campos!');
	} else {
		$.ajax({
			method: 'post',
			url: '../aviso/editar',
			data: {	id: id, titulo: titulo, descricao: descricao, departamento: departamento, situacao: situacao},
			dataType: 'json',
			success: function(retorno){
				if(retorno.editou){
					if (funcao == "C"){
						msg_alert('success', '&nbsp; Aviso editado com sucesso!');
					} else {
						history.back();
					}
				} else {
					msg_alert('error', '&nbsp; Falha ao editar aviso!');
				}
			},
			error: function(retorno){
				msg_alert('error', '&nbsp; Erro ao editar aviso!');
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
	}	window.location.href = '/aviso/lista/1/'+$('#texto_busca').val()+'/'+vCamponovo+'/'+ord+'/'+registros;
}
// FIM EDIÇÃO

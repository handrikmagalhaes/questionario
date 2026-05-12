$(function () {
    // Summernote
    $('#descricao_resultado').summernote();
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
	window.location.href = '/resultado/lista/1/'+$('#texto_busca').val()+'/'+$("#texto-campo").val()+'/'+$("#texto-ord").val()+'/'+$("#select_paginas").val();
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

// ITENS DO RESULTADO
$('#add_item_resultado').click(function () {
	var id = $(this).attr('data-id-edicao');
	if($(this).text() == 'Adicionar'){
		cadastrar_item_resultado();
	} else {
		editar_item_resultado(id);
		$(this).data('id-edicao', '');
		$(this).text('Adicionar');
	}
});

function cadastrar_item_resultado(){
	var meses = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
	var periodo, periodo_temp, mes, label_periodo, periodo_final, periodo_temp_final, mes_final, label_periodo_final, contador_inicial, contador_final;
	periodo = $('#periodo_resultado').val();
	periodo_temp = periodo.split('-');
	mes = parseInt(periodo_temp[1])-1;
	label_periodo = meses[mes]+'/'+periodo_temp[0];
	periodo_final = $('#periodo_resultado_final').val();
	if (periodo_final == ''){
		periodo_final = periodo;
	}
	periodo_temp_final = periodo_final.split('-');
	mes_final = parseInt(periodo_temp_final[1])-1;
	label_periodo_final = meses[mes_final]+'/'+periodo_temp[0];
	var meta = $('#meta_resultado').val() != '' ? $('#meta_resultado').val() : 0;
	var realizado = $('#realizado_resultado').val() != '' ? $('#realizado_resultado').val() : 0;
	for (i=mes; i<=mes_final; i++){
		mes = i + 1
		label_periodo = meses[i]+'/'+periodo_temp[0];
		var btns = '<td>' +
					'<button type="button" class="btn btn-sm btn-outline-danger btn-excluir-item-resultado border-0 pt-0 pb-0" data-toggle="tooltip" data-placement="top" title="Excluir" data-original-title="Excluir"><i class="fas fa-trash"></i></button>' +
				'</td>';
		if(periodo != '' && meta >=0 && realizado >=0){
			var item = '<tr class="item_resultado"><td data-periodo="'+periodo_temp[0]+'-'+mes+'" class="campo periodo_item">'+label_periodo+'</td><td class="campo meta_item">'+meta+'</td><td class="campo realizado_item">'+realizado+'</td>'+btns+'</tr>';
			$('#tb_itens_resultado tbody').append(item);
			$('#periodo_resultado').val('');
			$('#periodo_resultado_final').val('');
			$('#meta_resultado').val('');
			$('#realizado_resultado').val('');
		}
	}
	
}

function editar_item_resultado(id){
	var meses = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
	var periodo, periodo_temp, mes, label_periodo, meta, realizado;

	periodo = $('#periodo_resultado').val();
	periodo_temp = periodo.split('-');
	mes = parseInt(periodo_temp[1])-1;
	label_periodo = meses[mes]+'/'+periodo_temp[0];
	meta = $('#meta_resultado').val() != '' ? $('#meta_resultado').val() : 0;
	realizado = $('#realizado_resultado').val() != '' ? $('#realizado_resultado').val() : 0;

	if(periodo != '' && meta >=0 && realizado >=0) {
		linha = $('#tb_itens_resultado').find('tr[data-id="' + id + '"]');
		linha.addClass('item_resultado');
		linha.find('td.periodo-resultado').data('periodo', periodo);
		linha.find('td.periodo-resultado').text(label_periodo);
		linha.find('td.periodo-resultado').addClass('campo periodo_item');
		linha.find('td.periodo-resultado').removeClass('periodo-resultado');
		linha.find('td.meta-resultado').text(meta);
		linha.find('td.meta-resultado').addClass('campo meta_item');
		linha.find('td.meta-resultado').removeClass('meta-resultado');
		linha.find('td.realizado-resultado').text(realizado);
		linha.find('td.realizado-resultado').addClass('campo realizado_item');
		linha.find('td.realizado-resultado').removeClass('realizado-resultado');
		$('#periodo_resultado').val('');
		$('#meta_resultado').val('');
		$('#realizado_resultado').val('');
	}
}

$('#tb_itens_resultado').on('click', '.btn-excluir-item-resultado', function () {
	$(this).parents('tr').hide();
	$(this).parents('tr').removeClass('item_resultado');
	$(this).parents('tr').addClass('remover');
});

// EDIÇÃO
$('#tb_itens_resultado').on('click', '.btn-editar-item-resultado', function () {
	id = $(this).parents('tr').data('id');
	periodo = $(this).parents('tr').find('.periodo-resultado').data('periodo');
	meta = $(this).parents('tr').find('.meta-resultado').text();
	realizado = $(this).parents('tr').find('.realizado-resultado').text();
	$('#periodo_resultado').val(periodo);
	$('#meta_resultado').val(meta);
	$('#realizado_resultado').val(realizado);
	$('#add_item_resultado').text('Alterar');
	$('#add_item_resultado').attr('data-id-edicao', id);
	$("#periodo_resultado_final").prop("disabled", true);
});

// CADASTRO
function cadastrar(funcao){
	var titulo = $('#titulo_resultado').val();
	var cor_grafico = $('#cor_grafico_resultado').val();
	var descricao = $('#descricao_resultado').val();
	var periodo = $('#periodo_resultado').val();
	var meta = $('#meta_resultado').val();
	var realizado = $('#realizado_resultado').val();
	var situacao = $('#situacao_resultado').val();

	var itens_resultado = [null];
	$('#tb_itens_resultado tr.item_resultado').each(function(index, element){
		var periodo = $(this).find('td.periodo_item').data('periodo');
		var meta = $(this).find('td.meta_item').html();
		var realizado = $(this).find('td.realizado_item').html();
		var campos = [periodo, meta, realizado];
		itens_resultado.push(campos);
	});

	if(titulo=='' || titulo==' '){
		msg_alert('warning', '&nbsp; Atenção! Preencha todos os campos!');
	} else {
		$.ajax({
			method: 'post',
			url: '/resultado/cadastrar',
			data: {	titulo: titulo, cor_grafico: cor_grafico, descricao: descricao, situacao: situacao, itens_resultado: itens_resultado },
			dataType: 'json',
			success: function(retorno){
				if(retorno.inseriu){
					if (funcao == "C"){
						msg_alert('success', '&nbsp; Resultado cadastrado com sucesso!');
						$('#id_resultado').val(retorno.id_resultado);
						$('input').val('');
						$('select').val('');
						$('#descricao_resultado').summernote('code', '');
						$('#situacao_resultado').val('A');
					} else {
						history.back();
					}
				} else {
					msg_alert('error', '&nbsp; Falha ao cadastrar resultado!');
				}
			},
			error: function(retorno){
				msg_alert('error', '&nbsp; Erro ao cadastrar resultado!');
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
$('#lista-resultados').on('click', '.btn-excluir', function(){
	var id = $(this).attr('data-id');
	$('#btn-excluir').attr('data-id', id);
	$('#modal-excluir').modal('show');
});

$('#btn-excluir').click(function(){
	var id = $(this).attr('data-id');
	$.ajax({
		method: 'post',
		url: '/resultado/excluir',
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
	$('#modal-excluir-resultado').modal('hide');
});
// FIM EXCLUSÃO

function editar(funcao){
	var id = $('#id_resultado').val();
	var titulo = $('#titulo_resultado').val();
	var cor_grafico = $('#cor_grafico_resultado').val();
	var descricao = $('#descricao_resultado').val();
	var periodo = $('#periodo_resultado').val();
	var meta = $('#meta_resultado').val();
	var realizado = $('#realizado_resultado').val();
	var situacao = $('#situacao_resultado').val();

	var itens_resultado = [null];
	$('#tb_itens_resultado tr.item_resultado').each(function(index, element){
		var id = $(this).data('id');
		var periodo = $(this).find('td.periodo_item').data('periodo');
		var meta = $(this).find('td.meta_item').html();
		var realizado = $(this).find('td.realizado_item').html();
		var campos = [periodo, meta, realizado, id];
		itens_resultado.push(campos);
	});

	var excluir_itens_resultado = [null];
	$('#tb_itens_resultado tr.remover').each(function(index, element){
		var id = $(this).data(id);
		if(id != ''){
			excluir_itens_resultado.push(id);
		}
	});

	if(titulo=='' || titulo==' '){
		msg_alert('warning', '&nbsp; Atenção! Preencha todos os campos!');
	} else {
		$.ajax({
			method: 'post',
			url: '../resultado/editar',
			data: {	id: id, titulo: titulo, cor_grafico: cor_grafico, descricao: descricao, situacao: situacao, itens_resultado: itens_resultado, excluir_itens_resultado: excluir_itens_resultado},
			dataType: 'json',
			success: function(retorno){
				if(retorno.editou){
					if (funcao == "C"){
						msg_alert('success', '&nbsp; Resultado editado com sucesso!');
					} else {
						history.back();
					}
				} else {
					msg_alert('error', '&nbsp; Falha ao editar resultado!');
				}
			},
			error: function(retorno){
				msg_alert('error', '&nbsp; Erro ao editar resultado!');
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
	}
	window.location.href = '/usuario/lista/1/'+$('#texto_busca').val()+'/'+vCamponovo+'/'+ord+'/'+registros;
}
// FIM EDIÇÃO


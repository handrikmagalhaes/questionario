$190(document).ready(function(){
	// GALERIA
	$190('.lightbox').lightbox();
});

$(function () {
    // Summernote
    $('#descricao_evento').summernote();
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
	window.location.href = '/evento/lista/1/'+$('#texto_busca').val()+'/'+$("#texto-campo").val()+'/'+$("#texto-ord").val()+'/'+$("#select_paginas").val();
}

$('#buscar').click(function(){
	window.location.href = '/evento/lista/1/'+$('#texto_busca').val()+'/';
});
$('.numero-pagina').click(function(){
	var pagina = $(this).text();
	$('.page-item').attr('page-active', pagina);
	window.location.href = '/evento/lista/'+pagina+'/'+$('#texto_busca').val()+'/';
});
$('.voltar-pagina').click(function(){
	var pagina = $(this).attr('page-active')-1;
	$('.page-item').attr('page-active', pagina);
	window.location.href = '/evento/lista/'+pagina+'/'+$('#texto_busca').val()+'/';
});
$('.proxima-pagina').click(function(){
	var pagina = $(this).attr('page-active')-1;
	$('.page-item').attr('page-active', pagina);
	window.location.href = '/evento/lista/'+pagina+'/'+$('#texto_busca').val()+'/';
});

// GALERIA
function listar_midias_galeria_evento(id_evento){
	$.ajax({
		method: 'post',
		url: '../midia/listar_midias_galeria_evento',
		data: {id_evento: id_evento},
		dataType: 'json',
		success: function(retorno){
			$('div#galeria-midia-evento').html(retorno.lista_midias);
		}
	});
}
$('#btn-add-imagem-galeria').click(function(){
	var itens = 15;
	var qtd_midias = 10;
	$.ajax({
		method: 'post',
		url: '../midia/qtd_midias',
		data: {},
		dataType: 'json',
		success: function(retorno){
			// listar_midias_galeria(1, itens);
			qtd_paginas = Math.ceil(retorno.qtd_midias/itens);
			var obj = $('#pagination-galeria').twbsPagination({
				totalPages: qtd_paginas,
				visiblePages: 3,
				first: '<<',
				prev: '<',
				next: '>',
				last: '>>',
				onPageClick: function (event, page) {
					indice = page-1;
					listar_midias_galeria(indice, itens);
				}
			});
		}
	});
});
function listar_midias_galeria(indice, itens){
	$.ajax({
		method: 'post',
		url: '../midia/listar_midias_multipla_selecao',
		data: {indice: indice, itens: itens},
		dataType: 'json',
		success: function(retorno){
			$('div#galeria-evento').html(retorno.lista_midias);
			$('div#galeria-evento > .item-galeria').each(function(index, element) {
				img = $(this).find('img').attr('src');
				$(this).find('img').attr('src', '../'+img);
				$(this).find('a').attr('href', '../'+img);
			});
		}
	});
}
$('#galeria-evento').on('click', '.btn-selecionar-midia-galeria', function(){
	var id_midia = $(this).attr('data-id-midia');
	var caminho_arquivo = $(this).attr('data-arquivo-midia');
	var nome_arquivo = $(this).attr('data-nome-arquivo');
	$('#galeria-evento-midias-selecionadas').append('<div class="item-galeria position-relative" data-id-midia="'+id_midia+'"><div class="btns position-absolute"><a href="..'+caminho_arquivo+'" class="btn btn-sm btn-primary rounded-0 lightbox" rel="galeria" title="'+nome_arquivo+'"><i class="fa fa-eye"></i></a><button class="btn btn-sm btn-danger rounded-0 btn-remover-midia-galeria"><i class="fa fa-trash"></i></button></div><img src="..'+caminho_arquivo+'" alt="'+nome_arquivo+'"></div>');
	Swal.fire({
		position: 'center',
		icon: 'success',
		title: 'Imagem inserida!',
		showConfirmButton: false,
		timer: 1500
	});
});
$('#galeria-evento-midias-selecionadas').on('click', '.btn-remover-midia-galeria', function(){
	$(this).parents('div.item-galeria').remove();
});
$('#btn-escolher-arquivo-galeria').click(function(){
	$('#campo_midia_galeria').click();
});
$('#campo_midia_galeria').change(function(){
	$('#formMidiaGaleria').submit();
});
// ENVIAR IMAGENS
$('#formMidiaGaleria').submit(function(e) {
	e.preventDefault();
	// $('#modal-loading').modal('show');
	$.ajax({
		method: 'post',
		url: "../midia/upload_arquivo", // Url to which the request is send
		data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
		dataType: 'json',
		contentType: false,       // The content type used when sending data to the server.
		cache: false,             // To unable request pages to be cached
		processData:false,        // To send DOMDocument or non processed data file it is set to false
		success: function(retorno)   // A function to be called if request succeeds
		{
			for (i=0; i<retorno.qtd_imagens; i++) {
				if(retorno[i].enviou){
					// $('#modal-loading').modal('hide');
					id_midia = retorno[i].id_midia;
					nome_arquivo = retorno[i].filename;
					caminho_arquivo = retorno[i].caminho_arquivo;
					$('#galeria-evento-midias-selecionadas').append('<div class="item-galeria position-relative" data-id-midia="'+id_midia+'"><div class="btns position-absolute"><a href=".'+caminho_arquivo+'" class="btn btn-sm btn-primary rounded-0 lightbox" rel="galeria" title="'+nome_arquivo+'"><i class="fa fa-eye"></i></a><button class="btn btn-sm btn-danger rounded-0 btn-remover-midia-galeria"><i class="fa fa-trash"></i></button></div><img src=".'+caminho_arquivo+'" alt="'+nome_arquivo+'"></div>');
					$('#modal-midia-galeria').modal('hide');
				}
			}
		},
		error: function(retorno){
			alert('Erro');
		}
	});
});

// MÍDIAS
$('#btn-escolher-arquivo').click(function(){
	$('#campo_midia').click();
});
$('#campo_midia').change(function(){
	$('#formMidia').submit();
});
// ENVIAR IMAGENS
$('#formMidia').submit(function(e) {
	e.preventDefault();
	// $('#modal-loading').modal('show');
	$.ajax({
		method: 'post',
		url: "../midia/upload_arquivo_unico", // Url to which the request is send
		data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
		dataType: 'json',
		contentType: false,       // The content type used when sending data to the server.
		cache: false,             // To unable request pages to be cached
		processData:false,        // To send DOMDocument or non processed data file it is set to false
		success: function(retorno)   // A function to be called if request succeeds
		{
			if(retorno.enviou){
				$('#campo_imagem').attr('data-id', retorno.id_midia);
				$('#campo_imagem').attr('title', retorno.filename);
				$('#campo_imagem').attr('src', '../.'+retorno.caminho_arquivo);
				$('#btn-excluir-imagem-destacada').attr('data-id', retorno.id_midia);
				$('#modal-midia').modal('hide');
				// $('#modal-loading').modal('hide');
			}
		},
		error: function(retorno){
			alert('Erro');
		}
	});
});
$('#galeria').on('click', '.btn-selecionar', function(){
	var id_midia = $(this).attr('data-id-midia');
	var caminho_arquivo = $(this).attr('data-arquivo-midia');
	var nome_arquivo = $(this).attr('data-nome-arquivo');
	$('#campo_imagem').attr('data-id', id_midia);
	$('#campo_imagem').attr('title', nome_arquivo);
	$('#campo_imagem').attr('src', '../..'+caminho_arquivo);
	$('#btn-excluir-imagem-destacada').attr('data-id', id_midia);
	$('#modal-midia').modal('hide');
});

// PEGA TODAS AS FOTOS DA GALERIA
function agrupar_midias_galeria(){
	var midias_galeria = new Array();
	$('div#galeria-evento-midias-selecionadas > .item-galeria').each(function(index, element) {
		id_midia = $(this).attr('data-id-midia');
		midias_galeria[index] = id_midia;
	});
	return midias_galeria;
}

// CADASTRO
function cadastrar(funcao){
	var midias_galeria = agrupar_midias_galeria();
	if(midias_galeria.length == 0){
		midias_galeria[1] = '';
	}
	var titulo = $('#titulo_evento').val();
	var data = $('#dt_evento').val();
	var descricao = $('#descricao_evento').val();
	var situacao = $('#situacao_evento').val();
	if(titulo=='' || titulo==' ' || data=='' || data==' ' || descricao=='' || descricao ==' '){
		msg_alert('warning', '&nbsp; Atenção! Preencha todos os campos!');
	} else {
		$.ajax({
			method: 'post',
			url: '../evento/cadastrar',
			data: {	titulo: titulo, data: data, descricao: descricao, situacao: situacao, midias_galeria: midias_galeria},
			dataType: 'json',
			success: function(retorno){
				if(retorno.inseriu){
					if (funcao =="C"){
						msg_alert('success', '&nbsp; Evento cadastrado com sucesso!');
						$('#galeria-evento-midias-selecionadas').html('');
						$('input').val('');
						$('select').val('');
						$('#descricao_evento').summernote('code', '');
						$('#situacao_evento').val('A');
					} else {
						history.back();
					}
				} else {
					msg_alert('error', '&nbsp; Falha ao cadastrar evento!');
				}
			},
			error: function(retorno){
				msg_alert('error', '&nbsp; Erro ao cadastrar evento!');
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
$('#lista-eventos').on('click', '.btn-excluir', function(){
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
	$('#modal-excluir-evento').modal('hide');
});
// FIM EXCLUSÃO

function editar(funcao){
	var midias_galeria = agrupar_midias_galeria();
	if(midias_galeria.length == 0){
		midias_galeria[1] = '';
	}
	var id = $('#id_evento').val();
	var titulo = $('#titulo_evento').val();
	var data = $('#dt_evento').val();
	var descricao = $('#descricao_evento').val();
	var situacao = $('#situacao_evento').val();
	if(titulo=='' || titulo==' ' || data=='' || data==' ' || descricao=='' || descricao ==' '){
		msg_alert('warning', '&nbsp; Atenção! Preencha todos os campos!');
	} else {
		$.ajax({
			method: 'post',
			url: '../evento/editar',
			data: {	id: id, titulo: titulo, data: data, descricao: descricao, situacao: situacao, midias_galeria: midias_galeria},
			dataType: 'json',
			success: function(retorno){
				if(retorno.editou){
					if (funcao == "C"){
						msg_alert('success', '&nbsp; Evento editado com sucesso!');
					} else if (funcao=="V"){
						history.back();
					}
				} else {
					msg_alert('error', '&nbsp; Falha ao editar evento!');
				}
			},
			error: function(retorno){
				msg_alert('error', '&nbsp; Erro ao editar evento!');
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
	$.get('/evento/visualiza', {id:vid}, function(data){
		dados = JSON.parse(data);
		console.log(dados);
		var rootURL = location.hostname;

		if (dados.evento.length > 0){
			$("#modalLabel").text(dados.evento[0].TITULO_EVENTO);
			$("#descricaoEvento").html(dados.evento[0].DESCRICAO_EVENTO);
			$("#dataEvento").text(dados.evento[0].DT_EVENTO);
			if (dados.evento[0].IND_SITUACAO_EVENTO = 'A'){
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
	}	window.location.href = '/evento/lista/1/'+$('#texto_busca').val()+'/'+vCamponovo+'/'+ord+'/'+registros;
}


//Inicialização da página
$(function(){
	carregaArquivos('');
	$(".card").each(function(index){
		if ($(this).find(".card-body").is(":empty")){
			$(this).hide();
		}
	});

	$("#descricao_arquivo").summernote();

});

// BLOCO DE EVENTOS
$('#btn_salvar_continuar').click(function(){
	cadastrar_continuar();
});

$('#btn_salvar_voltar').click(function(){
	cadastrar_voltar();
});

$('#buscar').click(function(){
	carregaArquivos($("#texto_busca").val());
});

$('.numero-pagina').click(function(){
	var pagina = $(this).text();
	$('.page-item').attr('page-active', pagina);
	window.location.href = '/arquivo/lista/'+pagina+'/'+$('#texto_busca').val()+'/'+$("#texto-campo").val()+'/'+$("#texto-ord").val()+'/'+$("#texto-paginas").val();
});

$('.voltar-pagina').click(function(){
	var pagina = $(this).attr('page-active')-1;
	$('.page-item').attr('page-active', pagina);
	window.location.href = '/arquivo/lista/'+pagina+'/'+$('#texto_busca').val()+'/'+$("#texto-campo").val()+'/'+$("#texto-ord").val()+'/'+$("#texto-paginas").val();
});

$('.proxima-pagina').click(function(){
	var pagina = $(this).attr('page-active')-1;
	$('.page-item').attr('page-active', pagina);
	window.location.href = '/arquivo/lista/'+pagina+'/'+$('#texto_busca').val()+'/'+$("#texto-campo").val()+'/'+$("#texto-ord").val()+'/'+$("#texto-paginas").val();
});

$('#lista-arquivos').on('click', '.btn-excluir', function(){
	var id = $(this).attr('data-id');
	$('#btn-excluir').attr('data-id', id);
	$('#modal-excluir').modal('show');
});

$('#btn-excluir').click(function(){
	var id = $(this).attr('data-id');
	$.ajax({
		method: 'post',
		url: '/arquivo/excluir',
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
	$('#modal-excluir-arquivo').modal('hide');	
});


$('#btn_editar_continuar').click(function(){
	editar_continuar();
});

$('#btn_editar_voltar').click(function(){
	editar_voltar();
});

$('#tipo_arquivo').change(function(){
	if($(this).val() != ''){
		$('#arquivo').removeAttr('disabled');
	} else {
		$('#arquivo').attr('disabled', 'disabled');
	}
});
$('#arquivo').change(function(){
	$('#formArquivo').submit();
});

// ENVIAR IMAGENS
$('#formArquivo').submit(function(e) {
	e.preventDefault();
	// $('#modal-loading').modal('show');
	$.ajax({
		method: 'post',
		url: "../arquivo/upload", // Url to which the request is send
		data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
		dataType: 'json',
		contentType: false,       // The content type used when sending data to the server.
		cache: false,             // To unable request pages to be cached
		processData:false,        // To send DOMDocument or non processed data file it is set to false
		success: function(retorno)   // A function to be called if request succeeds
		{
			if(retorno.enviou){
				$('#label-arquivo').text(retorno.filename);
				$('#nome_arquivo').val(retorno.filename);
				$('#caminho_arquivo').val(retorno.caminho_arquivo);
				// $('#modal-loading').modal('hide');
			} else {
				alert('Falha');
			}
		},
		error: function(retorno){
			alert('Erro');
		}
	});
});


//BLOCO DE FUNCTIONS

//Função para carregar a lista de arquivos do setor em ordem.
function carregaArquivos(busca){
	const vBusca = busca;
	// Monta a estrutura de lista
	$.get($("#url_base").text()+'/arquivo/retorna_setores/', function(data){
		if (data.length > 0){
			dados = JSON.parse(data);
			console.log(dados);
			$("#principal").html('');
			$("#cardPublico").html('');
			for (var i = 0; i < dados.length; i++){
				if (i == 0){
					$("#principal").html('<div class="card" style="min-width: 850px;"><div class="card-header"><div class="row"><h4 class="col text-left">'+dados[i].tituloDepartamento+'</h4><a class="text-decoration-none" data-toggle="collapse" href="#card'+dados[i].id+'"><i class="col-md-1 text-right fas fa-chevron-down"></i></a></div><div class="card-body collapse" id="card'+dados[i].id+'"></div>');
				} else {
					$("#card"+dados[i].idChefia).append('<div class="card"><div class="card-header"><div class="row"><h4 class="col text-left">'+dados[i].tituloDepartamento+'</h4><a class="text-decoration-none" data-toggle="collapse" href="#card'+dados[i].id+'"><i class="col text-right fas fa-chevron-down"></i></a></div><div class="card-body collapse" id="card'+dados[i].id+'"></div>');
				}

			}
		} else {
			console.log("Vazio");
		}
	});

	// Coloca os arquivos na estrutura
	$.get($("#url_base").text()+'arquivo/lista_arquivos_geral', {busca:vBusca}, function(data){
		if (data.length > 0){
			dados = JSON.parse(data);
			//console.log(dados);
			for (var i = 0; i < dados.length; i++){
				//var conteudo = $("#lista"+dados[i].ID_DEPARTAMENTO).html()
				if (dados[i].ID_DEPARTAMENTO >= 0){
					$("#card"+dados[i].ID_DEPARTAMENTO).prepend("<p class='card-text text-bold' style='cursor: pointer;' onclick='abreModal("+dados[i].ID_ARQUIVO+")'>"+dados[i].ORDEM_ARQUIVO+". "+dados[i].TITULO_ARQUIVO+"</p>");
				} else {
					$("#cardPublico").prepend("<p class='card-text text-bold' style='cursor: pointer;' onclick='abreModal("+dados[i].ID_ARQUIVO+")'>"+dados[i].ORDEM_ARQUIVO+". "+dados[i].TITULO_ARQUIVO+"</p>");
				}
			}
		} else {
			console.log("Vazio");
		}
	});


}

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
	window.location.href = '/arquivo/lista/1/'+$('#texto_busca').val()+'/'+$("#texto-campo").val()+'/'+$("#texto-ord").val()+'/'+$("#select_paginas").val();
}

// CADASTRO
function cadastrar_continuar(){
	var titulo = $('#titulo_arquivo').val();
	var descricao = $('#descricao_arquivo').val();
	var tipo = $('#tipo_arquivo').val();
	var departamento = $('#departamento_arquivo').val();
	var nome = $('#nome_arquivo').val();
	var link = $('#link_arquivo').val();
	var caminho = $('#caminho_arquivo').val();
	var situacao = $('#situacao_arquivo').val();
	var ordem = $("#ordem_arquivo").val()
	if(titulo=='' || titulo==' ' || descricao=='' || descricao ==' ' || ordem ==''){
		msg_alert('warning', '&nbsp; Atenção! Preencha todos os campos!');
	} else {
		$.ajax({
			method: 'post',
			url: '../arquivo/cadastrar',
			data: {	titulo: titulo, descricao: descricao, tipo: tipo, departamento: departamento, nome: nome, link: link, caminho: caminho, situacao: situacao, ordem: ordem},
			dataType: 'json',
			success: function(retorno){
				if(retorno.inseriu){
					msg_alert('success', '&nbsp; Arquivo cadastrado com sucesso!');
					$('input').val('');
					$('select').val('');
					$('#descricao_arquivo').summernote('code', '');
					$('#situacao_arquivo').val('A');
				} else {
					msg_alert('error', '&nbsp; Falha ao cadastrar arquivo!');
				}
			},
			error: function(retorno){
				msg_alert('error', '&nbsp; Erro ao cadastrar arquivo!');
  			}
		});
	}
}

function cadastrar_voltar(){
	var titulo = $('#titulo_arquivo').val();
	var descricao = $('#descricao_arquivo').val();
	var tipo = $('#tipo_arquivo').val();
	var departamento = $('#departamento_arquivo').val();
	var nome = $('#nome_arquivo').val();
	var link = $('#link_arquivo').val();
	var caminho = $('#caminho_arquivo').val();
	var situacao = $('#situacao_arquivo').val();
	var ordem = $("#ordem_arquivo").val();
	if(titulo=='' || titulo==' ' || descricao=='' || descricao ==' ' || ordem == ''){
		msg_alert('warning', '&nbsp; Atenção! Preencha todos os campos!');
	} else {
		$.ajax({
			method: 'post',
			url: '../arquivo/cadastrar',
			data: {	titulo: titulo, descricao: descricao, tipo: tipo, departamento: departamento, nome: nome, link: link, caminho: caminho, situacao: situacao, ordem: ordem},
			dataType: 'json',
			success: function(retorno){
				if(retorno.inseriu){
					msg_alert('success', '&nbsp; Arquivo cadastrado com sucesso!');
					$(this).delay(3000, function(){
						history.back();
					});
				} else {
					msg_alert('error', '&nbsp; Falha ao cadastrar arquivo!');
				}
			},
			error: function(retorno){
				msg_alert('error', '&nbsp; Erro ao cadastrar arquivo!');
  			}
		});
	}
}

// FIM CADASTRO

function editar_continuar(){
	var id = $('#id_arquivo').val();
	var titulo = $('#titulo_arquivo').val();
	var descricao = $('#descricao_arquivo').val();
	var tipo = $('#tipo_arquivo').val();
	var departamento = $('#departamento_arquivo').val();
	var nome = $('#nome_arquivo').val();
	var link = $('#link_arquivo').val();
	var caminho = $('#caminho_arquivo').val();
	var situacao = $('#situacao_arquivo').val();
	var ordem = $('#ordem_arquivo').val();
	//console.log("Teste"+ordem);
	if(titulo=='' || titulo==' ' || descricao=='' || descricao ==' '){
		msg_alert('warning', '&nbsp; Atenção! Preencha todos os campos!');
	} else {
		$.ajax({
			method: 'post',
			url: '../arquivo/editar',
			data: {	id: id, titulo: titulo, descricao: descricao, tipo: tipo, departamento: departamento, nome: nome, link: link, caminho: caminho, situacao: situacao, ordem: ordem},
			dataType: 'json',
			success: function(retorno){
				if(retorno.editou){
					msg_alert('success', '&nbsp; Arquivo editado com sucesso!');
				} else {
					msg_alert('error', '&nbsp; Falha ao editar arquivo!');
				}
			},
			error: function(retorno){
				msg_alert('error', '&nbsp; Erro ao editar arquivo!');
  			}
		});
	}
}

function editar_voltar(){
	var id = $('#id_arquivo').val();
	var titulo = $('#titulo_arquivo').val();
	var descricao = $('#descricao_arquivo').val();
	var tipo = $('#tipo_arquivo').val();
	var departamento = $('#departamento_arquivo').val();
	var nome = $('#nome_arquivo').val();
	var link = $('#link_arquivo').val();
	var caminho = $('#caminho_arquivo').val();
	var situacao = $('#situacao_arquivo').val();
	var ordem = $('#ordem_arquivo').val();
	//console.log("teste2"+ordem);
	if(titulo=='' || titulo==' ' || descricao=='' || descricao ==' '){
		msg_alert('warning', '&nbsp; Atenção! Preencha todos os campos!');
	} else {
		$.ajax({
			method: 'post',
			url: '../arquivo/editar',
			data: {	id: id, titulo: titulo, descricao: descricao, tipo: tipo, departamento: departamento, nome: nome, link: link, caminho: caminho, situacao: situacao, ordem: ordem},
			dataType: 'json',
			success: function(retorno){
				if(retorno.editou){
					msg_alert('success', '&nbsp; Arquivo editado com sucesso!');
					$(this).delay(3000, function(){
						history.back();
					});

				} else {
					msg_alert('error', '&nbsp; Falha ao editar arquivo!');
				}
			},
			error: function(retorno){
				msg_alert('error', '&nbsp; Erro ao editar arquivo!');
  			}
		});
	}
}

// FIM EDIÇÃO

function abreModal(id){
	//$("#modal-dados").html('');
	const vid = id;
	$.get($("#url_base").text()+'arquivo/visualiza', {id:vid}, function(data){
		dados = JSON.parse(data);
		//console.log(dados);
		var rootURL = location.hostname;

		if (dados.arquivo.length > 0){

			//$("#modalLabel").text(dados.arquivo[0].TITULO_ARQUIVO);
			$("#tituloArquivo").text(dados.arquivo[0].TITULO_ARQUIVO);
			$("#tipoDocumento").text(dados.arquivo[0].TITULO_TIPO_ARQUIVO);
			if (dados.arquivo[0].ID_DEPARTAMENTO >= 0){$("#disponivelDocumento").text(dados.arquivo[0].TITULO_DEPARTAMENTO);} else {$("#disponivelDocumento").text('Público');}
			$("#descricaoDocumento").html(dados.arquivo[0].DESCRICAO_ARQUIVO);
			if (dados.arquivo[0].LINK_ARQUIVO.length > 0){
				$("#linkArquivo").html('<a class="decoration-none" target="_blank" href="'+dados.arquivo[0].LINK_ARQUIVO+'">Clique para abrir a página</a>');
				$("#labelLinkArquivo").show();
				$("#linkArquivo").show();
			} else {
				$("#linkArquivo").hide();
				$("#labelLinkArquivo").hide();
			}
			if (dados.arquivo[0].CAMINHO_ARQUIVO.length > 0){
				$("#linkDocumento").html('<a class="decoration-none" target="_blank" href="'+$("#url_base").text()+dados.arquivo[0].CAMINHO_ARQUIVO+'">Clique para abrir o documento</a>');
				$("#labelLinkDocumento").show();
				$("#linkDocumento").show();
			} else {
				$("#labelLinkDocumento").hide();
				$("#linkDocumento").hide();
			}
			
		}
	});
	$('#modalDados').modal('show');
}

function ordena(campo){
	var vCamponovo = campo;
	var vCampo = $("#texto-campo").val();
	var ord = $("#texto-ord").val();
	var registros = $("#select_paginas").val();
	if (vCamponovo == vCampo){
		if (ord == 'asc'){
			ord = 'desc';
		} else {
			ord = 'asc';
		}
	} else {
		ord = 'desc';
	}	window.location.href = '/arquivo/lista/1/'+$('#texto_busca').val()+'/'+vCamponovo+'/'+ord+'/'+registros;
}

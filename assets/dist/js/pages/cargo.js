
$(document).ready(function() {
	if ($("#main_content").length){
		mostraDados();
	}
});

$(function () {
    // Summernote
	if ($("#descricao_cargo").length){
		$('#descricao_cargo').summernote();
	}
    
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
	window.location.href = '/cargo/lista/1/'+$('#texto_busca').val()+'/'+$("#texto-campo").val()+'/'+$("#texto-ord").val()+'/'+$("#texto-paginas").val();
}

function abreModal(id){
	//$("#modal-dados").html('');
	const vid = id;
	$.get('/cargo/visualiza', {id:vid}, function(data){
		dados = JSON.parse(data);
		console.log(dados);
		var rootURL = location.hostname;

		if (dados.dados_cargo.cargos.length > 0){
			$("#modalLabel").text('Cargo: '+dados.dados_cargo.cargos[0].TITULO_CARGO);
			$("#descricaoCargo").text(dados.dados_cargo.cargos[0].DESCRICAO_CARGO);
			if (dados.dados_cargo.cargos[0].IND_SITUACAO__CARGO = 'A'){
				$("#situacaoCargo").text('Ativo');
			} else {
				$("#situacaoCargo").text('Inativo');
			}
			$("#divColaboradores").html('');
			for (let i=0; i < dados.dados_cargo.cargos.length; i++){
				if (dados.dados_cargo.cargos[i].CAMINHO_FOTO_USUARIO){
					caminho_foto = '/'+dados.dados_cargo.cargos[i].CAMINHO_FOTO_USUARIO;
				} else {
					if (dados.dados_cargo.cargos[i].SEXO_USUARIO == 'Feminino'){
						caminho_foto = '/assets/dist/img/blank_female.jpg'
					} else {
						caminho_foto = '/assets/dist/img/blank_male.jpg'
					}
				}
				$("#divColaboradores").append('<div class="card mb-3 mt-2 ml-2" style="width: 370px;"><div class="row no-gutters"><div class="col-md-2">\
					  <img src="'+caminho_foto+'" class="rounded-circle mt-2 ml-2 mb-2" style="width: 75px; height:75px; "></div><div class="col-md-10">\
					<div class="card-body ml-3">\
					  <h5 class="card-title">'+dados.dados_cargo.cargos[i].NOME_USUARIO+'</h5>\
					  <p class="card-text">'+dados.dados_cargo.cargos[i].TITULO_DEPARTAMENTO+'\
					</div></div></div></div>');
			}

			
		}
	});
	$('#modalDados').modal('show');

}

$('#buscar').click(function(){
	window.location.href = '/cargo/lista/1/'+$('#texto_busca').val()+'/';
});
$('.numero-pagina').click(function(){
	var pagina = $(this).text();
	$('.page-item').attr('page-active', pagina);
	window.location.href = '/cargo/lista/'+pagina+'/'+$('#texto_busca').val()+'/'+$("#texto-campo").val()+'/'+$("#texto-ord").val()+'/'+$("#texto-paginas").val();
});
$('.voltar-pagina').click(function(){
	var pagina = $(this).attr('page-active')-1;
	$('.page-item').attr('page-active', pagina);
	window.location.href = '/cargo/lista/'+pagina+'/'+$('#texto_busca').val()+'/'+$("#texto-campo").val()+'/'+$("#texto-ord").val()
});
$('.proxima-pagina').click(function(){
	var pagina = $(this).attr('page-active')-1;
	$('.page-item').attr('page-active', pagina);
	window.location.href = '/cargo/lista/'+pagina+'/'+$('#texto_busca').val()+'/'+$("#texto-campo").val()+'/'+$("#texto-ord").val()
});

// CADASTRO
function cadastrar(funcao){
	var titulo = $('#titulo_cargo').val();
	var descricao = $('#descricao_cargo').val();
	var situacao = $('#situacao_cargo').val();
	var nivel = $('#nivel_cargo').val();
	if(titulo=='' || titulo==' '){
		msg_alert('warning', '&nbsp; Atenção! Preencha todos os campos!');
	} else {
		$.ajax({
			method: 'post',
			url: '/cargo/cadastrar',
			data: {	titulo: titulo, descricao: descricao, situacao: situacao, nivel: nivel},
			dataType: 'json',
			success: function(retorno){
				if(retorno.inseriu){
					if (funcao == "C"){
						msg_alert('success', '&nbsp; Cargo cadastrado com sucesso!');
						$('input').val('');
						$('select').val('');
						$('#descricao_cargo').summernote('code', '');
						$('#situacao_cargo').val('A');
					} else if (funcao =="V"){
						history.back();
					}
				} else {
					msg_alert('error', '&nbsp; Falha ao cadastrar cargo!');
				}
			},
			error: function(retorno){
				msg_alert('error', '&nbsp; Erro ao cadastrar cargo!');
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
$('#lista-cargos').on('click', '.btn-excluir', function(){
	var id = $(this).attr('data-id');
	$('#btn-excluir').attr('data-id', id);
	$('#modal-excluir').modal('show');
});

$('#btn-excluir').click(function(){
	var id = $(this).attr('data-id');
	$.ajax({
		method: 'post',
		url: '/cargo/excluir',
		data: {id: id},
		dataType: 'json',
		success: function(retorno){
			if(retorno.excluiu){
				$('#titulo-modal-msg').text('Sucesso');
				$('#texto-modal-msg').text('Registro excluído!');
				$('#modal-msg').modal('show');
				window.location.reload()
			} else {
				//alert('Falha');
				$('#titulo-modal-msg').text('Erro');
				$('#texto-modal-msg').text('Falha ao excluir registro!');
				$('#modal-msg').modal('show');
			}
		},
		error: function(retorno){
			//alert('Erro');
			$('#titulo-modal-msg').text('Erro');
			$('#texto-modal-msg').text('Falha ao excluir registro!');
			$('#modal-msg').modal('show');
		}
	});
	$('#modal-excluir-cargo').modal('hide');	
});
// FIM EXCLUSÃO

function editar(){
	var id = $('#id_cargo').val();
	var titulo = $('#titulo_cargo').val();
	var descricao = $('#descricao_cargo').val();
	var situacao = $('#situacao_cargo').val();
	var nivel = $('#nivel_cargo').val();
	if(titulo=='' || titulo==' '){
		msg_alert('warning', '&nbsp; Atenção! Preencha todos os campos!');
	} else {
		$.ajax({
			method: 'post',
			url: '/cargo/editar',
			data: {	id: id, titulo: titulo, descricao: descricao, situacao: situacao, nivel: nivel},
			dataType: 'json',
			success: function(retorno){
				if(retorno.editou){
					msg_alert('success', '&nbsp; Cargo editado com sucesso!');
				} else {
					msg_alert('error', '&nbsp; Falha ao editar cargo!');
				}
			},
			error: function(retorno){
				msg_alert('error', '&nbsp; Erro ao editar cargo!');
  			}
		});
	}
}

function mostraDados(){
	//$("#main-content").empty();

	// Recebe os dados de cargos
	$.get("../cargo/dados", function(data){
		var dados;
		dados = JSON.parse(data);
		//console.log(dados.cargo)
		for (let i = 0; i < dados.cargo.length; i++){
			$("#main-content").append('<div class="row">') // Abrindo a linha
			$("#main-content").append('<div class="card rounded-lg border" id="card'+dados.cargo[i].ID_CARGO+'" style="width: 25rem;">\
  				<div class="card-body">\
    				<h5 class="card-title">'+dados.cargo[i].TITULO_CARGO+'</h5>\
    				<!--<a href="#" class="card-link">Card link</a>\
    				<a href="#" class="card-link">Another link</a>-->\
  				</div>\
			</div>\
			<div class="row pl-5" id="row'+dados.cargo[i].ID_CARGO+'"></div>\
			</div>');
			if (dados.cargo[i].IND_SITUACAO_CARGO == 'A'){
				$("#card"+dados.cargo[i].ID_CARGO).addClass("border-success bg-gradient-success")
			} else {
				$("#card"+dados.cargo[i].ID_CARGO).addClass("border-danger bg-gradient-danger")
			}

		}
	})

	//Recebe os dados de usuarios
	$.get("../usuario/dados", function(data){
		var dados;
		var caminho_foto;
		dados = JSON.parse(data);
		//console.log(dados);
		for (let i = 0; i < dados.length; i++){
			if (dados[i].CAMINHO_FOTO_USUARIO){
				caminho_foto = dados[i].CAMINHO_FOTO_USUARIO;
			} else {
				if (dados[i].SEXO_USUARIO == 'Feminino'){
					caminho_foto = './assets/dist/img/blank_female.jpg'
				} else {
					caminho_foto = './assets/dist/img/blank_male.jpg'
				}
			}
			$("#row"+dados[i].ID_CARGO).append('\
			<div class="card mb-3 mt-2 ml-2" style="width: 370px;">\
			<div class="row no-gutters">\
			  <div class="col-md-2">\
			  	<img src=".'+caminho_foto+'" class="rounded-circle mt-2 ml-2 mb-2" style="width: 75px; height:75px; ">\
			  </div>\
			  <div class="col-md-10">\
				<div class="card-body ml-3">\
				  <h5 class="card-title">'+dados[i].NOME_USUARIO+'</h5>\
				  <p class="card-text">'+dados[i].DESCRICAO_DEPARTAMENTO+'\
				</div>\
			  </div>\
			</div>\
		  </div>\
			');
		}

	})

}

$('#btn_editar').click(function(){
	editar();
});
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
	}	window.location.href = '/cargo/lista/1/'+$('#texto_busca').val()+'/'+vCamponovo+'/'+ord+'/'+registros;
}

$(document).ready(function() {

	if (!!document.getElementById("descricao_departamento")){
		$('#descricao_departamento').summernote();
	};
	$.get("../departamento/organograma", function(data){
		dados = JSON.parse(data);

		dados.forEach(function(item){
			console.log(item);
		});

		var chart = new OrgChart("#tree", {
			nodeBinding: {
				field_0: "nome",
				field_1: "nome_setor",
				firld_2: "cargo"
			},
			nodes: dados
		});
	});
	


		
	
	
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
	window.location.href = '/departamento/lista/1/'+$('#texto_busca').val()+'/'+$("#texto-campo").val()+'/'+$("#texto-ord").val()+'/'+$("#select_paginas").val();
}

$('#buscar').click(function(){
	window.location.href = '../../1/'+$('#texto_busca').val()+'/';
});
$('#adicionar').click(function(){
	

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
	var titulo = $('#titulo_departamento').val();
	var descricao = $('#descricao_departamento').val();
	var situacao = $('#situacao_departamento').val();
	var departamentochefia = $('#departamento_chefia').val();
	if(titulo=='' || titulo==' '){
		msg_alert('warning', '&nbsp; Atenção! Preencha todos os campos!');
	} else {
		$.ajax({
			method: 'post',
			url: '../departamento/cadastrar',
			data: {	titulo: titulo, descricao: descricao, situacao: situacao, departamentochefia: departamentochefia},
			dataType: 'json',
			success: function(retorno){
				if(retorno.inseriu){
					if (funcao == "C"){
						msg_alert('success', '&nbsp; Departamento cadastrado com sucesso!');
						$('input').val('');
						$('select').val('');
						$('#descricao_departamento').summernote('code', '');
						$('#situacao_departamento').val('A');
					} else {
						history.back();
					}
				} else {
					msg_alert('error', '&nbsp; Falha ao cadastrar departamento!');
				}
			},
			error: function(retorno){
				msg_alert('error', '&nbsp; Erro ao cadastrar departamento!');
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
$('#lista-departamentos').on('click', '.btn-excluir', function(){
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
	$('#modal-excluir-departamento').modal('hide');	
});
// FIM EXCLUSÃO

function editar(funcao){
	var id = $('#id_departamento').val();
	var titulo = $('#titulo_departamento').val();
	var descricao = $('#descricao_departamento').val();
	var situacao = $('#situacao_departamento').val();
	var departamentochefia = $('#departamento_chefia').val();
	if(titulo=='' || titulo==' '){
		msg_alert('warning', '&nbsp; Atenção! Preencha todos os campos!');
	} else {
		$.ajax({
			method: 'post',
			url: '../departamento/editar',
			data: {	id: id, titulo: titulo, descricao: descricao, situacao: situacao, departamentochefia: departamentochefia},
			dataType: 'json',
			success: function(retorno){
				if(retorno.editou){
					if (funcao == "C"){
						msg_alert('success', '&nbsp; Departamento editado com sucesso!');
					} else {
						history.back();
					}
				} else {
					msg_alert('error', '&nbsp; Falha ao editar departamento!');
				}
			},
			error: function(retorno){
				msg_alert('error', '&nbsp; Erro ao editar departamento!');
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

// INÍCIO MOSTRA
/*function mostraDados(){
	//$("#main-content").empty();

	// Recebe os dados de departamentos
	$.get("../departamento/dados", function(data){
		var dados;
		dados = JSON.parse(data);
		//console.log(dados);
		var dadosOrg = new Array();
		for (let i = 0; i < dados.departamento.length; i++){
		
			dadosOrg.push({})
			$("#setor"+dados.departamento[i].ID_DEPARTAMENTO).append("<li>\
			<div class='card'>\
			<div class='card-body'>\
			<h5 class='card-title text-center'>"+dados.departamento[i].TITULO_DEPARTAMENTO+"</h5>");
			$("#main-content").append('<div class="row">') // Abrindo a linha
			$("#main-content").append('<div class="card rounded-lg border" id="card'+dados.departamento[i].ID_DEPARTAMENTO+'" style="width: 25rem;">\
  				<div class="card-body">\
    				<h5 class="card-title">'+dados.departamento[i].TITULO_DEPARTAMENTO+'</h5>\
    				<p class="card-text">'+dados.departamento[i].DESCRICAO_DEPARTAMENTO+'</p>\
    				<!--<a href="#" class="card-link">Card link</a>\
    				<a href="#" class="card-link">Another link</a>-->\
  				</div>\
			</div>\
			<div class="row pl-5" id="row'+dados.departamento[i].ID_DEPARTAMENTO+'"></div>\
			</div>');
			if (dados.departamento[i].IND_SITUACAO_DEPARTAMENTO == 'A'){
				$("#card"+dados.departamento[i].ID_DEPARTAMENTO).addClass("border-success bg-gradient-success")
			} else {
				$("#card"+dados.departamento[i].ID_DEPARTAMENTO).addClass("border-danger bg-gradient-danger")
			}

		}
	})

	//Recebe os dados de usuarios
	$.get("../usuario/dados", function(data){
		var dados;
		var caminho_foto;
		dados = JSON.parse(data);
		console.log(dados);
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
			$("#row"+dados[i].ID_DEPARTAMENTO).append('\
			<div class="card mb-3 mt-2 ml-2" style="width: 370px;">\
			<div class="row no-gutters">\
			  <div class="col-md-2">\
			  	<img src=".'+caminho_foto+'" class="rounded-circle mt-2 ml-2 mb-2" style="width: 75px; height:75px; ">\
			  </div>\
			  <div class="col-md-10">\
				<div class="card-body ml-3">\
				  <h5 class="card-title">'+dados[i].NOME_USUARIO+'</h5>\
				  <p class="card-text">'+dados[i].TITULO_CARGO+'\
				</div>\
			  </div>\
			</div>\
		  </div>\
			');
		}

	})

}

function mostraDados(){
	//$("#main-content").empty();

	// Recebe os dados de departamentos
	$.get("../departamento/organograma", function(data){
		var dados;
		dados = JSON.parse(data);
		console.log(dados);
		var vDepartamentos = [];
		// Criando array de ID de Departamento
		for (let i=0; i < dados.departamento.length; i++){
			//Percorrendo o array de departamento e verificando a existência do departamento
			var vAchou = false;
			for (let j = 0; j < vDepartamentos.length; j++){
				if (vDepartamentos[j] == dados.departamento[i].ID_DEPARTAMENTO){
					vAchou = true;
				}
			}
			if (!vAchou){
				vDepartamentos.push(dados.departamento[i].ID_DEPARTAMENTO);
			}
		}
		console.log(vDepartamentos);


		for (let i = 0; i < dados.departamento.length; i++){
			$("#main-content").append('<div class="row">') // Abrindo a linha
			$("#main-content").append('<div class="card rounded-lg border" id="card'+dados.departamento[i].ID_DEPARTAMENTO+'" style="width: 25rem;">\
  				<div class="card-body">\
    				<h5 class="card-title">'+dados.departamento[i].TITULO_DEPARTAMENTO+'</h5>\
    				<p class="card-text">'+dados.departamento[i].DESCRICAO_DEPARTAMENTO+'</p>\
    				<!--<a href="#" class="card-link">Card link</a>\
    				<a href="#" class="card-link">Another link</a>-->\
  				</div>\
			</div>\
			<div class="row pl-5" id="row'+dados.departamento[i].ID_DEPARTAMENTO+'"></div>\
			</div>');
			if (dados.departamento[i].IND_SITUACAO_DEPARTAMENTO == 'A'){
				$("#card"+dados.departamento[i].ID_DEPARTAMENTO).addClass("border-success bg-gradient-success")
			} else {
				$("#card"+dados.departamento[i].ID_DEPARTAMENTO).addClass("border-danger bg-gradient-danger")
			}

		}
	})

	//Recebe os dados de usuarios
	$.get("../usuario/dados", function(data){
		var dados;
		var caminho_foto;
		dados = JSON.parse(data);
		console.log(dados);
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
			$("#row"+dados[i].ID_DEPARTAMENTO).append('\
			<div class="card mb-3 mt-2 ml-2" style="width: 370px;">\
			<div class="row no-gutters">\
			  <div class="col-md-2">\
			  	<img src=".'+caminho_foto+'" class="rounded-circle mt-2 ml-2 mb-2" style="width: 75px; height:75px; ">\
			  </div>\
			  <div class="col-md-10">\
				<div class="card-body ml-3">\
				  <h5 class="card-title">'+dados[i].NOME_USUARIO+'</h5>\
				  <p class="card-text">'+dados[i].TITULO_CARGO+'\
				</div>\
			  </div>\
			</div>\
		  </div>\
			');
		}

	}) 

}*/

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
	}	window.location.href = '/departamento/lista/1/'+$('#texto_busca').val()+'/'+vCamponovo+'/'+ord+'/'+registros;
}
// FIM MOSTRA
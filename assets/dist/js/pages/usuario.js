// $(function () {
//     // Summernote
//     $('#descricao_usuario').summernote();
// })
$(document).ready(function() {
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
	window.location.href = '/usuario/lista/1/'+$('#texto_busca').val()+'/'+$("#texto-campo").val()+'/'+$("#texto-ord").val()+'/'+$("#select_paginas").val();
}

$('#buscar').click(function(){
	window.location.href = '/usuario/lista/1/'+$('#texto_busca').val()+'/'+$("#texto-campo").val()+'/'+$("#texto-ord").val()+'/'+$("#select_paginas").val();
});
$('.numero-pagina').click(function(){
	var pagina = $(this).text();
	$('.page-item').attr('page-active', pagina);
	window.location.href = '/usuario/lista/'+pagina+'/'+$('#texto_busca').val()+'/'+$("#texto-campo").val()+'/'+$("#texto-ord").val()+'/'+$("#texto-paginas").val();
});
$('.voltar-pagina').click(function(){
	var pagina = $(this).attr('page-active')-1;
	$('.page-item').attr('page-active', pagina);
	window.location.href = '/usuario/lista/'+pagina+'/'+$('#texto_busca').val()+'/'+$("#texto-campo").val()+'/'+$("#texto-ord").val()+'/'+$("#texto-paginas").val();
});
$('.proxima-pagina').click(function(){
	var pagina = $(this).attr('page-active')-1;
	$('.page-item').attr('page-active', pagina);
	window.location.href = '/usuario/lista/'+pagina+'/'+$('#texto_busca').val()+'/'+$("#texto-campo").val()+'/'+$("#texto-ord").val()+'/'+$("#texto-paginas").val();
});

// $('#cep_usuario').mask('99999-999');

// CADASTRO
function cadastrar(funcao){
	var nome = $('#nome_usuario').val();
	var dt_nascimento = $('#dt_nascimento_usuario').val();
	var departamento = $('#departamento_usuario').val();
	if ($("#chefia").is(":checked")){
		var chefia = 1;
	} else {
		var chefia = 0;
	}
	var cargo = $('#cargo_usuario').val();
	var telefone = $('#telefone_usuario').val();
	var celular = $('#celular_usuario').val();
	var celular_corporativo = $('#celular_corporativo_usuario').val();
	var email = $('#email_usuario').val();
	var login = $('#login_usuario').val();
	var senha = $('#senha_usuario').val();
	var c_senha = $('#confirme_senha_usuario').val();
	var foto = $('#foto_usuario').val();
	var nivel_acesso = $('#nivel_acesso_usuario').val();
	var nome_arquivo = $('#nome_arquivo').val();
	var caminho_arquivo = $('#caminho_arquivo').val();
	var situacao = $('#situacao_usuario').val();
	var endereco = $('#endereco_usuario').val();
	var bairro = $('#bairro_usuario').val();
	var complemento = $('#complemento_usuario').val();
	var cidade = $('#cidade_usuario').val();
	var estado = $('#estado_usuario').val();
	var cep = $('#cep_usuario').val();
	var num_cart_trab = $('#num_cart_trab_usuario').val();
	var dt_exp_cart_trab = $('#dt_exp_cart_trab_usuario').val();
	var serie_cart_trab = $('#serie_cart_trab_usuario').val();
	var uf_cart_trab = $('#uf_cart_trab_usuario').val();
	var cpf = $('#cpf_usuario').val();
	var num_identidade = $('#num_identidade_usuario').val();
	var dt_exp_identidade = $('#dt_exp_identidade_usuario').val();
	var orgao_exp_identidade = $('#orgao_exp_identidade_usuario').val();
	var uf_identidade = $('#uf_identidade_usuario').val();
	var num_cert_militar = $('#num_cert_militar_usuario').val();
	var num_tit_eleitor = $('#num_tit_eleitor_usuario').val();
	var zona_tit_eleitor = $('#zona_tit_eleitor_usuario').val();
	var secao_tit_eleitor = $('#secao_tit_eleitor_usuario').val();
	var num_cnh = $('#num_cnh_usuario').val();
	var categoria_cnh = $('#categoria_cnh_usuario').val();
	var validade_cnh = $('#validade_cnh_usuario').val();
	var nome_orgao_classe = $('#nome_orgao_classe_usuario').val();
	var num_orgao_classe = $('#num_orgao_classe_usuario').val();
	var validade_orgao_classe = $('#validade_orgao_classe_usuario').val();
	var num_pis = $('#num_pis_usuario').val();
	var banco_pis = $('#banco_pis_usuario').val();
	var dt_cadastro_pis = $('#dt_cadastro_pis_usuario').val();
	var nome_pai = $('#nome_pai_usuario').val();
	var nome_mae = $('#nome_mae_usuario').val();
	var grau_escolaridade = $('#grau_escolaridade_usuario').val();
	var naturalidade = $('#naturalidade_usuario').val();
	var nacionalidade = $('#nacionalidade_usuario').val();
	var estado_civil = $('#estado_civil_usuario').val();
	var sexo = $('#sexo_usuario').val();
	var nome_conjuge = $('#nome_conjuge_usuario').val();
	var dt_nasc_conjuge = $('#dt_nasc_conjuge_usuario').val();
	var ramal = $('#ramal_usuario').val();
	var carga_horaria = $('#carga_horaria_usuario').val();
	var horario_expediente = $('#horario_expediente_usuario').val();
	var nome_contato_emergencia = $('#nome_contato_emergencia_usuario').val();
	var telefone_contato_emergencia = $('#telefone_contato_emergencia_usuario').val();
	var plano_saude = $('#plano_saude_usuario').val();
	var email_corporativo = $('#email_corporativo_usuario').val();
	var dt_admissao = $('#dt_admissao_usuario').val();
	var dt_demissao = $('#dt_demissao_usuario').val();
	var nome_contato_emergencia_1 = $('#nome_contato_emergencia_1_usuario').val();
	var nome_contato_emergencia_2 = $('#nome_contato_emergencia_2_usuario').val();
	var nome_contato_emergencia_3 = $('#nome_contato_emergencia_3_usuario').val();
	var nome_contato_emergencia_4 = $('#nome_contato_emergencia_4_usuario').val();
	var nome_contato_emergencia_5 = $('#nome_contato_emergencia_5_usuario').val();
	var telefone_contato_emergencia_1 = $('#telefone_contato_emergencia_1_usuario').val();
	var telefone_contato_emergencia_2 = $('#telefone_contato_emergencia_2_usuario').val();
	var telefone_contato_emergencia_3 = $('#telefone_contato_emergencia_3_usuario').val();
	var telefone_contato_emergencia_4 = $('#telefone_contato_emergencia_4_usuario').val();
	var telefone_contato_emergencia_5 = $('#telefone_contato_emergencia_5_usuario').val();
	var nome_filho_1 = $('#nome_filho_1_usuario').val();
	var nome_filho_2 = $('#nome_filho_2_usuario').val();
	var nome_filho_3 = $('#nome_filho_3_usuario').val();
	var nome_filho_4 = $('#nome_filho_4_usuario').val();
	var nome_filho_5 = $('#nome_filho_5_usuario').val();
	var dt_nascimento_filho_1 = $('#dt_nascimento_filho_1_usuario').val();
	var dt_nascimento_filho_2 = $('#dt_nascimento_filho_2_usuario').val();
	var dt_nascimento_filho_3 = $('#dt_nascimento_filho_3_usuario').val();
	var dt_nascimento_filho_4 = $('#dt_nascimento_filho_4_usuario').val();
	var dt_nascimento_filho_5 = $('#dt_nascimento_filho_5_usuario').val();

	if(senha == c_senha){
		if(nome=='' || nome==' ' || departamento=='' || departamento ==' ' || cargo=='' || cargo ==' '|| email=='' || email ==' '|| login=='' || login ==' '|| senha=='' || senha ==' ' || nivel_acesso=='' || nivel_acesso ==' '){
			msg_alert('warning', '&nbsp; Atenção! Preencha todos os campos!');
		} else {
			$.ajax({
				data: {	nome: nome,
					dt_nascimento: dt_nascimento,
					departamento: departamento,
					chefia: chefia,
					cargo: cargo,
					telefone: telefone,
					celular: celular,
					celular_corporativo: celular_corporativo,
					email: email,
					login: login,
					senha: senha,
					foto: foto,
					nivel_acesso: nivel_acesso,
					nome_arquivo: nome_arquivo,
					caminho_arquivo: caminho_arquivo,
					situacao: situacao,
					endereco: endereco,
					bairro: bairro,
					complemento: complemento,
					cidade: cidade,
					estado: estado,
					cep: cep,
					num_cart_trab: num_cart_trab,
					dt_exp_cart_trab: dt_exp_cart_trab,
					serie_cart_trab: serie_cart_trab,
					uf_cart_trab: uf_cart_trab,
					cpf: cpf,
					num_identidade: num_identidade,
					dt_exp_identidade: dt_exp_identidade,
					orgao_exp_identidade: orgao_exp_identidade,
					uf_identidade: uf_identidade,
					num_cert_militar: num_cert_militar,
					num_tit_eleitor: num_tit_eleitor,
					zona_tit_eleitor: zona_tit_eleitor,
					secao_tit_eleitor: secao_tit_eleitor,
					num_cnh: num_cnh,
					categoria_cnh: categoria_cnh,
					validade_cnh: validade_cnh,
					nome_orgao_classe: nome_orgao_classe,
					num_orgao_classe: num_orgao_classe,
					validade_orgao_classe: validade_orgao_classe,
					num_pis: num_pis,
					banco_pis: banco_pis,
					dt_cadastro_pis: dt_cadastro_pis,
					nome_pai: nome_pai,
					nome_mae: nome_mae,
					grau_escolaridade: grau_escolaridade,
					naturalidade: naturalidade,
					nacionalidade: nacionalidade,
					estado_civil: estado_civil,
					sexo: sexo,
					nome_conjuge: nome_conjuge,
					dt_nasc_conjuge: dt_nasc_conjuge,
					ramal: ramal,
					carga_horaria: carga_horaria,
					horario_expediente: horario_expediente,
					nome_contato_emergencia: nome_contato_emergencia,
					telefone_contato_emergencia: telefone_contato_emergencia,
					plano_saude: plano_saude,
					email_corporativo: email_corporativo,
					dt_admissao: dt_admissao,
					dt_demissao: dt_demissao,
					nome_contato_emergencia_1: nome_contato_emergencia_1,
					nome_contato_emergencia_2: nome_contato_emergencia_2,
					nome_contato_emergencia_3: nome_contato_emergencia_3,
					nome_contato_emergencia_4: nome_contato_emergencia_4,
					nome_contato_emergencia_5: nome_contato_emergencia_5,
					telefone_contato_emergencia_1: telefone_contato_emergencia_1,
					telefone_contato_emergencia_2: telefone_contato_emergencia_2,
					telefone_contato_emergencia_3: telefone_contato_emergencia_3,
					telefone_contato_emergencia_4: telefone_contato_emergencia_4,
					telefone_contato_emergencia_5: telefone_contato_emergencia_5,
					nome_filho_1: nome_filho_1,
					nome_filho_2: nome_filho_2,
					nome_filho_3: nome_filho_3,
					nome_filho_4: nome_filho_4,
					nome_filho_5: nome_filho_5,
					dt_nascimento_filho_1: dt_nascimento_filho_1,
					dt_nascimento_filho_2: dt_nascimento_filho_2,
					dt_nascimento_filho_3: dt_nascimento_filho_3,
					dt_nascimento_filho_4: dt_nascimento_filho_4,
					dt_nascimento_filho_5: dt_nascimento_filho_5
				},
				method: 'post',
				url: '../usuario/cadastrar',
				dataType: 'json',
				success: function(retorno){
					if(retorno.inseriu){
						if (funcao == "C"){
							msg_alert('success', '&nbsp; Usuário cadastrado com sucesso!');
							$('input').val('');
							$('select').val('');
							$('#situacao_usuario').val('A');
						} else {
							history.back();
						}
					} else {
						msg_alert('error', '&nbsp; Falha ao cadastrar usuário!');
					}
				},
				error: function(retorno){
					msg_alert('error', '&nbsp; Erro ao cadastrar usuário!');
	  			}
			});
		}
	} else {
		msg_alert('warning', '&nbsp; Atenção! As senhas informadas não são iguais!');
	}
}
$('#btn_salvar_continuar').click(function(){
	cadastrar("C");
});
$('#btn_salvar_voltar').click(function(){
	cadastrar("C");
});
// FIM CADASTRO

// EXCLUSÃO
$('#lista-usuarios').on('click', '.btn-excluir', function(){
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
	$('#modal-excluir-usuario').modal('hide');	
});
// FIM EXCLUSÃO

function editar(funcao){
	var id = $('#id_usuario').val();
	var nome = $('#nome_usuario').val();
	var dt_nascimento = $('#dt_nascimento_usuario').val();
	var departamento = $('#departamento_usuario').val();
	if ($("#chefia").is(":checked")){
		var chefia = 1;
	} else {
		var chefia = 0;
	}
	console.log(chefia);
	var cargo = $('#cargo_usuario').val();
	var telefone = $('#telefone_usuario').val();
	var celular = $('#celular_usuario').val();
	var celular_corporativo = $('#celular_corporativo_usuario').val();
	var email = $('#email_usuario').val();
	var login = $('#login_usuario').val();
	var foto = $('#foto_usuario').val();
	var nivel_acesso = $('#nivel_acesso_usuario').val();
	var nome_arquivo = $('#nome_arquivo').val();
	var caminho_arquivo = $('#caminho_arquivo').val();
	var situacao = $('#situacao_usuario').val();
	var endereco = $('#endereco_usuario').val();
	var bairro = $('#bairro_usuario').val();
	var complemento = $('#complemento_usuario').val();
	var cidade = $('#cidade_usuario').val();
	var estado = $('#estado_usuario').val();
	var cep = $('#cep_usuario').val();
	var num_cart_trab = $('#num_cart_trab_usuario').val();
	var dt_exp_cart_trab = $('#dt_exp_cart_trab_usuario').val();
	var serie_cart_trab = $('#serie_cart_trab_usuario').val();
	var uf_cart_trab = $('#uf_cart_trab_usuario').val();
	var cpf = $('#cpf_usuario').val();
	var num_identidade = $('#num_identidade_usuario').val();
	var dt_exp_identidade = $('#dt_exp_identidade_usuario').val();
	var orgao_exp_identidade = $('#orgao_exp_identidade_usuario').val();
	var uf_identidade = $('#uf_identidade_usuario').val();
	var num_cert_militar = $('#num_cert_militar_usuario').val();
	var num_tit_eleitor = $('#num_tit_eleitor_usuario').val();
	var zona_tit_eleitor = $('#zona_tit_eleitor_usuario').val();
	var secao_tit_eleitor = $('#secao_tit_eleitor_usuario').val();
	var num_cnh = $('#num_cnh_usuario').val();
	var categoria_cnh = $('#categoria_cnh_usuario').val();
	var validade_cnh = $('#validade_cnh_usuario').val();
	var nome_orgao_classe = $('#nome_orgao_classe_usuario').val();
	var num_orgao_classe = $('#num_orgao_classe_usuario').val();
	var validade_orgao_classe = $('#validade_orgao_classe_usuario').val();
	var num_pis = $('#num_pis_usuario').val();
	var banco_pis = $('#banco_pis_usuario').val();
	var dt_cadastro_pis = $('#dt_cadastro_pis_usuario').val();
	var nome_pai = $('#nome_pai_usuario').val();
	var nome_mae = $('#nome_mae_usuario').val();
	var grau_escolaridade = $('#grau_escolaridade_usuario').val();
	var naturalidade = $('#naturalidade_usuario').val();
	var nacionalidade = $('#nacionalidade_usuario').val();
	var estado_civil = $('#estado_civil_usuario').val();
	var sexo = $('#sexo_usuario').val();
	var nome_conjuge = $('#nome_conjuge_usuario').val();
	var dt_nasc_conjuge = $('#dt_nasc_conjuge_usuario').val();
	var ramal = $('#ramal_usuario').val();
	var carga_horaria = $('#carga_horaria_usuario').val();
	var horario_expediente = $('#horario_expediente_usuario').val();
	var nome_contato_emergencia = $('#nome_contato_emergencia_usuario').val();
	var telefone_contato_emergencia = $('#telefone_contato_emergencia_usuario').val();
	var plano_saude = $('#plano_saude_usuario').val();
	var email_corporativo = $('#email_corporativo_usuario').val();
	var dt_admissao = $('#dt_admissao_usuario').val();
	var dt_demissao = $('#dt_demissao_usuario').val();
	var nome_contato_emergencia_1 = $('#nome_contato_emergencia_1_usuario').val();
	var nome_contato_emergencia_2 = $('#nome_contato_emergencia_2_usuario').val();
	var nome_contato_emergencia_3 = $('#nome_contato_emergencia_3_usuario').val();
	var nome_contato_emergencia_4 = $('#nome_contato_emergencia_4_usuario').val();
	var nome_contato_emergencia_5 = $('#nome_contato_emergencia_5_usuario').val();
	var telefone_contato_emergencia_1 = $('#telefone_contato_emergencia_1_usuario').val();
	var telefone_contato_emergencia_2 = $('#telefone_contato_emergencia_2_usuario').val();
	var telefone_contato_emergencia_3 = $('#telefone_contato_emergencia_3_usuario').val();
	var telefone_contato_emergencia_4 = $('#telefone_contato_emergencia_4_usuario').val();
	var telefone_contato_emergencia_5 = $('#telefone_contato_emergencia_5_usuario').val();
	var nome_filho_1 = $('#nome_filho_1_usuario').val();
	var nome_filho_2 = $('#nome_filho_2_usuario').val();
	var nome_filho_3 = $('#nome_filho_3_usuario').val();
	var nome_filho_4 = $('#nome_filho_4_usuario').val();
	var nome_filho_5 = $('#nome_filho_5_usuario').val();
	var dt_nascimento_filho_1 = $('#dt_nascimento_filho_1_usuario').val();
	var dt_nascimento_filho_2 = $('#dt_nascimento_filho_2_usuario').val();
	var dt_nascimento_filho_3 = $('#dt_nascimento_filho_3_usuario').val();
	var dt_nascimento_filho_4 = $('#dt_nascimento_filho_4_usuario').val();
	var dt_nascimento_filho_5 = $('#dt_nascimento_filho_5_usuario').val();
	
	if(nome=='' || nome==' ' || departamento=='' || departamento ==' ' || cargo=='' || cargo ==' '|| email=='' || email ==' '|| login=='' || login ==' ' || nivel_acesso=='' || nivel_acesso ==' '){
		msg_alert('warning', '&nbsp; Atenção! Preencha todos os campos!');
	} else {
		$.ajax({
			method: 'post',
			url: '../usuario/editar',
			data: {	id: id,
					nome: nome,
					dt_nascimento: dt_nascimento,
					departamento: departamento,
					chefia: chefia,
					cargo: cargo,
					telefone: telefone,
					celular: celular,
					celular_corporativo: celular_corporativo,
					email: email,
					login: login,
					foto: foto,
					nivel_acesso: nivel_acesso,
					nome_arquivo: nome_arquivo,
					caminho_arquivo: caminho_arquivo,
					situacao: situacao,
					endereco: endereco,
					bairro: bairro,
					complemento: complemento,
					cidade: cidade,
					estado: estado,
					cep: cep,
					num_cart_trab: num_cart_trab,
					dt_exp_cart_trab: dt_exp_cart_trab,
					serie_cart_trab: serie_cart_trab,
					uf_cart_trab: uf_cart_trab,
					cpf: cpf,
					num_identidade: num_identidade,
					dt_exp_identidade: dt_exp_identidade,
					orgao_exp_identidade: orgao_exp_identidade,
					uf_identidade: uf_identidade,
					num_cert_militar: num_cert_militar,
					num_tit_eleitor: num_tit_eleitor,
					zona_tit_eleitor: zona_tit_eleitor,
					secao_tit_eleitor: secao_tit_eleitor,
					num_cnh: num_cnh,
					categoria_cnh: categoria_cnh,
					validade_cnh: validade_cnh,
					nome_orgao_classe: nome_orgao_classe,
					num_orgao_classe: num_orgao_classe,
					validade_orgao_classe: validade_orgao_classe,
					num_pis: num_pis,
					banco_pis: banco_pis,
					dt_cadastro_pis: dt_cadastro_pis,
					nome_pai: nome_pai,
					nome_mae: nome_mae,
					grau_escolaridade: grau_escolaridade,
					naturalidade: naturalidade,
					nacionalidade: nacionalidade,
					estado_civil: estado_civil,
					sexo: sexo,
					nome_conjuge: nome_conjuge,
					dt_nasc_conjuge: dt_nasc_conjuge,
					dt_nasc_conjuge: dt_nasc_conjuge,
					ramal: ramal,
					carga_horaria: carga_horaria,
					horario_expediente: horario_expediente,
					nome_contato_emergencia: nome_contato_emergencia,
					telefone_contato_emergencia: telefone_contato_emergencia,
					plano_saude: plano_saude,
					email_corporativo: email_corporativo,
					dt_admissao: dt_admissao,
					dt_demissao: dt_demissao,
					nome_contato_emergencia_1: nome_contato_emergencia_1,
					nome_contato_emergencia_2: nome_contato_emergencia_2,
					nome_contato_emergencia_3: nome_contato_emergencia_3,
					nome_contato_emergencia_4: nome_contato_emergencia_4,
					nome_contato_emergencia_5: nome_contato_emergencia_5,
					telefone_contato_emergencia_1: telefone_contato_emergencia_1,
					telefone_contato_emergencia_2: telefone_contato_emergencia_2,
					telefone_contato_emergencia_3: telefone_contato_emergencia_3,
					telefone_contato_emergencia_4: telefone_contato_emergencia_4,
					telefone_contato_emergencia_5: telefone_contato_emergencia_5,
					nome_filho_1: nome_filho_1,
					nome_filho_2: nome_filho_2,
					nome_filho_3: nome_filho_3,
					nome_filho_4: nome_filho_4,
					nome_filho_5: nome_filho_5,
					dt_nascimento_filho_1: dt_nascimento_filho_1,
					dt_nascimento_filho_2: dt_nascimento_filho_2,
					dt_nascimento_filho_3: dt_nascimento_filho_3,
					dt_nascimento_filho_4: dt_nascimento_filho_4,
					dt_nascimento_filho_5: dt_nascimento_filho_5
			},
			dataType: 'json',
			success: function(retorno){
				if(retorno.editou){
					if (funcao == "C"){
						msg_alert('success', '&nbsp; Usuário editado com sucesso!');
					} else {
						history.back();
					}
				} else {
					msg_alert('error', '&nbsp; Falha ao editar usuário!');
				}
			},
			error: function(retorno){
				msg_alert('error', '&nbsp; Erro ao editar usuário!');
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

// UPLOAD ARQUIVO
$('#arquivo').change(function(){
	$('#formArquivo').submit();
});
// ENVIAR IMAGENS
$('#formArquivo').submit(function(e) {
	e.preventDefault();
	// $('#modal-loading').modal('show');
	$.ajax({
		method: 'post',
		url: "../usuario/upload", // Url to which the request is send
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
				$('#img-foto').attr('src', '.'+retorno.caminho_arquivo);
				$('#ver-foto').show();
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

// ALTERAR SENHA USUÁRIO
$('#btn-alterar-senha').click(function(e){
	e.preventDefault();
	$('#msenha').val('');
	$('#mconfirmar-senha').val('');
	$('#modal-alterar-senha').modal('show');
});

$('#btn-alterar-senha-modal').click(function(){
	var id = $('#id_usuario').val();
	var senha = $('#msenha').val();
	var confirmar_senha = $('#mconfirmar-senha').val();

	if(senha=='' || senha==' '){
		msg_alert('warning', 'Atenção! Iforme a nova senha.!');
	} else if (confirmar_senha=='' || confirmar_senha==' '){
		msg_alert('warning', 'Atenção! Confirme a nova senha!');
	} else if (senha!=confirmar_senha){
		msg_alert('warning', 'Atenção! As senhas informadas não são iguais!');
	} else {
		$.ajax({
			method: 'post',
			url: '../usuario/alterar_senha_usuario',
			data: {id: id, senha: senha},
			dataType: 'json',
			success: function(retorno){
				if(retorno.alterou){
					msg_alert('success', '&nbsp; Senha alterada com sucesso!');
				} else {
					msg_alert('error', '&nbsp; Falha ao alterar senha!');
				}
			},
			error: function(retorno){
				msg_alert('error', '&nbsp; Erro ao alterar senha!');
			}
		});
	}
});
// FIM ALTERAR SENHA FUNCIONÁRIO

function abreModal(id){
	//$("#modal-dados").html('');
	$("#div-dados-pessoais").html('<p class="mb-0 pb-0" id="nome-usuario"><strong>Nome: </strong></p>\
	<span class="mb-0 pb-0" id="endereco-usuario"><strong>Endereço: </strong></span>\
	<span class="mb-0 pb-0 pl-2" id="bairro-usuario"><strong>Bairro:</strong></span>\
	<span class="mb-0 pb-0 pl-2" id="cidade-usuario"><strong>Cidade:</strong></span>\
	<span class="mb-0 pb-0 pl-2" id="uf-usuario"><strong>UF:</strong></span>\
	<span class="mb-0 pb-0" id="cep-usuario"><strong>CEP:</strong></span>\
	<br>\
	<p class="mb-0 pb-0"><strong>Filiação</strong></p>\
	<p class="mb-0 pb-0 pl-2" id="nome-pai-usuario"><strong>Nome do pai:</strong></p>\
	<p class="mb-0 pb-0 pl-2" id="nome-mae-usuario"><strong>Nome da mãe:</strong></p>\
	<span class="mb-0 pb-0" id="nascimento-usuario"><strong>Data de nascimento:</strong></span>\
	<span class="mb-0 pb-0 pl-2" id="naturalidade-usuario"><strong>Naturalidade:</strong></span>\
	<span class="mb-0 pb-0 pl-2" id="nacionalidade-usuario"><strong>Nacionalidade:</strong></span>\
	<span class="mb-0 pb-0 pl-2" id="sexo-usuario"><strong>Sexo:</strong></span>\
	');

	$("#div-lotacao").html('<span class="mb-0 pb-0 pl-2" id="departamento-usuario"><strong>Departamento: </strong></span>\
	<span class="mb-0 pb-0 pl-2" id="cargo-usuario"><strong>Cargo: </strong></span>\
	<span class="mb-0 pb-0 pl-2" id="celular-corporativo-usuario"><strong>Celular Corporativo: </strong></span>\
	');

	$("#div-dados-identificacao").html('<span class="mb-0 pb-0 pl-2" id="email-usuario"><strong>Email: </strong></span>\
	<span class="mb-0 pb-0 pl-2" id="telefone-usuario"><strong>Telefone: </strong></span>\
	<span class="mb-0 pb-0 pl-2" id="celular-usuario"><strong>Celular: </strong></span>\
	<span class="mb-0 pb-0 pl-2" id="cpf-usuario"><strong>CPF: </strong></span>\
	<span class="mb-0 pb-0 pl-2" id="reservista-usuario"><strong>Reservista: </strong></span><br>\
	<span class="mb-0 pb-0 pl-2" id="ctps-usuario"><strong>Nº CTPS: </strong></span>\
	<span class="mb-0 pb-0 pl-2" id="expedicao-ctps-usuario"><strong>Data de Expedição:</strong></span>\
	<span class="mb-0 pb-0 pl-2" id="serie-usuario"><strong>Série:</strong></span>\
	<span class="mb-0 pb-0 pl-2" id="uf-ctps-usuario"><strong>UF:</strong></span><br>\
	<span class="mb-0 pb-0 pl-2" id="rg-usuario"><strong>Nº do RG:</strong></span>\
	<span class="mb-0 pb-0 pl-2" id="expedicao-rg-usuario"><strong>Expedição:</strong></span>\
	<span class="mb-0 pb-0 pl-2" id="orgao-rg-usuario"><strong>Orgão Expedidor:</strong></span><br>\
	<span class="mb-0 pb-0 pl-2" id="titulo-usuario"><strong>Título de eleitor:</strong></span>\
	<span class="mb-0 pb-0 pl-2" id="zona-titulo-usuario"><strong>Zona:</strong></span>\
	<span class="mb-0 pb-0 pl-2" id="secao-titulo-usuario"><strong>Seção:</strong></span>\
	<span class="mb-0 pb-0 pl-2" id="cnh-usuario"><strong>CNH:</strong></span>\
	<span class="mb-0 pb-0 pl-2" id="categoria-cnh-usuario"><strong>Categoria:</strong></span>\
	<p class="mb-0 pb-0 pl-2" id="validade-cnh-usuario"><strong>Validade:</strong></p>\
	<span class="mb-0 pb-0 pl-2" id="classe-usuario"><strong>Registro de Entidade de Classe:</strong></span>\
	<span class="mb-0 pb-0 pl-2" id="numero-classe-usuario"><strong>Número:</strong></span>\
	<span class="mb-0 pb-0 pl-2" id="validade-classe-usuario"><strong>Validade:</strong></span>\
	<span class="mb-0 pb-0 pl-2" id="pis-usuario"><strong>PIS:</strong></span>\
	<span class="mb-0 pb-0 pl-2" id="banco-pis-usuario"><strong>Banco:</strong></span>\
	<span class="mb-0 pb-0 pl-2" id="cadastro-pis-usuario"><strong>Cadastro:</strong></span>');
	const vid = id;
	$.get('/usuario/visualiza', {id:vid}, function(data){
		dados = JSON.parse(data);
		console.log(dados);
		//console.log(dados.usuario.length);
		if (dados.usuario.length > 0){
			if (dados.usuario[0].CAMINHO_FOTO_USUARIO){
				caminho_foto = dados.usuario[0].CAMINHO_FOTO_USUARIO;
			} else {
				if (dados.usuario[0].SEXO_USUARIO == 'Feminino'){
					caminho_foto = '/assets/dist/img/blank_female.jpg'
				} else {
					caminho_foto = '/assets/dist/img/blank_male.jpg'
				}
			}
			$("#foto-usuario").html('<img src="'+caminho_foto+'" class="rounded mt-2 ml-2 mb-2" style="width: 100px; height:130px; ">');
			$("#nome-usuario").append(dados.usuario[0].NOME_USUARIO);
			$("#endereco-usuario").append(dados.usuario[0].ENDERECO_USUARIO+' '+dados.usuario[0].COMPLEMENTO_USUARIO);
			$("#bairro-usuario").append(dados.usuario[0].BAIRRO_USUARIO);
			$("#cidade-usuario").append(dados.usuario[0].CIDADE_USUARIO);
			$("#uf-usuario").append(dados.usuario[0].ESTADO_USUARIO);
			$("#cep-usuario").append(dados.usuario[0].CEP_USUARIO);
			$("#nome-pai-usuario").append(dados.usuario[0].NOME_PAI_USUARIO);
			$("#nome-mae-usuario").append(dados.usuario[0].NOME_MAE_USUARIO);
			$("#nascimento-usuario").append(dados.usuario[0].DATA_NASCIMENTO);
			$("#naturalidade-usuario").append(dados.usuario[0].NATURALIDADE_USUARIO);
			$("#nacionalidade-usuario").append(dados.usuario[0].NACIONALIDADE_USUARIO);
			$("#sexo-usuario").append(dados.usuario[0].SEXO_USUARIO);

			$("#departamento-usuario").append(dados.usuario[0].TITULO_DEPARTAMENTO);
			$("#cargo-usuario").append(dados.usuario[0].TITULO_CARGO);

			$("#email-usuario").append(dados.usuario[0].EMAIL_USUARIO);
			$("#telefone-usuario").append(dados.usuario[0].TELEFONE_USUARIO);
			$("#celular-usuario").append(dados.usuario[0].CELULAR_USUARIO);
			$("#cpf-usuario").append(dados.usuario[0].CPF_USUARIO);
			$("#reservista-usuario").append(dados.usuario[0].NUM_CERT_MILITAR_USUARIO);
			$("#ctps-usuario").append(dados.usuario[0].NUM_CART_TRAB_USUARIO);
			$("#expedicao-ctps-usuario").append(dados.usuario[0].DT_EXP_CART_TRAB_USUARIO);
			$("#serie-ctps-usuario").append(dados.usuario[0].SERIE_CART_TRAB_USUARIO);
			$("#uf-ctps-usuario").append(dados.usuario[0].UF_CART_TRAB_USUARIO);



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
	}
	window.location.href = '/usuario/lista/1/'+$('#texto_busca').val()+'/'+vCamponovo+'/'+ord+'/'+registros;
}
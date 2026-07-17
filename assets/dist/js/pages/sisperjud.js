// $(function () {
//     // Summernote
//     $('#descricao_usuario').summernote();
// })
$(document).ready(function() {
	// Formatando data de hoje para o padrão do input date
	var now = new Date();
    var day = ("0" + now.getDate()).slice(-2); // Adiciona 0 à esquerda se < 10
    var month = ("0" + (now.getMonth() + 1)).slice(-2); // Mês é zero-indexed
    var today = now.getFullYear() + "-" + (month) + "-" + (day);

	//Mostrando mensagens (caso haja)
	if ($("#msg").length) {
		var msg = $("#msg").text();
		var tipo = $("#tipo").text();
		if (tipo === "success") {
			toastr.success(msg);
		} else if (tipo === "error") {
			toastr.error(msg);
		}
	}
	// Preenchendo os campos com a data de hoje
	$("#data_pericia").val(today);
	$("#data_conclusao").val(today);
    // Define o valor do input
    $('#id-do-seu-campo').val(today);
	listarPericias();
	carregaSelectRespostas();
	//Máscaras
	$(".processo").mask("00000.000000/0000-00");
	$(".cpf").mask("000.000.000-00");

});

function listarPericias(){
	$.get($("#url_base").text()+"sisperjud/listar", function(data){
		$("#tblSisperjud").empty(); //Apaga o conteúdo da tabela
		$("#tblSisperjud").html('<thead>\
                         		<tr class="py-3">\
								<th class="ps-4">Nome do Periciando</th>\
								<th>Data da Perícia</th>\
								<th>Processo</th>\
								<th class="text-center">Ações</th>\
                         		</tr>\
                     			</thead>\
                     			<tbody id="corpoTblSisperjud"></tbody>');//Insere o conteúdo atualizado na tabela
		var pericias = data.pericias || data;
		console.log(pericias);
		if (!$.isArray(pericias)) {
			console.error('Resposta inesperada de listar perícias:', data);
			return;
		}
		$.each(pericias, function(i, pericia){
			//console.log(pericia);
			let dataPericia = pericia.data_pericia;
			const partes = dataPericia.split('-');
			const dataFormatada = partes[2] + '/' + partes[1] + '/' + partes[0];
			pericia.data_pericia = dataFormatada;
			$("#corpoTblSisperjud").append('<tr>\
								<td class="ps-4"><div class="fw-bold">'+pericia.nome_periciando+'</div><span class="small text-muted">ID: #'+pericia.id+'</span></td>\
								<td>'+pericia.data_pericia+'</td>\
								<td>'+pericia.numero_processo+'</td>\
								<td class="text-center">\
									<button class="btn btn-light btn-sm rounded-circle me-1" title="Excluir Perícia" onclick="excluirPericia('+pericia.id+')"><i class="fa-solid fa-trash text-danger"></i></button>\
									<button class="btn btn-light btn-sm rounded-circle" title="Editar Perícia" onclick="editarPericia('+pericia.id+')" data-bs-toggle="modal" data-bs-target="#formPericiaModal"><i class="fa-solid fa-pen-to-square text-primary"></i></button>\
								</td>\
							</tr>');
		});
	}, 'json');
}

$("#cpf_periciando").on('blur', function() {
	var cpf = $(this).val();
	if (cpf) {
		$.get($("#url_base").text()+"periciando/buscar", { cpf: cpf }, function(data) {
			if (data) {
				//console.log(data);
				$("#periciando_id").val(data.id);
				$("#nome_periciando").val(data.nome_periciando);
				$("#rg_periciando").val(data.rg_periciando);
				$("#nascimento_periciando").val(data.nascimento_periciando);
				$("#nome_social").val(data.nome_social_periciando);
				$("#profissao").val(data.profissao_periciando);
				$("#formacao").val(data.formacao_periciando);
				$("#outras_formacoes").val(data.outras_formacoes_periciando);
				$("#nascimento_periciando").trigger('blur'); // Atualiza a idade
				// Preenche os radios de acordo com os valores retornados
				$("input[name='sexo_biologico'][value='" + data.sexo_biologico_periciando + "']").prop('checked', true);
				$("input[name='identidade_genero'][value='" + data.identidade_genero_periciando + "']").prop('checked', true);
				$("input[name='raca'][value='" + data.raca_periciando + "']").prop('checked', true);
				$("input[name='estado_civil'][value='" + data.estado_civil_periciando + "']").prop('checked', true);
				$("input[name='grau_escolaridade'][value='" + data.grau_escolaridade_periciando + "']").prop('checked', true);
				$("input[name='uf'][value='" + data.uf_periciando + "']").prop('checked', true);
			}
		}, 'json');
	}
});

/*$('#formUsuarioModal').on('hidden.bs.modal', function () {
	$("#usuarioForm")[0].reset();
	$("#id_usuario").val('');
	$("#btnCadastrarUsuario").text('Cadastrar');
	$("#senha_usuario").prop('required', true);
});*/

// Função de exclusão de perícias
function excluirPericia(id) {
	if (confirm('Tem certeza que deseja excluir esta perícia?')) {
		$.get($("#url_base").text()+"sisperjud/excluir", { id: id }, function(data) {
			if (data.excluiu === true) {
				toastr.success('Perícia excluída com sucesso!');
				listarPericias();
			} else {
				toastr.error('Erro ao excluir perícia.');
			}
		}, 'json');
	}
}

// Função de edição de perícias
function editarPericia(id) {
	$.get($("#url_base").text()+"sisperjud/buscar", { id: id }, function(data) {
		// Preencher o formulário com os dados da perícia
		var pericia = JSON.parse(data);
		console.log(pericia.pericia.nome_periciando);
		if (!pericia) {
			toastr.error('Não foi possível carregar os dados da perícia.');
			return;
		}
		$("#id_pericia").val(pericia.pericia.id);
		$("#nome_periciando").val(pericia.pericia.nome_periciando);
		$("#data_pericia").val(pericia.pericia.data_pericia);
		$("#btnCadastrarPericia").text('Alterar');
	});
}

$("#nascimento_periciando").on('blur', function() {
	var dataNascimento = $(this).val(); // Formato YYYY-MM-DD
	if (dataNascimento) {
		var idade = calcularIdade(dataNascimento);
		if (!isNaN(idade) && idade >= 0) {
			$('#idade_periciando').val(idade);
		} else {
			$('#idade_periciando').val('');
		}
	} else {
		$('#idade_periciando').val('');
	}
});

function calcularIdade(nascimento) {
	var hoje = new Date();
	var nascimentoDate = new Date(nascimento);
	
	// Ajuste para evitar erro de fuso horário
	nascimentoDate.setDate(nascimentoDate.getDate() + 1);

	var idade = hoje.getFullYear() - nascimentoDate.getFullYear();
	var m = hoje.getMonth() - nascimentoDate.getMonth();

	// Se o mês atual for antes do nascimento ou 
	// no mês de nascimento mas antes do dia
	if (m < 0 || (m === 0 && hoje.getDate() < nascimentoDate.getDate())) {
		idade--;
	}
	return idade;
}

function carregaSelectRespostas() {
	$.get($("#url_base").text() + "resposta/listar", {"tipo": "SISPERJUD"}, function(data) {
		$.each(data.respostas, function(i, resposta){
			$("#selectRespostas").append('<option value="' + resposta.id + '">' + resposta.resposta + '</option>');
		});
	}, 'json');
}

$("#selectRespostas").change(function() {
	if ($(this).val() != "") {
		$.get($("#url_base").text() + "resposta/buscar", {"id": $(this).val()}, function(data) {
			// Recebe JSON diretamente do servidor (dataType 'json' abaixo)
			var resposta = data;
			console.log(resposta);
			$("#estado_clinico_exame").val(resposta.resposta.estado_clinico_exame);
			$("#limitacoes_funcionais").val(resposta.resposta.limitacoes_funcionais);
			if (resposta.resposta.lesao_fisica_mental == "Sim") {
				$('input[name="lesao_fisica_mental"][value="Sim"]').prop('checked', true)	;
			} else {
				$('input[name="lesao_fisica_mental"][value="Não"]').prop('checked', true);
			}
			if (resposta.resposta.respondeu_sozinha == "Sim") {
				$('input[name="respondeu_sozinha"][value="Sim"]').prop('checked', true)	;
			} else {
				$('input[name="respondeu_sozinha"][value="Não"]').prop('checked', true);
			}
			if (resposta.resposta.valores_atrasados == "Sim") {
				$('input[name="valores_atrasados"][value="Sim"]').prop('checked', true)	;
			} else {
				$('input[name="valores_atrasados"][value="Não"]').prop('checked', true);
			}
			$("#informacoes_valores").val(resposta.resposta.informacoes_valores);
			if (resposta.resposta.alteracao_incapacidade == "Sim") {
				$('input[name="alteracao_incapacidade"][value="Sim"]').prop('checked', true)	;
			} else if (resposta.resposta.alteracao_incapacidade == "Não") {
				$('input[name="alteracao_incapacidade"][value="Não"]').prop('checked', true);
			} else {
				$('input[name="alteracao_incapacidade"][value="Não se aplica"]').prop('checked', true);
			}
			$("#informacoes_pos_pericia").val(resposta.resposta.informacoes_pos_pericia);
			if (resposta.resposta.conclusao_laudo == "Sim") {
				$('input[name="conclusao_laudo"][value="Sim"]').prop('checked', true)	;
			} else {
				$('input[name="conclusao_laudo"][value="Não"]').prop('checked', true);
			}
			$("#laudo_diverso").val(resposta.resposta.laudo_diverso);
			$("#outros_esclarecimentos").val(resposta.resposta.outros_esclarecimentos);
			$("#quesitos_adicionais").val(resposta.resposta.quesitos_adicionais);
}, 'json');
	}
});

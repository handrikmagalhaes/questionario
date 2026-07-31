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
    // Define o valor do input
    $('#id-do-seu-campo').val(today);
	listarPericias();
	//carregaSelectRespostas();
	//Máscaras
	$(".processo").mask("00000.000000/0000-00");
	$(".cpf").mask("000.000.000-00");
});

function listarPericias(){
	$.get($("#url_base").text()+"loas/listar", function(data){
		$("#tblLoas").empty(); //Apaga o conteúdo da tabela
		$("#tblLoas").html('<thead>\
                         		<tr class="py-3">\
								<th class="ps-4">Nome do Periciando</th>\
								<th>Data da Perícia</th>\
								<th>Processo</th>\
								<th class="text-center">Ações</th>\
                         		</tr>\
                     			</thead>\
                     			<tbody id="corpoTblLoas"></tbody>');//Insere o conteúdo atualizado na tabela
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
			$("#corpoTblLoas").append('<tr>\
								<td class="ps-4"><div class="fw-bold">'+pericia.nome_periciando+'</div><span class="small text-muted">ID: #'+pericia.id+'</span></td>\
								<td>'+pericia.data_pericia+'</td>\
								<td>'+pericia.numero_processo+'</td>\
								<td class="text-center">\
									<button class="btn btn-light btn-sm rounded-circle me-1" title="Excluir Perícia" onclick="excluirPericia('+pericia.id+')"><i class="fa-solid fa-trash text-danger"></i></button>\
									<button class="btn btn-light btn-sm rounded-circle me-1" title="Editar Perícia" data-bs-target="#formPericiaModal"><a href="edicao/?id='+pericia.id+'"><i class="fa-solid fa-pen-to-square text-primary"></i></a></button>\
									<button class="btn btn-light btn-sm rounded-circle" title="Imprimir Perícia"><a href="relatorio/?id='+pericia.id+'"><i class="fa-solid fa-print text-primary"></i></a></button>\
								</td>\
							</tr>');
		});
	}, 'json');
}

/*$('#formUsuarioModal').on('hidden.bs.modal', function () {
	$("#usuarioForm")[0].reset();
	$("#id_usuario").val('');
	$("#btnCadastrarUsuario").text('Cadastrar');
	$("#senha_usuario").prop('required', true);
});*/

// Função de exclusão de perícias
function excluirPericia(id) {
	if (confirm('Tem certeza que deseja excluir esta perícia?')) {
		$.get($("#url_base").text()+"loas/excluir", { id: id }, function(data) {
			console.log(data.excluiu);
			if (data.excluiu) {
				toastr.success('Perícia excluída com sucesso!');
				listarPericias();
			} else {
				toastr.error('Erro ao excluir perícia.');
			}
		}, 'json');
	}
}


$("#data_nascimento_periciando").on('blur', function() {
	var dataNascimento = $(this).val(); // Formato YYYY-MM-DD
	if (dataNascimento) {
		var idade = calcularIdade(dataNascimento);
		if (!isNaN(idade) && idade >= 0) {
			$('#idade_periciando').val(idade);
			// Habilita desabilita os campos dependendo da idade
			let menor = "Não";
			if (idade > 16){
				$("#lesao").prop("disabled", false);
				$("#impedimento_longo_prazo").prop("readonly", false);
				$("#doenca_cronica").prop("readonly", false);
				$("#exercer_atos").prop("readonly", false);
				$("#exercicio_pleno").prop("readonly", false);
				$("#permanentes_cuidados").prop("readonly", false);
				$("#desenvolvimento_fisico_mental").prop("readonly", true);
				$("#prejudica_exercicio_atividade").prop("readonly", true);
				$("#esforco_fisico").prop("readonly", true);
				$("#documento_escolar").prop("readonly", true);
				$("#impedir_atividade").prop("readonly", true);
			} else {
				$("#lesao").prop("readonly", true);
				$("#impedimento_longo_prazo").prop("readonly", true);
				$("#doenca_cronica").prop("readonly", true);
				$("#exercer_atos").prop("readonly", true);
				$("#exercicio_pleno").prop("readonly", true);
				$("#permanentes_cuidados").prop("readonly", true);
				$("#desenvolvimento_fisico_mental").prop("readonly", false);
				$("#prejudica_exercicio_atividade").prop("readonly", false);
				$("#esforco_fisico").prop("readonly", false);
				$("#documento_escolar").prop("readonly", false);
				$("#impedir_atividade").prop("readonly", false);
				menor = "Sim";
			}
			carregaSelectRespostas(menor);
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

function carregaSelectRespostas(tipoPericiando) {
	$.get($("#url_base").text() + "resposta/listar", {"tipo": "LOAS", "menor": tipoPericiando}, function(data) {
		$("#selectRespostas").empty('');
		$("#selectRespostas").append('<option value="">----------</option>');
		$.each(data.respostas, function(i, resposta){
			$("#selectRespostas").append('<option value="' + resposta.resposta_id + '">' + resposta.resposta + '</option>');
		});
	}, 'json');
}

$("#selectRespostas").change(function() {
	if ($(this).val() != "") {
		$.get($("#url_base").text() + "resposta/buscar", {"id": $(this).val()}, function(data) {
			// Recebe JSON diretamente do servidor (dataType 'json' abaixo)
			var resposta = data;
			console.log(resposta);
			$("#lesao").val(resposta.lesao);
			$("#impedimento_longo_prazo").val(resposta.impedimento_longo_prazo);

}, 'json');
	}
});

// $(function () {
//     // Summernote
//     $('#descricao_usuario').summernote();
// })
$(document).ready(function() {
	$("form").slideUp(); // Esconde o formulário inicialmente
	listarRespostas();
	// Evento change para o radio tipo_pericia
	$(document).on('change', 'input[name="tipo_pericia"]', function() {
		if($(this).val() === 'SISPERJUD') {
			$("#respostaLOASForm").slideUp(); // Esconde o formulário LOAS
			$("#respostaSISPERJUDForm").slideDown(); // Mostra o formulário
		} else if($(this).val() === 'LOAS') {
			$("#respostaSISPERJUDForm").slideUp(); // Esconde o formulário SISPERJUD
			$("#respostaLOASForm").slideDown(); // Mostra o formulário
		}
	});
	$(document).on('change', 'input[name="menor"]', function() {
		if($(this).val() === 'Não') {
			$("#accordion-item-1").removeClass('pe-none'); // Habilita o accordion para maiores de 16 anos
			$("#accordion-item-2").addClass('pe-none'); // Desabilita o accordion para menores de 16 anos
			$("#accordion-item-2 .accordion-collapse").removeClass('show'); // Fecha o accordion para menores de 16 anos
			$("#accordion-item-1 .accordion-collapse").addClass('show'); // Abre o accordion para maiores de 16 anos
		} else if($(this).val() === 'Sim') {
			$("#accordion-item-1").addClass('pe-none'); // Desabilita o accordion para maiores de 16 anos
			$("#accordion-item-2").removeClass('pe-none'); // Habilita o accordion para menores de 16 anos
			$("#accordion-item-1 .accordion-collapse").removeClass('show'); // Fecha o accordion para maiores de 16 anos	
			$("#accordion-item-2 .accordion-collapse").addClass('show'); // Abre o accordion para menores de 16 anos
		}
	});

});

function listarRespostas(){
	$.get($("#url_base").text()+"resposta/listar", function(data){
		$("#tblRespostas").empty(); //Apaga o conteúdo da tabela
		$("#tblRespostas").html('<thead>\
                         		<tr class="py-3">\
								<th class="ps-4">Resposta</th>\
								<th>Tipo da Perícia</th>\
								<th class="text-center">Ações</th>\
                         		</tr>\
                     			</thead>\
                     			<tbody id="corpoTblRespostas"></tbody>');//Insere o conteúdo atualizado na tabela
		var respostas = data.respostas || data;
		//console.log(respostas);
		if (!$.isArray(respostas)) {
			console.error('Resposta inesperada de listar respostas:', data);
			return;
		}
		$.each(respostas, function(i, resposta){
			console.log(resposta);
			var tipoPericia = (resposta.tipo_pericia === 'SISPERJUD') ? '<span class="badge bg-success">SISPERJUD</span>' : '<span class="badge bg-primary">LOAS</span>';
				$("#corpoTblRespostas").append('<tr>\
						<td class="ps-4"><div class="fw-bold">'+resposta.resposta+'</div><span class="small text-muted">ID: #'+resposta.id+'</span></td>\
						<td>'+tipoPericia+'</td>\
								<td class="text-center">\
									<button class="btn btn-light btn-sm rounded-circle me-1" title="Excluir Resposta" onclick="excluirResposta('+resposta.id+')"><i class="fa-solid fa-trash text-danger"></i></button>\
									<button class="btn btn-light btn-sm rounded-circle" title="Editar Resposta" onclick="editarResposta('+resposta.id+')" data-bs-toggle="modal" data-bs-target="#formRespostaModal"><i class="fa-solid fa-pen-to-square text-primary"></i></button>\
									<button class="btn btn-light btn-sm rounded-circle" title="Ver Resposta" onclick="verResposta('+resposta.id+')" data-bs-toggle="modal" data-bs-target="#formRespostaModal"><i class="fa-solid fa-eye text-success"></i></button>\
								</td>\
							</tr>');
		});
	}, 'json');
}

//Ação do botão de cadastrar usuário
$("#respostaSISPERJUDForm").submit(function(e){
	e.preventDefault();
	if ($("#id_resposta").val() !== "") {
		// Edição de resposta
		$.post($("#url_base").text()+"resposta/alterar", $(this).serialize(), function(data){
			console.log(data);
			if (data.alterou === true) {
				toastr.success('Resposta alterada com sucesso!');
				$("#formRespostaModal").modal('hide');
				$['input[name="tipo_pericia"]'].prop('checked', false);
				$("#respostaSISPERJUDForm")[0].reset();
				$("#id_resposta").val('');
				$("#btnCadastrarResposta").text('Cadastrar');
				listarRespostas();
			} else {
				toastr.error('Erro ao alterar resposta.');
			}
		}, 'json');
	} else {
		// Cadastro de resposta
		$.post($("#url_base").text()+"resposta/cadastrar", $(this).serialize(), function(data){
			if (data.inseriu === true) {
				toastr.success('Resposta cadastrada com sucesso!');
				$("#formRespostaModal").modal('hide');
				$("#respostaForm")[0].reset();
				listarRespostas();
			} else {
				toastr.error('Erro ao cadastrar resposta.');
			}
		}, 'json');
	}
});

// Função de exclusão de respostas
function excluirResposta(id) {
	if (confirm('Tem certeza que deseja excluir esta resposta?')) {
		$.get($("#url_base").text()+"resposta/excluir", { id: id }, function(data) {
			if (data.excluiu === true) {
				toastr.success('Resposta excluída com sucesso!');
				listarRespostas();
			} else {
				toastr.error('Erro ao excluir resposta.');
			}
		}, 'json');
	}
}

// Função de edição de respostas
function editarResposta(id) {
	$.get($("#url_base").text()+"resposta/buscar", { id: id }, function(data) {
		dados = JSON.parse(data);
		console.log(dados.resposta);
		if (dados.resposta.tipo_pericia === 'SISPERJUD') {
			$('input[name="tipo_pericia"][value="SISPERJUD"]').prop('checked', true).trigger('change');
		} else {
			$('input[name="tipo_pericia"][value="LOAS"]').prop('checked', true).trigger('change');
		}
		$("#id_resposta").val(dados.resposta.resposta_id);
		$("#resposta").val(dados.resposta.resposta);
		$("#estado_clinico").val(dados.resposta.estado_clinico);
		$("#limitacoes_funcionais").val(dados.resposta.limitacoes_funcionais);
		if (dados.resposta.afastamento == "Sim") {
			$('input[name="afastamento"][value="Sim"]').prop('checked', true);
		} else {			
			$('input[name="afastamento"][value="Não"]').prop('checked', true);
		}
		if (dados.resposta.fisica_mental == "Sim") {
			$('input[name="fisica_mental"][value="Sim"]').prop('checked', true);
		} else {			
			$('input[name="fisica_mental"][value="Não"]').prop('checked', true);
		}
		if (dados.resposta.realizando_tratamento == "Sim") {
			$('input[name="realizando_tratamento"][value="Sim"]').prop('checked', true);
		} else {			
			$('input[name="realizando_tratamento"][value="Não"]').prop('checked', true);
		}
		if (dados.resposta.beneficio_previdenciario == "Sim") {
			$('input[name="beneficio_previdenciario"][value="Sim"]').prop('checked', true);
		} else {			
			$('input[name="beneficio_previdenciario"][value="Não"]').prop('checked', true);
		}
		$("#documentos_acesso").val(dados.resposta.documentos_acesso);
		if (dados.resposta.lesao_fisica_mental == "Sim") {
			$('input[name="lesao_fisica_mental"][value="Sim"]').prop('checked', true);
		} else {			
			$('input[name="lesao_fisica_mental"][value="Não"]').prop('checked', true);
		}
		if (dados.resposta.respondeu_sozinha == "Sim") {
			$('input[name="respondeu_sozinha"][value="Sim"]').prop('checked', true);
		} else {			
			$('input[name="respondeu_sozinha"][value="Não"]').prop('checked', true);
		}
		if (dados.resposta.valores_atrasados == "Sim") {
			$('input[name="valores_atrasados"][value="Sim"]').prop('checked', true);
		} else {			
			$('input[name="valores_atrasados"][value="Não"]').prop('checked', true);
		}
		$("#informacoes_valores").val(dados.resposta.informacoes_valores);
		if (dados.resposta.alteracao_incapacidade == "Sim") {
			$('input[name="alteracao_incapacidade"][value="Sim"]').prop('checked', true);
		} else if (dados.resposta.alteracao_incapacidade == "Não") {			
			$('input[name="alteracao_incapacidade"][value="Não"]').prop('checked', true);
		} else {
			$('input[name="alteracao_incapacidade"][value="Não se aplica"]').prop('checked', true);
		}
		$("#informacoes_pos_pericia").val(dados.resposta.informacao_pos_pericia);
		if (dados.resposta.conclusao_laudo == "Sim") {
			$('input[name="conclusao_laudo"][value="Sim"]').prop('checked', true);
		} else {			
			$('input[name="conclusao_laudo"][value="Não"]').prop('checked', true);
		}
		$("#laudo_diverso").val(dados.resposta.laudo_diverso);
		$("#outros_esclarecimentos").val(dados.resposta.outros_esclarecimentos);
		$("#quesitos_adicionais").val(dados.resposta.quesitos_adicionais);		

		$("#btnCadastrarSisperjud").text('Alterar');
	});
}

$("#formRespostaModal").on('hidden.bs.modal', function () {
	$("form").slideUp(); // Esconde o formulário quando o modal for fechado
	$("form").reset; // Limpa os campos do formulário
	$('input[name="tipo_pericia"]').prop('checked', false); // Desmarca os radios
});

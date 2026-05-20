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
	// Preenchendo os campos com a data de hoje
	$("#data_pericia").val(today);
	$("#data_conclusao").val(today);
    // Define o valor do input
    $('#id-do-seu-campo').val(today);
	$(".processo").mask("00000.000000/0000-00");
	$(".cpf").mask("000.000.000-00");
	listarPericias();
	carregarOpcoesResposta();
	habilitarSugestoesDeResposta();
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
		//console.log(pericias);
		if (!$.isArray(pericias)) {
			console.error('Resposta inesperada de listar perícias:', data);
			return;
		}
		$.each(pericias, function(i, pericia){
			//console.log(pericia);
			$("#corpoTblSisperjud").append('<tr>\
								<td class="ps-4"><div class="fw-bold">'+pericia.nome_periciando+'</div><span class="small text-muted">ID: #'+pericia.id+'</span></td>\
								<td>'+pericia.data_pericia+'</td>\
								<td>'+pericia.processo+'</td>\
								<td class="text-center">\
									<button class="btn btn-light btn-sm rounded-circle me-1" title="Excluir Perícia" onclick="excluirPericia('+pericia.id+')"><i class="fa-solid fa-trash text-danger"></i></button>\
									<button class="btn btn-light btn-sm rounded-circle" title="Editar Perícia" onclick="editarPericia('+pericia.id+')" data-bs-toggle="modal" data-bs-target="#formPericiaModal"><i class="fa-solid fa-pen-to-square text-primary"></i></button>\
								</td>\
							</tr>');
		});
	}, 'json');
}

//Ação do botão de cadastrar usuário
/*$("#usuarioForm").submit(function(e){
	e.preventDefault();
	if ($("#id_usuario").val() !== "") {
		// Edição de usuário
		$.post($("#url_base").text()+"usuario/alterar", $(this).serialize(), function(data){
			if (data.alterou === true) {
				toastr.success('Usuário alterado com sucesso!');
				$("#formUsuarioModal").modal('hide');
				$("#usuarioForm")[0].reset();
				$("#id_usuario").val('');
				$("#btnCadastrarUsuario").text('Cadastrar');
				$("#senha_usuario").prop('required', true);
				listarUsuarios();
			} else {
				toastr.error('Erro ao alterar usuário.');
			}
		}, 'json');
	} else {
		// Cadastro de usuário
		$.post($("#url_base").text()+"usuario/cadastrar", $(this).serialize(), function(data){
			if (data.inseriu === true) {
				toastr.success('Usuário cadastrado com sucesso!');
				$("#formUsuarioModal").modal('hide');
				$("#usuarioForm")[0].reset();
				listarUsuarios();
			} else {
				toastr.error('Erro ao cadastrar usuário.');
			}
		}, 'json');
	}
});*/

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

function carregarOpcoesResposta() {
	$.get($("#url_base").text() + "resposta/listar", function(data) {
		var respostas = data.respostas || data;
		if (!$.isArray(respostas)) {
			console.error('Resposta inesperada de listar respostas:', data);
			return;
		}
		window.respostaOptions = respostas
			.map(function(item) { return item.resposta || ''; })
			.filter(function(text) { return text && text.trim(); });
		atualizaDatalistRespostas();
	}, 'json');
}

function atualizaDatalistRespostas() {
	var $datalist = $("#respostaOptions");
	if (!$datalist.length || !window.respostaOptions) return;
	$datalist.empty();
	window.respostaOptions.forEach(function(text) {
		$datalist.append($('<option>').val(text));
	});
}

function habilitarSugestoesDeResposta() {
	$("#formSisperjud input[type='text']").attr('list', 'respostaOptions');
	criarContainerSugestoes();
}

function criarContainerSugestoes() {
	if ($('#textareaSuggestions').length) return;
	$('body').append('<div id="textareaSuggestions" class="resposta-suggestions d-none"></div>');
	if (!$('#resposta-suggestion-style').length) {
		$('head').append('<style id="resposta-suggestion-style">#textareaSuggestions {position:absolute; z-index:1050; background:#ffffff; border:1px solid #ced4da; border-radius:.5rem; box-shadow:0 .5rem 1rem rgba(0,0,0,.15); padding:.2rem; max-height:240px; overflow-y:auto; min-width:240px;}#textareaSuggestions button {width:100%; text-align:left; white-space:normal; padding:.55rem .75rem; border:none; background:transparent; color:#212529; border-radius:.375rem;}#textareaSuggestions button:hover {background:#f8f9fa;}#textareaSuggestions button:focus {outline:none;}</style>');
	}
}

function atualizarSugestoesTextarea(element) {
	if (!window.respostaOptions || !window.respostaOptions.length) return;
	var $el = $(element);
	var query = $el.val().toLowerCase();
	var matches = window.respostaOptions.filter(function(text) {
		return !query || text.toLowerCase().indexOf(query) !== -1;
	});
	matches = matches.slice(0, 10);
	var $container = $('#textareaSuggestions');
	$container.empty();
	if (!matches.length) {
		$container.append($('<button type="button" disabled>').text('Nenhuma resposta encontrada'));
	} else {
		matches.forEach(function(text) {
			$container.append($('<button type="button" class="text-start">').text(text).attr('data-value', text));
		});
	}
	posicionarContainerSugestoes($el);
	$container.removeClass('d-none');
}

function posicionarContainerSugestoes($el) {
	var offset = $el.offset();
	var width = $el.outerWidth();
	var height = $el.outerHeight();
	$('#textareaSuggestions').css({ top: offset.top + height + 4, left: offset.left, width: width });
}

$(document).on('focus', '#formSisperjud textarea', function() {
	atualizarSugestoesTextarea(this);
});

$(document).on('input', '#formSisperjud textarea', function() {
	atualizarSugestoesTextarea(this);
});

$(document).on('blur', '#formSisperjud textarea', function() {
	setTimeout(function() {
		$('#textareaSuggestions').addClass('d-none');
	}, 150);
});

$(document).on('mousedown', '#textareaSuggestions button:not([disabled])', function(e) {
	e.preventDefault();
	var value = $(this).attr('data-value');
	var $active = $(document.activeElement);
	if ($active.is('textarea')) {
		$active.val(value);
		$active.focus();
	}
	$('#textareaSuggestions').addClass('d-none');
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

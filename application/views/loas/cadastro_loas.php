<main class="container mt-5 pt-5">
	<!-- Form header -->
<div class="row mb-4 align-items-center">
	<div class="col-md-6 mb-5">
		<?php if (isset($dados['pericia'])): ?>
			<h2 class="fw-bold mb-0">Edição de Perícia LOAS</h2>
		<?php else: ?>
			<h2 class="fw-bold mb-0">Cadastro de Perícia LOAS</h2>
		<?php endif; ?>
	</div>
	<div class="col-md-6 text-md-end">
		<a href="{url_base}loas/lista" class="btn btn-secondary rounded-pill px-4">Voltar</a>
	</div>
	<form id="formLoas" method="post" enctype="multipart/form-data" action="<?php echo isset($dados['pericia']) ? base_url().'loas/alterar/'.$dados['pericia']->id : base_url().'loas/cadastrar'; ?>">
		<input type="hidden" name="id_pericia" id="id_pericia" value="<?php echo isset($dados['pericia']) ? $dados['pericia']->id : ''; ?>">
		<div class="accordion" id="accordionPanelsStayOpenExample">
			<div class="accordion-item">
				<h2 class="accordion-header" id="panelsStayOpen-headingOne">
				<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false" aria-controls="panelsStayOpen-collapseOne">
					<strong>1. DADOS DA PERÍCIA</strong>
				</button>
				</h2>
				<div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse collapse" aria-labelledby="panelsStayOpen-headingOne">
					<div class="accordion-body">
						<div class="row g-3 mb-4">
							<div class="col-12 col-md-6">
								<label class="form-label small fw-bold">Nº do Processo</label>
								<input type="text" name="numero_processo" id="numero_processo" class="processo form-control rounded-3 py-2" required value="<?php if(isset($dados['pericia'])){echo $dados['pericia']->numero_processo;} ?>">
							</div>
							<div class="col-12 col-md-6">
								<label class="form-label small fw-bold">Data da Perícia</label>
								<input type="date" name="data_pericia" id="data_pericia" class="form-control rounded-3 py-2" required value="<?php if(isset($dados['pericia'])){echo $dados['pericia']->data_pericia;} ?>">
							</div>
						</div>
						<div class="row g-3 mb-4">
							<div class="col-24 col-md-12">
								<label class="form-label small fw-bold">Perito(a)</label>
								<input type="text" name="perito" id="perito" class="form-control rounded-3 py-2" required value="<?php if(isset($dados['pericia'])){echo $dados['pericia']->perito;} ?>">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="accordion-item">
				<h2 class="accordion-header" id="panelsStayOpen-headingTwo">
				<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo" readonly	>
					<strong>2. IDENTIFICAÇÃO</strong>
				</button>
				</h2>
				<div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
					<div class="accordion-body">
						<div class="row g-3 mb-4">
							<div class="col-24 col-md-12">
								<label class="form-label small fw-bold">Nome</label>
								<input type="text" name="nome_periciando" id="nome_periciando" class="form-control rounded-3 py-2" required value="<?php if(isset($dados['pericia'])){echo $dados['pericia']->nome_periciando;} ?>">
							</div>
							<div class="col-24 col-md-12">
								<label class="form-label small fw-bold">Profissão Atual/Habitual</label>
								<input type="text" name="profissao_periciando" id="profissao_periciando" class="form-control rounded-3 py-2" required value="<?php if(isset($dados['pericia'])){echo $dados['pericia']->profissao_periciando;} ?>">
							</div>
							<div class="col-24 col-md-12">
								<label class="form-label small fw-bold">Profissões exercidas anteriormente</label>
								<input type="text" name="profissoes_exercidas" id="profissoes_exercidas" class="form-control rounded-3 py-2" required value="<?php if(isset($dados['pericia'])){echo $dados['pericia']->profissoes_exercidas;} ?>">
							</div>
							<div class="col-24 col-md-12">
								<label class="form-label small fw-bold">Endereço</label>
								<input type="text" name="endereco_periciando" id="endereco_periciando" class="form-control rounded-3 py-2" required value="<?php if(isset($dados['pericia'])){echo $dados['pericia']->endereco_periciando;} ?>">
							</div>
							<div class="col-8 col-md-4">
								<label class="form-label small fw-bold">Data de Nascimento</label>
								<input type="date" name="data_nascimento_periciando" id="data_nascimento_periciando" class="form-control rounded-3 py-2" required value="<?php if(isset($dados['pericia'])){echo $dados['pericia']->data_nascimento_periciando;} ?>">
							</div>
							<div class="col-8 col-md-4">
								<label class="form-label small fw-bold">Idade</label>
								<input type="text" id="idade_periciando" class="form-control rounded-3 py-2" required value="<?php if(isset($dados['pericia'])){echo $dados['pericia']->idade_periciando;} ?>">
							</div>
							<div class="col-8 col-md-4">
								<label class="form-label small fw-bold d-block mb-2 text-justify">Sexo</label>
								<div class="d-flex gap-3 flex-wrap">
									<div class="form-check">
										<input class="form-check-input" type="radio" name="sexo_periciando" id="sexo_periciando_feminino" value="Feminino" <?php if(isset($dados['pericia']) && $dados['pericia']->sexo_biologico_periciando == 'Feminino'){ echo 'checked'; } ?>>
										<label class="form-check-label" for="sexo_periciando_feminino">
											Feminino
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="sexo_periciando" id="sexo_periciando_masculino" value="Masculino" <?php if(isset($dados['pericia']) && $dados['pericia']->sexo_biologico_periciando == 'Masculino'){ echo 'checked'; } ?>>
										<label class="form-check-label" for="sexo_periciando_masculino">
											Masculino
										</label>
									</div>
								</div>
							</div>
							<div class="col-24 col-md-12">
								<label class="form-label small fw-bold">Naturalidade</label>
								<input type="text" name="naturalidade_periciando" id="naturalidade_periciando" class="form-control rounded-3 py-2" required value="<?php if(isset($dados['pericia'])){echo $dados['pericia']->naturalidade_periciando;} ?>">
							</div>
							<div class="col-12 col-md-6">
								<label class="form-label small fw-bold">RG</label>
								<input type="text" name="rg_periciando" id="rg_periciando" class="form-control rounded-3 py-2" required value="<?php if(isset($dados['pericia'])){echo $dados['pericia']->rg_periciando;} ?>">
							</div>
							<div class="col-12 col-md-6">
								<label class="form-label small fw-bold">CPF</label>
								<input type="text" name="cpf_periciando" id="cpf_periciando" class="cpf form-control rounded-3 py-2" required value="<?php if(isset($dados['pericia'])){echo $dados['pericia']->cpf_periciando;} ?>">
							</div>
							<div class="col-12 col-md-6">
								<label class="form-label small fw-bold d-block mb-2 text-justify">Estado civil</label>
								<div class="d-flex gap-3 flex-wrap">
									<div class="form-check">
										<input class="form-check-input" type="radio" name="estado_civil_periciando" id="estado_civil_solteiro" value="Solteiro(a)" <?php if(isset($dados['pericia']) && $dados['pericia']->estado_civil_periciando == 'Solteiro(a)'){ echo 'checked'; } ?>>
										<label class="form-check-label" for="estado_civil_solteiro">
											Solteiro(a)
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="estado_civil_periciando" id="estado_civil_casado" value="Casado(a)" <?php if(isset($dados['pericia']) && $dados['pericia']->estado_civil_periciando == 'Casado(a)'){ echo 'checked'; } ?>>
										<label class="form-check-label" for="estado_civil_casado">
											Casado(a)
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="estado_civil_periciando" id="estado_civil_uniao_estavel" value="União Estável" <?php if(isset($dados['pericia']) && $dados['pericia']->estado_civil_periciando == 'União Estável'){ echo 'checked'; } ?>>
										<label class="form-check-label" for="estado_civil_uniao_estavel">
											União Estável
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="estado_civil_periciando" id="estado_civil_separado_judicialmente" value="Separado(a) judicialmente" <?php if(isset($dados['pericia']) && $dados['pericia']->estado_civil_periciando == 'Separado(a) judicialmente'){ echo 'checked'; } ?>>
										<label class="form-check-label" for="estado_civil_separado_judicialmente">
											Separado(a) judicialmente
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="estado_civil_periciando" id="estado_civil_divorciado" value="Divorciado(a)" <?php if(isset($dados['pericia']) && $dados['pericia']->estado_civil_periciando == 'Divorciado(a)'){ echo 'checked'; } ?>>
										<label class="form-check-label" for="estado_civil_divorciado">
											Divorciado(a)
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="estado_civil_periciando" id="estado_civil_viuvo" value="Viúvo(a)" <?php if(isset($dados['pericia']) && $dados['pericia']->estado_civil_periciando == 'Viúvo(a)'){ echo 'checked'; } ?>>
										<label class="form-check-label" for="estado_civil_viuvo">
											Viúvo(a)
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="estado_civil_periciando" id="estado_civil_nao_informado" value="Não Informado" <?php if(isset($dados['pericia']) && $dados['pericia']->estado_civil_periciando == 'Não Informado'){ echo 'checked'; } ?>>
										<label class="form-check-label" for="estado_civil_nao_informado">
											Não deseja informar
										</label>
									</div>
								</div>
							</div>						
							<div class="col-12 col-md-6">
								<label class="form-label small fw-bold d-block mb-2 text-justify">Grau de instrucao</label>
								<div class="d-flex gap-3 flex-wrap">
									<div class="form-check">
										<input class="form-check-input" type="radio" name="grau_instrucao" id="grau_escolaridade_sem_escolaridade" value="Sem escolaridade" <?php if(isset($dados['pericia']) && $dados['pericia']->grau_escolaridade_periciando == 'Sem escolaridade'){ echo 'checked'; } ?>>
										<label class="form-check-label" for="grau_escolaridade_sem_escolaridade">
											Sem escolaridade
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="grau_instrucao" id="grau_escolaridade_ef_incompleto" value="Ensino Fundamental Incompleto" <?php if(isset($dados['pericia']) && $dados['pericia']->grau_escolaridade_periciando == 'Ensino Fundamental Incompleto'){ echo 'checked'; } ?>>
										<label class="form-check-label" for="grau_escolaridade_ef_incompleto">
											Ensino Fundamental Incompleto
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="grau_instrucao" id="grau_escolaridade_ef_completo" value="Ensino Fundamental Completo" <?php if(isset($dados['pericia']) && $dados['pericia']->grau_escolaridade_periciando == 'Ensino Fundamental Completo'){ echo 'checked'; } ?>>
										<label class="form-check-label" for="grau_escolaridade_ef_completo">
											Ensino Fundamental Completo
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="grau_instrucao" id="grau_escolaridade_em_incompleto" value="Ensino Médio Incompleto" <?php if(isset($dados['pericia']) && $dados['pericia']->grau_escolaridade_periciando == 'Ensino Médio Incompleto'){ echo 'checked'; } ?>>
										<label class="form-check-label" for="grau_escolaridade_em_incompleto">
											Ensino Médio Incompleto
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="grau_instrucao" id="grau_escolaridade_em_completo" value="Ensino Médio Completo" <?php if(isset($dados['pericia']) && $dados['pericia']->grau_escolaridade_periciando == 'Ensino Médio Completo'){ echo 'checked'; } ?>>
										<label class="form-check-label" for="grau_escolaridade_em_completo">
											Ensino Médio Completo
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="grau_instrucao" id="grau_escolaridade_ensino_superior_incompleto" value="Ensino Superior Incompleto" <?php if(isset($dados['pericia']) && $dados['pericia']->grau_escolaridade_periciando == 'Ensino Superior Incompleto'){ echo 'checked'; } ?>>
										<label class="form-check-label" for="grau_escolaridade_ensino_superior_incompleto">
											Ensino Superior Incompleto
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="grau_instrucao" id="grau_escolaridade_ensino_superior_completo" value="Ensino Superior Completo" <?php if(isset($dados['pericia']) && $dados['pericia']->grau_escolaridade_periciando == 'Ensino Superior Completo'){ echo 'checked'; } ?>>
										<label class="form-check-label" for="grau_escolaridade_ensino_superior_completo">
											Ensino Superior Completo
										</label>
									</div>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<label class="form-label small fw-bold">Tempo que está sem trabalhar</label>
								<input type="text" name="tempo_sem_trabalhar" id="tempo_sem_trabalhar" class="form-control rounded-3 py-2" required value="<?php if(isset($dados['pericia'])){echo $dados['pericia']->tempo_sem_trabalhar;} ?>">
							</div>
							<div class="col-12 col-md-6">
								<label class="form-label small fw-bold">Pessoas que vivem sob o mesmo teto</label>
								<input type="text" name="pessoas_mesmo_teto" id="pessoas_mesmo_teto" class="form-control rounded-3 py-2" required value="<?php if(isset($dados['pericia'])){echo $dados['pericia']->pessoas_mesmo_teto;} ?>">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="accordion-item">
				<h2 class="accordion-header" id="panelsStayOpen-headingThree">
				<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
					<strong>3. QUEIXA PRINCIPAL</strong>
				</button>
				</h2>
				<div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
					<div class="accordion-body">
						<div class="row g-3 mb-4">
							<div class="col-24 col-md-12">
								<label class="form-label small fw-bold">Queixa Principal</label>
								<input type="text" name="queixa_principal" id="queixa_principal" class="form-control rounded-3 py-2" required value="<?php if(isset($dados['pericia'])){ echo $dados['pericia']->queixa_principal; } ?>">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="accordion-item">
				<h2 class="accordion-header" id="panelsStayOpen-headingFour">
				<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
					<strong>4. RESPOSTA AOS QUESITOS</strong>
				</button>
				</h2>
				<div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFour">
					<div class="accordion-body">
						<div class="row g-3 mb-4">
							<div class="col-24 col-md-12">
								<label class="form-label small fw-bold">Escolha a resposta</label>
								<select class="form-select" aria-label="Default select example" id="selectRespostas">
									<option value="" selected>Selecione uma resposta</option>
								</select>
							</div>
						</div>
						<div class="col-24 col-md-12">
							<label class="form-label small fw-bold">1 - O Periciando é, ou já foi portador de doença, lesão ou deficiência física, mental ou sensorial (art.20, § 2º, da çlei 8.742/93)? Em caso positivo, qual(is)?</label>
							<input type="text" name="lesao" id="lesao" class="form-control rounded-3 py-2" required value="<?php if(isset($dados['pericia'])){ echo $dados['pericia']->lesao; } ?>">
						</div>
						<div class="col-24 col-md-12">
							<label class="form-label small fw-bold">2 - Essa doença, moléstia ou lesão gera impedimento de longo prazo (superior a 02 anos(, de natureza física, mental, intelectual ou sensorial, o qual, em interação com uma ou mais barreiras, pode obstruir sua participação plena e efetiva na sociedade em igualdade de condições com as demais pessoas (art. 20, § 2º, da Lei 8.742/93)?</label>
							<input type="text" name="impedimento_longo_prazo" id="impedimento_longo_prazo" class="form-control rounded-3 py-2" required value="<?php if(isset($dados['pericia'])){ echo $dados['pericia']->impedimento_longo_prazo; } ?>">
						</div>
						<div class="col-24 col-md-12">
							<label class="form-label small fw-bold">3 - O autor possui alguma doença infectocontagiosa e/ou crônica, cujos aspectos físicos visíveis possam dificultar a sua inserção no mercado de trabalho e/ou na sociedade em virtude da elevada estigmatização social da doença:</label>
							<input type="text" name="doenca_cronica" id="doenca_cronica" class="form-control rounded-3 py-2" required value="<?php if(isset($dados['pericia'])){ echo $dados['pericia']->doenca_cronica; } ?>">
						</div>
						<div class="col-24 col-md-12">
							<label class="form-label small fw-bold">4 - Essa doença, moléstia ou lesão impede o(a) periciando(a) de exercer plenamente os atos da vida civil (se pode conscientemente exprimir sua vontade, decidir e/ou praticar atos simples próprios da vida em sociedade, como, por exemplo, celebrar contratos, inscrever-se em vestibular/concurso público, casar-se, etc...)?</label>
							<input type="text" name="exercer_atos" id="exercer_atos" class="form-control rounded-3 py-2" required value="<?php if(isset($dados['pericia'])){ echo $dados['pericia']->exercer_atos; } ?>">
						</div>
						<div class="col-24 col-md-12">
							<label class="form-label small fw-bold">5 - Havendo impedimento para o exercício pleno dos atos da vida civil (se afirmativa a resposa ao Quesito 4), ele é transitório ou permanente?</label>
							<input type="text" name="exercicio_pleno" id="exercicio_pleno" class="form-control rounded-3 py-2" required value="<?php if(isset($dados['pericia'])){ echo $dados['pericia']->exercicio_pleno; } ?>">
						</div>
						<div class="col-24 col-md-12">
							<label class="form-label small fw-bold">6 - O(a) periciando(a) necessita de permanentes cuidados médicos, de enfermagem ou de terceiros? Em caso afirmativo, é possível estimar desde quando (dd/mm/aaaa)?</label>
							<input type="text" name="permanentes_cuidados" id="permanentes_cuidados" class="form-control rounded-3 py-2" required value="<?php if(isset($dados['pericia'])){ echo $dados['pericia']->permanentes_cuidados; } ?>">
						</div>
						<div class="col-24 col-md-12">
							<label class="form-label small fw-bold">1 - (Em caso de menores de 16 anos) A doença ou lesão prejudica o desenvolvimento físico, mental e/ou intelectual do(a) periciando(a)?</label>
							<input type="text" name="desenvolvimento_fisico_mental" id="desenvolvimento_fisico_mental" class="form-control rounded-3 py-2" required value="<?php if(isset($dados['pericia'])){ echo $dados['pericia']->desenvolvimento_fisico_mental; } ?>">
						</div>
						<div class="col-24 col-md-12">
							<label class="form-label small fw-bold">2 - (Em caso de menores de 16 anos) A doença ou lesão torna o(a) periciando(a) incapaz ou <b>prejudica significativamente</b> o exercício de atividades inerentes a idade, tais como estudar, brincar, praticar esportes, divertir-se, etc. (art. 16, inciso IV do ECA), na mesma intensidade de uma criança em pleno gozo da sua saúde?</label>
							<input type="text" name="prejudica_exercicio_atividade" id="prejudica_exercicio_atividade" class="form-control rounded-3 py-2" required value="<?php if(isset($dados['pericia'])){ echo $dados['pericia']->prejudica_exercicio_atividade; } ?>">
						</div>
						<div class="col-24 col-md-12">
							<label class="form-label small fw-bold">3 - (Em caso de menores de 16 anos) O exercício de atividades que demandem esforços físicos pode acarretar o agravamento/piora do quadro clínico do(a) periciando(a)?</label>
							<input type="text" name="esforco_fisico" id="esforco_fisico" class="form-control rounded-3 py-2" required value="<?php if(isset($dados['pericia'])){ echo $dados['pericia']->esforco_fisico; } ?>">
						</div>
						<div class="col-24 col-md-12">
							<label class="form-label small fw-bold">4 - (Em caso de menores de 16 anos) Foi apresentado algum relatório ou documento escolar relativo ao periciando(a)? Em caso positivo, houve a descrição de algum comportamento atípico ou necessidade de atenção especial em relação às outras crianças/adolescentes da mesma faixa etária? Essa descrição coaduna com o exame realizado por ocasião da perícia?</label>
							<input type="text" name="documento_escolar" id="documento_escolar" class="form-control rounded-3 py-2" required value="<?php if(isset($dados['pericia'])){ echo $dados['pericia']->documento_escolar; } ?>">
						</div>
						<div class="col-24 col-md-12">
							<label class="form-label small fw-bold">5 - (Em caso de menores de 16 anos) A condição de saúde do menor é determinante para impedir o exercício de atividade laboral por seus pais e/ou responsáveis, obstaculizando o sustento familiar?</label>
							<input type="text" name="impedir_atividade" id="impedir_atividade" class="form-control rounded-3 py-2" required value="<?php if(isset($dados['pericia'])){ echo $dados['pericia']->impedir_atividade; } ?>">
						</div>

					</div>
				</div>
			</div>
			<div class="accordion-item">
				<h2 class="accordion-header" id="panelsStayOpen-headingFive">
				<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseFive">
					<strong>5. CONCLUSÕES</strong>
				</button>
				</h2>
				<div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFive">
					<div class="accordion-body">
						<div class="row g-3 mb-4">
							<div class="col-24 col-md-12">
								<label class="form-label small fw-bold">Diagnóstico do autor (com CID)</label>
								<input type="text" name="diagnostico_autor" id="diagnostico_autor" class="form-control rounded-3 py-2" required value="<?php if(isset($dados['pericia'])){ echo $dados['pericia']->diagnostico_autor; } ?>">
							</div>
							<div class="col-8 col-md-4">
								<label class="form-label small fw-bold d-block mb-2 text-justify">Impedimento de longo prazo (superior a 2 anos)</label>
								<div class="d-flex gap-3 flex-wrap">
									<div class="form-check">
										<input class="form-check-input" type="radio" name="impedimento_menor" id="impedimento_menorNaoHa" value="Não há impedimento" <?php if(isset($dados['pericia']) && $dados['pericia']->impedimento_menor == 'Não há impedimento'){ echo 'checked'; } ?>>
										<label class="form-check-label" for="impedimento_menorNaoHa">
											Não há impedimento
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="impedimento_menor" id="impedimento_menorSimCessado" value="Sim, temporário, já cessado" <?php if(isset($dados['pericia']) && $dados['pericia']->impedimento_menor == 'Sim, temporário, já cessado'){ echo 'checked'; } ?>>
										<label class="form-check-label" for="impedimento_menorSimCessado">
											Sim, temporário, já cessado
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="impedimento_menor" id="impedimento_menorSImPresente" value="Sim, temporário, ainda presente" <?php if(isset($dados['pericia']) && $dados['pericia']->impedimento_menor == 'Sim, temporário, ainda presente'){ echo 'checked'; } ?>>
										<label class="form-check-label" for="impedimento_menorSimPresente">
											Sim, temporário, ainda presente
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="impedimento_menor" id="impedimento_menorSimPermanente" value="Sim, de forma permanente" <?php if(isset($dados['pericia']) && $dados['pericia']->impedimento_menor == 'Sim, de forma permanente'){ echo 'checked'; } ?>>
										<label class="form-check-label" for="impedimento_menorSimPermanente">
											Sim, de forma permanente
										</label>
									</div>

								</div>
							</div>
							<div class="col-8 col-md-4">
								<label class="form-label small fw-bold d-block mb-2 text-justify">Natureza do Impedimento</label>
								<div class="d-flex gap-3 flex-wrap">
									<div class="form-check">
										<input class="form-check-input" type="radio" name="natureza_impedimento" id="natureza_impedimentoFisica" value="Física" <?php if(isset($dados['pericia']) && $dados['pericia']->natureza_impedimento == 'Física'){ echo 'checked'; } ?>>
										<label class="form-check-label" for="natureza_impedimentoFisica">
											Física
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="natureza_impedimento" id="natureza_impedimentoMental" value="Mental" <?php if(isset($dados['pericia']) && $dados['pericia']->natureza_impedimento == 'Mental'){ echo 'checked'; } ?>>
										<label class="form-check-label" for="natureza_impedimentoMental">
											Mental
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="natureza_impedimento" id="natureza_impedimentoIntelectual" value="Intelectual" <?php if(isset($dados['pericia']) && $dados['pericia']->natureza_impedimento == 'Intelectual'){ echo 'checked'; } ?>>
										<label class="form-check-label" for="natureza_impedimentoIntelectual">
											Intelectual
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="natureza_impedimento" id="natureza_impedimentoSensorial" value="Sensorial" <?php if(isset($dados['pericia']) && $dados['pericia']->natureza_impedimento == 'Sensorial'){ echo 'checked'; } ?>>
										<label class="form-check-label" for="natureza_impedimentoSensorial">
											Sensorial
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="natureza_impedimento" id="natureza_impedimentoMultipla" value="Multipla (Fis/Men/Int/Sen)" <?php if(isset($dados['pericia']) && $dados['pericia']->natureza_impedimento == 'Multipla (Fis/Men/Int/Sen)'){ echo 'checked'; } ?>>
										<label class="form-check-label" for="natureza_impedimentoMultipla">
											Multipla (Fis/Men/Int/Sen)
										</label>
									</div>

								</div>
							</div>
							<div class="col-8 col-md-4">
								<label class="form-label small fw-bold d-block mb-2 text-justify">Capacidade para a vida independente</label>
								<div class="d-flex gap-3 flex-wrap">
									<div class="form-check">
										<input class="form-check-input" type="radio" name="capacidade_vida" id="capacidade_vidaSim" value="Sim" <?php if(isset($dados['pericia']) && $dados['pericia']->capacidade_vida == 'Sim'){ echo 'checked'; } ?>>
										<label class="form-check-label" for="capacidade_vidaSim">
											Sim
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="capacidade_vida" id="capacidade_vidaNao" value="Não" <?php if(isset($dados['pericia']) && $dados['pericia']->capacidade_vida == 'Não'){ echo 'checked'; } ?>>
										<label class="form-check-label" for="capacidade_vidaNao">
											Não
										</label>
									</div>
								</div>
							</div>
							<div class="col-8 col-md-4">
								<label class="form-label small fw-bold">Data do início da enfermidade</label>
								<input type="date" name="data_inicio_enfermidade" id="data_inicio_enfermidade" class="form-control rounded-3 py-2" required value="<?php if(isset($dados['pericia'])){ echo $dados['pericia']->data_inicio_enfermidade; } ?>">
							</div>
							<div class="col-8 col-md-4">
								<label class="form-label small fw-bold">Data do início do impedimento</label>
								<input type="date" name="data_inicio_impedimento" id="data_inicio_impedimento" class="form-control rounded-3 py-2" required value="<?php if(isset($dados['pericia'])){ echo $dados['pericia']->data_inicio_impedimento; } ?>">
							</div>
							<div class="col-8 col-md-4">
								<label class="form-label small fw-bold">Data de cessação do impedimento (se aplicável)</label>
								<input type="date" name="data_cessacao_impedimento" id="data_cessacao_impedimento" class="form-control rounded-3 py-2" required value="<?php if(isset($dados['pericia'])){ echo $dados['pericia']->data_cessacao_impedimento; } ?>">
							</div>

						</div>
					</div>
				</div>
			</div>
			<div class="accordion-item">
				<h2 class="accordion-header" id="panelsStayOpen-headingSix">
				<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSix" aria-expanded="false" aria-controls="panelsStayOpen-collapseSix">
					<strong>6. COMPLEMENTAÇÃO</strong>
				</button>
				</h2>
				<div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingSix">
					<div class="accordion-body">
						<div class="row g-3 mb-4">
							<div class="col-24 col-md-12">
								<label class="form-label small fw-bold d-block mb-2 text-justify">COMPLEMENTAÇÃO</label>
							</div>
						</div>
						<div class="col-12 col-md-6">
							<label class="form-label small fw-bold">Complementação</label>
							<input type="text" name="complementacao" id="complementacao" class="form-control rounded-3 py-2" required value="<?php if(isset($dados['pericia'])){ echo $dados['pericia']->complementacao; } ?>">
						</div>
						<div class="col-12 col-md-6">
							<label class="form-label small fw-bold">Médico(a) Perito(a) Judicial</label>
							<input type="text" name="medico_judicial" id="medico_judicial" class="form-control rounded-3 py-2" required value="<?php if(isset($dados['pericia'])){ echo $dados['pericia']->medico_judicial; } ?>">
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12 mt-3 text-md-end">
				<?php if (isset($dados['pericia'])){ ?>
					<input type="submit" class="btn btn-success rounded-pill px-4" value="Alterar" id=btnSalvar>
				<?php } else { ?>
					<input type="submit" class="btn btn-success rounded-pill px-4" value="Cadastrar" id=btnSalvar>
				<?php } ?>
			</div>
		</div>	
	</form>
</form>
</div>
</main>



<main class="container mt-5 pt-5">
	<!-- Form header -->
<div class="row mb-4 align-items-center">
	<div class="col-md-6 mb-5">
		<?php if (isset($dados['usuario'])): ?>
			<h2 class="fw-bold mb-0">Edição de Perícia SISPERJUD</h2>
		<?php else: ?>
			<h2 class="fw-bold mb-0">Cadastro de Perícia SISPERJUD</h2>
		<?php endif; ?>
	</div>
	<div class="col-md-6 text-md-end">
		<a href="{url_base}sisperjud/lista" class="btn btn-secondary rounded-pill px-4">Voltar</a>
	</div>
	<form id="formSisperjud" method="post" enctype="multipart/form-data">
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
								<input type="text" name="numero_processo" id="numero_processo" class="processo form-control rounded-3 py-2" required>
							</div>
							<div class="col-12 col-md-6">
								<label class="form-label small fw-bold">Juizo/Juizado</label>
								<input type="text" name="juizo_juizado" id="juizo_juizado" class="form-control rounded-3 py-2" required>
							</div>
						</div>
						<div class="row g-3 mb-4">
							<div class="col-12 col-md-6">
								<label class="form-label small fw-bold">Natureza</label>
								<input type="text" name="natureza" id="natureza" class="form-control rounded-3 py-2" required>
							</div>
							<div class="col-12 col-md-6">
								<label class="form-label small fw-bold">Perito(a)</label>
								<input type="text" name="perito" id="perito" class="form-control rounded-3 py-2" required>
							</div>
						</div>
						<div class="row g-3 mb-4">
							<div class="col-12 col-md-6">
								<label class="form-label small fw-bold">CRM</label>
								<input type="text" name="crm" id="crm" class="form-control rounded-3 py-2" required>
							</div>
							<div class="col-12 col-md-6">
								<label class="form-label small fw-bold">Data da Perícia</label>
								<input type="date" name="data_pericia" id="data_pericia" class="form-control rounded-3 py-2" required>
							</div>
						</div>
						<div class="row g-3 mb-4">
							<div class="col-12 col-md-6">
								<label class="form-label small fw-bold">CPF do Periciando</label>
								<input type="text" name="cpf_periciando" id="cpf_periciando" class="cpf form-control rounded-3 py-2" required>
							</div>
							<div class="col-12 col-md-6">
								<label class="form-label small fw-bold">Nome do Periciando</label>
								<input type="text" name="nome_periciando" id="nome_periciando" class="form-control rounded-3 py-2" required>
							</div>
						</div>
						<div class="row g-3 mb-4">
							<div class="col-8 col-md-4">
								<label class="form-label small fw-bold">RG</label>
								<input type="text" name="rg_periciando" id="rg_periciando" class="form-control rounded-3 py-2" required>
							</div>
							<div class="col-8 col-md-4">
								<label class="form-label small fw-bold">Data de Nascimento</label>
								<input type="date" name="nascimento_periciando" id="nascimento_periciando" class="form-control rounded-3 py-2" required>
							</div>
							<div class="col-8 col-md-4">
								<label class="form-label small fw-bold">Idade</label>
								<input type="number" id="idade_periciando" class="form-control rounded-3 py-2" readonly>
							</div>
						</div>
						<div class="row g-3 mb-4">
							<div class="col-12 col-md-6">
								<label class="form-label small fw-bold">Local da Perícia</label>
								<input type="number" id="local_pericia" name="local_pericia" class="form-control rounded-3 py-2">
							</div>
							<div class="col-12 col-md-6">
								<label class="form-label small fw-bold d-block mb-2">A parte pericianda foi paciente do(a) perito(a)?</label>
								<div class="d-flex gap-3 flex-wrap">
									<div class="form-check">
										<input class="form-check-input" type="radio" name="pacienteNao" id="pacienteNao" value="Não" >
										<label class="form-check-label" for="pacienteNao">
											Não
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="pacienteSim" id="pacienteSim" value="Sim">
										<label class="form-check-label" for="pacienteSim">
											Sim (Impedimento)
										</label>
									</div>
								</div>
							</div>
						</div>
						<div class="row g-3 mb-4">
							<div class="col-12 col-md-6">
								<label class="form-label small fw-bold d-block mb-2">Houve o comparecimento de assistente técnico?</label>
								<div class="d-flex gap-3 flex-wrap">
									<div class="form-check">
										<input class="form-check-input" type="radio" name="comparecimentoNao" id="comparecimentoNao" value="Não" >
										<label class="form-check-label" for="comparecimentoNao">
											Não
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="comparecimentoSim" id="comparecimentoSim" value="Sim">
										<label class="form-check-label" for="comparecimentoSim">
											Sim
										</label>
									</div>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<label class="form-label small fw-bold d-block mb-2">A perícia é feita por telemedicina?</label>
								<div class="d-flex gap-3 flex-wrap">
									<div class="form-check">
										<input class="form-check-input" type="radio" name="telemedicinaNao" id="telemedicinaNao" value="Não" >
										<label class="form-check-label" for="telemedicinaNao">
											Não
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="telemedicinaSim" id="telemedicinaSim" value="Sim">
										<label class="form-check-label" for="telemedicinaSim">
											Sim
										</label>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="accordion-item">
				<h2 class="accordion-header" id="panelsStayOpen-headingTwo">
				<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
					<strong>2. DADOS DA PARTE PERICIANDA</strong>
				</button>
				</h2>
				<div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
					<div class="accordion-body">
						<div class="row g-3 mb-4">
							<div class="col-24 col-md-12">
								<label class="form-label small fw-bold">Nome social</label>
								<input type="text" name="nome_social" id="nome_social" class="form-control rounded-3 py-2" required>
							</div>
						</div>
						<div class="row g-3 mb-4">
							<div class="col-12 col-md-6">
								<label class="form-label small fw-bold d-block mb-2">Sexo Biológico</label>
								<div class="d-flex gap-3 flex-wrap">
									<div class="form-check">
										<input class="form-check-input" type="radio" name="sexo_biologico" id="sexo_biologico_feminino" value="Feminino">
										<label class="form-check-label" for="sexo_biologico_feminino">
											Feminino
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="sexo_biologico" id="sexo_biologico_masculino" value="Masculino">
										<label class="form-check-label" for="sexo_biologico_masculino">
											Masculino
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="sexo_biologico" id="sexo_biologico_intersexo" value="Intersexo">
										<label class="form-check-label" for="sexo_biologico_intersexo">
											Intersexo
										</label>
									</div>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<label class="form-label small fw-bold d-block mb-2">Identidade de gênero</label>
								<div class="d-flex gap-3 flex-wrap">
									<div class="form-check">
										<input class="form-check-input" type="radio" name="identidade_genero" id="identidade_genero_mulher_cisgenero" value="Mulher Cisgênerio">
										<label class="form-check-label" for="identidade_genero_mulher_cisgenero">
											Mulher Cisgênerio
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="identidade_genero" id="identidade_genero_mulher_trangenero" value="Mulher Transgênero">
										<label class="form-check-label" for="identidade_genero_mulher_trangenero">
											Mulher Transgênero
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="identidade_genero" id="identidade_genero_homem_cisgenero" value="Homem Cisgênero">
										<label class="form-check-label" for="identidade_genero_homem_cisgenero">
											Homem Cisgênero
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="identidade_genero" id="identidade_genero_homem_trangenero" value="Homem Transgênero">
										<label class="form-check-label" for="identidade_genero_homem_trangenero">
											Homem Transgênero
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="identidade_genero" id="identidade_genero_genero_nao_binario" value="Gênero não-binário">
										<label class="form-check-label" for="identidade_genero_genero_nao_binario">
											Gênero não-binário
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="identidade_genero" id="identidade_genero_agenero" value="Agênero">
										<label class="form-check-label" for="identidade_genero_agenero">
											Agênero
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="identidade_genero" id="identidade_genero_genero_fluido" value="Gênero fluido">
										<label class="form-check-label" for="identidade_genero_genero_fluido">
											Gênero fluido
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="identidade_genero" id="identidade_genero_bigenero" value="Bigênero">
										<label class="form-check-label" for="identidade_genero_bigenero">
											Bigênero
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="identidade_genero" id="identidade_genero_mulher_transexual" value="Mulher Transgênero">
										<label class="form-check-label" for="identidade_genero_mulher_transexual">
											Mulher Transexual
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="identidade_genero" id="identidade_genero_nao_informado" value="Não Informado">
										<label class="form-check-label" for="identidade_genero_nao_informado">
											Não deseja informar
										</label>
									</div>
								</div>
							</div>
						</div>
						<div class="row g-3 mb-4">
							<div class="col-12 col-md-6">
								<label class="form-label small fw-bold d-block mb-2">Raça (autodeclaratório)</label>
								<div class="d-flex gap-3 flex-wrap">
									<div class="form-check">
										<input class="form-check-input" type="radio" name="raca" id="raca_amarela" value="Amarela">
										<label class="form-check-label" for="raca_amarela">
											Amarela
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="raca" id="raca_branca" value="Branca">
										<label class="form-check-label" for="raca_branca">
											Branca
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="raca" id="raca_preta" value="Preta">
										<label class="form-check-label" for="raca_preta">
											Preta
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="raca" id="raca_parda" value="Parda">
										<label class="form-check-label" for="raca_parda">
											Parda
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="raca" id="raca_indigena" value="Indígena">
										<label class="form-check-label" for="raca_indigena">
											Indígena
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="raca" id="raca_nao_informado" value="Não Informado">
										<label class="form-check-label" for="raca_nao_informado">
											Não deseja informar
										</label>
									</div>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<label class="form-label small fw-bold d-block mb-2">Estado civil</label>
								<div class="d-flex gap-3 flex-wrap">
									<div class="form-check">
										<input class="form-check-input" type="radio" name="estado_civil" id="estado_civil_solteiro" value="Solteiro(a)">
										<label class="form-check-label" for="estado_civil_solteiro">
											Solteiro(a)
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="estado_civil" id="estado_civil_casado" value="Casado(a)">
										<label class="form-check-label" for="estado_civil_casado">
											Casado(a)
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="estado_civil" id="estado_civil_uniao_estavel" value="União Estável">
										<label class="form-check-label" for="estado_civil_uniao_estavel">
											União Estável
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="estado_civil" id="estado_civil_separado_judicialmente" value="Separado(a) judicialmente">
										<label class="form-check-label" for="estado_civil_separado_judicialmente">
											Separado(a) judicialmente
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="estado_civil" id="estado_civil_divorciado" value="Divorciado(a)">
										<label class="form-check-label" for="estado_civil_divorciado">
											Divorciado(a)
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="estado_civil" id="estado_civil_viuvo" value="Viúvo(a)">
										<label class="form-check-label" for="estado_civil_viuvo">
											Viúvo(a)
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="estado_civil" id="estado_civil_nao_informado" value="Não Informado">
										<label class="form-check-label" for="estado_civil_nao_informado">
											Não deseja informar
										</label>
									</div>
								</div>
							</div>
						</div>
						<div class="row g-3 mb-4">
							<div class="col-12 col-md-6">
								<label class="form-label small fw-bold d-block mb-2">Grau de escolaridade</label>
								<div class="d-flex gap-3 flex-wrap">
									<div class="form-check">
										<input class="form-check-input" type="radio" name="grau_escolaridade" id="grau_escolaridade_sem_escolaridade" value="Sem escolaridade">
										<label class="form-check-label" for="grau_escolaridade_sem_escolaridade">
											Sem escolaridade
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="grau_escolaridade" id="grau_escolaridade_ef_incompleto" value="Ensino Fundamental Incompleto">
										<label class="form-check-label" for="grau_escolaridade_ef_incompleto">
											Ensino Fundamental Incompleto
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="grau_escolaridade" id="grau_escolaridade_ef_completo" value="Ensino Fundamental Completo">
										<label class="form-check-label" for="grau_escolaridade_ef_completo">
											Ensino Fundamental Completo
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="grau_escolaridade" id="grau_escolaridade_em_incompleto" value="Ensino Médio Incompleto">
										<label class="form-check-label" for="grau_escolaridade_em_incompleto">
											Ensino Médio Incompleto
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="grau_escolaridade" id="grau_escolaridade_em_completo" value="Ensino Médio Completo">
										<label class="form-check-label" for="grau_escolaridade_em_completo">
											Ensino Médio Completo
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="grau_escolaridade" id="grau_escolaridade_ensino_superior_incompleto" value="Ensino Superior Incompleto">
										<label class="form-check-label" for="grau_escolaridade_ensino_superior_incompleto">
											Ensino Superior Incompleto
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="grau_escolaridade" id="grau_escolaridade_ensino_superior_completo" value="Ensino Superior Completo">
										<label class="form-check-label" for="grau_escolaridade_ensino_superior_completo">
											Ensino Superior Completo
										</label>
									</div>
						        </div>
							</div>
							<div class="col-12 col-md-6">
								<label class="form-label small fw-bold d-block mb-2">UF</label>
								<div class="d-flex gap-3 flex-wrap">
									<div class="form-check">
										<input class="form-check-input" type="radio" name="uf" id="uf_ac" value="AC">
										<label class="form-check-label" for="uf_ac">
											AC
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="uf" id="uf_al" value="AL">
										<label class="form-check-label" for="uf_al">
											AL
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="uf" id="uf_am" value="AM">
										<label class="form-check-label" for="uf_am">
											AM
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="uf" id="uf_ap" value="AP">
										<label class="form-check-label" for="uf_ap">
											AP
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="uf" id="uf_ba" value="BA">
										<label class="form-check-label" for="uf_ba">
											BA
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="uf" id="uf_ce" value="CE">
										<label class="form-check-label" for="uf_ce">
											CE
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="uf" id="uf_df" value="DF">
										<label class="form-check-label" for="uf_df">
											DF
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="uf" id="uf_es" value="ES">
										<label class="form-check-label" for="uf_es">
											ES
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="uf" id="uf_go" value="GO">
										<label class="form-check-label" for="uf_go">
											GO
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="uf" id="uf_ma" value="MA">
										<label class="form-check-label" for="uf_ma">
											MA
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="uf" id="uf_mt" value="MT">
										<label class="form-check-label" for="uf_mt">
											MT
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="uf" id="uf_ms" value="MS">
										<label class="form-check-label" for="uf_ms">
											MS
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="uf" id="uf_mg" value="MG">
										<label class="form-check-label" for="uf_mg">
											MG
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="uf" id="uf_pa" value="PA">
										<label class="form-check-label" for="uf_pa">
											PA
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="uf" id="uf_pb" value="PB">
										<label class="form-check-label" for="uf_pb">
											PB
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="uf" id="uf_pr" value="PR">
										<label class="form-check-label" for="uf_pr">
											PR
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="uf" id="uf_pe" value="PE">
										<label class="form-check-label" for="uf_pe">
											PE
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="uf" id="uf_pi" value="PI">
										<label class="form-check-label" for="uf_pi">
											PI
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="uf" id="uf_rj" value="RJ">
										<label class="form-check-label" for="uf_rj">
											RJ
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="uf" id="uf_rn" value="RN">
										<label class="form-check-label" for="uf_rn">
											RN
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="uf" id="uf_rs" value="RS">
										<label class="form-check-label" for="uf_rs">
											RS
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="uf" id="uf_ro" value="RO">
										<label class="form-check-label" for="uf_ro">
											RO
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="uf" id="uf_rr" value="RR">
										<label class="form-check-label" for="uf_rr">
											RR
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="uf" id="uf_sc" value="SC">
										<label class="form-check-label" for="uf_sc">
											SC
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="uf" id="uf_sp" value="SP">
										<label class="form-check-label" for="uf_sp">
											SP
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="uf" id="uf_se" value="SE">
										<label class="form-check-label" for="uf_se">
											SE
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="uf" id="uf_to" value="TO">
										<label class="form-check-label" for="uf_to">
											TO
										</label>
									</div>

						        </div>
							</div>
						</div>
						<div class="row g-3 mb-4">
							<div class="col-12 col-md-6">
								<label class="form-label small fw-bold">Profissão</label>
								<input type="text" name="profissao" id="profissao" class="form-control rounded-3 py-2" required>
							</div>
							<div class="col-12 col-md-6">
								<label class="form-label small fw-bold">Formação técnico-profissional</label>
								<input type="text" name="formacao" id="formacao" class="form-control rounded-3 py-2" required>
							</div>
						</div>
						<div class="row g-3 mb-4">
							<div class="col-24 col-md-12">
								<label class="form-label small fw-bold">Outras formações técnico-profissionais</label>
								<input type="text" name="outras_formacoes" id="outras_formacoes" class="form-control rounded-3 py-2">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="accordion-item">
				<h2 class="accordion-header" id="panelsStayOpen-headingThree">
				<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
					<strong>3. DADOS COMPLEMENTARES</strong>
				</button>
				</h2>
				<div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
					<div class="accordion-body">
						<div class="row g-3 mb-4">
							<div class="col-12 col-md-6">
								<label class="form-label small fw-bold">a. Qual atividade laboral a parte pericianda declara exercer atualmente?</label>
								<input type="text" name="atividade_laboral" id="atividade_laboral" class="form-control rounded-3 py-2" required>
							</div>
							<div class="col-12 col-md-6">
								<label class="form-label small fw-bold">b. Outras atividades exercidas?</label>
								<input type="text" name="outras_atividades" id="outras_atividades" class="form-control rounded-3 py-2" required>
							</div>
						</div>
						<div class="row g-3 mb-4">
							<div class="col-12 col-md-6">
								<label class="form-label small fw-bold d-block mb-2">c. A parte pericianda já foi submetida à reabilitação profissional?</label>
								<div class="d-flex gap-3 flex-wrap">
									<div class="form-check">
										<input class="form-check-input" type="radio" name="rebilitacao" id="rebilitacaoNao" value="Não">
										<label class="form-check-label" for="rebilitacaoNao">
											Não
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="rebilitacao" id="rebilitacaoSim" value="Sim">
										<label class="form-check-label" for="rebilitacaoSim">
											Sim
										</label>
									</div>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<label class="form-label small fw-bold d-block mb-2">d. O tratamento foi mantido durante a vigência do benefício anterior?</label>
								<div class="d-flex gap-3 flex-wrap">
									<div class="form-check">
										<input class="form-check-input" type="radio" name="tratamento_mantido" id="tratamento_mantidoNao" value="Não" >
										<label class="form-check-label" for="tratamento_mantidoNao">
											Não
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="tratamento_mantido" id="tratamento_mantidoSim" value="Sim">
										<label class="form-check-label" for="tratamento_mantidoSim">
											Sim
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="tratamento_mantido" id="tratamento_mantidoNSA" value="Não Se Aplica">
										<label class="form-check-label" for="tratamento_mantidoNSA">
											Não Se Aplica
										</label>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</form>
</form>
</div>
</main>



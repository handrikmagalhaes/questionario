<main class="container mt-5 pt-5">
	<!-- Form header -->
<div class="row mb-4 align-items-center">
        <div class="col-md-6">
            <?php if (isset($dados['usuario'])): ?>
                <h2 class="fw-bold mb-0">Edição de Perícia SISPERJUD</h2>
            <?php else: ?>
                <h2 class="fw-bold mb-0">Cadastro de Perícia SISPERJUD</h2>
            <?php endif; ?>
        </div>
        <div class="col-md-6 text-md-end">
            <a href="{url_base}sisperjud/lista" class="btn btn-secondary rounded-pill px-4">Voltar</a>
        </div>
    </div>
	<form id="formSisperjud" method="post" enctype="multipart/form-data">
		<div class="accordion" id="accordionPanelsStayOpenExample">
			<div class="accordion-item">
				<h2 class="accordion-header" id="panelsStayOpen-headingOne">
				<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
					<strong>1. Dados da Perícia</strong>
				</button>
				</h2>
				<div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
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
								<label class="form-label small fw-bold">A parte pericianda foi paciente do(a) perito(a)?</label>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="pacienteNao" id="pacienteNao" value="Não" checked>
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
						<div class="row g-3 mb-4">
							<div class="col-12 col-md-6">
								<label class="form-label small fw-bold">Houve o comparecimento de assistente técnico?</label>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="comparecimentoNao" id="comparecimentoNao" value="Não" checked>
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
							<div class="col-12 col-md-6">
								<label class="form-label small fw-bold">A perícia é feita por telemedicina?</label>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="telemedicinaNao" id="telemedicinaNao" value="Não" checked>
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
			<div class="accordion-item">
				<h2 class="accordion-header" id="panelsStayOpen-headingTwo">
				<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
					Accordion Item #2
				</button>
				</h2>
				<div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
				<div class="accordion-body">
					<strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
				</div>
				</div>
			</div>
			<div class="accordion-item">
				<h2 class="accordion-header" id="panelsStayOpen-headingThree">
				<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
					Accordion Item #3
				</button>
				</h2>
				<div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
				<div class="accordion-body">
					<strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
				</div>
				</div>
			</div>
		</div>	
	</form>
    <div class="card border-0 shadow-sm rounded-4">
        <form id="formSisperjud" method="post" enctype="multipart/form-data">
            <div class="card-body">
                            <div class="row">
								<?php if(isset($dados['usuario'])){ ?>
									<div class="col-sm-1">
										<!-- text input -->
										<div class="form-group">
											<label>Código</label>
											<input type="text" readonly disabled class="form-control form-control-sm" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->ID_USUARIO;} ?>">
										</div>
									</div>
								<?php } ?>
								<div class="col-sm-3">
									<!-- text input -->
									<div class="form-group">
										<label>Nome <span class="text-danger">*</span></label>
										<input type="text" class="form-control form-control-sm" id="nome_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->NOME_USUARIO;} ?>">
										<input type="hidden" class="form-control form-control-sm" id="id_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->ID_USUARIO;} ?>">
									</div>
								</div>
								<div class="col-sm-3">
									<!-- select -->
									<div class="form-group">
										<label>Departamento <span class="text-danger">*</span></label>
										<select class="form-control form-control-sm" id="departamento_usuario">
											<option value=""></option>
											<?php foreach ($dados_departamento['departamentos'] as $departamento): ?>
													<option <?php if(isset($dados['usuario']) && $dados['usuario'][0]->ID_DEPARTAMENTO == $departamento->ID_DEPARTAMENTO){echo 'selected';} ?> value="<?php echo $departamento->ID_DEPARTAMENTO; ?>"><?php echo $departamento->TITULO_DEPARTAMENTO; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="col-sm-3">
									<!-- select -->
									<div class="form-group">
										<label>Cargo <span class="text-danger">*</span></label>
										<select class="form-control form-control-sm" id="cargo_usuario">
											<option value=""></option>
											<?php foreach ($dados_cargo['cargos'] as $cargo): ?>
													<option <?php if(isset($dados['usuario']) && $dados['usuario'][0]->ID_CARGO == $cargo->ID_CARGO){echo 'selected';} ?> value="<?php echo $cargo->ID_CARGO; ?>"><?php echo $cargo->TITULO_CARGO; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="col-sm-1 pl-4 pt-4">
									<!-- Indicador de chefia -->
									<?php if (isset($dados['usuario']) && $dados['usuario'][0]->IND_CHEFIA == 1){?>
										<input type="checkbox" class="form-check-input" id="chefia" checked>
									<?php } else { ?>
										<input type="checkbox" class="form-check-input" id="chefia">

									<?php } ?>
                        			<label class="form-check-label" for="exampleCheck1" >Responsável</label>
								</div>

								<div class="col-sm-5">
									<!-- text input -->
									<div class="form-group">
										<label>E-Mail <span class="text-danger">*</span></label>
										<input type="email" class="form-control form-control-sm" id="email_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->EMAIL_USUARIO;} ?>">
									</div>
								</div>
								<div class="col-sm-3">
									<!-- text input -->
									<div class="form-group">
										<label>Login <span class="text-danger">*</span></label>
										<input type="text" class="form-control form-control-sm" id="login_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->LOGIN_USUARIO;} ?>">
									</div>
								</div>
								<?php if(!isset($dados['usuario'])): ?>
									<div class="col-sm-2">
										<!-- text input -->
										<div class="form-group">
											<label>Senha <span class="text-danger">*</span></label>
											<input type="password" class="form-control form-control-sm" id="senha_usuario">
										</div>
									</div>
									<div class="col-sm-2">
										<!-- text input -->
										<div class="form-group">
											<label>Confirme a Senha <span class="text-danger">*</span></label>
											<input type="password" class="form-control form-control-sm" id="confirme_senha_usuario">
										</div>
									</div>
								<?php else: ?>
									<div class="col-xs-12 col-sm-2">
										<label> &nbsp; </label>
										<button class="btn btn-primary w-100" style="height: calc(1.8125rem + 2px);" id="btn-alterar-senha">Alterar Senha</button>
									</div>
								<?php endif; ?>
							</div>
							<div class="row">
								<div class="col-sm-2">
									<!-- text input -->
									<div class="form-group">
										<label>Telefone </label>
										<input type="text" class="form-control form-control-sm" id="telefone_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->TELEFONE_USUARIO;} ?>">
									</div>
								</div>
								<div class="col-sm-2">
									<!-- text input -->
									<div class="form-group">
										<label>Celular </label>
										<input type="text" class="form-control form-control-sm" id="celular_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->CELULAR_USUARIO;} ?>">
									</div>
								</div>
								<div class="col-sm-2">
									<!-- select -->
									<div class="form-group">
										<label>Nível de Acesso <span class="text-danger">*</span></label>
										<select class="form-control form-control-sm" id="nivel_acesso_usuario">
											<option value=""></option>
											<?php foreach ($dados_nivel_acesso['niveis_acesso'] as $nivel_acesso): ?>
												<option <?php if(isset($dados['usuario']) && $dados['usuario'][0]->ID_NIVEL_ACESSO == $nivel_acesso->ID_NIVEL_ACESSO){echo 'selected';} ?> value="<?php echo $nivel_acesso->ID_NIVEL_ACESSO; ?>"><?php echo $nivel_acesso->TITULO_NIVEL_ACESSO; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="col-sm-2">
									<!-- select -->
									<div class="form-group">
										<label>Situação <span class="text-danger">*</span></label>
										<select class="form-control form-control-sm" id="situacao_usuario">
											<option <?php if(isset($dados['usuario']) && $dados['usuario'][0]->IND_SITUACAO_USUARIO == 'A'){echo 'selected';} ?> value="A">Ativo</option>
											<option <?php if(isset($dados['usuario']) && $dados['usuario'][0]->IND_SITUACAO_USUARIO == 'I'){echo 'selected';} ?> value="I">Inativo</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
					
									<div class="col-sm-4">
										<!-- text input -->
										<div class="form-group">
											<label>Foto </label>
											<div class="input-group">
												<div class="input-group-prepend" id="ver-foto" <?php if(!isset($dados['usuario'])){echo 'style="display: none;"';} ?> data-toggle="modal" data-target="#modal-foto-perfil">
							                       <span class="input-group-text"><i class="fas fa-eye text-secondary"></i></span>
							                  	</div>
												<div class="custom-file">
							                      <input type="file" class="custom-file-input" id="arquivo" name="file" accept="image/*">
							                      <input type="hidden" id="nome_arquivo" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->NOME_FOTO_USUARIO;} ?>">
							                      <input type="hidden" id="caminho_arquivo" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->CAMINHO_FOTO_USUARIO;} ?>">
							                      <label class="custom-file-label" style="overflow: hidden;" id="label-arquivo"><?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->NOME_FOTO_USUARIO;} ?></label>
							                    </div>
											</div>
										</div>
									</div>
								</form>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-2">
									<!-- text input -->
									<div class="form-group">
										<label>Ramal </label>
										<input type="text" class="form-control form-control-sm" id="ramal_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->RAMAL_USUARIO;} ?>">
									</div>
								</div>
								<div class="col-sm-2">
									<!-- text input -->
									<div class="form-group">
										<label>Celular Corporativo </label>
										<input type="text" class="form-control form-control-sm" id="celular_corporativo_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->CELULAR_CORPORATIVO_USUARIO;} ?>">
									</div>
								</div>
								<div class="col-sm-2">
									<!-- text input -->
									<div class="form-group">
										<label>Horário de Expediente </label>
										<input type="text" class="form-control form-control-sm" id="horario_expediente_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->HORARIO_EXPEDIENTE_USUARIO;} ?>">
									</div>
								</div>
								<div class="col-sm-2">
									<!-- text input -->
									<div class="form-group">
										<label>Carga Horária </label>
										<input type="text" class="form-control form-control-sm" id="carga_horaria_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->CARGA_HORARIA_USUARIO;} ?>">
									</div>
								</div>
								<div class="col-sm-4">
									<!-- text input -->
									<div class="form-group">
										<label>E-Mail Corporativo </label>
										<input type="text" class="form-control form-control-sm" id="email_corporativo_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->EMAIL_CORPORATIVO_USUARIO;} ?>">
									</div>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-4">
									<!-- text input -->
									<div class="form-group">
										<label>Grau de Escolaridade </label>
										<input type="text" class="form-control form-control-sm" id="grau_escolaridade_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->GRAU_ESCOLARIDADE_USUARIO;} ?>">
									</div>
								</div>
								<div class="col-sm-2">
									<!-- text input -->
									<div class="form-group">
										<label>Data de Nascimento <span class="text-danger">*</span></label>
										<input type="date" class="form-control form-control-sm" id="dt_nascimento_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->DT_NASCIMENTO_USUARIO;} ?>">
									</div>
								</div>
								<div class="col-sm-3">
									<!-- text input -->
									<div class="form-group">
										<label>Naturalidade </label>
										<input type="text" class="form-control form-control-sm" id="naturalidade_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->NATURALIDADE_USUARIO;} ?>">
									</div>
								</div>
								<div class="col-sm-3">
									<!-- text input -->
									<div class="form-group">
										<label>Nacionalidade </label>
										<input type="text" class="form-control form-control-sm" id="nacionalidade_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->NACIONALIDADE_USUARIO;} ?>">
									</div>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-3">
									<!-- text input -->
									<div class="form-group">
										<label>Estado Civil </label>
										<select class="form-control form-control-sm" id="estado_civil_usuario" id="">
											<option value="">Selecione</option>
											<option value="Solteiro(a)" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->ESTADO_CIVIL_USUARIO == 'Solteiro(a)'){echo 'selected';} ?>>Solteiro(a)</option>
											<option value="Casado(a)" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->ESTADO_CIVIL_USUARIO == 'Casado(a)'){echo 'selected';} ?>>Casado(a)</option>
											<option value="Viúvo(a)" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->ESTADO_CIVIL_USUARIO == 'Viúvo(a)'){echo 'selected';} ?>>Viúvo(a)</option>
											<option value="Separado Judicialmente" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->ESTADO_CIVIL_USUARIO == 'Separado Judicialmente'){echo 'selected';} ?>>Separado Judicialmente</option>
											<option value="Divorciado(a)" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->ESTADO_CIVIL_USUARIO == 'Divorciado(a)'){echo 'selected';} ?>>Divorciado(a)</option>
										</select>
									</div>
								</div>
								<div class="col-sm-2">
									<!-- text input -->
									<div class="form-group">
										<label>Sexo </label>
										<select class="form-control form-control-sm" id="sexo_usuario" id="">
											<option value="">Selecione</option>
											<option value="Masculino" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->SEXO_USUARIO == 'Masculino'){echo 'selected';} ?>>Masculino</option>
											<option value="Feminino" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->SEXO_USUARIO == 'Feminino'){echo 'selected';} ?>>Feminino</option>
										</select>
									</div>
								</div>
								<div class="col-sm-5">
									<!-- text input -->
									<div class="form-group">
										<label>Nome do Conjuge </label>
										<input type="text" class="form-control form-control-sm" id="nome_conjuge_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->NOME_CONJUGE_USUARIO;} ?>">
									</div>
								</div>
								<div class="col-sm-2">
									<!-- text input -->
									<div class="form-group">
										<label>Data de Nasc. Conjuge </label>
										<input type="date" class="form-control form-control-sm" id="dt_nasc_conjuge_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->DT_NASC_CONJUGE_USUARIO;} ?>">
									</div>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-5">
									<!-- text input -->
									<div class="form-group">
										<label>Endereço </label>
										<input type="text" class="form-control form-control-sm" id="endereco_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->ENDERECO_USUARIO;} ?>">
									</div>
								</div>
								<div class="col-sm-2">
									<!-- text input -->
									<div class="form-group">
										<label>Bairro </label>
										<input type="text" class="form-control form-control-sm" id="bairro_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->BAIRRO_USUARIO;} ?>">
									</div>
								</div>
								<div class="col-sm-5">
									<!-- text input -->
									<div class="form-group">
										<label>Complemento </label>
										<input type="text" class="form-control form-control-sm" id="complemento_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->COMPLEMENTO_USUARIO;} ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<!-- text input -->
									<div class="form-group">
										<label>Cidade </label>
										<input type="text" class="form-control form-control-sm" id="cidade_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->CIDADE_USUARIO;} ?>">
									</div>
								</div>
								<div class="col-sm-2">
									<!-- text input -->
									<div class="form-group">
										<label>Estado </label>
										<select id="estado_usuario" class="form-control form-control-sm">
											<option value="">Selecione</option>
											<option value="AC" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->ESTADO_USUARIO == 'AC' ){ echo 'selected'; } ?>>Acre</option>
											<option value="AL" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->ESTADO_USUARIO == 'AL' ){ echo 'selected'; } ?>>Alagoas</option>
											<option value="AP" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->ESTADO_USUARIO == 'AP' ){ echo 'selected'; } ?>>Amapá</option>
											<option value="AM" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->ESTADO_USUARIO == 'AM' ){ echo 'selected'; } ?>>Amazonas</option>
											<option value="BA" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->ESTADO_USUARIO == 'BA' ){ echo 'selected'; } ?>>Bahia</option>
											<option value="CE" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->ESTADO_USUARIO == 'CE' ){ echo 'selected'; } ?>>Ceará</option>
											<option value="DF" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->ESTADO_USUARIO == 'DF' ){ echo 'selected'; } ?>>Distrito Federal</option>
											<option value="ES" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->ESTADO_USUARIO == 'ES' ){ echo 'selected'; } ?>>Espirito Santo</option>
											<option value="GO" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->ESTADO_USUARIO == 'GO' ){ echo 'selected'; } ?>>Goiás</option>
											<option value="MA" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->ESTADO_USUARIO == 'MA' ){ echo 'selected'; } ?>>Maranhão</option>
											<option value="MS" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->ESTADO_USUARIO == 'MS' ){ echo 'selected'; } ?>>Mato Grosso do Sul</option>
											<option value="MT" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->ESTADO_USUARIO == 'MT' ){ echo 'selected'; } ?>>Mato Grosso</option>
											<option value="MG" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->ESTADO_USUARIO == 'MG' ){ echo 'selected'; } ?>>Minas Gerais</option>
											<option value="PA" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->ESTADO_USUARIO == 'PA' ){ echo 'selected'; } ?>>Pará</option>
											<option value="PB" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->ESTADO_USUARIO == 'PB' ){ echo 'selected'; } ?>>Paraíba</option>
											<option value="PR" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->ESTADO_USUARIO == 'PR' ){ echo 'selected'; } ?>>Paraná</option>
											<option value="PE" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->ESTADO_USUARIO == 'PE' ){ echo 'selected'; } ?>>Pernambuco</option>
											<option value="PI" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->ESTADO_USUARIO == 'PI' ){ echo 'selected'; } ?>>Piauí</option>
											<option value="RJ" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->ESTADO_USUARIO == 'RJ' ){ echo 'selected'; } ?>>Rio de Janeiro</option>
											<option value="RN" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->ESTADO_USUARIO == 'RN' ){ echo 'selected'; } ?>>Rio Grande do Norte</option>
											<option value="RS" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->ESTADO_USUARIO == 'RS' ){ echo 'selected'; } ?>>Rio Grande do Sul</option>
											<option value="RO" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->ESTADO_USUARIO == 'RO' ){ echo 'selected'; } ?>>Rondônia</option>
											<option value="RR" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->ESTADO_USUARIO == 'RR' ){ echo 'selected'; } ?>>Roraima</option>
											<option value="SC" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->ESTADO_USUARIO == 'SC' ){ echo 'selected'; } ?>>Santa Catarina</option>
											<option value="SP" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->ESTADO_USUARIO == 'SP' ){ echo 'selected'; } ?>>São Paulo</option>
											<option value="SE" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->ESTADO_USUARIO == 'SE' ){ echo 'selected'; } ?>>Sergipe</option>
											<option value="TO" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->ESTADO_USUARIO == 'TO' ){ echo 'selected'; } ?>>Tocantins</option>
										</select>
									</div>
								</div>
								<div class="col-sm-2">
									<!-- text input -->
									<div class="form-group">
										<label>CEP </label>
										<input type="text" class="form-control form-control-sm" id="cep_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->CEP_USUARIO;} ?>">
									</div>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-3">
									<!-- text input -->
									<div class="form-group">
										<label>Nº Carteira de Trabalho </label>
										<input type="text" class="form-control form-control-sm" id="num_cart_trab_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->NUM_CART_TRAB_USUARIO;} ?>">
									</div>
								</div>
								<div class="col-sm-2">
									<!-- text input -->
									<div class="form-group">
										<label>Data de Expedição </label>
										<input type="date" class="form-control form-control-sm" id="dt_exp_cart_trab_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->DT_EXP_CART_TRAB_USUARIO;} ?>">
									</div>
								</div>
								<div class="col-sm-2">
									<!-- text input -->
									<div class="form-group">
										<label>Série </label>
										<input type="text" class="form-control form-control-sm" id="serie_cart_trab_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->SERIE_CART_TRAB_USUARIO;} ?>">
									</div>
								</div>
								<div class="col-sm-2">
									<!-- text input -->
									<div class="form-group">
										<label>UF </label>
										<select id="uf_cart_trab_usuario" class="form-control form-control-sm">
											<option value="">Selecione</option>
											<option value="AC" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_CART_TRAB_USUARIO == 'AC' ){ echo 'selected'; } ?>>AC</option>
											<option value="AL" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_CART_TRAB_USUARIO == 'AL' ){ echo 'selected'; } ?>>AL</option>
											<option value="AP" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_CART_TRAB_USUARIO == 'AP' ){ echo 'selected'; } ?>>AP</option>
											<option value="AM" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_CART_TRAB_USUARIO == 'AM' ){ echo 'selected'; } ?>>AM</option>
											<option value="BA" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_CART_TRAB_USUARIO == 'BA' ){ echo 'selected'; } ?>>BA</option>
											<option value="CE" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_CART_TRAB_USUARIO == 'CE' ){ echo 'selected'; } ?>>CE</option>
											<option value="DF" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_CART_TRAB_USUARIO == 'DF' ){ echo 'selected'; } ?>>DF</option>
											<option value="ES" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_CART_TRAB_USUARIO == 'ES' ){ echo 'selected'; } ?>>ES</option>
											<option value="GO" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_CART_TRAB_USUARIO == 'GO' ){ echo 'selected'; } ?>>GO</option>
											<option value="MA" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_CART_TRAB_USUARIO == 'MA' ){ echo 'selected'; } ?>>MA</option>
											<option value="MS" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_CART_TRAB_USUARIO == 'MS' ){ echo 'selected'; } ?>>MS</option>
											<option value="MT" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_CART_TRAB_USUARIO == 'MT' ){ echo 'selected'; } ?>>MT</option>
											<option value="MG" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_CART_TRAB_USUARIO == 'MG' ){ echo 'selected'; } ?>>MG</option>
											<option value="PA" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_CART_TRAB_USUARIO == 'PA' ){ echo 'selected'; } ?>>PA</option>
											<option value="PB" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_CART_TRAB_USUARIO == 'PB' ){ echo 'selected'; } ?>>PB</option>
											<option value="PR" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_CART_TRAB_USUARIO == 'PR' ){ echo 'selected'; } ?>>PR</option>
											<option value="PE" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_CART_TRAB_USUARIO == 'PE' ){ echo 'selected'; } ?>>PE</option>
											<option value="PI" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_CART_TRAB_USUARIO == 'PI' ){ echo 'selected'; } ?>>PI</option>
											<option value="RJ" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_CART_TRAB_USUARIO == 'RJ' ){ echo 'selected'; } ?>>RJ</option>
											<option value="RN" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_CART_TRAB_USUARIO == 'RN' ){ echo 'selected'; } ?>>RN</option>
											<option value="RS" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_CART_TRAB_USUARIO == 'RS' ){ echo 'selected'; } ?>>RS</option>
											<option value="RO" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_CART_TRAB_USUARIO == 'RO' ){ echo 'selected'; } ?>>RO</option>
											<option value="RR" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_CART_TRAB_USUARIO == 'RR' ){ echo 'selected'; } ?>>RR</option>
											<option value="SC" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_CART_TRAB_USUARIO == 'SC' ){ echo 'selected'; } ?>>SC</option>
											<option value="SP" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_CART_TRAB_USUARIO == 'SP' ){ echo 'selected'; } ?>>SP</option>
											<option value="SE" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_CART_TRAB_USUARIO == 'SE' ){ echo 'selected'; } ?>>SE</option>
											<option value="TO" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_CART_TRAB_USUARIO == 'TO' ){ echo 'selected'; } ?>>TO</option>
										</select>
									</div>
								</div>
								<div class="col-sm-3">
									<!-- text input -->
									<div class="form-group">
										<label>CPF </label>
										<input type="text" class="form-control form-control-sm" id="cpf_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->CPF_USUARIO;} ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3">
									<!-- text input -->
									<div class="form-group">
										<label>Nº Identidade </label>
										<input type="text" class="form-control form-control-sm" id="num_identidade_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->NUM_IDENTIDADE_USUARIO;} ?>">
									</div>
								</div>
								<div class="col-sm-2">
									<!-- text input -->
									<div class="form-group">
										<label>Data Expedição </label>
										<input type="date" class="form-control form-control-sm" id="dt_exp_identidade_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->DT_EXP_IDENTIDADE_USUARIO;} ?>">
									</div>
								</div>
								<div class="col-sm-2">
									<!-- text input -->
									<div class="form-group">
										<label>Orgão Expedidor </label>
										<input type="text" class="form-control form-control-sm" id="orgao_exp_identidade_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->ORGAO_EXP_IDENTIDADE_USUARIO;} ?>">
									</div>
								</div>
								<div class="col-sm-2">
									<!-- text input -->
									<div class="form-group">
										<label>UF </label>
										<select id="uf_identidade_usuario" class="form-control form-control-sm">
											<option value="">Selecione</option>
											<option value="AC" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_IDENTIDADE_USUARIO == 'AC' ){ echo 'selected'; } ?>>AC</option>
											<option value="AL" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_IDENTIDADE_USUARIO == 'AL' ){ echo 'selected'; } ?>>AL</option>
											<option value="AP" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_IDENTIDADE_USUARIO == 'AP' ){ echo 'selected'; } ?>>AP</option>
											<option value="AM" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_IDENTIDADE_USUARIO == 'AM' ){ echo 'selected'; } ?>>AM</option>
											<option value="BA" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_IDENTIDADE_USUARIO == 'BA' ){ echo 'selected'; } ?>>BA</option>
											<option value="CE" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_IDENTIDADE_USUARIO == 'CE' ){ echo 'selected'; } ?>>CE</option>
											<option value="DF" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_IDENTIDADE_USUARIO == 'DF' ){ echo 'selected'; } ?>>DF</option>
											<option value="ES" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_IDENTIDADE_USUARIO == 'ES' ){ echo 'selected'; } ?>>ES</option>
											<option value="GO" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_IDENTIDADE_USUARIO == 'GO' ){ echo 'selected'; } ?>>GO</option>
											<option value="MA" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_IDENTIDADE_USUARIO == 'MA' ){ echo 'selected'; } ?>>MA</option>
											<option value="MS" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_IDENTIDADE_USUARIO == 'MS' ){ echo 'selected'; } ?>>MS</option>
											<option value="MT" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_IDENTIDADE_USUARIO == 'MT' ){ echo 'selected'; } ?>>MT</option>
											<option value="MG" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_IDENTIDADE_USUARIO == 'MG' ){ echo 'selected'; } ?>>MG</option>
											<option value="PA" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_IDENTIDADE_USUARIO == 'PA' ){ echo 'selected'; } ?>>PA</option>
											<option value="PB" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_IDENTIDADE_USUARIO == 'PB' ){ echo 'selected'; } ?>>PB</option>
											<option value="PR" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_IDENTIDADE_USUARIO == 'PR' ){ echo 'selected'; } ?>>PR</option>
											<option value="PE" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_IDENTIDADE_USUARIO == 'PE' ){ echo 'selected'; } ?>>PE</option>
											<option value="PI" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_IDENTIDADE_USUARIO == 'PI' ){ echo 'selected'; } ?>>PI</option>
											<option value="RJ" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_IDENTIDADE_USUARIO == 'RJ' ){ echo 'selected'; } ?>>RJ</option>
											<option value="RN" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_IDENTIDADE_USUARIO == 'RN' ){ echo 'selected'; } ?>>RN</option>
											<option value="RS" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_IDENTIDADE_USUARIO == 'RS' ){ echo 'selected'; } ?>>RS</option>
											<option value="RO" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_IDENTIDADE_USUARIO == 'RO' ){ echo 'selected'; } ?>>RO</option>
											<option value="RR" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_IDENTIDADE_USUARIO == 'RR' ){ echo 'selected'; } ?>>RR</option>
											<option value="SC" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_IDENTIDADE_USUARIO == 'SC' ){ echo 'selected'; } ?>>SC</option>
											<option value="SP" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_IDENTIDADE_USUARIO == 'SP' ){ echo 'selected'; } ?>>SP</option>
											<option value="SE" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_IDENTIDADE_USUARIO == 'SE' ){ echo 'selected'; } ?>>SE</option>
											<option value="TO" <?php if(isset($dados['usuario']) && $dados['usuario'][0]->UF_IDENTIDADE_USUARIO == 'TO' ){ echo 'selected'; } ?>>TO</option>
										</select>
									</div>
								</div>
								<div class="col-sm-3">
									<!-- text input -->
									<div class="form-group">
										<label>Nº Certificado Militar </label>
										<input type="text" class="form-control form-control-sm" id="num_cert_militar_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->NUM_CERT_MILITAR_USUARIO;} ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3">
									<!-- text input -->
									<div class="form-group">
										<label>Nº Titulo de Eleitor </label>
										<input type="text" class="form-control form-control-sm" id="num_tit_eleitor_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->NUM_TIT_ELEITOR_USUARIO;} ?>">
									</div>
								</div>
								<div class="col-sm-1">
									<!-- text input -->
									<div class="form-group">
										<label>Zona </label>
										<input type="text" class="form-control form-control-sm" id="zona_tit_eleitor_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->ZONA_TIT_ELEITOR_USUARIO;} ?>">
									</div>
								</div>
								<div class="col-sm-1">
									<!-- text input -->
									<div class="form-group">
										<label>Seção </label>
										<input type="text" class="form-control form-control-sm" id="secao_tit_eleitor_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->SECAO_TIT_ELEITOR_USUARIO;} ?>">
									</div>
								</div>
								<div class="col-sm-3">
									<!-- text input -->
									<div class="form-group">
										<label>Nº Carteira Nacional de Habilitação </label>
										<input type="text" class="form-control form-control-sm" id="num_cnh_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->NUM_CNH_USUARIO;} ?>">
									</div>
								</div>
								<div class="col-sm-2">
									<!-- text input -->
									<div class="form-group">
										<label>Categoria </label>
										<input type="text" class="form-control form-control-sm" id="categoria_cnh_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->CATEGORIA_CNH_USUARIO;} ?>">
									</div>
								</div>
								<div class="col-sm-2">
									<!-- text input -->
									<div class="form-group">
										<label>Validade </label>
										<input type="DATE" class="form-control form-control-sm" id="validade_cnh_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->VALIDADE_CNH_USUARIO;} ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-2">
									<!-- text input -->
									<div class="form-group">
										<label>Data de Admissão </label>
										<input type="DATE" class="form-control form-control-sm" id="dt_admissao_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->DT_ADMISSAO_USUARIO;} ?>">
									</div>
								</div>
								<div class="col-sm-2">
									<!-- text input -->
									<div class="form-group">
										<label>Data de Demissão </label>
										<input type="DATE" class="form-control form-control-sm" id="dt_demissao_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->DT_DEMISSAO_USUARIO;} ?>">
									</div>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-6">
									<!-- text input -->
									<div class="form-group">
										<label>Orgão de Classe </label>
										<input type="text" class="form-control form-control-sm" id="nome_orgao_classe_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->NOME_ORGAO_CLASSE_USUARIO;} ?>">
									</div>
								</div>
								<div class="col-sm-3">
									<!-- text input -->
									<div class="form-group">
										<label>Nº de Registro </label>
										<input type="text" class="form-control form-control-sm" id="num_orgao_classe_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->NUM_ORGAO_CLASSE_USUARIO;} ?>">
									</div>
								</div>
								<div class="col-sm-2">
									<!-- text input -->
									<div class="form-group">
										<label>Data de Registro </label>
										<input type="date" class="form-control form-control-sm" id="validade_orgao_classe_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->VALIDADE_ORGAO_CLASSE_USUARIO;} ?>">
									</div>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-3">
									<!-- text input -->
									<div class="form-group">
										<label>Nº PIS </label>
										<input type="text" class="form-control form-control-sm" id="num_pis_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->NUM_PIS_USUARIO;} ?>">
									</div>
								</div>
								<div class="col-sm-6">
									<!-- text input -->
									<div class="form-group">
										<label>Banco </label>
										<input type="text" class="form-control form-control-sm" id="banco_pis_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->BANCO_PIS_USUARIO;} ?>">
									</div>
								</div>
								<div class="col-sm-2">
									<!-- text input -->
									<div class="form-group">
										<label>Data de Cadastro </label>
										<input type="date" class="form-control form-control-sm" id="dt_cadastro_pis_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->DT_CADASTRO_PIS_USUARIO;} ?>">
									</div>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-6">
									<!-- text input -->
									<div class="form-group">
										<label>Nome do Pai </label>
										<input type="text" class="form-control form-control-sm" id="nome_pai_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->NOME_PAI_USUARIO;} ?>">
									</div>
								</div>
								<div class="col-sm-6">
									<!-- text input -->
									<div class="form-group">
										<label>Nome da Mãe </label>
										<input type="text" class="form-control form-control-sm" id="nome_mae_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->NOME_MAE_USUARIO;} ?>">
									</div>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-4">
									<!-- text input -->
									<div class="form-group">
										<label>Plano de Saúde </label>
										<input type="text" class="form-control form-control-sm" id="plano_saude_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->PLANO_SAUDE_USUARIO;} ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<!-- text input -->
									<div class="form-group">
										<label>Nome do Contato de Emergência </label>
										<input type="text" class="form-control form-control-sm" id="nome_contato_emergencia_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->NOME_CONTATO_EMERGENCIA_USUARIO;} ?>">
									</div>
								</div>
								<div class="col-sm-2">
									<!-- text input -->
									<div class="form-group">
										<label>Telefone </label>
										<input type="text" class="form-control form-control-sm" id="telefone_contato_emergencia_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->TELEFONE_CONTATO_EMERGENCIA_USUARIO;} ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<!-- text input -->
									<div class="form-group">
										<label>Nome do Contato de Emergência</label>
										<input type="text" class="form-control form-control-sm" id="nome_contato_emergencia_2_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->NOME_CONTATO_EMERGENCIA_2_USUARIO;} ?>">
									</div>
								</div>
								<div class="col-sm-2">
									<!-- text input -->
									<div class="form-group">
										<label>Telefone </label>
										<input type="text" class="form-control form-control-sm" id="telefone_contato_emergencia_2_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->TELEFONE_CONTATO_EMERGENCIA_2_USUARIO;} ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<!-- text input -->
									<div class="form-group">
										<label>Nome do Contato de Emergência</label>
										<input type="text" class="form-control form-control-sm" id="nome_contato_emergencia_3_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->NOME_CONTATO_EMERGENCIA_3_USUARIO;} ?>">
									</div>
								</div>
								<div class="col-sm-2">
									<!-- text input -->
									<div class="form-group">
										<label>Telefone </label>
										<input type="text" class="form-control form-control-sm" id="telefone_contato_emergencia_3_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->TELEFONE_CONTATO_EMERGENCIA_3_USUARIO;} ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<!-- text input -->
									<div class="form-group">
										<label>Nome do Contato de Emergência</label>
										<input type="text" class="form-control form-control-sm" id="nome_contato_emergencia_4_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->NOME_CONTATO_EMERGENCIA_4_USUARIO;} ?>">
									</div>
								</div>
								<div class="col-sm-2">
									<!-- text input -->
									<div class="form-group">
										<label>Telefone </label>
										<input type="text" class="form-control form-control-sm" id="telefone_contato_emergencia_4_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->TELEFONE_CONTATO_EMERGENCIA_4_USUARIO;} ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<!-- text input -->
									<div class="form-group">
										<label>Nome do Contato de Emergência</label>
										<input type="text" class="form-control form-control-sm" id="nome_contato_emergencia_5_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->NOME_CONTATO_EMERGENCIA_5_USUARIO;} ?>">
									</div>
								</div>
								<div class="col-sm-2">
									<!-- text input -->
									<div class="form-group">
										<label>Telefone </label>
										<input type="text" class="form-control form-control-sm" id="telefone_contato_emergencia_5_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->TELEFONE_CONTATO_EMERGENCIA_5_USUARIO;} ?>">
									</div>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-6">
									<!-- text input -->
									<div class="form-group">
										<label>Filho</label>
										<input type="text" class="form-control form-control-sm" id="nome_filho_1_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->NOME_FILHO_1_USUARIO;} ?>">
									</div>
								</div>
								<div class="col-sm-2">
									<!-- text input -->
									<div class="form-group">
										<label>Data de Nascimento</label>
										<input type="date" class="form-control form-control-sm" id="dt_nascimento_filho_1_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->DT_NASCIMENTO_FILHO_1_USUARIO;} ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<!-- text input -->
									<div class="form-group">
										<label>Filho</label>
										<input type="text" class="form-control form-control-sm" id="nome_filho_2_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->NOME_FILHO_2_USUARIO;} ?>">
									</div>
								</div>
								<div class="col-sm-2">
									<!-- text input -->
									<div class="form-group">
										<label>Data de Nascimento</label>
										<input type="date" class="form-control form-control-sm" id="dt_nascimento_filho_2_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->DT_NASCIMENTO_FILHO_2_USUARIO;} ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<!-- text input -->
									<div class="form-group">
										<label>Filho</label>
										<input type="text" class="form-control form-control-sm" id="nome_filho_3_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->NOME_FILHO_3_USUARIO;} ?>">
									</div>
								</div>
								<div class="col-sm-2">
									<!-- text input -->
									<div class="form-group">
										<label>Data de Nascimento</label>
										<input type="date" class="form-control form-control-sm" id="dt_nascimento_filho_3_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->DT_NASCIMENTO_FILHO_3_USUARIO;} ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<!-- text input -->
									<div class="form-group">
										<label>Filho</label>
										<input type="text" class="form-control form-control-sm" id="nome_filho_4_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->NOME_FILHO_4_USUARIO;} ?>">
									</div>
								</div>
								<div class="col-sm-2">
									<!-- text input -->
									<div class="form-group">
										<label>Data de Nascimento</label>
										<input type="date" class="form-control form-control-sm" id="dt_nascimento_filho_4_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->DT_NASCIMENTO_FILHO_4_USUARIO;} ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<!-- text input -->
									<div class="form-group">
										<label>Filho</label>
										<input type="text" class="form-control form-control-sm" id="nome_filho_5_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->NOME_FILHO_5_USUARIO;} ?>">
									</div>
								</div>
								<div class="col-sm-2">
									<!-- text input -->
									<div class="form-group">
										<label>Data de Nascimento</label>
										<input type="date" class="form-control form-control-sm" id="dt_nascimento_filho_5_usuario" value="<?php if(isset($dados['usuario'])){echo $dados['usuario'][0]->DT_NASCIMENTO_FILHO_5_USUARIO;} ?>">
									</div>
								</div>
							</div>
						</div>
</div>
                <div class="card-footer border-0 d-flex justify-content-end gap-2">
                    <button type="button" class="btn btn-secondary" id="btn_cancelar" onclick="history.go(-1)">Voltar</button>
                    <?php if (isset($dados['usuario'])): ?>
                        <button type="button" class="btn btn-primary" id="btn_editar_continuar">Alterar e Continuar</button>
                        <button type="button" class="btn btn-primary" id="btn_editar_voltar">Alterar</button>
                    <?php else: ?>
                        <button type="button" class="btn btn-primary" id="btn_salvar_continuar">Inserir e Continuar</button>
                        <button type="button" class="btn btn-primary" id="btn_salvar_voltar">Inserir</button>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </main>

<div class="modal fade" tabindex="-1" id="modal-foto-perfil">
  <div class="modal-dialog modal-sm">
    <div class="modal-content rounded-4">
      <div class="modal-header">
        <h5 class="modal-title">Foto do perfil</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <img class="img-fluid" id="img-foto" src="<?php if(isset($dados['usuario'])){echo '.'.$dados['usuario'][0]->CAMINHO_FOTO_USUARIO;} ?>">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="history.go(-1)">Voltar</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL ALTERAR SENHA -->
<div id="modal-alterar-senha" class="modal fade" tabindex="-1">
  <div class="modal-dialog modal-sm">
    <div class="modal-content rounded-4">
      <div class="modal-header">
        <h5 class="modal-title">Alterar Senha</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="mensagem-senha" class="alert sr-only" role="alert">
          <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="alert"></button>
          <span id="mensagem">Mensagem!</span>
        </div>
        <div class="mb-3">
          <label class="form-label">Nova Senha:</label>
          <input type="password" class="form-control" id="msenha" autocomplete="off">
        </div>
        <div class="mb-3">
          <label class="form-label">Confirmar Nova Senha:</label>
          <input type="password" class="form-control" id="mconfirmar-senha" autocomplete="off">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="btn-alterar-senha-modal">Alterar</button>
      </div>
    </div>
  </div>
</div>
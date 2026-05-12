<div class="content-wrapper" style="min-height: 1244.06px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mt-1">
				<div class="col-sm-6">
	                <?php if (isset($dados['feedback'])): ?>
						<h1>Edição de {titulo}</h1>
	                <?php else: ?>
						<h1>Cadastro de {titulo}</h1>
	                <?php endif; ?>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">{titulo}</a></li>
						<li class="breadcrumb-item active">Cadastro de {titulo}</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card card-warning">
						<div class="card-body">
							<form role="form">
								<div class="row">
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Título <span class="text-danger">*</span></label>
											<input type="text" class="form-control form-control-sm" id="titulo_feedback" value="<?php if(isset($dados['feedback'])){echo $dados['feedback'][0]->TITULO_FEEDBACK;} ?>">
											<input type="hidden" class="form-control form-control-sm" id="id_feedback" value="<?php if(isset($dados['feedback'])){echo $dados['feedback'][0]->ID_FEEDBACK;} ?>">
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Departamento <span class="text-danger">*</span></label>
											<select class="form-control form-control-sm" id="departamento_feedback">
												<option value="0">Todos os Departamentos</option>
												<?php foreach ($dados_departamento['departamento'] as $departamento): ?>
														<option <?php if(isset($dados['feedback']) && $dados['feedback'][0]->ID_DEPARTAMENTO == $departamento->ID_DEPARTAMENTO){echo 'selected';} ?> value="<?php echo $departamento->ID_DEPARTAMENTO; ?>"><?php echo $departamento->TITULO_DEPARTAMENTO; ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
									<div class="col-sm-2">
										<!-- select -->
										<div class="form-group">
											<label>Tipo <span class="text-danger">*</span></label>
											<select class="form-control form-control-sm" id="tipo_feedback">
												<option></option>
												<option <?php if(isset($dados['feedback']) && $dados['feedback'][0]->IND_TIPO_FEEDBACK == 'S'){echo 'selected';} ?> value="S">Sugestões</option>
												<option <?php if(isset($dados['feedback']) && $dados['feedback'][0]->IND_TIPO_FEEDBACK == 'C'){echo 'selected';} ?> value="C">Críticas</option>
												<option <?php if(isset($dados['feedback']) && $dados['feedback'][0]->IND_TIPO_FEEDBACK == 'E'){echo 'selected';} ?> value="E">Elogios</option>
											</select>
										</div>
									</div>
									<div class="col-sm-2">
										<!-- select -->
										<div class="form-group">
											<label>Situação <span class="text-danger">*</span></label>
											<select class="form-control form-control-sm" id="situacao_feedback">
												<option <?php if(isset($dados['feedback']) && $dados['feedback'][0]->IND_SITUACAO_FEEDBACK == 'A'){echo 'selected';} ?> value="A">Ativo</option>
												<option <?php if(isset($dados['feedback']) && $dados['feedback'][0]->IND_SITUACAO_FEEDBACK == 'I'){echo 'selected';} ?> value="I">Inativo</option>
											</select>
										</div>
									</div>
									<div class="col-sm-2 pt-4">
										<!-- checkbox -->
										<div class="form-group form-check">
											<?php if(isset($dados['feedback']) && $dados['feedback'][0]->ANONIMO == 1){ ?>
												<input type="checkbox" class="form-check-input" id="anonimo" checked>
											<?php } else { ?>
												<input type="checkbox" class="form-check-input" id="anonimo">
											<?php } ?>											
											<label class="form-check-label" for="exampleCheck1" >Anonimo</label>
										</div>
									</div>

								</div>
								<div class="row">
									<div class="col-sm-12">
										<!-- textarea -->
										<div class="form-group">
											<label>Descrição <span class="text-danger">*</span></label>
											<textarea class="textarea" rows="5" id="descricao_feedback"><?php if(isset($dados['feedback'])){echo $dados['feedback'][0]->DESCRICAO_FEEDBACK;} ?></textarea>
										</div>
									</div>
								</div>
							</form>
						</div>
						<div class="card-footer">
				        	<a href="#" class="btn btn-default float-left" id="btn_cancelar"onclick="history.go(-1)">Voltar</a>
	                        <?php if (isset($dados['feedback'])): ?>
								<button type="button" class="btn btn-primary float-right mr-2" id="btn_editar_continuar">Alterar e Continuar</button>
				        		<button type="button" class="btn btn-primary float-right mr-2" id="btn_editar_voltar">Alterar</button>
								
	                        <?php else: ?>
				        		<button type="button" class="btn btn-primary float-right mr-2" id="btn_salvar_continuar">Inserir e Continuar</button>
								<button type="button" class="btn btn-primary float-right mr-2" id="btn_salvar_voltar">Inserir</button>
                            <?php endif; ?>
				        </div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
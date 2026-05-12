<div class="content-wrapper" style="min-height: 1244.06px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mt-1">
				<div class="col-sm-6">
	                <?php if (isset($dados['cargo'])): ?>
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
									<div class="col-sm-4">
										<!-- text input -->
										<div class="form-group">
											<label>Título <span class="text-danger">*</span></label>
											<input type="text" class="form-control form-control-sm" id="titulo_cargo" value="<?php if(isset($dados['cargo'])){echo $dados['cargo'][0]->TITULO_CARGO;} ?>">
											<input type="hidden" class="form-control form-control-sm" id="id_cargo" value="<?php if(isset($dados['cargo'])){echo $dados['cargo'][0]->ID_CARGO;} ?>">
										</div>
									</div>
									<div class="col-sm-4">
										<!-- select -->
										<div class="form-group">
											<label>Situação <span class="text-danger">*</span></label>
											<select class="form-control form-control-sm" id="situacao_cargo">
												<option <?php if(isset($dados['cargo']) && $dados['cargo'][0]->IND_SITUACAO_CARGO == 'A'){echo 'selected';} ?> value="A">Ativo</option>
												<option <?php if(isset($dados['cargo']) && $dados['cargo'][0]->IND_SITUACAO_CARGO == 'I'){echo 'selected';} ?> value="I">Inativo</option>
											</select>
										</div>
									</div>
									<div class="col-sm-4">
										<!-- select -->
										<div class="form-group">
											<label>Nível <span class="text-danger">*</span></label>
											<select class="form-control form-control-sm" id="nivel_cargo">
												<option <?php if(isset($dados['cargo']) && $dados['cargo'][0]->IND_NIVEL_CARGO == '1'){echo 'selected';} ?> value="1">Nível I</option>
												<option <?php if(isset($dados['cargo']) && $dados['cargo'][0]->IND_NIVEL_CARGO == '2'){echo 'selected';} ?> value="2">Nível II</option>
												<option <?php if(isset($dados['cargo']) && $dados['cargo'][0]->IND_NIVEL_CARGO == '3'){echo 'selected';} ?> value="3">Nível III</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<!-- textarea -->
										<div class="form-group">
											<label>Descrição </label>
											<textarea class="textarea" rows="5" id="descricao_cargo"><?php if(isset($dados['cargo'])){echo $dados['cargo'][0]->DESCRICAO_CARGO;} ?></textarea>
										</div>
									</div>
								</div>
							</form>
						</div>
						<div class="card-footer">
				        	<a href="#" class="btn btn-default float-left" id="btn_cancelar"onclick="history.go(-1)">Voltar</a>
	                        <?php if (isset($dados['cargo'])): ?>
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
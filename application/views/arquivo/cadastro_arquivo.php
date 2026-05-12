<div class="content-wrapper" style="min-height: 1244.06px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mt-1">
				<div class="col-sm-6">
	                <?php if (isset($dados['arquivo'])): ?>
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
				<div class="col-md-9">
					<div class="card card-warning">
						<div class="card-body">
							<div class="row">
								<div class="col-sm-6">
									<!-- text input -->
									<div class="form-group">
										<label>Título <span class="text-danger">*</span></label>
										<input type="text" class="form-control form-control-sm" id="titulo_arquivo" value="<?php if(isset($dados['arquivo'])){echo $dados['arquivo'][0]->TITULO_ARQUIVO;} ?>">
										<input type="hidden" class="form-control form-control-sm" id="id_arquivo" value="<?php if(isset($dados['arquivo'])){echo $dados['arquivo'][0]->ID_ARQUIVO;} ?>">
									</div>
								</div>
								<form id="formArquivo" method="post" enctype="multipart/form-data" style="display: contents;">
									<div class="col-sm-3">
										<!-- select -->
										<div class="form-group">
											<label>Tipo <span class="text-danger">*</span></label>
											<select class="form-control form-control-sm" id="tipo_arquivo" name="tipo">
												<option value=""></option>
												<?php foreach ($dados_tipo_arquivo['tipos_arquivo'] as $tipo_arquivo): ?>
													<option <?php if(isset($dados['arquivo']) && $dados['arquivo'][0]->ID_TIPO_ARQUIVO == $tipo_arquivo->ID_TIPO_ARQUIVO){echo 'selected';} ?> value="<?php echo $tipo_arquivo->ID_TIPO_ARQUIVO; ?>"><?php echo $tipo_arquivo->TITULO_TIPO_ARQUIVO; ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
									<div class="col-sm-3">
										<!-- select -->
										<div class="form-group">
											<label>Disponível para o setor </label>
											<select class="form-control form-control-sm" id="departamento_arquivo">
												<option value="-1">Todos</option>
												<?php foreach ($dados_departamento['departamentos'] as $departamento): ?>
													<option <?php if(isset($dados['arquivo']) && $dados['arquivo'][0]->ID_DEPARTAMENTO == $departamento->ID_DEPARTAMENTO){echo 'selected';} ?> value="<?php echo $departamento->ID_DEPARTAMENTO; ?>"><?php echo $departamento->TITULO_DEPARTAMENTO; ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
									<div class="col-sm-4">
										<!-- text input -->
										<div class="form-group">
											<label>Link</label>
											<input type="text" class="form-control form-control-sm" id="link_arquivo" value="<?php if(isset($dados['arquivo'])){echo $dados['arquivo'][0]->LINK_ARQUIVO;} ?>">
										</div>
									</div>
									<div class="col-sm-4">
										<!-- text input -->
										<div class="form-group">
											<label>Arquivo</label>
											<div class="custom-file">
						                      <input type="file" class="custom-file-input" id="arquivo" name="file">
						                      <input type="hidden" id="nome_arquivo" value="<?php if(isset($dados['arquivo'])){echo $dados['arquivo'][0]->NOME_ARQUIVO;} ?>">
						                      <input type="hidden" id="caminho_arquivo" value="<?php if(isset($dados['arquivo'])){echo $dados['arquivo'][0]->CAMINHO_ARQUIVO;} ?>">
						                      <label class="custom-file-label" for="arquivo" id="label-arquivo"><?php if(isset($dados['arquivo'])){echo $dados['arquivo'][0]->NOME_ARQUIVO;} ?></label>
						                    </div>
										</div>
									</div>
				                </form>
								<div class="col-sm-2">
									<!-- select -->
									<div class="form-group">
										<label>Situação <span class="text-danger">*</span></label>
										<select class="form-control form-control-sm" id="situacao_arquivo" value="<?php if(isset($dados['arquivo'])){echo $dados['arquivo'][0]->IND_SITUACAO_ARQUIVO;} ?>">
											<option <?php if(isset($dados['arquivo']) && $dados['arquivo'][0]->IND_SITUACAO_ARQUIVO == 'A'){echo 'selected';} ?> value="A">Ativo</option>
											<option <?php if(isset($dados['arquivo']) && $dados['arquivo'][0]->IND_SITUACAO_ARQUIVO == 'I'){echo 'selected';} ?> value="I">Inativo</option>
										</select>
									</div>
								</div>
								<div class="col-sm-1">
									<!-- select -->
									<div class="form-group">
										<label>Ordem <span class="text-danger">*</span></label>
										<input type="text" class="form-control form-control-sm" id="ordem_arquivo" value="<?php if(isset($dados['arquivo'])){echo $dados['arquivo'][0]->ORDEM_ARQUIVO;} ?>" maxlength="3">									
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<!-- textarea -->
									<div class="form-group">
										<label>Descrição <span class="text-danger">*</span></label>
										<textarea class="textarea" rows="5" id="descricao_arquivo"><?php if(isset($dados['arquivo'])){echo $dados['arquivo'][0]->DESCRICAO_ARQUIVO;} ?></textarea>
									</div>
								</div>
							</div>
						</div>
						<div class="card-footer">
				        	<a class="btn btn-default float-left" id="btn_cancelar" onclick="history.go(-1)">Voltar</a>
	                        <?php if (isset($dados['arquivo'])): ?>
				        		<button type="button" class="btn btn-primary float-right mr-2" id="btn_editar_continuar">Alterar e Continuar</button>
								<button type="button" class="btn btn-primary float-right mr-2" id="btn_editar_voltar">Alterar</button>
	                        <?php else: ?>
				        		<button type="button" class="btn btn-primary float-right mr-2" id="btn_salvar_continuar">Inserir e Continuar</button>
								<button type="button" class="btn btn-primary float-right mr-2" id="btn_salvar_voltar">Inserir</button>
                            <?php endif; ?>
				        </div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card card-warning">
						<div class="card-header">
							<span>Arquivos do Departamento</span>
						</div>
						<div class="card-body" id="lista_arquivos">

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

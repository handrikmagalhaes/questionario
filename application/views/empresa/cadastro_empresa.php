<div class="content-wrapper" style="min-height: 1244.06px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mt-1">
				<div class="col-sm-6">
	                <?php if (isset($dados['empresa'])): ?>
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
									<div class="col-sm-12">
										<!-- textarea -->
										<div class="form-group">
											<label>Quem Somos </label>
											<textarea class="textarea" rows="15" id="descricao_empresa"><?php if(isset($dados['empresa'])){echo $dados['empresa'][0]->QUEM_SOMOS;} ?></textarea>
											<input type="hidden" class="form-control form-control-sm" id="id_empresa" value="<?php if(isset($dados['empresa'])){echo $dados['empresa'][0]->ID_EMPRESA;} ?>">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<!-- textarea -->
										<div class="form-group">
											<label>Dados Bancários </label>
											<textarea class="textarea" rows="15" id="dados_bancarios"><?php if(isset($dados['empresa'])){echo $dados['empresa'][0]->DADOS_BANCARIOS;} ?></textarea>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<!-- textarea -->
										<div class="form-group">
											<label>Nossa História </label>
											<textarea class="textarea" rows="15" id="historia"><?php if(isset($dados['empresa'])){echo $dados['empresa'][0]->HISTORIA;} ?></textarea>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<!-- textarea -->
										<div class="form-group">
											<label>Campo de Atuação </label>
											<textarea class="textarea" rows="15" id="atuacao"><?php if(isset($dados['empresa'])){echo $dados['empresa'][0]->ATUACAO;} ?></textarea>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<!-- textarea -->
										<div class="form-group">
											<label>Nossa Missão</label>
											<textarea class="textarea" rows="15" id="missao"><?php if(isset($dados['empresa'])){echo $dados['empresa'][0]->MISSAO;} ?></textarea>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<!-- textarea -->
										<div class="form-group">
											<label>Nossa Visão</label>
											<textarea class="textarea" rows="15" id="visao"><?php if(isset($dados['empresa'])){echo $dados['empresa'][0]->VISAO;} ?></textarea>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<!-- textarea -->
										<div class="form-group">
											<label>Nossos Valores </label>
											<textarea class="textarea" rows="15" id="valores"><?php if(isset($dados['empresa'])){echo $dados['empresa'][0]->VALORES;} ?></textarea>
										</div>
									</div>
								</div>

							</form>
						</div>
						<div class="card-footer">
				        	<a href="#" class="btn btn-default float-left" id="btn_cancelar"onclick="history.go(-1)">Voltar</a>
	                        <?php if (isset($dados['empresa'])): ?>
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

<div class="content-wrapper" style="min-height: 1244.06px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mt-1">
				<div class="col-sm-6">
	                <?php if (isset($dados['evento'])): ?>
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
									<div class="col-sm-7">
										<!-- text input -->
										<div class="form-group">
											<label>Título <span class="text-danger">*</span></label>
											<input type="text" class="form-control form-control-sm" id="titulo_evento" value="<?php if(isset($dados['evento'])){echo $dados['evento'][0]->TITULO_EVENTO;} ?>">
											<input type="hidden" class="form-control form-control-sm" id="id_evento" value="<?php if(isset($dados['evento'])){echo $dados['evento'][0]->ID_EVENTO;} ?>">
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Data <span class="text-danger">*</span></label>
											<input type="date" class="form-control form-control-sm" id="dt_evento" value="<?php if(isset($dados['evento'])){echo $dados['evento'][0]->DT_EVENTO;} ?>">
										</div>
									</div>
									<div class="col-sm-2">
										<!-- select -->
										<div class="form-group">
											<label>Situação <span class="text-danger">*</span></label>
											<select class="form-control form-control-sm" id="situacao_evento">
												<option <?php if(isset($dados['evento']) && $dados['evento'][0]->IND_SITUACAO_EVENTO == 'A'){echo 'selected';} ?> value="A">Ativo</option>
												<option <?php if(isset($dados['evento']) && $dados['evento'][0]->IND_SITUACAO_EVENTO == 'I'){echo 'selected';} ?> value="I">Inativo</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<!-- textarea -->
										<div class="form-group">
											<label>Descrição </label>
											<textarea class="textarea" rows="5" id="descricao_evento"><?php if(isset($dados['evento'])){echo $dados['evento'][0]->DESCRICAO_EVENTO;} ?></textarea>
										</div>
									</div>
								</div>
								<div class="card mb-3">
									<div class="card-header">
										<i class="fa fa-image"></i> Galeria
									</div>
									<div class="card-body">
										<form>
											<div class="row">
												<div class="col-xs-12 col-sm-12">
													<button class="btn btn-default" id="btn-add-imagem-galeria" type="button" data-toggle="modal" data-target="#modal-midia-galeria">Adicionar imagem</button>
												</div>
											</div>
											<div class="row">
												<div class="col-xs-12 col-sm-12">
													<div id="galeria-evento-midias-selecionadas" class="text-left mt-4">
														{galeria_evento}
														<!-- CONTEÚDO INSERIDO DINAMICAMENTE -->
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
							</form>
						</div>
						<div class="card-footer">
				        	<a href="#" class="btn btn-default float-left" id="btn_cancelar"onclick="history.go(-1)">Voltar</a>
	                        <?php if (isset($dados['evento'])): ?>
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
<!-- MODAL INSERIR MIDIA GALERIA -->
<div class="modal fade" id="modal-midia-galeria" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Inserir Mídia</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" id="inserir-midia-galeria-tab" data-toggle="tab" href="#inserir-midia-galeria" role="tab" aria-controls="inserir-midia-galeria" aria-selected="true">Inserir Nova</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="biblioteca-midia-galeria-tab" data-toggle="tab" href="#biblioteca-midia-galeria" role="tab" aria-controls="biblioteca-midia-galeria" aria-selected="false">Biblioteca de Mídia</a>
					</li>
				</ul>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="inserir-midia-galeria" role="tabpanel" aria-labelledby="inserir-midia-galeria-tab">
						<div class="row">
							<div class="col-xs-12 col-sm-12 mt-4">
								<form id="formMidiaGaleria" method="post" enctype="multipart/form-data" hidden>
									<input type="file" id="campo_midia_galeria" name="file[]" accept="image/*" hidden multiple>
									<!-- <input type="file" id="campo_midia" name="file[]" accept="image/*" hidden multiple> -->
								</form>
								<button type="button" class="btn btn-outline-primary mb-2" id="btn-escolher-arquivo-galeria">Selecionar arquivo</button>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="biblioteca-midia-galeria" role="tabpanel" aria-labelledby="biblioteca-midia-galeria-tab">
						<div class="row">
							<div class="col-xs-12 col-sm-12 mt-4">
								<div id="galeria-evento" class="text-center">
									<!-- CONTEÚDO INSERIDO DINAMICAMENTE -->
								</div>
								<div class="row">
									<div class="col-sm-12 text-center mt-3">
										<ul class="pagination d-inline-flex" id="pagination-galeria"></ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

{js_old}
<script type="text/javascript">
	var $190 = $.noConflict(true);
</script>

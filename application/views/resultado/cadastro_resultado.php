<div class="content-wrapper" style="min-height: 1244.06px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mt-1">
				<div class="col-sm-6">
	                <?php if (isset($dados['resultado'])): ?>
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
									<div class="col-sm-6">
										<!-- text input -->
										<div class="form-group">
											<label>Título <span class="text-danger">*</span></label>
											<input type="text" class="form-control form-control-sm" id="titulo_resultado" value="<?php if(isset($dados['resultado'])){echo $dados['resultado'][0]->TITULO_RESULTADO;} ?>">
											<input type="hidden" class="form-control form-control-sm" id="id_resultado" value="<?php if(isset($dados['resultado'])){echo $dados['resultado'][0]->ID_RESULTADO;} ?>">
										</div>
									</div>
									<div class="col-sm-2">
										<!-- text input -->
										<div class="form-group">
											<label>Cor <span class="text-danger">*</span></label>
											<input type="color" class="form-control form-control-sm" id="cor_grafico_resultado" value="<?php if(isset($dados['resultado'])){echo $dados['resultado'][0]->COR_GRAFICO_RESULTADO;} ?>">
										</div>
									</div>
									<div class="col-sm-4">
										<!-- select -->
										<div class="form-group">
											<label>Situação <span class="text-danger">*</span></label>
											<select class="form-control form-control-sm" id="situacao_resultado">
												<option <?php if(isset($dados['resultado']) && $dados['resultado'][0]->IND_SITUACAO_RESULTADO == 'A'){echo 'selected';} ?> value="A">Ativo</option>
												<option <?php if(isset($dados['resultado']) && $dados['resultado'][0]->IND_SITUACAO_RESULTADO == 'I'){echo 'selected';} ?> value="I">Inativo</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<!-- textarea -->
										<div class="form-group">
											<label>Descrição </label>
											<textarea class="textarea" rows="5" id="descricao_resultado"><?php if(isset($dados['resultado'])){echo $dados['resultado'][0]->DESCRICAO_RESULTADO;} ?></textarea>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Período Inicial (Mês/Ano) <span class="text-danger">*</span></label>
											<input type="month" class="form-control form-control-sm" id="periodo_resultado">
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Período Final (Mês/Ano) <span class="text-danger">*</span></label>
											<input type="month" class="form-control form-control-sm" id="periodo_resultado_final">
										</div>
									</div>
									<div class="col-sm-2">
										<!-- text input -->
										<div class="form-group">
											<label>Meta <span class="text-danger">*</span></label>
											<input type="text" class="form-control form-control-sm" id="meta_resultado">
										</div>
									</div>
									<div class="col-sm-2">
										<!-- text input -->
										<div class="form-group">
											<label>Realizado <span class="text-danger">*</span></label>
											<input type="text" class="form-control form-control-sm" id="realizado_resultado">
										</div>
									</div>
									<div class="col-sm-2">
										<button type="button" class="btn btn-primary mt-4" id="add_item_resultado">Adicionar</button>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-lg-12">
										<table class="table table-striped table-bordered" id="tb_itens_resultado">
											<thead>
												<tr>
													<th>Período</th>
													<th>Meta</th>
													<th>Realizado</th>
													<th>Ações</th>
												</tr>
											</thead>
											<tbody>
												<?php
													if(isset($dados['itens_resultado'])){
														foreach ($dados['itens_resultado'] as $item_resultado){
															?>
															<tr data-id="<?= $item_resultado->ID_RESULTADO_ITEM ?>">
																<?php
																$meses = array('Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro');
																$periodo = $item_resultado->PERIODO_RESULTADO_ITEM;
																$periodo_temp = explode('-', $periodo);
																$mes = $periodo_temp[1]-1;
																$lmes = $meses[$mes].'/'.$periodo_temp[0];
																?>
																<td class="periodo-resultado" data-periodo="<?= $periodo ?>">
																	<?= $lmes ?>
																</td>
																<td class="meta-resultado"><?= (int)$item_resultado->META_RESULTADO_ITEM ?></td>
																<td class="realizado-resultado"><?= (int)$item_resultado->REALIZADO_RESULTADO_ITEM ?></td>
																<td>
																	<button type="button" class="btn btn-sm btn-outline-primary btn-editar-item-resultado border-0 pt-0 pb-0" data-toggle="tooltip" data-placement="top" title="Editar" data-original-title="Editar"><i class="fas fa-pencil-alt"></i></button>
																	<button type="button" class="btn btn-sm btn-outline-danger btn-excluir-item-resultado border-0 pt-0 pb-0" data-toggle="tooltip" data-placement="top" title="Excluir" data-original-title="Excluir"><i class="fas fa-trash"></i></button>
																</td>
															</tr>
															<?php
														}
													}
												?>
												<!-- CONTEÚDO DINÂMICO-->
											</tbody>
										</table>
									</div>
								</div>
							</form>
						</div>
						<div class="card-footer">
				        	<a href="#" class="btn btn-default float-left" id="btn_cancelar"onclick="history.go(-1)">Voltar</a>
	                        <?php if (isset($dados['resultado'])): ?>
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

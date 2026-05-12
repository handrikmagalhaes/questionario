<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<?php //var_dump($_SESSION);?>
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<!-- <h1 class="m-0 text-dark"><i class="nav-icon fas fa-building"></i></h1> -->
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#"><i class="nav-icon fas fa-home"></i></a></li>
						<li class="breadcrumb-item active">Dashboard v1</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->
	<?php
	setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
	date_default_timezone_set('America/Maceio');
	?>
	<!-- Main content -->
	<section class="content">
		<div class="col-lg-8">
			<!-- Small boxes (Stat box) -->
			<div class="row" >
				<div class="col-lg-4 col-8">
					<!-- small box -->
					<div class="small-box bg-info">
						<div class="icon">
							<i class="fas fa-birthday-cake"></i>
						</div>
						<div class="inner">
							<p>Aniversariantes do Mês</p>
							<h3><?php echo count($dados['ret_usuario']['usuario']); ?></h3>
						</div>
						<a href="#" class="small-box-footer" onclick="mostraAniversariantes()">Detalhes <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-4 col-8">
					<!-- small box -->
					<div class="small-box bg-success">
						<div class="inner">
							<p>Feedbacks</p>
							<h3><?php echo count($dados['ret_feedback']['feedbacks']); ?></h3>
						</div>
						<div class="icon">
							<i class="fas fa-comments"></i>
						</div>
						<a href="{url_base}feedback" class="small-box-footer">Detalhes <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<div class="col-lg-4 col-8">
					<!-- small box -->
					<div class="small-box bg-warning">
						<div class="inner">
							<p>Comunicados Internos</p>
							<h3><?php echo count($dados['ret_comunicado_interno']['comunicados_internos']); ?></h3>
						</div>
						<div class="icon">
							<i class="fas fa-bell"></i>
						</div>
						<a href="{url_base}comunicado_interno" class="small-box-footer">Detalhes <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6" style="display:none;">
					<!-- small box -->
					<div class="small-box bg-danger">
						<div class="inner">
							<h3>65</h3>
							<p>Unique Visitors</p>
						</div>
						<div class="icon">
							<i class="ion ion-pie-graph"></i>
						</div>
						<a href="#" class="small-box-footer">Detalhes <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
			</div>
			<div class="row collapse rounded border ml-1 mr-1" id="linhaAniversariantes">
				<?php $this->load->helper('text');
				foreach ($dados['ret_usuario']['usuario'] as $usuario): 
					if ($usuario->CAMINHO_FOTO_USUARIO){
						$caminho_foto = $usuario->CAMINHO_FOTO_USUARIO;
					} else {
						if ($usuario->SEXO_USUARIO == 'Feminino'){
							$caminho_foto = './assets/dist/img/blank_female.jpg';
						} else {
							$caminho_foto = './assets/dist/img/blank_male.jpg';
						}
					}
				?>
				<div class="card mb-3 mt-2 ml-2" style="width: 370px;">
					<div class="row no-gutters">
						<div class="col-md-2">
							<img src=".<?php echo($caminho_foto); ?>" class="rounded-circle mt-2 ml-2 mb-2" style="width: 75px; height:75px; ">
						</div>
						<div class="col-md-10">
							<div class="card-body ml-3 pb-1">
							<h5 class="card-title"><?php echo($usuario->NOME_USUARIO); ?></h5>
							<p class="card-text"><h3><?php echo utf8_encode(strftime('%d/%m', strtotime($usuario->DT_NASCIMENTO_USUARIO))); ?></h3></p>
						</div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
			<div class="row collapse rounded border ml-1 mr-1" id="linhaDetalhe">AAA</div>
			<div class="row collapse rounded border ml-1 mr-1" id="linhaDetalhe">AAA</div>
			<!-- /.row -->
			<!-- Main row -->
			<div class="row">
				<section class="col-lg-6 connectedSortable">
					<!-- Links Úteis -->
					<?php //echo var_dump($_SESSION); ?>
					<div class="card">
						<div class="card-header card-graficos">
							<h3 class="card-title">
								<i class="nav-icon fas fa-envelope-open-text"></i>
								Links Úteis
							</h3>
							<div class="card-tools">
								<a href="{url_base}link" class="btn btn-tool">
									Ver todos
								</a>
							</div>
						</div>
						<div class="card-footer card-comments">
							<?php $cores = ["btn-primary", "btn-secondary", "btn-success", "btn-danger", "btn-warning", "btn-info", "btn-dark"]; ?>
							<div class="card-comment">
								<div class="row">
									<?php foreach ($dados['ret_link']['links'] as $link): ?>
									<a role="button" class="btn <?php echo $cores[array_rand($cores)]; ?> mr-1" href="<?php echo $link->CAMINHO_LINK; ?>" target="_blank"><?php echo $link->TITULO_LINK; ?></a>
									<?php endforeach ?>
								</div>
							</div>
						</div>
					</div>
				</section>
				<section class="col-lg-6 connectedSortable">
					<!-- Dicas de Saúde -->
					<?php //echo var_dump($_SESSION); ?>
					<div class="card">
						<div class="card-header card-graficos">
							<h3 class="card-title">
								<i class="nav-icon fas fa-envelope-open-text"></i>
								Dicas de Saúde e Mensagens
							</h3>
							<div class="card-tools">
								<a href="{url_base}dica-saude" class="btn btn-tool">
									Ver todos
								</a>
							</div>
						</div>
						<div class="card-footer card-comments">
							<div class="card-comment">
								<div class="row">


								<?php foreach ($dados['ret_dica_saude']['dicas_saude'] as $dica_saude): ?>
								<div class="card-comment">
									<div class="comment-text m-0">
                    					<p><a href="<?php echo $dica_saude->LINK_DICA_SAUDE; ?>" target="_blank"><?php echo $dica_saude->TITULO_DICA_SAUDE; ?></a></p>
									</div>
								</div>
							<?php endforeach; ?>





								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
			<div class="row">
				<section class="col-lg-12 connectedSortable">
					<!-- COMUNICADOS INTERNOS -->
					<?php //echo var_dump($_SESSION); ?>
					<div class="card">
						<div class="card-header card-graficos">
							<h3 class="card-title">
								<i class="nav-icon fas fa-envelope-open-text"></i>
								Gráficos de Resultados
							</h3>
							<div class="card-tools">
								<a href="resultado" class="btn btn-tool">
									Ver todos
								</a>
							</div>
						</div>
						<div class="card-footer card-comments">
							<div class="card-comment">
								<div class="row">
									<?php foreach ($dados['ret_resultado']['resultados'] as $resultado): ?>
										<div class="cols-xs-12 col-sm-4">
											<canvas id="grafico_resultado_<?= $resultado->ID_RESULTADO ?>" height="250px"></canvas>
										</div>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
			<div class="row" style="display: none;">
				<!-- Left col -->
				<section class="col-lg-6 connectedSortable">
					<!-- AVISOS -->
					<!--          <div class="card">-->
					<!--            <div class="card-header">-->
					<!--              <h3 class="card-title">-->
					<!--                <i class="nav-icon fas fa-exclamation-triangle"></i>-->
					<!--                Avisos-->
					<!--              </h3>-->
					<!--              <div class="card-tools">-->
					<!--                <button type="button" class="btn btn-tool" data-card-widget="collapse">-->
					<!--                  <i class="fas fa-minus"></i>-->
					<!--                </button>-->
					<!--                <a href="aviso" class="btn btn-tool">-->
					<!--                  Ver todos-->
					<!--                </a>-->
					<!--              </div>-->
					<!--            </div>-->
					<!--            <div class="card-footer card-comments">-->
					<!--              --><?php //$this->load->helper('text'); foreach ($dados['ret_aviso']['avisos'] as $aviso): ?>
					<!--			    --><?php //if($aviso->ID_DEPARTAMENTO == null || $aviso->ID_DEPARTAMENTO == $_SESSION['departamento']){ ?>
					<!--                <div class="card-comment">-->
					<!--                  <div class="comment-text m-0">-->
					<!--                    <span class="username">-->
					<!--                      --><?php //echo word_limiter($aviso->TITULO_AVISO, 6); ?>
					<!--                      <span class="text-muted float-right">-->
					<!--                        --><?php //
					//                          if($aviso->DT_CRIACAO && $aviso->HR_CRIACAO){
					//                            echo strftime('%A, %d de %B de %Y', strtotime($aviso->DT_CRIACAO)).' - '.date("H:i", strtotime($aviso->HR_CRIACAO));
					//                          }
					//                        ?>
					<!--                      </span>-->
					<!--                    </span>-->
					<!-- /.username -->
					<!--                    <div class="resumo">-->
					<!--                      <p class="text-justify m-0">-->
					<!--                        --><?php //echo word_limiter($aviso->DESCRICAO_AVISO, 23); ?>
					<!--                      </p>-->
					<!--                    </div>-->
					<!--                    <div class="detalhes" style="display: none;">-->
					<!--                      <p class="text-justify m-0">-->
					<!--                        --><?php //echo $aviso->DESCRICAO_AVISO; ?>
					<!--                      </p>-->
					<!--                    </div>-->
					<!--                    <button type="button" class="btn-detalhes btn btn-tool float-right" status="fechado">-->
					<!--                      <i class="fas fa-chevron-down"></i>-->
					<!--                    </button>-->
					<!--                  </div>-->
					<!--                </div>-->
					<!--    			--><?php //} ?>
					<!--			  --><?php //endforeach; ?>
					<!--            </div>-->
					<!--          </div>-->

					<!-- ANIVERSARIANTES -->
					<div class="card">
						<div class="card-header card-aniversariantes">
							<h3 class="card-title">
								<i class="nav-icon fas fa-birthday-cake"></i>
								Aniversariantes do Mês
							</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
							</div>
						</div>
						<div class="card-footer card-comments">
							<?php $this->load->helper('text');
							foreach ($dados['ret_usuario']['usuario'] as $usuario): ?>
								<div class="card-comment">
									<div class="comment-text m-0">
										<span class="image"
											  style="background-color: #c3c3c3; background-size: cover; width: 30px; height: 30px; float: left; margin-right: 10px; border-radius: 100px; background-image: url('<?php echo $usuario->CAMINHO_FOTO_USUARIO; ?>')"></span>
										<span class="username" style="line-height: 30px;">
								  <?php echo $usuario->NOME_USUARIO; ?>
								  <span class="text-muted float-right">
									<?php
									if ($usuario->DT_NASCIMENTO_USUARIO) {
										echo utf8_encode(strftime('%A, %d de %B', strtotime($usuario->DT_NASCIMENTO_USUARIO)));
									}
									?>
								  </span>
								</span>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>

					<!-- ARQUIVOS -->
					<div class="card">
						<div class="card-header card-arquivos">
							<h3 class="card-title">
								<i class="nav-icon fas fa-file"></i>
								Normas Internas e Manuais
							</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<a href="arquivo" class="btn btn-tool">
									Ver todos
								</a>
							</div>
						</div>
						<div class="card-footer card-comments">
							<?php $this->load->helper('text');
							foreach ($dados['ret_arquivo']['arquivos'] as $arquivo): ?>
								<div class="card-comment">
									<div class="comment-text m-0">
                    <span class="username">
                      <?php echo word_limiter($arquivo->TITULO_ARQUIVO, 6); ?>
                      <span class="text-muted float-right">
                        <?php
						if ($arquivo->DT_CRIACAO && $arquivo->HR_CRIACAO) {
							echo utf8_encode(strftime('%A, %d de %B de %Y', strtotime($arquivo->DT_CRIACAO)) . ' - ' . date("H:i", strtotime($arquivo->HR_CRIACAO)));
						}
						?>
                      </span>
                    </span><!-- /.username -->
										<div class="resumo">
											<p class="text-justify m-0">
												<?php
												if ($arquivo->CAMINHO_ARQUIVO != '') {
													?>
													<a href="<?php echo base_url() . $arquivo->CAMINHO_ARQUIVO; ?>"
													   target="_blank">
														Ver arquivo
													</a> |
													<?php
												}
												?>
												<?php
												echo word_limiter($arquivo->DESCRICAO_ARQUIVO, 23);
												if ($arquivo->LINK_ARQUIVO != '') {
													?>
													<a href="<?= $arquivo->LINK_ARQUIVO ?>" target="_blank">Acesse</a>
													<?php
												}
												?>
											</p>
										</div>
										<div class="detalhes" style="display: none;">
											<p class="text-justify m-0">
												<?php echo $arquivo->DESCRICAO_ARQUIVO; ?>
											</p>
										</div>
										<button type="button" class="btn-detalhes btn btn-tool float-right"
												status="fechado">
											<i class="fas fa-chevron-down"></i>
										</button>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>

					<!-- DICAS DE SAUDE -->
					<div class="card">
						<div class="card-header card-dicas">
							<h3 class="card-title">
								<i class="nav-icon fas fa-heartbeat"></i>
								Dicas de Saúde e Mensagens
							</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<a href="dica_saude" class="btn btn-tool">
									Ver todos
								</a>
							</div>
						</div>
						<div class="card-footer card-comments">
							<?php $this->load->helper('text');
							foreach ($dados['ret_dica_saude']['dicas_saude'] as $dica_saude): ?>
								<div class="card-comment">
									<div class="comment-text m-0">
                    <span class="username">
                      <?php echo word_limiter($dica_saude->TITULO_DICA_SAUDE, 6); ?>
					<!--                      <span class="text-muted float-right">-->
						<!--                        --><?php //
						//                          if($dica_saude->DT_CRIACAO && $dica_saude->HR_CRIACAO){
						//                            echo strftime('%A, %d de %B de %Y', strtotime($dica_saude->DT_CRIACAO)).' - '.date("H:i", strtotime($dica_saude->HR_CRIACAO));
						//                          }
						//                        ?>
					<!--                      </span>-->
                    </span>
										<div class="resumo">
											<p class="text-justify m-0">
												<?php echo word_limiter($dica_saude->DESCRICAO_DICA_SAUDE, 23); ?>
												<?php
												if ($dica_saude->LINK_DICA_SAUDE != '') {
													?>
													<a href="<?= $dica_saude->LINK_DICA_SAUDE ?>"
													   target="_blank">Acesse</a>
													<?php
												}
												?>
											</p>
										</div>
										<div class="detalhes" style="display: none;">
											<p class="text-justify m-0">
												<?php echo $dica_saude->DESCRICAO_DICA_SAUDE; ?>
											</p>
										</div>
										<button type="button" class="btn-detalhes btn btn-tool float-right"
												status="fechado">
											<i class="fas fa-chevron-down"></i>
										</button>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>

				</section>
				<!-- /.Left col -->
				<!-- right col -->
				<section class="col-lg-6 connectedSortable">
					<!-- COMUNICADOS INTERNOS -->
					<div class="card">
						<div class="card-header card-comunicados">
							<h3 class="card-title">
								<i class="nav-icon fas fa-envelope-open-text"></i>
								Comunicados Internos
							</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<a href="comunicado_interno" class="btn btn-tool">
									Ver todos
								</a>
							</div>
						</div>
						<div class="card-footer card-comments">
							<?php $this->load->helper('text');
							foreach ($dados['ret_comunicado_interno']['comunicados_internos'] as $comunicado_interno): ?>
								<!--				--><?php //if($comunicado_interno->ID_DEPARTAMENTO == null || $comunicado_interno->ID_DEPARTAMENTO == $_SESSION['departamento']){ ?>
								<div class="card-comment">
									<div class="comment-text m-0">
										<span class="username">
										  <?php echo word_limiter($comunicado_interno->TITULO_COMUNICADO_INTERNO, 6); ?>
										  <span class="text-muted float-right">
											<?php
											if ($comunicado_interno->DT_CRIACAO && $comunicado_interno->HR_CRIACAO) {
												echo utf8_encode(strftime('%A, %d de %B de %Y', strtotime($comunicado_interno->DT_CRIACAO)) . ' - ' . date("H:i", strtotime($comunicado_interno->HR_CRIACAO)));
											}
											?>
										  </span>
										</span>
										<div class="resumo">
											<p class="text-justify m-0">
												<?php echo word_limiter($comunicado_interno->DESCRICAO_COMUNICADO_INTERNO, 23); ?>
											</p>
										</div>
										<div class="detalhes" style="display: none;">
											<p class="text-justify m-0">
												<?php echo $comunicado_interno->DESCRICAO_COMUNICADO_INTERNO; ?>
											</p>
										</div>
										<button type="button" class="btn-detalhes btn btn-tool float-right"
												status="fechado">
											<i class="fas fa-chevron-down"></i>
										</button>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>

					<!-- LINKS -->
					<div class="card">
						<div class="card-header card-links">
							<h3 class="card-title">
								<i class="nav-icon fas fa-link"></i>
								Links Úteis
							</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<a href="link" class="btn btn-tool">
									Ver todos
								</a>
							</div>
						</div>
						<div class="card-footer card-comments">
							<?php $this->load->helper('text');
							foreach ($dados['ret_link']['links'] as $link): ?>
								<div class="card-comment">
									<div class="comment-text m-0">
                    <span class="username">
                      <?php echo $link->TITULO_LINK; ?>
						<!--                      <span class="text-muted float-right">-->
						<!--                        --><?php //
						//                          if($link->DT_CRIACAO && $link->HR_CRIACAO){
						//                            echo strftime('%A, %d de %B de %Y', strtotime($link->DT_CRIACAO)).' - '.date("H:i", strtotime($link->HR_CRIACAO));
						//                          }
						//                        ?>
						<!--                      </span>-->
                    </span>
										<div class="resumo">
											<p class="text-justify m-0">
												<a href="<?php echo $link->CAMINHO_LINK; ?>" target="_blank">
													Clique aqui
												</a> |
												<?php echo word_limiter($link->DESCRICAO_LINK, 23); ?>
											</p>
										</div>
										<div class="detalhes" style="display: none;">
											<p class="text-justify m-0">
												<?php echo $link->DESCRICAO_LINK; ?>
											</p>
										</div>
										<button type="button" class="btn-detalhes btn btn-tool float-right"
												status="fechado">
											<i class="fas fa-chevron-down"></i>
										</button>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>

					<!-- EVENTOS -->
					<div class="card">
						<div class="card-header card-eventos">
							<h3 class="card-title">
								<i class="nav-icon fas fa-calendar-check"></i>
								Calendário de Expediente e Eventos
							</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<a href="evento" class="btn btn-tool">
									Ver todos
								</a>
							</div>
						</div>
						<div class="card-footer card-comments">
							<?php $this->load->helper('text');
							foreach ($dados['ret_evento']['eventos'] as $evento): ?>
								<div class="card-comment">
									<div class="comment-text m-0">
                    <span class="username">
                      <?php echo word_limiter($evento->TITULO_EVENTO); ?>
                      <span class="text-muted float-right">
                        <?php
						if ($evento->DT_EVENTO) {
							echo utf8_encode(strftime('%A, %d de %B', strtotime($evento->DT_EVENTO)));
						}
						?>
                      </span>
                    </span>
										<div class="resumo">
											<p class="text-justify m-0">
												<?php echo word_limiter($evento->DESCRICAO_EVENTO, 23); ?>
											</p>
										</div>
										<div class="detalhes" style="display: none;">
											<p class="text-justify m-0">
												<?php echo $evento->DESCRICAO_EVENTO; ?>
											</p>
										</div>
										<button type="button" class="btn-detalhes btn btn-tool float-right"
												status="fechado">
											<i class="fas fa-chevron-down"></i>
										</button>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>

				</section>
				<!-- right col -->
			</div>
			<!-- /.row (main row) -->
		</div><!-- /.container-fluid -->
		<div id="feed" class="col-1">

		</div>
	</section>
	<!-- /.content -->
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>

	<?php
		foreach ($dados['ret_resultado']['resultados'] as $resultado){
			?>
			var ctx = document.getElementById('grafico_resultado_<?= $resultado->ID_RESULTADO ?>').getContext('2d');
			var chart = new Chart(ctx, {
				// The type of chart we want to create
				type: 'bar',

				// The data for our dataset
				data: {
					labels: [<?php
						$anos = array('Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro');
						foreach($dados['ret_resultado']['resultados_itens'] as $item){
							echo $item->ID_RESULTADO == $resultado->ID_RESULTADO ? "'".$anos[substr($item->PERIODO_RESULTADO_ITEM, 5, 2) - 1]."'" . ',' : '';
						}
						?>],
					datasets:
							[
								{
									label: 'Meta',
									backgroundColor: 'rgb(150, 150, 150)',
									borderColor: 'rgb(150, 150, 150)',
									borderWidth: 1,
									data: [<?php
										foreach($dados['ret_resultado']['resultados_itens'] as $item){
											echo $item->ID_RESULTADO == $resultado->ID_RESULTADO ? $item->META_RESULTADO_ITEM . ',' : '';
										}
										?>]
								},
								{
									label: 'Realizado',
									backgroundColor: '<?= $resultado->COR_GRAFICO_RESULTADO ?>',
									borderColor: '<?= $resultado->COR_GRAFICO_RESULTADO ?>',
									borderWidth: 1,
									data: [<?php
										foreach($dados['ret_resultado']['resultados_itens'] as $item){
											echo $item->ID_RESULTADO == $resultado->ID_RESULTADO ? $item->REALIZADO_RESULTADO_ITEM . ',' : '';
										}
										?>]
								}
							]
				},

				// Configuration options go here
				options: {
					// responsive: true,
					legend: {
						position: 'top',
					},
					title: {
						display: true,
						text: '<?= $resultado->TITULO_RESULTADO ?>'
					},
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero: true
							}
						}]
					}
				}
			});
			<?php
		}
	?>

</script>

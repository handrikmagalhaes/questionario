<div class="content-wrapper" style="min-height: 1244.06px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mt-1">
				<div class="col-sm-6">
					<?php if (isset($dados['midia'])): ?>
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
						<div class="card-header">

							<div class="card-tools float-left mt-2">
								<div class="input-group input-group-sm" style="width: 700px;">
									<?php
									$link = explode('/', $_SERVER["REQUEST_URI"]);
									$busca = '';
									if (isset($link[$GLOBALS['pos_parametro_lista']+1])) $busca = str_replace('%20', ' ', $link[$GLOBALS['pos_parametro_lista']+1]);
									?>

									<input type="text" id="texto_busca" class="form-control float-right"
										   placeholder="Buscar" value="<?php echo $busca; ?>">
									<div class="input-group-append">
										<button class="btn btn-default" id="buscar"><i class="fas fa-search"></i>
										</button>
									</div>
								</div>
							</div>
							<form id="formMidia" method="post" enctype="multipart/form-data" hidden>
								<input type="file" id="campo_midia" name="file[]" accept="image/*" hidden multiple>
							</form>
							<button type="button" class="btn btn-primary float-right" id="btn-escolher-arquivo">
								Adicionar Nova
							</button>

						</div>
						<!-- /.card-header -->
						<div class="card-body p-0" id="lista-midias">
							<div id="galeria">
								<?php foreach ($dados['midias'] as $midia): ?>
									<div class="item-galeria position-relative">
										<div class="btns position-absolute">
											<a href="../../../..<?php echo $midia->CAMINHO_MIDIA; ?>" class="btn btn-sm btn-primary rounded-0 lightbox" rel="galeria" title="<?php echo $midia->NOME_MIDIA; ?>"><i class="fa fa-eye"></i></a>
											<?php if ('' == ''): ?>
												<button data-id="<?php echo $midia->ID_MIDIA; ?>" data-arquivo-midia="./../../..<?php echo $midia->CAMINHO_MIDIA; ?>" class="btn btn-sm btn-danger rounded-0 btn-excluir position-absolute"  data-toggle="tooltip" data-placement="top" title="Excluir"><i class="fa fa-fw fa-trash"></i></button>
											<?php endif; ?>
										</div>
										<img src="../../../..<?php echo $midia->CAMINHO_MIDIA; ?>" alt="<?php echo $midia->NOME_MIDIA; ?>"/>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
						<div class="card-footer small text-muted clearfix text-right">
							<ul class="pagination pagination-sm m-0 float-right">
								<li class="page-item voltar-pagina"><a class="page-link" href="#">&laquo;</a></li>
								<?php for ($pagina = 1; $pagina <= $dados['paginas']; $pagina++): ?>
									<li class="page-item numero-pagina"><a class="page-link"
																		   href="#"><?php echo $pagina ?></a></li>
								<?php endfor; ?>
								<li class="page-item proxima-pagina"><a class="page-link" href="#">&raquo;</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
	</section>
</div>

<!-- MODAL -->
<div class="modal fade" id="modal-excluir">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Atenção!</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Confirma a exclusão?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
				<button type="button" class="btn btn-primary" id="btn-excluir">Sim</button>
			</div>
		</div>
	</div>
</div>

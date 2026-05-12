  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php if(isset($dados['arquivo'])){echo $dados['arquivo'][0]->TITULO_ARQUIVO;} ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="./">{titulo}</a></li>
              <li class="breadcrumb-item active"><?php if(isset($dados['arquivo'])){echo $dados['arquivo'][0]->TITULO_ARQUIVO;} ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-body">
          <p>
            <?php if(isset($dados['arquivo'])){echo $dados['arquivo'][0]->DESCRICAO_ARQUIVO;} ?>
          </p>
			<?php
			if ($dados['arquivo'][0]->LINK_ARQUIVO != '' || $dados['arquivo'][0]->CAMINHO_ARQUIVO) {
				?>
				<a href="<?php if (isset($dados['arquivo'])) {
					echo $dados['arquivo'][0]->CAMINHO_ARQUIVO != '' ? base_url() . $dados['arquivo'][0]->CAMINHO_ARQUIVO : $dados['arquivo'][0]->LINK_ARQUIVO;
				} ?>" target="_blank">
					<?php if (isset($dados['arquivo'])) {
						echo $dados['arquivo'][0]->NOME_ARQUIVO != '' ? $dados['arquivo'][0]->NOME_ARQUIVO : 'Acesse';
					} ?>
				</a>
				<?php
			}
			?>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <a class="btn btn-secondary" href="./">Voltar</a>
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

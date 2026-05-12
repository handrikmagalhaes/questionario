  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php if(isset($dados['evento'])){echo $dados['evento'][0]->TITULO_EVENTO;} ?></h1>
			<h6><?php if(isset($dados['evento'])){echo date("d/m/Y", strtotime($dados['evento'][0]->DT_EVENTO));} ?></h6>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="./">{titulo}</a></li>
              <li class="breadcrumb-item active"><?php if(isset($dadatados['evento'])){echo $dados['evento'][0]->TITULO_EVENTO;} ?></li>
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
          <?php if(isset($dados['evento'])){echo $dados['evento'][0]->DESCRICAO_EVENTO;} ?>
			<div id="galeria-evento-midias-selecionadas" class="text-left mt-4">
				{galeria_evento}
				<!-- CONTEÚDO INSERIDO DINAMICAMENTE -->
			</div>
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

  {js_old}
  <script type="text/javascript">
	  var $190 = $.noConflict(true);
  </script>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php if(isset($dados['comunicado_interno'])){echo $dados['comunicado_interno'][0]->TITULO_COMUNICADO_INTERNO;} ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="./">{titulo}</a></li>
              <li class="breadcrumb-item active"><?php if(isset($dados['comunicado_interno'])){echo $dados['comunicado_interno'][0]->TITULO_COMUNICADO_INTERNO;} ?></li>
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
          <?php if(isset($dados['comunicado_interno'])){echo $dados['comunicado_interno'][0]->DESCRICAO_COMUNICADO_INTERNO;} ?>
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
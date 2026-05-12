  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php if(isset($dados['nivel_acesso'])){echo $dados['nivel_acesso'][0]->TITULO_ARQUIVO;} ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="./">{titulo}</a></li>
              <li class="breadcrumb-item active"><?php if(isset($dados['nivel_acesso'])){echo $dados['nivel_acesso'][0]->TITULO_ARQUIVO;} ?></li>
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
            <?php if(isset($dados['nivel_acesso'])){echo $dados['nivel_acesso'][0]->DESCRICAO_ARQUIVO;} ?>
          </p>
          <a href="<?php if(isset($dados['nivel_acesso'])){echo base_url().$dados['nivel_acesso'][0]->CAMINHO_ARQUIVO;} ?>" target="_blank">
            <?php if(isset($dados['nivel_acesso'])){echo $dados['nivel_acesso'][0]->NOME_ARQUIVO;} ?>
          </a>
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
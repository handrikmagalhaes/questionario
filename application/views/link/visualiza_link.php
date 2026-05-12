  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php if(isset($dados['link'])){echo $dados['link'][0]->TITULO_LINK;} ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="./">{titulo}</a></li>
              <li class="breadcrumb-item active"><?php if(isset($dados['link'])){echo $dados['link'][0]->TITULO_LINK;} ?></li>
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
          <?php if(isset($dados['link'])){
            echo $dados['link'][0]->DESCRICAO_LINK;
          ?>
          </p>
          <?php
            echo '<a href="'.$dados['link'][0]->CAMINHO_LINK.'" target="_blank">'.$dados['link'][0]->CAMINHO_LINK.'</a>';
          } ?>
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
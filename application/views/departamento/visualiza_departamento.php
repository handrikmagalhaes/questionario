  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php if(isset($dados['departamento'])){echo $dados['departamento'][0]->TITULO_DEPARTAMENTO;} ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="./">{titulo}</a></li>
              <li class="breadcrumb-item active"><?php if(isset($dados['departamento'])){echo $dados['departamento'][0]->TITULO_DEPARTAMENTO;} ?></li>
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
			  <?php
			  if (isset($dados['departamento'])){
			  echo $dados['departamento'][0]->DESCRICAO_DEPARTAMENTO . '<br>';
			  // LISTA COLABORADORES
			  ?>
			  <hr>
			  <div id="accordion">
				  <?php
				  foreach ($dados['usuarios']['usuario'] as $index => $usuario) {
					  ?>
					  <div class="card">
						  <div class="card-header" id="headingOne">
							  <h5 class="mb-0">
								  <span class="image" style="background-color: #c3c3c3; background-size: cover; width: 30px; height: 30px; float: left; border-radius: 100px; background-image: url('<?php echo '.'.$usuario->CAMINHO_FOTO_USUARIO; ?>')"></span>
								  <button class="btn collapsed" data-toggle="collapse" data-target="#item<?= $index+1 ?>"
										  aria-expanded="true" aria-controls="item<?= $index+1 ?>"><?= $usuario->NOME_USUARIO ?>
								  </button>
							  </h5>
						  </div>
						  <div id="item<?= $index+1 ?>" class="collapse" aria-labelledby="headingOne"
							   data-parent="#accordion">
							  <div class="card-body">
								  <b>Cargo:</b> <?= $dados['cargos']['cargos'][$usuario->ID_CARGO-1]->TITULO_CARGO ?><br>
								  <b>Telefone:</b> <?= $usuario->TELEFONE_USUARIO ?> <b>| Celular:</b> <?= $usuario->CELULAR_USUARIO ?> <b>| Ramal:</b> <?= $usuario->CELULAR_USUARIO ?><br>
								  <b>Email:</b> <?= $usuario->EMAIL_USUARIO ?><br>
								  <b>Horário de Expediente:</b> <?= $usuario->HORARIO_EXPEDIENTE_USUARIO ?><br>
							  </div>
						  </div>
					  </div>
					  <?php
				  }
				  }
				  ?>
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

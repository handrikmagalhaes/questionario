  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sobre nossa empresa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="./">{titulo}</a></li>
              <li class="breadcrumb-item active">Sobre nossa empresa</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="card">
	  	  <?php if ($_SESSION['admin_master']): ?> <!--<VERIFICAR PERMISSÃO>-->
		  	  <form method="post" action="edicao" class="btn btn-sm border-0 p-0 m-0">
			  	  <input type="hidden" name="id" value="<?php echo $dados['empresa'][0]->ID_EMPRESA; ?>">
				    <button type="submit" class="btn btn-sm btn-outline-primary btn-editar border-0 pt-0 pb-0" data-toggle="tooltip" data-placement="top" title="Editar" data-original-title="Editar"><i class="fas fa-pencil-alt"></i></button>
			    </form>
		    <?php endif; ?>
      </div>

      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-dados" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Dados da Empresa</button>
          <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-bancarios" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Dados Bancários</button>
          <button class="nav-link" id="nav-contact-tab" data-toggle="tab" data-target="#nav-historia" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Nossa História</button>
          <button class="nav-link" id="nav-contact-tab" data-toggle="tab" data-target="#nav-atuacao" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Atuação</button>
          <button class="nav-link" id="nav-contact-tab" data-toggle="tab" data-target="#nav-missao" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Missão</button>
          <button class="nav-link" id="nav-contact-tab" data-toggle="tab" data-target="#nav-visao" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Visão</button>
          <button class="nav-link" id="nav-contact-tab" data-toggle="tab" data-target="#nav-valores" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Valores</button>
        </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane card fade show active mt-2 pl-2 pt-2 pr-2 pb-2" id="nav-dados" role="tabpanel" aria-labelledby="nav-home-tab"><?php if(isset($dados['empresa'])){echo $dados['empresa'][0]->QUEM_SOMOS;} ?></div>
        <div class="tab-pane card fade mt-2 pl-2 pt-2 pr-2 pb-2" id="nav-bancarios" role="tabpanel" aria-labelledby="nav-profile-tab"><?php if(isset($dados['empresa'])){echo $dados['empresa'][0]->DADOS_BANCARIOS;} ?></div>
        <div class="tab-pane card fade mt-2 pl-2 pt-2 pr-2 pb-2" id="nav-historia" role="tabpanel" aria-labelledby="nav-contact-tab"><?php if(isset($dados['empresa'])){echo $dados['empresa'][0]->HISTORIA;} ?></div>
        <div class="tab-pane card fade mt-2 pl-2 pt-2 pr-2 pb-2" id="nav-atuacao" role="tabpanel" aria-labelledby="nav-contact-tab"><?php if(isset($dados['empresa'])){echo $dados['empresa'][0]->ATUACAO;} ?></div>
        <div class="tab-pane card fade mt-2 pl-2 pt-2 pr-2 pb-2" id="nav-missao" role="tabpanel" aria-labelledby="nav-contact-tab"><?php if(isset($dados['empresa'])){echo $dados['empresa'][0]->MISSAO;} ?></div>
        <div class="tab-pane card fade mt-2 pl-2 pt-2 pr-2 pb-2" id="nav-visao" role="tabpanel" aria-labelledby="nav-contact-tab"><?php if(isset($dados['empresa'])){echo $dados['empresa'][0]->VISAO;} ?></div>
        <div class="tab-pane card fade mt-2 pl-2 pt-2 pr-2 pb-2" id="nav-valores" role="tabpanel" aria-labelledby="nav-contact-tab"><?php if(isset($dados['empresa'])){echo $dados['empresa'][0]->VALORES;} ?></div>
      </div>

      <!-- Default box
      <div class="card">
		  <?php //if ($_SESSION['admin_master']): ?> <VERIFICAR PERMISSÃO>
			  <form method="post" action="edicao" class="btn btn-sm border-0 p-0 m-0">
				  <input type="hidden" name="id" value="<?php //echo $dados['empresa'][0]->ID_EMPRESA; ?>">
				  <button type="submit" class="btn btn-sm btn-outline-primary btn-editar border-0 pt-0 pb-0" data-toggle="tooltip" data-placement="top" title="Editar" data-original-title="Editar"><i class="fas fa-pencil-alt"></i></button>
			  </form>
		  <?php //endif; ?>
		  <div class="card-body">
          <?php //if(isset($dados['empresa'])){echo $dados['empresa'][0]->QUEM_SOMOS;} ?>
        </div>
        <!-- /.card-body
        <div class="card-footer">
          <a class="btn btn-secondary" href="../">Voltar</a>
        </div>
        <!-- /.card-footer
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Lista de {titulo}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="./">{titulo}</a></li>
              <li class="breadcrumb-item active">Lista de {titulo}</li>
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
            <div class="card">
              <div class="card-header">

                <div class="card-tools float-left mt-2">
                  <div class="input-group input-group-sm" style="width: 700px;">
                    <?php
                      $link = explode('/', $_SERVER["REQUEST_URI"]); 
                      $busca = '';
                      if(isset($link[$GLOBALS['pos_parametro_lista']+1])){
					  	$link_busca =  $link[$GLOBALS['pos_parametro_lista']+1];
					 	$busca = str_replace('%20', ' ', $link_busca);
					  }
                    ?>

                    <input type="text" id="texto_busca" class="form-control float-right" placeholder="Buscar" value="<?php echo $busca; ?>">
                    <div class="input-group-append">
                      <button class="btn btn-default" id="buscar"><i class="fas fa-search pr-1"></i>Buscar</button>
                    </div>
                    <label for="select_paginas" class="ml-3 pt-1">Registros por página:</label>
                    <select id="select_paginas" class="form-control float-right ml-1" onchange="mudaNumeroRegistros()">
                      <option <?php if($registros_por_pagina == 10){echo "selected";} else {echo " ";} ?>>10</option>
                      <option <?php if($registros_por_pagina == 25){echo "selected";} else {echo " ";} ?>>25</option>
                      <option <?php if($registros_por_pagina == 50){echo "selected";} else {echo " ";} ?>>50</option>
                      <option <?php if($registros_por_pagina == 100){echo "selected";} else {echo " ";} ?>>100</option>
                    </select>

                  </div>
                </div>
			    <?php if($_SESSION['inserir_feedback']){ ?>
				  <a href="{url_base}feedback/cadastro" class="btn btn-primary float-right" id="adicionar">Adicionar Novo</a>
				<?php } ?>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0" id="lista-feedbacks">
                <table class="table table-striped">
                  <thead>                  
                    <tr>
                      <th width="150px">Ações</th>
                      <th onmouseover="this.style.cursor='pointer';">Título</th>
                      <th onmouseover="this.style.cursor='pointer';">Usuário</th>
				      <th>Tipo</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($dados['feedbacks'] as $feedback): ?>
                      <tr>
                        <td>
                          <?php if ($_SESSION['visualizar_feedback']): ?> <!-- VERIFICAR PERMISSÃO -->
                            <form method="post" action="../../../visualiza" class="btn btn-sm border-0 p-0 m-0">
                              <input type="hidden" name="id" value="<?php echo $feedback->ID_FEEDBACK; ?>">
                              <button type="submit" class="btn btn-sm btn-outline-secondary btn-ver border-0 pt-0 pb-0" data-toggle="tooltip" data-placement="top" title="Ver" data-original-title="Ver"><i class="fas fa-eye"></i></button>
                            </form>
                          <?php endif; ?>
                          <?php if ($_SESSION['editar_feedback']): ?> <!-- VERIFICAR PERMISSÃO -->
                            <form method="post" action="../../../edicao" class="btn btn-sm border-0 p-0 m-0">
                              <input type="hidden" name="id" value="<?php echo $feedback->ID_FEEDBACK; ?>">
                              <button type="submit" class="btn btn-sm btn-outline-primary btn-editar border-0 pt-0 pb-0" data-toggle="tooltip" data-placement="top" title="Editar" data-original-title="Editar"><i class="fas fa-pencil-alt"></i></button>
                            </form>
                          <?php endif; ?>
                          <?php if ($_SESSION['excluir_feedback']): ?> <!-- VERIFICAR PERMISSÃO -->
                            <button data-id="<?php echo $feedback->ID_FEEDBACK; ?>" class="btn btn-sm btn-outline-danger btn-excluir border-0 pt-0 pb-0" data-toggle="tooltip" data-placement="top" title="Excluir" data-original-title="Excluir"><i class="fas fa-trash"></i></button>
                          <?php endif; ?>
                        </td>
                        <td><?php echo $feedback->TITULO_FEEDBACK; ?></td>
                        <td><?php echo $feedback->ANONIMO ? "Usuário Anônimo" : $feedback->NOME_USUARIO; ?></td>
                        <td><?php
                        switch ($feedback->IND_TIPO_FEEDBACK){
                          case 'S' : echo 'Sugestão'; break;
                          case 'E' : echo 'Elogio'; break;
                          case 'C' : echo 'Crítica'; break;
                        }
                        ?></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item voltar-pagina"><a class="page-link" href="#">&laquo;</a></li>
                  <?php for ($pagina=1; $pagina <= $dados['paginas']; $pagina++): ?>
                    <li class="page-item numero-pagina"><a class="page-link" href="#"><?php echo $pagina ?></a></li>
                  <?php endfor; ?>
                  <li class="page-item proxima-pagina"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
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

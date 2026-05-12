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
              <?php //echo var_dump($_SESSION); ?>
            </ol>
            <input type="hidden" id="idUsuario" value="<?php echo $_SESSION['id']; ?>">
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
              <!-- .card-header -->
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
                  </div>
                </div>
			          <?php if($_SESSION['inserir_feedback']){ ?>
        				  <a href="{url_base}feedback/cadastro" class="btn btn-primary float-right" id="adicionar">Adicionar Novo</a>
        				<?php } ?>
              </div>
              <!-- /.card-header -->
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane card fade show active mt-2 pl-2 pt-2 pr-2 pb-2" id="nav-recebidos" role="tabpanel" aria-labelledby="nav-home-tab">
                  <div class="card-body p-0" id="lista-feedbacks">
                    <?php foreach ($dados['feedbacks'] as $feedback):
                      if(in_array($feedback->ID_DEPARTAMENTO, array(0,$_SESSION['departamento'])) || $_SESSION['admin_master'] || $feedback->ID_USUARIO == $_SESSION['id']){
                        if($_SESSION['responsavel'] || $_SESSION['admin_master']){?> <!-- Aqui só imprime feedbacks quando se é responsável pelo setor ou admin-->
                          <!-- Cards de dados de feedback -->
                          <div class="card">
                            <div class="card-header">
                              <div class="row">
                                <input type="hidden" id="id_feedback<?php echo $feedback->ID_FEEDBACK; ?>" value="<?php echo $feedback->ID_FEEDBACK; ?>">
                                <div class="col">Em <?php echo date('d/m/Y', strtotime($feedback->DT_CRIACAO))." ";?> <span class="font-weight-bold"><?php echo $feedback->ANONIMO ? "Usuário Anônimo" : $feedback->NOME_USUARIO; ?></span> escreveu um(a) <?php
                                      switch ($feedback->IND_TIPO_FEEDBACK){
                                        case 'S' : echo 'Sugestão '; break;
                                        case 'E' : echo 'Elogio '; break;
                                        case 'C' : echo 'Crítica '; break;
                                      }
                                      ?>para<?php echo $feedback->TITULO_DEPARTAMENTO != '' ? " o(a) ".$feedback->TITULO_DEPARTAMENTO : " todos."; ?></div>
                                <div class="col-2 text-right"><button type="button" id="btnMostrar" class="btn btn-sm btn-outline-primary border-0 pt-0 pb-0" data-toggle="collapse" data-target="#mensagens<?php echo $feedback->ID_FEEDBACK; ?>" aria-expanded="false" aria-controls="mensagens<?php echo $feedback->ID_FEEDBACK; ?>" onclick="mostraFeedback(<?php echo $feedback->ID_FEEDBACK; ?>)"><i class="fas fa-angle-double-down" id="iconExpand"></i></button></div>
                              </div>
                              <?php echo $feedback->DESCRICAO_FEEDBACK; ?>
                            </div>

                            <div class="collapse" id="mensagens<?php echo $feedback->ID_FEEDBACK; ?>">
                              <div class="card-body" id="feedbacks<?php echo $feedback->ID_FEEDBACK; ?>"></div>
                            </div>
                            <div class="card-footer text-right">
                              <div class="row">
                                <div class="col-sm text-left">
                                  <input class="form form-control" type="text" id="inputMensagem<?php echo $feedback->ID_FEEDBACK; ?>" required>
                                </div>
                                <div class="col-1 pt-2 form-group form-check">
                                <input type="checkbox" class="form-check-input" id="checkAnonimo<?php echo $feedback->ID_FEEDBACK; ?>">
                                <label class="form-check-label" for="exampleCheck1" >Anonimo</label>
                                </div>
                                <div class="col-1 text-left">
                                <button type="button" class="btn btn-sm btn-outline-success btn-responder border-0" title="Responder" data-original-title="Responder" id="btnResponder" onclick="responderFeedback(<?php echo $feedback->ID_FEEDBACK; ?>)"><i class="fas fa-paper-plane pr-2"></i>Responder</button>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col text-right">
                                  <?php if (in_array($feedback->ID_DEPARTAMENTO, array(0,$_SESSION['departamento'])) && $_SESSION['responsavel']): ?> <!-- VERIFICAR PERMISSÃO -->
                                      <?php if (!$feedback->PUBLICO):?>
                                      <button type="button" id=mostra<?php echo $feedback->ID_FEEDBACK; ?> class="btn btn-sm btn-outline-secondary btn-ver border-0 pt-0 pb-0" data-toggle="tooltip" data-placement="top" title="Mostrar" data-original-title="Mostrar" onclick="mudaPublico(<?php echo $feedback->ID_FEEDBACK; ?>, 1)"><i class="fas fa-eye pr-2"></i>Compartilhar Feedback</button>
                                      <?php else:  ?>
                                      <button type="button" id=mostra<?php echo $feedback->ID_FEEDBACK; ?> class="btn btn-sm btn-outline-primary btn-ver border-0 pt-0 pb-0" data-toggle="tooltip" data-placement="top" title="Esconder" data-original-title="Esconder" onclick="mudaPublico(<?php echo $feedback->ID_FEEDBACK; ?>, 0)"><i class="fas fa-eye pr-2"></i>Compartilhar Feedback</button>  
                                      <?php endif ?>
                                  <?php endif ?>
                                  <?php if ($_SESSION['editar_feedback']): ?> <!-- VERIFICAR PERMISSÃO -->
                                    <form method="post" action="../../../edicao" class="btn btn-sm border-0 p-0 m-0">
                                      <input type="hidden" name="id" value="<?php echo $feedback->ID_FEEDBACK; ?>">
                                      <button type="submit" class="btn btn-sm btn-outline-primary btn-editar border-0 pt-0 pb-0" data-toggle="tooltip" data-placement="top" title="Editar" data-original-title="Editar"><i class="fas fa-pencil-alt"></i></button>
                                    </form>
                                  <?php endif; ?>
                                  <?php if ($_SESSION['excluir_feedback']): ?> <!-- VERIFICAR PERMISSÃO -->
                                    <button data-id="<?php echo $feedback->ID_FEEDBACK; ?>" class="btn btn-sm btn-outline-danger btn-excluir border-0 pt-0 pb-0" data-toggle="tooltip" data-placement="top" title="Excluir" data-original-title="Excluir"><i class="fas fa-trash"></i></button>
                                  <?php endif; ?>
                                </div>
                              </div>
                            </div>
                          </div>
                        <?php } elseif (!$_SESSION['responsavel'] && $feedback->PUBLICO == 1) {?>
                          <!-- Cards de dados de feedback --> <!-- Aqui imprime os feedbacks públicos -->
                          <div class="card">
                            <div class="card-header">
                              <div class="row">
                                <input type="hidden" id="id_feedback<?php echo $feedback->ID_FEEDBACK; ?>" value="<?php echo $feedback->ID_FEEDBACK; ?>">
                                <div class="col">Em <?php echo date('d/m/Y', strtotime($feedback->DT_CRIACAO))." ";?> <span class="font-weight-bold"><?php echo $feedback->ANONIMO ? "Usuário Anônimo" : $feedback->NOME_USUARIO; ?></span> escreveu um(a) <?php
                                      switch ($feedback->IND_TIPO_FEEDBACK){
                                        case 'S' : echo 'Sugestão'; break;
                                        case 'E' : echo 'Elogio'; break;
                                        case 'C' : echo 'Crítica'; break;
                                      }
                                      ?>:</div>
                                <div class="col text-right"><button type="button" id="btnMostrar" class="btn btn-sm btn-outline-primary border-0 pt-0 pb-0" data-toggle="collapse" data-target="#mensagens<?php echo $feedback->ID_FEEDBACK; ?>" aria-expanded="false" aria-controls="mensagens<?php echo $feedback->ID_FEEDBACK; ?>" onclick="mostraFeedback(<?php echo $feedback->ID_FEEDBACK; ?>)"><i class="fas fa-angle-double-down" id="iconExpand"></i></button></div>
                              </div>
                              <?php echo $feedback->DESCRICAO_FEEDBACK; ?>
                            </div>

                            <div class="collapse" id="mensagens<?php echo $feedback->ID_FEEDBACK; ?>">
                              <div class="card-body" id="feedbacks<?php echo $feedback->ID_FEEDBACK; ?>"></div>
                            </div>
                            <div class="card-footer text-right">
                              <div class="row">
                                <div class="col-sm text-left">
                                  <input class="form form-control" type="text" id="inputMensagem<?php echo $feedback->ID_FEEDBACK; ?>" required>
                                </div>
                                <div class="col-1 pt-2 form-group form-check">
                                <input type="checkbox" class="form-check-input" id="checkAnonimo<?php echo $feedback->ID_FEEDBACK; ?>">
                                <label class="form-check-label" for="exampleCheck1" >Anonimo</label>
                                </div>
                                <div class="col-1 text-left">
                                <button type="button" class="btn btn-sm btn-outline-success btn-responder border-0 pt-2 pb-0" title="Responder" data-original-title="Responder" id="btnResponder" onclick="responderFeedback(<?php echo $feedback->ID_FEEDBACK; ?>)"><i class="fas fa-paper-plane"></i></button>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col text-right">
                                  <?php if ($_SESSION['responsavel']): ?> <!-- VERIFICAR PERMISSÃO -->
                                      <?php if ($feedback->PUBLICO): ?>
                                        <button type="button" id=mostra<?php echo $feedback->ID_FEEDBACK; ?> class="btn btn-sm btn-outline-primary btn-ver border-0 pt-0 pb-0" data-toggle="tooltip" data-placement="top" title="Esconder" data-original-title="Esconder" onclick="mudaPublico(<?php echo $feedback->ID_FEEDBACK; ?>, 0)"><i class="fas fa-eye"></i></button>
                                      <?php else: ?>
                                        <button type="button" id=mostra<?php echo $feedback->ID_FEEDBACK; ?> class="btn btn-sm btn-outline-secondary btn-ver border-0 pt-0 pb-0" data-toggle="tooltip" data-placement="top" title="Publicar" data-original-title="Publicar" onclick="mudaPublico(<?php echo $feedback->ID_FEEDBACK; ?>, 1)"><i class="fas fa-eye"></i></button>
                                      <?php endif; ?>
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
                                </div>
                              </div>
                            </div>
                          <?php }
                      } ?>
                    <?php endforeach; ?>
                  </div>
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

  <!-- MODAL EXCLUSÃO -->
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

  <!-- MODAL DADOS -->
  <!-- Modal -->
  <div class="modal fade" id="modalDados" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
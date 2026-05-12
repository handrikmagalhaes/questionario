                <!-- Feedbacks enviados
                <div class="tab-pane card fade mt-2 pl-2 pt-2 pr-2 pb-2" id="nav-enviados" role="tabpanel" aria-labelledby="nav-profile-tab">
                  <div class="card-body p-0" id="lista-feedbacks">
                  <?php foreach ($dados['feedbacks'] as $feedback):
                      if($feedback->ID_USUARIO == $_SESSION['id'] || $_SESSION['admin_master']){?>
                        <!-- Cards de dados de feedback -->
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
                                <?php if ($_SESSION['visualizar_feedback']): ?> <!-- VERIFICAR PERMISSÃO -->
                                  <form method="post" action="../../../visualiza" class="btn btn-sm border-0 p-0 m-0">
                                    <input type="hidden" name="id<?php echo $feedback->ID_FEEDBACK; ?>" value="<?php echo $feedback->ID_FEEDBACK; ?>">
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
                              </div>
                            </div>
                          </div>
                        </div>
                      <?php } ?>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>

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

                      if(isset($link[$GLOBALS['pos_parametro_lista']+2]) and isset($link[$GLOBALS['pos_parametro_lista']+3]) and isset($link[$GLOBALS['pos_parametro_lista']+4])){
                        $campo = $link[$GLOBALS['pos_parametro_lista']+2];
                        $ord = $link[$GLOBALS['pos_parametro_lista']+3];
$registros_por_pagina = $link[$GLOBALS['pos_parametro_lista']+4];
                      } else {
                        $campo = 'TITULO_NIVEL_ACESSO';
                        $ord = 'asc';
$registros_por_pagina = 10;
$registros_por_pagina = 10;
                      }

                    ?>
                    <input type="hidden" id="texto-campo" value="<?php echo $campo; ?>">
                    <input type="hidden" id="texto-ord" value="<?php echo $ord; ?>">
                    <input type="hidden" id="texto-paginas" value="<?php echo $registros_por_pagina; ?>">
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
			    <?php if($_SESSION['inserir_nivel_acesso']){ ?>
				  <a href="{url_base}nivel_acesso/cadastro" class="btn btn-primary float-right" id="adicionar">Adicionar Novo</a>
				<?php } ?>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0" id="lista-niveis-acesso">
                <table class="table table-striped">
                  <thead>                  
                    <tr>
                      <th onclick="ordena('TITULO_NIVEL_ACESSO')" onmouseover="this.style.cursor='pointer';">Título</th>
                      <th width="150px">Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($dados['niveis_acesso'] as $nivel_acesso): ?>
                      <tr>
                        <td <?php if ($_SESSION['visualizar_nivel_acesso']): ?>onclick="abreModal(<?php echo $nivel_acesso->ID_NIVEL_ACESSO; ?>)"<?php endif; ?> onmouseover="this.style.cursor='pointer';"><?php echo $nivel_acesso->TITULO_NIVEL_ACESSO; ?></td>
                          <td>
                          <?php if ($_SESSION['editar_nivel_acesso']): ?> <!-- VERIFICAR PERMISSÃO -->
                            <form method="post" action="/nivel_acesso/edicao" class="btn btn-sm border-0 p-0 m-0">
                              <input type="hidden" name="id" value="<?php echo $nivel_acesso->ID_NIVEL_ACESSO; ?>">
                              <button type="submit" class="btn btn-sm btn-outline-primary btn-editar border-0 pt-0 pb-0" data-toggle="tooltip" data-placement="top" title="Editar" data-original-title="Editar"><i class="fas fa-pencil-alt"></i></button>
                            </form>
                          <?php endif; ?>
                          <?php if ($_SESSION['excluir_nivel_acesso']): ?> <!-- VERIFICAR PERMISSÃO -->
                            <button data-id="<?php echo $nivel_acesso->ID_NIVEL_ACESSO; ?>" class="btn btn-sm btn-outline-danger btn-excluir border-0 pt-0 pb-0" data-toggle="tooltip" data-placement="top" title="Excluir" data-original-title="Excluir"><i class="fas fa-trash"></i></button>
                          <?php endif; ?>
                        </td>
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

  <!-- Modal Dados -->
  <div class="modal fade " id="modalDados" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Dados do Perfil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal-dados">
        <p class="font-weight-bold mb-0">Descrição</p>
        <p class="font-weight-normal" id="descricaoPerfil"></p>
        <p class="font-weight-bold mb-0">Permissões:</p>
        <div class="row" id="divPermissões">

          <//!-- PERMISSÕES PARA CARGOS --//>
          <div class="col-xs-12 col-sm-4 grupo-permissoes">
            <div class="col mb-0 mt-4">
              <label class="form-check-label"><i class="fa fa-id-badge"></i> Cargos</label>
            </div>
            <hr class="mt-2">
            <div class="row">
              <ul>
                <li id="visualizar_cargo">Visualizar</li>
                <li id="inserir_cargo">Inserir</li>
                <li id="editar_cargo">Editar</li>
                <li id="excluir_cargo">Excluir</li>
              </ul>
            </div>
          </div>
          <//!-- PERMISSÕES PARA DEPARTAMENTOS --//>
          <div class="col-xs-12 col-sm-4 grupo-permissoes">
            <div class="form-check mb-0 mt-4">
              <label class="form-check-label">
                <i class="fa fa-sitemap"></i> Departamentos
              </label>
            </div>
            <hr class="mt-2">
            <div class="row">
              <ul>
                <li id="visualizar_departamento">Visualizar</li>
                <li id="inserir_departamento">Inserir</li>
                <li id="editar_departamento">Editar</li>
                <li id="excluir_departamento">Excluir</li>
              </ul>
            </div>
          </div>
          <//!-- PERMISSÕES PARA USUÁRIOS --//>
          <div class="col-xs-12 col-sm-4 grupo-permissoes">
            <div class="form-check mb-0 mt-4">
              <label class="form-check-label">
                <i class="fa fa-user"></i> Usuários
              </label>
            </div>
            <hr class="mt-2">
            <div class="row">
              <ul>
                <li id="visualizar_usuario">Visualizar</li>
                <li id="inserir_usuario">Inserir</li>
                <li id="editar_usuario">Editar</li>
                <li id="excluir_usuario">Excluir</li>
              </ul>
            </div>

          </div>
          <//!-- PERMISSÕES PARA AVISOS --//>
          <div class="col-xs-12 col-sm-4 grupo-permissoes">
            <div class="form-check mb-0 mt-4">
              <label class="form-check-label">
                <i class="fa fa-exclamation-triangle"></i> Avisos
              </label>
            </div>
            <hr class="mt-2">
            <div class="row">
              <ul>
                <li id="visualizar_aviso">Visualizar</li>
                <li id="inserir_aviso">Inserir</li>
                <li id="editar_aviso">Editar</li>
                <li id="excluir_aviso">Excluir</li>
              </ul>
            </div>
          </div>
          <//!-- PERMISSÕES PARA COMUNICADOS INTERNOS --//>
          <div class="col-xs-12 col-sm-4 grupo-permissoes">
            <div class="form-check mb-0 mt-4">
              <label class="form-check-label">
                <i class="fa fa-envelope-open-text"></i> Comunicados Internos
              </label>
            </div>
            <hr class="mt-2">
            <div class="row">
              <ul>
                <li id="visualizar_comunicado">Visualizar</li>
                <li id="inserir_comunicado">Inserir</li>
                <li id="editar_comunicado">Editar</li>
                <li id="excluir_comunicado">Excluir</li>
              </ul>
            </div>
</div>
          <//!-- PERMISSÕES PARA DICAS DE SAÚDE --//>
          <div class="col-xs-12 col-sm-4 grupo-permissoes">
            <div class="form-check mb-0 mt-4">
              <label class="form-check-label">
                <i class="fa fa-heartbeat"></i> Dicas de Saúde e Mensagens
              </label>
            </div>
            <hr class="mt-2">
            <div class="row">
              <ul>
                <li id="visualizar_saude">Visualizar</li>
                <li id="inserir_saude">Inserir</li>
                <li id="editar_saude">Editar</li>
                <li id="excluir_saude">Excluir</li>
              </ul>
            </div>
          </div>
          <//!-- PERMISSÕES PARA TIPOS DE ARQUIVO --//>
          <div class="col-xs-12 col-sm-4 grupo-permissoes">
            <div class="form-check mb-0 mt-4">
              <label class="form-check-label">
                <i class="fa fa-file-alt"></i> Tipos de Arquivo
              </label>
            </div>
            <hr class="mt-2">
            <div class="row">
              <ul>
                <li id="visualizar_tipo_arquivo">Visualizar</li>
                <li id="inserir_tipo_arquivo">Inserir</li>
                <li id="editar_tipo_arquivo">Editar</li>
                <li id="excluir_tipo_arquivo">Excluir</li>
              </ul>
            </div>
          </div>
          <//!-- PERMISSÕES PARA ARQUIVOS --//>
          <div class="col-xs-12 col-sm-4 grupo-permissoes">
            <div class="form-check mb-0 mt-4">
              <label class="form-check-label">
                <i class="fa fa-file"></i> Normas Internas e Manuais
              </label>
            </div>
            <hr class="mt-2">
            <div class="row">
              <ul>
                <li id="visualizar_arquivo">Visualizar</li>
                <li id="inserir_arquivo">Inserir</li>
                <li id="editar_arquivo">Editar</li>
                <li id="excluir_arquivo">Excluir</li>
              </ul>
            </div>
          </div>
          <//!-- PERMISSÕES PARA LINKS --//>
          <div class="col-xs-12 col-sm-4 grupo-permissoes">
            <div class="form-check mb-0 mt-4">
              <label class="form-check-label">
                <i class="fa fa-link"></i> Links
              </label>
            </div>
            <hr class="mt-2">
            <div class="row">
              <ul>
                <li id="visualizar_link">Visualizar</li>
                <li id="inserir_link">Inserir</li>
                <li id="editar_link">Editar</li>
                <li id="excluir_link">Excluir</li>
              </ul>
            </div>
          </div>
          <//!-- PERMISSÕES PARA MÍDIAS --//>
          <div class="col-xs-12 col-sm-4 grupo-permissoes">
            <div class="form-check mb-0 mt-4">
              <label class="form-check-label">
                <i class="fa fa-image"></i> Mídias
              </label>
            </div>
            <hr class="mt-2">
            <div class="row">
              <ul>
                <li id="visualizar_midia">Visualizar</li>
                <li id="inserir_midia">Inserir</li>
                <li id="editar_midia">Editar</li>
                <li id="excluir_midia">Excluir</li>
              </ul>
            </div>
          </div>
          <//!-- PERMISSÕES PARA EVENTOS --//>
          <div class="col-xs-12 col-sm-4 grupo-permissoes">
            <div class="form-check mb-0 mt-4">
              <label class="form-check-label">
                <i class="fa fa-calendar-check"></i> Eventos
              </label>
            </div>
            <hr class="mt-2">
            <div class="row">
              <ul>
                <li id="visualizar_evento">Visualizar</li>
                <li id="inserir_evento">Inserir</li>
                <li id="editar_evento">Editar</li>
                <li id="excluir_evento">Excluir</li>
              </ul>
            </div>
          </div>
          <//!-- PERMISSÕES PARA FEEDBACK --//>
          <div class="col-xs-12 col-sm-4 grupo-permissoes">
            <div class="form-check mb-0 mt-4">
              <label class="form-check-label">
                <i class="fa fa-calendar-comments"></i> Feedback
              </label>
            </div>
            <hr class="mt-2">
            <div class="row">
              <ul>
                <li id="visualizar_feedback">Visualizar</li>
                <li id="inserir_feedback">Inserir</li>
                <li id="editar_feedback">Editar</li>
                <li id="excluir_feedback">Excluir</li>
              </ul>
            </div>
          </div>
          <//!-- PERMISSÕES PARA RESULTADOS --//>
          <div class="col-xs-12 col-sm-4 grupo-permissoes">
            <div class="form-check mb-0 mt-4">
              <label class="form-check-label">
                <i class="fa fa-calendar-comments"></i> Resultados
              </label>
            </div>
            <hr class="mt-2">
            <div class="row">
              <ul>
                <li id="visualizar_resultado">Visualizar</li>
                <li id="inserir_resultado">Inserir</li>
                <li id="editar_resultado">Editar</li>
                <li id="excluir_resultado">Excluir</li>
              </ul>
            </div>
          </div>
          <//!-- PERMISSÕES PARA NÍVEIS DE ACESSO --//>
          <div class="col-xs-12 col-sm-4 grupo-permissoes">
            <div class="form-check mb-0 mt-4">
              <label class="form-check-label">
                <i class="fa fa-user-lock"></i> Níveis de Acesso
              </label>
            </div>
            <hr class="mt-2">
            <div class="row">
              <ul>
                <li id="visualizar_nivel_acesso">Visualizar</li>
                <li id="inserir_nivel_acesso">Inserir</li>
                <li id="editar_nivel_acesso">Editar</li>
                <li id="excluir_nivel_acesso">Excluir</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>



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
      <div class="card">
        <div class="card-header">
          <div class="row">
              <div class="col-sm-3">
                <input type="text" id="texto_busca" class="form-control float-right" placeholder="Título do Documento">
              </div>
              <div class="col-sm-3">
                <button class="btn btn-default" id="buscar"><i class="fas fa-search pr-1"></i>Buscar</button>
              </div>
          </div>
        </div>
      </div>
        <div class="row ml-5 mt-5" id="principal">
          
        </div>
        <div class="row ml-5 mt-5" id="publica">
        <div class="card" style="min-width: 850px;">
          <div class="card-header">
              <div class="row">
                <h4 class="col text-left">Normas e Manuais Gerais</h4>
                <a class="text-decoration-none" data-toggle="collapse" href="#"><i class="col-md-1 text-right fas fa-chevron-down"></i></a>
              </div>
              <div class="card-body" id="cardPublico">

              </div>
         </div>
        </div>
        <div id="tree"></div>
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
  <div class="modal fade" id="modalDados" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Dados do documento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal-dados">
        
      <!-- Dados permanentes -->
        <label for="tituloArquivo" class="font-weight-bold mb-0">Título:</label>
        <p class="card-text text-justify" id="tituloArquivo"></p>
        <label for="tipoDocumento" class="font-weight-bold mb-0">Tipo do Documento:</label>
        <p class="card-text text-justify" id="tipoDocumento"></p>
        <label for="disponivelDocumento" class="font-weight-bold mb-0">Disponível para:</label>
        <p class="card-text text-justify" id="disponivelDocumento"></p>
        <label for="descricaoDocumento" class="font-weight-bold mb-0">Descricao do Documento:</label>
        <p class="card-text text-justify border border-secondary rounded-lg pl-1 pt-1 pr-1 pb-1" id="descricaoDocumento"></p>

        <!-- Dados opcionais -->
        <label for="linkArquivo" id="labelLinkArquivo" class="font-weight-bold mb-0" style="display: none;">Página WEB:</label>
        <p class="card-text text-justify" id="linkArquivo" style="display: none;"></p>
        <label for="linkDocumento" id="labelLinkDocumento" class="font-weight-bold mb-0" style="display: none;">Abrir Documento:</label>
        <p class="card-text text-justify" id="linkDocumento" style="display: none;"></p>

        


      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<!--

  <div class="card w-100">
            <div class="card-header"><h4><?php echo $dados['arquivos'][0]->TITULO_DEPARTAMENTO == '' ? 'Arquivos disponíveis a Todos' :  'Arquivos do(a) '.$dados['arquivos'][0]->TITULO_DEPARTAMENTO;
/*            $departamento = $dados['arquivos'][0]->TITULO_DEPARTAMENTO; ?></h4></div>
            <div class="card-body"><ol>
              <?php foreach ($dados['arquivos'] as $arquivo): 
                if ($departamento != $arquivo->TITULO_DEPARTAMENTO){
                    echo "</ol></div></div></div>";
                    $departamento = $arquivo->TITULO_DEPARTAMENTO;
                    echo '<div class="row"><div class="card w-100"><div class="card-header"><h4>';
                    echo $arquivo->TITULO_DEPARTAMENTO == '' ? "Arquivos disponíveis a Todos</div><div class='card-body'><ol>" :  "Arquivos do(a) ".$arquivo->TITULO_DEPARTAMENTO."</h4></div><div class='card-body'><ol>";
                }?>
                <?php
                $linha = $arquivo->TITULO_ARQUIVO;
                if ($arquivo->LINK_ARQUIVO != ''){
                  $linha = '<a class="text-decoration-none" href="'.$arquivo->LINK_ARQUIVO.'" target="_blank">'.$linha.'</a>';
                }
                if ($arquivo->CAMINHO_ARQUIVO != ''){
                  $linha = $linha.' - <a href="/'.$arquivo->CAMINHO_ARQUIVO.'" target="_blank"><i class="nav-icon fas fa-file"></i></a>';
                }?>
                
                <li><span><?php echo $linha; ?></span></li>
              <?php endforeach ?>
              </ol></div>
          </div>
-->
*/
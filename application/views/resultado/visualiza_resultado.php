  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php if(isset($dados['dados_resultado']['resultado'])){echo $dados['dados_resultado']['resultado'][0]->TITULO_RESULTADO;} ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="./">{titulo}</a></li>
              <li class="breadcrumb-item active"><?php if(isset($dados['dados_resultado']['resultado'])){echo $dados['dados_resultado']['resultado'][0]->TITULO_RESULTADO;} ?></li>
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
			if (isset($dados['dados_resultado']['resultado'])) {
				echo $dados['dados_resultado']['resultado'][0]->DESCRICAO_RESULTADO . '<br>';
			}
			if (isset($dados['dados_resultado']['itens_resultado'])) {
				$anos = array();
//				foreach($dados['dados_resultado']['itens_resultado'] as $item){
//					echo $item->PERIODO_RESULTADO_ITEM . '<br>';
//					echo $item->META_RESULTADO_ITEM . '<br>';
//					echo $item->REALIZADO_RESULTADO_ITEM . '<br>';
//				}
				foreach($dados['dados_resultado']['anos'] as $item){
					$ano = substr($item->PERIODO_RESULTADO_ITEM, 0, 4);
					in_array($ano, $anos) ? null : $anos[] = $ano;
				}
			?>
				<form method="POST" action="<?= $_SERVER['PHP_SELF']; ?>">
					<div class="row">
						<div class="col-sm-2">
							<select name="ano" id="ano" class="form-control">
								<?php
								foreach ($anos as $ano){
									?>
									<option value="<?= $ano ?>"><?= $ano ?></option>
									<?php
								}
								?>
							</select>
							<input type="hidden" name="id" value="<?= $dados['dados_resultado']['resultado'][0]->ID_RESULTADO ?>">
						</div>
						<div class="col-sm-2">
							<button type="submit" class="btn btn-danger">Filtrar</button>
						</div>
					</div>
				</form>
			<?php
			}
			?>
			<canvas id="grafico_resultado" height="100px"></canvas>
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

  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  <script>
	  var ctx = document.getElementById('grafico_resultado').getContext('2d');
	  var chart = new Chart(ctx, {
		  // The type of chart we want to create
		  type: 'bar',

		  // The data for our dataset
		  data: {
			  labels: [<?php
				  $anos = array('Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro');
				  foreach($dados['dados_resultado']['itens_resultado'] as $item){
					  echo "'".$anos[substr($item->PERIODO_RESULTADO_ITEM, 5, 2) - 1]."'" . ',';
				  }
				  ?>],
			  datasets:
			  [
				  {
					  label: 'Meta',
					  backgroundColor: 'rgb(150, 150, 150)',
					  borderColor: 'rgb(150, 150, 150)',
					  borderWidth: 1,
					  data: [<?php
						  foreach($dados['dados_resultado']['itens_resultado'] as $item){
							  echo $item->META_RESULTADO_ITEM . ',';
						  }
						  ?>]
				  },
				  {
					  label: 'Realizado',
					  backgroundColor: '<?= $dados['dados_resultado']['resultado'][0]->COR_GRAFICO_RESULTADO ?>',
					  borderColor: '<?= $dados['dados_resultado']['resultado'][0]->COR_GRAFICO_RESULTADO ?>',
					  borderWidth: 1,
					  data: [<?php
						  foreach($dados['dados_resultado']['itens_resultado'] as $item){
							  echo $item->REALIZADO_RESULTADO_ITEM . ',';
						  }
						  ?>]
				  }
			  ]
		  },

		  // Configuration options go here
		  options: {
			  // responsive: true,
			  legend: {
				  position: 'top',
			  },
			  title: {
				  display: true,
				  text: '<?= $dados['dados_resultado']['resultado'][0]->TITULO_RESULTADO ?>'
			  },
			  scales: {
				  yAxes: [{
					  ticks: {
						  beginAtZero: true
					  }
				  }]
			  }
		  }
	  });


  </script>

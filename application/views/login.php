<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema Intranet</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  {css}
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page" style="background-color: #b14843;">
<div class="login-box">
  <div class="login-logo bg-image">
    <a href="https://"><img src="../assets/dist/img/logo_cpf.png" class="img-fluid"></a>
  </div>
  <h1><p class="text-center text-white">Sistema Intranet</p></h1>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body" style="background-color: #96423e;" >
      <h2><p class="login-box-msg text-center text-white">Entrar</p></h2>

      <form>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" id="user">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope text-white"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Senha" id="pass">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock text-white"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button class="btn btn-primary btn-block" id="btn-login-adm">Entrar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-2 mb-0 text-center">
        <a href="forgot-password.html" class="btn btn-outline-light btn-block text-decoration-none text-white">Esqueci minha senha</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

{js}

<div id="modal-aviso" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Atenção!</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Senha ou usuário inválido!</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
			</div>
		</div>
	</div>
</div>

<div id="modal-inativo" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Atenção!</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>O usuário não está ativo no sistema. <br> Entre em contato com o administrador!</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
			</div>
		</div>
	</div>
</div>

<div id="modal-recuperar-senha" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Recuperar Senha</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div id="mensagem-recuperar-senha" class="alert alert-warning fade in" hidden="" role="alert">
					<button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>
					<p>Mensagem</p>
				</div>
				<div class="form-group">
					<label>Email:</label>
					<input class="form-control" id="email">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn" id="btn-recuperar-senha">Enviar</button>
			</div>
		</div>
	</div>
</div>

<div id="modal-msg" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="titulo-modal-msg">Título</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p id="texto-modal-msg">Mensagem</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
			</div>
		</div>
	</div>
</div>

</body>
</html>

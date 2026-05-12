<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		if(!isset($_SESSION)){ 
            session_start(); 
        }
		if(isset($_SESSION['logado'])){
			header('Location: '.base_url().'usuario/lista');
		} else {
			header('Location: '.base_url().'login');
		}
	}

	public function lista()
	{
		if(!isset($_SESSION)){ 
            session_start(); 
        }
		if(isset($_SESSION['logado'])){
			// DEFINE CSS
			set_tema('css', load_css('dist/css/questionario'), FALSE);
			// DEFINE JS
			set_tema('js', load_js('dist/js/questionario'), FALSE);
			set_tema('js', load_js('dist/js/pages/usuario'), FALSE);
			// DEFINE URL_BASE
			set_tema('url_base', base_url());

			// TEMPLATE
			set_tema('titulo', 'Questionário On-Line');			
			// CARREGA TEMPLATE
			// RETORNA DADOS DO REGISTRO
			$this->load->model('UsuarioModel');
			$usuario = new UsuarioModel;
			$retorno = $usuario->listar_usuarios();
			set_tema('dados', $retorno);
	  	    // DEFINE AS PARTES DO TEMPLATE
			set_tema('header', 'header');
			set_tema('template', 'usuario/lista_usuario');
			set_tema('footer', 'footer');
		    // CARREGA TEMPLATE
			load_template();
		} else {
			header('Location: '.base_url().'login');
		}
	}

	public function visualiza()
	{
		if(!isset($_SESSION)){ 
			session_start(); 
		}
		if(isset($_SESSION['logado'])){
			if(isset($_GET['id'])){
				$retorno = array();
				// RETORNA DADOS DO REGISTRO
				$this->load->model('UsuarioModel');
				$usuario = new UsuarioModel;
				$retorno = $usuario->listar_dados_usuario($_GET['id']);
				echo json_encode($retorno);				
			} else {
				echo 'Desculpe! Esta página só está disponível para acesso direto via intranet.';
			}
		} else {
			header('Location: '.base_url().'login');
		}

		/*if(!isset($_SESSION)){ 
            session_start(); 
        }
		if(isset($_SESSION['logado'])){
			if(isset($_POST['id'])){
		  		// DEFINE CSS
				set_tema('css', load_css('plugins/fontawesome-free/css/all.min'), FALSE);
				set_tema('css', load_css('plugins/overlayScrollbars/css/OverlayScrollbars.min'), FALSE);
				set_tema('css', load_css('dist/css/adminlte.min'), FALSE);
		  		// DEFINE JS
				set_tema('js', load_js('plugins/jquery/jquery.min'), FALSE);
				set_tema('js', load_js('plugins/bootstrap/js/bootstrap.bundle.min'), FALSE);
				set_tema('js', load_js('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min'), FALSE);
				set_tema('js', load_js('dist/js/adminlte'), FALSE);
				set_tema('js', load_js('plugins/jquery-mousewheel/jquery.mousewheel'), FALSE);
				set_tema('js', load_js('dist/js/main'), FALSE);
				set_tema('js', load_js('plugins/raphael/raphael.min'), FALSE);
				set_tema('js', load_js('plugins/jquery-mapael/jquery.mapael.min'), FALSE);
				set_tema('js', load_js('plugins/jquery-mapael/maps/usa_states.min'), FALSE);
				set_tema('js', load_js('plugins/chart.js/Chart.min'), FALSE);
				set_tema('js', load_js('dist/js/pages/dashboard2'), FALSE);
				set_tema('js', load_js('dist/js/pages/usuario'), FALSE);
				// DEFINE TITULO
				set_tema('titulo', 'Usuários');
				// DEFINE URL_BASE
				set_tema('url_base', base_url());
				// RETORNA DADOS DO REGISTRO
				$this->load->model('UsuarioModel');
				$usuario = new UsuarioModel;
				$retorno = $usuario->listar_dados_usuario($_POST['id']);
				set_tema('dados', $retorno);
		  	    // DEFINE AS PARTES DO TEMPLATE
				set_tema('header', 'header');
				set_tema('template', 'usuario/visualiza_usuario');
				set_tema('footer', 'footer');
			    // CARREGA TEMPLATE
				load_template();
			} else {
				echo 'Desculpe! Esta página só está disponível para acesso direto via intranet.';
			}
		} else {
			header('Location: '.base_url().'login');
		}*/
	}

	public function cadastro()
	{
		if(!isset($_SESSION)){ 
            session_start(); 
        }
		if(isset($_SESSION['logado'])){
	  		// DEFINE CSS
			set_tema('css', load_css('plugins/fontawesome-free/css/all.min'), FALSE);
			set_tema('css', load_css('plugins/overlayScrollbars/css/OverlayScrollbars.min'), FALSE);
			set_tema('css', load_css('dist/css/adminlte.min'), FALSE);
			set_tema('css', load_css('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min'), FALSE);
			set_tema('css', load_css('plugins/toastr/toastr.min'), FALSE);
			set_tema('css', load_css('dist/css/main'), FALSE);
			set_tema('css', load_css('plugins/summernote/summernote-bs4'), FALSE);
	  		// DEFINE JS
			set_tema('js', load_js('plugins/jquery/jquery.min'), FALSE);
			set_tema('js', load_js('plugins/jquery/jquery.mask.min'), FALSE);
			set_tema('js', load_js('plugins/bootstrap/js/bootstrap.bundle.min'), FALSE);
			set_tema('js', load_js('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min'), FALSE);
			set_tema('js', load_js('dist/js/adminlte'), FALSE);
			set_tema('js', load_js('plugins/jquery-mousewheel/jquery.mousewheel'), FALSE);
			set_tema('js', load_js('dist/js/main'), FALSE);
			set_tema('js', load_js('plugins/raphael/raphael.min'), FALSE);
			set_tema('js', load_js('plugins/jquery-mapael/jquery.mapael.min'), FALSE);
			set_tema('js', load_js('plugins/jquery-mapael/maps/usa_states.min'), FALSE);
			set_tema('js', load_js('plugins/chart.js/Chart.min'), FALSE);
			set_tema('js', load_js('dist/js/pages/dashboard'), FALSE);
			set_tema('js', load_js('plugins/summernote/summernote-bs4.min'), FALSE);
			set_tema('js', load_js('plugins/sweetalert2/sweetalert2.min'), FALSE);
			set_tema('js', load_js('plugins/toastr/toastr.min'), FALSE);
			set_tema('js', load_js('dist/js/pages/usuario'), FALSE);
			// DEFINE TITULO
			set_tema('titulo', 'Usuário');
			// DEFINE URL_BASE
			set_tema('url_base', base_url());
			$this->load->model('UsuarioModel');
			$usuario = new UsuarioModel;
			// RETORNA LISTA DE DEPARTAMENTOS
			$retorno_departamento = $usuario->listar_departamentos();
			set_tema('dados_departamento', $retorno_departamento);
			// RETORNA LISTA DE CARGOS
			$retorno_cargo = $usuario->listar_cargos();
			set_tema('dados_cargo', $retorno_cargo);
			// RETORNA LISTA DE NIVEIS DE ACESSO
			$retorno_nivel_acesso = $usuario->listar_niveis_acesso();
			set_tema('dados_nivel_acesso', $retorno_nivel_acesso);
	  	    // DEFINE AS PARTES DO TEMPLATE
			set_tema('header', 'header');
			set_tema('template', 'usuario/cadastro_usuario');
			set_tema('footer', 'footer');
		    // CARREGA TEMPLATE
			load_template();
		} else {
			header('Location: '.base_url().'login');
		}
	}

	public function edicao()
	{
		if(!isset($_SESSION)){ 
            session_start(); 
        }
		if(isset($_SESSION['logado'])){
			if(isset($_POST['id'])){
		  		// DEFINE CSS
				set_tema('css', load_css('plugins/fontawesome-free/css/all.min'), FALSE);
				set_tema('css', load_css('plugins/overlayScrollbars/css/OverlayScrollbars.min'), FALSE);
				set_tema('css', load_css('dist/css/adminlte.min'), FALSE);
				set_tema('css', load_css('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min'), FALSE);
				set_tema('css', load_css('plugins/toastr/toastr.min'), FALSE);
				set_tema('css', load_css('dist/css/main'), FALSE);
				set_tema('css', load_css('plugins/summernote/summernote-bs4'), FALSE);
		  		// DEFINE JS
				set_tema('js', load_js('plugins/jquery/jquery.min'), FALSE);
				set_tema('js', load_js('plugins/jquery/jquery.mask.min'), FALSE);
				set_tema('js', load_js('plugins/bootstrap/js/bootstrap.bundle.min'), FALSE);
				set_tema('js', load_js('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min'), FALSE);
				set_tema('js', load_js('dist/js/adminlte'), FALSE);
				set_tema('js', load_js('plugins/jquery-mousewheel/jquery.mousewheel'), FALSE);
				set_tema('js', load_js('dist/js/main'), FALSE);
				set_tema('js', load_js('plugins/raphael/raphael.min'), FALSE);
				set_tema('js', load_js('plugins/jquery-mapael/jquery.mapael.min'), FALSE);
				set_tema('js', load_js('plugins/jquery-mapael/maps/usa_states.min'), FALSE);
				set_tema('js', load_js('plugins/chart.js/Chart.min'), FALSE);
				set_tema('js', load_js('dist/js/pages/dashboard'), FALSE);
				set_tema('js', load_js('plugins/summernote/summernote-bs4.min'), FALSE);
				set_tema('js', load_js('plugins/sweetalert2/sweetalert2.min'), FALSE);
				set_tema('js', load_js('plugins/toastr/toastr.min'), FALSE);
				set_tema('js', load_js('dist/js/pages/usuario'), FALSE);
				// DEFINE TITULO
				set_tema('titulo', 'Usuário');
				// DEFINE URL_BASE
				set_tema('url_base', base_url());
				// RETORNA DADOS DO REGISTRO
				$this->load->model('UsuarioModel');
				$usuario = new UsuarioModel;
				$retorno = $usuario->listar_dados_usuario($_POST['id']);
				set_tema('dados', $retorno);
				// RETORNA LISTA DE DEPARTAMENTOS
				$retorno_departamento = $usuario->listar_departamentos();
				set_tema('dados_departamento', $retorno_departamento);
				// RETORNA LISTA DE CARGOS
				$retorno_cargo = $usuario->listar_cargos();
				set_tema('dados_cargo', $retorno_cargo);
				// RETORNA LISTA DE NIVEIS DE ACESSO
				$retorno_nivel_acesso = $usuario->listar_niveis_acesso();
				set_tema('dados_nivel_acesso', $retorno_nivel_acesso);
		  	    // DEFINE AS PARTES DO TEMPLATE
				set_tema('header', 'header');
				set_tema('template', 'usuario/cadastro_usuario');
				set_tema('footer', 'footer');
			    // CARREGA TEMPLATE
				load_template();
			} else {
				echo 'Desculpe! Esta página só está disponível para acesso direto via intranet.';
			}
		} else {
			header('Location: '.base_url().'login');
		}
	}

	function cadastrar(){
		if(!isset($_SESSION)){ 
			session_start(); 
		}
		if(isset($_SESSION['logado']) ){//&& $_SESSION['inserir_usuario']){
			$this->load->model('UsuarioModel');
			$usuario = new UsuarioModel;
			$retorno = $usuario->cadastrar_usuario($_POST['nivel_acesso'], $_POST['cargo'], $_POST['departamento'], $_POST['chefia'], $_POST['nome'], $_POST['dt_nascimento'], $_POST['telefone'], $_POST['celular'], $_POST['celular_corporativo'], $_POST['email'], $_POST['login'], $_POST['senha'], $_POST['nome_arquivo'], $_POST['caminho_arquivo'], $_POST['situacao'], $_POST['endereco'], $_POST['bairro'], $_POST['complemento'], $_POST['cidade'], $_POST['estado'], $_POST['cep'], $_POST['num_cart_trab'], $_POST['dt_exp_cart_trab'], $_POST['serie_cart_trab'], $_POST['uf_cart_trab'], $_POST['cpf'], $_POST['num_identidade'], $_POST['dt_exp_identidade'], $_POST['orgao_exp_identidade'], $_POST['uf_identidade'], $_POST['num_cert_militar'], $_POST['num_tit_eleitor'], $_POST['zona_tit_eleitor'], $_POST['secao_tit_eleitor'], $_POST['num_cnh'], $_POST['categoria_cnh'], $_POST['validade_cnh'], $_POST['nome_orgao_classe'], $_POST['num_orgao_classe'], $_POST['validade_orgao_classe'], $_POST['num_pis'], $_POST['banco_pis'], $_POST['dt_cadastro_pis'], $_POST['nome_pai'], $_POST['nome_mae'], $_POST['grau_escolaridade'], $_POST['naturalidade'], $_POST['nacionalidade'], $_POST['estado_civil'], $_POST['sexo'], $_POST['nome_conjuge'], $_POST['dt_nasc_conjuge'], $_POST['ramal'], $_POST['carga_horaria'], $_POST['horario_expediente'], $_POST['nome_contato_emergencia'], $_POST['telefone_contato_emergencia'], $_POST['plano_saude'], $_POST['email_corporativo'], $_POST['dt_admissao'], $_POST['dt_demissao'], $_POST['nome_contato_emergencia_2'], $_POST['nome_contato_emergencia_3'], $_POST['nome_contato_emergencia_4'], $_POST['nome_contato_emergencia_5'], $_POST['telefone_contato_emergencia_2'], $_POST['telefone_contato_emergencia_3'], $_POST['telefone_contato_emergencia_4'], $_POST['telefone_contato_emergencia_5'], $_POST['nome_filho_1'], $_POST['nome_filho_2'], $_POST['nome_filho_3'], $_POST['nome_filho_4'], $_POST['nome_filho_5'], $_POST['dt_nascimento_filho_1'], $_POST['dt_nascimento_filho_2'], $_POST['dt_nascimento_filho_3'], $_POST['dt_nascimento_filho_4'], $_POST['dt_nascimento_filho_5']);
			echo json_encode($retorno);
		} else {
			header('Location: '.base_url().'login');
		}
	}

	function editar(){
		if(!isset($_SESSION)){ 
			session_start(); 
		}
		if(isset($_SESSION['logado']) ){//&& $_SESSION['editar_usuario']){
			$this->load->model('UsuarioModel');
			$usuario = new UsuarioModel;
			//echo $_POST['chefia'];
			$retorno = $usuario->editar_usuario($_POST['id'], $_POST['nivel_acesso'], $_POST['cargo'], $_POST['departamento'], $_POST['chefia'], $_POST['nome'], $_POST['dt_nascimento'], $_POST['telefone'], $_POST['celular'], $_POST['celular_corporativo'], $_POST['email'], $_POST['login'], $_POST['nome_arquivo'], $_POST['caminho_arquivo'], $_POST['situacao'], $_POST['endereco'], $_POST['bairro'], $_POST['complemento'], $_POST['cidade'], $_POST['estado'], $_POST['cep'], $_POST['num_cart_trab'], $_POST['dt_exp_cart_trab'], $_POST['serie_cart_trab'], $_POST['uf_cart_trab'], $_POST['cpf'], $_POST['num_identidade'], $_POST['dt_exp_identidade'], $_POST['orgao_exp_identidade'], $_POST['uf_identidade'], $_POST['num_cert_militar'], $_POST['num_tit_eleitor'], $_POST['zona_tit_eleitor'], $_POST['secao_tit_eleitor'], $_POST['num_cnh'], $_POST['categoria_cnh'], $_POST['validade_cnh'], $_POST['nome_orgao_classe'], $_POST['num_orgao_classe'], $_POST['validade_orgao_classe'], $_POST['num_pis'], $_POST['banco_pis'], $_POST['dt_cadastro_pis'], $_POST['nome_pai'], $_POST['nome_mae'], $_POST['grau_escolaridade'], $_POST['naturalidade'], $_POST['nacionalidade'], $_POST['estado_civil'], $_POST['sexo'], $_POST['nome_conjuge'], $_POST['dt_nasc_conjuge'], $_POST['ramal'], $_POST['carga_horaria'], $_POST['horario_expediente'], $_POST['nome_contato_emergencia'], $_POST['telefone_contato_emergencia'], $_POST['plano_saude'], $_POST['email_corporativo'], $_POST['dt_admissao'], $_POST['dt_demissao'], $_POST['nome_contato_emergencia_2'], $_POST['nome_contato_emergencia_3'], $_POST['nome_contato_emergencia_4'], $_POST['nome_contato_emergencia_5'], $_POST['telefone_contato_emergencia_2'], $_POST['telefone_contato_emergencia_3'], $_POST['telefone_contato_emergencia_4'], $_POST['telefone_contato_emergencia_5'], $_POST['nome_filho_1'], $_POST['nome_filho_2'], $_POST['nome_filho_3'], $_POST['nome_filho_4'], $_POST['nome_filho_5'], $_POST['dt_nascimento_filho_1'], $_POST['dt_nascimento_filho_2'], $_POST['dt_nascimento_filho_3'], $_POST['dt_nascimento_filho_4'], $_POST['dt_nascimento_filho_5']);
			echo json_encode($retorno);
		} else {
			header('Location: '.base_url().'login');
		}
	}

	function excluir(){
		if(!isset($_SESSION)){ 
			session_start(); 
		}
		if(isset($_SESSION['logado']) ){// && $_SESSION['excluir_usuario']){
			$this->load->model('UsuarioModel');
			$usuario = new UsuarioModel;
			$retorno = $usuario->excluir_usuario($_POST['id']);
			echo json_encode($retorno);
		} else {
			header('Location: '.base_url().'login');
		}
	}

	// FUNÇÃO PARA FAZER UPLOAD DE UMA ÚNICA IMAGEM
	function upload(){
		$this->load->model('UsuarioModel');
		$usuario = new UsuarioModel;
		$retorno = $usuario->upload_arquivo($_FILES['file']);
		echo json_encode($retorno);
	}	

	// FUNÇÃO PARA ALTERAR SENHA DO USUÁRIO
	function alterar_senha_usuario(){
		$this->load->model('UsuarioModel');
		$usuario = new UsuarioModel;
		$retorno = $usuario->alterar_senha_usuario($_POST['id'], $_POST['senha']);
		echo json_encode($retorno);
	}

	function dados(){
		if (!isset($_SESSION)){
			session_start();
		}

		if (isset($_SESSION['logado'])){
			$this->load->model('UsuarioModel');
			$usuario = new UsuarioModel;
			$retorno = $usuario->retorna_usuarios();
			echo json_encode($retorno);

		} else {
			header('Location: '.base_url().'login');
		}
	}

}
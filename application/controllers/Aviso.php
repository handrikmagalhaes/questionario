<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aviso extends CI_Controller {

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
			header('Location: '.base_url().'aviso/lista');
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
			set_tema('js', load_js('dist/js/pages/aviso'), FALSE);
			// DEFINE TITULO
			set_tema('titulo', 'Avisos');
			// DEFINE URL_BASE
			set_tema('url_base', base_url());
			// RETORNA DADOS DO REGISTRO
			$this->load->model('AvisoModel');
			$aviso = new AvisoModel;
			$retorno = $aviso->listar_avisos();
			set_tema('dados', $retorno);
	  	    // DEFINE AS PARTES DO TEMPLATE
			set_tema('header', 'header');
			set_tema('template', 'aviso/lista_aviso');
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
				set_tema('js', load_js('dist/js/pages/aviso'), FALSE);
				// DEFINE TITULO
				set_tema('titulo', 'Avisos');
				// DEFINE URL_BASE
				set_tema('url_base', base_url());
				// RETORNA DADOS DO REGISTRO
				$this->load->model('AvisoModel');
				$aviso = new AvisoModel;
				$retorno = $aviso->listar_dados_aviso($_POST['id']);
				set_tema('dados', $retorno);
		  	    // DEFINE AS PARTES DO TEMPLATE
				set_tema('header', 'header');
				set_tema('template', 'aviso/visualiza_aviso');
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
			set_tema('js', load_js('dist/js/pages/aviso'), FALSE);
			// DEFINE TITULO
			set_tema('titulo', 'Aviso');
			// DEFINE URL_BASE
			set_tema('url_base', base_url());
			// RETORNA LISTA DE DEPARTAMENTOS
			$this->load->model('UsuarioModel');
			$usuario = new UsuarioModel;
			$retorno_departamento = $usuario->listar_departamentos();
			set_tema('dados_departamento', $retorno_departamento);
	  	    // DEFINE AS PARTES DO TEMPLATE
			set_tema('header', 'header');
			set_tema('template', 'aviso/cadastro_aviso');
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
				set_tema('js', load_js('dist/js/pages/aviso'), FALSE);
				// DEFINE TITULO
				set_tema('titulo', 'Aviso');
				// DEFINE URL_BASE
				set_tema('url_base', base_url());
				// RETORNA DADOS DO REGISTRO
				$this->load->model('AvisoModel');
				$aviso = new AvisoModel;
				$retorno = $aviso->listar_dados_aviso($_POST['id']);
				set_tema('dados', $retorno);
				// RETORNA LISTA DE DEPARTAMENTOS
				$this->load->model('UsuarioModel');
				$usuario = new UsuarioModel;
				$retorno_departamento = $usuario->listar_departamentos();
				set_tema('dados_departamento', $retorno_departamento);
		  	    // DEFINE AS PARTES DO TEMPLATE
				set_tema('header', 'header');
				set_tema('template', 'aviso/cadastro_aviso');
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
		if(isset($_SESSION['logado']) ){//&& $_SESSION['inserir_aviso']){
			$this->load->model('AvisoModel');
			$aviso = new AvisoModel;
			$retorno = $aviso->cadastrar_aviso($_POST['titulo'], $_POST['descricao'], $_POST['departamento'], $_POST['situacao']);
			echo json_encode($retorno);
		} else {
			header('Location: '.base_url().'login');
		}
	}

	function editar(){
		if(!isset($_SESSION)){ 
			session_start(); 
		}
		if(isset($_SESSION['logado']) ){//&& $_SESSION['editar_aviso']){
			$this->load->model('AvisoModel');
			$aviso = new AvisoModel;
			$retorno = $aviso->editar_aviso($_POST['id'], $_POST['titulo'], $_POST['descricao'], $_POST['departamento'], $_POST['situacao']);
			echo json_encode($retorno);
		} else {
			header('Location: '.base_url().'login');
		}
	}

	function excluir(){
		if(!isset($_SESSION)){ 
			session_start(); 
		}
		if(isset($_SESSION['logado']) ){// && $_SESSION['excluir_aviso']){
			$this->load->model('AvisoModel');
			$aviso = new AvisoModel;
			$retorno = $aviso->excluir_aviso($_POST['id']);
			echo json_encode($retorno);
		} else {
			header('Location: '.base_url().'login');
		}
	}

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evento
	extends CI_Controller {

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
			header('Location: '.base_url().'evento/lista');
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
			set_tema('js_old', load_js('dist/js/jquery-2.1.4.min'), FALSE);
			set_tema('js_old', load_js('dist/js/jquery.lightbox'), FALSE);
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
			set_tema('js', load_js('dist/js/pages/evento'), FALSE);
			// DEFINE TITULO
			set_tema('titulo', 'Eventos');
			// DEFINE URL_BASE
			set_tema('url_base', base_url());
			// RETORNA DADOS DO REGISTRO
			$this->load->model('EventoModel');
			$evento = new EventoModel;
			$retorno = $evento->listar_eventos();
			set_tema('dados', $retorno);
	  	    // DEFINE AS PARTES DO TEMPLATE
			set_tema('header', 'header');
			set_tema('template', 'evento/lista_evento');
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
/*			if(isset($_POST['id'])){
		  		// DEFINE CSS
				set_tema('css', load_css('plugins/fontawesome-free/css/all.min'), FALSE);
				set_tema('css', load_css('plugins/overlayScrollbars/css/OverlayScrollbars.min'), FALSE);
				set_tema('css', load_css('dist/css/eventos'), FALSE);
				set_tema('css', load_css('dist/css/jquery.lightbox'), FALSE);
				set_tema('css', load_css('dist/css/adminlte.min'), FALSE);
		  		// DEFINE JS
				set_tema('js_old', load_js('dist/js/jquery-2.1.4.min'), FALSE);
				set_tema('js_old', load_js('dist/js/jquery.lightbox'), FALSE);
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
				set_tema('js', load_js('dist/js/pages/evento'), FALSE);
				// DEFINE TITULO
				set_tema('titulo', 'Eventos');
				// DEFINE URL_BASE
				set_tema('url_base', base_url());
				// RETORNA DADOS DO REGISTRO
				$this->load->model('EventoModel');
				$evento = new EventoModel;
				$retorno = $evento->listar_dados_evento($_POST['id']);
				set_tema('dados', $retorno);
				// CARREGA GALERIA DE IMAGENS
				$retorno = $evento->listar_midias_galeria($_POST['id']);
				set_tema('galeria_evento', $retorno['lista_midias_view']);
		  	    // DEFINE AS PARTES DO TEMPLATE
				set_tema('header', 'header');
				set_tema('template', 'evento/visualiza_evento');
				set_tema('footer', 'footer');
			    // CARREGA TEMPLATE
				load_template();*/
			if(isset($_GET['id'])){	
				$retorno = array();
				$this->load->model('EventoModel');
				$evento = new EventoModel;
				$retorno = $evento->listar_dados_evento($_GET['id']);
				echo json_encode($retorno);				
	
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
			set_tema('css', load_css('dist/css/eventos'), FALSE);
			set_tema('css', load_css('dist/css/jquery.lightbox'), FALSE);
			set_tema('css', load_css('plugins/summernote/summernote-bs4'), FALSE);
	  		// DEFINE JS
			set_tema('js_old', load_js('dist/js/jquery-2.1.4.min'), FALSE);
			set_tema('js_old', load_js('dist/js/jquery.lightbox'), FALSE);
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
			set_tema('js', load_js('dist/js/pages/evento'), FALSE);
			set_tema('js', load_js('dist/js/jquery.twbsPagination.min'), FALSE);
			// DEFINE TITULO
			set_tema('titulo', 'Evento');
			// DEFINE URL_BASE
			set_tema('url_base', base_url());
			// CARREGA GALERIA DE IMAGENS
			set_tema('galeria_evento', '');
	  	    // DEFINE AS PARTES DO TEMPLATE
			set_tema('header', 'header');
			set_tema('template', 'evento/cadastro_evento');
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
				set_tema('css', load_css('dist/css/eventos'), FALSE);
				set_tema('css', load_css('dist/css/jquery.lightbox'), FALSE);
				set_tema('css', load_css('plugins/summernote/summernote-bs4'), FALSE);
		  		// DEFINE JS
				set_tema('js_old', load_js('dist/js/jquery-2.1.4.min'), FALSE);
				set_tema('js_old', load_js('dist/js/jquery.lightbox'), FALSE);
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
				set_tema('js', load_js('dist/js/pages/evento'), FALSE);
				set_tema('js', load_js('dist/js/jquery.twbsPagination.min'), FALSE);
				// DEFINE TITULO
				set_tema('titulo', 'Evento');
				// DEFINE URL_BASE
				set_tema('url_base', base_url());
				// RETORNA DADOS DO REGISTRO
				$this->load->model('EventoModel');
				$evento = new EventoModel;
				$retorno = $evento->listar_dados_evento($_POST['id']);
				set_tema('dados', $retorno);
				// CARREGA GALERIA DE IMAGENS
				$retorno = $evento->listar_midias_galeria($_POST['id']);
				set_tema('galeria_evento', $retorno['lista_midias']);
		  	    // DEFINE AS PARTES DO TEMPLATE
				set_tema('header', 'header');
				set_tema('template', 'evento/cadastro_evento');
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
		if(isset($_SESSION['logado']) ){//&& $_SESSION['inserir_evento']){
			$this->load->model('EventoModel');
			$evento = new EventoModel;
			$retorno = $evento->cadastrar_evento($_POST['titulo'], $_POST['data'], $_POST['descricao'], $_POST['situacao'], $_POST['midias_galeria']);
			echo json_encode($retorno);
		} else {
			header('Location: '.base_url().'login');
		}
	}

	function editar(){
		if(!isset($_SESSION)){ 
			session_start(); 
		}
		if(isset($_SESSION['logado']) ){//&& $_SESSION['editar_evento']){
			$this->load->model('EventoModel');
			$evento = new EventoModel;
			$retorno = $evento->editar_evento($_POST['id'], $_POST['titulo'], $_POST['data'], $_POST['descricao'], $_POST['situacao'], $_POST['midias_galeria']);
			echo json_encode($retorno);
		} else {
			header('Location: '.base_url().'login');
		}
	}

	function excluir(){
		if(!isset($_SESSION)){ 
			session_start(); 
		}
		if(isset($_SESSION['logado']) ){// && $_SESSION['excluir_evento']){
			$this->load->model('EventoModel');
			$evento = new EventoModel;
			$retorno = $evento->excluir_evento($_POST['id']);
			echo json_encode($retorno);
		} else {
			header('Location: '.base_url().'login');
		}
	}

}

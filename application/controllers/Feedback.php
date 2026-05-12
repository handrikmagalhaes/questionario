<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback extends CI_Controller {

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
			header('Location: '.base_url().'feedback/lista');
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
			if($_SESSION['visualizar_feedback']) {
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
				set_tema('js', load_js('dist/js/pages/feedback'), FALSE);
				// DEFINE TITULO
				set_tema('titulo', 'Feedback');
				// DEFINE URL_BASE
				set_tema('url_base', base_url());
				// RETORNA DADOS DO REGISTRO
				$this->load->model('FeedbackModel');
				$feedback = new FeedbackModel;
				$retorno = $feedback->listar_feedbacks();
				set_tema('dados', $retorno);
				// DEFINE AS PARTES DO TEMPLATE
				set_tema('header', 'header');
				set_tema('template', 'feedback/lista_feedback');
				set_tema('footer', 'footer');
				// CARREGA TEMPLATE
				load_template();
			} else {
				header('Location: '.base_url().'home');
			}
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
				set_tema('js', load_js('dist/js/pages/feedback'), FALSE);
				// DEFINE TITULO
				set_tema('titulo', 'Feedback');
				// DEFINE URL_BASE
				set_tema('url_base', base_url());
				// RETORNA DADOS DO REGISTRO
				$this->load->model('FeedbackModel');
				$feedback = new FeedbackModel;
				$retorno = $feedback->listar_dados_feedback($_POST['id']);
				set_tema('dados', $retorno);
		  	    // DEFINE AS PARTES DO TEMPLATE
				set_tema('header', 'header');
				set_tema('template', 'feedback/visualiza_feedback');
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
			set_tema('js', load_js('dist/js/pages/feedback'), FALSE);
			// DEFINE TITULO
			set_tema('titulo', 'feedback');
			// DEFINE URL_BASE
			set_tema('url_base', base_url());
			// RETORNA LISTA DE DEPARTAMENTOS
			$this->load->model('DepartamentoModel');
			$departamento = new DepartamentoModel;
			$retorno_departamento = $departamento->retorna_departamentos();
			set_tema('dados_departamento', $retorno_departamento);

	  	    // DEFINE AS PARTES DO TEMPLATE
			set_tema('header', 'header');
			set_tema('template', 'feedback/cadastro_feedback');
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
				set_tema('js', load_js('dist/js/pages/feedback'), FALSE);
				// DEFINE TITULO
				set_tema('titulo', 'feedback');
				// DEFINE URL_BASE
				set_tema('url_base', base_url());
				// RETORNA DADOS DO REGISTRO
				$this->load->model('FeedbackModel');
				$feedback = new FeedbackModel;
				$retorno = $feedback->listar_dados_feedback($_POST['id']);
				set_tema('dados', $retorno);
		  	    // DEFINE AS PARTES DO TEMPLATE
				set_tema('header', 'header');
				set_tema('template', 'feedback/cadastro_feedback');
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
		if(isset($_SESSION['logado']) ){//&& $_SESSION['inserir_feedback']){
			$this->load->model('FeedbackModel');
			$feedback = new FeedbackModel;
			$retorno = $feedback->cadastrar_feedback($_POST['titulo'], $_POST['departamento'], $_POST['descricao'], $_POST['tipo'], $_POST['situacao'], $_POST['anonimo']);
			echo json_encode($retorno);
		} else {
			header('Location: '.base_url().'login');
		}
	}

	function editar(){
		if(!isset($_SESSION)){ 
			session_start(); 
		}
		if(isset($_SESSION['logado']) ){//&& $_SESSION['editar_feedback']){
			$this->load->model('FeedbackModel');
			$feedback = new FeedbackModel;
			$retorno = $feedback->editar_feedback($_POST['id'], $_POST['titulo'], $_POST['descricao'], $_POST['tipo'], $_POST['situacao'], $_POST['anonimo']);
			echo json_encode($retorno);
		} else {
			header('Location: '.base_url().'login');
		}
	}

	function excluir(){
		if(!isset($_SESSION)){ 
			session_start(); 
		}
		if(isset($_SESSION['logado']) ){// && $_SESSION['excluir_feedback']){
			$this->load->model('FeedbackModel');
			$feedback = new FeedbackModel;
			$retorno = $feedback->excluir_feedback($_POST['id']);
			echo json_encode($retorno);
		} else {
			header('Location: '.base_url().'login');
		}
	}

	function responder_feedback(){
		if(!isset($_SESSION)){ 
			session_start(); 
		}
		if(isset($_SESSION['logado']) ){//&& $_SESSION['editar_feedback']){
			$this->load->model('FeedbackModel');
			$feedback = new FeedbackModel;
			$retorno = $feedback->cadastrar_mensagem($_POST['id_feedback'], $_POST['mensagem'], $_POST['anonimo']);
			echo json_encode($retorno);
			//echo var_dump($retorno);
		} else {
			header('Location: '.base_url().'login');
		}

	}

	function listar_mensagens(){
		if(!isset($_SESSION)){ 
			session_start(); 
		}
		if(isset($_SESSION['logado']) ){//&& $_SESSION['editar_feedback']){
			$this->load->model('FeedbackModel');
			$feedback = new FeedbackModel;
			$retorno = $feedback->listar_mensagens_feedback($_GET['id_feedback']);
			echo json_encode($retorno);
			//echo var_dump($retorno);
		} else {
			header('Location: '.base_url().'login');
		}
	}

	function muda_status_publico(){
		if(!isset($_SESSION)){ 
			session_start(); 
		}
		if(isset($_SESSION['logado']) ){//&& $_SESSION['editar_feedback']){
			$this->load->model('FeedbackModel');
			$feedback = new FeedbackModel;
			$retorno = $feedback->mudar_status_publico($_POST['id_feedback'], $_POST['status']);
			echo json_encode($retorno);
			//echo var_dump($retorno);
		} else {
			header('Location: '.base_url().'login');
		}
	}

}

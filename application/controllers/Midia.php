<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Midia extends CI_Controller {

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
			header('Location: '.base_url().'midia/cadastro');
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
				set_tema('js', load_js('dist/js/pages/midia'), FALSE);
				// DEFINE TITULO
				set_tema('titulo', 'Mídias');
				// DEFINE URL_BASE
				set_tema('url_base', base_url());
				// RETORNA DADOS DO REGISTRO
				$this->load->model('MidiaModel');
				$midia = new MidiaModel;
				$retorno = $midia->listar_dados_midia($_POST['id']);
				set_tema('dados', $retorno);
		  	    // DEFINE AS PARTES DO TEMPLATE
				set_tema('header', 'header');
				set_tema('template', 'midia/visualiza_midia');
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
			set_tema('css', load_css('dist/css/midias'), FALSE);
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
			set_tema('js', load_js('dist/js/pages/midia'), FALSE);
			// DEFINE TITULO
			set_tema('titulo', 'Mídia');
			// DEFINE URL_BASE
			set_tema('url_base', base_url());
			// RETORNA DADOS DO REGISTRO
			$this->load->model('MidiaModel');
			$midia = new MidiaModel;
			$retorno = $midia->listar_midias();
			set_tema('dados', $retorno);
	  	    // DEFINE AS PARTES DO TEMPLATE
			set_tema('header', 'header');
			set_tema('template', 'midia/cadastro_midia');
			set_tema('footer', 'footer');
		    // CARREGA TEMPLATE
			load_template();
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
			set_tema('css', load_css('dist/css/midias'), FALSE);
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
			set_tema('js', load_js('plugins/sweetalert2/sweetalert2.min'), FALSE);
			set_tema('js', load_js('dist/js/pages/dashboard2'), FALSE);
			set_tema('js', load_js('dist/js/pages/midia'), FALSE);
			// DEFINE TITULO
			set_tema('titulo', 'Mídias');
			// DEFINE URL_BASE
			set_tema('url_base', base_url());
			// RETORNA DADOS DO REGISTRO
			$this->load->model('MidiaModel');
			$midia = new MidiaModel;
			$retorno = $midia->listar_midias();
			set_tema('dados', $retorno);
			// DEFINE AS PARTES DO TEMPLATE
			set_tema('header', 'header');
			set_tema('template', 'midia/cadastro_midia');
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
				set_tema('js', load_js('dist/js/pages/midia'), FALSE);
				// DEFINE TITULO
				set_tema('titulo', 'Mídia');
				// DEFINE URL_BASE
				set_tema('url_base', base_url());
				// RETORNA DADOS DO REGISTRO
				$this->load->model('MidiaModel');
				$midia = new MidiaModel;
				$retorno = $midia->listar_dados_midia($_POST['id']);
				set_tema('dados', $retorno);
		  	    // DEFINE AS PARTES DO TEMPLATE
				set_tema('header', 'header');
				set_tema('template', 'midia/cadastro_midia');
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
		if(isset($_SESSION['logado']) ){//&& $_SESSION['inserir_midia']){
			$this->load->model('MidiaModel');
			$midia = new MidiaModel;
			$retorno = $midia->cadastrar_midia($_POST['titulo'], $_POST['descricao'], $_POST['tipo'], $_POST['nome'], $_POST['caminho'], $_POST['situacao']);
			echo json_encode($retorno);
		} else {
			header('Location: '.base_url().'login');
		}
	}

	function editar(){
		if(!isset($_SESSION)){ 
			session_start(); 
		}
		if(isset($_SESSION['logado']) ){//&& $_SESSION['editar_midia']){
			$this->load->model('MidiaModel');
			$midia = new MidiaModel;
			$retorno = $midia->editar_midia($_POST['id'], $_POST['titulo'], $_POST['descricao'], $_POST['tipo'], $_POST['nome'], $_POST['caminho'], $_POST['situacao']);
			echo json_encode($retorno);
		} else {
			header('Location: '.base_url().'login');
		}
	}

	function excluir(){
		if(!isset($_SESSION)){ 
			session_start(); 
		}
		if(isset($_SESSION['logado']) ){// && $_SESSION['excluir_midia']){
			$this->load->model('MidiaModel');
			$midia = new MidiaModel;
			$retorno = $midia->excluir_midia($_POST['id'], $_POST['arquivo']);
			echo json_encode($retorno);
		} else {
			header('Location: '.base_url().'login');
		}
	}

	// FUNÇÃO PARA FAZER UPLOAD DE MÍDIAS
	function upload_midia(){
		$this->load->model('MidiaModel');
		$midia = new MidiaModel;
		$retorno = $midia->upload_midia($_FILES['file']);
		echo json_encode($retorno);
	}

	// FUNÇÃO PARA FAZER UPLOAD DE MÍDIAS
	function upload_midias(){
		$this->load->model('MidiaModel');
		$midia = new MidiaModel;
		$retorno = $midia->upload_midias($_FILES['file']);
		echo json_encode($retorno);
	}

	// FUNÇÃO PARA LISTAR MÍDIAS
	function listar_midias_selecao(){
		if(!isset($_SESSION)){
			session_start();
		}
		if(isset($_SESSION['logado'])){//} && $_SESSION['visualizar_midia']){
			$this->load->model('MidiaModel');
			$midia = new MidiaModel;
			$retorno = $midia->listar_midias_selecao($_POST['indice'], $_POST['itens']);
			echo json_encode($retorno);
		} else {
			header('Location: '.base_url().'login');
		}
	}
	// FUNÇÃO PARA LISTAR MÍDIAS PARA GALERIA
	function listar_midias_multipla_selecao(){
		if(!isset($_SESSION)){
			session_start();
		}
		if(isset($_SESSION['logado'])){// && $_SESSION['visualizar_midia']){
			$this->load->model('MidiaModel');
			$midia = new MidiaModel;
			$retorno = $midia->listar_midias_multipla_selecao($_POST['indice'], $_POST['itens']);
			echo json_encode($retorno);
		} else {
			header('Location: '.base_url().'login');
		}
	}
	// FUNÇÃO PARA VERIFICAR QTD MIDIAS
	function qtd_midias(){
		if(!isset($_SESSION)){
			session_start();
		}
		if(isset($_SESSION['logado'])){// && $_SESSION['visualizar_midia']){
			$this->load->model('MidiaModel');
			$midia = new MidiaModel;
			$retorno = $midia->qtd_midias();
			echo json_encode($retorno);
		} else {
			header('Location: '.base_url().'login');
		}
	}

	// FUNÇÃO PARA FAZER UPLOAD DE IMAGENS
	function upload_arquivo(){
		if(!isset($_SESSION)){
			session_start();
		}
		if(isset($_SESSION['logado'])){// && $_SESSION['visualizar_midia']){
			$this->load->model('MidiaModel');
			$midia = new MidiaModel;
			$retorno = $midia->upload_midias($_FILES['file']);
			echo json_encode($retorno);
		} else {
			header('Location: '.base_url().'login');
		}
	}

}

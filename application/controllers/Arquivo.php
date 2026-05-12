<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Arquivo extends CI_Controller {

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
			header('Location: '.base_url().'arquivo/lista');
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
			set_tema('js', load_js('dist/js/pages/arquivo'), FALSE);
			// DEFINE TITULO
			set_tema('titulo', 'Normas Internas e Manuais');
			// DEFINE URL_BASE
			set_tema('url_base', base_url());
			// RETORNA DADOS DO REGISTRO
			$this->load->model('ArquivoModel');
			$arquivo = new ArquivoModel;
			$retorno = $arquivo->listar_arquivos();
			set_tema('dados', $retorno);
	  	    // DEFINE AS PARTES DO TEMPLATE
			set_tema('header', 'header');
			set_tema('template', 'arquivo/lista_arquivo');
			set_tema('footer', 'footer');
		    // CARREGA TEMPLATE
			load_template();
		} else {
			header('Location: '.base_url().'login');
		}
	}

	public function mostra()
	{
		if(!isset($_SESSION)){ 
            session_start(); 
        }
		if(isset($_SESSION['logado'])){
	  		// DEFINE CSS
			set_tema('css', load_css('plugins/fontawesome-free/css/all'), FALSE);
			set_tema('css', load_css('plugins/overlayScrollbars/css/OverlayScrollbars.min'), FALSE);
			set_tema('css', load_css('dist/css/adminlte.min'), FALSE);
			set_tema('css', load_css('dist/css/custom'), FALSE);
	  		// DEFINE JS
			set_tema('js', load_js('plugins/jquery/jquery'), FALSE);
			set_tema('js', load_js('plugins/bootstrap/js/bootstrap.bundle.min'), FALSE);
			set_tema('js', load_js('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min'), FALSE);
			set_tema('js', load_js('dist/js/adminlte'), FALSE);
			set_tema('js', load_js('plugins/jquery-mousewheel/jquery.mousewheel'), FALSE);
			set_tema('js', load_js('dist/js/main'), FALSE);
			set_tema('js', load_js('plugins/raphael/raphael.min'), FALSE);
			set_tema('js', load_js('dist/js/bstreeview'), FALSE);
			//set_tema('js', load_js('plugins/jquery-mapael/jquery.mapael.min'), FALSE);
			//set_tema('js', load_js('plugins/jquery-mapael/maps/usa_states.min'), FALSE);
			//set_tema('js', load_js('plugins/chart.js/Chart.min'), FALSE);
			//set_tema('js', load_js('dist/js/pages/dashboard2'), FALSE);
			set_tema('js', load_js('dist/js/pages/arquivo'), FALSE);
			// DEFINE TITULO
			set_tema('titulo', 'Normas Internas e Manuais');
			// DEFINE URL_BASE
			set_tema('url_base', base_url());
			// RETORNA DADOS DO REGISTRO
			$this->load->model('ArquivoModel');
			$arquivo = new ArquivoModel;
			$retorno = $arquivo->mostrar_arquivos();
			set_tema('dados', $retorno);
	  	    // DEFINE AS PARTES DO TEMPLATE
			set_tema('header', 'header');
			set_tema('template', 'arquivo/mostra_arquivo');
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
			/*if(isset($_POST['id'])){
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
				set_tema('js', load_js('dist/js/pages/arquivo'), FALSE);
				// DEFINE TITULO
				set_tema('titulo', 'Normas Internas e Manuais');
				// DEFINE URL_BASE
				set_tema('url_base', base_url());
				// RETORNA DADOS DO REGISTRO
				$this->load->model('ArquivoModel');
				$arquivo = new ArquivoModel;
				$retorno = $arquivo->listar_dados_arquivo($_POST['id']);
				set_tema('dados', $retorno);
		  	    // DEFINE AS PARTES DO TEMPLATE
				set_tema('header', 'header');
				set_tema('template', 'arquivo/visualiza_arquivo');
				set_tema('footer', 'footer');
			    // CARREGA TEMPLATE
				load_template();*/
				if(isset($_GET['id'])){
					$retorno = array();
					// RETORNA DADOS DO REGISTRO
					$this->load->model('ArquivoModel');
					$arquivo = new ArquivoModel;
					$retorno = $arquivo->listar_dados_arquivo($_GET['id']);
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
			set_tema('js', load_js('dist/js/pages/arquivo'), FALSE);
			// DEFINE TITULO
			set_tema('titulo', 'Normas Internas e Manuais');
			// DEFINE URL_BASE
			set_tema('url_base', base_url());
			$this->load->model('ArquivoModel');
			$arquivo = new ArquivoModel;
			// RETORNA LISTA DE TIPOS DE ARQUIVO
			$retorno_tipo_arquivo = $arquivo->listar_tipos();
			set_tema('dados_tipo_arquivo', $retorno_tipo_arquivo);
			// RETORNA LISTA DE DEPARTAMENTOS
			$this->load->model('UsuarioModel');
			$usuario = new UsuarioModel;
			$retorno_departamento = $usuario->listar_departamentos();
			set_tema('dados_departamento', $retorno_departamento);
			set_tema('dados_funcao', 'Inserindo');
			// DEFINE AS PARTES DO TEMPLATE
			set_tema('header', 'header');
			set_tema('template', 'arquivo/cadastro_arquivo');
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
				set_tema('js', load_js('dist/js/pages/arquivo'), FALSE);
				// DEFINE TITULO
				set_tema('titulo', 'Normas Internas e Manuais');
				// DEFINE URL_BASE
				set_tema('url_base', base_url());
				// RETORNA DADOS DO REGISTRO
				$this->load->model('ArquivoModel');
				$arquivo = new ArquivoModel;
				$retorno = $arquivo->listar_dados_arquivo($_POST['id']);
				set_tema('dados', $retorno);
				// RETORNA LISTA DE TIPOS DE ARQUIVO
				$retorno_tipo_arquivo = $arquivo->listar_tipos();
				set_tema('dados_tipo_arquivo', $retorno_tipo_arquivo);
				// RETORNA LISTA DE DEPARTAMENTOS
				$this->load->model('UsuarioModel');
				$usuario = new UsuarioModel;
				$retorno_departamento = $usuario->listar_departamentos();
				set_tema('dados_departamento', $retorno_departamento);
		  	    // DEFINE AS PARTES DO TEMPLATE
				set_tema('header', 'header');
				set_tema('template', 'arquivo/cadastro_arquivo');
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
		if(isset($_SESSION['logado']) ){//&& $_SESSION['inserir_arquivo']){
			$this->load->model('ArquivoModel');
			$arquivo = new ArquivoModel;
			$retorno = $arquivo->cadastrar_arquivo($_POST['titulo'], $_POST['descricao'], $_POST['tipo'], $_POST['departamento'], $_POST['nome'], $_POST['link'], $_POST['caminho'], $_POST['situacao'], $_POST['ordem']);
			echo json_encode($retorno);
		} else {
			header('Location: '.base_url().'login');
		}
	}

	function editar(){
		if(!isset($_SESSION)){ 
			session_start(); 
		}
		if(isset($_SESSION['logado']) ){//&& $_SESSION['editar_arquivo']){
			$this->load->model('ArquivoModel');
			$arquivo = new ArquivoModel;
			$retorno = $arquivo->editar_arquivo($_POST['id'], $_POST['titulo'], $_POST['descricao'], $_POST['tipo'], $_POST['departamento'], $_POST['nome'], $_POST['link'], $_POST['caminho'], $_POST['situacao'], $_POST['ordem']);
			echo json_encode($retorno);
		} else {
			header('Location: '.base_url().'login');
		}
	}

	function excluir(){
		if(!isset($_SESSION)){ 
			session_start(); 
		}
		if(isset($_SESSION['logado']) ){// && $_SESSION['excluir_arquivo']){
			$this->load->model('ArquivoModel');
			$arquivo = new ArquivoModel;
			$retorno = $arquivo->excluir_arquivo($_POST['id']);
			echo json_encode($retorno);
		} else {
			header('Location: '.base_url().'login');
		}
	}

	function lista_arquivos_setor(){
		if(isset($_GET['id'])){
			$retorno = array();
			// RETORNA DADOS DO REGISTRO
			$this->load->model('ArquivoModel');
			$arquivo = new ArquivoModel;
			$retorno = $arquivo->listar_arquivos_setor($_GET['id']);
			echo json_encode($retorno);		
		}

	}

	function lista_arquivos(){
		if(isset($_GET['id'])){
			$retorno = array();
			// RETORNA DADOS DO REGISTRO
			$this->load->model('ArquivoModel');
			$arquivo = new ArquivoModel;
			$retorno = $arquivo->listar_arquivos();
			echo json_encode($retorno);		
		}

	}


	function lista_arquivos_geral(){
		$retorno = array();
		// RETORNA DADOS DO REGISTRO
		$this->load->model('ArquivoModel');
		$arquivo = new ArquivoModel;
		$retorno = $arquivo->listar_arquivos_geral($_GET["busca"]);
		echo json_encode($retorno);		
		//echo var_dump($retorno);
	}
	
	function retorna_setores(){
		$retorno = array();
		// RETORNA DADOS DO REGISTRO
		$this->load->model('DepartamentoModel');
		$departamento = new DepartamentoModel;
		if ($_SESSION['admin_master']){
			$retorno = $departamento->listar_dados_departamento(0);
		} else {
			$retorno = $departamento->listar_dados_departamento($_SESSION['departamento']);	
		}
		$dados = json_decode(json_encode($retorno), true);
        $setores = [];
		//echo var_dump($_SESSION);
        foreach ($dados as $dado){
			if ($dado['IND_SITUACAO_DEPARTAMENTO'] == 'A') {
				array_push($setores, Array ('id'=> $dado['ID_DEPARTAMENTO'], 'idChefia' => $dado['ID_DEPARTAMENTO_CHEFIA'], 'tituloDepartamento' => $dado['TITULO_DEPARTAMENTO']));
			}
        }
        $tree = $setores;
        $i = 0;
        while (count($setores) > 0){
            $retorno = $departamento->listar_dados_departamento_chefia($setores[$i]['id']);
			$dados = json_decode(json_encode($retorno), true);
            if (count($dados) > 0){
                foreach ($dados as $dado){
					if ($dado['IND_SITUACAO_DEPARTAMENTO'] == 'A'){
	                    array_push($tree, Array ('id'=> $dado['ID_DEPARTAMENTO'], 'idChefia' => $dado['ID_DEPARTAMENTO_CHEFIA'], 'tituloDepartamento' => $dado['TITULO_DEPARTAMENTO']));
                    	array_push($setores,Array ('id'=> $dado['ID_DEPARTAMENTO'], 'idChefia' => $dado['ID_DEPARTAMENTO_CHEFIA'], 'tituloDepartamento' => $dado['TITULO_DEPARTAMENTO']));
					}
				}
            }
            array_shift($setores);
			//echo var_dump($tree);
        
        }

		echo json_encode($tree);
	}

	/*function mostrar(){
		if(!isset($_SESSION)){
			session_start();
		}
		if(isset($_SESSION['logado']) ){// && $_SESSION['excluir_arquivo']){
			$this->load->model('ArquivoModel');
			$arquivo = new ArquivoModel;
			$retorno = $arquivo->mostrar_arquivos();
			echo json_encode($retorno);
		} else {
			header('Location: '.base_url().'login');
		}
	}*/

	// FUNÇÃO PARA FAZER UPLOAD DE UM ÚNICO ARQUIVO
	function upload(){
		$this->load->model('ArquivoModel');
		$arquivo = new ArquivoModel;
		$retorno = $arquivo->upload_arquivo($_FILES['file'], $_POST['tipo']);
		echo json_encode($retorno);
	}

}
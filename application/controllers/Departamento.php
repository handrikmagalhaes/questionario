<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departamento extends CI_Controller {

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
			header('Location: '.base_url().'departamento/lista');
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
			set_tema('js', load_js('dist/js/pages/departamento'), FALSE);
			// DEFINE TITULO
			set_tema('titulo', 'Departamentos');
			// DEFINE URL_BASE
			set_tema('url_base', base_url());
			// RETORNA DADOS DO REGISTRO
			$this->load->model('DepartamentoModel');
			$departamento = new DepartamentoModel;
			$retorno = $departamento->listar_departamentos();
			set_tema('dados', $retorno);
	  	    // DEFINE AS PARTES DO TEMPLATE
			set_tema('header', 'header');
			set_tema('template', 'departamento/lista_departamento');
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
			set_tema('css', load_css('plugins/fontawesome-free/css/all.min'), FALSE);
			set_tema('css', load_css('plugins/overlayScrollbars/css/OverlayScrollbars.min'), FALSE);
			set_tema('css', load_css('dist/css/adminlte.min'), FALSE);
			set_tema('css', load_css('dist/css/orgchart'), FALSE);
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
			set_tema('js', load_js('dist/js/balkan_orgchart'), FALSE);
			set_tema('js', load_js('dist/js/pages/departamento'), FALSE);
			// DEFINE TITULO
			set_tema('titulo', 'Departamentos');
			// DEFINE URL_BASE
			set_tema('url_base', base_url());
			// RETORNA DADOS DO REGISTRO
			$this->load->model('DepartamentoModel');
			$departamento = new DepartamentoModel;
			//$retorno = $cargo->listar_cargos();
			//set_tema('dados', $retorno);
	  	    // DEFINE AS PARTES DO TEMPLATE
			set_tema('header', 'header');
			set_tema('template', 'departamento/mostra_departamento');
			set_tema('footer', 'footer');
		    // CARREGA TEMPLATE
			load_template();
		} else {
			header('Location: '.base_url().'login');
		}
	}


public function visualiza(){
	if(!isset($_SESSION)){ 
		session_start(); 
	}
	if(isset($_SESSION['logado'])){
		if(isset($_GET['id'])){
			$retorno = array();
			// RETORNA DADOS DO REGISTRO
			$this->load->model('DepartamentoModel');
			$departamento = new DepartamentoModel;
			$retorno['dados_departamento'] = $departamento->listar_departamentos_cargos_usuarios($_GET['id']);
			echo json_encode($retorno);				
		} else {
			echo 'Desculpe! Esta página só está disponível para acesso direto via intranet.';
		}
	} else {
		header('Location: '.base_url().'login');
	}

}
/*	public function visualiza()
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
				set_tema('js', load_js('dist/js/pages/departamento'), FALSE);
				// DEFINE TITULO
				set_tema('titulo', 'Departamentos');
				// DEFINE URL_BASE
				set_tema('url_base', base_url());
				// RETORNA DADOS DO REGISTRO
				$this->load->model('DepartamentoModel');
				$departamento = new DepartamentoModel;
				$retorno = $departamento->listar_dados_departamento($_POST['id']);
				// RETORNA USUÁRIOS
				$this->load->model('UsuarioModel');
				$usuario = new UsuarioModel;
				$retorno['usuarios'] = $usuario->listar_usuarios_departamento($_POST['id']);
				// RETORNA CARGOS
				$this->load->model('CargoModel');
				$cargo = new CargoModel;
				$retorno['cargos'] = $cargo->listar_cargos_departamento();
				set_tema('dados', $retorno);
		  	    // DEFINE AS PARTES DO TEMPLATE
				set_tema('header', 'header');
				set_tema('template', 'departamento/visualiza_departamento');
				set_tema('footer', 'footer');
			    // CARREGA TEMPLATE
				load_template();
			} else {
				echo 'Desculpe! Esta página só está disponível para acesso direto via intranet.';
			}
		} else {
			header('Location: '.base_url().'login');
		}
	}*/

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
			set_tema('js', load_js('plugins/summernote/summernote-bs4.min'), FALSE);
			set_tema('js', load_js('plugins/sweetalert2/sweetalert2.min'), FALSE);
			set_tema('js', load_js('plugins/toastr/toastr.min'), FALSE);
			set_tema('js', load_js('dist/js/pages/departamento'), FALSE);
			// DEFINE TITULO
			set_tema('titulo', 'Departamento');
			// DEFINE URL_BASE
			set_tema('url_base', base_url());
			// RETORNA OS DEPARTAMENTOS CADASTRADOS
			$this->load->model('DepartamentoModel');
			$departamento = new DepartamentoModel;
			$retorno = $departamento->retorna_departamentos();
			set_tema('departamentos', $retorno);
	  	    // DEFINE AS PARTES DO TEMPLATE
			set_tema('header', 'header');
			set_tema('template', 'departamento/cadastro_departamento');
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
				set_tema('js', load_js('plugins/summernote/summernote-bs4.min'), FALSE);
				set_tema('js', load_js('plugins/sweetalert2/sweetalert2.min'), FALSE);
				set_tema('js', load_js('plugins/toastr/toastr.min'), FALSE);
				set_tema('js', load_js('dist/js/pages/departamento'), FALSE);
				// DEFINE TITULO
				set_tema('titulo', 'Departamento');
				// DEFINE URL_BASE
				set_tema('url_base', base_url());
				// RETORNA DADOS DO REGISTRO
				$this->load->model('DepartamentoModel');
				$departamento = new DepartamentoModel;
				$retorno = $departamento->listar_dados_departamento($_POST['id']);
				set_tema('dados', $retorno);
				// RETORNA OS DEPARTAMENTOS CADASTRADOS
				$this->load->model('DepartamentoModel');
				$departamento = new DepartamentoModel;
				$retorno = $departamento->retorna_departamentos();
				set_tema('departamentos', $retorno);
		  	    // DEFINE AS PARTES DO TEMPLATE
				set_tema('header', 'header');
				set_tema('template', 'departamento/cadastro_departamento');
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
		if(isset($_SESSION['logado']) ){//&& $_SESSION['inserir_departamento']){
			$this->load->model('DepartamentoModel');
			$departamento = new DepartamentoModel;
			$retorno = $departamento->cadastrar_departamento($_POST['titulo'], $_POST['descricao'], $_POST['situacao'], $_POST['departamentochefia']);
			echo json_encode($retorno);
		} else {
			header('Location: '.base_url().'login');
		}
	}

	function editar(){
		if(!isset($_SESSION)){ 
			session_start(); 
		}
		if(isset($_SESSION['logado']) ){//&& $_SESSION['editar_departamento']){
			$this->load->model('DepartamentoModel');
			$departamento = new DepartamentoModel;
			$retorno = $departamento->editar_departamento($_POST['id'], $_POST['titulo'], $_POST['descricao'], $_POST['situacao'], $_POST['departamentochefia']);
			echo json_encode($retorno);
		} else {
			header('Location: '.base_url().'login');
		}
	}

	function excluir(){
		if(!isset($_SESSION)){ 
			session_start(); 
		}
		if(isset($_SESSION['logado']) ){// && $_SESSION['excluir_departamento']){
			$this->load->model('DepartamentoModel');
			$departamento = new DepartamentoModel;
			$retorno = $departamento->excluir_departamento($_POST['id']);
			echo json_encode($retorno);
		} else {
			header('Location: '.base_url().'login');
		}
	}

	function dados(){
		if (!isset($_SESSION)){
			session_start();
		}

		if (isset($_SESSION['logado'])){
			$this->load->model('DepartamentoModel');
			$departamento = new DepartamentoModel;
			$retorno = $departamento->retorna_departamentos();
			echo json_encode($retorno);

		} else {
			header('Location: '.base_url().'login');
		}
	}


	function organograma(){
		if (!isset($_SESSION)){
			session_start();
		}

		if (isset($_SESSION['logado'])){
			$this->load->model('DepartamentoModel');
			$departamento = new DepartamentoModel;
			$retorno = $departamento->retorna_organograma();
			$dados = json_decode(json_encode($retorno), true);
			$nome = explode(' ', $dados[0]['NOME_USUARIO']);
			$nomeCurto = $nome[0].' '.$nome[count($nome)-1];
			$organograma = array (
				'id' => 0,
				'nome' => $nomeCurto,
				'nome_completo' => $dados[0]['NOME_USUARIO'],
				'cargo' => $dados[0]['TITULO_CARGO'],
				'setor' => $dados[0]['ID_DEPARTAMENTO'],
				'nome_setor' => $dados[0]['TITULO_DEPARTAMENTO'], 
				'email' => $dados[0]['EMAIL_USUARIO'],
				'contato' => $dados[0]['TELEFONE_USUARIO'],
				'img' => '.'.$dados[0]['CAMINHO_FOTO_USUARIO'],
			);
			$json[] = $organograma;
			
			// loop para preencher os líderes de setor
			$id = 1;
			for ($i=1;$i<count($dados);$i++){
				if ($dados[$i]['IND_CHEFIA'] == 1){
					$nome = explode(' ', $dados[$i]['NOME_USUARIO']);
					$nomeCurto = $nome[0].' '.$nome[count($nome)-1];
					$organograma = Array (
						'id' => $id,
						'pid' => $dados[$i]['ID_DEPARTAMENTO_CHEFIA'],
						'nome' => $nomeCurto,
						'nome_completo' => $dados[$i]['NOME_USUARIO'],
						'cargo' => $dados[$i]['TITULO_CARGO'],
						'setor' => $dados[$i]['ID_DEPARTAMENTO'], 
						'nome_setor' => $dados[$i]['TITULO_DEPARTAMENTO'], 
						'email' => $dados[$i]['EMAIL_USUARIO'],
						'contato' => $dados[$i]['TELEFONE_USUARIO'],
						'img' => '.'.$dados[$i]['CAMINHO_FOTO_USUARIO'],
					);
					$id++;
					$json[] = $organograma;
				}
			}
			// loop para preencher os funcionários nos setores
			for ($i=1;$i<count($dados)-1;$i++){
				if ($dados[$i]['IND_CHEFIA'] == 0){
					// Busca o id no array de organoagrama
					for ($j=0;$j<count($json);$j++){
						if ($json[$j]['setor'] == $dados[$i]['ID_DEPARTAMENTO']){
							$nome = explode(' ', $dados[$i]['NOME_USUARIO']);
							$nomeCurto = $nome[0].' '.$nome[count($nome)-1];
							$organograma = Array (
								'id' => $id,
								'pid' => $json[$j]['id'],
								'nome' => $nomeCurto,
								'nome_completo' => $dados[$i]['NOME_USUARIO'],
								'cargo' => $dados[$i]['TITULO_CARGO'],
								'setor' => $dados[$i]['ID_DEPARTAMENTO'], 
								'nome_setor' => $dados[$i]['TITULO_DEPARTAMENTO'], 
								'email' => $dados[$i]['EMAIL_USUARIO'],
								'contato' => $dados[$i]['TELEFONE_USUARIO'],
								'img' => '.'.$dados[$i]['CAMINHO_FOTO_USUARIO'],
							);
							break;
						}
					}
					$json[] = $organograma;
					$id++;
				}
				
			}
			echo json_encode($json);

			// Preparando o json com as chefias
			//echo var_dump($retorno);
			//echo json_encode($retorno);

		} else {
			header('Location: '.base_url().'login');
		}
	}
	

}

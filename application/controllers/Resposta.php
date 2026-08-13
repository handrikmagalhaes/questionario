<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resposta extends CI_Controller {

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
			header('Location: '.base_url().'resposta/lista');
		} else {
			header('Location: '.base_url().'home');
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
			set_tema('js', load_js('dist/js/pages/resposta'), FALSE);
			// DEFINE URL_BASE
			set_tema('url_base', base_url());

			// TEMPLATE
			set_tema('titulo', 'Questionário On-Line');			
			// CARREGA TEMPLATE
	  	    // DEFINE AS PARTES DO TEMPLATE
			set_tema('header', 'header');
			set_tema('template', 'resposta/lista_resposta');
			set_tema('footer', 'footer');
		    // CARREGA TEMPLATE
			load_template();
		} else {
			header('Location: '.base_url().'home');
		}
	}

	function cadastrar(){
		if(!isset($_SESSION)){ 
			session_start(); 
		}
		if(isset($_SESSION['logado']) ){//&& $_SESSION['inserir_usuario']){
			$this->load->model('RespostaModel');
			$resposta = new RespostaModel;
			$retorno = $resposta->cadastrar_resposta($_POST);
			echo json_encode($retorno);
		} else {
			header('Location: '.base_url().'home');
		}
	}

	function alterar(){
		if(!isset($_SESSION)){
			session_start();
		}
		if(isset($_SESSION['logado'])){
			$this->load->model('RespostaModel');
			$resposta = new RespostaModel;
			$retorno = $resposta->alterar_resposta($_POST);
			echo json_encode($retorno);
			exit;
		} else {
			header('Location: '.base_url().'home');
		}
	}

	function editar(){
		if(!isset($_SESSION)){ 
			session_start(); 
		}
		if(isset($_SESSION['logado']) ){//&& $_SESSION['editar_usuario']){
			$this->load->model('RespostaModel');
			$resposta = new RespostaModel;
			//echo $_POST['chefia'];
			$sisperjud = isset($_POST['sisperjud']) ? 1 : 0;
			$loas = isset($_POST['loas']) ? 1 : 0;
			$retorno = $resposta->editar_resposta($_POST['id'], $_POST['resposta'], $sisperjud, $loas);
			echo json_encode($retorno);
		} else {
			header('Location: '.base_url().'home');
		}
	}

	function excluir(){
		if(!isset($_SESSION)){ 
			session_start(); 
		}
		if(isset($_SESSION['logado']) ){// && $_SESSION['excluir_usuario']){
			$this->load->model('RespostaModel');
			$resposta = new RespostaModel;
			$retorno = $resposta->excluir_resposta($_GET['id']);
			echo json_encode($retorno);
		} else {
			header('Location: '.base_url().'home');
		}
	}

	function listar(){
		if(!isset($_SESSION)){ 
			session_start(); 
		}
		if(isset($_SESSION['logado'])){
			$this->load->model('RespostaModel');
			$resposta = new RespostaModel;
			$retorno = $resposta->listar_respostas();
			echo json_encode($retorno);
		} else {
			header('Location: '.base_url().'home');
		}
	}

	function buscar(){
		if(!isset($_SESSION)){ 
			session_start(); 
		}
		if(isset($_SESSION['logado'])){
			$this->load->model('RespostaModel');
			$resposta = new RespostaModel;
			$retorno = $resposta->buscar($_GET['id']);
			echo json_encode($retorno);
		} else {
			header('Location: '.base_url().'home');
		}
	}
}
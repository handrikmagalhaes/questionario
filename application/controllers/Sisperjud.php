<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sisperjud extends CI_Controller {

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
			header('Location: '.base_url().'sisperjud/lista');
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
			set_tema('js', load_js('dist/js/pages/sisperjud'), FALSE);
			// DEFINE URL_BASE
			set_tema('url_base', base_url());

			// TEMPLATE
			set_tema('titulo', 'Questionário On-Line');			
			// CARREGA TEMPLATE
	  	    // DEFINE AS PARTES DO TEMPLATE
			set_tema('header', 'header');
			set_tema('template', 'sisperjud/lista_sisperjud');
			set_tema('footer', 'footer');
		    // CARREGA TEMPLATE
			load_template();
		} else {
			header('Location: '.base_url().'home');
		}
	}

	public function cadastro()
	{
		if(!isset($_SESSION)){ 
			session_start(); 
		}
		if(isset($_SESSION['logado'])){
			// DEFINE CSS
			set_tema('css', load_css('dist/css/questionario'), FALSE);
			// DEFINE JS
			set_tema('js', load_js('dist/js/questionario'), FALSE);
			set_tema('js', load_js('dist/js/masks'), FALSE);
			set_tema('js', load_js('dist/js/pages/sisperjud'), FALSE);
			// DEFINE URL_BASE
			set_tema('url_base', base_url());

			// TEMPLATE
			set_tema('titulo', 'Questionário On-Line');			
			// CARREGA TEMPLATE
	  	    // DEFINE AS PARTES DO TEMPLATE
			set_tema('header', 'header');
			set_tema('template', 'sisperjud/cadastro_sisperjud');
			set_tema('footer', 'footer');
		    // CARREGA TEMPLATE
			load_template();
		} else {
			header('Location: '.base_url().'home');
		}
	}	

	/*function cadastrar(){
		if(!isset($_SESSION)){ 
			session_start(); 
		}
		if(isset($_SESSION['logado']) ){//&& $_SESSION['inserir_usuario']){
			//Encriptando a senha do usuário
			$senha_criptografada = password_hash($_POST['senha_usuario'], PASSWORD_DEFAULT);
			$this->load->model('SisperjudModel');
			$sisperjud = new SisperjudModel;
			$retorno = $sisperjud->cadastrar_sisperjud($_POST['nome_usuario'], $_POST['email_usuario'], $senha_criptografada);
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
			$this->load->model('SisperjudModel');
			$sisperjud = new SisperjudModel;
			$senha = isset($_POST['senha_usuario']) ? $_POST['senha_usuario'] : '';
			$retorno = $sisperjud->alterar_sisperjud($_POST['id'], $_POST['nome_usuario'], $_POST['email_usuario'], $senha);
			echo json_encode($retorno);
		} else {
			header('Location: '.base_url().'home');
		}
	}

	function editar(){
		if(!isset($_SESSION)){ 
			session_start(); 
		}
		if(isset($_SESSION['logado']) ){//&& $_SESSION['editar_usuario']){
			$this->load->model('SisperjudModel');
			$sisperjud = new SisperjudModel;
			//echo $_POST['chefia'];
			$retorno = $sisperjud->editar_sisperjud($_POST['id'], $_POST['nivel_acesso'], $_POST['cargo'], $_POST['departamento'], $_POST['chefia'], $_POST['nome'], $_POST['dt_nascimento'], $_POST['telefone'], $_POST['celular'], $_POST['celular_corporativo'], $_POST['email'], $_POST['login'], $_POST['nome_arquivo'], $_POST['caminho_arquivo'], $_POST['situacao'], $_POST['endereco'], $_POST['bairro'], $_POST['complemento'], $_POST['cidade'], $_POST['estado'], $_POST['cep'], $_POST['num_cart_trab'], $_POST['dt_exp_cart_trab'], $_POST['serie_cart_trab'], $_POST['uf_cart_trab'], $_POST['cpf'], $_POST['num_identidade'], $_POST['dt_exp_identidade'], $_POST['orgao_exp_identidade'], $_POST['uf_identidade'], $_POST['num_cert_militar'], $_ POST['num_tit_eleitor'], $_POST['zona_tit_eleitor'], $_POST['secao_tit_eleitor'], $_ POST['num_cnh'], $_ POST['categoria_cnh'], $_ POST['validade_cnh'], $_ POST['nome_orgao_classe'], $_ POST['num_orgao_classe'], $_ POST['validade_orgao_classe'], $_ POST['num_pis'], $_ POST['banco_pis'], $_ POST['dt_cadastro_pis'], $_ POST['nome_pai'],)$_ POST ['nome_mae'],)$_ POST ['grau_escolaridade'],)$_ POST ['naturalidade'],)$_ POST ['nacionalidade'],)$_ POST ['estado_civil'],)$_ POST ['sexo'],)$_ POST ['nome_conjuge'],)$_ POST ['dt_nasc_conjuge'],)$_ POST ['ramal'],)$_ POST ['carga_horaria'],)$_ POST ['horario_expediente'],)$_ POST ['nome_contato_emergencia'],)$_ POST ['telefone_contato_emergencia'],)$_ POST ['plano_saude'],)$_ POST ['email_corporativo'],)$_ POST ['dt_admissao'],)$_ POST ['dt_demissao'],)$_ POST ['nome_contato_emergencia_2'],)$_ POST ['nome_contato_emergencia_3'],)$_ POST ['nome_contato_emergencia_4'],)$__POST(['nome_contato_emergencia_5']),$__POST(['telefone_contato_emergencia_2']),$__POST(['telefone_contato_emergencia_3']),$__POST(['telefone_contato_emergencia_4']),$__POST(['telefone_contato_emergencia_5']),$__POST(['nome_filho_1']),$__POST(['nome_filho_2']),$__POST(['nome_filho_3']),$__POST(['nome_filho_4']),$__POST(['nome_filho_5']),$__POST(['dt_nascimento_filho_1']),$__POST(['dt_nascimento_filho_2']),$__POST(['dt_nascimento_filho_3']),$__POST(['dt_nascimento_filho_4']),$__POST(['dt_nascimento_filho_5']);
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
			$this->load->model('SisperjudModel');
			$sisperjud = new SisperjudModel;
			$retorno = $sisperjud->excluir_sisperjud($_GET['id']);
			echo json_encode($retorno);
		} else {
			header('Location: '.base_url().'home');
		}
	} */

	function listar(){
		if(!isset($_SESSION)){ 
			session_start(); 
		}
		if(isset($_SESSION['logado'])){
			$this->load->model('SisperjudModel');
			$sisperjud = new SisperjudModel;
			$retorno = $sisperjud->listar_sisperjud();
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
			$this->load->model('SisperjudModel');
			$sisperjud = new SisperjudModel;
			$retorno = $sisperjud->buscar($_GET['id']);
			echo json_encode($retorno);
		} else {
			header('Location: '.base_url().'home');
		}
	}
}
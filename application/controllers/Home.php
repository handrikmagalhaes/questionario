<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		// DEFINE CSS
		set_tema('css', load_css('dist/css/questionario'), FALSE);
		// DEFINE JS
		set_tema('js', load_js('dist/js/questionario'), FALSE);
		set_tema('js', load_js('dist/js/pages/home'), FALSE);
		// DEFINE URL_BASE
		set_tema('url_base', base_url());

		// TEMPLATE
		set_tema('titulo', 'Questionário On-Line');			
		// DEFINE AS PARTES DO TEMPLATE
		set_tema('header', 'header');
		set_tema('template', 'home');
		set_tema('footer', 'footer');
		// CARREGA TEMPLATE
		load_template();
	}

	public function login(){
		if(!isset($_SESSION)){ 
			session_start(); 
		}
		$retorno = array();

		if (isset($_POST['email']) && isset($_POST['senha'])) {
			$email = strip_tags($_POST['email']);
			$email = stripcslashes($email);
			$senha = strip_tags($_POST['senha']);
			$senha = stripcslashes($senha);
			//$senha = md5($senha);
			$retorno['dados'] = '';
			$retorno['existe'] = 0;
            $this->db->select('*');
            $this->db->from('usuario');
            $this->db->where('email_usuario', $email);
            $data['usuario'] = $this->db->get()->result();
			$retorno['existe'] = count($data['usuario']);

			if ($retorno['existe'] >= 1) { //usuário existe
				// Verificando se a senha está correta
				$hash_banco = $data['usuario'][0]->senha_usuario;
				if (password_verify($senha, $hash_banco)) {
					$_SESSION['logado'] = true;
					$_SESSION['id'] = $data['usuario'][0]->id;
					$_SESSION['email'] = $data['usuario'][0]->email_usuario;
					$_SESSION['nome'] = $data['usuario'][0]->nome_usuario;
					$retorno['dados'] = 'Login realizado com sucesso!';
				} else {
					$retorno['dados'] = 'Senha incorreta!';
				}
			}
		} else {
			$retorno['dados'] = 'Preencha os campos corretamente!';
		}
		echo json_encode($retorno);

	}
	
	function logout() {
        if(!isset($_SESSION)){ 
            session_start(); 
        }
		if (isset($_SESSION['logado'])) {
			$_SESSION = array();
			session_destroy();
			header('Location: '.base_url());
		} else {
			header('Location: '.base_url().'login');
		}
	}

}

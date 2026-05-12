<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index() {
		if(!isset($_SESSION)){ 
            session_start(); 
        }
		if(isset($_SESSION['logado'])){
			header('Location: '.base_url().'');
		} else {
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
            set_tema('js', load_js('dist/js/login'), FALSE);
            // DEFINE URL_BASE
            set_tema('url_base', base_url());
            // DEFINE AS PARTES DO TEMPLATE
            set_tema('template', 'login');
            // CARREGA TEMPLATE
            load_template();
		}
	}

	// LOGIN
	function alogin() {
		if(!isset($_SESSION)){ 
            session_start(); 
        }
		if (isset($_POST['usuario']) && isset($_POST['senha'])) {
			$usuario = strip_tags($_POST['usuario']);
			$usuario = stripcslashes($usuario);
			$senha = strip_tags($_POST['senha']);
			$senha = stripcslashes($senha);
			$senha = md5($senha);
			$retorno = array();
			$retorno['dados'] = '';
			$retorno['existe'] = 0;
			$retorno['ativo'] = false;

            $this->db->select('*');
            $this->db->from('usuario');
            $this->db->join('nivel_acesso', 'nivel_acesso.id_nivel_acesso = usuario.id_nivel_acesso');
            $this->db->where('email_usuario', $usuario);
            $this->db->where('senha_usuario', $senha);
            $data['usuario'] = $this->db->get()->result();

			// PERMISSÕES CARGO
			$_SESSION['admin_master'] = $data['usuario'][0]->IND_ADMIN_MASTER_NIVEL_ACESSO == 'S' ? true : false;

			// PERMISSÕES CARGO
			if($data['usuario'][0]->VISUALIZAR_CARGO){
				$_SESSION['visualizar_cargo'] = true;
			} else {
				$_SESSION['visualizar_cargo'] = false;
			}
			if($data['usuario'][0]->INSERIR_CARGO){
				$_SESSION['inserir_cargo'] = true;
			} else {
				$_SESSION['inserir_cargo'] = false;
			}
			if($data['usuario'][0]->EDITAR_CARGO){
				$_SESSION['editar_cargo'] = true;
			} else {
				$_SESSION['editar_cargo'] = false;
			}
			if($data['usuario'][0]->EXCLUIR_CARGO){
				$_SESSION['excluir_cargo'] = true;
			} else {
				$_SESSION['excluir_cargo'] = false;
			}
			// PERMISSÕES DEPARTAMENTO
			if($data['usuario'][0]->VISUALIZAR_DEPARTAMENTO){
				$_SESSION['visualizar_departamento'] = true;
			} else {
				$_SESSION['visualizar_departamento'] = false;
			}
			if($data['usuario'][0]->INSERIR_DEPARTAMENTO){
				$_SESSION['inserir_departamento'] = true;
			} else {
				$_SESSION['inserir_departamento'] = false;
			}
			if($data['usuario'][0]->EDITAR_DEPARTAMENTO){
				$_SESSION['editar_departamento'] = true;
			} else {
				$_SESSION['editar_departamento'] = false;
			}
			if($data['usuario'][0]->EXCLUIR_DEPARTAMENTO){
				$_SESSION['excluir_departamento'] = true;
			} else {
				$_SESSION['excluir_departamento'] = false;
			}
			// PERMISSÕES AVISO
			if($data['usuario'][0]->VISUALIZAR_AVISO){
				$_SESSION['visualizar_aviso'] = true;
			} else {
				$_SESSION['visualizar_aviso'] = false;
			}
			if($data['usuario'][0]->INSERIR_AVISO){
				$_SESSION['inserir_aviso'] = true;
			} else {
				$_SESSION['inserir_aviso'] = false;
			}
			if($data['usuario'][0]->EDITAR_AVISO){
				$_SESSION['editar_aviso'] = true;
			} else {
				$_SESSION['editar_aviso'] = false;
			}
			if($data['usuario'][0]->EXCLUIR_AVISO){
				$_SESSION['excluir_aviso'] = true;
			} else {
				$_SESSION['excluir_aviso'] = false;
			}
			// PERMISSÕES COMUNICADO INTERNO
			if($data['usuario'][0]->VISUALIZAR_COMUNICADO_INTERNO){
				$_SESSION['visualizar_comunicado_interno'] = true;
			} else {
				$_SESSION['visualizar_comunicado_interno'] = false;
			}
			if($data['usuario'][0]->INSERIR_COMUNICADO_INTERNO){
				$_SESSION['inserir_comunicado_interno'] = true;
			} else {
				$_SESSION['inserir_comunicado_interno'] = false;
			}
			if($data['usuario'][0]->EDITAR_COMUNICADO_INTERNO){
				$_SESSION['editar_comunicado_interno'] = true;
			} else {
				$_SESSION['editar_comunicado_interno'] = false;
			}
			if($data['usuario'][0]->EXCLUIR_COMUNICADO_INTERNO){
				$_SESSION['excluir_comunicado_interno'] = true;
			} else {
				$_SESSION['excluir_comunicado_interno'] = false;
			}
			// PERMISSÕES DICA DE SAÚDE
			if($data['usuario'][0]->VISUALIZAR_DICA_SAUDE){
				$_SESSION['visualizar_dica_saude'] = true;
			} else {
				$_SESSION['visualizar_dica_saude'] = false;
			}
			if($data['usuario'][0]->INSERIR_DICA_SAUDE){
				$_SESSION['inserir_dica_saude'] = true;
			} else {
				$_SESSION['inserir_dica_saude'] = false;
			}
			if($data['usuario'][0]->EDITAR_DICA_SAUDE){
				$_SESSION['editar_dica_saude'] = true;
			} else {
				$_SESSION['editar_dica_saude'] = false;
			}
			if($data['usuario'][0]->EXCLUIR_DICA_SAUDE){
				$_SESSION['excluir_dica_saude'] = true;
			} else {
				$_SESSION['excluir_dica_saude'] = false;
			}
			// PERMISSÕES TIPO ARQUIVO
			if($data['usuario'][0]->VISUALIZAR_TIPO_ARQUIVO){
				$_SESSION['visualizar_tipo_arquivo'] = true;
			} else {
				$_SESSION['visualizar_tipo_arquivo'] = false;
			}
			if($data['usuario'][0]->INSERIR_TIPO_ARQUIVO){
				$_SESSION['inserir_tipo_arquivo'] = true;
			} else {
				$_SESSION['inserir_tipo_arquivo'] = false;
			}
			if($data['usuario'][0]->EDITAR_TIPO_ARQUIVO){
				$_SESSION['editar_tipo_arquivo'] = true;
			} else {
				$_SESSION['editar_tipo_arquivo'] = false;
			}
			if($data['usuario'][0]->EXCLUIR_TIPO_ARQUIVO){
				$_SESSION['excluir_tipo_arquivo'] = true;
			} else {
				$_SESSION['excluir_tipo_arquivo'] = false;
			}
			// PERMISSÕES ARQUIVO
			if($data['usuario'][0]->VISUALIZAR_ARQUIVO){
				$_SESSION['visualizar_arquivo'] = true;
			} else {
				$_SESSION['visualizar_arquivo'] = false;
			}
			if($data['usuario'][0]->INSERIR_ARQUIVO){
				$_SESSION['inserir_arquivo'] = true;
			} else {
				$_SESSION['inserir_arquivo'] = false;
			}
			if($data['usuario'][0]->EDITAR_ARQUIVO){
				$_SESSION['editar_arquivo'] = true;
			} else {
				$_SESSION['editar_arquivo'] = false;
			}
			if($data['usuario'][0]->EXCLUIR_ARQUIVO){
				$_SESSION['excluir_arquivo'] = true;
			} else {
				$_SESSION['excluir_arquivo'] = false;
			}
			// PERMISSÕES LINK
			if($data['usuario'][0]->VISUALIZAR_LINK){
				$_SESSION['visualizar_link'] = true;
			} else {
				$_SESSION['visualizar_link'] = false;
			}
			if($data['usuario'][0]->INSERIR_LINK){
				$_SESSION['inserir_link'] = true;
			} else {
				$_SESSION['inserir_link'] = false;
			}
			if($data['usuario'][0]->EDITAR_LINK){
				$_SESSION['editar_link'] = true;
			} else {
				$_SESSION['editar_link'] = false;
			}
			if($data['usuario'][0]->EXCLUIR_LINK){
				$_SESSION['excluir_link'] = true;
			} else {
				$_SESSION['excluir_link'] = false;
			}
			// PERMISSÕES MÍDIA
			if($data['usuario'][0]->VISUALIZAR_MIDIA){
				$_SESSION['visualizar_midia'] = true;
			} else {
				$_SESSION['visualizar_midia'] = false;
			}
			if($data['usuario'][0]->INSERIR_MIDIA){
				$_SESSION['inserir_midia'] = true;
			} else {
				$_SESSION['inserir_midia'] = false;
			}
			if($data['usuario'][0]->EDITAR_MIDIA){
				$_SESSION['editar_midia'] = true;
			} else {
				$_SESSION['editar_midia'] = false;
			}
			if($data['usuario'][0]->EXCLUIR_MIDIA){
				$_SESSION['excluir_midia'] = true;
			} else {
				$_SESSION['excluir_midia'] = false;
			}
			// PERMISSÕES EVENTO
			if($data['usuario'][0]->VISUALIZAR_EVENTO){
				$_SESSION['visualizar_evento'] = true;
			} else {
				$_SESSION['visualizar_evento'] = false;
			}
			if($data['usuario'][0]->INSERIR_EVENTO){
				$_SESSION['inserir_evento'] = true;
			} else {
				$_SESSION['inserir_evento'] = false;
			}
			if($data['usuario'][0]->EDITAR_EVENTO){
				$_SESSION['editar_evento'] = true;
			} else {
				$_SESSION['editar_evento'] = false;
			}
			if($data['usuario'][0]->EXCLUIR_EVENTO){
				$_SESSION['excluir_evento'] = true;
			} else {
				$_SESSION['excluir_evento'] = false;
			}
			// PERMISSÕES FEEDBACK
            if($data['usuario'][0]->VISUALIZAR_FEEDBACK){
                $_SESSION['visualizar_feedback'] = true;
            } else {
                $_SESSION['visualizar_feedback'] = false;
            }
            if($data['usuario'][0]->INSERIR_FEEDBACK){
                $_SESSION['inserir_feedback'] = true;
            } else {
                $_SESSION['inserir_feedback'] = false;
            }
            if($data['usuario'][0]->EDITAR_FEEDBACK){
                $_SESSION['editar_feedback'] = true;
            } else {
                $_SESSION['editar_feedback'] = false;
            }
            if($data['usuario'][0]->EXCLUIR_FEEDBACK){
                $_SESSION['excluir_feedback'] = true;
            } else {
                $_SESSION['excluir_feedback'] = false;
            }
			// PERMISSÕES RESULTADO
			if($data['usuario'][0]->VISUALIZAR_RESULTADO){
				$_SESSION['visualizar_resultado'] = true;
			} else {
				$_SESSION['visualizar_resultado'] = false;
			}
			if($data['usuario'][0]->INSERIR_RESULTADO){
				$_SESSION['inserir_resultado'] = true;
			} else {
				$_SESSION['inserir_resultado'] = false;
			}
			if($data['usuario'][0]->EDITAR_RESULTADO){
				$_SESSION['editar_resultado'] = true;
			} else {
				$_SESSION['editar_resultado'] = false;
			}
			if($data['usuario'][0]->EXCLUIR_RESULTADO){
				$_SESSION['excluir_resultado'] = true;
			} else {
				$_SESSION['excluir_resultado'] = false;
			}
			// PERMISSÕES USUARIO
			if($data['usuario'][0]->VISUALIZAR_USUARIO){
				$_SESSION['visualizar_usuario'] = true;
			} else {
				$_SESSION['visualizar_usuario'] = false;
			}
			if($data['usuario'][0]->INSERIR_USUARIO){
				$_SESSION['inserir_usuario'] = true;
			} else {
				$_SESSION['inserir_usuario'] = false;
			}
			if($data['usuario'][0]->EDITAR_USUARIO){
				$_SESSION['editar_usuario'] = true;
			} else {
				$_SESSION['editar_usuario'] = false;
			}
			if($data['usuario'][0]->EXCLUIR_USUARIO){
				$_SESSION['excluir_usuario'] = true;
			} else {
				$_SESSION['excluir_usuario'] = false;
			}
            // PERMISSÕES NÍVEL DE ACESSO
            if($data['usuario'][0]->VISUALIZAR_NIVEL_ACESSO){
                $_SESSION['visualizar_nivel_acesso'] = true;
            } else {
                $_SESSION['visualizar_nivel_acesso'] = false;
            }
            if($data['usuario'][0]->INSERIR_NIVEL_ACESSO){
                $_SESSION['inserir_nivel_acesso'] = true;
            } else {
                $_SESSION['inserir_nivel_acesso'] = false;
            }
            if($data['usuario'][0]->EDITAR_NIVEL_ACESSO){
                $_SESSION['editar_nivel_acesso'] = true;
            } else {
                $_SESSION['editar_nivel_acesso'] = false;
            }
            if($data['usuario'][0]->EXCLUIR_NIVEL_ACESSO){
                $_SESSION['excluir_nivel_acesso'] = true;
            } else {
                $_SESSION['excluir_nivel_acesso'] = false;
            }

			$retorno['existe'] = count($data['usuario']);

			if ($retorno['existe'] >= 1) {
				$situacao = $data['usuario'][0]->IND_SITUACAO_USUARIO;
				if($situacao == "A"){
					$retorno['ativo'] = true;
					$_SESSION['logado'] = true;
                    // $this->load->library('session');
					$this->session->mark_as_temp('logado', 1800);
                    $_SESSION['id'] = $data['usuario'][0]->ID_USUARIO;
					$_SESSION['usuario'] = $data['usuario'][0]->LOGIN_USUARIO;
                    $_SESSION['nome'] = $data['usuario'][0]->NOME_USUARIO;
                    $_SESSION['foto_perfil'] = $data['usuario'][0]->CAMINHO_FOTO_USUARIO;
					$_SESSION['departamento'] = $data['usuario'][0]->ID_DEPARTAMENTO;
					$_SESSION['responsavel'] = $data['usuario'][0] ->IND_CHEFIA;
            	} else {
					// $retorno['ativo'] = false;
				}
			}

			echo json_encode($retorno);
		} else {
			header('Location: '.base_url().'login');
		}
	}

	function logout() {
        if(!isset($_SESSION)){ 
            session_start(); 
        }
		if (isset($_SESSION['logado'])) {
			$_SESSION = array();
			session_destroy();
			header('Location: '.base_url().'');
		} else {
			header('Location: '.base_url().'login');
		}
	}

	public function recuperar_senha()
	{
		require 'assets/lib/PHPMailer/PHPMailerAutoload.php';

		$Mailer = new PHPMailer();

		$mail = new PHPMailer(true);
		$mail->IsSMTP(); // Define que a mensagem será SMTP

		$mail->Host = 'smtp.umbler.com'; // Endereço do servidor SMTP (Autenticação, utilize o host smtp.seudomínio.com.br)
		$mail->SMTPAuth   = true;  // Usar autenticação SMTP (obrigatório para smtp.seudomínio.com.br)
		$mail->Port       = 587; //  Usar 587 porta SMTP
		$mail->Username = 'form@layoutdesenvolvimento.com.br'; // Usuário do servidor SMTP (endereço de email)
		$mail->Password = 'Doug1991'; // Senha do servidor SMTP (senha do email usado)
		$mail->SetFrom('form@layoutdesenvolvimento.com.br', 'Intranet'); //Seu e-mail


		// if (isset($_POST['email']) && isset($_POST['cpf'])) {
		$email = strip_tags($_POST['email']);
		$email = stripcslashes($email);

		$retorno = array();
		$data = array();
		$retorno['dados'] = '';
		$retorno['existe'] = 0;
		$retorno['enviou'] = false;

		$data['usuario'] = $this->db->get_where('usuario', array('email_usuario' => $email))->result();

		$retorno['existe'] = count($data['usuario']);

		if ($retorno['existe'] >= 1) {
			// PEGA DADOS
			$usuario = $data['usuario'][0]->nome_usuario;
			$id = $data['usuario'][0]->id_usuario;
			
			$this->db->where('id_usuario', $id);

			// GERA SENHA
			$lmin = 'abcdefghijklmnopqrstuvwxyz';
			$lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$num = '1234567890';
			$simb = '!@#$%*-';
			$senha = '';
			$caracteres = '';
			$caracteres .= $lmin;
			$caracteres .= $lmai;
			$caracteres .= $num;
			$caracteres .= $simb;
			$len = strlen($caracteres);
			for ($n = 1; $n <= 10; $n++) {
				$rand = mt_rand(1, $len);
				$senha .= $caracteres[$rand-1];
			}
			// CRIPTOGRAFA SENHA
			$senha_hash = md5($senha);

			$data = array(
				'senha_usuario' => $senha_hash
				);

			if($this->db->update('usuario', $data)){
			// ENVIA EMAIL
				$mail->Subject = utf8_decode('Recuperação de Senha');
				$mail->Body = utf8_decode('Nome de usuário: '.$usuario.' <br> Nova senha: '.$senha);
				$mail->AltBody = utf8_decode('Nome de usuário: '.$usuario.' - Senha: '.$senha);
				$mail->AddAddress($email);
				if($mail->Send()){
					$retorno['enviou'] = true;
				} else {
					$retorno['enviou'] = false;
					$retorno['erro'] = "Erro: ".$mail->ErrorInfo;
				}	                
			}
		}

		// }

		echo json_encode($retorno);
	}

	public function teste_email()
	{
		require 'assets/lib/PHPMailer/PHPMailerAutoload.php';
		$mail = new PHPMailer(true);
		$mail->IsSMTP(); // Define que a mensagem será SMTP

		$mail->Host = 'smtp.umbler.com'; // Endereço do servidor SMTP (Autenticação, utilize o host smtp.seudomínio.com.br)
		$mail->SMTPAuth   = true;  // Usar autenticação SMTP (obrigatório para smtp.seudomínio.com.br)
		$mail->Port       = 587; //  Usar 587 porta SMTP
		$mail->Username = 'form@layoutdesenvolvimento.com.br'; // Usuário do servidor SMTP (endereço de email)
		$mail->Password = 'Doug1991'; // Senha do servidor SMTP (senha do email usado)
		 
		//Define o remetente
		// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=    
		$mail->SetFrom('form@layoutdesenvolvimento.com.br', 'Douglas'); //Seu e-mail
		// $mail->AddReplyTo('douglas@layoutdesenvolvimento.com.br', 'Douglas'); //Seu e-mail
		$mail->Subject = 'Assunto';//Assunto do e-mail
		 
		//Define os destinatário(s)
		//=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		$mail->AddAddress('douglas@layoutdesenvolvimento.com.br', 'Douglas');
		 
		//Define o corpo do email
		$mail->MsgHTML('corpo do email'); 
		 
		$mail->Send();
	}
}

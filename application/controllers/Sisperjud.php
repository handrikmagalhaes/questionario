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
			//set_tema('js', load_js('dist/js/questionario'), FALSE);
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

	public function edicao()
	{
		if(!isset($_SESSION)){ 
			session_start(); 
		}
		if(isset($_SESSION['logado'])){
			// DEFINE CSS
			set_tema('css', load_css('dist/css/questionario'), FALSE);
			// DEFINE JS
			//set_tema('js', load_js('dist/js/questionario'), FALSE);
			set_tema('js', load_js('dist/js/masks'), FALSE);
			set_tema('js', load_js('dist/js/pages/sisperjud'), FALSE);
			// DEFINE URL_BASE
			set_tema('url_base', base_url());

			// TEMPLATE
			set_tema('titulo', 'Questionário On-Line');			
			// CARREGA TEMPLATE
			// RETORNA DADOS DO REGISTRO
			$this->load->model('SisperjudModel');
			$sisperjud = new SisperjudModel;
			$retorno = $sisperjud->buscar($_GET['id']);
			set_tema('dados', $retorno);

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

	function cadastrar(){
		if(!isset($_SESSION)){ 
			session_start(); 
		}
		if(isset($_SESSION['logado']) ){//&& $_SESSION['inserir_usuario']){
			// Realizando higienização dos dados recebidos do formulário
			$dados = array_map('strip_tags', $_POST);
			$dados = array_map('stripslashes', $dados);
			//echo "<pre>"; var_dump($dados); echo "</pre>";
			//exit;
			if ($dados['periciando_id'] == 0){
				$dadosPericiando = array(
					'nome_periciando' => $dados['nome_periciando'],
					'cpf_periciando' => $dados['cpf_periciando'],
					'rg_periciando' => $dados['rg_periciando'],
					'nascimento_periciando' => $dados['nascimento_periciando'],
					'nome_social_periciando' => $dados['nome_social'],
					'sexo_biologico_periciando' => $dados['sexo_biologico'],
					'identidade_genero_periciando' => $dados['identidade_genero'],
					'raca_periciando' => $dados['raca'],
					'estado_civil_periciando' => $dados['estado_civil'],
					'grau_escolaridade_periciando' => $dados['grau_escolaridade'],
					'profissao_periciando' => $dados['profissao'],
					'uf_periciando' => $dados['uf'],
					'formacao_periciando' => $dados['formacao'],
					'outras_formacoes_periciando' => $dados['outras_formacoes'],
				);
				$this->load->model('PericiandoModel');
				$periciando = new PericiandoModel;
				$retorno = $periciando->cadastrar_periciando($dadosPericiando);
			} else {
				//limpando dados não utilizados para cadastro de pericia
				unset($dados['id_pericia']);
				unset($dados['nome_periciando']);
				unset($dados['cpf_periciando']);
				unset($dados['rg_periciando']);
				unset($dados['nascimento_periciando']);
				unset($dados['nome_social']);
				unset($dados['sexo_biologico']);
				unset($dados['identidade_genero']);
				unset($dados['raca']);
				unset($dados['estado_civil']);
				unset($dados['grau_escolaridade']);
				unset($dados['profissao']);
				unset($dados['uf']);
				unset($dados['formacao']);
				unset($dados['outras_formacoes']);
				unset($dados['titulo_anexo']);
				unset($dados['arquivo_anexo']);
				$dados['periciando_id'] = $dados['periciando_id'];

				$this->load->model('SisperjudModel');
				$sisperjud = new SisperjudModel;
				$retorno = $sisperjud->cadastrar_sisperjud($dados);
				if ($retorno){
					$_SESSION['msg'] = "Perícia cadastrada com sucesso!";
					$_SESSION['tipo'] = "success";
					header('Location: '.base_url().'sisperjud/lista');
				} else {
					$_SESSION['msg'] = "Erro ao cadastrar a perícia!";
					$_SESSION['tipo'] = "error";
					header('Location: '.base_url().'sisperjud/lista');
				}
			}
		} else {
			header('Location: '.base_url().'sisperjud/login');
		}
	}

	function alterar(){
		if(!isset($_SESSION)){
			session_start();
		}
		if(isset($_SESSION['logado'])){
			$dados = array_map('strip_tags', $_POST);
			$dados = array_map('stripcslashes', $dados);

			// Limpando array de dados não utilizados para alteração de pericia
				$idPericia = $dados['id_pericia'];
				unset($dados['id_pericia']);
				unset($dados['nome_periciando']);
				unset($dados['cpf_periciando']);
				unset($dados['rg_periciando']);
				unset($dados['nascimento_periciando']);
				unset($dados['nome_social']);
				unset($dados['sexo_biologico']);
				unset($dados['identidade_genero']);
				unset($dados['raca']);
				unset($dados['estado_civil']);
				unset($dados['grau_escolaridade']);
				unset($dados['profissao']);
				unset($dados['uf']);
				unset($dados['formacao']);
				unset($dados['outras_formacoes']);
				unset($dados['titulo_anexo']);
				unset($dados['arquivo_anexo']);
				$dados['id'] = $idPericia;

			$this->load->model('SisperjudModel');
			$sisperjud = new SisperjudModel;
			$retorno = $sisperjud->alterar_sisperjud($dados);
			if ($retorno){
				$_SESSION['msg'] = "Perícia alterada com sucesso!";
				$_SESSION['tipo'] = "success";
				header('Location: '.base_url().'sisperjud/lista');
			} else {
				$_SESSION['msg'] = "Erro ao alterar a perícia!";
				$_SESSION['tipo'] = "error";
				header('Location: '.base_url().'sisperjud/lista');
			}
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
			$id = strip_tags($_GET['id']);
			$id = stripcslashes($id);
			$this->load->model('SisperjudModel');
			$sisperjud = new SisperjudModel;
			$retorno = $sisperjud->excluir_sisperjud($id);
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
			$id = strip_tags($_GET['id']);
			$id = stripcslashes($id);
			$retorno = $sisperjud->buscar($id);
			echo json_encode($retorno);
		} else {
			header('Location: '.base_url().'home');
		}
	}

    public function relatorio() {
		if(!isset($_SESSION)){ 
			session_start(); 
		}
		if(isset($_SESSION['logado'])){
			$this->load->model('SisperjudModel');
			$sisperjud = new SisperjudModel;
			$id = strip_tags($_GET['id']);
			$id = stripcslashes($id);
			$retorno = $sisperjud->buscar($id);
			if($retorno){
				$this->load->library('pdf');

				// Instancia o FPDF (a classe principal agora está disponível)
				$pdf = new pdf();
				$pdf->AddPage();
				$pdf->Header();
				$pdf->SetFont('Arial', 'B', 14);
				$pdf->Cell(40, 10, utf8_decode('1. DADOS DA PERÍCIA'), 0, 1, 'L');
				$pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());
				$pdf->Ln(5);
				$pdf->SetFont('Arial', 'B', 12);
				$pdf->Cell(45, 4, utf8_decode('Número do Processo: '), 0, 0, 'L');
				$pdf->SetFont('Arial', '', 12);
				$pdf->Cell(50, 4, utf8_decode($retorno['pericia']->numero_processo), 0, 1, 'L');
				$pdf->Ln();
				$pdf->SetFont('Arial', 'B', 12);
				$pdf->Cell(30, 4, utf8_decode('Juízo/Juizado: '), 0, 0, 'L');
				$pdf->SetFont('Arial', '', 12);
				$pdf->Cell(50, 4, utf8_decode($retorno['pericia']->juizo_juizado), 0, 1, 'L');
				$pdf->Ln();
				$pdf->SetFont('Arial', 'B', 12);
				$pdf->Cell(20, 4, utf8_decode('Natureza: '), 0, 0, 'L');
				$pdf->SetFont('Arial', '', 12);
				$pdf->Cell(50, 4, utf8_decode($retorno['pericia']->natureza), 0, 1, 'L');
				$pdf->Ln();
				$pdf->SetFont('Arial', 'B', 12);
				$pdf->Cell(20, 4, utf8_decode('Perito(a): '), 0, 0, 'L');
				$pdf->SetFont('Arial', '', 12);
				$pdf->Cell(50, 4, utf8_decode($retorno['pericia']->perito), 0, 1, 'L');
				$pdf->Ln();
				$pdf->SetFont('Arial', 'B', 12);
				$pdf->Cell(15, 4, utf8_decode('CRM: '), 0, 0, 'L');
				$pdf->SetFont('Arial', '', 12);
				$pdf->Cell(50, 4, utf8_decode($retorno['pericia']->crm), 0, 1, 'L');
				$pdf->Ln();
				$pdf->SetFont('Arial', 'B', 12);
				$pdf->Cell(35, 4, utf8_decode('Data da Perícia: '), 0, 0, 'L');
				$pdf->SetFont('Arial', '', 12);
				$pdf->Cell(50, 4, utf8_decode(date('d/m/Y', strtotime($retorno['pericia']->data_pericia))), 0, 1, 'L');
				$pdf->Ln();
				$pdf->SetFont('Arial', 'B', 12);
				$pdf->Cell(55, 4, utf8_decode('Nome da parte pericianda: '), 0, 0, 'L');
				$pdf->SetFont('Arial', '', 12);
				$pdf->Cell(50, 4, utf8_decode($retorno['pericia']->nome_periciando), 0, 1, 'L');
				$pdf->Ln();
				$pdf->SetFont('Arial', 'B', 12);
				$pdf->Cell(10, 4, utf8_decode('CPF: '), 0, 0, 'L');
				$pdf->SetFont('Arial', '', 12);
				$pdf->Cell(45, 4, utf8_decode($retorno['pericia']->cpf_periciando), 0, 0, 'L');
				$pdf->SetFont('Arial', 'B', 12);
				$pdf->Cell(10, 4, utf8_decode('RG: '), 0, 0, 'L');
				$pdf->SetFont('Arial', '', 12);
				$pdf->Cell(50, 4, utf8_decode($retorno['pericia']->rg_periciando), 0, 1, 'L');		
				$pdf->Ln();
				$pdf->SetFont('Arial', 'B', 12);
				$pdf->Cell(43, 4, utf8_decode('Data de nascimento: '), 0, 0, 'L');
				$pdf->SetFont('Arial', '', 12);
				$pdf->Cell(50, 4, utf8_decode(date('d/m/Y', strtotime($retorno['pericia']->nascimento_periciando))), 0, 0, 'L');						
				// Calcula a idade da parte pericianda
				$dataNascimento = new DateTime($retorno['pericia']->nascimento_periciando);
				$dataAtual = new DateTime();
				$idade = $dataAtual->diff($dataNascimento)->y;
				$pdf->SetFont('Arial', 'B', 12);
				$pdf->Cell(14, 4, utf8_decode('Idade: '), 0, 0, 'L');
				$pdf->SetFont('Arial', '', 12);
				$pdf->Cell(50, 4, utf8_decode($idade), 0, 1, 'L');						
				$pdf->Ln();
				$pdf->SetFont('Arial', 'B', 12);
				$pdf->Cell(35, 4, utf8_decode('Local da perícia: '), 0, 0, 'L');
				$pdf->SetFont('Arial', '', 12);
				$pdf->Cell(50, 4, utf8_decode($retorno['pericia']->local_pericia), 0, 1, 'L');						
				$pdf->Ln();
				$pdf->SetFont('Arial', 'B', 12);
				$pdf->Cell(95, 4, utf8_decode('A parte pericianda foi paciente do(a) perito(a)?'), 0, 0, 'L');
				$pdf->SetFont('Arial', '', 12);
				$pdf->Cell(50, 4, utf8_decode($retorno['pericia']->paciente), 0, 1, 'L');						
				$pdf->Ln();
				$pdf->SetFont('Arial', 'B', 12);
				$pdf->Cell(100, 4, utf8_decode('Houve o comparecimento de assistente técnico?'), 0, 0, 'L');
				$pdf->SetFont('Arial', '', 12);
				$pdf->Cell(50, 4, utf8_decode($retorno['pericia']->comparecimento), 0, 1, 'L');
				$pdf->Ln();
				$pdf->SetFont('Arial', 'B', 12);
				$pdf->Cell(70, 4, utf8_decode('A perícia é feita por telemedicina?'), 0, 0, 'L');
				$pdf->SetFont('Arial', '', 12);
				$pdf->Cell(50, 4, utf8_decode($retorno['pericia']->telemedicina), 0, 1, 'L');						
				$pdf->SetFont('Arial', 'B', 14);
				$pdf->Ln(5);
				$pdf->Cell(40, 10, utf8_decode('2. DADOS DA PARTE PERICIANDA'), 0, 1, 'L');
				$pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());
				$pdf->Ln(5);
				$pdf->SetFont('Arial', 'B', 12);
				$pdf->Cell(28, 4, utf8_decode('Nome Social: '), 0, 0, 'L');
				$pdf->SetFont('Arial', '', 12);
				$pdf->Cell(50, 4, utf8_decode($retorno['pericia']->nome_social_periciando), 0, 1, 'L');
				$pdf->Ln();
				$pdf->SetFont('Arial', 'B', 12);
				$pdf->Cell(33, 4, utf8_decode('Sexo Biológico: '), 0, 0, 'L');
				$pdf->SetFont('Arial', '', 12);
				$pdf->Cell(50, 4, utf8_decode($retorno['pericia']->sexo_biologico_periciando), 0, 1, 'L');
				$pdf->Ln();
				$pdf->SetFont('Arial', 'B', 12);
				$pdf->Cell(46, 4, utf8_decode('Identidade de Gênero: '), 0, 0, 'L');
				$pdf->SetFont('Arial', '', 12);
				$pdf->Cell(50, 4, utf8_decode($retorno['pericia']->identidade_genero_periciando), 0, 1, 'L');
				$pdf->Ln();
				$pdf->SetFont('Arial', 'B', 12);
				$pdf->Cell(50, 4, utf8_decode('Raça (autodeclaratório): '), 0, 0, 'L');
				$pdf->SetFont('Arial', '', 12);
				$pdf->Cell(50, 4, utf8_decode($retorno['pericia']->raca_periciando), 0, 1, 'L');
				$pdf->Ln();
				$pdf->SetFont('Arial', 'B', 12);
				$pdf->Cell(27, 4, utf8_decode('Estado Civil: '), 0, 0, 'L');
				$pdf->SetFont('Arial', '', 12);
				$pdf->Cell(50, 4, utf8_decode($retorno['pericia']->estado_civil_periciando), 0, 1, 'L');
				$pdf->Ln();
				$pdf->SetFont('Arial', 'B', 12);
				$pdf->Cell(46, 4, utf8_decode('Grau de Escolaridade: '), 0, 0, 'L');
				$pdf->SetFont('Arial', '', 12);
				$pdf->Cell(50, 4, utf8_decode($retorno['pericia']->grau_escolaridade_periciando), 0, 1, 'L');
				$pdf->Ln();
				$pdf->SetFont('Arial', 'B', 12);
				$pdf->Cell(22, 4, utf8_decode('Profissão: '), 0, 0, 'L');
				$pdf->SetFont('Arial', '', 12);
				$pdf->Cell(50, 4, utf8_decode($retorno['pericia']->profissao_periciando), 0, 1, 'L');
				$pdf->Ln();
				$pdf->SetFont('Arial', 'B', 12);
				$pdf->Cell(8, 4, utf8_decode('UF: '), 0, 0, 'L');
				$pdf->SetFont('Arial', '', 12);
				$pdf->Cell(50, 4, utf8_decode($retorno['pericia']->uf_periciando), 0, 1, 'L');
				$pdf->Ln();
				$pdf->SetFont('Arial', 'B', 12);
				$pdf->Cell(66, 4, utf8_decode('Formação Técnico-profissional: '), 0, 0, 'L');
				$pdf->SetFont('Arial', '', 12);
				$pdf->Cell(50, 4, utf8_decode($retorno['pericia']->formacao_periciando), 0, 1, 'L');
				$pdf->Ln();
				$pdf->SetFont('Arial', 'B', 12);
				$pdf->Cell(84, 4, utf8_decode('Outras Formações Técnico-profissionais: '), 0, 0, 'L');
				$pdf->SetFont('Arial', '', 12);
				$pdf->Cell(50, 4, utf8_decode($retorno['pericia']->outras_formacoes_periciando), 0, 1, 'L');
				$pdf->Ln();
				$pdf->AddPage();
				$pdf->Header();
				$pdf->SetFont('Arial', 'B', 14);
				$pdf->Cell(40, 10, utf8_decode('3. DADOS COMPLEMENTARES'), 0, 1, 'L');
				$pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());
				$pdf->Ln(5);
				$pdf->SetFont('Arial', 'B', 12);
				$pdf->Cell(150, 10, utf8_decode('Qual atividade laboral a parte pericianda declara exercer atualmente? '), 0, 1, 'L');
				$pdf->SetFont('Arial', '', 12);
				$pdf->MultiCell(100, 4, utf8_decode($retorno['pericia']->atividade_laboral), 0, J);
				$pdf->Ln();
				$pdf->SetFont('Arial', 'B', 12);
				$pdf->Cell(150, 10, utf8_decode('Outras atividades já exercidas?? '), 0, 1, 'L');
				$pdf->SetFont('Arial', '', 12);
				$pdf->MultiCell(100, 4, utf8_decode($retorno['pericia']->outras_atividades), 0, J);
				$pdf->Ln();
				$pdf->SetFont('Arial', 'B', 12);
				$pdf->Cell(128, 4, utf8_decode('A parte paricianda já foi submetida a reabilitação profissional?'), 0, 0, 'L');
				$pdf->SetFont('Arial', '', 12);
				$pdf->Cell(50, 4, utf8_decode($retorno['pericia']->reabilitacao), 0, 1, 'L');
				$pdf->Ln();
				$pdf->SetFont('Arial', 'B', 12);
				$pdf->Cell(135, 4, utf8_decode('O tratamento foi mantido durante a vigência do benefício anterior?'), 0, 0, 'L');
				$pdf->SetFont('Arial', '', 12);
				$pdf->Cell(50, 4, utf8_decode($retorno['pericia']->tratamento_mantido), 0, 1, 'L');
				$pdf->Ln();
				$pdf->SetFont('Arial', 'B', 14);
				$pdf->Cell(40, 10, utf8_decode('4. HISTÓRICO CLÍNICO'), 0, 1, 'L');
				$pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());
				$pdf->Ln(5);
				$pdf->SetFont('Arial', 'B', 12);
				$pdf->Cell(152, 4, utf8_decode('A parte pericianda já teve algum afastamento de suas atividades laborais?'), 0, 0, 'L');
				$pdf->SetFont('Arial', '', 12);
				$pdf->Cell(50, 4, utf8_decode($retorno['pericia']->afastamento), 0, 1, 'L');
				$pdf->Ln();
				$pdf->SetFont('Arial', 'B', 12);
				$pdf->Cell(150, 10, utf8_decode('História Clínica (anamnese)'), 0, 1, 'L');
				$pdf->SetFont('Arial', '', 12);
				$pdf->MultiCell(100, 4, utf8_decode($retorno['pericia']->historia_clinica), 0, J);
				$pdf->Ln();
				$pdf->SetFont('Arial', 'B', 12);
				$pdf->MultiCell(190, 4, utf8_decode('A parte pericianda relata que tem (ou já teve) doença ou lesão física ou mental e/ou comorbidade associadas?'), 0, 'J');
				$pdf->SetFont('Arial', '', 12);
				$pdf->Cell(50, 4, utf8_decode($retorno['pericia']->fisica_mental), 0, 1, 'L');
				$pdf->Ln();
				$pdf->SetFont('Arial', 'B', 12);
				$pdf->Cell(95, 4, utf8_decode('A parte pericianda está realizando tratamento?  '), 0, 0, 'L');
				$pdf->SetFont('Arial', '', 12);
				$pdf->Cell(50, 4, utf8_decode($retorno['pericia']->realizando_tratamento), 0, 1, 'L');
				$pdf->Ln();
				$pdf->SetFont('Arial', 'B', 12);
				$pdf->MultiCell(190, 4, utf8_decode('Houve incapacidade pretérita em período(s) além daqueles em que a parte pericianda já esteve em gozo de benefício previdenciário?'), 0, 'J');
				$pdf->SetFont('Arial', '', 12);
				$pdf->Cell(50, 4, utf8_decode($retorno['pericia']->beneficio_previdenciario), 0, 1, 'L');
				$pdf->Ln();
				$pdf->SetFont('Arial', 'B', 12);
				$pdf->MultiCell(190, 4, utf8_decode('O(a) perito(a) teve acesso a que documentos médicos ou odontológicos da parte pericianda?'), 0, 'J');
				$pdf->SetFont('Arial', '', 12);
				$pdf->Cell(50, 7, utf8_decode($retorno['pericia']->documentos_acesso), 0, 1, 'L');
				$pdf->Ln();
				$pdf->SetFont('Arial', 'B', 14);
				$pdf->Cell(40, 10, utf8_decode('5. EXAME CLÍNICO'), 0, 1, 'L');
				$pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());
				$pdf->Ln(5);
				$pdf->SetFont('Arial', 'B', 12);
				$pdf->MultiCell(190, 4, utf8_decode('Descreva o estado clínico da parte pericianda'), 0, 'J');
				$pdf->SetFont('Arial', '', 12);
				$pdf->Cell(50, 7, utf8_decode($retorno['pericia']->estado_clinico_exame), 0, 1, 'L');
				$pdf->Ln();
				$pdf->SetFont('Arial', 'B', 12);
				$pdf->MultiCell(190, 4, utf8_decode('Descreva, se houver, as limitações funcionais presentes diante das exigências físicas/intelectuais exigidas para o exercício do trabalho habitual - profissiografia'), 0, 'J');
				$pdf->SetFont('Arial', '', 12);
				$pdf->Cell(50, 7, utf8_decode($retorno['pericia']->limitacoes_funcionais), 0, 1, 'L');
				$pdf->Ln();
				$pdf->AddPage();
				$pdf->Header();
				$pdf->SetFont('Arial', 'B', 14);
				$pdf->Cell(40, 10, utf8_decode('6. ANÁLISE PERICIAL'), 0, 1, 'L');
				$pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());
				$pdf->Ln(5);
				$pdf->SetFont('Arial', 'B', 12);
				$pdf->Cell(157, 10, utf8_decode('A parte pericianda tem (ou já teve) alguma doença ou lesão física ou mental? '), 0, 0, 'L');
				$pdf->SetFont('Arial', '', 12);
				$pdf->Cell(50, 10, utf8_decode($retorno['pericia']->lesao_fisica_mental), 0, 0, 'L');
				$pdf->Ln();
				$pdf->SetFont('Arial', 'B', 14);
				$pdf->Cell(40, 10, utf8_decode('7. INFORMAÇÕES ADICIONAIS'), 0, 1, 'L');
				$pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());
				$pdf->Ln(5);
				$pdf->SetFont('Arial', 'B', 12);
				$pdf->Cell(108, 10, utf8_decode('A parte pericianda respondeu sozinha as perguntas? '), 0, 0, 'L');
				$pdf->SetFont('Arial', '', 12);
				$pdf->Cell(50, 10, utf8_decode($retorno['pericia']->respondeu_sozinha), 0, 0, 'L');
				$pdf->Ln();
				$pdf->SetFont('Arial', 'B', 12);
				$pdf->MultiCell(190, 4, utf8_decode('A parte pericianda é capaz de administrar os valores que vier a receber a título de atrasados? '), 0, 'J');
				$pdf->SetFont('Arial', '', 12);
				$pdf->Cell(50, 7, utf8_decode($retorno['pericia']->valores_atrasados), 0, 0, 'L');
				$pdf->Ln();
				$pdf->SetFont('Arial', 'B', 12);
				$pdf->MultiCell(190, 4, utf8_decode('Informações complementares (Administrar Valores) '), 0, 'J');
				$pdf->SetFont('Arial', '', 12);
				$pdf->Cell(50, 7, utf8_decode($retorno['pericia']->informacoes_valores), 0, 0, 'L');
				$pdf->Ln();
				$pdf->SetFont('Arial', 'B', 12);
				$pdf->Cell(160, 4, utf8_decode('Houve alguma alteração referentes à incapacidade após a data da perícia administrativa?'), 0, 1, 'L');
				$pdf->SetFont('Arial', '', 12);
				$pdf->Cell(50, 4, utf8_decode($retorno['pericia']->tratamento_mantido), 0, 1, 'L');
				$pdf->Ln();
				$pdf->SetFont('Arial', 'B', 12);
				$pdf->MultiCell(190, 4, utf8_decode('Informações complementares (Alteração Pós-Perícia) '), 0, 'J');
				$pdf->SetFont('Arial', '', 12);
				$pdf->Cell(50, 7, utf8_decode($retorno['pericia']->informacoes_pos_pericia), 0, 0, 'L');
				$pdf->Ln();
				$pdf->SetFont('Arial', 'B', 12);
				$pdf->Cell(144, 10, utf8_decode('Existe divergência em relação às conclusões do laudo administrativo? '), 0, 0, 'L');
				$pdf->SetFont('Arial', '', 12);
				$pdf->Cell(50, 10, utf8_decode($retorno['pericia']->conclusao_laudo), 0, 0, 'L');
				$pdf->Ln();
				$pdf->SetFont('Arial', 'B', 12);
				$pdf->MultiCell(190, 4, utf8_decode('Havendo laudo judicial anterior, neste ou em outro processo, pelas mesmas patologias, indique, em caso de resultado diverso, os motivos que levarama a tal conclusão. '), 0, 'J');
				$pdf->SetFont('Arial', '', 12);
				$pdf->Cell(50, 7, utf8_decode($retorno['pericia']->laudo_diverso), 0, 0, 'L');
				$pdf->Ln();
				$pdf->SetFont('Arial', 'B', 12);
				$pdf->MultiCell(190, 4, utf8_decode('Outros esclarecimentos que entenda pertinentes '), 0, 'J');
				$pdf->SetFont('Arial', '', 12);
				$pdf->Cell(50, 7, utf8_decode($retorno['pericia']->outros_esclarecimentos), 0, 0, 'L');
				$pdf->Ln();
				$pdf->SetFont('Arial', 'B', 14);
				$pdf->Cell(40, 10, utf8_decode('8. QUESITOS ADICIONAIS (do Juízo)'), 0, 1, 'L');
				$pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());
				$pdf->Ln(5);
				$pdf->SetFont('Arial', 'B', 12);
				$pdf->MultiCell(190, 4, utf8_decode('Quesitos adicionais '), 0, 'J');
				$pdf->SetFont('Arial', '', 12);
				$pdf->Cell(50, 7, utf8_decode($retorno['pericia']->quesitos_adicionais), 0, 0, 'L');
				$pdf->Ln();
				$pdf->SetFont('Arial', 'B', 14);
				$pdf->Cell(40, 10, utf8_decode('9. ANEXOS'), 0, 1, 'L');
				$pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());
				$pdf->Ln(5);
				$pdf->SetFont('Arial', '', 12);
				$pdf->Cell(50, 7, utf8_decode('Anexos'), 0, 0, 'L');
				$pdf->Ln();
				$pdf->SetFont('Arial', 'B', 14);
				$pdf->Cell(40, 10, utf8_decode('10. CONCLUSÃO/ASSINATURA'), 0, 1, 'L');
				$pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());
				$pdf->Ln(5);
				$pdf->SetFont('Arial', 'B', 12);
				$pdf->Cell(61, 4, utf8_decode('Data da Conclusão do Laudo: '), 0, 0, 'L');
				$pdf->SetFont('Arial', '', 12);
				$pdf->Cell(55, 4, utf8_decode(date('d/m/Y', strtotime($retorno['pericia']->data_conclusao))), 0, 1, 'L');
				$pdf->Ln();
				$pdf->SetFont('Arial', 'B', 12);
				$pdf->Cell(57, 4, utf8_decode('Médico(a) Perito(a) Judicial: '), 0, 0, 'L');
				$pdf->SetFont('Arial', '', 12);
				$pdf->Cell(45, 4, utf8_decode($retorno['pericia']->medico_perito), 0, 0, 'L');
				$pdf->Ln();

				// Garante que nenhuma saída anterior quebre a geração do PDF
				ob_end_clean();
				
				// Gera o PDF (I = Exibe no navegador, D = Força Download)
				$pdf->Output('I', 'relatorio.pdf');

			}
		} else {
			header('Location: '.base_url().'home');
		}
	}
}
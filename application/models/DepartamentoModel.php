<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DepartamentoModel extends CI_model {

    public function cadastrar_departamento($vtitulo, $vdescricao, $vsituacao, $vdepartamentochefia){
        if(!isset($_SESSION)){ 
            session_start(); 
        }
        if (isset($_SESSION['logado'])) {
            setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
            date_default_timezone_set('America/Maceio');
            $retorno = array();
            $retorno['inseriu'] = false;
            // LIMPA DADOS
            $titulo = strip_tags($vtitulo);
            $titulo = stripcslashes($titulo);
            $descricao = $vdescricao;
            $descricao = stripcslashes($descricao);
            $situacao = strip_tags($vsituacao);
            $situacao = stripcslashes($situacao);
            $departamentochefia = $vdepartamentochefia;

            if($titulo != '' || $descricao != '' || $situacao != ''){
                $data = array(
                    'titulo_departamento' => $titulo,
                    'descricao_departamento' => $descricao,
                    'ind_situacao_departamento' => $situacao,
                    'id_departamento_chefia' => $departamentochefia,
                    'dt_criacao' => date('Y-m-d'),
                    'hr_criacao' => date('H:i:s')
                    );
                if($this->db->insert('departamento', $data)){
                    $retorno['inseriu'] = true;
                    $retorno['id_departamento'] = $this->db->insert_id();
                }
            }       
            return $retorno;
        } else {
            header('Location: '.base_url().'login');
        }
    }   

    public function editar_departamento($vid, $vtitulo, $vdescricao, $vsituacao, $vdepartamentochefia){
        if(!isset($_SESSION)){ 
            session_start(); 
        }
        if (isset($_SESSION['logado'])) {
            $retorno = array();
            $retorno['editou'] = false;
            // LIMPA DADOS
            $id = strip_tags($vid);
            $id = stripcslashes($id);
            $titulo = strip_tags($vtitulo);
            $titulo = stripcslashes($titulo);
            $descricao = $vdescricao;
            $descricao = stripcslashes($descricao);
            $situacao = strip_tags($vsituacao);
            $situacao = stripcslashes($situacao);
            $departamentochefia = $vdepartamentochefia;

            if($titulo != '' || $descricao != '' || $situacao != ''){
                $data = array(
                    'titulo_departamento' => $titulo,
                    'descricao_departamento' => $descricao,
                    'ind_situacao_departamento' => $situacao,
                    'id_departamento_chefia' => $departamentochefia
                    );
                $this->db->where('id_departamento', $id);
                if($this->db->update('departamento', $data)){
                    $retorno['editou'] = true;
                }
            }       

            return $retorno;
        } else {
            header('Location: '.base_url().'login');
        }
    }   

    public function listar_departamentos(){
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION['logado'])) {
            $registros_por_pagina = 10;
            $link = explode('/', $_SERVER["REQUEST_URI"]);
            $pagina = 1;
            $busca = '';
            if(isset($link[$GLOBALS['pos_parametro_lista']+2]) and isset($link[$GLOBALS['pos_parametro_lista']+3]) and isset($link[$GLOBALS['pos_parametro_lista']+4])){
                $campo = $link[$GLOBALS['pos_parametro_lista']+2];
                $ord = $link[$GLOBALS['pos_parametro_lista']+3];
$registros_por_pagina = $link[$GLOBALS['pos_parametro_lista']+4];
            } else {
                $campo = 'TITULO_DEPARTAMENTO';
                $ord = 'asc';
$registros_por_pagina = 10;
            }

            if(isset($link[$GLOBALS['pos_parametro_lista']])){
                if(is_numeric($link[$GLOBALS['pos_parametro_lista']])){
                    $pagina = $link[$GLOBALS['pos_parametro_lista']];
                } else {
                    header('Location: '.base_url().'departamento/lista/1//'.$campo.'/'.$ord.'/'.$registros_por_pagina.'/');
                }
             } else {
                header('Location: '.base_url().'departamento/lista/1//'.$campo.'/'.$ord.'/'.$registros_por_pagina.'/');
            }
            if(isset($link[$GLOBALS['pos_parametro_lista']+1]))$busca = str_replace('%20', ' ', $link[$GLOBALS['pos_parametro_lista']+1]);

            // Criando subquery
            $this->db->select('ID_DEPARTAMENTO');
            $this->db->from('departamento');
            $this->db->like('TITULO_DEPARTAMENTO', $busca, 'both');
            $sub_query = $this->db->get_compiled_select();

            $this->db->select('*, (select dp.TITULO_DEPARTAMENTO from departamento dp where dp.ID_DEPARTAMENTO=departamento.ID_DEPARTAMENTO_CHEFIA) as DEPARTAMENTO_CHEFIA');
            $this->db->like('TITULO_DEPARTAMENTO', $busca, 'both');
            $this->db->or_where('ID_DEPARTAMENTO_CHEFIA IN ('.$sub_query.')');
            $this->db->where('IND_SITUACAO_DEPARTAMENTO', 'A');
            $this->db->from('departamento');
            $this->db->order_by($campo, $ord);
            $this->db->limit($registros_por_pagina);
            $this->db->offset((($pagina - 1) * $registros_por_pagina));
            $data['departamentos'] = $this->db->get()->result();
            // CONTAGEM DE PÁGINAS
            $this->db->like('TITULO_DEPARTAMENTO', $busca, 'both');
            $this->db->where('IND_SITUACAO_DEPARTAMENTO', 'A');
            $this->db->from('departamento');
            $data['paginas'] = ceil($this->db->count_all_results()/$registros_por_pagina);
            if($data['paginas']<1)$data['paginas'] = 1;
            return $data;
        } else {
            header('Location: '.base_url().'login');
        }
    }

    public function listar_departamentos_destaque(){
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION['logado'])) {
            $registros_de_destaque = 3;
            $this->db->select('*');
            $this->db->where('IND_SITUACAO_DEPARTAMENTO', 'A');
            $this->db->from('departamento');
            $this->db->order_by('ID_DEPARTAMENTO', 'desc');
            $this->db->limit($registros_de_destaque);
            $data['departamentos'] = $this->db->get()->result();
            return $data;
        } else {
            header('Location: '.base_url().'login');
        }
    }

    public function listar_departamentos_cargos_usuarios($vid){
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION['logado'])) {
            $id = strip_tags($vid);
            $id = stripcslashes($id);
            $this->db->select('departamento.*, (select dp.TITULO_DEPARTAMENTO from departamento dp where dp.ID_DEPARTAMENTO=departamento.ID_DEPARTAMENTO_CHEFIA) as DEPARTAMENTO_CHEFIA, cargo.TITULO_CARGO, cargo.IND_NIVEL_CARGO, usuario.NOME_USUARIO, usuario.EMAIL_USUARIO, usuario.NOME_FOTO_USUARIO, usuario.SEXO_USUARIO, usuario.CAMINHO_FOTO_USUARIO');
            $this->db->from('departamento');
            $this->db->join('usuario', 'departamento.ID_DEPARTAMENTO=usuario.ID_DEPARTAMENTO');
            $this->db->join('cargo', 'usuario.ID_CARGO=cargo.ID_CARGO');
            $this->db->where('departamento.IND_SITUACAO_DEPARTAMENTO', 'A');
            $this->db->where('departamento.ID_DEPARTAMENTO', $id);
            $this->db->order_by('usuario.IND_CHEFIA', 'desc');
            $this->db->order_by('cargo.IND_NIVEL_CARGO, usuario.NOME_USUARIO');
            $data['cargos'] = $this->db->get()->result();

            return $data;
        } else {
            header('Location: '.base_url().'login');
        }
    }

	public function listar_departamentos_cargo(){
		if(!isset($_SESSION)){
			session_start();
		}
		if (isset($_SESSION['logado'])) {
			$this->db->select('*');
			$this->db->where('IND_SITUACAO_DEPARTAMENTO', 'A');
			$this->db->from('departamento');
			$data['departamentos'] = $this->db->get()->result();
			return $data;
		} else {
			header('Location: '.base_url().'login');
		}
	}

    public function listar_dados_departamento($id){
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION['logado'])) {

            $retorno = array();
            $retorno['existe'] = false;

            $this->db->select('departamento.ID_DEPARTAMENTO, departamento.TITULO_DEPARTAMENTO, departamento.ID_DEPARTAMENTO_CHEFIA, departamento.IND_SITUACAO_DEPARTAMENTO, departamento.DESCRICAO_DEPARTAMENTO');
            $this->db->from('departamento');
            $this->db->where('departamento.ID_DEPARTAMENTO', $id);
            $data = $this->db->get()->result();
            return $data;
        } else {
            header('Location: '.base_url().'login');
        }
    }

    public function listar_dados_departamento_chefia($id){
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION['logado'])) {

            $retorno = array();
            $retorno['existe'] = false;

            $this->db->select('ID_DEPARTAMENTO, TITULO_DEPARTAMENTO as TITULO_DEPARTAMENTO, ID_DEPARTAMENTO_CHEFIA, IND_SITUACAO_DEPARTAMENTO');
            $this->db->from('departamento');
            $this->db->where('id_departamento_chefia', $id);
            $this->db->where('id_departamento !=', $id);

            $data = $this->db->get()->result();
            return $data;
        } else {
            header('Location: '.base_url().'login');
        }
    }


    public function excluir_departamento($vid){
        if(!isset($_SESSION)){ 
            session_start(); 
        }
        if (isset($_SESSION['logado'])) {
            $retorno = array();
            $retorno['excluiu'] = false;

            $id = strip_tags($vid);
            $id = stripcslashes($id);

            $this->db->where('id_departamento', $id);

            if($this->db->delete('departamento')){
                $retorno['excluiu'] = true;
            }
            return $retorno;
        }
    }

    public function retorna_departamentos(){
        $this->db->select('*');
        $this->db->from('departamento');
        $this->db->order_by('ID_DEPARTAMENTO');
        $data['departamento'] = $this->db->get()->result();
        return $data;
    }


    public function retorna_organograma(){
        $this->db->select('d.ID_DEPARTAMENTO, d.TITULO_DEPARTAMENTO,d.ID_DEPARTAMENTO_CHEFIA,c.TITULO_CARGO, u.NOME_USUARIO, u.IND_CHEFIA, u.EMAIL_USUARIO, u.TELEFONE_USUARIO, u.CAMINHO_FOTO_USUARIO');
        $this->db->from('departamento d');
        $this->db->join('usuario u', 'd.ID_DEPARTAMENTO=u.ID_DEPARTAMENTO');
        $this->db->join('cargo c', 'c.ID_CARGO=u.ID_CARGO');
        $this->db->where('u.IND_SITUACAO_USUARIO', 'A');
        $this->db->order_by('d.ID_DEPARTAMENTO, d.ID_DEPARTAMENTO_CHEFIA, c.IND_NIVEL_CARGO, c.TITULO_CARGO, u.NOME_USUARIO');
        $data = $this->db->get()->result();
        return $data;
    }
    
}

?>

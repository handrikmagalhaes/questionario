<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CargoModel extends CI_model {

    public function cadastrar_cargo($vtitulo, $vdescricao, $vsituacao){
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

            if($titulo != '' || $descricao != '' || $situacao != ''){
                $data = array(
                    'titulo_cargo' => $titulo,
                    'descricao_cargo' => $descricao,
                    'ind_situacao_cargo' => $situacao,
                    'dt_criacao' => date('Y-m-d'),
                    'hr_criacao' => date('H:i:s')
                    );
                if($this->db->insert('cargo', $data)){
                    $retorno['inseriu'] = true;
                    $retorno['id_cargo'] = $this->db->insert_id();
                }
            }       
            return $retorno;
        } else {
            header('Location: '.base_url().'login');
        }
    }   

    public function editar_cargo($vid, $vtitulo, $vdescricao, $vsituacao, $vnivel){
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
            $nivel = strip_tags($vnivel);
            $nivel = stripcslashes($nivel);

            if($titulo != '' || $descricao != '' || $situacao != '' || $nivel != ''){
                $data = array(
                    'titulo_cargo' => $titulo,
                    'descricao_cargo' => $descricao,
                    'ind_situacao_cargo' => $situacao,
                    'ind_nivel_cargo' => $nivel
                    );
                $this->db->where('id_cargo', $id);
                if($this->db->update('cargo', $data)){
                    $retorno['editou'] = true;
                }
            }       

            return $retorno;
        } else {
            header('Location: '.base_url().'login');
        }
    }   

    public function listar_cargos(){
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
                $campo = 'TITULO_CARGO';
                $ord = 'asc';
$registros_por_pagina = 10;
            }

            if(isset($link[$GLOBALS['pos_parametro_lista']])){
                if(is_numeric($link[$GLOBALS['pos_parametro_lista']])){
                    $pagina = $link[$GLOBALS['pos_parametro_lista']];
                } else {
                    header('Location: '.base_url().'cargo/lista/1//'.$campo.'/'.$ord.'/'.$registros_por_pagina.'/');
                }
             } else {
                header('Location: '.base_url().'cargo/lista/1//'.$campo.'/'.$ord.'/'.$registros_por_pagina.'/');
            }
            if(isset($link[$GLOBALS['pos_parametro_lista']+1]))$busca = str_replace('%20', ' ', $link[$GLOBALS['pos_parametro_lista']+1]);
            $this->db->select('*');
            $this->db->like('TITULO_CARGO', $busca, 'both');
            $this->db->where('IND_SITUACAO_CARGO', 'A');
            $this->db->from('cargo');
            $this->db->order_by($campo, $ord);
            $this->db->limit($registros_por_pagina);
            $this->db->offset((($pagina - 1) * $registros_por_pagina));
            $data['cargos'] = $this->db->get()->result();
            // CONTAGEM DE PÁGINAS
            $this->db->like('TITULO_CARGO', $busca, 'both');
            $this->db->where('IND_SITUACAO_CARGO', 'A');
            $this->db->from('cargo');
            $data['paginas'] = ceil($this->db->count_all_results()/$registros_por_pagina);
            if($data['paginas']<1)$data['paginas'] = 1;
            return $data;
        } else {
            header('Location: '.base_url().'login');
        }
    }

    public function listar_cargos_destaque(){
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION['logado'])) {
            $registros_de_destaque = 3;
            $this->db->select('*');
            $this->db->where('IND_SITUACAO_CARGO', 'A');
            $this->db->from('cargo');
            $this->db->order_by('ID_cargo', 'desc');
            $this->db->limit($registros_de_destaque);
            $data['cargos'] = $this->db->get()->result();
            return $data;
        } else {
            header('Location: '.base_url().'login');
        }
    }


    public function listar_cargos_usuarios_departamentos($vid){
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION['logado'])) {
            $id = strip_tags($vid);
            $id = stripcslashes($id);
            $this->db->select('cargo.*, departamento.TITULO_DEPARTAMENTO, usuario.NOME_USUARIO, usuario.EMAIL_USUARIO, usuario.NOME_FOTO_USUARIO, usuario.SEXO_USUARIO, usuario.CAMINHO_FOTO_USUARIO');
            $this->db->from('cargo');
            $this->db->join('usuario', 'cargo.ID_CARGO=usuario.ID_CARGO');
            $this->db->join('departamento', 'departamento.ID_DEPARTAMENTO=usuario.ID_DEPARTAMENTO');
            $this->db->where('cargo.IND_SITUACAO_CARGO', 'A');
            $this->db->where('cargo.ID_CARGO', $id);
            $this->db->order_by('usuario.NOME_USUARIO');
            $data['cargos'] = $this->db->get()->result();
            return $data;
        } else {
            header('Location: '.base_url().'login');
        }
    }

	public function listar_cargos_departamento(){
		if(!isset($_SESSION)){
			session_start();
		}
		if (isset($_SESSION['logado'])) {
			$this->db->select('*');
			$this->db->where('IND_SITUACAO_CARGO', 'A');
			$this->db->from('cargo');
			$data['cargos'] = $this->db->get()->result();
			return $data;
		} else {
			header('Location: '.base_url().'login');
		}
	}

    public function listar_dados_cargo($id){
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION['logado'])) {

            $retorno = array();
            $retorno['existe'] = false;

            $this->db->select('*');
            $this->db->from('cargo');
            $this->db->where('id_cargo', $id);
            $data['cargo'] = $this->db->get()->result();
            
            return $data;
        } else {
            header('Location: '.base_url().'login');
        }
    }

    public function excluir_cargo($vid){
        if(!isset($_SESSION)){ 
            session_start(); 
        }
        if (isset($_SESSION['logado'])) {
            $retorno = array();
            $retorno['excluiu'] = false;

            $id = strip_tags($vid);
            $id = stripcslashes($id);

            $this->db->where('id_cargo', $id);

            if($this->db->delete('cargo')){
                $retorno['excluiu'] = true;
            }
            return $retorno;
        }
    }

    public function retorna_cargos(){
        $this->db->select('*');
        $this->db->from('cargo');
        $this->db->order_by('TITULO_CARGO');
        $data['cargo'] = $this->db->get()->result();
        return $data;
    }

}

?>

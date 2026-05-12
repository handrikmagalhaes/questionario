<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AvisoModel extends CI_model {
    public function cadastrar_aviso($vtitulo, $vdescricao, $vdepartamento, $vsituacao){
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
            $descricao = strip_tags($vdescricao);
            $descricao = stripcslashes($descricao);
			$departamento = strip_tags($vdepartamento);
			$departamento = stripcslashes($departamento);
			if($departamento == ''){$departamento = null;}
			$situacao = strip_tags($vsituacao);
			$situacao = stripcslashes($situacao);

            if($titulo != '' || $descricao != '' || $situacao != ''){
                $data = array(
                    'titulo_aviso' => $titulo,
                    'descricao_aviso' => $descricao,
                    'ind_situacao_aviso' => $situacao,
                    'id_departamento' => $departamento,
                    'dt_criacao' => date('Y-m-d'),
                    'hr_criacao' => date('H:i:s')
                    );
                if($this->db->insert('aviso', $data)){
                    $retorno['inseriu'] = true;
                    $retorno['id_aviso'] = $this->db->insert_id();
                }
            }       
            return $retorno;
        } else {
            header('Location: '.base_url().'login');
        }
    }   

    public function editar_aviso($vid, $vtitulo, $vdescricao, $vdepartamento, $vsituacao){
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
            $descricao = strip_tags($vdescricao);
            $descricao = stripcslashes($descricao);
			$departamento = strip_tags($vdepartamento);
			$departamento = stripcslashes($departamento);
			if($departamento == ''){$departamento = null;}
			$situacao = strip_tags($vsituacao);
			$situacao = stripcslashes($situacao);

			if($titulo != '' || $descricao != '' || $situacao != ''){
                $data = array(
                    'titulo_aviso' => $titulo,
                    'descricao_aviso' => $descricao,
					'id_departamento' => $departamento,
                    'ind_situacao_aviso' => $situacao
                    );
                $this->db->where('id_aviso', $id);
                if($this->db->update('aviso', $data)){
                    $retorno['editou'] = true;
                }
            }       

            return $retorno;
        } else {
            header('Location: '.base_url().'login');
        }
    }   

    public function listar_avisos(){
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION['logado'])) {
            $registros_por_pagina = 10;
            $link = explode('/', $_SERVER["REQUEST_URI"]);
            $pagina = 1;
            $busca = '';
            if(isset($link[$GLOBALS['pos_parametro_lista']])){
                if(is_numeric($link[$GLOBALS['pos_parametro_lista']])){
                    $pagina = $link[$GLOBALS['pos_parametro_lista']];
                } else {
                    header('Location: '.base_url().'aviso/lista/1//');
                }
             } else {
                header('Location: '.base_url().'aviso/lista/1//');
            }
            if(isset($link[$GLOBALS['pos_parametro_lista']+1]))$busca = str_replace('%20', ' ', $link[$GLOBALS['pos_parametro_lista']+1]);
            $this->db->select('*');
            $this->db->like('TITULO_AVISO', $busca, 'both');
            $this->db->where('IND_SITUACAO_AVISO', 'A');
            $this->db->from('aviso');
            $this->db->limit($registros_por_pagina);
            $this->db->offset((($pagina - 1) * $registros_por_pagina));
            $data['avisos'] = $this->db->get()->result();
            // CONTAGEM DE PÁGINAS
            $this->db->like('TITULO_AVISO', $busca, 'both');
            $this->db->where('IND_SITUACAO_AVISO', 'A');
            $this->db->from('aviso');
            $data['paginas'] = ceil($this->db->count_all_results()/$registros_por_pagina);
            if($data['paginas']<1)$data['paginas'] = 1;
            return $data;
        } else {
            header('Location: '.base_url().'login');
        }
    }

    public function listar_avisos_destaque(){
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION['logado'])) {
            $registros_de_destaque = 3;
            $this->db->select('*');
            $this->db->where('IND_SITUACAO_AVISO', 'A');
            $this->db->from('aviso');
            $this->db->order_by('ID_AVISO', 'desc');
            $this->db->limit($registros_de_destaque);
            $data['avisos'] = $this->db->get()->result();
            return $data;
        } else {
            header('Location: '.base_url().'login');
        }
    }

    public function listar_dados_aviso($id){
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION['logado'])) {

            $retorno = array();
            $retorno['existe'] = false;

            $this->db->select('*');
            $this->db->from('aviso');
            $this->db->where('id_aviso', $id);
            $data['aviso'] = $this->db->get()->result();
            
            return $data;
        } else {
            header('Location: '.base_url().'login');
        }
    }

    public function excluir_aviso($vid){
        if(!isset($_SESSION)){ 
            session_start(); 
        }
        if (isset($_SESSION['logado'])) {
            $retorno = array();
            $retorno['excluiu'] = false;

            $id = strip_tags($vid);
            $id = stripcslashes($id);

            $this->db->where('id_aviso', $id);

            if($this->db->delete('aviso')){
                $retorno['excluiu'] = true;
            }
            return $retorno;
        }
    }

}

?>

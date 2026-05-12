<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DicaSaudeModel extends CI_model {
    public function cadastrar_dica_saude($vtitulo, $vlink, $vdescricao, $vsituacao){
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
			$link = strip_tags($vlink);
			$link = stripcslashes($link);
            $descricao = $vdescricao;
            $descricao = stripcslashes($descricao);
            $situacao = strip_tags($vsituacao);
            $situacao = stripcslashes($situacao);

            if($titulo != '' || $descricao != '' || $situacao != ''){
                $data = array(
                    'titulo_dica_saude' => $titulo,
					'link_dica_saude' => $link,
                    'descricao_dica_saude' => $descricao,
                    'ind_situacao_dica_saude' => $situacao,
                    'dt_criacao' => date('Y-m-d'),
                    'hr_criacao' => date('H:i:s')
                    );
                if($this->db->insert('dica_saude', $data)){
                    $retorno['inseriu'] = true;
                    $retorno['id_dica_saude'] = $this->db->insert_id();
                }
            }       
            return $retorno;
        } else {
            header('Location: '.base_url().'login');
        }
    }   

    public function editar_dica_saude($vid, $vtitulo, $vlink, $vdescricao, $vsituacao){
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
			$link = strip_tags($vlink);
			$link = stripcslashes($link);
            $descricao = $vdescricao;
            $descricao = stripcslashes($descricao);
            $situacao = strip_tags($vsituacao);
            $situacao = stripcslashes($situacao);

            if($titulo != '' || $descricao != '' || $situacao != ''){
                $data = array(
                    'titulo_dica_saude' => $titulo,
					'link_dica_saude' => $link,
                    'descricao_dica_saude' => $descricao,
                    'ind_situacao_dica_saude' => $situacao
                    );
                $this->db->where('id_dica_saude', $id);
                if($this->db->update('dica_saude', $data)){
                    $retorno['editou'] = true;
                }
            }       

            return $retorno;
        } else {
            header('Location: '.base_url().'login');
        }
    }   

    public function listar_dicas_saude(){
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
                $campo = 'TITULO_DICA_SAUDE';
                $ord = 'asc';
$registros_por_pagina = 10;
            }
            if(isset($link[$GLOBALS['pos_parametro_lista']])){
                if(is_numeric($link[$GLOBALS['pos_parametro_lista']])){
                    $pagina = $link[$GLOBALS['pos_parametro_lista']];
                } else {
                    header('Location: '.base_url().'dica_saude/lista/1//'.$campo.'/'.$ord.'/'.$registros_por_pagina.'/');
                }
             } else {
                header('Location: '.base_url().'dica_saude/lista/1//'.$campo.'/'.$ord.'/'.$registros_por_pagina.'/');
            }
            if(isset($link[$GLOBALS['pos_parametro_lista']+1]))$busca = str_replace('%20', ' ', $link[$GLOBALS['pos_parametro_lista']+1]);
            $this->db->select('*');
            $this->db->like('TITULO_DICA_SAUDE', $busca, 'both');
            $this->db->where('IND_SITUACAO_DICA_SAUDE', 'A');
            $this->db->from('dica_saude');
            $this->db->limit($registros_por_pagina);
            $this->db->order_by($campo,$ord);

            $this->db->offset((($pagina - 1) * $registros_por_pagina));
            $data['dicas_saude'] = $this->db->get()->result();
            // CONTAGEM DE PÁGINAS
            $data['paginas'] = ceil($this->db->count_all_results()/$registros_por_pagina);
            if($data['paginas']<1)$data['paginas'] = 1;
            return $data;
        } else {
            header('Location: '.base_url().'login');
        }
    }

    public function listar_dicas_saude_destaque(){
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION['logado'])) {
            $registros_de_destaque = 3;
            $this->db->select('*');
            $this->db->where('IND_SITUACAO_dica_saude', 'A');
            $this->db->from('dica_saude');
            $this->db->order_by('ID_DICA_SAUDE', 'desc');
            $this->db->limit($registros_de_destaque);
            $data['dicas_saude'] = $this->db->get()->result();
            return $data;
        } else {
            header('Location: '.base_url().'login');
        }
    }

    public function listar_dados_dica_saude($id){
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION['logado'])) {

            $retorno = array();
            $retorno['existe'] = false;

            $this->db->select('*');
            $this->db->from('dica_saude');
            $this->db->where('id_dica_saude', $id);
            $data['dica_saude'] = $this->db->get()->result();
            
            return $data;
        } else {
            header('Location: '.base_url().'login');
        }
    }

    public function excluir_dica_saude($vid){
        if(!isset($_SESSION)){ 
            session_start(); 
        }
        if (isset($_SESSION['logado'])) {
            $retorno = array();
            $retorno['excluiu'] = false;

            $id = strip_tags($vid);
            $id = stripcslashes($id);

            $this->db->where('id_dica_saude', $id);

            if($this->db->delete('dica_saude')){
                $retorno['excluiu'] = true;
            }
            return $retorno;
        }
    }

}

?>

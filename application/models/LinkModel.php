<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LinkModel extends CI_model {
    public function cadastrar_link($vtitulo, $vcaminho, $vtipo, $vdescricao, $vsituacao){
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
            $caminho = strip_tags($vcaminho);
            $caminho = stripcslashes($caminho);
            $tipo = strip_tags($vtipo);
            $tipo = stripcslashes($tipo);
            $descricao = $vdescricao;
            $descricao = stripcslashes($descricao);
            $situacao = strip_tags($vsituacao);
            $situacao = stripcslashes($situacao);

            if($titulo != '' || $caminho != '' || $tipo != '' || $descricao != '' || $situacao != ''){
                $data = array(
                    'titulo_link' => $titulo,
                    'caminho_link' => $caminho,
                    'tipo_link' => $tipo,
                    'descricao_link' => $descricao,
                    'ind_situacao_link' => $situacao,
                    'dt_criacao' => date('Y-m-d'),
                    'hr_criacao' => date('H:i:s')
                    );
                if($this->db->insert('link', $data)){
                    $retorno['inseriu'] = true;
                    $retorno['id_link'] = $this->db->insert_id();
                }
            }       
            return $retorno;
        } else {
            header('Location: '.base_url().'login');
        }
    }   

    public function editar_link($vid, $vtitulo, $vcaminho, $vtipo, $vdescricao, $vsituacao){
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
            $caminho = strip_tags($vcaminho);
            $caminho = stripcslashes($caminho);
            $tipo = strip_tags($vtipo);
            $tipo = stripcslashes($tipo);
            $descricao = $vdescricao;
            $descricao = stripcslashes($descricao);
            $situacao = strip_tags($vsituacao);
            $situacao = stripcslashes($situacao);

            if($titulo != '' || $caminho != '' || $tipo != '' || $descricao != '' || $situacao != ''){
                $data = array(
                    'titulo_link' => $titulo,
                    'caminho_link' => $caminho,
                    'tipo_link' => $tipo,
                    'descricao_link' => $descricao,
                    'ind_situacao_link' => $situacao
                    );
                $this->db->where('id_link', $id);
                if($this->db->update('link', $data)){
                    $retorno['editou'] = true;
                }
            }       

            return $retorno;
        } else {
            header('Location: '.base_url().'login');
        }
    }   

    public function listar_links(){
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
                $campo = 'TITULO_LINK';
                $ord = 'asc';
$registros_por_pagina = 10;
            }
            if(isset($link[$GLOBALS['pos_parametro_lista']])){
                if(is_numeric($link[$GLOBALS['pos_parametro_lista']])){
                    $pagina = $link[$GLOBALS['pos_parametro_lista']];
                } else {
                    header('Location: '.base_url().'link/lista/1//'.$campo.'/'.$ord.'/'.$registros_por_pagina.'/');
                }
             } else {
                header('Location: '.base_url().'link/lista/1//'.$campo.'/'.$ord.'/'.$registros_por_pagina.'/');
            }
            if(isset($link[$GLOBALS['pos_parametro_lista']+1]))$busca = str_replace('%20', ' ', $link[$GLOBALS['pos_parametro_lista']+1]);
            $this->db->select('*');
            $this->db->like('TITULO_LINK', $busca, 'both');
            $this->db->where('IND_SITUACAO_LINK', 'A');
            $this->db->from('link');
            $this->db->limit($registros_por_pagina);
            $this->db->offset((($pagina - 1) * $registros_por_pagina));
			$this->db->order_by($campo, $ord);
            $data['links'] = $this->db->get()->result();
            // CONTAGEM DE PÁGINAS
            $this->db->like('TITULO_LINK', $busca, 'both');
            $this->db->where('IND_SITUACAO_LINK', 'A');
            $this->db->from('link');
            $data['paginas'] = ceil($this->db->count_all_results()/$registros_por_pagina);
            if($data['paginas']<1)$data['paginas'] = 1;
            return $data;
        } else {
            header('Location: '.base_url().'login');
        }
    }

    public function listar_links_destaque(){
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION['logado'])) {
            $registros_de_destaque = 5;
            $this->db->select('*');
            $this->db->where('IND_SITUACAO_LINK', 'A');
            $this->db->from('link');
            $this->db->order_by('LENGTH(TITULO_LINK)');
            $this->db->limit($registros_de_destaque);
            $data['links'] = $this->db->get()->result();
            return $data;
        } else {
            header('Location: '.base_url().'login');
        }
    }

    public function listar_dados_link($id){
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION['logado'])) {

            $retorno = array();
            $retorno['existe'] = false;

            $this->db->select('*');
            $this->db->from('link');
            $this->db->where('id_link', $id);
            $data['link'] = $this->db->get()->result();
            
            return $data;
        } else {
            header('Location: '.base_url().'login');
        }
    }

    public function excluir_link($vid){
        if(!isset($_SESSION)){ 
            session_start(); 
        }
        if (isset($_SESSION['logado'])) {
            $retorno = array();
            $retorno['excluiu'] = false;

            $id = strip_tags($vid);
            $id = stripcslashes($id);

            $this->db->where('id_link', $id);

            if($this->db->delete('link')){
                $retorno['excluiu'] = true;
            }
            return $retorno;
        }
    }

}

?>

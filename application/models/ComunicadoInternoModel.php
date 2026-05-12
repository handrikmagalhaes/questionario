<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ComunicadoInternoModel extends CI_model {
    public function cadastrar_comunicado_interno($vtitulo, $vdescricao, $vdepartamento, $vsituacao){
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
			$departamento = strip_tags($vdepartamento);
			$departamento = stripcslashes($departamento);
			if($departamento == ''){$departamento = null;}
			$situacao = strip_tags($vsituacao);
            $situacao = stripcslashes($situacao);

            if($titulo != '' || $descricao != '' || $situacao != ''){
                $data = array(
                    'titulo_comunicado_interno' => $titulo,
                    'descricao_comunicado_interno' => $descricao,
                    'ind_situacao_comunicado_interno' => $situacao,
                    'id_departamento' => $departamento,
					'dt_criacao' => date('Y-m-d'),
					'hr_criacao' => date('H:i:s')
                    );
                if($this->db->insert('comunicado_interno', $data)){
                    $retorno['inseriu'] = true;
                    $retorno['id_comunicado_interno'] = $this->db->insert_id();
                }
            }       
            return $retorno;
        } else {
            header('Location: '.base_url().'login');
        }
    }   

    public function editar_comunicado_interno($vid, $vtitulo, $vdescricao, $vdepartamento, $vsituacao){
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
			$departamento = strip_tags($vdepartamento);
			$departamento = stripcslashes($departamento);
			if($departamento == ''){$departamento = null;}
			$situacao = strip_tags($vsituacao);
			$situacao = stripcslashes($situacao);

			if($titulo != '' || $descricao != '' || $situacao != ''){
                $data = array(
                    'titulo_comunicado_interno' => $titulo,
                    'descricao_comunicado_interno' => $descricao,
                    'ind_situacao_comunicado_interno' => $situacao,
					'id_departamento' => $departamento
                    );
                $this->db->where('id_comunicado_interno', $id);
                if($this->db->update('comunicado_interno', $data)){
                    $retorno['editou'] = true;
                }
            }       

            return $retorno;
        } else {
            header('Location: '.base_url().'login');
        }
    }   

    public function listar_comunicados_internos(){
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
                $campo = 'DT_CRIACAO';
                $ord = 'desc';
$registros_por_pagina = 10;
            }
            if(isset($link[$GLOBALS['pos_parametro_lista']])){
                if(is_numeric($link[$GLOBALS['pos_parametro_lista']])){
                    $pagina = $link[$GLOBALS['pos_parametro_lista']];
                } else {
                    header('Location: '.base_url().'comunicado_interno/lista/1//'.$campo.'/'.$ord.'/'.$registros_por_pagina.'/');
                }
             } else {
                header('Location: '.base_url().'comunicado_interno/lista/1//'.$campo.'/'.$ord.'/'.$registros_por_pagina.'/');
            }
            if(isset($link[$GLOBALS['pos_parametro_lista']+1]))$busca = str_replace('%20', ' ', $link[$GLOBALS['pos_parametro_lista']+1]);
            $this->db->select('ci.*, d.TITULO_DEPARTAMENTO');
			$this->db->from('comunicado_interno ci');
			$this->db->join('departamento d', 'ci.id_departamento = d.id_departamento', 'left');
			if(!$_SESSION['admin_master']){
				$this->db->where('ci.ID_DEPARTAMENTO', $_SESSION['departamento']);
				$this->db->or_where('ci.ID_DEPARTAMENTO', null);
			}
			$this->db->like('TITULO_COMUNICADO_INTERNO', $busca, 'both');
			$this->db->where('ci.IND_SITUACAO_COMUNICADO_INTERNO', 'A');
			$this->db->order_by($campo, $ord);
            $this->db->limit($registros_por_pagina);
            $this->db->offset((($pagina - 1) * $registros_por_pagina));
            $data['comunicados_internos'] = $this->db->get()->result();
            //return $this->db->last_query();
            
            // CONTAGEM DE PÁGINAS
            $this->db->like('TITULO_COMUNICADO_INTERNO', $busca, 'both');
            $this->db->where('IND_SITUACAO_COMUNICADO_INTERNO', 'A');
            $this->db->from('comunicado_interno');
            $data['paginas'] = ceil($this->db->count_all_results()/$registros_por_pagina);
            if($data['paginas']<1)$data['paginas'] = 1;
            
            //Leituras do usuário
            $this->db->select('ID_COMUNICADO_INTERNO');
            $this->db->from('leitura_comunicado_interno');
            $this->db->where('ID_USUARIO', $_SESSION['id']);
            $dados = $this->db->get()->result();
            $ids = Array();
            $data['leituras'] = Array();
            foreach($dados as $dado){
                array_push($data['leituras'], $dado->ID_COMUNICADO_INTERNO);
            }
            return $data;
        } else {
            header('Location: '.base_url().'login');
        }
    }

    public function listar_comunicados_internos_destaque(){
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION['logado'])) {
            $registros_de_destaque = 3;
            $this->db->select('comunicado_interno.*');
			$this->db->from('comunicado_interno');
			$this->db->join('departamento', 'comunicado_interno.id_departamento = departamento.id_departamento', 'left');
			if(!$_SESSION['admin_master']){
				$this->db->where('comunicado_interno.ID_DEPARTAMENTO', $_SESSION['departamento']);
				$this->db->or_where('comunicado_interno.ID_DEPARTAMENTO', null);
			}
            //$this->db->where('comunicado_interno.DT_CRIACAO >= NOW() - INTERVAL 1 DAY');
            $this->db->where('IND_SITUACAO_COMUNICADO_INTERNO', 'A');
            $this->db->order_by('ID_COMUNICADO_INTERNO', 'desc');
            $this->db->limit($registros_de_destaque);
            $data['comunicados_internos'] = $this->db->get()->result();
            $this->db->select('ci.id_comunicado_interno');
			$this->db->from('comunicado_interno ci');
			$this->db->join('leitura_comunicado_interno lci', 'ci.id_comunicado_interno = lci.id_comunicado_interno');
            $this->db->where('id_usuario', $_SESSION['id']);
            $data['leituras_comunicados_internos'] = $this->db->get()->result();
            return $data;
        } else {
            header('Location: '.base_url().'login');
        }
    }

    public function listar_dados_comunicado_interno($id){
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION['logado'])) {
            $this->db->select('comunicado_interno.*');
			$this->db->from('comunicado_interno');
			$this->db->join('departamento', 'comunicado_interno.id_departamento = departamento.id_departamento', 'left');
			if(!$_SESSION['admin_master']){
				$this->db->where('comunicado_interno.ID_DEPARTAMENTO', $_SESSION['departamento']);
				$this->db->or_where('comunicado_interno.ID_DEPARTAMENTO', null);
			}
            $this->db->where('id_comunicado_interno', $id);
            $data['comunicado_interno'] = $this->db->get()->result();
            
            return $data;
        } else {
            header('Location: '.base_url().'login');
        }
    }

    public function excluir_comunicado_interno($vid){
        if(!isset($_SESSION)){ 
            session_start(); 
        }
        if (isset($_SESSION['logado'])) {
            $retorno = array();
            $retorno['excluiu'] = false;

            $id = strip_tags($vid);
            $id = stripcslashes($id);
            $this->db->where('id_comunicado_interno', $id);

            if($this->db->delete('comunicado_interno')){
                $retorno['excluiu'] = true;
            }
            return $retorno;
        } else {
            header('Location: '.base_url().'login');
        }
    }

    public function confirma_leitura($vIdComunicadoInterno){
        if(!isset($_SESSION)){ 
            session_start(); 
        }
        if (isset($_SESSION['logado'])) {
            $retorno = array();
            $retorno['leu'] = false;
            $idComunicadoInterno = strip_tags($vIdComunicadoInterno);
            $idComunicadoInterno = stripcslashes($vIdComunicadoInterno);
            $data = array(
                'id_comunicado_interno' => $idComunicadoInterno,
                'id_usuario' => $_SESSION['id'],
            );
            if($this->db->insert('leitura_comunicado_interno', $data)){
                $retorno['leu'] = true;
            }
            return $retorno;
        } else {
            header('Location: '.base_url().'login');
        }
    }

}

?>

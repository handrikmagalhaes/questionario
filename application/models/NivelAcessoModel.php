<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NivelAcessoModel extends CI_model {
    public function cadastrar_nivel_acesso($vtitulo, $vdescricao, $vsituacao, $permissoes){
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
                    'titulo_nivel_acesso' => $titulo,
                    'descricao_nivel_acesso' => $descricao,
                    'ind_situacao_nivel_acesso' => $situacao,
                    'dt_criacao' => date('Y-m-d'),
                    'hr_criacao' => date('H:i:s')
                    );
				for ($i=0; $i < count($permissoes); $i++) {
					$campo = $permissoes[$i][0];
					$valor = $permissoes[$i][1];
					$permissao = array($campo => $valor);
					$data = array_merge($data, $permissao);
				}
                if($this->db->insert('nivel_acesso', $data)){
                    $retorno['inseriu'] = true;
                    $retorno['id_nivel_acesso'] = $this->db->insert_id();
                }
            }       
            return $retorno;
        } else {
            header('Location: '.base_url().'login');
        }
    }   

    public function editar_nivel_acesso($vid, $vtitulo, $vdescricao, $vsituacao, $permissoes){
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

            if($titulo != '' || $descricao != '' || $situacao != ''){
                $data = array(
                    'titulo_nivel_acesso' => $titulo,
                    'descricao_nivel_acesso' => $descricao,
                    'ind_situacao_nivel_acesso' => $situacao
                    );
				for ($i=0; $i < count($permissoes); $i++) {
					$campo = $permissoes[$i][0];
					$valor = $permissoes[$i][1];
					$permissao = array($campo => $valor);
					$data = array_merge($data, $permissao);
				}
                $this->db->where('id_nivel_acesso', $id);
                if($this->db->update('nivel_acesso', $data)){
                    $retorno['editou'] = true;
                }
            }       

            return $retorno;
        } else {
            header('Location: '.base_url().'login');
        }
    }   

    public function listar_niveis_acesso(){
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
                $campo = 'TITULO_NIVEL_ACESSO';
                $ord = 'asc';
$registros_por_pagina = 10;
            }

            if(isset($link[$GLOBALS['pos_parametro_lista']])){
                if(is_numeric($link[$GLOBALS['pos_parametro_lista']])){
                    $pagina = $link[$GLOBALS['pos_parametro_lista']];
                } else {
                    header('Location: '.base_url().'nivel_acesso/lista/1//'.$campo.'/'.$ord.'/'.$registros_por_pagina.'/');
                }
             } else {
                header('Location: '.base_url().'nivel_acesso/lista/1//'.$campo.'/'.$ord.'/'.$registros_por_pagina.'/');
            }
            if(isset($link[$GLOBALS['pos_parametro_lista']+1]))$busca = str_replace('%20', ' ', $link[$GLOBALS['pos_parametro_lista']+1]);
            $this->db->select('*');
            $this->db->like('TITULO_NIVEL_ACESSO', $busca, 'both');
            $this->db->where('IND_SITUACAO_NIVEL_ACESSO', 'A');
            $this->db->from('nivel_acesso');
            $this->db->order_by($campo, $ord);
            $this->db->limit($registros_por_pagina);
            $this->db->offset((($pagina - 1) * $registros_por_pagina));
            $data['niveis_acesso'] = $this->db->get()->result();
            // CONTAGEM DE PÁGINAS
            $this->db->like('TITULO_NIVEL_ACESSO', $busca, 'both');
            $this->db->where('IND_SITUACAO_NIVEL_ACESSO', 'A');
            $this->db->from('nivel_acesso');
            $data['paginas'] = ceil($this->db->count_all_results()/$registros_por_pagina);
            if($data['paginas']<1)$data['paginas'] = 1;
            return $data;
        } else {
            header('Location: '.base_url().'login');
        }
    }

    public function listar_niveis_acesso_destaque(){
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION['logado'])) {
            $registros_de_destaque = 3;
            $this->db->select('*');
            $this->db->where('IND_SITUACAO_NIVEL_ACESSO', 'A');
            $this->db->from('nivel_acesso');
            $this->db->limit($registros_de_destaque);
            $data['niveis_acesso'] = $this->db->get()->result();
            return $data;
        } else {
            header('Location: '.base_url().'login');
        }
    }

    public function listar_dados_nivel_acesso($id){
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION['logado'])) {

            $retorno = array();
            $retorno['existe'] = false;

            $this->db->select('*');
            $this->db->from('nivel_acesso');
            $this->db->where('id_nivel_acesso', $id);
            $data['nivel_acesso'] = $this->db->get()->result();
            
            return $data;
        } else {
            header('Location: '.base_url().'login');
        }
    }

    public function excluir_nivel_acesso($vid){
        if(!isset($_SESSION)){ 
            session_start(); 
        }
        if (isset($_SESSION['logado'])) {
            $retorno = array();
            $retorno['excluiu'] = false;

            $id = strip_tags($vid);
            $id = stripcslashes($id);

            $this->db->where('id_nivel_acesso', $id);

            if($this->db->delete('nivel_acesso')){
                $retorno['excluiu'] = true;
            }
            return $retorno;
        }
    }

}

?>

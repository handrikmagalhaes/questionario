<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmpresaModel extends CI_model {

    public function cadastrar_empresa($vtitulo, $vdescricao, $vsituacao){
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
                    'titulo_empresa' => $titulo,
                    'descricao_empresa' => $descricao,
                    'ind_situacao_empresa' => $situacao,
                    'dt_criacao' => date('Y-m-d'),
                    'hr_criacao' => date('H:i:s')
                    );
                if($this->db->insert('empresa', $data)){
                    $retorno['inseriu'] = true;
                    $retorno['id_empresa'] = $this->db->insert_id();
                }
            }       
            return $retorno;
        } else {
            header('Location: '.base_url().'login');
        }
    }   

    public function editar_empresa($vid, $vdescricao, $vdados_bancarios, $vhistoria, $vatuacao, $vmissao, $vvisao, $vvalores){
        if(!isset($_SESSION)){ 
            session_start(); 
        }
        if (isset($_SESSION['logado'])) {
            $retorno = array();
            $retorno['editou'] = false;
            // LIMPA DADOS
            $id = strip_tags($vid);
            $id = stripcslashes($id);
            $descricao = $vdescricao;
            $dados_bancarios = $vdados_bancarios;
            $historia = $vhistoria;
            $atuacao = $vatuacao;
            $missao = $vmissao;
            $visao = $vvisao;
            $valores = $vvalores;

            if($descricao != ''){
                $data = array(
                    'quem_somos' => $descricao,
                    'dados_bancarios' => $dados_bancarios,
                    'historia' => $historia,
                    'atuacao' => $atuacao,
                    'missao' => $missao,
                    'visao' => $visao,
                    'valores' => $valores
                    );
                $this->db->where('id_empresa', $id);
                if($this->db->update('empresa', $data)){
                    $retorno['editou'] = true;
                }
            }       

            return $retorno;
        } else {
            header('Location: '.base_url().'login');
        }
    }   

    public function listar_empresas(){
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
                    header('Location: '.base_url().'empresa/lista/1//');
                }
             } else {
                header('Location: '.base_url().'empresa/lista/1//');
            }
            if(isset($link[$GLOBALS['pos_parametro_lista']+1]))$busca = str_replace('%20', ' ', $link[$GLOBALS['pos_parametro_lista']+1]);
            $this->db->select('*');
            $this->db->like('TITULO_EMPRESA', $busca, 'both');
            $this->db->where('IND_SITUACAO_EMPRESA', 'A');
            $this->db->from('empresa');
            $this->db->limit($registros_por_pagina);
            $this->db->offset((($pagina - 1) * $registros_por_pagina));
            $data['empresas'] = $this->db->get()->result();
            // CONTAGEM DE PÁGINAS
            $this->db->like('TITULO_EMPRESA', $busca, 'both');
            $this->db->where('IND_SITUACAO_EMPRESA', 'A');
            $this->db->from('empresa');
            $data['paginas'] = ceil($this->db->count_all_results()/$registros_por_pagina);
            if($data['paginas']<1)$data['paginas'] = 1;
            return $data;
        } else {
            header('Location: '.base_url().'login');
        }
    }

    public function listar_empresas_destaque(){
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION['logado'])) {
            $registros_de_destaque = 3;
            $this->db->select('*');
            $this->db->where('IND_SITUACAO_EMPRESA', 'A');
            $this->db->from('empresa');
            $this->db->order_by('ID_empresa', 'desc');
            $this->db->limit($registros_de_destaque);
            $data['empresas'] = $this->db->get()->result();
            return $data;
        } else {
            header('Location: '.base_url().'login');
        }
    }

    public function listar_dados_empresa($id){
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION['logado'])) {

            $retorno = array();
            $retorno['existe'] = false;

            $this->db->select('*');
            $this->db->from('empresa');
            $this->db->where('ID_EMPRESA', $id);
            $data['empresa'] = $this->db->get()->result();
            
            return $data;
        } else {
            header('Location: '.base_url().'login');
        }
    }

    public function excluir_empresa($vid){
        if(!isset($_SESSION)){ 
            session_start(); 
        }
        if (isset($_SESSION['logado'])) {
            $retorno = array();
            $retorno['excluiu'] = false;

            $id = strip_tags($vid);
            $id = stripcslashes($id);

            $this->db->where('id_empresa', $id);

            if($this->db->delete('empresa')){
                $retorno['excluiu'] = true;
            }
            return $retorno;
        }
    }

}

?>

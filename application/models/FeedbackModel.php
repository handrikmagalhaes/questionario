<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FeedbackModel extends CI_model {
    public function cadastrar_feedback($vtitulo, $vdepartamento, $vdescricao, $vtipo, $vsituacao, $vanonimo){
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
            $departamento = strip_tags($vdepartamento);
            $departamento = stripcslashes($departamento);
            $descricao = $vdescricao;
            $descricao = stripcslashes($descricao);
            $tipo = strip_tags($vtipo);
            $tipo = stripcslashes($tipo);
            $situacao = strip_tags($vsituacao);
            $situacao = stripcslashes($situacao);
            $anonimo = $vanonimo;

            if($titulo != '' || $departamento != '' || $descricao != '' || $situacao != '' || $tipo != ''){
                $data = array(
                    'titulo_feedback' => $titulo,
                    'id_departamento' => $departamento,
                    'descricao_feedback' => $descricao,
                    'ind_tipo_feedback' => $tipo,
                    'ind_situacao_feedback' => $situacao,
                    'dt_criacao' => date('Y-m-d'),
                    'hr_criacao' => date('H:i:s'),
					'id_usuario' => $_SESSION['id'],
                    'anonimo' => $anonimo
                    );
                if($this->db->insert('feedback', $data)){
                    $retorno['inseriu'] = true;
                    $retorno['id_feedback'] = $this->db->insert_id();
                }
            }       
            return $retorno;
        } else {
            header('Location: '.base_url().'login');
        }
    }   

    public function cadastrar_mensagem($idfeedback, $mensagem, $anonimo){
        if(!isset($_SESSION)){ 
            session_start(); 
        }
        if (isset($_SESSION['logado'])) {
            setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
            date_default_timezone_set('America/Maceio');
            $retorno = array();
            $retorno['inseriu'] = false;
            // LIMPA DADOS
            $vAnonimo = $anonimo;
            //echo $vAnonimo;
            if($vAnonimo){
                $vAnonimo = 1;
            } else {
                $vAnonimo = 0;
            }
            $vidfeedback = strip_tags($idfeedback);
            $vidfeedback = stripcslashes($idfeedback);
            $vmensagem = stripcslashes($mensagem);
            

            if($idfeedback != '' || $mensagem != ''){
                $data = array(
                    'id_feedback' => $vidfeedback,
                    'id_usuario' => $_SESSION['id'],
                    'mensagem' => $vmensagem,
                    'dt_criacao_mensagem' => date('Y-m-d'),
                    'hr_criacao_mensagem' => date('H:i:s'),
                    'anonimo' => $vAnonimo
                    );
                    
                if($this->db->insert('resposta_feedback', $data)){
                    $retorno['inseriu'] = true;
                    $retorno['id_resposta_feedback'] = $this->db->insert_id();
                }
            }       
            return $retorno;
        } else {
            header('Location: '.base_url().'login');
        }
    }   

    public function editar_feedback($vid, $vtitulo, $vdescricao, $vtipo, $vsituacao, $vanonimo){
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
            $tipo = strip_tags($vtipo);
            $tipo = stripcslashes($tipo);
            $situacao = strip_tags($vsituacao);
            $situacao = stripcslashes($situacao);
            $anonimo = $vanonimo;

            if($titulo != '' || $descricao != '' || $situacao != '' || $tipo != ''){
                $data = array(
                    'titulo_feedback' => $titulo,
                    'descricao_feedback' => $descricao,
                    'ind_tipo_feedback' => $tipo,
                    'ind_situacao_feedback' => $situacao,
                    'anonimo' => $anonimo
                    );
                $this->db->where('id_feedback', $id);
                if($this->db->update('feedback', $data)){
                    $retorno['editou'] = true;
                }
            }       

            return $retorno;
        } else {
            header('Location: '.base_url().'login');
        }
    }   

    public function listar_feedbacks(){
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
                    header('Location: '.base_url().'feedback/lista/1//');
                }
             } else {
                header('Location: '.base_url().'feedback/lista/1//');
            }
            if(isset($link[$GLOBALS['pos_parametro_lista']+1]))$busca = str_replace('%20', ' ', $link[$GLOBALS['pos_parametro_lista']+1]);
            $this->db->select('feedback.*, usuario.NOME_USUARIO, departamento.TITULO_DEPARTAMENTO');
            $this->db->like('TITULO_FEEDBACK', $busca, 'both');
            $this->db->where('IND_SITUACAO_FEEDBACK', 'A');
            if (!$_SESSION['admin_master']){
                $departamentos = array(0, $_SESSION['departamento']);
                $this->db->where_in('feedback.ID_DEPARTAMENTO', $departamentos);
            }
            $this->db->or_where('feedback.ID_USUARIO', $_SESSION['id']);
            $this->db->from('feedback');
            $this->db->join('usuario', 'feedback.ID_USUARIO=usuario.ID_USUARIO');
            $this->db->join('departamento', 'feedback.ID_DEPARTAMENTO=departamento.ID_DEPARTAMENTO', 'left');
            $this->db->limit($registros_por_pagina);
            $this->db->offset((($pagina - 1) * $registros_por_pagina));
            $data['feedbacks'] = $this->db->get()->result();
            // CONTAGEM DE PÁGINAS
            $this->db->like('TITULO_FEEDBACK', $busca, 'both');
            $this->db->where('IND_SITUACAO_FEEDBACK', 'A');
            $this->db->from('feedback');
            $data['paginas'] = ceil($this->db->count_all_results()/$registros_por_pagina);
            if($data['paginas']<1)$data['paginas'] = 1;
            return $data;
        } else {
            header('Location: '.base_url().'login');
        }
    }

    public function listar_feedbacks_destaque(){
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION['logado'])) {
            $registros_de_destaque = 3;
            $this->db->select('*');
            $this->db->where('IND_SITUACAO_FEEDBACK', 'A');
            $this->db->where('ID_DEPARTAMENTO', $_SESSION['departamento']);
            $this->db->from('feedback');
            $this->db->order_by('ID_FEEDBACK', 'desc');
            $this->db->limit($registros_de_destaque);
            $data['feedbacks'] = $this->db->get()->result();
            return $data;
        } else {
            header('Location: '.base_url().'login');
        }
    }

    public function listar_dados_feedback($id){
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION['logado'])) {

            $retorno = array();
            $retorno['existe'] = false;

            $this->db->select('*');
            $this->db->from('feedback');
            $this->db->where('id_feedback', $id);
            $data['feedback'] = $this->db->get()->result();
            
            return $data;
        } else {
            header('Location: '.base_url().'login');
        }
    }

    public function excluir_feedback($vid){
        if(!isset($_SESSION)){ 
            session_start(); 
        }
        if (isset($_SESSION['logado'])) {
            $retorno = array();
            $retorno['excluiu'] = false;

            $id = strip_tags($vid);
            $id = stripcslashes($id);

            $this->db->where('id_feedback', $id);

            if($this->db->delete('feedback')){
                $retorno['excluiu'] = true;
            }
            return $retorno;
        }
    }

    public function listar_mensagens_feedback($id_feedback){
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION['logado'])) {
            $this->db->select('resposta_feedback.*, usuario.NOME_USUARIO');
            $this->db->where('resposta_feedback.ID_FEEDBACK', $id_feedback);
            $this->db->from('resposta_feedback');
            $this->db->join('usuario', 'resposta_feedback.ID_USUARIO=usuario.ID_USUARIO');
            $this->db->order_by('resposta_feedback.DT_CRIACAO_MENSAGEM, resposta_feedback.HR_CRIACAO_MENSAGEM');
            $data['feedbacks'] = $this->db->get()->result();
            return $data;
        } else {
            header('Location: '.base_url().'login');
        }
    }

    public function mudar_status_publico($vId, $vStatus){
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION['logado'])) {
            $retorno = array();
            $retorno['editou'] = false;
            // LIMPA DADOS
            $id = strip_tags($vId);
            $id = stripcslashes($id);
            $status = strip_tags($vStatus);
            $status = stripcslashes($status);
            $data = array(
                'publico' => $status,
            );
            $this->db->where('id_feedback', $id);
            if($this->db->update('feedback', $data)){
                $retorno['editou'] = true;
            }
            return $retorno;
        } else {
            header('Location: '.base_url().'login');
        }
    }

}

?>

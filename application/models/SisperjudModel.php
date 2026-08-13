<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SisperjudModel extends CI_model {
    
    public function cadastrar_sisperjud($dados){
        if(!isset($_SESSION)){ 
            session_start(); 
        }
        if (isset($_SESSION['logado'])) {
            setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
            date_default_timezone_set('America/Maceio');
            $retorno = 0;
            if($this->db->insert('pericias_sisperjud', $dados)){
                $retorno = $this->db->insert_id();
            }
            return $retorno;
        } else {
            header('Location: '.base_url().'login');
        }
    }   

    public function alterar_sisperjud($dados){
        if(!isset($_SESSION)){ 
            session_start(); 
        }
        if (isset($_SESSION['logado'])) {
            $retorno = array();
            $retorno = false;
            $this->db->where('id', $dados['id']);
            if($this->db->update('pericias_sisperjud', $dados)){
                $retorno = true;
            }
            return $retorno;
        } else {
            header('Location: '.base_url().'home');
        }
    }

    public function listar_sisperjud(){
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION['logado'])) {
			//Usuarios Nativos
            $this->db->select('nome_periciando, data_pericia, numero_processo,id');
            //$this->db->like('nome_usuario', $busca, 'both');
            $this->db->from('pericias_sisperjud');
			$this->db->order_by('nome_periciando', 'ASC');
            //$this->db->limit($registros_por_pagina);
            //$this->db->offset((($pagina - 1) * $registros_por_pagina));
            $data['pericias'] = $this->db->get()->result();
			// CONTAGEM DE PÁGINAS
            //$this->db->like('nome_usuario', $busca, 'both');
            //$this->db->from('usuario');
            //$data['paginas'] = ceil($this->db->count_all_results()/$registros_por_pagina);
            //if($data['paginas']<1)$data['paginas'] = 1;
            return $data;
        } else {
            header('Location: '.base_url().'home');
        }
    }

    public function excluir_sisperjud($vid){
        if(!isset($_SESSION)){ 
            session_start(); 
        }
        if (isset($_SESSION['logado'])) {
            $retorno = array();
            $retorno['excluiu'] = false;

            $id = strip_tags($vid);
            $id = stripcslashes($id);

            $this->db->where('id', $id);

            if($this->db->delete('pericias_sisperjud')){
                $retorno['excluiu'] = true;
            }
            return $retorno;
        }
    }

    public function alterar_senha_sisperjud($vid, $vsenha){
        if(!isset($_SESSION)){ 
            session_start(); 
        }
        if (isset($_SESSION['logado'])) {
            $retorno = array();
            $retorno['alterou'] = false;
            $id = strip_tags($vid);
            $id = stripcslashes($id);          
            $senha = strip_tags($vsenha);
            $senha = stripcslashes($senha);
            $senha = md5($senha);
            $this->db->where('id_usuario', $id);
            $data = array(
                'senha_usuario' => $senha
                );
            if($this->db->update('usuario', $data)){
                $retorno['alterou'] = true;
            }
            return $retorno;
        }
        else {
            header('Location: '.base_url().'login');
        }
    }

	    public function buscar($id){
        if(!isset($_SESSION)){
            session_start();
        }
            $this->db->select('*');
            //$this->db->like('nome_usuario', $busca, 'both');
            $this->db->from('pericias_sisperjud');
        $this->db->where('pericias_sisperjud.id', $id);
        $pericia = $this->db->get()->row();
        return array('pericia' => $pericia);
    }
}
?>
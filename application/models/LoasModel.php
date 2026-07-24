<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoasModel extends CI_model {
    
    public function cadastrar_loas($dados){
        if(!isset($_SESSION)){ 
            session_start(); 
        }
        if (isset($_SESSION['logado'])) {
            setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
            date_default_timezone_set('America/Maceio');
            $retorno = 0;
            if($this->db->insert('pericias_loas', $dados)){
                $retorno = $this->db->insert_id();
            }
            return $retorno;
        } else {
            header('Location: '.base_url().'login');
        }
    }   

    public function alterar_loas($dados){
        if(!isset($_SESSION)){ 
            session_start(); 
        }
        if (isset($_SESSION['logado'])) {
            $retorno = array();
            $retorno = false;
            $this->db->where('id', $dados['id']);
            if($this->db->update('pericias_loas', $dados)){
                $retorno = true;
            }
            return $retorno;
        } else {
            header('Location: '.base_url().'home');
        }
    }

    public function listar_loas(){
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION['logado'])) {
			//Usuarios Nativos
            $this->db->select('pericias_loas.nome_periciando, pericias_loas.data_pericia, pericias_loas.numero_processo, pericias_loas.id');
            //$this->db->like('nome_usuario', $busca, 'both');
            $this->db->from('pericias_loas');
			$this->db->order_by('pericias_loas.nome_periciando', 'ASC');
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

    public function excluir_loas($vid){
        if(!isset($_SESSION)){ 
            session_start(); 
        }
        if (isset($_SESSION['logado'])) {
            $retorno = array();
            $retorno['excluiu'] = false;

            $id = strip_tags($vid);
            $id = stripcslashes($id);

            $this->db->where('id', $id);

            if($this->db->delete('pericias_loas')){
                $retorno['excluiu'] = true;
            }
            return $retorno;
        }
    }

    public function buscar($id){
        if(!isset($_SESSION)){
            session_start();
        }
            $this->db->select('pericias_loas.*');
            //$this->db->like('nome_usuario', $busca, 'both');
            $this->db->from('pericias_loas');
        $this->db->where('pericias_loas.id', $id);
        $pericia = $this->db->get()->row();
        return array('pericia' => $pericia);
    }
}
?>
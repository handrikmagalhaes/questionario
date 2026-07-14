<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PericiandoModel extends CI_model {
    public function cadastrar_periciando($periciandoData){
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION['logado'])) {
            setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
            date_default_timezone_set('America/Maceio');
            $retorno = 0;
            if ($this->db->insert('periciando', $periciandoData)) {
                $retorno = $this->db->insert_id();
            }
            return $retorno;
        } else {
            header('Location: '.base_url().'login');
        }
    }

    public function busca_periciando($cpfPericiando){
        if(!isset($_SESSION)){
            session_start();
        }
        if (!isset($_SESSION['logado'])) {
            header('Location: '.base_url().'login');
        }
        $this->db->select('*');
        $this->db->from('periciando');
        $this->db->where('cpf_periciando', $cpfPericiando);
        $resposta = $this->db->get()->row();
        return $resposta;
    }
}
?>
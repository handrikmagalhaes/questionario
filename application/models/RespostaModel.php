<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RespostaModel extends CI_model {
    public function cadastrar_resposta($respostaData){
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION['logado'])) {
            setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
            date_default_timezone_set('America/Maceio');
            $retorno = array();
            $retorno['inseriu'] = false;

            // Extrai e limpa dados vindos de POST (ou do array fornecido)
            $resposta = isset($respostaData['resposta']) ? strip_tags($respostaData['resposta']) : '';
            $resposta = stripcslashes($resposta);

            // Determina sisperjud / loas a partir do radio `tipo_pericia` ou campos individuais
            $sisperjud = 0;
            $loas = 0;
            if (isset($respostaData['tipo_pericia'])) {
                $tipo = strtoupper(strip_tags($respostaData['tipo_pericia']));
                if ($tipo === 'SISPERJUD') $sisperjud = 1;
                if ($tipo === 'LOAS') $loas = 1;
            } else {
                if (isset($respostaData['sisperjud']) && ($respostaData['sisperjud'] === '1' || $respostaData['sisperjud'] === 't' || $respostaData['sisperjud'] === 'on')) $sisperjud = 1;
                if (isset($respostaData['loas']) && ($respostaData['loas'] === '1' || $respostaData['loas'] === 't' || $respostaData['loas'] === 'on')) $loas = 1;
            }

            if ($resposta !== '' || $sisperjud || $loas) {
                $data = array(
                    'resposta' => $resposta,
                    'sisperjud' => $sisperjud,
                    'loas' => $loas
                );
                if ($this->db->insert('resposta', $data)) {
                    $retorno['inseriu'] = true;
                }
            }
            return $retorno;
        } else {
            header('Location: '.base_url().'login');
        }
    }

    public function alterar_resposta($id, $resposta, $sisperjud, $loas){
        if(!isset($_SESSION)){ 
            session_start(); 
        }
        if (isset($_SESSION['logado'])) {
            $retorno = array();
            $retorno['alterou'] = false;

            $id = strip_tags($id);
            $id = stripcslashes($id);
            $resposta = strip_tags($resposta);
            $resposta = stripcslashes($resposta);
            $sisperjud = strip_tags($sisperjud);
            $sisperjud = stripcslashes($sisperjud);
            $loas = strip_tags($loas);
            $loas = stripcslashes($loas);

            $data = array(
                'resposta' => $resposta,
                'sisperjud' => $sisperjud,
                'loas' => $loas
            );
            $this->db->where('id', $id);
            if($this->db->update('resposta', $data)){
                $retorno['alterou'] = true;
            }
            return $retorno;
        } else {
            header('Location: '.base_url().'home');
        }
    }

    public function listar_respostas(){
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION['logado'])) {
			//Usuarios Nativos
            $this->db->select('*');
            //$this->db->like('nome_usuario', $busca, 'both');
            $this->db->from('resposta');
			//$this->db->order_by($campo, $ord);
            //$this->db->limit($registros_por_pagina);
            //$this->db->offset((($pagina - 1) * $registros_por_pagina));
            $data['respostas'] = $this->db->get()->result();
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

    public function excluir_resposta($vid){
        if(!isset($_SESSION)){ 
            session_start(); 
        }
        if (isset($_SESSION['logado'])) {
            $retorno = array();
            $retorno['excluiu'] = false;

            $id = strip_tags($vid);
            $id = stripcslashes($id);

            $this->db->where('id', $id);

            if($this->db->delete('resposta')){
                $retorno['excluiu'] = true;
            }
            return $retorno;
        }
    }


    public function buscar($id){
        if(!isset($_SESSION)){
            session_start();
        }
        $this->db->select('resposta, sisperjud, loas, id');
        $this->db->from('resposta');
        $this->db->where('id', $id);
        $resposta = $this->db->get()->row();
        return array('resposta' => $resposta);
    }
}
?>
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
            $retorno = array();
            $retorno['inseriu'] = false;
            
            // Separando os dados do periciando
            $periciando = array(
                'nome_periciando' => $dados['nome_periciando'],
                'cpf_periciando' => $dados['cpf_periciando'],
                'rg_periciando' => $dados['rg_periciando'],
                'nascimento_periciando' => $dados['nascimento_periciando'],
                'nome_social_periciando' => $dados['nome_social'],
                'sexo_biologico_periciando' => $dados['sexo_biologico'],
                'identidade_gerenero_periciando' => $dados['identidade_genero'],
                'raca_periciando' => $dados['raca'],
                'estado_civil_periciando' => $dados['estado_civil'],
                'grau_escolaridade_periciando' => $dados['grau_escolaridade'],
                'profissao_periciando' => $dados['profissao'],
                'uf_periciando' => $dados['uf'],
                'formacao_periciando' => $dados['formacao_periciando'],
                'outras_informacoes_periciando' => $dados['outras_informacoes']
            );
            $periciando = (object) $periciando;
            print_r(var_dump($dados)."<br><br>");
            print(var_dump($periciando));
            exit;
/*            if (this->db->insert('periciando', (object) $periciando)) {
                $periciando_id = $this->db->insert_id();
                $dados['periciando_id'] = $periciando_id;
                if($this->db->insert('pericias_sisperjud', $dados)){
                    $retorno['inseriu'] = true;
                }
            }*/
            return $retorno;
        } else {
            header('Location: '.base_url().'login');
        }
    }   

    public function alterar_sisperjud($id, $nome_usuario, $email_usuario, $senha_usuario = ''){
        if(!isset($_SESSION)){ 
            session_start(); 
        }
        if (isset($_SESSION['logado'])) {
            $retorno = array();
            $retorno['alterou'] = false;

            $id = strip_tags($id);
            $id = stripcslashes($id);
            $nome_usuario = strip_tags($nome_usuario);
            $nome_usuario = stripcslashes($nome_usuario);
            $email_usuario = strip_tags($email_usuario);
            $email_usuario = stripcslashes($email_usuario);
            $senha_usuario = strip_tags($senha_usuario);
            $senha_usuario = stripcslashes($senha_usuario);

            $data = array(
                'nome_usuario' => $nome_usuario,
                'email_usuario' => $email_usuario
            );
            if ($senha_usuario !== '') {
                $data['senha_usuario'] = password_hash($senha_usuario, PASSWORD_DEFAULT);
            }

            $this->db->where('id', $id);
            if($this->db->update('usuario', $data)){
                $retorno['alterou'] = true;
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
            $this->db->select('*');
            //$this->db->like('nome_usuario', $busca, 'both');
            $this->db->from('pericias_sisperjud');
            $this->db->join('periciando', 'periciando.id = pericias_sisperjud.periciando_id', 'inner');
			$this->db->order_by('periciando.nome_periciando', 'ASC');
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

            if($this->db->delete('usuario')){
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
        $this->db->select('nome_usuario, email_usuario, senha_usuario, id');
        $this->db->from('usuario');
        $this->db->where('usuario.id', $id);
        $usuario = $this->db->get()->row();
        return array('usuario' => $usuario);
    }
}
?>
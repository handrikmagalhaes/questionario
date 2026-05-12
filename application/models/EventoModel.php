<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventoModel extends CI_model {
    public function cadastrar_evento($vtitulo, $vdata, $vdescricao, $vsituacao, $midias_galeria){
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
			$data = strip_tags($vdata);
			$data = stripcslashes($data);
            $descricao = $vdescricao;
            $descricao = stripcslashes($descricao);
            $situacao = strip_tags($vsituacao);
            $situacao = stripcslashes($situacao);

            if($titulo != '' || $descricao != '' || $situacao != ''){
                $data = array(
                    'titulo_evento' => $titulo,
					'dt_evento' => $data,
                    'descricao_evento' => $descricao,
                    'ind_situacao_evento' => $situacao,
                    'dt_criacao' => date('Y-m-d'),
                    'hr_criacao' => date('H:i:s')
                    );
                if($this->db->insert('evento', $data)){
                    $retorno['inseriu'] = true;
                    $retorno['id_evento'] = $this->db->insert_id();

					// INCLUI MIDIAS GALERIA
					for($i=0; $i<count($midias_galeria);$i++){
						// ADICIONA MIDIA NA GALERIA
						if($midias_galeria[$i]!=''){
							$dados_midia = array(
								'id_midia' => $midias_galeria[$i],
								'id_evento' => $retorno['id_evento']
							);
							$this->db->insert('midia_evento', $dados_midia);
						}
					}
                }
            }       
            return $retorno;
        } else {
            header('Location: '.base_url().'login');
        }
    }   

    public function editar_evento($vid, $vtitulo, $vdata, $vdescricao, $vsituacao, $midias_galeria){
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
			$data = strip_tags($vdata);
			$data = stripcslashes($data);
            $descricao = $vdescricao;
            $descricao = stripcslashes($descricao);
            $situacao = strip_tags($vsituacao);
            $situacao = stripcslashes($situacao);

            if($titulo != '' || $descricao != '' || $situacao != ''){
                $data = array(
                    'titulo_evento' => $titulo,
					'dt_evento' => $data,
                    'descricao_evento' => $descricao,
                    'ind_situacao_evento' => $situacao
                    );
                $this->db->where('id_evento', $id);
                if($this->db->update('evento', $data)){

					//// ATUALIZA GALERIA
					// EXCLUI MIDIA REMOVIDA
					$this->db->select('id_midia');
					$this->db->from('midia_evento');
					$this->db->where('id_evento', $id);
					$data['galeria_evento'] = $this->db->get()->result();
					if(count($data['galeria_evento'])>0){
						foreach ($data['galeria_evento'] as $galeria) {
							$excluir_midia = true;
							$id_midia = $galeria->id_midia;
							for($i=0; $i<count($midias_galeria);$i++){
								if($id_midia == $midias_galeria[$i]){
									$excluir_midia = false;
								}
							}
							if($excluir_midia){
								// EXCLUI A MIDIA;
								$this->db->where('id_midia', $id_midia);
								$this->db->delete('midia_evento');
							}
						}
					}
					// INCLUI MIDIA INSERIDA
					for($i=0; $i<count($midias_galeria);$i++){
						if($midias_galeria[$i] != ''){
							$this->db->select('id_midia');
							$this->db->from('midia_evento');
							$this->db->where('id_evento', $id);
							$this->db->where('id_midia', $midias_galeria[$i]);
							$data['midia_evento'] = $this->db->get()->result();
							if(count($data['midia_evento'])==0){
								// ADICIONA MIDIA NA GALERIA
								$dados_midia = array(
									'id_midia' => $midias_galeria[$i],
									'id_evento' => $id
								);
								$this->db->insert('midia_evento', $dados_midia);
							}
						}
					}

                	$retorno['editou'] = true;
                }
            }       

            return $retorno;
        } else {
            header('Location: '.base_url().'login');
        }
    }   

    public function listar_eventos(){
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
                $campo = 'TITULO_EVENTO';
                $ord = 'asc';
$registros_por_pagina = 10;
            }
            if(isset($link[$GLOBALS['pos_parametro_lista']])){
                if(is_numeric($link[$GLOBALS['pos_parametro_lista']])){
                    $pagina = $link[$GLOBALS['pos_parametro_lista']];
                } else {
                    header('Location: '.base_url().'evento/lista/1//'.$campo.'/'.$ord.'/'.$registros_por_pagina.'/');
                }
             } else {
                header('Location: '.base_url().'evento/lista/1//'.$campo.'/'.$ord.'/'.$registros_por_pagina.'/');
            }
            if(isset($link[$GLOBALS['pos_parametro_lista']+1]))$busca = str_replace('%20', ' ', $link[$GLOBALS['pos_parametro_lista']+1]);
            $this->db->select('*');
            $this->db->like('TITULO_EVENTO', $busca, 'both');
            $this->db->where('IND_SITUACAO_EVENTO', 'A');
            $this->db->from('evento');
            $this->db->limit($registros_por_pagina);
            $this->db->offset((($pagina - 1) * $registros_por_pagina));
            $data['eventos'] = $this->db->get()->result();
            // CONTAGEM DE PÁGINAS
            $this->db->like('TITULO_EVENTO', $busca, 'both');
            $this->db->where('IND_SITUACAO_EVENTO', 'A');
            $this->db->from('evento');
            $data['paginas'] = ceil($this->db->count_all_results()/$registros_por_pagina);
            if($data['paginas']<1)$data['paginas'] = 1;
            return $data;
        } else {
            header('Location: '.base_url().'login');
        }
    }

	public function listar_eventos_destaque(){
		if(!isset($_SESSION)){
			session_start();
		}
		if (isset($_SESSION['logado'])) {
			$registros_de_destaque = 5;
			$mes = date('m');
			$this->db->select('*');
			$this->db->where('IND_SITUACAO_EVENTO', 'A');
			$this->db->where('Month(DT_EVENTO)', $mes);
			$this->db->from('evento');
			$this->db->order_by('ID_EVENTO', 'desc');
			$this->db->limit($registros_de_destaque);
			$data['eventos'] = $this->db->get()->result();
			return $data;
		} else {
			header('Location: '.base_url().'login');
		}
	}

    public function listar_dados_evento($id){
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION['logado'])) {

            $retorno = array();
            $retorno['existe'] = false;

            $this->db->select('*');
            $this->db->from('evento');
            $this->db->where('id_evento', $id);
            $data['evento'] = $this->db->get()->result();
            
            return $data;
        } else {
            header('Location: '.base_url().'login');
        }
    }

	public function listar_midias_galeria($vid_evento){
		$id_evento = strip_tags($vid_evento);
		$id_evento = stripcslashes($id_evento);
		$retorno = array();
		$retorno['lista_midias'] = '';
		$retorno['lista_midias_view'] = '';
		$this->db->select('*');
		$this->db->from('midia_evento');
		$this->db->join('midia', 'midia_evento.id_midia = midia.id_midia');
		$this->db->where('id_evento', $id_evento);
		$data['galeria'] = $this->db->get()->result();
		foreach ($data['galeria'] as $galeria) {
			$retorno['lista_midias'] .= '<div class="item-galeria position-relative" data-id-midia="'.$galeria->ID_MIDIA.'"><div class="btns position-absolute"><a href="..'.$galeria->CAMINHO_MIDIA.'" class="btn btn-sm btn-primary rounded-0 lightbox" rel="galeria" title="'.$galeria->NOME_MIDIA.'"><i class="fa fa-eye"></i></a><button class="btn btn-sm btn-danger rounded-0 btn-remover-midia-galeria"><i class="fa fa-trash"></i></button></div><img src="..'.$galeria->CAMINHO_MIDIA.'" alt="'.$galeria->NOME_MIDIA.'"></div>';
			$retorno['lista_midias_view'] .= '<div class="item-galeria position-relative" data-id-midia="'.$galeria->ID_MIDIA.'"><a href="..'.$galeria->CAMINHO_MIDIA.'" class="lightbox" rel="galeria" title="'.$galeria->NOME_MIDIA.'"><img src="..'.$galeria->CAMINHO_MIDIA.'" alt="'.$galeria->NOME_MIDIA.'"></a></div>';
		}
		return $retorno;
	}

    public function excluir_evento($vid){
        if(!isset($_SESSION)){ 
            session_start(); 
        }
        if (isset($_SESSION['logado'])) {
            $retorno = array();
            $retorno['excluiu'] = false;

            $id = strip_tags($vid);
            $id = stripcslashes($id);

            $this->db->where('id_evento', $id);

            if($this->db->delete('evento')){
                $retorno['excluiu'] = true;
            }
            return $retorno;
        }
    }

}

?>

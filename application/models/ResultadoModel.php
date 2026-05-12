<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ResultadoModel extends CI_model {
    public function cadastrar_resultado($vtitulo, $vcor_grafico, $vdescricao, $itens_resultado, $vsituacao){
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
			$cor_grafico = strip_tags($vcor_grafico);
			$cor_grafico = stripcslashes($cor_grafico);
            $descricao = $vdescricao;
            $descricao = stripcslashes($descricao);
            $situacao = strip_tags($vsituacao);
            $situacao = stripcslashes($situacao);

            if($titulo != '' || $descricao != '' || $situacao != ''){
                $data = array(
                    'titulo_resultado' => $titulo,
					'cor_grafico_resultado' => $cor_grafico,
                    'descricao_resultado' => $descricao,
                    'ind_situacao_resultado' => $situacao,
                    'dt_criacao' => date('Y-m-d'),
                    'hr_criacao' => date('H:i:s')
                    );
                if($this->db->insert('resultado', $data)){
                    $retorno['inseriu'] = true;
                    $retorno['id_resultado'] = $this->db->insert_id();
					if(isset($itens_resultado) && count($itens_resultado) > 1){
						foreach($itens_resultado as $item_resultado){
							if(isset($item_resultado[0]) && isset($item_resultado[1]) && isset($item_resultado[2])){
								$periodo = $item_resultado[0];
								$meta = $item_resultado[1];
								$realizado = $item_resultado[2];
								$data_item_resultado = array(
									'id_resultado' => $retorno['id_resultado'],
									'periodo_resultado_item' => $periodo,
									'meta_resultado_item' => $meta,
									'realizado_resultado_item' => $realizado,
								);
								$this->db->insert('resultado_item', $data_item_resultado);
							}
						}
					}
                }
            }       
            return $retorno;
        } else {
            header('Location: '.base_url().'login');
        }
    }   

    public function editar_resultado($vid, $vtitulo, $vcor_grafico, $vdescricao, $itens_resultado, $excluir_itens_resultado, $vsituacao){
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
			$cor_grafico = strip_tags($vcor_grafico);
			$cor_grafico = stripcslashes($cor_grafico);
            $descricao = $vdescricao;
            $descricao = stripcslashes($descricao);
            $situacao = strip_tags($vsituacao);
            $situacao = stripcslashes($situacao);

            if($titulo != '' || $descricao != '' || $situacao != ''){
                $data = array(
                    'titulo_resultado' => $titulo,
					'cor_grafico_resultado' => $cor_grafico,
                    'descricao_resultado' => $descricao,
                    'ind_situacao_resultado' => $situacao
                    );
                $this->db->where('id_resultado', $id);
                if($this->db->update('resultado', $data)){
					if(isset($itens_resultado) && count($itens_resultado) > 1){
	                    foreach($itens_resultado as $item_resultado){
	                    	if(isset($item_resultado[0]) && isset($item_resultado[1]) && isset($item_resultado[2])){
								$periodo = $item_resultado[0];
								$meta = $item_resultado[1];
								$realizado = $item_resultado[2];
								$id_item = isset($item_resultado[3]) ? $item_resultado[3] : '';
								if($id_item != ''){
									$data_item_resultado = array(
										'periodo_resultado_item' => $periodo,
										'meta_resultado_item' => $meta,
										'realizado_resultado_item' => $realizado,
									);
									$this->db->where('id_resultado_item', $id_item);
									$this->db->update('resultado_item', $data_item_resultado);
								} else {
									$data_item_resultado = array(
										'id_resultado' => $id,
										'periodo_resultado_item' => $periodo,
										'meta_resultado_item' => $meta,
										'realizado_resultado_item' => $realizado,
									);
									$this->db->insert('resultado_item', $data_item_resultado);
								}
							}
						}
					}
					if(isset($excluir_itens_resultado)){
						foreach($excluir_itens_resultado as $excluir_item_resultado){
							if(isset($excluir_item_resultado['id'])){
								$this->db->where('id_resultado_item', $excluir_item_resultado['id']);
								$this->db->delete('resultado_item');
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

    public function listar_resultados(){
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
                $campo = 'TITULO_RESULTADO';
                $ord = 'asc';
$registros_por_pagina = 10;
            }
            if(isset($link[$GLOBALS['pos_parametro_lista']])){
                if(is_numeric($link[$GLOBALS['pos_parametro_lista']])){
                    $pagina = $link[$GLOBALS['pos_parametro_lista']];
                } else {
                    header('Location: '.base_url().'resultado/lista/1//'.$campo.'/'.$ord.'/'.$registros_por_pagina.'/');
                }
             } else {
                header('Location: '.base_url().'resultado/lista/1//'.$campo.'/'.$ord.'/'.$registros_por_pagina.'/');
            }
            if(isset($link[$GLOBALS['pos_parametro_lista']+1]))$busca = str_replace('%20', ' ', $link[$GLOBALS['pos_parametro_lista']+1]);
            $this->db->select('*');
            $this->db->like('TITULO_RESULTADO', $busca, 'both');
            $this->db->where('IND_SITUACAO_RESULTADO', 'A');
            $this->db->from('resultado');
			$this->db->order_by($campo, $ord);
            $this->db->limit($registros_por_pagina);
            $this->db->offset((($pagina - 1) * $registros_por_pagina));
            $data['resultados'] = $this->db->get()->result();
            // CONTAGEM DE PÁGINAS
            $this->db->like('TITULO_RESULTADO', $busca, 'both');
            $this->db->where('IND_SITUACAO_RESULTADO', 'A');
            $this->db->from('resultado');
            $data['paginas'] = ceil($this->db->count_all_results()/$registros_por_pagina);
            if($data['paginas']<1)$data['paginas'] = 1;
            return $data;
        } else {
            header('Location: '.base_url().'login');
        }
    }

    public function listar_resultados_destaque(){
        if(!isset($_SESSION)){
            session_start();
        }
        $ano_atual = date('Y');
        if (isset($_SESSION['logado'])) {
            $this->db->select('*');
            $this->db->where('IND_SITUACAO_RESULTADO', 'A');
            $this->db->from('resultado');
            $this->db->join('resultado_item', 'resultado_item.id_resultado = resultado.id_resultado');
			$this->db->like('PERIODO_RESULTADO_ITEM', $ano_atual);
			$this->db->order_by('resultado_item.id_resultado', 'desc');
			$this->db->order_by('substring(PERIODO_RESULTADO_ITEM, 1, 4)');
			$this->db->order_by('substring(PERIODO_RESULTADO_ITEM, 6, 2)');
            $data['resultados_itens'] = $this->db->get()->result();

			$this->db->select('*');
			$this->db->where('IND_SITUACAO_RESULTADO', 'A');
			$this->db->from('resultado');
			$this->db->join('resultado_item', 'resultado_item.id_resultado = resultado.id_resultado');
			$this->db->like('PERIODO_RESULTADO_ITEM', $ano_atual);
			$this->db->group_by('resultado_item.id_resultado');
			$data['resultados'] = $this->db->get()->result();

			return $data;
        } else {
            header('Location: '.base_url().'login');
        }
    }

    public function listar_dados_resultado($id, $ano = ''){
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION['logado'])) {

            $retorno = array();
            $retorno['existe'] = false;

            $this->db->select('*');
            $this->db->from('resultado');
            $this->db->where('id_resultado', $id);
            $data['resultado'] = $this->db->get()->result();

			$this->db->select('*');
			$this->db->from('resultado_item');
			$this->db->where('id_resultado', $id);
			$this->db->like('PERIODO_RESULTADO_ITEM', $ano);
			$this->db->order_by('substring(PERIODO_RESULTADO_ITEM, 1, 4)');
			$this->db->order_by('substring(PERIODO_RESULTADO_ITEM, 6, 2)');
			$data['itens_resultado'] = $this->db->get()->result();

			$this->db->select('*');
			$this->db->from('resultado_item');
			$this->db->where('id_resultado', $id);
			$this->db->order_by('substring(PERIODO_RESULTADO_ITEM, 6, 2)');
			$data['anos'] = $this->db->get()->result();

			return $data;
        } else {
            header('Location: '.base_url().'login');
        }
    }

    public function excluir_resultado($vid){
        if(!isset($_SESSION)){ 
            session_start(); 
        }
        if (isset($_SESSION['logado'])) {
            $retorno = array();
            $retorno['excluiu'] = false;

            $id = strip_tags($vid);
            $id = stripcslashes($id);

            $this->db->where('id_resultado', $id);

            if($this->db->delete('resultado')){
                $retorno['excluiu'] = true;
            }
            return $retorno;
        }
    }

}

?>

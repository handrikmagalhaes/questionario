<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ArquivoModel extends CI_model {

    public function cadastrar_arquivo($vtitulo, $vdescricao, $vtipo, $vdepartamento, $vnome, $vlink, $vcaminho, $vsituacao, $vordem){
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
            $tipo = strip_tags($vtipo);
            $tipo = stripcslashes($tipo);
			$departamento = strip_tags($vdepartamento);
			$departamento = stripcslashes($departamento);
            $nome = strip_tags($vnome);
            $nome = stripcslashes($nome);
            $caminho = strip_tags($vcaminho);
            $caminho = stripcslashes($caminho);
			$link = strip_tags($vlink);
            $situacao = strip_tags($vsituacao);
            $situacao = stripcslashes($situacao);
            $ordem = strip_tags($vordem);
            $ordem = stripcslashes($ordem);

            if($titulo != '' || $descricao != '' || $situacao != '' || $ordem != ''){
                $data = array(
                    'titulo_arquivo' => $titulo,
                    'descricao_arquivo' => $descricao,
                    'id_tipo_arquivo' => $tipo,
                    'id_departamento' => $departamento,
					'nome_arquivo' => $nome,
					'link_arquivo' => $link,
                    'caminho_arquivo' => $caminho,
                    'ind_situacao_arquivo' => $situacao,
                    'ordem_arquivo' => $ordem,
                    'dt_criacao' => date('Y-m-d'),
                    'hr_criacao' => date('H:i:s')
                );

                if($this->db->insert('arquivo', $data)){
                    $retorno['inseriu'] = true;
                    $retorno['id_arquivo'] = $this->db->insert_id();
                    //Alterando a ordem dos arquivos
                    $this->db->where('ordem_arquivo >=', $ordem);
                    $this->db->where('id_departamento', $departamento);
                    $this->db->where('id_arquivo !=', $retorno['id_arquivo']);
                    $this->db->set('ordem_arquivo', 'ordem_arquivo+1', FALSE);
                    $this->db->update('arquivo');
                    //return $this->db->last_query();

                }
            }       
            return $retorno;
        } else {
            header('Location: '.base_url().'login');
        }
    }   

    public function editar_arquivo($vid, $vtitulo, $vdescricao, $vtipo, $vdepartamento, $vnome, $vlink, $vcaminho, $vsituacao, $vordem){
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
			$departamento = strip_tags($vdepartamento);
			$departamento = stripcslashes($departamento);
            $nome = strip_tags($vnome);
            $nome = stripcslashes($nome);
			$link = strip_tags($vlink);
            $caminho = strip_tags($vcaminho);
            $caminho = stripcslashes($caminho);
            $situacao = strip_tags($vsituacao);
            $situacao = stripcslashes($situacao);
            $ordem = strip_tags($vordem);
            $ordem = stripcslashes($ordem);

            if($titulo != '' || $descricao != '' || $situacao != '' || $ordem != ''){
                $data = array(
                    'titulo_arquivo' => $titulo,
                    'descricao_arquivo' => $descricao,
                    'id_tipo_arquivo' => $tipo,
					'id_departamento' => $departamento,
					'nome_arquivo' => $nome,
                    'link_arquivo' => $link,
                    'caminho_arquivo' => $caminho,
                    'ind_situacao_arquivo' => $situacao,
                    'ordem_arquivo' => $ordem
                );

                //Alterando o registro
                $this->db->where('id_arquivo', $id);
                if($this->db->update('arquivo', $data)){    
                    //echo $this->db->last_query();
                    $retorno['editou'] = true;
                    // Alterando a ordem dos arquivos
                    $this->db->set('ordem_arquivo', 'ordem_arquivo+1', FALSE);
                    $this->db->where('ordem_arquivo >=', $ordem);
                    $this->db->where('id_arquivo !=', $id);
                    $this->db->where('id_departamento', $departamento);
                    $this->db->update('arquivo');
                    //echo $this->db->last_query();
                }
            }       

            return $retorno;
        } else {
            header('Location: '.base_url().'login');
        }
    }   

    public function listar_arquivos(){
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION['logado'])) {
            $link = explode('/', $_SERVER["REQUEST_URI"]);
            $pagina = 1;
            $busca = '';
            if(isset($link[$GLOBALS['pos_parametro_lista']+1]) and isset($link[$GLOBALS['pos_parametro_lista']+2]) and isset($link[$GLOBALS['pos_parametro_lista']+3]) and isset($link[$GLOBALS['pos_parametro_lista']+4])){
                $busca = $link[$GLOBALS['pos_parametro_lista']+1];
                $campo = $link[$GLOBALS['pos_parametro_lista']+2];
                $ord = $link[$GLOBALS['pos_parametro_lista']+3];
                $registros_por_pagina = $link[$GLOBALS['pos_parametro_lista']+4];
            } else {
                $campo = 'TITULO_ARQUIVO';
                $ord = 'asc';
                $registros_por_pagina = 10;
            }

            if(isset($link[$GLOBALS['pos_parametro_lista']])){
                if(is_numeric($link[$GLOBALS['pos_parametro_lista']])){
                    $pagina = $link[$GLOBALS['pos_parametro_lista']];
                } else {
                    header('Location: '.base_url().'arquivo/lista/1//'.$campo.'/'.$ord.'/'.$registros_por_pagina.'/');
                }
             } else {
                header('Location: '.base_url().'arquivo/lista/1//'.$campo.'/'.$ord.'/'.$registros_por_pagina.'/');
            }
            if(isset($link[$GLOBALS['pos_parametro_lista']+1]))$busca = str_replace('%20', ' ', $link[$GLOBALS['pos_parametro_lista']+1]);
            $this->db->select('arquivo.*, tipo_arquivo.TITULO_TIPO_ARQUIVO as TIPO_ARQUIVO, departamento.TITULO_DEPARTAMENTO as DEPARTAMENTO');
            $this->db->or_like('TITULO_ARQUIVO', $busca, 'both');
            $this->db->or_like('departamento.TITULO_DEPARTAMENTO', $busca, 'both');
            $this->db->or_like('tipo_arquivo.TITULO_TIPO_ARQUIVO', $busca, 'both');
            $this->db->where('IND_SITUACAO_ARQUIVO', 'A');
            $this->db->from('arquivo');
			$this->db->join('tipo_arquivo', 'arquivo.ID_TIPO_ARQUIVO = tipo_arquivo.ID_TIPO_ARQUIVO');
			$this->db->join('departamento', 'arquivo.ID_DEPARTAMENTO = departamento.ID_DEPARTAMENTO', 'left');
            $this->db->limit($registros_por_pagina);
            $this->db->offset((($pagina - 1) * $registros_por_pagina));
            $this->db->order_by($campo,$ord);
            $data['arquivos'] = $this->db->get()->result();
            // CONTAGEM DE PÁGINAS
            /*$this->db->like('TITULO_arquivo', $busca, 'both');
            $this->db->where('IND_SITUACAO_arquivo', 'A');
            $this->db->from('arquivo');*/
            $data['paginas'] = ceil($this->db->count_all_results()/$registros_por_pagina);
            if($data['paginas']<1)$data['paginas'] = 1;
            return $data;
        } else {
            header('Location: '.base_url().'login');
        }
    }

    public function mostrar_arquivos(){
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION['logado'])) {
            $this->db->select('arquivo.*, tipo_arquivo.TITULO_TIPO_ARQUIVO as TIPO_ARQUIVO, departamento.TITULO_DEPARTAMENTO');
            $this->db->where('arquivo.IND_SITUACAO_ARQUIVO', 'A');
            $this->db->where('arquivo.ID_DEPARTAMENTO <', 0);
            if (!$_SESSION['admin_master'] == True) {
                $this->db->or_where('arquivo.ID_DEPARTAMENTO', $_SESSION['departamento']);
            }
            $this->db->from('arquivo');
			$this->db->join('tipo_arquivo', 'arquivo.ID_TIPO_ARQUIVO = tipo_arquivo.ID_TIPO_ARQUIVO');
			$this->db->join('departamento', 'arquivo.ID_DEPARTAMENTO = departamento.ID_DEPARTAMENTO', 'left outer');
            $this->db->order_by('TITULO_DEPARTAMENTO', 'asc');
            $this->db->order_by('arquivo.ORDEM_ARQUIVO', 'asc');
            $data['arquivos'] = $this->db->get()->result();
            //return $data;
            return $this->db->last_query();
        } else {
            header('Location: '.base_url().'login');
        }
    }

    public function listar_arquivos_destaque(){
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION['logado'])) {
            $registros_de_destaque = 5;
            $this->db->select('*');
            $this->db->where('IND_SITUACAO_arquivo', 'A');
            $this->db->from('arquivo');
            $this->db->order_by('ID_ARQUIVO', 'desc');
            $this->db->limit($registros_de_destaque);
            $data['arquivos'] = $this->db->get()->result();
            return $data;
        } else {
            header('Location: '.base_url().'login');
        }
    }

    public function listar_arquivos_setor($idSetor){
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION['logado'])) {
            $this->db->select('TITULO_ARQUIVO');
            $this->db->where('IND_SITUACAO_arquivo', 'A');
            $this->db->where('ID_DEPARTAMENTO', $idSetor);
            $this->db->from('arquivo');
            $this->db->order_by('ORDEM_ARQUIVO', 'asc');
            $data = $this->db->get()->result();
            return $data;
        } else {
            header('Location: '.base_url().'login');
        }
    }

    public function listar_tipos(){
		if(!isset($_SESSION)){
			session_start();
		}
		if (isset($_SESSION['logado'])) {
			$this->db->select('*');
			$this->db->where('IND_SITUACAO_TIPO_ARQUIVO', 'A');
			$this->db->from('tipo_arquivo');
			$data['tipos_arquivo'] = $this->db->get()->result();

			return $data;
		} else {
			header('Location: '.base_url().'login');
		}
	}

    public function listar_dados_arquivo($id){
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION['logado'])) {

            $retorno = array();
            $retorno['existe'] = false;

            $this->db->select('a.*, d.TITULO_DEPARTAMENTO, t.TITULO_TIPO_ARQUIVO');
            $this->db->from('arquivo a');
            $this->db->join('departamento d', 'a.ID_DEPARTAMENTO=d.ID_DEPARTAMENTO', 'left outer');
            $this->db->join('tipo_arquivo t', 'a.ID_TIPO_ARQUIVO=t.ID_TIPO_ARQUIVO');
            $this->db->where('a.ID_ARQUIVO', $id);
            $this->db->order_by('a.ORDEM_ARQUIVO ASC');
            $data['arquivo'] = $this->db->get()->result();
            //return $this->db->last_query();
            return $data;
        } else {
            header('Location: '.base_url().'login');
        }
    }

    public function listar_arquivos_geral($busca){
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION['logado'])) {
            $retorno = array();
            $retorno['existe'] = false;

            $this->db->select('*');
            $this->db->from('arquivo');
            $this->db->like('TITULO_ARQUIVO', $busca);
            $this->db->order_by('ORDEM_ARQUIVO', 'DESC');
            $data = $this->db->get()->result();
            return $data;
            //return $_GET;
        } else {
            header('Location: '.base_url().'login');
        }
    }


    public function excluir_arquivo($vid){
        if(!isset($_SESSION)){ 
            session_start(); 
        }
        if (isset($_SESSION['logado'])) {
            $retorno = array();
            $retorno['excluiu'] = false;

            $id = strip_tags($vid);
            $id = stripcslashes($id);

            $this->db->where('id_arquivo', $id);

            if($this->db->delete('arquivo')){
                $retorno['excluiu'] = true;
            }
            return $retorno;
        }
    }

    // UPLOAD ARQUIVO
    public function upload_arquivo($arquivo, $tipo){
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION['logado'])) {
            date_default_timezone_set('America/Maceio');
            $retorno = array();
            $retorno['erro'] = '';
            $retorno['enviou'] = false;
            $filename = '';
            $nome_arquivo = '';
            if(!isset($tipo)) $tipo='';
            $pasta_dia = './uploads/arquivos/'.$tipo.'-'.date("Y-m-d").'/';
            if(!is_dir($pasta_dia)){
                mkdir($pasta_dia, 0777);                
            }

            $f_tempname = $arquivo['tmp_name'];
            $f_name = $arquivo['name'];
            $f_size = $arquivo['size'];
            $f_error = $arquivo['error'];
            if(isset($arquivo['type'])){
                $validextensions = array("jpg", "JPG", "jpeg", "JPEG", "png", "PNG", "bmp", "BMP", "gif", "GIF");
                $temporary = explode(".", $f_name);
                $file_extension = end($temporary);

                date_default_timezone_set("Brazil/East");
                $nome_arquivo = $f_name;
                $filename = $f_name; 
                $filename = str_replace(" ","_",preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities(trim($filename))));
                $filename = str_replace(",","",$filename);
                $filename = date("His")."-".$filename;
                $filepath = $pasta_dia.$filename;

                $retorno['nome_arquivo'] = $filename;

                // if (in_array($file_extension, $validextensions)){//Apenas arquivos válidos
                    if($f_size < 5000000){// 5Mb files can be uploaded.
                        if ($f_error > 0){
                            $retorno['erro'] = "Return Code: " . $f_error . "<br/><br/>";
                        } else{
                            if (file_exists($filepath)) {
                                $retorno['erro'] = $f_name . " já existe.";
                            } else{
                                $sourcePath = $f_tempname; // Storing source path of the file in a variable
                                $targetPath = $filepath; // Target path where file is to be stored
                                if (move_uploaded_file($sourcePath, $targetPath)) {
                                    $retorno['enviou'] = true;
                                    $retorno['filename'] = $filename;
                                    $retorno['caminho_arquivo'] = $filepath;
                                    // $data = array(
                                        // 'nome_arquivo_midia' => $filename,
                                        // 'caminho_arquivo_midia' => '/uploads/arquivos/'.date("Y-m-d").'/'.$filename
                                        // );
                                    // $this->db->insert('midia', $data);
                                    // $retorno['id_midia'] = $this->db->insert_id();
                                } else {
                                    $retorno['erro'] = "Falha ao enviar documento!";    
                                }
                            }
                        }
                    } else{
                        $retorno['erro'] = "O documento selecionado é muito grande!";    
                    }    
                // } else{
                //     $retorno['erro'] = "O arquivo selecionado não é um documento!";
                // }
            }
            return $retorno;
        } else {
            header('Location: '.base_url().'admin/login');
        }
    }

}

?>

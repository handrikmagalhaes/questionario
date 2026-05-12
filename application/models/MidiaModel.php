<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MidiaModel extends CI_model {
    public function cadastrar_midia($vtitulo, $vdescricao, $vtipo, $vnome, $vcaminho, $vsituacao){
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
            $nome = strip_tags($vnome);
            $nome = stripcslashes($nome);
            $caminho = strip_tags($vcaminho);
            $caminho = stripcslashes($caminho);
            $situacao = strip_tags($vsituacao);
            $situacao = stripcslashes($situacao);

            if($titulo != '' || $descricao != '' || $situacao != ''){
                $data = array(
                    'titulo_midia' => $titulo,
                    'descricao_midia' => $descricao,
                    'tipo_midia' => $tipo,
                    'nome_midia' => $nome,
                    'caminho_midia' => $caminho,
                    'ind_situacao_midia' => $situacao,
                    'dt_criacao' => date('Y-m-d'),
                    'hr_criacao' => date('H:i:s')
                    );
                if($this->db->insert('midia', $data)){
                    $retorno['inseriu'] = true;
                    $retorno['id_midia'] = $this->db->insert_id();
                }
            }       
            return $retorno;
        } else {
            header('Location: '.base_url().'login');
        }
    }   

    public function editar_midia($vid, $vtitulo, $vdescricao, $vtipo, $vnome, $vcaminho, $vsituacao){
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
            $nome = strip_tags($vnome);
            $nome = stripcslashes($nome);
            $caminho = strip_tags($vcaminho);
            $caminho = stripcslashes($caminho);
            $situacao = strip_tags($vsituacao);
            $situacao = stripcslashes($situacao);

            if($titulo != '' || $descricao != '' || $situacao != ''){
                $data = array(
                    'titulo_midia' => $titulo,
                    'descricao_midia' => $descricao,
                    'tipo_midia' => $tipo,
                    'nome_midia' => $nome,
                    'caminho_midia' => $caminho,
                    'ind_situacao_midia' => $situacao
                    );
                $this->db->where('id_midia', $id);
                if($this->db->update('midia', $data)){
                    $retorno['editou'] = true;
                }
            }       

            return $retorno;
        } else {
            header('Location: '.base_url().'login');
        }
    }   

    public function listar_midias(){
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
                    header('Location: '.base_url().'midia/lista/1//');
                }
             } else {
                header('Location: '.base_url().'midia/lista/1//');
            }
            if(isset($link[$GLOBALS['pos_parametro_lista']+1]))$busca = str_replace('%20', ' ', $link[$GLOBALS['pos_parametro_lista']+1]);
            $this->db->select('*');
            $this->db->like('NOME_MIDIA', $busca, 'both');
//            $this->db->where('IND_SITUACAO_MIDIA', 'A');
            $this->db->from('midia');
            $this->db->limit($registros_por_pagina);
            $this->db->offset((($pagina - 1) * $registros_por_pagina));
            $data['midias'] = $this->db->get()->result();
            // CONTAGEM DE PÁGINAS
            $this->db->like('NOME_MIDIA', $busca, 'both');
//            $this->db->where('IND_SITUACAO_midia', 'A');
            $this->db->from('midia');
            $data['paginas'] = ceil($this->db->count_all_results()/$registros_por_pagina);
            if($data['paginas']<1)$data['paginas'] = 1;
            return $data;
        } else {
            header('Location: '.base_url().'login');
        }
    }

    public function listar_midias_destaque(){
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION['logado'])) {
            $registros_de_destaque = 5;
            $this->db->select('*');
            $this->db->where('IND_SITUACAO_midia', 'A');
            $this->db->from('midia');
            $this->db->order_by('ID_midia', 'desc');
            $this->db->limit($registros_de_destaque);
            $data['midias'] = $this->db->get()->result();
            return $data;
        } else {
            header('Location: '.base_url().'login');
        }
    }

    public function listar_dados_midia($id){
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION['logado'])) {

            $retorno = array();
            $retorno['existe'] = false;

            $this->db->select('*');
            $this->db->from('midia');
            $this->db->where('id_midia', $id);
            $data['midia'] = $this->db->get()->result();
            
            return $data;
        } else {
            header('Location: '.base_url().'login');
        }
    }

    public function excluir_midia($vid, $varquivo){
        if(!isset($_SESSION)){ 
            session_start(); 
        }
        if (isset($_SESSION['logado'])) {
            $retorno = array();
            $retorno['excluiu'] = false;

            $id = strip_tags($vid);
            $id = stripcslashes($id);
			$arquivo = strip_tags($varquivo);
			$arquivo = stripcslashes($arquivo);

            $this->db->where('id_midia', $id);

            if($this->db->delete('midia')){
                $retorno['excluiu'] = true;
				$arquivo = str_replace('./../../../', '', $arquivo);
				unlink($arquivo);
            }
            return $retorno;
        } else {
			header('Location: '.base_url().'login');
		}
    }

    // UPLOAD MIDIA
    public function upload_midia($midia, $tipo){
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION['logado'])) {
            date_default_timezone_set('America/Maceio');
            $retorno = array();
            $retorno['erro'] = '';
            $retorno['enviou'] = false;
            $filename = '';
            $nome_midia = '';
            if(!isset($tipo)) $tipo='';
            $pasta_dia = './uploads/midias/'.$tipo.'-'.date("Y-m-d").'/';
            if(!is_dir($pasta_dia)){
                mkdir($pasta_dia, 0777);                
            }

            $f_tempname = $midia['tmp_name'];
            $f_name = $midia['name'];
            $f_size = $midia['size'];
            $f_error = $midia['error'];
            if(isset($midia['type'])){
                $validextensions = array("jpg", "JPG", "jpeg", "JPEG", "png", "PNG", "bmp", "BMP", "gif", "GIF");
                $temporary = explode(".", $f_name);
                $file_extension = end($temporary);

                date_default_timezone_set("Brazil/East");
                $nome_midia = $f_name;
                $filename = $f_name; 
                $filename = str_replace(" ","_",preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities(trim($filename))));
                $filename = str_replace(",","",$filename);
                $filename = date("His")."-".$filename;
                $filepath = $pasta_dia.$filename;

                $retorno['nome_midia'] = $filename;

                // if (in_array($file_extension, $validextensions)){//Apenas midias válidos
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
                                    $retorno['caminho_midia'] = $filepath;
                                    // $data = array(
                                        // 'nome_midia_midia' => $filename,
                                        // 'caminho_midia_midia' => '/uploads/midias/'.date("Y-m-d").'/'.$filename
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
                //     $retorno['erro'] = "O midia selecionado não é um documento!";
                // }
            }
            return $retorno;
        } else {
            header('Location: '.base_url().'login');
        }
    }

	public function upload_midias($arquivo){
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

			$pasta_dia = './uploads/midias/'.date("Y-m-d").'/';
			if(!is_dir($pasta_dia)){
				mkdir($pasta_dia, 0777);
			}

			$retorno['qtd_imagens'] = count($arquivo["name"]);
			for ($i=0; $i<count($arquivo['name']); $i++) {
				$f_tempname = $arquivo['tmp_name'][$i];
				$f_name = $arquivo['name'][$i];
				$f_size = $arquivo['size'][$i];
				$f_error = $arquivo['error'][$i];
				if(isset($arquivo['type'][$i])){
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

					$retorno[$i]['nome_arquivo'] = $filename;

					if (in_array($file_extension, $validextensions)){//Apenas arquivos válidos
						if($f_size < 5000000){// 5Mb files can be uploaded.
							if ($f_error > 0){
								$retorno[$i]['erro'] = "Return Code: " . $f_error . "<br/><br/>";
							} else{
								if (file_exists($filepath)) {
									$retorno[$i]['erro'] = $f_name . " já existe.";
								} else{
									$sourcePath = $f_tempname; // Storing source path of the file in a variable
									$targetPath = $filepath; // Target path where file is to be stored
									if (move_uploaded_file($sourcePath, $targetPath)) {
										$retorno[$i]['enviou'] = true;
										$retorno[$i]['filename'] = $filename;
										$retorno[$i]['caminho_arquivo'] = $filepath;
										$data = array(
											'NOME_MIDIA' => $filename,
											'CAMINHO_MIDIA' => '/uploads/midias/'.date("Y-m-d").'/'.$filename,
											'DT_CRIACAO' => date('Y-m-d'),
											'HR_CRIACAO' => date('H:i:s')
										);
										$this->db->insert('midia', $data);
										$retorno[$i]['id_midia'] = $this->db->insert_id();
									} else {
										$retorno[$i]['erro'] = "Falha ao enviar imagem!";
									}
								}
							}
						} else{
							$retorno[$i]['erro'] = "A imagem selecionada é muito grande!";
						}
					} else{
						$retorno[$i]['erro'] = "O arquivo selecionado não é uma imagem!";
					}
				}
			}
			return $retorno;
		} else {
			header('Location: '.base_url().'login');
		}
	}

	public function listar_midias_selecao($indice, $itens){
		if(!isset($_SESSION)){
			session_start();
		}
		if (isset($_SESSION['logado'])){// && $_SESSION['visualizar_midia']) {
			$retorno = array();
			$retorno['lista_midias'] = '';
			$btn_selecionar = '';
			$limit = $itens;
			$offset = $indice*$itens;
			$this->db->select('*');
			$this->db->from('midia');
			$this->db->order_by('id_midia', 'desc');
			$this->db->limit($limit, $offset);
			$data['midias'] = $this->db->get()->result();
			foreach ($data['midias'] as $midia) {
				$retorno['lista_midias'] .=
					'<div class="item-galeria position-relative"><div class="btns position-absolute"><a href="..'.$midia->caminho_arquivo_midia.'" class="btn btn-sm btn-primary rounded-0 lightbox" rel="galeria" title="'.$midia->nome_arquivo_midia.'"><i class="fa fa-eye"></i></a>'
					.'<button data-id-midia="'.$midia->id_midia.'" data-arquivo-midia="'.$midia->caminho_arquivo_midia.'" data-nome-arquivo="'.$midia->nome_arquivo_midia.'" class="btn btn-sm btn-secondary rounded-0 btn-selecionar">Selecionar</button>'
					.'</div><img src="..'.$midia->caminho_arquivo_midia.'" alt="'.$midia->nome_arquivo_midia.'"/>'
					.'</div>';
			}
			return $retorno;
		} else {
			header('Location: '.base_url().'login');
		}
	}

	public function listar_midias_multipla_selecao($indice, $itens){
		if(!isset($_SESSION)){
			session_start();
		}
		if (isset($_SESSION['logado'])){// && $_SESSION['visualizar_midia']) {
			$retorno = array();
			$retorno['lista_midias'] = '';
			$btn_selecionar = '';
			$limit = $itens;
			$offset = $indice*$itens;
			$this->db->select('*');
			$this->db->from('midia');
			$this->db->order_by('id_midia', 'desc');
			$this->db->limit($limit, $offset);
			$data['midias'] = $this->db->get()->result();
			foreach ($data['midias'] as $midia) {
				$retorno['lista_midias'] .=
					'<div class="item-galeria position-relative"><div class="btns position-absolute"><a href="..'.$midia->CAMINHO_MIDIA.'" class="btn btn-sm btn-primary rounded-0 lightbox" rel="galeria" title="'.$midia->NOME_MIDIA.'"><i class="fa fa-eye"></i></a>'
					.'<button data-id-midia="'.$midia->ID_MIDIA.'" data-arquivo-midia="'.$midia->CAMINHO_MIDIA.'" data-nome-arquivo="'.$midia->NOME_MIDIA.'" class="btn btn-sm btn-secondary rounded-0 btn-selecionar-midia-galeria">Inserir</button>'
					.'</div><img src="'.$midia->CAMINHO_MIDIA.'" alt="'.$midia->NOME_MIDIA.'"/>'
					.'</div>';
			}
			return $retorno;
		} else {
			header('Location: '.base_url().'login');
		}
	}

	public function qtd_midias(){
		if(!isset($_SESSION)){
			session_start();
		}
		if (isset($_SESSION['logado'])){// && $_SESSION['visualizar_midia']) {
			$retorno = array();
			$retorno['qtd_midias'] = 0;
			$this->db->select('*');
			$this->db->from('midia');
			$this->db->order_by('id_midia', 'desc');
			$data['midias'] = $this->db->get()->result();
			$retorno['qtd_midias'] = count($data['midias']);
			return $retorno;
		} else {
			header('Location: '.base_url().'login');
		}
	}

	// UPLOAD IMAGENS
	public function upload_arquivo($arquivo){
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

			$pasta_dia = './uploads/midias/'.date("Y-m-d").'/';
			if(!is_dir($pasta_dia)){
				mkdir($pasta_dia, 0777);
			}

			$retorno['qtd_imagens'] = count($arquivo["name"]);
			for ($i=0; $i<count($arquivo['name']); $i++) {
				$f_tempname = $arquivo['tmp_name'][$i];
				$f_name = $arquivo['name'][$i];
				$f_size = $arquivo['size'][$i];
				$f_error = $arquivo['error'][$i];
				if(isset($arquivo['type'][$i])){
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

					$retorno[$i]['nome_arquivo'] = $filename;

					if (in_array($file_extension, $validextensions)){//Apenas arquivos válidos
						if($f_size < 7000000){// 5Mb files can be uploaded.
							if ($f_error > 0){
								$retorno[$i]['erro'] = "Return Code: " . $f_error . "<br/><br/>";
							} else{
								if (file_exists($filepath)) {
									$retorno[$i]['erro'] = $f_name . " já existe.";
								} else{
									$sourcePath = $f_tempname; // Storing source path of the file in a variable
									$targetPath = $filepath; // Target path where file is to be stored
									if (move_uploaded_file($sourcePath, $targetPath)) {
										$retorno[$i]['enviou'] = true;
										$retorno[$i]['filename'] = $filename;
										$retorno[$i]['caminho_arquivo'] = $filepath;
										$data = array(
											'nome_arquivo_midia' => $filename,
											'caminho_arquivo_midia' => '/uploads/midias/'.date("Y-m-d").'/'.$filename
										);
										$this->db->insert('midia', $data);
										$retorno[$i]['id_midia'] = $this->db->insert_id();
									} else {
										$retorno[$i]['erro'] = "Falha ao enviar documento!";
									}
								}
							}
						} else{
							$retorno[$i]['erro'] = "O documento selecionado é muito grande!";
						}
					} else{
						$retorno[$i]['erro'] = "O arquivo selecionado não é um documento!";
					}
				}
			}
			return $retorno;
		} else {
			header('Location: '.base_url().'login');
		}
	}


}

?>

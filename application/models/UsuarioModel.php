<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuarioModel extends CI_model {
    public function cadastrar_usuario($vid_nivel_acesso, $vid_cargo, $vid_departamento, $vchefia, $vnome, $vdt_nascimento, $vtelefone, $vcelular, $vcelular_corporativo, $vemail, $vlogin, $vsenha, $vnome_arquivo, $vcaminho_arquivo, $vsituacao, $vendereco, $vbairro, $vcomplemento, $vcidade, $vestado, $vcep, $vnum_cart_trab, $vdt_exp_cart_trab, $vserie_cart_trab, $vuf_cart_trab, $vcpf, $vnum_identidade, $vdt_exp_identidade, $vorgao_exp_identidade, $vuf_identidade, $vnum_cert_militar, $vnum_tit_eleitor, $vzona_tit_eleitor, $vsecao_tit_eleitor, $vnum_cnh, $vcategoria_cnh, $vvalidade_cnh, $vnome_orgao_classe, $vnum_orgao_classe, $vvalidade_orgao_classe, $vnum_pis, $vbanco_pis, $vdt_cadastro_pis, $vnome_pai, $vnome_mae, $vgrau_escolaridade, $vnaturalidade, $vnacionalidade, $vestado_civil, $vsexo, $vnome_conjuge, $vdt_nasc_conjuge, $vramal, $vcarga_horaria, $vhorario_expediente, $vnome_contato_emergencia, $vtelefone_contato_emergencia, $vplano_saude, $vemail_corporativo, $vdt_admissao, $vdt_demissao, $vnome_contato_emergencia_2, $vnome_contato_emergencia_3, $vnome_contato_emergencia_4, $vnome_contato_emergencia_5, $vtelefone_contato_emergencia_2, $vtelefone_contato_emergencia_3, $vtelefone_contato_emergencia_4, $vtelefone_contato_emergencia_5, $vnome_filho_1, $vnome_filho_2, $vnome_filho_3, $vnome_filho_4, $vnome_filho_5, $vdt_nascimento_filho_1, $vdt_nascimento_filho_2, $vdt_nascimento_filho_3, $vdt_nascimento_filho_4, $vdt_nascimento_filho_5){
        if(!isset($_SESSION)){ 
            session_start(); 
        }
        if (isset($_SESSION['logado'])) {
            setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
            date_default_timezone_set('America/Maceio');
            $retorno = array();
            $retorno['inseriu'] = false;
            // LIMPA DADOS
            $id_nivel_acesso = strip_tags($vid_nivel_acesso);
            $id_nivel_acesso = stripcslashes($id_nivel_acesso);
            $id_cargo = strip_tags($vid_cargo);
            $id_cargo = stripcslashes($id_cargo);
            $id_departamento = strip_tags($vid_departamento);
            $id_departamento = stripcslashes($id_departamento);
			if ($vchefia){
				$chefia = 1;
			} else {
				$chefia = 0;
			}
            $nome = strip_tags($vnome);
            $nome = stripcslashes($nome);
            $dt_nascimento = strip_tags($vdt_nascimento);
            $dt_nascimento = stripcslashes($dt_nascimento);
            $telefone = strip_tags($vtelefone);
            $telefone = stripcslashes($telefone);
			$celular = strip_tags($vcelular);
			$celular = stripcslashes($celular);
			$celular_corporativo = strip_tags($vcelular_corporativo);
			$celular_corporativo = stripcslashes($celular_corporativo);
            $email = strip_tags($vemail);
            $email = stripcslashes($email);
            $login = strip_tags($vlogin);
            $login = stripcslashes($login);
            $senha = strip_tags($vsenha);
            $senha = stripcslashes($senha);
            $nome_arquivo = strip_tags($vnome_arquivo);
            $nome_arquivo = stripcslashes($nome_arquivo);
            $caminho_arquivo = strip_tags($vcaminho_arquivo);
            $caminho_arquivo = stripcslashes($caminho_arquivo);
            $situacao = strip_tags($vsituacao);
            $situacao = stripcslashes($situacao);
			$endereco = strip_tags($vendereco);
			$endereco = stripcslashes($endereco);
			$bairro = strip_tags($vbairro);
			$bairro = stripcslashes($bairro);
			$complemento = strip_tags($vcomplemento);
			$complemento = stripcslashes($complemento);
			$cidade = strip_tags($vcidade);
			$cidade = stripcslashes($cidade);
			$estado = strip_tags($vestado);
			$estado = stripcslashes($estado);
			$cep = strip_tags($vcep);
			$cep = stripcslashes($cep);
			$num_cart_trab = strip_tags($vnum_cart_trab);
			$num_cart_trab = stripcslashes($num_cart_trab);
			$dt_exp_cart_trab = strip_tags($vdt_exp_cart_trab);
			$dt_exp_cart_trab = stripcslashes($dt_exp_cart_trab);
			$serie_cart_trab = strip_tags($vserie_cart_trab);
			$serie_cart_trab = stripcslashes($serie_cart_trab);
			$uf_cart_trab = strip_tags($vuf_cart_trab);
			$uf_cart_trab = stripcslashes($uf_cart_trab);
			$cpf = strip_tags($vcpf);
			$cpf = stripcslashes($cpf);
			$num_identidade = strip_tags($vnum_identidade);
			$num_identidade = stripcslashes($num_identidade);
			$dt_exp_identidade = strip_tags($vdt_exp_identidade);
			$dt_exp_identidade = stripcslashes($dt_exp_identidade);
			$orgao_exp_identidade = strip_tags($vorgao_exp_identidade);
			$orgao_exp_identidade = stripcslashes($orgao_exp_identidade);
			$uf_identidade = strip_tags($vuf_identidade);
			$uf_identidade = stripcslashes($uf_identidade);
            $num_cert_militar = strip_tags($vnum_cert_militar);
            $num_cert_militar = stripcslashes($num_cert_militar);
            $num_tit_eleitor = strip_tags($vnum_tit_eleitor);
            $num_tit_eleitor = stripcslashes($num_tit_eleitor);
            $zona_tit_eleitor = strip_tags($vzona_tit_eleitor);
            $zona_tit_eleitor = stripcslashes($zona_tit_eleitor);
            $secao_tit_eleitor = strip_tags($vsecao_tit_eleitor);
            $secao_tit_eleitor = stripcslashes($secao_tit_eleitor);
            $num_cnh = strip_tags($vnum_cnh);
            $num_cnh = stripcslashes($num_cnh);
            $categoria_cnh = strip_tags($vcategoria_cnh);
            $categoria_cnh = stripcslashes($categoria_cnh);
            $validade_cnh = strip_tags($vvalidade_cnh);
            $validade_cnh = stripcslashes($validade_cnh);
			$nome_orgao_classe = strip_tags($vnome_orgao_classe);
			$nome_orgao_classe = stripcslashes($nome_orgao_classe);
			$num_orgao_classe = strip_tags($vnum_orgao_classe);
			$num_orgao_classe = stripcslashes($num_orgao_classe);
			$validade_orgao_classe = strip_tags($vvalidade_orgao_classe);
			$validade_orgao_classe = stripcslashes($validade_orgao_classe);
			$num_pis = strip_tags($vnum_pis);
			$num_pis = stripcslashes($num_pis);
			$banco_pis = strip_tags($vbanco_pis);
			$banco_pis = stripcslashes($banco_pis);
			$dt_cadastro_pis = strip_tags($vdt_cadastro_pis);
			$dt_cadastro_pis = stripcslashes($dt_cadastro_pis);
			$nome_pai = strip_tags($vnome_pai);
			$nome_pai = stripcslashes($nome_pai);
			$nome_mae = strip_tags($vnome_mae);
			$nome_mae = stripcslashes($nome_mae);
			$grau_escolaridade = strip_tags($vgrau_escolaridade);
			$grau_escolaridade = stripcslashes($grau_escolaridade);
			$naturalidade = strip_tags($vnaturalidade);
			$naturalidade = stripcslashes($naturalidade);
			$nacionalidade = strip_tags($vnacionalidade);
			$nacionalidade = stripcslashes($nacionalidade);
			$estado_civil = strip_tags($vestado_civil);
			$estado_civil = stripcslashes($estado_civil);
			$sexo = strip_tags($vsexo);
			$sexo = stripcslashes($sexo);
			$nome_conjuge = strip_tags($vnome_conjuge);
			$nome_conjuge = stripcslashes($nome_conjuge);
			$dt_nasc_conjuge = strip_tags($vdt_nasc_conjuge);
			$dt_nasc_conjuge = stripcslashes($dt_nasc_conjuge);
			$ramal = strip_tags($vramal);
			$ramal = stripcslashes($ramal);
			$carga_horaria = strip_tags($vcarga_horaria);
			$carga_horaria = stripcslashes($carga_horaria);
			$horario_expediente = strip_tags($vhorario_expediente);
			$horario_expediente = stripcslashes($horario_expediente);
			$nome_contato_emergencia = strip_tags($vnome_contato_emergencia);
			$nome_contato_emergencia = stripcslashes($nome_contato_emergencia);
			$telefone_contato_emergencia = strip_tags($vtelefone_contato_emergencia);
			$telefone_contato_emergencia = stripcslashes($telefone_contato_emergencia);
			$plano_saude = strip_tags($vplano_saude);
			$plano_saude = stripcslashes($plano_saude);
			$email_corporativo = strip_tags($vemail_corporativo);
			$email_corporativo = stripcslashes($email_corporativo);
			$dt_admissao = strip_tags($vdt_admissao);
			$dt_admissao = stripcslashes($dt_admissao);
			$dt_demissao = strip_tags($vdt_demissao);
			$dt_demissao = stripcslashes($dt_demissao);
			$nome_contato_emergencia_2 = strip_tags($vnome_contato_emergencia_2);
			$nome_contato_emergencia_2 = stripcslashes($nome_contato_emergencia_2);
			$nome_contato_emergencia_3 = strip_tags($vnome_contato_emergencia_3);
			$nome_contato_emergencia_3 = stripcslashes($nome_contato_emergencia_3);
			$nome_contato_emergencia_4 = strip_tags($vnome_contato_emergencia_4);
			$nome_contato_emergencia_4 = stripcslashes($nome_contato_emergencia_4);
			$nome_contato_emergencia_5 = strip_tags($vnome_contato_emergencia_5);
			$nome_contato_emergencia_5 = stripcslashes($nome_contato_emergencia_5);
			$telefone_contato_emergencia_2 = strip_tags($vtelefone_contato_emergencia_2);
			$telefone_contato_emergencia_2 = stripcslashes($telefone_contato_emergencia_2);
			$telefone_contato_emergencia_3 = strip_tags($vtelefone_contato_emergencia_3);
			$telefone_contato_emergencia_3 = stripcslashes($telefone_contato_emergencia_3);
			$telefone_contato_emergencia_4 = strip_tags($vtelefone_contato_emergencia_4);
			$telefone_contato_emergencia_4 = stripcslashes($telefone_contato_emergencia_4);
			$telefone_contato_emergencia_5 = strip_tags($vtelefone_contato_emergencia_5);
			$telefone_contato_emergencia_5 = stripcslashes($telefone_contato_emergencia_5);
			$nome_filho_1 = strip_tags($vnome_filho_1);
			$nome_filho_1 = stripcslashes($nome_filho_1);
			$nome_filho_2 = strip_tags($vnome_filho_2);
			$nome_filho_2 = stripcslashes($nome_filho_2);
			$nome_filho_3 = strip_tags($vnome_filho_3);
			$nome_filho_3 = stripcslashes($nome_filho_3);
			$nome_filho_4 = strip_tags($vnome_filho_4);
			$nome_filho_4 = stripcslashes($nome_filho_4);
			$nome_filho_5 = strip_tags($vnome_filho_5);
			$nome_filho_5 = stripcslashes($nome_filho_5);
			$dt_nascimento_filho_1 = strip_tags($vdt_nascimento_filho_1);
			$dt_nascimento_filho_1 = stripcslashes($dt_nascimento_filho_1);
			$dt_nascimento_filho_2 = strip_tags($vdt_nascimento_filho_2);
			$dt_nascimento_filho_2 = stripcslashes($dt_nascimento_filho_2);
			$dt_nascimento_filho_3 = strip_tags($vdt_nascimento_filho_3);
			$dt_nascimento_filho_3 = stripcslashes($dt_nascimento_filho_3);
			$dt_nascimento_filho_4 = strip_tags($vdt_nascimento_filho_4);
			$dt_nascimento_filho_4 = stripcslashes($dt_nascimento_filho_4);
			$dt_nascimento_filho_5 = strip_tags($vdt_nascimento_filho_5);
			$dt_nascimento_filho_5 = stripcslashes($dt_nascimento_filho_5);

            if($nome != '' || $email != '' || $senha != '' || $situacao != ''){
                $data = array(
                    'id_nivel_acesso' => $id_nivel_acesso,
                    'id_cargo' => $id_cargo,
                    'id_departamento' => $id_departamento,
					'ind_chefia' => $chefia,
                    'nome_usuario' => $nome,
                    'dt_nascimento_usuario' => $dt_nascimento,
                    'telefone_usuario' => $telefone,
					'celular_usuario' => $celular,
					'celular_corporativo_usuario' => $celular_corporativo,
                    'email_usuario' => $email,
                    'login_usuario' => $login,
                    'senha_usuario' => $senha,
                    'nome_foto_usuario' => $nome_arquivo,
                    'caminho_foto_usuario' => $caminho_arquivo,
					'ind_situacao_usuario' => $situacao,
                    'endereco_usuario' => $endereco,
					'complemento_usuario' => $complemento,
					'bairro_usuario' => $bairro,
					'cidade_usuario' => $cidade,
					'estado_usuario' => $estado,
					'cep_usuario' => $cep,
					'num_cart_trab_usuario' => $num_cart_trab,
					'dt_exp_cart_trab_usuario' => $dt_exp_cart_trab,
					'serie_cart_trab_usuario' => $serie_cart_trab,
					'uf_cart_trab_usuario' => $uf_cart_trab,
					'cpf_usuario' => $cpf,
					'num_identidade_usuario' => $num_identidade,
					'dt_exp_identidade_usuario' => $dt_exp_identidade,
					'orgao_exp_identidade_usuario' => $orgao_exp_identidade,
					'uf_identidade_usuario' => $uf_identidade,
                    'num_cert_militar_usuario' => $num_cert_militar,
                    'num_tit_eleitor_usuario' => $num_tit_eleitor,
                    'zona_tit_eleitor_usuario' => $zona_tit_eleitor,
                    'secao_tit_eleitor_usuario' => $secao_tit_eleitor,
                    'num_cnh_usuario' => $num_cnh,
                    'categoria_cnh_usuario' => $categoria_cnh,
                    'validade_cnh_usuario' => $validade_cnh,
					'nome_orgao_classe_usuario' => $nome_orgao_classe,
					'num_orgao_classe_usuario' => $num_orgao_classe,
					'validade_orgao_classe_usuario' => $validade_orgao_classe,
					'num_pis_usuario' => $num_pis,
					'banco_pis_usuario' => $banco_pis,
					'dt_cadastro_pis_usuario' => $dt_cadastro_pis,
					'nome_pai_usuario' => $nome_pai,
					'nome_mae_usuario' => $nome_mae,
					'grau_escolaridade_usuario' => $grau_escolaridade,
					'naturalidade_usuario' => $naturalidade,
					'nacionalidade_usuario' => $nacionalidade,
					'estado_civil_usuario' => $estado_civil,
					'sexo_usuario' => $sexo,
					'nome_conjuge_usuario' => $nome_conjuge,
					'dt_nasc_conjuge_usuario' => $dt_nasc_conjuge,
					'ramal_usuario' => $ramal,
					'carga_horaria_usuario' => $carga_horaria,
					'horario_expediente_usuario' => $horario_expediente,
					'nome_contato_emergencia_usuario' => $nome_contato_emergencia,
					'telefone_contato_emergencia_usuario' => $telefone_contato_emergencia,
					'plano_saude_usuario' => $plano_saude,
					'email_corporativo_usuario' => $email_corporativo,
					'dt_admissao_usuario' => $dt_admissao,
					'dt_demissao_usuario' => $dt_demissao,
					'nome_contato_emergencia_2_usuario' => $nome_contato_emergencia_2,
					'nome_contato_emergencia_3_usuario' => $nome_contato_emergencia_3,
					'nome_contato_emergencia_4_usuario' => $nome_contato_emergencia_4,
					'nome_contato_emergencia_5_usuario' => $nome_contato_emergencia_5,
					'telefone_contato_emergencia_2_usuario' => $telefone_contato_emergencia_2,
					'telefone_contato_emergencia_3_usuario' => $telefone_contato_emergencia_3,
					'telefone_contato_emergencia_4_usuario' => $telefone_contato_emergencia_4,
					'telefone_contato_emergencia_5_usuario' => $telefone_contato_emergencia_5,
					'nome_filho_1_usuario' => $nome_filho_1,
					'nome_filho_2_usuario' => $nome_filho_2,
					'nome_filho_3_usuario' => $nome_filho_3,
					'nome_filho_4_usuario' => $nome_filho_4,
					'nome_filho_5_usuario' => $nome_filho_5,
					'dt_nascimento_filho_1_usuario' => $dt_nascimento_filho_1,
					'dt_nascimento_filho_2_usuario' => $dt_nascimento_filho_2,
					'dt_nascimento_filho_3_usuario' => $dt_nascimento_filho_3,
					'dt_nascimento_filho_4_usuario' => $dt_nascimento_filho_4,
					'dt_nascimento_filho_5_usuario' => $dt_nascimento_filho_5,
                    'dt_criacao' => date('Y-m-d'),
                    'hr_criacao' => date('H:i:s')
                    );
                if($this->db->insert('usuario', $data)){
                    $retorno['inseriu'] = true;
                    $retorno['id_usuario'] = $this->db->insert_id();
                }
            }       
            return $retorno;
        } else {
            header('Location: '.base_url().'login');
        }
    }   

    public function editar_usuario($vid, $vid_nivel_acesso, $vid_cargo, $vid_departamento, $vchefia, $vnome, $vdt_nascimento, $vtelefone, $vcelular, $vcelular_corporativo, $vemail, $vlogin, $vnome_arquivo, $vcaminho_arquivo, $vsituacao, $vendereco, $vbairro, $vcomplemento, $vcidade, $vestado, $vcep, $vnum_cart_trab, $vdt_exp_cart_trab, $vserie_cart_trab, $vuf_cart_trab, $vcpf, $vnum_identidade, $vdt_exp_identidade, $vorgao_exp_identidade, $vuf_identidade, $vnum_cert_militar, $vnum_tit_eleitor, $vzona_tit_eleitor, $vsecao_tit_eleitor, $vnum_cnh, $vcategoria_cnh, $vvalidade_cnh, $vnome_orgao_classe, $vnum_orgao_classe, $vvalidade_orgao_classe, $vnum_pis, $vbanco_pis, $vdt_cadastro_pis, $vnome_pai, $vnome_mae, $vgrau_escolaridade, $vnaturalidade, $vnacionalidade, $vestado_civil, $vsexo, $vnome_conjuge, $vdt_nasc_conjuge, $vramal, $vcarga_horaria, $vhorario_expediente, $vnome_contato_emergencia, $vtelefone_contato_emergencia, $vplano_saude, $vemail_corporativo, $vdt_admissao, $vdt_demissao, $vnome_contato_emergencia_2, $vnome_contato_emergencia_3, $vnome_contato_emergencia_4, $vnome_contato_emergencia_5, $vtelefone_contato_emergencia_2, $vtelefone_contato_emergencia_3, $vtelefone_contato_emergencia_4, $vtelefone_contato_emergencia_5, $vnome_filho_1, $vnome_filho_2, $vnome_filho_3, $vnome_filho_4, $vnome_filho_5, $vdt_nascimento_filho_1, $vdt_nascimento_filho_2, $vdt_nascimento_filho_3, $vdt_nascimento_filho_4, $vdt_nascimento_filho_5){
        if(!isset($_SESSION)){ 
            session_start(); 
        }
        if (isset($_SESSION['logado'])) {
            $retorno = array();
            $retorno['editou'] = false;
            // LIMPA DADOS
            $id = strip_tags($vid);
            $id = stripcslashes($id);
            $id_nivel_acesso = strip_tags($vid_nivel_acesso);
            $id_nivel_acesso = stripcslashes($id_nivel_acesso);
            $id_cargo = strip_tags($vid_cargo);
            $id_cargo = stripcslashes($id_cargo);
            $id_departamento = strip_tags($vid_departamento);
            $id_departamento = stripcslashes($id_departamento);
			if ($vchefia){
				$chefia = 1;
			} else {
				$chefia = 0;
			}
            $nome = strip_tags($vnome);
            $nome = stripcslashes($nome);
            $dt_nascimento = strip_tags($vdt_nascimento);
            $dt_nascimento = stripcslashes($dt_nascimento);
            $telefone = strip_tags($vtelefone);
            $telefone = stripcslashes($telefone);
			$celular = strip_tags($vcelular);
			$celular = stripcslashes($celular);
			$celular_corporativo = strip_tags($vcelular_corporativo);
			$celular_corporativo = stripcslashes($celular_corporativo);
            $email = strip_tags($vemail);
            $email = stripcslashes($email);
            $login = strip_tags($vlogin);
            $login = stripcslashes($login);
            $nome_arquivo = strip_tags($vnome_arquivo);
            $nome_arquivo = stripcslashes($nome_arquivo);
            $caminho_arquivo = strip_tags($vcaminho_arquivo);
            $caminho_arquivo = stripcslashes($caminho_arquivo);
            $situacao = strip_tags($vsituacao);
            $situacao = stripcslashes($situacao);
			$endereco = strip_tags($vendereco);
			$endereco = stripcslashes($endereco);
			$bairro = strip_tags($vbairro);
			$bairro = stripcslashes($bairro);
			$complemento = strip_tags($vcomplemento);
			$complemento = stripcslashes($complemento);
			$cidade = strip_tags($vcidade);
			$cidade = stripcslashes($cidade);
			$estado = strip_tags($vestado);
			$estado = stripcslashes($estado);
			$cep = strip_tags($vcep);
			$cep = stripcslashes($cep);
			$num_cart_trab = strip_tags($vnum_cart_trab);
			$num_cart_trab = stripcslashes($num_cart_trab);
			$dt_exp_cart_trab = strip_tags($vdt_exp_cart_trab);
			$dt_exp_cart_trab = stripcslashes($dt_exp_cart_trab);
			$serie_cart_trab = strip_tags($vserie_cart_trab);
			$serie_cart_trab = stripcslashes($serie_cart_trab);
			$uf_cart_trab = strip_tags($vuf_cart_trab);
			$uf_cart_trab = stripcslashes($uf_cart_trab);
			$cpf = strip_tags($vcpf);
			$cpf = stripcslashes($cpf);
			$num_identidade = strip_tags($vnum_identidade);
			$num_identidade = stripcslashes($num_identidade);
			$dt_exp_identidade = strip_tags($vdt_exp_identidade);
			$dt_exp_identidade = stripcslashes($dt_exp_identidade);
			$orgao_exp_identidade = strip_tags($vorgao_exp_identidade);
			$orgao_exp_identidade = stripcslashes($orgao_exp_identidade);
			$uf_identidade = strip_tags($vuf_identidade);
			$uf_identidade = stripcslashes($uf_identidade);
            $num_cert_militar = strip_tags($vnum_cert_militar);
            $num_cert_militar = stripcslashes($num_cert_militar);
            $num_tit_eleitor = strip_tags($vnum_tit_eleitor);
            $num_tit_eleitor = stripcslashes($num_tit_eleitor);
            $zona_tit_eleitor = strip_tags($vzona_tit_eleitor);
            $zona_tit_eleitor = stripcslashes($zona_tit_eleitor);
            $secao_tit_eleitor = strip_tags($vsecao_tit_eleitor);
            $secao_tit_eleitor = stripcslashes($secao_tit_eleitor);
            $num_cnh = strip_tags($vnum_cnh);
            $num_cnh = stripcslashes($num_cnh);
            $categoria_cnh = strip_tags($vcategoria_cnh);
            $categoria_cnh = stripcslashes($categoria_cnh);
            $validade_cnh = strip_tags($vvalidade_cnh);
            $validade_cnh = stripcslashes($validade_cnh);
			$nome_orgao_classe = strip_tags($vnome_orgao_classe);
			$nome_orgao_classe = stripcslashes($nome_orgao_classe);
			$num_orgao_classe = strip_tags($vnum_orgao_classe);
			$num_orgao_classe = stripcslashes($num_orgao_classe);
			$validade_orgao_classe = strip_tags($vvalidade_orgao_classe);
			$validade_orgao_classe = stripcslashes($validade_orgao_classe);
			$num_pis = strip_tags($vnum_pis);
			$num_pis = stripcslashes($num_pis);
			$banco_pis = strip_tags($vbanco_pis);
			$banco_pis = stripcslashes($banco_pis);
			$dt_cadastro_pis = strip_tags($vdt_cadastro_pis);
			$dt_cadastro_pis = stripcslashes($dt_cadastro_pis);
			$nome_pai = strip_tags($vnome_pai);
			$nome_pai = stripcslashes($nome_pai);
			$nome_mae = strip_tags($vnome_mae);
			$nome_mae = stripcslashes($nome_mae);
			$grau_escolaridade = strip_tags($vgrau_escolaridade);
			$grau_escolaridade = stripcslashes($grau_escolaridade);
			$naturalidade = strip_tags($vnaturalidade);
			$naturalidade = stripcslashes($naturalidade);
			$nacionalidade = strip_tags($vnacionalidade);
			$nacionalidade = stripcslashes($nacionalidade);
			$estado_civil = strip_tags($vestado_civil);
			$estado_civil = stripcslashes($estado_civil);
			$sexo = strip_tags($vsexo);
			$sexo = stripcslashes($sexo);
			$nome_conjuge = strip_tags($vnome_conjuge);
			$nome_conjuge = stripcslashes($nome_conjuge);
			$dt_nasc_conjuge = strip_tags($vdt_nasc_conjuge);
			$dt_nasc_conjuge = stripcslashes($dt_nasc_conjuge);
			$ramal = strip_tags($vramal);
			$ramal = stripcslashes($ramal);
			$carga_horaria = strip_tags($vcarga_horaria);
			$carga_horaria = stripcslashes($carga_horaria);
			$horario_expediente = strip_tags($vhorario_expediente);
			$horario_expediente = stripcslashes($horario_expediente);
			$nome_contato_emergencia = strip_tags($vnome_contato_emergencia);
			$nome_contato_emergencia = stripcslashes($nome_contato_emergencia);
			$telefone_contato_emergencia = strip_tags($vtelefone_contato_emergencia);
			$telefone_contato_emergencia = stripcslashes($telefone_contato_emergencia);
			$plano_saude = strip_tags($vplano_saude);
			$plano_saude = stripcslashes($plano_saude);
			$email_corporativo = strip_tags($vemail_corporativo);
			$email_corporativo = stripcslashes($email_corporativo);
			$dt_admissao = strip_tags($vdt_admissao);
			$dt_admissao = stripcslashes($dt_admissao);
			$dt_demissao = strip_tags($vdt_demissao);
			$dt_demissao = stripcslashes($dt_demissao);
			$nome_contato_emergencia_2 = strip_tags($vnome_contato_emergencia_2);
			$nome_contato_emergencia_2 = stripcslashes($nome_contato_emergencia_2);
			$nome_contato_emergencia_3 = strip_tags($vnome_contato_emergencia_3);
			$nome_contato_emergencia_3 = stripcslashes($nome_contato_emergencia_3);
			$nome_contato_emergencia_4 = strip_tags($vnome_contato_emergencia_4);
			$nome_contato_emergencia_4 = stripcslashes($nome_contato_emergencia_4);
			$nome_contato_emergencia_5 = strip_tags($vnome_contato_emergencia_5);
			$nome_contato_emergencia_5 = stripcslashes($nome_contato_emergencia_5);
			$telefone_contato_emergencia_2 = strip_tags($vtelefone_contato_emergencia_2);
			$telefone_contato_emergencia_2 = stripcslashes($telefone_contato_emergencia_2);
			$telefone_contato_emergencia_3 = strip_tags($vtelefone_contato_emergencia_3);
			$telefone_contato_emergencia_3 = stripcslashes($telefone_contato_emergencia_3);
			$telefone_contato_emergencia_4 = strip_tags($vtelefone_contato_emergencia_4);
			$telefone_contato_emergencia_4 = stripcslashes($telefone_contato_emergencia_4);
			$telefone_contato_emergencia_5 = strip_tags($vtelefone_contato_emergencia_5);
			$telefone_contato_emergencia_5 = stripcslashes($telefone_contato_emergencia_5);
			$nome_filho_1 = strip_tags($vnome_filho_1);
			$nome_filho_1 = stripcslashes($nome_filho_1);
			$nome_filho_2 = strip_tags($vnome_filho_2);
			$nome_filho_2 = stripcslashes($nome_filho_2);
			$nome_filho_3 = strip_tags($vnome_filho_3);
			$nome_filho_3 = stripcslashes($nome_filho_3);
			$nome_filho_4 = strip_tags($vnome_filho_4);
			$nome_filho_4 = stripcslashes($nome_filho_4);
			$nome_filho_5 = strip_tags($vnome_filho_5);
			$nome_filho_5 = stripcslashes($nome_filho_5);
			$dt_nascimento_filho_1 = strip_tags($vdt_nascimento_filho_1);
			$dt_nascimento_filho_1 = stripcslashes($dt_nascimento_filho_1);
			$dt_nascimento_filho_2 = strip_tags($vdt_nascimento_filho_2);
			$dt_nascimento_filho_2 = stripcslashes($dt_nascimento_filho_2);
			$dt_nascimento_filho_3 = strip_tags($vdt_nascimento_filho_3);
			$dt_nascimento_filho_3 = stripcslashes($dt_nascimento_filho_3);
			$dt_nascimento_filho_4 = strip_tags($vdt_nascimento_filho_4);
			$dt_nascimento_filho_4 = stripcslashes($dt_nascimento_filho_4);
			$dt_nascimento_filho_5 = strip_tags($vdt_nascimento_filho_5);
			$dt_nascimento_filho_5 = stripcslashes($dt_nascimento_filho_5);

            if($nome != '' || $email != '' || $situacao != ''){
                $data = array(
                    'id_nivel_acesso' => $id_nivel_acesso,
                    'id_cargo' => $id_cargo,
                    'id_departamento' => $id_departamento,
					'ind_chefia' => $chefia,
                    'nome_usuario' => $nome,
                    'dt_nascimento_usuario' => $dt_nascimento,
                    'telefone_usuario' => $telefone,
					'celular_usuario' => $celular,
					'celular_corporativo_usuario' => $celular_corporativo,
					'email_usuario' => $email,
                    'login_usuario' => $login,
                    'nome_foto_usuario' => $nome_arquivo,
                    'caminho_foto_usuario' => $caminho_arquivo,
                    'ind_situacao_usuario' => $situacao,
					'endereco_usuario' => $endereco,
					'complemento_usuario' => $complemento,
					'bairro_usuario' => $bairro,
					'cidade_usuario' => $cidade,
					'estado_usuario' => $estado,
					'cep_usuario' => $cep,
					'num_cart_trab_usuario' => $num_cart_trab,
					'dt_exp_cart_trab_usuario' => $dt_exp_cart_trab,
					'serie_cart_trab_usuario' => $serie_cart_trab,
					'uf_cart_trab_usuario' => $uf_cart_trab,
					'cpf_usuario' => $cpf,
					'num_identidade_usuario' => $num_identidade,
					'dt_exp_identidade_usuario' => $dt_exp_identidade,
					'orgao_exp_identidade_usuario' => $orgao_exp_identidade,
					'uf_identidade_usuario' => $uf_identidade,
                    'num_cert_militar_usuario' => $num_cert_militar,
                    'num_tit_eleitor_usuario' => $num_tit_eleitor,
                    'zona_tit_eleitor_usuario' => $zona_tit_eleitor,
                    'secao_tit_eleitor_usuario' => $secao_tit_eleitor,
                    'num_cnh_usuario' => $num_cnh,
                    'categoria_cnh_usuario' => $categoria_cnh,
                    'validade_cnh_usuario' => $validade_cnh,
					'nome_orgao_classe_usuario' => $nome_orgao_classe,
					'num_orgao_classe_usuario' => $num_orgao_classe,
					'validade_orgao_classe_usuario' => $validade_orgao_classe,
					'num_pis_usuario' => $num_pis,
					'banco_pis_usuario' => $banco_pis,
					'dt_cadastro_pis_usuario' => $dt_cadastro_pis,
					'nome_pai_usuario' => $nome_pai,
					'nome_mae_usuario' => $nome_mae,
					'grau_escolaridade_usuario' => $grau_escolaridade,
					'naturalidade_usuario' => $naturalidade,
					'nacionalidade_usuario' => $nacionalidade,
					'estado_civil_usuario' => $estado_civil,
					'sexo_usuario' => $sexo,
					'nome_conjuge_usuario' => $nome_conjuge,
					'dt_nasc_conjuge_usuario' => $dt_nasc_conjuge,
					'ramal_usuario' => $ramal,
					'carga_horaria_usuario' => $carga_horaria,
					'horario_expediente_usuario' => $horario_expediente,
					'nome_contato_emergencia_usuario' => $nome_contato_emergencia,
					'telefone_contato_emergencia_usuario' => $telefone_contato_emergencia,
					'plano_saude_usuario' => $plano_saude,
					'email_corporativo_usuario' => $email_corporativo,
					'dt_admissao_usuario' => $dt_admissao,
					'dt_demissao_usuario' => $dt_demissao,
					'nome_contato_emergencia_2_usuario' => $nome_contato_emergencia_2,
					'nome_contato_emergencia_3_usuario' => $nome_contato_emergencia_3,
					'nome_contato_emergencia_4_usuario' => $nome_contato_emergencia_4,
					'nome_contato_emergencia_5_usuario' => $nome_contato_emergencia_5,
					'telefone_contato_emergencia_2_usuario' => $telefone_contato_emergencia_2,
					'telefone_contato_emergencia_3_usuario' => $telefone_contato_emergencia_3,
					'telefone_contato_emergencia_4_usuario' => $telefone_contato_emergencia_4,
					'telefone_contato_emergencia_5_usuario' => $telefone_contato_emergencia_5,
					'nome_filho_1_usuario' => $nome_filho_1,
					'nome_filho_2_usuario' => $nome_filho_2,
					'nome_filho_3_usuario' => $nome_filho_3,
					'nome_filho_4_usuario' => $nome_filho_4,
					'nome_filho_5_usuario' => $nome_filho_5,
					'dt_nascimento_filho_1_usuario' => $dt_nascimento_filho_1,
					'dt_nascimento_filho_2_usuario' => $dt_nascimento_filho_2,
					'dt_nascimento_filho_3_usuario' => $dt_nascimento_filho_3,
					'dt_nascimento_filho_4_usuario' => $dt_nascimento_filho_4,
					'dt_nascimento_filho_5_usuario' => $dt_nascimento_filho_5
				);
                $this->db->where('id_usuario', $id);
                if($this->db->update('usuario', $data)){
                    $retorno['editou'] = true;
                }
            }       

            return $retorno;
        } else {
            header('Location: '.base_url().'login');
        }
    }   

    public function listar_usuarios(){
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
                $campo = 'nome_usuario';
                $ord = 'asc';
				$registros_por_pagina = 10;
            }

			if(isset($link[$GLOBALS['pos_parametro_lista']])){
                if(is_numeric($link[$GLOBALS['pos_parametro_lista']])){
                    $pagina = $link[$GLOBALS['pos_parametro_lista']];
                } else {
                    header('Location: '.base_url().'usuario/lista/1//'.$campo.'/'.$ord.'/'.$registros_por_pagina.'/');
                }
             } else {
                header('Location: '.base_url().'usuario/lista/1//'.$campo.'/'.$ord.'/'.$registros_por_pagina.'/');
            }
            if(isset($link[$GLOBALS['pos_parametro_lista']+1]))$busca = str_replace('%20', ' ', $link[$GLOBALS['pos_parametro_lista']+1]);
			//Usuarios Nativos
            $this->db->select('*');
            $this->db->like('nome_usuario', $busca, 'both');
            $this->db->from('usuario');
			$this->db->order_by($campo, $ord);
            $this->db->limit($registros_por_pagina);
            $this->db->offset((($pagina - 1) * $registros_por_pagina));
            $data['usuarios'] = $this->db->get()->result();
			// CONTAGEM DE PÁGINAS
            $this->db->like('nome_usuario', $busca, 'both');
            $this->db->from('usuario');
            $data['paginas'] = ceil($this->db->count_all_results()/$registros_por_pagina);
            if($data['paginas']<1)$data['paginas'] = 1;
            return $data;
        } else {
            header('Location: '.base_url().'login');
        }
    }

	public function listar_usuarios_destaque(){
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION['logado'])) {
//            $registros_de_destaque = 3;
			$mes = date('m');
            $this->db->select('*');
            $this->db->where('IND_SITUACAO_USUARIO', 'A');
			$this->db->where('Month(DT_NASCIMENTO_USUARIO)', $mes);
            $this->db->from('usuario');
            $this->db->order_by('SUBSTR(DT_NASCIMENTO_USUARIO, 8, 2)');
//            $this->db->limit($registros_de_destaque);
            $data = $this->db->get()->result();
            return $data;
        } else {
            header('Location: '.base_url().'login');
        }
    }

	public function listar_usuarios_oab(){
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION['logado'])) {
//            $registros_de_destaque = 3;
			$mes = date('m');
            $this->db->select('*, DATEDIFF(CURDATE(), VALIDADE_ORGAO_CLASSE_USUARIO) as idadeoab');
            $this->db->where('IND_SITUACAO_USUARIO', 'A');
			$this->db->where('Month(VALIDADE_ORGAO_CLASSE_USUARIO)', $mes);
            $this->db->from('usuario');
            $this->db->order_by('VALIDADE_ORGAO_CLASSE_USUARIO');
//            $this->db->limit($registros_de_destaque);
            $data = $this->db->get()->result();
            return $data;
        } else {
            header('Location: '.base_url().'login');
        }
    }


	public function listar_usuarios_contrato(){
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION['logado'])) {
//            $registros_de_destaque = 3;
			$mes = date('m');
            $this->db->select('*, DATEDIFF(CURDATE(), DT_ADMISSAO_USUARIO) as idadecontrato');
            $this->db->where('IND_SITUACAO_USUARIO', 'A');
			$this->db->where('Month(DT_ADMISSAO_USUARIO)', $mes);
            $this->db->from('usuario');
            $this->db->order_by('DT_ADMISSAO_USUARIO', 'asc');
//            $this->db->limit($registros_de_destaque);
            $data = $this->db->get()->result();
            return $data;
        } else {
            header('Location: '.base_url().'login');
        }
    }


	public function listar_usuarios_cargo($cargo){
		if(!isset($_SESSION)){
			session_start();
		}
		if (isset($_SESSION['logado'])) {
			$this->db->select('*');
			$this->db->where('IND_SITUACAO_USUARIO', 'A');
			$this->db->where('ID_CARGO', $cargo);
			$this->db->from('usuario');
			$this->db->order_by('NOME_USUARIO', 'asc');
			$data['usuario'] = $this->db->get()->result();
			return $data;
		} else {
			header('Location: '.base_url().'login');
		}
	}

	public function listar_usuarios_departamento($departamento){
		if(!isset($_SESSION)){
			session_start();
		}
		if (isset($_SESSION['logado'])) {
			$this->db->select('*');
			$this->db->where('IND_SITUACAO_USUARIO', 'A');
			$this->db->where('ID_DEPARTAMENTO', $departamento);
			$this->db->from('usuario');
			$this->db->order_by('NOME_USUARIO', 'asc');
			$data['usuario'] = $this->db->get()->result();
			return $data;
		} else {
			header('Location: '.base_url().'login');
		}
	}

    public function excluir_usuario($vid){
        if(!isset($_SESSION)){ 
            session_start(); 
        }
        if (isset($_SESSION['logado'])) {
            $retorno = array();
            $retorno['excluiu'] = false;

            $id = strip_tags($vid);
            $id = stripcslashes($id);

            $this->db->where('id_usuario', $id);

            if($this->db->delete('usuario')){
                $retorno['excluiu'] = true;
            }
            return $retorno;
        }
    }

    // UPLOAD ARQUIVO
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
            if(!isset($tipo)) $tipo='';
            $pasta_dia = './uploads/fotos_perfil/';
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

                if (in_array($file_extension, $validextensions)){//Apenas arquivos válidos
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
                                    $retorno['erro'] = "Falha ao enviar imagem!";    
                                }
                            }
                        }
                    } else{
                        $retorno['erro'] = "A imagem selecionado é muito grande!";    
                    }    
                } else{
                    $retorno['erro'] = "O arquivo selecionado não é uma imagem!";
                }
            }
            return $retorno;
        } else {
            header('Location: '.base_url().'admin/login');
        }
    }

    public function listar_departamentos(){
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION['logado'])) {
            $this->db->select('*');
            $this->db->where('IND_SITUACAO_DEPARTAMENTO', 'A');
            $this->db->from('departamento');
            $data['departamentos'] = $this->db->get()->result();
            // CONTAGEM DE PÁGINAS
            return $data;
        } else {
            header('Location: '.base_url().'login');
        }
    }

    public function listar_cargos(){
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION['logado'])) {
            $this->db->select('*');
            $this->db->where('IND_SITUACAO_CARGO', 'A');
            $this->db->from('cargo');
            $data['cargos'] = $this->db->get()->result();
            // CONTAGEM DE PÁGINAS
            return $data;
        } else {
            header('Location: '.base_url().'login');
        }
    }

    public function listar_niveis_acesso(){
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION['logado'])) {
            $this->db->select('*');
            $this->db->where('IND_SITUACAO_NIVEL_ACESSO', 'A');
            $this->db->from('nivel_acesso');
            $data['niveis_acesso'] = $this->db->get()->result();
            // CONTAGEM DE PÁGINAS
            return $data;
        } else {
            header('Location: '.base_url().'login');
        }
    }

    public function alterar_senha_usuario($vid, $vsenha){
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

	public function retorna_usuarios(){
        $this->db->select('usuario.*, departamento.DESCRICAO_DEPARTAMENTO, cargo.DESCRICAO_CARGO, cargo.TITULO_CARGO');
        $this->db->from('usuario');
		$this->db->join('departamento', 'usuario.ID_DEPARTAMENTO = departamento.ID_DEPARTAMENTO');
		$this->db->join('cargo', 'usuario.ID_CARGO = cargo.ID_CARGO');
        $this->db->order_by('NOME_USUARIO');
        $data = $this->db->get()->result();
        return $data;
    }

    public function listar_dados_usuario($id){
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION['logado'])) {

            $this->db->select('DATE_FORMAT(usuario.DT_NASCIMENTO_USUARIO, "%d/%m/%Y") as DATA_NASCIMENTO, usuario.*, departamento.TITULO_DEPARTAMENTO, cargo.TITULO_CARGO, cargo.TITULO_CARGO, nivel_acesso.TITULO_NIVEL_ACESSO');
            $this->db->from('usuario');
			$this->db->join('departamento', 'usuario.ID_DEPARTAMENTO = departamento.ID_DEPARTAMENTO');
			$this->db->join('cargo', 'usuario.ID_CARGO = cargo.ID_CARGO');
			$this->db->join('nivel_acesso', 'usuario.ID_NIVEL_ACESSO=nivel_acesso.ID_NIVEL_ACESSO');
			$this->db->where('usuario.ID_USUARIO', $id);
            $data['usuario'] = $this->db->get()->result();
            return $data;
        } else {
            header('Location: '.base_url().'login');
        }
    }

    public function buscar_usuario($email){
        if(!isset($_SESSION)){
            session_start();
        }
		$this->db->select('email_usuario, senha_usuario, id');
		$this->db->from('usuario');
		$this->db->where('usuario.email_usuario', $email);
		$data['usuario'] = $this->db->get()->result();
		return $data;
    }


}

?>
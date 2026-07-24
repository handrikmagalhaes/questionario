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
            if (isset($respostaData['tipo_pericia']) && isset($respostaData['resposta'])) {
                $resposta = isset($respostaData['resposta']) ? strip_tags($respostaData['resposta']) : '';
                $resposta = stripcslashes($resposta);
                $tipo_pericia = strip_tags($respostaData['tipo_pericia']);
                $tipo_pericia = stripcslashes($tipo_pericia);
                if ($respostaData['tipo_pericia'] === 'SISPERJUD') {
                    // Extrai e limpa dados vindos de POST (ou do array fornecido)
                    $estado_clinico = strip_tags($respostaData['estado_clinico']);
                    $estado_clinico = stripcslashes($estado_clinico);
                    $limitacoes_funcionais = strip_tags($respostaData['limitacoes_funcionais']);
                    $limitacoes_funcionais = stripcslashes($limitacoes_funcionais); 
                    $afastamento = strip_tags($respostaData['afastamento']);
                    $afastamento = stripcslashes($afastamento);
                    $fisica_mental = strip_tags($respostaData['fisica_mental']);
                    $fisica_mental = stripcslashes($fisica_mental);
                    $realizando_tratamento = strip_tags($respostaData['realizando_tratamento']);
                    $realizando_tratamento = stripcslashes($realizando_tratamento);
                    $beneficio_previdenciario = strip_tags($respostaData['beneficio_previdenciario']);
                    $beneficio_previdenciario = stripcslashes($beneficio_previdenciario);
                    $documentos_acesso = strip_tags($respostaData['documentos_acesso']);
                    $documentos_acesso = stripcslashes($documentos_acesso);
                    $lesao_fisica_mental = strip_tags($respostaData['lesao_fisica_mental']);
                    $lesao_fisica_mental = stripcslashes($lesao_fisica_mental);
                    $respondeu_sozinha = strip_tags($respostaData['respondeu_sozinha']);
                    $respondeu_sozinha = stripcslashes($respondeu_sozinha);
                    $valores_atrasados = strip_tags($respostaData['valores_atrasados']);
                    $valores_atrasados = stripcslashes($valores_atrasados);
                    $informacoes_valores = strip_tags($respostaData['informacoes_valores']);
                    $informacoes_valores = stripcslashes($informacoes_valores);
                    $alteracao_incapacidade = strip_tags($respostaData['alteracao_incapacidade']);
                    $alteracao_incapacidade = stripcslashes($alteracao_incapacidade);
                    $estado_clinico = strip_tags($respostaData['estado_clinico']);
                    $estado_clinico = stripcslashes($estado_clinico);
                    $conclusao_laudo = strip_tags($respostaData['conclusao_laudo']);
                    $conclusao_laudo = stripcslashes($conclusao_laudo);
                    $laudo_diverso = strip_tags($respostaData['laudo_diverso']);
                    $laudo_diverso = stripcslashes($laudo_diverso);
                    $outros_esclarecimentos = strip_tags($respostaData['outros_esclarecimentos']);
                    $outros_esclarecimentos = stripcslashes($outros_esclarecimentos);
                    $quesitos_adicionais = strip_tags($respostaData['quesitos_adicionais']);
                    $quesitos_adicionais = stripcslashes($quesitos_adicionais);
                    if ($resposta !== '') {
                        $dataResposta = array(
                            'resposta' => $resposta,
                            'tipo_pericia' => $tipo_pericia,
                        );
                        $dataRespostaSisperjud = array(
                            'estado_clinico' => $estado_clinico,
                            'limitacoes_funcionais' => $limitacoes_funcionais,
                            'afastamento' => $afastamento,
                            'fisica_mental' => $fisica_mental,
                            'realizando_tratamento' => $realizando_tratamento,
                            'beneficio_previdenciario' => $beneficio_previdenciario,
                            'documentos_acesso' => $documentos_acesso,
                            'lesao_fisica_mental' => $lesao_fisica_mental,
                            'respondeu_sozinha' => $respondeu_sozinha,
                            'valores_atrasados' => $valores_atrasados,
                            'informacoes_valores' => $informacoes_valores,
                            'alteracao_incapacidade' => $alteracao_incapacidade,
                            'estado_clinico' => $estado_clinico,
                            'conclusao_laudo' => $conclusao_laudo,
                            'laudo_diverso' => $laudo_diverso,
                            'outros_esclarecimentos' => $outros_esclarecimentos,
                            'quesitos_adicionais' => $quesitos_adicionais
                        );
                        if ($this->db->insert('resposta', $dataResposta)) {
                            $id_resposta = $this->db->insert_id();
                            $dataRespostaSisperjud = array_merge(array("resposta_id" => $id_resposta), $dataRespostaSisperjud);
                            $inseriuResposta = true;
                            if ($this->db->insert('resposta_sisperjud', $dataRespostaSisperjud)) {
                                $inseriuRespostaSisperjud = true;
                            }
                        }
                        if (isset($inseriuResposta) && $inseriuResposta && isset($inseriuRespostaSisperjud) && $inseriuRespostaSisperjud) {
                            $retorno['inseriu'] = true;
                        }
                    }
                } else if ($respostaData['tipo_pericia'] === 'LOAS') {
                    $menor = strip_tags($respostaData['menor']);
                    $menor = stripcslashes($menor);
                    $portador_lesao_deficiencia = strip_tags($respostaData['portador_lesao_deficiencia']);
                    $portador_lesao_deficiencia = stripcslashes($portador_lesao_deficiencia);
                    $molestia_lesao = strip_tags($respostaData['molestia_lesao']);
                    $molestia_lesao = stripcslashes($molestia_lesao);
                    $doenca_infectocontagiosa = strip_tags($respostaData['doenca_infectocontagiosa']);
                    $doenca_infectocontagiosa = stripcslashes($doenca_infectocontagiosa);
                    $exercer_plenamente = strip_tags($respostaData['exercer_plenamente']);
                    $exercer_plenamente = stripcslashes($exercer_plenamente);
                    $impedimento_transitorio_permanente = strip_tags($respostaData['impedimento_transitorio_permanente']);
                    $impedimento_transitorio_permanente = stripcslashes($impedimento_transitorio_permanente);
                    $cuidados_medicos = strip_tags($respostaData['cuidados_medicos']);
                    $cuidados_medicos = stripcslashes($cuidados_medicos);
                    $prejudica_desenvolvimento = strip_tags($respostaData['prejudica_desenvolvimento']);
                    $prejudica_desenvolvimento = stripcslashes($prejudica_desenvolvimento);
                    $prejudica_atividades = strip_tags($respostaData['prejudica_atividades']);
                    $prejudica_atividades = stripcslashes($prejudica_atividades);
                    $quadro_clinico = strip_tags($respostaData['quadro_clinico']);
                    $quadro_clinico = stripcslashes($quadro_clinico);
                    $documento_escolar = strip_tags($respostaData['documento_escolar']);
                    $documento_escolar = stripcslashes($documento_escolar);
                    $sustento_familiar = strip_tags($respostaData['sustento_familiar']);
                    $sustento_familiar = stripcslashes($sustento_familiar);
                    if ($resposta !== '') {
                        $dataResposta = array(
                            'resposta' => $resposta,
                            'tipo_pericia' => $tipo_pericia,
                        );
                        if ($this->db->insert('resposta', $dataResposta)) {
                            $id_resposta = $this->db->insert_id();
                            $dataRespostaLoas = array(
                                'resposta_id' => $id_resposta,
                                'menor' => $menor,
                                'portador_lesao_deficiencia' => $portador_lesao_deficiencia,
                                'molestia_lesao' => $molestia_lesao,
                                'doenca_infectocontagiosa' => $doenca_infectocontagiosa,
                                'exercer_plenamente' => $exercer_plenamente,
                                'impedimento_transitorio_permanente' => $impedimento_transitorio_permanente,
                                'cuidados_medicos' => $cuidados_medicos,
                                'prejudica_desenvolvimento' => $prejudica_desenvolvimento,
                                'prejudica_atividades' => $prejudica_atividades,
                                'quadro_clinico' => $quadro_clinico,
                                'documento_escolar' => $documento_escolar,
                                'sustento_familiar' => $sustento_familiar
                            );
                            $inseriuResposta = true;
                            if ($this->db->insert('resposta_loas', $dataRespostaLoas)) {
                                $inseriuRespostaLoas = true;
                            }
                        }
                        if (isset($inseriuResposta) && $inseriuResposta && isset($inseriuRespostaLoas) && $inseriuRespostaLoas) {
                            $retorno['inseriu'] = true;
                        }
                    }

                } else {
                    $resposta = '';
                }



            }
            return $retorno;
        } else {
            header('Location: '.base_url().'login');
        }
    }

    public function alterar_resposta($respostaData){
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION['logado'])) {
            setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
            date_default_timezone_set('America/Maceio');
            $retorno = array();
            $retorno['alterou'] = false;
            if (isset($respostaData['tipo_pericia']) && isset($respostaData['resposta'])) {
                $id = strip_tags($respostaData['id']);
                $id = stripcslashes($id);
                $resposta = strip_tags($respostaData['resposta']);
                $resposta = stripcslashes($resposta);
                $tipo_pericia = strip_tags($respostaData['tipo_pericia']);
                $tipo_pericia = stripcslashes($tipo_pericia);
                if ($respostaData['tipo_pericia'] === 'SISPERJUD') {
                    // Extrai e limpa dados vindos de POST (ou do array fornecido)
                    $estado_clinico = strip_tags($respostaData['estado_clinico']);
                    $estado_clinico = stripcslashes($estado_clinico);
                    $limitacoes_funcionais = strip_tags($respostaData['limitacoes_funcionais']);
                    $limitacoes_funcionais = stripcslashes($limitacoes_funcionais); 
                    $afastamento = strip_tags($respostaData['afastamento']);
                    $afastamento = stripcslashes($afastamento);
                    $fisica_mental = strip_tags($respostaData['fisica_mental']);
                    $fisica_mental = stripcslashes($fisica_mental);
                    $realizando_tratamento = strip_tags($respostaData['realizando_tratamento']);
                    $realizando_tratamento = stripcslashes($realizando_tratamento);
                    $beneficio_previdenciario = strip_tags($respostaData['beneficio_previdenciario']);
                    $beneficio_previdenciario = stripcslashes($beneficio_previdenciario);
                    $documentos_acesso = strip_tags($respostaData['documentos_acesso']);
                    $documentos_acesso = stripcslashes($documentos_acesso);
                    $lesao_fisica_mental = strip_tags($respostaData['lesao_fisica_mental']);
                    $lesao_fisica_mental = stripcslashes($lesao_fisica_mental);
                    $respondeu_sozinha = strip_tags($respostaData['respondeu_sozinha']);
                    $respondeu_sozinha = stripcslashes($respondeu_sozinha);
                    $valores_atrasados = strip_tags($respostaData['valores_atrasados']);
                    $valores_atrasados = stripcslashes($valores_atrasados);
                    $informacoes_valores = strip_tags($respostaData['informacoes_valores']);
                    $informacoes_valores = stripcslashes($informacoes_valores);
                    $alteracao_incapacidade = strip_tags($respostaData['alteracao_incapacidade']);
                    $alteracao_incapacidade = stripcslashes($alteracao_incapacidade);
                    $estado_clinico = strip_tags($respostaData['estado_clinico']);
                    $estado_clinico = stripcslashes($estado_clinico);
                    $conclusao_laudo = strip_tags($respostaData['conclusao_laudo']);
                    $conclusao_laudo = stripcslashes($conclusao_laudo);
                    $laudo_diverso = strip_tags($respostaData['laudo_diverso']);
                    $laudo_diverso = stripcslashes($laudo_diverso);
                    $outros_esclarecimentos = strip_tags($respostaData['outros_esclarecimentos']);
                    $outros_esclarecimentos = stripcslashes($outros_esclarecimentos);
                    $quesitos_adicionais = strip_tags($respostaData['quesitos_adicionais']);
                    $quesitos_adicionais = stripcslashes($quesitos_adicionais);
                    if ($resposta !== '') {
                        $dataResposta = array(
                            'id' => $id,
                            'resposta' => $resposta,
                            'tipo_pericia' => $tipo_pericia,
                        );
                        $dataRespostaSisperjud = array(
                            'resposta_id' => $id,
                            'estado_clinico' => $estado_clinico,
                            'limitacoes_funcionais' => $limitacoes_funcionais,
                            'afastamento' => $afastamento,
                            'fisica_mental' => $fisica_mental,
                            'realizando_tratamento' => $realizando_tratamento,
                            'beneficio_previdenciario' => $beneficio_previdenciario,
                            'documentos_acesso' => $documentos_acesso,
                            'lesao_fisica_mental' => $lesao_fisica_mental,
                            'respondeu_sozinha' => $respondeu_sozinha,
                            'valores_atrasados' => $valores_atrasados,
                            'informacoes_valores' => $informacoes_valores,
                            'alteracao_incapacidade' => $alteracao_incapacidade,
                            'estado_clinico' => $estado_clinico,
                            'conclusao_laudo' => $conclusao_laudo,
                            'laudo_diverso' => $laudo_diverso,
                            'outros_esclarecimentos' => $outros_esclarecimentos,
                            'quesitos_adicionais' => $quesitos_adicionais
                        );
                        $this->db->where('id', $id);
                        if ($this->db->update('resposta', $dataResposta)) {
                            $dataRespostaSisperjud = array_merge(array("resposta_id" => $id), $dataRespostaSisperjud);
                            $alterouResposta = true;
                            $this->db->where('resposta_id', $id);
                            if ($this->db->update('resposta_sisperjud', $dataRespostaSisperjud)) {
                                $alterouRespostaSisperjud = true;
                            }
                        }
                        if (isset($alterouResposta) && $alterouResposta && isset($alterouRespostaSisperjud) && $alterouRespostaSisperjud) {
                            $retorno['alterou'] = true;
                        }
                    }
                } else if ($respostaData['tipo_pericia'] === 'LOAS') {
                    $menor = strip_tags($respostaData['menor']);
                    $menor = stripcslashes($menor);
                    $portador_lesao_deficiencia = strip_tags($respostaData['portador_lesao_deficiencia']);
                    $portador_lesao_deficiencia = stripcslashes($portador_lesao_deficiencia);
                    $molestia_lesao = strip_tags($respostaData['molestia_lesao']);
                    $molestia_lesao = stripcslashes($molestia_lesao);
                    $doenca_infectocontagiosa = strip_tags($respostaData['doenca_infectocontagiosa']);
                    $doenca_infectocontagiosa = stripcslashes($doenca_infectocontagiosa);
                    $exercer_plenamente = strip_tags($respostaData['exercer_plenamente']);
                    $exercer_plenamente = stripcslashes($exercer_plenamente);
                    $impedimento_transitorio_permanente = strip_tags($respostaData['impedimento_transitorio_permanente']);
                    $impedimento_transitorio_permanente = stripcslashes($impedimento_transitorio_permanente);
                    $cuidados_medicos = strip_tags($respostaData['cuidados_medicos']);
                    $cuidados_medicos = stripcslashes($cuidados_medicos);
                    $prejudica_desenvolvimento = strip_tags($respostaData['prejudica_desenvolvimento']);
                    $prejudica_desenvolvimento = stripcslashes($prejudica_desenvolvimento);
                    $prejudica_atividades = strip_tags($respostaData['prejudica_atividades']);
                    $prejudica_atividades = stripcslashes($prejudica_atividades);
                    $quadro_clinico = strip_tags($respostaData['quadro_clinico']);
                    $quadro_clinico = stripcslashes($quadro_clinico);
                    $documento_escolar = strip_tags($respostaData['documento_escolar']);
                    $documento_escolar = stripcslashes($documento_escolar);
                    $sustento_familiar = strip_tags($respostaData['sustento_familiar']);
                    $sustento_familiar = stripcslashes($sustento_familiar);                    
                    if ($resposta !== '') {
                        $dataResposta = array(
                            'id' => $id,
                            'resposta' => $resposta,
                            'tipo_pericia' => $tipo_pericia,
                        );
                        $dataRespostaLoas = array(
                            'resposta_id' => $id,
                            'menor' => $menor,
                            'portador_lesao_deficiencia' => $portador_lesao_deficiencia,
                            'molestia_lesao' => $molestia_lesao,
                            'doenca_infectocontagiosa' => $doenca_infectocontagiosa,
                            'exercer_plenamente' => $exercer_plenamente,
                            'impedimento_transitorio_permanente' => $impedimento_transitorio_permanente,
                            'cuidados_medicos' => $cuidados_medicos,
                            'prejudica_desenvolvimento' => $prejudica_desenvolvimento,
                            'prejudica_atividades' => $prejudica_atividades,
                            'quadro_clinico' => $quadro_clinico,
                            'documento_escolar' => $documento_escolar,
                            'sustento_familiar' => $sustento_familiar
                            );
                        $this->db->where('id', $id);
                        if ($this->db->update('resposta', $dataResposta)) {
                            $dataRespostaLoas = array_merge(array("resposta_id" => $id), $dataRespostaLoas);
                            $alterouResposta = true;
                            $this->db->where('resposta_id', $id);
                            if ($this->db->update('resposta_loas', $dataRespostaLoas)) {
                                $alterouRespostaLoas = true;
                            }
                        }
                        if (isset($alterouResposta) && $alterouResposta && isset($alterouRespostaLoas) && $alterouRespostaLoas) {
                            $retorno['alterou'] = true;
                        }
                    }
                } else {
                    $resposta = '';
                }



            }
            return $retorno;
        } else {
            header('Location: '.base_url().'login');
        }
    }

    public function listar_respostas($tipo, $menor){
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION['logado'])) {
			//Usuarios Nativos
            if ($tipo === 'SISPERJUD') {
                $this->db->select('*');
                $this->db->from('resposta');
                $this->db->where('tipo_pericia', $tipo);
                $data['respostas'] = $this->db->get()->result();
                return $data;
            } else if ($tipo === 'LOAS') {
                $this->db->select('*');
                $this->db->from('resposta');
                $this->db->where('tipo_pericia', $tipo);
                if ($menor !== null) {
                    $this->db->join('resposta_loas', 'resposta.id = resposta_loas.resposta_id');
                    $this->db->where('resposta_loas.menor', $menor);
                }
                $data['respostas'] = $this->db->get()->result();
                return $data;
            }
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
        $this->db->select('tipo_pericia');
        $this->db->from('resposta');
        $this->db->where('id', $id);
        $resposta = $this->db->get()->row();
        if ($resposta->tipo_pericia == "SISPERJUD") {
            $this->db->select('resposta.*, resposta_sisperjud.*');
            $this->db->from('resposta');
            $this->db->join('resposta_sisperjud', 'resposta.id = resposta_sisperjud.resposta_id');
            $this->db->where('resposta_id', $id);
            $respostaDetalhada = $this->db->get()->row();
            return array('resposta' => $respostaDetalhada);
        } else if ($resposta->tipo_pericia == "LOAS") {
            $this->db->select('resposta.*, resposta_loas.*');
            $this->db->from('resposta');
            $this->db->join('resposta_loas', 'resposta.id = resposta_loas.resposta_id');
            $this->db->where('resposta_id', $id);
            $respostaDetalhada = $this->db->get()->row();
            return array('resposta' => $respostaDetalhada);
        }
    }
}
?>
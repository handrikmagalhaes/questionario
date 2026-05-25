<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
    <main class="container mt-5 pt-5">
        <div class="row mb-4 align-items-center animate__animated animate__fadeIn">
            <div class="col-md-6">
                <h2 class="fw-bold mb-0">Modelos de Respostas</h2>
                <!--<p class="text-muted">Gerencie as solicitações do sistema</p>-->
            </div>
            <div class="col-md-6 text-md-end">
                <button class="btn btn-primary rounded-pill px-4 shadow " data-bs-toggle="modal" data-bs-target="#formRespostaModal">
                    <i class="fa-solid fa-plus me-2"></i>Novo Modelo de Resposta
                </button>
            </div>
        </div>

        <div class="card border-0 shadow-sm p-3 mb-4 rounded-4 animate__animated animate__fadeInUp">
            <div class="row g-3">
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-text bg-transparent border-end-0 text-muted">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </span>
                        <input type="text" class="form-control border-start-0 ps-0" placeholder="Buscar por nome ou email...">
                    </div>
                </div>
                <!--<div class="col-md-4">
                    <select class="form-select">
                        <option selected>Todos os Tipos</option>
                        <option>SIRPEJUD</option>
                        <option>LOAS</option>
                    </select>
                </div>-->
            </div>
        </div>

        <div class="card table-card border-0 shadow-sm animate__animated animate__fadeInUp animate__delay-1s">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" id="tblRespostas">
                </table>
            </div>
        </div>
        <div class="modal fade animate__animated animate__fadeIn" id="formRespostaModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content border-0 shadow-lg p-4 rounded-4">
                    <div class="modal-header border-0 pb-0">
                        <h3 class="fw-bold">Cadastro de Modelo de Resposta</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3 mb-4">
                            <div class="col-12 col-md-6">
                                <label class="form-label small fw-bold d-block mb-2 text-justify">Tipo da Perícia</label>
                                <div class="d-flex gap-3 flex-wrap">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tipo_pericia" id="tipoPericiaNao" value="SISPERJUD">
                                        <label class="form-check-label" for="tipoPericiaNao">
                                            Sisperjud
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tipo_pericia" id="tipoPericiaSim" value="LOAS">
                                        <label class="form-check-label" for="tipoPericiaSim">
                                            Loas
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form id="respostaForm" >
                            <input type="hidden" name="id" id="id_resposta" value="">
                            <div class="mb-4 mt-3">
                                <label class="form-label small fw-bold" for="resposta">Resposta</label>
                                <input type="text" name="resposta" id="resposta" class="processo form-control rounded-3 py-2" required>
                            </div>
                            <div class="accordion" id="accordionPanelsStayOpenExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="panelsStayOpen-headingFive">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseFive">
                                        <strong>5. EXAME CLÍNICO</strong>
                                    </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFive">
                                        <div class="accordion-body">
                                            <div class="row g-3 mb-4">
                                                <div class="col-24 col-md-12">
                                                    <label class="form-label small fw-bold">a. Descreva o estado clínico da parte pericianda</label>
                                                    <textarea name="estado_clinico" id="estado_clinico" class="form-control rounded-3 py-2" required></textarea>
                                                </div>
                                            </div>
                                            <div class="row g-3 mb-4">
                                                <div class="col-24 col-md-12">
                                                    <label class="form-label small fw-bold">b. Descreva, se houver, as limitações funcionais presentes diante das exigências físicas/intelectuais exigidas para o exercício do trabalho habitual - profissiografia</label>
                                                    <textarea name="limitacoes_funcionais" id="limitacoes_funcionais" class="form-control rounded-3 py-2" required></textarea>
                                                </div>
                                            </div>
                                            <div class="row g-3 mb-4">
                                                <div class="col-12 col-md-6">
                                                    <label class="form-label small fw-bold d-block mb-2 text-justify">a. A parte pericianda já teve algum afastamento de suas atividades laborais?</label>
                                                    <div class="d-flex gap-3 flex-wrap">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="afastamento" id="afastamentoNao" value="Não">
                                                            <label class="form-check-label" for="afastamentoNao">
                                                                Não
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="afastamento" id="afastamentoSim" value="Sim">
                                                            <label class="form-check-label" for="afastamentoSim">
                                                                Sim
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-3 mb-4">
                                                <div class="col-8 col-md-4">
                                                    <label class="form-label small fw-bold d-block mb-2 text-justify">c. A parte pericianda relata que tem (ou já teve) doença ou lesão física e/ou mental e/ou comorbidades associadas?</label>
                                                    <div class="d-flex gap-3 flex-wrap">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="fisica_mental" id="fisica_mentalNao" value="Não">
                                                            <label class="form-check-label" for="fisica_mentalNao">
                                                                Não
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="fisica_mental" id="fisica_mentalSim" value="Sim">
                                                            <label class="form-check-label" for="fisica_mentalSim">
                                                                Sim
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-8 col-md-4">
                                                    <label class="form-label small fw-bold d-block mb-2 text-justify">d. A parte pericianda está realizando tratamento?</label>
                                                    <div class="d-flex gap-3 flex-wrap">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="realizando_tratamento" id="realizando_tratamentoNao" value="Não" >
                                                            <label class="form-check-label" for="realizando_tratamentoNao">
                                                                Não
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="realizando_tratamento" id="realizando_tratamentoSim" value="Sim">
                                                            <label class="form-check-label" for="realizando_tratamento	Sim">
                                                                Sim
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-8 col-md-4">
                                                    <label class="form-label small fw-bold d-block mb-2">e. Houve incapacidade pretérita em período(s) além daquele(s) em que a parte pericianda já esteve em gozo de benefício previdenciário?</label>
                                                    <div class="d-flex gap-3 flex-wrap">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="beneficio_previdenciario" id="beneficio_previdenciarioNao" value="Não" >
                                                            <label class="form-check-label" for="beneficio_previdenciarioNao	">
                                                                Não
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="beneficio_previdenciario" id="beneficio_previdenciarioSim" value="Sim">
                                                            <label class="form-check-label" for="beneficio_previdenciarioSim">
                                                                Sim
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-3 mb-4">
                                                <div class="col-24 col-md-12">
                                                    <label class="form-label small fw-bold">f. O(a) perito(a) teve acesso a que documentos médicos ou odontológicos da parte pericianda?</label>
                                                    <textarea name="documentos_acesso" id="documentos_acesso" class="form-control rounded-3 py-2" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="panelsStayOpen-headingSix">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSix" aria-expanded="false" aria-controls="panelsStayOpen-collapseSix">
                                        <strong>6. ANÁLISE PERICIAL</strong>
                                    </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingSix">
                                        <div class="accordion-body">
                                            <div class="row g-3 mb-4">
                                                <div class="col-24 col-md-12">
                                                    <label class="form-label small fw-bold d-block mb-2 text-justify">a. A parte pericianda tem (ou já teve) alguma doença ou lesão física ou mental?</label>
                                                    <div class="d-flex gap-3 flex-wrap">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="lesao_fisica_mental" id="lesao_fisica_mentalNao" value="Não">
                                                            <label class="form-check-label" for="lesao_fisica_mentalNao">
                                                                Não (Fim da análise)
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="lesao_fisica_mental" id="lesao_fisica_mentalSim" value="Sim">
                                                            <label class="form-check-label" for="lesao_fisica_mentalSim">
                                                                Sim
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="panelsStayOpen-headingSeven">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSeven" aria-expanded="false" aria-controls="panelsStayOpen-collapseSeven">
                                        <strong>7. INFORMAÇÕES ADICIONAIS</strong>
                                    </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseSeven" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingSeven">
                                        <div class="accordion-body">
                                            <div class="row g-3 mb-4">
                                                <div class="col-12 col-md-6">
                                                    <label class="form-label small fw-bold d-block mb-2 text-justify">a. A parte pericianda respondeu sozinha às perguntas?</label>
                                                    <div class="d-flex gap-3 flex-wrap">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="respondeu_sozinha" id="respondeu_sozinhaNao" value="Não">
                                                            <label class="form-check-label" for="respondeu_sozinhaNao">
                                                                Não
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="respondeu_sozinha" id="respondeu_sozinhaSim" value="Sim">
                                                            <label class="form-check-label" for="respondeu_sozinhaSim">
                                                                Sim
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <label class="form-label small fw-bold d-block mb-2 text-justify">b. A parte pericianda é capaz de administrar os valores que vier a receber a título de atrasados?</label>
                                                    <div class="d-flex gap-3 flex-wrap">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="valores_atrasados" id="valores_atrasadosNao" value="Não">
                                                            <label class="form-check-label" for="valores_atrasadosNao">
                                                                Não
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="valores_atrasados" id="valores_atrasadosSim" value="Sim">
                                                            <label class="form-check-label" for="valores_atrasadosSim">
                                                                Sim
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-3 mb-4">
                                                <div class="col-24 col-md-12">
                                                    <label class="form-label small fw-bold">Informações complementares (Administrar valores)</label>
                                                    <textarea name="estado_clinico" id="informacoes_valores" class="form-control rounded-3 py-2" required></textarea>
                                                </div>
                                            </div>
                                            <div class="row g-3 mb-4">
                                                <div class="col-24 col-md-12">
                                                    <label class="form-label small fw-bold d-block mb-2 text-justify">c. Houve alguma alteração à incapacidade após a data da perícia administrativa?</label>
                                                    <div class="d-flex gap-3 flex-wrap">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="alteracao_incapacidade" id="alteracao_incapacidadeNao" value="Não">
                                                            <label class="form-check-label" for="alteracao_incapacidadeNao">
                                                                Não
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="alteracao_incapacidade" id="alteracao_incapacidadeSim" value="Sim">
                                                            <label class="form-check-label" for="alteracao_incapacidadeSim">
                                                                Sim
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="alteracao_incapacidade" id="alteracao_incapacidadeNaoSeAplica" value="Não se aplica">
                                                            <label class="form-check-label" for="alteracao_incapacidadeNaoSeAplica">
                                                                Não se aplica
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-3 mb-4">
                                                <div class="col-24 col-md-12">
                                                    <label class="form-label small fw-bold">Informações complementares (Alteração Pós-Perícia)</label>
                                                    <textarea name="estado_clinico" id="informacoes_pos_pericia" class="form-control rounded-3 py-2" required></textarea>
                                                </div>
                                            </div>
                                            <div class="row g-3 mb-4">
                                                <div class="col-24 col-md-12">
                                                    <label class="form-label small fw-bold d-block mb-2 text-justify">d. Existe divergência em relação às conclusões do laudo administrativo?</label>
                                                    <div class="d-flex gap-3 flex-wrap">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="conclusao_laudo" id="conclusao_laudoNao" value="Não">
                                                            <label class="form-check-label" for="conclusao_laudoNao">
                                                                Não
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="conclusao_laudo" id="conclusao_laudoSim" value="Sim">
                                                            <label class="form-check-label" for="conclusao_laudoSim">
                                                                Sim
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-3 mb-4">
                                                <div class="col-24 col-md-12">
                                                    <label class="form-label small fw-bold">e. Havendo laudo judicial anterior, neste ou em outro rocesso, pelas mesmas patologias, indique, em caso de resultado diverso, os motivos que levaram a tal conclusão.</label>
                                                    <textarea name="laudo_diverso" id="laudo_diverso" class="form-control rounded-3 py-2" required></textarea>
                                                </div>
                                            </div>
                                            <div class="row g-3 mb-4">
                                                <div class="col-24 col-md-12">
                                                    <label class="form-label small fw-bold">f. Outros esclarecimentos que entenda pertinentes.</label>
                                                    <textarea name="outros_esclarecimentos" id="outros_esclarecimentos" class="form-control rounded-3 py-2" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="panelsStayOpen-headingEight">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseEight" aria-expanded="false" aria-controls="panelsStayOpen-collapseEight">
                                        <strong>8. QUESITOS ADICIONAIS (do Juízo)</strong>
                                    </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseEight" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingEight">
                                        <div class="accordion-body">
                                            <div class="row g-3 mb-4">
                                                <div class="col-24 col-md-12">
                                                    <label class="form-label small fw-bold">Quesitos adicionais</label>
                                                    <textarea name="quesitos_adicionais" id="quesitos_adicionais" class="form-control rounded-3 py-2" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" id="btnCadastrarSisperjud" class="btn btn-primary w-100 py-2 mt-5 rounded-3 fw-bold shadow-sm">
                                Cadastrar
                            </button>
                        </form>
                        <!--<div class="text-center mt-4">
                            <p class="small text-muted">Não tem conta? <a href="#" class="text-primary text-decoration-none fw-bold">Criar agora</a></p>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
    <main class="container mt-5 pt-5">
        <div class="row mb-4 align-items-center animate__animated animate__fadeIn">
            <div class="col-md-6">
                <h2 class="fw-bold mb-0">Listagem de Respostas</h2>
                <!--<p class="text-muted">Gerencie as solicitações do sistema</p>-->
            </div>
            <div class="col-md-6 text-md-end">
                <button class="btn btn-primary rounded-pill px-4 shadow " data-bs-toggle="modal" data-bs-target="#formRespostaModal">
                    <i class="fa-solid fa-plus me-2"></i>Nova Resposta
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
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 shadow-lg p-4 rounded-4">
                    <div class="modal-header border-0 pb-0">
                        <h3 class="fw-bold">Cadastro de Resposta</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="respostaForm">
                            <input type="hidden" name="id" id="id_resposta" value="">
                            <div class="mb-4 mt-3">
                                <label class="form-label small fw-bold" for="resposta">Resposta</label>
                                <textarea name="resposta" id="resposta" class="form-control rounded-3 py-2" rows="5" placeholder="Digite a resposta aqui" required></textarea>
                            </div>
                            <div class="row mb-4">
                                <div class="col-auto d-flex align-items-center">
                                    <div class="form-check form-switch me-3">
                                        <input class="form-check-input" type="checkbox" name="sisperjud" id="sisperjud">
                                        <label class="form-check-label" for="sisperjud">SISPERJUD</label>
                                    </div>
                                </div>
                                <div class="col-auto d-flex align-items-center">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="loas" id="loas">
                                        <label class="form-check-label" for="loas">LOAS</label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" id="btnCadastrarResposta" class="btn btn-primary w-100 py-2 rounded-3 fw-bold shadow-sm">
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

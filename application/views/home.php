<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
    <section id="home" class="hero-section d-flex align-items-center">
        <div class="container text-center">
            <h1 class="display-3 fw-bold animate__animated animate__zoomIn">Inovação em cada <span class="text-gradient">Pixel.</span></h1>
            <p class="lead mb-5 animate__animated animate__fadeInUp animate__delay-1s">A solução fluida para o seu próximo projeto digital.</p>
            <div class="animate__animated animate__fadeInUp animate__delay-2s">
            </div>
        </div>
    </section>
    <div class="modal fade animate__animated animate__fadeIn" id="loginModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg p-4 rounded-4">
                <div class="modal-header border-0 pb-0">
                    <h3 class="fw-bold">Bem-vindo</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="loginForm" >
                        <div class="mb-4 mt-3">
                            <label class="form-label small fw-bold">E-mail</label>
                            <input type="email" name="email" class="form-control rounded-3 py-2" placeholder="exemplo@email.com" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label small fw-bold">Senha</label>
                            <input type="password" name="senha" class="form-control rounded-3 py-2" placeholder="••••••••" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-2 rounded-3 fw-bold shadow-sm">
                            Acessar Sistema
                        </button>
                    </form>
                    <!--<div class="text-center mt-4">
                        <p class="small text-muted">Não tem conta? <a href="#" class="text-primary text-decoration-none fw-bold">Criar agora</a></p>
                    </div>-->
                </div>
            </div>
        </div>
    </div>





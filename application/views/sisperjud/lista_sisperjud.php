<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!--<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexus | Listagem de Processos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    
    <link rel="stylesheet" href="../style.css">
    <style>
        .table-card {
            border-radius: 1.5rem;
            overflow: hidden;
        }
        .badge-sipejud { background-color: #4361ee; color: white; }
        .badge-loas { background-color: #4cc9f0; color: #0f172a; }
        .table thead th {
            background-color: #f8fafc;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
            font-weight: 700;
            border-bottom: 2px solid #eef2ff;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg fixed-top shadow-sm animate__animated animate__fadeInDown">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">
                <i class="fa-solid fa-rocket text-primary me-2"></i>NEXUS
            </a>
            <div class="ms-auto d-flex align-items-center">
                <span class="d-none d-md-inline text-muted me-3 small">Olá, Administrador</span>
                <a href="index.php" class="btn btn-outline-danger btn-sm rounded-pill px-3">Sair</a>
            </div>
        </div>
    </nav>
-->
    <main class="container mt-5 pt-5">
        <div class="row mb-4 align-items-center animate__animated animate__fadeIn">
            <div class="col-md-6">
                <h2 class="fw-bold mb-0">Listagem de Perícias SISPERJUD</h2>
                <!--<p class="text-muted">Gerencie as solicitações do sistema</p>-->
            </div>
            <div class="col-md-6 text-md-end">
                <button class="btn btn-primary rounded-pill px-4 shadow" onclick="window.location.href='{url_base}sisperjud/cadastro'">
                    <i class="fa-solid fa-plus me-2"></i>Nova perícia SISPERJUD
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
                        <input type="text" class="form-control border-start-0 ps-0" placeholder="Buscar por nome ou processo...">
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
                <table class="table table-hover align-middle mb-0" id="tblSisperjud">
                    <thead>
                        <tr>
                            <th>Nome do Periciando</th>
                            <th>Data da Perícia</th>
                            <th>Processo</th>
                            <th class="text-end">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Os dados serão inseridos aqui via JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>
<!--        <div class="modal fade animate__animated animate__fadeIn" id="formUsuarioModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 shadow-lg p-4 rounded-4">
                    <div class="modal-header border-0 pb-0">
                        <h3 class="fw-bold">Cadastro de Usuário</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="usuarioForm" >
                            <input type="hidden" name="id" id="id_usuario" value="">
                            <div class="mb-4 mt-3">
                                <label class="form-label small fw-bold">Nome</label>
                                <input type="text" name="nome_usuario" id="nome_usuario" class="form-control rounded-3 py-2" placeholder="Seu nome completo" required>
                            </div>
                            <div class="mb-4">
                                <label class="form-label small fw-bold">Email</label>
                                <input type="email" name="email_usuario" id="email_usuario" class="form-control rounded-3 py-2" placeholder="exemplo@email.com" required>
                            </div>
                            <div class="mb-4">
                                <label class="form-label small fw-bold">Senha</label>
                                <div class="input-group">
                                    <input type="password" id="senha_usuario" name="senha_usuario" class="form-control rounded-3 py-2" placeholder="Sua senha" required>
                                    <button class="btn btn-outline-secondary rounded-3 border-start-0" type="button" id="toggleSenhaUsuario" aria-label="Mostrar senha">
                                        <i class="fa-solid fa-eye text-primary"></i>
                                    </button>
                                </div>
                            </div>
                            <button type="submit" id="btnCadastrarUsuario" class="btn btn-primary w-100 py-2 rounded-3 fw-bold shadow-sm">
                                Cadastrar
                            </button>
                        </form>
                        <div class="text-center mt-4">
                            <p class="small text-muted">Não tem conta? <a href="#" class="text-primary text-decoration-none fw-bold">Criar agora</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
    </main>

<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{titulo}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>
    {css}
    
</head>
<body>
    <span class=d-none id="url_base">{url_base}</span>
    <nav class="navbar navbar-expand-lg fixed-top shadow-sm animate__animated animate__fadeInDown">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">
                <i class="fa-solid fa-file text-primary me-2"></i>Questionário On-Line
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                  <li class="nav-item"><a class="nav-link mx-2" href="#home">Início</a></li>
                  <?php if(isset($_SESSION['logado'])){ ?>
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle mx-2" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Questionários
                      </a>
                      <ul class="dropdown-menu border-0 shadow-sm animate__animated animate__fadeInUp" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item py-2" href="#recurso1"><i class="fa-solid fa-circle-check text-primary me-2 small"></i>SISPERJUD</a></li>
                          <li><a class="dropdown-item py-2" href="#recurso2"><i class="fa-solid fa-circle-check text-primary me-2 small"></i>LOAS</a></li>
                      </ul>
                  </li>
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle mx-2" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Recursos
                      </a>
                      <ul class="dropdown-menu border-0 shadow-sm animate__animated animate__fadeInUp" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item py-2" href="{url_base}usuario/lista"><i class="fa-solid fa-circle-check text-primary me-2 small"></i>Usuários</a></li>
                          <li><a class="dropdown-item py-2" href="{url_base}resposta/lista"><i class="fa-solid fa-circle-check text-primary me-2 small"></i>Respostas</a></li>
                      </ul>
                  </li>
                  <li class="nav-item ms-lg-3">
                      <button class="btn btn-primary px-4 rounded-pill" id="btnLogout" onclick="window.location.href='{url_base}home/logout'">
                          Sair
                      </button>
                  </li>

                  <?php } else { ?>
                  <!--<li class="nav-item"><a class="nav-link mx-2" href="#about">Sobre</a></li>-->
                  <li class="nav-item ms-lg-3">
                      <button class="btn btn-primary px-4 rounded-pill" data-bs-toggle="modal" data-bs-target="#loginModal">
                          Entrar
                      </button>
                  </li>
                  <?php } ?>
              </ul>
            </div>
        </div>
    </nav>

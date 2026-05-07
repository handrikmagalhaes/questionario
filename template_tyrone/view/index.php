<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Flow | Template</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    
    <link rel="stylesheet" href="../style.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg fixed-top shadow-sm animate__animated animate__fadeInDown">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">
                <i class="fa-solid fa-rocket text-primary me-2"></i>NEXUS
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link mx-2" href="#home">Início</a></li>
                    <li class="nav-item"><a class="nav-link mx-2" href="#features">Recursos</a></li>
                    <li class="nav-item"><a class="nav-link mx-2" href="#about">Sobre</a></li>
                    <li class="nav-item ms-lg-3">
                        <button class="btn btn-primary px-4 rounded-pill" data-bs-toggle="modal" data-bs-target="#loginModal">
                            Entrar
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header id="home" class="hero-section d-flex align-items-center">
        <div class="container text-center">
            <h1 class="display-3 fw-bold animate__animated animate__zoomIn">Inovação em cada <span class="text-gradient">Pixel.</span></h1>
            <p class="lead mb-5 animate__animated animate__fadeInUp animate__delay-1s">A solução fluida para o seu próximo projeto digital.</p>
            <div class="animate__animated animate__fadeInUp animate__delay-2s">
                <a href="#features" class="btn btn-outline-primary btn-lg px-5 rounded-pill me-3">Saiba Mais</a>
                <button class="btn btn-primary btn-lg px-5 rounded-pill shadow" data-bs-toggle="modal" data-bs-target="#loginModal">Começar</button>
            </div>
        </div>
    </header>

    <section id="features" class="py-5">
        <div class="container py-5">
            <div class="row g-4 text-center">
                <div class="col-md-4">
                    <div class="card feature-card p-4 border-0 shadow-sm h-100">
                        <i class="fa-solid fa-mobile-screen fa-3x text-primary mb-3"></i>
                        <h3>100% Responsivo</h3>
                        <p class="text-muted">Perfeito em celulares, tablets e desktops de qualquer resolução.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card feature-card p-4 border-0 shadow-sm h-100">
                        <i class="fa-solid fa-gauge-high fa-3x text-primary mb-3"></i>
                        <h3>Alta Performance</h3>
                        <p class="text-muted">Código otimizado para carregamento instantâneo e fluidez.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card feature-card p-4 border-0 shadow-sm h-100">
                        <i class="fa-solid fa-layer-group fa-3x text-primary mb-3"></i>
                        <h3>Design Moderno</h3>
                        <p class="text-muted">Componentes Bootstrap 5 customizados para elegância máxima.</p>
                    </div>
                </div>
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
                    <form id="loginForm">
                        <div class="mb-4 mt-3">
                            <label class="form-label small fw-bold">E-mail</label>
                            <input type="email" class="form-control rounded-3 py-2" placeholder="exemplo@email.com" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label small fw-bold">Senha</label>
                            <input type="password" class="form-control rounded-3 py-2" placeholder="••••••••" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-2 rounded-3 fw-bold shadow-sm">
                            Acessar Painel
                        </button>
                    </form>
                    <div class="text-center mt-4">
                        <p class="small text-muted">Não tem conta? <a href="#" class="text-primary text-decoration-none fw-bold">Criar agora</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../script.js"></script>
</body>
</html>
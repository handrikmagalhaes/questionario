$(document).ready(function() {
    // 1. Navbar muda de estilo ao rolar a tela
    $(window).scroll(function() {
        if ($(this).scrollTop() > 50) {
            $('.navbar').addClass('py-2 shadow-lg').removeClass('py-3');
        } else {
            $('.navbar').addClass('py-3').removeClass('shadow-lg');
        }
    });

    // 2. Smooth Scroll (Rolagem Suave) para itens de menu
    $('a.nav-link').on('click', function(event) {
        if (this.hash !== "") {
            event.preventDefault();
            var hash = this.hash;
            $('html, body').animate({
                scrollTop: $(hash).offset().top - 70
            }, 800);
        }
    });

    // 3. Simulação de Login com animação no botão
    $('#loginForm').on('submit', function(e) {
        e.preventDefault();
        const btn = $(this).find('button');
        const originalText = btn.html();
        
        btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Autenticando...');

        // Simula delay de rede
        setTimeout(function() {
            alert('Login realizado com sucesso! Redirecionando...');
            location.reload(); 
        }, 1500);
    });

    // 4. Animação extra ao abrir o modal
    $('#loginModal').on('show.bs.modal', function () {
        $(this).find('.modal-content').addClass('animate__animated animate__zoomIn');
    });
});
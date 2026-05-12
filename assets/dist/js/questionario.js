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
    $('a.nav-link[href^="#"]').not('.dropdown-toggle').not('[href="#"]').on('click', function(event) {
        if (this.hash !== "" && this.hash !== "#") {
            var hash = this.hash;
            var target = $(hash);
            if (target.length) {
                event.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 70
                }, 800);
            }
        }
    });

    // Inicializa dropdown do Bootstrap manualmente, caso o data-api não seja disparado
    try {
        var dropdownTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="dropdown"]'));
        dropdownTriggerList.map(function(dropdownTriggerEl) {
            return new bootstrap.Dropdown(dropdownTriggerEl);
        });
    } catch (error) {
        console.warn('Bootstrap dropdown init falhou:', error);
    }

    // 4. Animação extra ao abrir o modal
    $('#loginModal').on('show.bs.modal', function () {
        $(this).find('.modal-content').addClass('animate__animated animate__zoomIn');
    });

    // Opções Toastr
    toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
    }
});
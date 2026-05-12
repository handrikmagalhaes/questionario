$(document).ready(function() {
    
})
// 3. Simulação de Login com animação no botão
$('#loginForm').on('submit', function(e) {
    e.preventDefault();
    const btn = $(this).find('button');
    const originalText = btn.html();
    btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Autenticando...');
    $.ajax({
        url: $("#url_base").text() + 'home/login',
        method: 'POST',
        data: $("#loginForm").serialize(),
    }).done(function(response) {
        const retorno = JSON.parse(response);
        console.log(response);
        if (retorno.existe >= 1) {
            toastr.success(retorno.dados);
            setTimeout(function() {
                location.reload();
            }, 3000);
        } else {
            toastr.error(retorno.dados);
            btn.prop('disabled', false).html(originalText);
        }
    }).fail(function() {
        toastr.error('Erro ao realizar login!');
        btn.prop('disabled', false).html(originalText);
    });
    // Simula delay de rede
/*    setTimeout(function() {
        toastr.success('Login realizado com sucesso! Redirecionando...');
        location.reload(); 
    }, 1500);*/
});
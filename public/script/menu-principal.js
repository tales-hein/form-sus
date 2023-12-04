$(document).ready(function() {
    const cns = $('#cns_agente_logado').val();
    
    function loadWelcome() {
        $.ajax({
            url: '/ajax/MenuController/getNomeWelcome',
            method: 'POST',
            data: {
                cns: cns 
            },
            success: function(response) {
                if(response.status == 404 || response.status == 500) {
                    $('#bem_vindo').html('Bem-Vindo: Agente');
                    return;
                }
                const primeiroNome = response.dados.nome_completo.split(' ')[0];
                const nomeFormatado = primeiroNome.charAt(0).toUpperCase() + primeiroNome.slice(1).toLowerCase();
                $('#bem_vindo').html('Bem-Vindo: ' + nomeFormatado);
            },
            error: function(err) {
                console.log(err);
                $('#bem_vindo').html('Bem-Vindo: Agente');
            }
        });
    }

    $(document).on('click', '#btn_cadastrar_nova_visita', function() {
        window.location.replace(location.origin + '/view/formulario.php?cns=' + cns);
    })

    $(document).on('click', '#btn_historico', function() {
        window.location.replace(location.origin + '/view/historico.php?cns=' + cns);
    })
    
    $(document).on('click', '#btn_sair', function() {
        window.location.replace(location.origin + '/view/login.php');
    })
    
    loadWelcome();
})
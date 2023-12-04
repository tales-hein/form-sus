$(document).ready(function() {

    function loadLoginInicial() {
        $('#wrapper_conteudo_login').empty();
        $.ajax({
            url: '/ajax/LoginController/renderLoginInicial',
            method: 'GET',
            success: function(response) {
                $('#wrapper_conteudo_login').html(response);
            },
            error: function(err) {
                console.error(err);
            }
        });
    }

    function loadJaCadastrado() {
        $('#wrapper_conteudo_login').empty();
        $.ajax({
            url: '/ajax/LoginController/renderLoginJaCadastrado',
            method: 'GET',
            success: function(response) {
                $('#wrapper_conteudo_login').html(response);
                $(document).on('click', '#cns', function(){
                    $(this).val($('#hdn_cns').val());
                })
            },
            error: function(err) {
                console.error(err);
            }
        });
    }

    function loadPrimeiroAcesso() {
        $('#wrapper_conteudo_login').empty();
        $.ajax({
            url: '/ajax/LoginController/renderLoginPrimeiroAcesso',
            method: 'GET',
            success: function(response) {
                $('#wrapper_conteudo_login').html(response);
                $(document).on('click', '#cns', function(){
                    $(this).val($('#hdn_cns').val());
                })
                
            },
            error: function(err) {
                console.error(err);
            }
        });
    }

    $(document).on('click', '#btn_avancar_inicial', function() {
        const cns = $('#cns').val();
        $.ajax({
            url: 'https://formsus.api.previa.app/api/user/cns?cns='+cns,
            method: 'POST',
            success: function(response) {
                if(response.success == true) {
                    $('#hdn_cns').val(cns);
                    if(response.response.next == 'signup') {
                        loadPrimeiroAcesso();
                        return
                    }
                    if(response.response.password !== '') {
                        loadJaCadastrado();
                    }
                }else {
                    alert(JSON.stringify(response.errors).replace(/[\[\]]/g, ''));
                }
            },
            error: function(err) {
                console.error(err);
            }
        });
    });

    let senha = ''
    $(document).on('change', '#senha', function() {
        senha = $(this).val();
    })

    $(document).on('click', '#btn_login_cadastrado', function() {
        const cns = $('#hdn_cns').val();
        let dados = {
            "data": {
                "cns": cns.toString(),
                "password": senha.toString()
            }
        };
        $.ajax({
            url: 'https://formsus.api.previa.app/api/user/signin',
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(dados),
            success: function(response) {
                if(response.success === true) {
                    window.location.replace(location.origin + '/view/menu-principal.php?cns=' + cns);
                }else {
                    alert(JSON.stringify(response.errors).replace(/[\[\]]/g, ''));
                }
            },
            error: function(err) {
                console.error(err);
            }
        });
    });

    $(document).on('click', '#btn_cadastrar_primeiro_acesso', function() {
        const cns = $('#cns').val();
        const senha = $('#senha').val();
        const repetirSenha = $('#repetir_senha').val();
        let dados = {
            "data": {
                "cns": cns.toString(),
                "password": senha.toString(),
                "repeatPassword": repetirSenha.toString()
            }
        };
        $.ajax({
            url: 'https://formsus.api.previa.app/api/user/signup',
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(dados),
            success: function(response) {
                if(response.success === true) {
                    loadJaCadastrado();
                }else {
                    alert(JSON.stringify(response.errors).replace(/[\[\]]/g, ''));
                }
            },
            error: function(err) {
                console.error(err);
            }
        });
    });

    $(document).on('click', '#btn_voltar_primeiro_acesso', function() {
        loadLoginInicial();
    });
    
    loadLoginInicial();
});
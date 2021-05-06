
function startModal(){
    $("#usersTitleModal").html('<h5>Cadastro de usuarios</h5>');
    $('#usersModal').modal('show');
}

function save(){
    let name = $('#name').val();
    let email = $('#email').val();
    let type = $('#typeUser').val();
    let password = $('#password').val();
    let passwordRepite = $('#passwordRepite').val();



    if (!name) {
        Swal.fire({
            icon: 'error'
            , title: 'Oops...'
            , text: 'Digite o nome completo para continuarmos'
            , footer: 'Qualquer dúvida entre em contato com o Suporte'
        });
        return;
    }

    if (!email) {
        Swal.fire({
            icon: 'error'
            , title: 'Oops...'
            , text: 'Digite o e-mail completo para continuarmos'
            , footer: 'Qualquer dúvida entre em contato com o Suporte'
        });
        return;
    }
    if (password.length < 6) {
        Swal.fire({
            icon: 'error'
            , title: 'Oops...'
            , text: 'Digite no minimo 6 digitos na senha'
            , footer: 'Qualquer dúvida entre em contato com o Suporte'
        });
        return;
    }

    if (password!==passwordRepite) {
        Swal.fire({
            icon: 'error'
            , title: 'Oops...'
            , text: 'As senhas não conferem '
            , footer: 'Qualquer dúvida entre em contato com o Suporte'
        });
        return;
    }
    let data = JSON.stringify({
        name:name
        ,email:email
        ,password:password
        ,type:type

    })


    $("#loading").removeClass('d-none');
    $.ajax({
        type: 'POST'
        , url: '/usuario/salvar'
        , data: data,
        success: function (data) {
            var retorno = $.parseJSON(JSON.stringify(data));

            $("#btnSalvarEntidade").html('<i class="fa fa-fw fa-plus mr-1"></i> Efetuar Cadastro');
            if (retorno['sucesso'] === false) {
                let mensagem = retorno['message'] + '</br>';
                if (retorno['erro']) {
                    var erros = $.parseJSON(JSON.stringify(retorno['erro']));
                    for (erro in erros) {
                        mensagem = mensagem + erros[erro] + '</br>';
                    }
                }
                Swal.fire({
                    icon: 'error'
                    , title: 'Oops...'
                    , html: mensagem
                    , footer: 'Qualquer dúvida entre em contato com o Suporte'
                });
                return;

            } else if (retorno['sucesso'] == true) {
                Swal.fire({
                    position: 'center'
                    , icon: 'success'
                    , title: 'Usuario cadastrado com sucesso'
                    , footer: ''
                    , showConfirmButton: true
                    , onClose: () => {
                        $(location).attr('href', '/cadastro/usuarios')
                    }
                })
            }

        }
        , error: function (XMLHttpRequest, textStatus, errorThrown) {




        }
        , contentType: "application/json"
        , dataType: 'json'
    });
    $("#loading").addClass('d-none')
    jQuery('#usersModal').modal('hide');



}

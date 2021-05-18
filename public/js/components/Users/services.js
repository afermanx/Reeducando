

function startModal() {


    $("#servicesTitleModal").html('<h5>Cadastro de serviços</h5>');
    $('#servicesModal').modal('show');
}

function closeModal() {
    $("#usersModal").modal('hide')
}

function save() {
    let name = $('#name').val();
    let description = $('#description').val();
    let value = $('#value').val();
    let detainee = $('#detainee').val();
    let workshop = $('#workshop').val();




    if (!name) {
        Swal.fire({
            icon: 'error'
            , title: 'Oops...'
            , text: 'Preencha campo nome para continuarmos'
            , footer: 'Qualquer dúvida entre em contato com o Suporte'
        });
        return;
    }

    if (!value) {
        Swal.fire({
            icon: 'error'
            , title: 'Oops...'
            , text: 'Preencha o campo valor'
            , footer: 'Qualquer dúvida entre em contato com o Suporte'
        });
        return;
    }



    let data = JSON.stringify({
        name: name
        ,description:description
        ,value:value
        ,detainee:detainee
        ,workshop:workshop

    })


    console.log(data)


    $("#loading").removeClass('d-none');
    $.ajax({
        type: 'POST'
        , url: '/servicos/salvar'
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
                    position: 'top-end',
                    icon: 'success',
                    title: 'Serviços cadastrado com sucesso',
                    showConfirmButton: false,
                    timer: 1500,
                    onClose: () => {
                        $(location).attr('href', '/cadastro/servicos')
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

function show(id) {


     $("#showStatus").show();




    $.ajax({
        type: 'POST'
        , url: '/servicos/mostrar'
        , data: JSON.stringify({
            $user_id: id
        }),
        success: function (data) {
            var retorno = $.parseJSON(JSON.stringify(data));
            if (retorno['sucesso'] == false) {
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
            }


            if (retorno['sucesso'] === true) {
                $('#name').val(retorno['services']['name']);
                $('#description').val(retorno['services']['description']);
                $('#value').val(retorno['services']['value']);
                $('#detainee').val(retorno['services']['detainee']);
                $('#workshop').val(retorno['services']['workshop']);
                $('#status').val(retorno['services']['status']).change();


                $("#usersTitleModal").html('<h5>Editar de usuarios</h5>');

                $("#btnSave").html('<i class=" bx bx-edit"></i> Editar');
                $("#senhaAlterar").html('<label>Alterar Senha</label>');
                $("#btnSave").attr("onclick", 'edit(' + id + ')');
                jQuery('#usersModal').modal('show');
            }
        }
        , error: function (XMLHttpRequest, textStatus, errorThrown) {

            $('#btnSalvar').removeClass("disabled");
            $("#btnSave").html('<i class=" bx bx-edit"></i> Editar');
        }
        , contentType: "application/json"
        , dataType: 'json'
    });

}

function edit(id) {

    let name = $('#name').val();
    let email = $('#email').val();
    let type = $('#typeUser').val();
    let password = $('#password').val();
    let passwordRepite = $('#passwordRepite').val();
    let status = $('#status').val();

    console.log(status)
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
    if (password) {

        if (password.length < 6) {
            Swal.fire({
                icon: 'error'
                , title: 'Oops...'
                , text: 'Digite no minimo 6 digitos na senha'
                , footer: 'Qualquer dúvida entre em contato com o Suporte'
            });
            return;
        }

        if (password !== passwordRepite) {
            Swal.fire({
                icon: 'error'
                , title: 'Oops...'
                , text: 'As senhas não conferem '
                , footer: 'Qualquer dúvida entre em contato com o Suporte'
            });
            return;
        }


    }


    let data = JSON.stringify({
        name: name
        , email: email
        , password: password
        , type: type
        , status: status
        , user_id: id

    })


    $("#loading").removeClass('d-none');
    $.ajax({
        type: 'POST'
        , url: '/usuario/editar'
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
                    position: 'top-end',
                    icon: 'success',
                    title: 'Usuario editado com sucesso',
                    showConfirmButton: false,
                    timer: 1500,
                    onClose: () => {
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


function destroy(id, name) {
    Swal.fire({
        title: 'Deseja realmente excluir o serviço ' + name + ' ?',
        footer: "",
        text: "Atenção! A exclusão deste usuário ira apagar todo o histórico do mesmo",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim',
        cancelButtonText: 'Não'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: 'POST',
                url: '/servicos/excluir',
                data: JSON.stringify({
                    service_id: id
                }),
                success: function (data) {
                    var retorno = $.parseJSON(JSON.stringify(data));
                    if (retorno['excluido'] == true) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Serviço excluido com sucesso',
                            showConfirmButton: false,
                            timer: 1500,
                            onClose: () => {
                                $(location).attr('href', '/cadastro/servicos')
                            }
                        })
                    }
                },
                contentType: "application/json",
                dataType: 'json'
            });
        }
    });

}

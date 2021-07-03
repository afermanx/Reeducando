function startModal() {

    $("#senhaExibir").hide();
    $("#exibirInput2").show();
    $("#password").show();
    $("#passwordRepite").show();
    $("#showStatus").hide();
    $("#showMessage").hide();

    $("#usersTitleModal").html('<h5>Cadastro de usuarios</h5>');
    $('#usersModal').modal('show');
}

function closeModal() {
    $("#usersModal").modal('hide')
}

function save() {
    let name = $('#name').val();
    let email = $('#email').val();
    let type = $('#typeUser').val();
    let cpf = $('#cpf').val();
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

    if (!email && type==='ADMINISTRADOR') {
        Swal.fire({
            icon: 'error'
            , title: 'Oops...'
            , text: 'Digite o e-mail completo para continuarmos'
            , footer: 'Qualquer dúvida entre em contato com o Suporte'
        });
        return;
    }
    if (!cpf && type==='ADMINISTRADOR') {
        Swal.fire({
            icon: 'error'
            , title: 'Oops...'
            , text: 'Digite o seu CPF para continuarmos'
            , footer: 'Qualquer dúvida entre em contato com o Suporte'
        });
        return;
    }

    if(password && type==='ADMINISTRADOR'){
        if (password.length < 6) {
            Swal.fire({
                icon: 'error'
                , title: 'Oops...'
                , text: 'Digite no minimo 6 digitos na senha'
                , footer: 'Qualquer dúvida entre em contato com o Suporte'
            });
            return;
        }


        if (password !== passwordRepite && type==='ADMINISTRADOR') {
            Swal.fire({
                icon: 'error'
                , title: 'Oops...'
                , text: 'As senhas não conferem '
                , footer: 'Qualquer dúvida entre em contato com o Suporte'
            });
            return;
        }

    }else {


        const generatePass = Math.random().toString(36).slice(-10);





        Swal.fire({
            icon: 'warning',
            title: 'Atenção: Senha padrão gerada',
            text: "Senha: "+generatePass,
            footer: 'Senha gerada automaticamente  pois os campos senha não foram preenchidas',
            timer: 4000,
            didOpen: () => {
                timerInterval = setInterval(() => {
                    // limpar isso aqui
                    const content = Swal.getContent()
                    if (content) {
                        const b = content.querySelector('b')
                        if (b) {
                            b.textContent = Swal.getTimerLeft()
                        }
                    }
                }, 100)
            },
            willClose: () => {
                clearInterval(timerInterval)
            }
        }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {

                let data = JSON.stringify({
                    name: name
                    , email: email
                    , password: generatePass
                    , type: type
                    , cpf:cpf
                    , status:'Mudar Senha'

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
                                $('#usersModal').modal('show');

                            }
                            Swal.fire({
                                icon: 'error'
                                , title: 'Oops...'
                                , html: mensagem
                                , footer: 'Qualquer dúvida entre em contato com o Suporte'
                            });
                            return;

                        } else if (retorno['sucesso'] == true) {

                            if(type==="ADMINISTRADOR"){
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Usuario cadastrado com sucesso',
                                    showConfirmButton: false,
                                    timer: 1500,
                                    onClose: () => {
                                        $(location).attr('href', '/cadastro/usuarios')
                                    }
                                })
                            }
                            if(type==="DETENTO"){
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Detento cadastrado com sucesso',
                                    showConfirmButton: false,
                                    timer: 1500,
                                    onClose: () => {
                                        $(location).attr('href', '/cadastro/detentos')
                                    }
                                })
                            }

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
        })

        return;

    }

    let data = JSON.stringify({
        name: name
        , email: email
        , password: password
        , type: type
        , cpf:cpf
        , status:'Inativo'

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
                    ,showConfirmButton:true ,
                }).then((result) => {
                    if (result) {
                        $("#usersModal").modal('show')
                    }
                });
                return;

            } else if (retorno['sucesso'] == true) {

                if(type==="ADMINISTRADOR"){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Usuario cadastrado com sucesso',
                        showConfirmButton: false,
                        timer: 1500,
                        onClose: () => {
                            $(location).attr('href', '/cadastro/usuarios')
                        }
                    })
                }else if(type==="DETENTO"){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Detento cadastrado com sucesso',
                        showConfirmButton: false,
                        timer: 1500,
                        onClose: () => {
                            $(location).attr('href', '/cadastro/detentos')
                        }
                    })
                }
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


    $("#senhaExibir").show();
    $("#exibirInput2").hide();
    $("#password").hide();
    $("#passwordRepite").hide();
    $("#showStatus").show();
    $("#showMessage").show();
    $('#senhaExibir').change(function () {
        $("#showMessage").toggle(500);
        $('#exibirInput2').toggle();
        $('#password').toggle();
        $('#passwordRepite').toggle();
    });


    $.ajax({
        type: 'POST'
        , url: '/usuario/mostrar'
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
                $('#name').val(retorno['users']['name']);
                $('#email').val(retorno['users']['email']);
                $('#cpf').val(retorno['users']['cpf']);
                $('#typeUser').val(retorno['users']['type']).change();
                $('#status').val(retorno['users']['status']).change();


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
    let cpf = $('#cpf').val();
    let email = $('#email').val();
    let type = $('#typeUser').val();
    let password = $('#password').val();
    let passwordRepite = $('#passwordRepite').val();
    let status = $('#status').val();

    console.log(status)
    if (!name ) {
        Swal.fire({
            icon: 'error'
            , title: 'Oops...'
            , text: 'Digite o nome completo para continuarmos'
            , footer: 'Qualquer dúvida entre em contato com o Suporte'
        });
        return;
    }

    if (!email && type==='ADMINISTRADOR') {
        Swal.fire({
            icon: 'error'
            , title: 'Oops...'
            , text: 'Digite o e-mail completo para continuarmos'
            , footer: 'Qualquer dúvida entre em contato com o Suporte'
        });
        return;
    }
    if (!cpf) {
        Swal.fire({
            icon: 'error'
            , title: 'Oops...'
            , text: 'Digite o CPF para continuarmos'
            , footer: 'Qualquer dúvida entre em contato com o Suporte'
        });
        return;
    }
    if (password & type==='ADMINISTRADOR') {

        if (password.length < 6) {
            Swal.fire({
                icon: 'error'
                , title: 'Oops...'
                , text: 'Digite no minimo 6 digitos na senha'
                , footer: 'Qualquer dúvida entre em contato com o Suporte'
            });
            return;
        }

        if (password !== passwordRepite & type==='ADMINISTRADOR') {
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
        , cpf: cpf
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

function editPerfil(id) {

    let name = $('#name').val();
    let email = $('#email').val();
    let cpf = $('#cpf').val();
    let type = $('#typeUser').val();
    let password = $('#password').val();
    let passwordRepite = $('#passwordRepite').val();
    let status = "Ativo"

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
    if (!cpf && type==='ADMINISTRADOR' ) {
        Swal.fire({
            icon: 'error'
            , title: 'Oops...'
            , text: 'Digite o seu CPF para continuarmos'
            , footer: 'Qualquer dúvida entre em contato com o Suporte'
        });
        return;
    }


    if (password && type==='ADMINISTRADOR' ) {

        if (password.length < 6) {
            Swal.fire({
                icon: 'error'
                , title: 'Oops...'
                , text: 'Digite no minimo 6 digitos na senha'
                , footer: 'Qualquer dúvida entre em contato com o Suporte'
            });
            return;
        }

        if (password !== passwordRepite ) {
            Swal.fire({
                icon: 'error'
                , title: 'Oops...'
                , text: 'As senhas não conferem '
                , footer: 'Qualquer dúvida entre em contato com o Suporte'
            });
            return;
        }

        let data = JSON.stringify({
            name: name
            , email: email
            , cpf: cpf
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
                            $(location).attr('href', '/logout')
                        }
                    })
                }

            }
            , error: function (XMLHttpRequest, textStatus, errorThrown) {


            }
            , contentType: "application/json"
            , dataType: 'json'
        });



    }else{
        let data = JSON.stringify({
            name: name
            , email: email
            , cpf: cpf
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
                            $(location).attr('href', '/usuario/perfil')
                        }
                    })
                }

            }
            , error: function (XMLHttpRequest, textStatus, errorThrown) {


            }
            , contentType: "application/json"
            , dataType: 'json'
        });
    }
}


function destroy(id, name, type) {
    Swal.fire({
        title: 'Deseja realmente excluir o usuário ' + name + ' ?',
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
                url: '/usuario/excluir',
                data: JSON.stringify({
                    user_id: id,
                    type:type
                }),
                success: function (data) {
                    var retorno = $.parseJSON(JSON.stringify(data));
                    if (retorno['excluido'] == true) {
                      if(type==='ADMINISTRADOR'){
                          Swal.fire({
                              position: 'top-end',
                              icon: 'success',
                              title: 'Usuario excluido com sucesso',
                              showConfirmButton: false,
                              timer: 1500,
                              onClose: () => {
                                  $(location).attr('href', '/cadastro/usuarios')
                              }
                          })
                      }

                      if(type==='DETENTO'){
                          Swal.fire({
                              position: 'top-end',
                              icon: 'success',
                              title: 'Detento excluido com sucesso',
                              showConfirmButton: false,
                              timer: 1500,
                              onClose: () => {
                                  $(location).attr('href', '/cadastro/detentos')
                              }
                          })
                      }
                    }
                },
                contentType: "application/json",
                dataType: 'json'
            });
        }
    });

}

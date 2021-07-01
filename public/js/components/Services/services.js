

function startModal() {


    $("#servicesTitleModal").html('<h5>Cadastro de serviços</h5>');
    $('#servicesModal').modal('show');
}

function closeModal() {
    $("#servicesModal").modal('hide')
}

function save() {
    let name = $('#name').val();
    let description = $('#description').val();
    let value = $("#value").maskMoney("unmasked")[0]
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
   $('#servicesModal').modal('hide');


}

function show(id) {



    $.ajax({
        type: 'POST'
        , url: '/servicos/mostrar'
        , data: JSON.stringify({
            service_id: id
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


                $("#servicesTitleModal").html('<h5>Editar de Serviços</h5>');

                $("#btnSave").html('<i class=" bx bx-edit"></i> Editar');

                $("#btnSave").attr("onclick", 'edit(' + id + ')');
                $('#servicesModal').modal('show');
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
        ,service_id:id

    })


    console.log(data)


    $("#loading").removeClass('d-none');
    $.ajax({
        type: 'POST'
        , url: '/servicos/editar'
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
    $('#servicesModal').modal('hide');


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

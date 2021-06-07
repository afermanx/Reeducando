@extends('themes.Admin.adminLayout')
@section('titleAdmin','Reeducando | Ordens de Serviços')
@section('breadName','Ordens de Serviços')<!--Destaque do mapa de url-->
@section('breadItem','Ordens de Serviços')<!--Meio do mapa-->


@section('content')
    <div class="card mb-30">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3><i class="bx bxs-notepad"></i> Ordens de Serviços</h3>

            <div class="dropdown">
                <a class="btn btn-outline-primary " type="button" data-toggle="tooltip"
                   href="{{route('Admin.os.register')}}"
                   data-placement="top"
                   title="Novo Serviço"
                   aria-haspopup="true" aria-expanded="false"><i class="bx bx-plus"></i>

                </a>

            </div>
        </div>

        <div class="card-body">

            <div class="row">
                <div class="col-xl-12">


                    <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>

                            <th class="d-none d-sm-table-cell">Data</th>
                            <th class="d-none d-sm-table-cell">Serviço</th>
                            <th class="d-none d-sm-table-cell">Cliente</th>
                            <th class="d-none d-sm-table-cell">Responsável</th>
                            <th class="d-none d-sm-table-cell">Valor R$</th>
                            <th class="d-none d-sm-table-cell">Status</th>
                            <th class="d-none d-sm-table-cell">Opções</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($ordens as $ordem)
                            <tr>
                                <td class="text-center">{{$ordem->id}}</td>
                                <td class="font-w600">
                                    <a href="">{{(new DateTime($ordem->dataInicio))->format('d/m/Y')}}</a>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <em class="text-muted">{{$ordem->Servico}}</em>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <em class="text-muted">{{$ordem->Cliente}}</em>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <em class="text-muted">{{$ordem->Detento}}</em>
                                </td>
                                <td>
                                    <em class="text-muted">{{number_format( $ordem->valor ,2,",",".").' R$'}}</em>
                                </td>
                                <td class="d-none d-sm-table-cell" style="font-size: 15px ">
                                    @if($ordem->status ==="AGUARDANDO")
                                        <span class="badge badge-info">{{$ordem->status}}</span>
                                    @endif
                                    @if($ordem->status ==="FALTA")
                                        <span class="badge badge-warning"
                                              style="color: white">FALTA: {{number_format( $ordem->valorAtual ,2,",",".").' R$'}}</span>
                                    @endif


                                </td>


                                <td>
                                    <em class="text-muted">

                                        <button class="btn btn-outline-primary bx bx-window-close"
                                                onclick="finalizarOS({{$ordem->id}},'{{$ordem->Servico}}', {{$ordem->valorAtual}})"
                                                data-toggle="tooltip" data-placement="top"
                                                title="Finalizar Ordem de Serviço">
                                        </button>

                                        @if($user->type==="ADMINISTRADOR")
                                            <button class="btn btn-outline-info bx bx-edit"
                                                    onclick="show({{$ordem->id}})"
                                                    data-toggle="tooltip" data-placement="top"
                                                    title="Editar Ordem de Serviço">
                                            </button>
                                            <button class="btn btn-outline-danger bx bx-trash"
                                                    onclick="destroy({{$ordem->id}},'{{$ordem->Servico}}')"
                                                    data-toggle="tooltip" data-placement="top"
                                                    title="Deletar Ordem de Serviço">
                                            </button>
                                        @endif

                                    </em>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade basicModalSM" id="modalFinalizarOS" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header" id="TitleModal">
                    <h5 class="modal-title">Finalizar Ordem de Serviço</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-group mb-3 ">
                                <label class="input-group mb-3" for="edtValor">Valor a Receber:</label>

                                <input type="text" class="form-control " disabled value="" id="edtValorReceber">

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-group mb-3 ">
                                <label class="input-group mb-3" for="edtValor">Valor Recebido :</label>

                                <input type="text" class="form-control " value="" id="edtValorRecebimento"
                                       placeholder="Valor de recebimento">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnFinalizar" onclick="" class="btn btn-primary"><i
                            class="bx bx-check-double"></i> Finalizar
                    </button>
                    <button type="button" class="btn btn-secondary" id="cancelar" data-dismiss="modal"><i
                            class="bx bx-trash"></i>Cancelar
                    </button>

                </div>
            </div>
        </div>
    </div>

@endsection


@section('jsAdmin')
    <script src="{{asset('js/plugins/jquery.mask.js')}}"></script>
    <script src="{{asset('js/components/jquery.maskMoney.min.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });

        jQuery(function () {
            $("#edtValorRecebimento").maskMoney({
                prefix: 'R$ ',
                showSymbol: true,
                thousands: '.',
                decimal: ',',
                symbolStay: true,
                allowZero: true,
                defaultZero: false
            });

        })


        function finalizarOS(id, name, valor) {

            $("#TitleModal").html('<h>' + name + '</h>');
            $("#edtValorReceber").val('R$ ' + valor + ',00')


            $('#modalFinalizarOS').modal('show');

            $("#btnFinalizar").attr("onclick", 'finalizar(' + id + ',' + valor + ')');
        }

        $('#cancelar').click(function () {
            $('#edtValorRecebimento').val("");
        })

        function finalizar(id, valor) {


            let valorRecebido = $("#edtValorRecebimento").maskMoney("unmasked")[0]


            if (!valorRecebido) {
                Swal.fire({
                    icon: 'error'
                    , title: 'Oops...'
                    , text: 'Para finalizar informe o valor recebido.'
                    , footer: 'Qualquer dúvida entre em contato com o Suporte'
                });
                return;
            }

            if (valorRecebido < valor) {

                const calculo = valor - valorRecebido





                Swal.fire({
                    title: 'O valor recebido é inferior ao valor do serviço',
                    text: "Deseja Receber mesmo assim ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText:'Cancelar',
                    confirmButtonText: 'Sim, Receber!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        let data = JSON.stringify({
                          calculo:calculo,
                          valorRecebido:valorRecebido,
                           os_id: id

                        })

                        console.log(data)

                        $.ajax({
                            type: 'POST'
                            , url: '{{route('Admin.os.finalizar')}}'
                            , data: data,
                            success: function (data) {
                                const retorno = $.parseJSON(JSON.stringify(data));

                                $("#btnFinalizar").html('<i class="bx bx-add-to-queue"></i> Efetuar Cadastro');
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

                                    Swal.fire(
                                        {
                                            icon:'success',
                                            title:'Recebido com sucesso!',
                                            text:'Valor pendente: '+calculo,
                                            showConfirmButton: false,
                                            timer: 1500,
                                        }

                                    )

                                    $(location).attr('href', '/os')


                                }

                            }
                            , error: function (XMLHttpRequest, textStatus, errorThrown) {


                            }
                            , contentType: "application/json"
                            , dataType: 'json'
                        });

                        $('#edtValorRecebimento').val("");
                        $('#modalFinalizarOS').modal('hide');
                    }


                })



            }

            if (valorRecebido >= valor) {
                let calculo = valorRecebido - valor
              if (calculo===0){
                  alert("quitado")                //Condição par expor se tera troco ou não para cliente...
              }else{
                  alert('troco de: '+calculo)
              }




            }


        }

        function destroy(id, name) {
            Swal.fire({
                title: 'Deseja realmente excluir a Ordem de Serviço ' + name + ' ?',
                footer: "",
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
                        url: '/os/excluir',
                        data: JSON.stringify({
                            os_id: id
                        }),
                        success: function (data) {
                            var retorno = $.parseJSON(JSON.stringify(data));
                            if (retorno['excluido'] == true) {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Ordem de Serviço excluido com sucesso',
                                    showConfirmButton: false,
                                    timer: 1500,

                                })
                                $(location).attr('href', '{{route('Admin.os')}}')
                            }
                        },
                        contentType: "application/json",
                        dataType: 'json'
                    });
                }
            });

        }


    </script>

@endsection


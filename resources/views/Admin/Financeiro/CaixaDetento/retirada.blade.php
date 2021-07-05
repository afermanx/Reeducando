@extends('themes.Admin.adminLayout')
@section('titleAdmin','Reeducando | Caixa')
@section('breadName','Caixa - '.$cxDetento->name)<!--Destaque do mapa de url-->
@section('breadItem','Financeiro')<!--Meio do mapa-->
@section('breadcrumb')
    <li class="item">Caixa</li><!--Pagina atual-->
    <li class="item">{{$cxDetento->name}}</li><!--Pagina atual-->
@endsection

@section('content')

    <div class="ecommerce-stats-area">
        <div class="row justify-content-center">
            <div class="col-lg-3 ">
                <div class="single-stats-card-box">
                    <div class="icon">
                        <i class='bx bxs-badge-dollar'></i>
                    </div>
                    <span class="sub-title">Valor em caixa do detento</span>
                    <h3>R$ {{number_format( $cxDetento->valor ,2,",",".")}} </h3>
                </div>
                <br>
                <div class="input-group mb-3">
                    <input type="text" id="edtValor" class="form-control" placeholder="Valor a ser sacado"><br>


                </div>
                <div class="input-group mb-3">
                    <textarea id="edtDescription" style="resize: none" cols="33" rows="5" class="form-control" placeholder="Justificativa da retirda" ></textarea>

                </div>
                <button class="btn btn-outline-dark" type="button" id="button-addon2"
                        onclick="retirar({{$cxDetento->id}})"><span id="loading" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span> Retirar
                </button>


            </div>


        </div>
        <hr>
        <div class="row">
            <div class="col-xl-12">


                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                    <thead>
                    <tr>

                        <th class="d-none d-sm-table-cell">Data</th>
                        <th class="d-none d-sm-table-cell">Descrição</th>
                        <th class="d-none d-sm-table-cell">Valor </th>

                        <th class="d-none d-sm-table-cell">Status</th>



                    </tr>
                    </thead>

                    <tbody>
                    @foreach($detentoRetiradas as $detentoRetirada)

                        <tr>
                            <td class="text-center">{{(new DateTime($detentoRetirada->updated_at))->format('d/m/Y')}}</td>
                            <td class="font-w600">
                                <a href="">{{$detentoRetirada->description}}</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <em class="text-muted">{{$detentoRetirada->valor}}</em>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge badge-danger" style="color: white" > Retirada <i class="bx bx-arrow-to-bottom"></i></span>
                            </td>






                        </tr>

                    @endforeach

                    </tbody>

                </table>
            </div>

        </div>
    </div>
    <!-- End Stats Area -->




@endsection
@section('jsAdmin')
    <script src="{{asset('js/plugins/jquery.mask.js')}}"></script>
    <script src="{{asset('js/components/jquery.maskMoney.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });


        jQuery(function () {
            $("#edtValor").maskMoney({
                prefix: 'R$ ',
                showSymbol: true,
                thousands: '.',
                decimal: ',',
                symbolStay: true,
                allowZero: true,
                defaultZero: false
            });


        })


        function retirar(id) {

            let valor = $("#edtValor").maskMoney("unmasked")[0]
            let description= $("#edtDescription").val()


            if (!valor) {
                Swal.fire({
                    icon: 'error'
                    , title: 'Oops...'
                    , text: 'Informe o valor a ser retirado'
                    , footer: 'Qualquer dúvida entre em contato com o Suporte'
                });
                return;
            }
            if (!description) {
                Swal.fire({
                    icon: 'error'
                    , title: 'Oops...'
                    , text: 'Por favor Justifique a Retirada'
                    , footer: 'Qualquer dúvida entre em contato com o Suporte'
                });
                return;
            }

            if (valor > {{$cxDetento->valor}}) {
                Swal.fire({
                    icon: 'error'
                    , title: 'Oops...'
                    , text: 'Este Valor é maior do que tem em caixa'
                    , footer: 'Qualquer dúvida entre em contato com o Suporte'
                });
                return;
            }

            let data = JSON.stringify({
                valor: valor,
                detento_id: id,
                description: description
            })
            $("#loading").removeClass('d-none');

            $.ajax({
                type: 'POST'
                , url: '{{route('Admin.caixa.detento.retirar')}}'
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
                        $("#loading").addClass('d-none');

                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Valor de R$ ' +valor+ ' retirado com sucesso',
                            showConfirmButton: false,
                            timer: 1500,
                            onClose: () => {
                                $(location).attr('href', '/caixa/detento/retirada/'+id)
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

    </script>



@endsection


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
                    <input type="text" id="edtValor" class="form-control" placeholder="Valor a ser sacado">
                    <div class="input-group-append">
                        <button class="btn btn-outline-dark" type="button" id="button-addon2"
                                onclick="retirar({{$cxDetento->id}})">Retirar
                        </button>
                    </div>
                </div>


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
                        <th class="d-none d-sm-table-cell">Opções</th>


                    </tr>
                    </thead>

                    <tbody>
                    @foreach($detentoRetiradas as $detentoRetirada)

                        <tr>
                            <td class="text-center">{{$detentoRetirada->updated_at}}</td>
                            <td class="font-w600">
                                <a href="">{{$detentoRetirada->description}}</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <em class="text-muted">{{$detentoRetirada->valor}}</em>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge badge-danger" style="color: white" ><i class="bx bx-arrow-to-bottom"></i></span>
                            </td>



                            <td>
                                <em class="text-muted">


                                        <a class="btn btn-outline-primary bx bxs-printer"
                                                        href="{{route('Admin.caixa.detento.recibo')}}"
                                                data-toggle="tooltip" data-placement="top"
                                                title="Finalizar Ordem de Serviço">Recibo
                                        </a>



                                </em>
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

    <script>


    </script>

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


            if (!valor) {
                Swal.fire({
                    icon: 'error'
                    , title: 'Oops...'
                    , text: 'Informe o valor a ser retirado'
                    , footer: 'Qualquer dúvida entre em contato com o Suporte'
                });
                return;
            }

            let data = JSON.stringify({
                valor: valor,
                detento_id: id
            })

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
                        var pdf = new jsPDF();
                        //var pdf = new jsPDF('p','in','letter');

                        pdf.setProperties({
                            title: 'Gerador de Recibos Tabajara',
                            subject: 'Recibo ' ,
                            author: 'vulture - balenpro@gmail.com',
                            keywords: 'gerador de recibos pessoal',
                            creator: 'gPDF, javascript, web 2.0, ajax'
                        });

                        // pdf.setDrawColor(0);
                        // pdf.setFillColor(255, 255, 255);
                        //  pdf.roundedRect(5, 8, 200, 18, 2, 2, 'FD'); //  Black sqaure with rounded corners

                        // pdf.addImage(imgData, 5, 30); // adicionando background
                        pdf.setFont("helvetica");
                        pdf.setFontType("normal");
                        pdf.setFontSize(22);
                        pdf.setTextColor(150); // cinza claro
                        pdf.text(20, 20, 'RECIBO ');
                        pdf.setTextColor(0); //isso deve ser preto
                        pdf.setFontSize(18);
                        pdf.text(120, 20, 'VALOR  R$ '+valor+',00');
                        pdf.setFontSize(12);
                        pdf.text(20, 50, '  Recebi(emos) de ',' CPF/CNPJ nº ' ,',a ');
                        pdf.text(20, 55, 'importancia de R$ '+valor+',00 referente a(o) ');
                        pdf.text(20, 65, '  E, para maior clareza firmo o presente recibo para que produza os seus efeitos, dando');
                        pdf.text(20, 70, 'plena, rasa e irrevogável quitação, pelo valor recebido.');
                        pdf.text(30, 80, ' ',' - Cacoal-RO','');
                        pdf.text(70, 90, '___________________________');
                        //	pdf.setLineWidth(0.5);
                        //	pdf.line(70, 90, 60, 25);
                        pdf.setFont("times");
                        pdf.setFontType("italic");
                        pdf.text(90, 95, ' ');
                        pdf.setFont("helvetica");
                        pdf.setFontType("normal");
                        pdf.setFontSize(10);
                        pdf.text(70, 105, '   ',' CPF/CNPJ: ');
                        pdf.text(60, 110, 'E-mail: ','Fone: ');
                        pdf.text(10, 120, ' --------------------------------------------------------------- 1a via cliente ---------------------------------------------------------------------');




                        pdf.save('recibo_','_','.pdf');


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


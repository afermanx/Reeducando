@extends('themes.Admin.adminLayout')
@section('titleAdmin','Reeducando | Caixa')
@section('breadName','Caixa')<!--Destaque do mapa de url-->
@section('breadItem','Financeiro')<!--Meio do mapa-->
@section('breadcrumb')
    <li class="item">Caixa</li><!--Pagina atual-->
@endsection

@section('content')

    <div class="ecommerce-stats-area">
        <div class="row">
            <div class="col-xl-6">
                <div class="single-stats-card-box" >
                    <div class="icon" style="background-color: #0E9A00">
                        <i class="bx bxs-badge-dollar"></i>
                    </div>
                    <span class="sub-title">Caixa Detento</span>
                    <h3 style="color: #1f292e">R$ {{number_format( $cxDetento ,2,",",".")}}<span class="badge badge-red"><a href="{{route('Admin.caixa.detento')}}" type="button" class="badge-info">Visualizar</a></span></h3>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="single-stats-card-box">
                    <div class="icon" style="background-color: #0f74a8">
                        <i class="bx bxs-badge-dollar"></i>
                    </div>
                    <span class="sub-title">Caixa Oficina</span>
                    <h3 style="color: #1f292e">R$ {{number_format( $cxOficina ,2,",",".")}} <span class="badge badge-red"><a href="/caixa/oficina/retirada/1" type="button" class="badge-info">Visualizar</a> </span></h3>
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

                        <th class="d-none d-sm-table-cell" >Data</th>
                        <th class="d-none d-sm-table-cell" >Descrição</th>
                        <th class="d-none d-sm-table-cell" >Valor Serviço</th>
                        <th class="d-none d-sm-table-cell" >Valor Recebido</th>
                        <th class="d-none d-sm-table-cell">Valor detento</th>
                        <th class="d-none d-sm-table-cell">Valor Oficina </th>
                        <th class="d-none d-sm-table-cell">Status</th>

                    </tr>
                    </thead>

                    <tbody>
                    @foreach($transacoes as $transacao)
                        <tr>
                            <td class="text-center">{{(new DateTime($transacao->updated_at))->format('d/m/Y')}}</td>
                            <td class="font-w600">
                                <a href="">{{$transacao->description}}</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <em class="text-muted">R$ {{number_format( $transacao->valor ,2,",",".")}}</em>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <em class="text-muted">R$ {{number_format($transacao->valorRecebido ,2,",",".")}}</em>
                            </td>
                            <td>
                                <em class="text-muted">R$ {{number_format( $transacao->valorDetento ,2,",",".")}}</em>
                            </td>
                            <td class="text-muted">R$ {{number_format( $transacao->valorOficina ,2,",",".")}}</td>

                            <td class="d-none d-sm-table-cell text-center">
                                @if($transacao->status ==="UP")
                                    <span class="badge badge-success"><i class="bx bx-arrow-to-top"></i></span>
                                @endif
                                @if($transacao->status ==="DOWN")
                                    <span class="badge badge-danger" style="color: white" ><i class="bx bx-arrow-to-bottom"></i></span>
                                @endif


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
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });


    </script>



@endsection


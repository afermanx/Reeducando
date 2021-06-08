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
                    <h3 style="color: #1f292e">15.1k R$ <span class="badge badge-red"><button type="button" class="badge-info">Visualizar</button> </span></h3>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="single-stats-card-box">
                    <div class="icon" style="background-color: #0f74a8">
                        <i class="bx bxs-badge-dollar"></i>
                    </div>
                    <span class="sub-title">Caixa Oficina</span>
                    <h3 style="color: #1f292e">15.1k R$ <span class="badge badge-red"><button type="button" class="badge-info">Visualizar</button> </span></h3>
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
                        <th class="d-none d-sm-table-cell" >Valor R$</th>
                        <th class="d-none d-sm-table-cell">Valor detento R$</th>
                        <th class="d-none d-sm-table-cell">Valor Oficina R$</th>
                        <th class="d-none d-sm-table-cell">Status</th>

                    </tr>
                    </thead>

                    <tbody>
{{--                    @foreach($services as $service)--}}
{{--                        <tr>--}}
{{--                            <td class="text-center">{{$service->id}}</td>--}}
{{--                            <td class="font-w600">--}}
{{--                                <a href="">{{$service->name}}</a>--}}
{{--                            </td>--}}
{{--                            <td class="d-none d-sm-table-cell">--}}
{{--                                <em class="text-muted">{{$service->description}}</em>--}}
{{--                            </td>--}}
{{--                            <td>--}}
{{--                                <em class="text-muted">{{number_format( $service->value ,2,",",".").' R$'}}</em>--}}
{{--                            </td>--}}
{{--                            <td class="d-none d-sm-table-cell">{{number_format( $service->detainee ,2,",",".").'%'}}</td>--}}
{{--                            <td class="d-none d-sm-table-cell">{{number_format( $service->workshop ,2,",",".").'%'}}</td>--}}
{{--                            <td class="d-none d-sm-table-cell">--}}
{{--                                @if($service->status ==="Ativo")--}}
{{--                                    <span class="badge badge-success">{{$service->status}}</span>--}}
{{--                                @endif--}}
{{--                                @if($service->status ==="Inativo")--}}
{{--                                    <span class="badge badge-danger" style="color: white6" >{{$service->status}}</span>--}}
{{--                                @endif--}}


{{--                            </td>--}}


{{--                            <td>--}}
{{--                                <em class="text-muted">--}}
{{--                                    <button class="btn btn-outline-info bx bx-edit"--}}
{{--                                            onclick="show({{$service->id}})"--}}
{{--                                            data-toggle="tooltip" data-placement="top"--}}
{{--                                            title="Editar serviço">--}}
{{--                                    </button>--}}
{{--                                    <button class="btn btn-outline-danger bx bx-trash"--}}
{{--                                            onclick="destroy({{$service->id}},'{{$service->name}}')"--}}
{{--                                            data-toggle="tooltip" data-placement="top"--}}
{{--                                            title="Deletar serviço">--}}
{{--                                    </button>--}}

{{--                                </em>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                    @endforeach--}}
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


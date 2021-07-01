@extends('themes.Admin.adminLayout')
@section('titleAdmin','Reeducando | Serviços')
@section('breadName','Serviços')<!--Destaque do mapa de url-->
@section('breadItem','Cadastro')<!--Meio do mapa-->
@section('breadcrumb')
    <li class="item">Serviços</li><!--Pagina atual-->
@endsection

@section('content')
    <div class="card mb-30">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3><i class="bx bxs-group"></i> Lista de Serviços</h3>

            <div class="dropdown">
                <button class="btn btn-outline-primary " type="button" data-toggle="tooltip"
                        onclick="startModal()"
                        data-placement="top"
                        title="Novo Serviço"
                        aria-haspopup="true" aria-expanded="false"><i class="bx bxs-wrench">+</i>

                </button>

            </div>
        </div>

        <div class="card-body">

            <div class="row">
                <div class="col-xl-12">


                    <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                        <thead>
                        <tr>
                            <th class="text-center" >#</th>
                            <th class="d-none d-sm-table-cell" >Nome</th>
                            <th class="d-none d-sm-table-cell" >Descrição</th>
                            <th class="d-none d-sm-table-cell" >Valor R$</th>
                            <th class="d-none d-sm-table-cell">% Detento</th>
                            <th class="d-none d-sm-table-cell">% Oficina</th>
                            <th class="d-none d-sm-table-cell">Status</th>
                            <th class="d-none d-sm-table-cell">Opções</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($services as $service)
                            <tr>
                                <td class="text-center">{{$service->id}}</td>
                                <td class="font-w600">
                                    <a href="">{{$service->name}}</a>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <em class="text-muted">{{$service->description}}</em>
                                </td>
                                <td>
                                    <em class="text-muted">{{number_format( $service->value ,2,",",".").' R$'}}</em>
                                </td>
                                <td class="d-none d-sm-table-cell">{{number_format( $service->detainee ,2,",",".").'%'}}</td>
                                <td class="d-none d-sm-table-cell">{{number_format( $service->workshop ,2,",",".").'%'}}</td>
                                <td class="d-none d-sm-table-cell">
                                    @if($service->status ==="Ativo")
                                        <span class="badge badge-success">{{$service->status}}</span>
                                    @endif
                                    @if($service->status ==="Inativo")
                                        <span class="badge badge-danger" style="color: white6" >{{$service->status}}</span>
                                    @endif


                                </td>


                                <td>
                                    <em class="text-muted">
                                        <button class="btn btn-outline-info bx bx-edit"
                                                onclick="show({{$service->id}})"
                                                data-toggle="tooltip" data-placement="top"
                                                title="Editar serviço">
                                        </button>
                                        <button class="btn btn-outline-danger bx bx-trash"
                                                onclick="destroy({{$service->id}},'{{$service->name}}')"
                                                data-toggle="tooltip" data-placement="top"
                                                title="Deletar serviço">
                                        </button>

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
    <div class="modal fade basicModalLG" id="servicesModal" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="servicesTitleModal">Large modal</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card user-settings-box mb-30">
                        <div class="card-body">
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Atenção.</strong> Os campos com <span style="color:red">*</span> são
                                obrigatórios.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form>

                                <h3><i class='bx bx-detail'></i>Detalhes</h3>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><span style="color:red">*</span> Nome:</label>
                                            <input type="text" id='name' class="form-control"
                                                   placeholder="Exemplo: INSULFIM CARRO">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><span style="color:red"></span> Descrição:</label>
                                            <input type="text" id='description' class="form-control"
                                                   placeholder="Descrição do serviço">
                                        </div>
                                    </div>
                                </div>


                                <h3><i class='bx bx-money'></i> Logistica</h3>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label><span style="color:red">*</span> Valor:</label>
                                            <input type="text" id='value' class="form-control"
                                                   placeholder="Exemplo: 0.000,00">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label><span style="color:red"></span>Percentual Detento:</label>
                                            <input type="text" id='detainee' class="form-control"
                                                   placeholder="Exemplo: 00,0">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label><span style="color:red"></span> Percentual Oficina:</label>
                                            <input type="text" id='workshop' class="form-control"
                                                   placeholder="Exemplo:00,00">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-6" id="showStatus">
                                        <div class="form-group">
                                            <label> <span style="color:red">*</span>Status</label>
                                            <select id="status" class="form-control">
                                                <option value="Ativo"><span class="badge badge-success">Ativo</span>
                                                </option>

                                                <option value="Inativo"><span class="badge badge-danger">Inativo</span>
                                                </option>


                                            </select>
                                        </div>
                                    </div>
                                </div>



                            </form>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-6 text-left">
                            <button type="button" id="btnClose" onclick="closeModal()"
                                    class="btn btn-outline-danger  text-left"><i class="bx bxs-save"></i> Fechar

                            </button>
                        </div>
                        <div class="col-xl-6 text-right">
                            <button type="button" id="btnSave" onclick="save()"
                                    class="btn btn-outline-primary  text-right"><i class="bx bxs-save"></i> Salvar
                                <span id="loading" class="spinner-border spinner-border-sm d-none" role="status"
                                      aria-hidden="true">
                                </span>
                            </button>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>



@endsection
@section('jsAdmin')
    <script src="{{asset('js/plugins/jquery.mask.js')}}"></script>
    <script src="{{asset('js/components/jquery.maskMoney.min.js')}}"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });
        jQuery(function () {
            $("#value").maskMoney({
                prefix: 'R$ ',
                showSymbol: true,
                thousands: '.',
                decimal: ',',
                symbolStay: true,
                allowZero: true,
                defaultZero: false
            });


        })


    </script>

    <script src="{{asset('js/components/Services/services.js')}}"></script>

@endsection


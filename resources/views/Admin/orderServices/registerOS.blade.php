@extends('themes.Admin.adminLayout')
@section('titleAdmin','Reeducando | Ordens de Serviços')
@section('breadName','Orden de Serviço')<!--Destaque do mapa de url-->
@section('breadItem','Orden de Serviço')<!--Meio do mapa-->
@section('breadcrumb')
    <li class="item">Cadastrar</li><!--Pagina atual-->
@endsection

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>
    <style>
        .select2-selection__rendered {
            line-height: 31px !important;
        }

        .select2-container .select2-selection--single {
            height: 47px !important;
        }

        .select2-selection__arrow {
            height: 34px !important;
        }

        .divResultado {
            overflow: auto;
            height: 400px;
        }

        .modal-lg2 {
            width: 80% !important;
            /* New width for large modal */
        }

        .divResultado {
            overflow: auto;
            height: 500px;
        }
    </style>
@endsection


@section('content')
    <div class="card mb-30">

        <div class="card user-settings-box mb-30">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3></h3>

                <div class="dropdown">
                    <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class='bx bx-dots-horizontal-rounded' ></i>
                    </button>
                    <div class="dropdown-menu">

                        <button  onclick="novoServiço()" class="dropdown-item  d-flex align-items-center" href="#">
                            <i class='bx bx-edit-alt'></i> Novo Serviço
                        </button>
                        <button class="dropdown-item d-flex align-items-center" href="#">
                            <i class='bx bx-edit-alt'></i> Novo Cliente
                        </button>
                        <button class="dropdown-item d-flex align-items-center" href="#">
                            <i class='bx bx-edit-alt'></i> Novo detento
                        </button>

                    </div>
                </div>
            </div>

            <div class="card-body">

                <form>
                    <h3><i class='bx bxs-wrench'></i> Serviço </h3>

                    <div class="row">
                        <div class="col-lg-2">
                            <div class="input-group mb-3">
                                <label  class="input-group mb-3" for="edtData">Data :</label>

                                <input type="date" class="form-control" id="edtData" >

                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="input-group mb-3">
                                <label  class="input-group mb-3" for="cbServico">Serviço :</label>

                                <select class="custom-select" id="cbServico" onChange="update()">
                                    @foreach($servicos as $servico)
                                        <option value="{{$servico->value}}">{{$servico->name}}</option>

                                    @endforeach
                                </select>
                                <input type="text" class="form-control d-none "  value="" id="edtServico"
                                       placeholder="Nome do Serviço">

                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="input-group mb-3 ">
                                <label  class="input-group mb-3" for="edtValor">Valor :</label>

                                <input type="text" class="form-control "  value="" id="edtValor"
                                       placeholder="Valor do Serviço">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="input-group mb-3">
                                <label  class="input-group mb-3" for="cbCliente">Cliente :</label>

                                <select class="custom-select" id="cbCliente">
                                    <option selected value="">Selecione uma das Opções</option>
                                    @foreach($clientes as $cliente)
                                        <option value="{{$cliente->id}}">{{$cliente->name}}</option>

                                    @endforeach
                                </select>
                                <input type="text" class="form-control d-none"  value="" id="edtCliente"
                                       placeholder="Digite o nome do cliente">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="input-group mb-3">
                                <label  class="input-group mb-3" for="cbDetento"> Responsável:</label>

                                <select class="custom-select"  id="cbDetento">
                                    <option selected value="">Selecione uma das Opções</option>
                                    @foreach($detentos as $detento)
                                        <option value="{{$detento->id}}">{{$detento->name}}</option>

                                    @endforeach
                                </select>

                                <input type="text" class="form-control d-none"  value="" id="edtDetento"
                                       placeholder="Digite o nome do Responsável">

                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-6">
                            <div class="btn-box text-left">
                                <button type="button" class="btn btn-outline-primary" onclick="saveOs()"><i
                                        class='bx bx-save'></i> Salvar
                                </button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection
@section('jsAdmin')
    <script src="{{asset('js/plugins/jquery.mask.js')}}"></script>
    <script src="{{asset('js/components/jquery.maskMoney.min.js')}}"></script>
    <script src="{{asset('js/components/Os/os.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        function update() {
            let select = document.getElementById('cbServico');
            let option = select.options[select.selectedIndex];

            document.getElementById('edtValor').value = option.value;

        }

        update();
    </script>
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

            $("#cbServico").select2({
                placeholder: "Selecione ou cadastre um Serviço",
                allowClear: true,

            });
            $("#cbCliente").select2({
                placeholder: "Selecione ou cadastre um Cliente",
                allowClear: true,

            });
            $("#cbDetento").select2({
                placeholder: "Selecione ou cadastre um Responsável",
                allowClear: true,

            });




        })


    </script>






@endsection

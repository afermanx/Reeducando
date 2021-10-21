@extends('themes.Admin.adminLayout')
@section('titleAdmin','Relatórios | Serviços ')
@section('breadName', 'Relatórios')
@section('breadItem','Serviços')
@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>
    <style>
        .select2-selection__rendered {
            line-height: 34px !important;
        }


        .select2-container .select2-selection--single {
            height: 37px !important;
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
            height: 300px;
        }
    </style>
@endsection

@section('content')
    <div class="card user-settings-box mb-30">
        <div class="card-body">
            <form>
                <h3><i class='bx bxs-wrench'></i> Serviço </h3>
                <h4><i class='bx bxs-filter-alt'></i>Filtros: </h4>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="input-group mb-3">
                            <label  class="input-group mb-3" for="edtData">Data :</label>

                            <input type="date" class="form-control" id="edtData" >

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
                            <button type="button" class="btn btn-outline-primary" onclick="sireReportSewrvice()"><i
                                    class='bx bxs-file-pdf'></i> Gerar Relatório
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

            $("#cbDetento").select2({
                placeholder: "Filtrar por Detento",
                allowClear: true,

            });




        })


        function sireReportSewrvice(){
            alert('Gerando..')
        }
    </script>






@endsection

@extends('themes.Admin.adminLayout')
@section('titleAdmin','Reeducando | Ordens de Serviços')
@section('breadName','Ordens de Serviços')<!--Destaque do mapa de url-->
@section('breadItem','Ordens de Serviços')<!--Meio do mapa-->
@section('breadcrumb')
    <li class="item">Cadastrar</li><!--Pagina atual-->
@endsection


@section('content')
    <div class="card mb-30">

        <div class="card user-settings-box mb-30">
            <div class="card-body">
                <form>
                    <h3><i class='bx bxs-wrench'></i> Serviço </h3>

                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label>Data:</label>
                                <input type="text" class="form-control" id="edtData">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Serviços:</label>
                                <select class="form-control" id="cbServicos">
                                    @foreach($servicos as $servico)
                                        <option>{{ $servico->id }} - {{$servico->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label>Valor:</label>
                                <input type="text" class="form-control"  id="edtValor" placeholder="Digite o valor do serviço">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Cliente:</label>
                                <select class="form-control" id="cbServicos">
                                    @foreach($clientes as $cliente)
                                        <option>{{$cliente->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>

                    <h3><i class='bx bx-building'></i> Company Info</h3>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Company Name</label>
                                <input type="text" class="form-control" placeholder="Enter company name">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Website</label>
                                <input type="text" class="form-control" placeholder="Enter website url">
                            </div>
                        </div>
                    </div>

                    <h3><i class='bx bx-world'></i> Social</h3>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Facebook</label>
                                <input type="text" class="form-control" placeholder="Enter facebook url">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Twitter</label>
                                <input type="text" class="form-control" placeholder="Enter twitter url">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Instagram</label>
                                <input type="text" class="form-control" placeholder="Enter instagram url">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Linkedin</label>
                                <input type="text" class="form-control" placeholder="Enter linkedin url">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Pinterest</label>
                                <input type="text" class="form-control" placeholder="Enter pinterest url">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Stack Overflow</label>
                                <input type="text" class="form-control" placeholder="Enter stack overflow url">
                            </div>
                        </div>
                    </div>

                    <div class="btn-box text-right">
                        <button type="button" class="submit-btn" onclick="verValor()"><i class='bx bx-save'></i> Save</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection
@section('jsAdmin')
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });



        function verValor(){
            let valor = $("#edtValor").val()

           console.log(valor*2)
        }




    </script>



@endsection

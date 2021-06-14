@extends('themes.Admin.adminLayout')
@section('titleAdmin','Reeducando | Caixa')
@section('breadName','Caixa Detento')<!--Destaque do mapa de url-->
@section('breadItem','Financeiro')<!--Meio do mapa-->
@section('breadcrumb')
    <li class="item">Caixa</li><!--Pagina atual-->
    <li class="item">Caixa Detento</li><!--Pagina atual-->
@endsection


@section('content')
    <!-- Start -->

    <div class="ecommerce-stats-area">
        <div class="row">
            <div class="col-xl-12">
                <div class="input-group ">
                    <input type="text" class="form-control" id="pesquisar" placeholder="Pesquisar caixa Detento">

                </div>

            </div>
        </div>
    </div>

    <div class="row mb-30">


        @foreach($cxDetentos as $cxDetento)
            @if($cxDetento->valor)

                <div class="col-xl-3 " id="caixaOpen">
                    <div class="new-user-box">
                        <div class="icon">
                            <i class='bx bx-user-pin'></i>
                        </div>
                        <b id="cxPesquisa">{{$cxDetento->name}}</b>
                        <span class="sub-text d-block font-weight-bold">R$ {{number_format( $cxDetento->valor ,2,",",".")}}</span>
                        <hr>
                        <a class="btn btn-outline-primary" href="{{route('Admin.caixa.detento.retirada', $cxDetento->id)}}"  type="button">Retirada</a>
                    </div>
                </div>

            @endif
        @endforeach
    </div>

    <!-- End -->



@endsection
@section('jsAdmin')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });


        $(function () {


            $("#pesquisar").keyup(function () {
                let pesquisa = $(this).val()


                if (pesquisa) {

                    console.log(pesquisa)


                }


            })
        })




    </script>



@endsection


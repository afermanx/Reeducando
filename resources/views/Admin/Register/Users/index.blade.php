@extends('themes.Admin.adminLayout')
@section('titleAdmin','Reeducando | Usuarios')
@section('breadName','Usuarios')
@section('breadItem','Cadastro')
@section('breadcrumb')
    <li class="item">Usuarios</li>


@endsection

@section('content')
    <div class="card mb-30">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3><i class="bx bxs-group"></i> Lista de Usuarios</h3>

            <div class="dropdown">
                <button class="btn btn-outline-primary bx bxs-user-plus" type="button" data-toggle="tooltip"
                         data-placement="top"
                        title="Novo Usuario"
                        aria-haspopup="true" aria-expanded="false">

                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <i class='bx bx-user-plus'></i> Novo Usuario
                    </a>

                    {{--                    <a class="dropdown-item d-flex align-items-center" href="#">--}}
                    {{--                        <i class='bx bx-printer'></i> Imprimir--}}
                    {{--                    </a>--}}
                    {{--                    <a class="dropdown-item d-flex align-items-center" href="#">--}}
                    {{--                        <i class='bx bx-download'></i> Download--}}
                    {{--                    </a>--}}
                </div>
            </div>
        </div>

        <div class="card-body">

            <div class="row">
                <div class="col-xl-12">


                    <table  class="table table-hover table-striped jsTables">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Email</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Status</th>
                            <th scope="col">Opções</th>
                        </tr>
                        </thead>
                        @foreach($users as $user)
                        <tbody>
                        <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->type}}</td>
                            <td>{{$user->status}}</td>
                            <td >
                                <button class="btn btn-outline-info bx bx-edit"
                                        data-toggle="tooltip" data-placement="top"
                                        title="Ver dados do usuário">
                                </button>
                                <button class="btn btn-outline-danger bx bx-trash"
                                        data-toggle="tooltip" data-placement="top"
                                        title="Deletar dados do usuário">
                                </button>
                            </td>
                        </tr>


                        </tbody>
                        @endforeach
                    </table>


                </div>

            </div>


        </div>
    </div>
@endsection


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
                        onclick="startModal()"
                        data-placement="top"
                        title="Novo Usuario"
                        aria-haspopup="true" aria-expanded="false">

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
                            <th class="text-center" style="width: 80px;">#</th>
                            <th>Nome</th>
                            <th class="d-none d-sm-table-cell" style="width: 30%;">Email</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Tipo</th>
                            <th style="width: 15%;">Status</th>
                            <th style="width: 15%;">Opções</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td class="text-center">{{$user->id}}</td>
                            <td class="font-w600">
                                <a href="">{{$user->name}}</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <em class="text-muted">{{$user->email}}</em>
                            </td>
                            <td>
                                <em class="text-muted">{{$user->type}}</em>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge badge-success">{{$user->status}}</span>
                            </td>


                            <td>
                                <em class="text-muted">
                                    <button class="btn btn-outline-info bx bx-edit"
                                            onclick="show({{$user->id}})"
                                            data-toggle="tooltip" data-placement="top"
                                            title="Ver dados do usuário">
                                    </button>
                                    <button class="btn btn-outline-danger bx bx-trash"
                                            onclick="destroy({{$user->id}},'{{$user->name}}')"
                                            data-toggle="tooltip" data-placement="top"
                                            title="Deletar dados do usuário">
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
    <div class="modal fade basicModalLG" id="usersModal" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="usersTitleModal">Large modal</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card user-settings-box mb-30">
                        <div class="card-body">
                            <form>
                                <h3><i class='bx bx-user-circle'></i>Informações Pessoais</h3>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Nome:</label>
                                            <input type="text" id='name' class="form-control"
                                                   placeholder="Nome completo">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Email:</label>
                                            <input type="email" id='email' class="form-control"
                                                   placeholder="Digite um e-mail valido">
                                        </div>
                                    </div>
                                </div>


                                <h3><i class='bx bx-lock'></i> Credenciais</h3>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Senha</label>
                                            <input type="password" id="password" value="123456" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Repita a Senha</label>
                                            <input type="password" id="passwordRepite" value="123456"
                                                   class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Tipo de usuario</label>
                                            <select id="typeUser" class="form-control">
                                                <option value="ADMINISTRADOR">Adminstrador</option>
                                                <option value="X">x</option>
                                                <option value="Y">y</option>

                                            </select>
                                        </div>
                                    </div>

                                    {{--                                    <div class="col-lg-6">--}}
                                    {{--                                        <div class="form-group">--}}
                                    {{--                                            <label>Repita a Senha</label>--}}
                                    {{--                                            <input type="password" value="123456" class="form-control" >--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-6 text-left ">
                            <button type="reset" id="btnClose"
                                    class="btn btn-outline-danger bx bxs-x-circle " data-dismiss="modal">Fechar
                            </button>

                        </div>

                        <div class="col-xl-6 text-right">
                            <button type="button" id="btnSave" onclick="save()"
                                    class="btn btn-outline-primary bx bxs-save text-right">Salvar
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
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });
    </script>
    <script src="{{asset('js/components/Users/users.js')}}"></script>

@endsection


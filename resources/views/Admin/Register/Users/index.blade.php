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
                                    @if($user->status ==="Ativo")
                                        <span class="badge badge-success">{{$user->status}}</span>
                                    @endif
                                    @if($user->status ==="Inativo")
                                        <span class="badge badge-warning" style="color: white6" >{{$user->status}}</span>
                                    @endif
                                        @if($user->status ==="Bloqueado")
                                            <span class="badge badge-danger">{{$user->status}}</span>
                                        @endif
                                        @if($user->status ==="Mudar Senha")
                                            <span class="badge badge-info">{{$user->status}}</span>
                                        @endif

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
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Atenção.</strong> Os campos com <span style="color:red">*</span> são
                                obrigatórios.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form>
                                <h3><i class='bx bx-user-circle'></i>Informações Pessoais</h3>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><span style="color:red">*</span> Nome:</label>
                                            <input type="text" id='name' class="form-control"
                                                   placeholder="Nome completo">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><span style="color:red">*</span> Email:</label>
                                            <input type="email" id='email' class="form-control"
                                                   placeholder="Digite um e-mail valido">
                                        </div>
                                    </div>
                                </div>


                                <h3><i class='bx bx-lock'></i> Credenciais</h3>

                                <div class="row">
                                    <div class="col-lg-6">

                                        <div class="form-group">

                                            <input id="senhaExibir" class="form-check-input" type="checkbox"> <label
                                                id="senhaAlterar"> <span style="color:red">*</span>Senha</label>
                                            <input type="password" name="password" id="password" class="form-control"
                                                   placeholder="Digite a senha">

                                            <strong id="showMessage"><i style="color: #9B703F ; font-size: 25px"
                                                                        class="bx bxs-hand-up"></i> Click aqui para
                                                alterar a senha!</strong>

                                        </div>
                                    </div>
                                    <div class="col-lg-6" id="exibirInput2">
                                        <div class="form-group">
                                            <label id="senhaAlterar"><span style="color:red">*</span> Confirme a
                                                senha</label>
                                            <input type="password" name="passwordRepite" id="passwordRepite"
                                                   class="form-control"
                                                   placeholder="Confirme a senha">

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label> <span style="color:red">*</span> Tipo de usuario</label>
                                            <select id="typeUser" class="form-control">
                                                <option value="ADMINISTRADOR">Adminstrador</option>
                                                <option value="X">x</option>
                                                <option value="Y">y</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6" id="showStatus">
                                        <div class="form-group">
                                            <label> <span style="color:red">*</span>Status</label>
                                            <select id="status" class="form-control">
                                                <option value="Ativo"><span class="badge badge-success">Ativo</span>
                                                </option>
                                                <option value="Bloqueado"><span
                                                        class="badge badge-warning">Bloqueado</span></option>
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
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });
    </script>
    <script src="{{asset('js/components/Users/users.js')}}"></script>

@endsection


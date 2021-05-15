@extends('themes.Admin.adminLayout')
@section('titleAdmin','Reeducando | Usuarios')
@section('breadName', 'Usuario')
@section('breadItem','Perfil')
@section('breadcrumb')
    <li class="item">{{$user->name}}</li>


@endsection
@section('content')
    <div class="card user-settings-box mb-30">
        <div class="card-body">
            <form>
                <h3><i class='bx bx-user-circle'></i>Informações Pessoais </h3>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label><span style="color:red">*</span> Nome:</label>
                            <input type="text" id='name' class="form-control"
                             value="{{$user->name}}"      placeholder="Nome completo">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label><span style="color:red">*</span> Email:</label>
                            <input type="email" id='email' class="form-control"
                                   value="{{$user->email}}"       placeholder="Digite um e-mail valido">
                        </div>
                    </div>
                </div>



        <h3><i class='bx bx-building'></i> Credenciais</h3>

        <div class="row">
            <div class="col-lg-4">

                <div class="form-group">

                     <label
                        id="senhaAlterar"> <span style="color:red">*</span>Senha</label>
                    <input type="password" name="password" id="password" class="form-control"
                           placeholder="Digite a senha">



                </div>
            </div>
            <div class="col-lg-4" id="exibirInput2">
                <div class="form-group">
                    <label id="senhaAlterar"><span style="color:red">*</span> Confirme a
                        senha</label>
                    <input type="password" name="passwordRepite" id="passwordRepite"
                           class="form-control"
                           placeholder="Confirme a senha">

                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label> <span style="color:red">*</span> Tipo de usuario</label>
                    <select disabled id="typeUser" class="form-control">
                        <option value="{{$user->type}}">{{$user->type}}</option>


                    </select>
                </div>
            </div>
        </div>



        <div class="btn-box text-right">
            <button  onclick="editPerfil({{$user->id}})" type="button" class=" btn btn-outline-info"><i class='bx bx-save'></i> Salvar</button>
        </div>

        </form>
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
    <script src="{{asset('js/components/Users/services.js')}}"></script>

@endsection

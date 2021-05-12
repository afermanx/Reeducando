@extends('themes.Admin.adminLayout')
@section('titleAdmin','Reeducando | Serviços')
@section('breadName','Serviços')
@section('breadItem','Cadastro')
@section('breadcrumb')
    <li class="item">Serviços</li>


@endsection

@section('content')
    <div class="card mb-30">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Responsive classes (All breakpoints)</h3>

            <div class="dropdown">
                <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class='bx bx-dots-horizontal-rounded' ></i>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <i class='bx bx-show'></i> View
                    </a>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <i class='bx bx-edit-alt'></i> Edit
                    </a>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <i class='bx bx-trash'></i> Delete
                    </a>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <i class='bx bx-printer'></i> Print
                    </a>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <i class='bx bx-download'></i> Download
                    </a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="grid-bg-example">
                <div class="row">
                    <div class="col">col</div>
                    <div class="col">col</div>
                    <div class="col">col</div>
                    <div class="col">col</div>
                </div>
                <div class="row">
                    <div class="col-8">col-8</div>
                    <div class="col-4">col-4</div>
                </div>
            </div>
        </div>
    </div>
@endsection

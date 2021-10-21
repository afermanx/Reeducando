<!-- Start Sidemenu Area -->
<div class="sidemenu-area">
    <div class="sidemenu-header">
        <a href="" class="navbar-brand d-flex align-items-center">
            <img src="{{asset('img/LogoReeducando.png')}}" width="30%" alt="image">
            <span>Reeducar</span>
        </a>

        <div class="burger-menu d-none d-lg-block">
            <span class="top-bar"></span>
            <span class="middle-bar"></span>
            <span class="bottom-bar"></span>
        </div>

        <div class="responsive-burger-menu d-block d-lg-none">
            <span class="top-bar"></span>
            <span class="middle-bar"></span>
            <span class="bottom-bar"></span>
        </div>
    </div>

    <div class="sidemenu-body">
        <ul class="sidemenu-nav metisMenu h-100" id="sidemenu-nav" data-simplebar>
            <li class="nav-item-title">
                Inicio
            </li>


            <li class="nav-item {{ Request::segment(1) === 'dashboard' ? 'mm-active' : null }}">
                <a href="{{route('Admin.dash')}}" class="nav-link">
                    <span class="icon"><i class='bx bx-home-circle'></i></span>
                    <span class="menu-title">Painel</span>
                </a>
            </li>


            <li class="nav-item {{ Request::segment(1) === 'os' ? 'mm-active' : null }}">
                <a href="{{route('Admin.os')}}" class="nav-link">
                    <span class="icon"><i class='bx bxs-notepad'></i></span>
                    <span class="menu-title">Ordem de Serviço</span>
                </a>
            </li>

            <li class="nav-item {{ Request::segment(1) === 'financeiro' ? 'mm-active' : null }}" >
                <a href="#" class="collapsed-nav-link nav-link" aria-expanded="false">
                    <span class="icon"><i class='bx bxs-landmark'></i></span>
                    <span class="menu-title">Financeiro</span>
                </a>

                <ul class="sidemenu-nav-second-level">

                    {{--                    mm-active--}}

                    <li class="nav-item {{ Request::segment(2) === 'caixa' ? 'mm-active' : null }}">
                        <a href="{{route('Admin.caixa')}}" class="nav-link">
                            <span class="icon"><i class='bx bx-money'></i></span>
                            <span class="menu-title">Caixa</span>
                        </a>
                    </li>






                </ul>
            </li>

            <li class="nav-item-title">
                Gerencial
            </li>
{{--            <li class="nav-item {{ Request::segment(1) === 'relatorio' ? 'mm-active' : null }}">--}}
{{--                <a href="#" class="collapsed-nav-link nav-link " aria-expanded="false">--}}
{{--                    <span class="icon"><i class='bx bxs-printer'></i></span>--}}
{{--                    <span class="menu-title">Relatórios</span>--}}
{{--                </a>--}}

{{--                <ul class="sidemenu-nav-second-level">--}}

{{--                    <li class="nav-item {{ Request::segment(2) === 'servico' ? 'mm-active' : null }} ">--}}
{{--                        <a href="{{route('Admin.report.service')}}" class="nav-link">--}}
{{--                            <span class="icon"><i class='bx bxs-report'></i></span>--}}
{{--                            <span class="menu-title">Serviços</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}


{{--                    <li class="nav-item">--}}
{{--                        <a href="{{route('Admin.services')}}" class="nav-link">--}}
{{--                            <span class="icon"><i class='bx bxs-wrench'></i></span>--}}
{{--                            <span class="menu-title">Serviços</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}


{{--                </ul>--}}
{{--            </li>--}}
            <li class="nav-item {{ Request::segment(1) === 'cadastros' ? 'mm-active' : null }}" >
                <a href="#" class="collapsed-nav-link nav-link" aria-expanded="false">
                    <span class="icon"><i class='bx bx-table'></i></span>
                    <span class="menu-title">Cadastros</span>
                </a>

                <ul class="sidemenu-nav-second-level">

{{--                    mm-active--}}

                    <li class="nav-item {{ Request::segment(2) === 'usuarios' ? 'mm-active' : null }}">
                        <a href="{{route('Admin.users')}}" class="nav-link">
                            <span class="icon"><i class='bx bxs-group'></i></span>
                            <span class="menu-title">Usuarios</span>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::segment(2) === 'detentos' ? 'mm-active' : null }}">
                        <a href="{{route('Admin.detentos')}}" class="nav-link">
                            <span class="icon"><i class='bx bxs-group'></i></span>
                            <span class="menu-title">Detentos</span>
                        </a>
                    </li>


                    <li class="nav-item {{ Request::segment(2) === 'servicos' ? 'mm-active' : null }}">
                        <a href="{{route('Admin.services')}}" class="nav-link">
                            <span class="icon"><i class='bx bxs-wrench'></i></span>
                            <span class="menu-title">Serviços</span>
                        </a>
                    </li>



                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- End Sidemenu Area -->

<!-- Start Main Content Wrapper Area -->
<div class="main-content d-flex flex-column">

<!-- Breadcrumb Area -->
<div class="breadcrumb-area">
    <h1>@yield('breadName')</h1>

    <ol class="breadcrumb">
        <li class="item"><a href="{{route('Admin.dash')}}"><i class='bx bx-home-alt'></i></a></li>

        <li class="item">@yield('breadItem')</li>

        @yield('breadcrumb')

{{--        <li class="item">@yield('breadCurrent')</li>--}}
    </ol>
</div>
<!-- End Breadcrumb Area -->

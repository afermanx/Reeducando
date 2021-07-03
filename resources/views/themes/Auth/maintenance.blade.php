<!doctype html>
<html lang="zxx">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Vendors Min CSS -->
    <link rel="stylesheet" href="{{asset("/css/vendors.min.css")}}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset("/css/style.css")}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset("/css/responsive.css")}}">

    <title>@yield("mainte.title")</title>

    <link rel="icon" type="image/png" href="{{asset("/img/favicon.png")}}">
</head>

<body>

<!-- Start Not Authorized Area -->
<div class="not-authorized-area bg-image">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="not-authorized-content">
                <a href="{{route('Auth.logout')}}" class="logo">
                    <img src="{{asset('img/LogoReeducando.png')}}" alt="image" width="10%">
                </a>

                <h2>@yield('mainte.header')</h2>
                <p >@yield('mainte.message')</p>

                <a href="{{route('Auth.logout')}}" class="default-btn">Voltar para Login</a>
            </div>
        </div>
    </div>
</div>
<!-- End Not Authorized Area -->


<!-- Vendors Min JS -->
<script src="{{asset("js/vendors.min.js")}}"></script>

<!-- ApexCharts JS -->
<script src="{{asset("js/apexcharts/apexcharts.min.js")}}"></script>
<script src="{{asset("js/apexcharts/apexcharts-stock-prices.js")}}"></script>
<script src="{{asset("js/apexcharts/apexcharts-irregular-data-series.js")}}"></script>
<script src="{{asset("js/apexcharts/apex-custom-line-chart.js")}}"></script>
<script src="{{asset("js/apexcharts/apex-custom-pie-donut-chart.js")}}"></script>
<script src="{{asset("js/apexcharts/apex-custom-area-charts.js")}}"></script>
<script src="{{asset("js/apexcharts/apex-custom-column-chart.js")}}"></script>
<script src="{{asset("js/apexcharts/apex-custom-bar-charts.js")}}"></script>
<script src="{{asset("js/apexcharts/apex-custom-mixed-charts.js")}}"></script>
<script src="{{asset("js/apexcharts/apex-custom-radialbar-charts.js")}}"></script>
<script src="{{asset("js/apexcharts/apex-custom-radar-chart.js")}}"></script>

<!-- ChartJS -->
<script src="{{asset("js/chartjs/chartjs.min.js")}}"></script>
<div class="chartjs-colors"> <!-- To use template colors with Javascript -->
    <div class="bg-primary"></div>
    <div class="bg-primary-light"></div>
    <div class="bg-secondary"></div>
    <div class="bg-info"></div>
    <div class="bg-success"></div>
    <div class="bg-success-light"></div>
    <div class="bg-danger"></div>
    <div class="bg-warning"></div>
    <div class="bg-purple"></div>
    <div class="bg-pink"></div>
</div>

<!-- jvectormap Min JS -->
<script src="{{asset("js/jvectormap-1.2.2.min.js")}}"></script>
<!-- jvectormap World Mil JS -->
<script src="{{asset("/js/jvectormap-world-mill-en.js")}}"></script>
<!-- Custom JS -->
<script src="{{asset("js/custom.js")}}"></script>
</body>
</html>

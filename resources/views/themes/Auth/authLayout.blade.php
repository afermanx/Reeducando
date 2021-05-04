<!doctype html>
<html lang="zxx">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Vendors Min CSS -->
    <link rel="stylesheet" href="{{asset('/css/vendors.min.css')}}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('/css/responsive.css')}}">

    <title>@yield('title')</title>

    <link rel="icon" type="image/png" href="{{asset('/img/favicon.png')}}">
</head>

<body>

@yield('content')

<!-- Vendors Min JS -->
<script src="{{asset('/js/vendors.min.js')}}"></script>

<!-- ApexCharts JS -->
<script src="{{asset('/js/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('/js/apexcharts/apexcharts-stock-prices.js')}}"></script>
<script src="{{asset('/js/apexcharts/apexcharts-irregular-data-series.js')}}"></script>
<script src="{{asset('/js/apexcharts/apex-custom-line-chart.js')}}"></script>
<script src="{{asset('/js/apexcharts/apex-custom-pie-donut-chart.js')}}"></script>
<script src="{{asset('/js/apexcharts/apex-custom-area-charts.js')}}"></script>
<script src="{{asset('/js/apexcharts/apex-custom-column-chart.js')}}"></script>
<script src="{{asset('/js/apexcharts/apex-custom-bar-charts.js')}}"></script>
<script src="{{asset('/js/apexcharts/apex-custom-mixed-charts.js')}}"></script>
<script src="{{asset('/js/apexcharts/apex-custom-radar-chart.js')}}"></script>
<script src="{{asset('/js/apexcharts/apex-custom-radialbar-charts.js')}}"></script>

<!-- Mesagens e auteticacão plugins -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- jvectormap Min JS -->
<script src="{{asset('/js/jvectormap-1.2.2.min.js')}}"></script>
<!-- jvectormap World Mil JS -->
<script src="{{asset('/js/jvectormap-world-mill-en.js')}}"></script>
<!-- Custom JS -->
<script src="{{asset('/js/custom.js')}}"></script>
@yield('js')
</body>
</html>


<!-- Start Footer End -->
<footer class="footer-area">
    <div class="row align-items-center">
        <div class="col-lg-6 col-sm-6 col-md-6">
            <p>Copyright <i class='bx bx-copyright'></i> {{date('Y')}} <a href="#">Reeducando</a>. All rights reserved</p>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 text-right">
            <p>Desenvolvido com  ❤️ <a href="#" target="_blank">TeamDev</a></p>
        </div>
    </div>
</footer>
<!-- End Footer End -->
</div>
<!-- End Main Content Wrapper Area -->


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
<script src="{{asset('/js/apexcharts/apex-custom-radialbar-charts.js')}}"></script>
<script src="{{asset('assets/js/apexcharts/apex-custom-radar-chart.js')}}"></script>

<!-- ChartJS -->
<script src="{{asset('js/chartjs/chartjs.min.js')}}"></script>
<!-- To use template colors with Javascript -->
<div class="chartjs-colors">
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
<script src="{{asset('js/jvectormap-1.2.2.min.js')}}"></script>
<!-- jvectormap World Mil JS -->
<script src=""></script>
<!-- Custom JS -->
<script src="{{asset('js/custom.js')}}"></script>
@yield('jsAdmin')
</body>
</html>

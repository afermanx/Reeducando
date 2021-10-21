<!-- Start Footer End -->
<footer class="footer-area">
    <div class="row align-items-center">
        <div class="col-lg-6 col-sm-6 col-md-6">
            <p>Copyright <i class='bx bx-copyright'></i> {{date('Y')}} <a href="#">Reeducando</a>. All rights reserved</p>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 text-right">
            <p>Desenvolvido com  ❤️ <a href="#" target="_blank">pelo Acadêmicos Alex J. Ferman, Cleriston B. Santana</a></p>
        </div>
    </div>
</footer>
<!-- End Footer End -->
</div>
<!-- End Main Content Wrapper Area -->


<!-- Vendors Min JS -->
<script src="{{asset('/js/vendors.min.js')}}"></script>


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


<!-- Page JS Plugins -->
<script src="{{asset('/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/js/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('/js/plugins/datatables/buttons/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('/js/plugins/datatables/buttons/buttons.print.min.js')}}"></script>
<script src="{{asset('/js/plugins/datatables/buttons/buttons.html5.min.js')}}"></script>
<script src="{{asset('/js/plugins/datatables/buttons/buttons.flash.min.js')}}"></script>
<script src="{{asset('/js/plugins/datatables/buttons/buttons.colVis.min.js')}}"></script>

<!-- Page JS Code -->
<script src="{{asset('/js/pages/be_tables_datatables.min.js')}}"></script>


<!-- jvectormap Min JS -->
<script src="{{asset('js/jvectormap-1.2.2.min.js')}}"></script>
<!-- jvectormap World Mil JS -->
<script src=""></script>
<!-- Custom JS -->
<script src="{{asset('js/custom.js')}}"></script>

<script src="{{asset('/js/plugins/sweetalert2/sweetalert2.min.js')}}"></script>


@yield('jsAdmin')
</body>
</html>

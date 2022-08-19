<!-- BACK-TO-TOP -->
<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

<!-- JQUERY JS -->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>

<script src="{{asset('assets/plugins/input-mask/jquery.mask.min.js')}}"></script>

<!-- BOOTSTRAP JS -->
<script src="{{asset('assets/plugins/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

<!-- SPARKLINE JS-->
<script src="{{asset('assets/js/jquery.sparkline.min.js')}}"></script>

<!-- CHART-CIRCLE JS-->
<script src="{{asset('assets/js/circle-progress.min.js')}}"></script>

<!-- PIETY CHART JS-->
<script src="{{asset('assets/plugins/peitychart/jquery.peity.min.js')}}"></script>
<script src="{{asset('assets/plugins/peitychart/peitychart.init.js')}}"></script>

<!-- INPUT MASK JS-->
<script src="{{asset('assets/plugins/input-mask/jquery.mask.min.js')}}"></script>

<!-- SIDEBAR JS -->
<script src="{{asset('assets/plugins/sidebar/sidebar.js')}}"></script>

<!-- INTERNAL CHARTJS CHART JS-->
<script src="{{asset('assets/plugins/chart/Chart.bundle.js')}}"></script>
<script src="{{asset('assets/plugins/chart/rounded-barchart.js')}}"></script>
<script src="{{asset('assets/plugins/chart/utils.js')}}"></script>

<!-- INTERNAL SELECT2 JS -->
<script src="{{asset('assets/plugins/select2/select2.full.min.js')}}"></script>
<script src="{{asset('assets/js/select2.js')}}"></script>

<!-- INTERNAL Data tables js-->
<script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>

<!-- INTERNAL APEXCHART JS -->
<script src="{{asset('assets/js/apexcharts.js')}}"></script>
<script src="{{asset('assets/plugins/apexchart/irregular-data-series.js')}}"></script>

<!-- C3 CHART JS -->
<script src="{{asset('assets/plugins/charts-c3/d3.v5.min.js')}}"></script>
<script src="{{asset('assets/plugins/charts-c3/c3-chart.js')}}"></script>

<!-- CHART-DONUT JS -->
<script src="{{asset('assets/js/charts.js')}}"></script>

<!-- INTERNAL Flot JS -->
<script src="{{asset('assets/plugins/flot/jquery.flot.js')}}"></script>
<script src="{{asset('assets/plugins/flot/jquery.flot.fillbetween.js')}}"></script>
<script src="{{asset('assets/plugins/flot/chart.flot.sampledata.js')}}"></script>
<script src="{{asset('assets/plugins/flot/dashboard.sampledata.js')}}"></script>

<!-- INTERNAL Vector js -->
<script src="{{asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
<script src="{{asset('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>

<!-- INTERNAL WYSIWYG Editor JS -->
<script src="{{asset('assets/plugins/wysiwyag/jquery.richtext.js')}}"></script>
<script src="{{asset('assets/plugins/wysiwyag/wysiwyag.js')}}"></script>

<!-- INTERNAL File-Uploads Js-->
<script src="{{asset('assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
<script src="{{asset('assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
<script src="{{asset('assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
<script src="{{asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
<script src="{{asset('assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>

<!-- SIDE-MENU JS-->
<script src="{{asset('assets/plugins/sidemenu/sidemenu.js')}}"></script>

<!-- INTERNAL INDEX JS -->
<script src="{{asset('assets/js/index1.js')}}"></script>

<!-- Perfect SCROLLBAR JS-->
<script src="{{asset('assets/plugins/p-scroll/perfect-scrollbar.js')}}"></script>
<script src="{{asset('assets/plugins/p-scroll/pscroll.js')}}"></script>
<script src="{{asset('assets/plugins/p-scroll/pscroll-1.js')}}"></script>

<!-- Color Theme js -->
<script src="{{asset('assets/js/themeColors.js')}}"></script>

<!-- Sticky js -->
<script src="{{asset('assets/js/sticky.js')}}"></script>

<!-- CK Editor -->
<script src="{{asset('assets/plugins/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('assets/plugins/ckeditor/samples/js/sample.js')}}"></script>

<!-- CUSTOM JS -->
<script src="{{asset('assets/js/custom.js')}}"></script>
<script src="{{asset('assets/js/toastr.js')}}"></script>

<script>
    $(function ()
    {
        'use strict'

        // Data Tables
        $('.data-table').DataTable();

        // Select2
        $('.dataTables_length select').select2(
        {
            minimumResultsForSearch: Infinity
        });

        $(".select2").select2();
    });

    $(function (){
        //Toastr Message
        @if(Session::has('message'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
            toastr.success("{{ session('message') }}");
        @endif
            @if(Session::has('error'))
                toastr.options =
                {
                    "closeButton" : true,
                    "progressBar" : true
                }
                toastr.error("{{ session('error') }}");
            @endif
            @if(Session::has('warning'))
                toastr.options =
                {
                    "closeButton" : true,
                    "progressBar" : true
                }
                toastr.warning("{{ session('warning') }}");
            @endif
            @if(count($errors) > 0)
                @foreach($errors->all() as $error)
                    toastr.options =
                    {
                        "closeButton" : true,
                        "progressBar" : true
                    }
                    toastr.error("{{ $error }}");
                @endforeach
            @endif
    });

    initSample();
</script>

@stack('js')
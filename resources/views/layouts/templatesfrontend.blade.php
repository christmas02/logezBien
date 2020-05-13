<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Google Tag Manager -->
    
    <!-- End Google Tag Manager -->
    <title>{{ $title }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">

    <!-- External CSS libraries -->
    <link rel="stylesheet" type="text/css" href="/assets/Client/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/Client/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/Client/css/bootstrap-submenu.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">

    <link rel="stylesheet" type="text/css" href="/assets/Client/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/Client/css/magnific-popup.css">
    <link rel="stylesheet" href="/assets/Client/css/leaflet.css" type="text/css">
    <link rel="stylesheet" href="/assets/Client/css/map.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="/assets/Client/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/Client/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" type="text/css" href="/assets/Client/fonts/linearicons/style.css">
    <link rel="stylesheet" type="text/css"  href="/assets/Client/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css"  href="/assets/Client/css/dropzone.css">
    <link rel="stylesheet" type="text/css"  href="/assets/Client/css/slick.css">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" type="text/css" href="/assets/Client/css/style.css">
    <link rel="stylesheet" type="text/css" href="/assets/Client/css/style-unyte.css">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="/assets/Client/css/skins/default.css">
    <!--<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />-->
    <link href="/assets/Client/css/gijgo.css" rel="stylesheet" type="text/css" />


    <!-- Datapicker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />

    <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.standalone.min.css">


    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{asset('images/logo/favicon.ico')}}" type="image/x-icon" >

    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,300,700">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link rel="stylesheet" type="text/css" href="/assets/Client/css/ie10-viewport-bug-workaround.css">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script  src="/assets/Client/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script  src="/assets/Client/js/ie-emulation-modes-warning.js"></script>
    <link href="/assets/Client/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script  src="/assets/Client/js/html5shiv.min.js"></script>
    <script  src="/assets/Client/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>

@include('inc/front/header')
@yield('content')
@include('inc/front/footer')

<script  src="/assets/Client/js/jquery-2.2.0.min.js"></script>
<script  src="/assets/Client/js/popper.min.js"></script>
<script  src="/assets/Client/js/bootstrap.min.js"></script>
<script  src="/assets/Client/js/bootstrap-submenu.js"></script>
<script  src="/assets/Client/js/rangeslider.js"></script>
<script  src="/assets/Client/js/jquery.mb.YTPlayer.js"></script>
<script  src="/assets/Client/js/bootstrap-select.min.js"></script>
<script  src="/assets/Client/js/jquery.easing.1.3.js"></script>
<script  src="/assets/Client/js/jquery.scrollUp.js"></script>
<script  src="/assets/Client/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script  src="/assets/Client/js/leaflet.js"></script>
<script  src="/assets/Client/js/leaflet-providers.js"></script>
<script  src="/assets/Client/js/leaflet.markercluster.js"></script>
<script  src="/assets/Client/js/dropzone.js"></script>
<script  src="/assets/Client/js/slick.min.js"></script>
<script  src="/assets/Client/js/jquery.filterizr.js"></script>
<script  src="/assets/Client/js/jquery.magnific-popup.min.js"></script>
<script  src="/assets/Client/js/jquery.countdown.js"></script>
<script  src="/assets/Client/js/maps.js"></script>
<script  src="/assets/Client/js/app.js"></script>
<script  src="/assets/Client/js/unyte.js"></script>
<script  src="/assets/Client/js/gijgo.min.js" type="text/javascript"></script>
<script src="{{asset('js/jquery.steps.js')}}"></script>
<!--<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>-->


<!-- Datapicker js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript">
        // $(document).ready(function() {
        //      $('.input-daterange').datepicker({
        //       });
        // });
    </script>

    <script>
    //    $('#startDate').datepicker({ format: 'dd/mm/yyyy' });
    //    $('#endDate').datepicker({ format: 'dd/mm/yyyy' });

        var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
        $('#startDate').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome',
            minDate: today,
            maxDate: function () {
                return $('#endDate').val();
            }
        });
        $('#endDate').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome',
            minDate: function () {
                return $('#startDate').val();
            }
        });

        
    </script>
<script>
  var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
        $('#startDate2').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome',
            minDate: today,
            maxDate: function () {
                return $('#endDate').val();
            }
        });
        $('#endDate').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome',
            minDate: function () {
                return $('#startDate').val();
            }
        });
</script>






<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script  src="/assets/Client/js/ie10-viewport-bug-workaround.js"></script>
<!-- Custom javascript -->
<script  src="/assets/Client/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>

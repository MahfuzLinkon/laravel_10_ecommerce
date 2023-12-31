<!DOCTYPE html>
<html lang="en">
<head>
    <!-- start: Meta -->
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="description" content="Bootstrap Metro Dashboard">
    <meta name="author" content="Dennis Ji">
    <meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <!-- end: Meta -->

    <!-- start: Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- end: Mobile Specific -->

    <!-- start: CSS -->
    <link id="bootstrap-style" href="{{ asset('backend') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link id="base-style" href="{{ asset('backend') }}/css/style.css" rel="stylesheet">
    <link id="base-style-responsive" href="{{ asset('backend') }}/css/style-responsive.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- end: CSS -->

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <link id="ie-style" href="{{ asset('backend') }}/css/ie.css" rel="stylesheet">
    <![endif]-->

    <!--[if IE 9]>
    <link id="ie9style" href="{{ asset('backend') }}/css/ie9.css" rel="stylesheet">
    <![endif]-->

    <!-- start: Favicon -->
    <link rel="shortcut icon" href="{{ asset('backend') }}/img/favicon.ico">
    <!-- end: Favicon -->

{{--    tags-input--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>


    <style>
        .submenu{
            margin-left: 15px;
        }
    </style>
</head>

<body>
<!-- start: Header -->
@include('backend.layout._inc.header')
<!-- start: Header -->

<div class="container-fluid-full">
    <div class="row-fluid">

        <!-- start: Main Menu -->
        @include('backend.layout._inc.sidebar')
        <!-- end: Main Menu -->

        <noscript>
            <div class="alert alert-block span10">
                <h4 class="alert-heading">Warning!</h4>
                <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
            </div>
        </noscript>

        <!-- start: Content -->
        <div id="content" class="span10">

            @yield('content')

        </div><!--/.fluid-container-->

        <!-- end: Content -->
    </div><!--/#content.span10-->
</div><!--/fluid-row-->

<div class="modal hide fade" id="myModal">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h3>Settings</h3>
    </div>
    <div class="modal-body">
        <p>Here settings can be configured...</p>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal">Close</a>
        <a href="#" class="btn btn-primary">Save changes</a>
    </div>
</div>

<div class="clearfix"></div>

<footer>

    <p>
        <span style="text-align:left;float:left">&copy; 2013 <a href="http://jiji262.github.io/Bootstrap_Metro_Dashboard/" alt="Bootstrap_Metro_Dashboard">Bootstrap Metro Dashboard</a></span>

    </p>

</footer>

<!-- start: JavaScript-->
<script src="{{ asset('backend/js/jquery-1.9.1.min.js') }}"></script>
<script src="{{ asset('backend/js/jquery-migrate-1.0.0.min.js') }}"></script>

<script src="{{ asset('backend/js/jquery-ui-1.10.0.custom.min.js') }}"></script>

<script src="{{ asset('backend/js/jquery.ui.touch-punch.js') }}"></script>

<script src="{{ asset('backend/js/modernizr.js') }}"></script>

<script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('backend/js/jquery.cookie.js') }}"></script>

<script src='{{ asset('backend') }}/js/fullcalendar.min.js'></script>

<script src='{{ asset('backend') }}/js/jquery.dataTables.min.js'></script>

<script src="{{ asset('backend') }}/js/excanvas.js"></script>
<script src="{{ asset('backend') }}/js/jquery.flot.js"></script>
<script src="{{ asset('backend') }}/js/jquery.flot.pie.js"></script>
<script src="{{ asset('backend') }}/js/jquery.flot.stack.js"></script>
<script src="{{ asset('backend') }}/js/jquery.flot.resize.min.js"></script>

<script src="{{ asset('backend') }}/js/jquery.chosen.min.js"></script>

<script src="{{ asset('backend') }}/js/jquery.uniform.min.js"></script>

<script src="{{ asset('backend') }}/js/jquery.cleditor.min.js"></script>

<script src="{{ asset('backend') }}/js/jquery.noty.js"></script>

<script src="{{ asset('backend') }}/js/jquery.elfinder.min.js"></script>

<script src="{{ asset('backend') }}/js/jquery.raty.min.js"></script>

<script src="{{ asset('backend') }}/js/jquery.iphone.toggle.js"></script>

<script src="{{ asset('backend') }}/js/jquery.uploadify-3.1.min.js"></script>

<script src="{{ asset('backend') }}/js/jquery.gritter.min.js"></script>

<script src="{{ asset('backend') }}/js/jquery.imagesloaded.js"></script>

<script src="{{ asset('backend') }}/js/jquery.masonry.min.js"></script>

<script src="{{ asset('backend') }}/js/jquery.knob.modified.js"></script>

<script src="{{ asset('backend') }}/js/jquery.sparkline.min.js"></script>

<script src="{{ asset('backend') }}/js/counter.js"></script>

<script src="{{ asset('backend') }}/js/retina.js"></script>

<script src="{{ asset('backend') }}/js/custom.js"></script>
{{--Toster Alert js--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@if(Session::has('success'))
    <script>
        toastr.success("{{ Session::get('success') }}");
        {{ Session::forget('success') }}
    </script>
@endif
@if(Session::has('error'))
    <script>
        toastr.error("{{ Session::get('error') }}");
        {{ Session::forget('error') }}
    </script>
@endif
@yield('script')
<!-- end: JavaScript-->

</body>
</html>

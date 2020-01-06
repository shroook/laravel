<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<meta name="format-detection" content="telephone=no">
	
	

   


	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
    <meta charset="utf-8">
  
    <link href="{{asset('css/frontend_css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('css/frontend_css/bootstrap-theme.min.css')}}" rel="stylesheet">
	<link href="{{asset('css/frontend_css/animate.min.css')}}" rel="stylesheet" >	
	<link href="{{asset('css/frontend_css/font-awesome.min.css')}}" rel="stylesheet">	
	<link href=" {{asset('css/frontend_css/prettyPhoto.css')}}" rel="stylesheet">
	
	<link href="{{asset('css/frontend_css/theme.css')}}" rel="stylesheet">	
	<link href="{{asset('css/frontend_css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('css/frontend_css/colors/blue.css')}}" rel="stylesheet" class="colors">


	<!-- Google Font -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'>
	<!-- Favicons -->
    <link rel="shortcut icon" href="{{asset('images/frontend_images/ico/favicon.ico')}}">	
    <link rel="apple-touch-icon" href=" {{asset('images/frontend_images/ico/apple-touch-icon.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href=" {{asset('images/frontend_images/ico/apple-touch-icon-72.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('images/frontend_images/ico/apple-touch-icon-114.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('images/frontend_images/ico/apple-touch-icon-144.png')}}">



    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <link href="{{ asset('css/treeview2.css') }}" rel="stylesheet">
	</head>

	<body>
	@include('frontend.header')
	@yield('content')

	<script type="text/javascript" src="{{asset('js/frontend_js/jquery.js')}}"></script>

    <script type="text/javascript" defer src="{{asset('js/frontend_js/autoptimize_0611c6724ae35a37f92a8eaa99427b65.js') }}"></script>
	

	<script src="{{asset('js/frontend_js/jquery.min.js')}}"></script>
    <script src="{{asset('js/frontend_js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/frontend_js/retina.min.js')}}"></script>
    <script src="{{asset('js/frontend_js/jquery.easing.min.js')}}"></script>
    <script src="{{asset('js/frontend_js/wow.min.js')}}"></script>
    <script src="{{asset('js/frontend_js/waypoints.min.js')}}"></script>
    <script src="{{asset('js/frontend_js/jquery.countTo.js')}}"></script>
    <script src="{{asset('js/frontend_js/jquery.mixitup.min.js')}}"></script>

    <script src="{{asset('js/frontend_js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('js/frontend_js/jquery.knob.min.js')}}"></script>
    <script src="{{asset('js/frontend_js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('js/frontend_js/custom.js')}}"></script>
    <script src="{{ asset('js/treeview.js') }}"></script>

    </body>
	
</html>
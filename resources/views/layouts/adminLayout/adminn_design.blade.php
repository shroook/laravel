
<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin</title>

<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="{{asset('css/backend_css/bootstrap.min.css')}}" />  
<link rel="stylesheet" href="{{asset('css/backend_css/bootstrap-responsive.min.css')}}" />
<link rel="stylesheet" href="{{asset('css/backend_css/jquery.gritter.css')}}" />
<link rel="stylesheet" href="{{asset('css/backend_css/select2.css') }}" />
<link rel="stylesheet" href="{{asset('css/backend_css/matrix-style.css')}}" />


<link rel="stylesheet" href="{{asset('css/backend_css/fullcalendar.css')}}" /> 

<link rel="stylesheet" href="{{asset('css/backend_css/matrix-media.css')}}" />

<link rel="stylesheet" href="{{asset('css/backend_css/uniform.css')}}" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" />




<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" rel="stylesheet">

<link href="{{ asset('css/treeview.css') }}" rel="stylesheet">

</head>
<body>
@include('layouts.adminLayout.admin_header')
@include('layouts.adminLayout.admin_sidebar')
@yield('content')


@include('layouts.adminLayout.admin_footer')

<script src="{{ asset('js/backend_js/jquery.min.js')}}"></script> 
<script src="{{ asset('js/backend_js/jquery.ui.custom.js')}}"></script> 
<script src="{{ asset('js/backend_js/bootstrap.min.js')}}"></script> 
<script src="{{ asset('js/backend_js/jquery.uniform.js')}}"></script> 
<script src="{{ asset('js/backend_js/select2.min.js')}}"></script> 
<script src="{{ asset('js/backend_js/jquery.validate.js')}}"></script> 
<script src="{{ asset('js/backend_js/matrix.js')}}"></script> 
<script src="{{ asset('js/backend_js/matrix.form_validation.js')}}"></script> 
<script src="{{ asset('js/backend_js/matrix.tables.js') }}"></script> 
<script src="{{ asset('js/treeview.js') }}"></script>

<script src="{{ asset('js/backend_js/matrix.popover.js')}}"></script> 
<script src="{{ asset('js/backend_js/jquery.dataTables.min.js') }}">

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
</body>

</body>
</html>

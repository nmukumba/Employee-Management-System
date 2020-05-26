<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>HR System</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="stylesheet" href="{{asset('css/app.css')}}">
	<link rel="stylesheet" type="text/css" href="/libs/admin-lte/css/AdminLTE.css">
	<link rel="stylesheet" type="text/css" href="/libs/admin-lte/css/skins/skin-green.css">
	
</head>
<body class="hold-transition login-page">
	@yield('content')
</div>
<!-- /.login-box -->
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>

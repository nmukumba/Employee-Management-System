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
    <link rel="stylesheet" type="text/css" href="/libs/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" type="text/css" href="/libs/datatables.net-bs/css/dataTables.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/libs/fancybox/dist/jquery.fancybox.css">
    <link rel="stylesheet" type="text/css" href="/libs/morris.js/morris.css">
    <link rel="stylesheet" type="text/css" href="/libs/chart.js/dist/Chart.min.css">
    <link rel="stylesheet" type="text/css" href="/libs/intl-tel-input/css/intlTelInput.min.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="/libs/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
</head>
<body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper" id="app">

        <!-- Header -->
        @include('layouts.header')

        <!-- Sidebar -->
        @include('layouts.sidebar')

        @yield('content')


        <!-- Main Footer -->
        @include('layouts.footer')
    </div>
    <script src="{{asset('js/app.js')}}"></script>
    <script type="text/javascript" src="/libs/datatables.net/js/jquery.dataTables.js"></script>
    <!-- bootstrap datepicker -->
    <script src="/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="/libs/fancybox/dist/jquery.fancybox.js"></script>
    <script src="/libs/chart.js/dist/Chart.js"></script>
    <script src="/libs/raphael/raphael.min.js"></script>
    <script src="/libs/morris.js/morris.min.js"></script>
    <script src="/libs/intl-tel-input/js/intlTelInput.min.js"></script>
    <script src="/libs/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script type="text/javascript" src="/js/custom.js"></script>
    @if (Request::is('contract/create/*'))
    <script type="text/javascript" src="/js/contracts.js"></script>
    @endif
    @if (Request::is('employee/create'))
    <script type="text/javascript" src="/libs/webcam/webcam.min.js"></script>
    <script type="text/javascript" src="/js/employee.js"></script>
    @endif
    @if (Request::is('/'))
    <script type="text/javascript" src="/js/home.js"></script>
    @endif
    @if (Request::is('reports'))
    <script type="text/javascript" src="/js/reports.js"></script>
    @endif
    @if (Request::is('reports/downloadable'))
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script type="text/javascript" src="/libs/angular/angular.min.js"></script>
    <script type="text/javascript" src="/js/angular-app.js"></script>
    @endif
    @if (Request::is('contact_details/*/edit'))
    <script>
      var phone = document.querySelector("#phone");
      var phone2 = document.querySelector("#phone_2");
      var nextOfKin = document.querySelector("#next_of_kin_phone");
      window.intlTelInput(phone, {
          nationalMode: true,
          initialCountry: "zw",
          utilsScript: "/libs/intl-tel-input/js/utils.js?1562189064761",
          formatOnDisplay: true,
          autoHideDialCode: false,
          separateDialCode: true,
          customContainer: "form-group",
      });
      window.intlTelInput(phone_2, {
          nationalMode: true,
          initialCountry: "zw",
          utilsScript: "/libs/intl-tel-input/js/utils.js?1562189064761",
      });
      window.intlTelInput(nextOfKin,{
          nationalMode: true,
          initialCountry: "zw",
          utilsScript: "/libs/intl-tel-input/js/utils.js?1562189064761",
      });
  </script>
  @endif
  <script>
      $(document).ready(function() {
        $('#table').DataTable();
    });
</script>
</body>
</html>
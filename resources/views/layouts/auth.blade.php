<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>Yakuter Panel - Kullanıcı Girişi</title>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!--<title>{{ config('app.name', 'Laravel') }}</title>-->

        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>

        <meta name="description" content="User login page" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

        <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="{{ URL::asset('panel/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('panel/font-awesome/4.5.0/css/font-awesome.min.css') }}" />

        <!-- text fonts -->
        <link rel="stylesheet" href="{{ URL::asset('panel/css/fonts.googleapis.com.css') }}" />

        <!-- ace styles -->
        <link rel="stylesheet" href="{{ URL::asset('panel/css/ace.min.css') }}" />

        <!--[if lte IE 9]>
                <link rel="stylesheet" href="{{ URL::asset('panel/css/ace-part2.min.css') }}" />
        <![endif]-->
        <link rel="stylesheet" href="{{ URL::asset('panel/css/ace-rtl.min.css') }}" />

        <!--[if lte IE 9]>
          <link rel="stylesheet" href="{{ URL::asset('panel/css/ace-ie.min.css') }}" />
        <![endif]-->

        <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

        <!--[if lte IE 8]>
        <script src="{{ URL::asset('panel/js/html5shiv.min.js') }}"></script>
        <script src="{{ URL::asset('panel/js/respond.min.js') }}"></script>
        <![endif]-->
    </head>

	<body class="login-layout light-login">
            <div class="main-container">
                <div class="main-content">
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                            <div class="login-container">
                                <div class="center">
                                    <h1>
                                        <i class="ace-icon fa fa-leaf green"></i>
                                        <span class="red">Yakuter</span>
                                        <span class="white" id="id-text2">Panel</span>
                                    </h1>
                                    <h4 class="blue" id="id-company-text">&copy; yakuter.com</h4>
                                </div>

                                <div class="space-6"></div>

                                <div class="position-relative">

                                    @yield('content')

                                </div><!-- /.position-relative -->

                            </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.main-content -->
            </div><!-- /.main-container -->

            <!-- basic scripts -->

            <!--[if !IE]> -->
            <script src="{{ URL::asset('panel/js/jquery-2.1.4.min.js') }}"></script>
            <!-- <![endif]-->

            <!--[if IE]>
            <script src="{{ URL::asset('panel/js/jquery-1.11.3.min.js') }}"></script>
            <![endif]-->
            <script type="text/javascript">
                    if('ontouchstart' in document.documentElement) document.write("<script src='{{ URL::asset('panel/js/jquery.mobile.custom.min.js') }}'>"+"<"+"/script>");
            </script>
        </body>
</html>
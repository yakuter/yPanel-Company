<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
<title>{{ config('settings.site_name') }}</title>
<meta name="description" content="{{ config('settings.site_description') }}">
<meta name="keywords" content="{{ config('settings.site_keywords') }}">
<link rel="icon" href="{{ URL::asset('frontend/favicon.ico') }}">

<!-- CSS -->
<link rel="stylesheet" href="{{ URL::asset('panel/css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('panel/font-awesome/4.5.0/css/font-awesome.min.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('panel/css/fonts.googleapis.com.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('panel/css/ace.min.css') }}" class="ace-main-stylesheet" id="main-ace-style" />
<!--[if lte IE 9]>
	<link rel="stylesheet" href="{{ URL::asset('panel/css/ace-part2.min.css') }}" class="ace-main-stylesheet" />
<![endif]-->
<link rel="stylesheet" href="{{ URL::asset('panel/css/ace-skins.min.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('panel/css/ace-rtl.min.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('panel/css/yakuter.css') }}" />
<!--[if lte IE 9]>
  <link rel="stylesheet" href="{{ URL::asset('panel/css/ace-ie.min.css') }}" />
<![endif]-->

<!-- JAVASCRIPT -->
<script src="{{ URL::asset('panel/js/ace-extra.min.js') }}"></script>

<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

<!--[if lte IE 8]>
<script src="{{ URL::asset('panel/js/html5shiv.min.js') }}"></script>
<script src="{{ URL::asset('panel/js/respond.min.js') }}"></script>
<![endif]-->
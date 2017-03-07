<!DOCTYPE html>
<html lang="TR">
	<head>
        @include('admin.includes.head')
        @yield('pagehead')
	</head>

	<body class="no-skin">

		@include('admin.includes.navbar')
		
		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			@include('admin.includes.sidebar')
			
			@yield('content')
			
			@include('admin.includes.footer')

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
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
		<script src="{{ URL::asset('panel/js/bootstrap.min.js') }}"></script>




		<!-- page specific plugin scripts -->
		

		<!-- ace scripts -->
		<script src="{{ URL::asset('panel/js/ace-elements.min.js') }}"></script>
		<script src="{{ URL::asset('panel/js/ace.min.js') }}"></script>

		<!-- inline scripts related to this page -->

		@yield('pagefoot')

	</body>
</html>
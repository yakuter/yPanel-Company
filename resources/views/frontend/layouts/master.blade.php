<!DOCTYPE html>
<html lang="tr">
  <head>
    @include('frontend.includes.head')
    @yield('pagehead')
  </head>

  <body>
  	
  	@include('frontend.includes.navbar')
  	@include('frontend.includes.carousel')
  	
    <div class="container marketing">
    	@yield('content')  
		  @include('frontend.includes.footer')
    </div><!-- /.container -->

	    @yield('pagefoot')
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="{{ URL::asset('frontend/js/vendor/jquery.min.js') }}"><\/script>')</script>
    <script src="{{ URL::asset('frontend/js/bootstrap.min.js') }}"></script>
  </body>
</html>
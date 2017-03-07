<!-- Carousel
================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <?php
      $number=0;
    	if ( $cars->count() > 0 ) {
    	  foreach( $cars as $car ) {
					echo '<li data-target="#myCarousel" data-slide-to="'.$number.'" ';
					if ($number=="0") echo 'class="active"';
					echo "></li>\n";
					$number++;
    	  }
			}
		?>
  </ol>
  <div class="carousel-inner" role="listbox">
    
    <?php
      $number=0;
    	if ( $cars->count() > 0 ) {
    	  foreach( $cars as $car ) {  ?>
        <div class="item <?php if ($number=="0") echo 'active'; $number++; ?>">
          <img  src="{{ url(session('site_upload').'/headlines/'.$car->image) }}" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>{{ $car->name }}</h1>
              <p>{{ $car->info }}</p>
              <p><a class="btn btn-lg btn-primary" href="{{ $car->link }}" role="button">Learn more</a></p>
            </div>
          </div>
        </div>
        <?php
    	  }
			}
		?>

  </div>
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Önceki</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Sonraki</span>
  </a>
</div><!-- /.carousel -->
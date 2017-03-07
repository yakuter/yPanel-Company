@extends('admin.layouts.master')

@section('pagehead')
<link rel="stylesheet" href="{{ URL::asset('assets/css/colorbox.min.css') }}" />
@endsection


@section('pagefoot')
<script src="{{ URL::asset('assets/js/jquery.colorbox.min.js') }}"></script>


<script type="text/javascript">
jQuery(function($){	

	var $overflow = '';
	var colorbox_params = {
		rel: 'colorbox',
		reposition:true,
		scalePhotos:true,
		scrolling:false,
		previous:'<i class="ace-icon fa fa-arrow-left"></i>',
		next:'<i class="ace-icon fa fa-arrow-right"></i>',
		close:'&times;',
		current:'{current} of {total}',
		maxWidth:'100%',
		maxHeight:'100%',
		onOpen:function(){
			$overflow = document.body.style.overflow;
			document.body.style.overflow = 'hidden';
		},
		onClosed:function(){
			document.body.style.overflow = $overflow;
		},
		onComplete:function(){
			$.colorbox.resize();
		}
	};

	$('.ace-thumbnails [data-rel="colorbox"]').colorbox(colorbox_params);
	$("#cboxLoadingGraphic").html("<i class='ace-icon fa fa-spinner orange fa-spin'></i>");//let's add a custom loading icon
	
	
	$(document).one('ajaxloadstart.page', function(e) {
		$('#colorbox, #cboxOverlay').remove();
   });

	$('#cat-search').on('change', function() {
	    $("#filtre").submit();
	});

});
</script>
@endsection

@section('content')

<div class="main-content">
	<div class="main-content-inner">

		<div class="breadcrumbs ace-save-state clearfix" id="breadcrumbs" style="padding-top: 3px;">
			<ul class="breadcrumb pull-left">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="{{ url('admin') }}">Anasayfa</a>
				</li>

				<!--<li>
					<a href="#">Tables</a>
				</li>-->
				<li class="active">Tüm Resimler</li>
			</ul><!-- /.breadcrumb -->

			{!! Form::open(['method'=>'GET','url'=>'admin/photos','class'=>'form-search','role'=>'search', 'id' => 'filtre'])  !!}	
				<div class="cat-search pull-right" id="cat-search">

					<select name="search" class="form-control select">
						@if ( !$products->count() )
					    	<option value="0">Ürün bulunmamaktadır.</option>
					   	@else
					   		<option value="0" >Tüm Resimler</option>
					    	@foreach ( $products as $product )
					    	<option value="{{ $product->id }}" @if ($product->id == $search) selected @endif>{{ $product->name }}</option>
					    	@endforeach
					    @endif
					</select>
				</div>
			{!! Form::close() !!}

		</div>
		
		<div class="page-content">
			
			<div class="page-header">
				<h1>
					Galeri
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						<?php 
							if ((isset($search)) AND ($search!=0)) {
									$search_term = App\Product::find($search)->name;
									echo $search_term;
								}
							else {echo "Tüm Resimler";}
						?>
					</small>
				</h1>

			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<!--@if (count($errors) > 0)
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif -->
					
					@foreach (['danger', 'warning', 'success', 'info'] as $msg)
						@if(Session::has('alert-' . $msg))
					      <p class="alert alert-block alert-{{ $msg }}">
					      	@if(Session::has('alert-success'))<strong><i class="ace-icon fa fa-check"></i></strong>@endif
					      	@if(Session::has('alert-danger'))<strong><i class="ace-icon fa fa-times"></i></strong>@endif
					      	{{ Session::get('alert-' . $msg) }} 
					      	<button class="close" type="button" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
					      </p>
						@endif
					@endforeach
					
					@if ( !$datas->count() )
					    <p>Resim bulunmamaktadır.</p>
						@else
						<ul class="ace-thumbnails clearfix">
							    @foreach( $datas as $data )
								<li>
									<a href="{{ url(config('settings.site_upload').'/products/'.$data->image) }}" data-rel="colorbox">
										<img width="150" height="150" alt="150x150" src="{{ url(config('settings.site_upload').'/products/'.$data->image) }}" />
									</a>
									
									<div class="tags">
										<span class="label-holder">
											<span class="label label-warning arrowed-in">{{ $data->product->name }}</span>
										</span>
									</div>

									<div class="tools">
										<a href="{{ url('/admin/photos/'.$data->id.'/edit') }}">
											<i class="ace-icon fa fa-pencil"></i>
										</a>
										{{ Form::open(array('route' => array('photos.destroy', $data->id), 'method' => 'delete')) }}
										    <button class="" type="submit">
												<i class="ace-icon fa fa-times red"></i>
											</button>
										{{ Form::close() }}
									</div>
								</li>
								@endforeach
						</ul>
						@endif	
					{{ $datas->appends(['search' => $search])->links() }}
					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->

@endsection <!-- section "content" stop -->
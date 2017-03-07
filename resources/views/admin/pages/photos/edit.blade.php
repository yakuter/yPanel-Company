@extends('admin.layouts.master')

@section('pagehead')
@endsection


@section('pagefoot')
<script src="{{ URL::asset('assets/js/jquery.validate.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/jquery-additional-methods.min.js') }}"></script>

<script type="text/javascript">
jQuery(function($){	

	$('#validation-form').validate({
		debug: true,
		errorElement: 'div',
		errorClass: 'help-block',
		focusInvalid: false,
		ignore: "",
		rules: {
			image: {
				accept:"image/*"
			}
		},
			
		messages: {
			image: {
				required: "Lütfen resim seçiniz'",
				accept: "Lütfen bir resim dosyası seçiniz!"
			}
		},
					
		highlight: function (e) {
			$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
		},

		success: function (e) {
			$(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
			$(e).remove();
		},

		errorPlacement: function (error, element) {
			error.insertAfter(element.parent());
		},

		submitHandler: function (form) {
			form.submit();
		},
		invalidHandler: function (form) {
		}
	});

});
</script>
@endsection

@section('content')

<div class="main-content">
	<div class="main-content-inner">
		
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="{{ url('/admin') }}">Anasayfa</a>
				</li>

				<li>
					<a href="{{ url('/admin/photos') }}">Galeri</a>
				</li>
				<li class="active">Resim Güncelle</li>
			</ul><!-- /.breadcrumb -->
		</div>
		
		<div class="page-content">

			<div class="page-header">
				<h1>
					Galeri
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Resim Güncelle
					</small>
				</h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->

					{{ Form::open(['url' => '/admin/photos/'.$data->id, 'method' => 'put', 'id'=>'validation-form', 'class'=>'form-horizontal', 'files'=>true ]) }}

					@if (count($errors) > 0)
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif

						{{ csrf_field() }}

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right"> Ürün </label>

							<div class="col-sm-3">
								<select name="product_id" class="form-control select">
									@if ( !$products->count() )
								    	<option value="0">Ürün bulunmamaktadır.</option>
								   	@else
								    	@foreach ( $products as $product )
								    	<option value="{{ $product->id }}" @if ($product->id == $data->product_id) selected @endif>{{ $product->name }}</option>
								    	@endforeach
								    @endif
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" > Resim </label>

							<div class="col-sm-9">
								<div class="clearfix">
									<img src="{{ url(config('settings.site_upload').'/products/'.$data->image) }}" width="120"/>
									<input type="hidden" name="oldimage" value="{{ $data->image }}">
									<input type="file" name="image" accept="image/*" />
								</div>
							</div>
						</div>

						<div class="col-md-offset-3 col-md-9">
							<button class="btn btn-info" type="submit">
								<i class="ace-icon fa fa-check bigger-110"></i>
								Güncelle
							</button>

							&nbsp; &nbsp; &nbsp;

							<button class="btn" type="button" onClick="location.href='{{ url()->previous() }}'">
								<i class="ace-icon fa fa-undo bigger-110"></i>
								Geri
							</button>
						</div>
					{!! Form::close() !!}
					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->

@endsection <!-- section "content" stop -->
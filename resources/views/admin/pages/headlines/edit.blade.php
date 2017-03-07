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
			name: {
				required: true
			},
			link: {
				required: true,
				url: true
			},
			image: {
				accept:"image/*"
			}
		},
			
		messages: {
			name: {
				required: "Lütfen başlığı giriniz!"
			},
			link: {
				required: "Lütfen manşet bağlantısını giriniz!",
				url: "Lütfen doğru bir bağlantı adresi giriniz!",
			},
			image: {
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
					<a href="{{ url('/admin/headlines') }}">Tüm Manşetler</a>
				</li>
				<li class="active">Manşet Düzenle</li>
			</ul><!-- /.breadcrumb -->
		</div>

		<div class="page-content">
			
			<div class="page-header">
				<h1>
					Manşetler
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Yeni Manşet
					</small>
				</h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->

					{{ Form::open(['url' => '/admin/headlines/'.$data->id, 'method' => 'put', 'id'=>'validation-form', 'class'=>'form-horizontal', 'files'=>true ]) }}

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
							<label class="col-sm-3 control-label no-padding-right" > Başlık </label>

							<div class="col-sm-9">
								<div class="clearfix">
								<input type="text" name="name" id="name"  class="col-xs-10 col-sm-5" value="{{ $data->name }}" />
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" > Bağlantı </label>

							<div class="col-sm-9">
								<div class="clearfix">
								<input type="text" name="link" id="link" class="col-xs-10 col-sm-5" value="{{ $data->link }}" />
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" > Açıklama </label>

							<div class="col-sm-4">
								<div class="clearfix">
									<textarea name="info" id="info" rows="4" class="form-control">{{ $data->info }}</textarea>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" > Resim </label>

							<div class="col-sm-9">
								<div class="clearfix">
									<img src="{{ url(config('settings.site_upload').'/headlines/'.$data->image) }}" width="120"/>
									<input type="hidden" name="oldimage" value="{{ $data->image }}">
									<input type="file" name="image" id="image" accept="image/*" />
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
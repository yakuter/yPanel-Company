@extends('admin.layouts.master')

@section('pagehead')
@endsection

@section('pagefoot')
<script src="{{ URL::asset('assets/js/jquery.validate.min.js') }}"></script>
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
			phone: {
				required: true
			}
		},
			
		messages: {
			name: {
				required: "Lütfen müşteri ismini giriniz!"
			},
			phone: {
				required: "Lütfen telefon numarasını giriniz!"
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
					<a href="{{ url('/admin/customers') }}">Tüm Müşteriler</a>
				</li>
				<li class="active">Müşteri Düzenle</li>
			</ul><!-- /.breadcrumb -->
		</div>
		
		
		<div class="page-content">
			
			<div class="page-header">
				<h1>
					Müşteriler
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Müşteri Düzenle
					</small>
				</h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					{{ Form::open(['url' => '/admin/customers/'.$data->id, 'method' => 'put', 'class'=>'form-horizontal', 'id'=>'validation-form' ]) }}

					{{ csrf_field() }}
					
					@if (count($errors) > 0)
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right"> Müşteri *</label>

							<div class="col-sm-9">
								<div class="clearfix">
									<input type="text" name="name" id="name" placeholder="Müşteri" class="col-xs-10 col-sm-5" value="{{ $data->name }}" />
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right"> Adres </label>

							<div class="col-sm-6">
								<div class="clearfix">
									<textarea name="info" rows="3" class="form-control" id="info" placeholder="Adres">{{ $data->info }}</textarea>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right"> Ülke </label>

							<div class="col-sm-9">
								<div class="clearfix">
									<input type="text" name="country" id="country" placeholder="Ülke" class="col-xs-10 col-sm-5" value="{{ $data->country }}" />
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right"> Şehir </label>

							<div class="col-sm-9">
								<div class="clearfix">
									<input type="text" name="city" id="city" placeholder="Şehir" class="col-xs-10 col-sm-5" value="{{ $data->city }}"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right"> İletişim Personeli </label>

							<div class="col-sm-9">
								<div class="clearfix">
									<input type="text" name="contact" id="contact" placeholder="İletişim Personeli" class="col-xs-10 col-sm-5" value="{{ $data->contact }}" />
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right"> Telefon *</label>

							<div class="col-sm-9">
								<div class="clearfix">
									<input type="text" name="phone" id="phone" placeholder="0232 232 2323" class="col-xs-10 col-sm-5" value="{{ $data->phone }}"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right"> E-posta </label>

							<div class="col-sm-9">
								<div class="clearfix">
									<input type="text" name="email" id="email" placeholder="isim@isim.com" class="col-xs-10 col-sm-5" value="{{ $data->email }}"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right"> Notlar </label>

							<div class="col-sm-6">
								<div class="clearfix">
									<textarea name="notes" id="notes" rows="3" class="form-control" placeholder="Notlar">{{ $data->notes }}</textarea>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right"> Firma Türü</label>

							<div class="col-sm-3">
								<select name="type" class="form-control" id="type">
							    	<option value="1">Tedarikçi</option>
							    	<option value="2">Müşteri</option>
								</select>
							</div>
						</div>

						<div class="space-4"></div>

						<div class="clearfix form-actions">
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
						</div>
					{!! Form::close() !!}
					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->

@endsection <!-- section "content" stop -->
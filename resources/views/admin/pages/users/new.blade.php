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
			email: {
				required: true,
				email:true
			},
			password: {
				required: true,
				minlength: 6
			},
			password_confirmation: {
				required: true,
				minlength: 6,
				equalTo: "#password"
			},
			name: {
				required: true
			},
			image: {
				accept:"image/*"
			}
		},
			
		messages: {
			image: {
				accept: "Lütfen bir resim dosyası seçiniz!"
			},
			name: {
				required: "Lütfen kullanıcı adını giriniz!"
			},
			email: {
				required: "Lütfen doğru bir eposta adresi giriniz!",
				email: "Lütfen doğru bir eposta adresi giriniz!"
			},
			password: {
				required: "Lütfen parolayı giriniz!",
				minlength: "Parolanız en az 6 karakter içermelidir!"
			},
			password_confirmation: {
				required: "Lütfen parolanızı tekrar giriniz!",
				minlength: "Parolanız en az 6 karakter içermelidir!",
				equalTo: "Parolalarınız eşleşmemektedir!"
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
					<a href="{{ url('admin') }}">Anasayfa</a>
				</li>

				<li>
					<a href="{{ url('admin/users') }}">Tüm Kullanıcılar</a>
				</li>
				<li class="active">Yeni Kullanıcı</li>
			</ul><!-- /.breadcrumb -->			
		</div>

		<div class="page-content">
			
			<div class="page-header">
				<h1>
					Kullanıcılar
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Yeni Kullanıcı
					</small>
				</h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->

					{{ Form::open(['url' => '/admin/users', 'method' => 'POST', 'id'=>'validation-form', 'class'=>'form-horizontal', 'files'=>true ]) }}

					@if (count($errors) > 0)
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif


					<div class="col-xs-6">

					{{ csrf_field() }}

					<h3 class="header smaller lighter orange">Genel Bilgiler</h3>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" > Ad Soyad </label>

							<div class="col-sm-9">
								<input type="text" name="name_surname"  placeholder="Ad Soyad" class="col-xs-10 col-sm-8" />
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" > Website/Blog </label>

							<div class="col-sm-9">
								<input  type="url" id="url" name="url" placeholder="Website/Blog" class="col-xs-10 col-sm-8" />
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" > Biyografi </label>

							<div class="col-sm-8">
								<textarea name="info" rows="4" class="form-control" placeholder="Biyografi"></textarea>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" > Konum </label>

							<div class="col-sm-9">
								<input type="text" name="location"  placeholder="Konum" class="col-xs-10 col-sm-8" />
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" > Twitter </label>

							<div class="col-sm-9">
								<input type="text" name="twitter"  placeholder="@yakuter" class="col-xs-10 col-sm-8" />
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" > Fotoğraf </label>

							<div class="col-sm-9">
								<div class="clearfix">
									<input type="file" name="image" accept="image/*" />
								</div>
							</div>
						</div>

					</div>
					
					<div class="col-xs-6">
					<h3 class="header smaller lighter green">Güvenlik Bilgileri</h3>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" > Kullanıcı Adı *</label>

							<div class="col-sm-9">
								<div class="clearfix">
								<input type="text" name="name" id="name"  placeholder="Kullanıcı Adı" class="col-xs-10 col-sm-8" />
								</div>
							</div>
						</div>						

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" > E-posta *</label>

							<div class="col-sm-9">
								<div class="clearfix">
								<input type="email" name="email" id="email"  placeholder="E-posta" class="col-xs-10 col-sm-8" />
								</div>
							</div>
						</div>

						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" > Parola *</label>

							<div class="col-sm-9">
								<div class="clearfix">
									<input type="password" name="password" id="password"  placeholder="Parola" class="col-xs-10 col-sm-8" />
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" > Parola Tekrar *</label>

							<div class="col-sm-9">
								<div class="clearfix">
									<input type="password" name="password_confirmation" id="password_confirmation"  placeholder="Parola Tekrar" class="col-xs-10 col-sm-8" />
								</div>
							</div>
						</div>						
					</div>
						
						<div class="col-xs-12">
							<div class="clearfix form-actions text-center">
								<button class="btn btn-info submit" type="submit">
									<i class="ace-icon fa fa-check bigger-110"></i>
									Ekle
								</button>

								&nbsp; &nbsp; &nbsp;
								<button class="btn" type="button" onClick="location.href='{{ url()->previous() }}'">
									<i class="ace-icon fa fa-undo bigger-110"></i>
									Geri
								</button>
							</div>
						</div>

					{!! Form::close() !!}
					</div>
					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->

@endsection <!-- section "content" stop -->
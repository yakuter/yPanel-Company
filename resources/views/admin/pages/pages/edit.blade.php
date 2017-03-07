@extends('admin.layouts.master')

@section('pagehead')
@endsection


@section('pagefoot')
<script src="{{ URL::asset('panel/js/jquery.hotkeys.index.min.js') }}"></script>
<script src="{{ URL::asset('panel/js/bootstrap-wysiwyg.min.js') }}"></script>
<script src="{{ URL::asset('panel/js/jquery.validate.min.js') }}"></script>
<script src="{{ URL::asset('panel/js/jquery-additional-methods.min.js') }}"></script>
<script type="text/javascript">
jQuery(function($){	
	$('#editor1').ace_wysiwyg();
	
	function escapeHtml(text) {
	  var map = {
	    '&': '&amp;',
	    '<': '&lt;',
	    '>': '&gt;',
	    '"': '&quot;',
	    "'": '&#039;'
	  };

	  return text.replace(/[&<>"']/g, function(m) { return map[m]; });
	}

	$('form').submit(function(){
		$('#editor1').cleanHtml();
		var veri = escapeHtml($('div#editor1').html());
	    $('#info').val(veri);
	});
	
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
			info: {
				required: true
			},
			image: {
				accept:"image/*"
			}
		},
			
		messages: {
			name: {
				required: "Lütfen sayfa başlığını giriniz!"
			},
			info: {
				required: "Lütfen sayfa metnini giriniz!"
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
					<a href="{{ url('/admin/pages') }}">Tüm Sayfalar</a>
				</li>
				<li class="active">Sayfa Düzenle</li>
			</ul><!-- /.breadcrumb -->
		</div>

		<div class="page-content">
			
			<div class="page-header">
				<h1>
					Sayfalar
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Sayfa Düzenle
					</small>
				</h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->

					@if (count($errors) > 0)
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif

					{{ Form::open(['url' => '/admin/pages/'.$data->id, 'method' => 'put', 'class'=>'form-horizontal', 'id'=>'validation-form', 'files'=>true ]) }}

					{{ csrf_field() }}

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right"> Sayfa Başlığı * </label>

							<div class="col-sm-9">
								<input type="text" name="name" class="col-xs-10 col-sm-5" value="{{ $data->name }}" />
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right"> Sayfa Metni * </label>
							<div class="col-sm-6">

								<div class="wysiwyg-editor" id="editor1">{!! html_entity_decode($data->info, ENT_QUOTES, 'UTF-8') !!}</div>
							</div>
							<input type="hidden" name="info" id="info" value="" />
						</div>

						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" > Anahtar Kelimeler </label>

							<div class="col-sm-9">
								<input type="text" name="keywords"placeholder="Anahtar Kelimeler" class="col-xs-10 col-sm-5" value="{{ $data->keywords }}" />
							</div>
						</div>

						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right"> Tanımlayıcı Özet </label>

							<div class="col-sm-6">
								<textarea name="description" rows="3" class="form-control" placeholder="Tanımlayıcı Özet">{{ $data->description }}</textarea>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" > Resim </label>

							<div class="col-sm-9">
								<div class="clearfix">
									<img src="{{ url(config('settings.site_upload').'/pages/'.$data->image) }}" width="120"/>
									<input type="hidden" name="oldimage" value="{{ $data->image }}">
									<input type="file" name="image" accept="image/*" />
								</div>
							</div>
						</div>

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
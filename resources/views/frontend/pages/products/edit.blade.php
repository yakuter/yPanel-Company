@extends('admin.layouts.master')

@section('pagehead')
@endsection


@section('pagefoot')
<script src="{{ URL::asset('assets/js/jquery.hotkeys.index.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/bootstrap-wysiwyg.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/jquery.validate.min.js') }}"></script>
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
			}
		},
			
		messages: {
			name: {
				required: "Lütfen ürün ismini giriniz!"
			},
			info: {
				required: "Lütfen ürün açıklamasını giriniz!"
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
						<a href="{{ url('/admin/products') }}">Tüm Ürünler</a>
					</li>
					<li class="active">Ürün Düzenle</li>
				</ul><!-- /.breadcrumb -->
			</div>

		<div class="page-content">
			
			<div class="page-header">
				<h1>
					Ürünler
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Ürün Düzenle
					</small>
				</h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					{{ Form::open(['url' => '/admin/products/'.$data->id, 'method' => 'put', 'class'=>'form-horizontal', 'id'=>'validation-form' ]) }}

					{{ csrf_field() }}

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right"> Ürün İsmi </label>

							<div class="col-sm-9">
								<div class="clearfix">
									<input type="text" name="name" id="name" class="col-xs-10 col-sm-5" value="{{ $data->name }}" />
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" > Açıklama </label>
							<div class="col-sm-6">
								<div class="wysiwyg-editor" id="editor1">{!! html_entity_decode($data->info, ENT_QUOTES, 'UTF-8') !!}</div>
								<div class="clearfix">
									<input type="hidden" name="info" id="info" value="" />
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right"> Anahtar Kelimeler </label>

							<div class="col-sm-9">
								<input type="text" name="keywords"  placeholder="Anahtar Kelimeler" class="col-xs-10 col-sm-5"  value="{{ $data->keywords }}" />
							</div>
						</div>

						<div class="space-4"></div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right"> Tanımlayıcı Özet </label>

							<div class="col-sm-6">
								<textarea name="description" rows="3" class="form-control" placeholder="Tanımlayıcı Özet">{{ $data->description }}</textarea>
							</div>
						</div>

						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right"> Kategori</label>

							<div class="col-sm-3">
								<select name="category_id" class="form-control">
									@if ( !$categories->count() )
								    	<option value="0">Kategori bulunmamaktadır.</option>
								   	@else
								    	@foreach ( $categories as $category )
								    	<option value="{{ $category->id }}" @if ($data->category_id == $category->id) selected @endif>{{ $category->name }}</option>
								    	@endforeach
								    @endif
								</select>
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
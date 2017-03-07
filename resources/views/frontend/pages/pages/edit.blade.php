@extends('admin.layouts.master')

@section('pagehead')
@endsection


@section('pagefoot')
<script src="{{ URL::asset('assets/js/jquery.hotkeys.index.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/bootstrap-wysiwyg.min.js') }}"></script>
<script type="text/javascript">
jQuery(function($){	
	$('#editor1').ace_wysiwyg();
	$('form').submit(function(){
		$('#editor1').cleanHtml();
	    var mysave = $('div#editor1').html();
	    $('#info').val(mysave);
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

					{{ Form::open(['url' => '/admin/pages/'.$data->id, 'method' => 'put', 'class'=>'form-horizontal' ]) }}

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
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Anahtar Kelimeler </label>

							<div class="col-sm-9">
								<input type="text" name="keywords" id="form-field-1" placeholder="Anahtar Kelimeler" class="col-xs-10 col-sm-5" value="{{ $data->keywords }}" />
							</div>
						</div>

						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Tanımlayıcı Özet </label>

							<div class="col-sm-6">
								<textarea name="description" rows="3" class="form-control" id="form-field-2" placeholder="Tanımlayıcı Özet">{{ $data->description }}</textarea>
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
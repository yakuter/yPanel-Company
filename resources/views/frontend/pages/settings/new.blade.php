@extends('admin.layouts.master')

@section('content')

<div class="main-content">
	<div class="main-content-inner">
		
		<div class="page-content">
			
			<div class="page-header">
				<h1>
					Yazılar
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Yeni Yazı
					</small>
				</h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/yazilar') }}">
							{{ csrf_field() }}

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Yazı Başlığı </label>

							<div class="col-sm-9">
								<input type="text" name="baslik" id="form-field-1" placeholder="Yazı Başlığı" class="col-xs-10 col-sm-5" />
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Yazı Metni </label>

							<div class="col-sm-6">
								<textarea name="metin" rows="8" class="form-control" id="form-field-2" placeholder="Yazı Metni"></textarea>
							</div>
						</div>

						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-select-1"> Kategori</label>

							<div class="col-sm-3">
								<select name="kategori" class="form-control" id="form-field-select-1">
									@if ( !$kategoriler->count() )
								    	<option value="0">Kategori bulunmamaktadır.</option>
								   	@else
								    	@foreach ( $kategoriler as $kategori )
								    	<option value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>
								    	@endforeach
								    @endif
								</select>
							</div>
						</div>

						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-select-1"> Yazar</label>

							<div class="col-sm-3">
								<select name="yazar" class="form-control" id="form-field-select-1">
									@if ( !$kullanicilar->count() )
								    	<option value="0">Kullanıcı bulunmamaktadır.</option>
								   	@else
								    	@foreach ( $kullanicilar as $kullanici )
								    	<option value="{{ $kullanici->id }}">{{ $kullanici->name }}</option>
								    	@endforeach
								    @endif
								</select>
							</div>
						</div>

						<div class="clearfix form-actions">
							<div class="col-md-offset-3 col-md-9">
								<button class="btn btn-info" type="submit">
									<i class="ace-icon fa fa-check bigger-110"></i>
									Ekle
								</button>

								&nbsp; &nbsp; &nbsp;
								<button class="btn" type="reset">
									<i class="ace-icon fa fa-undo bigger-110"></i>
									Temizle
								</button>
							</div>
						</div>
					</form>
					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->

@endsection <!-- section "content" stop -->
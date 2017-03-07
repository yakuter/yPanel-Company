@extends('admin.layouts.master')

@section('content')

<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="#">Home</a>
				</li>

				<li>
					<a href="#">Tables</a>
				</li>
				<li class="active">Simple &amp; Dynamic</li>
			</ul><!-- /.breadcrumb -->

			<div class="nav-search" id="nav-search">
				<form class="form-search">
					<span class="input-icon">
						<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
						<i class="ace-icon fa fa-search nav-search-icon"></i>
					</span>
				</form>
			</div><!-- /.nav-search -->
		</div>

		<div class="page-content">
			
			<div class="page-header">
				<h1>
					Yazılar
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Yazı Düzenle
					</small>
				</h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					{{ Form::open(['url' => '/admin/yazilar/'.$data->id, 'method' => 'put', 'class'=>'form-horizontal' ]) }}

					{{ csrf_field() }}

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Yazı Başlığı </label>

							<div class="col-sm-9">
								<input type="text" name="baslik" id="form-field-1" class="col-xs-10 col-sm-5" value="{{ $data->baslik }}" />
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Yazı Metni </label>

							<div class="col-sm-6">
								<textarea name="metin" rows="8" class="form-control" id="form-field-2">{{ $data->metin }}</textarea>
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
								    	<option value="{{ $kategori->id }}" @if ($data->kategori == $kategori->id) selected @endif>{{ $kategori->kategori }}</option>
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
								    	<option value="{{ $kullanici->id }}" @if ($data->yazar == $kullanici->id) selected @endif >{{ $kullanici->name }}</option>
								    	@endforeach
								    @endif
								</select>
							</div>
						</div>

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
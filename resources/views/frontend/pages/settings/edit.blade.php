@extends('admin.layouts.master')

@section('content')

<div class="main-content">
	<div class="main-content-inner">
		<div class="page-content">
			
			<div class="page-header">
				<h1>
					Ayarlar
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Ayar Düzenle
					</small>
				</h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					{{ Form::open(['url' => '/admin/ayarlar/'.$data->id, 'method' => 'put', 'class'=>'form-horizontal' ]) }}

					{{ csrf_field() }}

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Ayar </label>

							<div class="col-sm-9">
								<input readonly="" type="text" name="ayar" id="form-field-1" class="col-xs-10 col-sm-5" value="{{ $data->ayar }}" />
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Değer </label>

							<div class="col-sm-9">
								<input type="text" name="deger" id="form-field-1" class="col-xs-10 col-sm-9" value="{{ $data->deger }}" />
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
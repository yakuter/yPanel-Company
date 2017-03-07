@extends('admin.layouts.master')

@section('pagehead')
<link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap-datepicker3.min.css') }}" />
@endsection


@section('pagefoot')
<script src="{{ URL::asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript">
	$('.date-picker').datepicker({
		autoclose: true,
		todayHighlight: true
	})
	//show datepicker when clicking on the icon
	.next().on(ace.click_event, function(){
		$(this).prev().focus();
	});
</script>
@endsection

@section('content')
<div class="main-content">
	<div class="main-content-inner">
		<div class="page-content">
			
			<div class="page-header">
				<h1>
					Raporlar
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Malzeme Raporu
					</small>
				</h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					{{ Form::open(['url' => '/admin/raporlar/malzeme', 'method' => 'post', 'class'=>'form-horizontal' ]) }}

					{{ csrf_field() }}

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-select-1"> Malzeme</label>

							<div class="col-sm-3">
								<select name="malzeme" class="form-control" id="form-field-select-1">
									@if ( !$datas->count() )
								    	<option value="0">Ürün bulunmamaktadır.</option>
								   	@else
								    	@foreach ( $datas as $data )
								    	<option value="{{ $data->id }}" >{{ $data->baslik }}</option>
								    	@endforeach
								    @endif
								</select>
							</div>
						</div>

						<div class="clearfix form-actions">
							<div class="col-md-offset-3 col-md-9">

								<button class="btn btn-purple" type="button" onClick="location.href='{{ url('/admin/raporlar') }}'">
									<i class="ace-icon fa fa-undo bigger-110"></i>
									Geri
								</button>

								&nbsp; &nbsp; &nbsp;

								<button class="btn btn-info" type="submit">
									<i class="ace-icon fa fa-check bigger-110"></i>
									Rapor Al
								</button>
							</div>
						</div>
					</form>

					@if (isset($sonuclar))

					<table id="simple-table" class="table  table-bordered table-hover">
							<thead>
								<tr>
									<th>Firma Adı</th>
									<th>Ocak</th>
									<th>Şubat</th>
									<th>Mart</th>
									<th>Nisan</th>
									<th>Mayıs</th>
									<th>Haziran</th>
									<th>Temmuz</th>
									<th>Ağustos</th>
									<th>Eylül</th>
									<th>Ekim</th>
									<th>Kasım</th>
									<th>Aralık</th>
								</tr>
							</thead>

							<tbody>
							@if ( !$sonuclar->count() )
							    <tr>
									<td colspan="15">Satış bulunmamaktadır.</td>
								</tr>
							@else
							    @foreach( $sonuclar as $sonuc )
							    <?php $time = strtotime($sonuc->tarih); ?>
								<tr>
									<td>{{ App\Firma::find($sonuc->firma)->isim }}</td>
									<td><?php  if (date("m", $time)=="01") echo $sonuc->miktar.' '.$sonuc->miktarolcu; ?></td>
									<td><?php  if (date("m", $time)=="02") echo $sonuc->miktar.' '.$sonuc->miktarolcu; ?></td>
									<td><?php  if (date("m", $time)=="03") echo $sonuc->miktar.' '.$sonuc->miktarolcu; ?></td>
									<td><?php  if (date("m", $time)=="04") echo $sonuc->miktar.' '.$sonuc->miktarolcu; ?></td>
									<td><?php  if (date("m", $time)=="05") echo $sonuc->miktar.' '.$sonuc->miktarolcu; ?></td>
									<td><?php  if (date("m", $time)=="06") echo $sonuc->miktar.' '.$sonuc->miktarolcu; ?></td>
									<td><?php  if (date("m", $time)=="07") echo $sonuc->miktar.' '.$sonuc->miktarolcu; ?></td>
									<td><?php  if (date("m", $time)=="08") echo $sonuc->miktar.' '.$sonuc->miktarolcu; ?></td>
									<td><?php  if (date("m", $time)=="09") echo $sonuc->miktar.' '.$sonuc->miktarolcu; ?></td>
									<td><?php  if (date("m", $time)=="10") echo $sonuc->miktar.' '.$sonuc->miktarolcu; ?></td>
									<td><?php  if (date("m", $time)=="11") echo $sonuc->miktar.' '.$sonuc->miktarolcu; ?></td>
									<td><?php  if (date("m", $time)=="12") echo $sonuc->miktar.' '.$sonuc->miktarolcu; ?></td>
								</tr>
								@endforeach
								@endif
							</tbody>
						</table>
						@endif



					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->

@endsection <!-- section "content" stop -->
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
					Satışlar
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Yeni Satış
					</small>
				</h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					{{ Form::open(['url' => '/admin/satislar/'.$data->id, 'method' => 'put', 'class'=>'form-horizontal' ]) }}

					{{ csrf_field() }}


						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tarih</label>

							<div class="col-sm-3">
								<div class="input-group">
									<input name="tarih" class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy" value="<?php  
												$time = strtotime($data->tarih);
												echo date("d-m-Y", $time);
											?>" />
									<span class="input-group-addon">
										<i class="fa fa-calendar bigger-110"></i>
									</span>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Fatura No </label>

							<div class="col-sm-9">
								<input type="text" name="fatura" id="form-field-1" placeholder="Fatura No" class="col-xs-10 col-sm-3" value="{{ $data->fatura }}" />
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-select-1"> Firma </label>

							<div class="col-sm-3">
								<select name="firma" class="form-control" id="form-field-select-1">
									@if ( !$firmalar->count() )
								    	<option value="0">Firma bulunmamaktadır.</option>
								   	@else
								    	@foreach ( $firmalar as $firma )
								    	<option value="{{ $firma->id }}" @if ($data->firma == $firma->id) selected @endif>{{ $firma->isim }}</option>
								    	@endforeach
								    @endif
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-select-1"> Ürün</label>

							<div class="col-sm-3">
								<select name="urun" class="form-control" id="form-field-select-1">
									@if ( !$urunler->count() )
								    	<option value="0">Ürün bulunmamaktadır.</option>
								   	@else
								    	@foreach ( $urunler as $urun )
								    	<option value="{{ $urun->id }}" @if ($data->urun == $urun->id) selected @endif>{{ $urun->baslik }}</option>
								    	@endforeach
								    @endif
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Vade (Peşin = 0)</label>

							<div class="col-sm-9">
								<input type="text" name="vade" id="form-field-1" placeholder="Vade" class="col-xs-10 col-sm-3" value="{{ $data->vade }}" />
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Döviz Br Satış </label>

							<div class="col-sm-9">
								<input type="text" name="doviz" id="form-field-1" placeholder="Döviz Br Satış" class="col-xs-10 col-sm-3" value="{{ $data->doviz }}" />
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Döviz Türü</label>

							<div class="col-sm-1">
								<select name="doviztur" class="form-control" id="form-field-select-1">
								    <option value="₺" @if ($data->fiyatolcu == "₺") selected @endif>₺</option>
								    <option value="$" @if ($data->fiyatolcu == "$") selected @endif>$</option>
								    <option value="€" @if ($data->fiyatolcu == "€") selected @endif>€</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Döviz Kuru </label>

							<div class="col-sm-9">
								<input type="text" name="dovizkur" id="form-field-1" placeholder="Döviz Kuru" class="col-xs-10 col-sm-3" value="{{ $data->dovizkur }}" />
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Miktar </label>

							<div class="col-sm-9">
								<input type="text" name="miktar" id="form-field-1" placeholder="Alım Miktarı" class="col-xs-10 col-sm-3" value="{{ $data->miktar }}" />
							</div>

						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Ölçü Birimi </label>

							<div class="col-sm-1">
								<select name="miktarolcu" class="form-control" id="form-field-select-1">
								    <option value="Kg" @if ($data->miktarolcu == "Kg") selected @endif>Kg</option>
								    <option value="Ton" @if ($data->miktarolcu == "Ton") selected @endif>Ton</option>
								    <option value="Adet" @if ($data->miktarolcu == "Adet") selected @endif>Adet</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-select-1"> Personel</label>

							<div class="col-sm-2">
								<select name="personel" class="form-control" id="form-field-select-1">
									@if ( !$kullanicilar->count() )
								    	<option value="0">Personel bulunmamaktadır.</option>
								   	@else
								    	@foreach ( $kullanicilar as $kullanici )
								    	<option value="{{ $kullanici->id }}" @if ($data->personel == $kullanici->id) selected @endif>{{ $kullanici->adsoyad }}</option>
								    	@endforeach
								    @endif
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Notlar </label>

							<div class="col-sm-4">
								<textarea name="not" rows="4" class="form-control" id="form-field-2" placeholder="Notlar">{{ $data->not }}</textarea>
							</div>
						</div>

						<div class="clearfix form-actions">
							<div class="col-md-offset-3 col-md-9">

								<button class="btn btn-purple" type="button" onClick="location.href='{{ url('/admin/satislar') }}'">
									<i class="ace-icon fa fa-undo bigger-110"></i>
									Geri
								</button>

								&nbsp; &nbsp; &nbsp;

								<button class="btn btn-info" type="submit">
									<i class="ace-icon fa fa-check bigger-110"></i>
									Güncelle
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
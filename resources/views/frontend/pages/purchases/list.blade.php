@extends('admin.layouts.master')

@section('content')

<div class="main-content">
	<div class="main-content-inner">
		
		<div class="page-content">
			
			<div class="page-header">
				<h1>
					Alımlar
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Tüm Alımlar
					</small>
				</h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<div class="row">
						<div class="col-xs-12">
							<table id="simple-table" class="table  table-bordered table-hover">
								<thead>
									<tr>
										<th>Alım ID</th>
										<th>Ürün</th>
										<th>Tedarikçi</th>
										<th>Tarih</th>
										<th>Miktar</th>
										<th>Fiyat</th>
										<th>Personel</th>
										<th>İşlemler</th>
									</tr>
								</thead>

								<tbody>
								
								@if ( !$datas->count() )
								    <tr>
										<td></td>
										<td>Alım bulunmamaktadır.</td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>

								@else
								    @foreach( $datas as $data )
									<tr>
										<td>#{{ $data->id }}</td>
										<td>{{ App\Urun::find($data->urun)->baslik }}</td>
										<td>{{ App\Firma::find($data->tedarikci)->isim }}</td>
										<td>
											<?php  
												$time = strtotime($data->tarih);
												echo date("d/m/Y", $time);
											?>
										</td>
										<td>{{ $data->miktar }} {{ $data->miktarolcu }}</td>
										<td>{{ $data->fiyat }} {{ $data->fiyatolcu }}</td>
										<td>{{ App\User::find($data->personel)->adsoyad }}</td>
										<td>
											<div class="hidden-sm hidden-xs btn-group">
												
												<button class="btn btn-xs btn-info" onClick="location.href='{{ url('/admin/alimlar/'.$data->id.'/edit') }}'">
													<i class="ace-icon fa fa-pencil bigger-120"></i>
												</button>

												<button class="btn btn-xs btn-danger" onClick="location.href='{{ route('alimlar.delete', $data->id) }}'">
													<i class="ace-icon fa fa-trash-o bigger-120"></i>
												</button>
											</div>
										</td>
									</tr>
									@endforeach
									@endif
								</tbody>
							</table>
						</div><!-- /.span -->
					</div><!-- /.row -->

					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->

@endsection <!-- section "content" stop -->
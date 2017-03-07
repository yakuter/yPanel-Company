@extends('admin.layouts.master')

@section('content')

<div class="main-content">
	<div class="main-content-inner">
		<div class="page-content">
			
			<div class="page-header">
				<h1>
					Satışlar
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Tüm Satışlar
					</small>
				</h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
						<table id="simple-table" class="table  table-bordered table-hover">
							<thead>
								<tr>
									<th>Satış No</th>
									<th>Tarih</th>
									<th>Fatura No</th>
									<th>Firma</th>
									<th>Malzeme</th>
									<th>Vade</th>
									<th>Döviz Br</th>
									<th>Tür</th>
									<th>Kur</th>
									<th>TL Br</th>
									<th>Miktar</th>
									<th>Br</th>
									<th>Toplam</th>
									<th>Personel</th>
									<th>İşlemler</th>
								</tr>
							</thead>

							<tbody>
							@if ( !$datas->count() )
							    <tr>
									<td colspan="15">Satış bulunmamaktadır.</td>
								</tr>
							@else
							    @foreach( $datas as $data )
								<tr>
									<td>#{{ $data->id }}</td>
									<td>
										<?php  
											$time = strtotime($data->tarih);
											echo date("d/m/Y", $time);
										?>
									</td>
									<td>{{ $data->fatura }}</td>
									<td>{{ App\Firma::find($data->firma)->isim }}</td>
									<td>{{ App\Urun::find($data->urun)->baslik }}</td>
									<td>@if ($data->vade=="0") PEŞİN @else {{ $data->vade }} @endif</td>
									<td>{{ $data->doviz }}</td>
									<td>{{ $data->doviztur }}</td>
									<td>{{ $data->dovizkur }}</td>
									<td>{{ $data->doviz * $data->dovizkur }}</td>
									<td>{{ $data->miktar }}</td>
									<td>{{ $data->miktarolcu }}</td>
									<td>{{ $data->doviz * $data->dovizkur * $data->miktar }}</td>
									<td>{{ App\User::find($data->personel)->adsoyad }}</td>
									<td>
										<div class="hidden-sm hidden-xs btn-group">
											
											<button class="btn btn-xs btn-info" onClick="location.href='{{ url('/admin/satislar/'.$data->id.'/edit') }}'">
												<i class="ace-icon fa fa-pencil bigger-120"></i>
											</button>

											<button class="btn btn-xs btn-danger" onClick="location.href='{{ route('satislar.delete', $data->id) }}'">
												<i class="ace-icon fa fa-trash-o bigger-120"></i>
											</button>
										</div>
									</td>
								</tr>
								@endforeach
								@endif
							</tbody>
						</table>
						{{ $datas->links() }}
					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->

@endsection <!-- section "content" stop -->
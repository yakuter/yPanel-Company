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
						Tüm Ayarlar
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
										<th>ID</th>
										<th>Ayar</th>
										<th>Değer</th>
										<th>İşlemler</th>
									</tr>
								</thead>

								<tbody>
								
								@if ( !$datas->count() )
								    <tr>
										<td></td>
										<td>Ayar bulunmamaktadır.</td>
										<td></td>
										<td></td>
									</tr>

								@else
								    @foreach( $datas as $data )
									<tr>
										<td>#{{ $data->id }}</td>
										<td>{{ $data->ayar }}</td>
										<td>{{ $data->deger }}</td>
										<td>
											<div class="hidden-sm hidden-xs btn-group">
												
												<button class="btn btn-xs btn-info" onClick="location.href='{{ url('/admin/ayarlar/'.$data->id.'/edit') }}'">
													<i class="ace-icon fa fa-pencil bigger-120"></i>
												</button>

												<!--<button class="btn btn-xs btn-danger" onClick="location.href='{{ route('yazilar.delete', $data->id) }}'">
													<i class="ace-icon fa fa-trash-o bigger-120"></i>
												</button>-->
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
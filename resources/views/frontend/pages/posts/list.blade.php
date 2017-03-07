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
						Tüm Yazılar
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
										<th>Başlık</th>
										<th>Bağlantı</th>
										<th>Kategori</th>
										<th>Yazar</th>
										<th>İşlemler</th>
									</tr>
								</thead>

								<tbody>
								
								@if ( !$datas->count() )
								    <tr>
										<td></td>
										<td>Yazı bulunmamaktadır.</td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>

								@else
								    @foreach( $datas as $data )
									<tr>
										<td>#{{ $data->id }}</td>
										<td>{{ $data->baslik }}</td>
										<td>{{ $data->permalink }}</td>
										<td>{{ App\Kategori::find($data->kategori)->kategori }}</td>
										<td>{{ App\User::find($data->yazar)->name }}</td>
										<td>
											<div class="hidden-sm hidden-xs btn-group">
												
												<button class="btn btn-xs btn-info" onClick="location.href='{{ url('/admin/yazilar/'.$data->id.'/edit') }}'">
													<i class="ace-icon fa fa-pencil bigger-120"></i>
												</button>

												<button class="btn btn-xs btn-danger" onClick="location.href='{{ route('yazilar.delete', $data->id) }}'">
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
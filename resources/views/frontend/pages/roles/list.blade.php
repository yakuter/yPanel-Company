@extends('admin.layouts.master')

@section('content')

<div class="main-content">
	<div class="main-content-inner">
		
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="{{ url('admin') }}">Anasayfa</a>
				</li>

				<!--<li>
					<a href="#">Tables</a>
				</li>-->
				<li class="active">Tüm Üyelik Türleri</li>
			</ul><!-- /.breadcrumb -->
		</div>

		<div class="page-content">
			
			<div class="page-header">
				<h1>
					Üyelik Türleri
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Tüm Üyelik Türleri
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

					<table id="simple-table" class="table  table-bordered table-hover">
						<thead>
							<tr>
								<th class="detail-col">ID</th>
								<th>Üyelik Türü</th>
								<th>Açıklama</th>
								<th>Kullanıcı Sayısı</th>
								<th>İşlemler</th>
							</tr>
						</thead>

						<tbody>
						
						@if ( !$datas->count() )
						    <tr>
								<td colspan="4">Üyelik türü bulunmamaktadır.</td>
							</tr>

						@else
						    @foreach( $datas as $data )
							<tr>
								<td>#{{ $data->id }}</td>
								<td>{{ $data->name }}</td>
								<td>{{ $data->info }}</td>
								<td>{{ App\User::where('role_id', $data->id)->count() }}</td>
								<td>
									<div class="hidden-sm hidden-xs btn-group">
										
										<button class="btn btn-xs btn-info" onClick="location.href='{{ url('/admin/roles/'.$data->id.'/edit') }}'">
											<i class="ace-icon fa fa-pencil bigger-120"></i>
										</button>

										<button class="btn btn-xs btn-danger" onClick="location.href='{{ route('roles.delete', $data->id) }}'">
											<i class="ace-icon fa fa-trash-o bigger-120"></i>
										</button>
									</div>
								</td>
							</tr>
							@endforeach
							@endif
						</tbody>
					</table>
					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->

@endsection <!-- section "content" stop -->

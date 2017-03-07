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
				<li class="active">Tüm Kullanıcılar</li>
			</ul><!-- /.breadcrumb -->

			<div class="nav-search" id="nav-search">
				{!! Form::open(['method'=>'GET','url'=>'admin/users','class'=>'form-search','role'=>'search'])  !!}
					<span class="input-icon">
						<input type="text" name="search" placeholder="Arama ..." class="nav-search-input"  autocomplete="off" />
						<i class="ace-icon fa fa-search nav-search-icon"></i>
					</span>
				{!! Form::close() !!}
			</div><!-- /.nav-search -->
		</div>

		<div class="page-content">
			
			<div class="page-header">
				<h1>
					Kullanıcılar
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						<?php 
							if (isset($search)) {echo "Arama: ".$search;}
							else {echo "Tüm Kullanıcılar";}
						?>
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
										<th>Fotoğraf</th>
										<th>Adı Soyadı</th>
										<th>Kullanıcı Adı</th>
										<th>Eposta</th>
										<th>Website</th>
										<th>Konum</th>
										<th>Üyelik Türü</th>
										<th>İşlemler</th>
									</tr>
								</thead>

								<tbody>
								
								@if ( !$datas->count() )
								    <tr>
										<td colspan="9">Yazı bulunmamaktadır.</td>
									</tr>

								@else
								    @foreach( $datas as $data )
									<tr>
										<td>#{{ $data->id }}</td>
										<td>
										<?php 
											$folder = App\Setting::where('id', 7)->first();
											$folder = $folder['value']."/users";
            							?>
										<img src="{{ url('/'.$folder.'/'.$data->image) }}" width="40" height="40" />
										</td>
										<td>{{ $data->name_surname }}</td>
										<td>{{ $data->name }}</td>
										<td>{{ $data->email }}</td>
										<td>{{ $data->url }}</td>
										<td>{{ $data->location }}</td>
										<td>
											<?php 
												$user_role = App\Role_User::where('user_id', $data->id)->first();
            								?>
											{{ $user_role->role->name }}</td>
										<td>
											<div class="hidden-sm hidden-xs btn-group">
												
												<button class="btn btn-xs btn-info" onClick="location.href='{{ url('/admin/users/'.$data->id.'/edit') }}'">
													<i class="ace-icon fa fa-pencil bigger-120"></i>
												</button>

												<button class="btn btn-xs btn-danger" onClick="location.href='{{ route('users.delete', $data->id) }}'">
													<i class="ace-icon fa fa-trash-o bigger-120"></i>
												</button>
											</div>
										</td>
									</tr>
									@endforeach
									@endif
								</tbody>
							</table>
							{{ $datas->appends(['search' => $search])->links() }}
						</div><!-- /.span -->
					</div><!-- /.row -->

					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->

@endsection <!-- section "content" stop -->
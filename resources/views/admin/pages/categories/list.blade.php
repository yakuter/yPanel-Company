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

				<li class="active">Tüm Kategoriler</li>
			</ul><!-- /.breadcrumb -->
		</div>
		
		<div class="page-content">
			
			<div class="page-header">
				<h1>
					Kategoriler
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Tüm Kategoriler
					</small>
				</h1>
			</div><!-- /.page-header -->
					
			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
		
					@foreach (['danger', 'warning', 'success', 'info'] as $msg)
						@if(Session::has('alert-' . $msg))
					      <p class="alert alert-block alert-{{ $msg }}">
					      	@if(Session::has('alert-success'))<strong><i class="ace-icon fa fa-check"></i></strong>@endif
					      	@if(Session::has('alert-danger'))<strong><i class="ace-icon fa fa-times"></i></strong>@endif
					      	{{ Session::get('alert-' . $msg) }} 
					      	<button class="close" type="button" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
					      </p>
						@endif
					@endforeach

					<table id="simple-table" class="table  table-bordered table-hover">
						<thead>
							<tr>
								<th class="detail-col">ID</th>
								<th>Resim</th>
								<th>Kategori Adı</th>
								<th>Üst Kategori</th>
								<th>Bağlantı</th>
								<th>Ürün Sayısı</th>
								<th>İşlemler</th>
							</tr>
						</thead>

						<tbody>
						
						@if ( !$datas->count() )
						    <tr>
								<td colspan="5">Kategori bulunmamaktadır.</td>
							</tr>

						@else
						    @foreach( $datas as $data )
							<tr>
								<td>#{{ $data->id }}</td>
								<td><img src="{{ url(config('settings.site_upload').'/cats/'.$data->image) }}" width="40" height="40" /></td>
								<td>{{ $data->name }}</td>
								<td>
									@if ($data->parent_id != 0)
										{{ $data->parent_cat->name }}
									@endif
									
									</td>
								<td>{{ $data->slug }}</td>
								<td>{{ $data->products->count() }}</td>
								<td>
									<div class="hidden-sm hidden-xs btn-group">
										<button class="btn btn-xs btn-info ybutton" onClick="location.href='{{ url('/admin/categories/'.$data->id.'/edit') }}'">
											<i class="ace-icon fa fa-pencil bigger-120"></i>
										</button>
										
										{{ Form::open(['route' => ['categories.destroy', $data->id], 'method' => 'DELETE', 'class' => 'pull-left']) }}
									    <button class="btn btn-xs btn-danger ybutton">
											<i class="ace-icon fa fa-trash-o bigger-120"></i>
										</button>
										{{ Form::close() }}
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
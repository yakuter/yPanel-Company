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
				<li class="active">Tüm Manşetler</li>
			</ul><!-- /.breadcrumb -->
		</div>
		
		<div class="page-content">
			
			<div class="page-header">
				<h1>
					Manşetler
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Tüm Manşetler
					</small>
				</h1>
			</div><!-- /.page-header -->
					
			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					
					<!--@if (count($errors) > 0)
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif -->
					
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
								<th>Başlık</th>
								<th>Bağlantı</th>
								<th>Açıklama</th>
								<th>İşlemler</th>
							</tr>
						</thead>

						<tbody>
						
						@if ( !$datas->count() )
						    <tr>
								<td colspan="6">Manşet bulunmamaktadır.</td>
							</tr>

						@else
						    @foreach( $datas as $data )
							<tr>
								<td>#{{ $data->id }}</td>
								<td>
								<img src="{{ url(config('settings.site_upload').'/headlines/'.$data->image) }}" width="40" height="40" />
								</td>
								<td>{{ $data->name }}</td>
								<td>{{ $data->link }}</td>
								<td>{{ $data->info }}</td>
								<td>
									<div class="hidden-sm hidden-xs btn-group">
										<button class="btn btn-xs btn-info ybutton" onClick="location.href='{{ url('/admin/headlines/'.$data->id.'/edit') }}'">
											<i class="ace-icon fa fa-pencil bigger-120"></i>
										</button>
										
										{{ Form::open(['route' => ['headlines.destroy', $data->id], 'method' => 'DELETE', 'class' => 'pull-left']) }}
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
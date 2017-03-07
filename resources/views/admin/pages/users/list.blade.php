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
					
					<!--<div class="row">
						<div class="col-xs-12 col-sm-6 widget-container-col" id="widget-container-col-3">
							<div class="widget-box widget-color-orange light-border collapsed" id="widget-box-1">
								<div class="widget-header widget-header-small">
									<h6 class="widget-title">
										<i class="ace-icon fa fa-sort"></i>
										Detaylı Arama
									</h6>

									<div class="widget-toolbar">
										<a href="#" data-action="collapse">
											<i class="ace-icon fa fa-plus" data-icon-show="fa-plus" data-icon-hide="fa-minus"></i>
										</a>
									</div>
								</div>

								<div class="widget-body">
									<div class="widget-main">
										<div class="" id="">
											{!! Form::open(['method'=>'GET','url'=>'admin/users','class'=>'form-search','role'=>'search'])  !!}
												<span class="input-icon">
													<input type="text" name="search" placeholder="Arama ..." class="nav-search-input"  autocomplete="off" />
													<i class="ace-icon fa fa-search nav-search-icon"></i>
												</span>
											{!! Form::close() !!}
										</div>
									</div>

									<div class="widget-toolbox padding-8 clearfix">
										<button class="btn btn-xs btn-success pull-right">
											<span class="bigger-110">Arama yap</span>

											<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
										</button>
									</div>
								</div>
								
								
							</div>
						</div>
					</div>-->
					
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
								<td><img src="{{ url(config('settings.site_upload').'/users/'.$data->image) }}" width="40" height="40" /></td>
								<td>{{ $data->name_surname }}</td>
								<td>{{ $data->name }}</td>
								<td>{{ $data->email }}</td>
								<td>{{ $data->url }}</td>
								<td>{{ $data->location }}</td>
								<td>
									<div class="hidden-sm hidden-xs btn-group">
										<button class="btn btn-xs btn-info ybutton" onClick="location.href='{{ url('/admin/users/'.$data->id.'/edit') }}'">
											<i class="ace-icon fa fa-pencil bigger-120"></i>
										</button>
										
										{{ Form::open(['route' => ['users.destroy', $data->id], 'method' => 'DELETE', 'class' => 'pull-left']) }}
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
					{{ $datas->appends(['search' => $search])->links() }}
					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->

@endsection <!-- section "content" stop -->
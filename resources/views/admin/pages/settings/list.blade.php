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
								<th>ID</th>
								<th>Site Ayarları</th>
								<th>Kısa Adı</th>
								<th>Değer</th>
								<th>İşlemler</th>
							</tr>
						</thead>

						<tbody>
						
						@if ( !$datas->count() )
						    <tr>
								<td colspan="4">Ayar bulunmamaktadır.</td>
							</tr>
						@else
						    @foreach( $datas as $data )
							<tr>
								<td>#{{ $data->id }}</td>
								<td>{{ $data->site_option }}</td>
								<td>{{ $data->slug }}</td>
								<td>{{ $data->value }}</td>
								<td>
									<div class="hidden-sm hidden-xs btn-group">
										<button class="btn btn-xs btn-info ybutton" onClick="location.href='{{ url('/admin/settings/'.$data->id.'/edit') }}'">
											<i class="ace-icon fa fa-pencil bigger-120"></i>
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
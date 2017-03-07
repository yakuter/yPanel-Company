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

				<?php 
					if (isset($search)) {
						?>
							<li><a href="{{ url('admin/pages') }}">Tüm pages</a></li>
							<li class="active">Arama Sonucu</li>
						<?php
					}
					else {
						?>
							<li class="active">Tüm pages</li>
						<?php
					}
				?>

			</ul><!-- /.breadcrumb -->

			<div class="nav-search" id="nav-search">
				{!! Form::open(['method'=>'GET','url'=>'admin/pages','class'=>'form-search','role'=>'search'])  !!}
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
					pages
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						<?php 
							if (isset($search)) {echo "Arama: ".$search;}
							else {echo "Tüm pages";}
						?>
					</small>
				</h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<table id="simple-table" class="table  table-bordered table-hover">
						<thead>
							<tr>
								<th>ID</th>
								<th>Başlık</th>
								<th>Bağlantı</th>
								<th>Anahtar Kelimeler</th>
								<th>Tanımlayıcı Özet</th>
								<th>İşlemler</th>
							</tr>
						</thead>

						<tbody>
						
						@if ( !$datas->count() )
						    <tr>
								<td colspan="6">Sayfa bulunmamaktadır.</td>
							</tr>

						@else
						    @foreach( $datas as $data )
							<tr>
								<td>#{{ $data->id }}</td>
								<td>{{ $data->name }}</td>
								<td>{{ $data->permalink }}</td>
								<td>{{ $data->keywords }}</td>
								<td>{{ $data->description }}</td>
								<td>
									<div class="hidden-sm hidden-xs btn-group">
										
										<button class="btn btn-xs btn-success" onClick="location.href='{{ route('pages.show', $data->id) }}'">
											<i class="ace-icon fa fa-desktop bigger-120"></i>
										</button>

										<button class="btn btn-xs btn-info" onClick="location.href='{{ url('/admin/pages/'.$data->id.'/edit') }}'">
											<i class="ace-icon fa fa-pencil bigger-120"></i>
										</button>

										<button class="btn btn-xs btn-danger" onClick="location.href='{{ route('pages.delete', $data->id) }}'">
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
					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->

@endsection <!-- section "content" stop -->
@extends('admin.layouts.master')

@section('pagehead')
@endsection


@section('pagefoot')
@endsection

@section('content')

<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="{{ url('/admin') }}">Anasayfa</a>
				</li>

				<li>
					<a href="{{ url('/admin/kategoriler') }}">Tüm Kategoriler</a>
				</li>
				<li class="active">Kategori Göster</li>
			</ul><!-- /.breadcrumb -->
		</div>

		<div class="page-content">
			
			<div class="page-header">
				<h1>
					Kategoriler
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Kategori Göster
					</small>
				</h1>
			</div><!-- /.page-header -->

			<div class="row">
				
					<!-- PAGE CONTENT BEGINS -->							
						<div class="col-sm-6">
							<h2>{{ $data->name }}</h2>
							<p><b>Açıklama:</b> {!! html_entity_decode($data->info, ENT_QUOTES, 'UTF-8') !!}</p>
							<hr />
							<p>
								<?php 
									$folder = App\Ayar::where('id', 7)->first();
									$folder = $folder['deger']."/cats";
    							?>
								<img src="{{ url($folder.'/'.$data->image) }}" width="120" />
							</p>

							<div class="clearfix form-actions">
								<div class="col-md-offset-3 col-md-9">
									<button class="btn btn-purple" type="button" onClick="location.href='{{ url()->previous() }}'">
										<i class="ace-icon fa fa-undo bigger-110"></i>
										Geri
									</button>
								</div>
							</div>
						</div><!-- /.col -->

					<!-- PAGE CONTENT ENDS -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->

@endsection <!-- section "content" stop -->
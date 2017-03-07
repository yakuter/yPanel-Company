@extends('admin.layouts.master')

@section('content')

<div class="main-content">
	<div class="main-content-inner">
		<div class="page-content">
			
			<div class="row">
				<div class="col-xs-12" >
					<!-- PAGE CONTENT BEGINS -->

					<div class="page-header">
						<h1>
							Panel
							<small>
								<i class="ace-icon fa fa-angle-double-right"></i>
								Genel durum &amp; istatistikler
							</small>
						</h1>
					</div><!-- /.page-header -->
						
						
						<?php //dd(config('user')); ?>
						
						
						
						<div class="row welcome">
							<div class="col-sm-6 merhaba">
								<h1>Merhaba!</h1>
								<h2>Yakuter Website Yönetim Paneline Hoşgeldiniz.</h2>
							</div>

							<div class="col-sm-6 merhaba2">
								<h3>Yönetim Paneli Yetenekleri</h3>
								<h4>Size özel hazırlanmış bu yönetim panelinde, şirketinizin ürünlerini rahatlıkla müşterilerinize tanıtabilir, websitenizin içeriğini dilediğiniz gibi herhangi bir kod bilgisine ihtiyaç duymadan buradan güncelleyebilirsiniz.</h4>
							</div>

							<div class="space-6"></div>

							<div class="col-sm-7 infobox-container">
								<div class="infobox infobox-green">
									<div class="infobox-icon">
										<i class="ace-icon fa fa-folder-open"></i>
									</div>

									<div class="infobox-data">
										<span class="infobox-data-number">{{ App\Category::count() }}</span>
										<div class="infobox-content">kategori</div>
									</div>

								</div>

								<div class="infobox infobox-blue">
									<div class="infobox-icon">
										<i class="ace-icon fa fa-cutlery"></i>
									</div>

									<div class="infobox-data">
										<span class="infobox-data-number">{{ App\Product::count() }}</span>
										<div class="infobox-content">ürün</div>
									</div>

								</div>

								<div class="infobox infobox-pink">
									<div class="infobox-icon">
										<i class="ace-icon fa fa-camera"></i>
									</div>

									<div class="infobox-data">
										<span class="infobox-data-number">{{ App\Photo::count() }}</span>
										<div class="infobox-content">fotoğraf</div>
									</div>
									
								</div>

								<div class="infobox infobox-red">
									<div class="infobox-icon">
										<i class="ace-icon fa fa-book"></i>
									</div>

									<div class="infobox-data">
										<span class="infobox-data-number">{{ App\Page::count() }}</span>
										<div class="infobox-content">sayfa/yazı</div>
									</div>
								</div>

								<div class="infobox infobox-orange2">
									<div class="infobox-icon">
										<i class="ace-icon fa fa-users"></i>
									</div>

									<div class="infobox-data">
										<span class="infobox-data-number">{{ App\User::count() }}</span>
										<div class="infobox-content">kullanıcı</div>
									</div>
								</div>

								<div class="infobox infobox-blue2">
									<div class="infobox-icon">
										<i class="ace-icon fa fa-globe"></i>
									</div>

									<div class="infobox-data">
										<span class="infobox-data-number">{{ App\News::count() }}</span>
										<div class="infobox-content">haber</div>
									</div>
								</div>
							</div>
						</div>

					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->
@endsection
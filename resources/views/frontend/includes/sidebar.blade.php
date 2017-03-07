
			<div id="sidebar" class="sidebar responsive ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success" onClick="location.href='{{ url('/admin/kategoriler') }}'">
						<i class="ace-icon fa fa-folder-open"></i>
					</button>

					<button class="btn btn-info" onClick="location.href='{{ url('/admin/sayfalar/create') }}'">
						<i class="ace-icon fa fa-pencil"></i>
					</button>

					<button class="btn btn-warning" onClick="location.href='{{ url('/admin/kullanicilar') }}'">
						<i class="ace-icon fa fa-users"></i>
					</button>

					<button class="btn btn-danger" onClick="location.href='{{ url('/admin/ayarlar') }}'">
						<i class="ace-icon fa fa-cogs"></i>
					</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">

					<li class="">
						<a href="{{ url('/admin') }}">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Panel </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-bullhorn"></i>
							<span class="menu-text"> Manşetler </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="{{ url('/admin/headlines') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Manşetler
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="{{ url('/admin/headlines/create') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Yeni manşet
								</a>

								<b class="arrow"></b>
							</li>
						</ul>

					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-globe"></i>
							<span class="menu-text"> Haberler </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="{{ url('/admin/news') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Haberler
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="{{ url('/admin/news/create') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Yeni haber
								</a>

								<b class="arrow"></b>
							</li>
						</ul>

					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-folder-open"></i>
							<span class="menu-text"> Kategoriler </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="{{ url('/admin/categories') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Kategoriler
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="{{ url('/admin/categories/create') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Yeni kategori
								</a>

								<b class="arrow"></b>
							</li>
						</ul>

					</li>
					
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-folder-open"></i>
							<span class="menu-text"> Esnaflar </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="{{ url('/admin/firms') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Esnaflar
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="{{ url('/admin/firms/create') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Yeni Esnaf
								</a>

								<b class="arrow"></b>
							</li>
						</ul>

					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-cutlery"></i>
							<span class="menu-text"> Ürünler </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="{{ url('/admin/products') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Ürünler
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="{{ url('/admin/products/create') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Yeni ürün
								</a>

								<b class="arrow"></b>
							</li>
						</ul>

					</li>

					<li class="">
						<a href="{{ url('/admin/photos') }}" class="dropdown-toggle">
							<i class="menu-icon fa fa-camera"></i>
							<span class="menu-text"> Galeri </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="{{ url('/admin/photos') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Galeri
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="{{ url('/admin/photos/create') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Yeni Resim
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="{{ url('/admin/pages') }}" class="dropdown-toggle">
							<i class="menu-icon fa fa-book"></i>
							<span class="menu-text"> Sayfalar </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="{{ url('/admin/pages') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Sayfalar
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="{{ url('/admin/pages/create') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Yeni ekle
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					
					<li class="">
						<a href="{{ url('/admin/customers') }}" class="dropdown-toggle">
							<i class="menu-icon fa fa-cloud"></i>
							<span class="menu-text"> Müşteriler </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="{{ url('/admin/customers') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Müşteriler
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="{{ url('/admin/customers/create') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Yeni ekle
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<!--<li class="">
						<a href="{{ url('/admin/yazilar') }}" class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text"> Yazılar </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="{{ url('/admin/yazilar') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Yazılar
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="{{ url('/admin/yazilar/create') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Yeni ekle
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li> -->					

					<li class="">
						<a href="{{ url('/admin/users') }}" class="dropdown-toggle">
							<i class="menu-icon fa fa-users"></i>
							<span class="menu-text"> Kullanıcılar </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="{{ url('/admin/users') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Kullanıcılar
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="{{ url('/admin/users/create') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Yeni kullanıcı
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="{{ url('/admin/roles') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Üyelik Türleri
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="{{ url('/admin/roles/create') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Yeni üyelik türü
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="{{ url('/admin/settings') }}">
							<i class="menu-icon fa fa-cogs"></i>
							<span class="menu-text"> Ayarlar </span>
						</a>

						<b class="arrow"></b>
					</li>

				</ul><!-- /.nav-list -->
			</div>
<div id="navbar" class="navbar navbar-default    navbar-collapse       h-navbar ace-save-state">
	<div class="navbar-container ace-save-state" id="navbar-container">
		<div class="navbar-header pull-left">
			<a href="{{ url('/admin') }}" class="navbar-brand">
				<small>
					<i class="fa fa-leaf"></i>
					Yakuter Panel
				</small>
			</a>
		</div>

		<div class="navbar-buttons navbar-header pull-right  collapse navbar-collapse" role="navigation">
			<ul class="nav ace-nav">
				<li class="light-blue dropdown-modal user-min">
					<a data-toggle="dropdown" href="#" class="dropdown-toggle">
						
						<?php $user = auth()->user(); ?>
						
						<img class="nav-user-photo" src="{{ url('/'.config('settings.site_upload').'/users/'.$user->image) }}" alt="Fotoğraf" />
						<span class="user-info">
							<small>Merhaba,</small>
							{{ $user->name_surname }}
						</span>

						<i class="ace-icon fa fa-caret-down"></i>
					</a>

					<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
						<li>
							<a href="{{ url('/admin/settings') }}">
								<i class="ace-icon fa fa-cog"></i>
								Ayarlar
							</a>
						</li>

						<li>
							<a href="{{ url('/admin/users/'.$user->id.'/edit') }}">
							<i class="ace-icon fa fa-user"></i>
								Profile
							</a>
						</li>

						<li class="divider"></li>

						<li>
							<a href="{{ url('/admin/logout') }}">
								<i class="ace-icon fa fa-power-off"></i>
								Logout
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div><!-- /.navbar-container -->
</div>
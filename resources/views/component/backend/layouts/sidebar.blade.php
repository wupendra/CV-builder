<!-- left side start-->
		<div class="left-side sticky-left-side">

			<!--logo and iconic logo start-->
			<div class="logo">
				<h1><a href="{{ route('home') }}" target="_blank">Make my <span>CV</span></a></h1>
			</div>
			<div class="logo-icon text-center">
				<a href="{{ route('home') }}" target="_blank"><i class="lnr lnr-home"></i> </a>
			</div>

			<!--logo and iconic logo end-->
			<div class="left-side-inner">

				<!--sidebar nav start-->
					<ul class="nav nav-pills nav-stacked custom-nav">
						<li class="{{ (Route::is('home')?'active':'') }}"><a href="{{ route('admin.dashboard') }}"><i class="lnr lnr-power-switch"></i><span>Dashboard</span></a></li>
						@if(Auth::guard('admin')->user()->hasRole('SUPERADMIN'))
						<li class="menu-list {{ (Request::is('admins/admin*')) ?  'nav-active'  :''}}">
							<a href="#"><i class="fa fa-shield"></i>
								<span>Admins <i class="fa fa-angle-down"></i></span></a>
								<ul class="sub-menu-list">
									<li class="{{ (Request::is('admins/admin')) ?  'active'  :''}}"><a href="{{ route('admin.index') }}">List Admins</a> </li>
									<li class="{{ (Request::is('admins/admin/create')) ?  'active'  :''}}"><a href="{{ route('admin.create') }}">Add Admin</a></li>
								</ul>
						</li>
						@endif
						<li class="menu-list {{ (Request::is('admins/users*')) ?  'nav-active'  :''}}">
							<a href="#"><i class="fa fa-users"></i>
								<span>Users <i class="fa fa-angle-down"></i></span></a>
								<ul class="sub-menu-list">
									<li class=""><a href="">List Users</a> </li>
									<li class=""><a href="">Active Users</a></li>
								</ul>
						</li>
						<li class="menu-list {{ (Request::is('admins/theme*')) ?  'nav-active'  :''}}">
							<a href="#"><i class="fa fa-picture-o"></i>
								<span>Themes <i class="fa fa-angle-down"></i></span></a>
								<ul class="sub-menu-list">
									<li class="{{ (Request::is('admins/theme')) ?  'active'  :''}}"><a href="{{ route('theme.index') }}">List Themes</a> </li>
									<li class="{{ (Request::is('admins/theme/create')) ?  'active'  :''}}"><a href="{{ route('theme.create') }}">Add Theme</a></li>
								</ul>
						</li>
						<li><a href="{{ route('sitesetting.index') }}"><i class="lnr lnr-cog"></i> <span>App Settings</span></a></li>
					</ul>
				<!--sidebar nav end-->
			</div>
		</div>
		<!-- left side end-->
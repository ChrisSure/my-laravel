<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" >
    <!-- Font Awesome -->
    <link href="{{ asset('assets/css/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" >
    <!-- Theme style -->
    <link href="{{ asset('assets/css/AdminLTE.css') }}" rel="stylesheet" >
    <!-- AdminLTE Skins. Choose a skin from the css/skinsfolder instead of downloading all of them to reduce the load. -->
    <link href="{{ asset('assets/css/skins/_all-skins.min.css') }}" rel="stylesheet" >
	<!-- CKEditor -->
    <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
	<!-- START -->
    <div class="wrapper">
		
		<!-- Header -->
		<header class="main-header">
			<!-- Logo -->
			<a href="{{ route('home') }}" class="logo">
				<!-- mini logo for sidebar mini 50x50 pixels -->
				<span class="logo-mini"><b>A</b>LT</span>
				<!-- logo for regular state and mobile devices -->
				<span class="logo-lg"><b>Admin</b>LTE</span>
			</a>
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top" role="navigation">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<!-- Messages: style can be found in dropdown.less-->
						<li class="dropdown messages-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="fa fa-envelope-o"></i>
								<span class="label label-success">4</span>
							</a>
							<ul class="dropdown-menu">
								<li class="header">You have 4 messages</li>
								<li>
								<!-- inner menu: contains the actual data -->
									<ul class="menu">
										<li><!-- start message -->
											<a href="#">
												<div class="pull-left">
													{!! Html::image("assets/img/user2-160x160.jpg", "User Image", ['class' => 'img-circle']) !!}
												</div>
												<h4>Support Team<small><i class="fa fa-clock-o"></i> 5 mins</small></h4>
												<p>Why not buy a new awesome theme?</p>
											</a>
										</li><!-- end message -->
										<li>
											<a href="#">
												<div class="pull-left">
													{!! Html::image("assets/img/user4-128x128.jpg", "User Image", ['class' => 'img-circle']) !!}
												</div>
												<h4>Developers<small><i class="fa fa-clock-o"></i> Today</small></h4>
												<p>Why not buy a new awesome theme?</p>
											</a>
										</li>
									</ul>
								</li>
								<li class="footer"><a href="#">See All Messages</a></li>
							</ul>
						</li>
					  
						<!-- User Account: style can be found in dropdown.less -->
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								{!! Html::image("assets/img/user2-160x160.jpg", "User Image", ['class' => 'user-image']) !!}
								<span class="hidden-xs">{{ Auth::user()->name }}</span>
							</a>
							<ul class="dropdown-menu">
								<!-- User image -->
								<li class="user-header">
									{!! Html::image("assets/img/user2-160x160.jpg", "User Image", ['class' => 'img-circle']) !!}
									<p>{{ Auth::user()->name }} - Web Developer<small>Member since Nov. 2012</small></p>
								</li>
								<!-- Menu Footer-->
								<li class="user-footer">
									<div class="pull-left">
										<a href="{{ route('userView', ['id' => Auth::user()->id]) }}" class="btn btn-default btn-flat">Профіль</a>
									</div>
									<div class="pull-right">
										<a href="{{ route('logout') }}" class="btn btn-default btn-flat"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Вихід
                                        </a>
										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
									</div>
								</li>
							</ul>
						</li>
						<!-- Control Sidebar Toggle Button -->
						<li>
							<a href="{{ route('site') }}" target="_blank" title="На сайт"><i class="fa fa-arrow-circle-right"></i></a><!--data-toggle="control-sidebar"-->
						</li>
					</ul>
				</div>
			</nav>
		</header>
		<!-- Header -->
		
		
		<!-- Left -->
		<aside class="main-sidebar">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
				<!-- Sidebar user panel -->
				<div class="user-panel">
					<div class="pull-left image">
						{!! Html::image("assets/img/user2-160x160.jpg", "User Image", ['class' => 'img-circle']) !!}
					</div>
					<div class="pull-left info">
						<p>Alexander Pierce</p>
						<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
					</div>
				</div>
				<!-- search form -->
				<form action="#" method="get" class="sidebar-form">
					<div class="input-group">
						<input type="text" name="q" class="form-control" placeholder="Search...">
						<span class="input-group-btn">
							<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
						</span>
					</div>
				</form>
				<!-- /.search form -->
			  
				<!-- sidebar menu: : style can be found in sidebar.less -->
				<ul class="sidebar-menu">
					<li class="header">MAIN NAVIGATION</li>
					<li class="treeview">
						<a href="#">
							<i class="fa fa-database" aria-hidden="true"></i> <span>Каталог</span> <i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li class="active"><a href="{{ route('pagesIndex') }}"><i class="fa fa-file-text-o" aria-hidden="true"></i> Сторінки</a></li>
							<li><a href="{{ route('categoryIndex') }}"><i class="fa fa-bars" aria-hidden="true"></i> Категорії</a></li>
						</ul>
					</li>
					
					<li class="treeview">
						<a href="#">
							<i class="fa fa-users" aria-hidden="true"></i> <span>Користувачі</span> <i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li><a href="{{ route('userIndex') }}"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Користувачі</a></li>
							<li><a href="{{ route('rolesIndex') }}"><i class="fa fa-sign-language" aria-hidden="true"></i> Ролі</a></li>
							<li><a href="{{ route('permIndex') }}"><i class="fa fa-eyedropper" aria-hidden="true"></i> Дозволи</a></li>
						</ul>
					</li>
					
					<li class="treeview">
						<a href="#">
							<i class="fa fa-cogs" aria-hidden="true"></i> <span>Система</span> <i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li class="active"><a href="{{ route('info') }}"><i class="fa fa-info-circle" aria-hidden="true"></i> Інформація</a></li>
							<li><a href="{{ route('setting') }}"><i class="fa fa-cog" aria-hidden="true"></i> Настройки</a></li>
							<li><a href="{{ route('log') }}"><i class="fa fa-list-alt" aria-hidden="true"></i> Логи</a></li>
							<li><a href="{{ route('cache') }}"><i class="fa fa-cubes" aria-hidden="true"></i> Кеш</a></li>
							<li><a href="{{ route('securityIndex') }}"><i class="fa fa-lock" aria-hidden="true"></i> Захист</a></li>
						</ul>
					</li>
				</ul>
			</section>
			<!-- /.sidebar -->
		</aside>
		<!-- Left -->
	  
	  
		<!-- Content -->
		<div class="content-wrapper">
				<!--Message-->
				@if (count($errors) > 0)
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
							    <li style="list-style-type: none;">{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
				@if (session('error'))
				    <div class="alert alert-danger" style="margin-bottom: 0px;">
				        {{ session('error') }}
				    </div>
				@endif
				@if (session('success'))
				    <div class="alert alert-success" style="margin-bottom: 0px;">
				        {{ session('success') }}
				    </div>
				@endif
				@yield('content')
		</div>
		<!-- Content -->
	  
	  
		<!-- Footer -->
		<footer class="main-footer">
			<div class="pull-right hidden-xs">
				<b>Version</b> 2.3.0
			</div>
			<strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
		</footer>
		<!-- Footer -->
	
    </div>
	<!-- END -->
	
	
	
    <!-- jQuery 2.1.4 -->
    <script src="{{ asset('assets/js/jQuery-2.1.4.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <!--MyScripts-->
    <script src="{{ asset('assets/js/script.js') }}"></script>
    
</body>
</html>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<meta charset="utf-8" />
	<title>MESL Appraisal Module</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
	<link rel="apple-touch-icon" href="{{ asset('main/pages/ico/60.png') }}">
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('main/pages/ico/76.png') }}">
	<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('main/pages/ico/120.png') }}">
	<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('main/pages/ico/152.png') }}">
	<link rel="icon" type="image/x-icon" href="{{ asset('main/favicon.ico') }}" />
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-touch-fullscreen" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="default">
	<meta content="" name="description" />
	<meta content="" name="author" />
	<link href="{{ asset('main/assets/plugins/pace/pace-theme-flash.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('main/assets/plugins/boostrapv3/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('main/assets/plugins/font-awesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('main/assets/plugins/jquery-scrollbar/jquery.scrollbar.css') }}" rel="stylesheet" type="text/css" media="screen" />
	<link href="{{ asset('main/assets/plugins/bootstrap-select2/select2.css') }}" rel="stylesheet" type="text/css" media="screen" />
	<link href="{{ asset('main/assets/plugins/switchery/css/switchery.min.css') }}" rel="stylesheet" type="text/css" media="screen" />
	<link href="{{ asset('main/pages/css/pages-icons.css') }}" rel="stylesheet" type="text/css">
	<link class="main-stylesheet" href="{{ asset('main/pages/css/pages.css') }}" rel="stylesheet" type="text/css" />
	<!--[if lte IE 9]>
	<link href="{{ asset('main/assets/plugins/codrops-dialogFx/dialog.ie.css') }}" rel="stylesheet" type="text/css" media="screen" />
	<![endif]-->
</head>
<body class="fixed-header ">

<!-- BEGIN SIDEBPANEL-->
<nav class="page-sidebar" data-pages="sidebar">
	<!-- BEGIN SIDEBAR MENU TOP TRAY CONTENT-->
	<div class="sidebar-overlay-slide from-top" id="appMenu">
		<div class="row">
			<div class="col-xs-6 no-padding">
				<a href="#" class="p-l-40"><img src="assets/img/demo/social_app.svg" alt="socail">
				</a>
			</div>
			<div class="col-xs-6 no-padding">
				<a href="#" class="p-l-10"><img src="assets/img/demo/email_app.svg" alt="socail">
				</a>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-6 m-t-20 no-padding">
				<a href="#" class="p-l-40"><img src="assets/img/demo/calendar_app.svg" alt="socail">
				</a>
			</div>
			<div class="col-xs-6 m-t-20 no-padding">
				<a href="#" class="p-l-10"><img src="assets/img/demo/add_more.svg" alt="socail">
				</a>
			</div>
		</div>
	</div>
	<!-- END SIDEBAR MENU TOP TRAY CONTENT-->
	<!-- BEGIN SIDEBAR MENU HEADER-->
	<div class="sidebar-header">
		<img src="assets/img/logo_white.png" alt="logo" class="brand" data-src="assets/img/logo_white.png" data-src-retina="assets/img/logo_white_2x.png" width="78" height="22">
		<div class="sidebar-header-controls">
			<button type="button" class="btn btn-xs sidebar-slide-toggle btn-link m-l-20" data-pages-toggle="#appMenu"><i class="fa fa-angle-down fs-16"></i>
			</button>
			<button type="button" class="btn btn-link visible-lg-inline" data-toggle-pin="sidebar"><i class="fa fs-12"></i>
			</button>
		</div>
	</div>
	<!-- END SIDEBAR MENU HEADER-->
	<!-- START SIDEBAR MENU -->
	<div class="sidebar-menu">
		<!-- BEGIN SIDEBAR MENU ITEMS-->
		<ul class="menu-items">
			<li class="m-t-30 ">
				<a href="index.html" class="detailed">
					<span class="title">Dashboard</span>
					<span class="details">12 New Updates</span>
				</a>
				<span class="bg-success icon-thumbnail"><i class="pg-home"></i></span>
			</li>
			<li class="">
				<a href="http://pages.revox.io/dashboard/latest/html/widget.html" class="detailed">
					<span class="title">Widgets</span>
					<span class="details">22 items</span>
				</a>
				<span class="icon-thumbnail">W</span>
			</li>
			<li class="">
				<a href="email.html" class="detailed">
					<span class="title">Email</span>
					<span class="details">234 New Emails</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-mail"></i></span>
			</li>
			<li class="">
				<a href="social.html"><span class="title">Social</span></a>
				<span class="icon-thumbnail"><i class="pg-social"></i></span>
			</li>
			<li>
				<a href="javascript:;"><span class="title">Calendar</span>
					<span class=" arrow"></span></a>
				<span class="icon-thumbnail"><i class="pg-calender"></i></span>
				<ul class="sub-menu">
					<li class="">
						<a href="calendar.html">Basic</a>
						<span class="icon-thumbnail">c</span>
					</li>
					<li class="">
						<a href="calendar_lang.html">Languages</a>
						<span class="icon-thumbnail">L</span>
					</li>
					<li class="">
						<a href="calendar_month.html">Month</a>
						<span class="icon-thumbnail">M</span>
					</li>
					<li class="">
						<a href="calendar_lazy.html">Lazy load</a>
						<span class="icon-thumbnail">La</span>
					</li>
					<li class="">
						<a href="http://pages.revox.io/dashboard/2.1.0/doc/#calendar" target="_blank">Documentation</a>
						<span class="icon-thumbnail">D</span>
					</li>
				</ul>
			</li>
			<li class="">
				<a href="builder.html">
					<span class="title">Builder</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-layouts"></i></span>
			</li>
			<li>
				<a href="javascript:;"><span class="title">Layouts</span>
					<span class=" arrow"></span></a>
				<span class="icon-thumbnail"><i class="pg-layouts2"></i></span>
				<ul class="sub-menu">
					<li class="">
						<a href="default_layout.html">Default</a>
						<span class="icon-thumbnail">dl</span>
					</li>
					<li class="">
						<a href="secondary_layout.html">Secondary</a>
						<span class="icon-thumbnail">sl</span>
					</li>
					<li class="">
						<a href="boxed_layout.html">Boxed</a>
						<span class="icon-thumbnail">bl</span>
					</li>
					<li class="">
						<a href="sidemenu_and_horizontal_menu.html">Horizontal Menu</a>
						<span class="icon-thumbnail">hm</span>
					</li>
					<li class="">
						<a href="rtl_layout.html">RTL</a>
						<span class="icon-thumbnail">rl</span>
					</li>
					<li class="">
						<a href="builder.html#tabContent">Columns</a>
						<span class="icon-thumbnail">cl</span>
					</li>
				</ul>
			</li>
			<li>
				<a href="javascript:;"><span class="title">UI Elements</span>
					<span class=" arrow"></span></a>
				<span class="icon-thumbnail">Ui</span>
				<ul class="sub-menu">
					<li class="">
						<a href="color.html">Color</a>
						<span class="icon-thumbnail">c</span>
					</li>
					<li class="">
						<a href="typography.html">Typography</a>
						<span class="icon-thumbnail">t</span>
					</li>
					<li class="">
						<a href="icons.html">Icons</a>
						<span class="icon-thumbnail">i</span>
					</li>
					<li class="">
						<a href="buttons.html">Buttons</a>
						<span class="icon-thumbnail">b</span>
					</li>
					<li class="">
						<a href="notifications.html">Notifications</a>
						<span class="icon-thumbnail">n</span>
					</li>
					<li class="">
						<a href="modals.html">Modals</a>
						<span class="icon-thumbnail">m</span>
					</li>
					<li class="">
						<a href="progress.html">Progress &amp; Activity</a>
						<span class="icon-thumbnail">pa</span>
					</li>
					<li class="">
						<a href="tabs_accordian.html">Tabs &amp; Accordions</a>
						<span class="icon-thumbnail">ta</span>
					</li>
					<li class="">
						<a href="sliders.html">Sliders</a>
						<span class="icon-thumbnail">s</span>
					</li>
					<li class="">
						<a href="tree_view.html">Tree View</a>
						<span class="icon-thumbnail">tv</span>
					</li>
					<li class="">
						<a href="nestables.html">Nestable</a>
						<span class="icon-thumbnail">ns</span>
					</li>
				</ul>
			</li>
			<li class="open active">
				<a href="javascript:;">
					<span class="title">Forms</span>
					<span class=" open  arrow"></span>
				</a>
				<span class="icon-thumbnail"><i class="pg-form"></i></span>
				<ul class="sub-menu">
					<li class="">
						<a href="form_elements.html">Form Elements</a>
						<span class="icon-thumbnail">fe</span>
					</li>
					<li class="">
						<a href="form_layouts.html">Form Layouts</a>
						<span class="icon-thumbnail">fl</span>
					</li>
					<li class="">
						<a href="form_wizard.html">Form Wizard</a>
						<span class="icon-thumbnail">fw</span>
					</li>
				</ul>
			</li>
			<li class="">
				<a href="portlets.html">
					<span class="title">Portlets</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-grid"></i></span>
			</li>
			<li class="">
				<a href="views.html">
					<span class="title">Views</span>
				</a>
				<span class="icon-thumbnail"><i class="pg pg-ui"></i></span>
			</li>
			<li>
				<a href="javascript:;"><span class="title">Tables</span>
					<span class=" arrow"></span></a>
				<span class="icon-thumbnail"><i class="pg-tables"></i></span>
				<ul class="sub-menu">
					<li class="">
						<a href="tables.html">Basic Tables</a>
						<span class="icon-thumbnail">bt</span>
					</li>
					<li class="">
						<a href="datatables.html">Data Tables</a>
						<span class="icon-thumbnail">dt</span>
					</li>
				</ul>
			</li>
			<li>
				<a href="javascript:;"><span class="title">Maps</span>
					<span class=" arrow"></span></a>
				<span class="icon-thumbnail"><i class="pg-map"></i></span>
				<ul class="sub-menu">
					<li class="">
						<a href="google_map.html">Google Maps</a>
						<span class="icon-thumbnail">gm</span>
					</li>
					<li class="">
						<a href="vector_map.html">Vector Maps</a>
						<span class="icon-thumbnail">vm</span>
					</li>
				</ul>
			</li>
			<li class="">
				<a href="charts.html"><span class="title">Charts</span></a>
				<span class="icon-thumbnail"><i class="pg-charts"></i></span>
			</li>
			<li>
				<a href="javascript:;"><span class="title">Extra</span>
					<span class=" arrow"></span></a>
				<span class="icon-thumbnail"><i class="pg-bag"></i></span>
				<ul class="sub-menu">
					<li class="">
						<a href="invoice.html">Invoice</a>
						<span class="icon-thumbnail">in</span>
					</li>
					<li class="">
						<a href="404.html">404 Page</a>
						<span class="icon-thumbnail">pg</span>
					</li>
					<li class="">
						<a href="500.html">500 Page</a>
						<span class="icon-thumbnail">pg</span>
					</li>
					<li class="active">
						<a href="blank_template.html">Blank Page</a>
						<span class="icon-thumbnail">bp</span>
					</li>
					<li class="">
						<a href="login.html">Login</a>
						<span class="icon-thumbnail">l</span>
					</li>
					<li class="">
						<a href="register.html">Register</a>
						<span class="icon-thumbnail">re</span>
					</li>
					<li class="">
						<a href="lock_screen.html">Lockscreen</a>
						<span class="icon-thumbnail">ls</span>
					</li>
					<li class="">
						<a href="gallery.html">Gallery</a>
						<span class="icon-thumbnail">gl</span>
					</li>
					<li class="">
						<a href="timeline.html">Timeline</a>
						<span class="icon-thumbnail">t</span>
					</li>
				</ul>
			</li>
			<li class="">
				<a href="javascript:;"><span class="title">Menu Levels</span>
					<span class="arrow"></span></a>
				<span class="icon-thumbnail"><i class="pg-menu_lv"></i></span>
				<ul class="sub-menu">
					<li>
						<a href="javascript:;">Level 1</a>
						<span class="icon-thumbnail">L1</span>
					</li>
					<li>
						<a href="javascript:;"><span class="title">Level 2</span>
							<span class="arrow"></span></a>
						<span class="icon-thumbnail">L2</span>
						<ul class="sub-menu">
							<li>
								<a href="javascript:;">Sub Menu</a>
								<span class="icon-thumbnail">Sm</span>
							</li>
							<li>
								<a href="ujavascript:;">Sub Menu</a>
								<span class="icon-thumbnail">Sm</span>
							</li>
						</ul>
					</li>
				</ul>
			</li>
		</ul>
		<div class="clearfix"></div>
	</div>
	<!-- END SIDEBAR MENU -->
</nav>
<!-- END SIDEBAR -->
<!-- END SIDEBPANEL-->

<!-- START PAGE-CONTAINER -->
<div class="page-container ">

	<!-- START HEADER -->
	<div class="header ">
		<div class=" pull-right">
			<!-- START User Info-->
			<div class="visible-lg visible-md m-t-10">
				<div class="pull-left p-r-10 p-t-10 fs-16 font-heading">
					<span class="semi-bold">{{ auth()->user()->last_name }}</span> <span class="text-master">{{ auth()->user()->first_name }}</span>
				</div>
				<div class="dropdown pull-right">
					<button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                		<span class="thumbnail-wrapper d32 circular inline m-t-5"></span>
					</button>
					<ul class="dropdown-menu profile-dropdown" role="menu">
						<li class="bg-master-lighter">
							<a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
								<span class="pull-left">Logout</span>
								<span class="pull-right"><i class="pg-power"></i></span>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								</form>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<!-- END User Info-->
		</div>
	</div>
	<!-- END HEADER -->

	<!-- START PAGE CONTENT WRAPPER -->
	<div class="page-content-wrapper ">

		@yield('content')

		<!-- START COPYRIGHT -->
		<!-- START CONTAINER FLUID -->
		<!-- START CONTAINER FLUID -->
		<div class="container-fluid container-fixed-lg footer">
			<div class="copyright sm-text-center">
				<p class="small no-margin pull-left sm-pull-reset">
					<span class="hint-text">Copyright &copy; 2019 </span>
					<span class="font-montserrat">CAVIDEL LIMITED</span>.
					<span class="hint-text">All rights reserved. </span>
				</p>
			</div>
		</div>
		<!-- END COPYRIGHT -->
	</div>
	<!-- END PAGE CONTENT WRAPPER -->
</div>
<!-- END PAGE CONTAINER -->

<!-- BEGIN VENDOR JS -->
<script src="{{ asset('main/assets/plugins/pace/pace.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('main/assets/plugins/jquery/jquery-1.11.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('main/assets/plugins/modernizr.custom.js') }}" type="text/javascript"></script>
<script src="{{ asset('main/assets/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('main/assets/plugins/boostrapv3/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('main/assets/plugins/jquery/jquery-easy.js') }}" type="text/javascript"></script>
<script src="{{ asset('main/assets/plugins/jquery-unveil/jquery.unveil.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('main/assets/plugins/jquery-bez/jquery.bez.min.js') }}"></script>
<script src="{{ asset('main/assets/plugins/jquery-ios-list/jquery.ioslist.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('main/assets/plugins/jquery-actual/jquery.actual.min.js') }}"></script>
<script src="{{ asset('main/assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('main/assets/plugins/bootstrap-select2/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('main/assets/plugins/classie/classie.js') }}"></script>
<script src="{{ asset('main/assets/plugins/switchery/js/switchery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('main/assets/plugins/bootstrap3-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('main/assets/plugins/jquery-autonumeric/autoNumeric.js') }}"></script>
<script type="text/javascript" src="{{ asset('main/assets/plugins/dropzone/dropzone.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('main/assets/plugins/bootstrap-tag/bootstrap-tagsinput.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('main/assets/plugins/jquery-inputmask/jquery.inputmask.min.js') }}"></script>
<script src="{{ asset('main/assets/plugins/boostrap-form-wizard/js/jquery.bootstrap.wizard.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('main/assets/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('main/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('main/assets/plugins/summernote/js/summernote.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('main/assets/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('main/assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('main/assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.js') }}"></script>
<!-- END VENDOR JS -->
<!-- BEGIN CORE TEMPLATE JS -->
<script src="{{ asset('main/pages/js/pages.min.js') }}"></script>
<!-- END CORE TEMPLATE JS -->
<!-- BEGIN PAGE LEVEL JS -->
<script src="{{ asset('main/assets/js/form_wizard.js') }}" type="text/javascript"></script>
<script src="{{ asset('main/assets/js/scripts.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS -->
</body>
</html>
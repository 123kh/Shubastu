<!doctype html>
<html lang="en">


<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{asset('images/logo1.png')}}" type="image/png" />
	<!--plugins-->
	<link href="{{asset('plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
	<link href="{{asset('plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
	<link href="{{asset('plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
	<link href="{{asset('plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
	<link href="{{asset('plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
	<link href="{{asset('plugins/select2/css/select2-bootstrap4.css')}}" rel="stylesheet" />
	<!-- loader-->
	<link href="{{asset('css/pace.min.css')}}" rel="stylesheet" />
	<script src="{{asset('js/pace.min.js')}}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('css/bootstrap-extended.css')}}" rel="stylesheet">
	<link href="{{asset('css/app.css')}}" rel="stylesheet">
	<link href="{{asset('css/icons.css')}}" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{asset('css/dark-theme.css')}}" />
	<link rel="stylesheet" href="{{asset('css/semi-dark.css')}}" />
	<link rel="stylesheet" href="{{asset('css/header-colors.css')}}" />
	<title>Shubhastu</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
				
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="{{asset('images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">
						<img src="{{asset('images/name.png')}}" width="100%" height="30%" alt="logo icon">
					</h4>
				</div>
				<div class="toggle-icon ms-auto">
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>

					<a href="{{route('dashboard')}}">
						<div class="parent-icon"><i class='bx bx-home-circle'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
				</li>

				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="lni lni-menu"></i>
						</div>
						<div class="menu-title">Master</div>
					</a>
					<ul>
						<li> <a href="{{route('company')}}"><i class="bx bx-right-arrow-alt"></i> Add Company </a>
						</li>
						<li> <a href="{{route('city')}}"><i class="bx bx-right-arrow-alt"></i> Add City</a>
						</li>
						<li> <a href="{{route('stockist')}}"><i class="bx bx-right-arrow-alt"></i>Add Stockist</a>
						</li>
						<li> <a href="{{route('medical')}}"><i class="bx bx-right-arrow-alt"></i>Add Medical</a>
						</li>
						<li> <a href="{{route('marketing')}}"><i class="bx bx-right-arrow-alt"></i>Add Marketing
							</a>
						</li>
						<li> <a href="{{route('doctor')}}"><i class="bx bx-right-arrow-alt"></i>Add Doctor </a>
						</li>
						<li><a href="{{route('year')}}"><i class="bx bx-right-arrow-alt"></i>Year</a></li>
						<li> <a href="{{route('tds')}}"><i class="bx bx-right-arrow-alt"></i>TDS</a>
						</li>


					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="fadeIn animated bx bx-first-aid"></i>
						</div>
						<div class="menu-title">Medicine</div>
					</a>
					<ul>
						<li> <a href="{{route('medicine')}}"><i class="bx bx-right-arrow-alt"></i>Add Medicine </a>
						</li>
						
					
					<li> <a href="{{route('primary')}}"><i class="bx bx-right-arrow-alt"></i>Medicine Batch Entry</a>
					</li>
						<li> <a href="{{route('medicine_master')}}"><i class="bx bx-right-arrow-alt"></i>Medicine Master </a>
						</li>
						<li> <a href="{{route('medicine_master1')}}"><i class="bx bx-right-arrow-alt"></i>Added Medicine </a>
						</li>
						{{-- <li> <a href="{{route('addedmed')}}"><i class="bx bx-right-arrow-alt"></i> Added Medicine </a>
						</li> --}}
						<li> <a href="{{route('updatemedicinemaster')}}"><i class="bx bx-right-arrow-alt"></i> Update Medicine
							</a>
						</li>
						<li> <a href="{{route('linkstockist')}}"><i class="bx bx-right-arrow-alt"></i> Link Stokist-Medical
						</a>
					</li>
						<!-- <li> <a href="medicine-sale.html"><i class="bx bx-right-arrow-alt"></i> Medicine Sales </a>
						</li> -->
						<!-- <li> <a href="medicine-sale-entry.html"><i class="bx bx-right-arrow-alt"></i> Medicine Sales
								Entry </a>
						</li> -->
					</ul>
				</li>

				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon">	<i class="lni lni-checkmark-circle"></i>
						</div>
						<div class="menu-title">Sales Entry</div>
					</a>
					<ul>
						<li> <a href="{{route('promotor')}}"><i class="bx bx-right-arrow-alt"></i> Promoter Sales </a>
						</li>
						<li> <a href="{{route('secondary')}}"><i class="bx bx-right-arrow-alt"></i>Secondary Sales </a>
						</li>
						
						<li> <a href="{{route('stockist_issue')}}"><i class="bx bx-right-arrow-alt"></i> Stock Adjustment Issue </a>
						</li>
						
				
						</li>
		
					</ul>
					
				<li>
					{{-- <a href="javascript:;" class="has-arrow">
						<div class="parent-icon">	<i class="lni lni-checkmark-circle"></i>
						</div>
						<div class="menu-title">Sales Entry</div>
					</a> --}}
					<ul>
						{{-- <li> <a href="{{route('')}}"><i class="bx bx-right-arrow-alt"></i> Promoter Sales Report</a>
						</li> --}}
						{{-- <li> <a href="{{route('secondary')}}"><i class="bx bx-right-arrow-alt"></i>Secondary Sales </a>
						</li>
						
						<li> <a href="{{route('stockist_issue')}}"><i class="bx bx-right-arrow-alt"></i> Stock Adjustment Issue </a>
						</li> --}}
						
				
						</li>
		
					</ul>
					<li>

						<a href="">
							<div class="parent-icon"><i class="bx bx-right-arrow-alt"></i>
							</div>
							<div class="menu-title">WhatsApp</div>
						</a>
					</li>
					<li>

						<a href="">
							<div class="parent-icon"><i class="bx bx-right-arrow-alt"></i>
							</div>
							<div class="menu-title">User Role</div>
						</a>
					</li>
					<li>

						<a href="">
							<div class="parent-icon"><i class="bx bx-right-arrow-alt"></i>
							</div>
							<div class="menu-title">Report</div>
						</a>
						<ul>
							<li> <a href="{{route('promotorreport')}}"><i class="bx bx-right-arrow-alt"></i> Promoter Sales Report</a>
							</li>
						</ul>
					</li>
					<li>

						<a href="{{route('logout')}}">
							<div class="parent-icon"><i class='bx bx-log-out-circle'></i>
							</div>
							<div class="menu-title">Logout</div>
						</a>
					</li>
					{{-- <li><a class="dropdown-item" href="javascript:;"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
					</li> --}}
				</li>

				<!-- <li>
					<a href="payment.html">
						<div class="parent-icon"><i class="fadeIn animated bx bx-money"></i>
						</div>
						<div class="menu-title">Payment</div>
					</a>
				</li> -->


				<!-- <li>
				<a href="stock-sale.html">
					<div class="parent-icon">	
						<i class="fadeIn animated bx bx-shape-polygon"></i>
					</div>
					<div class="menu-title">Stockist Sale</div>
				</a>
			</li> -->


				<!-- <li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"> <i class="fadeIn animated bx bx-message-square-detail"></i>
						</div>
						<div class="menu-title">Reports</div>
					</a>
					<ul>
						<li> <a href="medicine-sale-report.html"><i class="bx bx-right-arrow-alt"></i>Medicine Sale
								Reports</a>
						</li>
						<li> <a href="stockist.html"><i class="bx bx-right-arrow-alt"></i>Stockist Sale Reports</a>
						</li>
						<li> <a href="doctor-registration-report.html"><i class="bx bx-right-arrow-alt"></i>Doctor
								Registration Reports</a>
						</li>

					</ul>
				</li>

				<li>
					<a href="expence-report.html">
						<div class="parent-icon"><i class="lni lni-hospital"></i>
						</div>
						<div class="menu-title">Expense Entry</div>
					</a>
				</li>


				<li>
					<a href="#">
						<div class="parent-icon"><i class="lni lni-user"></i>
						</div>
						<div class="menu-title">Manege Roll</div>
					</a>
				</li> -->

			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
		<header>
			<div class=" d-flex align-items-center">
				<nav class="navbar navbar-expand">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>
					<div class="search-bar flex-grow-1">
						<div class="position-relative search-bar-box">
							<span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
						</div>
					</div>
					<div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center">
							
							
							<li class="nav-item dropdown dropdown-large">
							
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Notifications</p>
											<p class="msg-header-clear ms-auto">Marks all as read</p>
										</div>
									</a>
									<div class="header-notifications-list">
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-primary text-primary"><i class="bx bx-group"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Customers<span class="msg-time float-end">14 Sec
												ago</span></h6>
													<p class="msg-info">5 new user registered</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-danger text-danger"><i class="bx bx-cart-alt"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Orders <span class="msg-time float-end">2 min
												ago</span></h6>
													<p class="msg-info">You have recived new orders</p>
												</div>
											</div>
										</a>
										
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-info text-info"><i class="bx bx-home-circle"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Product Approved <span
												class="msg-time float-end">2 hrs ago</span></h6>
													<p class="msg-info">Your new product has approved</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-danger text-danger"><i class="bx bx-message-detail"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Comments <span class="msg-time float-end">4 hrs
												ago</span></h6>
													<p class="msg-info">New customer comments recived</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-success text-success"><i class='bx bx-check-square'></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Your item is shipped <span class="msg-time float-end">5 hrs
												ago</span></h6>
													<p class="msg-info">Successfully shipped your item</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-primary text-primary"><i class='bx bx-user-pin'></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New 24 authors<span class="msg-time float-end">1 day
												ago</span></h6>
													<p class="msg-info">24 new authors joined last week</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-warning text-warning"><i class='bx bx-door-open'></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Defense Alerts <span class="msg-time float-end">2 weeks
												ago</span></h6>
													<p class="msg-info">45% less alerts last 4 weeks</p>
												</div>
											</div>
										</a>
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">View All Notifications</div>
									</a>
								</div>
							</li>
							<li class="nav-item dropdown dropdown-large">
							
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Messages</p>
											<p class="msg-header-clear ms-auto">Marks all as read</p>
										</div>
									</a>
									<div class="header-message-list">
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="assets/images/avatars/avatar-1.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Daisy Anderson <span class="msg-time float-end">5 sec
												ago</span></h6>
													<p class="msg-info">Today all Task Completed</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="assets/images/avatars/avatar-2.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Althea Cabardo <span class="msg-time float-end">14
												min ago</span></h6>
													<p class="msg-info">5 phone is still remaining.</p>
												</div>
											</div>
										</a>
										
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="assets/images/avatars/avatar-9.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">David Buckley <span class="msg-time float-end">2 hrs
												ago</span></h6>
													<p class="msg-info">3 phone is ready to deployment</p>
												</div>
											</div>
										</a>
										
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">View All Messages</div>
									</a>
								</div>
							</li>
						</ul>
					</div>
					<div class="user-box dropdown">
					
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item" href="profile.html"><i class="bx bx-user"></i><span>Profile</span></a>
							</li>
							<li><a class="dropdown-item" href="javascript:;"><i class="bx bx-cog"></i><span>Settings</span></a>
							</li>
							<li><a class="dropdown-item" href="javascript:;"><i class='bx bx-home-circle'></i><span>Dashboard</span></a>
							</li>
							<li><a class="dropdown-item" href="javascript:;"><i class='bx bx-dollar-circle'></i><span>Earnings</span></a>
							</li>
							<li><a class="dropdown-item" href="javascript:;"><i class='bx bx-download'></i><span>Downloads</span></a>
							</li>
							<li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							<li><a class="dropdown-item" href="javascript:;"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->
        @yield('content')
<!--start overlay-->
<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		
	</div>
	<!--end wrapper-->
	<!--start switcher-->
	
	<!--end switcher-->
	<!-- Bootstrap JS -->
	<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
	<!--plugins-->
	<script src="{{asset('js/jquery.min.js')}}"></script>
	<script src="{{asset('plugins/simplebar/js/simplebar.min.js')}}"></script>
	<script src="{{asset('plugins/metismenu/js/metisMenu.min.js')}}"></script>
	<script src="{{asset('plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
	<script src="{{asset('plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
	<script src="{{asset('js/table-datatable.js')}}"></script>
	<script src="{{asset('plugins/select2/js/select2.min.js')}}"></script>
	<script src="{{asset('js/form-select2.js')}}"></script>
	<!--app JS-->
	<script src="{{asset('js/app.js')}}"></script>
	<script src="https://cdn.datatables.net/fixedcolumns/4.2.2/js/dataTables.fixedColumns.min.js"> </script>
	
	<!--app JS-->
	<script src="assets/js/app.js"></script>
	<script>
		$(document).ready(function() {
	var table = $('#example').DataTable( {
		
		scrollCollapse: true,
		paging:         true,
		fixedColumns:   {
			 leftColumns:0,
			right:1
		}
	} );
	} );
	</script>
	

	@yield('js')

</body>


</html>
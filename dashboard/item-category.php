<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Repair Shop Management System</title>

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

</head>
<body>
	<div class="header">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
		</div>
		<div class="header-right">
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img src="src/images/admin.png" width="50">
						</span>
						<!--<span><?php echo  $_SESSION[""] ?></span><br>-->
						<span class="user-name">User</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
    <?php
    // Style for user name labels
    $labelStyle = 'font-weight: bold; margin-right: 5px;';
    
    // Style for user info spans
    $infoStyle = 'margin-bottom: 10px;';
    
    // Style for the Log Out link
    $logoutStyle = 'color: #333; text-decoration: none; display: block; padding: 5px 0;';
    
    echo '<div style="' . $infoStyle . '">
              <span style="' . $labelStyle . '">User Email:</span>
              <span>' . $_SESSION["systemUserEmail"] . '</span>
          </div>';
    
    echo '<div style="' . $infoStyle . '">
              <span style="' . $labelStyle . '">User Location:</span>
              <span>' . $_SESSION["locationName"] . '</span>
          </div>';
    
    echo '<hr>';
    
    echo '<a href="login.php" style="' . $logoutStyle . '">
              <i class="dw dw-logout"></i> Log Out
          </a>';
    ?>
</div>

				</div>
			</div>
		</div>
	</div>

	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="index.html">
				<img src="src/images/logo.png" width="50px">
				<h4 style="color: #f3f3f4;font-size: 20px;padding: 15px"> Repair Shop</h4>
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
				<li>
						<a href="index.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house"></span><span class="mtext">Dashboard</span>
						</a>
					</li>
					<li>
						<a href="clients.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-user"></span><span class="mtext">Client List</span>
						</a>
					</li>
					<li>
						<a href="technician.php" class="dropdown-toggle no-arrow">
							<span class="micon fa fa-wrench"></span><span class="mtext">Technician List</span>
						</a>
					</li>
					<li>
						<a href="device.php" class="dropdown-toggle no-arrow">
							<span class="micon fa fa-handshake-o"></span><span class="mtext">Devices</span>
						</a>
					</li>
					<li>
						<a href="delivary.php" class="dropdown-toggle no-arrow">
							<span class="micon fa fa-handshake-o"></span><span class="mtext">Delivary</span>
						</a>
					</li>
					<li>
						<a href="location.php" class="dropdown-toggle no-arrow">
							<span class="micon fa fa-handshake-o"></span><span class="mtext">Locations</span>
						</a>
					</li>
					<li>
						<a href="workorder.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-file"></span><span class="mtext">Work order list</span>
						</a>
					</li>
					<li>
						<a href="History.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-file"></span><span class="mtext">History</span>
						</a>
					</li>
					<li>
						<a href="user.php" class="dropdown-toggle no-arrow">
							<span class="micon fa fa-cart-plus"></span><span class="mtext">Admin User List</span>
						</a>
					</li>
					<li>
						<a href="work-order.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-shopping-basket"></span><span class="mtext">Work Order</span>
						</a>
					</li>
					<li>
						<a href="payment.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-money"></span><span class="mtext">Payment</span>
						</a>
					</li>
					<li>
						<a href="settings.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-settings2"></span><span class="mtext">Settings</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-bar-chart"></span><span class="mtext">reports</span>
						</a>
						<ul class="submenu">
							<li><a href="bar.php">Bar Chart</a></li>
							<li><a href="pie.php">Pie Chart</a></li>
						</ul>
					</li>
					<li>
						<a href="user.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-user1"></span><span class="mtext">Users</span>
						</a>
					</li>
					<li>
						<a href="user-group.php" class="dropdown-toggle no-arrow">
							<span class="micon fa fa-users"></span><span class="mtext">User Group</span>
						</a>
					</li>
			
				</ul>
			</div>
		</div>
	</div>
	<div class="mobile-menu-overlay"></div>
	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4><i class="micon dw dw-file mtext"></i> Items Category</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Item Category</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Category List</h4>
					</div>
					<div class="pb-20">
						<div class="row">
						<div class="col-md-4 col-sm-12">
							<div class="pd-20 ">
								<form>
									<div class="form-group">
										<label>Category Name</label>
										<input class="form-control" type="text" placeholder="input category name">
									</div>
									<div class="form-group">
										<input class="btn btn-primary" type="button" value="Submit">
									</div>
								</form>
							</div>
						</div>
						<div class="col-md-8 col-sm-12">
							<table class="data-table table responsive">
							<thead>
								<tr>
									<th>Category Name</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Category name</td>
									<td>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
												<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete"><i class="dw dw-delete-3"></i> Delete</a>
											</div>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
						</div>
					</div>
					</div>
				</div>
				<!-- Simple Datatable End -->
		</div>
	</div>
							<!-- Delete modal -->
					<div class="col-md-4 col-sm-12 mb-30">
							<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-sm modal-dialog-centered">
									<div class="modal-content bg-danger text-white">
										<div class="modal-body text-center">
											<h3 class="text-white mb-15"><i class="fa fa-exclamation-triangle"></i> Alert</h3>
											<p>Are you sure you want to delete this category?</p>
											<button type="button" class="btn btn-light" data-dismiss="modal">Yes</button>
											<button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
										</div>
									</div>
								</div>
							</div>
					</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<!-- Datatable Setting js -->
	<script src="vendors/scripts/datatable-setting.js"></script></body>
</html>
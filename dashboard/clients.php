<?php session_start();

if (!isset($_SESSION["systemUserID"])) {
	header("Location: ../login.php");
}

$host = "localhost";
$user = "root";
$password = "";
$db = "mobileShopDb";

$data = mysqli_connect($host, $user, $password, $db);

if (isset($_REQUEST["createCustomer"])) {

	$sql = "INSERT INTO `customer` (`nic`, `name`, `address`, `phone1`, `phone2`, `email`) VALUES ('" . $nic . "', '" . $name . "', '2343', '2334', '2344', '12314')";
	$result = mysqli_query($data, $sql);
}


function getAllCustomers(){
	global $data;
	$sql = "select * from customer";
	$result = mysqli_query($data, $sql);

	

	while ($row = mysqli_fetch_array($result)) {

		echo "<tr>" . 
		"<td>{$row["nic"]}</td>" .
		"<td>{$row["name"]}</td>" .
		"<td>2829 Trainer Avenue Peoria, IL 61602 </td>" .
		"<td>09876543234</td>" .
		"<td>09876543235</td>" .
		"<td>john@gmail.com</td>" .
		"<td><span class=\"badge bg-success\">Active</span></td>" .
		"<td>" .
			"<div class=\"dropdown\">" .
				"<a class=\"btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle\" href=\"#\" role=\"button\" data-toggle=\"dropdown\">" .
					"<i class=\"dw dw-more\"></i>" .
				"</a>" .
				"<div class=\"dropdown-menu dropdown-menu-right dropdown-menu-icon-list\">" .
					"<a class=\"dropdown-item\" href=\"#\" data-toggle=\"modal\" data-target=\"#view\"><i class=\"dw dw-eye\"></i> View</a>" .
					"<a class=\"dropdown-item\" href=\"#\"><i class=\"dw dw-edit2\"></i> Edit</a>" .
					"<a class=\"dropdown-item\" href=\"#\" data-toggle=\"modal\" data-target=\"#delete\"><i class=\"dw dw-delete-3\"></i> Delete</a>" .
				"</div>" .
			"</div>" .
		"</td>" .
	"</tr>";
	}

}

?>
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
						<span class="user-name">Log Out</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<a class="dropdown-item" href="#"><i class="dw dw-user1"></i> Profile</a>
						<a class="dropdown-item" href="#"><i class="dw dw-settings2"></i> Setting</a>
						<hr>
						<a class="dropdown-item" href="login.html"><i class="dw dw-logout"></i> Log Out</a>
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
						<a href="index.html" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house"></span><span class="mtext">Dashboard</span>
						</a>
					</li>
					<li>
						<a href="clients.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-user"></span><span class="mtext">Client List</span>
						</a>
					</li>
					<li>
						<a href="technician.html" class="dropdown-toggle no-arrow">
							<span class="micon fa fa-wrench"></span><span class="mtext">Repair List</span>
						</a>
					</li>
					<li>
						<a href="services.html" class="dropdown-toggle no-arrow">
							<span class="micon fa fa-handshake-o"></span><span class="mtext">Inquries</span>
						</a>
					</li>
					<h5>Maintaince</h5>
					<li>
						<a href="item-category.html" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-file"></span><span class="mtext">Work order list</span>
						</a>
					</li>
					<li>
						<a href="items.html" class="dropdown-toggle no-arrow">
							<span class="micon fa fa-cart-plus"></span><span class="mtext">Admin User List</span>
						</a>
					</li>
					<li>
						<a href="work-order.html" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-shopping-basket"></span><span class="mtext">Work Order</span>
						</a>
					</li>
					<li>
						<a href="payment.html" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-money"></span><span class="mtext">Payment</span>
						</a>
					</li>
					<li>
						<a href="settings.html" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-settings2"></span><span class="mtext">Settings</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-bar-chart"></span><span class="mtext">reports</span>
						</a>
						<ul class="submenu">
							<li><a href="bar.html">Bar Chart</a></li>
							<li><a href="pie.html">Pie Chart</a></li>
						</ul>
					</li>
					<li>
						<a href="user.html" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-user1"></span><span class="mtext">Users</span>
						</a>
					</li>
					<li>
						<a href="user-group.html" class="dropdown-toggle no-arrow">
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
								<h4><i class="micon dw dw-user mtext"></i> Clients</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Clients</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a href="#" class="btn btn-primary" data-backdrop="static" data-toggle="modal" data-target="#add_technician">
									Add New
								</a>
							</div>
						</div>
					</div>
				</div>

			</div>
			<!-- Simple Datatable start -->
			<div class="card-box mb-30">
				<div class="pd-20">
					<h4 class="text-blue h4">Clients List</h4>
				</div>
				<div class="pb-20">
					<table class="data-table table responsive">
						<thead>
							<tr>
								<th>NIC</th>
								<th>Full Name</th>
								<th>Address</th>
								<th>Contact no.1</th>
								<th>Contact no.2</th>
								<th>Email</th>
								<th>Status</th>
								<th class="datatable-nosort">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php getAllCustomers(); ?>
						</tbody>
					</table>
				</div>
			</div>
			<!-- Simple Datatable End -->
		</div>
	</div>



	<div class="col-md-12 col-sm-12 mb-30">
		<div class="modal fade" id="add_technician" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class=" border-radius-10">
						<div class="login-title"><br>
							<div class="col-md-12 col-sm-12 mb-30">
								<h2 class="text-center text-primary">Add Client</h2>
							</div>
							<form action="" method="POST">

								<div class="input-group custom">
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>NIC</label>
											<input class="form-control form-control-lg" type="text">
										</div>
									</div>
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>Name</label>
											<input class="form-control form-control-lg" type="text">
										</div>
									</div>
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>Email</label>
											<input class="form-control form-control-lg" type="text">
										</div>
									</div>
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>Contact no.1</label>
											<input class="form-control form-control-lg" type="text">
										</div>
									</div>
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>Contact no.2</label>
											<input class="form-control form-control-lg" type="text">
										</div>
									</div>
									<div class="col-md-12 col-sm-12">
										<div class="form-group">
											<label>Address</label>
											<input class="form-control form-control-lg" type="text">
										</div>
									</div>

									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>Type</label>
											<input class="form-control form-control-lg" type="text">
										</div>
									</div>
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>Details</label>
											<input class="form-control form-control-lg" type="text">
										</div>
									</div>

									<div class="col-md-12 col-sm-12">
										<div class="form-group">
											<input type="submit" class="btn btn-primary" name="createCustomer" value="Submit">
											<a href="#" class="btn btn-danger" data-backdrop="static" data-toggle="modal" data-target="#add_technician">
												Cancel
											</a>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Delete modal -->
		<div class="col-md-4 col-sm-12 mb-30">
			<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-sm modal-dialog-centered">
					<div class="modal-content bg-danger text-white">
						<div class="modal-body text-center">
							<h3 class="text-white mb-15"><i class="fa fa-exclamation-triangle"></i> Alert</h3>
							<p>Are you sure you want to delete this Client?</p>
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
		<script src="vendors/scripts/datatable-setting.js"></script>
</body>

</html>
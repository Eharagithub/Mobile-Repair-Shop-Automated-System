<?php session_start();

if (isset($_REQUEST["logout"])) {
	session_unset();
}

$conn = new mysqli('localhost', 'root', '', 'mobileshopdb');
?>
<!DOCTYPE html>
<html>

<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Mobile Phone Repair Shop Management System</title>

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
		rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

</head>

<body>

	<?php include_once("../Common/drower.php"); ?>

	<div class="main-container">
		<div class="xs-pd-20-10 pd-ltr-20">

			<div class="title pb-20">
				<h2 class="h3 mb-0">Dashboard</h2>
			</div>
			<div class="row pb-10">
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark">
								<?php
									echo $conn->query("SELECT * FROM location")->num_rows;
									?>
									</div>
								<div class="font-14 text-secondary weight-500">Sub Branches</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#17a2b8"><i class="icon-copy fa fa-tasks"></i></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark">
									<?php
									echo $conn->query("SELECT * FROM customer")->num_rows;
									?>
								</div>
								<div class="font-14 text-secondary weight-500">Total Customers</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#ffc107"><span class="micon fa fa-users"></span></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark">
								<?php
									echo $conn->query("SELECT * FROM delivery")->num_rows;
									?>
								</div>
								<div class="font-14 text-secondary weight-500">Total Currier Services</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#e83e8c"><span class="micon fa fa-truck"></span></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark">
								<?php
									echo $conn->query("SELECT * FROM device")->num_rows;
									?>
								</div>
								<div class="font-14 text-secondary weight-500">Total Devices</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#fff"><i class="micon fa fa-mobile" aria-hidden="true"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark">
								<?php
									echo $conn->query("SELECT * FROM job")->num_rows;
									?>
								</div>
								<div class="font-14 text-secondary weight-500">Checking Repairs</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#6610f2"><i class="micon fa fa-spinner" aria-hidden="true"></i></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark">
								<?php
									echo $conn->query("SELECT * FROM job where isInvoiced = 1")->num_rows;
									?>
								</div>
								<div class="font-14 text-secondary weight-500">Done Repairs</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#09cc06"><i class="micon fa fa-check-square-o"
										aria-hidden="true"></i></div>
							</div>
						</div>
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
	<script src="src/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<script src="vendors/scripts/dashboard3.js"></script>
</body>

</html>
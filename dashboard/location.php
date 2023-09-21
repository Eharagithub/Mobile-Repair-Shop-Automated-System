<?php session_start(); ?>
<?php

if (isset($_REQUEST["createlocation"])) {
	$locid= $_POST['locid'];
	$phone2= $_POST['phone2'];
	$lname= $_POST['lname'];
	$laddress= $_POST['laddress'];
	$phone1= $_POST['phone1'];
	$email= $_POST['email'];
	/*$repassword= $_POST['repassword'];*/

	//database connection
	$conn = new mysqli('localhost', 'root', '', 'mobileshopdb');
	if ($conn->connect_error) {
		die('Connection Failed : ' . $conn->connect_error);
	} else {
		$stmt = $conn->prepare("INSERT INTO location(locid,phone2,lname,laddress,phone1,email)values(?,?,?,?,?,?)");
		$stmt->bind_param("isssss",$locid,$phone2,$lname,$laddress,$phone1,$email);
		$stmt->execute();
		echo "Your Registration is Successfully..";


		$stmt->close();
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
<?php include_once("../Common/drower.php"); ?>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4><i class="micon fa fa-map-marker"></i>  Locations</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Location list</li>
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
				<!-- Simple Datatable start -->
				<?php 

					$host = "localhost";
					$user = "root";
					$password = "";
					$db = "mobileShopDb";

					$data = mysqli_connect($host, $user, $password, $db);




					function getAlllocation(){
						global $data;
						$sql = "select * from location";
						$result = mysqli_query($data, $sql);

	

					while ($row = mysqli_fetch_array($result)) {

							echo "<tr>" . 
							"<td>" . $row["locid"] . "</td>";
							echo"<td>" . $row["lname"] . "</td>";
							echo"<td>" . $row["laddress"] . "</td>";
							echo"<td>" . $row["phone1"] . "</td>";
							echo"<td>" . $row["phone2"] . "</td>";
							echo"<td>" . $row["email"] . "</td>";
							echo"</tr>";
							
					}

					}

					?>
				
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Location List</h4>
					</div>
					<div class="pb-20">
						<table class="data-table table responsive">
							<thead>
							<tr>
							<th>Location Id</th>
							<th>Name</th>
							<th>Address</th>
							<th>Phone 01</th>
							<th>Phone 02</th>
							<th>Email</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
								
							</thead>
							<tbody>
							<?php getAlllocation(); ?>
						</tbody>
						
						</table>
					</div>
				</div>
				<!-- Simple Datatable End -->
		</div>
	</div>

				<!-- Add Technician Modal -->
					<div class="col-md-12 col-sm-12 mb-30">
							<div class="modal fade" id="add_technician" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class=" border-radius-10">
											<div class="login-title"><br>
												<div class="col-md-12 col-sm-12 mb-30">
												<h2 class="text-center text-primary">Add Location</h2>
												</div>
											<form action="" target="" method="POST" onsubmit="return checkpassword ()">

												<div class="input-group custom">
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
																<label>Location Id</label>
																<input class="form-control form-control-lg" type="text" name ="locid" placeholder="Location ID" required>
															</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
																<label>Name</label>
																<input class="form-control form-control-lg" type="text" name ="lname" placeholder="Location Name" required>
															</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
																<label>Address</label>
																<input class="form-control form-control-lg" type="text" name ="laddress" placeholder="Location Address" required>
															</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
																<label>Phone 01</label>
																<input class="form-control form-control-lg" type="text" name ="phone1"pattern="[0-9]{10}" placeholder="0714782233" required>
															</div>
												</div>
												
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
																<label>Phone 02</label>
																<input class="form-control form-control-lg" type="text" name ="phone2"pattern="[0-9]{10}" placeholder="0714782233" required>
															</div>
												</div>
												<div class="col-md-12 col-sm-12">
													<div class="form-group">
																<label>Email</label>
																<input class="form-control form-control-lg" type="text" name ="email" placeholder="abc@gmail.com" Pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}" required>
															</div>
												</div>
											
												<div class="col-md-12 col-sm-12">
													<div class="form-group">
																<input type="submit" class="btn btn-primary" value="Submit" name="createlocation">
																<input type="reset" class="btn btn-danger" value="Cancel" data-backdrop="static" data-toggle="modal" data-target="#add_technician">
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
											<p>Are you sure you want to delete this Technician?</p>
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
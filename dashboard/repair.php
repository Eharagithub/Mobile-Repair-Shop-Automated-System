<?php session_start(); ?>
<?php

if (isset($_REQUEST["createjob"])) {
	$id= $_POST['id'];
	$amount= $_POST['amount'];
	$jobDate= $_POST['jobDate'];
	$deliveryId= $_POST['deliveryId'];
	$technicianId= $_POST['technicianId'];
	$systemuserId= $_POST['systemuserId'];
    $deviceId= $_POST['deviceId'];
	/*$repassword= $_POST['repassword'];*/

	//database connection
	$conn = new mysqli('localhost', 'root', '', 'mobileshopdb');
	if ($conn->connect_error) {
		die('Connection Failed : ' . $conn->connect_error);
	} else {
		$stmt = $conn->prepare("INSERT INTO job(id,amount,jobDate,deliveryId,technicianId,systemuserId,deviceId)values(?,?,?,?,?,?,?)");
		$stmt->bind_param("issiiis",$id,$amount,$jobDate,$deliveryId,$technicianId,$systemuserId,$deviceId);
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
								<h4><i class="micon fa fa-cogs">  </i>    Repair List</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Repair List</li>
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


					function getAlljob(){
						global $data;
						$sql = "select * from job";
						$result = mysqli_query($data, $sql);

	

					while ($row = mysqli_fetch_array($result)) {

							echo "<tr>" . 
							"<td>" . $row["id"] . "</td>";
							echo"<td>" . $row["jobDate"] . "</td>";
							echo"<td>" . $row["deliveryId"] . "</td>";
							echo"<td>" . $row["systemuserId"] . "</td>";
							echo"<td>" . $row["deviceId"] . "</td>";
                            echo"<td>" . $row["technicianId"] . "</td>";
							echo 	'<td>';
							echo 		'<div class="dropdown" onclick="setSelectedCustomer('.$row["id"].')';
							echo 			'<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#.php?id=<?php echo $row[\'nic\']; ?>" role="button" data-toggle="dropdown">';
							echo 				'<i class="dw dw-more"></i>';
							echo 			'</a>';

							echo 			'<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">';
							echo 				'<a class="dropdown-item" href="#" data-toggle="modal" data-target="#view"><i class="dw dw-eye"></i> View</a>';
							echo 				'<a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>';
							echo 				'<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete"><i class="dw dw-delete-3"></i> Delete</a>';
							echo 			'</div>';
		 							
							echo"</tr>";
							
							
					}
					function deleteClientById(){
						global $conn;
						global $selectedCientId;
						$sql = "delete from customer where nic = '" . $selectedCientId . "'";
						mysqli_query($conn, $sql);
					}
				
					function setSelectedCustomer($nic){
						global $selectedCientId;
						$selectedCientId = $nic;
					}

					}

					?>				

				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Repair List</h4>
					</div>
					<div class="pb-20">
						<table class="data-table table responsive">
							<thead>
							<tr>
							<th>#</th>
							<th>Date Created</th>
							<th>Code</th>
							<th>Client</th>
							<th>Technician ID</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
								
							</thead>
							<tbody>
							<?php getAlljob(); ?>
							
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
												<h2 class="text-center text-primary">Add Repair</h2>
												</div>
											<form action="" target="" method="POST" onsubmit="return checkpassword ()">

												<div class="input-group custom">
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
																<label>ORDER ID</label>
																<input class="form-control form-control-lg" type="text" name ="id" placeholder="Order Id" required>
															</div>
												</div>
												
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
																<label>Job Date</label>
																<input class="form-control form-control-lg" type="date" name ="jobDate" placeholder="Date" required>
															</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
																<label>Delivary Id</label>
																<input class="form-control form-control-lg" type="text" name ="deliveryId" placeholder="Delivery Id" required>
															</div>
												</div>
												
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
																<label>Technician Id</label>
																<input class="form-control form-control-lg" type="text" name ="technicianId" placeholder="Technician Id" required>
															</div>
												</div>
												<div class="col-md-12 col-sm-12">
													<div class="form-group">
																<label>User Id</label>
																<input class="form-control form-control-lg" type="text" name ="systemuserId" placeholder="User Id" required>
															</div>
												</div>
                                                <div class="col-md-12 col-sm-12">
													<div class="form-group">
																<label>Device Id</label>
																<input class="form-control form-control-lg" type="text" name ="deviceId" placeholder="IMI Number" required>
															</div>
												</div>
												
												
												<div class="col-md-12 col-sm-12">
													<div class="form-group">
																<input type="submit" class="btn btn-primary" value="Submit" name="createjob">
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
											<p>Are you sure you want to delete this Repair?</p>
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
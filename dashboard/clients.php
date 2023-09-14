<?php session_start(); ?>
<?php

if (isset($_REQUEST["createClient"])) {
	$nic = $_POST['nic'];
	$name = $_POST['name'];
	$address = $_POST['address'];
	$phone1 = $_POST['phone1'];
	$phone2 = $_POST['phone2'];
	$email = $_POST['email'];
	/*$repassword= $_POST['repassword'];*/

	//database connection
	$conn = new mysqli('localhost', 'root', '', 'mobileshopdb');
	if ($conn->connect_error) {
		die('Connection Failed : ' . $conn->connect_error);
	} else {
		$stmt = $conn->prepare("INSERT INTO customer(nic,name,address,phone1,phone2,email)values(?,?,?,?,?,?)");
		$stmt->bind_param("isssss", $nic, $name, $address, $phone1, $phone2, $email);
		$stmt->execute();
		echo "Yor Registration is Successfully....";
		$stmt->close();
		$conn->close();
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
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4><i class="micon dw dw-hammer mtext"></i>Customers</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Customer List</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a href="#" class="btn btn-primary" data-backdrop="static" data-toggle="modal"
									data-target="#add_technician">
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




				function getAllcustomer()
				{
					global $data;
					$sql = "select * from customer";
					$result = mysqli_query($data, $sql);



					while ($row = mysqli_fetch_array($result)) {
						

						echo "<tr>" .
							"<td>" . $row["nic"] . "</td>";
<<<<<<< Updated upstream
							echo"<td>" . $row["name"] . "</td>";
							echo"<td>" . $row["address"] . "</td>";
							echo"<td>" . $row["phone1"] . "</td>";
							echo"<td>" . $row["phone2"] . "</td>";
							echo"<td>" . $row["email"] . "</td>";
							
							echo"</tr>";
							
							
					}

					}

					?>	
=======
						echo "<td>" . $row["name"] . "</td>";
						echo "<td>" . $row["address"] . "</td>";
						echo "<td>" . $row["phone1"] . "</td>";
						echo "<td>" . $row["phone2"] . "</td>";
						echo "<td>" . $row["email"] . "</td>";
						echo "</tr>";

					}

				}

				?>

				<!--				<div>
						<a href="#" data-toggle="modal" data-target="#view"> View</a>
						<a href="#">Edit</a>
						<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete">Delete</a>
					</div> 
				-->


>>>>>>> Stashed changes
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Customer List</h4>
					</div>
					<div class="pb-20">
						<table class="data-table table responsive">
							<thead>
								<tr>
									<th>NIC</th>
									<th>Full Name</th>
									<th>Address</th>
									<th>Phone 1</th>
									<th>Phone 2</th>
									<th>Email</th>
									<th>Status</th>
									<th>Action</th>
								</tr>

							</thead>
							<tbody>
<<<<<<< Updated upstream
							<?php getAllcustomer(); ?>
							<td>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#.php?id=<?php echo $row['nic']; ?>" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>

											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a class="dropdown-item" href="#" data-toggle="modal" data-target="#view"><i class="dw dw-eye"></i> View</a>
												<a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
												<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete"><i class="dw dw-delete-3"></i> Delete</a>
											</div>
										</div>
							</td>
							
						</tbody>
							
=======
								<?php getAllcustomer(); ?>
							</tbody>
							<!--<tbody>
								<tr>
									<td>123-456</td>
									<td>234E</td>
									<td>2023.09.02</td>
									<td>2023.09.05</td>
									<td>Battery Issue</td>
									<td>09876543234</td>
									<td>Specialization 1</td>
									<td><span class="badge bg-success">Active</span></td>
									<td>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a class="dropdown-item" href="#" data-toggle="modal" data-target="#add_technician"><i class="dw dw-eye"></i> View</a>
												<a class="dropdown-item" href="#" data-toggle="modal" data-target="#add_technician"><i class="dw dw-edit2"></i> Edit</a>
												<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete"><i class="dw dw-delete-3"></i> Delete</a>
											</div>
										</div>
									</td>
								</tr>
								<tr>
									<td>123-456234</td>
									<td>456S</td>
									<td>2023.09.02</td>
									<td>2023.09.07</td>
									<td>Dispaly</td>
									<td>09876543234</td>
									<td>Specialization 2</td>
									<td><span class="badge bg-danger">Deactivated</span></td>
									<td>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a class="dropdown-item" href="#" data-toggle="modal" data-target="#add_technician"><i class="dw dw-eye"></i> View</a>
												<a class="dropdown-item" href="#" data-toggle="modal" data-target="#add_technician"><i class="dw dw-edit2"></i> Edit</a>
												<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete"><i class="dw dw-delete-3"></i> Delete</a>
											</div>
										</div>
									</td>
								</tr>
							</tbody> -->
>>>>>>> Stashed changes
						</table>
					</div>
				</div>
				<!-- Simple Datatable End -->
			</div>
		</div>

<<<<<<< Updated upstream
				<!-- Add customer Modal -->
					<div class="col-md-12 col-sm-12 mb-30">
							<div class="modal fade" id="add_technician" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class=" border-radius-10">
											<div class="login-title"><br>
												<div class="col-md-12 col-sm-12 mb-30">
												<h2 class="text-center text-primary">Add Customer</h2>
												</div>
											<form action="client2.php" target="" method="POST" onsubmit="return checkpassword ()">

												<div class="input-group custom">
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
																<label>NIC</label>
																<input class="form-control form-control-lg" type="text" name ="nic"  pattern="[0-9]{12}" placeholder="200116404223" required>
															</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
																<label>Full Nmae</label>
																<input class="form-control form-control-lg" type="text" name ="name" placeholder="Full Name" required>
															</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
																<label>Address</label>
																<input class="form-control form-control-lg" type="text" name ="address"placeholder="Address" required>
															</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
																<label>Phone 01</label>
																<input class="form-control form-control-lg" type="text" name ="phone1" pattern="[0-9]{10}" placeholder="0714782233" required>
															</div>
												</div>
												
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
																<label>phone 02</label>
																<input class="form-control form-control-lg" type="text" name ="phone2" pattern="[0-9]{10}" placeholder="0714782233" required>
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
																<input type="submit" class="btn btn-primary" value="Submit">
																<input type="reset" class="btn btn-danger" value="Cancel" data-backdrop="static" data-toggle="modal" data-target="#add_technician">
															</div>
												</div>
												
												</div>
											</form>
=======
		<!-- Add customer Modal -->
		<div class="col-md-12 col-sm-12 mb-30">
			<div class="modal fade" id="add_technician" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
				aria-hidden="true">
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
												<label>NIC</label>
												<input class="form-control form-control-lg" type="text" name="nic">
											</div>
										</div>
										<div class="col-md-6 col-sm-12">
											<div class="form-group">
												<label>Full Name</label>
												<input class="form-control form-control-lg" type="text" name="name">
											</div>
										</div>
										<div class="col-md-6 col-sm-12">
											<div class="form-group">
												<label>Address</label>
												<input class="form-control form-control-lg" type="text" name="address">
											</div>
										</div>
										<div class="col-md-6 col-sm-12">
											<div class="form-group">
												<label>Phone 01</label>
												<input class="form-control form-control-lg" type="text" name="phone1">
											</div>
										</div>

										<div class="col-md-6 col-sm-12">
											<div class="form-group">
												<label>phone 02</label>
												<input class="form-control form-control-lg" type="text" name="phone2">
											</div>
										</div>
										<div class="col-md-12 col-sm-12">
											<div class="form-group">
												<label>Email</label>
												<input class="form-control form-control-lg" type="text" name="email">
											</div>
										</div>

										<div class="col-md-12 col-sm-12">
											<div class="form-group">
												<input type="submit" class="btn btn-primary" name="createClient"
													value="Submit">
												<input type="submit" class="btn btn-danger" value="Cancel">
											</div>
>>>>>>> Stashed changes
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
				<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
					aria-hidden="true">
					<div class="modal-dialog modal-sm modal-dialog-centered">
						<div class="modal-content bg-danger text-white">
							<div class="modal-body text-center">
								<h3 class="text-white mb-15"><i class="fa fa-exclamation-triangle"></i> Alert</h3>
								<p>Are you sure you want to delete this customer?</p>
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
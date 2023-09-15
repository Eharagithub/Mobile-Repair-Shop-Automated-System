<?php session_start(); ?>
<?php
$conn = new mysqli('localhost', 'root', '', 'mobileshopdb');
$selectedCientId = 0;

if (isset($_REQUEST["createClient"])) {
	$nic = $_POST['nic'];
	$name = $_POST['name'];
	$address = $_POST['address'];
	$phone1 = $_POST['phone1'];
	$phone2 = $_POST['phone2'];
	$email = $_POST['email'];
	/*$repassword= $_POST['repassword'];*/

	//database connection
	
	if ($conn->connect_error) {
		die('Connection Failed : ' . $conn->connect_error);
	} else {
		$stmt = $conn->prepare("INSERT INTO customer(nic,name,address,phone1,phone2,email)values(?,?,?,?,?,?)");
		$stmt->bind_param("isssss", $nic, $name, $address, $phone1, $phone2, $email);
		$stmt->execute();
		echo "Yor Registration is Successfully....";
		$stmt->close();
	}
}

function getAllcustomer()
{
	global $conn;
	$sql = "select * from customer";
	$result = mysqli_query($conn, $sql);



	while ($row = mysqli_fetch_array($result)) {


		echo "<tr>";
		echo 	"<td>" . $row["nic"] . "</td>";
		echo 	"<td>" . $row["name"] . "</td>";
		echo 	"<td>" . $row["address"] . "</td>";
		echo 	"<td>" . $row["phone1"] . "</td>";
		echo 	"<td>" . $row["phone2"] . "</td>";
		echo 	"<td>" . $row["email"] . "</td>";

		echo 	'<td>';
		echo 		'<div class="dropdown" onclick="setSelectedCustomer('.$row["nic"].')';
		echo 			'<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#.php?id=<?php echo $row[\'nic\']; ?>" role="button" data-toggle="dropdown">';
		echo 				'<i class="dw dw-more"></i>';
		echo 			'</a>';

		echo 			'<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">';
		echo 				'<a class="dropdown-item" href="#" data-toggle="modal" data-target="#view"><i class="dw dw-eye"></i> View</a>';
		echo 				'<a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>';
		echo 				'<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete"><i class="dw dw-delete-3"></i> Delete</a>';
		echo 			'</div>';
		echo 		'</div>';
		echo 	'</td>';
		echo "</tr>";
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
								<h4><i class="micon dw dw-user"></i>Customers</h4>
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
								<a href="#" class="btn btn-primary" data-backdrop="static" data-toggle="modal" data-target="#add_technician">
									Add New
								</a>
							</div>
						</div>
					</div>
				</div>

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
									<th>Action</th>
								</tr>

							</thead>
							<tbody>
								<?php getAllcustomer(); ?>
							</tbody>

						</table>
					</div>
				</div>
				<!-- Simple Datatable End -->
			</div>
		</div>

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
												<input type="submit" class="btn btn-primary" name="createClient" value="Submit">
												<input type="submit" class="btn btn-danger" value="Cancel">
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
								<p>Are you sure you want to delete this customer?</p>
								<button type="button" class="btn btn-light" data-dismiss="modal" onclick="deleteClientById()">Yes</button>
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
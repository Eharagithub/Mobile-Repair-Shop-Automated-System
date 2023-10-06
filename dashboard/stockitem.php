<?php session_start(); ?>
<?php

if (isset($_REQUEST["createstockitem"])) {
	$itemCode = $_POST['itemCode'];
	$name = $_POST['name'];
	$stock = $_POST['stock'];
	$cost= $_POST['cost'];
	$sellingPrice = $_POST['sellingPrice'];
	

	//database connection
	$conn = new mysqli('localhost', 'root', '', 'mobileshopdb');
	if ($conn->connect_error) {
		die('Connection Failed : ' . $conn->connect_error);
	} else {
		$stmt = $conn->prepare("INSERT INTO stockitem( itemCode,name,stock,cost,sellingPrice)values(?,?,?,?,?)");
		$stmt->bind_param("ssidd", $itemCode,$name,$stock,$cost,$sellingPrice);
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
								<h4><i class="micon dw dw-user"></i>Stock Item</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Stock Item List</li>
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




				function getAllstockitem()
				{
					global $data;
					$sql = "select * from stockitem";
					$result = mysqli_query($data, $sql);



					while ($row = mysqli_fetch_array($result)) {
						

						echo "<tr>" .
							"<td>" . $row["itemCode"] . "</td>";
							echo"<td>" . $row["name"] . "</td>";
							echo"<td>" . $row["stock"] . "</td>";
							echo"<td>" . $row["cost"] . "</td>";
							echo"<td>" . $row["sellingPrice"] . "</td>";
							echo 	'<td>';
							echo 		'<div class="dropdown" onclick="setSelectedstockItem('.$row["itemCode"].')';
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
					function deletestockItemByitemCode(){
						global $conn;
						global $selectedstockItem;
						$sql = "delete from stockItem where itemCode = '" . $selectedstockItem . "'";
						mysqli_query($conn, $sql);
					}
				
					function setSelectedstockItem($itemCode){
						global $selectedstockItem;
						$selectedstockItem = $itemCode;
					}

					}

					?>	
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Stock List</h4>
					</div>
					<div class="pb-20">
						<table class="data-table table responsive">
							<thead>
								<tr>
									<th>Item Code</th>
									<th>Name</th>
									<th>Stock</th>
									<th>Cost</th>
									<th>Selling Price</th>
								</tr>

							</thead>
							<tbody>

							<?php getAllstockitem(); ?>
							
						</tbody>
	
						</table>
					</div>
				</div>
				<!-- Simple Datatable End -->
			</div>
		</div>

				<!-- Add Stock Item  Modal -->
					<div class="col-md-12 col-sm-12 mb-30">
							<div class="modal fade" id="add_technician" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class=" border-radius-10">
											<div class="login-title"><br>
												<div class="col-md-12 col-sm-12 mb-30">
												<h2 class="text-center text-primary">Add Stock Item</h2>
												</div>
											<form action="" target="" method="POST" onsubmit="return checkpassword ()">

												<div class="input-group custom">
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
																<label>Item Code</label>
																<input class="form-control form-control-lg" type="text" name ="itemCode" required>
															</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
																<label>Name</label>
																<input class="form-control form-control-lg" type="text" name ="name" placeholder="name" required>
															</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
																<label>Stock</label>
																<input class="form-control form-control-lg" type="text" name ="stock"placeholder="stock" required>
															</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
																<label>Cost</label>
																<input class="form-control form-control-lg" type="text" name ="cost" placeholder="Cost" required>
															</div>
												</div>
												
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
																<label>Selling Price</label>
																<input class="form-control form-control-lg" type="sellingPrice" name ="sellingPrice" required>
															</div>
												</div>
												
												
												<div class="col-md-12 col-sm-12">
													<div class="form-group">
																<input type="submit" class="btn btn-primary" value="Submit" name="createstockItem">
																<input type="reset" class="btn btn-danger" value="Cancel" data-backdrop="static" data-toggle="modal" data-target="#add_technician">
															</div>
												</div>
												
												</div>
											</form>
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
								<p>Are you sure you want to delete this Item?</p>
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
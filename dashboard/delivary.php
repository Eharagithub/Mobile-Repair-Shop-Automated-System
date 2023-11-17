<?php session_start(); ?>
<?php

if (isset($_REQUEST["createdelivary"])) {
	$empNo= $_POST['empNo'];
	$nic= $_POST['nic'];
	$dname= $_POST['dname'];
	$daddress= $_POST['daddress'];
	$phone= $_POST['phone'];
	$email= $_POST['email'];
	/*$repassword= $_POST['repassword'];*/

	//database connection
	$conn = new mysqli('localhost', 'root', '', 'mobileshopdb');
	if ($conn->connect_error) {
		die('Connection Failed : ' . $conn->connect_error);
	} else {
		$stmt = $conn->prepare("INSERT INTO delivery(empNo,nic,dname,daddress,phone,email)values(?,?,?,?,?,?)");
		$stmt->bind_param("isssss",$empNo,$nic,$dname,$daddress,$phone,$email);
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
								<h4><i class="micon fa fa-truck"></i>COURIER SERVICES</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">COURIER SERVICES</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
						<?php if ($_SESSION["systemUserType"] == "ADMIN") { ?>
							<div class="dropdown">
								<a href="#" class="btn btn-primary" data-backdrop="static" data-toggle="modal" data-target="#add_technician">
									Add New
								</a>
							</div>
							<?php } ?>
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




					function getAlldelivery(){
						global $data;
						$sql = "select * from delivery";
						$result = mysqli_query($data, $sql);

	

					while ($row = mysqli_fetch_array($result)) {

							echo "<tr>" . 
							"<td>" . $row["empNo"] . "</td>";
							echo"<td>" . $row["nic"] . "</td>";
							echo"<td>" . $row["dname"] . "</td>";
							echo"<td>" . $row["daddress"] . "</td>";
							echo"<td>" . $row["phone"] . "</td>";
							echo"<td>" . $row["email"] . "</td>";
							echo 	'<td>';
							echo 			'<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#.php?id=<?php echo $row[\'nic\']; ?>" role="button" data-toggle="dropdown">';
							echo 				'<i class="dw dw-more"></i>';
							echo 			'</a>';
											//Drop down for view the row
							echo 			'<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">';
							echo 				'<a class="dropdown-item" href="#" onclick="viewDelivary(\'' . $row['empNo'] . '\', \'' . $row['nic'] . '\', \'' . $row['dname'] . '\')">
													<i class="dw dw-eye"></i> View </a>';
											//Drop down for edit the row		
							//echo 		        '<a class="dropdown-item" href="#" onclick="editCustomer(\'' . $row['nic'] . '\', \'' . $row['name'] . '\', \'' . $row['address'] . '\', \'' . $row['phone1'] . '\')">
								//					<i class="dw dw-edit"></i> Edit</a>';
											//Drop down for delete the row
							//echo 				'<a class="dropdown-item delete-service" href="#" data-service-id="' . $row['empNo'] . '">
								//					<i class="dw dw-delete-3"></i> Delete</a>';
						  
					
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
						<h4 class="text-blue h4">Delivary List</h4>
					</div>
					<div class="pb-20">
						<table class="data-table table responsive">
							<thead>
							<tr>
							<th>Employee Id</th>
							<th>NIC</th>
							<th>Full Name</th>
							<th>Address</th>
							<th>Phone</th>
							<th>Email</th>
							<th>Action</th>
						</tr>
								
							</thead>
							<tbody>
							<?php getAlldelivery(); ?>
						</tbody>
						</table>
					</div>
				</div>
				<!-- Simple Datatable End -->
		</div>
	</div>

				<!-- Add delivary Modal -->
					<div class="col-md-12 col-sm-12 mb-30">
							<div class="modal fade" id="add_technician" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class=" border-radius-10">
											<div class="login-title"><br>
												<div class="col-md-12 col-sm-12 mb-30">
												<h2 class="text-center text-primary">Add Courier Service</h2>
												</div>
											<form action="" target="" method="POST" onsubmit="return checkpassword ()">

												<div class="input-group custom">
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
																<label>Employee Num</label>
																<input class="form-control form-control-lg" type="text" name ="empNo" placeholder="Emloyee Number" required>
															</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
																<label>NIC</label>
																<input class="form-control form-control-lg" type="text" name ="nic" pattern="[0-9]{12}" placeholder="200116404223" required>
															</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
																<label>Name</label>
																<input class="form-control form-control-lg" type="text" name ="dname" placeholder="Full Name" required>
															</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
																<label>Address</label>
																<input class="form-control form-control-lg" type="text" name ="daddress"placeholder="Address" required>
															</div>
												</div>
												
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
																<label>Contact</label>
																<input class="form-control form-control-lg" type="text" name ="phone" pattern="[0-9]{10}" placeholder="0714782233" required>
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
																<input type="submit" class="btn btn-primary" value="Submit" name="createdelivary">
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
							<!-- View CorierService Modal -->
		<div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    			<div class="modal-dialog" role="document">
        			<div class="modal-content">
            			<div class="modal-header">
                			<h5 class="modal-title" id="viewModalLabel">Courier Service Details</h5>
                			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    			<span aria-hidden="true">&times;</span>
                			</button>
            			</div>
            			<div class="modal-body">
                		<!-- Display service details here -->
                			<p><strong>ID:</strong> <span id="viewEmpno"></span></p>
                			<p><strong>NIC:</strong> <span id="viewnic"></span></p>
							<p><strong>Delivery Name:</strong> <span id="viewDname"></span></p>
                			<!-- Add more fields as needed -->
            			</div>
            			<div class="modal-footer">
                			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
	<script src="vendors/scripts/datatable-setting.js"></script>
	<script>
    			function viewDelivary(empNo, nic, dname) {
        		// Set the data in the modal
        		document.getElementById("viewEmpno").textContent = empNo;
        		document.getElementById("viewnic").textContent = nic;
				document.getElementById("viewDname").textContent = dname;
        
       			 // Open the modal
        		$('#view').modal('show');
    			}
			</script>



</body>

</html>
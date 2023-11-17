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
								<h4><i class="micon dw dw-user"></i>  Customers</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Customer List</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
						<?php if ($_SESSION["systemUserType"] == "BR") { ?>
							<div class="dropdown">
								<a href="#" class="btn btn-primary" data-backdrop="static" data-toggle="modal"
									data-target="#add_technician">
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




				function getAllcustomer()
				{
					global $data;
					$sql = "select * from customer";
					$result = mysqli_query($data, $sql);



					while ($row = mysqli_fetch_array($result)) {
						

						echo "<tr>" .
							"<td>" . $row["nic"] . "</td>";
							echo"<td>" . $row["name"] . "</td>";
							echo"<td>" . $row["address"] . "</td>";
							echo"<td>" . $row["phone1"] . "</td>";
							echo"<td>" . $row["phone2"] . "</td>";
							echo"<td>" . $row["email"] . "</td>";
							echo 	'<td>';
							echo 		'<div class="dropdown" onclick="setSelectedCustomer('.$row["nic"].')';
							echo 			'<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#.php?id=<?php echo $row[\'nic\']; ?>" role="button" data-toggle="dropdown">';
							echo 				'<i class="dw dw-more"></i>';
							echo 			'</a>';
											//Drop down for view the row
							echo 			'<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">';
							echo 				'<a class="dropdown-item" href="#" onclick="viewCustomer(\'' . $row['nic'] . '\', \'' . $row['name'] . '\')">
													<i class="dw dw-eye"></i> View </a>';
											//Drop down for edit the row		
							//echo 		        '<a class="dropdown-item" href="#" onclick="editCustomer(\'' . $row['nic'] . '\', \'' . $row['name'] . '\', \'' . $row['address'] . '\', \'' . $row['phone1'] . '\')">
								//					<i class="dw dw-edit"></i> Edit</a>';
											//Drop down for delete the row
							//echo 				'<a class="dropdown-item delete-service" href="#" data-service-id="' . $row['nic'] . '">
							//						<i class="dw dw-delete-3"></i> Delete</a>';
						  
					
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
						<h4 class="text-blue h4">Customer List</h4>
					</div>
					<div class="pb-20">
						<table class="data-table table responsive">
							<thead>
								<tr>
									<th>Customer NIC</th>
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

				<!-- Add customer Modal--> 
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
																<input class="form-control form-control-lg" type="text" name ="nic"  pattern="[0-9]{12}" placeholder="200116404223" required>
															</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
																<label>Full Name</label>
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
																<input type="submit" class="btn btn-primary" value="Submit" name="createClient">
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
			<!-- View Service Modal -->
			<div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    			<div class="modal-dialog" role="document">
        			<div class="modal-content">
            			<div class="modal-header">
                			<h5 class="modal-title" id="viewModalLabel">Customer Details</h5>
                			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    			<span aria-hidden="true">&times;</span>
                			</button>
            			</div>
            			<div class="modal-body">
                		<!-- Display service details here -->
                			<p><strong>NIC:</strong> <span id="viewNic"></span></p>
                			<p><strong>Name:</strong> <span id="viewName"></span></p>
                			<!-- Add more fields as needed -->
            			</div>
            			<div class="modal-footer">
                			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            			</div>
        			</div>
    			</div>
			</div>

			<!-- Edit Service Modal -->
			<div class="modal fade" id="editServiceModal" tabindex="-1" role="dialog" aria-labelledby="editServiceModalLabel" aria-hidden="true">
    			<div class="modal-dialog" role="document">
        			<div class="modal-content">
            			<div class="modal-header">
                			<h5 class="modal-title" id="editServiceModalLabel">Edit Service</h5>
                			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    			<span aria-hidden="true">&times;</span>
                			</button>
            			</div>
            		<div class="modal-body">
                	<!-- Edit service form fields go here -->
					<form id="editServiceForm" method="POST" action="services.php">

    					<input type="hidden" id="editServiceId" name="editServiceId" value="">
    					<div class="form-group">
        					<label for="editServiceName">Service Name</label>
       				 		<input type="text" class="form-control" id="editServiceName" name="editServiceName">
    					</div>

    					<div class="form-group">
        					<label for="editServiceCost">Service Cost</label>
        					<input type="text" class="form-control" id="editServiceCost" name="editServiceCost">
						</div>
    				
					</form>

           			</div>
            		<div class="modal-footer">
                		<button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
                		<button type="button" class="btn btn-primary" onclick="submitEditForm()">Save Changes</button>
			
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
			

			<!--view function-->
			<script>
    			function viewCustomer(nic, name) {
        		// Set the data in the modal
        		document.getElementById("viewNic").textContent = nic;
        		document.getElementById("viewName").textContent = name;
        
       			 // Open the modal
        		$('#view').modal('show');
    			}
			</script>


			<!--edit function-->
			<script>
    			function editCustomer(	nic,name,address,phone1,phone2,email) {
        		// Populate the edit modal form fields with the data from the selected row
        		document.getElementById("editCusId").value = nic;
        		document.getElementById("editCusName").value = name;
				
        		// Populate other form fields as needed
        
        		// Open the edit modal
        		$('#editCustomerModal').modal('show');
    			}

    			
    			function submitEditForm() {
        		// Submit the edit form
        		document.getElementById("editCustomerForm").submit();
				}
			</script>

			<!--delete function-->
			<script>
    			// Handle delete button click
    			$(document).on('click', '.delete-service', function(e) {
        		e.preventDefault();

        		// Get the service ID from the data attribute
        		var nicToDelete = $(this).data('nic');

        		// Show a confirmation dialog
        		var confirmDelete = confirm('Are you sure you want to delete this service?');

        		if (confirmDelete) {
            	// Redirect to the delete page with the service ID as a parameter
            	window.location.href = 'delete_service.php?serviceId=' + nicIdToDelete;
       			 }
    			});
			</script>
</body>

</html>

<?php session_start(); ?>
<?php

if (isset($_REQUEST["createService"])) {
	$sid = $_POST['sid'];
	$service = $_POST['service'];
	$description = $_POST['description'];
	$cost= $_POST['cost'];
	$date = $_POST['date'];
	

	//database connection
	$conn = new mysqli('localhost', 'root', '', 'mobileshopdb');
	if ($conn->connect_error) {
		die('Connection Failed : ' . $conn->connect_error);
	} else {
		$stmt = $conn->prepare("INSERT INTO services(sid,service,description,cost,date)values(?,?,?,?,?)");
		$stmt->bind_param("issis", $sid, $service, $description, $cost, $date);
		$stmt->execute();
		echo "Your Registration is Successfully..";


		$stmt->close();
	}

}
?>

<!--delete php-->
<?php
if (isset($_GET['serviceId'])) {
    $serviceIdToDelete = $_GET['serviceId'];
    
    // Perform the delete operation based on the $serviceIdToDelete

    // After deleting, you can redirect back to the services list page or perform other actions
    // For example:
    header('Location: services.php');
    exit;
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
	<!--drawer -->
	<?php include_once("../Common/drower.php"); ?>

	<!--top tab-->
	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4><i class="micon dw dw-user"></i>Services</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Services List</li>
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

				<!-- Simple Datatable start for Add New button-->
				<?php

				$host = "localhost";
				$user = "root";
				$password = "";
				$db = "mobileShopDb";

				$data = mysqli_connect($host, $user, $password, $db);




				function getAllservices()
				{
					global $data;
					$sql = "select * from services";
					$result = mysqli_query($data, $sql);



					while ($row = mysqli_fetch_array($result)) {
						

						echo "<tr>" .
							"<td>" . $row["sid"] . "</td>";
							echo"<td>" . $row["service"] . "</td>";
							echo"<td>" . $row["description"] . "</td>";
							echo"<td>" . $row["cost"] . "</td>";
							echo"<td>" . $row["date"] . "</td>";
							echo 	'<td>';
							echo 		'<div class="dropdown" onclick="setSelectedservices('.$row["sid"].')';
							echo 			'<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#.php?id=<?php echo $row[\'sid\']; ?>" role="button" data-toggle="dropdown">';
							echo 				'<i class="dw dw-more"></i>';
							echo 			'</a>';
											//Drop down for view the row
							echo 			'<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">';
							echo 				'<a class="dropdown-item" href="#" onclick="viewService(\'' . $row['sid'] . '\', \'' . $row['service'] . '\')">
													<i class="dw dw-eye"></i> View </a>';
											//Drop down for edit the row		
							echo 		        '<a class="dropdown-item" href="#" onclick="editService(\'' . $row['service'] . '\', \'' . $row['description'] . '\', \'' . $row['cost'] . '\', \'' . $row['date'] . '\')">
													<i class="dw dw-edit"></i> Edit</a>';
											//Drop down for delete the row
							echo 				'<a class="dropdown-item delete-service" href="#" data-service-id="' . $row['sid'] . '">
													<i class="dw dw-delete-3"></i> Delete</a>';
						  
					
							echo 			'</div>';
		 							
							echo"</tr>";
							
							
					}
					function deleteSevicesBysid(){
						global $conn;
						global $selectedservices;
						$sql = "delete from services where sid = '" . $selectedservices . "'";
						mysqli_query($conn, $sql);
					}
				
					function setSelectedservices($sid){
						global $selectedsevices;
						$selectedservices = $sid;
					}

					}

					?>	

					<!--table display starts-->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Services List</h4>
					</div>
					<div class="pb-20">
						<table class="data-table table responsive">
							<thead>
								<tr>
									<th>ID</th>
									<th>Service</th>
									<th>Description</th>
									<th>Cost</th>
									<th>date</th>
									<th>Action</th>
								</tr>

							</thead>
							<tbody>

							<?php getAllservices(); ?>
							
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
												<h2 class="text-center text-primary">Add Service</h2>
												</div>
											</div>
											<form action="" target="" method="POST" onsubmit="return checkpassword ()">

												<div class="input-group custom">
													<div class="col-md-6 col-sm-12">
														<div class="form-group">
															<label>ID</label>
															<input class="form-control form-control-lg" type="text" name ="sid" required>
														</div>
													</div>
													<div class="col-md-6 col-sm-12">
														<div class="form-group">
															<label>Service</label>
															<input class="form-control form-control-lg" type="text" name ="service" placeholder="service" required>
														</div>
													</div>
													<div class="col-md-6 col-sm-12">
														<div class="form-group">
															<label>Description</label>
															<input class="form-control form-control-lg" type="text" name ="description"placeholder="Description" required>
														</div>
													</div>
													<div class="col-md-6 col-sm-12">
														<div class="form-group">
															<label>cost</label>
															<input class="form-control form-control-lg" type="text" name ="cost" placeholder="Cost" required>
														</div>
													</div>
												
													<div class="col-md-6 col-sm-12">
														<div class="form-group">
															<label>Date</label>
															<input class="form-control form-control-lg" type="date" name ="date" required>
														</div>
													</div>
												
												
													<div class="col-md-12 col-sm-12">
														<div class="form-group">
															<input type="submit" class="btn btn-primary" value="Submit" name="createService">
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
			

			<!-- View Service Modal -->
			<div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    			<div class="modal-dialog" role="document">
        			<div class="modal-content">
            			<div class="modal-header">
                			<h5 class="modal-title" id="viewModalLabel">Service Details</h5>
                			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    			<span aria-hidden="true">&times;</span>
                			</button>
            			</div>
            			<div class="modal-body">
                		<!-- Display service details here -->
                			<p><strong>ID:</strong> <span id="viewServiceId"></span></p>
                			<p><strong>Service:</strong> <span id="viewServiceName"></span></p>
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





			<!-- Delete modal 
			<div class="col-md-4 col-sm-12 mb-30">
				<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
					aria-hidden="true">
					<div class="modal-dialog modal-sm modal-dialog-centered">
						<div class="modal-content bg-danger text-white">
							<div class="modal-body text-center">
								<h3 class="text-white mb-15"><i class="fa fa-exclamation-triangle"></i> Alert</h3>
								<p>Are you sure you want to delete this service?</p>
								<button type="button" class="btn btn-light" data-dismiss="modal">Yes</button>
								<button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
							</div>
						</div>
					</div>
				</div>
			</div>-->
				
		
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
    			function viewService(serviceId, serviceName) {
        		// Set the data in the modal
        		document.getElementById("viewServiceId").textContent = serviceId;
        		document.getElementById("viewServiceName").textContent = serviceName;
        
       			 // Open the modal
        		$('#view').modal('show');
    			}
			</script>


			<!--edit function-->
			<script>
    			function editService(serviceId, serviceName, description, cost, date) {
        		// Populate the edit modal form fields with the data from the selected row
        		document.getElementById("editServiceId").value = serviceId;
        		document.getElementById("editServiceName").value = serviceName;
				
        		// Populate other form fields as needed
        
        		// Open the edit modal
        		$('#editServiceModal').modal('show');
    			}

    			
    			function submitEditForm() {
        		// Submit the edit form
        		document.getElementById("editServiceForm").submit();
				}
			</script>

			<!--delete function-->
			<script>
    			// Handle delete button click
    			$(document).on('click', '.delete-service', function(e) {
        		e.preventDefault();

        		// Get the service ID from the data attribute
        		var serviceIdToDelete = $(this).data('service-id');

        		// Show a confirmation dialog
        		var confirmDelete = confirm('Are you sure you want to delete this service?');

        		if (confirmDelete) {
            	// Redirect to the delete page with the service ID as a parameter
            	window.location.href = 'delete_service.php?serviceId=' + serviceIdToDelete;
       			 }
    			});
			</script>



</body>

</html>

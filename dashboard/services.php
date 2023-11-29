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


<?php
// Add this code at the top of your PHP file, after the session_start() line
if (isset($_POST["editService"])) {
    $editServiceId = $_POST['editServiceId'];
    $editServiceName = $_POST['editServiceName'];
    $editServiceDescription = $_POST['editServiceDescription'];
    $editServiceCost = $_POST['editServiceCost'];

    $conn = new mysqli('localhost', 'root', '', 'mobileshopdb');
    if ($conn->connect_error) {
        die('Connection Failed : ' . $conn->connect_error);
    } else {
		$stmt = $conn->prepare("UPDATE services SET service=?, description=?, cost=?, date=? WHERE sid=?");
		$stmt->bind_param("ssssi", $editServiceName, $editServiceDescription, $editServiceCost, $date, $editServiceId);
		

        $stmt = $conn->prepare("UPDATE services SET service=?, description=?, cost=? WHERE sid=?");
        $stmt->bind_param("ssii", $editServiceName, $editServiceDescription, $editServiceCost, $editServiceId);
        $stmt->execute();
        echo "Location Updated Successfully.";

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
								<h4><i class="micon fa fa-calendar-check-o"></i>Services</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Services List</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
						<?php if ($_SESSION["systemUserType"] == "TECH") { ?>
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
											echo '<a class="dropdown-item" href="#" onclick="editService(\'' . $row['sid'] . '\', \'' . $row['service'] . '\', \'' . $row['description'] . '\', \'' . $row['cost'] . '\')">
											<i class="dw dw-edit"></i> Edit</a>';
																	
				
											//Drop down for delete the row
											echo '<a class="dropdown-item delete-service" href="#" data-service-id="' . $row["sid"] . '" onclick="deleteServiceId(' . $row["sid"] . ')">
											<i class="dw dw-delete-3"></i> Delete</a>';;
						  
					
							echo 			'</div>';
		 							
							echo"</tr>";
							
							
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
                <form action="" method="POST">
                    <input type="hidden" id="editServiceId" name="editServiceId" value="">
                    <div class="form-group">
                        <label for="editServiceName">Service Name</label>
                        <input type="text" class="form-control" id="editServiceName" name="editServiceName" required>
                    </div>
                    <!-- Add more fields as needed -->
                    <div class="form-group">
                        <label for="editServiceDescription">Service Description</label>
                        <input type="text" class="form-control" id="editServiceDescription" name="editServiceDescription" required>
                    </div>
                    <div class="form-group">
                        <label for="editServiceCost">Service Cost</label>
                        <input type="text" class="form-control" id="editServiceCost" name="editServiceCost" required>
                    </div>
					<div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Save Changes" name="editService">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function editService(serviceId, serviceName, serviceDescription, serviceCost) {
        // Populate the edit modal form fields with the data from the selected row
        document.getElementById("editServiceId").value = serviceId;
        document.getElementById("editServiceName").value = serviceName;
        document.getElementById("editServiceDescription").value = serviceDescription;
        document.getElementById("editServiceCost").value = serviceCost;

        // Open the edit modal
        $('#editServiceModal').modal('show');
    }

    

</script>




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


			<!--delete function-->
			<script>
    			// Handle delete button click
$(document).on('click', '.delete-service', function (e) {
    e.preventDefault();

    // Get the service ID from the data-service-id attribute
    var serviceIdToDelete = $(this).data('service-id');

    // Show a confirmation dialog
    var confirmDelete = confirm('Are you sure you want to delete this service?');

    if (confirmDelete) {
        // Perform AJAX request to delete_service.php
        $.ajax({
            type: 'POST',
            url: 'delete_service.php',
            data: {
                deleteServiceId: serviceIdToDelete
            },
            success: function (response) {
                // Handle the response, e.g., display a message or update the table
                console.log(response); // Log the response to the console for debugging
            },
            error: function (error) {
                console.error('AJAX request failed:', error);
            }
        });
    }
});

			</script>



</body>

</html>

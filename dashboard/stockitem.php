<?php session_start(); ?>
<?php

if (isset($_REQUEST["createstockitem"])) {
	$itemCode = $_POST['itemCode'];
	$name = $_POST['name'];
	$stock = $_POST['stock'];
	$cost= $_POST['cost'];
	$unit= $_POST['unit'];
	$sellingPrice = $_POST['sellingPrice'];
	

	//database connection
	$conn = new mysqli('localhost', 'root', '', 'mobileshopdb');
	if ($conn->connect_error) {
		die('Connection Failed : ' . $conn->connect_error);
	} else {
		$stmt = $conn->prepare("INSERT INTO item(itemCode,name,stock,cost,unit,sellingPrice)values(?,?,?,?,?,?)");
		$stmt->bind_param("ssiisi", $itemCode,$name,$stock,$cost,$unit,$sellingPrice);
		$stmt->execute();
		echo "Your Registration is Successfully..";


		$stmt->close();
	}

}
?>

<!--delete php-->
<?php
if (isset($_GET['itemCode'])) {
    $itemCodeToDelete = $_GET['itemCode'];
    
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
								<h4><i class="micon fa fa-archive"></i>  Stock Item</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Stock List</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
							<?php if ($_SESSION["systemUserType"] == "ADMIN" || $_SESSION["systemUserType"] == "TECH") { ?>
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




				function getAllstockitem()
				{
					global $data;
					$sql = "select * from item";
					$result = mysqli_query($data, $sql);



					while ($row = mysqli_fetch_array($result)) {
						

						echo "<tr>" .
							"<td>" . $row["itemCode"] . "</td>";
							echo"<td>" . $row["name"] . "</td>";
							echo"<td>" . $row["stock"] . "</td>";
							echo"<td>" . $row["cost"] . "</td>";
							echo"<td>" . $row["unit"] . "</td>";
							echo"<td>" . $row["sellingPrice"] . "</td>";
							echo 	'<td>';
							echo 		'<div class="dropdown" onclick="setSelectedstockitem('.$row["itemCode"].')';
							echo 			'<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#.php?id=<?php echo $row[\'itemCode\']; ?>" role="button" data-toggle="dropdown">';
							echo 				'<i class="dw dw-more"></i>';
							echo 			'</a>';
											//Drop down for view the row
							echo 			'<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">';
							echo 				'<a class="dropdown-item" href="#" onclick="viewstockitem(\'' . $row['itemCode'] . '\', \'' . $row['name'] . '\')">
													<i class="dw dw-eye"></i> View </a>';
											//Drop down for edit the row		
							echo 		        '<a class="dropdown-item" href="#" onclick="editstockitem(\'' . $row['itemCode'] . '\',\'' . $row['name'] . '\', \'' . $row['stock'] . '\', \'' . $row['cost'] . '\',\'' . $row['sellingPrice'] . '\')">
													<i class="dw dw-edit"></i> Edit</a>';
											//Drop down for delete the row
							echo 				'<a class="dropdown-item delete-stockitem" href="#" data-stockitem-id="' . $row['itemCode'] . '">
													<i class="dw dw-delete-3"></i> Delete</a>';
						  
					
							echo 			'</div>';
		 							
							echo"</tr>";
							
							
					}
					function deletestockitemByitemCode(){
						global $conn;
						global $selectedstockitem;
						$sql = "delete from stockitem where itemCode = '" . $selectedstockitem . "'";
						mysqli_query($conn, $sql);
					}
				
					function setSelectedstockitem($itemCode){
						global $selectedstockitem;
						$selectedstockitem = $itemCode;
					}

					}

					?>	

					<!--table display starts-->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Stock List</h4>
					</div>
					<div class="pb-20">
						<table class="data-table table responsive">
							<thead>
								<tr>
									<th>Item Code</th>
									<th>Mterial Name</th>
									<th>In Stock</th>
									<th>Cost</th>
									<th>Unit</th>
									<th>Selling Price</th>
									<th>Action</th>
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

				<!-- Add customer Modal -->
				<div class="col-md-12 col-sm-12 mb-30">
							<div class="modal fade" id="add_technician" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class=" border-radius-10">
											<div class="login-title"><br>
												<div class="col-md-12 col-sm-12 mb-30">
												<h2 class="text-center text-primary">Add Stock Item</h2>
												</div>
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
															<label>Material Name</label>
															<input class="form-control form-control-lg" type="text" name ="name" placeholder="Material" required>
														</div>
													</div>
													<div class="col-md-6 col-sm-12">
														<div class="form-group">
															<label>In Stock</label>
															<input class="form-control form-control-lg" type="text" name ="stock"placeholder="Stock Count" required>
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
															<label>Unit</label>
															<input class="form-control form-control-lg" type="text" name ="unit" placeholder="Unit" required>
														</div>
													</div>
												
													<div class="col-md-6 col-sm-12">
														<div class="form-group">
															<label>Selling Price</label>
															<input class="form-control form-control-lg" type="sellingPrice" name ="sellingPrice" placeholder="Price" required>
														</div>
													</div>
												
												
													<div class="col-md-12 col-sm-12">
														<div class="form-group">
															<input type="submit" class="btn btn-primary" value="Submit" name="createstockitem">
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
                			<h5 class="modal-title" id="viewModalLabel">Stock Details</h5>
                			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    			<span aria-hidden="true">&times;</span>
                			</button>
            			</div>
            			<div class="modal-body">
                		<!-- Display service details here -->
                			<p><strong>Item Code:</strong> <span id="viewitemCode"></span></p>
                			<p><strong>Material Type:</strong> <span id="viewname"></span></p>
                			<!-- Add more fields as needed -->
            			</div>
            			<div class="modal-footer">
                			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            			</div>
        			</div>
    			</div>
			</div>

			<!-- Edit Service Modal -->
			<div class="modal fade" id="editstockitem" tabindex="-1" role="dialog" aria-labelledby="editServiceModalLabel" aria-hidden="true">
    			<div class="modal-dialog" role="document">
        			<div class="modal-content">
            			<div class="modal-header">
                			<h5 class="modal-title" id="editServiceModalLabel">Edit Stock Item</h5>
                			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    			<span aria-hidden="true">&times;</span>
                			</button>
            			</div>
            		<div class="modal-body">
                	<!-- Edit service form fields go here -->
					<form id="editstockform" method="POST" action="stockitem.php">

    					<input type="hidden" id="edititemCode" name="edititemCode" value="">
    					<div class="form-group">
        					<label for="editStockName">Material Type</label>
       				 		<input type="text" class="form-control" id="editStockName" name="editStockName">
    					</div>

    					<div class="form-group">
        					<label for="editStockCost">Cost</label>
        					<input type="text" class="form-control" id="editStockCost" name="editStockCost">
						</div>

						<div class="form-group">
        					<label for="editStockCost">Selling Price</label>
        					<input type="text" class="form-control" id="editStockCost" name="editStockCost">
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
    			function viewstockitem(itemCode, name) {
        		// Set the data in the modal
        		document.getElementById("viewitemCode").textContent = itemCode;
        		document.getElementById("viewname").textContent = name;
        
       			 // Open the modal
        		$('#view').modal('show');
    			}
			</script>


			<!--edit function-->
			<script>
    			function editstockitem(itemCode, name, stock, cost, sellingPrice) {
        		// Populate the edit modal form fields with the data from the selected row
        		document.getElementById("edititemCode").value = itemCode;
        		document.getElementById("editname").value = name;
				
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

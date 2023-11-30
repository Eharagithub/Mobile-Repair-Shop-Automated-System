<?php session_start(); ?>
<?php

if (isset($_REQUEST["createJobDelivary"])) {
	$jobid = $_POST['jid'];
	$deliid = $_POST['did'];
	$date = date("Y-m-d H:i:s");
	$locFromid = $_POST['from'];
	$locToid = $_POST['to'];
	$note = $_POST['des'];

	print_r($_REQUEST);
	/*$repassword= $_POST['repassword'];*/

	//database connection
	$conn = new mysqli('localhost', 'root', '', 'mobileshopdb');
	if ($conn->connect_error) {
		die('Connection Failed : ' . $conn->connect_error);
	} else {
		$stmt = $conn->prepare("INSERT INTO jobdelivery(id,jobid,deliid,date,locFromid,locToid,note)values(NULL,?,?,?,?,?,?)");
		$stmt->bind_param("iisiis", $jobid, $deliid, $date, $locFromid, $locToid,$note);
		$stmt->execute();
		echo "Your Registration is Successfully..";


		$stmt->close();
	}
}

function getAllFromTableAsOption($name, $value, $html)
{
	$conn = mysqli_connect('localhost', 'root', '', 'mobileshopdb');
	$sql = "select * from " . $name;
	$result = mysqli_query($conn, $sql);

	while ($row = mysqli_fetch_array($result)) {
		echo "<option value='" . $row[$value] . "'>" . $row[$html] . "</option>";
	}
	mysqli_close($conn);
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
								<h4><i class="micon fa fa-truck"></i>Delivery Details</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Delevery Details </li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
						<?php if ($_SESSION["systemUserType"] == "BR") { ?>
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




				function getAlldelivery()
				{
					global $data;
					$sql = "select * from jobdelivery";
					$result = mysqli_query($data, $sql);
					

					while ($row = mysqli_fetch_array($result)) {

						$sqllocFromName = "select * from location where locid = " . $row["locFromId"];
						$locFromName = mysqli_query($data, $sqllocFromName);
						$locFromNameRow = mysqli_fetch_array($locFromName);
						
						$sqllocToName = "select * from location where locid = " . $row["locToId"];
						$locToName = mysqli_query($data, $sqllocToName);
						$locToNameRow = mysqli_fetch_array($locToName);

						echo "<tr>" .
							"<td>" . $row["id"] . "</td>";
						echo "<td>" . $row["jobid"] . "</td>";
						echo "<td>" . $row["deliid"] . "</td>";
						echo "<td>" . $row["date"] . "</td>";
						echo "<td>" . $locFromNameRow["lname"] . "</td>";
						echo "<td>" . $locToNameRow["lname"] . "</td>";
						echo "<td>" . $row["note"] . "</td>";
						echo 	'<td>';
						echo 		'<div class="dropdown" onclick="setSelectedCourier('.$row["id"].')';
							echo 			'<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#.php?id=<?php echo $row[\'nic\']; ?>" role="button" data-toggle="dropdown">';
							echo 				'<i class="dw dw-more"></i>';
							echo 			'</a>';
											//Drop down for view the row
							echo 			'<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">';
							echo 				'<a class="dropdown-item" href="#" onclick="viewCourierservice(\'' . $row['id'] . '\', \'' . $row['locToId'] . '\', \'' . $row['locFromId'] . '\')">
													<i class="dw dw-eye"></i> View </a>';
											//Drop down for edit the row		
							//echo 		        '<a class="dropdown-item" href="#" onclick="editCustomer(\'' . $row['nic'] . '\', \'' . $row['name'] . '\', \'' . $row['address'] . '\', \'' . $row['phone1'] . '\')">
								//					<i class="dw dw-edit"></i> Edit</a>';
											//Drop down for delete the row
							//echo 				'<a class="dropdown-item delete-service" href="#" data-service-id="' . $row['id'] . '">
													//<i class="dw dw-delete-3"></i> Delete</a>';
						  
					
							echo 			'</div>';
		 							
							echo"</tr>";
					}
					function deleteClientById()
					{
						global $conn;
						global $selectedCientId;
						$sql = "delete from customer where nic = '" . $selectedCientId . "'";
						mysqli_query($conn, $sql);
					}

					function setSelectedCustomer($nic)
					{
						global $selectedCientId;
						$selectedCientId = $nic;
					}
				}




				?>

				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Courier Details List</h4>
					</div>
					<div class="pb-20">
						<table class="data-table table responsive">
							<thead>
								<tr>
									<th>Id</th>
									<th>JOB ID</th>
									<th>Delivery ID</th>
									<th>Date</th>
									<th>From</th>
									<th>To</th>
                                    <th>Notes</th>
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

									<h2 class="text-center text-primary">Courier Details List</h2>
								</div>
								<form action="" target="" method="POST" onsubmit="return checkpassword ()">

									<div class="col-sm-6">
										<div class="form-group">
											<label>Location To</label>
											<select name="from" class="selectpicker form-control form-control-lg" data-style="btn-outline-secondary btn-lg" title="Not Chosen">
											<?php getAllFromTableAsOption("location", "locid", "lname"); ?>	
											
											</select>
										</div>
									</div>
   
									<div class="col-sm-6">
										<div class="form-group">
											<label>Location From</label>
											<select name="to" class="selectlpicker form-control form-control-lg" data-style="btn-outline-secondary btn-lg" title="Not Chosen">
											<option value="<?php echo $_SESSION["systemUserLocId"]; ?>"><?php echo $_SESSION["systemUserLocName"]; ?></option> ;
											</select>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Job ID</label>
											<select name="jid" class="selectpicker form-control form-control-lg" data-style="btn-outline-secondary btn-lg" title="Not Chosen">
												<?php getAllFromTableAsOption("job", "id", "id"); ?>
											</select>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Delivery Id</label>
											<select name="did" class="selectpicker form-control form-control-lg" data-style="btn-outline-secondary btn-lg" title="Not Chosen">
												<?php getAllFromTableAsOption("delivery", "empNo", "dname"); ?>
											</select>
										</div>
									</div>
									<div class="col-md-12 col-sm-12">
										<div class="form-group">
											<label>Description</label>
											<textarea name="des" class="form-control form-control-lg"></textarea>
										</div>
									</div>

									<div class="col-md-12 col-sm-12">
										<div class="form-group">
											<input type="submit" class="btn btn-primary" value="Submit" name="createJobDelivary">
											<input type="reset" class="btn btn-danger" value="Cancel" data-backdrop="static" data-toggle="modal" data-target="#add_technician">
										</div>
									</div>
							</div>
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
                			<p><strong>ID:</strong> <span id="viewId"></span></p>
                			<p><strong>Location From:</strong> <span id="viewLocatinFrom"></span></p>
							<p><strong>Location To:</strong> <span id="viewLocatinTo"></span></p>
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
    			function viewCourierservice(id, locFromId, locToId) {
        		// Set the data in the modal
        		document.getElementById("viewId").textContent = id;
        		document.getElementById("viewLocatinFrom").textContent = locFromId;
				document.getElementById("viewLocatinTo").textContent = locToId;
        
       			 // Open the modal
        		$('#view').modal('show');
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
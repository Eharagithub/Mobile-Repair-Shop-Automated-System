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
								<h4><i class="micon dw dw-shopping-basket mtext"></i> List of Inquiries</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Inquiries</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Inquiries</h4>
					</div>
					<div class="pb-20">
						<table class="data-table table responsive">
							<thead>
							<tr>
						<th>#</th>
						<th>Inquirer</th>
						<th>Email</th>
						<th>Message</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				
							</thead>
							<tbody>
							<tr>
							<td class="text-center"> ?></td>
							<td> </td>
							<td></td>
							<td </td>
							<td class="text-center">
								
									<span class="badge badge-pill badge-success">Read</span>
								
								<span class="badge badge-pill badge-primary">Unread</span>
								
							</td>
							<td align="center">
								 <button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
				                  		Action
				                    <span class="sr-only">Toggle Dropdown</span>
				                  </button>
				                  <div class="dropdown-menu" role="menu">
				                    <a class="dropdown-item view_details" href="javascript:void(0)" data-id=""><span class="fa fa-eye text-dark"></span> View</a>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item delete_data" href="javascript:void(0)" data-id=""><span class="fa fa-trash text-danger"></span> Delete</a>
				                  </div>
							</td>
						</tr>
							
						</table>
					</div>
				</div>
				<!-- Simple Datatable End -->
		</div>
	</div>
	<!-- Add Work orerd Modal -->
					<div class="col-md-12 col-sm-12 mb-30">
							<div class="modal fade" id="add_technician" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-lg modal-dialog-centered">
									<div class="modal-content">
										<div class=" border-radius-10">
											<div class="login-title"><br>
												<div class="col-md-12 col-sm-12 mb-30">
												<h2 class="text-center text-primary">Add Work Order</h2>
												</div>
											<form>

												<div class="input-group custom">
												<div class="col-md-4 col-sm-12">
													<div class="form-group">
																<label>Work Order Code</label>
																<input class="form-control form-control-lg" type="text">
															</div>
												</div>
												<div class="col-md-4 col-sm-12">
													<div class="form-group">
																<label>Request Date</label>
																<input class="form-control form-control-lg" type="date">
															</div>
												</div>
												<div class="col-md-4 col-sm-12">
													<div class="form-group">
																<label>Estimated Date completion</label>
																<input class="form-control form-control-lg" type="date">
															</div>
												</div>
												<div class="col-md-4 col-sm-12">
															<div class="form-group">
																<label>Service</label>
																<select class="selectpicker form-control form-control-lg" data-style="btn-outline-secondary btn-lg" title="Not Chosen">
																	<option>Service 1</option>
																	<option>Service 2</option>
																	<option>Service 3</option>
																</select>
															</div>
												</div>
												<div class="col-md-4 col-sm-12">
															<div class="form-group">
																<label>Customer</label>
																<select class="selectpicker form-control form-control-lg" data-style="btn-outline-secondary btn-lg" title="Not Chosen">
																	<option>John Doe</option>
																	<option>Juan Dela Cruz</option>
																	<option>Jane Doe</option>
																</select>
															</div>
												</div>
												<div class="col-md-4 col-sm-12">
															<div class="form-group">
																<label>Technician</label>
																<select class="selectpicker form-control form-control-lg" data-style="btn-outline-secondary btn-lg" title="Not Chosen">
																	<option>John Doe</option>
																	<option>Juan Dela Cruz</option>
																	<option>Jane Doe</option>
																</select>
															</div>
												</div>
												<div class="col-md-12 col-sm-12">
													<div class="form-group">
																<label>Amount</label>
																<input class="form-control form-control-lg" type="number">
															</div>
												</div>
												<div class="col-md-12 col-sm-12">
													<div class="form-group">
																<input type="submit" class="btn btn-primary" value="Submit">
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
											<p>Are you sure you want to delete this Work Order?</p>
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
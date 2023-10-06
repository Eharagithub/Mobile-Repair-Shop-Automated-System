
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
								<h4><i class="micon fa fa-cogs">  </i>Repair List</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Repair List</li>
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
				<!-- Simple Datatable start -->
				
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Repair List</h4>
					</div>
					<div class="pb-20">
						<table class="data-table table responsive">
							<thead>
							<tr>
							<th>#</th>
						<th>Date Created</th>
						<th>Code</th>
						<th>Client</th>
						<th>Status</th>
						<th>Action</th>
						</tr>
								
							</thead>
							<tbody>
							
						</tbody>

						</table>
					</div>
				</div>
				<!-- Simple Datatable End -->
		</div>
	</div>
<div class="col-md-12 col-sm-12 mb-30">
<div class="modal fade" id="add_technician" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">					 
<div class="content py-3">
    <div class="container-fluid">
        <div class="card card-outline card-info rounded-0 shadow">
            <div class="card-header rounded-0">
                <h4 class="card-title">Add New Repair</h4>
            </div>
            <div class="card-body rounded-0">
                <div class="container-fluid">
                    <form action="" id="entry-form">
                        <input type="hidden" name="id" value="">
                        <fieldset>
                            <div class="row">
                                <div class="form-group col-md-8">
                                   <select name="client_id" id="client_id" class="form-control form-control-sm form-control-border select2" data-placeholder="Please Select Client Here">
                                       <option value="" disabled ></option>
                                      
                                   </select>
                                    <small class="text-muted px-4">Client Name</small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <fieldset>
                                        <legend class="text-muted border-bottom">Services</legend>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                <select  id="service" class="form-control form-control-sm form-control-border select2" data-placeholder="Please Select Service Here">
                                            <option value="" disabled selected></option> </select>
                                                <small class="text-muted px-4">Service</small>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" id="cost" class="form-control form-control-sm form-control-border text-right" value="0.00" disabled>
                                                <small class="text-muted px-4">Fee</small>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <button class="btn btn-flat btn-primary btn-sm" type="button" id="add_service"><i class="fa fa-plus"></i> Add to List</button>
                                            </div>
                                        </div>
                                        <table class="table table-stripped table-bordered" data-placeholder='true' id="service_list">
                                            <colgroup>
                                                <col width="10%">
                                                <col width="65%">
                                                <col width="25%">
                                            </colgroup>
                                            <thead>
                                                <tr class='bg-gradient-dark text-light'>
                                                    <th class="text-center py-1"></th>
                                                    <th class="text-center py-1">Service</th>
                                                    <th class="text-center py-1">Fee</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </fieldset>
                                </div>
                                <div class="col-md-6">
                                    <fieldset>
                                        <legend class="text-muted border-bottom">Materials</legend>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                <input type="text" id="material" class="form-control form-control-sm form-control-border">
                                                <small class="text-muted px-4">Material Name</small>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="number" step="any" id="mcost" class="form-control form-control-sm form-control-border text-right" value="0.00">
                                                <small class="text-muted px-4">Cost</small>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <button class="btn btn-flat btn-primary btn-sm" type="button" id="add_material"><i class="fa fa-plus"></i> Add to List</button>
                                            </div>
                                        </div>
                                        <table class="table table-stripped table-bordered" data-placeholder='true' id="material_list">
                                            <colgroup>
                                                <col width="10%">
                                                <col width="65%">
                                                <col width="25%">
                                            </colgroup>
                                            <thead>
                                                <tr class='bg-gradient-dark text-light'>
                                                    <th class="text-center py-1"></th>
                                                    <th class="text-center py-1">Material Name</th>
                                                    <th class="text-center py-1">Cost</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="form-group col-md-12">
                                    <input type="hidden" name="total_amount" value="0">
                                    <h3><b>Total Payable Amount: <span id="total_amount" class="pl-3">0.00</span></b></h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-8 col-lg-7">
                                <small class="text-muted px-4">Remarks</small>
                                    <textarea name="remarks" id="remarks" rows="3" class="form-control form-control-sm rounded-0"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <select name="payment_status" id="payment_status" class="form-control form-control-sm form-control-border" required>
                                        <option value="0" >Unpaid</option>
                                        <option value="1" >Paid</option>
                                    </select>
                                    <small class="text-muted px-4">Payment Status</small>
                                </div>
                                <div class="form-group col-md-4">
                                    <select name="status" id="status" class="form-control form-control-sm form-control-border" required>
                                        <option value="0" >Pending</option>
                                        <option value="1" >Approved</option>
                                        <option value="2" >In-progress</option>
                                        <option value="3" >Checking</option>
                                        <option value="4" >Done</option>
                                        <option value="5" >Cancelled</option>
                                    </select>
                                    <small class="text-muted px-4">Status</small>
                                </div>
                            </div>
                        </fieldset>
                        
                        <hr class="bg-navy">
                        <center>
                            <button class="btn btn-sm bg-primary btn-flat mx-2 col-3">Save</button>
                            
                            <button  class="btn btn-sm btn-light border btn-flat mx-2 col-3">Cancel</a>
                            
                               
                           
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="content py-3">
    <div class="card card-outline card-dark rounded-0">
        <div class="card-header rounded-0">
            <h5 class="card-title text-primary">Repair Details</h5>
        </div>
        <div class="card-body">
            <div class="container-fluid">
                <div id="outprint">
                    <fieldset>
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-bordered border-info">
                                    <colgroup>
                                        <col width="30%">
                                        <col width="70%">
                                    </colgroup>
                                    <tr>
                                        <th class="text-muted text-white bg-gradient-dark px-2 py-1">Code</th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th class="text-muted text-white bg-gradient-dark px-2 py-1">Client Name</th>
                                        <td></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                                <div class="col-md-6">
                                    <fieldset>
                                        <legend class="text-muted border-bottom">Services</legend>
                                        <table class="table table-stripped table-bordered" data-placeholder='true' id="service_list">
                                            <colgroup>
                                                <col width="70%">
                                                <col width="30%">
                                            </colgroup>
                                            <thead>
                                                <tr class='bg-gradient-dark text-light'>
                                                    <th class="text-center py-1">Service</th>
                                                    <th class="text-center py-1">Fee</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               
                                                    <tr>
                                                        <td class="py-1 px-2"></td>
                                                        <td class="py-1 px-2 text-right"></td>
                                                    </tr>
                                               
                                            </tbody>
                                        </table>
                                    </fieldset>
                                </div>
                                <div class="col-md-6">
                                    <fieldset>
                                        <legend class="text-muted border-bottom">Materials</legend>
                                        <table class="table table-stripped table-bordered" data-placeholder='true' id="material_list">
                                            <colgroup>
                                                <col width="70%">
                                                <col width="30%">
                                            </colgroup>
                                            <thead>
                                                <tr class='bg-gradient-dark text-light'>
                                                    <th class="text-center py-1">Material Name</th>
                                                    <th class="text-center py-1">Cost</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               
                                                    <tr>
                                                        <td class="py-1 px-2"></td>
                                                        <td class="py-1 px-2 text-right"></td>
                                                    </tr>
                                               
                                            </tbody>
                                        </table>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="form-group col-md-12">
                                    <h3><b>Total Payable Amount: <span id="total_amount" class="pl-3"></span></b></h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <small class="text-muted px-2">Remarks</small><br>
                                    <p></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <small class="text-muted px-2">Payment Status</small><br>
                                   
                                        <span class="rounded-pill badge badge-success ml-4">Paid</span>
                                 
                                        <span class="rounded-pill badge badge-dark bg-gradiend-dark ml-4">Unpaid</span>
                                   
                                </div>
                                <div class="form-group col-md-4">
                                    <small class="text-muted px-2">Status</small><br>
                                   
                                </div>
                            </div>
                    </fieldset>
                </div>
                
                <hr>
                <div class="rounded-0 text-center mt-3">
                        <a class="btn btn-sm btn-primary btn-flat" href="./?page=repairs/manage_repair&id="><i class="fa fa-edit"></i> Edit</a>
                        <button class="btn btn-sm btn-danger btn-flat" type="button" id="delete_data"><i class="fa fa-trash"></i> Delete</button>
                        <a class="btn btn-light border btn-flat btn-sm" href="./?page=repairs" ><i class="fa fa-angle-left"></i> Back to List</a>
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
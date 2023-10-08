<?php
$customer_list=[];
$service_list = [];
$material_list = [];


//made database connection
$host = "localhost";
$user = "root";
$password = "";
$db = "mobileshopdb";

$data = mysqli_connect($host, $user, $password, $db);

if ($data === false) {
    die("connection error");
}
$sql = "SELECT * FROM customer";
$result = mysqli_query($data, $sql);
$customer_list = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sql = "SELECT * FROM services";
$result = mysqli_query($data, $sql);
$service_list = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sql = "SELECT * FROM item";
$result = mysqli_query($data, $sql);
$material_list = mysqli_fetch_all($result, MYSQLI_ASSOC);


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
    <?php include_once("../Common/drower.php"); ?><!--header-->

    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4><i class="micon fa fa-cogs"> </i>Repair List</h4>
                              <!-- <pre>
                                    <?php print_r($customer_list); ?>
                                </pre>-->
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
        <!--invoice creation starts-->
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
                                    <form action="#" id="entry-form">
                                        <fieldset>
                                            <div class="row">
                                                <div class="form-group col-md-8">
                                                    <select name="customer_id" id="cutomer_id" class="form-control form-control-sm form-control-border select2" data-placeholder="Please Select Client Here">
                                                         <?php
                                                            foreach ($customer_list as $customer) {
                                                                 echo '<option value="' . $customer["nic"] . '" selected>' . $customer["name"] . '</option>';
                                                            }
                                                        ?>
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
                                                                <select id="service" class="form-control form-control-sm form-control-border select2" data-placeholder="Please Select Service Here">
                                                                    <?php
                                                                    foreach ($service_list as $service) {
                                                                        echo '<option value="' . $service["sid"] . '" selected>' . $service["service"] . '</option>';
                                                                    }
                                                                    ?>

                                                                </select>
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
                                                    <fieldset style="padding:0%;">
                                                        <legend class="text-muted border-bottom" >Materials</legend>
                                                        <div class="row">
                                                        <div class="form-row">
                                                            <div class="form-row">
                                                                <div class="form-group col-md-7">
                                                                    <select id="material" class="form-control form-control-sm form-control-border select2" data-placeholder="Please Select Service Here">
                                                                    <?php
                                                                    foreach ($material_list as $item) {
                                                                        echo '<option value="' . $item["itemCode"] . '" selected>' . $item["name"] . '</option>';
                                                                    }
                                                                    ?>
                                                                    </select>
                                                                    <small class="text-muted">  Materials</small>
                                                                </div>

                                                                <div class="form-group col-md-3">
                                                                    <input type="text" id="mcost" class="form-control form-control-sm form-control-border text-right" value="0" style="padding: 10px;" disabled>
                                                                    <small class="text-muted">Quantity</small>
                                                                </div>

                                                                <div class="form-group col-md-2">
                                                                    <input type="text" id="mcost" class="form-control form-control-sm form-control-border text-right" value="0.00" disabled>
                                                                    <small class="text-muted">Fee</small>
                                                                </div>
                                                            </div>
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
                                                                    <th class="text-center py-1">Service</th>
                                                                    <th class="text-center py-1">Fee</th>
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
                                                        <option value="0">Unpaid</option>
                                                        <option value="1">Paid</option>
                                                    </select>
                                                    <small class="text-muted px-4">Payment Status</small>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <select name="status" id="status" class="form-control form-control-sm form-control-border" required>
                                                        <option value="0">Pending</option>
                                                        <option value="1">Approved</option>
                                                        <option value="2">In-progress</option>
                                                        <option value="3">Checking</option>
                                                        <option value="4">Done</option>
                                                        <option value="5">Cancelled</option>
                                                    </select>
                                                    <small class="text-muted px-4">Status</small>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <hr class="bg-navy">
                                        <center>
                                            <button class="btn btn-sm bg-primary btn-flat mx-2 col-3">Save</button>

                                            <button class="btn btn-sm btn-light border btn-flat mx-2 col-3">Cancel</a>



                                        </center>
                                    </form>
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
                    function removeService(id) {
                        $("#service-" + id).remove();
                        calc_total();
                    }

                    function removeMaterial(id) {
                        $("#material-" + id).remove();
                        calc_total();
                    }



                    function calc_total() {
                        var total = 0;
                        $("#service_list tbody tr").each(function() {
                            var feeText = $(this).find("td:last").text().trim();
                            // Remove commas and parse as a float
                            var fee = parseFloat(feeText.replace(/,/g, ""));
                            // Add to the total
                            total += fee;
                        });
                        $("#material_list tbody tr").each(function() {
                            var feeText = $(this).find("td:last").text().trim();
                            // Remove commas and parse as a float
                            var fee = parseFloat(feeText.replace(/,/g, ""));
                            // Add to the total
                            total += fee;
                        });
                        $('#total_amount').text(parseFloat(total).toLocaleString('en-US', {
                            style: "decimal",
                            maximumFractionDigits: 2,
                            minimumFractionDigits: 2
                        }))
                        $('input[name="total_amount"]').val(parseFloat(total))
                    }

                    function add_service(id, name, fee = '') {

                        var tr = $('<tr id="service-' + id + '">')
                        tr.append('<td class="px-2 py-1 text-center"><button class="btn btn-remove btn-rounded btn-sm btn-danger" onclick="removeService(' + id + ')"><i class="fa fa-trash"></i></button></td>')
                        tr.attr('data-id', id)
                        tr.append("<td class='px-2 py-1'>" + name + "</td>")

                        var service_list = <?php echo json_encode($service_list); ?>;
                        var service = service_list.find(e => e['sid'] == id)
                        fee = service["cost"];
                        tr.append("<td class='px-2 py-1 text-right'>" + (parseFloat(fee).toLocaleString('en-US', {
                            style: 'decimal',
                            maximumFractionFigits: 2,
                            minimumFractionDigits: 2
                        })) + "</td>")


                        $('#service_list tbody').append(tr)
                        calc_total()

                    }

                    function add_material(id, cost) {
                        var tr = $('<tr id="material-' + id + '">')
                        tr.append('<td class="px-2 py-1 text-center"><button class="btn btn-remove btn-rounded btn-sm btn-danger" onclick="removeMaterial(' + id + ')"><i class="fa fa-trash"></i></button></td>')
                        tr.attr('data-id', id)
                        tr.append("<td class='px-2 py-1'>" + id + "</td>")

                        var material_list = <?php echo json_encode($material_list); ?>;
                        var material = material_list.find(e => e['itemCode'] == id)
                        fee = material["sellingPrice"];


                        tr.append("<td class='px-2 py-1 text-right'>" + (parseFloat(fee).toLocaleString('en-US', {
                            style: 'decimal',
                            maximumFractionFigits: 2,
                            minimumFractionDigits: 2
                        })) + "</td>")
                        $('#material_list tbody').append(tr)
                        calc_total()
                    }

                    $(function() {
                        $('#add_service').click(function() {
                            var id = $('#service').val()
                            var service = "Service"
                            if ($('#service_list tbody tr[data-id="' + id + '"]').length > 0) {
                                alert(" Service already listed.", 'warning')
                                return false;
                            }
                            add_service(id, service)

                        })
                        $('#add_material').click(function() {
                            var id = $('#material').val()
                            var cost = $('#mcost').val()

                            if ($('#material_list tbody tr[data-id="' + id + '"]').length > 0) {
                                alert("Material already listed.", 'warning')
                                return false;
                            }
                            add_material(id, cost)
                        })
                    })
                </script>
</body>

</html>
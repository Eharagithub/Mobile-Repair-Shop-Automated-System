<?php session_start(); ?>
<?php
$invoice=[];
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
$sql = "SELECT invoiceNo FROM invoice";
$result = mysqli_query($data, $sql);
$invoice = mysqli_fetch_all($result, MYSQLI_ASSOC);

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
        <div class="pd-ltr-20 xs-pd-20-10"> <!-- This div element has two classes applied to it for styling: "pd-ltr-20" and "xs-pd-20-10" -->
            <div class="min-height-200px"> <!-- This div element has a minimum height of 200 pixels. -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12"> <!-- This div element is a responsive column with a width of 6 columns on medium screens (col-md-6) and 12 columns on small screens (col-sm-12). -->
                            <div class="title">
                                <h4><i class="micon fa fa-cogs"> </i>Repair List</h4> <!--icon for Rpair List-->
                              <!-- <pre>
                                    <?php print_r($customer_list); ?>
                                </pre>-->
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Repair List</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-md-6 col-sm-12 text-right"> <!-- This div is a responsive column with a width of 6 columns on medium screens (col-md-6) and 12 columns on small screens (col-sm-12). The content is aligned to the right (text-right). Inside this column, there is a dropdown element. -->
                            <div class="dropdown">

                                <!-- This anchor element serves as a button with a primary style (btn-primary). It triggers a modal (popup)
                                 with the id "add_technician" and prevents the modal from being closed when clicking outside it (data-backdrop="static"). -->
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
                        <h4 class="text-blue h4">Repair List</h4> <!-- H4 with blue color text-->
                    </div>
                    <div class="pb-20">
                        <table class="data-table table responsive">
                            <thead>
                                <tr>
                                    <th>No:</th>
                                    <th>Customer Name</th>
                                    <th>Amount</th>
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
                                <!-- Add an empty input field for invoice number with a readonly attribute -->
                                <input type="text" id="invoiceNo" readonly>

                                <h4 class="card-title">Add New Repair</h4>
                            </div>
                            <form action="" target="" method="POST" onsubmit="return checkpassword ()">
                            
                            <div class="card-body rounded-0">
                                <div class="container-fluid">
                                    <form action="#" id="entry-form">
                                        <fieldset>

                                            <!--Client list-->
                                            <div class="row">
                                                <div class="form-group col-md-8">
                                                    <select name="customer_id" id="cutomer_id" class="form-control form-control-sm form-control-border select2" data-placeholder="Please Select Client Here">
                                                        
                                                        <?php
                                                          // Loop through the $customer_list array and create an <option> element for each customer.
                                                            foreach ($customer_list as $customer) {
                                                                 echo '<option value="' . $customer["nic"] . '" selected>' . $customer["name"] . '</option>';
                                                            }
                                                        ?>
                                                        
                                                    </select>
                                                    <small class="text-muted px-4">Client Name</small>
                                                </div>
                                            </div>

                                            <!--Services list-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <fieldset>
                                                        <legend class="text-muted border-bottom">Services</legend>
                                                        <div class="row">
                                                            <div class="form-group col-md-9">
                                                                <select id="service" class="form-control form-control-sm form-control-border select2" data-placeholder="Please Select Service Here">
                                                                    
                                                                    <?php
                                                                     // Loop through the $Service_list array and create an <option> element for each service.
                                                                    foreach ($service_list as $service) {
                                                                        echo '<option value="' . $service["sid"] . '" selected>' . $service["service"] . '</option>';
                                                                    }
                                                                    ?>

                                                                </select>
                                                                <small class="text-muted px-4">Service</small>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <!--The amount of the service-->
                                                                <input type="text" id="cost" class="form-control form-control-sm form-control-border text-right" value="0.00" disabled>
                                                                <small class="text-muted px-4">Fee</small>
                                                            </div>
                                                        </div>
                                                        <!--add services to the list in invoice-->
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
                                                                    <th class="text-center py-1" style="color: black;">Service</th>
                                                                    <th class="text-center py-1" style="color: black;">Fee</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody></tbody>
                                                        </table>
                                                    </fieldset>
                                                </div>

                                                <!--material list-->
                                                <div class="col-md-6">
                                                    <fieldset style="padding:0%;">
                                                        <legend class="text-muted border-bottom" >Materials</legend>
                                                        <div class="row">
                                                        <div class="form-row">
                                                            <div class="form-row">
                                                                <div class="form-group col-md-7">
                                                                    <select id="material" class="form-control form-control-sm form-control-border select2" data-placeholder="Please Select Service Here">
                                                                    
                                                                    <?php
                                                                    // Loop through the $material_list array and create an <option> element for each item.
                                                                    foreach ($material_list as $item) {
                                                                        echo '<option value="' . $item["itemCode"] . '" selected>' . $item["name"] . '</option>';
                                                                    }
                                                                    ?>

                                                                    </select>
                                                                    <small class="text-muted px-4">  Materials</small>
                                                                </div>

                                                                <div class="form-group col-md-3">
                                                                     <!--The quantity of items used-->
                                                                    <input type="text" id="unit" class="form-control form-control-sm form-control-border text-right" value="0" style="padding: 10px;" >
                                                                    <small class="text-muted px-4">Quantity</small>
                                                                </div>

                                                                <div class="form-group col-md-2">
                                                                     <!--The amount of the items-->
                                                                    <input type="text" id="price" class="form-control form-control-sm form-control-border text-right" value="0.00" style="padding: 10px;" disabled>
                                                                    <small class="text-muted px-4">Price</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        <!--add materials to the list in invoice-->
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
                                                                <col width="25%">
                                                                
                                                            </colgroup>
                                                            <thead>
                                                                <tr class='bg-gradient-dark text-light'>
                                                                    <th class="text-center py-1"></th>
                                                                    <th class="text-center py-1" style="color: black;">Material</th>
                                                                    <th class="text-center py-1" style="color: black;">Quantity</th>
                                                                    <th class="text-center py-1" style="color: black;">Cost</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>
                                                        </table>
                                                    </fieldset>
                                                </div>
                                            </div>

                                            <!--total payment-->
                                            <div class="row mt-3">
                                                <div class="form-group col-md-12">
                                                    <input type="hidden" name="total_amount" value="0">
                                                    <h3><b>Total Payable Amount: <span id="total_amount" class="pl-3">0.00</span></b></h3>
                                                </div>
                                            </div>

                                            <!--remarks-->
                                            <div class="row">
                                                <div class="form-group col-sm-12 col-md-8 col-lg-7">
                                                    <small class="text-muted px-4">Remarks</small>
                                                    <textarea name="remarks" id="remarks" rows="3" class="form-control form-control-sm rounded-0"></textarea>
                                                </div>
                                            </div>

                                            <!--payment status-->
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

                                        <!--buttond-->
                                        <center>
                                        <div class="col-md-12 col-sm-12">
											<div class="form-group">
												<input type="submit" class="btn btn-primary" value="Submit" name="createService">
												<input type="reset" class="btn btn-danger" value="Cancel" data-backdrop="static" data-toggle="modal" data-target="#add_technician">
											</div>
										</div>
                                     
                                        </center>
                                    </form>
                                </div>
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
                        // Remove the element with the ID "service-{id}" from the DOM.
                        $("#service-" + id).remove();
                        // Calculate the total (presumably for a list of services) after removal.
                        calc_total();
                    }

                    function removeMaterial(id) {
                         // Remove the element with the ID "material-{itemCode}" from the DOM.
                        $("#material-" + id).remove();
                         // Calculate the total (presumably for a list of materials) after removal.
                        calc_total();
                    }


                    //calculate the total payble amount
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

                    //fee will display when service drop down selected
                    $(function() {
                        // Attach an event listener to the service dropdown
                        $('#service').change(function() {
                            var id = $(this).val();
                            var serviceName = $('#service option:selected').text();

                            if (id && serviceName) {
                                var service_list = <?php echo json_encode($service_list); ?>;
                                var service = service_list.find(e => e['sid'] == id);
                                var fee = service["cost"];

                                // Update the "Fee" input field with the selected service's fee
                                $('#cost').val(fee);
                            }
                        });
                    });

                    //add services
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
                            maximumFractionDigits: 2,
                            minimumFractionDigits: 2
                        })) + "</td>")

                        $('#service_list tbody').append(tr)
                        calc_total()

                    }
                    

                    // Add an event listener to the "unit" input field for quantity changes.
                        $('#unit').on('input', function() {
                            updateMaterialPrice();
                        });
         
                    // Function to update the material price based on quantity.
                        function updateMaterialPrice() {
                            var id = $('#material').val();
                            var material_list = <?php echo json_encode($material_list); ?>;
                            var selectedMaterial = material_list.find(e => e['itemCode'] == id);
                            var quantity = parseFloat($('#unit').val());

                            if (selectedMaterial && !isNaN(quantity)) {
                                var price = selectedMaterial["sellingPrice"];
                                var totalPrice = price * quantity;

                                // Update the "Price" input field with the calculated total price.
                                $('#price').val(totalPrice);
                            } else {
                                // If the selected material is not found or the quantity is not a number, clear the price input field.
                                $('#price').val('');
                            }
                        }

                    // Attach the "updateMaterialPrice" function to the "unit" input field on page load.
                        $(function() {
                            updateMaterialPrice();
                        });

                    // Add an event listener to the "material" dropdown for material changes.
                        $(function() {
                            $('#material').change(function() {
                                updateMaterialPrice();
                            });
                        });

                   
                    //added materials
                    function add_material(id,name, cost='') {
                        var unit = parseFloat($('#unit').val()); // Get the quantity entered by the user.

                            if (isNaN(unit) || unit <= 0) {
                                alert('Please enter a valid quantity greater than 0.');
                                return;
                            }
                        // Create a new row for the material in the material list table.
                        var tr = $('<tr id="material-' + id + '">')
                        // Add a button to remove the material from the list.
                        tr.append('<td class="px-2 py-1 text-center"><button class="btn btn-remove btn-rounded btn-sm btn-danger" onclick="removeMaterial(' + id + ')"><i class="fa fa-trash"></i></button></td>')
                        // Set the data-id attribute to the material's ID.
                        tr.attr('data-id', id)
                        // Add the material name to the row.
                        tr.append("<td class='px-2 py-1'>" + name + "</td>")

                        var material_list = <?php echo json_encode($material_list); ?>;
                        var material = material_list.find(e => e['itemCode'] == id)
                       
                        // Calculate the material price based on the quantity (unit).
                        var unit = parseFloat($('#unit').val());
                        var price = material["sellingPrice"] * unit;

                         // Add the quantity and calculated price to the row and format it.
                        tr.append("<td class='px-2 py-1'>" + unit + "</td>");
                         // Add the calculated price to the row and format it.
                        tr.append("<td class='px-2 py-1 text-right'>" + (parseFloat(price).toLocaleString('en-US', {
                            style: 'decimal',
                            maximumFractionFigits: 2,
                            minimumFractionDigits: 2
                        })) + "</td>");

                        // Append the row to the material list table.
                        $('#material_list tbody').append(tr)
                          // Calculate the total amount after adding the material.
                        calc_total()
                        updateMaterialPrice();
                    }


                    $(function() {
                        //Add services
                        $('#add_service').click(function() {
                            var id = $('#service').val();
                            var serviceName = $('#service option:selected').text(); // Get the selected option's text (service name)
                            
                            if ($('#service_list tbody tr[data-id="' + id + '"]').length > 0) {
                                alert("Service already listed.", 'warning');
                                return false;
                            }
                            
                            add_service(id, serviceName); // Add the service name to the list
                        });

                        //Add materials
                        $('#add_material').click(function() {
                            var id = $('#material').val();
                            var name = $('#material option:selected').text(); // Get the selected option's text (material name)
                            //var cost = $('#mcost').val();

                            if ($('#material_list tbody tr[data-id="' + id + '"]').length > 0) {
                                alert("Material already listed.", 'warning');
                                return false;
                            }

                            add_material(id, name); // Add the material name to the list
                        });


                    })
                </script>
</body>

</html>
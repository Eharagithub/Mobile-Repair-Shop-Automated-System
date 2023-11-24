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
                            <h4><i class="micon fa fa-commenting"></i> Inquiries</h4>
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
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        // Create a database connection
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "mobileshopdb"; // Name of your database

                        $conn = new mysqli($servername, $username, $password, $dbname);

                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        // Fetch data from the "inquiries" table
                        $sql = "SELECT * FROM inquries";
                        $result = $conn->query($sql);

                        // Check if there are rows in the result
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["mid"] . "</td>";
                                echo "<td>" . $row["fullname"] . "</td>";
                                echo "<td>" . $row["email"] . "</td>";
                                echo "<td>" . $row["message"] . "</td>";
                                echo "<td>";
                                echo "<button class='btn btn-success btn-sm read-btn'>Read</button>";
                                echo "<button class='btn btn-danger btn-sm delete-btn'>Delete</button>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>No records found</td></tr>";
                        }

                        // Close the database connection
                        $conn->close();
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Simple Datatable End -->
        </div>
    </div>
</div>

<!-- View Details Modal -->
<div class="modal fade" id="viewDetailsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Inquiry Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <dl>
                    <dt class="text-primary">Inquirer</dt>
                    <dd class="pl-4" id="inquirerDetails"></dd>
                    <dt class="text-primary">Email</dt>
                    <dd class="pl-4" id="emailDetails"></dd>
                    <dt class="text-primary">Message</dt>
                    <dd class="pl-4" id="messageDetails"></dd>
                </dl>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>  
    </div>
</div>

<!-- JavaScript -->
<script src="vendors/scripts/core.js"></script>
<script src="vendors/scripts/script.min.js"></script>
<script src="vendors/scripts/process.js"></script>
<script src="vendors/scripts/layout-settings.js"></script>
<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
        // JavaScript code to handle the "Read" button click
        $('.read-btn').click(function () {
            // You can handle the "Read" button click as shown in the previous response
            var inquirer = $(this).closest('tr').find('td:eq(1)').text();
            var email = $(this).closest('tr').find('td:eq(2)').text();
            var message = $(this).closest('tr').find('td:eq(3)').text();
            $('#inquirerDetails').text(inquirer);
            $('#emailDetails').text(email);
            $('#messageDetails').text(message);
            $('#viewDetailsModal').modal('show');
        });

        // JavaScript code to handle the "Delete" button click
        $('.delete-btn').click(function () {
            // Handle the "Delete" button click here
            // You can use $(this) to access the specific row's data and perform delete operation
            // For example, you can make an AJAX request to delete the record from the database
            // After successfully deleting, you can remove the row from the table using $(this).closest('tr').remove();
        });
    });
</script>
<!-- End JavaScript -->

</body>
</html>

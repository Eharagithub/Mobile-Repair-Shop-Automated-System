<?php

$invoice = [];
$service_list = [];
$material_list = [];

// Create a database connection
$host = "localhost";
$user = "root";
$password = "";
$db = "mobileshopdb";

$data = mysqli_connect($host, $user, $password, $db);

$sqlForJob = "select * from job where id=7";
$resultForJob = mysqli_query($data, $sqlForJob);

$sqlForDelivery = "select * from job where id";
$resultForDelivery = mysqli_query($data, $sqlForDelivery);

$sqlForInvoice = "select * from job";
$resultForInvoice = mysqli_query($data, $sqlForInvoice);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Status_View</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/bd-wizard.css">
</head>

<body>
  <main class="my-5">
    <div class="container">
      <div id="wizard">
        <h3>
          <div class="media">
            <div class="bd-wizard-step-icon"><i class="mdi mdi-account-check"></i></div>
            <div class="media-body">
              <div class="bd-wizard-step-title">Job Creation</div>
              <div class="bd-wizard-step-subtitle">Step 1</div>
            </div>
          </div>
        </h3>
        <section>
          <h3> Your job has been created ! </h3> <br>
          <?php
          while ($row = mysqli_fetch_array($resultForJob)) {

            $sqlForJobCreatedUser = "select * from systemuser where empNo=" . $row["systemuserId"];
            $resultForJobCreatedUser = mysqli_query($data, $sqlForJobCreatedUser);
            $resultForJobCreatedUser = mysqli_fetch_array($resultForJobCreatedUser)
              ?>
            JOB CREATED ON    :
            <?php echo $row["jobDate"]; ?> <br>
            JOB CREATED BY    :
            <?php echo $resultForJobCreatedUser["uname"]; ?> <br>
            BRANCH     :
            <?php echo $resultForJobCreatedUser["uaddress"]; ?> <br>
            NOTE     :
            <?php echo $row["remark"]; ?> <br>
            <?php
          }
          ?>
          <br>
          <h4> Thank You For Choosing Us .... </h3>
        </section>
        <h3>
          <div class="media">
            <div class="bd-wizard-step-icon"><i class="mdi mdi-truck"></i></div>
            <div class="media-body">
              <div class="bd-wizard-step-title">Delivery Details</div>
              <div class="bd-wizard-step-subtitle">Step 2</div>
            </div>
          </div>
        </h3>
        <section>
          <pre>
          <h4>Dear Customer , </h4>


          Your phone deliverd from - Sub Office Panadura 
                              To   - Head Office Colombo

          We will repair it as soon as possible. 

          Thank You !
        </pre>
        </section>


        <h3>
          <div class="media">
            <div class="bd-wizard-step-icon"><i class="mdi mdi-script"></i></div>
            <div class="media-body">
              <div class="bd-wizard-step-title">Invoice </div>
              <div class="bd-wizard-step-subtitle">Step 3</div>
            </div>
          </div>
        </h3>
        <section>
  <?php include_once("invoice.php") ?> 
        </section>
        <h3>
          <div class="media">
            <div class="bd-wizard-step-icon"><i class="mdi mdi-thumb-up"></i></div>
            <div class="media-body">
              <div class="bd-wizard-step-title">Job Done</div>
              <div class="bd-wizard-step-subtitle">Step 4</div>
            </div>
          </div>
        </h3>
        <section>
          <div class="content-wrapper">
            <h5 class="section-heading mb-5"> Dear Customer, </h5>
          
            <h4> Your Job Is Done ! </h4> <br>
            Your Phone has repaired successfully. <br>
            You can now pickup your phone! <br>
            Thank you for choosing us for your mobile repair.
            <br>
            <br>
            <br>
            <br>

            Kasthuri Mobile solutions.
          </div>
        </section>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="assets/js/jquery.steps.min.js"></script>
  <script src="assets/js/bd-wizard.js"></script>
</body>

</html>
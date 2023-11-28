<?php
session_start();
// Check if the invoiceNo is set in the session
if (!isset($_REQUEST['id'])) {
  header("Location: testcode.php");
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mobileshopdb";
$conn = new mysqli($servername, $username, $password, $dbname);

$id = $_REQUEST['id'];

$sql = "SELECT * FROM job where id = " . $id;
$result = mysqli_query($conn, $sql);
$job = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sql = "SELECT * FROM jobservice where jobid = " . $id;
$result = mysqli_query($conn, $sql);
$jobservices = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sql = "SELECT * FROM jobitem where jobid = " . $id;
$result = mysqli_query($conn, $sql);
$jobitems = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html>

<head>

  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: 0;
    }

    .invoice {
      width: 80%;
      max-width: 755px;
      margin: 80px auto;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      padding: 20px;
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .header img {
      max-width: 200px;
      opacity: 50%;
    }

    .header h1 {
      font-size: 28px;
      color: #007BFF;
    }

    .info {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin: 20px 0;
    }

    .company-info {
      flex: 1;
    }

    .company-info h2 {
      font-size: 18px;
      color: #333;
      margin: 0;
    }

    .invoice-details {
      flex: 1;
      text-align: right;
    }

    .invoice-details p {
      font-size: 14px;
      margin: 5px 0;
      color: #555;
    }

    .status {
      font-weight: bold;
      color: #FFC107;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    table th,
    table td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    table th {
      background-color: #007BFF;
      color: #fff;
    }

    .table-description {
      color: #007BFF;
      font-weight: bold;
    }

    .notes {
      background-color: #f2f2f2;
      padding: 10px;
      margin-top: 20px;
    }

    .totals {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 20px;
      
    }

    .totals p {
      font-size: 20px;
      margin: 5px 0;
     
    }

    .total-amount {
      font-size: 18px;
      color: #007BFF;
     
    }

    .footer {
      text-align: center;
      margin-top: 20px;
    }

    .btn-pay-now {
      background-color: #007BFF;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }
  </style>
</head>

<body>
  <div class="invoice">
    <div class="header">
      <img src="../new.jpg" alt="Your Logo">
      <h1>Invoice</h1>
    </div>
    <div class="info">
      <div class="company-info">
        <h2>Kasthuri Mobile Solutions</h2>
        <p>Highlevel road, Nugegoda<br>Colombo, Sri Lanka.</p>
        <p><i class="fas fa-phone"></i> +94116 245 8365</p>
      </div>
      <div class="invoice-details">
        <p>Invoice ID: <?php echo $job[0]["id"]; ?></p>
         <!-- Invoice number will be displayed here -->
        <p>Creation Date: <?php echo date_format(date_create($job[0]["jobDate"]),"Y/m/d") ?></p>
        <p>Status: PAID<span class="status"></span></p>
      </div>
    </div>
    <table>
      <thead>
        <tr>
          <th>Description</th>
          <th>Qty</th>
          <th>Unit Price</th>
          <th>Amount</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($jobservices as $jobservice) {

          $sql = "SELECT * FROM services where sid = " . $jobservice["serviceid"];
          $result = mysqli_query($conn, $sql);
          $services = mysqli_fetch_all($result, MYSQLI_ASSOC);

          foreach ($services as $service) {
            echo "<tr>";
            echo "<td>" . $service["service"]  . "</td>";
            echo "<td>-</td>";
            echo "<td>-</td>";
            echo "<td>" . $service["cost"] . "</td>";
          }
        }

        foreach ($jobitems as $jobitem) {

          $sql = "SELECT * FROM item where itemCode = " . $jobitem["itemId"];
          $result = mysqli_query($conn, $sql);
          $items = mysqli_fetch_all($result, MYSQLI_ASSOC);

          foreach ($items as $item) {
            echo "<tr>";
            echo "<td>" . $item["name"]  . "</td>";
            echo "<td>" . $jobitem["qty"]  . "</td>";
            echo "<td>" . $jobitem["price"]  . "</td>";
            echo "<td>" . floatval($jobitem["qty"]) * floatval($jobitem["price"]) . "</td>";
          }
        }

        ?>

      </tbody>
    </table>
    <div class="notes">
    
      <p>Remarks :<?php echo $job[0]["remark"]; ?></p>
    </div>
    <div class="totals">
      <p class="total-amount">Total Amount: <?php echo $job[0]["amount"]; ?></p>
    </div>
    <div class="footer">
      <p>Thank you for your purchase</p>

    </div>
  </div>
</body>

</html>
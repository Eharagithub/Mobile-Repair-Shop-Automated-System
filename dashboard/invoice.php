<?php
session_start();
// Check if the invoiceNo is set in the session
if (isset($_SESSION['invoiceNo'])) {
    $invoiceNo = $_SESSION['invoiceNo'];
} else {
    $invoiceNo = 'N/A';
}
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

    table th, table td {
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
      font-size: 14px;
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
    <p>Invoice ID:</p>
    <?php echo $invoiceNo; ?>  <!-- Invoice number will be displayed here -->
      <p>Creation Date:</p>
      <p>Status: <span class="status"></span></p>
    </div>
  </div>
  <table>
    <thead>
      <tr>
        <th></th>
        <th>Description</th>
        <th>Qty</th>
        <th>Unit Price</th>
        <th>Amount</th>
      </tr>
    </thead>
    <tbody>
      
    </tbody>
  </table>
  <div class="notes">
    <p>remarks :</p>
  </div>
  <div class="totals">
    <p>Subtotal: </p>
    <p>Tax (15%): </p>
    <p class="total-amount">Total Amount: </p>
  </div>
  <div class="footer">
    <p>Thank you for your purchase</p>
    
  </div>
</div>
</body>
</html>



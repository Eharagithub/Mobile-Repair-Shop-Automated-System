<?php 


$id = $_REQUEST["id"];

?>



<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
     <?php echo "<img src=\"https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=http://localhost/Mobile-Repair-Shop/dashboard/testcode.php?id=" . $id . "\" title=\"Link to Google.com\" />" ?> 
    <h1>        This Your QR Code </h2>
     

</body>
</html>
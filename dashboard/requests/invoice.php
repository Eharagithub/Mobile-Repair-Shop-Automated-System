<?php


    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mobileshopdb";
    $conn = new mysqli($servername, $username, $password, $dbname);

    $workListId = $_POST["workListId"];
    $services = $_POST["services"];
    $materials = $_POST["materials"];
    $paymentStatus = $_POST["paymentStatus"];
    $status = $_POST["status"];

    print_r($_POST);



    foreach ($materials as $item) {
        $sql = "select * from item where itemCode = " . $item["id"];
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
            $stock = $row["stock"];
            $stock = $stock - $item["qty"];

            $sql = "UPDATE item SET stock = " . $stock . " where itemCode = " . $item["id"];
            mysqli_query($conn, $sql);

            $sql = "INSERT INTO `jobitem` (`jobitemid`, `jobid`, `itemId`, `qty`, `price`) VALUES (NULL, " . $workListId . ", " . $item["id"] . ", " . $item["qty"] . ", '" . $item["cost"] . "')";
            mysqli_query($conn, $sql);
        }
    }


    foreach ($services as $service) {
        $sql = "INSERT INTO `jobservice` (`jobserviceid`, `jobid`, `serviceid`, `price`) VALUES (NULL," . $workListId . ", " . $service["id"] . ",'" . $service["cost"] . "')";
        mysqli_query($conn, $sql);
    }

    

    $sql = "UPDATE `job` SET isInvoiced = '1', remark = '".$_POST['remarks']."' WHERE id =" . $workListId;
    echo $sql;
    mysqli_query($conn, $sql);

    echo "Completed";


    ?>

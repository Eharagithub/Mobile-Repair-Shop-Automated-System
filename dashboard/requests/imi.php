<?php

$nic = $_REQUEST["nic"];

$host = "localhost";
$user = "root";
$password = "";
$db = "mobileShopDb";

$data = mysqli_connect($host, $user, $password, $db);

$sql = "SELECT * FROM `device` WHERE nic = '".$nic."'";
$result = mysqli_query($data, $sql);

$devices = array();

while ($row = mysqli_fetch_array($result)) {

    $imi = $row["imiNumber"];
    $name = $row["brand"] . " " . $row["model"] . " " . $row["extra"];

    $obj["imi"] = $imi;
    $obj["name"] = $name;

    array_push($devices,$obj);

}

header('Content-Type: application/json');

echo json_encode($devices);

?>
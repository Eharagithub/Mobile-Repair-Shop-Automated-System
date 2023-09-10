<?php
	$id= $_POST['id'];
	$isActive= $_POST['isActive'];
	$jobDate= $_POST['jobDate'];
	$deliveryId= $_POST['deliveryId'];
	$technicianId= $_POST['technicianId'];
	$systemuserId= $_POST['systemuserId'];
    $deviceId= $_POST['deviceId'];
	/*$repassword= $_POST['repassword'];*/

	//database connection
	$conn = new mysqli('localhost','root','','mobileshopdb');
	if ($conn->connect_error){
		die('Connection Failed : '.$conn->connect_error);
	}else{
		$stmt= $conn->prepare("INSERT INTO job(id,isActive,jobDate,deliveryId,technicianId,systemuserId,deviceId)values(?,?,?,?,?,?,?)");
		$stmt->bind_param("isdiiis",$id,$isActive,$jobDate,$deliveryId,$technicianId,$systemuserId,$deviceId);
		$stmt->execute();
		echo "Yor Registration is Successfully....";
		
			
		$stmt->close();
		$conn->close();
	}

?>
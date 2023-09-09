<?php
	$empNo= $_POST['empNo'];
	$nic= $_POST['nic'];
	$tname= $_POST['tname'];
	$taddress= $_POST['taddress'];
	$phone= $_POST['phone'];
	$email= $_POST['email'];
	/*$repassword= $_POST['repassword'];*/

	//database connection
	$conn = new mysqli('localhost','root','','mobileshopdb');
	if ($conn->connect_error){
		die('Connection Failed : '.$conn->connect_error);
	}else{
		$stmt= $conn->prepare("INSERT INTO technician(empNo,nic,tname,taddress,phone,email)values(?,?,?,?,?,?)");
		$stmt->bind_param("isssss",$empNo,$nic,$tname,$taddress,$phone,$email);
		$stmt->execute();
		echo "Yor Registration is Successfully....";
		
			
		$stmt->close();
		$conn->close();
	}

?>
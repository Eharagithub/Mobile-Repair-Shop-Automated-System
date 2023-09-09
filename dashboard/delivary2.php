<?php
	$empNo= $_POST['empNo'];
	$nic= $_POST['nic'];
	$dname= $_POST['dname'];
	$daddress= $_POST['daddress'];
	$phone= $_POST['phone'];
	$email= $_POST['email'];
	/*$repassword= $_POST['repassword'];*/

	//database connection
	$conn = new mysqli('localhost','root','','mobileshopdb');
	if ($conn->connect_error){
		die('Connection Failed : '.$conn->connect_error);
	}else{
		$stmt= $conn->prepare("INSERT INTO delivery(empNo,nic,dname,daddress,phone,email)values(?,?,?,?,?,?)");
		$stmt->bind_param("isssss",$empNo,$nic,$dname,$daddress,$phone,$email);
		$stmt->execute();
		echo "Yor Registration is Successfully....";
		
			
		$stmt->close();
		$conn->close();
	}

?>
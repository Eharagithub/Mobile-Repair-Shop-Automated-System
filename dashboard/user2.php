<?php
	$empNo= $_POST['empNo'];
	$nic= $_POST['nic'];
	$uname= $_POST['uname'];
	$uaddress= $_POST['uaddress'];
	$phone= $_POST['phone'];
	$email= $_POST['email'];
    $password= $_POST['password'];
    $locid= $_POST['locid'];
	/*$repassword= $_POST['repassword'];*/

	//database connection
	$conn = new mysqli('localhost','root','','mobileshopdb');
	if ($conn->connect_error){
		die('Connection Failed : '.$conn->connect_error);
	}else{
		$stmt= $conn->prepare("INSERT INTO systemuser(empNo,nic,uname,uaddress,phone,email,password,locid)values(?,?,?,?,?,?,?,?)");
		$stmt->bind_param("issssssi",$empNo,$nic,$uname,$uaddress,$phone,$email,$password,$locid);
		$stmt->execute();
		echo "Yor Registration is Successfully....";
		
			
		$stmt->close();
		$conn->close();
	}

?>
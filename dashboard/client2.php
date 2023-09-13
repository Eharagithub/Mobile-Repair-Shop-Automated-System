<?php
	$nic= $_POST['nic'];
	$name= $_POST['name'];
	$address= $_POST['address'];
	$phone1= $_POST['phone1'];
	$phone2= $_POST['phone2'];
	$email= $_POST['email'];
	/*$repassword= $_POST['repassword'];*/

	//database connection
	$conn = new mysqli('localhost','root','','mobileshopdb');
	if ($conn->connect_error){
		die('Connection Failed : '.$conn->connect_error);
	}else{
		$stmt= $conn->prepare("INSERT INTO customer(nic,name,address,phone1,phone2,email)values(?,?,?,?,?,?)");
		$stmt->bind_param("isssss",$nic,$name,$address,$phone1,$phone2,$email);
		$stmt->execute();
		echo "Yor Registration is Successfully....";
		
			
		$stmt->close();
		$conn->close();
	}

?>
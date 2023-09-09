<?php
	$locid= $_POST['locid'];
	$phone2= $_POST['phone2'];
	$lname= $_POST['lname'];
	$laddress= $_POST['laddress'];
	$phone1= $_POST['phone1'];
	$email= $_POST['email'];
	/*$repassword= $_POST['repassword'];*/

	//database connection
	$conn = new mysqli('localhost','root','','mobileshopdb');
	if ($conn->connect_error){
		die('Connection Failed : '.$conn->connect_error);
	}else{
		$stmt= $conn->prepare("INSERT INTO location(locid,phone2,lname,laddress,phone1,email)values(?,?,?,?,?,?)");
		$stmt->bind_param("isssss",$locid,$phone2,$lname,$laddress,$phone1,$email);
		$stmt->execute();
		echo "Yor Registration is Successfully....";
		
			
		$stmt->close();
		$conn->close();
	}

?>
<?php
	$DeliId= $_POST['DeliId'];
	$DeliNIC= $_POST['DeliNIC'];
	$DeliName= $_POST['DeliName'];
	$DeliPhone= $_POST['DeliPhone'];
	$DeliAddress= $_POST['DeliAddress'];
	$Deliemail= $_POST['Deliemail'];
	/*$repassword= $_POST['repassword'];*/

	//database connection
	$conn = new mysqli('localhost','root','','reg');
	if ($conn->connect_error){
		die('Connection Failed : '.$conn->connect_error);
	}else{
		$stmt= $conn->prepare("INSERT INTO delivary(DeliId,DeliNIC,DeliName,DeliPhone,DeliAddress,Deliemail)values(?,?,?,?,?,?)");
		$stmt->bind_param("ssssss",$DeliId,$DeliNIC,$DeliName,$DeliPhone,$DeliAddress,$Deliemail);
		$stmt->execute();
		echo "Yor Registration is Successfully....";
		
			
		$stmt->close();
		$conn->close();
	}

?>
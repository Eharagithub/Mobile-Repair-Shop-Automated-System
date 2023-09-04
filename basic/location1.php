<?php
	$LocationId= $_POST['LocationId'];
	$LAddress= $_POST['LAddress'];
	$Phone1= $_POST['Phone1'];
	$Phone2= $_POST['Phone2'];
	/*$repassword= $_POST['repassword'];*/

	//database connection
	$conn = new mysqli('localhost','root','','reg');
	if ($conn->connect_error){
		die('Connection Failed : '.$conn->connect_error);
	}else{
		$stmt= $conn->prepare("INSERT INTO location(LocationId,LAddress,Phone1,Phone2)values(?,?,?,?)");
		$stmt->bind_param("isss",$LocationId,$LAddress,$Phone1,$Phone2);
		$stmt->execute();
		echo "Yor Registration is Successfully....";
		
			
		$stmt->close();
		$conn->close();
	}

?>
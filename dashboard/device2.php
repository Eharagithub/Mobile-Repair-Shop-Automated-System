<?php
	$imiNumber= $_POST['imiNumber'];
	$brand= $_POST['brand'];
	$model= $_POST['model'];
	$extra= $_POST['extra'];
	$nic= $_POST['nic'];
	/*$repassword= $_POST['repassword'];*/

	//database connection
	$conn = new mysqli('localhost','root','','mobileshopdb');
	if ($conn->connect_error){
		die('Connection Failed : '.$conn->connect_error);
	}else{
		$stmt= $conn->prepare("INSERT INTO device(imiNumber,brand,model,extra,nic)values(?,?,?,?,?)");
		$stmt->bind_param("sssss",$imiNumber,$brand,$model,$extra,$nic);
		$stmt->execute();
		echo "Yor Registration is Successfully....";
		
			
		$stmt->close();
		$conn->close();
	}

?>
<?php
	$iMINumber= $_POST['IMINumber'];
	$brand= $_POST['Brand'];
	$model= $_POST['Model'];
	$extra= $_POST['Extra'];
	$cusid= $_POST['id_num'];
	/*$repassword= $_POST['repassword'];*/

	//database connection
	$conn = new mysqli('localhost','root','','reg');
	if ($conn->connect_error){
		die('Connection Failed : '.$conn->connect_error);
	}else{
		$stmt= $conn->prepare("INSERT INTO device(IMINumber,Brand,Model,Extra,id_num)values(?,?,?,?,?)");
		$stmt->bind_param("sssss",$iMINumber,$brand,$model,$extra,$cusid);
		$stmt->execute();
		echo "Yor Registration is Successfully....";
		
			
		$stmt->close();
		$conn->close();
	}

?>
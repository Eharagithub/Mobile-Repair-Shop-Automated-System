<?php
	$Hid= $_POST['Hid'];
	$HDate= $_POST['HDate'];
	$HTime= $_POST['HTime'];
	$Note= $_POST['Note'];
	$UserId= $_POST['UserId'];
	$JobId= $_POST['JobId'];
	/*$repassword= $_POST['repassword'];*/

	//database connection
	$conn = new mysqli('localhost','root','','reg');
	if ($conn->connect_error){
		die('Connection Failed : '.$conn->connect_error);
	}else{
		$stmt= $conn->prepare("INSERT INTO history(Hid,HDate,HTime,Note,UserId,JobId)values(?,?,?,?,?,?)");
		$stmt->bind_param("isssii",$Hid,$HDate,$HTime,$Note,$UserId,$JobId);
		$stmt->execute();
		echo "Yor Registration is Successfully....";
		
			
		$stmt->close();
		$conn->close();
	}

?>
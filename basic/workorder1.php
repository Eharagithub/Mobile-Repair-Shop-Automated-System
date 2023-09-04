<?php
	$JobId= $_POST['JobId'];
	$IsActive= $_POST['IsActive'];
	$JDate= $_POST['JDate'];
	$TechnicianId= $_POST['TechnicianId'];
	$DelivaryId= $_POST['DelivaryId'];
	$UserId= $_POST['UserId'];
    $IMINumber= $_POST['IMINumber'];
	/*$repassword= $_POST['repassword'];*/

	//database connection
	$conn = new mysqli('localhost','root','','reg');
	if ($conn->connect_error){
		die('Connection Failed : '.$conn->connect_error);
	}else{
		$stmt= $conn->prepare("INSERT INTO job(JobId,IsActive,JDate,TechnicianId,DelivaryId,UserId,IMINumber)values(?,?,?,?,?,?,?)");
		$stmt->bind_param("isdiiis",$JobId,$IsActive,$JDate,$TechnicianId,$DelivaryId,$UserId,$IMINumber);
		$stmt->execute();
		echo "Yor Registration is Successfully....";
		
			
		$stmt->close();
		$conn->close();
	}

?>
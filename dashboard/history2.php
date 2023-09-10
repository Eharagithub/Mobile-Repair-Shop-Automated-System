<?php
	$id= $_POST['id'];
	$htype= $_POST['htype'];
	$note= $_POST['note'];
	$noteDate= $_POST['noteDate'];
	$systemuserId= $_POST['systemuserId'];
	$jobid= $_POST['jobid'];
	/*$repassword= $_POST['repassword'];*/

	//database connection
	$conn = new mysqli('localhost','root','','mobileshopdb');
	if ($conn->connect_error){
		die('Connection Failed : '.$conn->connect_error);
	}else{
		$stmt= $conn->prepare("INSERT INTO history(id,htype,note,noteDate,systemuserId,jobid)values(?,?,?,?,?,?)");
		$stmt->bind_param("issdii",$id,$htype,$note,$noteDate,$systemuserId,$jobid);
		$stmt->execute();
		echo "Yor Registration is Successfully....";
		
			
		$stmt->close();
		$conn->close();
	}

?>
<?php
	$tid= $_POST['techid'];
	$tname= $_POST['techname'];
	$tnic= $_POST['technic'];
	$taddress= $_POST['techaddress'];
	$tmobile= $_POST['tmobile'];
	$temail= $_POST['techemail'];
	/*$repassword= $_POST['repassword'];*/

	//database connection
	$conn = new mysqli('localhost','root','','reg');
	if ($conn->connect_error){
		die('Connection Failed : '.$conn->connect_error);
	}else{
		$stmt= $conn->prepare("INSERT INTO technician(techid,techname,technic,techaddress,tmobile,techemail)values(?,?,?,?,?,?)");
		$stmt->bind_param("ssssis",$tid,$tname,$tnic,$taddress,$tmobile,$temail);
		$stmt->execute();
		echo "Yor Registration is Successfully....";
		
			
		$stmt->close();
		$conn->close();
	}

?>
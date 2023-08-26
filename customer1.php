<?php
	$nic= $_POST['id_num'];
	$name= $_POST['name'];
	$address= $_POST['address'];
	$mobile1= $_POST['mobile1'];
	$mobile2= $_POST['mobile2'];
	$email= $_POST['email'];
	/*$repassword= $_POST['repassword'];*/

	//database connection
	$conn = new mysqli('localhost','root','','reg');
	if ($conn->connect_error){
		die('Connection Failed : '.$conn->connect_error);
	}else{
		$stmt= $conn->prepare("INSERT INTO users(mobile1,mobile2,name,address,id_num,email)values(?,?,?,?,?,?)");
		$stmt->bind_param("iissss",$mobile1,$mobile2,$name,$address,$nic,$email);
		$stmt->execute();
		echo "Yor Registration is Successfully....";
		
			
		$stmt->close();
		$conn->close();
	}

?>
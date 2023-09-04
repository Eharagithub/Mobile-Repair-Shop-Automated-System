<?php
	$UserId= $_POST['UserId'];
	$UserNIC= $_POST['UserNIC'];
	$UserName= $_POST['UserName'];
	$UserPhone= $_POST['UserPhone'];
	$UserAddress= $_POST['UserAddress'];
	$Useremail= $_POST['Useremail'];
    $LocationId= $_POST['LocationId'];
	/*$repassword= $_POST['repassword'];*/

	//database connection
	$conn = new mysqli('localhost','root','','reg');
	if ($conn->connect_error){
		die('Connection Failed : '.$conn->connect_error);
	}else{
		$stmt= $conn->prepare("INSERT INTO adminuser(UserId,UserNIC,UserName,UserPhone,UserAddress,Useremail,LocationId)values(?,?,?,?,?,?,?)");
		$stmt->bind_param("isssssi",$UserId,$UserNIC,$UserName,$UserPhone,$UserAddress,$Useremail,$LocationId);
		$stmt->execute();
		echo "Yor Registration is Successfully....";
		
			
		$stmt->close();
		$conn->close();
	}

?>
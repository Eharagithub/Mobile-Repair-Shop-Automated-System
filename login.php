<?php

$host="localhost";
$user="root";
$password="";
$db="user";

$data=mysqli_connect($host,$user,$password,$db);
if($data===false)
{
    die("connection error");
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (!empty($username) && !empty($password)) {
        $sql="select * from login where username= '".$username."' AND password='".$password."' ";

        $result=mysqli_query($data,$sql);
        $row=mysqli_fetch_array($result);

        if($row["usertype"]=="user")
        {
           header("location:tech.php");
        }   
        
        elseif($row["usertype"]=="admin")
        { 
            header("location:admin.php");
        }    
        else
        {
            echo "username or passworrd incorrect";
        }
    } else {
        echo "Please enter username and password";
    }
          
}

?>
        
<!DOCTYPE html>
<html>

<head>
	<title>Transparent Login Form</title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
	<div class="login-box">
		<h1>Login</h1>
		<form action="#" method="POST">
			<p>Username</p>
			<input type="text" name="username" required>
			<p>Password</p>
			<input type="password" name="password" required>
			<input type="submit" name="" value="Login">
			<a href="#">Forgot Password</a>
		</form>
	</div>
</body>
</html>
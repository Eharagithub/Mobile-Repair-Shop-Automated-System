<?php session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "mobileshopdb";

$data = mysqli_connect($host, $user, $password, $db);
if ($data === false) {
    die("connection error");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["username"];
    $password = $_POST["password"];


    if (!empty($email) && !empty($password)) {
        $sql = "select * from systemuser where email= '" . $email . "' AND password='" . $password . "' ";
     
        $result = mysqli_query($data, $sql);

        if ($result->num_rows == 1) {

            $row = mysqli_fetch_array($result);


            $_SESSION["systemUserID"] = $row["empNo"];
            $_SESSION["systemUserEmail"] = $row["email"];
            
            $_SESSION["systemUserName"] = $row["uname"];
            $_SESSION["systemUserType"] = $row["type"];

            $sql = "select * from location where locid = " . $row["locid"];
            $result = mysqli_query($data, $sql);
            $row = mysqli_fetch_array($result);
            $_SESSION["systemUserLocId"] = $row["locid"];
            $_SESSION["systemUserLocName"] = $row["lname"];


            header("Location: dashboard/index.php");
             // Redirect to a welcome page or dashboard
        } else {
            // Invalid login, display an error message
            echo "<script>alert('Oh sorry Invalid username or password');</script>";
        }
    } else {
        echo "Please enter username and password";
    }
}

?>


<!DOCTYPE html>
<html>

<head>
    <title> Login</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
 
</head>

<body>
    
    
    <div class="login-box">
        <h1>Login..</h1>
        
        <form action="" method="POST">
            <p>Username</p>
            <box-icon type='solid' name='user'></box-icon>
            <input type="text" name="username" required>
            
            <p>Password</p>
            <box-icon name='lock-alt' type='solid' ></box-icon>
            <input type="password" name="password" required>
           
            <lable><input type="checkbox">Remember me</lable>
            
            <br><br>
            <input type="submit" name="click" value="Login">
            
        </form>
    </div>
</body>

</html>
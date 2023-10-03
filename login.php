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

            $sql = "select * from location where locid = " . $row["locid"];
            $result = mysqli_query($data, $sql);
            $row = mysqli_fetch_array($result);
            $_SESSION["locationId"] = $row["locid"];
            $_SESSION["locationName"] = $row["lname"];


            header("Location: dashboard/index.php"); // Redirect to a welcome page or dashboard
        } else {
            // Invalid login, display an error message
            echo "Invalid username or password.";
        }
    } else {
        echo "Please enter username and password";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Transparent Login</title>
    <link rel="stylesheet" type="text/css" href="login.css">

    <script type="text/javascript">
        function msg(){
            alert("Enter the correct username or Password");
        }
        function forget(){
            alert("Please reset your password");
        }
    </script>
</head>

<body>
    <div class="login-box">
        <h1>Login..</h1>
        <form action="" method="POST">
            <p>Username</p>
            <input type="text" name="username" required>
            <p>Password</p>
            <input type="password" name="password" required>
            <input type="submit" name="click" onclick="msg()" value="Login">
            <a href="#"  onclick="forget()">Forgot Password</a>
        </form>
    </div>
</body>

</html>
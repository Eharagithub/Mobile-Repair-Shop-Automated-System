<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mobileshopdb";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the client code from the form
$clientCode = $_POST['client_code'];

// Use prepared statement to prevent SQL injection
$sql = "SELECT * FROM customer WHERE nic = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $clientCode);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Client code exists, redirect to personalized page
    header("Location: Status_view/index.php?client_code=$clientCode");
    exit(); // Make sure to stop script execution after the header redirect
} else {
    // Client code not found, you might want to handle this case
    echo "Client code not found!";
}

$stmt->close();
$conn->close();
?>

<?php

session_start();
$csrfToken = bin2hex(random_bytes(32)); // Generate a random CSRF token
$_SESSION['csrf_token'] = $csrfToken;
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verify CSRF token
    if ($_POST["csrf_token"] !== $_SESSION["csrf_token"]) {
        die("CSRF token validation failed.");
    }
    
    // Your SMS sending code here...
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $apiKey = "NxxWi6aOL0qUIHvAw71w"; // Replace with your notifi.lk API Key
    $phone = $_POST["phone"];
    $message = $_POST["message"];

    // Send SMS using notifi.lk API
    $url = "https://app.notify.lk/settings/senders";
    $data = [
        "to" => $phone,
        "message" => $message,
    ];

    $headers = [
        "Authorization: Bearer $apiKey",
        "Content-Type: application/json", // Specify JSON content type
    ];

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    // Handle the API response
    if ($httpCode == 200) {
        echo "SMS sent successfully!";
    } else {
        echo "Error sending SMS. HTTP Code: $httpCode";
    }
}
?>

?>
<!DOCTYPE html>
<html>
<head>
    <title>Send SMS</title>
    <link rel="stylesheet" type="text/css" href="SMS.css">
    <input type="hidden" name="csrf_token" value="<?php echo $csrfToken; ?>"
</head>
<body>
    <div class="container">
        <h2>Send SMS</h2>
        <form method="POST" action="SMS.php">
            <label for="phone">Phone Number:</label>
            <input type="text" name="phone" id="phone" required><br>
            <label for="message">Message:</label>
            <textarea name="message" id="message" required></textarea><br>
            <input type="submit" value="Send SMS">
        </form>
    </div>
</body>
</html>

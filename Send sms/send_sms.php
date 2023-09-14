<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send SMS</title>
    <link rel="stylesheet" href="send_sms.css">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
        <h1>Send SMS</h1>
        <form action="send_sms.php" method="post">
            <label for="phone">Recipient's Phone Number:</label>
            <input type="text" id="phone" name="phone" required><br><br>
            
            <label for="message">Message:</label><br>
            <textarea id="message" name="message" rows="4" cols="50" required></textarea><br><br>
            
            <input type="submit" value="Send SMS">
        </form>
    </div>
</body>
</html>

<?php
require_once __DIR__ . '/vendor/autoload.php';

use Twilio\Rest\Client;

$sid    = "AC9cc0a55463c2759134f78f0e75865428";
$token  = "2f6b13ea00bb38e2b8ebebf80f444224";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $recipient = $_POST["phone"];
    $message = $_POST["message"];

    try {
        $client = new Client($sid, $token);

        $message = $client->messages->create(
            $recipient,
            [
                'from' => '+14245431095',
                'body' => $message,
            ]
        );

        if ($message->sid) {
            echo 'Message sent successfully';
        } else {
            echo 'Message not sent';
        }
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
?>
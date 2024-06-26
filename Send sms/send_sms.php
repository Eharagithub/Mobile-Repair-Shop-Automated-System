<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Notification</title>
    <style>
        body {
            font-family: century;
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(pexels-pixabay-356056.jpg);
            background-size: cover;
            background-position: center;
            
        }
        .container {
            max-width: 540px;
            margin: 0 auto;
            padding: 44px;
            border: 12px solid #ccc;
            border-radius: 5px;
            background-color: #f7f7f7;
            transform: translateY(50px); /* Move down by 30px */
        }
        h2{
            position:absolute;
            top:5%;
            left:25%;
            transform: translate(-50%,-50%);
            font-size: 30px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Send Notification</h2>
        <br> <br> 
        <form action="send_sms.php" method="POST">
            <div class="form-group">
                <label for="to">Recipient's Phone Number:</label>
                <input type="text" id="to" name="to" placeholder="Enter phone number" required>
            </div>
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="4" placeholder="Enter your message" required>Dear Customer, Your Phone has repaired successfully. You can now pickup your phone! Thank you for choosing us for your mobile repair.Kasthuri Mobile solutions</textarea>
            </div>
            <button type="submit">Send SMS</button>
        </form>
    </div>
</body> 
</html>


<?php
require_once(__DIR__ . '/vendor/autoload.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = "26129"; // Replace with your actual User ID.
    $api_key = "kSeZzgRU0ZSsUblfMZci"; // Replace with your actual API Key.
    $message = $_POST["message"];
    $to = $_POST["to"];
    $sender_id = "NotifyDEMO"; // Replace with your sender ID.

     

    try {
        $api_instance = new NotifyLk\Api\SmsApi();
        $api_instance->sendSMS($user_id, $api_key, $message, $to, $sender_id,);
        echo "SMS sent successfully!";
    } catch (Exception $e) {
        echo 'Exception when calling SmsApi->sendSMS: ', $e->getMessage(), PHP_EOL;
    }
}
?>

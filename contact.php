<!DOCTYPE html>
<html>
<head>
    <title>Contact</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="./dashboard/vendors/styles/icon-font.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="contact.css">
</head>
<body>
    <header>
        <?php include_once("./Common/header.php") ?> 
    </header>
    <div>
        <h1 class="contact-title">Get Touch With Us</h1> 
        
    </div>
    <form class="contact-form" method="post" action="send-email.php">
         
            <!-- Form inputs go here -->
       
            <label for="name">Name :</label>
            <input type="text" name="name" id="name" required>

            <label for="email">Email :</label>
            <input type="email" name="email" id="email" required>

            <label for="subject">Subject :</label>
            <input type="text" name="subject" id="subject" required>

            <label for="message">Message :</label>
            <textarea name="message" id="message" required></textarea>

            <center><button type="submit">Send</button></center>
    </form>
</body>
</html>

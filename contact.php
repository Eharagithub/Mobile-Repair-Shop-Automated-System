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

             <button type="submit">Send</button> 
    </form>

    <section>
    <div>
        <p class="d-flex align-items-center">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3299.184964506429!2d80.27512321583475!3d7.8235667010070635!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2slk!4v1692675857001!5m2!1sen!2slk" width="2000"    height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </p>
        </div>
    </section>
    <br><br>
<?php include_once("./Common/footer.php") ?> 
  
</body>
</html>

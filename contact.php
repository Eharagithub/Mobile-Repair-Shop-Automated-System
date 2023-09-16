<!DOCTYPE html>
<html>
    <head>
        <title>Contact</title>
        <meta charset="UTF-8">
         
    
        <link rel="stylesheet" href="style.css" >
        <link rel="stylesheet" href="contact.css" >

    
    </head>

    <body>
    <form class="contact-form" method="post" action="send-email.php">
    <!-- Form content -->
</form>
<h1 class="contact-title">Contact</h1>
By using a specific class or ID for the contact form and "Contact" text, you ensure that the styles from style.css only affect elements with those classes or IDs, and they won't interfere with other pages that don't use those specific classes or IDs.






           <?php include_once("./Common/header.php") ?>
        <h1>Contact</h1>

        <form method="post" action="send-email.php">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" required>

            <label for="email">email</label>
            <input type="email" name="email" id="email" required>

            <label for="subject">Subject</label>
            <input type="text" name="subject" id="subject" required>

            <label for="message">Message</label>
            <textarea name="message" id="message" required></textarea>

            <br>

            <button>
                Send
            </button>




        </form>
    </body>
</html>
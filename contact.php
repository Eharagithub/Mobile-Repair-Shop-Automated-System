<!DOCTYPE html>
<html>
    <head>
        <title>Contact</title>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <link rel="stylesheet" type="text/css" href="./dashboard/vendors/styles/icon-font.min.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="contact.css" >
    </head>
   
    <body>
    <header>
        <?php include_once("./Common/header.php") ?> 
    </header>

    <form class="contact-form" method="post" action="send-email.php">
    <!-- Form content -->
    </form>
    <h1 class="contact-title">Contact</h1>
    <p>By using a specific class or ID for the contact form and "Contact" text, you ensure that the styles from style.css only affect elements with those classes or IDs, and they won't interfere with other pages that don't use those specific classes or IDs.</p>

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
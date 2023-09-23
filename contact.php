<!DOCTYPE html>
<html>
    <head>
        <title>Contact</title>
        <meta charset="UTF-8">
         
    
        <link rel="stylesheet" href="style.css" >
        <link rel="stylesheet" href="contact.css" >

        <header>

            <section class>
            <style>
                    /* Add this CSS to change the navbar background color to black */
                    .navbar-toggler.bg-dark {
                         
                        background-color: rgba(0, 0, 0, 0.7);
                    }
                </style>
            <nav class="navbar navbar-expand-lg navbar-toggler bg-dark py-4 text-white">
                <div class="navbar__container">
                    <div class="navbar__logo" style="width: 50px; height: 50px;">
                        <img src="new.jpg" alt="Kasthuri Mobile solutions" max-width="20" max-height="50">
                    </div>
                    
                    <div class="navbar__toggle" id="mobile-menu">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </div>
                    <ul class="navbar__menu">
                        <li class="navbar__item">
                           <a href="index.php" class="navbar__links" >Home </a> 
                        </li>
                        <li class="navbar__item">
                            <a href="about.php" class="navbar__links">About Us </a> 
                        </li>
                        <li class="navbar__item">
                            <a href="Servicess.php" class="navbar__links">Services</a> 
                        </li>
                        <li class="navbar__item">
                            <a href="contact.php" class="navbar__links">Contact Us </a> 
                        </li>
                        <li class="navbar__btn">
                            <a href="login.php" class="admin">Admin Login </a> 
                        </li>
                    </ul>
                </div>
            </nav>
            </section>
            <script src="app.js"></script>
            </header>
   
    
    </head>
    
 
    
    <body>
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
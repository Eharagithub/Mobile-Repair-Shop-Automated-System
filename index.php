<!DOCTYPE html>
<html lang="en">
  <head>
        <title>Kasthuri Mobile Solutions|Home Page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <link rel="stylesheet" href="style.css" >
  </head>
  <body>

    <header>
        
        <?php include_once("./Common/header.php") ?> 
       
    </header>
    
            <div class ="title">
                <h3> No. 01 in Sri Lanka</h3>
                <h1>Phone Repair Center</h1>
            </div>
            <div class ="button">
                <a href="Servicess.php" class="btn">View services</a>
                <a href="about.php" class="btn">Catch our Specialists</a>
                <!--<a href="statusview.php" class="btn">View Status</a>-->
            </div>
         
          
            <!-- start services section -->

  <section class="p-5" id="services">
    <div class="container py-5">
      <div class="row text-center g-4">

        <div class="col-md">
          <div class="card bg-dark text-light p-5">
            <div class="card-body text-center">
              <div class="h1 mb-3">
                <img src="https://phonerepairs.lk/wp-content/themes/blankslate/assets/images/icon/c5.png" width="75" height="75" alt="Laptop">
              </div>
              <h3 class="card-title mb-3">
                Expert Technicians
              </h3>
              <p class="card-text">
                 Repaired by our expert technicians who are well experienced
              </p>
              <a href="Servicess.php" class="custom-button">
                Read more
              </a>
            </div>

          </div>

        </div>
         
        <div class="col-md">
          <div class="card bg-dark text-light p-5">
            <div class="card-body text-center">
              <div class="h1 mb-3">
                <img src="https://phonerepairs.lk/wp-content/themes/blankslate/assets/images/icon/c3.png" width="75" height="75" alt="Laptop">
                  
              </div>
              <h3 class="card-title mb-3">
                On Time Delivery
              </h3>
              <p class="card-text">
                We will repair your device perfectly and on time for delivery
              </p>
              <a href="Servicess.php" class="custom-button">
                Read more
              </a>
            </div>

          </div>

        </div>
        <div class="col-md">
          <div class="card bg-dark text-light p-5">
            <div class="card-body text-center">
              <div class="h1 mb-3">
                <img src="https://phonerepairs.lk/wp-content/themes/blankslate/assets/images/icon/c4.png" width="75" height="75" alt="Laptop"> 
                  
              </div>
              <h3 class="card-title mb-3">
                Premium Parts
              </h3>
              <p class="card-text">
                We use only original quality parts for your device
              </p>
              <a href="Servicess.php" class="custom-button">
                Read more
              </a>
            </div>

          </div>

        </div>

        <div class="col-md">
          <div class="card bg-dark text-light p-5">
            <div class="card-body text-center">
              <div class="h1 mb-3">
                <img src="https://phonerepairs.lk/wp-content/themes/blankslate/assets/images/icon/c6.png" width="75" height="75" alt="Laptop">
              </div>
              <h3 class="card-title mb-3">
                Our Experience
              </h3>
              <BR>
              <p class="card-text">
                We have been same location & Market for 5 years
              </p>
              <a href="Servicess.php" class="custom-button">
                Read more
              </a>
            </div>

          </div>

        </div> 

      </div>

    </div>
  </section>

  <!-- end services section -->

  <!-- start about section -->
  <section class="p-5" id="about">
    <div class="container py-5">
      <div class="row justify-content-between align-item-center">
        <div class="col-md">
          <a href="#"><img src="SEC0919-Mobile-Feat-slide1_900px.jpg" class="img-fluid"></a>

        </div>
        <div class="col-md p-5">
          <h1>Your Data is <span class="text-warning"> 100 % Safe</span> With Us</h1>
          <p>The biggest worry in giving a phone to repair is whether my phone date will be accessed or lost .At phonerepairs.lk we make sure your data inside the phone is safe & won’t be accessed.</p>
          
          <a href="#" class="custom-button mt-3"><i class="bi bi-chevron-right"></i>Read More</a>
        </div>

      </div>

    </div>

  </section>
  <!-- end about section -->

  <!-- start learn section -->
  <section class="bg-dark text-light" id="learn">
    <div class="container py-5">
      <div class="row align-item-center justify-content-between">
        <div class="col-md p-5">
          <h1>We have <span class="text text-warning"> 10 Years</span> of Experience</h1>
          <p>We have been stationed & repairing on our location for 23 years. We have the repairing experience of more than thousands of phones from our inception.</p>

          <p><img src="https://phonerepairs.lk/wp-content/themes/blankslate/assets/images/icon/c1.png" width="75" height="75" alt="Laptop"> 
            <h3>Accessories</h3>
            <p> We use original & quality parts always for our clients devices.</p>
          </p>


          <p><img src="https://phonerepairs.lk/wp-content/themes/blankslate/assets/images/icon/c2.png" width="75" height="75" alt="Laptop"> 
            <h3>Analysis</h3>
            <p> All analysis of the issues are accurate & done very quickly.</p>
          </p>

           
        </div> 
        <div class="col-md">
          <a href="#">
            <img src="pexels-hammad-khalid-1786433.jpg" width="500" height="700"class="img-fluid">
          </a>

        </div>   
      </div>

    </div>
  </section>
  <br><br>
  <?php include_once("./Common/footer.php") ?> 
</body>

</html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Status</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" >
    <link rel="stylesheet" href="statusview.css">
  </head>
  <body>
  <?php include_once("./Common/header.php") ?>
  <div class="center">
      <h1> View status of your Phone Repaired</h1>

      <form method="post">
        <div class="txt_field">
          <input type="text" required>
        
          <label>Client code</label>
        </div>
      
        <input type="submit" value="OK" class="custom-button">
        <div class="signup_link">
   
        </div>
      </form>
    </div>
    <script>
    $(function(){
        $('#check_status').submit(function(e){
            e.preventDefault()
            location.href="./?page=view_status&"+$(this).serialize();
        })
    })
</script>

  </body>
</html>
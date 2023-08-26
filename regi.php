<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
<form class="form0" action="technician1.php" target="" method="POST" onsubmit="return checkpassword ()">
  
  <div>
      <hr><br>
      <center>
      <table>
          <tr>
              <td>
                   ID :<br/>
                  <input type="text" name="techid" placeholder="Technician id" required>
              </td>
          </tr>
          <tr>
              <td>
                   Name:<br/>
                  <input type="text" name="techname" placeholder="Name" required>
              </td>
          </tr>
  
          <tr>
              <td>
                  NIC:<br/>
                  <input type="text" name="technic" pattern="[0-9]{12}" placeholder="200116404223" required>
              </td>
          </tr> 
          <tr>
              <td colspan="2">
                  Address:<br/>
                  <textarea name="techaddress" class="area" rows="8" cols="50" required></textarea>
              </td>
          </tr>
          <tr>
              <td >
                  Mobile Number :<br/>
                  <input type="phone" name="tmobile" pattern="[0-9]{10}" placeholder="0714782233" required>
              </td>
          </tr>

          <tr>
              <td colspan="2">
                  Email:<br>
          <input type="email" name="techemail" placeholder="abc@gmail.com" Pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}" required>
              </td>
          </tr>
          <tr>
              <td colspan="2">
                  <input type="checkBox" class="inputstyle" id="checkBox" onclick="enableButton()">Accept Privacy Police & Terms
              </td>
          </tr>
          <tr>
              <td colspan="2">
                  <center><input type="submit"  id="submitbtn" value="Register"></center>
              </td>
          </tr>

      </table>
<div class="container signin">
     <p>View Register Account details? <a href="data.php">View</a>.</p>
</div>
</center>
</div>
</form> -->
</body>
</html>
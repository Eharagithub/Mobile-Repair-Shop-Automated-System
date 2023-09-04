<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <span class="user-name">Kasthuri</span>
    <div>
						<a href="#"><i class="dw dw-user1"></i> Profile</a><hr>
						<a href="#"><i class="dw dw-settings2"></i> Setting</a>
						<hr>
						<a href="login.html"><i class="dw dw-logout"></i> Log Out</a>
					</div>
                    <div class="left-side-bar">
		<div>
			<a href="index.html">
				<img src="C:\Users\User\Desktop\Mobile phone repair shop\SRC\images\logo.png" width="50px">
				<h4 style="color: #f3f3f4;font-size: 20px;padding: 15px"> Mobile Phone Repair Shop</h4>
			</a>
		</div>
        <div>
				<ul id="accordion-menu">
					<li>
						<a href="index.html">
							<span>Dashboard</span>
						</a>
					</li>
					<li>
						<a href="customer.php">
							<span>Customer list</span>
						</a>
					</li>
					<li>
						<a href="technician.php">
							<span>Technician list</span>
						</a>
					</li>
					<li>
						<a href="devices.php">
							<span>Devices</span>
						</a>
					</li>
					<li>
						<a href="workorder.php">
							<span>Work order list</span>
						</a>
					</li>
					<li>
						<a href="delivary.php">
							<span>Delivary</span>
						</a>
					</li>
					<li>
						<a href="history.php">
							<span>History</span>
						</a>
					</li>
					<li>
						<a href="location.php">
							<span>Location</span>
						</a>
					</li>
					<li>
						<a href="adminuser.php">
							<span>Admin User List</span>
						</a>
					</li>
					<li>
						<a href="Settings.php">
							<span>Settings</span>
						</a>
					</li>
				</ul>
			</div>
            <div>
                <h4>Admin User List</h4>
                <nav aria-label="breadcrumb" role="navigation">
									<ol>
										<li><a href="index.html">Home</a></li>
										<li>Admin User list</li>
									</ol>
								</nav>
            </div>
            <!-- Simple Datatable start -->
			<div>
				<h4 class="text-blue h4">Admin User List</h4>
			</div>
			<div>
				<?php
					$conn = new 
					mysqli('localhost','root','','reg');
    
    				if ($conn->connect_error) {
        				die("Connection failed: " . $conn->connect_error);
    				}
    
   					$sql = "SELECT * FROM adminuser;";
    				$result = $conn->query($sql);

					if ($result) {
						echo "<table>";
						echo "
						<tr>
							<th>UserId</th>
							<th>UserNIC</th>
							<th>UserName</th>
							<th>UserPhone</th>
							<th>UserAddress</th>
                            <th>Useremail</th>
                            <th>LocationId</th>
							<th>Action</th>
						</tr>";
						while ($row = $result->fetch_assoc()) {
							echo "<tr>";
							echo "<td>" . $row["UserId"] . "</td>";
							echo "<td>" . $row["UserNIC"] . "</td>";
							echo "<td>" . $row["UserName"] . "</td>";
							echo "<td>" . $row["UserPhone"] . "</td>";
							echo "<td>" . $row["UserAddress"] . "</td>";
                            echo "<td>" . $row["Useremail"] . "</td>";
                            echo "<td>" . $row["LocationId"] . "</td>";
							echo "</tr>";
						}
					
						echo "</table>";
					} else {
						echo "Query failed: " . $conn->error;
					}
					
					$conn->close();
				?>
					<div>
						<a href="#" data-toggle="modal" data-target="#view"> View</a>
						<a href="#">Edit</a>
						<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete">Delete</a>
					</div>
			</div>
			<h2>Add User</h2>

		<form class="form0" action="adminuser1.php" target="" method="POST" onsubmit="return checkpassword ()">
  
        <div>
        	<hr><br>
    		<center>
        	<table>
        		<tr>
            		<td>
                        UserId:<br/>
                		<input type="text" name="UserId" placeholder="Name" required>
            		</td>
        		</tr>
                <tr>
					<td>
                        UserNIC:<br/>
						<input type="text" name="UserNIC" pattern="[0-9]{12}" placeholder="200116404223" required>
					</td>
				</tr> 
				<tr>
					<td >
                        UserName:<br/>
						<input type="text" name="UserName" placeholder="Model" required>
					</td>
                </tr>
                <tr>
					<td >
                        UserPhone<br/>
						<input type="phone" name="UserPhone" pattern="[0-9]{10}" placeholder="0714782233" required>
					</td>
					
				</tr>
				<tr>
					<td colspan="2">
                        UserAddress<br/>
						<textarea name="UserAddress" class="area" rows="8" cols="50" required></textarea>
					</td>
				</tr>
                <tr>
					<td colspan="2">
						UserEmail:<br>
				<input type="email" name="Useremail" placeholder="abc@gmail.com" Pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}" required>
					</td>
				</tr>
                <tr>
            		<td>
                        LocationId:<br/>
                		<input type="text" name="LocationId" placeholder="Name" required>
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
	</form>

	<!-- Delete modal -->
	<div>
		<h3 class="text-white mb-15"><i class="fa fa-exclamation-triangle"></i> Alert</h3>
		<p>Are you sure you want to delete this Device?</p>
		<button type="button" class="btn btn-light" data-dismiss="modal">Yes</button>
		<button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
		</div>
</div>
</body>
</html>
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
						<a href="workorder.html">
							<span>Work order list</span>
						</a>
					</li>
					<li>
						<a href="delivary.html">
							<span>Delivary</span>
						</a>
					</li>
					<li>
						<a href="history.html">
							<span>History</span>
						</a>
					</li>
					<li>
						<a href="location.html">
							<span>Location</span>
						</a>
					</li>
					<li>
						<a href="Adminuserlist.html">
							<span>Admin User List</span>
						</a>
					</li>
					<li>
						<a href="Settings.html">
							<span>Settings</span>
						</a>
					</li>
				</ul>
			</div>
            <div>
                <h4>Devices</h4>
                <nav aria-label="breadcrumb" role="navigation">
									<ol>
										<li><a href="index.html">Home</a></li>
										<li>Device list</li>
									</ol>
								</nav>
            </div>
            <!-- Simple Datatable start -->
			<div>
				<h4 class="text-blue h4">Device List</h4>
			</div>
			<div>
				<?php
					$conn = new 
					mysqli('localhost','root','','reg');
    
    				if ($conn->connect_error) {
        				die("Connection failed: " . $conn->connect_error);
    				}
    
   					$sql = "SELECT * FROM device;";
    				$result = $conn->query($sql);

					if ($result) {
						echo "<table>";
						echo "
						<tr>
							<th>IMINumber</th>
							<th>Brand</th>
							<th>Model</th>
							<th>Extra</th>
							<th>CusNIC</th>
							<th>Action</th>
						</tr>";
						while ($row = $result->fetch_assoc()) {
							echo "<tr>";
							echo "<td>" . $row["IMINumber"] . "</td>";
							echo "<td>" . $row["Brand"] . "</td>";
							echo "<td>" . $row["Model"] . "</td>";
							echo "<td>" . $row["Extra"] . "</td>";
							echo "<td>" . $row["id_num"] . "</td>";
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
			<h2>Add Device</h2>

		<form class="form0" action="devices1.php" target="" method="POST" onsubmit="return checkpassword ()">
  
        <div>
        	<hr><br>
    		<center>
        	<table>
        		<tr>
            		<td>
						IMI Number:<br/>
                		<input type="text" name="IMINumber" placeholder="Name" required>
            		</td>
        		</tr>
        
				<tr>
					<td>
						Brand:<br/>
						<input type="text" name="Brand" placeholder="name" required>
					</td>
				</tr> 
				<tr>
					<td >
						Model<br/>
						<input type="text" name="Model" placeholder="Model" required>
					</td>
					<tr>
					<td colspan="2">
						Extra:<br/>
						<textarea name="Extra" class="area" rows="8" cols="50" required></textarea>
					</td>
				</tr>
					<td >
						Customer id number:<br/>
						<input type="text" name="id_num" placeholder="Customer ID number" required>
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
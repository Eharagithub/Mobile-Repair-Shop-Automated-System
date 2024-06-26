<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Login</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">
</head>
<body class="login-page">
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-12">
					<div class="login-box bg-white box-shadow border-radius-10">
						<form>
							<div class="select-role">
								<div class="btn-group btn-group-toggle" data-toggle="buttons">
								<?php
// Define a PHP array to hold the button data
$buttons = [
    [
        "label" => "Admin - Head Office",
        "href" => "http://localhost/Mobile-Repair-Shop/dashboard/index.php",
        "icon" => "fa-user",
        "active" => true,
    ],
    [
        "label" => "Sub Office",
        "href" => "http://localhost/Mobile-Repair-Shop/suboffice/index.php",
        "icon" => "fa fa-users",
        "active" => true,
    ],
	[
        "label" => "Technician",
        "href" => "http://localhost/Mobile-Repair-Shop/technician/index.php",
        "icon" => "fa fa-users",
        "active" => true,
    ],
];

// Loop through the buttons and generate HTML
foreach ($buttons as $button) {
    $label = $button["label"];
    $href = $button["href"];
    $icon = $button["icon"];
    $active = $button["active"];

    // Determine if the label should have the "active" class
    $activeClass = $active ? 'active' : '';

    echo '<label class="btn ' . $activeClass . '" style="display: inline-block; background-color: #eee; padding: 10px 20px; border-radius: 5px; margin-right: 10px; cursor: pointer;">
              <input type="radio" name="options" id="' . strtolower($label) . '" style="display: none;">
              <i class="fa ' . $icon . '" style="margin-right: 5px;"></i>
              <a href="' . $href . '" style="text-decoration: none; color: inherit;">' . $label . '</a>
          </label>';
}
?>

								</div>
							</div>
							<div class="input-group custom">
								<input type="text" class="form-control form-control-lg" placeholder="Username">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
							</div>
							<div class="input-group custom">
								<input type="password" class="form-control form-control-lg" placeholder="**********">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
							<div class="row pb-30">
								<div class="col-6">
									
								</div>
								<div class="col-6">
									<div class="forgot-password"><a href="forgot-password.php"></a></div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
										<!--
											use code for form submit
											<input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
										-->
										<a class="btn btn-primary btn-lg btn-block" href="index.php">Login</a>
									</div>
									<div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">OR</div>
									<div class="input-group mb-0">
										<a class="btn btn-outline-primary btn-lg btn-block" href="http://localhost/Mobile-Repair-Shop/index.php">Go to Website</a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
</body>
</html>
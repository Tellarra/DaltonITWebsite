<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Sign Up</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
	<link rel="stylesheet" href="../css/screen.css">
	<style type="text/css">
		body {
			font: 14px sans-serif;
		}
		
		.wrapper {
			width: 350px;
			padding: 20px;
		}
	</style>
</head>

<body id="body-login">
		<div id="page">
			<header>
				<a class="logo" title="Dalton It" href="../index.html"><span>Dalton It</span></a>
			</header>
			<div class="grid">
				<?php 
	//include some required files
	require_once("../DAL/db_functions.php");
	require_once("../BLL/validate_data.php");

	$userName = $passwordUser = $confirm_password = "";
	$username_err = $password_err = $confirm_password_err = "";
	
	
	$booOk = 1;
	if(isset($_POST['submit']) ) {
		console_log("submitted");
		console_log($userName, $passwordUser, $confirm_password);
		validateSignUp("addRecord");
	}

	//create table project details
	echo"<div class='wrapper'>";
	echo "<form action='signUp.php' method='POST'>";
	echo "<div class='form-group'>";
	echo "<label>Username</label>";
	echo "<input type='text' name='userName' class='form-control' value='".$userName."'>";
	echo "<span class='help-block'>".$username_err."</span>";
	echo "</div>";

	echo "<div class='form-group'>";
	echo "<label>Password</label>";
	echo "<input type='password' name='passwordUser' class='form-control' value='".$passwordUser."'>";
	echo "<span class='help-block'>".$password_err."</span>";
	echo "</div>";
	
	echo "<div class='form-group'>";
	echo "<label>Confirm Password</label>";
	echo "<input type='password' name='confirm_password' class='form-control' value='".$confirm_password."'>";
	echo "<span class='help-block'>".$confirm_password_err."</span>";
	echo "</div>";

	echo "<div class='form-group'>";
	echo "<input type='submit' class='btn btn-primary' name='submit' value='Submit'>";
	echo "<input type='reset' class='btn btn-default' value='Reset'>";
	echo "</div>";
	echo "<p>Already have an account? <a href='html/loginPage.php'>Login here</a>.</p>";
	echo "</form></div></div>";
?>
			</div>
			<nav>
				<ul>
					<li>
						<a title="About Us" href="aboutUs.html">About Us</a>
					</li>
					<li>
						<a title="Contact Us" href="contactUs.html">Contact Us</a>
					</li>
					<li>
						<a title="Log in" href="html/loginPage.html">Log in</a>
					</li>
				</ul>
			</nav>
		</div>
	</body>

</html>
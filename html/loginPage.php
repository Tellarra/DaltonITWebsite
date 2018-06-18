<!doctype html>
<?php
//include some required files
require_once( "../DAL/db_functions.php" );
require_once( "../BLL/validate_data.php" );

$userName = $passwordUser = "";
$username_err = $password_err = "";

if ( isset( $_POST[ 'submit' ] ) ) {
	console_log( "submitted" );
	validateLogin( "login" );
}
?>
<html>

<head>
	<meta charset="utf-8">
	<title>Login</title>
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
			<a class="logo" title="Dalton It" href="../index.php"><span>Dalton It</span></a>
		</header>
		<div class="grid">
			<?php 

	//create table project details
	echo"<div class='wrapper'>";
	echo "<form action='loginPage.php' method='POST'>";
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
	echo "<input type='submit' class='btn btn-primary' name='submit' value='Login'><br /><br />";
	echo "<input type='reset' class='btn btn-default' value='Reset'>";
	echo "</div>";
	echo "<p>Already have an account? <a href='signUp.php'>Login here</a>.</p>";
	echo "</form></div></div>";
?>
<nav>
	<ul>
		<li>
			<a title="About Us" href="html/aboutUs.html">About Us</a>
		</li>
		<li>
			<a title="Contact Us" href="html/contactUs.html">Contact Us</a>
		</li>
		<?php
		//include some required files
		require_once( "../DAL/db_functions.php" );
		require_once( "../BLL/validate_data.php" );

		global $_COOKIE;

		if ( !isset( $_COOKIE[ 'Dalton_IT_auth' ] ) ) {
			echo "<li>";
			echo "<a title='Login' href='html/loginPage.php'>Login</a>";
			echo "</li>";
			//echo "Cookie named '" . $cookie_name . "' is not set!";
		} else {
			//echo "Cookie '" . $cookie_name . "' is set!<br>";
			//echo "Value is: " . $_COOKIE['Dalton_IT_auth'];
			echo "<li>";
			echo "<a title='View Consultant Records' href='../php/viewConsultant.php'>View Consultant</a>";
			echo "</li>";

			echo "<li>";
			echo "<a title='View Project Records' href='../php/viewProject.php'>View Project</a>";
			echo "</li>";

			echo "<li>";
			echo "<a title='View Project Consultant Record' href='../php/viewProjectStaff.php'>View Project Consultant</a>";
			echo "</li>";
		}
		?>
	</ul>
</nav>

<footer>
	&copy; Dalton It
	<div class="content">
		<a title="Privacy Policy" href="#">Privacy Policy</a>
		<a title="Terms of Service" href="#">Terms of Service</a>
	</div>
</footer>
</body>

</html>
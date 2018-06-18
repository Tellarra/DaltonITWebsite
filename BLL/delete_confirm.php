<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Delete Consultant</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
	<link type="text/css" rel="stylesheet" href="../css/screen.css">
</head>

<body>
	<div id="page">
		<header>
			<a class="logo" title="Dalton It" href="index.php"><span>Dalton It</span></a>
		</header>
		<p></p>
		<?php
		require_once( "../DAL/db_functions.php" );

		echo "<h2 style='text-align:center'>Are you sure you want to delete the <em>" . $_GET[ 'ID' ] . "</em> record?</h2>";
	
		echo "<form action='delete_confirm.php' method='GET'>";
		echo "<div class='grid'>";
		echo "<input type='submit' class='btn btn-primary' name='okDelete' value='Delete Record'/><br /><br />";
		echo "<input type='submit' class='btn btn-default' name='cancel' value='Cancel Delete'/><br /><br />";
		echo "<input type='hidden' name='ID' value='" . $_GET[ 'ID' ] . "' />";
		echo "</div></form>";
		$booDeleteDone = false;

		if ( isset( $_GET[ 'okDelete' ] ) ) {
			echo $_GET[ 'ID' ];
			//$strBranch_code = $_GET[ID]; 

			deleteRecord( "d_consultant", "Consultant_Id", $_GET[ 'ID' ], "varchar" );
			echo $_GET[ 'ID' ];
			//Check to see if the record was deleted
			if ( $booDeleteDone ) {
				//Redirect to the view Consultant page if no errors occurred
				header( "Location: ../php/viewConsultant.php" );
			} else {
				echo "<p class='error'><br />Warning: You can not delete this record<br />";
				echo "Other records in the system depend on it<br />";
				echo "Press 'Cancel Delete' to return</p>";
			}
		}

		if ( isset( $_GET[ 'cancel' ] ) ) {
			header( "Location: ../php/viewConsultant.php" );
		}
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
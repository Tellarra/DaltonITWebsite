<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Dalton Consultant Details</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
	<link rel="stylesheet" href="../css/screen.css" type="text/css">
</head>

<body>
	<div id="page">
		<header>
			<a class="logo" title="Dalton It" href="index.php"><span>Dalton It</span></a>
		</header>
		<p></p>
		<h2>View Consultant Details</h2>

		<?php

		//Include files from the DAL
		require_once( "../DAL/db_functions.php" );

		//Run Query on BRANCH table
		readQuery( "d_consultant" );

		//If there are any branch details/records in the database then continue
		if ( $numRecords === 0 ) {
			echo "<p>No Consultant Found!</p>";
		} else {
			//Will hold the records returned
			$arrRows = NULL;

			//Create Table and Heading
			echo "<div class='table-responsive'>";
			echo "<table class='table table-stripped table-bordered' border='1' width='100%'";
			echo "<tr style='background-color:#d50000; color:black;'>";
			echo "<th>Consultant ID</th>";
			echo "<th>First Name</th>";
			echo "<th>Last Name</th>";
			echo "<th>Home Phone</th>";
			echo "<th>Mobile</th>";
			echo "<th>Email</th>";
			echo "<th>Date Commenced</th>";
			echo "<th>DOB</th>";
			echo "<th>Street Address</th>";
			echo "<th>Suburbs</th>";
			echo "<th>Post Code</th>";
			echo "<th></th>";
			echo "</tr>";

			//Loop through branches and add row to table for each record
			while ( $arrRows = $stmt->fetch( PDO::FETCH_ASSOC ) ) {
				echo "<tr style='background-color: white;'>";
				echo "<td>" . $arrRows[ 'Consultant_Id' ] . "</td>";
				echo "<td>" . $arrRows[ 'First_Name' ] . "</td>";
				echo "<td>" . $arrRows[ 'Last_Name' ] . "</td>";
				echo "<td>" . $arrRows[ 'Home_Phone' ] . "</td>";
				echo "<td>" . $arrRows[ 'Mobile' ] . "</td>";
				echo "<td>" . $arrRows[ 'Email' ] . "</td>";
				echo "<td>" . $arrRows[ 'Date_Commenced' ] . "</td>";
				echo "<td>" . $arrRows[ 'DOB' ] . "</td>";
				echo "<td>" . $arrRows[ 'Street_Address' ] . "</td>";
				echo "<td>" . $arrRows[ 'Suburb' ] . "</td>";
				echo "<td>" . $arrRows[ 'Post_Code' ] . "</td>";

				echo "<td><a href='editConsultant.php?ID=$arrRows[Consultant_Id]' style='color:black;'>Edit</a>";
				echo "<br /><a href='../BLL/delete_confirm.php?TYPE=Consultant&amp;ID=$arrRows[Consultant_Id]' style='color:black;'>Delete</a></td></tr>";
			}

			echo "</table>";
			echo "<input type='submit' value='Add a Consultant' class='btn btn-primary'/>";
			echo "<form action='../php/addConsultant.php' method='post'>";
			echo "</div>";
			echo "</form>";
			echo "<p></p>";
			
			//echo "<p></p><p>$numRecords Record Returned</p>";
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
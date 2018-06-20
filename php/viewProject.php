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
			<a class="logo" title="Dalton It" href="../index.php"><span>Dalton It</span></a>
		</header>
		<p></p>
		<h2>View Project Details</h2>

		<?php

		//Include files from the DAL
		require_once( "../DAL/db_functions.php" );
		
		if ( $_GET[ 'logOut' ] ) {
			logOut();
		}
		
		//Run Query on BRANCH table
		readQuery( "d_project" );
		
		//If there are any branch details/records in the database then continue
		if ( $numRecords === 0 ) {
			echo "<p>No Project Found!</p>";
		} else {
			//Will hold the records returned
			$arrRows = NULL;

			//Create Table and Heading
			echo "<div class='table-responsive'>";
			echo "<table class='table table-stripped table-bordered' border='1' width='100%'>";
			echo "<tr>";
			echo "<th>Project_No</th>";
			echo "<th>Project_Name</th>";
			echo "<th>Project_Description</th>";
			echo "<th>Project_Manager</th>";
			echo "<th>Start_Date</th>";
			echo "<th>Finish_Date</th>";
			echo "<th>Budget</th>";
			echo "<th>Cost_To_Date</th>";
			echo "<th>Tracking_Statement</th>";
			echo "<th>Client_No</th>";
			echo "<th></th>";
			echo "</tr>";

			//Loop through branches and add row to table for each record
			while ( $arrRows = $stmt->fetch( PDO::FETCH_ASSOC ) ) {
				echo "<tr>";
				echo "<td>" . $arrRows[ 'Project_No' ] . "</td>";
				echo "<td>" . $arrRows[ 'Project_Name' ] . "</td>";
				echo "<td>" . $arrRows[ 'Project_Description' ] . "</td>";
				echo "<td>" . $arrRows[ 'Project_Manager' ] . "</td>";
				echo "<td>" . $arrRows[ 'Start_Date' ] . "</td>";
				echo "<td>" . $arrRows[ 'Finish_Date' ] . "</td>";
				echo "<td>" . $arrRows[ 'Budget' ] . "</td>";
				echo "<td>" . $arrRows[ 'Cost_To_Date' ] . "</td>";
				echo "<td>" . $arrRows[ 'Tracking_Statement' ] . "</td>";
				echo "<td>" . $arrRows[ 'Client_No' ] . "</td>";


				//Later will add code here to edit and delete this record
				echo "<td><a href='editProject.php?ID=$arrRows[Project_No]' style='color:black;'>Edit</a>";
				echo "<br /><a href='../BLL/delete_confirm_project.php?TYPE=Consultant&amp;ID=$arrRows[Project_No]' style='color:black;'>Delete</a></td></tr>";
			}

			echo "</table>";
			echo "<form action='../php/addProject.php' method='post'>";
			echo "</div>";
			echo "<input type='submit' class='btn btn-primary' value='Add a Project' />";
			echo "</form>";
			echo "<form action='viewProject.php' method='GET'>";
			echo "<br /><input type='submit' name='logOut' value='Log out' class='btn btn-danger'/>";
			echo "</form>";
			//echo "<p></p><p>$numRecords Record Returned</p>";
		}
		?>
		<nav>
			<ul>
				<li>
					<a title="About Us" href="../html/aboutUs.php">About Us</a>
				</li>
				<li>
					<a title="Contact Us" href="../html/contactUs.php">Contact Us</a>
				</li>
				<?php
				//include some required files
				require_once( "../DAL/db_functions.php" );
				require_once( "../BLL/validate_data.php" );

				session_start();
				
				if ( !isset( $_SESSION[ 'username' ] ) || empty( $_SESSION[ 'username' ] ) ) {
					echo "<li>";
					echo "<a title='Login' href='html/loginPage.php'>Login</a>";
					echo "</li>";
				} else {
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
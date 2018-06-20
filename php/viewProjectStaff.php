<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Dalton Consultant Details</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
	<link rel="stylesheet" href="../css/screen.css" type="text/css">
</head>

<body>
	<div id="page">
		<header>
			<a class="logo" title="Dalton It" href="../index.php"><span>Dalton It</span></a>
		</header>
		<div class="main" align='center'>
			<p></p>
			<h2>View Project Consultant Details</h2>

			<?php

			//Include files from the DAL
			require_once( "../DAL/db_functions.php" );
			require_once( "../BLL/validate_data.php" );
			
			if ( $_POST[ 'logOut' ] ) {
				console_log("in log out");
				logOut();
			}
			
			readQuery( "d_project" );
			//console_log($sqlStr);
			//If there are any details/records in the database then continue
			if ( $numRecords === 0 ) {
				echo "<p>No Project Consultant found!</p>";
			} else {
				//Will hold the records returned
				//$arrRows = NULL;

				echo "<form class='form' action='viewProjectStaff.php' method='POST'>";
				//echo "<label class='label' for='select'>Please Select a Project</label>";
				echo "<select class='select' name='Project_No' style='margin-top:40px; float:left;'>";
				//Read Consultant List for selecting Project Manager

				if ( $numRecords === 0 ) {
					echo "Enter project Details in project Table First.";
					$booOk = 0;
				} else {
					while ( $arrRows = $stmt->fetch( PDO::FETCH_ASSOC ) ) {
						//console_log($arrRows['Project_No']);
						echo "<option value=\"{$arrRows['Project_No']}\">{$arrRows['Project_No']} - {$arrRows['Project_Name']}</option>";
					}
					echo "</select>";
					echo "<input type='submit' style='margin-top:40px;' class='btn btn-primary' name='btnShow' value='Show the project'/>";
					echo "<input style='margin-top:40px;' type='submit' name='logOut' value='Log out' class='btn btn-danger'/>";
				}

				//echo "</p>";
				echo "</form>";
			}

			if ( isset( $_POST[ 'btnShow' ] ) || isset( $_GET[ "ID" ] ) ) {
				console_log( "in the if" );
				if ( isset( $_POST[ "Project_No" ] ) ) {
					$strProject_No = $_POST[ "Project_No" ];
					console_log( $_POST[ "Project_No" ] );
				}
				if ( isset( $_GET[ "ID" ] ) ) {
					$strProject_No = $_GET[ "ID" ];
				}
				console_log( $trProject_No );
				readQuerySingle( "d_project_consultant", "Project_No", $strProject_No, "nonnumeric" );
				console_log( $numRecords );
				//Test to see that we get a single record returned
				if ( $numRecords == 0 ) {
					echo "<span class='error'>No matching Project records found</span>";
				} else {
					console_log( "in else" );
					//get the one and only record from the database

					echo "<table style='margin-top:40px; class='table table-stripped table-bordered' id='dalton' border='1' width='100%'>";
					echo "<tr>";
					echo "<th>Consultant_Id</th>";
					echo "<th>Project_No</th>";
					echo "<th>Date_Assigned</th>";
					echo "<th>Date_Completed</th>";
					echo "<th>Role</th>";
					echo "<th>Hours_Worked</th>";
					echo "<th></th>";
					echo "</tr>";

					//Loop through branches and add row to table for each record
					while ( $arrRows = $stmt->fetch( PDO::FETCH_ASSOC ) ) {
						echo "<tr>";
						echo "<td>" . $arrRows[ 'Consultant_Id' ] . "</td>";
						echo "<td>" . $arrRows[ 'Project_No' ] . "</td>";
						echo "<td>" . $arrRows[ 'Date_Assigned' ] . "</td>";
						echo "<td>" . $arrRows[ 'Date_Completed' ] . "</td>";
						echo "<td>" . $arrRows[ 'Role' ] . "</td>";
						echo "<td>" . $arrRows[ 'Hours_Worked' ] . "</td>";

						echo "<td><a href='editProjectStaff.php?ID=$arrRows[Project_No]' style='color:black;'>Edit</a>";
						echo "<br /><a href='../BLL/delete_confirm_project_staff.php?TYPE=Project_No&amp;ID=$arrRows[Project_No]' style='color:black;'>Delete</a></td></tr>";
					}
					echo "</table>";
				}
				echo "<form action='../php/addProjectStaff.php' method='post'>";
				echo "<input type='hidden' name='strProject_No' value='" . $Project_No . "' />";
				echo "<input type='submit' class='btn btn-primary' value='Add a Project Staff' />";
				echo "</form>";
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
					//require_once( "../DAL/db_functions.php" );
					require_once( "../BLL/validate_data.php" );

					session_start();

					if ( !isset( $_SESSION[ 'username' ] ) || empty( $_SESSION[ 'username' ] ) ) {
						echo "<li>";
						echo "<a title='Login' href='html/loginPage.php'>Login</a>";
						echo "</li>";
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
		</div>
</body>

</html>
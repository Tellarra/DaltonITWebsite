<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Edit Consultant</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
	<link rel="stylesheet" href="../css/screen.css" type="text/css">
</head>

<body>
	<div id="page">
		<header>
			<a class="logo" title="Dalton It" href="index.php"><span>Dalton It</span></a>
		</header>
		<p></p>
		<?php
		//includ some required files
		require_once( "../DAL/db_functions.php" );
		require_once( "../BLL/validate_data.php" );

		$strConsultant_Id = $strProject_No = $strDate_Assigned = $strDate_Completed = "";
		$strRole = $strHours_Worked = "";

		$booConsultant_Id = $booProject_No = $booDate_Assigned = $booDate_Completed = "";
		$booRole = $booHours_Worked = "";

		$booOk = 1; //to check everything

		if ( isset( $_POST[ 'submit' ] ) ) {
			validateProjectStaff( "editRecord" );
			//insertProject();
		} else {
			if ( isset( $_GET[ 'ID' ] ) ) {
				$strProject_No = $_GET[ 'ID' ];
			}
			readQuerySingle( "d_project_consultant", "Project_No", $strProject_No, "nonnumeric" );
			//Test to see that we get a single record returned
			if ( $numRecords == 0 ) {
				echo "<span class='error'>No matching Project Consultant records found</span>";
			} else {
				//get the one and only record from the database
				$arrRows = $stmt->fetch( PDO::FETCH_ASSOC ); // Associative array - referencing column by his name
				$strConsultant_Id = $arrRows[ "Consultant_Id" ];
				$strProject_No = $arrRows[ "Project_No" ];
				$strDate_Assigned = $arrRows[ "Date_Assigned" ];
				$strDate_Completed = $arrRows[ "Date_Completed" ];
				$strRole = $arrRows[ "Role" ];
				$strHours_Worked = $arrRows[ "Hours_Worked" ];
			}
		}

		//create table project details
		echo "<form action='editProjectStaff.php' method='POST'>";
		echo "<table id='dalton'>";

		echo "<tr><th>Consultant ID</th>";
		echo "<td><select name='strConsultant_Id'>";
		//Read Consultant List for selecting Project Manager
		readQuery( "d_consultant" );
		if ( $numRecords == 0 ) {
			echo "Enter Manager Details in Consultant Table First.";
			$booOk = 0;
		} else {
			while ( $arrRows = $stmt->fetch( PDO::FETCH_ASSOC ) ) {
				$selected = $strConsultant_Id == $arrRows[ 'Consultant_Id' ] ? "selected=\"$strConsultant_Id\"" : "";
				echo "<option {$selected} value=\"{$arrRows['Consultant_Id']}\">{$arrRows['Consultant_Id']} - {$arrRows['First_Name']} {$arrRows['Last_Name']}</option>";
			}
			echo "</select></td></tr>";
		}

		echo "<tr><th>Project Number</th>";
		echo "<td><select name='strProject_No'>";
		//Read Consultant List for selecting Project Manager
		readQuery( "d_project" );
		if ( $numRecords == 0 ) {
			echo "Enter Manager Details in Consultant Table First.";
			$booOk = 0;
		} else {
			while ( $arrRows = $stmt->fetch( PDO::FETCH_ASSOC ) ) {
				$selected = $strProject_No == $arrRows[ 'Project_No' ] ? "selected=\"$strProject_No\"" : "";
				echo "<option {$selected} value=\"{$arrRows['Project_No']}\">{$arrRows['Project_No']} - {$arrRows['Project_Manager']}</option>";
			}
			echo "</select></td></tr>";
		}

		echo "<tr><th>Date Assigned</th>";
		echo "<td><input type='date' name='strDate_Assigned' size='20' value='" . $strDate_Assigned . "' /><td>";
		if ( $booDate_Assigned ) {
			echo "<td>Please enter the date when the consultant has been assigned.</td>";
		}
		echo "</tr>";

		echo "<tr><th>Date Completed</th>";
		echo "<td><input type='date' name='strDate_Completed' size='20' value='" . $strDate_Completed . "' /><td>";
		echo "</tr>";

		echo "<tr><th>Role</th>";
		echo "<td><input type='text' name='strRole' size='20' value='" . $strRole . "' /><td>";
		if ( $booRole ) {
			echo "<td>Please enter the role of the consultant.</td>";
		}
		echo "</tr>";

		echo "<tr><th>Hours worked</th>";
		echo "<td><input type='text' name='strHours_Worked' size='20' value='" . $strHours_Worked . "' /><td>";
		if ( $booHours_Worked ) {
			echo "<td>Please enter the hours worked of the consultant.</td>";
		}
		echo "</tr>";

		echo "<tr><td></td><td><input type='submit' name='submit' value='Edit Project Staff Details' /><td></tr>";
		echo "</table></form>";
		?>
		<nav>
			<ul>
				<li>
					<a title="About Us" href="../html/aboutUs.html">About Us</a>
				</li>
				<li>
					<a title="Contact Us" href="../html/contactUs.html">Contact Us</a>
				</li>
				<?php
				//include some required files
				require_once( "../DAL/db_functions.php" );
				require_once( "../BLL/validate_data.php" );

				global $_COOKIE;

				if ( !isset( $_COOKIE[ 'Dalton_IT_auth' ] ) ) {
					echo "<li>";
					echo "<a title='Login' href='../html/loginPage.php'>Login</a>";
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
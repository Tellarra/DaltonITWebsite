<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Add Consultant</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
	<link rel="stylesheet" href="../css/screen.css" type="text/css">
</head>

<body>
	<div id="page">
		<header>
			<a class="logo" title="Dalton It" href="index.php"><span>Dalton It</span></a>
		</header>
		<p></p>
		<h2 style="text-align: center">Add a Project Consultant</h2>
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
			validateProjectStaff( "addRecord" );
		}
		if ( isset( $_POST[ 'cancel' ] ) ) {
			header( "Location: ../php/viewProjectStaff.php" );
		}

		//create table project details
		echo "<form action='addProjectStaff.php' method='POST'>";
		echo "<table class='table table-bordered table-stripped'>";

		echo "<tr><th>Consultant ID</th>";
		echo "<td><select name='strConsultant_Id'>";
		//Read Consultant List for selecting Project Manager
		readQuery( "d_consultant" );
		if ( $numRecords == 0 ) {
			echo "Enter Manager Details in Consultant Table First.";
			$booOk = 0;
		} else {
			while ( $arrRows = $stmt->fetch( PDO::FETCH_ASSOC ) ) {
				echo "<option value=\"{$arrRows['Consultant_Id']}\">{$arrRows['Consultant_Id']} - {$arrRows['First_Name']} {$arrRows['Last_Name']}</option>";
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
				echo "<option value=\"{$arrRows['Project_No']}\">{$arrRows['Project_No']} - {$arrRows['Project_Manager']}</option>";
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
		if ( $booDate_Completed ) {
			echo "<td>Please enter the last day of the consultant.</td>";
		}
		echo "</tr>";

		echo "<tr><th>Role</th>";
		echo "<td><select name='strRole' value='" . $strRole . "'>";
		echo "<option value='Programmer'>Programmer</option>";
		echo "<option value='Analyst'>Analyst</option>";
		echo "<option value='Software Architect'>Software Architect</option>";
		echo "<option value='Project Manager'>Project Manager</option>";
		echo "<option value='Database designer'>Database designer</option>";
		echo "<option value='Network Engineer'>Network Engineer</option>";
		echo "<option value='Database administrator'>Database administrator</option>";
		echo "</select>";
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

		echo "<tr></tr>";
		echo "</table><input type='submit' class='btn btn-primary' name='submit' value='Add Project Staff Details' />";
		echo "<br /><br /><input type='submit' class='btn btn-default' name='cancel' value='Go back to Project Staff Details' />";
		echo "</form>";
		?>
</body>

</html>
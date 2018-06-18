<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Dalton Consultant Details</title>
</head>

<body>
<h2>View Project Staff</h2>

<?php

//Include files from the DAL
require_once("../DAL/db_functions.php");

//Run Query on BRANCH table
readQuery("d_project_consultant");

//If there are any branch details/records in the database then continue
if($numRecords === 0) {
	echo"<p>No Project Consultant found!</p>";
} else {
	//Will hold the records returned
	$arrRows = NULL;
	
	//Create Table and Heading
	echo"<table id='dalton' border='1' width='100%'>";
	echo"<tr>";
	echo"<th>Consultant_Id</th>";
	echo"<th>Project_No</th>";
	echo"<th>Date_Assigned</th>";
	echo"<th>Date_Completed</th>";
	echo"<th>Role</th>";
	echo"<th>Hours_Worked</th>";
	echo"<th></th>";
	echo"</tr>";
	
	//Loop through branches and add row to table for each record
	while($arrRows = $stmt->fetch(PDO::FETCH_ASSOC)) {
		echo"<tr>";
		echo"<td>".$arrRows['Consultant_Id']."</td>";
		echo"<td>".$arrRows['Project_No']."</td>";
		echo"<td>".$arrRows['Date_Assigned']."</td>";
		echo"<td>".$arrRows['Date_Completed']."</td>";
		echo"<td>".$arrRows['Role']."</td>";
		echo"<td>".$arrRows['Hours_Worked']."</td>";


		//Later will add code here to edit and delete this record
		echo "<td><a href='editProjectStaff.php?ID=$arrRows[Project_No]'>Edit</a>";
		echo "<br /><a href='../BLL/delete_confirm_project_staff.php?TYPE=Project_No&amp;ID=$arrRows[Project_No]'>Delete</a></td></tr>";
	}
	
	echo "</table>";
	echo "<form action='../php/addProjectStaff.php' method='post'>";
	echo "<input type='submit' value='Add a Project Staff' />";
	echo "</form>";
}
?>
</body>
</html>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Dalton Consultant Details</title>
</head>

<body>
<h2>View Project Details</h2>

<?php

//Include files from the DAL
require_once("../DAL/db_functions.php");

//Run Query on BRANCH table
readQuery("d_project");

//If there are any branch details/records in the database then continue
if($numRecords === 0) {
	echo"<p>No Project Found!</p>";
} else {
	//Will hold the records returned
	$arrRows = NULL;
	
	//Create Table and Heading
	echo"<table id='dalton' border='1' width='100%'>";
	echo"<tr>";
	echo"<th>Project_No</th>";
	echo"<th>Project_Name</th>";
	echo"<th>Project_Description</th>";
	echo"<th>Project_Manager</th>";
	echo"<th>Start_Date</th>";
	echo"<th>Finish_Date</th>";
	echo"<th>Budget</th>";
	echo"<th>Cost_To_Date</th>";
	echo"<th>Tracking_Statement</th>";
	echo"<th>Client_No</th>";
	echo"<th></th>";
	echo"</tr>";
	
	//Loop through branches and add row to table for each record
	while($arrRows = $stmt->fetch(PDO::FETCH_ASSOC)) {
		echo"<tr>";
		echo"<td>".$arrRows['Project_No']."</td>";
		echo"<td>".$arrRows['Project_Name']."</td>";
		echo"<td>".$arrRows['Project_Description']."</td>";
		echo"<td>".$arrRows['Project_Manager']."</td>";
		echo"<td>".$arrRows['Start_Date']."</td>";
		echo"<td>".$arrRows['Finish_Date']."</td>";
		echo"<td>".$arrRows['Budget']."</td>";
		echo"<td>".$arrRows['Cost_To_Date']."</td>";
		echo"<td>".$arrRows['Tracking_Statement']."</td>";
		echo"<td>".$arrRows['Client_No']."</td>";


		//Later will add code here to edit and delete this record
		echo "<td><a href='editProject.php?ID=$arrRows[Project_No]'>Edit</a>";
		echo "<br /><a href='../BLL/delete_confirm_project.php?TYPE=Consultant&amp;ID=$arrRows[Project_No]'>Delete</a></td></tr>";
	}
	
	echo "</table>";
	echo "<form action='../php/addProject.php' method='post'>";
	echo "<input type='submit' value='Add a Project' />";
	echo "</form>";
	//echo "<p></p><p>$numRecords Record Returned</p>";
}
?>
</body>
</html>
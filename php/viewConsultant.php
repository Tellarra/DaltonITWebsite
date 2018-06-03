<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Dalton Consultant Details</title>
</head>

<body>
<h2>View Consultant Details</h2>

<?php

//Include files from the DAL
require_once("../DAL/db_functions.php");

//Run Query on BRANCH table
readQuery("d_consultant");

//If there are any branch details/records in the database then continue
if($numRecords === 0) {
	echo"<p>No Consultant Found!</p>";
} else {
	//Will hold the records returned
	$arrRows = NULL;
	
	//Create Table and Heading
	echo"<table id='dalton' border='1' width='100%'>";
	echo"<tr>";
	echo"<th>Consultant ID</th>";
	echo"<th>First Name</th>";
	echo"<th>Last Name</th>";
	echo"<th>Home Phone</th>";
	echo"<th>Mobile</th>";
	echo"<th>Email</th>";
	echo"<th>Date Commenced</th>";
	echo"<th>DOB</th>";
	echo"<th>Street Address</th>";
	echo"<th>Suburbs</th>";
	echo"<th>Post Code</th>";
	echo"<th></th>";
	echo"</tr>";
	
	//Loop through branches and add row to table for each record
	while($arrRows = $stmt->fetch(PDO::FETCH_ASSOC)) {
	echo"<tr>";
	echo"<td>".$arrRows['Consultant_Id']."</td>";
	echo"<td>".$arrRows['First_Name']."</td>";
	echo"<td>".$arrRows['Last_Name']."</td>";
	echo"<td>".$arrRows['Home_Phone']."</td>";
	echo"<td>".$arrRows['Mobile']."</td>";
	echo"<td>".$arrRows['Email']."</td>";
	echo"<td>".$arrRows['Date_Commenced']."</td>";
	echo"<td>".$arrRows['DOB']."</td>";
	echo"<td>".$arrRows['Street_Address']."</td>";
	echo"<td>".$arrRows['Suburb']."</td>";
	echo"<td>".$arrRows['Post_Code']."</td>";
	
	
	//Later will add code here to edit and delete this record
	echo "<td><a href='edit_consultant.php?ID=$arrRows[Consultant_Id]'>Edit</a>";
	echo "<br /><a href='../BLL/delete_confirm.php?TYPE=Consultant&amp;ID=$arrRows[Consultant_Id]'>Delete</a></td></tr>";
	}

	echo "</table>";
	//echo "<p></p><p>$numRecords Record Returned</p>";
}
?>
</body>
</html>
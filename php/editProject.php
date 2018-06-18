<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Edit Project</title>
</head>

<body>
<?php
//includ some required files
require_once("../DAL/db_functions.php");
require_once("../BLL/validate_data.php");
	
$strProject_No = $strProject_Name = $strProject_Description = $strProject_Manager = "";
$strStart_Date = $strFinish_Date = $strBudget = $strCost_To_Date = "";
$strTracking_Statement = $strClient_No = "";

$booProject_No = $booProject_Name = $booProject_Description = $booProject_Manager = "";
$booStart_Date = $booFinish_Date = $booBudget = $booCost_To_Date = "";
$booTracking_Statement = $booClient_No = "";

$booOk = 1; //to check everything

if(isset($_POST['submit']) ) {
	validateProject("editRecord");
} else {
	if(isset($_GET['ID']) ) {
		$strProject_No = $_GET['ID'];
	}
	readQuerySingle("d_project", "Project_No", $strProject_No, "nonnumeric");
	//Test to see that we get a single record returned
	if($numRecords == 0) {
		echo "<span class='error'>No matching Project records found</span>";
	} else {
		//get the one and only record from the database
		$arrRows = $stmt ->fetch(PDO::FETCH_ASSOC); // Associative array - referencing column by his name
		$strProject_No = $arrRows["Project_No"];
		$strProject_Name = $arrRows["Project_Name"];
		$strProject_Description = $arrRows["Project_Description"];
		$strProject_Manager = $arrRows["Project_Manager"];
		$strStart_Date = $arrRows["Start_Date"];
		$strFinish_Date = $arrRows["Finish_Date"];
		$strBudget = $arrRows["Budget"];
		$strCost_To_Date = $arrRows["Cost_To_Date"];
		$strTracking_Statement =$arrRows["Tracking_Statement"];
		$strClient_No =$arrRows["Client_No"];
	}
}
//create table project details

echo "<form action='editProject.php' method='POST'>";
echo "<table id='dalton'>";
echo "<tr><th>Project Number</th>";
echo "<td><input type='text' name='strProject_No' size='20' value='".$strProject_No."'/><td>";
if($booProject_No) { echo "<td>Please enter the Project Number</td>";}
echo "</tr>";

echo "<tr><th>Project Name</th>";
echo "<td><input type='text' name='strProject_Name' size='20' value='".$strProject_Name."' /><td>";
if($booProject_Name) { echo "<td>Please enter the Project's name</td>";}
echo "</tr>";

echo "<tr><th>Project Description</th>";
echo "<td><input type='text' name='strProject_Description' size='20' value='".$strProject_Description."' /><td>";
if($booProject_Description) { echo "<td>Please enter the project's description</td>";}
echo "</tr>";

echo "<tr><th>Project Manager</th>";
	echo "<td><select name='strProject_Manager'>";
	//Read Consultant List for selecting Project Manager
	readQuery( "d_consultant" );
	if ( $numRecords == 0 ) {
		echo "Enter Manager Details in Consultant Table First.";
		$booOk = 0;
	} else {
		while ( $arrRows = $stmt->fetch( PDO::FETCH_ASSOC ) ) {
			$selected = $strProject_Manager == $arrRows['Consultant_Id'] ? "selected=\"$strProject_Manager\"" : "";
			echo "<option {$selected} value=\"{$arrRows['Consultant_Id']}\">{$arrRows['Consultant_Id']} - {$arrRows['First_Name']} {$arrRows['Last_Name']}</option>";
		}
		echo "</select></td></tr>";
	}

echo "<tr><th>Start Date</th>";
echo "<td><input type='date' name='strStart_Date' size='20' value='".$strStart_Date."' /><td>";
if($booStart_Date) { echo "<td>Please enter a start date.</td>";}
echo "</tr>";

echo "<tr><th>Finish Date</th>";
echo "<td><input type='date' name='strFinish_Date' size='20' value='".$strFinish_Date."' /><td>";
if($booFinish_Date) { echo "<td>Please enter a Date commenced</td>";}
echo "</tr>";

echo "<tr><th>Budget</th>";
echo "<td><input type='text' name='strBudget' size='20' value='".$strBudget."' /><td>";
if($booBudget) { echo "<td>Please enter a Budget</td>";}
echo "</tr>";

echo "<tr><th>Cost to Date</th>";
echo "<td><input type='text' name='strCost_To_Date' size='20' value='".$strCost_To_Date."' /><td>";
if($booCost_To_Date) { echo "<td>Please enter a Cost</td>";}
echo "</tr>";
	
echo "<tr><th>Tracking Statement</th>";
echo "<td><input type='text' name='strTracking_Statement' size='20' value='".$strTracking_Statement."' /><td>";
if($booTracking_Statement) { echo "<td>Please enter a Trqcking Statement</td>";}
echo "</tr>";
	
echo "<tr><th>Client Number</th>";
	echo "<td><select name='strClient_No'>";
	//Read Consultant List for selecting Project Manager
	readQuery( "d_client" );
	if ( $numRecords == 0 ) {
		echo "Enter Client Details in Client Table First.";
		$booOk = 0;
	} else {
		while ( $arrRows = $stmt->fetch( PDO::FETCH_ASSOC ) ) {
			$selected = $strClient_No == $arrRows['Client_No'] ? "selected=\"$strClient_No\"" : "";
			echo "<option {$selected} value=\"{$arrRows['Client_No']}\">{$arrRows['Client_No']} - {$arrRows['Company_Name']}</option>";
		}
		echo "</select></td></tr>";
	}

echo "<tr><td></td><td><input type='submit' name='submit' value='Edit Project Details' /><td></tr>";
echo "</table></form>";
?>
</body>
</html>
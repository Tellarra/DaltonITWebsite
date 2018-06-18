<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add Project Staff</title>
</head>

<body>
<?php
//includ some required files
require_once("../DAL/db_functions.php");
require_once("../BLL/validate_data.php");
	
$strConsultant_Id = $strProject_No = $strDate_Assigned = $strDate_Completed = "";
$strRole = $strHours_Worked = "";

$booConsultant_Id = $booProject_No = $booDate_Assigned = $booDate_Completed = "";
$booRole = $booHours_Worked = "";

$booOk = 1; //to check everything
if(isset($_POST['submit']) ) {
	validateProjectStaff("addRecord");
} 
	
//create table project details
echo "<form action='addProjectStaff.php' method='POST'>";
echo "<table id='dalton'>";
	
echo "<tr><th>Consultant ID</th>";
echo "<td><select name='strConsultant_Id'>";
//Read Consultant List for selecting Project Manager
    readQuery("d_consultant");
    if($numRecords == 0) {
      echo "Enter Manager Details in Consultant Table First.";
      $booOk = 0;
    }
    else {
     while($arrRows = $stmt->fetch(PDO::FETCH_ASSOC) ){
        // $arrCList.push(array($arrRows['Consultant_Id'], $arrRows['First_Name'], $arrRows['Last_Name']));
        //$selOptionList .= "<option value='".$arrRows['Consultant_Id']."'>";
        //$selOptionList .= $arrRows['Consultant_Id']." - ".$arrRows['First_Name']." ".$arrRows['Last_Name']."</option>";
		echo "<option value=\"{$arrRows['Consultant_Id']}\">{$arrRows['Consultant_Id']} - {$arrRows['First_Name']} {$arrRows['Last_Name']}</option>";
		//echo " {$arrRows['Body_style']}</option>";
      }
		//echo $selOptionList;
		echo "</select></td></tr>";
   }
echo "<tr><th>Project Number</th>";
echo "<td><select name='strProject_No'>";
//Read Consultant List for selecting Project Manager
    readQuery("d_project");
    if($numRecords == 0) {
      echo "Enter Manager Details in Consultant Table First.";
      $booOk = 0;
    }
    else {
      while($arrRows = $stmt->fetch(PDO::FETCH_ASSOC) ){
        // $arrCList.push(array($arrRows['Consultant_Id'], $arrRows['First_Name'], $arrRows['Last_Name']));
        //$selOptionList .= "<option value='".$arrRows['Consultant_Id']."'>";
        //$selOptionList .= $arrRows['Consultant_Id']." - ".$arrRows['First_Name']." ".$arrRows['Last_Name']."</option>";
		echo "<option value=\"{$arrRows['Project_No']}\">{$arrRows['Project_No']} - {$arrRows['Project_Manager']}</option>";
		//echo " {$arrRows['Body_style']}</option>";
      }
		//echo $selOptionList;
		echo "</select></td></tr>";
    }
	
echo "<tr><th>Date Assigned</th>";
echo "<td><input type='date' name='strDate_Assigned' size='20' value='".$strDate_Assigned."' /><td>";
if($booDate_Assigned) { echo "<td>Please enter the date when the consultant has been assigned.</td>";}
echo "</tr>";

echo "<tr><th>Date Completed</th>";
echo "<td><input type='date' name='strDate_Completed' size='20' value='".$strDate_Completed."' /><td>";
if($booDate_Completed) { echo "<td>Please enter the last day of the consultant.</td>";}
echo "</tr>";

echo "<tr><th>Role</th>";
echo "<td><input type='text' name='strRole' size='20' value='".$strRole."' /><td>";
if($booRole) { echo "<td>Please enter the role of the consultant.</td>";}
echo "</tr>";

echo "<tr><th>Hours worked</th>";
echo "<td><input type='text' name='strHours_Worked' size='20' value='".$strHours_Worked."' /><td>";
if($booHours_Worked) { echo "<td>Please enter the hours worked of the consultant.</td>";}
echo "</tr>";
	
echo "<tr><td></td><td><input type='submit' name='submit' value='Add Project Staff Details' /><td></tr>";
echo "</table></form>";
?>
</body>
</html>
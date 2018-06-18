<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Delete Project</title>
</head>

<body>

	<?php
	require_once( "../DAL/db_functions.php" );

	echo "<h2>Are you sure you want to delete the <em>" .$_GET[ 'ID' ]."</em> record?</h2>";

	echo "<form action='delete_confirm_project_staff.php' method='GET'>";
	echo "<input type='submit' name='okDelete' value='Delete Record'/><br /><br />";
	echo "<input type='submit' name='cancel' value='Cancel Delete'/><br /><br />";
	echo "<input type='hidden' name='ID' value='" . $_GET[ 'ID' ] . "' />";
	echo "</form>";
	$booDeleteDone = false;

	if (isset($_GET[ 'okDelete' ])) {
		echo $_GET[ 'ID' ];
		//$strBranch_code = $_GET[ID]; 

		deleteRecord( "d_project_consultant", "Project_No", $_GET[ 'ID' ], "varchar" );
		echo $_GET[ 'ID' ];
		//Check to see if the record was deleted
		if ( $booDeleteDone ) {
			//Redirect to the view Consultant page if no errors occurred
			header( "Location: ../php/viewProjectStaff.php" );
		} else {
			echo "<p class='error'><br />Warning: You can not delete this record<br />";
			echo "Other records in the system depend on it<br />";
			echo "Press 'Cancel Delete' to return</p>";
		}
	}

	if (isset($_GET['cancel'])) {
		header( "Location: ../php/viewProjectStaff.php" );
	}
	?>

</body>

</html>
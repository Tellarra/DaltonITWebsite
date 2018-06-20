<?php

//Library of some validation functions
//Allow console log
function console_log( $data ) {
	echo '<script>';
	echo 'console.log(' . json_encode( $data ) . ')';
	echo '</script>';
}

function validateConsultant( $saveaction ) {
	// Function to validate the Branch Inserts and Updates.
	global $dbConnection, $stmt, $strConsultant_Id, $strFirst_name, $strLast_name, $strHome_Phone,
	$strMobile, $strEmail, $strDate_Commenced, $strDOB, $strStreet_Address, $strSuburb, $strPost_Code;

	global $booConsultant_Id, $booFirst_name, $booLast_name, $booHome_Phone, $booMobile, $booEmail,
	$booDate_Commenced, $booDOB, $booStreet_Address, $booSuburb, $booPost_Code, $booOk;

	if ( strlen( $_POST[ "strConsultant_Id" ] ) != 9 ) {
		$booConsultant_Id = 1;
		$booOk = 0;
	} else {
		$strConsultant_Id = $_POST[ 'strConsultant_Id' ];
	}
	//echo "<script>console.log($strConsultant_Id)</script>";
	//---------------------------------------------------
	if ( $_POST[ "strFirst_name" ] == NULL ) {
		$booFirst_name = 1;
		$booOk = 0;
	} else {
		$strFirst_name = $_POST[ "strFirst_name" ];
	}
	//---------------------------------------------------
	if ( $_POST[ "strLast_name" ] == NULL ) {
		$booLast_name = 1;
		$booOk = 0;
	} else {
		$strLast_name = $_POST[ "strLast_name" ];
	}

	if ( $_POST[ "strHome_Phone" ] == NULL ||
		strlen( $_POST[ "strHome_Phone" ] ) != 10 ||
		!is_numeric( $_POST[ "strHome_Phone" ] ) ) {
		$booHome_Phone = 1;
		$booOk = 0;
	} else {
		$strHome_Phone = $_POST[ "strHome_Phone" ];
	}
	$strMobile = $_POST[ "strMobile" ];

	if ( $_POST[ "strEmail" ] == NULL ||
		!( filter_var( $_POST[ "strEmail" ], FILTER_VALIDATE_EMAIL ) ) ) {
		$booEmail = 1;
		$booOk = 0;
	} else {
		$strEmail = $_POST[ "strEmail" ];
	}

	if ( $_POST[ "strDate_Commenced" ] == NULL ) {
		$booDate_Commenced = 1;
		$booOk = 0;
	} else {
		$strDate_Commenced = $_POST[ "strDate_Commenced" ];
	}

	if ( $_POST[ "strDOB" ] == NULL ) {
		$booDOB = 1;
		$booOk = 0;
	} else {
		$strDOB = $_POST[ "strDOB" ];
	}

	if ( $_POST[ "strStreet_Address" ] == NULL ) {
		$booStreet_Address = 1;
		$booOk = 0;
	} else {
		$strStreet_Address = $_POST[ "strStreet_Address" ];
	}

	if ( $_POST[ "strSuburb" ] == NULL ) {
		$booSuburb = 1;
		$booOk = 0;
	} else {
		$strSuburb = $_POST[ "strSuburb" ];
	}

	if ( strlen( $_POST[ "strPost_Code" ] ) != 4 ||
		!is_numeric( $_POST[ "strPost_Code" ] ) ) {
		$booPost_Code = 1;
		$booOk = 0;
	} else {
		$strPost_Code = $_POST[ "strPost_Code" ];
	}
	//End of the validation code
	//Now check if everything was ok and update the database if 
	//it was (using functions in the db_functions file).

	if ( $booOk ) {

		if ( $saveaction == "addRecord" ) {
			insertConsultant();
		} else {
			updateConsultant();
		}

		if ( $booOk ) {
			//Redirect to the view Consultant page if no errors occurred
			header( "Location: viewConsultant.php" );
		}
	}

}

function validateProject( $saveaction ) {
	// Function to validate the Project Inserts and Updates.
	global $strProject_No, $strProject_Name, $strProject_Description, $strProject_Manager,
	$strStart_Date, $strFinish_Date, $strBudget, $strCost_To_Date,
	$strTracking_Statement, $strClient_No;

	global $booProject_No, $booProject_Name, $booProject_Description, $booProject_Manager,
	$booStart_Date, $booFinish_Date, $booBudget, $booCost_To_Date,
	$booTracking_Statement, $booClient_No, $booOk;

	if ( $_POST[ "strProject_No" ] == NULL ) {
		$booProject_No = 1;
		$booOk = 0;
	} else {
		$strProject_No = $_POST[ 'strProject_No' ];
	}
	//---------------------------------------------------
	if ( $_POST[ "strProject_Name" ] == NULL ) {
		$booProject_Name = 1;
		$booOk = 0;
	} else {
		$strProject_Name = $_POST[ "strProject_Name" ];
	}
	//---------------------------------------------------
	if ( $_POST[ "strProject_Description" ] == NULL ) {
		$booProject_Description = 1;
		$booOk = 0;
	} else {
		$strProject_Description = $_POST[ "strProject_Description" ];
	}

	$strProject_Manager = $_POST[ "strProject_Manager" ];

	if ( $_POST[ "strStart_Date" ] == NULL ) {
		$booStart_Date = 1;
		$booOk = 0;
	} else {
		$strStart_Date = $_POST[ "strStart_Date" ];
	}

	$strFinish_Date = $_POST[ "strFinish_Date" ];

	if ( $_POST[ "strBudget" ] == NULL ) {
		$booBudget = 1;
		$booOk = 0;
	} else {
		$strBudget = $_POST[ "strBudget" ];
	}

	if ( $_POST[ "strCost_To_Date" ] == null ||
		!is_numeric( $_POST[ "strCost_To_Date" ] ) ) {
		$booCost_To_Date = 1;
		$booOk = 0;
	} else {
		$strCost_To_Date = $_POST[ "strCost_To_Date" ];
	}

	if ( $_POST[ "strTracking_Statement" ] == NULL ) {
		$booTracking_Statement = 1;
		$booOk = 0;
	} else {
		$strTracking_Statement = $_POST[ "strTracking_Statement" ];
	}

	$strClient_No = $_POST[ "strClient_No" ];

	//End of the validation code
	//Now check if everything was ok and update the database if 
	//it was (using functions in the db_functions file).

	if ( $booOk ) {

		if ( $saveaction == "addRecord" ) {
			console_log( "insert" );
			insertProject();
		} else {
			console_log( "update" );
			updateProject();
		}

		if ( $booOk ) {
			//Redirect to the view Consultant page if no errors occurred
			header( "Location: viewProject.php" );
		}
	}
}
//Validate Project Staff Input

function validateProjectStaff( $saveaction ) {
	// Function to validate the Project Inserts and Updates.
	global $strConsultant_Id, $strProject_No, $strDate_Assigned, $strDate_Completed, $strRole, $strHours_Worked;
	global $booConsultant_Id, $booProject_No, $booDate_Assigned, $booDate_Completed, $booRole, $booHours_Worked, $booOk;

	//Validation
	$strConsultant_Id = $_POST[ 'strConsultant_Id' ];
	//---------------------------------------------------
	$strProject_No = $_POST[ "strProject_No" ];
	//---------------------------------------------------

	if ( $_POST[ "strDate_Assigned" ] == NULL ) {
		$booDate_Assigned = 1;
		$booOk = 0;
	} else {
		$strDate_Assigned = $_POST[ "strDate_Assigned" ];
	}

	if ( $_POST[ "strDate_Completed" ] == null ) {
		$strDate_Completed = "";
	} else {
		$strDate_Completed = $_POST[ "strDate_Completed" ];
	}

	if ( $_POST[ "strRole" ] == NULL ||
		is_numeric( $_POST[ "strRole" ] ) ) {
		$booRole = 1;
		$booOk = 0;
	} else {
		$strRole = $_POST[ "strRole" ];
	}

	if ( !is_numeric( $_POST[ "strHours_Worked" ] ) ) {
		$booHours_Worked = 1;
		$booOk = 0;
	} else {
		$strHours_Worked = $_POST[ "strHours_Worked" ];
	}
	//End of the validation code
	//Now check if everything was ok and update the database if 
	//it was (using functions in the db_functions file).

	if ( $booOk ) {

		if ( $saveaction == "addRecord" ) {
			insertProjectStaff();
		} else {
			updateProjectStaff();
		}

		/*if ( $booOk ) {
			//Redirect to the view Consultant page if no errors occurred
			header( "Location: viewProjectStaff.php" );
		}*/
	}
}

function validateSignUp( $saveaction ) {
	// Define variables and initialize with empty values
	console_log( "in validation" );
	global $dbConnection, $stmt;
	global $userName, $passwordUser, $confirm_password;
	global $username_err, $password_err, $confirm_password_err;

	readQuery( "d_users" );
	$numRecords = $stmt->rowCount();
	// Validate username
	if ( $_POST[ 'userName' ] == "" ) {
		console_log( $_POST[ 'userName' ] );
		$username_err = "Please enter a username.";
	} else if ( $numRecords != 0 ) {
		console_log( "after numrecords" );
		//while($arrRows = $stmt->fetch(PDO::FETCH_ASSOC)) {
		if ( $_POST[ 'userName' ] == $arrRows[ 'username' ] ) {
			console_log( "In the if" );
			$username_err = "This username is already taken.";
			console_log( $username_err );
		} else {
			$userName = $_POST[ "userName" ];
			console_log( "About to post", $userName );
		}
	}
	//}

	// Validate password
	if ( $_POST[ 'passwordUser' ] == "" ) {
		$password_err = "Please enter a password.";
	} else if ( $_POST[ 'passwordUser' ] < 6 ) {
		$password_err = "Password must have atleast 6 characters.";
	} else {
		$passwordUser = $_POST[ 'passwordUser' ];
	}

	// Validate confirm password
	if ( $_POST[ "confirm_password" ] == null ) {
		$confirm_password_err = 'Please confirm password.';
	} else {
		$confirm_password = $_POST[ 'confirm_password' ];
		if ( $passwordUser != $confirm_password ) {
			$confirm_password_err = 'Password did not match.';
		}
	}

	console_log( $userName, $passwordUser, $confirm_password );
	// Check input errors before inserting in database
	if ( $username_err == "" && $password_err == "" && $confirm_password_err == "" ) {
		if ( $saveaction == "addRecord" ) {
			console_log( "about to insert" );
			insertLogin();
		}
	}
}

function validateLogin( $saveaction ) {
	// Define variables and initialize with empty values
	console_log( "in validation" );
	global $dbConnection, $stmt;
	global $userName, $passwordUser, $confirm_password /*$cookie_name, $cookie_value*/;
	global $username_err, $password_err, $confirm_password_err;
	global $_COOKIE;

	readQuery( "d_users" );
	$numRecords = $stmt->rowCount();
	// Validate username
	if ( $_POST[ 'userName' ] == "" || $_POST[ 'passwordUser' ] == "" ) {
		$username_err = "Please enter a username.";
	} else if ( $numRecords >= 1 ) {
		console_log( "after numrecords" );
		if ( $userName == $arrRows[ 'username' ] && $passwordUser == $arrRows[ 'password' ] ) {
			$userName = $_POST[ "userName" ];
			$passwordUser = $_POST[ "passwordUser" ];
		} else {
			$username_err = "This username is already taken.";
			$password_err = "Wrong password - Try Again.";
		}
	}

	if ( $_POST[ 'passwordUser' ] == "" ) {
		$password_err = "Please enter a password.";
	} else if ( $_POST[ 'passwordUser' ] < 6 ) {
		$password_err = "Password must have atleast 6 characters.";
	} else {
		$passwordUser = $_POST[ 'passwordUser' ];
	}
	
	session_start();
    $_SESSION['username'] = $userName;
	// Check input errors before inserting in database
	if ( $username_err == "" && $password_err == "" ) {
		if ( $saveaction == "login" ) {
			console_log( "about to redirect" );
			//header( 'Location: ../index.php' );
		}
	}
}

function logOut() {
	session_start();
 
	// Unset all of the session variables
	$_SESSION = array();
 
	// Destroy the session.
	session_destroy();
}
?>
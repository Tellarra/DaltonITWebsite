<?php

// Library of Database Functions

// Database Connection Variables
<<<<<<< HEAD
$localhost = "localhost";
$user = "root";
$password = "root";
$db = "dalton";
$dsn = "mysql:host=$localhost;dbname=$db;";

// Declare Global Variables
$dbConnection = NULL;
$stmt = NULL;
$numRecords = NULL;

// Establish MySQL Connection
function connect() {
	global $user, $password, $dsn, $dbConnection; // Required to access global Variables

	try {
		// Create a PDO connection with the configuration data
		$dbConnection = new PDO( $dsn, $user, $password );
		//set the error mode
		//If any errors occur an exception zill be generated
		$dbConnection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	} catch ( PDOException $error ) {
		// Display error message if applicable
		echo "An Error occured: " . $error->getMessage();
	}
}

//Selecting all records from a table
function readQuery( $table ) {
=======
$localhost="localhost";
$user="root";
$password="root";
$db="dalton";
$dsn="mysql:host=$localhost;dbname=$db;";

// Declare Global Variables
$dbConnection=NULL;
$stmt=NULL;
$numRecords=NULL;

// Establish MySQL Connection
function connect() {
  global $user, $password, $dsn, $dbConnection; // Required to access global Variables

  try {
    // Create a PDO connection with the configuration data
    $dbConnection = new PDO($dsn, $user, $password);
  }
  catch(PDOException $error) {
    // Display error message if applicable
    echo "An Error occured: ".$error->getMessage();
  }
}

//Selecting all records from a table
function readQuery($table) {
>>>>>>> 385a2b4dc8985edca72b4e404afd169067cf4b6a
	global $numRecords, $dbConnection, $stmt;
	//Connect to DB
	connect();
	//Create string
<<<<<<< HEAD
	$sqlStr = "SELECT * FROM " . $table;

	//Run Query
	try {
		$stmt = $dbConnection->query( $sqlStr );
		//If this is not working do 
		if ( $stmt === false ) { //That
			die( "Error executing the query: $sqlStr" );
		}
	} catch ( PDOException $error ) {
		echo "Error executing query: " . $error->getMessage();
	}

	//Number of records that has been returned
	$numRecords = $stmt->rowcount();

	//Close DB connection
	$dbConnection = NULL;
}
//function insert record
function insertConsultant() {
	//These variables are from the inser branch page
	global $dbConnection, $stmt;
	//field add record
	global $strConsultant_Id, $strFirst_name, $strLast_name, $strHome_Phone;
	global $strMobile, $strEmail, $strDate_Commenced, $strDOB, $strStreet_Address, $strSuburb, $strPost_Code;

	//connect to database
	connect();
	//Insert query
	$sqlStr = "INSERT INTO d_consultant VALUES ('" . $strConsultant_Id . "','" . $strFirst_name . "','" . $strLast_name . "','" . $strHome_Phone . "','" . $strMobile . "','" . $strEmail . "','" . $strDate_Commenced . "','" . $strDOB . "','" . $strStreet_Address . "','" . $strSuburb . "','" . $strPost_Code . "');";
	echo $sqlStr;
	//Run Query
	try {
		$stmt = $dbConnection->query( $sqlStr );
		//If this is not working do 
		if ( $stmt === false ) { //That
			die( "Error executing the query: $sqlStr" );
		} else {
			echo "<p><em>The Consultant;<strong> $strFirst_name </strong>has been added to the database.</em></p>";
		}
	} catch ( PDOException $error ) {
		//display error if could not run query
		echo "Error executing query: " . $error->getMessage();
	}
	//optional
	$numRecords = $stmt->rowCount();
	if ( $numRecords > 0 ) {
		echo $numRecords . " has been affected.";
	}

	//close the connection
	$dbConnection = NULL;
}

//Update 'Consultant' Record
function updateConsultant() {
	global $dbConnection, $stmt, $strConsultant_Id, $strFirst_name, $strLast_name, $strHome_Phone;
	global $strMobile, $strEmail, $strDate_Commenced, $strDOB, $strStreet_Address, $strSuburb, $strPost_Code;
	// Run connect function
	connect();
	//Constructing update SQL Statement
	$sqlStr = "UPDATE d_consultant SET First_Name = '" . $strFirst_name . "',";
	$sqlStr .= "Last_Name = '" . $strLast_name . "',";
	$sqlStr .= "Home_Phone = '" . $strHome_Phone . "',";
	$sqlStr .= "Mobile = '" . $strMobile . "',";
	$sqlStr .= "Email = '" . $strEmail . "',";
	$sqlStr .= "Date_Commenced = " . $strDate_Commenced . ",";
	$sqlStr .= "DOB = '" . $strDOB . "',";
	$sqlStr .= "Street_Address = '" . $strStreet_Address . "'";
	$sqlStr .= "Suburb = '" . $strSuburb . "'";
	$sqlStr .= "Post_Code = '" . $strPost_Code . "'";
	$sqlStr .= " WHERE Consultant_Id = '" . $strConsultant_Id . "';";

	//Run Query
	try {
		$stmt = $dbConnection->exec( $sqlStr );
		if ( $stmt === false ) {
			die( "Error executing the query: $sqlStr" );
		} else {
			// Offer success message
			echo "<p>The Consultant " . $strFirst_name . " has been updated in the database";
		}

	} catch ( PDOException $error ) {
		//Display error message if applicable
		echo "An Error occured: " . $error->getMessage();
	}

	//Close the database connection
	$dbConnection = NULL;
}

//Insert Project
function insertProject() {
	//These variables are from the insert project page
	global $dbConnection, $stmt;
	//field add record
	global $strProject_No, $strProject_Name, $strProject_Description, $strProject_Manager,
	$strStart_Date, $strFinish_Date, $strBudget, $strCost_To_Date,
	$strTracking_Statement, $strClient_No, $booOK;

	//connect to database
	connect();
	//Insert query
	$sqlStr = "INSERT INTO d_project VALUES(";
	$sqlStr .= "'" . $strProject_No . "','" . $strProject_Name . "','" . $strProject_Description . "','" . $strProject_Manager . "','" . $strStart_Date . "','" . $strFinish_Date . "','" . $strBudget . "','" . $strCost_To_Date . "','" . $strTracking_Statement . "','" . $strClient_No . "');";
	//Run Query
	//echo("======");
	echo $sqlStr;
	//echo("======");
	try {
		$stmt = $dbConnection->query( $sqlStr );
		//echo $sqlStr;
		//If this is not working do 
		if ( $stmt === false ) { //That
			//echo $sqlStr;
			die( "test: $sqlStr" );
			//die("Error executing the query: $sqlStr");
			//$booOK = 0;
		} else {
			echo "<p><em>The Project;<strong> $strProject_No </strong>has been added to the database.</em></p>";
		}
	} catch ( PDOException $error ) {
		//display error if could not run query
		echo "Error executing query: " . $error->getMessage();
		//$booOK = 0;
	}

	//optional
	$numRecords = $stmt->rowCount();
	if($numRecords > 0) {
		echo $numRecords." has been affected.";
	}

	//close the connection
	$dbConnection = NULL;
}
//pdate Project
function updateProject() {
	global $dbConnection, $stmt;
	global $strProject_No, $strProject_Name, $strProject_Description, $strProject_Manager,
	$strStart_Date, $strFinish_Date, $strBudget, $strCost_To_Date,
	$strTracking_Statement, $strClient_No;
	// Run connect function
	connect();
	//Constructing update SQL Statement
	$sqlStr = "UPDATE d_project SET Project_Name = '".$strProject_Name."',";
	$sqlStr .= "Project_Description = '".$strProject_Description."',";
	$sqlStr .= "Project_Manager = '".$strProject_Manager."',";
	$sqlStr .= "Start_Date = '".$strStart_Date ."',";
	$sqlStr .= "Finish_Date = '".$strFinish_Date ."',";
	$sqlStr .= "Budget = '".$strBudget."',";
	$sqlStr .= "Cost_To_Date = '".$strCost_To_Date."',";
	$sqlStr .= "Tracking_Statement = '".$strTracking_Statement."',";
	$sqlStr .= "Client_No = '".$strClient_No."'";
	$sqlStr .= " WHERE Project_No = '".$strProject_No."';";
	//Run Query
	try {
		$stmt = $dbConnection->exec( $sqlStr );
		if ( $stmt === false ) {
			die( "Error executing the query: $sqlStr" );
		} else {
			// Offer success message
			echo "<p>The Project " . $strProject_No . " has been updated in the database";
		}
	} catch ( PDOException $error ) {
		//Display error message if applicable
		echo "An Error occured: " . $error->getMessage();
	}

	//Close the database connection
	$dbConnection = NULL;
}

function insertProjectStaff() {
	//These variables are from the insert project page
	global $dbConnection, $stmt;
	//field add record
	global $strConsultant_Id, $strProject_No, $strDate_Assigned, $strDate_Completed, $strRole, $strHours_Worked;

	//connect to database
	connect();
	//Insert query
	$sqlStr = "INSERT INTO d_project_consultant VALUES(";
	$sqlStr .= "'" . $strConsultant_Id . "','" . $strProject_No . "','" . $strDate_Assigned . "','" . $strDate_Completed . "','" . $strRole . "'," . $strHours_Worked . ");";
	//Run Query
	//echo("======");
	echo $sqlStr;
	//echo("======");
	try {
		$stmt = $dbConnection->query( $sqlStr );
		//echo $sqlStr;
		//If this is not working do 
		if ( $stmt === false ) { //That
			//echo $sqlStr;
			die( "test: $sqlStr" );
			//die("Error executing the query: $sqlStr");
			//$booOK = 0;
		} else {
			echo "<p><em>The Project;<strong> $strProject_No </strong>has been added to the database.</em></p>";
		}
	} catch ( PDOException $error ) {
		//display error if could not run query
		echo "Error executing query: " . $error->getMessage();
		//$booOK = 0;
	}

	//optional
	$numRecords = $stmt->rowCount();
	if($numRecords > 0) {
		echo $numRecords." has been affected.";
	}

	//close the connection
	$dbConnection = NULL;
}

function updateProjectStaff() {
	global $dbConnection, $stmt;
	global $strConsultant_Id, $strProject_No, $strDate_Assigned, $strDate_Completed, $strRole, $strHours_Worked;
	// Run connect function
	connect();
	//Constructing update SQL Statement
	$sqlStr = "UPDATE d_project_consultant SET Consultant_Id = '".$strConsultant_Id."',";
	$sqlStr .= "Date_Assigned = '".$strDate_Assigned."',";
	$sqlStr .= "Date_Completed = '".$strDate_Completed."',";
	$sqlStr .= "Role = '".$strRole ."',";
	$sqlStr .= "Hours_Worked = '".$strHours_Worked ."'";
	$sqlStr .= " WHERE Project_No = '".$strProject_No."';";
	//Run Query
	console_log($sqlStr);
	try {
		$stmt = $dbConnection->exec( $sqlStr );
		if ( $stmt === false ) {
			die( "Error executing the query: $sqlStr" );
		} else {
			// Offer success message
			echo "<p>The Project " . $strProject_No . " has been updated in the database";
		}
	} catch ( PDOException $error ) {
		//Display error message if applicable
		echo "An Error occured: " . $error->getMessage();
	}

	//Close the database connection
	$dbConnection = NULL;
}

function insertLogin() {
	//These variables are from the insert project page
	global $dbConnection, $stmt;
	//field add record
	global $userName, $passwordUser, $id;
	global $username_err, $password_err, $confirm_password_err;

	console_log("In insert login");
	//connect to database
	connect();
	//Insert query
	$sqlStr = "INSERT INTO d_users VALUES(";
	$sqlStr .= "'" . $id . "','" . $userName . "','" . $passwordUser . "');";
	//Run Query
	console_log($sqlStr);
	try {
		$stmt = $dbConnection->query( $sqlStr );
		//echo $sqlStr;
		//If this is not working do 
		if ( $stmt === false ) { //That
			//echo $sqlStr;
			die( "test: $sqlStr" );
			//die("Error executing the query: $sqlStr");
			//$booOK = 0;
		} else {
			echo "<p><em>The user;<strong> $userName </strong>has been added to the database.</em></p>";
		}
	} catch ( PDOException $error ) {
		//display error if could not run query
		echo "Error executing query: " . $error->getMessage();
		//$booOK = 0;
	}

	//optional
	$numRecords = $stmt->rowCount();
	if($numRecords == 0) {
		echo $numRecords." has been affected.";
	}

	//close the connection
	$dbConnection = NULL;
}

// Delete a Record 
function deleteRecord( $table, $column, $colValue, $colDataType ) {
	//$booDeleteDone = false; //Value tu return
	global $dbConnection, $stmt;
	global $booDeleteDone;
	$booDeleteDone = false;
	connect(); // Run connect function

	if ( $colDataType === "varchar"
		or $colDataType === "date"
		or $colDataType === "datetime" ) //If Data-Type is Varchar or Date
	{
		//Delete Individual Record
		$sqlStr = "DELETE FROM " . $table . " WHERE " .$column. " = '" . $colValue . "';";
	} else {
		//Delete Individual Record
		$sqlStr = "DELETE FROM " . $table . " WHERE " .$column. " = " . $colValue . ";";
	}

	// Run Query
	try {
		$stmt = $dbConnection->exec( $sqlStr );
		if ( $stmt === false ) {
			die( "Error executing the query: $sqlStr" );
		} else {
			$booDeleteDone = true;
		}
	} catch ( PDOException $e ) {
		echo $e->getMessage();
	}
	// Close the connection
	$dbConnection = NULL;

	//return booDeleteDone;
}

//Function to return a single record
function readQuerySingle( $table, $column, $colValue, $colType ) {
	global $numRecords, $dbConnection, $stmt;

	connect(); //Run connect function

	$sqlStr = NULL; //Initialise Variable to hold query

	if ( $colType === "numeric" ) {
		//Select Individual Record
		$sqlStr = "SELECT * FROM " . $table . " WHERE " . $column . " = " . $colValue . ";";
	} else {
		//Select Individual Record
		$sqlStr = "SELECT * FROM " . $table . " WHERE " . $column . " = '" . $colValue . "';";
	}

	//Run Query
	try {
		$stmt = $dbConnection->query( $sqlStr );
		if ( $stmt === false ) {
			die( "Error executing the query: $sqlStr" );
		}
	} catch ( PDOException $error ) {
		//Display error message if applicable
		echo "An Error occured: " . $error->getMessage();
	}

	//How many records are there?
	$numRecords = $stmt->rowcount();

	//Close the database connection
	$dbConnection = NULL;
}
?>
=======
	$sqlStr = "SELECT * FROM ".$table;
	
	//Run Query
	try {
		$stmt = $dbConnection->query($sqlStr);
		//If this is not working do 
		if($stmt === false) { //That
			die("Error executing the query: $sqlStr");
		}
	} catch(PDOException $error) {
		echo "Error executing query: ".$error->getMessage();
	}
	
	//Number of records that has been returned
	$numRecords = $stmt->rowcount();
	
	//Close DB connection
	$dbConnection = NULL;
}
?>
>>>>>>> 385a2b4dc8985edca72b4e404afd169067cf4b6a

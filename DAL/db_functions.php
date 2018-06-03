<?php

// Library of Database Functions

// Database Connection Variables
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
	global $numRecords, $dbConnection, $stmt;
	//Connect to DB
	connect();
	//Create string
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

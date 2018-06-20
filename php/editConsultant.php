<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Edit Consultant</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
	<link rel="stylesheet" href="../css/screen.css" type="text/css">
</head>

<body>
	<div id="page">
		<header>
			<a class="logo" title="Dalton It" href="index.php"><span>Dalton It</span></a>
		</header>
		<p></p>
		<?php
		//includ some required files
		require_once( "../DAL/db_functions.php" );
		require_once( "../BLL/validate_data.php" );

		$strConsultant_Id = $strFirst_name = $strLast_name = $strHome_Phone = "";
		$strMobile = $strEmail = $strDate_Commenced = $strDOB = $strStreet_Address = "";
		$strSuburb = $strPost_Code = "";

		$booConsultant_Id = $booFirst_name = $booLast_name = $booHome_Phone = "";
		$booMobile = $booEmail = $booDate_Commenced = $booDOB = $booStreet_Address = "";
		$booSuburb = $booPost_Code = "";

		$booOk = 1; //to check everything

		if ( isset( $_POST[ 'submit' ] ) ) {
			validateConsultant( "addRecord" );
		} else {
			if ( isset( $_GET[ 'ID' ] ) ) {
				$strConsultant_Id = $_GET[ 'ID' ];
			}
			readQuerySingle( "d_consultant", "Consultant_Id", $strConsultant_Id, "nonnumeric" );
			//Test to see that we get a single record returned
			if ( $numRecords == 0 ) {
				echo "<span class='error'>No matching Consultant records found</span>";
			} else {
				//get the one and only record from the database
				$arrRows = $stmt->fetch( PDO::FETCH_ASSOC ); // Associative array - referencing column by his name
				$strConsultant_Id = $arrRows[ "Consultant_Id" ];
				$strFirst_name = $arrRows[ "First_Name" ];
				$strLast_name = $arrRows[ "Last_Name" ];
				$strHome_Phone = $arrRows[ "Home_Phone" ];
				$strMobile = $arrRows[ "Mobile" ];
				$strEmail = $arrRows[ "Email" ];
				$strDate_Commenced = $arrRows[ "Date_Commenced" ];
				$strDOB = $arrRows[ "DOB" ];
				$strStreet_Address = $arrRows[ "Street_Address" ];
				$strSuburb = $arrRows[ "Suburb" ];
				$strPost_Code = $arrRows[ "Post_Code" ];
			}
		}
		//create table branch details

		echo "<form action='editConsultant.php' method='POST'>";
		echo "<table class='table table-bordered table-stripped'>";
		echo "<tr><th>Consultant ID</th>";
		echo "<td><input type='text' name='strConsultant_Id' size='20' value='" . $strConsultant_Id . "'/><td>";
		if ( $booConsultant_Id ) {
			echo "<td>Please enter a Consultant ID (9 characters)</td>";
		}
		echo "</tr>";

		echo "<tr><th>First Name</th>";
		echo "<td><input type='text' name='strFirst_name' size='20' value='" . $strFirst_name . "' /><td>";
		if ( $booFirst_name ) {
			echo "<td>Please enter a First Name</td>";
		}
		echo "</tr>";

		echo "<tr><th>Last Name</th>";
		echo "<td><input type='text' name='strLast_name' size='20' value='" . $strLast_name . "' /><td>";
		if ( $booLast_name ) {
			echo "<td>Please enter a Last Name</td>";
		}
		echo "</tr>";

		echo "<tr><th>Home Phone</th>";
		echo "<td><input type='text' name='strHome_Phone' size='20' value='" . $strHome_Phone . "' /><td>";
		if ( $booHome_Phone ) {
			echo "<td>Please enter an Home Phone</td>";
		}
		echo "</tr>";

		echo "<tr><th>Mobile</th>";
		echo "<td><input type='text' name='strMobile' size='20' value='" . $strMobile . "' /><td>";
		//if($booMobile) { echo "<td>Please enter a Suburb</td>";}
		echo "</tr>";

		echo "<tr><th>Email</th>";
		echo "<td><input type='text' name='strEmail' size='20' value='" . $strEmail . "' /><td>";
		if ( $booEmail ) {
			echo "<td>Please enter an email</td>";
		}
		echo "</tr>";

		echo "<tr><th>Date Commenced</th>";
		echo "<td><input type='date' name='strDate_Commenced' size='20' value='" . $strDate_Commenced . "' /><td>";
		if ( $booDate_Commenced ) {
			echo "<td>Please enter a Date commenced</td>";
		}
		echo "</tr>";

		echo "<tr><th>DOB</th>";
		echo "<td><input type='date' name='strDOB' size='20' value='" . $strDOB . "' /><td>";
		if ( $booDOB ) {
			echo "<td>Please enter a DOB</td>";
		}
		echo "</tr>";

		echo "<tr><th>Street Address</th>";
		echo "<td><input type='text' name='strStreet_Address' size='20' value='" . $strStreet_Address . "' /><td>";
		if ( $booStreet_Address ) {
			echo "<td>Please enter a Street Address</td>";
		}
		echo "</tr>";

		echo "<tr><th>Suburb</th>";
		echo "<td><input type='text' name='strSuburb' size='20' value='" . $strSuburb . "' /><td>";
		if ( $booSuburb ) {
			echo "<td>Please enter a Suburb</td>";
		}
		echo "</tr>";

		echo "<tr><th>Post Code</th>";
		echo "<td><input type='text' name='strPost_Code' size='20' value='" . $strPost_Code . "' /><td>";
		if ( $booPost_Code ) {
			echo "<td>Please enter a Post Code</td>";
		}
		echo "</tr>";
		echo "<tr></tr></table>";
		echo "<input type='submit' class='btn btn-primary' name='submit' value='Update Consultant Details' /></form>";
		?>
		<nav>
			<ul>
				<li>
					<a title="About Us" href="../html/aboutUs.html">About Us</a>
				</li>
				<li>
					<a title="Contact Us" href="../html/contactUs.html">Contact Us</a>
				</li>
				<?php
				//include some required files
				require_once( "../DAL/db_functions.php" );
				require_once( "../BLL/validate_data.php" );

				global $_COOKIE;

				session_start();

				if ( !isset( $_SESSION[ 'username' ] ) || empty( $_SESSION[ 'username' ] ) ) {
					echo "<li>";
					echo "<a title='Login' href='html/loginPage.php'>Login</a>";
					echo "</li>";
				} else {
					//echo "Cookie '" . $cookie_name . "' is set!<br>";
					//echo "Value is: " . $_COOKIE['Dalton_IT_auth'];
					echo "<li>";
					echo "<a title='View Consultant Records' href='../php/viewConsultant.php'>View Consultant</a>";
					echo "</li>";

					echo "<li>";
					echo "<a title='View Project Records' href='../php/viewProject.php'>View Project</a>";
					echo "</li>";

					echo "<li>";
					echo "<a title='View Project Consultant Record' href='../php/viewProjectStaff.php'>View Project Consultant</a>";
					echo "</li>";
				}
				?>
			</ul>
		</nav>

		<footer>
			&copy; Dalton It
			<div class="content">
				<a title="Privacy Policy" href="#">Privacy Policy</a>
				<a title="Terms of Service" href="#">Terms of Service</a>
			</div>
		</footer>
</body>

</html>
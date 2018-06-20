<!doctype html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dalton Consulting website</title>
	<link rel="stylesheet" type="text/css" media="screen" href="../css/screen.css">
	<title>Contact Us</title>
	<script>
	</script>
</head>

<body>
	<div id="page">
		<header> <a class="logo" title="Dalton It" href="../index.php"><span>Dalton It</span></a> </header>
		<div class="main">
			<h1>Enter your details to contact us</h1>
			<form class="form" method="post" action="phpValidationForm.php">
				<p class="field required">
					<label class="label required" for="txtName">Full name</label>
					<input class="text-input" id="txtName" name="txtName" required type="text" value="">
				</p>
				<div class="field">
					<label class="label">Gender</label>
					<ul class="options">
						<li class="option">
							<input class="option-input" id="optF" name="option" type="radio" value="Female">
							<label class="option-label" for="optF">Female</label>
						</li>
						<li class="option">
							<input class="option-input" id="optM" name="option" type="radio" value="Male">
							<label class="option-label" for="optM">Male</label>
						</li>
					</ul>
				</div>
				<p class="field">
					<label class="label" for="txtCompany">Company Name</label>
					<input class="text-input" id="txtCompany" name="txtCompany" required type="text" value="">
				</p>
				<p class="field">
					<label class="label" for="select">Position</label>
					<select class="select" id="select">
						<option selected value="">Select an option</option>
						<option value="ceo">CEO</option>
						<option value="front-end">Admin staff</option>
						<option value="back-end">Employee</option>
					</select>
				</p>
				<p class="field required">
					<label class="label required" for="txtAddress">Address</label>
					<input class="text-input" id="txtAddress" name="txtAddress" required type="text" value="">
				</p>
				<p class="field required">
					<label class="label required" for="txtPCode">Postal Code</label>
					<input class="text-input" id="txtPCode" name="txtPCode" required type="text" value="">
				</p>
				<p class="field required half">
					<label class="label" for="txtMail">E-mail</label>
					<input class="text-input" id="txtMail" name="txtMail" required type="email">
				</p>
				<p class="field half">
					<label class="label" for="txtPhone">Phone</label>
					<input class="text-input" id="txtPhone" name="txtPhone" type="phone">
				</p>
				<div class="field">
					<label class="label">Where did you hear about us?</label>
					<ul class="checkboxes">
						<li class="checkbox">
							<input class="checkbox-input" id="choice-0" name="choice" type="checkbox" value="0">
							<label class="checkbox-label" for="choice-0">Facebook</label>
						</li>
						<li class="checkbox">
							<input class="checkbox-input" id="choice-1" name="choice" type="checkbox" value="1">
							<label class="checkbox-label" for="choice-1">Instagram</label>
						</li>
						<li class="checkbox">
							<input class="checkbox-input" id="choice-2" name="choice" type="checkbox" value="2">
							<label class="checkbox-label" for="choice-2">Google</label>
						</li>
						<li class="checkbox">
							<input class="checkbox-input" id="choice-3" name="choice" type="checkbox" value="3">
							<label class="checkbox-label" for="choice-3">Twitter</label>
						</li>
					</ul>
				</div>
				<div class="field">
					<label class="label">Country</label>
					<ul class="options">
						<li class="option">
							<input class="option-input" id="optAustralia" name="option" type="radio" value="Australia">
							<label class="option-label" for="optAustralia">Australia</label>
						</li>
						<li class="option">
							<input class="option-input" id="optUS" name="option" type="radio" value="United States">
							<label class="option-label" for="optUS">United States</label>
						</li>
						<li class="option">
							<input class="option-input" id="optCana" name="option" type="radio" value="Canada">
							<label class="option-label" for="optCana">Canada</label>
						</li>
						<li class="option">
							<input class="option-input" id="optFr" name="option" type="radio" value="France">
							<label class="option-label" for="optFr">France</label>
						</li>
						<li class="option">
							<input class="option-input" id="optEn" name="option" type="radio" value="England">
							<label class="option-label" for="optEn">England</label>
						</li>
						<li class="option">
							<input class="option-input" id="optChina" name="option" type="radio" value="China">
							<label class="option-label" for="optChina">China</label>
						</li>
						<li class="option">
							<input class="option-input" id="optJap" name="option" type="radio" value="Japan">
							<label class="option-label" for="optJap">Japan</label>
						</li>
						<li class="option">
							<input class="option-input" id="optNZ" name="option" type="radio" value="New Zealand">
							<label class="option-label" for="optNZ">New Zealand</label>
						</li>
					</ul>
				</div>
				<p class="field">
					<label class="label" for="about">Enter your message</label>
					<textarea class="textarea" cols="50" id="about" name="about" rows="4"></textarea>
				</p>
				<p class="field half">
					<input class="button" type="submit" value="Register">
				</p>
				<p class="field half">
					<input class="button" type="reset" value="Reset">
				</p>
			</form>
			<nav>
				<ul>
					<li>
						<a title="About Us" href="aboutUs.php">About Us</a>
					</li>
					<li>
						<a title="Contact Us" href="contactUs.php">Contact Us</a>
					</li>
					<?php
					//include some required files
					require_once( "../DAL/db_functions.php" );
					require_once( "../BLL/validate_data.php" );

					global $_COOKIE;

					if ( !isset( $_COOKIE[ 'Dalton_IT_auth' ] ) ) {
						echo "<li>";
						echo "<a title='Login' href='loginPage.php'>Login</a>";
						echo "</li>";
					} else {
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
		</div>
</body>

</html>
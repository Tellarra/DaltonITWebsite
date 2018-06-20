<!doctype html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dalton Consulting website</title>
	<link rel="stylesheet" type="text/css" media="screen" href="../css/screen.css">
	<title>About us</title>
</head>

<body>
	<div id="page">
		<header>
			<a class="logo" title="Dalton It" href="../index.php"><span>Dalton It</span></a>
		</header>
		<div class="main">
			<h1>About Dalton Consulting</h1>
			<section class="how-to">
				<p> Dalton Consulting was created in 2008 by Frank Dalton. He's idea was to build a company that will help other company to set up, create and update their software, database and network. <br> Dalton IT will do all the requirements that are necessary to fullfil your request. <br> Here is the differents step that are part of our program:
					<ul class="requirements">
						<li>Planning</li>
						<li>System Analysis and requirements.</li>
						<li>System Design</li>
						<li>Developpment</li>
						<li>Integration and Testing</li>
						<li>Implementation</li>
						<li>Operations and Maintenance</li>
					</ul>
				</p>
			</section>
			<h1>Types of project work</h1>
			<section class="atmosphere">
				<article id="upgrade">
					<h2>Upgrades</h2>
					<p>We can upgrade your system whenever you want. We can replace your server, or add some if you are missing spaces. <br> When we are doing upgrade, we need all the information we can have from you to be able to start a team project and work through it. We will constantly trying our best to deliver these upgrade to you as fast as possible.</p>
				</article>
			</section>
			<section class="atmosphere">
				<article id="design">
					<h2>Expansion</h2>
					<p>We can also help you to extend your system network when you need to connect new buildings in your company.<br> To do so, we need have access to your network and databases. With those information we can create new branch and new database to be the expansion of your currently system network.</p>
				</article>
			</section>
			<section class="atmosphere">
				<article id="maintenance">
					<h2>Maintenance</h2>
					<p>We know that it can be difficult to maintain a system network in good shape when you have many staff, many project and many branches.<br> We take care of your company by doing some maintenance in your system network and therefore providing you the best performance.</p>
				</article>
			</section>
			<section class="atmosphere">
				<article id="instal">
					<h2>Installation</h2>
					<p>If you just created your company and you don't have any system network in place, we can do it for you. We just need your help to gather as much information as possible.<br> We offer our services to build your database, your network and your software. With our help you will have the best system network in the industry.</p>
				</article>
			</section>
		</div>
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
					//echo "Cookie named '" . $cookie_name . "' is not set!";
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
	</div>
</body>

</html>
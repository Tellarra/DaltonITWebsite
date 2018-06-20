<!doctype HTML>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dalton Consulting website</title>
	<link rel="stylesheet" type="text/css" media="screen" href="css/screen.css">
</head>

<body>
	<div id="page">
		<header>
			<a class="logo" title="Dalton It" href="index.php"><span>Dalton It</span></a>
		</header>

		<section class="main">
			<aside>
				<div class="content trending">
					<h3><a href="html/aboutUs.html">Our Company</a></h3>
					<p>Dalton Consulting is an Information Technology consulting company that provides software and networking consulting services. <br> Dalton IT designs and developps new software applications and networks and updates existing programs.</p>
				</div>
			</aside>
			<aside>
				<div class="content find-it">
					<h3>Where to find us</h3>
					<p>We are located in many cities in Australia. We have a branch in <a href="https://goo.gl/maps/RGJGLufZwR32">Melbourne</a>, <a href="https://goo.gl/maps/fgwR4NZhTFC2">Perth</a>, <a href="https://goo.gl/maps/9VQTV4Rg58L2">Adelaide</a> and <a href="https://goo.gl/maps/aEBdt1xBwvT2">Sydney</a>. <br> We are always happy to welcome you in our buildings and our customer service is available 24/7.</p>
				</div>
			</aside>
			<aside>
				<div class="content tools">
					<h3>Our Team</h3>
					<p>Frank Dalton created this company 10 years ago. Our primary manager, Sophia Kyle is working with us since the beginning of this amazing adventure. She is the face of the success of the company and she will always make sure that your project is in good hands.</p>
				</div>
			</aside>
		</section>

		<section class="atmosphere">
			<article id="learn">
				<h2>How we can help you with your project</h2>
				<p>Dalton Consulting will always be there to help create your ideas. We have a large team who is always willing to give his best and who will deliver to you a perfect finished project.<br> If you want to find out more about how we are creating thoses ideas, click on the "Learn more" button.</p>
				<a class="btn" title="Creating a modern atmosphere" href="#">Learn more</a>
			</article>
		</section>
		<nav>
			<ul>
				<li>
					<a title="About Us" href="html/aboutUs.php">About Us</a>
				</li>
				<li>
					<a title="Contact Us" href="html/contactUs.php">Contact Us</a>
				</li>
				<?php
					//include some required files
					require_once( "../DAL/db_functions.php" );
					require_once( "BLL/validate_data.php" );

					global $_COOKIE;

					if ( !isset( $_COOKIE['Dalton_IT_auth'] ) ) {
						echo "<li>";
						echo "<a title='Login' href='html/loginPage.php'>Login</a>";
						echo "</li>";
						//echo "Cookie named '" . $cookie_name . "' is not set!";
					} else {
						//echo "Cookie '" . $cookie_name . "' is set!<br>";
						//echo "Value is: " . $_COOKIE['Dalton_IT_auth'];
						echo "<li>";
						echo "<a title='View Consultant Records' href='php/viewConsultant.php'>View Consultant</a>";
						echo "</li>";
						
						echo "<li>";
						echo "<a title='View Project Records' href='php/viewProject.php'>View Project</a>";
						echo "</li>";
						
						echo "<li>";
						echo "<a title='View Project Consultant Record' href='php/viewProjectStaff.php'>View Project Consultant</a>";
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
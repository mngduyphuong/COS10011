<!-- Author: Duy Phuong Nguyen
Purpose: PHP file for final exam
Created: 17/06/2020
Last updated: 17/06/2020 -->

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="description"	content="Creating Web Applications"	/>
	<meta name="keywords"		content="HTML, CSS, JavaScripts"	/>
	<meta name="author" 		content = "Duy Phuong Nguyen"	/>
	<meta name="viewport"	 content="width=device-width, initial-scale=1">
	<title>Homepage</title>
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	 <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet"> 
	 <script type="text/javascript" src="scripts/final.js"></script>
</head>

<body>
<?php include("includes/menu.inc"); ?>
<!-- welcome box which is centered -->
<section id="welcome">
	<h1>Welcome to Swinburne Seminar</h1>
	<p>Have a check on our training program.</p>
	<p>Swinburne's training provides seminars daily with free of charge.</p><br>
	<a href="register.php" class="button">Register now</a>		<!-- button which is linked to register page -->
</section>


<section class="content">

	<!-- section for seminar 1 -->
	<section class="seminar" id="seminar_1">
		<fieldset id="seminar_11"><h2>Finance Fundamentals - Keep your money flow</h2>		<!-- title -->
		<p>Reference number: S25029
			<br>Date: 20th of June 2020</p></fieldset>

		<!-- description of seminar -->
		<fieldset id="seminar_12">
		<p>Join the seminar to understand fundamentals in finance and keep your bussiness running during COVID-19. Money flow is a must for every small business
			, without it no business can survive<br>
		Join this essestial workshop seminar to ensure you are never caught in trouble.</p><br>
		<a href="register.php" id="seminar_apply1" name="seminar_apply1" class="button">Apply Now</a>
<!-- 		<form action="register.php">
			<input type="submit" name="seminar_apply1" id="seminar_apply1" value="Apply Now" class="button">
		</form> -->
	</fieldset>
	</section>

	<!-- create some extra space between 2 seminar section -->
	<br><br>


	<!-- section for seminar 2 -->
	<section class="seminar" id="seminar_2">
	<fieldset id="seminar_21"><h2>Bachelor of engineering - opportunity and career path</h2>	<!-- title -->
	<p>Reference number: 	S76200<br>
		Date:     22nd of June 2020	
	</p></fieldset>

	<!-- description of seminar -->
	<fieldset id="seminar_22"><p>Discover the Bechelor of Engineering course at Swinburne University. In this seminar, you can find important information about our course and opportunity after graduate in the engineering industry.<br>
	Join the seminar to get useful tips and experiences from our professor.</p><br>
	<a href="register.php" id="seminar_apply2" name="seminar_apply2" class="button">Apply Now</a>
</fieldset>
	</section>

</section>

<?php include("includes/footer.inc"); ?>
</body>

</html>
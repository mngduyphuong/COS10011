<!DOCTYPE html>
<html lang="en">

<?php include("includes/header.inc"); ?>

<!-- enhancement page to display all the enhancements which are used in this assignment -->

<body>

<?php include("includes/menu.inc"); ?>

<article>
	<section class="content">
		<h1>Enhancements in this assgignment</h1>
		<section class="enhancements">
			<h2>Manager security</h2>				<!-- the first enhancement -->
			<p>Manager security function with sever side validation. If you want to access manager.php page, you first has to login using manager_login.php.<br>	<!-- discussion -->
				Username and password will be checked with the database which stores information in seperate table.<br>
				You can add new account to the sever with manager_signup.php, data submit to sever will be validate and sanitise.<br>
				Manager can also logout from their account by the button in manager.php<br>
				In this enhancement, I have to create a new table in database, create 3 new php page and use session function in php to store data and get data from the sever.		<!-- how to implement this -->
				<br><br></p>
			<img src="images/enhancement7.jpg" title="logout" width="300"><br>
			<img src="images/enhancement8.jpg" title="login" width="300"><br>
			<a href="manager.php#logout">Logout function manager.php</a><br>
			<a href="https://www.youtube.com/watch?v=O0Ky0tKvsJ8&t=283s">Source from Youtube tutorial.</a><br>
			<a href="https://swinburne.instructure.com/courses/24345/files/8552653/download?wrap=1">Source from Swinburne fruit shop example.</a>	<!-- Third party source -->
			<br><br>
			
			<h2>Resort table by heading column</h2>				<!-- the second enhancement for assignment 3 -->
			<p>This enhancement requires some skill in passing message and value using php.<br>
				We then implent the php code inside html table so that can passing value and use that value in SELECT function of mysql database.<br>	<!-- how to implement -->
				User can click on the header of manager table to sort data, click again to reverse the order.	
				<br></p>
			<br>
			<img src="images/enhancement9.jpg" title="go to top button" width="300"><br>
			<a href="manager.php#managerTable">Table in manager.php</a><br>			<!-- third party source -->
			<a href="https://youtu.be/MlJVt3rTj1Q">Source from Youtube PHP tutorial.</a>
			<br><br>


			</p>
			<h2>View enhancements of Assignment 1:</h2>				<!-- Link to enhancements of assignment 1 -->
			<p><a href="enhancements.php">View here</a><br></p>

			<h2>View enhancements of Assignment 2:</h2>				<!-- Link to enhancements of assignment 2 -->
			<p><a href="enhancements2.php">View here</a><br></p>


			
		</section>
	</section>


</article>




<?php include("includes/footer.inc"); ?>








</body>


</html>
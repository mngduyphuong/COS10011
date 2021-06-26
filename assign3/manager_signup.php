<!DOCTYPE html>
<html lang="en">
<?php include("includes/header.inc"); ?>
<body>
<?php include("includes/menu.inc"); ?>
<!-- signup page for manager to signup new account -->
<section class="login">
		<img src="images/logo.png" id="logo" width="200">
		<h1>Sign up manager</h1>
		<form action="#" method="post">		<!-- posting value so php can insert the information with database-->
			<p id="username">
				<label for="username">Sign up username:</label>
				<input type="text"  placeholder="Enter username"  name="username" >			<!-- input for username -->
			</p>
			<p>
				<label for="password">Sign up password:</label>
				<input type="password"  placeholder="Enter password" id="password" name="password" >		<!-- nput for password -->
			</p>
			<?php
			// display if there is a message from php
			if (isset($_GET["manager_msg"])) {					
				echo "<div class='manager_msg'>";
				echo $_GET["manager_msg"];
				echo "</div>";
			}
			?>
			<input type="submit" class="button" value="Sign up"><br>
			<a href="manager_login.php" id="signup">Have an account?</a><br>
			<a href="index.php" id="signup">Back to homepage</a>
			<p>Type username and password to signup</p>
		</form>
</section>

<?php 

function sanitise_input($data)
		{
			$data = trim($data);				//remove spaces
			$data = stripslashes($data);		//remove backslashes in front of quotes
			$data = htmlspecialchars($data);	//convert HTML special characters to HTML code
			return $data;
		}

require_once('settings.php');		//get connection information to database
$conn = @mysqli_connect($host,$user,$pwd,$sql_db);
if ($conn) {

	if (isset($_POST['username'])) {				//get the value
	$username=sanitise_input($_POST['username']);
	$password=sanitise_input($_POST['password']);

	$sql = "INSERT INTO manager (username, password) VALUES ('$username', '$password')";			//insert to the database from user input
	$result = mysqli_query($conn, $sql);
	if ($result) {
		$manager_msg = "You have successfully signup";						//pop-up message if success
		header("location:manager_login.php?manager_msg=$manager_msg");
	}

}

}
else{
	echo "Unable to connect to the database.";
}

 ?>



</body>
</html>
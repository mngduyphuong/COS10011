<!DOCTYPE html>
<html lang="en">
<?php include("includes/header.inc"); ?>
<body>
<?php include("includes/menu.inc"); ?>
<!-- log in page for manager to login using their account, manager can onlu access by logged user -->
<section class="login">
		<img src="images/logo.png" id="logo" width="200">
		<h1>Login to your account</h1>

		<form action="#" method="post">		<!-- create an php and checking data in database -->
			<p id="username">
				<label for="username">Username</label>
				<input type="text"  placeholder="Enter username"  name="username" >				<!-- get the username value from user -->
			</p>
			<p>
				<label for="password">Password</label>
				<input type="password"  placeholder="Enter password" id="password" name="password" >		<!-- get the password value from user -->
			</p>
			<?php
			if (isset($_GET["manager_msg"])) {					//popup a message if there is a error
				echo "<div class='manager_msg'>";
				echo $_GET["manager_msg"];
				echo "</div>";
			}
			?>
			<input type="submit" class="button" value="Login"><br>					<!-- 	login button to submit the information -->
			<a href="manager_signup.php" id="signup">Don't have an account?</a><br>
			<a href="index.php" id="signup">Back to homepage</a>
			
			<p>Use admin-admin to login if you dont have account</p>
		</form>
</section>

<?php 
require_once('settings.php');		//get connection information to database
$conn = @mysqli_connect($host,$user,$pwd,$sql_db);
if ($conn) {

	if (isset($_POST['username'])) {			//get the data from user input
	$username=$_POST['username'];
	$password=$_POST['password'];

	$sql = "SELECT * FROM manager WHERE username='$username'AND password='$password'";			//check the data with database
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0)			//if there is a match, stored information with session function and redirect to manager page
	{
		session_start();
		//info
		$_SESSION['login_username'] = $username;
		$_SESSION['login_password'] = $password;
		header("location:manager.php");
	}
	else{
		$manager_msg = "ERROR: Wrong user name or password";					//return error message
		header("location:manager_login.php?manager_msg=$manager_msg");
	}
}

}
else{
	echo "Unable to connect to the database.";				//error massegae if cant connect to the database
}

 ?>



</body>
</html>
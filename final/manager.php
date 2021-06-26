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
	<title>Manager</title>
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	 <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet"> 
</head>

<body>
<?php include("includes/menu.inc"); ?>
<section class="content">
	
	<fieldset class="enquire_form">

		<!-- search function allows manager to search by username -->
			<h2>Search by username</h2>
	<form action="manager.php" method="post">
		<p><label>Username: <input type="text" name="username" ></label></p>    
		<input type="submit" value="Search" class="button">
	</form>
	</fieldset>
	<br>
	<fieldset class="enquire_form">

		<!-- search function allows manager to search by username -->
			<h2>Search by role</h2>
	<form action="manager.php" method="post">
		<input type="radio"  name="search_role" value="Organiser" >
		<label >Organisers</label>
			                    
		<input type="radio"  name="search_role" value="Participant"/>
		<label >Participants</label><br>

		
		<label >ASC</label>
		<input type="radio"  name="orderby" value="ACS" checked="" /><br>
		<label >DESC</label>
		<input type="radio"  name="orderby" value="DESC"/><br>

		<input type="submit" value="Search" class="button">
	</form>
	</fieldset>



	<!-- search by username of normal -->
	<?php
	//display all order if not searching for anything
	

	//search by username
	if(isset($_POST["username"]))  {
		$uname=trim($_POST["username"]);
		$query="SELECT * FROM registration WHERE username LIKE '%$uname%'";		//get the input from the user and search matching in username collumn
	}
	else if (isset($_POST["search_role"])) {
		$search= $_POST["search_role"];
		$orderby = $_POST["orderby"];

		$query="SELECT * FROM registration WHERE role LIKE '%$search%' ORDER BY username";
		if ($orderby == "DESC") {
			$query="SELECT * FROM registration WHERE role LIKE '%$search%' ORDER BY username DESC";
		}
		
	}
	else
		$query = "SELECT * FROM registration";	

	?>





					<!-- print the table -->
	<?php 
	require_once "setting.php";	// Load MySQL log in credentials
	$conn = mysqli_connect ($host,$user,$pwd,$sql_db);	// Log in and use database
	if ($conn) { // connected
 
		$result = mysqli_query ($conn, $query);		
		if ($result) {	//   query was successfully executed
			
			$record = mysqli_fetch_assoc ($result);
			if ($record) {		//   record exist
				//print the table with data from the database
				echo "<table class='managerTable'>";
				echo "<tr><th>ID</th><th>Reference num</th><th>Username</th><th>Qualification</th><th>Email</th><th>Phone</th><th>Role</th></tr>";
				while ($record) {
					echo "<tr><td>{$record['id']}</td>";
					echo "<td>{$record['reference']}</td>";
					echo "<td>{$record['username']}</td>";
					echo "<td>{$record['qualification']}</td>";
					echo "<td>{$record['email']}</td>";
					echo "<td>{$record['phone']}</td>";
					echo "<td>{$record['role']}</td></tr>";
					$record = mysqli_fetch_assoc($result);
				}
				echo "</table>";
				mysqli_free_result ($result);	// Free resources
			} else {
				echo "<p>No record retrieved.</p>";
			}
		} else {
			echo "<p>Table doesn't exist or select operation unsuccessful.</p>";
		}
		mysqli_close ($conn);	// Close the database connection
	} else {
		echo "<p>Unable to connect to the database.</p>";
	}
	 ?>

</section>


<?php include("includes/footer.inc"); ?>
</body>
</html>
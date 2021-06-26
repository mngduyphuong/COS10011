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
	<!-- additional requirement -->
	<fieldset class="enquire_form">

		<!-- search function allows manager to search by username -->
			<h2>Search by textarea</h2>
	<form action="manager.php" method="post">
		<p><label>Textarea: <input type="text" name="textarea" ></label></p>    
		<input type="submit" value="Search" class="button">
	</form>
	</fieldset>



	<!-- search by username of normal -->
 	<!-- <?php
	//display all order if not searching for anything
	if (!isset($_POST["username"]))
		$query = "SELECT * FROM registration";	

	//search by username
	else {
		$uname=trim($_POST["username"]);
		$query="SELECT * FROM registration WHERE username LIKE '%$uname%'";		//get the input from the user and search matching in username collumn
	}

	?>  -->


	<?php
	//display all order if not searching for anything
	

	//search by username
	if (isset($_POST["username"]))  {
		$uname=trim($_POST["username"]);
		$query="SELECT * FROM test WHERE username LIKE '%$uname%'";		//get the input from the user and search matching in username collumn
	}
	else if (isset($_POST["textarea"]))  {
		$tarea=trim($_POST["textarea"]);
		$query="SELECT * FROM test WHERE textarea LIKE '%$tarea%'";		//get the input from the user and search matching in username collumn
	}
	else 
		$query = "SELECT * FROM test";	
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
				// echo "<tr><th>ID</th><th>Reference num</th><th>Username</th><th>Qualification</th><th>Email</th><th>Phone</th></tr>";
				// while ($record) {
				// 	echo "<tr><td>{$record['id']}</td>";
				// 	echo "<td>{$record['reference']}</td>";
				// 	echo "<td>{$record['username']}</td>";
				// 	echo "<td>{$record['qualification']}</td>";
				// 	echo "<td>{$record['email']}</td>";
				// 	echo "<td>{$record['phone']}</td></tr>";
				// 	$record = mysqli_fetch_assoc($result);
				// }
					//addition requirements
				echo "<tr><th>ID</th><th>Reference num</th><th>Username</th><th>Qualification</th><th>Email</th><th>Phone</th><th>Text</th></tr>";
				while ($record) {
					echo "<tr><td>{$record['id']}</td>";
					echo "<td>{$record['reference']}</td>";
					echo "<td>{$record['username']}</td>";
					echo "<td>{$record['qualification']}</td>";
					echo "<td>{$record['email']}</td>";
					echo "<td>{$record['phone']}</td>";
					echo "<td>{$record['textarea']}</td></tr>";
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
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
	<title>Process</title>
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	 <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet"> 

</head>
<body>
<?php include("includes/menu.inc"); ?>
<section class="content">
	<?php

	 require_once ("setting.php");
	 //clean all the input data
	function sanitise_input($data)
		{
			$data = trim($data);				//remove spaces
			$data = stripslashes($data);		//remove backslashes in front of quotes
			$data = htmlspecialchars($data);	//convert HTML special characters to HTML code
			return $data;
		}

		//get the data from register submition
	$err_msg="";	
	$ref = sanitise_input($_POST["ref"]);
	$username = sanitise_input($_POST["username"]);
	$email = sanitise_input($_POST["email"]);
	$phone = sanitise_input($_POST["phone"]);

	//checking if the user chose their qualification or not
	if (!isset($_POST["quali"])) {
		$err_msg .= "<p>Please select your qualification.</p>";
	}
	else{
			$role = sanitise_input($_POST["role"]);

		$quali = sanitise_input($_POST["quali"]);
			if ($role == "Organiser" && $quali == "Undergraduatel") {
		$err_msg .= "<p>Undergraduates cannot be registered as organisers.</p>";
	} 
	}

	//additional requirements
	$role = sanitise_input($_POST["role"]);



	// //testing input which sent to process.php
	// echo "$ref<br>";
	// echo "$username<br>";
	// echo "$email<br>";
	// echo "$phone<br>";
	// echo "$quali<br>";
	// echo "$role";

	if ($err_msg==""){				//if there is no error, input all the data to database
		//connect to the database
		$conn = @mysqli_connect($host,
		$user,
		$pwd,
		$sql_db
		);


		if (!$conn) {
		// Displays an error message
		$err_msg= "<p>Unable to connect to the database.</p>"; 
		} 

		else //if successfully connect to the database
		{
			//create a table if it is not exist
			$query = "CREATE TABLE IF NOT EXISTS registration (
							id INT AUTO_INCREMENT PRIMARY KEY, 
							reference text(20),
							username text(20),
							qualification text(20),
							email text(30),
							phone text(20),
							role text(20)
							);";

		// execute the query -we should really check to see if the database exists first.
		$result = mysqli_query($conn, $query);
		// checks if the execution was successful
		if ($result) {
			//insert all data into table in database using insert function
			$sql_table = 'registration';
			$query = "INSERT into $sql_table (reference, username, qualification, email, phone, role) 
		values ('$ref', '$username', '$quali', '$email', '$phone', '$role');";
			$insert_result = mysqli_query ($conn, $query);

			if ($insert_result) {
			 	$err_msg= "<p>You are successfully registered!</p>";		//display the result
			 } 
		}

		else //if not succes, display error
		{
		$err_msg= "<p>Create table operation unsuccessful.</p>";
		} 

		// close the database connection
		mysqli_close($conn);

		}
				
			}




	echo "$err_msg";		//display all the message 
	?>


</section>
<?php include("includes/footer.inc"); ?>
</body>
</html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="description" content="Creating Web Applications Lab 10" />
<meta name="keywords" content="PHP, MySql" />
<title>Retrieving records to HTML</title>
</head>
<body>
<h1>Creating Web applications – Lab10</h1>
<?php
 require_once ("settings.php"); //connection info
$conn = @mysqli_connect($host,
$user,
$pwd,
$sql_db
);
// Checks if connection is successful
if (!$conn) {
// Displays an error message
echo "<p>Database connection failure</p>"; // not in production script
} else {
$make = htmlspecialchars($_POST["carmake"]);
$model = htmlspecialchars($_POST["carmodel"]);
$price = htmlspecialchars($_POST["price"]);
$yom = htmlspecialchars($_POST["yom"]);

			$input = "";
			if ($make != "")		
				$input .= "make like '$make%'";
			if ($model != ""){
				if ($input != "")
					$input .= "and model like '$model%'";
				else
					$input .= "model='$model'";
			}
			if ($price != ""){
				if ($input != "")
					$input .= "and price like '$price%'";
				else
					$input .= "price='$price'";
			}
			if ($yom != ""){
				if ($input != "")
					$input .= "and yom like '$yom%'";
				else
					$input .= "yom='$yom'";
			}
			if ($input == "") {
				header("location: searchcar.html");
			}
$sql_table = "cars";
$query = "select * from cars where $input;";
// execute the query -we should really check to see if the database exists first.
$result = mysqli_query($conn, $query);
// checks if the execution was successful
if(!$result) {
echo "<p class=\"wrong\">Something is wrong with ", $query, "</p>";
 //Would not show in a production script
} 
else{		//if execution works
				echo "<table border='1'>";
				echo "<tr>
							<th scope='col'>Make</th>
							<th scope='col'>Model</th>
							<th scope='col'>Price</th>
							<th scope='col'>Year</th>
					  </tr>";
				while ($record = mysqli_fetch_assoc($result)){		
					echo "<tr>\n";
					echo "<td>", $record["make"], "</td>\n";
					echo "<td>", $record["model"], "</td>\n";
					echo "<td>", $record["price"], "</td>\n";
					echo "<td>", $record["yom"], "</td>\n";
					echo "</tr>\n";
				}
				echo "</table>";
				mysqli_free_result($result);		//free the memory
			}
			mysqli_close($conn);		//close connection
		}
?>
</body>
</html>
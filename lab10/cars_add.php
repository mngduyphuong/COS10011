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

$sql_table = 'cars';

$query = "insert into $sql_table (make, model, price, yom) values ('$make', '$model', '$price', '$yom')";
// execute the query -we should really check to see if the database exists first.
$result = mysqli_query($conn, $query);
// checks if the execution was successful
if(!$result) {
echo "<p class=\"wrong\">Something is wrong with ", $query, "</p>";
 //Would not show in a production script
} 
else {
// display an operation successful message
echo "<p class=\"ok\">Successfully added New Car record</p>";
} // if successful query operation
// close the database connection
mysqli_close($conn);
 // if successful database connection
}
?>
</body>
</html>
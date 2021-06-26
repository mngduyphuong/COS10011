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
// Upon successful connection
$sql_table="cars";
// Set up the SQL command to add the data into the table
$query = "select make, model, price FROM cars ORDER BY make, model";
// execute the query and store result into the result pointer
$result = mysqli_query($conn, $query);
// checks if the execution was successful
if(!$result) {
echo "<p>Something is wrong with ", $query, "</p>";
} else {
// Display the retrieved records
echo "<table border=\"1\">";
echo "<tr>"
."<th scope=\"col\">Make</th>"
 ."<th scope=\"col\">Model</th>"
."<th scope=\"col\">Price</th>"
."</tr>";
// retrieve current record pointed by the result pointer
while ($row = mysqli_fetch_assoc($result)){
echo "<tr>";
echo "<td>",$row["make"],"</td>";
echo "<td>",$row["model"],"</td>";
echo "<td>",$row["price"],"</td>";
echo "</tr>";
}
echo "</table>";
// Frees up the memory, after using the result pointer
mysqli_free_result($result);
} // if successful query operation
// close the database connection
mysqli_close($conn);
} // if successful database connection
?>
</body>
</html>
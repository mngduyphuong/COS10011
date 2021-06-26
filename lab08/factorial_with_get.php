<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php
include ("mathfunctions.php");
?>
<h1>Creating Web Applications - Lab 8</h1>

<?php
        if (isset($_GET["number"])){
            $num = $_GET["number"];
            if (isPositiveInteger($num)){
                echo "<p>". $num, "! is ", factorial($num), ".</p>";
            } else {
                echo "<p>Please enter a positive integer.</p>";
            }
        }
        echo "<p><a href='factorial.html's>Return to the Entry Page</a></p>";
?>

</body>
</html>
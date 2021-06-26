<!DOCTYPE html>
<html lang="en">
<head>
	<title>Booking Confirmation</title>
	<meta charset="utf-8"/>
	<meta name="description" content="Rohirrim Booking Form" />
	<meta name="keywords"    content=" " />
</head>
<body>
	<h1>Rohirrim Tour Booking Confirmation</h1>
	<?php

	function sanitise_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


	 if (isset ($_POST["firstname"]))	{
	 	$firstname = $_POST["firstname"];
	 	$firstname = sanitise_input($firstname);
	 }
	 else	{
	 	 //echo "<p>Error: Enter data in the <a href=\"register.html\">form</a></p>";
	 	 header("location: register.html");
	 }
	 
	 if (isset ($_POST["lastname"]))
	 {
		$lastname = $_POST["lastname"];
	 	$lastname = sanitise_input($lastname);
	 }

	 if (isset ($_POST["age"]))
	 {
	 	$age = $_POST["age"];
	 	$age = sanitise_input($age);

	 }

	 if (isset ($_POST["food"]))
	 {
	 	$food = $_POST["food"];
	 	$food = sanitise_input($food);
	 }

	 if (isset ($_POST["partySize"]))
	 {
	 	$partySize = $_POST["partySize"];
	 	$partySize = sanitise_input($partySize);
	 }


	if (isset($_POST["species"])) {
        $species = $_POST["species"];
        $species = sanitise_input($species);
    } 
    else {
        $species = "Unkown Species";
    }


    $tour = "";
    if (isset($_POST["1day"])) {
        $tour = $tour . "One-day tour";
    }
    if (isset($_POST["4day"])) {
         $tour = $tour . "Four-day tour";
        if (isset($_POST["1day"])) {
         	$tour = "One-day tour and Four-day tour";
         }

    }
    if (isset($_POST["10day"])) {
         $tour = $tour . "Ten-day tour";
         if (isset($_POST["1day"])) {
         	$tour = "One-day tour and Ten-day tour";
         }
         if (isset($_POST["4day"])) {
         	$tour = "Four-day tour and Ten-day tour";
         }
         if (isset($_POST["1day"]) && isset($_POST["4day"])) {
         	$tour = "One-day tour, Four-day tour and Ten-day tour";
         }
     
    }
    
    // Validation the input data
    $errMsg = "";
    if ($firstname == "") {
        $errMsg .= "<p>You must enter your first name.</p>";
    } elseif (!preg_match("/^[a-zA-Z]*$/", $firstname)) {
        $errMsg .= "<p>Only alpha letters allowed in your first name.</p>";
    }

    if ($lastname == "") {
        $errMsg .= "<p>You must enter your last name.</p>";
    } elseif (!preg_match("/^[a-zA-Z\-]*$/", $lastname)) {
        $errMsg .= "<p>Only alpha letters and hyphens allowed in your last name.</p>";
    }

    if (!is_numeric($age)) {
        $errMsg .= "<p>Your age must be an integer</p>";
    } elseif ($age < 10 || $age > 10000) {
        $errMsg .= "<p>Your age must be between 10 and 10000</p>";
    }


    if ($errMsg != "") {
        echo "$errMsg";
    } else {
        echo "<p>Welcome $firstname $lastname!</p>";
        echo "<p>You are now booked on the $tour.</p>";
        echo "<p>Species: $species</p>";
        echo "<p>Age: $age</p>";
        echo "<p>Meal Preference: $food</p>";
        echo "<p>Number of travellers: $partySize</p>";
    }
	?>
	

</body>
</html>
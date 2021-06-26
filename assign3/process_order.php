<section class="content" id="payment_content">
<?php

 require_once ("settings.php");

function sanitise_input($data)
		{
			$data = trim($data);				//remove spaces
			$data = stripslashes($data);		//remove backslashes in front of quotes
			$data = htmlspecialchars($data);	//convert HTML special characters to HTML code
			return $data;
		}

	//get data from payment page
	date_default_timezone_set('Australia/Melbourne');//set the timeezone for time function
	$order_time = date("d/m/Y h:i:sa");				//get the time by sever using dd/mm/yy hour:minutes:second formula
	$order_status = "PENDING";						//set the default status value of all order to pending

	//other data value that doesnot require validate
	$visualadd = sanitise_input($_POST["visualadd"]);
	$audioadd = sanitise_input($_POST["audioadd"]);
	$text = sanitise_input($_POST["textarea_1"]);
	$cardname = sanitise_input($_POST["cardname"]);








// *********************  if it is not submitted from payment or fix_order, redirection
	if (!isset($_POST["submitButton"])) {//it is not triggered by payment form submission (eg. by direct URL access)
		header("location:enquire.php");
		exit();
	}
	




	// **********************  validate form  for all data
	$err_msg="";
	// first name
	if (!isset($_POST["firstname"])) {
		// if this page is triggered by payment form submission, all text inputs are set
		// for security reason, just in case somebody created a similar form, and tried to submit to process_order, we can also test isset for all the text inputs
		header("location:enquire.php");
		exit();
	}
	else{
		$firstname = sanitise_input($_POST["firstname"]);
		if ($firstname=="") {
			$err_msg .= "<p>Please enter first name.</p>";
		}
		else if (!preg_match("/^[a-zA-Z\s]{2,25}$/",$firstname)) {
			$err_msg .= "<p>First name can only contain max 25 alpha characters.</p>";
		}
	}
	
	// last name  	
	if (!isset($_POST["lastname"])) {
		header("location:enquire.php");
		exit();
	}
	else{
		$lastname = sanitise_input($_POST["lastname"]);
		if ($lastname=="") {
			$err_msg .= "<p>Please enter last name.</p>";
		}
		else if (!preg_match("/^[a-zA-Z\s]{2,25}$/",$lastname)) {
			$err_msg .= "<p>Last name can only contain max 25 alpha characters.</p>";
		}
	}


		//email
	if (!isset($_POST["email"])) {
		header("location:enquire.php");
		exit();
	}
	else{
		$email = sanitise_input($_POST["email"]);
		if ($email=="") {
			$err_msg .= "<p>Please enter your email.</p>";
		}
		else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$err_msg .= "<p>Please check your email address.</p>";
		}
	}


	//phone
	if (!isset($_POST["phone"])) {
		header("location:enquire.php");
		exit();
	}
	else{
		$phone = sanitise_input($_POST["phone"]);
		if ($phone=="") {
			$err_msg .= "<p>Please enter your phone number .</p>";
		}
		else if (!preg_match("/^[0-9]{8,12}$/",$phone)) {
			$err_msg .= "<p>The maximum of phone number is 12 digits.</p>";
		}
	}

	//address
	if (!isset($_POST["address"])) {
		header("location:enquire.php");
		exit();
	}
	else{
		$address = sanitise_input($_POST["address"]);
		if ($address=="") {
			$err_msg .= "<p>Please enter your address.</p>";
		}
		else if (!preg_match("/^[a-zA-Z0-9\s]{2,40}$/",$address)) {
			$err_msg .= "<p>Address contains maximum 40 characters.</p>";
		}
	}

	//suburb
	if (!isset($_POST["suburb"])) {
		header("location:enquire.php");
		exit();
	}
	else{
		$suburb = sanitise_input($_POST["suburb"]);
		if ($suburb=="") {
			$err_msg .= "<p>Please enter suburb.</p>";
		}
		else if (!preg_match("/^[a-zA-Z\s]{2,20}$/",$suburb)) {
			$err_msg .= "<p>Suburb contains maximum 20 characters.</p>";
		}
	}

	//state
	if (!isset($_POST["state"])) {
		header("location:enquire.php");
		exit();
	}
	else{
		$state = sanitise_input($_POST["state"]);
		if ($state=="") {
			$err_msg .= "<p>Please chose your state.</p>";
		}
	}

	//postcode
	if (!isset($_POST["postcode"])) {
		header("location:enquire.php");
		exit();
	}
	else{
		$postcode = sanitise_input($_POST["postcode"]);
		if ($postcode=="") {
			$err_msg .= "<p>Please enter your postcode.</p>";
		}
		else {
			$postcode = sanitise_input($_POST["postcode"]);
			if (!preg_match("/^[0-9]{4}$/",$postcode)) {
			$err_msg .= "<p>Postcode contains 4 digits.</p>";
		}
			else{
				if($state == "VIC" && $postcode[0]!= 3 && $postcode[0]!= 8 )
				{
					$err_msg .= "<p>Your postcode didn't match the state. VIC = 3 OR 8.</p>";
				}
				else if($state == "NSW" && $postcode[0]!= 1 && $postcode[0]!= 2 )
				{
					$err_msg .= "<p>Your postcode didn't match the state. NSW = 1 OR 2.</p>";
				}
				else if($state == "QLD" && $postcode[0]!= 4 && $postcode[0]!= 9 )
				{
					$err_msg .= "<p>Your postcode didn't match the state. QLD = 4 OR 9.</p>";
				}
				else if($state == "NT" && $postcode[0]!= 0 )
				{
					$err_msg .= "<p>Your postcode didn't match the state. NT = 0.</p>";
				}
				else if($state == "WA" && $postcode[0]!= 6 )
				{
					$err_msg .= "<p>Your postcode didn't match the state. WA = 6.</p>";
				}
					else if($state == "SA" && $postcode[0]!= 5 )
				{
					$err_msg .= "<p>Your postcode didn't match the state. SA = 5.</p>";
				}
				else if($state == "TAS" && $postcode[0]!= 7 )
				{
					$err_msg .= "<p>Your postcode didn't match the state. TAS = 7.</p>";
				}
				else if($state == "ACT" && $postcode[0]!= 0 )
				{
					$err_msg .= "<p>Your postcode didn't match the state. ACT = 0.</p>";
				}
			}

		}
	}

	//contact
	if (!isset($_POST["contact"])) {
		header("location:enquire.php");
		exit();
	}
	else{
		$contact = sanitise_input($_POST["contact"]);
		if ($contact=="") {
			$err_msg .= "<p>Please chose your preferred contact.</p>";
		}
	}

	//product
	if (!isset($_POST["product"])) {
		header("location:enquire.php");
		exit();
	}
	else{
		$product = sanitise_input($_POST["product"]);
		if ($product=="") {
			$err_msg .= "<p>Please chose your product.</p>";
		}
		
	}


	//option
	$option1 = "False";
	if (isset($_POST["option1"])){
	$option1 = sanitise_input($_POST["option1"]);}
	$option2 = "False";
	if (isset($_POST["option2"])){
	$option2 = sanitise_input($_POST["option2"]);}
	if ($option1 == "False" && $option2 == "False")
	{
		$err_msg .= "<p>Please choose your product option.</p>";
	}

	//rent_time
	if (!isset($_POST["rent_time"])) {
		header("location:enquire.php");
		exit();
	}
	else{
		$rent_time = sanitise_input($_POST["rent_time"]);
		if ($rent_time=="") {
			$err_msg .= "<p>Please enter your renting time.</p>";
		}
		else if (!is_numeric($rent_time)) {
			$err_msg .= "<p>Rent time is not numeric.</p>";
		}
		else {
			$rent_time=(int)$rent_time;
		}
	}

	//cardtype
	if (!isset($_POST["cardtype"])) {
		header("location:enquire.php");
		exit();
	}
	else{
		$cardtype = sanitise_input($_POST["cardtype"]);
		if ($cardtype=="") {
			$err_msg .= "<p>Please chose your card type.</p>";
		}
	}

	//cardnumber
	if (!isset($_POST["cardnumber"])) {
		header("location:enquire.php");
		exit();
	}
	else{
		$cardnumber = sanitise_input($_POST["cardnumber"]);
		if ($cardnumber=="") {
			$err_msg .= "<p>Please enter your card number.</p>";
		}
		else {
			switch ($cardtype){			//use switch function to validate information
		case "visa": 								//visa card type																		
			if ($cardnumber[0] != "4"){																			
				$err_msg .= "<p>Visa card number start with 4.</p>";
			}
			else if (!preg_match("/^[0-9]{16}$/",$cardnumber)){															
				$err_msg .= "<p>Visa card number contains 16 digits.</p>";
			}
			break;

		case "master": 								//master card type																				
			if ($cardnumber[0] != "5" && $cardnumber[1] < 1 && $cardnumber[1] > 5){			
				$err_msg .= "<p>MasterCard start with digits 51 through to 55.</p>";
			}
			else if (!preg_match("/^[0-9]{16}$/",$cardnumber)){															
				$err_msg .= "<p>MasterCard number contains 16 digits.</p>";
			}
			break;

		case "amex": 										//amex card													
			if ($cardnumber[0] != "3" && ($cardnumber[1] != "4" || $cardnumber[1] != "7")){						
				$err_msg .= "<pAmerican Express must start with 34 or 37.</p>";
			}
			else if (!preg_match("/^[0-9]{15}$/",$cardnumber)){															
				$err_msg .= "<p>MasterCard number must be 15 digits.</p>";
			}
			break;


	}

		}
	}

	//cardexpiry
	if (!isset($_POST["cardexpiry"])) {
		header("location:enquire.php");
		exit();
	}
	else{
		$cardexpiry = sanitise_input($_POST["cardexpiry"]);
		if ($cardexpiry=="") {
			$err_msg .= "<p>Please enter your card expiry date.</p>";
		}
		else if (!preg_match("/^([0-9]{2})(\/)([0-9]{2})$/",$cardexpiry)) {
			$err_msg .= "<p>Please check your card expiry.</p>";
		}
	}

	//cardCVV
	if (!isset($_POST["cardCVV"])) {
		header("location:enquire.php");
		exit();
	}
	else{
		$cardCVV = sanitise_input($_POST["cardCVV"]);
		if ($cardCVV=="") {
			$err_msg .= "<p>Please enter your card CVV.</p>";
		}
		else if (!preg_match("/^[0-9]{3}$/",$cardCVV)) {
			$err_msg .= "<p>CardCVV contains 3 digits.</p>";
		}
	}


//if there is an error in the payment process, redirect to fix_order with all the informations, card information will not be passed
if ($err_msg!=""){
		// pass the name-value pairs via session, pass the err_msg using query string
		// you can use other methods
		session_start();
	
		//info of the customer
		$_SESSION['firstname'] = $firstname;
		$_SESSION['lastname'] = $lastname;
		$_SESSION['email'] = $email;
		$_SESSION['phone'] = $phone;
		$_SESSION['address'] = $address;
		$_SESSION['suburb'] = $suburb;
		$_SESSION['state'] = $state;
		$_SESSION['postcode'] = $postcode;
		$_SESSION['contact'] = $contact;

		//order info
		$_SESSION['product'] = $product;
		$_SESSION['rent_time'] = $rent_time;
		$_SESSION['text'] = $text;
		$_SESSION['option1'] = $option1;
		$_SESSION['option2'] = $option2;
		$_SESSION['audioadd'] = $audioadd;
		$_SESSION['visualadd'] = $visualadd;
				
		//echo $err_msg;
		header("location:fix_order.php?err_msg=$err_msg"); //pass the error to fix_order
		exit();
	}

//connect to the database
$conn = @mysqli_connect($host,
$user,
$pwd,
$sql_db
);

$db_msg=""; 

if (!$conn) {
// Displays an error message
$db_msg= "<p>Unable to connect to the database.</p>"; // not in production script
} 

else //if successfully connect to the database
{
	//create a table if it is not exist
	$query = "CREATE TABLE IF NOT EXISTS orders (
					order_id INT AUTO_INCREMENT PRIMARY KEY, 
					order_cost DECIMAL(11,2),
					order_time TEXT(20),
					order_status TEXT(20),
					order_product text(20),
					order_option1 text(20),
					order_option2 text(20),
					order_visual text(20),
					order_audio text(20),
					order_rent int(20),
					order_text text(50),
					order_cardtype text(20),
					order_cardname text(20),
					order_cardnumber bigint(20),
					order_cardexpiry text(20),
					order_cardCVV int(20),
					info_firstname text(20),
					info_lastname text(20),
					info_email text(20),
					info_phone text(20),
					info_address text(20),
					info_suburb text(20),
					info_state text(20),
					info_postcode int(20),
					info_contact text(20)
					);";




	

// execute the query -we should really check to see if the database exists first.
$result = mysqli_query($conn, $query);
// checks if the execution was successful
if ($result) {

			//function to calculate the total cost of customer order
			$rent_rate = 0;
			if ($audioadd!="") {
				$rent_rate+=10;
			}
			if ($visualadd!="") {
				$rent_rate+=50;
			}
		
			if (($product == "audio" || $product == "visual") && $option1 =="True") 
			{
				$rent_rate += 100;
			}
			if (($product == "audio" || $product == "visual") && $option2 =="True") 
			{
				$rent_rate += 300;
			}
			if ($product == "combo" && $option2 =="True") 
			{
				$rent_rate += 500;
			}
			if ($product == "combo" && $option1 =="True") 
			{
				$rent_rate += 180;
			}

	$totalcost = $rent_time * $rent_rate;


	//insert all data into table in database using insert function
	$sql_table = 'orders';
	$query = "INSERT into $sql_table (order_cost, order_time, order_status, order_product, order_option1, order_option2, order_visual, order_audio, order_rent, order_text, order_cardtype, order_cardname, order_cardnumber, order_cardexpiry, order_cardcvv, info_firstname, info_lastname, info_email, info_phone, info_address, info_suburb, info_state, info_postcode, info_contact) 
values ('$totalcost', '$order_time', '$order_status', '$product', '$option1', '$option2', '$visualadd', '$audioadd', '$rent_time', '$text', '$cardtype', '$cardname', '$cardnumber', '$cardexpiry', '$cardCVV', '$firstname', '$lastname', '$email', '$phone', '$address', '$suburb', '$state', '$postcode', '$contact');";
	$insert_result = mysqli_query ($conn, $query);


	//if the insert success, pass all the data to a table in receipt page
	if ($insert_result) {	//   insert successfully 
				$db_msg="<p>Your order is inserted into the database.</p>"
						. "<table class='receiptTable'><tr><th>Item</th><th>Value</th></tr>"
						. "<tr><th>Order ID</th><td>" . mysqli_insert_id($conn) . "</td></tr>"
						. "<tr><th>First Name</th><td>$firstname</td></tr>"
						. "<tr><th>Last Name</th><td>$lastname</td></tr>"
						. "<tr><th>Email</th><td>$email</td></tr>"
						. "<tr><th>Address</th><td>$address</td></tr>"
						. "<tr><th>Suburb</th><td>$suburb</td></tr>"
						. "<tr><th>State</th><td>$state</td></tr>"
						. "<tr><th>Postcode</th><td>$postcode</td></tr>"
						. "<tr><th>Contact</th><td>$contact</td></tr>"
						. "<tr><th>Product option</th><td>$product</td></tr>"
						. "<tr><th>Option 1</th><td>$option1</td></tr>"
						. "<tr><th>Option 2</th><td>$option2</td></tr>"
						. "<tr><th>Visual Add on</th><td>$visualadd</td></tr>"
						. "<tr><th>Audio add on</th><td>$audioadd</td></tr>"
						. "<tr><th>Text</th><td>$text</td></tr>"
						. "<tr><th>Rent time</th><td>$rent_time</td></tr>"
						. "<tr><th>Order time</th><td>$order_time</td></tr>"
						. "<tr><th>Order status</th><td>$order_status</td></tr>"
						. "<tr><th>Total cost</th><td>$totalcost</td></tr>"
						//. "<tr><th>rat</th><td>$rent_rate</td></tr>"
						. "</table>";  // you can display more information 
						} 
	else {
				$db_msg= "<p>Insert  unsuccessful.</p>";
	}
}

else //if not succes, display error
{
$db_msg= "<p>Create table operation unsuccessful.</p>";
	// echo "<p class=\"wrong\">Something is wrong with ", $query, "</p>";
} 




 header("location:receipt.php?db_msg=$db_msg");		//redirect to receipt page to print the receipt
// close the database connection
mysqli_close($conn);

}


?>
</section>

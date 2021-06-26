<!DOCTYPE html>
<html lang="en">
<?php include("includes/header.inc"); ?>

<body>
<?php include("includes/menu.inc"); ?>
<section class="content" id="payment_content">
<!-- 	fix all the error in the form before re-submit it again to order_process.php -->
<h2>Please fix these errors</h2>
<?php  
if (!isset($_GET["err_msg"])) {
		header("location:enquire.php");
		exit();// terminiate 
	}
	// **********************   from process_order.php
	// display error message  
	echo "<div class='error'>";
	echo $_GET["err_msg"];
	echo "</div>";
	// get values from session
	session_start();
	if (isset($_SESSION["firstname"]))    // first name
		$firstname=$_SESSION["firstname"];
	else 
		$firstname="";
	 
	if (isset($_SESSION["lastname"]))    // last name
		$lastname=$_SESSION["lastname"];
	else 
		$lastname="";

	if (isset($_SESSION["email"])) //email
		$email=$_SESSION["email"];
	else 
		$email="";

	if (isset($_SESSION["phone"])) //phone
		$phone=$_SESSION["phone"];
	else 
		$phone="";

	if (isset($_SESSION["address"])) //address
		$address=$_SESSION["address"];
	else 
		$address="";

	if (isset($_SESSION["suburb"])) //suburb
		$suburb=$_SESSION["suburb"];
	else 
		$suburb="";

	if (isset($_SESSION["state"])) //state
		$state=$_SESSION["state"];
	else 
		$state="";


	if (isset($_SESSION["postcode"])) //postcode
		$postcode=$_SESSION["postcode"];
	else 
		$postcode="";

	if (isset($_SESSION["contact"])) 	//contact type
		$contact=$_SESSION["contact"];
	else 
		$contact="";

	if (isset($_SESSION["product"]))  //product
		$product=$_SESSION["product"];
	else 
		$product="";

	if (isset($_SESSION["rent_time"])) 	//renting time
		$rent_time=$_SESSION["rent_time"];
	else 
		$rent_time="";

	if (isset($_SESSION["text"])) 		//coment from the customer
		$text=$_SESSION["text"];
	else 
		$text="";

	if (isset($_SESSION["option1"])) 
		$option1=$_SESSION["option1"];
	else 
		$option1="False";

	if (isset($_SESSION["option2"])) 
		$option2=$_SESSION["option2"];
	else 
		$option2="False";

	if (isset($_SESSION["audioadd"])) 
		$audioadd=$_SESSION["audioadd"];
	else 
		$audioadd="";
	
	if (isset($_SESSION["visualadd"])) 
		$visualadd=$_SESSION["visualadd"];
	else 
		$visualadd="";
	
	//the card information will not be recorded

?>


<form  method="post" action="process_order.php" id="paymentForm" novalidate="novalidate">
		<fieldset class="enquire_form">
			<legend>Customer details</legend>
		
		<!-- set all the value from previous input, display blank if the input is empty-->
		<p>
			<label for="firstname">First Name: </label>
			<input type="text" name= "firstname" id="firstname" value="<?php echo $firstname; ?>"> 
		</p>
		
		<p>
			<label for="lastname">Last name: </label>
			<input type="text" name= "lastname" id="lastname" value="<?php echo $lastname; ?>">
		</p>
		
		<p>
			<label for="email">Email address: </label>
			<input type="text" name= "email" id="email"  size="30" value="<?php echo $email; ?>">
		</p>
		
		<p>
			<label>Phone numbers: </label>
			<input type="text" name= "phone" id="phone" value="<?php echo $phone; ?>" >
		</p>
		



		<p>
			<label for="address">Address: </label>
			<input type="text" name= "address" id="address"  size="20" value="<?php echo $address; ?>">
		</p>
				<p>
			<label for="suburb">Suburb: </label>
			<input type="text" name= "suburb" id="suburb" value="<?php echo $suburb; ?>">
		</p>

		<p>
	            <label for="state">State:</label>
	            <select id="state" name="state" required='required'>
			        <option value="">Please select</option>
			        <option <?php if ($state == "VIC" ) echo 'selected' ; ?> value="VIC">VIC</option>
			        <option <?php if ($state == "NSW" ) echo 'selected' ; ?> value="NSW">NSW</option>
			        <option <?php if ($state == "QLD" ) echo 'selected' ; ?> value="QLD">QLD</option>
			        <option <?php if ($state == "NT" ) echo 'selected' ; ?> value="NT">NT</option>
			        <option <?php if ($state == "WA" ) echo 'selected' ; ?> value="WA">WA</option>
			        <option <?php if ($state == "SA" ) echo 'selected' ; ?> value="SA">SA</option>
			        <option <?php if ($state == "TAS" ) echo 'selected' ; ?> value="TAS">TAS</option>
			        <option <?php if ($state == "ACT" ) echo 'selected' ; ?> value="ACT">ACT</option>
            	</select>
	        </p>

		<p>
			<label for="postcode">Postcode: </label>
			<input type="text" name= "postcode" id="postcode" value="<?php echo $postcode; ?>" >
		</p>
	
             <p>Preferred Contact:
             <input type="radio" id="byemail" name="contact" value="By Email" <?php if ($contact == "By Email" ) echo "checked" ; ?> />
			 <label for="byemail">Email</label>
			                    
			 <input type="radio" id="bypost" name="contact" value="By Post" <?php if ($contact == "By Post" ) echo "checked" ; ?>/>
			 <label for="bypost">Post</label>
			                    
			 <input type="radio" id="byphone" name="contact" value="By Phone"<?php if ($contact == "By Phone" ) echo "checked" ; ?>/>
			 <label for="byphone">Phone</label>
             </p>
    

       	

		<br>
		<legend>Order details</legend>

		<p>
			<label for="rent_time">Renting days: </label>
			<input type="text" name= "rent_time" id="rent_time" value="<?php echo $rent_time; ?>">
		</p>
		<p>
        <label for="product">Product:</label>
	        <select  id="product" name="product" required='required'>
			    <option value="">What products you want to hire?</option>
			    <option <?php if ($product == "audio" ) echo 'selected' ; ?> value="audio">Audio</option>
			    <option <?php if ($product == "visual" ) echo 'selected' ; ?> value="visual">Visual</option>
			    <option <?php if ($product == "combo" ) echo 'selected' ; ?> value="combo">Audio - Visual combo</option>
        	</select>
         </p>

		
		<p><label for="option1">Option 1 </label>
			<input type="checkbox" name="option1" id="option1" value="True" <?php if ($option1 == "True" ) echo "checked" ; ?> ><br /></p>	
		<p><label for="option2">Option 2 </label>
			<input type="checkbox" name="option2" id="option2" value="True" <?php if ($option2 == "True" ) echo "checked" ; ?> ><br /></p>
		<p>
			 	<label for="visualadd">Visual add on: $50/day</label>
	        <select  id="visualadd" name="visualadd" >
	        	<option value="">What products you want to add?</option>
			    <option <?php if ($visualadd == "Controller" ) echo 'selected' ; ?> value="Controller">Controller</option>
			    <option <?php if ($visualadd == "Moving Light" ) echo 'selected' ; ?> value="Moving Light">Moving Light</option>
			    <option <?php if ($visualadd == "Camera" ) echo 'selected' ; ?> value="Camera">Camera</option>
			    
        	</select>
			 </p>

			 <p>
			 	<label for="audioadd">Audio add on: $10/day</label>
	        <select  id="audioadd" name="audioadd" >
	        	<option value="">What products you want to add?</option>
			    <option <?php if ($audioadd == "Microphone" ) echo 'selected' ; ?> value="Microphone">Microphone</option>
			    <option <?php if ($audioadd == "Headphone" ) echo 'selected' ; ?> value="Headphone">Headphone</option>
			    <option <?php if ($audioadd == "Connect Cable" ) echo 'selected' ; ?> value="Connect Cable">Connect cable</option>
        	</select>
			 </p>
			
	<p>
			<label for="textarea_1">Commenting: </label>
			<input type="text" name= "textarea_1" id="textarea_1" value="<?php echo $text; ?>" size="30">
		</p>


		</fieldset>


			<fieldset id="payment" class="enquire_form">				<!-- Payment / card details -->
				<legend>Payment details</legend>
				<p>																
					<label for="cardtype">Card Type:</label>
					<select name="cardtype" id="cardtype" >
						<option value="">Chose your card type</option>
						<option value="visa">Visa</option>			
						<option value="master">MasterCard</option>
						<option value="amex">American Express</option>
					</select>
				</p>	
				<p>																
					<label for="cardname">Name on Card:</label> 
					<input type="text" name= "cardname" id="cardname" >
				</p>
				<p> 															
					<label for="cardnumber">Card Number:</label> 
					<input type="text" name= "cardnumber" id="cardnumber"  >
				</p>
				<p> 															
					<label for="cardexpiry">Card Expiry date:</label> 
					<input type="text" name= "cardexpiry" id="cardexpiry" placeholder="mm/yy" size="8">
					<label for="cardCVV">CVV:</label> 
					<input type="text" name= "cardCVV" id="cardCVV" size="5" >
				</p>

				<h2>Timer: <span id="count">120</span> second</h2>
				
			</fieldset>
	


          		<section id="submit_button">				<!-- submit all the information again to order_process.php. if the information are not correcrt, re-direct to this page agian -->
               	<p><input type= "submit" value="Check Out" class="button" name="submitButton">
				<input id="cancelOrder" type= "reset" value="Cancel Order" class="button"></p>
               </section>

 </form>

</section>

<?php include("includes/footer.inc"); ?>
</body>
</html>
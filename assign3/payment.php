<!DOCTYPE html>
<html lang="en">

<?php include("includes/header.inc"); ?>


<!-- this is the same code in assignment 2, add include function and change the direction of form post. dissable any validataion -->

<body>
<?php include("includes/menu.inc"); ?>

<section class="content" id="payment_content">
	<h1>Order details</h1>




<!-- form function to submit to Swinburne checkform website -->
<form  method="post" action="process_order.php" id="paymentForm" novalidate="novalidate">		<!-- disalbe validation -->
		<fieldset class="enquire_form">
			<legend>Customer details</legend>
		
		<!-- show all the information as readonly so user can check their information -->
		<p>
			<label for="firstname">First Name: </label>
			<input type="text" name= "firstname" id="firstname" readonly=""> 
		</p>
		
		<p>
			<label for="lastname">Last name: </label>
			<input type="text" name= "lastname" id="lastname" readonly="">
		</p>
		
		<p>
			<label for="email">Email address: </label>
			<input type="text" name= "email" id="email" readonly="" size="30">
		</p>
		
		<p>
			<label>Phone numbers: </label>
			<input type="text" name= "phone" id="phone" readonly="" >
		</p>
		



		<p>
			<label for="address">Address: </label>
			<input type="text" name= "address" id="address" readonly="" size="20">
		</p>
		<p>
			<label for="suburb">Suburb: </label>
			<input type="text" name= "suburb" id="suburb" readonly="">
		</p>
		
		<p>
			<label for="state">State: </label>
		<input type="text" name= "state" id="state" readonly="">	
		</p>

		<p>
			<label for="postcode">Postcode: </label>
			<input type="text" name= "postcode" id="postcode" readonly="">
		</p>
		<p>Preferred Contact: <span id="pContact"></span></p>
		<input type="hidden" name="contact" id="contact">
		<br>
		<legend>Order details</legend>

		<p>
			<label for="rent_time">Renting days: </label>
			<input type="text" name= "rent_time" id="rent_time" readonly="" >
		</p>
		<p>
			<label for="product">Type of product: </label>
			<input type="text" name= "product" id="product" readonly="" >
		</p>
		<p>
			<label for="textarea_1">Commenting: </label>
			<input type="text" name= "textarea_1" id="textarea_1" readonly="" size="30">
		</p>
		
		<p><label for="option1">Option 1 </label>
			<input type="checkbox" name="option1" id="option1" value="True" ><br /></p>	
		<p><label for="option2">Option 2 </label>
			<input type="checkbox" name="option2" id="option2" value="True" ><br /></p>
		<p>Add on: <span id="addon"></span></p>
		<!-- Two of these are radio value so its hidden and the information is displayed using span -->
		<input type="hidden" name="visualadd" id="visualadd" >
		<input type="hidden" name="audioadd" id="audioadd">
		<!-- Display the total cost of order by using calculation method in javascript -->
		<p>Total Cost: <input type="text" name= "totalCost" id="totalCost" readonly></p>


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
	


              <section id="submit_button">				<!-- submit button to swinburne checkform or cancell order and redirect back to homepage -->
               	<p><input type= "submit" value="Check Out" class="button" name="submitButton">
				<input id="cancelOrder" type= "reset" value="Cancel Order" class="button"></p>
               </section>

 </form>
</section>
<?php include("includes/footer.inc"); ?>
</body>
</html>
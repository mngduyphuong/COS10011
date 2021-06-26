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
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	 <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet"> 
	 <script type="text/javascript" src="scripts/final.js"></script>

</head>

<body>
<?php include("includes/menu.inc"); ?>
<section class="content">
	<form  method="post" action="process.php" id="enquireForm">		<!-- form method to post the information to process.php -->
		<fieldset class="enquire_form">
				<p>
				 <label for="ref">Seminar reference number:</label>			<!-- input of seminar reference num as text -->
                 <input type="text" name="ref" id="ref" size="40" />
				</p>
				<p>
				 <label for="username">Username:</label>
                 <input type="text" name="username" id="username" size="40" />
				</p>

				 <div id="radio_quali">
				 	<p>Qualification:
				 	<!-- 	radio input with the same name so PHP can get the value -->
	             <input type="radio" id="undergraduatel" name="quali" value="Undergraduatel">
				 <label for="undergraduatel">Undergraduate</label>
				                    
				 <input type="radio" id="postgraduate" name="quali" value="Postgraduate"/>
				 <label for="postgraduate">Postgraduate</label>
	             </p>
				 </div>

				 <p>
               	<label for="email">Email:</label>					<!-- email input -->
                <input type="email" name="email" id="email" size="40" />
             	</p>

             	 <p>	
             	<label for="phone">Phone Number:</label>			<!-- input of phone number as text -->
                <input type="text" name="phone" id="phone"  size="20"  placeholder="04XXXXXXXX" />
             	</p>

             	<p>
             		<label for="role">Roles: </label>
             		<select id="role" name="role">
             			<option value="Organiser">Organiser</option>
             			<option value="Participant">Participant</option>
             		</select>
             	</p>

              <section id="submit_button">									<!-- 	submit button to payment.html or reset the form -->
               	 <input class="button" type="submit" value="Submit" />
                <input class="button" type="reset" value="Reset Form" />
               </section>
		</fieldset>
	</form>


</section>

<?php include("includes/footer.inc"); ?>
</body>
</html>
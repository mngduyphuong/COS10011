/*
* Author: Duy Phuong Nguyen
* Purpose: JavaScript file for assignment 2
* Created: 02/05/2020
* Last updated: 02/05/2020
*/
"use  strict";
var debug = true;

function validateEnquire(){	

	var result = true;
	var errMsg = "";
	//get the information from the enquire page
	var firstname=document.getElementById("firstname").value.trim();
	var lastname=document.getElementById("lastname").value.trim();
	var email=document.getElementById("email").value;
	var phone=document.getElementById("phone").value;
	var address=document.getElementById("address").value.trim();
	var suburb=document.getElementById("suburb").value.trim();
	var state=document.getElementById("state").value;
	var postcode=document.getElementById("postcode").value;
	var product=document.getElementById("product").value;
	var rent_time=document.getElementById("rent_time").value;
	var textarea_1=document.getElementById("textarea_1").value.trim();
	

	if (!debug) {
//validate information
	if (firstname=="") {
		errMsg += "Please enter your first name.\n";
		result = false;
	}
	if (lastname=="") {
		errMsg += "Please enter your last name.\n";
		result = false;
	}
	if (email=="") {
		errMsg += "Please enter your email address.\n";
		result = false;
	}
	if (phone=="") {
		errMsg += "Please enter your phone number.\n";
		result = false;
	}
	if (address=="") {
		errMsg += "Please enter your address.\n";
		result = false;
	}
	
	if (suburb=="") {
		errMsg += "Please enter your suburb.\n";
		result = false;
	}
	if (state == ""){								
		errMsg += "You must select your state.\n";
		result = false;
	}


	//postcode validation.is it match with the state??
	if (!postcode.match(/^\d{4}$/)){					
		errMsg += "Your postcode must be a 4-digit number.\n";
		result = false;
	}
	else{
		if(state == "VIC" && postcode.charAt(0)!= 3 && postcode.charAt(0)!= 8 )
		{
			errMsg += "Your postcode didn't match the state. VIC = 3 OR 8\n";
			result = false;
		}
		else if(state == "NSW" && postcode.charAt(0)!= 1 && postcode.charAt(0)!= 2 )
		{
			errMsg += "Your postcode didn't match the state. NSW = 1 OR 2\n";
			result = false;
		}
		else if(state == "QLD" && postcode.charAt(0)!= 4 && postcode.charAt(0)!= 9 )
		{
			errMsg += "Your postcode didn't match the state. QLD = 4 OR 9\n";
			result = false;
		}
		else if(state == "NT" && postcode.charAt(0)!= 0 )
		{
			errMsg += "Your postcode didn't match the state. NT = 0\n";
			result = false;
		}
		else if(state == "WA" && postcode.charAt(0)!= 6 )
		{
			errMsg += "Your postcode didn't match the state. WA = 6\n";
			result = false;
		}
			else if(state == "SA" && postcode.charAt(0)!= 5 )
		{
			errMsg += "Your postcode didn't match the state. SA = 5\n";
			result = false;
		}
		else if(state == "TAS" && postcode.charAt(0)!= 7 )
		{
			errMsg += "Your postcode didn't match the state. TAS = 7\n";
			result = false;
		}
		else if(state == "ACT" && postcode.charAt(0)!= 0 )
		{
			errMsg += "Your postcode didn't match the state. ACT = 0\n";
			result = false;
		}
	

	}

	if (product == ""){								
		errMsg += "You must select your product.\n";
		result = false;
	}
	

	//check the renting time/order quantity
	if (rent_time == ""){								
		errMsg += "You must enter your renting time.\n";
		result = false;
	}
	else {
			if (isNaN(rent_time)) {						//validate is it a number
		errMsg += " renting time is not a number. \n";
		result=false;
	}
	else if  (rent_time <0)  {
		errMsg += " renting time cannot be negative. \n";		//validate it is not negative
		result=false;
	}
	else if (parseInt(rent_time, 10) !== Number(rent_time)) { 		//validate it is an interger
		errMsg +=  " renting time is not an integer. \n";
		result=false;
	}
	}//end debug
	
		}
	if (result){			//if everything correct, save the information using saveinfo function
		saveInfo(firstname, lastname, email, phone, address, suburb, state, postcode, product, rent_time, textarea_1, getPreferredContact());
		
	}

	
	if (errMsg != "")
		alert(errMsg);

	return result;
	




}


function getPreferredContact(){		//for function to get the value of radio button
	var contact_type = "Unknown";
	var type = document.getElementById("contactMethod").getElementsByTagName("input");

	for (var i = 0; i < type.length; i++){
		if (type[i].checked)
			contact_type = type[i].value;
	}

	return contact_type;
}


function saveInfo (firstname, lastname, email, phone, address, suburb, state, postcode, product, rent_time, textarea_1, contact){ // save information to storage

	if(typeof(Storage)!=="undefined"){  // the browser support web storage
		//save information of user
		localStorage.setItem("firstname", firstname);
		localStorage.setItem("lastname", lastname);
		localStorage.setItem("email", email);
		 localStorage.setItem("phone", phone);
		 localStorage.setItem("address", address);
		 localStorage.setItem("suburb", suburb);
		 localStorage.setItem("state", state);
		 localStorage.setItem("postcode", postcode);
		 localStorage.setItem("product", product);
		localStorage.setItem("rent_time", rent_time);
		 localStorage.setItem("textarea_1", textarea_1);
		 localStorage.setItem("contact", contact);

		 //save order details
		var option1 = document.getElementById("option1").checked;
		localStorage.setItem("option1", option1);
		var option2 = document.getElementById("option2").checked;
		localStorage.setItem("option2", option2);
		var visualadd=document.getElementById("visualadd").value;
		localStorage.setItem("visualadd",visualadd);
		var audioadd=document.getElementById("audioadd").value;
		localStorage.setItem("audioadd",audioadd);


	}
}

function validatePayment(){					//validation for payment page
	var result = true;
	var errMsg = "";

	//get value from payment.html
	var cardtype=document.getElementById("cardtype").value;
	var cardname=document.getElementById("cardname").value.trim();
	var cardnumber=document.getElementById("cardnumber").value;
	var cardexpiry=document.getElementById("cardexpiry").value;
	var cardCVV=document.getElementById("cardCVV").value;

	if (!debug) {
//check the name
	if (cardname == ""){
		errMsg += "Please enter your card name.\n";
		result = false;
	}
	else if (!(cardname.match(/^[a-zA-Z ]+$/))){						
		errMsg += "Name on card can only contains alphabetical characters and spaces.\n";
		result = false;
	}
	else if (cardname.length > 40){										
		errMsg += "Your input name is too long, the maximum is 40 char"
		result = false;
	}

	//check cardtype and validate it
	if( cardtype == "")
	{
		errMsg += "Please chose your card type.\n"
		result = false;
	}
	else{
	switch (cardtype){			//use switch function to validate information
		case "visa": 								//visa card type																		
			if (cardnumber[0] != "4"){																			
				errMsg += "Visa card number start with 4.\n";
				result = false;
			}
			else if (!(cardnumber.match(/^\d{16}$/))){															
				errMsg += "Visa card number contains 16 digits.\n";
				result = false;
			}
			break;
		case "master": 								//master card type																				
			if (cardnumber[0] != "5" && (Number(cardnumber[1]) < 1 && Number(cardnumber[1]) > 5)){			
				errMsg += "MasterCard start with digits 51 through to 55.\n";
				result = false;
			}
			else if (!(cardnumber.match(/^\d{16}$/))){															
				errMsg += "MasterCard number contains 16 digits.\n";
				result = false;
			}
			break;
		case "amex": 										//amex card													
			if (cardnumber[0] != "3" && (cardnumber[1] != "4" || cardnumber[1] != "7")){						
				errMsg += "American Express must start with 34 or 37.\n";
				result = false;
			}
			else if (!(cardnumber.match(/^\d{15}$/))){															
				errMsg += "MasterCard number must be 15 digits and contains numbers only.\n";
				result = false;
			}
			break;


	}
	}

		//check card exprity
		if (cardexpiry == ""){
		errMsg += "Please enter your expiry date of your card.\n";					
		result = false;
		}
		else if (!(cardexpiry.match(/^\d{2}-\d{2}$/))){									
		errMsg += "Please match the format of expiry date.\n";
		result = false;
		}
		
		//check CVV
		if (cardCVV == ""){
		errMsg += "Please check your CVV.\n";								
		result = false;
		}
		else if (!(cardCVV.match(/^\d{3}$/))){
		errMsg += "CVV must be 3digits.\n";							
		result = false;
		}

	}//end debug







	//if everything is validated, let the user submit order with payment information
	if (errMsg != "")
		alert(errMsg);

	return result;
}




function getInfo(){ 
	if (typeof(Storage)!=="undefined"){// the browser support web storage
		if (localStorage.getItem("firstname") !== null){// there are some saved info in storage  
			// user details
			document.getElementById("firstname").value = localStorage.getItem("firstname");	 
			document.getElementById("lastname").value = localStorage.getItem("lastname");
			document.getElementById("email").value = localStorage.getItem("email");
			document.getElementById("phone").value = localStorage.getItem("phone");
			document.getElementById("address").value = localStorage.getItem("address");
			document.getElementById("suburb").value = localStorage.getItem("suburb");
			document.getElementById("postcode").value = localStorage.getItem("postcode");
			document.getElementById("rent_time").value = localStorage.getItem("rent_time");
			document.getElementById("textarea_1").value = localStorage.getItem("textarea_1");
			document.getElementById("product").value = localStorage.getItem("product");
			document.getElementById("state").value = localStorage.getItem("state");
			document.getElementById("contact").value = localStorage.getItem("contact");
			document.getElementById("pContact").textContent = localStorage.getItem("contact")

			//option and addon for the order
			var option1=localStorage.getItem("option1");
			 document.getElementById("option1").checked= (option1=="true");
			 var option2=localStorage.getItem("option2");
			 document.getElementById("option2").checked= (option2=="true");
			 document.getElementById("addon").textContent = localStorage.getItem("visualadd") + ", " + localStorage.getItem("audioadd");



			  
			var cost=0;
			var rent_rate = 0;

			//get the product type
			var product = localStorage.getItem("product");
			document.getElementById("product").value = product;
			var rent_time=localStorage.getItem("rent_time");
			document.getElementById("rent_time").value = rent_time;

			var visualadd=localStorage.getItem("visualadd");
			document.getElementById("visualadd").value = visualadd;
			var audioadd=localStorage.getItem("audioadd");
			document.getElementById("audioadd").value = audioadd;

			if (debug) {


			if (audioadd!="") {
				rent_rate+=10;
			}
			if (visualadd!="") {
				rent_rate+=50;
			}
		
			if ((product == "audio" || product == "visual") && option1 =="true") 
			{
				rent_rate += 100;
			}
			if ((product == "audio" || product == "visual") && option2 =="true") 
			{
				rent_rate += 300;
			}
			if (product == "combo" && option2 =="true") 
			{
				rent_rate += 500;
			}
			if (product == "combo" && option1 =="true") 
			{
				rent_rate += 180;
			}

			
			cost += rent_time*rent_rate;	


			}		//calculating the cost of user's order //end debug


			
			document.getElementById("totalCost").value = cost.toFixed(2);		//return the value to payment.html
		}

	}
}

function clearStorage(){  // for cancel order button
	localStorage.clear();
	location.href="index.php";
}



function init(){

	if (document.getElementById("enquireForm")!=null) {  // it is enquire page  
		document.getElementById("enquireForm").onsubmit = validateEnquire;
	}
	else if (document.getElementById("paymentForm")!=null) { // it is payment page  
		getInfo();     // fill up the page with information passed from enquire page
		document.getElementById("paymentForm").onsubmit = validatePayment;
		document.getElementById("cancelOrder").onclick = clearStorage;
		
	}

}

window.addEventListener("load",init);
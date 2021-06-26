/*
* Author: Duy Phuong Nguyen
* Purpose: JavaScript file for assignment 2
* Created: 02/05/2020
* Last updated: 02/05/2020
*/
"use  strict";
var counter = 120;

// ********This is enhancement 1**********
//Create a timer counting down from 120 second. If the user didnot submit, it will clear the storage and redirect to homepage
function timer(){
	
	
	counter--;

			if( counter >= 0 ){
				
				id = document.getElementById("count");
				id.innerHTML = counter;
			}

			if( counter == 0 ){
				alert("You are out of time, the order is canceleld \n Returning to homepage");
				localStorage.clear();
				location.href="index.html";
			}
	
}

// ********This is enhancement 2**********
function gototop(){			/*function for the button. when clicked, it goes to top*/
	window.scrollTo({
		top:0,
		left:0,
		behavior:"smooth"
	});

	// document.documentElement.scrollTop = 0;
}

// ********This is enhancement 3**********
//Preload the name of the card on payment.html based on user input from enquiry page
function preloadName(){
	document.getElementById("cardname").value = localStorage.getItem("firstname") + " " + localStorage.getItem("lastname");
}



function enhancement_init() {
 	if (document.getElementById("enquireForm")!=null) {  // it is enquire page  
		document.getElementById("totop").onclick = gototop; //gp to top
	}
	else if (document.getElementById("paymentForm")!=null) { // it is payment page  
		 var running = setInterval("timer()", 1000);		//timer
 		preloadName();										//preload name
	}
}

window.addEventListener("load",enhancement_init);

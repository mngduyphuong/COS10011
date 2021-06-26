/*
* Author: Duy Phuong Nguyen
* Purpose: JavaScript file for final exam
* Created: 17/06/2020
* Last updated: 17/06/2020
*/


function validateEnquire(){
	var result = true;
	var errMsg = "";
	//get the information from the register page
	var ref=document.getElementById("ref").value.trim();
	var username=document.getElementById("username").value.trim();
	var phone=document.getElementById("phone").value.trim();

	// validate the reference number
	if (ref =="")	//if empty
	{
		errMsg += "Please enter your Seminar reference number.\n";
		result = false;
	}
	else
	{
		if (!ref.match((/S\d{5}$/)) ) 
		{
			errMsg += "Seminar reference number starts with capital 'S' and followed by 5 numbers.\n";		//not match the requirement
			result = false;	
		}
	}


		if (username=="")	//if empty
	{
		errMsg += "Please enter your Username.\n";
		result = false;
	}
	else
	{
		if (!username.match((/[A-Za-z]{2,20}$/)) ) 
		{
			errMsg += "Username has 2 to 20 alpha characters.\n";		//not match the requirement
			result = false;	
		}
	}

	if (phone=="")		//if empty
	{
		errMsg += "Please enter your phone number.\n";
		result = false;
	}
	else
	{
		if (!phone.match((/\d{10}$/)) ) 
		{
			errMsg += "Phone number must 10 digits.\n";		//not match the requirement
			result = false;	
		}
	}

	if (errMsg != "")
		alert(errMsg);		//display the error using only one alert box
	return result;





}
	function storeref1(){
	if (typeof(Storage)!=="undefined") {
		var string = "S25029"
		var newref ="";
		localStorage.setItem("newref",string);
	}
}
function storeref2(){
	
		var string = "S76200"
		var newref ="";
		localStorage.setItem("newref",string);
	
}





function init(){
	var sem1 = document.getElementById("seminar_apply1");
	sem1.onclick = storeref1;
	var sem2 = document.getElementById("seminar_apply2");
	sem2.onclick = storeref2;

	if (document.getElementById("enquireForm")!=null) {  // it is register page  
		document.getElementById("ref").value = localStorage.getItem("newref");
		document.getElementById("enquireForm").onsubmit = validateEnquire;
		
	}
	
}
window.addEventListener("load",init);
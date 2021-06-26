/*
* Author: Duy Phuong Nguyen
* Purpose: JavaScript file for final exam
* Created: 17/06/2020
* Last updated: 17/06/2020
*/
"use  strict";
function validateEnquire(){
	var result = true;
	var errMsg = "";
	//get the information from the register page
	var ref=document.getElementById("ref").value.trim();
	var username=document.getElementById("username").value.trim();
	var phone=document.getElementById("phone").value.trim();


	//additional requirements
	var email=document.getElementById("email").value.trim();

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
	//additional requirements
	if (result)
	{
		saveInfo(username, email);
	}
	return result;
}
function saveInfo(username,email){	// the browser support web storage
	if(typeof(Storage)!=="undefined"){
		localStorage.setItem("username", username);
		localStorage.setItem("email", email);
	}
}

function preload()
{
		if (localStorage.getItem("username") !== null && localStorage.getItem("email") !== null){
			document.getElementById("username").value = localStorage.getItem("username");
			document.getElementById("email").value = localStorage.getItem("email");
		}
}

function init(){

	if (document.getElementById("enquireForm")!=null) {  // it is register page  
		preload();
		document.getElementById("enquireForm").onsubmit = validateEnquire;
	}
	
}
window.addEventListener("load",init);
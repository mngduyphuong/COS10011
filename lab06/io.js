/*
* Author: Duy Phuong Nguyen
* Target: clickme.html
* Purpose: JavaScript file for lab06
* Created: 29/04/2020
* Last updated: 29/04/2020
*/
"use  strict";


//This function is asking user to enter their information
function promptName(){
	var sName = prompt("Enter your name.\nThis prompt should show up when the \nClick Me button is clicked.", "Your name");
	alert("Hi there " + sName + ". Alert boxes are a quick way to check the state\n of your variables when you are developing code.");
	rewriteParagraph(sName);
}


//This function is modifying content of id "message"
function rewriteParagraph(userName){
	var message = document.getElementById("message");
	message.innerHTML = "Hi " + userName + ". If you can see this you have successfully overwritten the contents of this paragraph. Congratulations!!";
}


//This function is modifying text of id "output"
function writeNewMessage(){
	var message = document.getElementById("output");
	message.textContent = "You have now finished Task 1";
}

//This function is loaded when window open
function init(){
	var clickMe = document.getElementById("clickme");
	clickMe.onclick = promptName;
	var h1 = document.getElementsByTagName("h1");
	h1[0].onclick = writeNewMessage;
}
window.onload = init;
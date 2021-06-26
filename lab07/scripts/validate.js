"use strict"

function validate(){
	var result = true;
	var errMsg = "";

	
	var firstname = document.getElementById("firstname").value;
	if (!firstname.match(/^[a-zA-Z]+$/)){
		errMsg += "Your first name must only contain alpha characters.\n";
		result = false;
	}


	var lastname = document.getElementById("lastname").value;
	if (!lastname.match(/^[a-zA-Z\-]+$/)){
		errMsg += "Your last name may only conatin alpha characters and hyphens.\n";
		result = false;
	}

	
	var age = document.getElementById("age").value;
	if (isNaN(age)){
		errMsg += "Your age must be a number.\n";
		result = false;
	}
	else if (age < 18){
		errMsg += "Your age must be 18 or older.\n";
		result = false;
	}
	else if (age >= 10000){
		errMsg += "Your age must be younger than 10000.\n";
		result = false;
	}
	else{
		var tempMsg = checkSpeciesAge(age);
		if (tempMsg != ""){
			errMsg += tempMsg;
			result = false;
		}
	}


		if (document.getElementById("food").value == "none"){
		errMsg += "You must select a food preference.\n";
		result = false;
	}

	//Number of travellers validation
	var partySize = document.getElementById("partySize").value;
	if (partySize < 1 || partySize > 100){
		errMsg += "Number of travellers must be in between 1 and 100 inclusive.\n";
		result = false;
	}

	var is1day = document.getElementById("1day").checked;
	var is4day = document.getElementById("4day").checked;
	var is10day = document.getElementById("10day").checked;
	if (!(is1day || is4day || is10day)){
		errMsg += "Please select at least one trip.\n";
		result = false;
	}

	var isHuman = document.getElementById("human").checked;
	var isDwarf = document.getElementById("dwarf").checked;
	var isElf = document.getElementById("elf").checked;
	var isHobbit = document.getElementById("hobbit").checked;
	if (!(isHuman || isDwarf || isElf || isHobbit)){
		errMsg += "Please select at least one species.\n";
		result = false;
	}

	var beard = document.getElementById("beard").value;
	var tempMsg = checkSpeciesBeard(beard, age);
	if (tempMsg != ""){
		errMsg += tempMsg;
		result = false;
	}


	if (errMsg != ""){		
		alert(errMsg);
	}
	return result;	
}

//Return selected species as a string
function getSpecies(){
	var speciesName = "Unknown";
	var speciesArray = document.getElementById("species").getElementsByTagName("input");

	for (var i = 0; i < speciesArray.length; i++){
		if (speciesArray[i].checked)
			speciesName = speciesArray[i].value;
	}

	return speciesName;
}

function checkSpeciesAge(age){
	var errMsg = "";
	var species = getSpecies();
	switch (species){
		case "Human":
			if (age > 120)
				errMsg = "You cannot be a Human and over 120.\n";
			break;
		case "Dwarf":
		case "Hobbit":
			if (age > 150)
				errMsg = "You cannot be a " + species + " and over 150.\n";
			break;	
		case "Elf":
			break;
		default:
			errMsg = "We don't allow your kind on our tours.\n";
	}

	return errMsg;
}

//Validate beard length upon selected species and age
function checkSpeciesBeard(beard, age){
	var errMsg = "";
	var species = getSpecies();
	switch (species){
		case "Human":
			break;
		case "Dwarf":
			if (age > 30 && beard <= 12)
				errMsg = "Dwarfs over 30 years old always have a beard longer than 12 inches\n";
			break;
		case "Hobbit":
		case "Elf":
			if (beard > 0)
				errMsg =  species +" "+ "never have beards\n";
			break;
		default:
			errMsg = "We don't allow your kind on our tours.\n";
	}

	return errMsg;
}

function init () {
	
	var regForm = document.getElementById("regform");
regForm.onsubmit = validate;

 }

window.onload = init;

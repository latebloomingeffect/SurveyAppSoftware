/*
-------------------------------------------------------------------
Survey App - The JavaScript
-------------------------------------------------------------------
*/
//Variables required to manipulate the contact number element
var contactNumberAccess;
var contactNumberValue;

//Variables required to manipulate the date of birth element
var dateOfBirthAccess;
var dateOfBirthValue;
var dateOfBirthHolder;

//Variables required to manipulate the full names element
var fullNamesAccess;
var fullNamesValue;

//Variables required to manipulate the email element
var emailAccess;
var emailValue;

//Variables required to manipulate the rating 1 radio elements
var rating1_1Access;
var rating1_2Access;
var rating1_3Access;
var rating1_4Access;
var rating1_5Access;

//Variables required to manipulate the rating 2 radio elements
var rating2_1Access;
var rating2_2Access;
var rating2_3Access;
var rating2_4Access;
var rating2_5Access;

//Variables required to manipulate the rating 3 radio elements
var rating3_1Access;
var rating3_2Access;
var rating3_3Access;
var rating3_4Access;
var rating3_5Access;

//Variables required to manipulate the rating 4 radio elements
var rating4_1Access;
var rating4_2Access;
var rating4_3Access;
var rating4_4Access;
var rating4_5Access;

//Variables required to manipulate the survey button element
var surveyButtonAccess;

//Variables required to manipulate the validate textboxes element
var surveyTextboxesAccess;

//Variables required to manipulate the validate textboxes element
var surveyCheckboxesAccess;

//Variables required to manipulate the validate textboxes element
var surveyRadioButtonsAccess;

/*
-----------------------------------------------------------------
Function Survey Setup
-----------------------------------------------------------------
*/
function surveySetup()
{
	surveyButtonAccess=document.getElementById("survey_button");
	surveyButtonAccess.addEventListener("click",validateInfo,false);
}

/*
-----------------------------------------------------------------
Function Validation Info
-----------------------------------------------------------------
*/
function validateInfo()
{
	validateTextboxes();
	validateRadioButtons();
}

/*
-----------------------------------------------------------------
Function Validate Text Boxes
-----------------------------------------------------------------
*/
function validateTextboxes()
{	
	dateOfBirthAccess=document.querySelector('input[type="date"]');
	contactNumberAccess=document.getElementById("contactNumber");
	fullNamesAccess=document.getElementById("fullNames");
	emailAccess=document.getElementById("email");

	surveyTextboxesAccess=document.getElementById("validate_textboxes");
	
	
	dateOfBirthValue=dateOfBirthAccess.value;
	contactNumberValue=contactNumberAccess.value;
	fullNamesValue=fullNamesAccess.value;
	emailValue=emailAccess.value;
	
	if(fullNamesValue==""||emailValue==""||contactNumberValue==""||dateOfBirthValue=="")
	{
		surveyTextboxesAccess.innerHTML	="One of the following fields is empty:<br>";
		surveyTextboxesAccess.innerHTML+="Full Names Field.<br>";
		surveyTextboxesAccess.innerHTML+="Email Field<br>";
		surveyTextboxesAccess.innerHTML+="Date Of Birth Field<br>";
		surveyTextboxesAccess.innerHTML+="Contact Number Field";
	}
	else
	{
		surveyTextboxesAccess.innerHTML="No Textbox Validation Required.";
	}
}

/*
-----------------------------------------------------------------
Function Validate Radio Buttons
-----------------------------------------------------------------
*/
function validateRadioButtons()
{
	rating1_1Access=document.getElementById("rating_1.1");
	rating1_2Access=document.getElementById("rating_1.2");
	rating1_3Access=document.getElementById("rating_1.3");
	rating1_4Access=document.getElementById("rating_1.4");
	rating1_5Access=document.getElementById("rating_1.5");
	
	rating2_1Access=document.getElementById("rating_1.1");
	rating2_2Access=document.getElementById("rating_2.2");
	rating2_3Access=document.getElementById("rating_2.3");
	rating2_4Access=document.getElementById("rating_2.4");
	rating2_5Access=document.getElementById("rating_2.5");
	
	rating3_1Access=document.getElementById("rating_3.1");
	rating3_2Access=document.getElementById("rating_3.2");
	rating3_3Access=document.getElementById("rating_3.3");
	rating3_4Access=document.getElementById("rating_3.4");
	rating3_5Access=document.getElementById("rating_3.5");
	
	rating4_1Access=document.getElementById("rating_4.1");
	rating4_2Access=document.getElementById("rating_4.2");
	rating4_3Access=document.getElementById("rating_4.3");
	rating4_4Access=document.getElementById("rating_4.4");
	rating4_5Access=document.getElementById("rating_4.5");
	
	surveyRadioButtonsAccess=document.getElementById("validate_radioButtons");
	
	if(!rating1_1Access.checked&&!rating1_2Access.checked&&!rating1_3Access.checked&&
	   !rating1_4Access.checked&&!rating1_5Access.checked)
	{
		surveyRadioButtonsAccess.innerHTML ="The following fields may be empty:<br>";
		surveyRadioButtonsAccess.innerHTML+="Decision on 'I like to watch movies'<br>";
	}
	else if(!rating2_1Access.checked&&!rating2_2Access.checked&&!rating2_3Access.checked&&
			!rating2_4Access.checked&&!rating2_5Access.checked)
	{
		surveyRadioButtonsAccess.innerHTML ="The following fields may be empty:<br>";
		surveyRadioButtonsAccess.innerHTML+="Decision on 'I like to listen to radio'<br>";
	}
	else if(!rating3_1Access.checked&&!rating3_2Access.checked&&!rating3_3Access.checked&&
			!rating3_4Access.checked&&!rating3_5Access.checked)
	{
		surveyRadioButtonsAccess.innerHTML ="The following fields may be empty:<br>";
		surveyRadioButtonsAccess.innerHTML+="Decision on 'I like to eat out'<br>";
	}
	else if(!rating4_1Access.checked&&!rating4_2Access.checked&&!rating4_3Access.checked&&
			!rating4_4Access.checked&&!rating4_5Access.checked)
	{
		surveyRadioButtonsAccess.innerHTML ="The following fields may be empty:<br>";
		surveyRadioButtonsAccess.innerHTML+="Decision on 'I like to watch TV'<br>";
	}
	else
	{
		surveyRadioButtonsAccess.innerHTML="No Radio Button Validation required";
	}
}

window.addEventListener("load",surveySetup,false);
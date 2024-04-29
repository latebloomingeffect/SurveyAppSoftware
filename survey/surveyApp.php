<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Survey App - Fill Out Survey</title>
		
		<!-- An link to a external styles used in the survey app -->
		<link rel="stylesheet" type="text/css" href="surveyAppSheet.css">
		
		<!-- An link to a external script used in the survey app 
			 for validation testing purposes
		-->
		<script src="SurveyAppScript.js"></script>
	</head>
	<body>
		
		<!-- A div container used to align part of the survey app interface -->
		<div id="align">
			<h4 id="app_name">_Surveys</h4>
			<p id="fill_action">FILL OUT SURVEY</p>
			<p id="view_action"><a href="surveyApp2.php">VIEW SURVEY RESULTS</a></p>
		</div>
		
		<!-- The form that will be minly used for gathering information from the user -->
		<form action="#" method="POST">
			<p id="personal_details1">
			Personal Details:
			</p>
			<div id="personal_details2">
				<label>Full Names
					<input class="input_width" type="text" id="fullNames" name="fullnames">
				</label>
				<label>Email
					<input class="input_width" type="email" id="email" name="email">
				</label>
				<label>Date of Birth
					<input id="date_width" type="date" id="dateOfBirth" name="dateofbirth">
				</label>
				<label>Contact Number
					<input class="input_width" type="tel" id="contactNumber" name="contactnumber">
				</label>
			</div>
			<p id="food_question">What is your favourite food?</p>
			<label class="label_space">
				<input type="checkbox" id="favourite_1" name="favouriteFood" value="1">Pizza
			</label>
			<label class="label_space">
				<input type="checkbox" id="favourite_2" name="favouriteFood" value="2">Pasta
			</label>
			<label class="label_space">
				<input type="checkbox" id="favourite_3" name="favouriteFood" value="3">Pap and Wors
			</label>
			<label class="label_space">
				<input type="checkbox" id="favourite_4" name="favouriteFood" value="4">Other
			</label>
			<p>
			Please rate your level of agreement on a scale of 1 to 5, with 1 being 
			"strongly agree" and 5 being "strongly disagree."
			</p>
			
			<table id="rating_table">	
				<thead>
					<tr>
						<th></th>
						<th>Strongly Agree</th>
						<th>Agree</th>
						<th>Neutral</th>
						<th>Disagree</th>
						<th>Strongly Disagree</th>
					</tr>
				</thead>
				
				<tbody>
					<tr>
						<td>I like to watch movies</td>
						<td class="radio_align"><input id="rating_1.1" type="radio" name="rating_1" value="1"></td>
						<td class="radio_align"><input id="rating_1.2" type="radio" name="rating_1" value="2"></td>
						<td class="radio_align"><input id="rating_1.3" type="radio" name="rating_1" value="3"></td>
						<td class="radio_align"><input id="rating_1.4" type="radio" name="rating_1" value="4"></td>
						<td class="radio_align"><input id="rating_1.5" type="radio" name="rating_1" value="5"></td>
					</tr>
					
					<tr>
						<td>I like to listen to radio</td>
						<td class="radio_align"><input id="rating_2.1" type="radio" name="rating_2" value="1"></td>
						<td class="radio_align"><input id="rating_2.2" type="radio" name="rating_2" value="2"></td>
						<td class="radio_align"><input id="rating_2.3" type="radio" name="rating_2" value="3"></td>
						<td class="radio_align"><input id="rating_2.4" type="radio" name="rating_2" value="4"></td>
						<td class="radio_align"><input id="rating_2.5" type="radio" name="rating_2" value="5"></td>
					</tr>
					
					<tr>
						<td>I like to eat out</td>
						<td class="radio_align"><input id="rating_3.1" type="radio" name="rating_3" value="1"></td>
						<td class="radio_align"><input id="rating_3.2" type="radio" name="rating_3" value="2"></td>
						<td class="radio_align"><input id="rating_3.3" type="radio" name="rating_3" value="3"></td>
						<td class="radio_align"><input id="rating_3.4" type="radio" name="rating_3" value="4"></td>
						<td class="radio_align"><input id="rating_3.5" type="radio" name="rating_3" value="5"></td>
					</tr>
					
					<tr>
						<td>I like to watch TV</td>
						<td class="radio_align"><input id="rating_4.1" type="radio" name="rating_4" value="1"></td>
						<td class="radio_align"><input id="rating_4.2" type="radio" name="rating_4" value="2"></td>
						<td class="radio_align"><input id="rating_4.3" type="radio" name="rating_4" value="3"></td>
						<td class="radio_align"><input id="rating_4.4" type="radio" name="rating_4" value="4"></td>
						<td class="radio_align"><input id="rating_4.5" type="radio" name="rating_4" value="5"></td>
					</tr>
				</tbody>
				
				<tfoot>
				</tfoot>
			</table>
			
			<button id="survey_button" name="submit">SUBMIT</button>
		</form>
		
		<!-- PHP Hypertext section embedded in the survey app for infomation manipulation -->
		<?php
			
			//Execute statements if condition is met
			if(isset($_POST["submit"]))
			{
				error_reporting(E_ERROR|E_PARSE);	//required for ignoring subtle warnings
				
				/*
				-----------------------------------
				Creating and instantiating variables
				required to manipulate values supplied
				by the user.
				-----------------------------------
				*/
				$fullnames=$_POST["fullnames"];
				$email=$_POST["email"];
				$dateofbirth=$_POST["dateofbirth"];
				$contactnumber=$_POST["contactnumber"];
				
				
				$favourite=$_POST["favouriteFood"];
				
				$ratingNumber1=$_POST["rating_1"];
				$ratingNumber2=$_POST["rating_2"];
				$ratingNumber3=$_POST["rating_3"];
				$ratingNumber4=$_POST["rating_4"];
				
				$startConnection=false;				
				
				$validation1=false;
				$validation2=false;
				$validation3=false;
				$validation4=false;
				$validation5=false;
				$validation6=false;
				$validation7=false;
				$validation8=false;
				$validation9=false;
				$validation10=false;
				
				/*
				-----------------------------------------
				Execute actions if the condition is met
				Note: this is for validating data input
				by the user
				-----------------------------------------
				*/
				if($startConnection==false)
				{
					if($fullnames==""&&$email==""&&$dateofbirth==""&&
					$contactnumber==""&&$favourite==""&&$ratingNumber1==""&&
					$ratingNumber2==""&&$ratingNumber3==""&&$ratingNumber4=="")
					{
						echo "";
						$validation1=false;
					}
					else
					{
						$validation1=true;
					}
					
					if($fullnames=="")
					{
						echo "";
						$validation2=false;
					}
					else
					{
						$validation2=true;
					}
					
					if($email=="")
					{
						echo "";
						$validation3=false;
					}
					else
					{
						$validation3=true;
					}
					
					if($dateofbirth=="")
					{
						echo "";
						$validation4=false;
					}
					else
					{
						$currentYear=date("Y");
						$birthYear=substr($dateofbirth,-10,4);
						$yearOld=(int)$currentYear-(int)$birthYear;
						
						if($yearOld<=5)
						{
							echo "Too Young";
						}
						else if($yearOld>120)
						{
							echo "Too old";
						}
						else
						{
							echo "";
							$validation4=true;
						}
					}
					
					
					if($contactnumber=="")
					{
						echo "";
						$validation5=false;
					}
					else
					{
						$validation5=true;
					}
					
					if($favourite=="")
					{
						echo "";
						$validation6=false;
					}
					else
					{
						$validation6=true;
					}
					
					if($ratingNumber1=="")
					{
						echo "";
						$validation7=false;
					}
					else
					{
						$validation7=true;
					}
					
					if($ratingNumber2=="")
					{
						echo "";
						$validation8=false;
					}
					else
					{
						$validation8=true;
					}
					
					if($ratingNumber3=="")
					{
						echo "";
						$validation9=false;
					}
					else
					{
						$validation9=true;
					}
					
					if($ratingNumber4=="")
					{
						echo "";
						$validation10=false;
					}
					else
					{
						$validation10=true;
					}
				}
				
				/*
				-----------------------------------------
				Check if all the validation conditions 
				have been met then open the database for
				inserting the data supplied by the user
				-----------------------------------------
				*/
				if($validation1==true&&$validation2==true&&$validation3==true&&$validation4==true&&$validation5==true&&
				   $validation6==true&&$validation7==true&&$validation8==true&&$validation9==true&&$validation10==true)
				{
					$startConnection=true;
					
					if($startConnection==true)
					{
						$connection=mysqli_connect("localhost","root","","userresponse");
						
						$database=mysqli_select_db($connection,"userresponse");
						$dataTable="INSERT INTO users 
						(fullNames,email,dateOfBirth,contactNumber,favourite,rating1,rating2,rating3,rating4) VALUES 
						('$fullnames','$email','$dateofbirth','$contactnumber','$favourite','$ratingNumber1',
						'$ratingNumber2','$ratingNumber3','$ratingNumber4')";
						$populate=mysqli_query($connection,$dataTable);
						
						if($connection)
						{
							if($database)
							{
								if($populate)
								{
									echo "database is been updated";
								}
							}
						}
					}
				}
			}
		?>
	</body>
</html>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Survey App - View Survey Results</title>
		
		<!-- An link to a external styles used in the survey app -->
		<link rel="stylesheet" type="text/css" href="SurveyAppSheet.css">
	</head>
	<body>
		
		<!-- A div container used to align part of the survey app interface -->
		<div id="align">
			<h4 id="app_name"">_Surveys</h4>
			<p id="fill_action"><a href="surveyApp.php">FILL OUT SURVEY</a></p>
			<p id="view_action">VIEW SURVEY RESULTS</p>
		</div>
		
		<?php
				error_reporting(E_ERROR|E_PARSE);	//required for ignoring subtle warnings
				
				/*
				-----------------------------------
				Creating and instantiating variables
				required to show values stored in the
				database.
				-----------------------------------
				*/
				$connection=mysqli_connect("localhost","root","","userresponse");
				$database=mysqli_select_db($connection,"userresponse");
				
				$dataTable="SELECT id FROM users";
				$populate=mysqli_query($connection,$dataTable);
				
				$dataTableA="SELECT dateOfBirth FROM users";
				$populateA=mysqli_query($connection,$dataTableA);
				
				$dataTableA1="SELECT dateOfBirth FROM users";
				$populateA1=mysqli_query($connection,$dataTableA1);
				
				$dataTableMax="SELECT MIN(dateOfBirth) FROM users";
				$populateMax=mysqli_query($connection,$dataTableMax);
				
				$dataTableMin="SELECT MAX(dateOfBirth) FROM users";
				$populateMin=mysqli_query($connection,$dataTableMin);
				
				$dataTablep31="SELECT favourite FROM users WHERE favourite='1'";
				$populatep31=mysqli_query($connection,$dataTablep31);
				
				$dataTablep3a="SELECT COUNT(favourite) AS total_records FROM users";
				$populatep3a=mysqli_query($connection,$dataTablep3a);
				
				$dataTablep32="SELECT favourite FROM users WHERE favourite='2'";
				$populatep32=mysqli_query($connection,$dataTablep32);
				
				$dataTablep3b="SELECT COUNT(favourite) AS total_records FROM users";
				$populatep3b=mysqli_query($connection,$dataTablep3b);
				
				$dataTablep33="SELECT favourite FROM users WHERE favourite='3'";
				$populatep33=mysqli_query($connection,$dataTablep33);
				
				$dataTablep3c="SELECT COUNT(favourite) AS total_records FROM users";
				$populatep3c=mysqli_query($connection,$dataTablep3c);
				
				$dataTablef="SELECT AVG(favourite) AS average_value FROM users";
				$populatef=mysqli_query($connection,$dataTablef);
				
				$dataTable1="SELECT AVG(rating1) AS average_value FROM users";
				$populate1=mysqli_query($connection,$dataTable1);
				
				$dataTable2="SELECT AVG(rating2) AS average_value FROM users";
				$populate2=mysqli_query($connection,$dataTable2);
				
				$dataTable3="SELECT AVG(rating3) AS average_value FROM users";
				$populate3=mysqli_query($connection,$dataTable3);
				
				$dataTable4="SELECT AVG(rating4) AS average_value FROM users";
				$populate4=mysqli_query($connection,$dataTable4);
			
			/*
			-----------------------------------------------------
			Check if the connection to the database is successfully 
			established in order to access the information that is 
			stored in the database.
			-----------------------------------------------------
			*/
			if($connection)
			{	
				//check if the database is selected for accessing 
				//data
				if($database)
				{
				
				echo "<div id='data'>";
				?>
		
			<h1 style="text-align:center;">Survey Results</h1>
			
			<table id="survey_result">
				<tbody>
					<?php
						/*
						--------------------------------------------
						Using the information stored in the 
						database to gather  number of surveys done
						--------------------------------------------
						*/
						
						$surveys=mysqli_num_rows($populate);
					
						if(mysqli_num_rows($populate)>0)
						{
							
							$idRow=mysqli_fetch_assoc($populate);
						
					?>
					<tr>
						<td class="survey_result">Total number of surveys:</td>
						<td class="survey_result"><?php echo $surveys;?> surveys
					<?php	
						}
					?>
						</td>
					</tr>
					<?php
						
						/*
						--------------------------------------------
						Using the information stored in the 
						database to gather the avaerge age of people
						that participated in the survey
						--------------------------------------------
						*/
						while($showDates=mysqli_fetch_assoc($populateA))
						{		
							$yearCount=mysqli_num_rows($populateA);
							
							$currentYear3=date("Y-M-D");
							$yearAverage=(int)$currentYear3-(int)$showDates["dateOfBirth"];
							$totalYearCount=(int)$yearAverage/(int)$yearCount;
						}
					?>
					<tr>
						<td class="survey_result">Average age:</td>
						<td class="survey_result"><?php echo $totalYearCount;?> average age</td>
					</tr>
					<?php
						
						/*
						--------------------------------------------
						Using the information stored in the 
						database to gather the oldest person who
						participated in the survey
						--------------------------------------------
						*/
						while($showMax=mysqli_fetch_assoc($populateMax))
						{
							$currentYear2=date("Y-M-D");
							$yearOld2=(int)$currentYear2-(int)$showMax["MIN(dateOfBirth)"];
					?>
					<tr>
						<td class="survey_result">Oldest person who participated in survey:</td>
						<td class="survey_result"><?php echo $yearOld2;?> max age</td>
					<?php
						}
					?>
					</tr>
					<?php
						
						/*
						--------------------------------------------
						Using the information stored in the 
						database to gather the youngest person who 
						participated in the survey
						--------------------------------------------
						*/
						while($showMin=mysqli_fetch_assoc($populateMin))
						{
							$currentYear1=date("Y-M-D");
							$yearOld1=(int)$currentYear1-(int)$showMin['MAX(dateOfBirth)'];
						
					?>
					<tr>
						<td class="survey_result">Youngest person who participated in survey:</td>
						<td class="survey_result"><?php echo $yearOld1;?> min age</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
					</tr>
					<?php
						}
					?>
					<?php
						
						/*
						--------------------------------------------
						Using the information stored in the 
						database to gather percentage of people who
						like Pizza
						--------------------------------------------
						*/
						
						if(mysqli_num_rows($populatep3a)>0&&mysqli_num_rows($populatep31)>0)
						{
							$row1=mysqli_fetch_assoc($populatep3a);
							$row2=mysqli_num_rows($populatep31);
							
							$totalNumberRecords3=$row1['total_records'];
							$percentage1=(int)$row2/(int)$totalNumberRecords3*100;
						
					?>
					<tr>
						<td class="survey_result">Percentage of people who like Pizza:</td>
						<td class="survey_result"><?php echo $percentage1;?> % Pizza</td>
					</tr>
					<?php	
						}
					?>
					<?php
						/*
						--------------------------------------------
						Using the information stored in the 
						database to gather the percentage of people
						who like Pasta
						--------------------------------------------
						*/
						if(mysqli_num_rows($populatep3b)>0&&mysqli_num_rows($populatep32)>0)
						{	
							$row1=mysqli_fetch_assoc($populatep3b);
							$row2=mysqli_num_rows($populatep32);
							
							$totalNumberRecords3=$row1['total_records'];
							$percentage2=(int)$row2/(int)$totalNumberRecords3*100;
						
					?>
					<tr>
						<td class="survey_result">Percentage of people who like Pasta:</td>
						<td class="survey_result"><?php echo $percentage2;?> % Pasta</td>
					</tr>
					<?php
					}
					?>
					<?php
						/*
						--------------------------------------------
						Using the information stored in the 
						database to gather the percentage of people who 
						like Pap and Wors
						--------------------------------------------
						*/
						if(mysqli_num_rows($populatep3c)>0&&mysqli_num_rows($populatep33)>0)
						{
							$row1=mysqli_fetch_assoc($populatep3c);
							$row2=mysqli_num_rows($populatep33);
							
							$totalNumberRecords3=$row1['total_records'];
							$percentage3=(int)$row2/(int)$totalNumberRecords3*100;
						
					?>
					<tr>
						<td class="survey_result">Percentage of people who like Pap and Wors:</td>
						<td class="survey_result"><?php echo $percentage3;?> % Pap and Wors</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
					</tr>
					<?php
						}
					?>
					<?php
						/*
						--------------------------------------------
						Using the information stored in the 
						database to gather average of people who like
						to watch movies
						--------------------------------------------
						*/
						if(mysqli_num_rows($populate2)>0)
						{
							$row=mysqli_fetch_assoc($populate1);
							$averageValue1=$row['average_value'];
					?>
					<tr>
						<td class="survey_result">People who like to watch movies:</td>
						<td class="survey_result"><?php echo(round($averageValue1,1));?> average of rating</td>
					</tr>
					<?php
						}
					?>
					<?php
						/*
						--------------------------------------------
						Using the information stored in the 
						database to gather average of people who like
						to listen to radio
						--------------------------------------------
						*/
						if(mysqli_num_rows($populate2)>0)
						{
							$row=mysqli_fetch_assoc($populate2);
							$averageValue2=$row['average_value'];
						
					?>
					<tr>
						<td class="survey_result">People who like to listen to radio:</td>
						<td class="survey_result"><?php echo (round($averageValue2,1));?> average of rating</td>
					</tr>
					<?php
						}
					?>
					<?php
						/*
						--------------------------------------------
						Using the information stored in the 
						database to gather average of people who like
						to eat out
						--------------------------------------------
						*/
						if(mysqli_num_rows($populate3)>0)
						{
							$row=mysqli_fetch_assoc($populate3);
							$averageValue3=$row['average_value'];
						
					?>
					<tr>
						<td class="survey_result">People who like to eat out:</td>
						<td class="survey_result"><?php echo (round($averageValue3,1));?> average of rating</td>
					</tr>
					<?php
						}
					?>
					<?php
						/*
						--------------------------------------------
						Using the information stored in the 
						database to gather the average of people who
						like to watch TV
						--------------------------------------------
						*/
						if(mysqli_num_rows($populate4)>0)
						{
							$row=mysqli_fetch_assoc($populate4);
							$averageValue4=$row['average_value'];
						
				
					?>
					<tr>
						<td class="survey_result">People who like to watch TV:</td>
						<td class="survey_result"><?php echo (round($averageValue4,1));?> average of rating</td>
					</tr>
					<?php
						}
					?>
				</tbody>
			</table>
		<?php
			echo "</div>";
				}	
			}
			
			/*
			--------------------------------------------
			Informing the user that there is no survey 
			done because the database is empty
			--------------------------------------------
			*/
			if($empty=mysqli_num_rows($populate)<=0)
			{
				echo "<h1 style='text-align:center;'>No Surveys Available</h1>";
				echo "<div id='data' style='display:none;'>No Surveys Available</div>";
			}
			
		?>
	</body>
</html>
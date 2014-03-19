<?php

	// TITLE: Office Interests View
	// FILE: office/view/interests.php
	// AUTHOR: Brandon Willis; bmw5285
require_once 'office/model/interests.php';
$officeInterest = new officeInterest();
?>

<style> /* css */ 

	input[type=submit] 
	{
		width: 125px;
		height: 40px;
	}
	
	input[type=text]
	{
		width: 125px;
	}
	
	input[name=searchByVolunteer]
	{
		width: 125px;
	}
	
	input[name=update]
	{
		height: 30px;
		width: 62.5px;
	}
	
	input[name=delete]
	{
		height: 30px;
		width: 62.5px;
	}
	
	#update
	{
		display:inline;
		padding-right: 5px;
	}
	
	#delete
	{
		display:inline;
		padding-left: 5px;
	}
	
	form
	{
		padding-left: 20px;
		max-width:675px;
	}
	
	select
	{
		alignment: center;
	}
	
	#searchBy
	{
		width: 23em;
		height: 30px;
		alignment: bottom;
	}
	
</style>

<h4>Interests Search</h4>
<hr>


<!--/////////////////////////////////////////		javascript			\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\-->
<script type="text/javascript" src="js/searchByHandler.js"></script>  <!-- I cant get this to work externally --> <!--This script changes the input boxes after drop down menu-->
<script type="text/javascript">
	function searchByHandler() {
	
	var show = "inline";
	var hide = "none";
	
	var v = document.getElementById("searchBy").value;
	var i1 = document.getElementById("input1");
	var i2 = document.getElementById("input2");
	
	// city, street, address, amount, municipality, bank, organization, zip code
	// mortgage number, interest, auction item, sponsor, event
	
	//alert(v);
	
	switch (v) {
	
	    case "name":
	    case "contact":
	    case "donor":
			i1.placeholder = "first name";
			i2.placeholder = "last name";
			i2.style.display = show;
		break;

	    case "amount":
			i1.placeholder = "low amount";
			i2.placeholder = "high amount";
			i2.style.display = show;
		break;
	    
	    case "date":
			i1.placeholder = "month";
			i2.placeholder = "year";
			i2.style.display = show;
		break;
		
	    case "bank":
	    case "city":
	    case "municipality":
	    case "organization":
	    case "sponsor":
	    case "street":
			i1.placeholder = v + " name";
			i2.placeholder = "not used";
			i2.style.display = hide;
		break;
	    
	    case "state":
			i1.placeholder = v + " abbreviation";
			i2.placeholder = v + " name";
			i2.style.display = show;
		break;

	    case "zip":
			i1.placeholder = v + " code";
			i2.placeholder = "not used";
			i2.style.display = hide;
		break;
	
	    case "address":
			i1.placeholder = "street";
			i2.placeholder = "zip code";
			i2.style.display = show;
		break;
		
	    case "mortgage":
			i1.placeholder = v + " number";
			i2.placeholder = "not used";
			i2.style.display = hide;
		break;
		
		case "interest":
			i1.placeholder = "interest";
			i2.placeholder = "not used";
			i2.style.display = hide;
		break;
		
	    default:
			i1.placeholder = "input 1";
			i2.placeholder = "input 2";
			i2.style.display = show;
		break;
		
	}// end switch
	
}// end function
	
function dropDownMenu()
{
	var show = "inline";
	var hide = "none";
	
	var v = document.getElementById("searchby").value;
	var i1 = document.getElementById("vol1");
	var i2 = document.getElementById("vol2");
	
	switch (v)
	{			
		case "Interest":
			i1.style.display = show;
			i2.style.display = hide;
		break;
		
		case "Interest Type":
			i1.style.display = hide;
			i2.style.display = show;
		break;
		
		default:
			i1.style.display = hide;
			i2.style.display = hide;
		break;
	}
}
</script>


<!--/////////////////////////////////////////			HTML			\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\-->
<div>
	<form action="" method="post"> <!-- view all form -->
		<input type="submit" name="viewAll" value="View All"> <!-- view all button -->
		<select id="viewAll" name="viewAll" action="" method="post"> <!-- drop down menu -->
			<option value="" disabled selected="selected">-Select-</option> <!-- drop down menu option; default -->
			<option name="interests" value="interests">Interests</option> <!-- drop down menu option -->
			<option name="interestTypes" value="interestTypes">Interest Types</option> <!-- drop down menu option -->
		</select> <!-- end drop down menu -->
	</form><hr> <!-- end view all form -->
</div>

<div>
	<form class='searchBy' method="post" action=""> <!-- search by form -->
		<input name="searchBy" type="submit" value="Search By" action="" method="post"> <!-- search by button -->
		<!--<input name="searchByVolunteer" type="text" readonly="readonly" value="Volunteer">--> <!-- uneditable text box -->
		<select id="searchby" name="searchby" action="" method="post" onclick='dropDownMenu()'>
			<option value="" disabled selected>-Select-</option>--> <!-- drop down menu option; default -->
			<option value="Interest" name="Interest">Interest</option>
			<option value="Interest Type" name="Interest Type">Interest Type</option>
		</select>
		<select id="vol1" name="vol1" action="" method="post" style="display:none"> <!-- drop down menu -->
			<option value="" disabled selected>-Select Interest-</option> <!-- drop down menu option; default -->
			<?php //creates drop down menu options AND alphabetizes 
				require_once '/class/interest.php';
				$dbio->getAllInts();
				require_once '/class/item.php';
				$dbio->getIntTypes();
				$hold = array();
				foreach($ints as &$int)
				{
					$interest = $int->getTitle();
					$hold[] = $interest;
					//echo "<option value = '{$interest}' name = '{$interest}'>{$interest}</option>";
				}
				sort($hold);
				$i = 0;
				foreach($hold as &$val)
				{
					$sortedInt = $hold[$i];
					echo "<option value = '{$sortedInt}' name = '{$sortedInt}'>{$sortedInt}</option>";
					$i++;
				}
			?>
		</select>
		<select id='vol2' name='vol2' action='' method='post' style="display:none">" <!--watch difference between double and single quotes; 3hr+ wasted-->
		<option value="" disabled selected>-Select Interest Type-</option> <!-- drop down menu option; default -->
			<?php
				foreach ($types as &$value)
				{
					//$id = $value->getId();
					$title = $value->getTitle();
					/*echo "<div>";
						echo "<form class='searchBy' method='post' action=''>"; //search by result form
							echo "<input name='{$id}' type='text' readonly='readonly' value='{$id}'>"; //html, uneditable input boxes based on sql results
							echo "<input name='{$title}' type='text' readonly='readonly' value='{$title}'>"; //html, uneditable input boxes based on sql results
						echo "</form>";
					echo "<div>";*/
					$hold1[] = $title;
				}
				sort($hold1);
				$i = 0;
				foreach($hold1 as &$val)
				{
					$sortedInt = $hold1[$i];
					echo "<option value = '{$sortedInt}' name = '{$sortedInt}'>{$sortedInt}</option>";
					$i++;
				}
			?> <!--end drop down menu options-->
			
			<!--<option value="name" selected="selected" >Name</option> 					<!-- this code is used if using changeable (javascript) input boxes-->
			<!--<option value="interest" >Interest</option>--> 								<!-- this code is used if using changeable (javascript) input boxes-->
		</select> <!-- end drop down menu -->
			<!--<input id="input1" name="input1" placeholder="first name" type="text">		<!-- this code is used if using changeable (javascript) input boxes-->
			<!--<input id="input2" name="input2" placeholder="last name" type="text">-->	<!-- this code is used if using changeable (javascript) input boxes-->
	</form><hr> <!-- end search by form -->
</div>

<div>
	<form action="" method="post"> <!-- create new form-->
		<input type="submit" name="createNew" value="Create New"> <!-- create button -->
		<select id="create" name="createNew" action="" method="post"> <!-- drop down menu -->
			<option value="" disabled selected="selected">-Select-</option> <!-- drop down menu option; default -->
			<option name="interests" value="interests">Interest</option> <!-- drop down menu option -->
			<option name="interestTypes" value="interestTypes">Interest Type</option> <!-- drop down menu option -->
		</select> <!--end drop down menu options-->
	</form>
</div>


<!--/////////////////////////////////////////			Controller/model calls			\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\-->
<!--/////////////////////////////////////////			this code will need to be moved to appropriate locations (controller or model) once working			\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\-->
<!--/////////////////////////////////////////			model located in /habitat_home/model/dbio_des301.php			\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\-->
<?php
if (isset($_POST['viewAll'])) //checks if "view all" button has been clicked
{
	//echo $_POST['viewAll'];
	echo "<br>";
	if ($_POST['viewAll'] == "interests") //checks viewAll form's drop down menu result
	{
		$officeInterest->listVolunteerInterest(); //model call
		foreach($volInts as $volInt) //loop which goes through each interest and pulls data (Interest() class call)
		{
			$type_title = $volInt->getType_title(); //Interest() class call
			$interest_title = $volInt->getInterest_title(); //Interest() class call
			echo "<div>";
				echo "<form class='searchBy' method='post' action=''>"; //search by result form
					echo "<div id='update'>";
					echo "<input name='update' type='submit' value='update'>";
					echo "</div>";
					echo "<input name='{$type_title}' type='text' readonly='readonly' value='{$type_title}'>"; //html, uneditable input boxes based on sql results
					echo "<input name='{$interest_title}' type='text' readonly='readonly' value='{$interest_title}'>"; //html, uneditable input boxes based on sql results
					//echo "<input name='{$title}' type='text' readonly='readonly' value='{$title}'>"; //html, uneditable input boxes based on sql results
					//echo "<input name='{$description}' type='text' readonly='readonly' value='{$description}'>"; //html, uneditable input boxes based on sql results
					echo "<div id='delete'>";
					echo "<input name='delete' type='submit' value='delete'>";
					echo "</div>";
				echo "</form>"; //search by result form end
			echo "</div>";
			echo"<hr>";
			
		}
	}
	elseif ($_POST['viewAll'] == "interestTypes") //checks viewAll form's drop down menu
	{
		require_once '/class/item.php';
		$dbio->getIntTypes();
		foreach ($types as &$value)
		{
			$id = $value->getId();
			$title = $value->getTitle();
			echo "<div>";
				echo "<form class='searchBy' method='post' action=''>"; //search by result form
					echo "<input name='{$id}' type='text' readonly='readonly' value='{$id}'>"; //html, uneditable input boxes based on sql results
					echo "<input name='{$title}' type='text' readonly='readonly' value='{$title}'>"; //html, uneditable input boxes based on sql results
				echo "</form>";
			echo "<div>";
		}
			
	}
	else
	{
		return null;
	}
}
if (isset($_POST['searchby'])) //checks if "search by" button has been clicked
{
	echo "<br>";
	if ($_POST['searchby'] == "Interest")
	{
		if (isset($_POST['vol1']) == null)
		{
			echo "<div>You have to select an Interest!</div>";
		}
		else
		{
			$searchBy = $_POST['vol1'];
			$officeInterest->readVolunteerInterest($searchBy); //model call
			if ($volInts == null)
			{
				echo "<br>";
				echo "No volunteer with this interest";
			}
			else
			{
				foreach($volInts as $volInt) //loop which goes through each interest and pulls data (Interest() class call)
				{
					//if ($searchBy == $volInt->getInterest_title())
					//{
						$first_name = $volInt->getFirst_name(); //Interest() class call
						$last_name = $volInt->getLast_name(); //Interest() class call
						$type_title = $volInt->getType_title(); //Interest() class call
						$interest_title = $volInt->getInterest_title(); //Interest() class call
						echo "<div>";
							echo "<form class='searchBy' method='post' action=''>"; //search by result form
								echo "<input name='{$first_name}' type='text' readonly='readonly' value='{$first_name}, {$last_name}'>"; //html, uneditable input boxes based on sql results
								echo "<input name='{$type_title}' type='text' readonly='readonly' value='{$type_title}'>"; //html, uneditable input boxes based on sql results
								echo "<input name='{$interest_title}' type='text' readonly='readonly' value='{$interest_title}'>"; //html, uneditable input boxes based on sql results
								//echo "<input name='{$description}' type='text' readonly='readonly' value='{$description}'>"; //html, uneditable input boxes based on sql results
							echo "</form>"; //search by result form end
						echo "</div>";
					//}
				}
			}
		}
	}
	elseif ($_POST['searchby'] == "Interest Type")
	{
		if (isset($_POST['vol2']) == null)
		{
			echo "<div>You have to select an Interest Type!</div>";
		}
		else
		{
			$title = $_POST['vol2'];
			$officeInterest->readVolunteerInterestType($title);
			if ($volInts == null)
			{
				echo "<br>";
				echo "No volunteer with this interest";
			}
			else
			{
				foreach($volInts as $volInt) //loop which goes through each interest and pulls data (Interest() class call)
				{
					//if ($searchBy == $volInt->getInterest_title())
					//{
						$first_name = $volInt->getFirst_name(); //Interest() class call
						$last_name = $volInt->getLast_name(); //Interest() class call
						$type_title = $volInt->getType_title(); //Interest() class call
						$interest_title = $volInt->getInterest_title(); //Interest() class call
						echo "<div>";
							echo "<form class='searchBy' method='post' action=''>"; //search by result form
								echo "<input name='{$first_name}' type='text' readonly='readonly' value='{$first_name}, {$last_name}'>"; //html, uneditable input boxes based on sql results
								echo "<input name='{$type_title}' type='text' readonly='readonly' value='{$type_title}'>"; //html, uneditable input boxes based on sql results
								echo "<input name='{$interest_title}' type='text' readonly='readonly' value='{$interest_title}'>"; //html, uneditable input boxes based on sql results
								//echo "<input name='{$description}' type='text' readonly='readonly' value='{$description}'>"; //html, uneditable input boxes based on sql results
							echo "</form>"; //search by result form end
						echo "</div>";
					//}
				}
			}
		}
	}
}
if (isset($_POST['createNew'])) //checks if "create new" button has been clicked
{
	echo "<br>";
	if ($_POST['createNew'] == "interests") //checks createNew form's drop down menu
	{
		return null;
	}
	elseif ($_POST['createNew'] == "interestTypes") //checks createNew form's drop down menu
	{
		return null;
	}
	else
	{
		return null;
	}
}
?>

<?php

	// TITLE: Office Interests View
	// FILE: office/view/interests.php
	// AUTHOR: Brandon Willis; bmw5285


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
	
	#update
	{
		position:relative;
		top:18px;
		display:inline;
	}
	
	#delete
	{
		position:relative;
		top:18px;
		display:inline;
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
		case "readInterest":
			i1.style.display = show;
			i2.style.display = hide;
		break;
		
		case "readInterestType":
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
	<form name="list" action="index.php" method="GET"> <!-- view all form -->
		<input name="dir" type="hidden" value="<?php echo $dir; ?>" >
		<input name="sub" type="hidden" value="<?php echo $sub; ?>" >
		<input type="submit" value="View All"> <!-- view all button -->
		<select id="viewAll" name="act" action="listInterests.php" method="GET"> <!-- drop down menu -->
			<option value="" disabled selected="selected">-Select-</option> <!-- drop down menu option; default -->
			<option name="interests" value="listInterests">Interests</option> <!-- drop down menu option -->
			<option name="interestTypes" value="listInterestTypes">Interest Types</option> <!-- drop down menu option -->
		</select> <!-- end drop down menu -->
	</form> <!-- end view all form -->
</div><br>

<div>
	<form action="" method="GET"> <!-- create new form-->
		<form name="create" action="index.php" method="GET"> <!-- view all form -->
		<input name="dir" type="hidden" value="<?php echo $dir; ?>" >
		<input name="sub" type="hidden" value="<?php echo $sub; ?>" >
		<input type="submit" value="Create New"> <!-- create button -->
		<select id="create" name="act"> <!-- drop down menu -->
			<option value="" disabled selected="selected">-Select-</option> <!-- drop down menu option; default -->
			<option name="interest" value="createInterest">Interest</option> <!-- drop down menu option -->
			<option name="interestType" value="createInterestType">Interest Type</option> <!-- drop down menu option -->
		</select> <!--end drop down menu options-->
	</form>
</div><br><br>

<div>
	<form name="read" action="index.php" method="GET"> <!-- view all form -->
		<input name="dir" type="hidden" value="<?php echo $dir; ?>">
		<input name="sub" type="hidden" value="<?php echo $sub; ?>">
		<input type="submit" value="Search By"> <!-- search by button -->
		<select id="searchby" name="act" onclick='dropDownMenu()' >
			<option value="" disabled selected>-Select-</option>--> <!-- drop down menu option; default -->
			<option value="readInterest" name="Interest">Interest</option>
			<option value="readInterestType" name="Interest Type">Interest Type</option>
		</select>
		<select id="vol1" name="vol1" action="/model/interests.php" method="POST" style="display:none"> <!-- drop down menu -->
			<option value="" disabled selected>-Select Interest-</option> <!-- drop down menu option; default -->
			<?php //creates drop down menu options AND alphabetizes 
				require_once '/class/interest.php';
				$ints = $dbio->listInterests();
				$hold = array();
				foreach($ints as &$int)
				{
					$interest = $int->getTitle();
					$holdInterest[] = $interest;
				}
				sort($holdInterest);
				foreach($holdInterest as &$val)
				{
					$sortedInt = $val;
					echo "<option value = '{$sortedInt}' name = '{$sortedInt}'>{$sortedInt}</option>";
				}
			?>
		</select>
		<select id='vol2' name="vol2" action="/model/interests.php" method="POST" style="display:none">" <!--watch difference between double and single quotes; 3hr+ wasted-->
		<option value="" disabled selected>-Select Interest Type-</option> <!-- drop down menu option; default -->
			<?php
				//require_once '/class/item.php';
				$intTypes = $dbio->listInterestTypes();
				foreach ($intTypes as &$intType)
				{
					$interestType = $intType->getTitle();
					$holdInterestType[] = $interestType;
				}
				sort($holdInterestType);
				foreach($holdInterestType as &$val)
				{
					$sortedIntType = $val;
					echo "<option value = '{$sortedIntType}' name = '{$sortedIntType}'>{$sortedIntType}</option>";
				}
			?> <!--end drop down menu options-->
		</select> <!-- end drop down menu -->
	</form> <!-- end search by form -->
</div>

<?php //echo $intTypes; ?>

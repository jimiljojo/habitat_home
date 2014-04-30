<?php
//Author: bmw5285; copied from j*p*

echo '<center><input type="button"  class="btn btn-primary btn-sm" onclick="history.back();" value="Back"></center>';
echo "<br><br>";

if($_GET['act'] == "createInterest")
{
	echo '<form action="" method="post">';
		echo '<select id="interestTypeName" name="interestTypeName">';
			echo '<option value="" disabled selected>-Select Interest Type-</option>';
				$intTypes = $dbio->listInterestTypes();
				foreach ($intTypes as &$intType)
				{
					$interestType = $intType->getTitle();
					$interestType_id = $intType->getType_id();
					echo "<option value = '{$interestTypeId}' name = '{$interestType}'>{$interestType}</option>";
				}
		echo "</select>";
		echo "Title: <input type='text' name='title'><br>";
		echo "Description: <input type='text' name='description'>";
		echo "<input type='submit' name='weOnTheMoon' value='Submit'>";
	echo "</form>";
	if (isset($_POST['weOnTheMoon']))
	{
		$title = $_POST['title'];
		$description = $_POST['description'];
		//echo "<br>{$type_id}<br>"; //test everything
		if (empty($interestType_id) || empty($title))
			{
				echo "Required field missing";
			}
			else
			{
				createInterest($interestType_id, $title, $description);
			}
	}
}



if($_GET['act'] == "createInterestType")
{
	echo "<form action='' method='post'>";
		echo "Title: <input type='text' name='title'><br>";
		echo "Description: <input type='text' name='description'>";
		echo "<input type='submit' name='weOnTheMoon' value='Submit'>";
	echo "</form>";
	if (isset($_POST['weOnTheMoon']))
	{
		//echo $_POST['title']; //test it up
		//echo $_POST['description'];
		if (isset($_POST['title']) && isset($_POST['description']))
		{
			$title = $_POST['title'];
			$description = $_POST['description'];
			if (empty($title) || empty($description))
			{
				echo "Required field missing";
			}
			else
			{
				createInterestType($title, $description);
			}
		}
	}
}
?>

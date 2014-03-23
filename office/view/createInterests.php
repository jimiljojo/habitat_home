<?php
//Author: bmw5285; copied from j*p*

echo '<center><input type="button"  class="btn btn-primary btn-sm" onclick="history.back();" value="Back"></center>';
echo "<br><br>";

if($_GET['act'] == "createInterest")
{
	echo '<form action="" method="post">';
		echo '<select id="interestTypeName" name="interestTypeName">';
			echo '<option value="" disabled selected>-Select Interest Type-</option>';
				//require_once '/class/item.php';
				$intTypes = $dbio->listInterestTypes();
				foreach ($intTypes as &$intType)
				{
					$interestType = $intType->getTitle();
					$interestTypeId = $intType->getId();
					$holdInterestType[] = $interestType;
					
					$idToTitles = array($interestTypeId, $interestType);
					$holdIdToTitles[] = $idToTitles;
				}
				sort($holdInterestType);
				foreach($holdInterestType as &$val)
				{
					$sortedIntType = $val;
					echo "<option value = '{$sortedIntType}' name = '{$sortedIntType}'>{$sortedIntType}</option>";
				}
		echo "</select>";
		echo "Title: <input type='text' name='title'><br>";
		echo "Description: <input type='text' name='description'>";
		echo "<input type='submit' name='weOnTheMoon' value='Submit'>";
	echo "</form>";
	if (isset($_POST['weOnTheMoon']))
	{
		//echo $_POST['interestTypeName'];
		foreach ($holdIdToTitles as $idToTitles)
			{
				foreach($idToTitles as $idToTitle)
				if (isset($_POST['interestTypeName']))
				{
					$interestTypeName = $_POST['interestTypeName'];
					if (in_array($interestTypeName, $idToTitles))
					{
						$type_id =  $idToTitles[0];
					}
				}
				else
				{
					echo "try again. I think you missed something";
					return null;
				}
			}
		$title = $_POST['title'];
		$description = $_POST['description'];
		//echo "<br>{$type_id}<br>"; //test everything
		if (empty($type_id) || empty($title) || empty($description))
			{
				echo "I am error";
			}
			else
			{
				createInterest($type_id, $title, $description);
			}
	}
}



elseif($_GET['act'] == "createInterestType")
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
				echo "I am error";
			}
			else
			{
				createInterestType($title, $description);
			}
		}
	}
}
?>

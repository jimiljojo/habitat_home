<?php

	// TITLE: Office Interests Model
	// FILE: office/model/interests.php
	// AUTHOR: bmw5285d

	function listInterests()
	{
		$dbio = new DBIO();
		$ints = $dbio->listInterests();
		echo '<table class="table table-striped table-hover " style="width:100%"><tr><th>ID</th><th>Type ID</th><th>Title</th><th>Description</th></tr>';
		foreach ($ints as &$int)
		{
			echo '<input id="dir" type="hidden" value="office">';
			echo '<input id="sub" type="hidden" value="interests">';
			echo '<input id="act" type="hidden" value="viewInterest">';
			echo '<tr onclick="retreive(' . $int->getId() . ');">';
			echo '<td>' . $int->getId() . '</td>';
			echo '<td>' . $int->getTypeId() . '</td>';
			echo '<td>' . $int->getTitle() . '</td>';
			echo '<td>' . $int->getDescription() . '</td>';
			echo '</tr>';
		}
		echo '</table>';
	}
	
	function listInterestTypes()
	{
		$dbio = new DBIO();
		$intTypes = $dbio->listInterestTypes();
		echo '<table class="table table-striped table-hover " style="width:100%"><tr><th>ID</th><th>Title</th><th>Description</th></tr>';
		foreach ($intTypes as &$intType)
		{
			echo '<input id="dir" type="hidden" value="office">';
			echo '<input id="sub" type="hidden" value="interests">';
			echo '<input id="act" type="hidden" value="viewInterestType">';
			echo '<tr onclick="retreive(' . $intType->getType_id() . ');">';
			echo '<td>' . $intType->getType_id() . '</td>';
			echo '<td>' . $intType->getTitle() . '</td>';
			echo '<td>' . $intType->getDescription() . '</td>';
			echo '</tr>';
		}
		echo '</table>';
	}
	
	function createInterest($type_id, $title, $description)
	{
		$dbio = new DBIO();
		global $con;
		$dbio->open();
		$tableName = "Interest";
		$sql = "INSERT INTO {$tableName} (type_id, title, description) VALUES ('{$type_id}', '{$title}', '{$description}')";
		//$this->readInterestType();
		mysql_query($sql,$con);
		$dbio->close();
		//echo "You have created a new {$tableName} its interest type is {$type_id} named {$title} with the following description: <br> {$description}";
	}
	
	function createInterestType($title, $description)
	{
		//require_once '/class/interest_type.php';
		$dbio = new DBIO();
		global $con;
		$dbio->open();
		$tableName = "Interest_Type";
		$sql = "INSERT INTO {$tableName} (title, description) VALUES ('{$title}', '{$description}')";
		mysql_query($sql,$con);
		$dbio->close();
		//echo "You have created a new {$tableName} named {$title} with the following description: <br> {$description}";
	}
	
	function readInterest()
	{
			$dbio = new DBIO();
			$id = $_GET['id'];
			$volInts = $dbio->readInterest($id);
			echo '<table class="table table-striped table-hover " style="width:100%"><tr><th>Name</th><th>Interest Type</th><th>Interest</th></tr>';
			foreach($volInts as $volInt) //loop which goes through each interest and pulls data (Interest() class call)
				{
						echo '<input id="dir" type="hidden" value="office">';
						echo '<input id="sub" type="hidden" value="interests">';
						echo '<input id="act" type="hidden" value="viewInterest">';
						$id = $volInt->getId();
						$first_name = $volInt->getFirst_name(); //Interest() class call
						$last_name = $volInt->getLast_name(); //Interest() class call
						$type_title = $volInt->getType_title(); //Interest() class call
						$interest_title = $volInt->getInterest_title(); //Interest() class call
						echo '<tr onclick="retreive(' . $id . ');">';
								echo "<td>{$first_name}, {$last_name}</td>";
								//echo "<td>{$last_name}</td>";
								echo "<td>{$type_title}</td>";
								echo "<td>{$interest_title}</td>";
								//echo "<td>'{$description}'</td>";
						echo "</tr>";
				}
	}
	
	function readInterestType()
	{
		$dbio = new DBIO();
		$id = $_GET['id'];
		$volInts = $dbio->readInterestType($id);
		echo '<table class="table table-striped table-hover " style="width:100%"><tr><th>Name</th><th>Interest Type</th><th>Interest</th></tr>';
		if (is_null($volInts))
		{
			return null;
		}
		else
		{
			//$i=0;
			foreach($volInts as $volInt) //loop which goes through each interest and pulls data (Interest() class call)
			{
				echo '<input id="dir" type="hidden" value="office">';
				echo '<input id="sub" type="hidden" value="interests">';
				echo '<input id="act" type="hidden" value="viewInterestType">';
				$id = $volInt->getId();
				$first_name = $volInt->getFirst_name(); //Interest() class call
				$last_name = $volInt->getLast_name(); //Interest() class call
				$type_title = $volInt->getType_title(); //Interest() class call
				$interest_title = $volInt->getInterest_title(); //Interest() class call
				echo '<tr onclick="retreive(' . $id . ');">';
						echo "<td>{$first_name}, {$last_name}</td>";
						//echo "<td>{$last_name}</td>";
						echo "<td>{$type_title}</td>";
						echo "<td>{$interest_title}</td>";
						//echo "<td>'{$description}'</td>";
				echo "</tr>";
				//$i++;
			}
		}
	}
	
	function viewInterest()
	{
		$dbio = new DBIO();
		$id = $_GET['id'];
		$ints = $dbio->readInterests($id);
		if (is_null($ints))
		{
			return null;
		}
		else
		{
			echo "<table><form name='viewInterest' action='' method='post'";
				echo "<tr><th>Interest Type</th><th>Interest</th><th>Description</th></tr>";
				echo '<tr>';
				//echo "<td><input name = 'typeTitle' type='text' placeholder='{$ints[0]->getType_title()}'></td>";
				echo "<td><select>";
				$intTypes = $dbio->listInterestTypes();
				echo "<option value='{$ints[0]->getTypeId()}'>{$ints[0]->getTypeId()}, {$ints[0]->getType_title()}</option>";
				foreach ($intTypes as &$intType)
				{
					$interestType = $intType->getTitle();
					$interestId = $intType->getType_id();
					echo "<option value = '{$interestId}' name = '{$interestType}'>{$interestType}</option>";
				}
				echo "<select></td>";
				echo '<td><input name = "title" type="text" value="' . $ints[0]->getInterest_title() . '"></td>';
				echo "<td><input name = 'description' type='text' value='{$ints[0]->getDescription()}'></td>";
				echo "<td><input name='viewInterest' value='update' type='submit'></td>";
				echo '</tr>';
			echo '</form></table>';
			if(isset($_POST['viewInterest']))
			{
				global $con;
				$dbio = new DBIO();
				$dbio->open();
				$sql = "UPDATE Interest
						SET Interest.type_id='{$interestId}', Interest.title='{$_POST['title']}', Interest.description='{$_POST['description']}'
						WHERE interest_id = '{$id}'";
				$result = mysql_query($sql,$con);
				//echo $interestId, $_POST['title'], $_POST['description'];
				
			}
		}
	}
	
	function viewInterestType()
	{
		$dbio = new DBIO();
		$id = $_GET['id'];
		$intTypes = $dbio->viewInterestType($id);
		echo "<table><form name='viewInterestType' action='' method='post'";
		echo "<tr><th>Interest Type</th><th>Description</th></tr>";
		if (is_null($intTypes))
		{
			return null;
		}
		else
		{
			foreach($intTypes as $intType)
			{
				echo '<tr>';
				//echo '<td>' . $intType->getType_id() . '</td>';
				echo '<td><input name = "title" type="text" value="' . $intType->getTitle() . '"></td>';
				echo "<td><input name = 'description' type='text' value='{$intType->getDescription()}'></td>";
				echo "<td><input name='viewInterestType' value='update' type='submit'></td>";
				echo '</tr>';
			}
			echo '</form></table>';
			if(isset($_POST['viewInterestType']))
			{
				global $con;
				$dbio = new DBIO();
				$dbio->open();
				$sql = "UPDATE Interest_Type
						SET Interest_Type.title='{$_POST['title']}', Interest_Type.description='{$_POST['description']}'
						WHERE Interest_Type.type_id = '{$id}'";
				$result = mysql_query($sql,$con);
				//echo $_POST['title'], $_POST['description'];
				
			}
		}
	}
?>

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
			echo '<tr>';
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
		echo '<table class="table table-striped table-hover " style="width:100%"><tr><th>ID</th><th>Title</th></tr>';
		foreach ($intTypes as &$intType)
		{
			echo '<tr>';
			echo '<td>' . $intType->getId() . '</td>';
			echo '<td>' . $intType->getTitle() . '</td>';
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
		echo "You have created a new {$tableName} its interest type is {$type_id} named {$title} with the following description: <br> {$description}";
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
		echo "You have created a new {$tableName} named {$title} with the following description: <br> {$description}";
	}
	
	function readInterest()
	{
			$dbio = new DBIO();
			$title = $_GET['vol1'];
			$volInts = $dbio->readInterest($title);
			echo '<table class="table table-striped table-hover " style="width:100%"><tr><th>Name</th><th>Interest Type</th><th>Interest</th></tr>';
			foreach($volInts as $volInt) //loop which goes through each interest and pulls data (Interest() class call)
				{
						$first_name = $volInt->getFirst_name(); //Interest() class call
						$last_name = $volInt->getLast_name(); //Interest() class call
						$type_title = $volInt->getType_title(); //Interest() class call
						$interest_title = $volInt->getInterest_title(); //Interest() class call
						echo "<tr>";
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
		$title = $_GET['vol2'];
		$volInts = $dbio->readInterestType($title);
		echo '<table class="table table-striped table-hover " style="width:100%"><tr><th>Name</th><th>Interest Type</th><th>Interest</th></tr>';
		if (is_null($volInts))
		{
			return null;
		}
		else
		{
		foreach($volInts as $volInt) //loop which goes through each interest and pulls data (Interest() class call)
			{
					$first_name = $volInt->getFirst_name(); //Interest() class call
					$last_name = $volInt->getLast_name(); //Interest() class call
					$type_title = $volInt->getType_title(); //Interest() class call
					$interest_title = $volInt->getInterest_title(); //Interest() class call
					echo "<tr>";
							echo "<td>{$first_name}, {$last_name}</td>";
							//echo "<td>{$last_name}</td>";
							echo "<td>{$type_title}</td>";
							echo "<td>{$interest_title}</td>";
							//echo "<td>'{$description}'</td>";
					echo "</tr>";
			}
		}
	}
?>

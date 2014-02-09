<?php
	/*
	
	*/
	$class = 'flavor';
	$values = array('name', 'title', 'groupId');
	$tab = "\t";
	$return = "\n";
?>
<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
	<pre>
	    <code>
	    <?php
		echo $return;
		echo '&lt;?php' . $return;
		echo $tab . 'class ' . ucfirst($class) . ' {' . $return;
		echo $return;
		echo $tab . $tab . '// ATTRIBUTES //' . $return;
		echo $return;
		foreach ($values as $value) {
			echo $tab . $tab . 'private $' . $value . ';' . $return;
		}
		echo $return;
		echo $return;
		echo $tab . $tab . '// CONSTRUCTOR //' . $return;
		echo $return;
		echo $tab . $tab . 'public function __construct() {}' . $return;
		echo $return;
		echo $return;
		echo $tab . $tab . '// METHOD //' . $return;
		echo $return;
		foreach ($values as $value) {
			echo $tab . $tab . 'public function get' . ucfirst($value) . '() {return $this->' . $value . ';}' . $return;
		}
		echo $return;
		foreach ($values as $value) {
			echo $tab . $tab . 'public function set' . ucfirst($value) . '($' . $value . ') {$this->' . $value . ' = $' . $value . ';}' . $return;
		}
		echo $return;
		echo $tab . '}// end class' . $return;
		echo '?>';
	    ?>
	    </code>
	</pre>
    </body>
</html>
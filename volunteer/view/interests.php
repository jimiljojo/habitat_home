<?php

    // FILE: Volunteer Interest View
    // AUTHOR: des301
	// Modified by: bmw5285 //very slightly

    global $dir;
    global $sub;
    global $act;
    global $msg;
    global $dbio;

    $columnCount = 3;

    //global $interestTypes;
    //global $interests;
    $interestTypes = $dbio->getInterestTypes();
    $interests = $dbio->getVolunteerInterests($personId);

    if($updated)
		echo '<div class="alert alert-dismissable alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>UPDATED</strong> You successfully updated the information.</div>';
?>
    <h4>Your Volunteer Interests</h4>
    <hr>
    <button onclick="swapAll('show');">Show All</button>
    <button onclick="swapAll('hide');">Hide All</button>
    <br>

    <form action="index.php" method="GET">
	<input name="dir" type="hidden" value="<?php echo $dir; ?>">
	<input name="sub" type="hidden" value="<?php echo $sub; ?>">
	<input name="act" type="hidden" value="updateInterests">
<?php		
    foreach ($interestTypes as $it) {

	echo '<h4 class="show" onclick="swap(this);">' .  $it->getTitle() . '</h4>';
	echo '<div>';

	$typeInts = array();
	foreach ($interests as $int) {
	    if ($int->getTypeId() == $it->getId()) {
		$typeInts[] = $int;
	    }
	}

	$numCol = floor(sizeof($typeInts) / $columnCount);
	$remainder = sizeof($typeInts) % $columnCount;
	
	echo '<table class="intTable">';

	for ($i = 0; $i < $numCol; $i++) {			

	    echo '<tr>';

	    for ($j = 0; $j < $columnCount; $j++) {
		$n = $columnCount * $i + $j;
		$id = $typeInts[$n]->getId();
		$title = $typeInts[$n]->getTitle();
		$checked = ($typeInts[$n]->getIsInterest()) ? 'checked="checked"' : '';
		echo '<td><input type="checkbox" name="interestVol[]" value="' . $id . '" ' . $checked . ' /><label>' . $title . '</label></td>';
	    }// end for

	    echo '</tr>';

	}// end for

	echo '<tr>';

	$max = sizeof($typeInts);

	for ($i = $max - $remainder; $i < $max; $i++) {

	    $id = $typeInts[$i]->getId();
	    $title = $typeInts[$i]->getTitle();
	    $checked = ($typeInts[$i]->getIsInterest()) ? 'checked="checked"' : '';

	    echo '<td><input type="checkbox" name="interestVol[]" value="' . $id . '" ' . $checked . ' /><label>' . $title . '</label></td>';

	}// end for

	for ($i = 0; $i < ($columnCount - $remainder); $i++) {echo '<td></td>';}
	echo '</tr></table></div>';

    }// end foreach
    
?>
	<!--
    <br>
    <button onclick="swapAll('show');">Show All</button>
    <button onclick="swapAll('hide');">Hide All</button><br>
 -->
    <br>
    <input type="submit" value="Update">
</form>
<hr/>
<div class="note">
    Check the box next to the type of work you are interested in performing for Habitat York
</div>
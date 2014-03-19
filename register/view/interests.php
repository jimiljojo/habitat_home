<?php
	
	// FILE: Registration Interests View

	// AUTHOR: des301

	global $dir;
	global $sub;
	global $act;
	global $msg;
	global $total;
	global $dbio;

//require_once ('C:/wamp/www/habitat_home/class/interest.php');
//require_once ('C:/wamp/www/habitat_home/model/dbio_des301.php');
	//$dbio= new DBIO();

	
	
?>
<style>
	.bold {font-weight: bold;}
	.note {font-size: 10pt; color: grey;}
	.mandatory {color: crimson;}
	/*
	h4.show, h4.hide {width: 742px;}
	div {width: 750px;}
	*/
	label {margin-left: 5px;}
	h4.show + div {display: block;}
	h4.hide + div {display: none;}
	h4.show + div, h4.hide + div {
	    border: 1px solid black;
	}
	h4.show, h4.hide {
	    margin-bottom: 0px;
	    color: white;
	    background-color: #02478a;
	    padding-left: 10px;
	}
	#page {width: 800px; text-align: left; margin: auto;}

	h4.show, h4.hide {
	    border-top-left-radius: 10px;
	    border-top-right-radius: 10px;
	    padding-left: 15px;
	    padding-top: 3px;
	    padding-bottom: 3px;
	}

</style>
<script>
    function swap(e) {
	if (e.className === "hide") {
	       e.className = "show";
	} else {
	       e.className = "hide";
	}// end if-else
    }// end function

    function showAll() {
	es = document.getElementsByTagName("h4");
	l = es.length;
	for (i = 0; i < l; i++) {
	       if(es[i].className === "hide") {swap(es[i]);}
	}// end for
    }// end function

    function hideAll() {
	es = document.getElementsByTagName("h4");
	l = es.length;
	for (i = 0; i < l; i++) {
	       if(es[i].className === "show") {swap(es[i]);}
	}// end for
    }// end function
</script>
<h4>Interests</h4>
<br/>
<?php include 'progress.php'; ?>

<hr>
<button onclick="showAll();">Show All</button>
<button onclick="hideAll();">Hide All</button>

<form  name="interestForm" action="index.php" method="get">
	<input name="act" type="hidden" value="<?php echo $act; ?>" >
	<br>
	<!-- <input name="id" value="off" type="hidden"> -->Construction Site Host/Hostess

	<?php
	$interestTypes = $dbio->getAllInterestTypes();

	foreach($interestTypes as $types){
	 echo'<h4 class="show" onclick="swap(this);">'. $types->getTitle(). '</h4>'; 

	 echo'<div><table class="intTable"><tr>';

	 $columnCount =0;
	 $interests = $dbio->getInterestsOfType($types->getId());
	 foreach($interests as $int) {
	 	$columnCount ++;
	 	
	    echo '<td><input type="checkbox" name="interest[]" value="' . $int->getId() . '"  /><label>' . $int->getTitle() . '</label></td>';

	    if($columnCount==3){
	    	echo'</tr><tr>';
	    	$columnCount=0;
	    }
	    }
	echo'</tr></table></div>';    

	}?>

	<br>
	<input class="btn btn-success" name="submit" type="submit" value="submit">

	

</form>
<br>
<hr>





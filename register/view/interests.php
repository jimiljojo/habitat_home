<?php
	
	// FILE: Registration Interests View

	// AUTHOR: des301

	global $dir;
	global $sub;
	global $act;
	global $msg;
	global $total;
	
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
	<input name="id" value="99" type="hidden">
	<h4 class="show" onclick="swap(this);">Committee</h4><div><table class="intTable"><tr><td><input type="checkbox" name="interest[]" value="25"  /><label>Development/Sponsorship</label></td><td><input type="checkbox" name="interest[]" value="26"  /><label>Building and Site Selection</label></td><td><input type="checkbox" name="interest[]" value="27"  /><label>Personnel/Human Resources</label></td></tr><tr><td><input type="checkbox" name="interest[]" value="28" checked="checked" /><label>Faith Relations</label></td><td><input type="checkbox" name="interest[]" value="29"  /><label>Marketing/Special Events</label></td><td><input type="checkbox" name="interest[]" value="30"  /><label>Finance</label></td></tr><tr><td><input type="checkbox" name="interest[]" value="31"  /><label>Family Services</label></td><td><input type="checkbox" name="interest[]" value="32"  /><label>Governance and Nominating</label></td><td><input type="checkbox" name="interest[]" value="25"  /><label>Neighborhood Revitalization Initiative (NRI)</label></td></tr></table></div><h4 class="show" onclick="swap(this);">Office</h4><div><table class="intTable"><tr><td><input type="checkbox" name="interest[]" value="1"  /><label>Office/Computer skills</label></td><td><input type="checkbox" name="interest[]" value="2"  /><label>Office/Filing, Mailing, Copying</label></td><td><input type="checkbox" name="interest[]" value="3" checked="checked" /><label>Making Phone Calls</label></td></tr><tr><td><input type="checkbox" name="interest[]" value="4"  /><label>Online Posting and Updates</label></td><td></td><td></td></tr></table></div><h4 class="show" onclick="swap(this);">Skilled</h4><div><table class="intTable"><tr><td><input type="checkbox" name="interest[]" value="5"  /><label>Architecture</label></td><td><input type="checkbox" name="interest[]" value="6"  /><label>Photography</label></td><td><input type="checkbox" name="interest[]" value="7" checked="checked" /><label>I.T. Expertise</label></td></tr><tr><td><input type="checkbox" name="interest[]" value="8"  /><label>Networking/Development</label></td><td><input type="checkbox" name="interest[]" value="9"  /><label>Public Speaking</label></td><td><input type="checkbox" name="interest[]" value="10"  /><label>Finance/Budgeting with Families</label></td></tr><tr><td><input type="checkbox" name="interest[]" value="11"  /><label>Design and Marketing</label></td><td></td><td></td></tr></table></div><h4 class="show" onclick="swap(this);">Event Planning</h4><div><table class="intTable"><tr><td><input type="checkbox" name="interest[]" value="15"  /><label>Planning Youth Activities</label></td><td><input type="checkbox" name="interest[]" value="16"  /><label>Gala Planning</label></td><td><input type="checkbox" name="interest[]" value="17" checked="checked" /><label>Special Event Planning</label></td></tr><tr><td><input type="checkbox" name="interest[]" value="18"  /><label>Organizing Fund-Raisers</label></td><td><input type="checkbox" name="interest[]" value="15"  /><label>5K Run</label></td><td><input type="checkbox" name="interest[]" value="15"  /><label>Golf Outing</label></td></tr></table></div><h4 class="show" onclick="swap(this);">Management</h4><div><table class="intTable"><tr><td><input type="checkbox" name="interest[]" value="12"  /><label>Human Resources Expertise</label></td><td><input type="checkbox" name="interest[]" value="13" checked="checked" /><label>Teaching/Leading Classes</label></td><td><input type="checkbox" name="interest[]" value="14"  /><label>Board Training/Recruitment</label></td></tr><tr><td></td><td></td><td></td></tr></table></div><h4 class="show" onclick="swap(this);">Communications</h4><div><table class="intTable"><tr><td><input type="checkbox" name="interest[]" value="19"  /><label>Work with Churches</label></td><td><input type="checkbox" name="interest[]" value="20"  /><label>Construction Site Host/Hostess</label></td><td><input type="checkbox" name="interest[]" value="21" checked="checked" /><label>Mission Teams Host/Hostess</label></td></tr><tr><td><input type="checkbox" name="interest[]" value="22"  /><label>Partnering with Families</label></td><td><input type="checkbox" name="interest[]" value="23"  /><label>Grant Research</label></td><td><input type="checkbox" name="interest[]" value="24"  /><label>Writing Press Releases/Articles</label></td></tr><tr><td></td><td></td><td></td></tr></table></div>
	<br>
	<input class="btn btn-success" name="submit" type="submit" value="submit">
</form>
<br>
<hr>
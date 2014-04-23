<?php

	// TITLE: Admin Authrorization View
	// FILE: admin/view/auth.php
	// AUTHOR: sbkedia


?>

<style>
	
	div.show {display: block;}
	div.hide {display: none;}
	h4+div{border: 1px solid black;}

</style>

<script>
function swap(divNo) {
    	e=document.getElementById("div"+divNo);
    	eButton=document.getElementById("button"+divNo);
    	
		if (e.className === "hide") {
	    	   e.className = "show";
	    	   eButton.value="Hide";
		} 
		else {
	       e.className = "hide";
	       eButton.value="Show";
		}// end if-else
    }// end function

</script>

<h2>Authorization</h2>
<hr>

<h4>Work Hours Authorization
	<input type="button" id="button1" onclick="swap(1);" value="Show"> </h4>

	<div class="hide" id="div1">
	<form action="index.php" method="GET">
		<input name="dir" id="dir" type="hidden" value="<?php echo $dir; ?>" >
		<input name="sub" id="sub" type="hidden" value="<?php echo $sub; ?>" >
		<input name="act" id="act" type="hidden" value="authorize" >
	</form>	
	</div>

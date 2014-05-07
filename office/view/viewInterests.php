<?php
  //Author: bmw5285; copied from j*p*
  
  echo '<center><input type="button"  class="btn btn-primary btn-sm" onclick="history.back();" value="Back"></center>';
  echo "<br><br>";
  
if($_GET['act'] == "viewInterestType")
{
  	viewInterestType();
}
if($_GET['act'] == "viewInterest")
{
	viewInterest();
}
?>

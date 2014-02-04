<?php

	// TITLE: Home Owner Sweat Equity View
	// FILE: homeowner/view/sweat.php
	// AUTHOR: AUTOGEN


?>
<h4>Sweat-Equity Info</h4>
<hr>
<div style="width:600px;">
    <div style="float: left; border-left: 1px solid #666666;">&nbsp; 0%</div>
    <div style="float: right; border-right: 1px solid #666666;">100% &nbsp; </div>
    <div style="clear: both"></div>
</div>
<div class="progress" style="width: 600px;">
  <div class="progress-bar progress-bar-warning" style="width: 11.1%;">25 hours</div>
  <div class="progress-bar progress-bar-success" style="width: 63.9%;">150 hours</div>
  <div class="progress-bar progress-bar-danger" style="width: 25%;">50 hours</div>
</div>
<div style="margin-left: 405px; margin-top: -17px;">
    175/225 Hours
</div>

<div style="margin-top: 15px;">
        <div style="height: 20px; width: 20px; background-color: #faa732; border-radius: .5em; float: left;"></div> <div style="float: left; padding-left: 5px;">Good Faith Hours Completed</div>
        <div style="clear: both;"></div>
        <br/>
        <div style="height: 20px; width: 20px; background-color: #5eb95e; border-radius: .5em; float: left;"></div> <div style="float: left; padding-left: 5px;">Sweat Hours Completed</div>
        <div style="clear: both;"></div>
        <br/>
        <div style="height: 20px; width: 20px; background-color: #dd514c; border-radius: .5em; float: left;"></div> <div style="float: left; padding-left: 5px;">Sweat Hours Remaining</div>
        <div style="clear: both;"></div>

<style>
    .secondCenter tr td:nth-child(2) {text-align: center}
    .secondCenter tr td:first-child {text-align: right}
</style>
<hr>
<table class="secondCenter">  
    <tr><th>Date</th><th>Hours</th><th>Name</th></tr>
 <?php
	$total = 0;
	$nameList = array('Dan', 'Christina', 'Sean', 'Mary', 'Andrew', 'Jen');
	while ($total <= 30) {
	    $name = $nameList[rand(0, sizeof($nameList) - 1)];
	    $month = rand(1,12);
	    $day = rand(1,30);
	    $year =  '20xx';
	    $hours = rand(1,8);
	    $total += $hours;
	    echo '<tr><td>' . $month . '-' . $day . '-' . $year . '</td><td>' . $hours . '</td><td>' . $name . '</td></tr>';
	}// end while
    ?>
</table>
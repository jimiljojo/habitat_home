<?php

	// TITLE: Home Owner Mortgage View
	// FILE: homeowner/view/mortgage.php
	// AUTHOR: AUTOGEN


?>
<h4>Mortgage Info</h4>
<hr>
<div style="width:600px;">
    <div style="float: left; border-left: 1px solid #666666;">&nbsp; 0%</div>
    <div style="float: right; border-right: 1px solid #666666;">100% &nbsp; </div>
    <div style="clear: both"></div>
</div>
<div class="progress" style="width: 600px;">
  
  <div class="progress-bar progress-bar-success" style="width: 28%;"></div>
  <div class="progress-bar progress-bar-danger" style="width: 72%;"></div>
</div>
<div style="margin-left: 120px; margin-top: -17px;">
    $3431 / $12255
</div>

<div style="margin-top: 15px;">
        
        <div style="height: 20px; width: 20px; background-color: #5eb95e; border-radius: .5em; float: left;"></div> <div style="float: left; padding-left: 5px;">Mortgage Amount Paid</div>
        <div style="clear: both;"></div>
        <br/>
        <div style="height: 20px; width: 20px; background-color: #dd514c; border-radius: .5em; float: left;"></div> <div style="float: left; padding-left: 5px;">Mortgage Amount Remaining</div>
        <div style="clear: both;"></div>
    
</div>
<style>
    .secondCenter tr td:nth-child(2) {text-align: center}
    .secondCenter tr td:first-child {text-align: right}
</style>
<hr>
<table class="secondCenter">
    <tr><th>Payment Date</th><th>Amount</th><th>Late Fee</th></tr>
    
    <?php
	$total = 0;
	while ($total <= rand(3000,3500)) {
	    $lateFee = 'No';
	    $month = rand(1,12);
	    $day = rand(1,30);
	    $year =  '20xx';
	    $amount = rand(300,400);
	    $total += $amount;
	    echo '<tr><td>' . $month . '-' . $day . '-' . $year . '</td><td>' . $amount . '</td><td>' . $lateFee . '</td></tr>';
	}//end while
    ?>
</table>
<?php

	// TITLE: Home Owner Requirements View
	// FILE: homeowner/view/requirements.php
	// AUTHOR: AUTOGEN


?>
</td><td><?php
    
    // File: Home Owner | Requirement | View
    $true = '<img src="img/check.png" />';
    $false = '<img src="img/cross.png" />';
    $isComplete = true;
?>
    <style>
	table {width: 100%;}
	th {text-align: left;}
    </style>
<h4>Requirements</h4>
<hr>
<table style="width: 100%;">
    <tr><th colspan="3">Interested (100%)</th></tr>
    <tr><td><?php echo ($isComplete) ? $true : $false; ?></td><td>Attended Information Meeting</td><td><?php echo '<span class="note">' . date('d-m-Y') . '</span>'; ?></td></tr>

    <tr><th colspan="3">Applied (100%)</th></tr>
    <tr><td><?php echo ($isComplete) ? $true : $false; ?></td><td>Initial Screening</td><td><?php echo '<span class="note">' . date('d-m-Y') . '</span>'; ?></td></tr>
    <tr><td><?php echo ($isComplete) ? $true : $false; ?></td><td>Interviewed by FSC</td><td><?php echo '<span class="note">' . date('d-m-Y') . '</span>'; ?></td></tr>
    <tr><td><?php echo ($isComplete) ? $true : $false; ?></td><td>Received all paperwork</td><td><?php echo '<span class="note">' . date('d-m-Y') . '</span>'; ?></td></tr>
    <tr><td><?php echo ($isComplete) ? $true : $false; ?></td><td>Home Visit completed</td><td><?php echo '<span class="note">' . date('d-m-Y') . '</span>'; ?></td></tr>
    <tr><td><?php echo ($isComplete) ? $true : $false; ?></td><td>Good Faith Sweat Equity completed</td><td><?php echo '<span class="note">' . date('d-m-Y') . '</span>'; ?></td></tr>
    <tr><td><?php echo ($isComplete) ? $true : $false; ?></td><td>Landlord Reference Received</td><td><?php echo '<span class="note">' . date('d-m-Y') . '</span>'; ?></td></tr>
    <tr><td><?php echo ($isComplete) ? $true : $false; ?></td><td>Credit Counseling</td><td><?php echo '<span class="note">' . date('d-m-Y') . '</span>'; ?></td></tr>
    <tr><td><?php echo ($isComplete) ? $true : $false; ?></td><td>Final Approval by Committee</td><td><?php echo '<span class="note">' . date('d-m-Y') . '</span>'; ?></td></tr>

    <tr><th colspan="3">In Progress (33%)</th></tr>
    <tr><td><?php echo ($isComplete) ? $true : $false; ?></td><td>Board Approval</td><td><?php echo '<span class="note">' . date('d-m-Y') . '</span>'; ?></td></tr>
    <tr><td><?php echo ($isComplete) ? $true : $false; ?></td><td>Credit Counseling (if not completed in "applied")</td><td><?php echo '<span class="note">' . date('d-m-Y') . '</span>'; ?>;</td></tr>
    <tr><td><?php echo ($isComplete) ? $true : $false; ?></td><td>Homeowner Orientation</td><td><?php echo '<span class="note">' . date('d-m-Y') . '</span>'; ?></td></tr>
    <tr><td><?php echo ($isComplete) ? $true : $false; ?></td><td>Initial Budget Review</td><td><?php echo '<span class="note">' . date('d-m-Y') . '</span>'; ?></td></tr>
    <tr><td><?php echo ($isComplete) ? $true : $false; ?></td><td>Home Assigned</td><td><?php echo '<span class="note">' . date('d-m-Y') . '</span>'; ?></td></tr>
    <?php
	$isComplete = false;
	//echo '<dd class="bold" style="background-color: darkorange;">Home Owner Status: In Process Declined</td></tr>'
    ?>
    <tr><td><?php echo ($isComplete) ? $true : $false; ?></td><td>YHAP Session 1</td><td></td></tr>
    <tr><td><?php echo ($isComplete) ? $true : $false; ?></td><td>YHAP Session 2</td><td></td></tr>
    <tr><td><?php echo ($isComplete) ? $true : $false; ?></td><td>YHAP Session 3</td><td></td></tr>
    <tr><td><?php echo ($isComplete) ? $true : $false; ?></td><td>YHAP Individual Session and Certification Received</td><td></td></tr>
    <tr><td><?php echo ($isComplete) ? $true : $false; ?></td><td>Attended Both Mandatory Classes</td><td></td></tr>
    <tr><td><?php echo ($isComplete) ? $true : $false; ?></td><td>Financial Paperwork Completed (includes family size, credit score, debt-income ratio, monthly income, AMI)</td><td></td></tr>
    <tr><td><?php echo ($isComplete) ? $true : $false; ?></td><td>Final Budget Review</td><td></td></tr>
    <tr><td><?php echo ($isComplete) ? $true : $false; ?></td><td>Dedication of Site</td><td></td></tr>
    <tr><td><?php echo ($isComplete) ? $true : $false; ?></td><td>Settlement Date Established</td><td></td></tr>
    <tr><td><?php echo ($isComplete) ? $true : $false; ?></td><td>Down Payment Received</td><td></td></tr>
</table>
<hr>
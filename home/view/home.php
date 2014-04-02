<?php

	// TITLE: Home Home View
	// FILE: home/view/home.php
	// AUTHOR: AUTOGEN
include 'home/model/home.php';

?>
<style>
    .event {width: 500px;}
    
    .event dt {
	position: relative;
	left: 0;
	top: 1.5em;
	width: 5em;
	font-weight: bold;
	
    }

    .event dd {
	border-left: 1px solid #000;
	margin: 0 0 0 6em;
	padding: 0 0 .5em .5em;
    }
    
    .cItem dd {border: 1px solid #000;}
</style>

<?php 
$userName= isset($_SESSION['userid']) ? $_SESSION['userid'] : 'null';
 $person=getPerson($userName);
 ?>

 
<h3>Welcome <?php echo $person->getTitle() . ' ' . $person->getFirst_name() . ' ' . $person->getLast_name(); ?></h3>
<hr>
<?php if ($isAdmin) { ?>
<h4>Admin</h4>
<dl>
    <dt>Authorization Notices</dt>
	<dd><a href="">Sweat-Equity (13)</a></dd>
	<dd><a href="">Pledge Entry (1)</a></dd>
	<dd><a href="">Donation Entry (5)</a></dd>
	<dd><a href="">Mortgage Payments (3)</a></dd>
	<dd><a href="">HO Statuses (2)</a></dd>
	<dd><a href="">Volunteer Applications (13)</a></dd>
    <dt>System Messages</dt>
	<dd><a href="">Pledges for Solicitation (3)</a></dd>
	<dd><a href="">Delinquent Mortgages (1)</a></dd>
	<dd><a href="">Delinquent HO Process (5)</a></dd>
	<dd><a href="">Security Issues (3)</a></dd>
	<dd><a href="">HO Status Updates (2)</a></dd>
</dl>
<?php } else { ?>
<h4>Calendar</h4>
<dl class="event">
    <dt>23 March</dt>
	<dd>Knitting club meeting</dd>
	<dd>See a wide range of crochets on display... </dd>
	<dd>1pm - 3pm</dd>
	&nbsp;
	<dd class="cItem">Car club meeting</dd>
	<dd>See a wide range of classic cars on display... </dd>
	<dd>7pm - 9pm</dd>
	&nbsp;
    <dt>13 June</dt>
	<dd>Cake sale</dd>
	<dd>Cakes of every type. All proceeds go to the... </dd>
	<dd>12pm - 3pm</dd>
</dl>
<hr>

<?php } ?>
<hr>
<h4>Clearance</h4>
<table class="debug">
	<tr><td>Admin</td><td><?php echo ($isAdmin) ? $false : $true; ?></td></tr>
	<tr><td>Office</td><td><?php echo ($isOffice) ? $true : $false; ?></td></tr>
	<tr><td>Volunteer</td><td><?php echo ($isVolunteer) ? $true : $false; ?></td></tr>	
</table>

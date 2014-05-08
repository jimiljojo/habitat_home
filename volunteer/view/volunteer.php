<?php
    //File: volunteer view
    //Author: Brandon Willis; bmw5285
?>
<style>
	dd.list
		{
		border-collapse:collapse;
		border-bottom-style:dotted;
		border-width: 1px;
		border-color:lightgrey;
		}
	dd.list
		{
		padding:0px;
		padding-left:60px;
		}
	dt.list
		{
		padding:5px;
		padding-left:20px;
		}
</style>

<h2>Volunteer</h2>
<hr>

<dl>
    <dt class="list"><a href="index.php?dir=volunteer&sub=availability">Availability</a></dt>
	<dd class="list">Shows a volunteer's availability</dd>
    <dt class="list"><a href="index.php?dir=volunteer&sub=consent">Consent</a></dt>
	<dd class="list">Shows the consents the volunteer agreed to</dd>
    <dt class="list"><a href="index.php?dir=volunteer&sub=interests">Interests</a></dt>
	<dd class="list">View and edit the volunteer work interests</dd>
    <dt class="list"><a href="index.php?dir=volunteer&sub=schedule">Schedule</a></dt>
	<dd class="list">View and edit the volunteer schedule</dd>
    <dt class="list"><a href="index.php?dir=volunteer&sub=history">Work History</a></dt>
	<dd class="list">View and print a history of the volunteer hours and jobs worked</dd>
</dl>
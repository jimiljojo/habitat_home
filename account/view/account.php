<?php
    //File: admin/view/admin.php
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
	h4
		{

		}
</style>

<h2>Your Account</h2>       
<hr>

<dl>
    <dt class="list"><a href="/index.php?dir=account&sub=info">Personal Information</a></dt>
        <dd class="list">Edit/View your personal info in your Habitat account</dd>
    <dt class="list"><a href="/index.php?dir=account&sub=prefs">Preferences</a></dt>
        <dd class="list">Edit the preferences of your Habitat Account</dd>
    <!--<dt class="list">Status</dt>
    <dd class="list">View the status of your Habitat account. Account may be deactivated here.</dd>-->
</dl>

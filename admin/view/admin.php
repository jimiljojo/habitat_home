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
<h4>Administration</h4> 
<hr>
<dl>
    <dt class="list"><a href="/habitat_home/index.php?dir=admin&sub=auth">Authorizations</a></dt>
	<dd class="list">This is where items are located that an Administrator must authorize. </dd>
    <dt class="list"><a href="/habitat_home/index.php?dir=admin&sub=alerts">System Alerts</a></dt>
	<dd class="list">This is where the administrator will see alerts about pledges, delinquent mortgages, security notices, etc. </dd>
    <dt class="list"><a href="/habitat_home/index.php?dir=admin&sub=reports">Reports</a></dt>
        <dd class="list">This is where the administrator will run reports</dd>
    <!--<dt class="list">Content Management</dt>
            <dd class="list">This is where you can change the content on the Habitat web-site, not the HOME system.</dd>
        <dt class="list">Reports/Messaging</dt>
            <dd class="list">This is where you can run reports on donors and homeowners and send a message to them.</dd>-->
</dl>
<hr>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">

<div class="navbar navbar-inverse">
  <div class="navbar-inner">
    <a class="brand">Habitat for Humanity Login Page:</a>
  </div>
</div>

<div style="padding-left: 10px;">
<?php
	require_once ('../model/dbio_des301.php');
	
	$dbio= new DBIO();

	$act = (isset($_GET['act'])) ? $_GET['act'] : '';
	$msg = (isset($_GET['msg'])) ? $_GET['msg'] : '';
	include 'controller/login.php';

	
?>
</div>
<?php

	//----- TEMPORARY VALUESss
	
	$isAdmin = true;
	$isOffice = true;
	$isDonor = true;
	$isHomeowner = true;
	$isVolunteer = true;

	//----- SESSION

	require_once 'root/config.php'; // CONFIG
	
	
	// REQUIRES/INCLUDES
	require_once ('class/link.php');
	require_once ('class/item.php');
	require_once ('class/interest.php');
	require_once ('model/dbio_des301.php');
	//require_once('model/databaseio.php');
	//require_once('model/urlio.php');
	//require_once('model/sessionio.php');
	
	$dbio = new DBIO();
	
	$dir = isset($_GET['dir']) ? $_GET['dir'] : DEFAULT_DIR;
    $sub = isset($_GET['sub']) ? $_GET['sub'] : false;
    $act = isset($_GET['act']) ? $_GET['act'] : false;
    $msg = isset($_GET['msg']) ? $_GET['msg'] : false;
	
	$page = $dir . '/controller/' . (($sub) ? $sub : $dir) . '.php';
	
	// gateway(); // GATEWAY
	
	include $page; // controller call
	
	$scriptFile = $dir . '/script.php';
	$styleFile = $dir . '/style.php';
	if (file_exists($styleFile)) {include $styleFile;}
	if (file_exists($scriptFile)) {include $scriptFile;}
	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/default.css" >
		<link rel="stylesheet" href="css/nav.css" >
		<link rel="stylesheet" href="css/color.css" >
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"> 
		<?php
			// <link rel="stylesheet" href="css/nav.css" >
			if (isset($styles)) {
				foreach ($styles as $style) {
					echo '<link rel="stylesheet" href="css/' . $style . '.css" >';
				}
			}
		?>
		<style></style>
		<?php
			// <script src="js/FILENAME.js"></script>
			if (isset($scripts)) {
				foreach ($scripts as $script) {
					echo '<script src="js/' . $script . '.js" >';
				}
			}
		?>
		<script></script>
	</head>
	<body>
		<div id="page">
			<header>
				<h1><?php echo APP_TITLE; ?></h1>
				
			</header>
			<div id="body">
				<?php include 'root/nav.php'; ?>
				<?php //if (file_exists($dir . '/menu.php')) {include 'root/subNav.php';} ?>
				<div id="content">
					<?php include $page; // view call ?>
				</div>
			</div>
			<!--<footer></footer>-->
		</div>
	</body>
</html>

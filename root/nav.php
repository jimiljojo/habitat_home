<?php
    /* this files is the Home section index View */
    $true = '<img src="img/check.png" />';
    $false = '<img src="img/cross.png" />';
    // iconsdb.com
	$subMenuFile = $dir . '/menu.php';
	$subNavFile = 'root/subNav.php'
?>
<nav id="mainNav">
	<img style="margin-bottom: 15px;" src="img/habitat_logo2.jpg" alt="Habitat For Humanity Logo" />
	<ul class="nav nav-pills nav-stacked" style="max-width: 300px">
<?php
	$links = array('home', 'logout');
	$thisSection = ($dir == 'home');
	$isactive = ($thisSection) ? 'class="active"' : '';
	echo '<li ' .$isactive . '><a href="index.php?dir=home">Home</a></li>';

	//echo '<li><a href="index.php?dir=home&sub=logout">Logout</a></li>';

	$thisSection = ($dir == 'account');
	$isactive = ($thisSection) ? 'class="active"' : '';
	echo '<li ' .$isactive . '><a href="index.php?dir=account" ' . $isactive . '>Account</a></li>';
	if ($thisSection && file_exists($subMenuFile)) {include $subNavFile;}

//echo '<hr>';
	
    if ($isAdmin) {
	    $thisSection = ($dir == 'admin');
	    $isactive = ($thisSection) ? 'class="active"' : '';
	    echo '<li ' .$isactive . '><a href="index.php?dir=admin"'. $isactive . '>Admin</a></li>';
	    if ($thisSection && file_exists($subMenuFile)) {include $subNavFile;}
	}// end if

    
    if ($isOffice) {
		$thisSection = ($dir == 'office');
		$isactive = ($thisSection) ? 'class="active"' : '';
		echo '<li ' .$isactive . '><a href="index.php?dir=office" ' . $isactive . '>Office</a></li>';
		if ($thisSection && file_exists($subMenuFile)) {include $subNavFile;}
    }// end if


    if ($isVolunteer) {
	    $thisSection = ($dir == 'volunteer');
	    $isactive = ($thisSection) ? 'class="active"' : '';
	    echo '<li ' .$isactive . '><a href="index.php?dir=volunteer" ' . $isactive . '>Volunteer</a></li>';
	    if ($thisSection && file_exists($subMenuFile)) {include $subNavFile;}
	}// end if
	
	echo '<hr>';
	echo '<a href="logout.php">Logout</a>';
?>
		<hr>
		<dl>
			<dt>EST</dt>
			<dd><?php echo date('h:i:s'); ?></dd>
			<dt>Client IP</dt>
			<dd><?php echo $_SERVER["REMOTE_ADDR"]; ?></dd>
			<dt>Server IP</dt>
			<dd><?php echo $_SERVER["SERVER_ADDR"]; ?></dd>
		</dl>
    </ul>
	
    <hr>

</nav>
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
	<ul class="nav">
<?php
	$links = array('home', 'logout');
	$thisSection = ($dir == 'home');
	$selected = ($thisSection) ? 'class="active"' : '';
	echo '<li ' .$selected . '><a href="index.php?dir=home">Home</a></li>';

	//echo '<li><a href="index.php?dir=home&sub=logout">Logout</a></li>';

	$thisSection = ($dir == 'account');
	$selected = ($thisSection) ? 'class="selected"' : '';
	echo '<li ' .$selected . '><a href="index.php?dir=account" ' . $selected . '>Account</a></li>';
	if ($thisSection && file_exists($subMenuFile)) {include $subNavFile;}

//echo '<hr>';
	
    if ($isAdmin) {
	    $thisSection = ($dir == 'admin');
	    $selected = ($thisSection) ? 'class="selected"' : '';
	    echo '<li ' .$selected . '><a href="index.php?dir=admin"'. $selected . '>Admin</a></li>';
	    if ($thisSection && file_exists($subMenuFile)) {include $subNavFile;}
	}// end if

    
    if ($isOffice) {
		$thisSection = ($dir == 'office');
		$selected = ($thisSection) ? 'class="selected"' : '';
		echo '<li ' .$selected . '><a href="index.php?dir=office" ' . $selected . '>Office</a></li>';
		if ($thisSection && file_exists($subMenuFile)) {include $subNavFile;}
    }// end if

    
	if ($isDonor) {
		$thisSection = ($dir == 'donor');
		$selected = ($thisSection) ? 'class="selected"' : '';
		echo '<li ' .$selected . '><a href="index.php?dir=donor" ' . $selected . '>Donor</a></li>';
		if ($thisSection && file_exists($subMenuFile)) {include $subNavFile;}
    }// end if


    if ($isHomeowner) {
		$thisSection = ($dir == 'homeowner');
		$selected = ($thisSection) ? 'class="selected"' : '';
		echo '<li ' .$selected . '><a href="index.php?dir=homeowner" ' . $selected . '>Homeowner</a></li>';
		if ($thisSection && file_exists($subMenuFile)) {include $subNavFile;}
    }// end if


    if ($isVolunteer) {
	    $thisSection = ($dir == 'volunteer');
	    $selected = ($thisSection) ? 'class="selected"' : '';
	    echo '<li ' .$selected . '><a href="index.php?dir=volunteer" ' . $selected . '>Volunteer</a></li>';
	    if ($thisSection && file_exists($subMenuFile)) {include $subNavFile;}
	}// end if
	
	
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
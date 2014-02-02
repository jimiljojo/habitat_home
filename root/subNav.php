<?php
	// FILE: Sub Navigation View
	// AUTHOR:
	include ($dir . '/menu.php');
?>
<nav id="subNav">
	<ul class="navList">
	<?php
		foreach ($subLinks as $subLink) {
			$subTitle = $subLink->getTitle();
			$subHref = $subLink->getHref();
			$url = 'index.php?dir=' . $dir . '&sub=' . $subHref;
			$selected = ($subHref == $sub);
			$selectedString = $selected ? ' class="selected"' : '';
			echo ('<li class="subli"><a' . $selectedString . ' href="' . $url . '">' . $subTitle . '</a></li>');
		}// end foreach
	?>
	</ul>
</nav>
<?php
	// FILE: Main Navigation View
	// AUTHOR:
	include ('root/menu.php');
?>
<nav id="mainNav">
	<ul class="navList">
	<?php
		foreach ($links as $link) {
			$title = $link->getTitle();
			$href = $link->getHref();
			$url = 'index.php?dir=' . $href;
			$selected = ($href == $dir);
			$selectedString = $selected ? ' class="selected"' : '';
			echo ('<li class="subli"><a' . $selectedString . ' href="' . $url . '">' . $title . '</a></li>');
		}// end foreach
	?>
	</ul>
</nav>
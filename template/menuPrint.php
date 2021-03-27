<ul class="navbar-nav me-auto mb-2 mb-md-0 justify-content-center float-md-end">            
	<?php
	foreach ($menu as $value) {
	?>
		<a class="nav-link <?php if($_SERVER['REQUEST_URI'] == $value['path']) echo('active'); ?>" href="<?= $value['path']?>"><?= $value['title'] ?></a>
	<?php
	}
	?>
</ul>
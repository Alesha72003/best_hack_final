<?php

namespace gc;

function getTitleByDir($menu, $dir)
{
	foreach ($menu as $value) {
		if($value['path'] == $dir) {
			return $value['title'];
		}
	}
	return NULL;
}

?>
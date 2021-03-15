<?php

/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$id = '';

if ($tagId = $params->get('tag_id', '')) {
	$id = ' id="' . $tagId . '"';
}

// The menu class is deprecated. Use nav instead
?>


<nav class="menu<?php echo $class_sfx; ?> mod-list" <?php echo $id; ?>>

	<?php
	$mode = '';
	foreach ($list as $i => &$item) {

		//var_dump($item);
		//	echo "<a class='nav-link' href='$item->link'>{$item->title}</a>";

		$d=$item->deeper?'dropdown':'';
		$class=$mode!='dropdown'?'nav-item':'';
		echo "<li class='$class $d'>";
		switch ($item->type):
			case 'separator':
			case 'component':
			case 'heading':
			case 'url':
				require JModuleHelper::getLayoutPath('mod_menu', 'default_' . $item->type);
				break;

			default:
				require JModuleHelper::getLayoutPath('mod_menu', 'default_url');
				break;
		endswitch;
		// The next item is deeper.
		if ($item->deeper) {
			$mode = 'dropdown';
			echo '<ul class="dropdown-menu" aria-labelledby="navbarDropdown">';
		}
		// The next item is shallower.
		elseif ($item->shallower) {
			echo '</li>';
			$mode = '';
			echo str_repeat('</ul></li>', $item->level_diff);
		}
		// The next item is on the same level.
		else {
			echo '</li>';
		}
	}
	?></nav>

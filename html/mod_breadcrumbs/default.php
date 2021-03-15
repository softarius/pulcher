<?php

/**
 * @package     Joomla.Site
 * @subpackage  mod_breadcrumbs
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>

<div aria-label="<?php echo htmlspecialchars($module->title, ENT_QUOTES, 'UTF-8'); ?>" role="navigation">
	<nav aria-label="breadcrumb">
		<ul itemscope itemtype="https://schema.org/BreadcrumbList" class="breadcrumb<?php echo $moduleclass_sfx; ?>">
			<?php if ($params->get('showHere', 1)) : ?>
				<li>
					<?php echo JText::_('MOD_BREADCRUMBS_HERE'); ?>&#160;
				</li>

			<?php endif; ?>

			<?php
			// Get rid of duplicated entries on trail including home page when using multilanguage
			for ($i = 0; $i < $count; $i++) {
				if ($i === 1 && !empty($list[$i]->link) && !empty($list[$i - 1]->link) && $list[$i]->link === $list[$i - 1]->link) {
					unset($list[$i]);
				}
			}
			//var_dump($list);

			// Find last and penultimate items in breadcrumbs list
			end($list); 
			$last_item_key   = key($list);
			echo $last_item_key;

			// Make a link if not the last item in the breadcrumbs
			if (!$params->get('showLast', 1)) array_pop($list);

			// Generate the trail
			foreach ($list as $key => $item) :
			?>
			    
				<li class='breadcrumb-item<?php echo key($item)==$last_item_key?' active':''; ?>'>
					<?php echo !empty($item->link) ? JHTML::link($item->link, $item->name) : $item->name;  ?>
				</li>
			<?php
			endforeach; ?>
		</ul>
	</nav>
</div>

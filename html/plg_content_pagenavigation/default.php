<?php

/**
 * @package     Joomla.Plugin
 * @subpackage  Content.pagenavigation
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$lang = JFactory::getLanguage();

?>

<nav aria-label="Page navigation">
	<ul class="pagination pagination-sm justify-content-center">
		<?php if ($row->prev) :
			$direction = $lang->isRtl() ? 'right' : 'left'; ?>
			<li class="page-item">
				<a class="page-link bi bi-arrow-<?php echo $direction?>" title="<?php echo htmlspecialchars($rows[$location - 1]->title); ?>" aria-label="<?php echo JText::sprintf('JPREVIOUS_TITLE', htmlspecialchars($rows[$location - 1]->title)); ?>" href="<?php echo $row->prev; ?>" rel="prev">
				</a>
			</li>
		<?php endif; ?>
		<?php if ($row->next) :
			$direction = $lang->isRtl() ? 'left' : 'right'; ?>
			<li class="page-item">
				<a class="page-link bi bi-arrow-<?php echo $direction?>" title="<?php echo htmlspecialchars($rows[$location + 1]->title); ?>" aria-label="<?php echo JText::sprintf('JNEXT_TITLE', htmlspecialchars($rows[$location + 1]->title)); ?>" href="<?php echo $row->next; ?>" rel="next">
				</a>
			</li>
		<?php endif; ?>
	</ul>
</nav>

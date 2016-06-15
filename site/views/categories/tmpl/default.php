<?php
/*------------------------------------------------------------------------
# com_jomoeasyrestaurantmenu - JOMO Easy Restaurant Menu Extension for Joomla 2.5
# -----------------------------------------------------------------------
# author: http://www.jomotheme.com
# copyright Copyright (C) 2013 jomotheme.com. All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Website: http://www.jomotheme.com
# Technical Support: Visit Forum on http://www.jomotheme.com
*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
?>
<h1><?php echo $this->header; ?></h1>
<ul>
    <?php foreach ($this->items as $item) : ?>
        <?php $url = "index.php?option=com_jomoeasyrestaurantmenu&view=categories&category_id=" . $item->id; ?>
    <li><?php echo ($this->escape($item->name)); ?> <a href='<? echo JRoute::_($url); ?>'>show</a></li>
    <?php endforeach; ?>
</ul>

<h1><?php echo ($this->escape($this->dishes[0]->catname)); ?></h1>
<ul>
    <?php foreach ($this->dishes as $d) : ?>
        <li><?php echo ($this->escape($d->name)); ?></li>
    <?php endforeach; ?>
</ul>

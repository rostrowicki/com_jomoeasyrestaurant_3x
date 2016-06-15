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
<h1><?php echo $this->escape($this->header); ?></h1>


<h2><?php echo $this->escape($this->item->name); ?></h2>
<p><?php echo $this->escape($this->item->description); ?></p>

<h2>Dishes in this category:</h2>

<ul>
    <?php foreach ($this->dishes as $dish): ?>
    <li><?php echo ($this->escape($dish->name)); ?></li>
<?php endforeach; ?>
</ul>
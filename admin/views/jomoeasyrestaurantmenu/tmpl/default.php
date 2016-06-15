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

defined('_JEXEC') or die;
?>



<div class="fltlft width-60 span8">
    <fieldset>
        <h2><?php echo JText::_('COM_JOMOEASYRESTAURANTMENU_FAQ_TITLE'); ?></h2>

        <p><strong>What means Menu, Category and Dish items?</strong><br/>There is a simple dependency. Menu (i.e. Dinners) containst Categories (i.e. Soups, Desserts) which contains Dishes (i.e. Lentile Soup, Salmon Steak, Vanilla Ice Cream).</p>

        <p><strong>Where change currency symbol?</strong><br/>Click Options in this view andconfigure currency symbol for prices (max. 4 characters) and fontset.</p>

        <p><strong>What is fontset?</strong><br/>Ten sets of fonts are predefined to change style of the menu headers and paragraphs. Click Options in this view to change fontset or keep your template fonts for Menu display.</p>

        <p><strong>How to configure one or two columns.</strong><br/>For every category you can configure the way it will be displayed in one or two columns. When you mix it for different categories in menu you can reach nice view.</p>

        <p><strong>How to turn on/off print link for front page display?</strong><br/>When you add new joomla menu link item to the frontpage, you can define it in Other Settings tab.</p>

    </fieldset>
</div>
<div class="fltrt width-40 span4">
    <fieldset>
        <div class="help">            
            <h2><?php echo JText::_('COM_JOMOEASYRESTAURANTMENU_ADD_EDIT'); ?></h2>
            <ul>
                <li><a href="index.php?option=com_jomoeasyrestaurantmenu&view=menus">Menus</a></li>
                <li><a href="index.php?option=com_jomoeasyrestaurantmenu&view=categories">Categories</a></li>
                <li><a href="index.php?option=com_jomoeasyrestaurantmenu&view=dishes">Dishes</a></li>          
            </ul>
<h2><?php echo JText::_('COM_JOMOEASYRESTAURANTMENU_MANAGER'); ?></h2>
            <p>If you need further help please visit our website with dedicated Forum. You can find help and give us feedback. Tell us how to improve this extensions to fits your needs.</p>
        </div>        
    </fieldset>
</div>

<div class="clr clearfix"></div>
<div class="copyright row-fluid center">
    <?php echo JText::sprintf('COM_JOMOEASYRESTAURANTMENU_DEV_BY', 'http://jomotheme.com'); ?>
</div>

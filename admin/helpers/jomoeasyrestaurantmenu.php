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

class JomoEasyRestaurantMenuHelper {

    /**
     * Configure the Linkbar.
     *
     * @param	string	The name of the active view.
     *
     * @return	void
     * @since	1.6
     */
    public static function addSubmenu($vName) {
		JSubMenuHelper::addEntry(
			JText::_('COM_JOMOEASYRESTAURANTMENU_ABOUT'),
			'index.php?option=com_jomoeasyrestaurantmenu',
			$vName == 'jomoeasyrestaurantmenu'
		);

        JSubMenuHelper::addEntry(
                JText::_('COM_JOMOEASYRESTAURANTMENU_MENUS'), 'index.php?option=com_jomoeasyrestaurantmenu&view=menus', $vName == 'menus'
        );

        JSubMenuHelper::addEntry(
                JText::_('COM_JOMOEASYRESTAURANTMENU_CATEGORIES'), 'index.php?option=com_jomoeasyrestaurantmenu&view=categories', $vName == 'categories'
        );

        JSubMenuHelper::addEntry(
                JText::_('COM_JOMOEASYRESTAURANTMENU_DISHES'), 'index.php?option=com_jomoeasyrestaurantmenu&view=dishes', $vName == 'dishes'
        );
    }

    public static function getStateOptions() {
        // Build the active state filter options.
        $options = array();
        $options[] = JHtml::_('select.option', '*', 'JALL');
        $options[] = JHtml::_('select.option', '1', 'JPUBLISHED');
        $options[] = JHtml::_('select.option', '0', 'JUNPUBLISHED');


        return $options;
    }

    public static function getCategoryOptions() {
        // Build the active state filter options.
        $options = array();
        $options[] = JHtml::_('select.option', '*', 'JALL');
        $options[] = JHtml::_('select.option', '1', 'JPUBLISHED');
        $options[] = JHtml::_('select.option', '0', 'JUNPUBLISHED');


        return $options;        
    }

}
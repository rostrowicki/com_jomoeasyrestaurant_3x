<?php
/*------------------------------------------------------------------------
# com_jomoeasyrestaurantmenu - JOMO Easy Restaurant Menu Extension for Joomla 3.x
# -----------------------------------------------------------------------
# author: http://www.jomotheme.com
# copyright Copyright (C) 2013 jomotheme.com. All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Website: http://www.jomotheme.com
# Technical Support: Visit Forum on http://www.jomotheme.com
*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');

/**
 * HTML View class for the HelloWorld Component
 */
class JomoEasyRestaurantMenuViewMenu extends JViewLegacy {

    protected $item;
    protected $params;

    // Overwriting JView display method
    function display($tpl = null) {
        $this->params = JFactory::getApplication()->getParams();
        $this->item = $this->get('Item');
        $this->dishes = $this->get('Dishes');
        
        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            JLog::add(implode('<br />', $errors), JLog::WARNING, 'jerror');
            return false;
        }
        // Display notification if menu is unpublished        
        if ($this->item->published == 0)
        {
            JError::raiseNotice('JOMOERM_MENU_UNPUB', JText::_('COM_JOMOEASYRESTAURANTMENU_MENU_UNPUBLISHED_NOTIFICATION'));
            return false;
        }            

        parent::display($tpl);
    }

}
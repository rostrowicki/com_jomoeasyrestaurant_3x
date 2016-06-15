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

defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.controller');

class JomoeasyrestaurantmenuController extends JControllerLegacy {

    public function display($cachable = false, $urlparams = false) {
        require_once JPATH_COMPONENT . '/helpers/jomoeasyrestaurantmenu.php';

        // Load the submenu.        
        if (JRequest::getCmd('layout') != 'edit')
            JomoEasyRestaurantMenuHelper::addSubmenu(JRequest::getCmd('view', ''));

        parent::display();

        return $this;
    }

}
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
 
// import Joomla controlleradmin library
jimport('joomla.application.component.controlleradmin');
 
/**
 * Items Controller
 */
class JomoeasyrestaurantmenuControllerMenus extends JControllerAdmin
{
    protected $text_prefix = 'COM_JOMOEASYRESTAURANTMENU_MENUS';
        /**
         * Proxy for getModel.
         * @since       2.5
         */
        public function getModel($name = 'Menu', $prefix = 'JomoeasyrestaurantmenuModel') 
        {
                $model = parent::getModel($name, $prefix, array('ignore_request' => true));
                return $model;
        }
}
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

//admin
defined('_JEXEC') or die;

// Include dependancies
jimport('joomla.application.component.controller');


$controller	= JControllerLegacy::getInstance('jomoeasyrestaurantmenu');
$controller->execute(JRequest::getCmd('task'));
$controller->redirect();

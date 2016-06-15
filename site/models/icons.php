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
 
// import Joomla modelitem library
jimport('joomla.application.component.modellist');
 
/**
 * JomoEasyRestaurantMenu Model
 */

class JomoEasyRestaurantMenuModelIcons extends JModelList
{
     public Function getListQuery() {
     $query = parent::getListQuery();
     
     $query->select('name');
     $query->from('#__jomoeasyrestaurantmenu_icons');
     $query->where('published = 1');
     
     return $query;
 }   

}
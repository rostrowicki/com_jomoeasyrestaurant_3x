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

// import Joomla modelitem library
jimport('joomla.application.component.model');

class JomoEasyRestaurantMenuModelCategory extends JModelLegacy {
    
    public function getItem() {
        $category_id = JRequest::getInt('category_id');
        
        $row = JTable::getInstance('Category', 'JomoEasyRestaurantMenuTable');
        $row->load($category_id);

        return $row;
    }
        
    public function getDishes() {
        
        $category_id = JRequest::getInt('category_id');
        
        $db = $this->getDbo();
        $query = $db->getQuery(true);
        
        $query->select('*');
        $query->from('#__jomoeasyrestaurantmenu_dishes');
        $query->where("category_id = '{$category_id}'");
        
        $db->setQuery($query);
        
        $rows = $db->loadObjectList();        
        
        return $rows;
    }
}
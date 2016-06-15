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
class JomoEasyRestaurantMenuModelIcons extends JModelList {

    public function getItems() {
         $items = parent::getItems();
         
         foreach ($items as &$item) {
             $item->url = 'index.php?option=com_jomoeasyrestaurantmenu&amp;task=icon.edit&amp;id=' . $item->id;
         }
         
         return $items;
    }
    
    public function getListQuery() {
        $query = parent::getListQuery();
        
        $query->select('*');
        $query->from('#__jomoeasyrestaurantmenu_icons');
        
        return $query;
    }
    
    public function diehard() {
        echo "<pre style='color:red';>";
        echo date('Y-m-d H:i:s');
        print_r($rows);
        echo "</pre>";
        die('terminated by Robert');
    }

}
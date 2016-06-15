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
class JomoEasyRestaurantMenuModelCategories extends JModelList {

    public Function getListQuery() {
        $query = parent::getListQuery();

        $query->select('*');
        $query->from('#__jomoeasyrestaurantmenu_categories');
        $query->where('published = 1');

        return $query;
    }

    public function getDishes() {
        $category_id = JRequest::getInt('category_id');

        if ($category_id) {
            $db = $this->getDbo();
            $query = $db->getQuery(true);
            $query->select('d.id, d.name, c.name AS catname');
            $query->from('#__jomoeasyrestaurantmenu_dishes AS d');
            $query->where("category_id = '{$category_id}'");
            $query->leftJoin('#__jomoeasyrestaurantmenu_categories AS c ON c.id = d.category_id');
            
            $db->setQuery($query);
            $rows = $db->loadObjectList();
        }
        return $rows;
    }



}
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
class JomoEasyRestaurantMenuModelMenus extends JModelList {

    public function getListQuery() {
        $query = parent::getListQuery();

        $query->select('id, name');
        $query->from('#__jomoeasyrestaurantmenu_menus');
        $query->where('published = 1');

        return $query;
    }

    public function getCategories() {
        $menu_id = JRequest::getInt('menu_id');
        if ($menu_id) {
            $db = $this->getDbo();
            $query = $db->getQuery(true);
            $query->select('c.id AS catid, c.menu_id, c.name, m.id, m.name AS menuname');
            $query->from('#__jomoeasyrestaurantmenu_categories AS c');
            $query->where("menu_id = '{$menu_id}'");
            $query->leftJoin('#__jomoeasyrestaurantmenu_menus AS m ON c.menu_id = m.id');
            $query->where('c.published = 1');

            $db->setQuery($query);
            $rows = $db->loadObjectList();
        }
        return $rows;
    }

}
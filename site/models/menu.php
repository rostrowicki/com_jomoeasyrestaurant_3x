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

class JomoEasyRestaurantMenuModelMenu extends JModelLegacy {

    public function getItem() {

        $app = JFactory::getApplication();
        $menu = $app->getMenu();
        $active = $menu->getActive();
        $params = new JRegistry();

        if ($active) {
            $params->loadString($active->params);
        }
        $param = $params->get('request');

        $menu_id = $param->id;

        $row = JTable::getInstance('Menu', 'JomoEasyRestaurantMenuTable');
        $row->load($menu_id);

        return $row;
    }

    //TODO błąd konstrukcyjny - gdzie to przenieść>???


    private function getCategories() {


        // get param from active menu parameters
        $app = JFactory::getApplication();
        $menu = $app->getMenu();
        $active = $menu->getActive();
        $params = new JRegistry();

        if ($active) {
            $params->loadString($active->params);
        }
        $param = $params->get('request');

        $menu_id = $param->id;



        $db = $this->getDbo();
        $query = $db->getQuery(true);

        $query->select('*');
        $query->from('#__jomoeasyrestaurantmenu_categories');
        $query->where("menu_id = '{$menu_id}'");
        $query->where('published = 1');
        $query->order('ordering asc');
        $db->setQuery($query);

        $rows = $db->loadObjectList();

        return $rows;
    }

    /*
     * Return dishes split to categories array
     */

    public function getDishes() {

        $categories = $this->getCategories();

        $dishes = array();

        foreach ($categories as $category) {

            $db = $this->getDbo();
            $query = $db->getQuery(true);

            //SELECT t1.id as dish_id, t1.name as dish_name, t2.id as cat_id, t2.name as cat_name 
            //FROM llhcx_jomoeasyrestaurantmenu_dishes AS t1 
            //JOIN llhcx_jomoeasyrestaurantmenu_categories AS t2 
            //WHERE t1.category_id=6 AND t1.category_id = t2.id;
            // t1 - dishes, t2 - categories

            $select_statement = 't1.id as dish_id, t1.name as dish_name, t1.description as dish_desc, t1.show_price, t1.price, '
                    . 't1. dish_img, t1. dish_icon, '
                    . 't2.id as cat_id, t2.name as cat_name, t2.description as cat_desc, t2.layout, '
                    . 't2.show_desc as cat_showdesc, t2.show_title as cat_showtitle';

            $query->select($select_statement);
            $query->from('#__jomoeasyrestaurantmenu_dishes AS t1');
            $query->join('inner', '#__jomoeasyrestaurantmenu_categories AS t2');
            $query->where("t1.category_id = '{$category->id}' AND t1.category_id = t2.id");
            $query->where('t1.published = 1');
            $query->order('t1.ordering asc');
            $db->setQuery($query);

            $rows = $db->loadObjectList();

            $dishes[] = $rows;
        }

        return $dishes;
    }

}
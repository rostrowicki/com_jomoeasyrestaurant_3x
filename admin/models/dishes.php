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
class JomoEasyRestaurantMenuModelDishes extends JModelList {

    public function __construct($config = array()) {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = array(
                'id', 't1.id',
                'name', 't1.name',
                'published', 't1.published',
                'ordering', 't1.ordering',
                'menu_name', 'cat_name'
            );
        }

        parent::__construct($config);
    }

    public function getItems() {
        $items = parent::getItems();

        foreach ($items as &$item) {
            $item->url = 'index.php?option=com_jomoeasyrestaurantmenu&amp;task=dish.edit&amp;id=' . $item->id;
        }

        return $items;
    }

    public function getListQuery() {
        $db = $this->getDbo();
        $query = parent::getListQuery();

        $query->select('t1.*, t2.name AS cat_name, t3.name AS menu_name');
        $query->from('#__jomoeasyrestaurantmenu_dishes AS t1');
        $query->join('LEFT', '#__jomoeasyrestaurantmenu_categories AS t2 ON t1.category_id = t2.id');
        $query->join('LEFT', '#__jomoeasyrestaurantmenu_menus AS t3 ON t2.menu_id = t3.id');

        // Filter by published state
        $published = $this->getState('filter.published');
        if (is_numeric($published)) {
            $query->where('t1.published = ' . (int) $published);
        } elseif ($published === '') {
            $query->where('(t1.published IN (0, 1))');
        }

        // Filter by search in title
        $search = $this->getState('filter.search');
        if (!empty($search)) {
            if (stripos($search, 'id:') === 0) {
                $query->where('t1.id = ' . (int) substr($search, 3));
            } else {
                $search = $db->Quote('%' . $db->escape($search, true) . '%');
                $query->where('(t1.name LIKE ' . $search . ' OR t1.alias LIKE ' . $search . ')');
            }
        }

        // Filter by category id
        $catId = $this->getState('filter.cat_id');
        if (is_numeric($catId)) {
            $query->where('t1.category_id = ' . (int) $catId);
        }


        // Add the list ordering clause.
        $orderCol = $this->state->get('list.ordering');
        $orderDirn = $this->state->get('list.direction');
        if ($orderCol == 't1.ordering' || $orderCol == 't2.name') {
            $orderCol = 't2.name ' . $orderDirn . ', t1.ordering';
        }
        if ($orderCol != '')
            $query->order($db->escape($orderCol . ' ' . $orderDirn));

        return $query;
    }

    protected function populateState($ordering = null, $direction = null) {

        $cat_id = $this->getUserStateFromRequest($this->context . '.filter.cat_id', 'filter_cat_id', '');
        $this->setState('filter.cat_id', $cat_id);

        // Load the filter state.
        $search = $this->getUserStateFromRequest($this->context . '.filter.search', 'filter_search');
        $this->setState('filter.search', $search);

        $published = $this->getUserStateFromRequest($this->context . '.filter.published', 'filter_published', '', 'string');
        $this->setState('filter.published', $published);

        // List state information.
        parent::populateState($ordering, $direction);
    }

}
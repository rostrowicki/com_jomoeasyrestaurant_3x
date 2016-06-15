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

    public function __construct($config = array()) {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = array(
                'id',
                'name',
                'name2',
                'published',
                'ordering'
            );
        }

        parent::__construct($config);
    }

    public function getItems() {
        $items = parent::getItems();

        foreach ($items as &$item) {
            $item->url = 'index.php?option=com_jomoeasyrestaurantmenu&amp;task=menu.edit&amp;id=' . $item->id;
        }

        return $items;
    }

    public function getListQuery() {
        $db = $this->getDbo();
        $query = parent::getListQuery();

        $query->select('*');
        $query->from('#__jomoeasyrestaurantmenu_menus');

        // Filter by published state
        $published = $this->getState('filter.published');
        if (is_numeric($published)) {
            $query->where('published = ' . (int) $published);
        } elseif ($published === '') {
            $query->where('(published IN (0, 1))');
        }

        // Filter by search in title
        $search = $this->getState('filter.search');
        if (!empty($search)) {
            if (stripos($search, 'id:') === 0) {
                $query->where('id = ' . (int) substr($search, 3));
            } else {
                $search = $db->Quote('%' . $db->escape($search, true) . '%');
                $query->where('(name LIKE ' . $search . ' OR alias LIKE ' . $search . ')');
            }
        }
        
        // Add the list ordering clause.
        $orderCol = $this->state->get('list.ordering');
        $orderDirn = $this->state->get('list.direction');
//        if ($orderCol == 't1.ordering' || $orderCol == 't2.name') {
//            $orderCol = 't2.name ' . $orderDirn . ', t1.ordering';
//        }
        if ($orderCol != '')
            $query->order($db->escape($orderCol . ' ' . $orderDirn));

        return $query;
    }

    protected function populateState($ordering = null, $direction = null) {

        // Load the filter state.
        $search = $this->getUserStateFromRequest($this->context . '.filter.search', 'filter_search');
        $this->setState('filter.search', $search);

        $published = $this->getUserStateFromRequest($this->context . '.filter.published', 'filter_published', '', 'string');
        $this->setState('filter.published', $published);

        // List state information.
        parent::populateState($ordering, $direction);
    }

}
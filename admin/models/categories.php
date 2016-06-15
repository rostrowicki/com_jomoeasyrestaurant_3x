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
    
    	public function __construct($config = array())
	{
		if (empty($config['filter_fields'])) {
			$config['filter_fields'] = array(
				'id', 't1.id',
				'name', 't1.name',
                            'menu_name',
				'menu_id', 't1.menu_id',
                            'published', 't1.published',
                            'ordering', 't1.ordering'
			);
		}

		parent::__construct($config);
	}
        

    public function getItems() {
        $items = parent::getItems();

        foreach ($items as &$item) {
            $item->url = 'index.php?option=com_jomoeasyrestaurantmenu&amp;task=category.edit&amp;id=' . $item->id;
        }

        return $items;
    }

    public function getListQuery() {
        $db = $this->getDbo();
        $query = parent::getListQuery();

        $query->select('t1.*, t2.name AS menu_name');
        $query->from('#__jomoeasyrestaurantmenu_categories AS t1');
        $query->join('inner', '#__jomoeasyrestaurantmenu_menus AS t2');
        $query->where('t1.menu_id = t2.id');

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

        // Filter by menu id
        $menuId = $this->getState('filter.menu_id');
        if (is_numeric($menuId)) {
            $query->where('t1.menu_id = ' . (int) $menuId);
        }

        // Add the list ordering clause.
		$orderCol	= $this->state->get('list.ordering');                
		$orderDirn	= $this->state->get('list.direction');
		if ($orderCol == 't1.ordering' || $orderCol == 'menu_name') {
			$orderCol = 't2.name '.$orderDirn.', t1.ordering';
		}
                if ($orderCol != '')
		$query->order($db->escape($orderCol.' '.$orderDirn));
                
                
                
        return $query;
    }

    protected function populateState($ordering = null, $direction = null) {

        $menu_id = $this->getUserStateFromRequest($this->context . '.filter.menu_id', 'filter_menu_id', '');
        $this->setState('filter.menu_id', $menu_id);

        // Load the filter state.
        $search = $this->getUserStateFromRequest($this->context . '.filter.search', 'filter_search');
        $this->setState('filter.search', $search);

        $published = $this->getUserStateFromRequest($this->context . '.filter.published', 'filter_published', '', 'string');
        $this->setState('filter.published', $published);

        // Load the parameters.
        $params = JComponentHelper::getParams('com_jomoeasyrestaurantmenu');
        $this->setState('params', $params);

        // List state information.
        parent::populateState('t1.name', 'asc');
    }

}
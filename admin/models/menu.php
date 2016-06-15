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
jimport('joomla.application.component.modeladmin');

class JomoeasyrestaurantmenuModelMenu extends JModelAdmin {

    public function getTable($type = 'Menu', $prefix = 'JomoEasyRestaurantMenuTable', $config = array()) {
        return JTable::getInstance($type, $prefix, $config);
    }

    public function getForm($data = array(), $loadData = true) {

        $form = $this->loadForm('com_jomoeasyrestaurantmenu.menu', 'menu', array('control' => 'jform', 'load_data' => $loadData));

        return $form;
    }

    public function loadFormData() {
        $data = JFactory::getApplication()->getUserStateFromRequest('com_jomoeasyrestaurantmenu.edit.menu.data', array());
        
        if (empty($data)) {
            $data = $this->getItem();
        }
        
        return $data;
    }
     

}
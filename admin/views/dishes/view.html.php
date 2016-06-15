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

defined('_JEXEC') or die;

/**
 * View class for a list of items.
 *
 * @package     Joomla.Administrator
 * @subpackage  com_banners
 * @since       1.6
 */


jimport('joomla.application.component.view');

class JomoeasyrestaurantmenuViewDishes extends JViewLegacy {
    
    protected $items;
    protected $pagination;
    protected $state;

    /**
     * Method to display the view.
     *
     * @param   string  $tpl  A template file to load. [optional]
     *
     * @return  mixed  A string if successful, otherwise a JError object.
     *
     * @since   1.6
     */
    public function display($tpl = null) {
        $this->items = $this->get('Items');
        $this->pagination = $this->get('Pagination');
        $this->state = $this->get('State');
        
        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            JError::raiseError(500, implode('<br />', $errors));
            return false;
        }
        

        $this->addToolbar();


        parent::display($tpl);
    }

    /**
     * Add the page title and toolbar.
     *
     * @return  void
     *
     * @since   1.6
     */
    protected function addToolbar() {
        //icon
        $document = JFactory::getDocument();
        $document->addStyleSheet('../media/com_jomoeasyrestaurantmenu/css/admin.stylesheet.css');
        
        JToolBarHelper::title(JText::_('COM_JOMOEASYRESTAURANTMENU_DISHES'), 'jomo');
        
        JToolBarHelper::addNew('dish.add');          
        JToolBarHelper::editList('dish.edit');
        JToolBarHelper::divider();
        JToolBarHelper::deleteList('', 'dishes.delete');
    }

}
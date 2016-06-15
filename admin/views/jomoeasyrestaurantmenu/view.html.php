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

defined('_JEXEC') or die;

jimport('joomla.application.component.view');

/**
 * View class for a list of items.
 *
 * @package     Joomla.Administrator
 * @subpackage  com_banners
 * @since       1.6
 */
class JomoeasyrestaurantmenuViewJomoeasyrestaurantmenu extends JViewLegacy {

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
        // get the Data
//        $form = $this->get('Form');
//        $item = $this->get('Item');

        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            JError::raiseError(500, implode('<br />', $errors));
            return false;
        }
//        // Assign the Data
//        $this->form = $form;
//        $this->item = $item;

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
        
        JToolBarHelper::title(JText::_('COM_JOMOEASYRESTAURANTMENU_MANAGER'), 'jomo');      
        JToolBarHelper::divider();
        JToolBarHelper::preferences('com_jomoeasyrestaurantmenu');
    }

}
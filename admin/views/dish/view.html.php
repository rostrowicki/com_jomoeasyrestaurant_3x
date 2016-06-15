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

class JomoeasyrestaurantmenuViewDish extends JViewLegacy {

    protected $item;
    protected $form;

    public function display($tpl = null) {

        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            JError::raiseError(500, implode('<br />', $errors));
            return false;
        }

        $this->item = $this->get('Item');
        $this->form = $this->get('Form');
        


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
        
        if ($this->item->id) {
            JToolBarHelper::title(JText::_('COM_JOMOEASYRESTAURANTMENU_EDIT_DISH'), 'jomo');
        } else {
            JToolBarHelper::title(JText::_('COM_JOMOEASYRESTAURANTMENU_NEW_DISH'), 'jomo');
        }
        JToolBarHelper::apply('dish.apply', 'JTOOLBAR_APPLY');
        JToolBarHelper::save('dish.save', 'JTOOLBAR_SAVE');
        JToolBarHelper::save2new('dish.save2new', 'JTOOLBAR_SAVE_AND_NEW');

        JToolBarHelper::cancel('dish.cancel');
    }

}
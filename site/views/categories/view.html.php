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
 
// import Joomla view library
jimport('joomla.application.component.view');
 
/**
 * HTML View class for the HelloWorld Component
 */
class JomoEasyRestaurantMenuViewCategories extends JViewLegacy
{
    
    protected $items;
    protected $dishes;
    protected $categoryName;
    
        // Overwriting JView display method
        function display($tpl = null) 
        {
                $this->header = 'Categories';
                // Assign data to the view
                $this->items = $this->get('Items');
                $this->dishes = $this->get('Dishes');
                
                // Check for errors.
                if (count($errors = $this->get('Errors'))) 
                {
                        JLog::add(implode('<br />', $errors), JLog::WARNING, 'jerror');
                        return false;
                }
                
                // Display the view
                parent::display($tpl);
        }
}
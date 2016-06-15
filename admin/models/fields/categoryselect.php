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
 
defined('JPATH_BASE') or die;
 
jimport('joomla.html.html');
jimport('joomla.form.formfield');
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');
 
/**
 * Custom Field class.
 *
 */
class JFormFieldCategorySelect extends JFormFieldList
{
        /**
         * The form field type.
         *
         * @var         string
         * @since       1.6
         */
        protected $type = 'CategorySelect';
 
        /**
         * Method to get the field options.
         *
         * @return      array   The field option objects.
         * @since       1.6
         */
        public function getOptions()
        {
                // Initialize variables.
                $options = array();
 
                $db     = JFactory::getDbo();
                $query  = $db->getQuery(true);
 
                $query->select('a.id As value, CONCAT(IFNULL(b.name, "NULL") , " > " ,IFNULL(a.name,"NULL")) As text');
                $query->from('#__jomoeasyrestaurantmenu_categories AS a');
                $query->join('left', '#__jomoeasyrestaurantmenu_menus AS b ON a.menu_id = b.id');
                $query->order('b.name, a.name');
                $query->where('a.published = 1');
 
//                die($query);
                
                // Get the options.
                $db->setQuery($query);
 
                $options = $db->loadObjectList();
 
                // Check for a database error.
                if ($db->getErrorNum()) {
                        JError::raiseWarning(500, $db->getErrorMsg());
                }
 
                return $options;
        }
}
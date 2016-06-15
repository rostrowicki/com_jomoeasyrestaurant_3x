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

defined( '_JEXEC' ) or die;

class JomoEasyRestaurantMenuTableActivity extends JTable
{
	public function __construct(&$db)
	{
		parent::__construct('#__explore_activities', 'activity_id', $db);
	}

	public function check()
	{
		if (trim($this->activity_alias) == '') {
			$this->activity_alias = $this->activity_name;
		}

		$this->activity_alias = JApplication::stringURLSafe($this->activity_alias);

		// log save
		jimport('joomla.error.log');

		$log = JLog::getInstance('activity_saves.php');

		$entry = array(
			'comment' => 'Activity ' . $this->activity_id . ' modified by ' . JFactory::getUser()->name
		);

		$log->addEntry($entry);

		return true;
	}
}

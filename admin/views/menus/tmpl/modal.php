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


// no direct access
defined('_JEXEC') or die;

if (JFactory::getApplication()->isSite()) {
    JSession::checkToken('get') or die(JText::_('JINVALID_TOKEN'));
}

//require_once JPATH_ROOT . '/components/com_content/helpers/route.php';

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::_('behavior.tooltip');

$function = JRequest::getCmd('function', 'jSelectMenu');
?>
<form action="<?php echo JRoute::_('index.php?option=com_jomoeasyrestaurantmenu&view=menuss&layout=modal&tmpl=component&function=' . $function . '&' . JSession::getFormToken() . '=1'); ?>" method="post" name="adminForm" id="adminForm">


    <table class="adminlist">
        <thead>
            <tr>
                <th class="title">
                    <?php
//                    echo JHtml::_('grid.sort', 'COM_JOMOEASYRESTAURANTMENU_MENU', 'a.title', $listDirn, $listOrder);
                    echo JText::_('COM_JOMOEASYRESTAURANTMENU_MENU');
                    ?>
                </th>
                <th width="80%">
                    <?
//                    php echo JHtml::_('grid.sort', 'JGLOBAL_DESCRIPTION', 'a.description', $listDirn, $listOrder); 
                    echo JText::_('JGLOBAL_DESCRIPTION');
                    ?>
                </th>
                <th width="1%" class="nowrap">
                    <?php
                    // echo JHtml::_('grid.sort', 'JGRID_HEADING_ID', 'a.id', $listDirn, $listOrder); 
                    echo JText::_('JGRID_HEADING_ID');
                    ?>
                </th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($this->items as $i => $item) : ?>
                <?php
                if ($item->language && JLanguageMultilang::isEnabled()) {
                    $tag = strlen($item->language);
                    if ($tag == 5) {
                        $lang = substr($item->language, 0, 2);
                    } elseif ($tag == 6) {
                        $lang = substr($item->language, 0, 3);
                    } else {
                        $lang = "";
                    }
                } elseif (!JLanguageMultilang::isEnabled()) {
                    $lang = "";
                }
                ?>
                <tr class="row<?php echo $i % 2; ?>">
                    <td>
                        <a class="pointer" onclick="if (window.parent)
                                        window.parent.<?php echo $this->escape($function); ?>('<?php echo $item->id; ?>', '<?php echo $item->name; ?>');">
                            <?php echo $this->escape($item->name); ?></a>
                    </td>
                    <td class="left">
                        <?php echo substr($this->escape($item->description), 0, 150) . '...'; ?>
                    </td>
                    <td class="center">
                        <?php echo (int) $item->id; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div>
        <input type="hidden" name="task" value="" />
        <input type="hidden" name="boxchecked" value="0" />
        <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
        <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
        <?php echo JHtml::_('form.token'); ?>
    </div>
</form>


<?php
/* ------------------------------------------------------------------------
  # com_jomoeasyrestaurantmenu - JOMO Easy Restaurant Menu Extension for Joomla 3.x
  # -----------------------------------------------------------------------
  # author: http://www.jomotheme.com
  # copyright Copyright (C) 2013 jomotheme.com. All Rights Reserved.
  # @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
  # Website: http://www.jomotheme.com
  # Technical Support: Visit Forum on http://www.jomotheme.com
 */

defined('_JEXEC') or die;

$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn = $this->escape($this->state->get('list.direction'));
?>

<form action="<?php echo JRoute::_('index.php?option=com_jomoeasyrestaurantmenu&amp;view=menus'); ?>" method="post" name="adminForm" id="adminForm">

    <div id="j-main-container" class="span10">

        <div class="js-stools clearfix">
            <!-- Search { -->
            <div class="clearfix">
                <div class="js-stools-container-bar">
                    <div class="btn-wrapper input-append">

                        <input class="js-stools-search-string" type="text" name="filter_search" id="filter_search" value="<?php echo $this->escape($this->state->get('filter.search')); ?>" title="<?php echo JText::_('COM_WEBLINKS_SEARCH_IN_TITLE'); ?>" />
                        <button class="btn hasTooltip js-stools-btn-clear" type="submit"><i class="icon-search"></i></button>
                        <button class="btn hasTooltip js-stools-btn-clear"  type="button" onclick="document.id('filter_search').value = '';
                            this.form.submit();"><?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?></button>
                    </div>
                </div>
            </div>
            <!-- } Search -->

            <!-- Filters { -->   

            <div class="js-stools-container-filters hidden-phone clearfix" style="float: right;">
                <label class="filter-search-lbl" for="filter_search"><?php echo JText::_('JSEARCH_FILTER_LABEL'); ?></label>

                <select name="filter_published" class="inputbox" onchange="this.form.submit()">
                    <option value=""><?php echo JText::_('JOPTION_SELECT_PUBLISHED'); ?></option>
                    <?php echo JHtml::_('select.options', JomoEasyRestaurantMenuHelper::getStateOptions(), 'value', 'text', $this->state->get('filter.state'), true); ?>
                </select>

            </div>
            <!-- } Filters -->

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th width="1%">
                            <input type="checkbox" name="checkall-toggle" value="" onclick="checkAll(this)" />
                        </th>
                        <th width="10%">                    
                            <?php echo JHtml::_('grid.sort', 'COM_JOMOEASYRESTAURANTMENU_NAME', 'name', $listDirn, $listOrder); ?>
                        </th>
                        <th width="15%">
                            <?php echo JHtml::_('grid.sort', 'COM_JOMOEASYRESTAURANTMENU_SUBNAME', 'name2', $listDirn, $listOrder); ?>
                        </th>
                        <th><?php echo JText::_('COM_JOMOEASYRESTAURANTMENU_DESC') ?></th>
                        <th>
                            <?php echo JHtml::_('grid.sort', 'JSTATUS', 'published', $listDirn, $listOrder); ?>
                        </th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td colspan="10">
                            <?php echo $this->pagination->getListFooter(); ?>
                        </td>
                    </tr>
                </tfoot>        
                <tbody>                    	
                    <?php foreach ($this->items as $i => $item): ?>
                        <tr class="row<?php echo $i % 2; ?>">
                            <td class="center">
                                <?php echo JHtml::_('grid.id', $i, $item->id); ?>
                            </td>
                            <td>
                                <a href="<?php echo $item->url; ?>"><?php echo $this->escape($item->name) ?></a>
                            </td>
                            <td><?php echo $this->escape($item->name2) ?></td>
                            <td><?php echo substr($this->escape($item->description), 0, 150) . '...'; ?></td>
                            <td class="center">
                                <?php echo JHtml::_('jgrid.published', $item->published, $i, 'menus.', true); ?>                        
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

                <input type="hidden" name="task" value="" />
                <input type="hidden" name="boxchecked" value="0" />
                <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
                <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
                <?php echo JHtml::_('form.token'); ?>
            </table>
        </div>
</form>
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

$user = JFactory::getUser();
$userId = $user->get('id');
$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn = $this->escape($this->state->get('list.direction'));
$canOrder = $user->authorise('core.edit.state', 'com_jomoeasyrestaurantmenu');
$saveOrder = $listOrder == 't1.ordering';

// field type
//Get options
JFormHelper::addFieldPath(JPATH_COMPONENT . '/models/fields');
$categoryselect = JFormHelper::loadFieldType('CategorySelect', false);
$catOptions = $categoryselect->getOptions(); // works only if you set your field getOptions on public!!
?>

<form action="<?php echo JRoute::_('index.php?option=com_jomoeasyrestaurantmenu&amp;view=dishes'); ?>" method="post" name="adminForm" id="adminForm">
    <div id="j-main-container" class="span10">
        <div class="js-stools clearfix">
            <!-- Search { -->
            <div class="clearfix">
                <div class="js-stools-container-bar">

                    <div class="btn-wrapper input-append">

                        <input class="js-stools-search-string" type="text" name="filter_search" id="filter_search" value="<?php echo $this->escape($this->state->get('filter.search')); ?>" title="<?php echo JText::_('COM_WEBLINKS_SEARCH_IN_TITLE'); ?>" />
                        <button class="btn hasTooltip js-stools-btn-clear"  type="submit"><i class="icon-search"></i></button>
                        <button class="btn hasTooltip js-stools-btn-clear"  type="button" onclick="document.id('filter_search').value = '';
                                this.form.submit();"><?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?></button>
                    </div>
                </div>
            </div>
            <!-- } Search -->

            <!-- Filters { -->   
            <div class="js-stools-container-filters hidden-phone clearfix" style="float: right;">
                <label class="off_element-invisible" for="filter_search"><?php echo JText::_('JSEARCH_FILTER_LABEL'); ?></label>
                <select name="filter_cat_id" class="inputbox" onchange="this.form.submit()">
                    <option value=""><?php echo JText::_('JOPTION_SELECT_CATEGORY'); ?></option>
                    <?php echo JHtml::_('select.options', $catOptions, 'value', 'text', $this->state->get('filter.cat_id')); ?>
                </select>                  
                <select name="filter_published" class="inputbox" onchange="this.form.submit()">
                    <option value=""><?php echo JText::_('JOPTION_SELECT_PUBLISHED'); ?></option>
                    <?php echo JHtml::_('select.options', JomoEasyRestaurantMenuHelper::getStateOptions(), 'value', 'text', $this->state->get('filter.state'), true); ?>
                </select>
            </div>
            <!-- } Filters -->
        </div>



        <table class="table table-striped">
            <thead>
                <tr>
                    <th width="1%">
                        <input type="checkbox" name="checkall-toggle" value="" onclick="checkAll(this)" />
                    </th>
                    <th>                    
                        <?php echo JHtml::_('grid.sort', 'COM_JOMOEASYRESTAURANTMENU_NAME', 't1.name', $listDirn, $listOrder); ?>
                    </th>
                    <th>
                        <?php echo JHtml::_('grid.sort', 'COM_JOMOEASYRESTAURANTMENU_MENU', 'menu_name', $listDirn, $listOrder); ?>
                    </th>                
                    <th>
                        <?php echo JHtml::_('grid.sort', 'COM_JOMOEASYRESTAURANTMENU_CATEGORY', 'cat_name', $listDirn, $listOrder); ?>
                    </th>
                    <th width="10%">
                        <?php echo JHtml::_('grid.sort', 'JGRID_HEADING_ORDERING', 't1.ordering', $listDirn, $listOrder); ?>
                        <?php if ($canOrder && $saveOrder) : ?>
                            <?php echo JHtml::_('grid.order', $this->items, 'filesave.png', 'dishes.saveorder'); ?>
                        <?php endif; ?>
                    </th>
                    <th><?php echo JText::_('COM_JOMOEASYRESTAURANTMENU_DESC') ?></th>
                    <th>
                        <?php echo JHtml::_('grid.sort', 'JSTATUS', 't1.published', $listDirn, $listOrder); ?>
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
                <?php
                foreach ($this->items as $i => $item):
                    $ordering = ($listOrder == 't1.ordering');
//                $item->cat_link = JRoute::_('index.php?option=com_categories&extension=com_weblinks&task=edit&type=other&cid[]=' . $item->category_id);
                    $canCreate = $user->authorise('core.create', 'com_jomoeasyrestaurantmenu.dish.' . $item->category_id);
                    $canEdit = $user->authorise('core.edit', 'com_jomoeasyrestaurantmenu.dish.' . $item->category_id);
                    $canCheckin = $user->authorise('core.manage', 'com_checkin') || $item->checked_out == $user->get('id') || $item->checked_out == 0;
                    $canChange = $user->authorise('core.edit.state', 'com_jomoeasyrestaurantmenu.dish.' . $item->category_id) && $canCheckin;
                    ?>
                    <tr class="row<?php echo $i % 2; ?>">
                        <td class="center">
                            <?php echo JHtml::_('grid.id', $i, $item->id); ?>
                        </td>
                        <td width="15%">
                            <a href="<?php echo $item->url; ?>"><?php echo $this->escape($item->name) ?></a>
                        </td>
                        <td width="10%"><?php echo $this->escape($item->menu_name) ?></td>
                        <td width="10%"><?php echo $this->escape($item->cat_name) ?></td> 
                        <td class="order">
                            <?php if ($canChange) : ?>
                                <?php if ($saveOrder) : ?>
                                    <?php if ($listDirn == 'asc') : ?>
                                        <span><?php echo $this->pagination->orderUpIcon($i, ($item->category_id == @$this->items[$i - 1]->category_id), 'dishes.orderup', 'JLIB_HTML_MOVE_UP', $ordering); ?></span>
                                        <span><?php echo $this->pagination->orderDownIcon($i, $this->pagination->total, ($item->category_id == @$this->items[$i + 1]->category_id), 'dishes.orderdown', 'JLIB_HTML_MOVE_DOWN', $ordering); ?></span>
                                    <?php elseif ($listDirn == 'desc') : ?>
                                        <span><?php echo $this->pagination->orderUpIcon($i, ($item->category_id == @$this->items[$i - 1]->category_id), 'dishes.orderdown', 'JLIB_HTML_MOVE_UP', $ordering); ?></span>
                                        <span><?php echo $this->pagination->orderDownIcon($i, $this->pagination->total, ($item->category_id == @$this->items[$i + 1]->category_id), 'dishes.orderup', 'JLIB_HTML_MOVE_DOWN', $ordering); ?></span>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php $disabled = $saveOrder ? '' : 'disabled="disabled"'; ?>
                                <input type="text" name="order[]" size="5" value="<?php echo $item->ordering; ?>" <?php echo $disabled ?> class="text-area-order" style="width: 20px; float:right;"  />
                            <?php else : ?>
                                <?php echo $item->ordering; ?>
                            <?php endif; ?>
                        </td>
                        <td><?php echo substr($this->escape($item->description), 0, 150) . '...'; ?></td>
                        <td class="center">
                            <?php echo JHtml::_('jgrid.published', $item->published, $i, 'dishes.', true, 'cb'); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <input type="hidden" name="task" value="" />
        <input type="hidden" name="boxchecked" value="0" />
        <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
        <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
        <?php echo JHtml::_('form.token'); ?>
    </div>
</form>
<?php
/* ------------------------------------------------------------------------
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

$document = JFactory::getDocument();
$document->addStyleSheet(JURI::base() . 'media/com_jomoeasyrestaurantmenu/css/css.css');
if ($this->params->get('font_set') != '-1') {
    $document->addStyleSheet(JURI::base() . 'media/com_jomoeasyrestaurantmenu/css/font' . $this->params->get('font_set') . '.css');
}

// if print link should be displayed
if ($this->params->get('print_link')) {
    $isModal = JRequest::getVar('print') == 1; // 'print=1' will only be present in the url of the modal window, not in the presentation of the page
    if ($isModal) {
        $href = '"#" onclick="window.print(); return false;"';
    } else {
        $href = 'status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=640,height=480,directories=no,location=no';
        $href = "window.open(this.href,'win2','" . $href . "'); return false;";
//        $href = '"' . JURI::getInstance()->toString() . JRoute::_('index.php?option=com_jomoeasyrestaurantmenu&tmpl=component&print=1') . '"'. $href;
        $href = '"' . JURI::getInstance()->toString() . JRoute::_('index.php?option=com_jomoeasyrestaurantmenu&view=menu&tmpl=component&print=1') . '"' . $href;
    }
}
?>
<!-- menu container START -->
<div class="jomoerm">

    <span>
        <h1><?php echo $this->item->name; ?></h1>
    </span>


    <span>
        <h4><?php echo $this->item->name2; ?></h4>
        <p class="jomoerm_description"><?php echo $this->item->description; ?></p>
    </span>

    <?php foreach ($this->dishes as $category_stack): ?>    
        <!-- category container START -->

        <h3><?php echo( $category_stack[0]->cat_name); ?></h3>
        <p class="jomoerm_description"><?php echo( $category_stack[0]->cat_desc); ?></p>

        <!-- dishes container START -->
        <div class="jomoerm_dishes">

            <? if ($category_stack[0]->layout == 1): ?>
            <?php foreach ($category_stack as $adish): ?>        
                <!-- one column START -->
                <ul class="jomoerm_onecol" style="list-style: none;">
                    <li>
                        <h5><?php echo($adish->dish_name); ?></h5>
                        <span class="jomoerm_price">
                            <?php if ($adish->dish_icon): ?>
                                <img src="media/com_jomoeasyrestaurantmenu/icons/<?php echo $adish->dish_icon; ?>"                                 
                                     alt="tooltippic"/>
                                 <?php endif; ?>
                                 <?php
                                 if ($adish->price > 0)
                                     if ($this->params->get('currSymbolPos') == 0) {
                                         echo number_format( (float) $adish->price, 2 ) . '' . $this->params->get('currency');
                                     } else
                                     if ($this->params->get('currSymbolPos') == 1) {
                                         echo $this->params->get('currency') . '' . number_format( (float) $adish->price, 2 );
                                     }
                                 ?></span>
                        <?php if ($this->params->get('enableLinks') == 0): // links on ?>
                            <img src="<?php echo $adish->dish_img; ?>" class="jomoerm_menuthumb"/>            
                        <?php else: // links off ?>
                            <a 
                            <?php if ($this->params->get('enableLinks') == 2) echo ' data-rokbox '; ?>
                                href="<?php echo $adish->dish_img; ?>"                                                                       
                                rel="<?php
                                if ($this->params->get('enableLinks') == 1)
                                    echo $this->params->get('attrName');
                                ?>"><img src="<?php echo $adish->dish_img; ?>" class="jomoerm_menuthumb"/></a>
                            <?php endif; ?>
                        <p><?php echo($adish->dish_desc); ?></p>            
                    </li>
                </ul>
                <!-- one column END -->
            <?php endforeach; ?>
            <?php endif; ?>


            <? if ($category_stack[0]->layout == 2): ?>
            <?php foreach ($category_stack as $adish): ?>        
                <!-- two column START -->
                <ul class="jomoerm_twocol" style="list-style: none;">
                    <li>
                        <h5><?php echo($adish->dish_name); ?></h5>
                        <span class="jomoerm_price">
                            <?php if ($adish->dish_icon): ?>
                                <img src="media/com_jomoeasyrestaurantmenu/icons/<?php echo $adish->dish_icon; ?>"                                 
                                     alt="tooltippic"/>
                                 <?php endif; ?>
                                 <?php
                                 if ($adish->price > 0)
                                     if ($this->params->get('currSymbolPos') == 0) { 
                                         echo number_format((float) $adish->price, 2) . '' . $this->params->get('currency');
                                     } else
                                     if ($this->params->get('currSymbolPos') == 1) {
                                         echo $this->params->get('currency') . '' . number_format( (float) $adish->price, 2 );
                                     }
                                 ?></span>
                        <?php if ($this->params->get('enableLinks') == 0): // links on ?>
                            <img src="<?php echo $adish->dish_img; ?>" class="jomoerm_menuthumb"/>            
                        <?php else: // links off ?>
                            <a 
                            <?php if ($this->params->get('enableLinks') == 2) echo ' data-rokbox '; ?>
                                href="<?php echo $adish->dish_img; ?>"                                                                       
                                rel="<?php
                                if ($this->params->get('enableLinks') == 1)
                                    echo $this->params->get('attrName');
                                ?>"><img src="<?php echo $adish->dish_img; ?>" class="jomoerm_menuthumb"/></a>
                            <?php endif; ?>
                        <p><?php echo($adish->dish_desc); ?></p>            
                    </li>
                </ul>
                <!-- two column END -->

            <?php endforeach; ?>
            <?php endif; ?>
            <!-- dishes container END -->    
        </div>
        <!-- category container END -->
    <?php endforeach; ?>    
</div>


<!-- menu container END -->
<?php if ($href): ?>
    <p style="text-align: right; clear: both;"><a target="_blank" href=<?php echo $href ?> ><?php echo JText::_("COM_JOMOEASYRESTAURANTMENU_PRINT"); ?></a></p>
<?php else: ?>
    <p style="text-align: right; clear: both;"></p>
<?php endif; ?>
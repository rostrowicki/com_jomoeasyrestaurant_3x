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

defined('_JEXEC') or die;

JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');

$app = JFactory::getApplication();

$script = "
	jQuery(document).ready(function ($){
		$('#jform_type').change(function(){
			if($(this).val() == 1) {
				$('#image').css('display', 'none');
				$('#custom').css('display', 'block');
			} else {
				$('#image').css('display', 'block');
				$('#custom').css('display', 'none');
			}
		}).trigger('change');
	});";
// Add the script to the document head.
JFactory::getDocument()->addScriptDeclaration($script);
?>
<script type="text/javascript">
    Joomla.submitbutton = function(task)
    {
        if (task == 'category.cancel' || document.formvalidator.isValid(document.id('category-form')))
        {
            Joomla.submitform(task, document.getElementById('category-form'));
        }
    }
</script>

<form action="<?php echo JRoute::_('index.php?option=com_jomoeasyrestaurantmenu&amp&id=' . $this->item->id); ?>" method="post" name="adminForm" class="form-validate" id="category-form">
    <div class="row-fluid">
        <div class="span3">

            <?php foreach ($this->form->getFieldset("leftcol") as $field): ?>
                <div><?php echo $field->label; ?></div>
                <div><?php echo $field->input; ?></div>
            <?php endforeach; ?>


            <?php foreach ($this->form->getFieldset("rightcol") as $field): ?>
                <div><?php echo $field->label; ?></div>
                <div><?php echo $field->input; ?></div>
            <?php endforeach; ?>


            <input type="hidden" name="task" vaule="" />
            <?php echo JHtml::_('form.token'); ?>

        </div>
    </div>
</form>
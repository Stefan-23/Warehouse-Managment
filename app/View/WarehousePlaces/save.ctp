<div class="users form">
<?php echo $this->Form->create('WarehousePlace'); ?>
	<fieldset>
		<legend><?php echo __('Add Place'); ?></legend>
    <?php
        echo $this->Form->input('code', array('class' => "col_4 column"));
        echo $this->Form->input('name', array('class' => "col_4 column"));
		echo $this->Form->input('description', array('class' => "col_4 column"));
        echo $this->Form->input('type', array('class' => "col_4 column", 'options' => $types));
        echo $this->Form->input('second_type', array('class' => "col_4 column", 'options' => $types, 'empty' => 'Select Second Type'));
        echo $this->Form->input('third_type', array('class' => "col_4 column", 'options' => $types, 'empty' => 'Select Third Type'));
        echo $this->Form->input('default', array('class' => "col_4 column"));
		echo $this->Form->input('active', array('class' => "col_4 column" ));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h4 style='color:orange;'><?php echo __('Actions'); ?></h4>
	<ul  class="menu vertical left">

		<li class ='current'><?php echo $this->Html->link(__('New Warehouse Place'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Warehouse Places'), array('controller' => 'warehouseplaces', 'action' => 'index')); ?> </li>
	</ul>
</div>
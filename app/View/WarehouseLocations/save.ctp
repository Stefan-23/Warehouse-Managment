<div class="users form">
<?php echo $this->Form->create('WarehouseLocation'); ?>
	<fieldset>
		<legend><?php echo __('Add Address'); ?></legend>
    <?php
        echo $this->Form->input('address_code', array('class' => "col_4 column"));
        echo $this->Form->input('row', array('class' => "col_4 column"));
		echo $this->Form->input('shelf', array('class' => "col_4 column"));
        echo $this->Form->input('box', array('class' => "col_4 column"));
        echo $this->Form->input('warehouse_place_id', array('class' => "col_4 column", 'options'=> $places));
        echo $this->Form->input('barcode', array('class' => "col_4 column"));
        echo $this->Form->input('active', array('class' => "col_4 column"));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h4 style='color:orange;'><?php echo __('Actions'); ?></h4>
	<ul  class="menu vertical left">

		<li class ='current'><?php echo $this->Html->link(__('New Warehouse Place'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Warehouse Addresses'), array('controller' => 'warehouseplaces', 'action' => 'index')); ?> </li>
	</ul>
</div>
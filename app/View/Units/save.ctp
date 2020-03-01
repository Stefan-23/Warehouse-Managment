<div class="units form">
<?php echo $this->Form->create('Unit'); ?>
	<fieldset>
		<legend><?php echo __('Edit-Add Unit'); ?></legend>
	<?php
		echo $this->Form->input('name' , array('style' => 'margin-left:13px'));
		echo $this->Form->input('symbol');
		echo $this->Form->input('active');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="menu vertical">
		<li><?php echo $this->Html->link(__('List Units'), array('action' => 'index')); ?></li>
	</ul>
</div>
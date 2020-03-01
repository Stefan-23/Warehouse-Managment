<div class="types form">
<?php echo $this->Form->create('Material',['enctype'=>'multipart/form-data']); ?>
	<fieldset>
		<legend><?php echo __('Import-excel'); ?></legend>
	<?php
		echo $this->Form->input('excel', array('type'=> 'file'));
        
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="menu vertical">
		<li><?php echo $this->Html->link(__('List Materials'), array('action' => 'index')); ?></li>
	</ul>
</div>
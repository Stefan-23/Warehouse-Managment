<div class="types form">
<?php echo $this->Form->create('Type'); ?>
	<fieldset>
		<legend><?php echo __('Edit-Add Type'); ?></legend>
	<?php
		echo $this->Form->input('code', array('style' => 'margin-left:7px;'));
        echo $this->Form->input('name');
        echo $this->Form->input('class', array('options' => $classes));
        echo $this->Form->input('tangible');
		echo $this->Form->input('active');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="menu vertical">
		<li><?php echo $this->Html->link(__('List types'), array('action' => 'index')); ?></li>
	</ul>
</div>
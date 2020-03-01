<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
    <?php
        echo $this->Form->input('first_name', array('class' => "col_5 column"));
        echo $this->Form->input('last_name', array('class' => "col_5 column"));
		echo $this->Form->input('username', array('class' => "col_5 column"));
        echo $this->Form->input('password', array('class' => "col_5 column"));
        echo $this->Form->input('email', array('class' => "col_5 column"));
		echo $this->Form->input('group_id', array('class' => "col_5 column" , 'options' => $listGroups));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h4 style='color:orange;'><?php echo __('Actions'); ?></h4>
	<ul  class="menu vertical left">

		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
	</ul>
</div>

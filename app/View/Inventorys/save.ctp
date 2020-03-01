<div class="materials form">
<?php echo $this->Form->create('Inventory'); ?>
	<fieldset>
		<legend><?php echo __('Edit-Add Inventory'); ?></legend>
	<?php
		//echo $this->Form->input('article_id',['options'=>$lista]);
		echo $this->Form->hidden('Article.id');			//ID FOR EDITING DATA!!!
		echo $this->Form->input('Article.name', array('style'=>'width:365px; margin-left: 35px;'));
		echo $this->Form->input('Article.type_id', array('style'=>'width:365px; margin-left: 45px;','options'=>$listTypes));
		echo $this->Form->input('Article.unit_id' , array('style'=>'width:365px; margin-left: 50px;','options' => $listUnits));
		echo $this->Form->input('Article.weight', array('style'=>'width:365px; margin-left:45px;'));
		echo $this->Form->input('Article.description',array('style'=>'width:365px; height:70px; margin-left:15px'));
		echo $this->Form->input('status', array('style'=>'width:285px; margin-left:120px;','options' => $status));
		echo $this->Form->input('recommended_rating', array(
			'style'=>'width:285px; margin-left:15px;',
			'type' => 'select',
			'options' => $rating,
			'empty' => 'Select Rating', // <-- Shows as the first item and has no value
			
		));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="menu vertical">
		<li><?php echo $this->Html->link(__('List Inventory'), array('action' => 'index')); ?></li>
	</ul>
</div>
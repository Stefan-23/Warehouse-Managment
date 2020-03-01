<div class="semiproducts form">
<?php echo $this->Form->create('SemiProduct'); ?>
	<fieldset>
		<legend><?php echo __('Edit-Add Semi-Product'); ?></legend>
	<?php
		//echo $this->Form->input('article_id',['options'=>$lista]);
		echo $this->Form->hidden('Article.id');			//ID FOR EDITING DATA!!!
		echo $this->Form->input('Article.name', array('style'=>'width:365px; margin-left: 23px;'));
		echo $this->Form->input('Article.type_id',array('options'=>$listTypes,'style'=>'width:365px; margin-left: 35px;' ));
		echo $this->Form->input('Article.unit_id' , array('options' => $listUnits, 'style'=>'width:365px; margin-left: 40px;'));
		echo $this->Form->input('Article.weight', array('style'=>'width:365px; margin-left: 35px;'));
		echo $this->Form->input('Article.description', array('style'=>'width:365px; height:70px; margin-left: 2px;  '));
        echo $this->Form->input('semi_product_status', array('options' => $status , 'style' => 'width: 265px'));
		echo $this->Form->input('service_production');		
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
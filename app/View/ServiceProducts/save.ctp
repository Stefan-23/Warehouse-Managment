<div class="service_products form">
<?php echo $this->Form->create('ServiceProduct'); ?>
	<fieldset>
		<legend><?php echo __('Edit-Add Service'); ?></legend>
	<?php
		//echo $this->Form->input('article_id',['options'=>$lista]);
		echo $this->Form->hidden('Article.id');			//ID FOR EDITING DATA!!!
		echo $this->Form->input('Article.name', array('style'=>'width:365px; margin-left: 45px;'));
        echo $this->Form->input('Article.type_id',array('style'=>'width:365px; margin-left: 55px;', 'options' => $listTypes));
		echo $this->Form->input('Article.unit_id',array('style'=>'width:365px; margin-left: 60px;', 'options' => $listUnits));
        echo $this->Form->input('Article.weight',array('style'=>'width:365px; margin-left: 55px;'));
		echo $this->Form->input('pid',array('style'=>'width:365px; margin-left: 86px;'));
        echo $this->Form->input('hs_number',array('style'=>'width:365px; margin-left: 20px'));
        echo $this->Form->input('tax_group',array('style'=>'width:365px; margin-left:30px'));
        echo $this->Form->input('service_eccn',array('style'=>'width:365px; margin-left:10px;'));
        echo $this->Form->input('release_date',array(
			'type' => 'text',
			'class' => 'datepicker',
			'style' => 'margin-left: 10px; width:365px'
		));
		echo $this->Form->input('project', array('style'=>'width:365px; margin-left:60px'));
		echo $this->Form->input('Article.description',array('style'=>'width:365px; height:70px; margin-left:25px'));
		echo $this->Form->input('service_status', array('style'=>'width:340px; margin-left:2px','options' => $status));
        echo $this->Form->input('for_distributors');
        
        
		
	
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="menu vertical">
		<li><?php echo $this->Html->link(__('List Services'), array('action' => 'index')); ?></li>
	</ul>
</div>
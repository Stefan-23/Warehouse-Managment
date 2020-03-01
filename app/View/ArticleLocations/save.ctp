<div class="users form">
<?php echo $this->Form->create('ArticleLocation'); ?>
	<fieldset>
		<legend><?php echo __('Add Article Address'); ?></legend>
		
    <?php
	
		echo $this->Form->input('article_id', array('class'=> 'select2','style'=>'width:365px; margin-left: 23px;', 'options' => $article));
		echo $this->Form->input('warehouse_location_id', array('style'=>'width:365px; margin-left: 23px;', 'options' => $address));

	
		?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h4 style='color:orange;'><?php echo __('Actions'); ?></h4>
	<ul  class="menu vertical left">

		<li class ='current'><?php echo $this->Html->link(__('New Warehouse Address'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Warehouse Addresses'), array('controller' => 'warehouseplaces', 'action' => 'index')); ?> </li>
	</ul>
</div>


<script>
$(document).ready(function(){
	$('.select2').select2({
		minimumResultsForSearch: Infinity,
		ajax: {
			url: 'http://localhost/warehouse/articles/getData',
			dataType: 'json',
		
			// Additional AJAX parameters go here; see the end of this chapter for the full code of this example
  		},
		
	});
	

});

</script>
<style>
	.select2-results {color: black;};
</style>
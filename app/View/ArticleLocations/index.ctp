
<ul class="menu">
<li class="current"><?php echo $this->Html->link(__('Warehouses'), array('controller'=> 'warehouselocations', 'action' => 'index')); ?></li>
<li><?php echo $this->Html->link(__('Articles'), array('controller'=> 'articles', 'action' => 'index')); ?></li>
<li><?php echo $this->Html->link(__('Users'), array('controller'=> 'users', 'action' => 'index')); ?></li>
<li><?php echo $this->Html->link(__('Log out'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
</ul>
<br>


<div class="goods index">

	<h4> <?php echo __('Article Address'); ?> </h4>
	<table cellpadding="0" cellspacing="0" class="sortable">
	<thead>
	<tr>
			
            <th><?php echo $this->Paginator->sort('Article Name'); ?></th>
			<th><?php echo $this->Paginator->sort('Warehouse Address Code'); ?></th>
			<th><?php echo $this->Paginator->sort('Row'); ?></th>
			<th><?php echo $this->Paginator->sort('Shelf'); ?></th>
            <th><?php echo $this->Paginator->sort('Box'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
    <?php foreach ($articlelocations as $article):?>
	<tr>
		<td><?php echo ($article['Article']['name']); ?>&nbsp;</td>
		<td><?php echo ($article['WarehouseLocation']['address_code']); ?>&nbsp;</td>
		<td><?php echo ($article['WarehouseLocation']['row']); ?>&nbsp;</td>
		<td><?php echo ($article['WarehouseLocation']['shelf']); ?>&nbsp;</td>
		<td><?php echo ($article['WarehouseLocation']['box']); ?>&nbsp;</td>



         
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $article['ArticleLocation']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'save', $article['ArticleLocation']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $article['ArticleLocation']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $article['ArticleLocation']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<button class="small orange" href=""><?php echo $this->Paginator->prev(__('Previous'), array(), null, array('class' => 'prev disabled')); ?></button>
	<?php
		echo $this->Paginator->numbers(array('separator' => ''));
	?>
	<button class="small orange" href=""><?php echo $this->Paginator->next(__('Next'), array(), null, array('class' => 'next disabled')); ?></button>
	</div>
</div>
<div class="actions">
	<h4 style='color:orange;'><?php echo __('Actions'); ?></h4>
	<ul class="menu vertical">
		<li><?php echo $this->Html->link(__('New Article Address'), array('action' => 'save')); ?></li>
		<li><?php echo $this->Html->link(__('Warehouse Places'), array('controller' => 'warehouseplaces','action' => 'index')); ?></li>
        <li ><?php echo $this->Html->link(__('Warehouse Addresses'), array('controller' => 'warehouselocations', 'action' => 'index')); ?> </li>
        <li class="current"><?php echo $this->Html->link(__('Article Addresses'), array('controller' => 'articlelocations', 'action' => 'index')); ?> </li>
		
	</ul>
</div>
<script>
$(document).ready(function(){
	$('.select2').select2({
		ajax: {
			url: 'http://localhost/warehouse/users/getUsersJson',
			dataType: 'json',
		
			// Additional AJAX parameters go here; see the end of this chapter for the full code of this example
  		},
		'width':'300px'
	});

});
</script>
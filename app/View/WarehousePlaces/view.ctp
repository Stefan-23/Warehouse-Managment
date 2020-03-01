<ul class="menu">
<li><a href="">Home</a></li>
<li class="current"><?php echo $this->Html->link(__('Warehouses'), array('controller'=> 'warehouseplaces', 'action' => 'index')); ?></li>
<li><?php echo $this->Html->link(__('Articles'), array('controller'=> 'articles', 'action' => 'index')); ?></li>
<li><?php echo $this->Html->link(__('Users'), array('controller'=> 'users', 'action' => 'index')); ?></li>
</ul>
<br>


<div class="goods index">

	<h4><?php echo __('Warehouse Places'); ?></h4>
	<table cellpadding="0" cellspacing="0" class="sortable">
	<thead>
	<tr>
            <th><?php echo $this->Paginator->sort('Article'); ?></th>
			<th><?php echo $this->Paginator->sort('amount'); ?></th>
			<th><?php echo $this->Paginator->sort('free_amount'); ?></th>
			<th><?php echo $this->Paginator->sort('requried_amount'); ?></th>
			<th><?php echo $this->Paginator->sort('usage'); ?></th>
            
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($warehousePlaces as $warehousePlace):?>
	<tr>
    
		<td><?php echo ($warehousePlace['WarehousePlace']['code']); ?>&nbsp;</td>
		<td><?php echo ($warehousePlace['WarehousePlace']['name']); ?>&nbsp;</td>
		<td><?php echo ($warehousePlace['WarehousePlace']['description']); ?>&nbsp;</td>
        <td><?php echo ($warehousePlace['WarehousePlace']['type'] . '<br>' .$warehousePlace['WarehousePlace']['second_type'] . '<br>' .$warehousePlace['WarehousePlace']['third_type']) ; ?>&nbsp;</td>
        <td><?php 
            if($warehousePlace['WarehousePlace']['default'] == null){
					echo "<i style='color:red;'> Ne </i>";
				}else{
					echo "<i style = 'color:green;'> Da </i>";
            }; ?>&nbsp;</td>
            <td><?php 
            if($warehousePlace['WarehousePlace']['active'] == null){
					echo "<i style='color:red;'> Ne </i>";
				}else{
					echo "<i style = 'color:green;'> Da </i>";
			}; ?>&nbsp;</td>
        
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $warehousePlace['WarehousePlace']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'save', $warehousePlace['WarehousePlace']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $warehousePlace['WarehousePlace']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $warehousePlace['WarehousePlace']['name']))); ?>
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
		<li class="current"><?php echo $this->Html->link(__('Warehouse Places'), array('controller' => 'warehouseplaces','action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Warehouse Addresses'), array('controller' => 'warehouselocations', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Article Addresses'), array('controller' => 'articlelocations', 'action' => 'index')); ?> </li>
		
	</ul>
</div>
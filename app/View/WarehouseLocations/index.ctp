<ul class="menu">
<li class="current"><?php echo $this->Html->link(__('Warehouses'), array('controller'=> 'warehouselocations', 'action' => 'index')); ?></li>
<li><?php echo $this->Html->link(__('Articles'), array('controller'=> 'articles', 'action' => 'index')); ?></li>
<li><?php echo $this->Html->link(__('Users'), array('controller'=> 'users', 'action' => 'index')); ?></li>
<li><?php echo $this->Html->link(__('Log out'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
</ul>
<br>


<div class="goods index">

	<h4><?php echo __('Warehouse Address'); ?></h4>
	<table cellpadding="0" cellspacing="0" class="sortable">
	<thead>
	<tr>
			
			<th><?php echo $this->Paginator->sort('Address Code'); ?></th>
			<th><?php echo $this->Paginator->sort('Row'); ?></th>
			<th><?php echo $this->Paginator->sort('Shelf'); ?></th>
			<th><?php echo $this->Paginator->sort('Box'); ?></th>
			<th><?php echo $this->Paginator->sort('Warehouse place'); ?></th>
            <th><?php echo $this->Paginator->sort('Barcode'); ?></th>
            <th><?php echo $this->Paginator->sort('Active'); ?></th>
            
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($warehouselocations as $location):?>
	<tr>
		<td><?php echo ($location['WarehouseLocation']['address_code']); ?>&nbsp;</td>
		<td><?php echo ($location['WarehouseLocation']['row']); ?>&nbsp;</td>
		<td><?php echo ($location['WarehouseLocation']['shelf']); ?>&nbsp;</td>
        <td><?php echo ($location['WarehouseLocation']['box']) ; ?>&nbsp;</td>
        <td><?php echo ($location['WarehousePlace']['name']) ?>&nbsp;</td>
        <td><?php echo ($location['WarehouseLocation']['barcode']) ; ?>&nbsp;</td>    
            <td><?php 
            if($location['WarehouseLocation']['active'] == null){
					echo "<i style='color:red;'> Ne </i>";
				}else{
					echo "<i style = 'color:green;'> Da </i>";
			}; ?>&nbsp;</td>
        
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $location['WarehouseLocation']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'save', $location['WarehouseLocation']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $location['WarehouseLocation']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $location['WarehouseLocation']['address_code']))); ?>
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
        <li class="current"><?php echo $this->Html->link(__('Warehouse Addresses'), array('controller' => 'warehouselocations', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Article Addresses'), array('controller' => 'articlelocations', 'action' => 'index')); ?> </li>
		
	</ul>
</div>
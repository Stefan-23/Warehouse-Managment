<ul class="menu">
<li><?php echo $this->Html->link(__('Warehouses'), array('controller'=> 'warehouseplaces', 'action' => 'index')); ?></li>
<li class="current"><?php echo $this->Html->link(__('Articles'), array('controller'=> 'articles', 'action' => 'index')); ?></li>
<li><?php echo $this->Html->link(__('Users'), array('controller'=> 'users', 'action' => 'index')); ?></li>
<li><?php echo $this->Html->link(__('Log out'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
</ul>
<br>
<div class="units index">
	<h4 style="color:#00CED1;"><?php echo __('Units'); ?></h4>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('symbol'); ?></th>
			<th><?php echo $this->Paginator->sort('active'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($units as $unit): ?>
	<tr>
		
		<td><?php echo h($unit['Unit']['name']); ?>&nbsp;</td>
		<td><?php echo h($unit['Unit']['symbol']); ?>&nbsp;</td>
		
		<td><?php if($unit['Unit']['active'] == 1){				// Convert 1 and 0 to char
			echo "<i style='color:green;'> Da </i>";
		}else echo "<i style='color:red;'> Ne </i>"; 
		
		?>&nbsp;</td>
		<td><?php echo h($unit['Unit']['created']); ?>&nbsp;</td>
		<td><?php echo h($unit['Unit']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $unit['Unit']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'save', $unit['Unit']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $unit['Unit']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $unit['Unit']['id']))); ?>
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
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h4 style='color:#2c6877;'><?php echo __('Actions'); ?></h4>
	<ul class="menu vertical">
	<li><?php echo $this->Html->link(__('New Unit'), array('action' => 'save')); ?></li>
		<li><?php echo $this->Html->link(__('Types'), array('controller' => 'types', 'action' => 'index')); ?> </li>
		<li class="current"><?php echo $this->Html->link(__('Units'), array('controller' => 'units', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Materials'), array('controller' => 'materials', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Semi Products'), array('controller' => 'semiproducts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Goods'), array('controller' => 'goods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Kits'), array('controller' => 'kits', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Consumables'), array('controller' => 'consumables', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Inventories'), array('controller' => 'inventorys', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Service Products'), array('controller' => 'serviceproducts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Suppliers'), array('controller' => 'suppliers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Articles'), array('controller' => 'articles', 'action' => 'index')); ?> </li>
	</ul>
</div>

<ul class="menu">
<li><?php echo $this->Html->link(__('Warehouses'), array('controller'=> 'warehouseplaces', 'action' => 'index')); ?></li>
<li class="current"><?php echo $this->Html->link(__('Articles'), array('controller'=> 'articles', 'action' => 'index')); ?></li>
<li><?php echo $this->Html->link(__('Users'), array('controller'=> 'users', 'action' => 'index')); ?></li>
<li><?php echo $this->Html->link(__('Log out'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
</ul>
<br>

<div class="goods index">
	<h4 style="color:#00CED1;"><?php echo __('Goods'); ?></h4>
	<table cellpadding="0" cellspacing="0" class="sortable">
	<thead>
	<tr>
			
			<th><?php echo $this->Paginator->sort('code'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('Pid'); ?></th>
			<th><?php echo $this->Paginator->sort('Hts Number'); ?></th>
			<th><?php echo $this->Paginator->sort('Tax Group'); ?></th>
            <th><?php echo $this->Paginator->sort('ECCN'); ?></th>
            <th><?php echo $this->Paginator->sort('Relase Date'); ?></th>
            <th><?php echo $this->Paginator->sort('For Distributors'); ?></th> 
            <th><?php echo $this->Paginator->sort('Product Status'); ?></th>
            
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($goods as $good):?>
	<tr>
		<td><?php echo ($good['Type']['code'] . '-' . $good['Article']['type_number']); ?>&nbsp;</td>
		<td><?php echo ($good['Article']['name']); ?>&nbsp;</td>
		<td><?php echo ($good['Good']['pid']); ?>&nbsp;</td>
        <td><?php echo ($good['Good']['hs_number']); ?>&nbsp;</td>
        <td><?php echo ($good['Good']['tax_group']) . '%'; ?>&nbsp;</td>
        <td><?php echo ($good['Good']['product_eccn']); ?>&nbsp;</td>
        <td><?php echo ($good['Good']['release_date']); ?>&nbsp;</td>
        <td><?php 
            if($good['Good']['for_distributors'] == null){
					echo "<i style='color:red;'> Ne </i>";
				}else{
					echo "<i style = 'color:green;'> Da </i>";
			}; ?>&nbsp;</td>
        <td><?php echo ($good['Good']['product_status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $good['Good']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'save', $good['Good']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $good['Good']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $good['Good']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p><?php echo $this->Html->link(__('Import Goods'), array('controller' => 'goods', 'action' => 'import')); ?></p>
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
		<li><?php echo $this->Html->link(__('New Good'), array('action' => 'save')); ?></li>
		<li><?php echo $this->Html->link(__('Types'), array('controller' => 'types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Units'), array('controller' => 'units', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Materials'), array('controller' => 'materials', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Semi Products'), array('controller' => 'semiproducts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li class="current"><?php echo $this->Html->link(__('Goods'), array('controller' => 'goods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Kits'), array('controller' => 'kits', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Consumables'), array('controller' => 'consumables', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Inventories'), array('controller' => 'inventorys', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Service Products'), array('controller' => 'serviceproducts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Suppliers'), array('controller' => 'suppliers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Articles'), array('controller' => 'articles', 'action' => 'index')); ?> </li>
	</ul>
</div>
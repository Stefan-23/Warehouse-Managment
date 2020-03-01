<div class="types index">

<?php
    echo $this->Form->create("Type", array(
        'url'   => array(
			'controller' => 'types','action' => 'search'
		),
        "id" => "searchForm"
    ));
    echo $this->Form->input("keyword", array(
        "label" => "",
        "type" => "search",
		"placeholder" => "Search...",
		'style'=> 'width:100%;'
    ));
    echo $this->Form->end();  
?>
	<h2><?php echo __('Types'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('code'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('class'); ?></th>
			<th><?php echo $this->Paginator->sort('tangible'); ?></th>
			<th><?php echo $this->Paginator->sort('active'); ?></th>
            <th><?php echo $this->Paginator->sort('created'); ?></th>
            <th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($types as $type): ?>
	<tr>
		<td><?php echo h($type['Type']['id']); ?>&nbsp;</td>
		<td><?php echo h($type['Type']['code']); ?>&nbsp;</td>
		<td><?php echo h($type['Type']['name']); ?>&nbsp;</td>
        <td><?php echo h($type['Type']['class']); ?>&nbsp;</td>
		
		<td><?php if($type['Type']['tangible'] == 1){				// Convert 1 and 0 to char
			echo "<i style='color:green;'> Da </i>";
		}else echo "<i style='color:red;'> Ne </i>"; 
		?>&nbsp;</td>
        <td><?php if($type['Type']['active'] == 1){				
			echo "<i style='color:green;'> Da </i>";
		}else echo "<i style='color:red;'> Ne </i>"; 
		?>&nbsp;</td>
		<td><?php echo h($type['Type']['created']); ?>&nbsp;</td>
		<td><?php echo h($type['Type']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $type['Type']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'save', $type['Type']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $type['Type']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $type['Type']['id']))); ?>
		</td>
	</tr>
<?php endforeach;?>

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
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="menu vertical">
		<li><?php echo $this->Html->link(__('New Type'), array('action' => 'save')); ?></li>
		<li class="current"><?php echo $this->Html->link(__('List Types'), array('controller' => 'types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Units'), array('controller' => 'units', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Materials'), array('controller' => 'materials', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Semi Products'), array('controller' => 'semiproducts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Goods'), array('controller' => 'goods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Kits'), array('controller' => 'kits', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Consumables'), array('controller' => 'consumables', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Inventories'), array('controller' => 'inventorys', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Service Products'), array('controller' => 'serviceproducts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Suppliers'), array('controller' => 'inventorys', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Articles'), array('controller' => 'articles', 'action' => 'index')); ?> </li>
	</ul>
</div>
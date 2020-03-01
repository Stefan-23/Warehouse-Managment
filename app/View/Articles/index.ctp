<ul class="menu">
<li><?php echo $this->Html->link(__('Warehouses'), array('controller'=> 'warehouseplaces', 'action' => 'index')); ?></li>
<li class="current"><?php echo $this->Html->link(__('Articles'), array('controller'=> 'articles', 'action' => 'index')); ?></li>
<li><?php echo $this->Html->link(__('Users'), array('controller'=> 'users', 'action' => 'index')); ?></li>
<li><?php echo $this->Html->link(__('Log out'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
</ul>
<br>
	
	<div class="articles index">
	<?php
     	echo $this->Form->create("Article", array(
        	'url'   => array(
			'controller' => 'articles','action' => 'search'
			),
        	"id" => "searchForm"
    ));
    	echo $this->Form->input("keyword", array(  			//search form....
        	"label" => "",
        	"type" => "search",
			"placeholder" => "Search...",
			'style'=> 'width:100%;'
    ));
    	echo $this->Form->end(); 
	?>
	
	
	<h4 style="color:#00CED1;"><?php echo __('Articles'); ?></h4>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('code'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('weight'); ?></th>
			<th><?php echo $this->Paginator->sort('unit_id'); ?></th>
            <th><?php echo $this->Paginator->sort('type'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
			
	</tr>
	</thead>
	<tbody>
	<?php foreach ($articles as $article): ?>
	<tr>
		<td><?php echo h($article['Type']['code'] . '-' . $article['Article']['type_number'])?>&nbsp;</td>
		<td><?php echo h($article['Article']['name']); ?>&nbsp;</td>
        <td><?php echo h($article['Article']['description']); ?>&nbsp;</td>
		<td><?php echo h($article['Article']['weight']); ?>&nbsp;</td>
		<td><?php echo h($article['Unit']['symbol']); ?>&nbsp;</td>
		<td><?php echo h($article['Type']['name']); ?>&nbsp;</td>
	<?php // Here put reversed logic ?>
		<td class="actions">
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $article['Article']['id']), array('confirm' => __('Are you sure you want to delete  %s?', $article['Article']['name']))); ?>
		</td>
		
		
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total')
	));
	?>	</p>

		<button id='btn' class='small' ><?php echo $this->Html->link(__('Export-Excel'), array('controller' => 'articles', 'action' => 'export')); ?> </button>
		<button id='btn' class='small' 	><?php echo $this->Html->link(__('Export-Pdf'), array('controller' => 'articles', 'action' => 'pdfExport')); ?> </button>

	<div class="paging">
	<button class='small' href=""><?php echo $this->Paginator->prev(__('Previous'), array(), null, array('class' => 'prev disabled')); ?></button>
	<?php echo $this->Paginator->numbers(array('separator' => '')); ?>
	<button class='small' href=""><?php echo $this->Paginator->next(__('Next'), array(), null, array('class' => 'next disabled')); ?></button>
	
	</div>
</div>
<div class="actions">
	<h4 style='color:#2c6877;'><?php echo __('Actions'); ?></h4>
	<ul class="menu vertical">
		<li><?php echo $this->Html->link(__('Types'), array('controller' => 'types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Units'), array('controller' => 'units', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Materials'), array('controller' => 'materials', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Semi Products'), array('controller' => 'semiproducts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Goods'), array('controller' => 'goods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Kits'), array('controller' => 'kits', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Consumables'), array('controller' => 'consumables', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Inventories'), array('controller' => 'inventorys', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Service Products'), array('controller' => 'serviceproducts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Suppliers'), array('controller' => 'suppliers', 'action' => 'index')); ?> </li>
		<li class="current"><?php echo $this->Html->link(__('Articles'), array('controller' => 'articles', 'action' => 'index')); ?> </li>
	</ul>
</div>
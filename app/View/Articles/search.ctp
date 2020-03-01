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
	<h3><?php echo __('Articles'); ?></h3>
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
	<?php	 ?>
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
		<li ><?php echo $this->Html->link(__('List Articles'), array('controller' => 'articles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Article Managment'), array('controller' => 'types', 'action' => 'index')); ?> </li>
	</ul>
</div>
<ul class="menu">
<li><a href="">Warehouses</a></li>
<li><?php echo $this->Html->link(__('Articles'), array('controller'=> 'articles', 'action' => 'index')); ?></li>
<li class="current"><a href="">Users</a></li>
<li><?php echo $this->Html->link(__('Log out'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
</ul>
<br>

<div class="users index">
    <h4><?php echo __('Groups'); ?></h4>
	<table cellpadding="0" cellspacing="0" >
	<thead>
	<tr>	
			<th><?php echo $this->Paginator->sort('name'); ?></th>
            <th><?php echo $this->Paginator->sort('created'); ?></th>
            <th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($groups as $group): ?>
	<tr>
		<td><?php echo ($group['Group']['name']); ?>&nbsp;</td>
		<td><?php echo ($group['Group']['created']); ?>&nbsp;</td>
		<td><?php echo ($group['Group']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $group['Group']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'save', $group['Group']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $group['Group']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $group['Group']['name']))); ?>
		</td>
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
	<ul  class="menu vertical left">
		<li><?php echo $this->Html->link(__('New Group'), array('action' => 'save')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li class = 'current'><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		
    </ul>
    
    
</div>

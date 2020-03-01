<div class="articles view">
<h2><?php 

print_r($result);

exit;


echo __('Article'); ?></h2>
	<dl>
		<dt><?php echo __('Id:'); ?></dt>
		<dd>
			<?php echo h($article['Article']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code:'); ?></dt>
		<dd>
			<?php echo h($article['Type']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name:'); ?></dt>
		<dd>
			<?php echo h($article['Article']['name']); ?>
			&nbsp;
		</dd>

        <dt><?php echo __('Description:'); ?></dt>
		<dd>
			<?php echo h($article['Article']['description']); ?>
			&nbsp;
		</dd>
        
		<dt><?php echo __('Weight:'); ?></dt>
		<dd>
			<?php if($article['Article']['weight'] == null){
				echo "<i style= 'color:orange'> Tezina nije definisana </i>";
			}else{
				echo $article['Article']['weight'];
			} ?>
			&nbsp;
		</dd>
        <dt><?php echo __('Unit:'); ?></dt>
		<dd>
			<?php echo h($article['Unit']['name']); ?>
			&nbsp;
		</dd>
        <dt><?php echo __('Reversed:'); ?></dt>
		<dd>
		<?php  if($article['Article']['reversed'] == null){
				echo "<i style='color:orange;'> Nije storniran </i>";
			}else{
				echo "<i style = 'color:green;'> Storniran </i>";
			}
		?>&nbsp;
		</dd>

        <dt><?php echo __('Created:'); ?></dt>
		<dd>
			<?php echo h($article['Article']['created']); ?>
			&nbsp;
		</dd>
        <dt><?php echo __('Modified:'); ?></dt>
		<dd>
			<?php echo h($article['Article']['modified']); ?>
			&nbsp;
		</dd>
</div>
<div class="units view">
<h2><?php echo __('Unit'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($unit['Unit']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($unit['Unit']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Symbol'); ?></dt>
		<dd>
			<?php echo h($unit['Unit']['symbol']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
		<?php if($unit['Unit']['active'] == 1){				// Convert 1 and 0 to char
			echo "<i style='color:green;'> Aktivno </i>";
		}else echo "<i style='color:red;'> Neaktivno </i>"; ?>
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($unit['Unit']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>

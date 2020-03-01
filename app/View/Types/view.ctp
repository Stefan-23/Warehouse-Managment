<div class="types view">
<h2><?php echo __('Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id:'); ?></dt>
		<dd>
			<?php echo h($type['Type']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code:'); ?></dt>
		<dd>
			<?php echo h($type['Type']['code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name:'); ?></dt>
		<dd>
			<?php echo h($type['Type']['name']); ?>
			&nbsp;
		</dd>

        <dt><?php echo __('Class:'); ?></dt>
		<dd>
			<?php echo h($type['Type']['class']); ?>
			&nbsp;
		</dd>
        
		<dt><?php echo __('Tangible:'); ?></dt>
		<dd>
        <?php if($type['Type']['tangible'] == 1){				// Convert 1 and 0 to char
			echo "<i style='color:green;'> Proizvod je opipljiv. </i>";
        }else echo "<i style='color:red;'> Proizvod nije opipljiv ali usluga jeste. </i>"; 
        ?>
		</dd>
        <dt><?php echo __('Active:'); ?></dt>
        <dd>
        <?php if($type['Type']['active'] == 1){				// Convert 1 and 0 to char
			echo "<i style='color:green;'> Aktivno </i>";
		}else echo "<i style='color:red;'> Neaktivno </i>"; ?>
		</dd>
	</dl>
</div>
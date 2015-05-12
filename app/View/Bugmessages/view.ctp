
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
			
			<ul class="list-group">			
						<li class="list-group-item"><?php echo $this->Html->link(__('Edit Bugmessage'), array('action' => 'edit', $bugmessage['Bugmessage']['id']), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Form->postLink(__('Delete Bugmessage'), array('action' => 'delete', $bugmessage['Bugmessage']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $bugmessage['Bugmessage']['id'])); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Bugmessages'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Bugmessage'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Bugs'), array('controller' => 'bugs', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Bug'), array('controller' => 'bugs', 'action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- /.list-group -->
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .span3 -->
	
	<div id="page-content" class="col-sm-9">
		
		<div class="bugmessages view">

			<h2><?php  echo __('Bugmessage'); ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($bugmessage['Bugmessage']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Bug'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($bugmessage['Bug']['name'], array('controller' => 'bugs', 'action' => 'view', $bugmessage['Bug']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Message'); ?></strong></td>
		<td>
			<?php echo h($bugmessage['Bugmessage']['message']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
		<td>
			<?php echo h($bugmessage['Bugmessage']['created']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
		<td>
			<?php echo h($bugmessage['Bugmessage']['modified']); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->

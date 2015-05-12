<?php 
	switch( $task['Task']['status'] ){
		case 'Nova':
		$class = 'label-default';
		break;
		case 'Executando':
		$class = 'label-warning';
		break;
		case 'Enviada para teste':
		$class = 'label-info';
		break;								
		case 'Testando':
		$class = 'label-primary';
		break;												
		default:
		$class = 'label-success';
		break;
	}
?>
<div id="page-container" class="row">

    <div id="page-content" class="col-sm-12">

        <div class="tasks view">
            <?php
                $this->Html->addCrumb('Tarefas', '/tasks');
                $this->Html->addCrumb('Detalhes');
                echo $this->element('breadcrumbs');
            ?>
            <h2><?php echo __('Tarefa'); ?></h2>
			
			<div class="bs-example" style='margin-bottom: 10px'>
				<span class="label label-default">Nova</span>				
				<span class="label label-warning">Executando</span>				
				<span class="label label-info">Enviada para teste</span>
				<span class="label label-primary">Testando</span>
				<span class="label label-success">Finalizada</span>	
			</div>				

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>		
                            <td><strong><?php echo __('Id'); ?></strong></td>
                            <td>
                                <?php echo h($task['Task']['id']); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('Usuário'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($task['User']['name'], array('controller' => 'users', 'action' => 'view', $task['User']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('Projeto'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($task['Project']['name'], array('controller' => 'projects', 'action' => 'view', $task['Project']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('Nome'); ?></strong></td>
                            <td>
                                <?php echo h($task['Task']['name']); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('Descrição'); ?></strong></td>
                            <td>
                                <?php echo h($task['Task']['descriptions']); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('Pré-condição'); ?></strong></td>
                            <td>
                                <?php echo h($task['Task']['precondition']); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('Pós-condição'); ?></strong></td>
                            <td>
                                <?php echo h($task['Task']['postcondition']); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('Status'); ?></strong></td>
                            <td>
								<span class = 'label <?php echo $class ?>' >
                                	<?php echo h($task['Task']['status']); ?>
                                	&nbsp;
								</span>
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('Previsão para início da execução desta tarefa em'); ?></strong></td>
                            <td>
                                <?php echo h($task['Task']['startFormated']); ?>
                                &nbsp;
                            </td>
                        </tr>                           
                        <tr>		
                            <td><strong><?php echo __('Previsão para término em'); ?></strong></td>
                            <td>
                                <?php echo h($task['Task']['finishFormated']); ?>
                                &nbsp;
                            </td>
                        </tr>                        
                        <tr>		
                            <td><strong><?php echo __('Criado em'); ?></strong></td>
                            <td>
                                <?php echo h($task['Task']['createdFormated']); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('Modificado em'); ?></strong></td>
                            <td>
                                <?php echo h($task['Task']['modifiedFormated']); ?>
                                &nbsp;
                            </td>
                        </tr>					
                    </tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->


        <div class="related">

            <h3><?php echo __('Mensagens relatadas'); ?></h3>

            <?php if (!empty($task['Taskmessage'])): ?>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th><?php echo __('Id'); ?></th>
                                <th><?php echo __('Task Id'); ?></th>
                                <th><?php echo __('Message'); ?></th>
                                <th><?php echo __('Created'); ?></th>
                                <th><?php echo __('Modified'); ?></th>
                                <th class="actions"><?php echo __('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($task['Taskmessage'] as $taskmessage):
                                ?>
                                <tr>
                                    <td><?php echo $taskmessage['id']; ?></td>
                                    <td><?php echo $taskmessage['task_id']; ?></td>
                                    <td><?php echo $taskmessage['message']; ?></td>
                                    <td><?php echo $taskmessage['created']; ?></td>
                                    <td><?php echo $taskmessage['modified']; ?></td>
                                    <td class="actions">
                                        <?php echo $this->Html->link(__('View'), array('controller' => 'taskmessages', 'action' => 'view', $taskmessage['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                        <?php echo $this->Html->link(__('Edit'), array('controller' => 'taskmessages', 'action' => 'edit', $taskmessage['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                        <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'taskmessages', 'action' => 'delete', $taskmessage['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $taskmessage['id'])); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table><!-- /.table table-striped table-bordered -->
                </div><!-- /.table-responsive -->

<?php endif; ?>


            <div class="actions">
<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('Nova mensagem'), array('controller' => 'taskmessages', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- /.actions -->

        </div><!-- /.related -->


    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->

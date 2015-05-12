<?php 
	$project_id = ( isset( $this->request->query['project_id'] ) ) 
		? $this->request->query['project_id'] : null;

	$user_id = ( isset( $this->request->query['user_id'] ) ) 
		? $this->request->query['user_id'] : null;

	$status_id = ( isset( $this->request->query['status_id'] ) ) 
		? $this->request->query['status_id'] : null;
?>

<div id="page-container" class="row">

    <div id="page-content" class="col-sm-12">

        <div class="tasks index">
            <?php
            $this->Html->addCrumb('Tarefas');
            echo $this->element('breadcrumbs');
            ?>

            <h2><?php echo __('Tarefas'); ?></h2>
			
			<div class="bs-example">
				<span class="label label-default">Nova</span>				
				<span class="label label-warning">Executando</span>				
				<span class="label label-info">Enviada para teste</span>
				<span class="label label-primary">Testando</span>
				<span class="label label-success">Finalizada</span>	
			</div>	
			
			<br clear='both' />		

            <div class="table-responsive">
				
				<?php 
					echo $this->Form->create(
						'Task', 
						array(
							'type' => 'get', 
							'style' => 'float: left; margin: 10px 0px'
						)
					);
					echo $this->Form->select(
						'project_id', 
						$projects, 
						array( 
							'class' => 'form-control', 
							'style'=> 'width: 200px; height: 30px; padding-top: 4px; float: left', 
							'empty' => 'Filtrar por projeto', 
							'default' => $project_id,
							'onChange' => "document.getElementById('TaskIndexForm').submit()"
						)
					);
					echo $this->Form->select(
						'user_id', 
						$users, 
						array( 
							'class' => 'form-control', 
							'style'=> 'width: 200px; height: 30px; padding-top: 4px; float: left', 
							'empty' => 'Filtrar por usuário', 
							'default' => $user_id,
							'onChange' => "document.getElementById('TaskIndexForm').submit()"
						)
					);
					echo $this->Form->select(
						'status_id', 
						$status, 
						array( 
							'class' => 'form-control', 
							'style'=> 'width: 200px; height: 30px; padding-top: 4px; float: left', 
							'empty' => 'Filtrar por status', 
							'default' => $status_id,
							'onChange' => "document.getElementById('TaskIndexForm').submit()"
						)
					);

					echo $this->Form->end();

					echo $this->Html->link( 
						'Novo registro', 
						array( 
							'controller' => $this->request->params['controller'], 
							'action' => 'add' 
						),
						array(
							'class' => 'btn btn-sm btn-default',
							'style' => 'float: right; margin: 10px 0px'
						)
					);
				?>
				<br clear='both' />
				
                <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th><?php echo $this->Paginator->sort('id'); ?></th>
                            <th><?php echo $this->Paginator->sort('user_id', __('Usuário')); ?></th>
                            <th><?php echo $this->Paginator->sort('project_id', __('Projeto')); ?></th>
                            <th><?php echo $this->Paginator->sort('name', __('Nome da tarefa')); ?></th>
                            <th><?php echo $this->Paginator->sort('status'); ?></th>
                            <th><?php echo $this->Paginator->sort('createdDate', __('Criado em')); ?></th>
                            <th><?php echo $this->Paginator->sort('modifiedDate', __('Alterado em')); ?></th>
                            <th class="actions"><?php echo __('Ação'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
							foreach ($tasks as $task): 

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
                            <tr>
                                <td><?php echo h($task['Task']['id']); ?>&nbsp;</td>
                                <td>
                                    <?php echo $this->Html->link($task['User']['name'], array('controller' => 'users', 'action' => 'view', $task['User']['id'])); ?>
                                </td>
                                <td>
                                    <?php echo $this->Html->link($task['Project']['name'], array('controller' => 'projects', 'action' => 'view', $task['Project']['id'])); ?>
                                </td>
                                <td><?php echo h($task['Task']['name']); ?>&nbsp;</td>
                                <td>
									<span class = 'label <?php echo $class ?>' >
										<?php echo h($task['Task']['status']); ?>&nbsp;
									</span>
								</td>
                                <td><?php echo h($task['Task']['createdDate']); ?>&nbsp;</td>
                                <td><?php echo h($task['Task']['modifiedDate']); ?>&nbsp;</td>
                                <td class="actions">
                                    <?php echo $this->Html->link(__('Detalhes'), array('action' => 'view', $task['Task']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                    <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $task['Task']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                    <?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $task['Task']['id']), array('class' => 'btn btn-default btn-xs'), __( $messageConfirmDelete, $task['Task']['id'])); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div><!-- /.table-responsive -->

            <p><small>
                    <?php echo $this->Paginator->counter( array( 'format' => __( $messagePaginatorDisplay ) ) ) ?>
                </small></p>

            <ul class="pagination">
                <?php
                echo $this->Paginator->prev('< ' . __('Previous'), array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
                echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));
                echo $this->Paginator->next(__('Next') . ' >', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
                ?>
            </ul><!-- /.pagination -->

        </div><!-- /.index -->

    </div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->
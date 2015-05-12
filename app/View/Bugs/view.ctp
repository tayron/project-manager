<?php

	switch( $bug['Bug']['status'] ){
		case 'Novo':
			$class = 'label-danger';
			break;
		case 'Resolvendo':
			$class = 'label-warning';
			break;
		case 'Enviado para teste':
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

        <div class="bugs view">
            <?php
                $this->Html->addCrumb('Bugs', '/bugs');
                $this->Html->addCrumb('Detalhes');
                echo $this->element('breadcrumbs');
            ?>
            
            <h2><?php echo __('Bug'); ?></h2>
			
			<div class="bs-example" style='margin-bottom:10px'>
				<span class="label label-danger">Novo</span>				
				<span class="label label-warning">Resolvendo</span>				
				<span class="label label-info">Enviado para teste</span>
				<span class="label label-primary">Testando</span>
				<span class="label label-success">Resolvido</span>	
			</div>			

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>		
                            <td><strong><?php echo __('Id'); ?></strong></td>
                            <td>
                                <?php echo h($bug['Bug']['id']); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('Usuário'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($bug['User']['name'], array('controller' => 'users', 'action' => 'view', $bug['User']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('Projeto'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($bug['Project']['name'], array('controller' => 'projects', 'action' => 'view', $bug['Project']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('Nome'); ?></strong></td>
                            <td>
                                <?php echo h($bug['Bug']['name']); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('Descrição'); ?></strong></td>
                            <td>
                                <?php echo h($bug['Bug']['descritions']); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('Pré-condição'); ?></strong></td>
                            <td>
                                <?php echo h($bug['Bug']['precondition']); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('Pós-condição'); ?></strong></td>
                            <td>
                                <?php echo h($bug['Bug']['postcondition']); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('Status'); ?></strong></td>
                            <td>
								<span class = 'label <?php echo $class ?>' >
                                	<?php echo h($bug['Bug']['status']); ?>
                                	&nbsp;
								</span>
                            </td>
                        </tr>
                       <tr>		
                            <td><strong><?php echo __('Previsão para início da resolução deste bug em'); ?></strong></td>
                            <td>
                                <?php echo h($bug['Bug']['startFormated']); ?>
                                &nbsp;
                            </td>
                        </tr>                         
                       <tr>		
                            <td><strong><?php echo __('Previsão para término em'); ?></strong></td>
                            <td>
                                <?php echo h($bug['Bug']['finishFormated']); ?>
                                &nbsp;
                            </td>
                        </tr>                         
                        <tr>		
                            <td><strong><?php echo __('Criado em'); ?></strong></td>
                            <td>
                                <?php echo h($bug['Bug']['createdFormated']); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('Modificado em'); ?></strong></td>
                            <td>
                                <?php echo h($bug['Bug']['modifiedFormated']); ?>
                                &nbsp;
                            </td>
                        </tr>					</tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->


        <div class="related">

            <h3><?php echo __('Mensagens relatadas'); ?></h3>

            <?php if (!empty($bug['Bugmessage'])): ?>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th><?php echo __('Id'); ?></th>
                                <th><?php echo __('Bug Id'); ?></th>
                                <th><?php echo __('Message'); ?></th>
                                <th><?php echo __('Created'); ?></th>
                                <th><?php echo __('Modified'); ?></th>
                                <th class="actions"><?php echo __('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($bug['Bugmessage'] as $bugmessage):
                                ?>
                                <tr>
                                    <td><?php echo $bugmessage['id']; ?></td>
                                    <td><?php echo $bugmessage['bug_id']; ?></td>
                                    <td><?php echo $bugmessage['message']; ?></td>
                                    <td><?php echo $bugmessage['created']; ?></td>
                                    <td><?php echo $bugmessage['modified']; ?></td>
                                    <td class="actions">
                                        <?php echo $this->Html->link(__('View'), array('controller' => 'bugmessages', 'action' => 'view', $bugmessage['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                        <?php echo $this->Html->link(__('Edit'), array('controller' => 'bugmessages', 'action' => 'edit', $bugmessage['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                        <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'bugmessages', 'action' => 'delete', $bugmessage['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $bugmessage['id'])); ?>
                                    </td>
                                </tr>
    <?php endforeach; ?>
                        </tbody>
                    </table><!-- /.table table-striped table-bordered -->
                </div><!-- /.table-responsive -->

<?php endif; ?>


            <div class="actions">
<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('Nova mensagem'), array('controller' => 'bugmessages', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- /.actions -->

        </div><!-- /.related -->


    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->

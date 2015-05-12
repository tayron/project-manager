
<div id="page-container" class="row">

    <div id="page-content" class="col-sm-12">

        <div class="projects view">
            <?php
                $this->Html->addCrumb('Projetos', '/projects');
                $this->Html->addCrumb('Detalhes');
                echo $this->element('breadcrumbs');
            ?>
			<h2><?php echo __("Projeto {$project['Project']['name']}"); ?></h2>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>		
                            <td><strong><?php echo __('Id'); ?></strong></td>
                            <td>
                                <?php echo h($project['Project']['id']); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('Cliente'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($project['Client']['name'], array('controller' => 'clients', 'action' => 'view', $project['Client']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('Categoria'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($project['Category']['name'], array('controller' => 'categories', 'action' => 'view', $project['Category']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		
                            <td><strong><?php echo __('Nome'); ?></strong></td>
                            <td>
                                <?php echo h($project['Project']['name']); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('Problema'); ?></strong></td>
                            <td>
                                <?php echo h($project['Project']['problems']); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('Solução'); ?></strong></td>
                            <td>
                                <?php echo h($project['Project']['solutions']); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('Descrição'); ?></strong></td>
                            <td>
                                <?php echo h($project['Project']['descriptions']); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('Criado em'); ?></strong></td>
                            <td>
                                <?php echo h($project['Project']['created']); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('Alterado em'); ?></strong></td>
                            <td>
                                <?php echo h($project['Project']['modified']); ?>
                                &nbsp;
                            </td>
                        </tr>					</tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->


        <div class="related">

            <h3><?php echo __('Bugs relatados'); ?></h3>

            <?php if (!empty($project['Bug'])): ?>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th><?php echo __('Id'); ?></th>
                                <th><?php echo __('Usuário'); ?></th>                                
                                <th><?php echo __('Nome'); ?></th>
                                <th><?php echo __('Descrição'); ?></th>
                                <th><?php echo __('Pré-condição'); ?></th>
                                <th><?php echo __('Pós-condição'); ?></th>
                                <th><?php echo __('Status'); ?></th>
                                <th><?php echo __('Criado em'); ?></th>
                                <th><?php echo __('Alterado em'); ?></th>
                                <th class="actions"><?php echo __('Ação'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($project['Bug'] as $bug):
                                ?>
                                <tr>
                                    <td><?php echo $bug['id']; ?></td>
                                    <td><?php echo $bug['User']['name']; ?></td>                                    
                                    <td><?php echo $bug['name']; ?></td>
                                    <td><?php echo $bug['descritions']; ?></td>
                                    <td><?php echo $bug['precondition']; ?></td>
                                    <td><?php echo $bug['postcondition']; ?></td>
                                    <td><?php echo $bug['status']; ?></td>
                                    <td><?php echo $bug['created']; ?></td>
                                    <td><?php echo $bug['modified']; ?></td>
                                    <td class="actions">
                                        <?php echo $this->Html->link(__('View'), array('controller' => 'bugs', 'action' => 'view', $bug['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                        <?php echo $this->Html->link(__('Edit'), array('controller' => 'bugs', 'action' => 'edit', $bug['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                        <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'bugs', 'action' => 'delete', $bug['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $bug['id'])); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table><!-- /.table table-striped table-bordered -->
                </div><!-- /.table-responsive -->

            <?php endif; ?>


            <div class="actions">
                <?php echo $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('Novo bug'), array('controller' => 'bugs', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- /.actions -->

        </div><!-- /.related -->


        <div class="related">

            <h3><?php echo __('Chamados relatados'); ?></h3>

            <?php if (!empty($project['Called'])): ?>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th><?php echo __('Id'); ?></th>
                                <th><?php echo __('Usuário'); ?></th>
                                <th><?php echo __('Titulo'); ?></th>
                                <th><?php echo __('Descrição'); ?></th>
                                <th><?php echo __('Criado em'); ?></th>
                                <th><?php echo __('Alterado em'); ?></th>
                                <th class="actions"><?php echo __('Ação'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($project['Called'] as $called):
                                ?>
                                <tr>
                                    <td><?php echo $called['id']; ?></td>
                                    <td><?php echo $called['User']['name']; ?></td>
                                    <td><?php echo $called['title']; ?></td>
                                    <td><?php echo $called['description']; ?></td>
                                    <td><?php echo $called['created']; ?></td>
                                    <td><?php echo $called['modified']; ?></td>
                                    <td class="actions">
                                        <?php echo $this->Html->link(__('View'), array('controller' => 'calleds', 'action' => 'view', $called['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                        <?php echo $this->Html->link(__('Edit'), array('controller' => 'calleds', 'action' => 'edit', $called['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                        <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'calleds', 'action' => 'delete', $called['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $called['id'])); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table><!-- /.table table-striped table-bordered -->
                </div><!-- /.table-responsive -->

            <?php endif; ?>


            <div class="actions">
                <?php echo $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('Novo chamado'), array('controller' => 'calleds', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- /.actions -->

        </div><!-- /.related -->


        <div class="related">

            <h3><?php echo __('Tarefas relatadas'); ?></h3>

            <?php if (!empty($project['Task'])): ?>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th><?php echo __('Id'); ?></th>
                                <th><?php echo __('Usuário'); ?></th>
                                <th><?php echo __('Nome'); ?></th>
                                <th><?php echo __('Descrição'); ?></th>
                                <th><?php echo __('Pré-condição'); ?></th>
                                <th><?php echo __('Pós-condição'); ?></th>
                                <th><?php echo __('Status'); ?></th>
                                <th><?php echo __('Criado em'); ?></th>
                                <th><?php echo __('Alterado em'); ?></th>
                                <th class="actions"><?php echo __('Ação'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($project['Task'] as $task):
                                ?>
                                <tr>
                                    <td><?php echo $task['id']; ?></td>
                                    <td><?php echo $task['User']['name']; ?></td>
                                    <td><?php echo $task['name']; ?></td>
                                    <td><?php echo $task['descriptions']; ?></td>
                                    <td><?php echo $task['precondition']; ?></td>
                                    <td><?php echo $task['postcondition']; ?></td>
                                    <td><?php echo $task['status']; ?></td>
                                    <td><?php echo $task['created']; ?></td>
                                    <td><?php echo $task['modified']; ?></td>
                                    <td class="actions">
                                        <?php echo $this->Html->link(__('View'), array('controller' => 'tasks', 'action' => 'view', $task['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                        <?php echo $this->Html->link(__('Edit'), array('controller' => 'tasks', 'action' => 'edit', $task['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                        <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'tasks', 'action' => 'delete', $task['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $task['id'])); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table><!-- /.table table-striped table-bordered -->
                </div><!-- /.table-responsive -->

            <?php endif; ?>


            <div class="actions">
                <?php echo $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('Nova tarefa'), array('controller' => 'tasks', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- /.actions -->

        </div><!-- /.related -->


    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->

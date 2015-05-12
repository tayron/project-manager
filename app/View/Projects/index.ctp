
<div id="page-container" class="row">

    <div id="page-content" class="col-sm-12">

        <div class="projects index">
            <?php
            $this->Html->addCrumb('Projetos');
            echo $this->element('breadcrumbs');
            ?>

            <h2><?php echo __('Projetos'); ?></h2>

            <div class="table-responsive">
                <?php
                echo $this->Html->link(
                        'Categorias', array(
                    'controller' => 'categories',
                    'action' => 'index'
                        ), array(
                    'class' => 'btn btn-sm btn-default',
                    'style' => 'float: right; margin: 10px 0px'
                        )
                );
                echo $this->Html->link(
                        'Novo registro', array(
                    'controller' => $this->request->params['controller'],
                    'action' => 'add'
                        ), array(
                    'class' => 'btn btn-sm btn-default',
                    'Grupo de usuários', 'style' => 'float: right; margin: 10px 0px'
                        )
                );
                ?>

                <br clear='both' />

                <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th><?php echo $this->Paginator->sort('id'); ?></th>
                            <th><?php echo $this->Paginator->sort('client_id', __('Cliente')); ?></th>
                            <th><?php echo $this->Paginator->sort('category_id', __('Categoria')); ?></th>
                            <th><?php echo $this->Paginator->sort('name', __('Nome do projeto')); ?></th>
                            <th><?php echo $this->Paginator->sort('createdDate', __('Criado em')); ?></th>
                            <th><?php echo $this->Paginator->sort('modifiedDate', __('Alterado em')); ?></th>
                            <th class="actions"><?php echo __('Ação'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($projects as $project): ?>
                            <tr>
                                <td><?php echo h($project['Project']['id']); ?>&nbsp;</td>
                                <td>
                                    <?php echo $this->Html->link($project['Client']['name'], array('controller' => 'clients', 'action' => 'view', $project['Client']['id'])); ?>
                                </td>
                                <td>
                                    <?php echo $this->Html->link($project['Category']['name'], array('controller' => 'categories', 'action' => 'view', $project['Category']['id'])); ?>
                                </td>
                                <td><?php echo h($project['Project']['name']); ?>&nbsp;</td>
                                <td><?php echo h($project['Project']['createdDate']); ?>&nbsp;</td>
                                <td><?php echo h($project['Project']['modifiedDate']); ?>&nbsp;</td>
                                <td class="actions">
                                    <?php echo $this->Html->link(__('Tarefas'), array('controller' => 'frames', 'action' => 'viewTasks', $project['Project']['id']), array('class' => 'btn btn-default btn-xs')); ?>                    
                                    <?php echo $this->Html->link(__('Bugs'), array('controller' => 'frames', 'action' => 'viewBugs', $project['Project']['id']), array('class' => 'btn btn-default btn-xs')); ?>                    
                                    <?php echo $this->Html->link(__('Detalhes'), array('action' => 'view', $project['Project']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                    <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $project['Project']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                    <?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $project['Project']['id']), array('class' => 'btn btn-default btn-xs'), __($messageConfirmDelete, $project['Project']['id'])); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div><!-- /.table-responsive -->

            <p><small>
                    <?php echo $this->Paginator->counter(array('format' => __($messagePaginatorDisplay))) ?>
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
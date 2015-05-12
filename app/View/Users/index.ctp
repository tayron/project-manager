
<div id="page-container" class="row">

    <div id="page-content" class="col-sm-12">

        <div class="users index">

            <?php
            $this->Html->addCrumb('Usuários');
            echo $this->element('breadcrumbs');
            ?>

            <h2><?php echo __('Usuários'); ?></h2>

            <div class="table-responsive">
                <?php
                echo $this->Html->link(
                        'Grupo de usuários', array(
                    'controller' => 'groups',
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
                            <th><?php echo $this->Paginator->sort('group_id', __('Grupo')); ?></th>
                            <th><?php echo $this->Paginator->sort('name', __('Nome')); ?></th>
                            <th><?php echo $this->Paginator->sort('username', __('Usuário')); ?></th>
                            <th><?php echo $this->Paginator->sort('createdDate', __('Criado em')); ?></th>
                            <th><?php echo $this->Paginator->sort('modifiedDate', __('Modificado em')); ?></th>
                            <th class="actions"><?php echo __('Ação'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
<?php foreach ($users as $user): ?>
                            <tr>
                                <td><?php echo h($user['User']['id']); ?>&nbsp;</td>
                                <td>
                            <?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
                                </td>
                                <td><?php echo h($user['User']['name']); ?>&nbsp;</td>
                                <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
                                <td><?php echo h($user['User']['createdDate']); ?>&nbsp;</td>
                                <td><?php echo h($user['User']['modifiedDate']); ?>&nbsp;</td>
                                <td class="actions">
    <?php echo $this->Html->link(__('Detalhes'), array('action' => 'view', $user['User']['id']), array('class' => 'btn btn-default btn-xs')); ?>
    <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $user['User']['id']), array('class' => 'btn btn-default btn-xs')); ?>
    <?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $user['User']['id']), array('class' => 'btn btn-default btn-xs'), __($messageConfirmDelete, $user['User']['id'])); ?>
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

<div id="page-container" class="row">

    <div id="page-content" class="col-sm-12">

        <div class="users index">

            <?php
            $this->Html->addCrumb('Grupos');
            echo $this->element('breadcrumbs');
            ?>

            <h2><?php echo __('Grupos'); ?></h2>

            <div class="table-responsive">
                <?php
                echo $this->Html->link(
                        'Usuários do sistema', array(
                    'controller' => 'users',
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
                    'style' => 'float: right; margin: 10px 0px'
                        )
                );
                ?>

                <br clear='both' />

                <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th><?php echo $this->Paginator->sort('id'); ?></th>
                            <th><?php echo $this->Paginator->sort('name', 'Nome'); ?></th>
                            <th><?php echo $this->Paginator->sort('createdDate', 'Criado em'); ?></th>
                            <th><?php echo $this->Paginator->sort('modifiedDate', 'Alterado em'); ?></th>
                            <th class="actions"><?php echo __('Ação'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
<?php foreach ($groups as $group): ?>
                            <tr>
                                <td><?php echo h($group['Group']['id']); ?>&nbsp;</td>
                                <td><?php echo h($group['Group']['name']); ?>&nbsp;</td>
                                <td><?php echo h($group['Group']['createdDate']); ?>&nbsp;</td>
                                <td><?php echo h($group['Group']['modifiedDate']); ?>&nbsp;</td>
                                <td class="actions">
    <?php echo $this->Html->link(__('Detalhes'), array('action' => 'view', $group['Group']['id']), array('class' => 'btn btn-default btn-xs')); ?>
    <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $group['Group']['id']), array('class' => 'btn btn-default btn-xs')); ?>
    <?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $group['Group']['id']), array('class' => 'btn btn-default btn-xs'), __($messageConfirmDelete, $group['Group']['id'])); ?>
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
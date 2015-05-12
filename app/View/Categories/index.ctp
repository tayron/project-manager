
<div id="page-container" class="row">

    <div id="page-content" class="col-sm-12">

        <div class="categories index">
            <?php
            $this->Html->addCrumb('Categorias');
            echo $this->element('breadcrumbs');
            ?>

            <h2><?php echo __('Categorias'); ?></h2>

            <div class="table-responsive">
                <?php
                echo $this->Html->link(
                        'Gerenciar projetos', array(
                    'controller' => 'projects',
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
                        <?php foreach ($categories as $category): ?>
                            <tr>
                                <td><?php echo h($category['Category']['id']); ?>&nbsp;</td>
                                <td><?php echo h($category['Category']['name']); ?>&nbsp;</td>
                                <td><?php echo h($category['Category']['createdDate']); ?>&nbsp;</td>
                                <td><?php echo h($category['Category']['modifiedDate']); ?>&nbsp;</td>
                                <td class="actions">
                                    <?php echo $this->Html->link(__('Detalhes'), array('action' => 'view', $category['Category']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                    <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $category['Category']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                    <?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $category['Category']['id']), array('class' => 'btn btn-default btn-xs'), __($messageConfirmDelete, $category['Category']['id'])); ?>
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
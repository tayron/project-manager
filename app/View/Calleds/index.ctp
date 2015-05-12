
<div id="page-container" class="row">

    <div id="page-content" class="col-sm-12">

        <div class="calleds index">
            <?php
            $this->Html->addCrumb('Chamados');
            echo $this->element('breadcrumbs');
            ?>		
            <h2><?php echo __('Chamados'); ?></h2>

            <div class="table-responsive">
                <?php echo $this->element( 'botao_novo_registro_index' )?>
                <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th><?php echo $this->Paginator->sort('id'); ?></th>
                            <th><?php echo $this->Paginator->sort('project_id', __('Projeto')); ?></th>
                            <th><?php echo $this->Paginator->sort('user_id', __('Usuário')); ?></th>
                            <th><?php echo $this->Paginator->sort('title', __('Título')); ?></th>
                            <th><?php echo $this->Paginator->sort('status'); ?></th>
                            <th><?php echo $this->Paginator->sort('createdDate', __('Criado em')); ?></th>
                            <th><?php echo $this->Paginator->sort('modifiedDate', __('Modificado em')); ?></th>
                            <th class="actions"><?php echo __('Ação'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($calleds as $called): ?>
                            <tr>
                                <td><?php echo h($called['Called']['id']); ?>&nbsp;</td>
                                <td>
                                    <?php echo $this->Html->link($called['Project']['name'], array('controller' => 'projects', 'action' => 'view', $called['Project']['id'])); ?>
                                </td>
                                <td>
                                    <?php echo $this->Html->link($called['User']['name'], array('controller' => 'users', 'action' => 'view', $called['User']['id'])); ?>
                                </td>
                                <td><?php echo h($called['Called']['title']); ?>&nbsp;</td>
                                <td><?php echo h($called['Called']['status']); ?>&nbsp;</td>
                                <td><?php echo h($called['Called']['createdDate']); ?>&nbsp;</td>
                                <td><?php echo h($called['Called']['modifiedDate']); ?>&nbsp;</td>
                                <td class="actions">
                                    <?php echo $this->Html->link(__('Detalhes'), array('action' => 'view', $called['Called']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                    <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $called['Called']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                    <?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $called['Called']['id']), array('class' => 'btn btn-default btn-xs'), __( $messageConfirmDelete, $called['Called']['id'])); ?>
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
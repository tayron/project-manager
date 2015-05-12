
<div id="page-container" class="row">

    <div id="page-content" class="col-sm-12">

        <div class="clients index">

            <?php
            $this->Html->addCrumb('Clientes');
            echo $this->element('breadcrumbs');
            ?>                    

            <h2><?php echo __('Clientes'); ?></h2>

            <div class="table-responsive">
                
                <?php echo $this->element( 'botao_novo_registro_index' )?>
                
                <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th><?php echo $this->Paginator->sort('id'); ?></th>
                            <th><?php echo $this->Paginator->sort('name', __('Nome')); ?></th>
                            <th><?php echo $this->Paginator->sort('email'); ?></th>
                            <th><?php echo $this->Paginator->sort('phone', __('Telefone')); ?></th>
                            <th><?php echo $this->Paginator->sort('createdDate', __('Criado em')); ?></th>
                            <th><?php echo $this->Paginator->sort('modifiedDate', __('Alterado em')); ?></th>
                            <th class="actions"><?php echo __('Ação'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($clients as $client): ?>
                            <tr>
                                <td><?php echo h($client['Client']['id']); ?>&nbsp;</td>
                                <td><?php echo h($client['Client']['name']); ?>&nbsp;</td>
                                <td><?php echo h($client['Client']['email']); ?>&nbsp;</td>
                                <td><?php echo h($client['Client']['phone']); ?>&nbsp;</td>
                                <td><?php echo h($client['Client']['createdDate']); ?>&nbsp;</td>
                                <td><?php echo h($client['Client']['modifiedDate']); ?>&nbsp;</td>
                                <td class="actions">
                                    <?php echo $this->Html->link(__('Detalhes'), array('action' => 'view', $client['Client']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                    <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $client['Client']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                    <?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $client['Client']['id']), array('class' => 'btn btn-default btn-xs'), __( $messageConfirmDelete, $client['Client']['id'])); ?>
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
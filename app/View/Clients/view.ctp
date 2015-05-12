
<div id="page-container" class="row">

    <div id="page-content" class="col-sm-12">

        <div class="clients view">

            <?php
                $this->Html->addCrumb('Clientes', '/clients');
                $this->Html->addCrumb('Detalhes');
                echo $this->element('breadcrumbs');
            ?>
            
            <h2><?php echo __('Cliente'); ?></h2>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>
                            <td><strong><?php echo __('Id'); ?></strong></td>
                            <td>
                                <?php echo h($client['Client']['id']); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td><strong><?php echo __('Nome'); ?></strong></td>
                            <td>
                                <?php echo h($client['Client']['name']); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('Email'); ?></strong></td>
                            <td>
                                <?php echo h($client['Client']['email']); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('Telefone'); ?></strong></td>
                            <td>
                                <?php echo h($client['Client']['phone']); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('Criado em'); ?></strong></td>
                            <td>
                                <?php echo h($client['Client']['created']); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('Alterado em'); ?></strong></td>
                            <td>
                                <?php echo h($client['Client']['modified']); ?>
                                &nbsp;
                            </td>
                        </tr>					</tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->


        <div class="related">

            <h3><?php echo __('Projetos associados'); ?></h3>

            <?php if (!empty($client['Project'])): ?>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th><?php echo __('Id'); ?></th>
                                <th><?php echo __('Categoria'); ?></th>
                                <th><?php echo __('Nome'); ?></th>
                                <th><?php echo __('Problema'); ?></th>
                                <th><?php echo __('Solução'); ?></th>
                                <th><?php echo __('Descrição'); ?></th>
                                <th><?php echo __('Criado em'); ?></th>
                                <th><?php echo __('Alterado em'); ?></th>
                                <th class="actions"><?php echo __('Ação'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($client['Project'] as $project):                                
                                ?>
                                <tr>
                                    <td><?php echo $project['id']; ?></td>
                                    <td><?php echo $project['Category']['name']; ?></td>
                                    <td><?php echo $project['name']; ?></td>
                                    <td><?php echo $project['problems']; ?></td>
                                    <td><?php echo $project['solutions']; ?></td>
                                    <td><?php echo $project['descriptions']; ?></td>
                                    <td><?php echo $project['created']; ?></td>
                                    <td><?php echo $project['modified']; ?></td>
                                    <td class="actions">
                                        <?php echo $this->Html->link(__('View'), array('controller' => 'projects', 'action' => 'view', $project['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                        <?php echo $this->Html->link(__('Edit'), array('controller' => 'projects', 'action' => 'edit', $project['id']), array('class' => 'btn btn-default btn-xs')); ?>
        <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'projects', 'action' => 'delete', $project['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $project['id'])); ?>
                                    </td>
                                </tr>
    <?php endforeach; ?>
                        </tbody>
                    </table><!-- /.table table-striped table-bordered -->
                </div><!-- /.table-responsive -->

<?php endif; ?>


            <div class="actions">
<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('Novo projeto'), array('controller' => 'projects', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- /.actions -->

        </div><!-- /.related -->


        <div class="related">

            <h3><?php echo __('Usuários relacionados'); ?></h3>

<?php if (!empty($client['User'])): ?>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th><?php echo __('Id'); ?></th>
                                <th><?php echo __('Grupo'); ?></th>
                                <th><?php echo __('Nome'); ?></th>
                                <th><?php echo __('Usuário'); ?></th>                                
                                <th><?php echo __('Criado em'); ?></th>
                                <th><?php echo __('Alterado em'); ?></th>
                                <th class="actions"><?php echo __('Ação'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($client['User'] as $user):
                                ?>
                                <tr>
                                    <td><?php echo $user['id']; ?></td>
                                    <td><?php echo $user['Group']['name']; ?></td>
                                    <td><?php echo $user['name']; ?></td>
                                    <td><?php echo $user['username']; ?></td>
                                    <td><?php echo $user['password']; ?></td>
                                    <td><?php echo $user['created']; ?></td>
                                    <td><?php echo $user['modified']; ?></td>
                                    <td class="actions">
                                        <?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                        <?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                        <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $user['id'])); ?>
                                    </td>
                                </tr>
    <?php endforeach; ?>
                        </tbody>
                    </table><!-- /.table table-striped table-bordered -->
                </div><!-- /.table-responsive -->

<?php endif; ?>


            <div class="actions">
<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('Novo usuário'), array('controller' => 'users', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- /.actions -->

        </div><!-- /.related -->


    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->

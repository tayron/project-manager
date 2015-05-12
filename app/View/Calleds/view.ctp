
<div id="page-container" class="row">

    <div id="page-content" class="col-sm-12">

        <div class="calleds view">
            <?php
            $this->Html->addCrumb('Chamados', '/calleds');
            $this->Html->addCrumb('Detalhes');
            echo $this->element('breadcrumbs');
            ?>

            <h2><?php echo __('Chamado'); ?></h2>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>		<td><strong><?php echo __('Id'); ?></strong></td>
                            <td>
                                <?php echo h($called['Called']['id']); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('Project'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($called['Project']['name'], array('controller' => 'projects', 'action' => 'view', $called['Project']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('User'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($called['User']['name'], array('controller' => 'users', 'action' => 'view', $called['User']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('Title'); ?></strong></td>
                            <td>
                                <?php echo h($called['Called']['title']); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('Description'); ?></strong></td>
                            <td>
                                <?php echo h($called['Called']['description']); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('Status'); ?></strong></td>
                            <td>
                                <?php echo h($called['Called']['status']); ?>
                                &nbsp;
                            </td>
                        </tr>                        
                        <tr>		
                            <td><strong><?php echo __('Created'); ?></strong></td>
                            <td>
                                <?php echo h($called['Called']['created']); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('Modified'); ?></strong></td>
                            <td>
                                <?php echo h($called['Called']['modified']); ?>
                                &nbsp;
                            </td>
                        </tr>					</tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->


        <div class="related">

            <h3><?php echo __('Related Calledmessages'); ?></h3>

            <?php if (!empty($called['Calledmessage'])): ?>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th><?php echo __('Id'); ?></th>
                                <th><?php echo __('Called Id'); ?></th>
                                <th><?php echo __('User Id'); ?></th>
                                <th><?php echo __('Message'); ?></th>
                                <th><?php echo __('Created'); ?></th>
                                <th><?php echo __('Modified'); ?></th>
                                <th class="actions"><?php echo __('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($called['Calledmessage'] as $calledmessage):
                                ?>
                                <tr>
                                    <td><?php echo $calledmessage['id']; ?></td>
                                    <td><?php echo $calledmessage['called_id']; ?></td>
                                    <td><?php echo $calledmessage['user_id']; ?></td>
                                    <td><?php echo $calledmessage['message']; ?></td>                                    
                                    <td><?php echo $calledmessage['created']; ?></td>
                                    <td><?php echo $calledmessage['modified']; ?></td>
                                    <td class="actions">
                                        <?php echo $this->Html->link(__('View'), array('controller' => 'calledmessages', 'action' => 'view', $calledmessage['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                        <?php echo $this->Html->link(__('Edit'), array('controller' => 'calledmessages', 'action' => 'edit', $calledmessage['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                        <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'calledmessages', 'action' => 'delete', $calledmessage['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $calledmessage['id'])); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table><!-- /.table table-striped table-bordered -->
                </div><!-- /.table-responsive -->

<?php endif; ?>


            <div class="actions">
<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('New Calledmessage'), array('controller' => 'calledmessages', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- /.actions -->

        </div><!-- /.related -->


    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->

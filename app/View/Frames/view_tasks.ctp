
<div id="page-container" class="row">

    <div id="page-content" class="col-sm-12">

        <div class="groups view">
            <?php
                $this->Html->addCrumb('Projetos', '/projects');
                $this->Html->addCrumb('Tarefas');
                echo $this->element('breadcrumbs');
            ?>
            
            <h2><?php echo __('Quadro de tarefas do projeto ') . $projectName; ?></h2>
		
			<?php 		
				$url = $this->Html->url( array( 'controller' => 'frames', 'action' => 'viewTasks' ), true);
				echo $this->Form->select( 
					'Project', 
					$projects, 
					array( 
						'default' => array( $this->request->params['pass'][0] ),
						'class' => 'form-control',
						'id' => 'project',
						'onChange' => "window.location.href='{$url}/'+this.value;",
						'empty' => false,
						'style' => 'width: 200px; float: right; margin: 10px 0px'
						 ) 
				);
			?>
			
			
            <?php 
                echo $this->Html->link( 
                        'Nova tarefa', 
                        array( 
                            'controller' => 'tasks', 
                            'action' => 'add',
                            $this->request->params['pass'][0] 
                        ),
                        array(
                            'class' => 'btn btn-sm btn-default',
							'style' => 'float: right; margin: 10px 0px; height: 35px; padding-top: 8px'
                        )
                    );
            ?>
            <br clear='both' />
            
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>
                                <?php echo __('Nova'); ?>
                            </th>
                            <th>
                                <?php echo __('Executando'); ?>
                            </th>                            
                            <th>
                                <?php echo __('Enviada para teste'); ?>
                            </th>                                                    
                            <th>
                                <?php echo __('Testando'); ?>
                            </th>                                            
                            <th>
                                <?php echo __('Finalizada'); ?>
                            </th>                                                  
                        </tr>
                        
                    </thead>
                    <tbody>                        
                        <tr>
                            <td>
                                <?php foreach( $tasksNovas as $task ):?>
                                
                                    <div class='post-it'>
                                        <p>
                                            <?php 
                                                echo $this->Html->link( 
                                                    $task['Task']['name'], 
                                                    array(
                                                        'controller' => 'tasks',
                                                        'action' => 'view',
                                                        $task['Task']['id']
                                                    ) 
                                                );                                        
                                            ?>

                                        </p>
                                        <p>                                        
                                            <?php 
                                                echo $this->Html->link( 
                                                        $task['User']['name'], 
                                                        array(
                                                            'controller' => 'users',
                                                            'action' => 'view',
                                                            $task['User']['id']
                                                        ) 
                                                );                                                                                                                                                        
                                            ?>                                        
                                            <br />
                                            Iniciado em: <u><?php echo $task['Task']['startFormated']; ?></u>
                                            <br />
                                            Fim: <u><?php echo $task['Task']['finishFormated']; ?></u>
                                            <br />
                                            Última Alteração: <u><?php echo $task['Task']['modifiedFormated']; ?></u>
                                            <a 
                                                href='<?php 
                                                    echo $this->Html->url( 
                                                        array(
                                                           'controller'=> 'tasks',
                                                            'action' => 'edit',
                                                            $task['Task']['id'],
                                                            $this->request->params['pass'][0]
                                                        ) 
                                                    ) 
                                                ?>' 
                                                class='btn btn-sm'
                                            >                                            
                                                <span class="glyphicon glyphicon-pencil"> Editar</span>
                                            </a> 
                                        </p>    
                                    </div>
                                <?php endforeach; ?>
                            </td>  
                            <td>
                                <?php foreach( $tasksExecutando as $task ):?>
                                
                                    <div class='post-it'>
                                        <p>
                                            <?php 
                                                echo $this->Html->link( 
                                                    $task['Task']['name'], 
                                                    array(
                                                        'controller' => 'tasks',
                                                        'action' => 'view',
                                                        $task['Task']['id']
                                                    ) 
                                                );                                        
                                            ?>

                                        </p>
                                        <p>                                        
                                            <?php 
                                                echo $this->Html->link( 
                                                        $task['User']['name'], 
                                                        array(
                                                            'controller' => 'users',
                                                            'action' => 'view',
                                                            $task['User']['id']
                                                        ) 
                                                );                                                                                                                                                        
                                            ?>                                        
                                            <br />
                                            Iniciado em: <u><?php echo $task['Task']['startFormated']; ?></u>
                                            <br />
                                            Fim: <u><?php echo $task['Task']['finishFormated']; ?></u>
                                            <br />
                                            Última Alteração: <u><?php echo $task['Task']['modifiedFormated']; ?></u>
                                            <a 
                                                href='<?php 
                                                    echo $this->Html->url( 
                                                        array(
                                                           'controller'=> 'tasks',
                                                            'action' => 'edit',
                                                            $task['Task']['id'],
                                                            $this->request->params['pass'][0]
                                                        ) 
                                                    ) 
                                                ?>' 
                                                class='btn btn-sm'
                                            >                                            
                                                <span class="glyphicon glyphicon-pencil"> Editar</span>
                                            </a>                                              
                                        </p>    
                                    </div>
                                <?php endforeach; ?>
                            </td>  
                            <td>
                                <?php foreach( $tasksEnviadaParaTeste as $task ):?>
                                
                                    <div class='post-it'>
                                        <p>
                                            <?php 
                                                echo $this->Html->link( 
                                                    $task['Task']['name'], 
                                                    array(
                                                        'controller' => 'tasks',
                                                        'action' => 'view',
                                                        $task['Task']['id']
                                                    ) 
                                                );                                        
                                            ?>

                                        </p>
                                        <p>                                        
                                            <?php 
                                                echo $this->Html->link( 
                                                        $task['User']['name'], 
                                                        array(
                                                            'controller' => 'users',
                                                            'action' => 'view',
                                                            $task['User']['id']
                                                        ) 
                                                );                                                                                                                                                        
                                            ?>                                        
                                            <br />
                                            Iniciado em: <u><?php echo $task['Task']['startFormated']; ?></u>
                                            <br />
                                            Fim: <u><?php echo $task['Task']['finishFormated']; ?></u>
                                            <br />
                                            Última Alteração: <u><?php echo $task['Task']['modifiedFormated']; ?></u>
                                            <a 
                                                href='<?php 
                                                    echo $this->Html->url( 
                                                        array(
                                                           'controller'=> 'tasks',
                                                            'action' => 'edit',
                                                            $task['Task']['id'],
                                                            $this->request->params['pass'][0]
                                                        ) 
                                                    ) 
                                                ?>' 
                                                class='btn btn-sm'
                                            >                                            
                                                <span class="glyphicon glyphicon-pencil"> Editar</span>
                                            </a>                                               
                                        </p>    
                                    </div>
                                <?php endforeach; ?>
                            </td>  
                            <td>
                                <?php foreach( $tasksTestando as $task ):?>
                                
                                    <div class='post-it'>
                                        <p>
                                            <?php 
                                                echo $this->Html->link( 
                                                    $task['Task']['name'], 
                                                    array(
                                                        'controller' => 'tasks',
                                                        'action' => 'view',
                                                        $task['Task']['id']
                                                    ) 
                                                );                                        
                                            ?>

                                        </p>
                                        <p>                                        
                                            <?php 
                                                echo $this->Html->link( 
                                                        $task['User']['name'], 
                                                        array(
                                                            'controller' => 'users',
                                                            'action' => 'view',
                                                            $task['User']['id']
                                                        ) 
                                                );                                                                                                                                                        
                                            ?>                                        
                                            <br />
                                            Iniciado em: <u><?php echo $task['Task']['startFormated']; ?></u>
                                            <br />
                                            Fim: <u><?php echo $task['Task']['finishFormated']; ?></u>
                                            <br />
                                            Última Alteração: <u><?php echo $task['Task']['modifiedFormated']; ?></u>
                                            <a 
                                                href='<?php 
                                                    echo $this->Html->url( 
                                                        array(
                                                           'controller'=> 'tasks',
                                                            'action' => 'edit',
                                                            $task['Task']['id'],
                                                            $this->request->params['pass'][0]
                                                        ) 
                                                    ) 
                                                ?>' 
                                                class='btn btn-sm'
                                            >                                            
                                                <span class="glyphicon glyphicon-pencil"> Editar</span>
                                            </a>                                             
                                        </p>    
                                    </div>
                                <?php endforeach; ?>
                            </td>  
                            <td>
                                <?php foreach( $tasksFinalizadas as $task ):?>
                                
                                    <div class='post-it'>
                                        <p>
                                            <?php 
                                                echo $this->Html->link( 
                                                    $task['Task']['name'], 
                                                    array(
                                                        'controller' => 'tasks',
                                                        'action' => 'view',
                                                        $task['Task']['id']
                                                    ) 
                                                );                                        
                                            ?>

                                        </p>
                                        <p>                                        
                                            <?php 
                                                echo $this->Html->link( 
                                                        $task['User']['name'], 
                                                        array(
                                                            'controller' => 'users',
                                                            'action' => 'view',
                                                            $task['User']['id']
                                                        ) 
                                                );                                                                                                                                                        
                                            ?>                                        
                                            <br />
                                            Iniciado em: <u><?php echo $task['Task']['startFormated']; ?></u>
                                            <br />
                                            Fim: <u><?php echo $task['Task']['finishFormated']; ?></u>
                                            <br />
                                            Última Alteração: <u><?php echo $task['Task']['modifiedFormated']; ?></u>
                                            <a 
                                                href='<?php 
                                                    echo $this->Html->url( 
                                                        array(
                                                           'controller'=> 'tasks',
                                                            'action' => 'edit',
                                                            $task['Task']['id'],
                                                            $this->request->params['pass'][0]
                                                        ) 
                                                    ) 
                                                ?>' 
                                                class='btn btn-sm'
                                            >                                            
                                                <span class="glyphicon glyphicon-pencil"> Editar</span>
                                            </a>                                              
                                        </p>    
                                    </div>
                                <?php endforeach; ?>
                            </td>                              
                        </tr>	
                    </tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->

    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->

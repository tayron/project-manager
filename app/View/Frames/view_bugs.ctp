
<div id="page-container" class="row">

    <div id="page-content" class="col-sm-12">

        <div class="groups view">
            <?php
                $this->Html->addCrumb('Projetos', '/projects');
                $this->Html->addCrumb('Bugs');
                echo $this->element('breadcrumbs');
            ?>
            
            <h2><?php echo __('Quadro de bugs do projeto ') . $projectName; ?></h2>
            
			<?php 		
				$url = $this->Html->url( array( 'controller' => 'frames', 'action' => 'viewBugs' ), true);
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
                        'Novo bug', 
                        array( 
                            'controller' => 'bugs', 
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
                                <?php echo __('Novo'); ?>
                            </th>
                            <th>
                                <?php echo __('Resolvendo'); ?>
                            </th>                            
                            <th>
                                <?php echo __('Enviado para teste'); ?>
                            </th>                                                    
                            <th>
                                <?php echo __('Testando'); ?>
                            </th>                                            
                            <th>
                                <?php echo __('Resolvido'); ?>
                            </th>                                                  
                        </tr>
                        
                    </thead>
                    <tbody>                        
                        <tr>
                            <td>
                                <?php foreach( $bugsNovos as $bug ):?>
                                
                                    <div class='post-it'>
                                        <p>
                                            <?php 
                                                echo $this->Html->link( 
                                                    $bug['Bug']['name'], 
                                                    array(
                                                        'controller' => 'bugs',
                                                        'action' => 'view',
                                                        $bug['Bug']['id']
                                                    ) 
                                                );                                        
                                            ?>
                                        </p>
                                        <p>                                        
                                            <?php 
                                                echo $this->Html->link( 
                                                        $bug['User']['name'], 
                                                        array(
                                                            'controller' => 'users',
                                                            'action' => 'view',
                                                            $bug['User']['id']
                                                        ) 
                                                );                                                                                                                                                        
                                            ?>                                        
                                            <br />
                                            Iniciado em: <u><?php echo $bug['Bug']['startFormated']; ?></u>
                                            <br />
                                            Fim: <u><?php echo $bug['Bug']['finishFormated']; ?></u>
                                            <br />
                                            Última Alteração: <u><?php echo $bug['Bug']['modifiedFormated']; ?></u>
                                            <a 
                                                href='<?php 
                                                    echo $this->Html->url( 
                                                        array(
                                                           'controller'=> 'bugs',
                                                            'action' => 'edit',
                                                            $bug['Bug']['id'],
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
                                <?php foreach( $bugsResolvendo as $bug ):?>
                                
                                    <div class='post-it'>
                                        <p>
                                            <?php 
                                                echo $this->Html->link( 
                                                    $bug['Bug']['name'], 
                                                    array(
                                                        'controller' => 'bugs',
                                                        'action' => 'view',
                                                        $bug['Bug']['id']
                                                    ) 
                                                );                                        
                                            ?>

                                        </p>
                                        <p>                                        
                                            <?php 
                                                echo $this->Html->link( 
                                                        $bug['User']['name'], 
                                                        array(
                                                            'controller' => 'users',
                                                            'action' => 'view',
                                                            $bug['User']['id']
                                                        ) 
                                                );                                                                                                                                                        
                                            ?>                                        
                                            <br />
                                            Iniciado em: <u><?php echo $bug['Bug']['startFormated']; ?></u>
                                            <br />
                                            Fim: <u><?php echo $bug['Bug']['finishFormated']; ?></u>
                                            <br />
                                            Última Alteração: <u><?php echo $bug['Bug']['modifiedFormated']; ?></u>
                                            <a 
                                                href='<?php 
                                                    echo $this->Html->url( 
                                                        array(
                                                           'controller'=> 'bugs',
                                                            'action' => 'edit',
                                                            $bug['Bug']['id'],
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
                                <?php foreach( $bugsEnviadoParaTeste as $bug ):?>
                                
                                    <div class='post-it'>
                                        <p>
                                            <?php 
                                                echo $this->Html->link( 
                                                    $bug['Bug']['name'], 
                                                    array(
                                                        'controller' => 'bugs',
                                                        'action' => 'view',
                                                        $bug['Bug']['id']
                                                    ) 
                                                );                                        
                                            ?>

                                        </p>
                                        <p>                                        
                                            <?php 
                                                echo $this->Html->link( 
                                                        $bug['User']['name'], 
                                                        array(
                                                            'controller' => 'users',
                                                            'action' => 'view',
                                                            $bug['User']['id']
                                                        ) 
                                                );                                                                                                                                                        
                                            ?>                                        
                                            <br />
                                            Iniciado em: <u><?php echo $bug['Bug']['startFormated']; ?></u>
                                            <br />
                                            Fim: <u><?php echo $bug['Bug']['finishFormated']; ?></u>
                                            <br />
                                            Última Alteração: <u><?php echo $bug['Bug']['modifiedFormated']; ?></u>
                                            <a 
                                                href='<?php 
                                                    echo $this->Html->url( 
                                                        array(
                                                           'controller'=> 'bugs',
                                                            'action' => 'edit',
                                                            $bug['Bug']['id'],
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
                                <?php foreach( $bugsTestando as $bug ):?>
                                
                                    <div class='post-it'>
                                        <p>
                                            <?php 
                                                echo $this->Html->link( 
                                                    $bug['Bug']['name'], 
                                                    array(
                                                        'controller' => 'bugs',
                                                        'action' => 'view',
                                                        $bug['Bug']['id']
                                                    ) 
                                                );                                        
                                            ?>

                                        </p>
                                        <p>                                        
                                            <?php 
                                                echo $this->Html->link( 
                                                        $bug['User']['name'], 
                                                        array(
                                                            'controller' => 'users',
                                                            'action' => 'view',
                                                            $bug['User']['id']
                                                        ) 
                                                );                                                                                                                                                        
                                            ?>                                        
                                            <br />
                                            Iniciado em: <u><?php echo $bug['Bug']['startFormated']; ?></u>
                                            <br />
                                            Fim: <u><?php echo $bug['Bug']['finishFormated']; ?></u>
                                            <br />
                                            Última Alteração: <u><?php echo $bug['Bug']['modifiedFormated']; ?></u>
                                            <a 
                                                href='<?php 
                                                    echo $this->Html->url( 
                                                        array(
                                                           'controller'=> 'bugs',
                                                            'action' => 'edit',
                                                            $bug['Bug']['id'],
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
                                <?php foreach( $bugsResolvido as $bug ):?>
                                
                                    <div class='post-it'>
                                        <p>
                                            <?php 
                                                echo $this->Html->link( 
                                                    $bug['Bug']['name'], 
                                                    array(
                                                        'controller' => 'bugs',
                                                        'action' => 'view',
                                                        $bug['Bug']['id']
                                                    ) 
                                                );                                        
                                            ?>

                                        </p>
                                        <p>                                        
                                            <?php 
                                                echo $this->Html->link( 
                                                        $bug['User']['name'], 
                                                        array(
                                                            'controller' => 'users',
                                                            'action' => 'view',
                                                            $bug['User']['id']
                                                        ) 
                                                );                                                                                                                                                        
                                            ?>                                        
                                            <br />
                                            Iniciado em: <u><?php echo $bug['Bug']['startFormated']; ?></u>
                                            <br />
                                            Fim: <u><?php echo $bug['Bug']['finishFormated']; ?></u>
                                            <br />
                                            Última Alteração: <u><?php echo $bug['Bug']['modifiedFormated']; ?></u>
                                            <a 
                                                href='<?php 
                                                    echo $this->Html->url( 
                                                        array(
                                                           'controller'=> 'bugs',
                                                            'action' => 'edit',
                                                            $bug['Bug']['id'],
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

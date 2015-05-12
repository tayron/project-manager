<div id="page-container" class="row">
	
	<div id="page-content" class="col-sm-12">

                <?php
                    $this->Html->addCrumb('Grupos', '/groups');
                    $this->Html->addCrumb('Editar');
                    echo $this->element('breadcrumbs');
                ?>            
            
				<h2><?php echo __('Editar Grupo'); ?></h2>
		
				<div class="groups form">
				
					<?php echo $this->Form->create('Group', array('role' => 'form')); ?>
		
						<fieldset>
		
							<div class="form-group">
								<?php echo $this->Form->input('id', array('class' => 'form-control')); ?>
							</div><!-- .form-group -->
							<div class="form-group">
								<?php echo $this->Form->input('name', array('class' => 'form-control', 'label' => 'Nome')); ?>
							</div><!-- .form-group -->
		
							<?php echo $this->Form->submit('Salvar', array('class' => 'btn btn-large btn-primary')); ?>
		
						</fieldset>
		
					<?php echo $this->Form->end(); ?>
		
				</div><!-- /.form -->
		
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->			

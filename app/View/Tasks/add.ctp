<?php
    if( isset( $this->request->params['pass'][0] ) ){
           $this->request->data['Task']['project_id'] = $this->request->params['pass'][0];           
    }
?>
<div id="page-container" class="row">
	
	<div id="page-content" class="col-sm-12">
                <?php
                    $this->Html->addCrumb('Tarefas', '/tasks');
                    $this->Html->addCrumb('Adicionar');
                    echo $this->element('breadcrumbs');
                ?>
                    
		<h2><?php echo __('Adicionar Tarefa'); ?></h2>

		<div class="tasks form">
		
			<?php echo $this->Form->create('Task', array('role' => 'form')); ?>

				<fieldset>

					<div class="form-group">
						<?php echo $this->Form->input('user_id', array('class' => 'form-control', 'label' => 'Usuário')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('project_id', array('class' => 'form-control', 'label' => 'Projeto')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('name', array('class' => 'form-control', 'label' => 'Nome')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
                                                <label for="TaskFinishDay">Previsão para início da execução desta tarefa</label>
						<?php echo $this->Form->input('start', array( 'dateFormat' => 'DMY', 'separator' => ' ', 'class' => 'form-control', 'style' => 'width: auto; display: inline', 'label' => false)); ?>
					</div><!-- .form-group -->                                                                                
					<div class="form-group">
                                                <label for="TaskFinishDay">Previsão para término</label>
						<?php echo $this->Form->input('finish', array( 'dateFormat' => 'DMY', 'separator' => ' ', 'class' => 'form-control', 'style' => 'width: auto; display: inline', 'label' => false)); ?>
					</div><!-- .form-group -->                                        
					<div class="form-group">
						<?php echo $this->Form->input('descriptions', array('class' => 'form-control', 'label' => 'Descrição')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('precondition', array('class' => 'form-control', 'label' => 'Pré-condição')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('postcondition', array('class' => 'form-control', 'label' => 'Pós-condição')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('status', array( 'type' => 'hide', 'value' => 'Nova') ); ?>
					</div><!-- .form-group -->

					<?php echo $this->Form->submit('Salvar', array('class' => 'btn btn-large btn-primary')); ?>

				</fieldset>

			<?php echo $this->Form->end(); ?>

		</div><!-- /.form -->
			
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->
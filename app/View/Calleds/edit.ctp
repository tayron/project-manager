
<div id="page-container" class="row">

	<div id="page-content" class="col-sm-12">
                <?php
                    $this->Html->addCrumb('Chamados', '/calleds');
                    $this->Html->addCrumb('Editar');
                    echo $this->element('breadcrumbs');
                ?>
		<h2><?php echo __('Editar Chamado'); ?></h2>

		<div class="calleds form">
		
			<?php echo $this->Form->create('Called', array('role' => 'form')); ?>

				<fieldset>

					<div class="form-group">
						<?php echo $this->Form->input('id', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('project_id', array('class' => 'form-control', 'label' => 'Projeto')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('user_id', array('class' => 'form-control', 'label' => 'Usuário')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('title', array('class' => 'form-control', 'label' => 'Título')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('description', array('class' => 'form-control', 'label' => 'Descrição')); ?>
					</div><!-- .form-group -->
					<div class="form-group">						
                                                <?php echo $this->Form->input( 'status', array('class' => 'form-control', 'empty' => false) );?>
					</div><!-- .form-group -->
					<?php echo $this->Form->submit('Salvar', array('class' => 'btn btn-large btn-primary')); ?>

				</fieldset>

			<?php echo $this->Form->end(); ?>

		</div><!-- /.form -->
			
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->
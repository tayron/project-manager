
<div id="page-container" class="row">
	
	<div id="page-content" class="col-sm-12">
                <?php
                    $this->Html->addCrumb('Projetos', '/projects');
                    $this->Html->addCrumb('Adicionar');
                    echo $this->element('breadcrumbs');
                ?>
		<h2><?php echo __('Adicionar Projeto'); ?></h2>

		<div class="projects form">
		
			<?php echo $this->Form->create('Project', array('role' => 'form')); ?>

				<fieldset>

					<div class="form-group">
						<?php echo $this->Form->input('name', array('class' => 'form-control', 'label' => 'Nome')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('category_id', array('class' => 'form-control', 'label' => 'Categoria')); ?>
					</div><!-- .form-group -->					
					<div class="form-group">
						<?php echo $this->Form->input('client_id', array('class' => 'form-control', 'label' => 'Cliente')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('problems', array('class' => 'form-control', 'label' => 'Problema')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('solutions', array('class' => 'form-control', 'label' => 'Solução')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('descriptions', array('class' => 'form-control', 'label' => 'Descrição')); ?>
					</div><!-- .form-group -->

					<?php echo $this->Form->submit('Salvar', array('class' => 'btn btn-large btn-primary')); ?>

				</fieldset>

			<?php echo $this->Form->end(); ?>

		</div><!-- /.form -->
			
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->
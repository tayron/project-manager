<div id="page-container" class="row">
	
	<div id="page-content" class="col-sm-12">

                <?php
                    $this->Html->addCrumb('Usuários', '/users');
                    $this->Html->addCrumb('Adicionar');
                    echo $this->element('breadcrumbs');
                ?>            
            
		<h2><?php echo __('Adicionar Usuário'); ?></h2>

		<div class="users form">
		
			<?php echo $this->Form->create('User', array('role' => 'form')); ?>

				<fieldset>

					<div class="form-group">
						<?php echo $this->Form->input('group_id', array('class' => 'form-control', 'label' => 'Grupo')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('name', array('class' => 'form-control', 'label' => 'Nome')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('username', array('class' => 'form-control', 'label' => 'Usuário')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('password', array('class' => 'form-control', 'label' => 'Senha')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
                                                <label for='ClientClient'>Clientes</label>
                                                <?php echo $this->Form->input('Client', array( 'label' => false ));?>
					</div><!-- .form-group -->

					<?php echo $this->Form->submit('Salvar', array('class' => 'btn btn-large btn-primary')); ?>

				</fieldset>

			<?php echo $this->Form->end(); ?>

		</div><!-- /.form -->
			
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->
<div id="page-container" class="row">

    <div id="page-content" class="col-sm-12">

        <?php
        $this->Html->addCrumb('Categorias', '/categories');
        $this->Html->addCrumb('Adicionar');
        echo $this->element('breadcrumbs');
        ?>            

        <h2><?php echo __('Adicionar Categoria'); ?></h2>

        <div class="categories form">

            <?php echo $this->Form->create('Category', array('role' => 'form')); ?>

            <fieldset>

                <div class="form-group">
                    <?php echo $this->Form->input('name', array('class' => 'form-control', 'label' => 'Nome')); ?>
                </div><!-- .form-group -->

                <?php echo $this->Form->submit('Salvar', array('class' => 'btn btn-large btn-primary')); ?>

            </fieldset>

            <?php echo $this->Form->end(); ?>

        </div><!-- /.form -->

    </div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->		

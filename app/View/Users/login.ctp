<?php
	echo $this->Form->create( 'User', array( 'class' => 'form-signin' ) )
	     . $this->Html->tag( 'h2', 'Faça o login', 
	        array( 'class' => 'form-signin-heading' ) )
	     . $this->Form->input( 'username', 
	        array( 'label'=>false, 'class'=>'form-control', 'placeholder'=>'Usuário' ) )
	     . $this->Form->input( 'password', 
	        array( 'label'=>false, 'class'=>'form-control', 'placeholder'=>'Senha' ) )
	     . $this->Form->submit( 'Login', array( 'class' => 'btn btn-default' ) )
	     . $this->Form->end();
?>
<?php 
    echo $this->Html->link( 
            'Novo registro', 
            array( 
                'controller' => $this->request->params['controller'], 
                'action' => 'add' 
            ),
            array(
                'class' => 'btn btn-sm btn-default',
                'style' => 'float: right; margin: 10px 0px'
            )
        );
?>
<br clear='both' />
<?php                    
    echo $this->Html->getCrumbList(
         array(       
            'class' => 'breadcrumb'
        ),
        array(
            'text' => 'Home',
            'url' => array('controller' => 'dashboards', 'action' => 'index'),
        )
    );
?>
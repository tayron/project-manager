<?php $logomarca = $this->Html->image('logomarca_30px.png', array('width' => '30px', 'style' => 'margin-right: 10px')) ?>

<nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button><!-- /.navbar-toggle -->
        <?php
        echo $this->Html->Link(
                $logomarca . 'Project Manager', $this->Html->url('/', true), array(
            'class' => 'navbar-brand',
            'escape' => false
                )
        );
        ?>
    </div><!-- /.navbar-header -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Clientes <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo $this->Html->url(array('controller' => 'clients', 'action' => 'add')) ?>">Novo Cliente</a></li>
                    <li><a href="<?php echo $this->Html->url(array('controller' => 'clients', 'action' => 'index')) ?>">Listar Clientes</a></li>
                </ul>
            </li>
        </ul><!-- /.nav navbar-nav -->
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Projetos <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo $this->Html->url(array('controller' => 'projects', 'action' => 'add')) ?>">Novo Projeto</a></li>
                    <li><a href="<?php echo $this->Html->url(array('controller' => 'projects', 'action' => 'index')) ?>">Listar Projetos</a></li>
                </ul>
            </li>
        </ul><!-- /.nav navbar-nav -->
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tarefas <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo $this->Html->url(array('controller' => 'tasks', 'action' => 'add')) ?>">Nova Tarefa</a></li>
                    <li><a href="<?php echo $this->Html->url(array('controller' => 'tasks', 'action' => 'index')) ?>">Listar Tarefas</a></li>
                </ul>
            </li>
        </ul><!-- /.nav navbar-nav -->
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Bugs <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo $this->Html->url(array('controller' => 'bugs', 'action' => 'add')) ?>">Novo Bug</a></li>
                    <li><a href="<?php echo $this->Html->url(array('controller' => 'bugs', 'action' => 'index')) ?>">Listar Bugs</a></li>
                </ul>
            </li>
        </ul><!-- /.nav navbar-nav -->
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuários <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'add')) ?>">Novo Usuário</a></li>
                    <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'index')) ?>">Listar Usuários</a></li>
                </ul>
            </li>
        </ul><!-- /.nav navbar-nav -->
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Chamado <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo $this->Html->url(array('controller' => 'calleds', 'action' => 'add')) ?>">Novo Chamado</a></li>
                    <li><a href="<?php echo $this->Html->url(array('controller' => 'calleds', 'action' => 'index')) ?>">Listar Chamados</a></li>
                </ul>
            </li>
        </ul><!-- /.nav navbar-nav -->
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sistema<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'logout')) ?>">Sair</a></li>
                </ul>
            </li>
        </ul><!-- /.nav navbar-nav -->		
    </div><!-- /.navbar-collapse -->
</nav><!-- /.navbar navbar-default -->
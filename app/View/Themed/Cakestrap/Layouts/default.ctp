<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'Project Manager: Gerenciamento de projetos pessoais');
?>
<?php echo $this->Html->docType('html5'); ?> 
<html>
	<head>		
		<meta http-equiv="Content-Type" content="application/x-web-app-manifest+json; charset=utf-8" />
		<?php echo $this->Html->charset(); ?>
		<title>
			<?php echo $cakeDescription ?>:
			<?php echo $title_for_layout; ?>
		</title>
		<?php
			echo $this->Html->meta('icon');
			
			echo $this->fetch('meta');

			echo $this->Html->css('bootstrap');
			echo $this->Html->css('main');                        
                        echo $this->Html->css('http://fonts.googleapis.com/css?family=Gloria+Hallelujah');
                        echo $this->Html->css('style');

			echo $this->fetch('css');
			
			echo $this->Html->script('libs/jquery-1.10.2.min');
			echo $this->Html->script('libs/bootstrap.min');
			
			echo $this->fetch('script');
		?>
	</head>

	<body>

		<div id="main-container">
		
			<div id="header" class="container">
				<p style='block: table; float: right; font-weight: bold'>
					Bem vindo, <?php echo $this->Session->read('Auth.User.name')?>
				</p>
				<br clar='both'>
				<?php echo $this->element('menu/top_menu'); ?>
			</div><!-- /#header .container -->
			
			<div id="content" class="container">
				<?php echo $this->Session->flash(); ?>
				<?php echo $this->fetch('content'); ?>
			</div><!-- /#content .container -->
			
			<div id="footer" class="container">
				<?php //Silence is golden ?>
			</div><!-- /#footer .container -->
			
		</div><!-- /#main-container -->
		
		<div class="container">

				<small>
					<?php echo $this->element('sql_dump'); ?>
				</small>

		</div><!-- /.container -->
		
	</body>

</html>
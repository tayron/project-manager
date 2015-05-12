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

        <style>
            body {
                padding-top: 40px;
                padding-bottom: 40px;
                background-color: #eee;
            }

            .form-signin {
                max-width: 330px;
                padding: 15px;
                margin: 0 auto;
            }
            .form-signin .form-signin-heading,
            .form-signin .checkbox {
                margin-bottom: 10px;
            }
            .form-signin .checkbox {
                font-weight: normal;
            }
            .form-signin .form-control {
                position: relative;
                font-size: 16px;
                height: auto;
                padding: 10px;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
            }
            .form-signin .form-control:focus {
                z-index: 2;
            }
            .form-signin input[type="text"] {
                margin-bottom: -1px;
                border-bottom-left-radius: 0;
                border-bottom-right-radius: 0;
            }
            .form-signin input[type="password"] {
                margin-bottom: 10px;
                border-top-left-radius: 0;
                border-top-right-radius: 0;
            }</style>            
    </head>

    <body>

        <div id="main-container">

            <div id="content" class="container">
                <?php echo $this->Session->flash(); ?>
                <?php echo $this->fetch('content'); ?>
            </div><!-- /#content .container -->

        </div><!-- /#main-container -->

        <div class="container">

            <small>
                <?php echo $this->element('sql_dump'); ?>
            </small>

        </div><!-- /.container -->

    </body>

</html>
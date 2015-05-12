<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $theme = "Cakestrap";
    public $helpers = array(
        'Form' => array('className' => 'MysqlEnumForm'),
    );
    public $components = array(
        'Session',
        'Auth'
    );
    // Configura mensagem de interacao com o usuario 
    public $Config = array(
        'Messages' => array(
            'save.success' => 'Dados salvos com sucesso.',
            'save.error' => 'Não foi possível salvar os dados.',
            'delete.success' => 'Dados excluídos com sucesso.',
            'delete.error' => 'Não foi possível excluir os dados.',
            'delete.confirm' => 'Tem certeza que deseja deletar o registro de ID # %s?',
            'login.error' => 'Usuário ou senha inválido.',
            'register.not_found' => 'Registro não encontrado.',
            'paginator.display' => 'Você está na página {:page} de {:pages}, mostrando {:current} registros de {:count}.',
            'project.category.exception' => 'Para criar um projeto é necessário antes cadastrar uma categoria.',
            'user.group.exception' => 'Para criar um usuário é necessário antes cadastrar um grupo.',
            'user.client.exception' => 'Para criar um usuário é necessário antes cadastrar um cliente.',
            'bug.user.exception' => 'Para criar cadastrar um bug é necessário antes cadastrar um usuário.',
            'bug.project.exception' => 'Para criar um bug é necessário antes cadastrar um projeto.',
            'task.user.exception' => 'Para criar uma tarefa é necessário antes cadastrar um usuário.',
            'task.project.exception' => 'Para criar uma tarefa é necessário antes cadastrar um projeto.',
            'called.user.exception' => 'Para criar um chamado é necessário antes cadastrar um usuário.',
            'called.project.exception' => 'Para criar um chamado é necessário antes cadastrar um projeto.'            
        )
    );

    public function beforeRender() {
        parent::beforeRender();

        if ($this->request->params['action'] == 'index') {
            $this->set('messageConfirmDelete', $this->Config['Messages']['delete.confirm']);
            $this->set('messagePaginatorDisplay', $this->Config['Messages']['paginator.display']);
        }
    }

}

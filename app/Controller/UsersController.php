<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->User->recursive = 0;
        $this->paginate = array(
            'fields' => array(
                'Group.id',
                'Group.name',
                'User.id',
                'User.name',
                'User.username',
                'User.createdDate',
                'User.modifiedDate'
            )
        );
        $this->set('users', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__($this->Config['Messages']['Register.not_found']));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__($this->Config['Messages']['save.success']), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__($this->Config['Messages']['save.error']), 'flash/error');
            }
        }
        $groups = $this->User->Group->find('list');
        $clients = $this->User->Client->find('list');
        
        if (!$groups) {
            $this->Session->setFlash(__($this->Config['Messages']['user.group.exception']), 'flash/warning');
            $this->redirect($this->referer());
        }
        
        if (!$clients) {
            $this->Session->setFlash(__($this->Config['Messages']['user.client.exception']), 'flash/warning');
            $this->redirect($this->referer());
        }        
        
        $this->set(compact('groups', 'clients'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__($this->Config['Messages']['register.not_found']));
        }
        if ($this->request->is('post') || $this->request->is('put')) {

            if ($this->request->data['User']['password'] == '') {
                unset($this->request->data['User']['password']);
            }

            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__($this->Config['Messages']['save.success']), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__($this->Config['Messages']['save.error']), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }

        $groups = $this->User->Group->find('list');
        $clients = $this->User->Client->find('list');

        unset($this->request->data['User']['password']);

        $this->set(compact('groups', 'clients'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__($this->Config['Messages']['register.not_found']));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__($this->Config['Messages']['delete.success']), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__($this->Config['Messages']['delete.error']), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }

    /**
     * loginmethod
     *
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     * @param string $id
     * @return void
     */
    public function login() {
        $this->layout = 'login';

        // Se ouver uma requisicao, verifico se o usuario tem acesso ao sistema		
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash(__($this->Config['Messages']['login.error']));
            }
        }
    }

    /**
     * logout method
     *
     * Metodo desloga usuario do sistema
     * @since: 20/08/2012 08:28
     * @return: void
     */
    public function logout() {
        $this->redirect($this->Auth->logout());
    }

}

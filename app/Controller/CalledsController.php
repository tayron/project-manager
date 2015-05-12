<?php

App::uses('AppController', 'Controller');

/**
 * Calleds Controller
 *
 * @property Called $Called
 * @property PaginatorComponent $Paginator
 */
class CalledsController extends AppController {

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
        $this->Called->recursive = 0;
        $this->paginate = array(
            'fields' => array(
                'Project.id',
                'Project.name',
                'User.id',
                'User.name',
                'Called.id',
                'Called.title',
                'Called.status',
                'Called.createdDate',
                'Called.modifiedDate'
            )
        );
        $this->set('calleds', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Called->exists($id)) {
            throw new NotFoundException(__($this->Config['Messages']['register.not_found']));
        }
        $options = array('conditions' => array('Called.' . $this->Called->primaryKey => $id));
        $this->set('called', $this->Called->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Called->create();
            if ($this->Called->save($this->request->data)) {
                $this->Session->setFlash(__($this->Config['Messages']['save.success']), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__($this->Config['Messages']['save.error']), 'flash/error');
            }
        }
        $projects = $this->Called->Project->find('list');
        $users = $this->Called->User->find('list');
        
        if (!$projects) {
            $this->Session->setFlash(__($this->Config['Messages']['called.project.exception']), 'flash/warning');
            $this->redirect($this->referer());
        } 

        if (!$users) {
            $this->Session->setFlash(__($this->Config['Messages']['called.user.exception']), 'flash/warning');
            $this->redirect($this->referer());
        } 
        
        $this->set(compact('projects', 'users'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Called->id = $id;
        if (!$this->Called->exists($id)) {
            throw new NotFoundException(__($this->Config['Messages']['register.not_found']));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Called->save($this->request->data)) {
                $this->Session->setFlash(__($this->Config['Messages']['save.success']), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__($this->Config['Messages']['save.error']), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('Called.' . $this->Called->primaryKey => $id));
            $this->request->data = $this->Called->find('first', $options);
        }
        $projects = $this->Called->Project->find('list');
        $users = $this->Called->User->find('list');
        $this->set(compact('projects', 'users'));
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
        $this->Called->id = $id;
        if (!$this->Called->exists()) {
            throw new NotFoundException(__($this->Config['Messages']['register.not_found']));
        }
        if ($this->Called->delete()) {
            $this->Session->setFlash(__($this->Config['Messages']['delete.success']), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__($this->Config['Messages']['delete.error']), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }

}

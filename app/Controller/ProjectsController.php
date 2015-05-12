<?php

App::uses('AppController', 'Controller');

/**
 * Projects Controller
 *
 * @property Project $Project
 * @property PaginatorComponent $Paginator
 */
class ProjectsController extends AppController {

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
        $this->Project->recursive = 0;
        $this->paginate = array(
            'fields' => array(
                'Client.id',
                'Client.name',
                'Category.id',
                'Category.name',
                'Project.id',
                'Project.name',
                'Project.createdDate',
                'Project.modifiedDate'
            )
        );
        $this->set('projects', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Project->exists($id)) {
            throw new NotFoundException(__($this->Config['Messages']['register.not_found']));
        }
        $this->Project->recursive = 2;
        $options = array('conditions' => array('Project.' . $this->Project->primaryKey => $id));
        $this->set('project', $this->Project->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {

        if ($this->request->is('post')) {
            $this->Project->create();
            if ($this->Project->save($this->request->data)) {
                $this->Session->setFlash(__($this->Config['Messages']['save.success']), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__($this->Config['Messages']['save.error']), 'flash/error');
            }
        }
        $clients = $this->Project->Client->find('list');
        $categories = $this->Project->Category->find('list');

        if (!$categories) {
            $this->Session->setFlash(__($this->Config['Messages']['project.category.exception']), 'flash/warning');
            $this->redirect($this->referer());
        }

        $this->set(compact('clients', 'categories'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Project->id = $id;
        if (!$this->Project->exists($id)) {
            throw new NotFoundException(__($this->Config['Messages']['register.not_found']));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Project->save($this->request->data)) {
                $this->Session->setFlash(__($this->Config['Messages']['save.success']), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__($this->Config['Messages']['save.error']), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('Project.' . $this->Project->primaryKey => $id));
            $this->request->data = $this->Project->find('first', $options);
        }
        $clients = $this->Project->Client->find('list');
        $categories = $this->Project->Category->find('list');
        $this->set(compact('clients', 'categories'));
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
        $this->Project->id = $id;
        if (!$this->Project->exists()) {
            throw new NotFoundException(__($this->Config['Messages']['register.not_found']));
        }
        if ($this->Project->delete()) {
            $this->Session->setFlash(__($this->Config['Messages']['delete.success']), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__($this->Config['Messages']['delete.error']), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }

}

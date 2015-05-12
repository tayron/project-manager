<?php

App::uses('AppController', 'Controller');

/**
 * Bugs Controller
 *
 * @property Bug $Bug
 * @property PaginatorComponent $Paginator
 */
class BugsController extends AppController {

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
        $this->Bug->recursive = 0;
        $conditions['fields'] = array(
            'User.id',
            'User.name',
            'Project.id',
            'Project.name',
            'Bug.id',
            'Bug.name',
            'Bug.status',
            'Bug.createdDate',
            'Bug.modifiedDate'
        );

        if (isset($this->request->query['project_id'])) {
            if ($this->request->query['project_id'] > 0) {
                $conditions['conditions']['and']['Project.id'] = $this->request->query['project_id'];
                $this->request->params['named']['page'] = 1;
            }
        };

        if (isset($this->request->query['user_id'])) {
            if ($this->request->query['user_id'] > 0) {
                $conditions['conditions']['and']['User.id'] = $this->request->query['user_id'];
                $this->request->params['named']['page'] = 1;
            }
        };

        if (isset($this->request->query['status_id'])) {
            if ($this->request->query['status_id'] != '') {
                $conditions['conditions']['and']['Bug.status'] = $this->request->query['status_id'];
                $this->request->params['named']['page'] = 1;
            }
        };

        $this->paginate = $conditions;
        $bugs = $this->paginate();
        $projects = $this->Bug->Project->find('list');
        $users = $this->Bug->User->find('list');

        $status['Novo'] = 'Novo';
        $status['Resolvendo'] = 'Resolvendo';
        $status['Enviado para teste'] = 'Enviado para teste';
        $status['Testando'] = 'Testando';
        $status['Resolvido'] = 'Resolvido';

        $this->set(compact('bugs', 'projects', 'users', 'status'));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {

        if (!$this->Bug->exists($id)) {
            throw new NotFoundException(__($this->Config['Messages']['register.not_found']));
        }
        $options = array('conditions' => array('Bug.' . $this->Bug->primaryKey => $id));
        $this->set('bug', $this->Bug->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {

        if ($this->request->is('post')) {
            $this->Bug->create();
            if ($this->Bug->save($this->request->data)) {
                $this->Session->setFlash(__($this->Config['Messages']['save.success']), 'flash/success');

                if (isset($this->request->params['pass'][0])) {
                    $this->redirect(array('controller' => 'frames', 'action' => 'viewBugs', $this->request->params['pass'][0]));
                } else {
                    $this->redirect(array('action' => 'index'));
                }
            } else {
                $this->Session->setFlash(__($this->Config['Messages']['save.error']), 'flash/error');
            }
        }
        $users = $this->Bug->User->find('list');
        $projects = $this->Bug->Project->find('list');
        
        if (!$users) {
            $this->Session->setFlash(__($this->Config['Messages']['bug.user.exception']), 'flash/warning');
            $this->redirect($this->referer());
        }
        
        if (!$projects) {
            $this->Session->setFlash(__($this->Config['Messages']['bug.project.exception']), 'flash/warning');
            $this->redirect($this->referer());
        }  
        
        $this->set(compact('users', 'projects'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Bug->id = $id;
        if (!$this->Bug->exists($id)) {
            throw new NotFoundException(__($this->Config['Messages']['register.not_found']));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Bug->save($this->request->data)) {
                $this->Session->setFlash(__($this->Config['Messages']['save.success']), 'flash/success');
                if (isset($this->request->params['pass'][1])) {
                    $this->redirect(array('controller' => 'frames', 'action' => 'viewBugs', $this->request->params['pass'][1]));
                } else {
                    $this->redirect(array('action' => 'index'));
                }
            } else {
                $this->Session->setFlash(__($this->Config['Messages']['save.error']), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('Bug.' . $this->Bug->primaryKey => $id));
            $this->request->data = $this->Bug->find('first', $options);
        }
        $users = $this->Bug->User->find('list');
        $projects = $this->Bug->Project->find('list');
        $this->set(compact('users', 'projects'));
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
        $this->Bug->id = $id;
        if (!$this->Bug->exists()) {
            throw new NotFoundException(__($this->Config['Messages']['register.not_found']));
        }
        if ($this->Bug->delete()) {
            $this->Session->setFlash(__($this->Config['Messages']['delete.success']), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__($this->Config['Messages']['delete.error']), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }

}

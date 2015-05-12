<?php

App::uses('AppController', 'Controller');

/**
 * Tasks Controller
 *
 * @property Task $Task
 * @property PaginatorComponent $Paginator
 */
class TasksController extends AppController {

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
        $this->Task->recursive = 0;

        $conditions['fields'] = array(
            'User.id',
            'User.name',
            'Project.id',
            'Project.name',
            'Task.id',
            'Task.name',
            'Task.status',
            'Task.createdDate',
            'Task.modifiedDate'
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
                $conditions['conditions']['and']['Task.status'] = $this->request->query['status_id'];
                $this->request->params['named']['page'] = 1;
            }
        };

        $this->paginate = $conditions;
        $tasks = $this->paginate();
        $projects = $this->Task->Project->find('list');
        $users = $this->Task->User->find('list');

        $status['Nova'] = 'Nova';
        $status['Executando'] = 'Executando';
        $status['Enviada para teste'] = 'Enviada para teste';
        $status['Testando'] = 'Testando';
        $status['Finalizada'] = 'Finalizada';

        $this->set(compact('tasks', 'projects', 'users', 'status'));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Task->exists($id)) {
            throw new NotFoundException(__($this->Config['Messages']['register.not_found']));
        }
        $options = array('conditions' => array('Task.' . $this->Task->primaryKey => $id));
        $this->set('task', $this->Task->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Task->create();
            if ($this->Task->save($this->request->data)) {

                $this->Session->setFlash(__($this->Config['Messages']['save.success']), 'flash/success');

                if (isset($this->request->params['pass'][0])) {
                    $this->redirect(array('controller' => 'frames', 'action' => 'viewTasks', $this->request->params['pass'][0]));
                } else {
                    $this->redirect(array('action' => 'index'));
                }
            } else {
                $this->Session->setFlash(__($this->Config['Messages']['save.error']), 'flash/error');
            }
        }
        $users = $this->Task->User->find('list');
        $projects = $this->Task->Project->find('list');
        
        if (!$users) {
            $this->Session->setFlash(__($this->Config['Messages']['task.user.exception']), 'flash/warning');
            $this->redirect($this->referer());
        }  
        
        if (!$projects) {
            $this->Session->setFlash(__($this->Config['Messages']['task.project.exception']), 'flash/warning');
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
        $this->Task->id = $id;
        if (!$this->Task->exists($id)) {
            throw new NotFoundException(__($this->Config['Messages']['register.not_found']));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Task->save($this->request->data)) {
                $this->Session->setFlash(__($this->Config['Messages']['save.success']), 'flash/success');
                if (isset($this->request->params['pass'][1])) {
                    $this->redirect(array('controller' => 'frames', 'action' => 'viewTasks', $this->request->params['pass'][1]));
                } else {
                    $this->redirect(array('action' => 'index'));
                }
            } else {
                $this->Session->setFlash(__($this->Config['Messages']['save.error']), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('Task.' . $this->Task->primaryKey => $id));
            $this->request->data = $this->Task->find('first', $options);
        }
        $users = $this->Task->User->find('list');
        $projects = $this->Task->Project->find('list');
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
        $this->Task->id = $id;
        if (!$this->Task->exists()) {
            throw new NotFoundException(__($this->Config['Messages']['register.not_found']));
        }
        if ($this->Task->delete()) {
            $this->Session->setFlash(__($this->Config['Messages']['delete.success']), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__($this->Config['Messages']['delete.error']), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }

}

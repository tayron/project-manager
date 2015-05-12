<?php
App::uses('AppController', 'Controller');
/**
 * Taskmessages Controller
 *
 * @property Taskmessage $Taskmessage
 * @property PaginatorComponent $Paginator
 */
class TaskmessagesController extends AppController {

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
		$this->Taskmessage->recursive = 0;
		$this->set('taskmessages', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Taskmessage->exists($id)) {
			throw new NotFoundException($this->Config['Messages']['register.not_found']);
		}
		$options = array('conditions' => array('Taskmessage.' . $this->Taskmessage->primaryKey => $id));
		$this->set('taskmessage', $this->Taskmessage->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Taskmessage->create();
			if ($this->Taskmessage->save($this->request->data)) {
				$this->Session->setFlash(__($this->Config['Messages']['save.success']), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__($this->Config['Messages']['save.error']), 'flash/error');
			}
		}
		$tasks = $this->Taskmessage->Task->find('list');
		$this->set(compact('tasks'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Taskmessage->id = $id;
		if (!$this->Taskmessage->exists($id)) {
			throw new NotFoundException(__('Invalid taskmessage'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Taskmessage->save($this->request->data)) {
				$this->Session->setFlash(__($this->Config['Messages']['save.success']), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__($this->Config['Messages']['save.error']), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Taskmessage.' . $this->Taskmessage->primaryKey => $id));
			$this->request->data = $this->Taskmessage->find('first', $options);
		}
		$tasks = $this->Taskmessage->Task->find('list');
		$this->set(compact('tasks'));
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
		$this->Taskmessage->id = $id;
		if (!$this->Taskmessage->exists()) {
			throw new NotFoundException(__($this->Config['Messages']['regiter.not_found']));
		}
		if ($this->Taskmessage->delete()) {
			$this->Session->setFlash(__($this->Config['Messages']['delete.success']), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__($this->Config['Messages']['delete.error']), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}}

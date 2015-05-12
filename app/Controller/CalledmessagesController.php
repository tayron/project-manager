<?php
App::uses('AppController', 'Controller');
/**
 * Calledmessages Controller
 *
 * @property Calledmessage $Calledmessage
 * @property PaginatorComponent $Paginator
 */
class CalledmessagesController extends AppController {

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
		$this->Calledmessage->recursive = 0;
		$this->set('calledmessages', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Calledmessage->exists($id)) {
			throw new NotFoundException($this->Config['Messages']['register.not_found']);
		}
		$options = array('conditions' => array('Calledmessage.' . $this->Calledmessage->primaryKey => $id));
		$this->set('calledmessage', $this->Calledmessage->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Calledmessage->create();
			if ($this->Calledmessage->save($this->request->data)) {
				$this->Session->setFlash(__($this->Config['Messages']['save.success']), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__($this->Config['Messages']['save.error']), 'flash/error');
			}
		}
		$calleds = $this->Calledmessage->Called->find('list');
		$users = $this->Calledmessage->User->find('list');
		$this->set(compact('calleds', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Calledmessage->id = $id;
		if (!$this->Calledmessage->exists($id)) {
			throw new NotFoundException($this->Config['Messages']['register.not_found']);
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Calledmessage->save($this->request->data)) {
				$this->Session->setFlash(__($this->Config['Messages']['save.success']), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__($this->Config['Messages']['save.error']), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Calledmessage.' . $this->Calledmessage->primaryKey => $id));
			$this->request->data = $this->Calledmessage->find('first', $options);
		}
		$calleds = $this->Calledmessage->Called->find('list');
		$users = $this->Calledmessage->User->find('list');
		$this->set(compact('calleds', 'users'));
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
		$this->Calledmessage->id = $id;
		if (!$this->Calledmessage->exists()) {
			throw new NotFoundException($this->Config['Messages']['register.not_found']);
		}
		if ($this->Calledmessage->delete()) {
			$this->Session->setFlash(__($this->Config['Messages']['delete.success']), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__($this->Config['Messages']['delete.error']), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}}

<?php
App::uses('AppController', 'Controller');
/**
 * Bugmessages Controller
 *
 * @property Bugmessage $Bugmessage
 * @property PaginatorComponent $Paginator
 */
class BugmessagesController extends AppController {

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
		$this->Bugmessage->recursive = 0;
		$this->set('bugmessages', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Bugmessage->exists($id)) {
			throw new NotFoundException($this->Config['Messages']['register.not_found']);
		}
		$options = array('conditions' => array('Bugmessage.' . $this->Bugmessage->primaryKey => $id));
		$this->set('bugmessage', $this->Bugmessage->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Bugmessage->create();
			if ($this->Bugmessage->save($this->request->data)) {
				$this->Session->setFlash(__($this->Config['Messages']['save.success']), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__($this->Config['Messages']['save.error']), 'flash/error');
			}
		}
		$bugs = $this->Bugmessage->Bug->find('list');
		$this->set(compact('bugs'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Bugmessage->id = $id;
		if (!$this->Bugmessage->exists($id)) {
			throw new NotFoundException($this->Config['Messages']['register.not_found']);
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Bugmessage->save($this->request->data)) {
				$this->Session->setFlash(__($this->Config['Messages']['save.success']), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__($this->Config['Messages']['save.error']), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Bugmessage.' . $this->Bugmessage->primaryKey => $id));
			$this->request->data = $this->Bugmessage->find('first', $options);
		}
		$bugs = $this->Bugmessage->Bug->find('list');
		$this->set(compact('bugs'));
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
		$this->Bugmessage->id = $id;
		if (!$this->Bugmessage->exists()) {
			throw new NotFoundException($this->Config['Messages']['register.not_found']);
		}
		if ($this->Bugmessage->delete()) {
			$this->Session->setFlash(__($this->Config['Messages']['delete.success']), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__($this->Config['Messages']['delete.error']), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}}

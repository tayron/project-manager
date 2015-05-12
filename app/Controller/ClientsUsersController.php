<?php
App::uses('AppController', 'Controller');
/**
 * ClientsUsers Controller
 *
 * @property ClientsUser $ClientsUser
 * @property PaginatorComponent $Paginator
 */
class ClientsUsersController extends AppController {

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
		$this->ClientsUser->recursive = 0;
		$this->set('clientsUsers', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ClientsUser->exists($id)) {
			throw new NotFoundException($this->Config['Messages']['register.not_found']);
		}
		$options = array('conditions' => array('ClientsUser.' . $this->ClientsUser->primaryKey => $id));
		$this->set('clientsUser', $this->ClientsUser->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ClientsUser->create();
			if ($this->ClientsUser->save($this->request->data)) {
				$this->Session->setFlash(__($this->Config['Messages']['save.success']), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__($this->Config['Messages']['save.error']), 'flash/error');
			}
		}
		$clients = $this->ClientsUser->Client->find('list');
		$users = $this->ClientsUser->User->find('list');
		$this->set(compact('clients', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->ClientsUser->id = $id;
		if (!$this->ClientsUser->exists($id)) {
			throw new NotFoundException($this->Config['Messages']['register.not_found']);
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ClientsUser->save($this->request->data)) {
				$this->Session->setFlash(__($this->Config['Messages']['save.success']), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__($this->Config['Messages']['save.error']), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('ClientsUser.' . $this->ClientsUser->primaryKey => $id));
			$this->request->data = $this->ClientsUser->find('first', $options);
		}
		$clients = $this->ClientsUser->Client->find('list');
		$users = $this->ClientsUser->User->find('list');
		$this->set(compact('clients', 'users'));
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
		$this->ClientsUser->id = $id;
		if (!$this->ClientsUser->exists()) {
			throw new NotFoundException($this->Config['Messages']['register.not_found']);
		}
		if ($this->ClientsUser->delete()) {
			$this->Session->setFlash(__($this->Config['Messages']['delete.success']), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__($this->Config['Messages']['delete.error']), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}}

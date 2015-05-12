<?php
App::uses('AppController', 'Controller');
/**
 * Clients Controller
 *
 * @property Client $Client
 * @property PaginatorComponent $Paginator
 */
class ClientsController extends AppController {

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
		$this->Client->recursive = 0;
                $this->paginate = array(
                    'fields' => array(
                        'Client.id',
                        'Client.name',
                        'Client.email',
                        'Client.phone',
                        'Client.createdDate',
                        'Client.modifiedDate'
                    )
                );            

		$this->set('clients', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Client->exists($id)) {
			throw new NotFoundException(__($this->Config['Messages']['register.not_found']));
		}

                $options = array('conditions' => array('Client.' . $this->Client->primaryKey => $id));
                
                $this->Client->recursive = 2;
                $this->Client->find('first', $options);
                
		$this->set('client', $this->Client->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Client->create();
			if ($this->Client->save($this->request->data)) {
				$this->Session->setFlash(__( $this->Config['Messages']['save.success'] ), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__( Configure::read('Messages.save.error') ), 'flash/error');
			}
		}
		$users = $this->Client->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Client->id = $id;
		if (!$this->Client->exists($id)) {
			throw new NotFoundException(__($this->Config['Messages']['register.not_found']));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Client->save($this->request->data)) {
				$this->Session->setFlash(__( $this->Config['Messages']['save.success'] ), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__( Configure::read('Messages.save.error') ), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Client.' . $this->Client->primaryKey => $id));
			$this->request->data = $this->Client->find('first', $options);
		}
		$users = $this->Client->User->find('list');
		$this->set(compact('users'));
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
		$this->Client->id = $id;
		if (!$this->Client->exists()) {
			throw new NotFoundException(__($this->Config['Messages']['register.not_found']));
		}
		if ($this->Client->delete()) {
			$this->Session->setFlash(__( $this->Config['Messages']['delete.success'] ), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__( $this->Config['Messages']['delete.error'] ), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}}

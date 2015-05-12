<?php
App::uses('AppModel', 'Model');
/**
 * Task Model
 *
 * @property User $User
 * @property Project $Project
 * @property Taskmessage $Taskmessage
 */
class Task extends AppModel {

    public $virtualFields = array(
        'startFormated' => 'DATE_FORMAT( Task.start , "%d/%m/%Y às %H:%i" )',
        'finishFormated' => 'DATE_FORMAT( Task.finish , "%d/%m/%Y às %H:%i" )',
        'createdFormated' => 'DATE_FORMAT( Task.created , "%d/%m/%Y às %H:%i" )',
        'modifiedFormated' => 'DATE_FORMAT( Task.modified , "%d/%m/%Y às %H:%i" )',
        
        'finishDate' => 'DATE_FORMAT( Task.finish , "%d/%m/%Y" )',
        'createdDate' => 'DATE_FORMAT( Task.created , "%d/%m/%Y" )',
        'modifiedDate' => 'DATE_FORMAT( Task.modified , "%d/%m/%Y" )',
    );
    
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'project_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'descriptions' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Project' => array(
			'className' => 'Project',
			'foreignKey' => 'project_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Taskmessage' => array(
			'className' => 'Taskmessage',
			'foreignKey' => 'task_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	
	
	/**
	 * getStatus method
	 * Retorna uma array com dados das tarefas
	 */
	public function getStatus()
	{
		$nova 				= $this->find( 'count', array( 'conditions' => array( 'and' => array( 'status' => 'Nova' ) ) ) );
		$executando			= $this->find( 'count', array( 'conditions' => array( 'and' => array( 'status' => 'Executando' ) ) ) );
		$enviadoParateste	= $this->find( 'count', array( 'conditions' => array( 'and' => array( 'status' => 'Enviado para teste' ) ) ) );
		$testando			= $this->find( 'count', array( 'conditions' => array( 'and' => array( 'status' => 'Testando' ) ) ) );	
		$finalizada			= $this->find( 'count', array( 'conditions' => array( 'and' => array( 'status' => 'Finalizada' ) ) ) );		
		
		$array[0] = array( 'Nova', $nova );
		$array[1] = array( 'Executando', $executando );
		$array[2] = array( 'Enviado para teste', $enviadoParateste );
		$array[3] = array( 'Testando', $testando );
		$array[4] = array( 'Finalizada', $finalizada );		
    	
        return $array;								
	}

}

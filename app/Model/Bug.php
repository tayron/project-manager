<?php
App::uses('AppModel', 'Model');
/**
 * Bug Model
 *
 * @property User $User
 * @property Project $Project
 * @property Bugmessage $Bugmessage
 */
class Bug extends AppModel {

    public $virtualFields = array(
        'startFormated' => 'DATE_FORMAT( Bug.start , "%d/%m/%Y às %H:%i" )',
        'finishFormated' => 'DATE_FORMAT( Bug.finish , "%d/%m/%Y às %H:%i" )',
        'createdFormated' => 'DATE_FORMAT( Bug.created , "%d/%m/%Y às %H:%i" )',
        'modifiedFormated' => 'DATE_FORMAT( Bug.modified , "%d/%m/%Y às %H:%i" )',
        
        'finishDate' => 'DATE_FORMAT( Bug.finish , "%d/%m/%Y" )',
        'createdDate' => 'DATE_FORMAT( Bug.created , "%d/%m/%Y" )',
        'modifiedDate' => 'DATE_FORMAT( Bug.modified , "%d/%m/%Y" )',
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
		'descritions' => array(
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
		'Bugmessage' => array(
			'className' => 'Bugmessage',
			'foreignKey' => 'bug_id',
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
	 * Retorna uma array com dados dos bugs
	 */
	public function getStatus()
	{
		$novo 				= $this->find( 'count', array( 'conditions' => array( 'and' => array( 'status' => 'Novo' ) ) ) );
		$resolvendo			= $this->find( 'count', array( 'conditions' => array( 'and' => array( 'status' => 'Resolvendo' ) ) ) );
		$enviadoParateste	= $this->find( 'count', array( 'conditions' => array( 'and' => array( 'status' => 'Enviado para teste' ) ) ) );
		$testando			= $this->find( 'count', array( 'conditions' => array( 'and' => array( 'status' => 'Testando' ) ) ) );	
		$resolvido			= $this->find( 'count', array( 'conditions' => array( 'and' => array( 'status' => 'Resolvido' ) ) ) );		
		
		$array[0] = array( 'Novo', $novo );
		$array[1] = array( 'Resolvendo', $resolvendo );
		$array[2] = array( 'Enviado para teste', $enviadoParateste );
		$array[3] = array( 'Testando', $testando );
		$array[4] = array( 'Resolvido', $resolvido );		
    	
        return $array;								
	}	

}

<?php
App::uses('AppModel', 'Model');
/**
 * Project Model
 *
 * @property Client $Client
 * @property Category $Category
 * @property Bug $Bug
 * @property Called $Called
 * @property Task $Task
 */
class Project extends AppModel {
    
    public $virtualFields = array(
        'createdFormated' => 'DATE_FORMAT( Project.created , "%d/%m/%Y às %H:%i" )',
        'modifiedFormated' => 'DATE_FORMAT( Project.modified , "%d/%m/%Y às %H:%i" )',
        
        'createdDate' => 'DATE_FORMAT( Project.created , "%d/%m/%Y" )',
        'modifiedDate' => 'DATE_FORMAT( Project.modified , "%d/%m/%Y" )',
    );
    
	
	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array(
		'client_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'category_id' => array(
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
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	
	/**
	 * belongsTo associations
	 *
	 * @var array
	 */
	public $belongsTo = array(
		'Client' => array(
			'className' => 'Client',
			'foreignKey' => 'client_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'category_id',
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
		'Bug' => array(
			'className' => 'Bug',
			'foreignKey' => 'project_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Called' => array(
			'className' => 'Called',
			'foreignKey' => 'project_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Task' => array(
			'className' => 'Task',
			'foreignKey' => 'project_id',
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
	 * findWithTask method
	 * Metodo que busta todos os projetos que possue tarefas
	 * 
	 */
	public function findWithTask()
	{
		$where['fields']     = array( 'Project.id, Project.name' );
		$where['order_by']   = 'Project.name ASC';
		$where['recursive']  = -1;		
		$where['conditions'] = array(
			"Project.id IN (SELECT `Task`.`project_id` FROM `tasks` as `Task`)"
		);
		$projects = $this->find('all', $where );
		
		$array = array();		
		
		foreach( $projects as $data ){
			$array[$data['Project']['id']] = $data['Project']['name'];
		}

		return $array;
	}
	
	
	/**
	 * findWithBug method
	 * Metodo que busta todos os projetos que possue bugs
	 * 
	 */
	public function findWithBug()
	{
		$where['fields']     = array( 'Project.id, Project.name' );
		$where['order_by']   = 'Project.name ASC';
		$where['recursive']  = -1;
		$where['conditions'] = array(
			"Project.id IN (SELECT `Bug`.`project_id` FROM `bugs` as `Bug`)"
		);
		
		$projects = $this->find('all', $where );
		
		$array = array();		
		
		foreach( $projects as $data ){
			$array[$data['Project']['id']] = $data['Project']['name'];
		}

		return $array;
	}	
	
	
	/**
	 * getStatus method
	 * Retorna uma array com dados das tarefas
	 */
	public function getTaskAndBugs()
	{
		$array = array();

		$where['fields'] = array(
			'Project.name',
			'(
				SELECT 
					COUNT( Task.id ) 
				FROM 
					tasks AS Task
				WHERE 
					Task.project_id = Project.id 
			) AS task',
			'(
				SELECT 
					COUNT( Bug.id ) 
				FROM 
					bugs AS Bug
				WHERE 
					Bug.project_id = Project.id 
			) AS bug',			
		);
		
		$where['recursive'] = -1;		
		$where['order']     = 'Project.name ASC';
		
		$projects = $this->find( 'all', $where );
		
		foreach( $projects as $data ){
			$array[] = array( $data['Project']['name'], $data[0]['task'], $data[0]['bug'] );			
		}
	
        return $array;								
	}	

}

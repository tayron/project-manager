<?php
App::uses('AppModel', 'Model');
/**
 * Category Model
 *
 * @property Project $Project
 */
class Category extends AppModel {
    
    public $virtualFields = array(
        'createdFormated' => 'DATE_FORMAT( Category.created , "%d/%m/%Y às %H:%i" )',
        'modifiedFormated' => 'DATE_FORMAT( Category.modified , "%d/%m/%Y às %H:%i" )',
        
        'createdDate' => 'DATE_FORMAT( Category.created , "%d/%m/%Y" )',
        'modifiedDate' => 'DATE_FORMAT( Category.modified , "%d/%m/%Y" )',
    );
    
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
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
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Project' => array(
			'className' => 'Project',
			'foreignKey' => 'category_id',
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

}

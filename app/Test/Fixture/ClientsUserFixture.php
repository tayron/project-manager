<?php
/**
 * ClientsUserFixture
 *
 */
class ClientsUserFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'client_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => array('id', 'client_id', 'user_id'), 'unique' => 1),
			'fk_clients_has_users_users1_idx' => array('column' => 'user_id', 'unique' => 0),
			'fk_clients_has_users_clients_idx' => array('column' => 'client_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'client_id' => 1,
			'user_id' => 1,
			'created' => '2013-12-06 18:50:37',
			'modified' => '2013-12-06 18:50:37'
		),
	);

}

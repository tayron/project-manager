<?php
App::uses('Taskmessage', 'Model');

/**
 * Taskmessage Test Case
 *
 */
class TaskmessageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.taskmessage',
		'app.task'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Taskmessage = ClassRegistry::init('Taskmessage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Taskmessage);

		parent::tearDown();
	}

}

<?php
App::uses('Bug', 'Model');

/**
 * Bug Test Case
 *
 */
class BugTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.bug',
		'app.user',
		'app.project',
		'app.bugmessage'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Bug = ClassRegistry::init('Bug');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Bug);

		parent::tearDown();
	}

}

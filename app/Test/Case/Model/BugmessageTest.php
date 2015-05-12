<?php
App::uses('Bugmessage', 'Model');

/**
 * Bugmessage Test Case
 *
 */
class BugmessageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.bugmessage',
		'app.bug'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Bugmessage = ClassRegistry::init('Bugmessage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Bugmessage);

		parent::tearDown();
	}

}

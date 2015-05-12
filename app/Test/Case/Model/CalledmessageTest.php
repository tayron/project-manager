<?php
App::uses('Calledmessage', 'Model');

/**
 * Calledmessage Test Case
 *
 */
class CalledmessageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.calledmessage',
		'app.called',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Calledmessage = ClassRegistry::init('Calledmessage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Calledmessage);

		parent::tearDown();
	}

}

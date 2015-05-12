<?php
App::uses('Called', 'Model');

/**
 * Called Test Case
 *
 */
class CalledTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.called',
		'app.project',
		'app.user',
		'app.calledmessage'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Called = ClassRegistry::init('Called');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Called);

		parent::tearDown();
	}

}

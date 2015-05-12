<?php
App::uses('AppController', 'Controller');
/**
 * Dashboard Controller
 *
 */
class DashboardController extends AppController {

    public $uses = array( 'Project', 'Task', 'Bug', 'User', 'Called', 'Client' );
    
    /**
     * index method
     *
     * @return void
     */
    public function index() {            
        
        $countClient    = $this->Client->find( 'count' ); 
        $countProject   = $this->Project->find( 'count' );          

		$whereTask['fields'] = array( 'COUNT(Task.id) AS count' );
		$whereTask['conditions']['and']['Task.status'] = 'Nova';
		$whereTask['recursive'] = -1;
		$countTask       = $this->Task->find( 'all', $whereTask );  		
		$countTask       = $countTask[0][0]['count'];		
		
		$whereBug['fields'] = array( 'COUNT(Bug.id) AS count' );
		$whereBug['conditions']['and']['Bug.status'] = 'Novo';
		$whereBug['recursive'] = -1;
		$countBug       = $this->Bug->find( 'all', $whereBug );  		
		$countBug       = $countBug[0][0]['count'];
		
        $countUser      = $this->User->find( 'count' );  
        $countCalled    = $this->Called->find( 'count' ); 
		
		$projectsWhithTaskAndBugs = $this->Project->getTaskAndBugs();		
		$numTask 		= $this->Task->getStatus();
		$numBug 		= $this->Bug->getStatus();
		
		$whereProject['recursive'] = -1;
		$whereProject['fields']    = array( 'Project.id', 'Project.name' );		
		$projects = $this->Project->find( 'all', $whereProject ); 
		
        $this->set( compact( 'countProject', 'countTask', 'countBug', 'countUser', 'countClient', 'countCalled', 'numTask', 'numBug', 'projectsWhithTaskAndBugs', 'projects' ) );
    }
}
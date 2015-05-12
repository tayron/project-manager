<?php
App::uses('AppController', 'Controller');
/**
 * Frames Controller
 * 
 * @property PaginatorComponent $Paginator
 */
class FramesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array( 'Paginator' );
        public $uses = array( 'Bug', 'Task', 'Project' );

/**
 * viewBugs method
 *
 * @return void
 */
	public function viewBugs( $id = null ) {
            
            $projectName = $this->getNameProject( $id );   
            
            if( !$this->Bug->find( 'count', array( 'conditions' => array( 'Bug.project_id' => $id ) ) ) ) {
                $this->Session->setFlash(__( "Não há nenhum bug para o projeto {$projectName}" ), 'flash/default');
                $this->redirect( array( 'controller' => 'projects', 'action' => 'index' ) );
            }
            
            $filter['recursive'] = 0;
            $filter = array(
                'fields' => array(
                    'User.id',
                    'User.name',
                    'Project.name',
                    'Bug.id',
                    'Bug.name',
                    'Bug.status',
                    'Bug.startFormated',
                    'Bug.finishFormated',                    
                    'Bug.modifiedFormated',
                )
            );     
            
            $filter['conditions']['and']['Bug.project_id'] = $id;
            
            $filter['conditions']['and']['status'] = 'Novo';
            $bugsNovos = $this->Bug->find( 'all', $filter );    
            
            $filter['conditions']['and']['status'] = 'Resolvendo';
            $bugsResolvendo = $this->Bug->find( 'all', $filter );            

            $filter['conditions']['and']['status'] = 'Enviado para teste';
            $bugsEnviadoParaTeste = $this->Bug->find( 'all', $filter );             

            $filter['conditions']['and']['status'] = 'Testando';
            $bugsTestando = $this->Bug->find( 'all', $filter );

            $filter['conditions']['and']['status'] = 'Resolvido';
            $bugsResolvido = $this->Bug->find( 'all', $filter );
            
			$projects = $this->Project->findWithBug();
		
            $this->set( compact( 'bugsNovos', 'bugsResolvendo', 'bugsEnviadoParaTeste', 'bugsTestando', 'bugsResolvido', 'projects' ) );
	}
        
/**
 * viewTasks method
 *
 * @return void
 */
	public function viewTasks( $id = null ) {
            
            $projectName = $this->getNameProject( $id );   
            
            if( !$this->Task->find( 'count', array( 'conditions' => array( 'Task.project_id' => $id ) ) ) ) {
                $this->Session->setFlash(__( "Não há nenhuma tarefa o projeto {$projectName}" ), 'flash/default');
                $this->redirect( array( 'controller' => 'projects', 'action' => 'index' ) );
            }
                
            $this->getNameProject( $id ); 

            
            $filter['recursive'] = 0;
            $filter = array(
                'fields' => array(
                    'User.id',
                    'User.name',
                    'Project.name',
                    'Task.id',
                    'Task.name',
                    'Task.status',
                    'Task.startFormated',
                    'Task.finishFormated',                    
                    'Task.modifiedFormated',
                )
            );                 

            $filter['conditions']['and']['Task.project_id'] = $id;

            $filter['conditions']['and']['status'] = 'Nova';
            $tasksNovas = $this->Task->find( 'all', $filter );             

            $filter['conditions']['and']['status'] = 'Executando';
            $tasksExecutando = $this->Task->find( 'all', $filter );  
            
            $filter['conditions']['and']['status'] = 'Enviada para teste';
            $tasksEnviadaParaTeste = $this->Task->find( 'all', $filter );  

            $filter['conditions']['and']['status'] = 'Testando';
            $tasksTestando = $this->Task->find( 'all', $filter );  

            $filter['conditions']['and']['status'] = 'Finalizada';
            $tasksFinalizadas = $this->Task->find( 'all', $filter );  
		
			$projects = $this->Project->findWithTask();
		
            $this->set( compact( 'tasksNovas', 'tasksExecutando' , 'tasksEnviadaParaTeste', 'tasksTestando', 'tasksFinalizadas', 'projects' ) );
	}     
        
        
/**
 * getNameProject method
 *
 * @return void
 */        
        private function getNameProject( $id ){
            
            $filterProject['fields'] = 'Project.name';
            $filterProject['conditions']['and']['Project.id'] = $id;
            $filterProject['recursive'] = -1;

            $projectName = $this->Project->find( 'first', $filterProject );
            $this->set( 'projectName', $projectName['Project']['name'] );    
            
            return $projectName['Project']['name'];
        }
}
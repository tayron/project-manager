<?php echo $this->Html->script( 'https://www.google.com/jsapi', false ) ?>



<div id="page-container" class="row">

    <div id="page-content" class="col-sm-12">
		<div class="col-sm-8" style='padding: 0px'>
			<div class="col-sm-12">
				<div class="alert alert-info">
					<h4 style='margin-top: 0px'>Resumo do sistema</h4>
					<p>Um breve resumo de tudo que há no sistema</p>
				</div>	
			</div>	
			
		   <div class="col-sm-3">
				<a 
				   href="<?php echo $this->Html->url(array('controller' => 'clients', 'action' => 'index')) ?>" 
				   class="well thumbnail" 
				   style='width: 100%; height: 120px; background-color: #b3ad00; color: #FFF; text-align: center'
				>
					Clientes
					<h2><?php echo $countClient ?></h2> 
				</a>
			</div>            
			<div class="col-sm-3">
				<a 
				   href="<?php echo $this->Html->url(array('controller' => 'projects', 'action' => 'index')) ?>" 
				   class="well thumbnail" 
				   style='width: 100%; height: 120px; background-color: #F0AD4E; color: #FFF; text-align: center'
				>
					Projetos
					<h2><?php echo $countProject ?></h2> 
				</a>
			</div>
			<div class="col-sm-3">
				<a 
				   href="<?php echo $this->Html->url(array('controller' => 'tasks', 'action' => 'index')) ?>" 
				   class="well  thumbnail" 
				   style='width: 100%; height: 120px; background-color: #5BC0DE; color: #FFF; text-align: center'
				>                    
					Tarefas
					<h2><?php echo $countTask ?></h2> 
				</a>
			</div>
			<div class="col-sm-3">
				<a 
				   href="<?php echo $this->Html->url(array('controller' => 'bugs', 'action' => 'index')) ?>" 
				   class="well thumbnail" 
				   style='width: 100%; height: 120px; background-color: #428BCA; color: #FFF; text-align: center'
				>
					Bugs
					<h2><?php echo $countBug ?></h2> 
				</a>
			</div>
	
			<div class="col-sm-3">
				<a 
				   href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'index')) ?>" 
				   class="well thumbnail" 
				   style='width: 100%; height: 120px; background-color: #5CB85C; color: #FFF; text-align: center'
				>
					Usuários
					<h2><?php echo $countUser ?></h2> 
				</a>
			</div>        
	
			<div class="col-sm-3">
				<a 
				   href="<?php echo $this->Html->url(array('controller' => 'calleds', 'action' => 'index')) ?>" 
				   class="well thumbnail" 
				   style='width: 100%; height: 120px; background-color: #777; color: #FFF; text-align: center'
				>
					Chamados                    
					<h2><?php echo $countCalled ?></h2>
				</a>
			</div> 	
		</div>
		
		<div class="col-sm-4" style='padding: 0px'>
			<div class="col-sm-12">
				<div class="alert alert-info">
					<h4 style='margin-top: 0px'>Projetos</h4>
					<p>Todos os projetos em andamento</p>
				</div>	
			</div>	
			<div class="col-sm-12">	
				<?php foreach( $projects as $project ) : ?>
					<a 
					   class="btn btn-default btn-xs" 
					   href="<?php echo $this->Html->url(array('controller' => 'projects', 'action' => 'view', $project['Project']['id'])) ?>"
					   title = "Clique aqui para ver os detalhes deste projeto"
					   style='background-color: #b3ad00; color: #FFF; border: 0px; margin: 3px; padding: 3px 5px'
					>
						<?php echo $project['Project']['name'] ?>
					</a>				
				<?php endforeach; ?>
			</div>
		</div>
		
		<br clear='both' />
		<br clear='both' />
		
		<div class="col-sm-6">			
			<div class="alert alert-info">
			  <h4 style='margin-top: 0px'>Andamento das correções dos bugs</h4>
			  <p>O gráfico abaixo informa a porcentagem dos bugs corrigidos</p>
			</div>			
			<div id="andamento_bugs"></div>			
		</div>
		<div class="col-sm-6">
			<div class="alert alert-info">
			  <h4 style='margin-top: 0px'>Andamento da execução das tarefas</h4>
			  <p>O gráfico abaixo informa a porcentagem das tarefas concluídas</p>
			</div>	
			<div id="andamento_das_tarefas"></div>			
		</div>	
		
		<div class="col-sm-12">	
			<div class="alert alert-info">
			  <h4 style='margin-top: 0px'>Resumo dos projetos</h4>
			  <p>O gráfico abaixo informa o número de tarefas e bugs que cada projeto possui</p>
			</div>			
			<div id='andamento_projeto'></div>
		</div>
    </div><!-- /#page-content .col-sm-9 -->
	

</div><!-- /#page-container .row-fluid -->



<script type="text/javascript">
	
	// Load the Visualization API and the piechart package.
	google.load('visualization', '1.0', {'packages':['corechart']});
	
	// Set a callback to run when the Google Visualization API is loaded.
	google.setOnLoadCallback(drawChart);
	
	// Callback that creates and populates a data table,
	// instantiates the pie chart, passes in the data and
	// draws it.
	function drawChart() {
		
		/**
		 * Andamento das tarefas
		 */

		// Create the data table.
		var data = new google.visualization.DataTable();
		data.addColumn('string', 'Topping');
		data.addColumn('number', 'Slices');
		data.addRows(<?php echo json_encode($numTask, JSON_NUMERIC_CHECK)?>);
		
		// Set chart options
		var options = {'title':'',
					   'width':'100%',
					   'height':300,
					   'colors': ['#999', '#f0ad4e', '#5bc0de', '#428BCA', '#5CB85C']
					  };
		
		// Instantiate and draw our chart, passing in some options.
		var chart = new google.visualization.PieChart(document.getElementById('andamento_das_tarefas'));
		chart.draw(data, options);
		
		
		/**
		 * Andamento das correções de bugs
		 */
		
		// Create the data table.
		var data = new google.visualization.DataTable();
		data.addColumn('string', 'Topping');
		data.addColumn('number', 'Slices');
		data.addRows(<?php echo json_encode($numBug, JSON_NUMERIC_CHECK)?>);
		
		// Set chart options
		var options = {'title':'',
					   'width':'100%',
					   'height':300,
					   'colors': ['#d9534f', '#f0ad4e', '#5bc0de', '#428BCA', '#5CB85C']
					  };
		
		// Instantiate and draw our chart, passing in some options.
		var chart = new google.visualization.PieChart(document.getElementById('andamento_bugs'));
		chart.draw(data, options);	
		
		
		/**
		 * Andamento do projeto
		 */
		
		// Create the data table.
		var data = new google.visualization.DataTable();
		data.addColumn('string', 'Projetos');
		data.addColumn('number', 'Tarefas');
		data.addColumn('number', 'Bugs');
		data.addRows(<?php echo json_encode($projectsWhithTaskAndBugs, JSON_NUMERIC_CHECK)?>);
		
		// Set chart options
		var options = {'title':'',
					   'width':'100%',
					   'height':400,
					   'colors': ['#428BCA', '#d9534f']
					  };
		
		// Instantiate and draw our chart, passing in some options.
		var chart = new google.visualization.BarChart(document.getElementById('andamento_projeto'));
		chart.draw(data, options);			
		
	}	
	
</script>

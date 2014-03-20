<?php
class TasksShell extends AppShell {
	public $uses=array('Task');
	public function cron(){
		$this->out(__d('q3_task','Begin cron').' '.date('Y-m-d H:i:s'),1,Shell::QUIET);
		$tasks=$this->Task->find('list',array(
			'conditions'=>array(
				'Task.active'=>TASK_STATUS_ACTIVE,
				'Task.next <='=>date('Y-m-d H:i:s')
			),
			'fields'=>array('Task.id')
		));
		if(empty($tasks)){
			$this->out(__d('q3_task','No tasks on schedule'),1,Shell::QUIET);
		}
		else{
			foreach($tasks as $id_task){
				$this->execute($id_task);
				//$this->out($id_tarea);
			}
		}
		$this->out(__d('q3_task','End cron').' '.date('Y-m-d H:i:s'),1,Shell::QUIET);
	}


	private function execute($id=null){
		if(!empty($id)){
			$task=$this->Task->findById(intval($id));
		}
		else{
			$task=null;
		}
		if(!empty($task)){

			if(!empty($task['Task']['action'])){
				//$task['Task']['error']=$this->requestAction($task['Task']['accion']);

				/*
				 * All the task options will be modified from the function
				 */
				$task_result['Task']=$this->requestAction($task['Task']['action'],array('task'=>$task));
				$this->out(date('Y-m-d H:i:s').' '.$task['Task']['action'],1,Shell::QUIET);

				if(isset($task_result['Task']['result'])){
					$task['Task']['result']=intval($task_result['Task']['result']);
				}
				else{
					$task['Task']['result']=intval(!empty($task_result['Task']['error']));
				}

				if(isset($task_result['Task']['error'])){
					$task['Task']['error']=$task_result['Task']['error'];
					$this->out(date('Y-m-d H:i:s').' '.$task['Task']['error'],1,Shell::QUIET);
				}

				if(isset($task_result['Task']['last'])){
					$task['Task']['last']=$task_result['Task']['last'];
				}
				else{
					$task['Task']['last']=date('Y-m-d H:i:s');
				}
				if(isset($task_result['Task']['next'])){
					$task['Task']['next']=$task_result['Task']['next'];
				}
				else{
					$task['Task']['next']=date('Y-m-d H:i:s',strtotime('+'.$task['Task']['interval'].'minutes'));
				}
				$this->Task->id=$id;
				$this->Task->save($task);
			}
		}
	}

	public function patata(){
		$this->out('patata',1,Shell::QUIET);
		$this->out('Peñasco');
	}
}


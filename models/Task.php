<?php
class Task extends DBTable {
	private $errors;

	/**
	 * Constructor
	 * Arguments : None
	 */
	function __construct() {
		parent::__construct("task");
	}

	/**
	 * This will create a new Task and returns the id of the newly created row.
	 */
	function create($task, $time) {
		$validation_rules = $this->getValidationRules();
		$validation_errors = check($validation_rules, 3);
		
		if($validation_errors) {
			$this->errors = $validation_errors;
			return array('success' => false, 'error' => $this->error);
		}
		
		if(strpos($time, ':') !== false) {
			list($hour, $min) = explode(":", $time);
			$time_in_minutes = $min + ($hour * 60);
		} else {
			$time_in_minutes = $time;
		}
		
		$this->newRow();
		$this->field['name'] = $task;
		$this->field['predicted_time'] = $time_in_minutes;
		$this->field['status'] = 'in_progress';
		$this->field['start_on'] = 'NOW()';
		$this->field['user_id'] = $_SESSION['user_id'];
		$task_id = $this->save();
		
		return array('success'=>$task_id, 'error'=>false, "task"=>$task, "time"=>$time_in_minutes);
	}
	
	function end($task_id) {
		$this->find($task_id);
		$start_on = $this->field['start_on'];
		$this->field['end_on'] = 'NOW()';
		$this->field['status'] = 'done';
		$this->save();
		
		$time_taken = getTimeDifference($start_on, date('Y-m-d H:i:s'));
		
		return array('success'=>$task_id, 'error'=>false, "time_taken" => $time_taken);
	}

	function getValidationRules() {
		return array(
			array('name'=>'task', 'is'=>'empty', 'error'=>'Task not provided'),
			array('name'=>'time', 'is'=>'empty', 'error'=>'Time not provided'),
			array('name'=>'time', 'is'=>'not_match', 'value'=>'^\d+\:?\d*$', 'error'=>'Time is not in a valid format'),
		);
	}

}
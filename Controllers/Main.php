<?php
require_once '../Models/Main.php';

class MainController {
	private $model;

	public function __construct() {
		$this->model = new MainModel ();
	}

	public function getTaskList () {
		$list_name = $_POST['list-name'];
		$this->showTaskView ($list_name);
	}

	public function changeTaskItemStatus () {
		$list_name = $_POST['list-name'];
		$item_name = $_POST['item-name'];
		$item_value = $_POST['item-value'];
		$this->model->setItemStatus($list_name, $item_name, $item_value);
		$this->showTaskView ($list_name);
	}

	public function removeTaskItem () {
		$list_name = $_POST['list-name'];
		$item_name = $_POST['item-name'];
		$this->model->removeItemFromList($list_name, $item_name);
		$this->showTaskView ($list_name);
	}

	public function addTaskItem () {
		$list_name = $_POST['list-name'];
		$item_name = $_POST['item-name'];
		$this->model->addItemToList($list_name, $item_name);
		$this->showTaskView ($list_name);
	}

	public function changeTaskItemName () {
		$list_name = $_POST['list-name'];
		$item_name = $_POST['item-name'];
		$item_name = $_POST['new-item-name'];

		$this->model->changeItemName($list_name, $item_name);
		$this->showTaskView ($list_name);
	}

	private function showTaskView ($list_name) {
		$task_list = $this->model->getListByName ($list_name);
		include '../Views/TaskList.php';
	}

}

?>

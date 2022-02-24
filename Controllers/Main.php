<?php
require_once '../Models/Main.php';

class MainController {
	private $model;

	public function __construct() {
		$this->model = new MainModel ();
	}

	public function createNewTodo () {
		$list_name = $_POST['list-name'];
		$this->model->createNewTodo($list_name);
		$this->showTaskView ($list_name);
	}

	public function getTaskList () {
		$list_name = $_POST['todo-list'];
		if(!$list_name) {
			echo var_dump($_POST);
			include '../Views/default.php';
			return;
		}
		$this->showTaskView ($list_name);
	}

	public function getTodoBook () {
		$todo_names = $this->model->getTodoNames();
		$this->showDefaultView($todo_names);
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
		if(!$item_name) {
			include '../Views/default.php';
			return;
		}
		$this->model->addItemToList($list_name, $item_name);
		$this->showTaskView ($list_name);
	}

	public function changeTaskItemName () {
		$list_name = $_POST['list-name'];
		$old_item_name = $_POST['old-item-name'];
		$new_item_name = $_POST['new-item-name'];
		$this->model->changeItemName($list_name, $old_item_name, $new_item_name);
		$this->showTaskView ($list_name);
	}

	public function changeTaskListName () {
		$old_list_name = $_POST['old-list-name'];
		$new_list_name = $_POST['new-list-name'];
		$list_name = $new_list_name;

		$this->model->changeListName($list_name, $old_list_name, $new_list_name);
		$this->showTaskView ($list_name);
	}

	public function editTaskItem () {
		$list_name = $_POST['list-name'];
		$edit_item_name = $_POST['item-name'];
		$this->showTaskView ($list_name, $edit_item_name);
	}

	public function editTaskList () {
		$list_name = $_POST['list-name'];
		$todo_edit_name = $_POST['list-name'];
		$this->showTaskView ($list_name, null, $todo_edit_name);
	}

	private function showTaskView ($list_name, $edit_item_name = null, $todo_edit_name = null) {
		$todo_names = $this->model->getTodoNames();
		if ($list_name == null) {

		}

		$task_list = $this->model->getListByName ($list_name);
		include '../Views/default.php';
	}

	private function showDefaultView ($todo_names) {
		include '../Views/default.php';
	}

}

?>

<?php
	require_once '../Controllers/Main.php';
	$Controller = new MainController();
	$param = $_REQUEST['action'];

	switch ($param) {
		case 'add-todo-list':
			$Controller->createNewTodo ();
			break;
		case 'get-task-list':
			$Controller->getTaskList();
			break;
		case 'add-item':
			$Controller->addTaskItem ();
			break;
		case 'remove-item':
			$Controller->removeTaskItem ();
			break;
		case 'edit-item':
			$Controller->editTaskItem ();
			break;
		case 'change-item-name':
			$Controller->changeTaskItemName ();
			break;
		case 'set-item-status':
			$Controller->changeTaskItemStatus ();
			break;
		default:
			$Controller->getTodoBook ();
			break;
	}
?>

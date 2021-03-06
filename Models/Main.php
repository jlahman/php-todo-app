<?php
class MainModel {
	private $saveFile;

	public function __construct () {
		$this->saveFile = '../Models/data/todo_data.json';
		if(!file_exists($this->saveFile)) {
			file_put_contents ($this->saveFile, json_encode([], JSON_PRETTY_PRINT));
		}
		#file_put_contents ($this->saveFile, json_encode(['test_list' => ['item1' => ['completed' => false], 'item2' => ['completed' => false]]], JSON_PRETTY_PRINT));
	}

	public function getListByName($list_name) {
		$todo_data = json_decode(file_get_contents($this->saveFile), true);
		$list = $todo_data[$list_name];
		return $list;
	}

	public function getTodoNames() {
		$todo_data = json_decode(file_get_contents($this->saveFile), true);
		$names = array_keys($todo_data);
		return $names;
	}

	public function createNewTodo ($list_name) {
		$todo_data = json_decode(file_get_contents($this->saveFile), true);
		if($todo_data[$list_name]) {
			$list_name = $list_name . ' copy';
		}
		$todo_data[$list_name] = ["Item" => ['completed' => false]];
		file_put_contents ($this->saveFile, json_encode($todo_data, JSON_PRETTY_PRINT));
	}

	public function setItemStatus($list_name, $item_name, $item_value) {
		$list = $this->getListByName($list_name);
		$list[$item_name]['completed'] = $item_value == "true" ? true : false;
		$this->updateList($list_name, $list);
	}

	public function removeItemFromList($list_name, $item_name) {
		$list = $this->getListByName($list_name);
		unset($list[$item_name]);
		$this->updateList($list_name, $list);
	}

	public function removeListFromBook($list_name) {
		$todo_data = json_decode(file_get_contents($this->saveFile), true);
		unset($todo_data[$list_name]);
		file_put_contents ($this->saveFile, json_encode($todo_data, JSON_PRETTY_PRINT));
	}

	public function addItemToList($list_name, $item_name) {
		$list = $this->getListByName($list_name);
		$list[$item_name] = ['completed' => false];
		$this->updateList($list_name, $list);
	}

	public function changeItemName ($list_name, $old_item_name, $new_item_name) {
		$list = $this->getListByName($list_name);
		$index = array_search($old_item_name , array_keys($list));
		if($index === false) {
			return;
		}
		$new_entry = array($new_item_name => ['completed' => $list[$old_item_name]['completed']]);
		$before = array_slice ($list, 0, $index, true);
		$after = array_slice ($list, $index + 1, null, true);
		$list = $before + $new_entry + $after;
		$this->updateList($list_name, $list);
	}

	public function changeListName ($list_name, $old_list_name, $new_list_name) {
		$todo_data = json_decode(file_get_contents($this->saveFile), true);
		$list = $this->getListByName($old_list_name);
		$index = array_search($old_list_name , array_keys($todo_data));
		if($index === false) {
			return;
		}
		$new_entry = array($new_list_name => $list);
		$before = array_slice ($todo_data, 0, $index, true);
		$after = array_slice ($todo_data, $index + 1, null, true);
		$todo_data = $before + $new_entry + $after;
		file_put_contents ($this->saveFile, json_encode($todo_data, JSON_PRETTY_PRINT));
	}

	private function updateList($list_name, $list) {
		$todo_data = json_decode(file_get_contents($this->saveFile), true);
		$todo_data[$list_name] = $list;
		file_put_contents ($this->saveFile, json_encode($todo_data, JSON_PRETTY_PRINT));

	}
}
?>

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

	public function addItemToList($list_name, $item_name) {
		$list = $this->getListByName($list_name);
		$list[$item_name] = ['completed' => false];
		$this->updateList($list_name, $list);
	}

	private function updateList($list_name, $list) {
		$todo_data = json_decode(file_get_contents($this->saveFile), true);
		$todo_data[$list_name] = $list;
		file_put_contents ($this->saveFile, json_encode($todo_data, JSON_PRETTY_PRINT));

	}
}
?>

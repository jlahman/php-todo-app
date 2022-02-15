<?php
include 'Partials/header.php';
?>
<div style="display:flex;background-color:#e3e3e3;border-radius:16px;padding:8px;height:min-content;align-content:center;">
	<label for="list-select">Choose a todo list:</label>

	<select name="todo-list" id="list-select" form="load-selected-list-form" style="margin:8px;">
		<option value="" selected>--select todo list--</option>
		<option value="DailyTodo">DailyTodo</option>
		<option value="test_list">Test Todo</option>
	</select>

	<form action='' method="POST" style="inline-block;" id="load-selected-list-form">
		<input type="hidden" name="action" value="get-task-list">
		<button>Load List</button>
	</form>
</div>
<?php
include 'Partials/todo_nav.php';
include 'Partials/footer.php';
?>

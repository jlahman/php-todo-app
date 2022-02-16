<?php

?>

<div style="height:100vh">
	<section style="box-sizing:border-box;display:flex;flex-direction: column;background-color:#e3e3e3;border-radius:16px;padding:2vh;align-content:center;justify-content: space-between;width:10vw;height:100vh;">
		<div>
			<?php
			foreach ($todo_names as $todo_name) { ?>

				<div style="display:flex;flex-direction: row;justify-content: flex-end;align-content:center;">
					<form class="" action="" method="POST">
						<input type="hidden" name="action" value="get-task-list"></input>
						<input type="hidden" name="todo-list" value="<?php echo $todo_name; ?>">
						<button><?php echo $todo_name; ?></button>
					</form>
				</div>

				<hr style="width:100%"></hr>

			<?php
			}
			?>
		</div>
		<div style="display:flex;flex-direction: row;justify-content: center;align-content:center;justify-self:flex-end">
			<form class="" action="" method="POST">
				<input type="hidden" name="action" value="add-todo-list"></input>
				<input type="hidden" name="list-name" value="New List"></input>
				<button>New Todo List</button>
			</form>
		</div>
	</section>
</div>

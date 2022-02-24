<?php

?>

<div style="height:100vh">
	<section style="box-sizing:border-box;display:flex;flex-direction: column;background-color:#e3e3e3;border-radius:16px;padding:2vh;align-content:center;justify-content: space-between;width:max-content;height:100vh;">
		<div>
			<?php
			foreach ($todo_names as $todo_name) { ?>

				<div style="display:flex;flex-direction: row;justify-content: space-between;;align-content:center;">
					<?php if ($todo_edit_name !== $todo_name){ ?>
						<div>
							<form class="" action="" method="POST">
								<input type="hidden" name="action" value="get-task-list"></input>
								<input type="hidden" name="todo-list" value="<?php echo $todo_name; ?>">
								<button><?php echo $todo_name; ?></button>
							</form>
						</div>
					<?php } else { ?>
						<form action="" method="POST" style="display:inline-block;"  >
							<input type="hidden" name="action" value="change-list-name">
							<input type="hidden" name="old-list-name" value="<?php echo $list_name?>">
							<input type="text" id="<?php echo $todo_name?>_editbox" name="new-list-name" value="<?php echo $todo_name?>" style="display:inline=block;size:4;">
						</form>
					<?php } ?>

					<?php if ($todo_edit_name !== $todo_name){ ?>
						<div>
							<form class="" action="" method="POST">
								<input type="hidden" name="action" value="edit-task-list"></input>
								<input type="hidden" name="list-name" value="<?php echo $todo_name; ?>">
								<button>Edit</button>
							</form>
						</div>
					<?php } else { ?>
						<div>
							<form class="" action="" method="POST"  id="<?php echo $todo_name?>_editform">
								<input type="hidden" name="action" value="change-list-name"></input>
								<input type="hidden" name="old-list-name" value="<?php echo $todo_name; ?>">
								<input type="hidden" id="<?php echo $todo_name?>_editname" name="new-list-name" >
								<button>Save</button>

								<script>
									document.getElementById("<?php echo $todo_name?>_editform").onsubmit = function () {
										document.getElementById("<?php echo $todo_name?>_editname").value = document.getElementById("<?php echo $todo_name?>_editbox").value;
									};
								</script>
							</form>
						</div>
					<?php } ?>
					<form action=""  method="POST" style="align-self:center">
						<input type="hidden" name="action" value="remove-list">
						<input type="hidden" name="list-name" value="<?php echo $todo_name?>">
						<button>Delete</button>
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

<div style="width:90%;height:min-content;border: thin solid black; border-radius:8px;padding:6px;margin:4px;display:flex;align-items:center;justify-content:space-between;">
	<div style="display:flex;align-items:center;">
		<form action='' method="POST"  style="display:inline;">
			<input type="hidden" name="action" value="set-item-status">
			<input type="hidden" name="list-name" value="<?php echo $list_name?>">
			<input type="hidden" name="item-name" value="<?php echo $item_name?>">
			<input type="hidden" id="<?php echo $item_name?>_checkbox_value" name="item-value" value="">

			<input type="checkbox" id="<?php echo $item_name?>_checkbox"<?php echo $item_data['completed'] ? 'checked' : '';?>> </input>
			<script>
				document.getElementById("<?php echo $item_name?>_checkbox").onclick = function () {
					document.getElementById("<?php echo $item_name?>_checkbox_value").value = document.getElementById("<?php echo $item_name?>_checkbox").checked;
					document.getElementById("<?php echo $item_name?>_checkbox").parentNode.submit();};
			</script>
		</form>

		<?php if( $edit_item_name == $item_name) { ?>
			<form action="" method="POST" style="display:inline-block;"  >
				<input type="hidden" name="action" value="change-item-name">
				<input type="hidden" name="list-name" value="<?php echo $list_name?>">
				<input type="hidden" name="old-item-name" value="<?php echo $item_name?>">
				<input type="text" id="<?php echo $item_name?>_editbox" name="new-item-name" value="<?php echo $item_name?> "style="display:inline=block;">
			</form>
		<?php } else {?>
			<p style="display:inline; <?php echo $item_data['completed'] ? 'text-decoration-line:line-through' : '';?>"><?php echo $item_name;?></p>
		<?php }?>
	</div>

	<div style="display:grid;align-items:center;">
		<?php if( $edit_item_name == $item_name) { ?>
			<form action=""  method="POST" id="<?php echo $item_name?>_editform" style="align-self:center">
				<input type="hidden" name="action" value="change-item-name">
				<input type="hidden" name="list-name" value="<?php echo $list_name?>">
				<input type="hidden" name="old-item-name" value="<?php echo $item_name?>">
				<input type="hidden"  id="<?php echo $item_name?>_editname" name="new-item-name" >

				<button  >save</button>
				<script>
					document.getElementById("<?php echo $item_name?>_editform").onsubmit = function () {
						document.getElementById("<?php echo $item_name?>_editname").value = document.getElementById("<?php echo $item_name?>_editbox").value;
					};
				</script>
			</form>
		<?php } else {?>
			<form action=""  method="POST" style="align-self:center">
				<input type="hidden" name="action" value="edit-item">
				<input type="hidden" name="list-name" value="<?php echo $list_name?>">
				<input type="hidden" name="item-name" value="<?php echo $item_name?>">
				<button>Edit</button>
			</form>
		<?php }?>

		<form action=""  method="POST" style="align-self:center">
			<input type="hidden" name="action" value="remove-item">
			<input type="hidden" name="list-name" value="<?php echo $list_name?>">
			<input type="hidden" name="item-name" value="<?php echo $item_name?>">
			<button>Delete</button>
		</form>
	</div>
</div>

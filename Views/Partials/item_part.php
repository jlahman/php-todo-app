<div style="width:90%;height:auto;border: thin solid black; border-radius:8px;padding:6px;margin:4px;display:flex;align-items:center;justify-content:space-between;">
	<div>
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

		<p style="display:inline;"><?php echo $item_name;?></p>
	</div>

	<div>
		<form action=""  method="POST">
			<input type="hidden" name="action" value="edit-item">
			<input type="hidden" name="list-name" value="<?php echo $list_name?>">
			<input type="hidden" name="item-name" value="<?php echo $item_name?>">
			<button>Edit</button>
		</form>

		<form action=""  method="POST">
			<input type="hidden" name="action" value="remove-item">
			<input type="hidden" name="list-name" value="<?php echo $list_name?>">
			<input type="hidden" name="item-name" value="<?php echo $item_name?>">
			<button>Delete</button>
		</form>
	</div>
</div>

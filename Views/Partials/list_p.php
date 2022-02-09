<div style="width:auto;height:max-content;border: thin solid black; border-radius:16px;padding:12px;background-color:#e0e0e0">
<?php
echo $list_name . "<hr>";
foreach ($task_list as $item_name => $item_data) {

	include ('item_part.php');

}
?>

<form action="" method="POST" style="width:90%;height:auto;border: thin solid black; border-radius:8px;padding:6px;margin:4px;display:flex;align-items:center;justify-content:space-between;">
	<input type="hidden" name="action" value="add-item">
	<input type="hidden" name="list-name" value="<?php echo $list_name?>">
	<input type="text" name="item-name" placeholder="Enter Todo Name">
	<button>New Todo</button>
</form>

</div>

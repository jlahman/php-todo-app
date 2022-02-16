<?php
include 'Partials/header.php';

echo "<div style=\"display:flex;align-items:center;width:100vw;height:100vh;\">";
	include 'Partials/todo_nav.php';
	if($task_list !== null){
		echo "<div style=\"display:flex;justify-content:center;align-items:center;width:90%;height:90%;justify-self:center\">";

		include 'Partials/list_p.php';

		echo "</div>";
	}
echo "</div>";

include 'Partials/footer.php';
?>

<?php
session_start();
session_unset();
session_destroy();
	print("
		<script languange=\"javascript\">
			window.location = '../index.php';
		</script>
	");
?>

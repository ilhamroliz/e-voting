<?php
session_start();
Session_unregister('iduser_web');
Session_unregister('namauser_web');
Session_unregister('groupuser_web');
Session_unregister('pemilih_nama');
Session_unregister('CALON_register');
session_unset();
session_destroy();
	print("
		<script languange=\"javascript\">
			window.location = '../index.php';
		</script>
	");
?>

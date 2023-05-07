<?
session_start();
if(!$_SESSION['iduser_web'] && !$_SESSION['groupuser_web']) 
{
	print("
		<script languange=\"javascript\">
			alert(\"Maaf Anda Tidak Boleh Mengakses Halaman Ini.\");
			window.location = '../index.php';
		</script>
	");
}
?>
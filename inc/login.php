<?php
session_start();
if ($_POST['dewan_id']){
	$dewan_id = $_POST['dewan_id'];
	session_register('proses_pemilihan');
	$_SESSION['proses_pemilihan']=$dewan_id;
	header('Location: ../index.php');
}	
?>

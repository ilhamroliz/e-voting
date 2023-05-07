<?php 
session_start();
include("include/koneksi.php");
$sqlsatu	= "SELECT ketetapan_id FROM m_ketetapan where ketetapan_status='1' and dewan_id='".$_SESSION['proses_pemilihan']."'";
$esqlsatu	= mysql_query($sqlsatu);
$dsqlsatu	= mysql_fetch_array ($esqlsatu);
$awal		= $dsqlsatu[ketetapan_id];

if (isset($_POST['submit'])) {

	$calon_nama = $_POST['calon_nama'];
	$calon_inisial = $_POST['calon_inisial'];
	$calon_alamat = $_POST['calon_alamat'];


	$titles = isset($_POST['title']) ? $_POST['title'] : array();
	$delFlags = isset($_POST['delFlag']) ? $_POST['delFlag'] : array();
	$imageNames = isset($_POST['imageName']) ? $_POST['imageName'] : array();
	
	$order = 1;
		// local variables
		$title = addslashes($titles[0]);
		$delFlag = $delFlags[0];
		$imageName = $imageNames[0];
		$imageName = @explode(',', $imageName);
		$status = $imageName[1];
		$imageName = $imageName[0];
		$imgid = substr($imageName, 0, strlen($imageName) - 4);
		$imgid = substr($imgid, 6);


			$query = "INSERT INTO m_calon (ketetapan_id,calon_nama,calon_inisial,calon_alamat,calon_status) VALUES ('$awal', '$calon_nama','$calon_inisial','$calon_alamat','1')";
			mysql_query($query);

			$sqldua	= "SELECT calon_id FROM m_calon order by calon_id DESC limit 0,1";
			$esqldua	= mysql_query($sqldua);
			$dsqldua	= mysql_fetch_array ($esqldua);
			$calon_id	= $dsqldua[calon_id];
			$new_image_name = $calon_id . '.jpg';
			
			$query = "update m_calon set calon_foto='$new_image_name' where calon_id='$calon_id'";
			mysql_query($query);

			copy('photos/temp/' . $imageName, 'photos/' . $new_image_name);
			unlink('photos/temp/' . $imageName);
	

}
header('Location: main.php');
?>
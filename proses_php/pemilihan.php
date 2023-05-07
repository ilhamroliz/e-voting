<?php
session_start();
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
header('Cache-Control: no-cache, must-revalidate');
header('Pragma: no-cache');
header('Content-Type:text/xml');
include("../include/koneksi.php");
echo "<hasil>";
$sqlsatu	= "SELECT ketetapan_id,ketetapan_calon FROM m_ketetapan where ketetapan_status='1' and dewan_id='".$_SESSION['proses_pemilihan']."'";
$esqlsatu	= mysql_query($sqlsatu);
$dsqlsatu	= mysql_fetch_array ($esqlsatu);
$awal		= $dsqlsatu[ketetapan_id];
$kcalon		= $dsqlsatu[ketetapan_calon];
echo "<awal>".$sqlsatu."</awal>";
echo "<kcalon>".$kcalon."</kcalon>";

if($_GET['abstain']==1)
{
	$batal='2';
} else
if($_GET['abstain']==2)
{
	$batal='1';
}else
{
	$batal='1';
}

echo "<abstain>".$batal."</abstain>";

if ($_GET['tampil']=="sukses"){

	$sqldua = "SELECT * FROM m_calon WHERE ketetapan_id= '$awal' and calon_status='1' ORDER BY calon_urut ASC";
	echo "<dua>".$sqldua."</dua>";
	$esqldua=mysql_query($sqldua);
	while ($dsqldua = mysql_fetch_array ($esqldua)) {
		echo "<idcalon>".$dsqldua['calon_id']."<!----></idcalon>";
		echo "<namacalon>".$dsqldua['calon_nama']."<!----></namacalon>";
		echo "<fotocalon>".$dsqldua['calon_foto']."<!----></fotocalon>";
		echo "<inisialcalon>".$dsqldua['calon_inisial']."<!----></inisialcalon>";
		echo "<urutcalon>".$dsqldua['calon_urut']."<!----></urutcalon>";
	}

	$jumlah_p = count($_SESSION[CALON_register]);
	$b = "";
	for($a=0;$a<$jumlah_p;$a++)
	{
		$b = $_SESSION[CALON_register][$a];
		echo "<a_calon>".$b."</a_calon>";
	}
}	

if ($_POST){
	$keterangan=$_POST['keterangan'];
	if($keterangan=='pilih')
	{
		$kode	= $_POST['kode'];
		$status	= $_POST['status'];

		echo "<status>".$status."</status>";
		echo "<kode>".$kode."</kode>";
		if($status==1)
		{
			$penghapus = array("$kode");
			$_SESSION[CALON_register] = array_merge(array_diff($_SESSION[CALON_register],$penghapus));
		} else
		{
			array_push($_SESSION[CALON_register],$kode);
		}
		echo "<simpan>PILIH</simpan>";
		echo "<masuk>KOSONG</masuk>";
	}
	if($keterangan=='simpan')
	{
		$status	= $_POST['status'];
		if($status==1)
		{
			$jumlah_p = count($_SESSION[CALON_register]);
			$b = "";
			for($a=0;$a<$jumlah_p;$a++)
			{
				$tanggal = date('Y-m-d h:i:s');
				$b = $_SESSION[CALON_register][$a];
				$masuk = "insert into t_pemilihan (pemilih_id,calon_id,pemilihan_tanggal,user_id) values ('".$_SESSION['pemilih_nama']."','$b','$tanggal','".$_SESSION['iduser_web']."')";
				$emasuk=mysql_query($masuk);
			}
		} else
		{
			$masuk = "insert into t_pemilihan (pemilih_id,calon_id,pemilihan_tanggal,user_id) values ('".$_SESSION['pemilih_nama']."','73','$tanggal','".$_SESSION['iduser_web']."')";
			$emasuk=mysql_query($masuk);
		}
		$_SESSION[CALON_register] = array();
		echo "<simpan>SIMPAN</simpan>";
		echo "<masuk>".$masuk."</masuk>";
	}
}
	
echo "</hasil>";
?>

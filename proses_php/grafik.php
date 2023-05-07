<?
session_start();
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
header('Cache-Control: no-cache, must-revalidate');
header('Pragma: no-cache');
header('Content-Type:text/xml');
include("../include/koneksi.php");
echo "<hasil>";
if ($_GET['tampil']=="sukses"){
	// =================================================================================================
	//											DATA SMU
	// =================================================================================================
	$sqlsatu	= "SELECT ketetapan_calon,ketetapan_id FROM m_ketetapan where ketetapan_status='1' and dewan_id='".$_SESSION['proses_pemilihan']."'";
	$esqlsatu	= mysql_query($sqlsatu);
	$dsqlsatu	= mysql_fetch_array ($esqlsatu);
	$awal		= $dsqlsatu[ketetapan_calon];
	$tetap		= $dsqlsatu[ketetapan_id];

	$limit = "limit 0,$awal";

	$Qcekdata = "SELECT B.calon_urut,B.calon_nama,(SELECT COUNT(*) FROM t_pemilihan WHERE calon_id=B.calon_id) AS nilai FROM m_calon B where B.calon_status='1' and ketetapan_id='$tetap' ORDER BY nilai DESC,calon_urut  $limit";
		echo "<Qcekdata>".$Qcekdata."<!----></Qcekdata>";

	$Ecekdata = mysql_query($Qcekdata);
	$A=0;
	while($Dcekdata = mysql_fetch_array ($Ecekdata))
	{
		$atas[$A] = $Dcekdata['nilai'];
		echo "<id_smu>".$Dcekdata['calon_urut']."<!----></id_smu>";
		echo "<nm_smu>".$Dcekdata['calon_nama']."<!----></nm_smu>";
		echo "<jm_smu>".$Dcekdata['nilai']."<!----></jm_smu>";
		$A++;
	}
//	$Qcekdata = "select count(*) as TOTAL from ppmb_mahasiswa_baru where tahun='2010'";
//	$Ecekdata = db_query($Qcekdata,$kon_oci);
//	while($Dcekdata = db_fetch_array ($Ecekdata))
//	{
		echo "<total>".$awal."<!----></total>";
//	}

}
echo "</hasil>";
?>
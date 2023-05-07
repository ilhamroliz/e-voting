<?php
session_start();
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
header('Cache-Control: no-cache, must-revalidate');
header('Pragma: no-cache');
header('Content-Type:text/xml');
include("../include/koneksi.php");
echo "<hasil>";
$sqlsatu	= "SELECT ketetapan_id FROM m_ketetapan where ketetapan_status='1' and dewan_id='".$_SESSION['proses_pemilihan']."'";
$esqlsatu	= mysql_query($sqlsatu);
$dsqlsatu	= mysql_fetch_array ($esqlsatu);
$ketetapan	= $dsqlsatu[ketetapan_id];
$awal	= $_GET['awal'];
$akhir	= $_GET['akhir'];
echo "<awal>".$awal."<!----></awal>";
echo "<akhir>".$akhir."<!----></akhir>";

if ($_GET['tampil']=="sukses"){
	if($_GET['proses']=="cari")
	{
		$sqldua = "SELECT pemilih_id FROM m_pemilih where pemilih_id between '$awal' and '$akhir' and ketetapan_id = '$ketetapan' ORDER BY pemilih_id";
		$esqldua=mysql_query($sqldua);
		$ada	=mysql_num_rows($esqldua);
		echo "<ada>".$ada."<!----></ada>";
		if($ada>0)
		{
			while ($dsqldua = mysql_fetch_array ($esqldua)) {
				echo "<idpemilih>".$dsqldua['pemilih_id']."<!----></idpemilih>";
			}
		}			
	}
}	
echo "</hasil>";
?>

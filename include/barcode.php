<?
session_start();
include("koneksi.php");
$awal	= $_GET['awal'];
$akhir	= $_GET['akhir'];
$sqlsatu	= "SELECT ketetapan_id FROM m_ketetapan where ketetapan_status='1' and dewan_id='".$_SESSION['proses_pemilihan']."'";
$esqlsatu	= mysql_query($sqlsatu);
$dsqlsatu	= mysql_fetch_array ($esqlsatu);
$ketetapan	= $dsqlsatu[ketetapan_id];
echo "<table width='100%'  cellpadding='6' cellspacing='6' align='center' style='border-collapse:collapse; color:#660000;' border='1' bordercolor='#E0E0E0'>";
$qcari = "SELECT pemilih_id FROM m_pemilih where pemilih_id between '$awal' and '$akhir' and ketetapan_id = '$ketetapan' ORDER BY pemilih_id";
$jmqry = mysql_query($qcari);
$jml = mysql_num_rows($jmqry);
if($jml<=4) { $bagi = $jml; } else { $bagi = 4; }
$urutan=0;
$Durutan = array();
while ($data_koleksi=mysql_fetch_array($jmqry))
{
	$Durutan[$urutan]=$data_koleksi[pemilih_id];
	$urutan++;
}

$kolom = ceil($jml/$bagi);
$d=0;
for($a=0;$a<$kolom;$a++)
{
	echo "<tr>";
		for($s=0;$s<$bagi;$s++)
		{
			$ok = $Durutan[$d];
			echo "<td align='center'>";
				if($ok!='')
				{
						echo "<img src='class/barcode.php?isi=$ok' style='margin-top:10px;margin-bottom:10px;'/>";				
				} else
				{
					echo "&nbsp;";
				}
			echo "</td>";
			$d++;
		}
	echo "</tr>";
}

echo "</table>";

?>
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
$awal		= $dsqlsatu[ketetapan_id];
echo "<awal>".$sqlsatu."</awal>";
if ($_GET['tampil']=="sukses"){

	$sqldua = "SELECT pemilih_id,pemilih_nama,pemilih_alamat,pemilih_kontak,pemilih_status FROM m_pemilih where ketetapan_id = '$awal' ORDER BY pemilih_id";
	echo "<dua>".$sqldua."</dua>";
	$esqldua=mysql_query($sqldua);
	while ($dsqldua = mysql_fetch_array ($esqldua)) {
		echo "<idpemilih>".$dsqldua['pemilih_id']."<!----></idpemilih>";
		echo "<namapemilih>".$dsqldua['pemilih_nama']."<!----></namapemilih>";
		echo "<alamat_pemilih>".$dsqldua['pemilih_alamat']."<!----></alamat_pemilih>";
		echo "<kontak_pemilih>".$dsqldua['pemilih_kontak']."<!----></kontak_pemilih>";
		echo "<pemilih_status>".$dsqldua['pemilih_status']."<!----></pemilih_status>";
	}
}	


if ($_POST){
	$status	= $_POST[status];
	if($status=='hapuskode')
	{
		$kode	= $_POST[kode];
		$hapususahanya="delete from m_pemilih where pemilih_id='$kode' and ketetapan_id='$awal'";
		$Qhapususahanya = mysql_query($hapususahanya);
		if($Qhapususahanya)
		{
			echo "<simpan>hapus</simpan>";
		} else
		{
			echo "<simpan>gagalhapus</simpan>";
			echo "<gagal>".$hapususahanya."</gagal>";
		}
	} else
	if($status=='ubahlevel')
	{
		$kode	= $_POST[kode];
		$nilai	= $_POST[nilai];
		$ubahaktif=mysql_query("update m_pemilih set pemilih_status='$nilai' where pemilih_id='$kode' and ketetapan_id = '$awal' ");
		echo "<simpan>ubah</simpan>";
	} 
	else
	if($status=='tambahpemilih')
	{
		$nama		= $_POST[nama];
		$alamat		= $_POST[alamat];
		$kontak		= $_POST[kontak];
		
		$banyak		= count($awal);
		$sqlsatu	= "SELECT pemilih_id FROM m_pemilih WHERE ketetapan_id = '$awal' ORDER BY pemilih_id DESC  LIMIT 0,1 ";
		$esqlsatu	= mysql_query($sqlsatu);
		$dsqlsatu	= mysql_fetch_array ($esqlsatu);
		$kode		= $dsqlsatu[pemilih_id];
		if($kode=="") $kode = $awal."00000";
		$j2	= $kode+1;
//		if($j2<10) { $kode1 = "0000".$j2; }
//		else if($j2<100) { $kode1 = "000".$j2; }
//		else if($j2<1000) { $kode1 = "00".$j2; }
//		else if($j2<10000) { $kode1 = "0".$j2; }
		
		$password	= MD5($kode1);
		$qtambah	= "insert into m_pemilih values ('$j2','$nama','$alamat','$kontak','1','$awal')";
		$tambahode	= mysql_query($qtambah);
		if($tambahode)
		{
			echo "<simpan>tambah</simpan>";
		} else
		{
			echo "<simpan>gagaltambah</simpan>";
			echo "<gagal>".$qtambah."</gagal>";
		}
	} else
	if($status=='ubahpemilih')
	{
		$pemilih_nama	= $_POST[pemilih_nama];
		$pemilih_alamat	= $_POST[pemilih_alamat];
		$pemilih_kontak		= $_POST[pemilih_kontak];
		$kode				= $_POST[kode];
		
		$qubah		= "update m_pemilih set pemilih_nama='$pemilih_nama', pemilih_alamat='$pemilih_alamat', pemilih_kontak='$pemilih_kontak' where pemilih_id='$kode'";
		$ubahmenu	= mysql_query($qubah);
		echo "<simpan>ubahpemilih</simpan>";
	}
}
echo "</hasil>";
?>

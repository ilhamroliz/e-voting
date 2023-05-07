<?php
session_start();
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
header('Cache-Control: no-cache, must-revalidate');
header('Pragma: no-cache');
header('Content-Type:text/xml');
include("../include/koneksi.php");
echo "<hasil>";
if ($_GET['tampil']=="sukses"){
	$sqldua = "SELECT ketetapan_id,ketetapan_tanggal,ketetapan_keterangan,ketetapan_jumlah,ketetapan_calon,ketetapan_status FROM m_ketetapan where dewan_id='".$_SESSION['proses_pemilihan']."' ORDER BY ketetapan_id";
	$esqldua=mysql_query($sqldua);
	while ($dsqldua = mysql_fetch_array ($esqldua)) {
		echo "<idketetapan>".$dsqldua['ketetapan_id']."<!----></idketetapan>";
		echo "<tgketetapan>".$dsqldua['ketetapan_tanggal']."<!----></tgketetapan>";
		echo "<l_tgketetapan>".tanggalan($dsqldua['ketetapan_tanggal'])."<!----></l_tgketetapan>";
		echo "<ketetapan_status>".$dsqldua['ketetapan_status']."<!----></ketetapan_status>";
		echo "<keterangan_ketetapan>".$dsqldua['ketetapan_keterangan']."<!----></keterangan_ketetapan>";
		echo "<jumlah_ketetapan>".$dsqldua['ketetapan_jumlah']."<!----></jumlah_ketetapan>";
		echo "<calon_ketetapan>".$dsqldua['ketetapan_calon']."<!----></calon_ketetapan>";
	}
}	


if ($_POST){
	$status	= $_POST[status];
	if($status=='hapuskode')
	{
		$kode	= $_POST[kode];
		$hapususahanya=mysql_query("delete from m_ketetapan where ketetapan_id='$kode'");
		if($hapususahanya)
		{
			echo "<simpan>hapus</simpan>";
		} else
		{
			echo "<simpan>gagalhapus</simpan>";
		}
	} else
	if($status=='ubahlevel')
	{
		$kode	= $_POST[kode];
		$nilai	= $_POST[nilai];
		if($nilai=='0')
		{
			echo "<simpan>gagalubah</simpan>";
		} else
		{
			$ubahaktif=mysql_query("update m_ketetapan set ketetapan_status='0' where dewan_id='".$_SESSION['proses_pemilihan']."'");
			$ubahaktif=mysql_query("update m_ketetapan set ketetapan_status='$nilai' where ketetapan_id='$kode'");
			echo "<simpan>ubah</simpan>";
		}
	} 
	else
	if($status=='tambahketetapan')
	{
		$tg		= $_POST[tg];
		$ket	= $_POST[ket];
		$jum	= $_POST[jum];
		$cln	= $_POST[cln];
		
		$qtambah	= "insert into m_ketetapan values ('','$tg','$ket','$jum','$cln','0','".$_SESSION['proses_pemilihan']."')";
		$tambahode	= mysql_query($qtambah);
		if($tambahode)
		{
			echo "<simpan>tambah</simpan>";
		} else
		{
			echo "<simpan>gagaltambah</simpan>";
		}
	} else
	if($status=='ubahketetapan')
	{
		$ketetapan_tanggal		= $_POST[ketetapan_tanggal];
		$ketetapan_keterangan	= $_POST[ketetapan_keterangan];
		$ketetapan_jumlah		= $_POST[ketetapan_jumlah];
		$ketetapan_calon		= $_POST[ketetapan_calon];
		$kode					= $_POST[kode];
		
		$qubah		= "update m_ketetapan set ketetapan_tanggal='$ketetapan_tanggal', ketetapan_keterangan='$ketetapan_keterangan', ketetapan_jumlah='$ketetapan_jumlah', ketetapan_calon='$ketetapan_calon' where ketetapan_id='$kode'";
		$ubahmenu	= mysql_query($qubah);
		echo "<simpan>ubahketetapan</simpan>";
	}
}
echo "</hasil>";
?>

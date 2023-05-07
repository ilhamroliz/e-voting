<?php
session_start();
include '../include/koneksi.php';
require("fpdf.php");
//memulai pengaturan output PDF
class PDF extends FPDF
{
//untuk pengaturan header halaman
	function Header()
	{
		$this->Image('awal.jpg',1.9,0.6,2.8,2.5);	
		$this->SetY(1);
		$this->SetFont('Times','',13);		
		$this->Cell(4,0.5,'',0,0,'L');				
		$this->Cell(15,0.5,'PANITIA PEMILIHAN',0,0,'L'); 		
		$this->Ln();
		$this->Cell(4,0.5,'',0,0,'L');				
		$this->Cell(15,0.5,'ANGGOTA PIMPINAN CABANG MUHAMMADIYAH MANYAR',0,0,'L');				
		$this->Ln();
		$this->Cell(4,0.5,'',0,0,'L');				
		$this->Cell(15,0.5,'PERIODE 2015 – 2020',0,0,'L');				
		$this->Ln();
		$this->Cell(4,0.5,'',0,0,'L');				
		$this->Cell(15,0.5,'Jl. Sawit No.1 Perum Pongangan Indah Telp.08573191593/08121759341',0,0,'L');				
		$this->Ln();
		$this->Cell(8,0.5,'==================================================================================================',0,0,'L');	
		$this->Ln();
	}
	function Footer()
	{
		$this->Ln();
		$this->SetY(-1.5);
		$this->SetFont('Arial','B',7);
		$this->Cell(0,0.3,$this->PageNo().'/{nb}',0,0,'R');
	}
}

//pengaturan ukuran kertas P = Portrait
$pdf = new PDF('P','cm','folio');
$pdf->Open();
$pdf->AliasNbPages();
$pdf->AddPage();

$jam1 = $_GET['jam1'];
$jam2 = $_GET['jam2'];

$pdf->Ln();
$pdf->SetFont('Arial','B',9);
$pdf->Cell(19,0.5,'No. 03 / BA / Panlih / PCM / 2016','',0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','B',13);
$pdf->Cell(19,0.5,'BERITA ACARA HASIL PEMILIHAN','',0,'C');
$pdf->Ln();
$pdf->Cell(19,0.5,'PIMPINAN CABANG MUHAMMADIYAH KECAMATAN MANYAR','',0,'C');
$pdf->Ln();
$pdf->Cell(19,0.5,'PERIODE 2015-2020','',0,'C');
$pdf->Ln();
$pdf->Image('bismillah.jpg',7.5,5.9,6.1,1.0);	
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Times','',11);		
$pdf->MultiCell(0,0.5,'Pada hari ini Ahad tanggal 19 Syawal 1437 H., bertepatan dengan tanggal 24 Juli 2016 M, pukul '.$jam1.' WIB sampai dengan '.$jam2.' WIB bertempat di Ranting Muhammadiyah Gumeno Manyar Gresik, telah dilaksanakan pemilihan Pimpinan Cabang Muhammadiyah Periode 2015-2020, dengan hasil sebagai berikut :',0,'J');


$total = 0;
$sqldua = "SELECT COUNT(DISTINCT a.pemilih_id) AS total FROM t_pemilihan A,m_pemilih b,m_ketetapan c
WHERE a.pemilih_id=b.pemilih_id AND b.ketetapan_id=c.ketetapan_id AND c.dewan_id='".$_SESSION['proses_pemilihan']."'";
$esqldua=mysql_query($sqldua);
while ($dsqldua = mysql_fetch_array ($esqldua)) {
	$total = $dsqldua['total'];
}

$sah = 0;
$sqldua = "SELECT COUNT(DISTINCT a.pemilih_id) AS total FROM t_pemilihan A,m_pemilih b,m_ketetapan c
WHERE a.pemilih_id=b.pemilih_id AND b.ketetapan_id=c.ketetapan_id AND c.dewan_id='".$_SESSION['proses_pemilihan']."' and a.calon_id <> '73'";
$esqldua=mysql_query($sqldua);
while ($dsqldua = mysql_fetch_array ($esqldua)) {
	$sah = $dsqldua['total'];
}

$abstain = 0;
$sqldua = "SELECT COUNT(DISTINCT a.pemilih_id) AS total FROM t_pemilihan A,m_pemilih b,m_ketetapan c
WHERE a.pemilih_id=b.pemilih_id AND b.ketetapan_id=c.ketetapan_id AND c.dewan_id='".$_SESSION['proses_pemilihan']."' and a.calon_id = '73'";
$esqldua=mysql_query($sqldua);
while ($dsqldua = mysql_fetch_array ($esqldua)) {
	$abstain = $dsqldua['total'];
}

$pdf->Ln();
$pdf->SetFont('Times','B',11);		
$pdf->Cell(0.5,0.5,'I','',0,'L');
$pdf->Cell(18,0.5,'Rekap Pemilihan','',0,'L');
$pdf->Ln();
$pdf->SetFont('Times','',11);		
$pdf->Cell(0.5,0.5,'','',0,'L');
$pdf->Cell(5,0.5,'Total pemilih','',0,'L');
$pdf->Cell(0.5,0.5,':','',0,'C');
$pdf->Cell(2,0.5,$total,'',0,'C');
$pdf->Cell(10,0.5,' Orang','',0,'L');
$pdf->Ln();
$pdf->Cell(0.5,0.5,'','',0,'L');
$pdf->Cell(5,0.5,'Jumlah Pemilih sah','',0,'L');
$pdf->Cell(0.5,0.5,':','',0,'C');
$pdf->Cell(2,0.5,$sah,'',0,'C');
$pdf->Cell(10,0.5,' Orang','',0,'L');
$pdf->Ln();
$pdf->Cell(0.5,0.5,'','',0,'L');
$pdf->Cell(5,0.5,'Jumlah abstain','',0,'L');
$pdf->Cell(0.5,0.5,':','',0,'C');
$pdf->Cell(2,0.5,$abstain,'',0,'C');
$pdf->Cell(10,0.5,' Orang','',0,'L');
$pdf->Ln();

$pdf->Ln();
$pdf->SetFont('Times','B',11);		
$pdf->Cell(0.5,0.5,'II','',0,'L');
$pdf->Cell(18,0.5,'Rekap Perolehan Suara','',0,'L');
$pdf->SetFont('Times','',11);		
$pdf->Cell(0.5,0.5,'','',0,'L');

$pdf->Ln();
$pdf->SetFont('Times','',11);		
$pdf->Cell(0.5,0.5,'','',0,'L');
$pdf->Cell(0.8,0.5,'NO','LBRT',0,'L');
$pdf->Cell(12,0.5,'NAMA','LBRT',0,'L');
$pdf->Cell(2,0.5,'NBM','LBRT',0,'C');
$pdf->Cell(4,0.5,'PEROLEHAN SUARA','LBRT',0,'L');
$pdf->Ln();



$sqlsatu	= "SELECT ketetapan_jumlah,ketetapan_id,ketetapan_calon FROM m_ketetapan where ketetapan_status='1' and dewan_id='".$_SESSION['proses_pemilihan']."'";
$esqlsatu	= mysql_query($sqlsatu);
$dsqlsatu	= mysql_fetch_array ($esqlsatu);
$awal		= $dsqlsatu[ketetapan_jumlah];
$tetap		= $dsqlsatu[ketetapan_id];
$calon		= $dsqlsatu[ketetapan_calon];
$limit = "limit 0,$awal";
$Qcekdata = "SELECT B.calon_urut,B.calon_nama,B.calon_NBM,(SELECT COUNT(*) FROM t_pemilihan WHERE calon_id=B.calon_id) AS nilai FROM m_calon B where B.calon_status='1' and ketetapan_id='$tetap' ORDER BY nilai DESC,calon_urut  $limit";
$Ecekdata = mysql_query($Qcekdata);
$a=1;
while($Dcekdata = mysql_fetch_array ($Ecekdata))
{
	$pdf->SetFont('Times','',10);		
	$pdf->Cell(0.5,0.5,'','',0,'L');
	$pdf->Cell(0.8,0.5,$a,'LBRT',0,'C');
	$pdf->Cell(12,0.5,$Dcekdata['calon_nama'],'LBRT',0,'L');
	$pdf->Cell(2,0.5,$Dcekdata['calon_NBM'],'LBRT',0,'C');
	$pdf->Cell(4,0.5,$Dcekdata['nilai'],'LBRT',0,'C');
	$pdf->Ln();
	$a++;
}


$pdf->Ln();
$pdf->SetFont('Times','B',11);		
$pdf->Cell(0.5,0.5,'III','',0,'L');
$pdf->Cell(18,0.5,' '.$calon.' Nama Pimpinan Cabang Muhammadiyah periode 2015-2020  :','',0,'L');

$pdf->SetFont('Times','',11);		
$pdf->Cell(0.5,0.5,'','',0,'L');
$pdf->Ln();
$pdf->SetFont('Times','',11);		
$pdf->Cell(0.5,0.5,'','',0,'L');
$pdf->Cell(0.8,0.5,'NO','LBRT',0,'L');
$pdf->Cell(12,0.5,'NAMA','LBRT',0,'L');
$pdf->Cell(2,0.5,'NBM','LBRT',0,'C');
$pdf->Cell(4,0.5,'PEROLEHAN SUARA','LBRT',0,'L');
$pdf->Ln();



$limit2 = "limit 0,$calon";
$Qcekdata = "SELECT B.calon_urut,B.calon_nama,B.calon_NBM,(SELECT COUNT(*) FROM t_pemilihan WHERE calon_id=B.calon_id) AS nilai FROM m_calon B where B.calon_status='1' and ketetapan_id='$tetap' ORDER BY nilai DESC,calon_urut  $limit2";
$Ecekdata = mysql_query($Qcekdata);
$a=1;
while($Dcekdata = mysql_fetch_array ($Ecekdata))
{
	$pdf->SetFont('Times','',10);		
	$pdf->Cell(0.5,0.5,'','',0,'L');
	$pdf->Cell(0.8,0.5,$a,'LBRT',0,'C');
	$pdf->Cell(12,0.5,$Dcekdata['calon_nama'],'LBRT',0,'L');
	$pdf->Cell(2,0.5,$Dcekdata['calon_NBM'],'LBRT',0,'C');
	$pdf->Cell(4,0.5,$Dcekdata['nilai'],'LBRT',0,'C');
	$pdf->Ln();
	$a++;
}

$pdf->Ln();
$pdf->Cell(10.5,0.5,'','',0,'L');
$pdf->Cell(7,0.5,'Gresik, 19 Syawal 1437 H','',0,'R');
$pdf->Ln();
$pdf->Cell(10.5,0.5,'','',0,'L');
$pdf->Cell(7,0.5,'24  Juli  2016 M','',0,'R');
$pdf->Ln();


$pdf->Ln();
$pdf->SetFont('Times','B',11);		
$pdf->Cell(0.5,0.5,'','',0,'L');
$pdf->Cell(18,0.5,'Panitia Pemilihan :','',0,'L');
$pdf->Ln();
$pdf->SetFont('Times','',10);		
$pdf->Cell(0.5,0.8,'','',0,'L');
$pdf->Cell(3.5,0.8,'Ketua','',0,'L');
$pdf->Cell(0.5,0.8,':','',0,'C');
$pdf->Cell(8,0.8,'Saroni, M.Pd.','',0,'L');
$pdf->Cell(8,0.8,'...............................................................','',0,'L');


$pdf->Ln();
$pdf->Cell(0.5,0.8,'','',0,'L');
$pdf->Cell(3.5,0.8,'Sekretaris','',0,'L');
$pdf->Cell(0.5,0.8,':','',0,'C');
$pdf->Cell(8,0.8,'Moh. Zamroni, S.Hi.','',0,'L');
$pdf->Cell(8,0.8,'...............................................................','',0,'L');



$pdf->Ln();
$pdf->Cell(0.5,0.8,'','',0,'L');
$pdf->Cell(3.5,0.8,'Anggota','',0,'L');
$pdf->Cell(0.5,0.8,':','',0,'C');
$pdf->Cell(8,0.8,'1. Drs. AH. Nurhasan Anwar','',0,'L');
$pdf->Cell(8,0.8,'...............................................................','',0,'L');


$pdf->Ln();
$pdf->Cell(0.5,0.8,'','',0,'L');
$pdf->Cell(3.5,0.8,'','',0,'L');
$pdf->Cell(0.5,0.8,'','',0,'C');
$pdf->Cell(8,0.8,'2. Zaki Abdul Wahid, M.Pd. ','',0,'L');
$pdf->Cell(8,0.8,'...............................................................','',0,'L');

$pdf->Ln();
$pdf->Cell(0.5,0.8,'','',0,'L');
$pdf->Cell(3.5,0.8,'','',0,'L');
$pdf->Cell(0.5,0.8,'','',0,'C');
$pdf->Cell(8,0.8,'3. Muhammad Manu. ','',0,'L');
$pdf->Cell(8,0.8,'...............................................................','',0,'L');

$pdf->Ln();
$pdf->Cell(0.5,0.8,'','',0,'L');
$pdf->Cell(3.5,0.8,'','',0,'L');
$pdf->Cell(0.5,0.8,'','',0,'C');
$pdf->Cell(8,0.8,'4. Edy Ruhendi. ','',0,'L');
$pdf->Cell(8,0.8,'...............................................................','',0,'L');


$pdf->Ln();
$pdf->Cell(0.5,0.8,'','',0,'L');
$pdf->Cell(3.5,0.8,'','',0,'L');
$pdf->Cell(0.5,0.8,'','',0,'C');
$pdf->Cell(8,0.8,'5. ......................... ','',0,'L');
$pdf->Cell(8,0.8,'...............................................................','',0,'L');


$pdf->Ln();
$pdf->Cell(0.5,0.8,'','',0,'L');
$pdf->Cell(3.5,0.8,'','',0,'L');
$pdf->Cell(0.5,0.8,'','',0,'C');
$pdf->Cell(8,0.8,'6. ......................... ','',0,'L');
$pdf->Cell(8,0.8,'...............................................................','',0,'L');

$pdf->Ln();
$pdf->Cell(0.5,0.8,'','',0,'L');
$pdf->Cell(3.5,0.8,'Saksi','',0,'L');
$pdf->Cell(0.5,0.8,':','',0,'C');
$pdf->Cell(7,0.8,'1. ................................................................','',0,'L');
$pdf->Cell(5,0.8,'PRM. ............................................ ','',0,'L');
$pdf->Cell(3,0.8,'...............................','',0,'L');


$pdf->Ln();
$pdf->Cell(0.5,0.8,'','',0,'L');
$pdf->Cell(3.5,0.8,'','',0,'L');
$pdf->Cell(0.5,0.8,'','',0,'C');
$pdf->Cell(7,0.8,'2. ................................................................','',0,'L');
$pdf->Cell(5,0.8,'PRM. ............................................ ','',0,'L');
$pdf->Cell(3,0.8,'...............................','',0,'L');


$pdf->Ln();
$pdf->Cell(0.5,0.8,'','',0,'L');
$pdf->Cell(3.5,0.8,'','',0,'L');
$pdf->Cell(0.5,0.8,'','',0,'C');
$pdf->Cell(7,0.8,'3. ................................................................','',0,'L');
$pdf->Cell(5,0.8,'PRM. ............................................ ','',0,'L');
$pdf->Cell(3,0.8,'...............................','',0,'L');

$pdf->Ln();
$pdf->Cell(0.5,0.8,'','',0,'L');
$pdf->Cell(3.5,0.8,'','',0,'L');
$pdf->Cell(0.5,0.8,'','',0,'C');
$pdf->Cell(7,0.8,'4. ................................................................','',0,'L');
$pdf->Cell(5,0.8,'PRM. ............................................ ','',0,'L');
$pdf->Cell(3,0.8,'...............................','',0,'L');

$pdf->Ln();
$pdf->Cell(0.5,0.8,'','',0,'L');
$pdf->Cell(3.5,0.8,'','',0,'L');
$pdf->Cell(0.5,0.8,'','',0,'C');
$pdf->Cell(7,0.8,'5. ................................................................','',0,'L');
$pdf->Cell(5,0.8,'PRM. ............................................ ','',0,'L');
$pdf->Cell(3,0.8,'...............................','',0,'L');
//menampilkan output berupa halaman PDF
$pdf->Output();
?>
<?php
session_start();
include '../inc/pmb_global.php';
require("fpdf.php");
$np	= $_GET['status'];
$gelom	= $_GET['gelombang'];
$siempunya = $_SESSION['namauser_pmb1011'];
//memulai pengaturan output PDF

class PDF extends FPDF
{
	//untuk pengaturan header halaman
	function Header()
	{
		global $TAHUN;
		global $gelom;
		global $np;
		$this->Image('umg.jpg',2.5,0.7,1.8,1.8);	
		$this->SetY(1);
		$this->SetFont('Times','',10);		
		if($np=='1') { $test= 'BEBAS TEST'; }
		if($np=='2') { $test= 'TEST'; }
		$this->Cell(19,0.5,'UNIVERSITAS MUHAMMADIYAH GRESIK',0,0,'C'); 		
		$this->Ln();
		$this->Cell(19,0.5,'DAFTAR '.$test.' CALON MAHASISWA BARU',0,0,'C');				
		$this->Ln();
		$this->Cell(19,0.5,'TAHUN '.$TAHUN.' GELOMBANG '.$gelom,0,0,'C');				
		
		$this->Ln();
		$this->SetFont('Arial','B',8);
		$this->Ln();
		$this->Cell(1.2,0.5,'No','LBRT',0,'C');
		$this->Cell(2.8,0.5,'Nomor Pendaftaran','LBRT',0,'C');
		if($np=='1') 
		{ 
			$this->Cell(10.8,0.5,'Nama Calon Mahasiswa','LBRT',0,'C');
		}
		if($np=='2') 
		{ 
			$this->Cell(2.8,0.5,'Nomor Ujian','LBRT',0,'C');
			$this->Cell(8,0.5,'Nama Calon Mahasiswa','LBRT',0,'C');
		}
		$this->Cell(4.2,0.5,'Jurusan','LBRT',0,'C');
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


$kon_oci = db_connect("oci");
$datapeserta = "select * from PPMB_TAHUN where STATUS='A'";
$Edatapeserta= db_query($datapeserta,$kon_oci);
$Ddatapeserta= db_fetch_array ($Edatapeserta);
$TAHUN		= $Ddatapeserta['THNAKAD'];
//$GELOMBANG	= $Ddatapeserta['GELOMBANG'];

//pengaturan ukuran kertas P = Portrait
$pdf = new PDF('P','cm','folio');
$pdf->Open();
$pdf->AliasNbPages();
$pdf->AddPage();


if($np=='1') // bebas test
{
	$kodetest	= 'A.NOUJIAN IS NULL AND A.NP IS NOT NULL ';
	$urut		= 'A.NP';
}
if($np=='2') // ikut test
{
	$kodetest	= 'A.NOUJIAN IS NOT NULL';
	$urut		= 'A.NOUJIAN';
}

$datacalon = "SELECT A.NP,A.NAMA,B.NAMA_JURUSAN,A.NOUJIAN FROM PPMB_MAHASISWA_BARU A, SIAKAD.SIAKAD_JURUSAN B  WHERE $kodetest AND A.TAHUN='$TAHUN' AND A.GEL='$gelom'  AND SUBSTR(A.PRODI1,1,1)=B.ID_FAKULTAS AND SUBSTR(A.PRODI1,2,1)=B.ID_JURUSAN ORDER BY $urut";
$Edatacalon = db_query($datacalon,$kon_oci);
$angka=1;
while ($data = db_fetch_array($Edatacalon))
{
	$NP				= $data['NP'];
	$NAMA			= ucwords(strtolower($data['NAMA']));
	$NAMA_JURUSAN	= $data['NAMA_JURUSAN'];
	$NOUJIAN		= $data['NOUJIAN'];
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(1.2,0.5,$angka,'LBRT',0,'C');
	$pdf->Cell(2.8,0.5,$NP,'LBRT',0,'C');
	if($np=='1')
	{
		$pdf->Cell(10.8,0.5,$NAMA,'LBRT',0,'L');
	}
	if($np=='2')
	{
		$pdf->Cell(2.8,0.5,$NOUJIAN,'LBRT',0,'C');
		$pdf->Cell(8,0.5,$NAMA,'LBRT',0,'L');
	}

	$pdf->Cell(4.2,0.5,$NAMA_JURUSAN,'LBRT',0,'L');
	$pdf->Ln();
	$angka++;
}
$pdf->Ln();
$tanggal = date('d m Y');
$pdf->SetFont('Arial','',8);
$pdf->Cell(11,0.5,'',0,0,'C');
$pdf->Cell(8,0.5,'Gresik, '.$tanggal,0,0,'C');
$pdf->Ln();
$pdf->Cell(11,0.5,'',0,0,'C');
$pdf->Cell(8,0.5,'Petugas,',0,0,'C');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(11,0.5,'',0,0,'C');
$pdf->Cell(8,0.5,$siempunya,0,0,'C');
$pdf->Ln();


$pdf->Output();


?>
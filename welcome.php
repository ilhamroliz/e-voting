<?
include 'inc/validasi_hal_admin.php';
if($_SESSION['groupuser_web']=='1')
{
	?>
	<strong>Selamat Datang</strong><br><br>
	Halaman utama e-voting...
	<?
}
else
{
	if($_SESSION['pemilih_web']=="")
	{
		$kelas = "style='disable:disabled;'";
	}
	?>
		<style>
			#watermark_box {
				position:relative;
				display:block;
			}
			img.watermark {
				position: absolute;
				top: 0px;
				left: 0px;
			} 


			img.penanda {
				position: absolute;
				top: 0px;
				left: 0px;
			} 
			#penanda_nomor {
				position:relative;
				display:block;
			}
		

		</style>
		<script type="text/javascript" src="include/global.js"></script>
		<script type="text/javascript" src="proses_js/pemilihan.js"></script>
		<script>
		window.onLoad=tampil('');
		</script>
		<div align="left" id='fubah'></div>
		<div align="left" id='ftombol'></div>
		<div align="left" id='fdata' <?=$kelas;?>></div>

	<?
}
?>


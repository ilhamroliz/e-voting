1<script>
function cetak()
{
	jam1 = document.getElementById('jam1').value;
	jam2 = document.getElementById('jam2').value;
	if(jam1=="" || jam2=="") { alert('Maaf tentukan jam pelaksanaan.'); return false;}
	else
	{
		window.open('laporan/cetak.php?jam1='+jam1+'&jam2='+jam2,'Berita Acara');
	}
}
</script>

Pada hari ini Ahad tanggal 19 Syawal 1437 H., bertepatan dengan tanggal 24 Juli 2016 M, pukul <input type='text' maxlength='5' size='4' id='jam1'> WIB sampai dengan <input type='text' maxlength='5' size='4' id='jam2'> WIB bertempat di Ranting Muhammadiyah Gumeno Manyar-Gresik, telah dilaksanakan pemilihan Pimpinan Daerah Muhammadiyah Periode 2015-2020<br><br>

<a href='javascript:void(0)' onclick="return cetak();"><img src='gambar/b_view.png'></a>
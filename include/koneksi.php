<?php
	$conn = @mysql_connect ("localhost","root","") or die ("Koneksi Server Gagal");
	if ($conn) {
		$pilih_db = @mysql_select_db ("e-voting",$conn) or die ("Database tidak ditemukan");
	}

	function tanggalan($tanggal)
	{
		if($tanggal=='0000-00-00') { $tanggal='2009-12-28'; }
		$potong=explode('-',$tanggal);
		$t1=$potong[2]; $t2=$potong[1]; $t3=$potong[0];
		if($t2=='01') { $t2d='Januari'; } else if($t2=='02') { $t2d='Pebruari'; } else if($t2=='03') { $t2d='Maret'; } else
		if($t2=='04') { $t2d='April'; } else if($t2=='05') { $t2d='Mei'; } else if($t2=='06') { $t2d='Juni'; } else
		if($t2=='07') { $t2d='Juli'; } else if($t2=='08') { $t2d='Agustus'; } else if($t2=='09') { $t2d='September'; } else
		if($t2=='10') { $t2d='Oktober'; } else if($t2=='11') { $t2d='November'; } else if($t2=='12') { $t2d='Desember'; }
		$potongjam=explode(' ',$t1);
		$tanggallengkap = $potongjam[0]." ".$t2d." ".$t3." ".$potongjam[1];

		return $tanggallengkap;
	}
?>
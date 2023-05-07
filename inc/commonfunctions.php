<?php
//--------------------------------------------------------------------------//
//--------------------------------------------------------------------------//
//							made of m@sdin	at 20 May 2009					//
//									Biro DPSI   							//
//--------------------------------------------------------------------------//
//--------------------------------------------------------------------------//
function tanggalan($hr,$dt,$bl,$th){
	$hr = intval($hr);
	$hari = array ("0"=>"Minggu" ,"1"=>"Senin" , "2"=>"Selasa" , "3"=>"Rabu" , "4"=>"Kamis" , "5"=>"Jum'at" , "6"=>"Sabtu");
	$bl = intval($bl);
	$bulan = array ("1"=>"Januari" ,"2"=>"Februari" , "3"=>"Maret" , "4"=>"April" , "5"=>"Mei" , "6"=>"Juni" , "7"=>"Juli" , "8"=>"Agustus" , "9"=>"September" , "10"=>"Oktober" , "11"=>"Nopember" , "12"=>"Desember");
	echo $hari[$hr].", ".$dt." ".$bulan[$bl]." ".$th;
}
function gantiPetik($asli)
{
	//$phrase  = "You should eat fruits, vegetables, and fiber every day.";
	//$yg_diganti = array("fruits", "vegetables", "fiber");
	//$yg_mengganti  = array("pizza", "beer", "ice cream");
	//$newphrase = str_replace($yg_diganti, $yg_mengganti, $phrase);

	$yg_diganti = array("'", "&");
	$yg_mengganti  = array("#", "*");
	$baru = str_replace($yg_diganti, $yg_mengganti, $asli);
	return $baru;
}
function kembalikanPetik($asli)
{
	$yg_diganti = array("#", "*");
	$yg_mengganti  = array("'", "&");
	$baru = str_replace($yg_diganti, $yg_mengganti, $asli);
	return $baru;
}

function GetData($data,$field, $format)
{
	$dt_table=$data[$field];
	return $dt_table;
}
function GetRowCount($strSQL)
{
	$conn=$GLOBALS['connect'];
	$tipe_db=$GLOBALS['global_tipedb'];
	if($tipe_db=="mysql"){
		$jumdata=@mysql_num_rows(db_query($strSQL,$conn));
	}
	else {
		$str_temp = "select count(*)as JUMLAH from (".$strSQL.")";
		$str_query = db_query($str_temp,$conn);
		$dt_query = db_fetch_array ($str_query);
		$jumdata = GetData($dt_query,"JUMLAH","");
	}
	return $jumdata;
}
function cari_status($asli){
	if($asli=="1"){
		$status="Aktif";
	}
	else {
		$status="Tidak Aktif";
	}
	return $status;
}
function tanggalan_mysql($tglasli){
	if($tglasli!=""){
		$temp=explode("-",$tglasli);
		$tglvalid=$temp[2]."-".$temp[1]."-".$temp[0];
		return $tglvalid;
	}
	else {
		return "";
	}
}
function cetakuang($n) 
{
	return number_format($n,0,'','.');
}
function cari_nilaitabel($kolom_dicari,$klausa_pencarian,$nama_tabel,$koneksi){
	$str_temp = "select ".$kolom_dicari." from ".$nama_tabel." where ".$klausa_pencarian."";
	$str_query = db_query($str_temp,$koneksi);
	$dt_query = db_fetch_array ($str_query);
	$result = GetData($dt_query,"".$kolom_dicari."","");
	return $result;
}

//---------------------- fungsi-fungsi untuk JQuery -------------------------//
function RemoveShouting($string)
{
	$string = strtolower(trim($string));
  
	for($i=0;$i<strlen($string);$i++){
  
		if($i==0){$string[$i] = strtoupper($string[$i]);}
	  
		if($string[$i] == "."){
			while($string[$i+1] == " "){
				$i++;
			}
			$string[$i+1] = strtoupper($string[$i+1]);
			$i++;
		}
	}
  
return $string;
}
function getRealIpAddr()

{
	if (!empty($_SERVER['HTTP_CLIENT_IP']))
		//check ip from share internet
		{
			$ip=$_SERVER['HTTP_CLIENT_IP'];
		}
	elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
		//to check ip is pass from proxy
		{
			$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
		}
	else
		{
			$ip=$_SERVER['REMOTE_ADDR'];
		}
	return $ip;
}

//---------------------------------------------------------------------------//



//--------------------------------------------------------------------------//
//--------------------------------------------------------------------------//
//							Email me at : masdi2n@yahoo.com					//
//									Biro DPSI								//
//--------------------------------------------------------------------------//
//--------------------------------------------------------------------------//

?>
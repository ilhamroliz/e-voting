function ubahid(kode, nilai)
{
	param = "status=ubahaktif&kode="+kode+"&nilai="+nilai+"";
	xmlHttp.open("POST", "aksi/pemilih.php", true);
	xmlHttp.onreadystatechange = act_proses;
	xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xmlHttp.send(param);
}

function ubahlevel(kode, nilai)
{
	param = "status=ubahlevel&kode="+kode+"&nilai="+nilai+"";
	xmlHttp.open("POST", "proses_php/pemilih.php", true);
	xmlHttp.onreadystatechange = act_proses;
	xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xmlHttp.send(param);
}

function hapuskode(kode, namanya, keterangan)
{
	tanya = confirm('Anda yakin ingin menghapus pemilih : \nTgl  : '+ namanya + ' \nKet :  '+keterangan+'');
	if (tanya == true) 
	{
		param = "status=hapuskode&kode="+kode+"";
		xmlHttp.open("POST", "proses_php/pemilih.php", true);
		xmlHttp.onreadystatechange = act_proses;
		xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xmlHttp.send(param);
		return true;
	}
	else return false;
}

function tambahpemilih()
{
	nama	= document.getElementById('pemilih_nama').value;
	alamat	= document.getElementById('pemilih_alamat').value;
	kontak= document.getElementById('pemilih_kontak').value;

	if(nama=='') { alert('Nama pemilih harus diisi...!!!'); document.getElementById('pemilih_nama').focus(); return false; }

	if(alamat=='') { alert('Alamat pemilih harus diisi...!!!'); document.getElementById('pemilih_alamat').focus(); return false; }

	if(kontak=='') { alert('Kontak pemilih harus diisi...!!!'); document.getElementById('pemilih_kontak').focus(); return false; }

	param = "status=tambahpemilih&nama="+nama+"&alamat="+alamat+"&kontak="+kontak+"";
	xmlHttp.open("POST", "proses_php/pemilih.php", true);
	xmlHttp.onreadystatechange = act_proses;
	xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xmlHttp.send(param);
}


function ubahpemilih(kode)
{
	pemilih_nama		= document.getElementById('pemilih_nama').value;
	pemilih_alamat	= document.getElementById('pemilih_alamat').value;
	pemilih_kontak		= document.getElementById('pemilih_kontak').value;

	
	if(pemilih_nama=='') { alert('Nama pemilih harus diisi...!!!'); document.getElementById('pemilih_nama').focus(); return false; }
	if(pemilih_alamat=='') { alert('Keterangan harus diisi...!!!'); document.getElementById('pemilih_alamat').focus(); return false; }
	if(pemilih_kontak=='') { alert('Jumlah kontak harus diisi...!!!'); document.getElementById('pemilih_kontak').focus(); return false; }

	param = "status=ubahpemilih&pemilih_nama="+pemilih_nama+"&kode="+kode+"&pemilih_alamat="+pemilih_alamat+"&pemilih_kontak="+pemilih_kontak+"";

	
	xmlHttp.open("POST", "proses_php/pemilih.php", true);
	xmlHttp.onreadystatechange = act_proses;
	xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xmlHttp.send(param);
}





function ubahdata(status, kode, nama, alamat, kontak) {
	if(status=='ubah')
	{	
		halaman = "";
		halaman += "<table width='100%' align='center'><tr><td colspan='3' align='left'><b>UBAH DATA PERIODE</b></td></tr>";
		halaman += "<tr><td NoWrap>Kode Pemilih</td><td align='center'>:</td><td>"+kode+"</td></tr>";
		halaman += "<tr><td NoWrap>Nama Pemilih</td><td align='center'>:</td><td><input type='text' id='pemilih_nama' value='"+nama+"'</td></td></tr>";
		halaman += "<tr><td NoWrap>Alamat Pemilih</td><td align='center'>:</td><td><textarea id='pemilih_alamat' cols='50' rows='2'>"+alamat+"</textarea></td></tr>";
		halaman += "<tr><td NoWrap>Kontak Pemilih</td><td align='center'>:</td><td><input type='text' id='pemilih_kontak' value='"+kontak+"'></td></tr>";

		halaman += "<tr><td colspan='3' align='center'><input type='button' value='Ubah Data'  onClick=\"return ubahpemilih('"+kode+"');\">&nbsp;<input type='button' value='Selesai'  onClick=\"ubahdata('batal',0,0,0);\"></td></tr>";
		halaman += "</table>";
		tombol_tambah(0);
	}
	else if(status=='tambah')
	{
		halaman = "";
		halaman += "<table width='90%' align='center'><tr><td colspan='3' align='left'><b>TAMBAH DATA PEMILIH</b></td></tr>";
		halaman += "<tr><td width='20%'>Nama Pemilih</td><td width='5%' align='center'>:</td><td><input type='text' id='pemilih_nama'  maxlength='10'></td></tr>";
		halaman += "<tr><td>Alamat Pemilih</td><td align='center'>:</td><td><textarea id='pemilih_alamat' cols='50' rows='2'></textarea></td></tr>";
		halaman += "<tr><td NoWrap>Pemilih Kontak</td><td align='center'>:</td><td><input type='text' id='pemilih_kontak' size='30'></td></tr>";

		halaman += "<tr><td colspan='3' align='center'><input type='button' value='Tambah Pemilih' onClick=\"return tambahpemilih();\">&nbsp;<input type='button' value='Reset'  onClick=\"ubahdata('batal',0,0,0);\"></td></tr>";
		halaman += "</table>";
		tombol_tambah(0);
	} else
	{
		halaman = "";
		tombol_tambah(1);
	}
	document.getElementById("fubah").innerHTML = halaman; 
}


function tampil(haltampil){
	var param= "proses_php/pemilih.php?tampil=sukses";
	xmlHttp.open("GET",param,true);
	xmlHttp.onreadystatechange = act_tampil;
	xmlHttp.send(null);
}

function tombol_tambah(nomor)
{
	tombol = "";
	if(nomor>0)
	{
		tombol += "<table width='100%' cellpadding='2' cellspacing='3' align='center' style='border-collapse:collapse; color:#660000;' border='0' bordercolor='#E0E0E0'>";
		tombol += "<tr align='right'><input type='button' value='Tambah' onClick=\"ubahdata('tambah',0,0,0);\"></td></tr></table>";
	} else
	{
		tombol += "";
	}
	document.getElementById("ftombol").innerHTML = tombol;
}

function act_tampil(){
	if (xmlHttp.readyState==4)
	{
		if (xmlHttp.status==200)
		{
			xmlResponse = xmlHttp.responseXML;
			xmlRoot = xmlResponse.documentElement;
			if (!xmlResponse || !xmlResponse.documentElement)
			{
				alert("Salah "+xmlHttp.responseText);
			}
			idpemilih			= xmlRoot.getElementsByTagName("idpemilih");
			namapemilih			= xmlRoot.getElementsByTagName("namapemilih");
			saktif				= xmlRoot.getElementsByTagName("pemilih_status");
			alamat_pemilih		= xmlRoot.getElementsByTagName("alamat_pemilih");
			kontak_pemilih		= xmlRoot.getElementsByTagName("kontak_pemilih");


			html = "";
			html += "<table width='100%' cellpadding='2' cellspacing='3' align='center' style='border-collapse:collapse; color:#660000;' border='1' bordercolor='#E0E0E0'>";
			html += "<tr align='center' bgcolor='grey'><td width='5%'>NO</td><td width='10%'>KODE</td><td width='20%'>NAMA</td><td>ALAMAT</td><td width='15%'>KONTAK</td><td width='3%'>AKTIF</td><td width='8%'>PROSES</td></tr>";
			if (idpemilih.length>0)
			{		
				for(a=0;a<idpemilih.length;a++)
				{
					no			= a+1;
					kode		= idpemilih.item(a).firstChild.data;
					keterangan	= alamat_pemilih.item(a).firstChild.data;
					kontak		= kontak_pemilih.item(a).firstChild.data;
					
					slevel = saktif.item(a).firstChild.data;
					if(slevel==0) { glevel = "<a href='javascript: void(0)' onClick=\"return ubahlevel('"+kode+"',1);\"><img src='gambar/terkunci.gif' border='0' width='20' height='20'></a>"; } 
					else if(slevel==1) { glevel = "<a href='javascript: void(0)' onClick=\"return ubahlevel('"+kode+"',0);\"><img src='gambar/aktif.gif' border='0' width='20' height='20'></a>"; }
					else { glevel = "<img src='gambar/trash.png' border='0' width='15' height='15'>"; }
					
					ubah	= "<a href='javascript: void(0)' onClick=\"ubahdata('ubah','"+kode+"','"+namapemilih.item(a).firstChild.data+"','"+keterangan+"','"+kontak+"');\"><img src='gambar/ubah.gif' border='0' width='16' height='16'><a>";
					hapus	= "<a href='javascript: void(0)' onClick=\"return hapuskode('"+kode+"','"+namapemilih.item(a).firstChild.data+"','"+keterangan+"');\"><img src='gambar/hapus.png' border='0' width='16' height='16' alt='Hapus'><a>";
					
					html += "<tr><td align='center'>"+no+"</td><td align='left' NoWrap>"+kode+"</td><td align='left' NoWrap>"+namapemilih.item(a).firstChild.data+"</td><td>"+keterangan+"</td><td align='left'>"+kontak+"</td><td align='center'>"+glevel+"</td><td NoWrap align='center'>"+ubah+"&nbsp"+hapus+"</td></tr>";
				}
				html += "<tr><td align='left' colspan='14'><br><b><u>Keterangan :</u></b><br><img src='gambar/aktif.gif' border='0' width='20' height='20'> : Pemilih Aktif<br><img src='gambar/terkunci.gif' border='0' width='20' height='20'> : Pemilih tidak aktif</td></tr>";
			} else
			{
				html += "<tr><td align='center' colspan='8'>Data Tidak Ada</td></tr>";
			}
			html += "</table>";

			document.getElementById("fdata").innerHTML = html;
			tombol_tambah(1);
		}
		else {
			alert("Ada problem, method statusText adalah "+xmlHttp.statusText);
		}
	}
}

function act_proses(){
	if (xmlHttp.readyState==4)
	{
		if (xmlHttp.status==200)
		{
			xmlResponse = xmlHttp.responseXML;
			xmlRoot = xmlResponse.documentElement;
			if (!xmlResponse || !xmlResponse.documentElement)
			{
				alert("Salah "+xmlHttp.responseText);
			}
			simpan = xmlRoot.getElementsByTagName("simpan");
			if (simpan.length>0)
			{
				nsimpan = simpan.item(0).firstChild.data;
				if(nsimpan=='gagaltambah')
				{
					//gagal = xmlRoot.getElementsByTagName("gagal");
					//alert(gagal.item(0).firstChild.data);
					alert('Gagal..! Terdapat kesalahan data');
					document.getElementById('pemilih_nama').select();
					return false;
				} else
				if(nsimpan=='tambah')
				{
					alert('Data berhasil disimpan');
					tampil();
					ubahdata('batal',0,0,0);
				} else
				if(nsimpan=='hapus')
				{
					alert('Data berhasil dihapus');
					tampil();
				} else 
				if(nsimpan=='gagalhapus')
				{
					//gagal = xmlRoot.getElementsByTagName("gagal");
					//alert(gagal.item(0).firstChild.data);
					alert('GAGAL !!! \nData tidak dapat dihapus karena sedang digunakan.');
					tampil();
				} else
				if(nsimpan=='gagalubah')
				{
					alert('GAGAL !!! \nData tidak dapat diubah \nHarus ada pemilih yang aktif.');
					tampil();
				} else
				if(nsimpan=='ubahpemilih')
				{
					tampil();
					ubahdata('batal',0,0,0);
				} else
				{
					tampil();
				}
			}
		}
	}
}


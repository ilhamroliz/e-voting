function ubahid(kode, nilai)
{
	param = "status=ubahaktif&kode="+kode+"&nilai="+nilai+"";
	xmlHttp.open("POST", "aksi/ketetapan.php", true);
	xmlHttp.onreadystatechange = act_proses;
	xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xmlHttp.send(param);
}

function ubahlevel(kode, nilai)
{
	param = "status=ubahlevel&kode="+kode+"&nilai="+nilai+"";
	xmlHttp.open("POST", "proses_php/ketetapan.php", true);
	xmlHttp.onreadystatechange = act_proses;
	xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xmlHttp.send(param);
}

function hapuskode(kode, namanya, keterangan)
{
	tanya = confirm('Anda yakin ingin menghapus ketetapan : \nTgl  : '+ namanya + ' \nKet :  '+keterangan+'');
	if (tanya == true) 
	{
		param = "status=hapuskode&kode="+kode+"";
		xmlHttp.open("POST", "proses_php/ketetapan.php", true);
		xmlHttp.onreadystatechange = act_proses;
		xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xmlHttp.send(param);
		return true;
	}
	else return false;
}

function tambahketetapan()
{
	tg	= document.getElementById('ketetapan_tanggal').value;
	ket	= document.getElementById('ketetapan_keterangan').value;
	jum	= document.getElementById('ketetapan_jumlah').value;
	cln	= document.getElementById('ketetapan_calon').value;

	if(tg=='') { alert('Tanggal ketetapan harus diisi...!!!'); document.getElementById('ketetapan_tanggal').focus(); return false; }

	if(ket=='') { alert('Keterangan harus diisi...!!!'); document.getElementById('ketetapan_keterangan').focus(); return false; }

	if(jum=='') { alert('Jumlah calon harus diisi...!!!'); document.getElementById('ketetapan_jumlah').focus(); return false; }

	if(cln=='') { alert('Jumlah pilihan harus diisi...!!!'); document.getElementById('ketetapan_calon').focus(); return false; }

	param = "status=tambahketetapan&tg="+tg+"&ket="+ket+"&jum="+jum+"&cln="+cln+"";
	xmlHttp.open("POST", "proses_php/ketetapan.php", true);
	xmlHttp.onreadystatechange = act_proses;
	xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xmlHttp.send(param);
}


function ubahketetapan(kode)
{
	ketetapan_tanggal		= document.getElementById('ketetapan_tanggal').value;
	ketetapan_keterangan	= document.getElementById('ketetapan_keterangan').value;
	ketetapan_jumlah	= document.getElementById('ketetapan_jumlah').value;
	ketetapan_calon		= document.getElementById('ketetapan_calon').value;

	
	if(ketetapan_tanggal=='') { alert('Tanggal ketetapan harus diisi...!!!'); document.getElementById('ketetapan_tanggal').focus(); return false; }
	if(ketetapan_keterangan=='') { alert('Keterangan harus diisi...!!!'); document.getElementById('ketetapan_keterangan').focus(); return false; }
	if(ketetapan_jumlah=='') { alert('Jumlah calon harus diisi...!!!'); document.getElementById('ketetapan_jumlah').focus(); return false; }
	if(ketetapan_calon=='') { alert('Jumlah pilihan harus diisi...!!!'); document.getElementById('ketetapan_calon').focus(); return false; }

	param = "status=ubahketetapan&ketetapan_tanggal="+ketetapan_tanggal+"&kode="+kode+"&ketetapan_keterangan="+ketetapan_keterangan+"&ketetapan_jumlah="+ketetapan_jumlah+"&ketetapan_calon="+ketetapan_calon+"";

	
	xmlHttp.open("POST", "proses_php/ketetapan.php", true);
	xmlHttp.onreadystatechange = act_proses;
	xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xmlHttp.send(param);
}





function ubahdata(status, kode, tanggal, keterangan, jumlah, calon) {
	if(status=='ubah')
	{	
		halaman = "";
		halaman += "<table width='100%' align='center'><tr><td colspan='3' align='left'><b>UBAH DATA PERIODE</b></td></tr>";
		halaman += "<tr><td NoWrap>Kode Periode</td><td align='center'>:</td><td>"+kode+"</td></tr>";
		halaman += "<tr><td NoWrap>Tanggal Periode</td><td align='center'>:</td><td><input type='text' id='ketetapan_tanggal' value='"+tanggal+"'</td></td></tr>";
		halaman += "<tr><td>Keterangan</td><td align='center'>:</td><td><textarea id='ketetapan_keterangan' cols='50' rows='2'>"+keterangan+"</textarea></td></tr>";
		halaman += "<tr><td NoWrap>Jumlah Calon</td><td align='center'>:</td><td><input type='text' id='ketetapan_jumlah' maxlength='2' size='2' value='"+jumlah+"'></textarea></td></tr>";
		halaman += "<tr><td NoWrap>Jumlah Pilihan</td><td align='center'>:</td><td><input type='text' id='ketetapan_calon' maxlength='2' size='2' value='"+calon+"'></textarea></td></tr>";

		halaman += "<tr><td colspan='3' align='center'><input type='button' value='Ubah Data'  onClick=\"return ubahketetapan('"+kode+"');\">&nbsp;<input type='button' value='Selesai'  onClick=\"ubahdata('batal',0,0,0);\"></td></tr>";
		halaman += "</table>";
		tombol_tambah(0);
	}
	else if(status=='tambah')
	{
		halaman = "";
		halaman += "<table width='90%' align='center'><tr><td colspan='3' align='left'><b>TAMBAH DATA PERIODE</b></td></tr>";

		halaman += "<tr><td width='20%'>Tanggal Periode</td><td width='5%' align='center'>:</td><td><input type='text' id='ketetapan_tanggal'  maxlength='10'></td></tr>";
		halaman += "<tr><td>Keterangan</td><td align='center'>:</td><td><textarea id='ketetapan_keterangan' cols='50' rows='2'></textarea></td></tr>";
		halaman += "<tr><td NoWrap>Jumlah Calon</td><td align='center'>:</td><td><input type='text' id='ketetapan_jumlah'  maxlength='2' size='2'></textarea></td></tr>";
		halaman += "<tr><td NoWrap>Jumlah Pilihan</td><td align='center'>:</td><td><input type='text' id='ketetapan_calon'  maxlength='2' size='2'></textarea></td></tr>";

		halaman += "<tr><td colspan='3' align='center'><input type='button' value='Tambah Periode' onClick=\"return tambahketetapan();\">&nbsp;<input type='button' value='Reset'  onClick=\"ubahdata('batal',0,0,0);\"></td></tr>";
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
	var param= "proses_php/ketetapan.php?tampil=sukses";
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
			idketetapan			= xmlRoot.getElementsByTagName("idketetapan");
			tgketetapan			= xmlRoot.getElementsByTagName("tgketetapan");
			l_tgketetapan			= xmlRoot.getElementsByTagName("l_tgketetapan");
			saktif				= xmlRoot.getElementsByTagName("ketetapan_status");
			keterangan_ketetapan	= xmlRoot.getElementsByTagName("keterangan_ketetapan");
			calon_ketetapan		= xmlRoot.getElementsByTagName("calon_ketetapan");
			jumlah_ketetapan		= xmlRoot.getElementsByTagName("jumlah_ketetapan");


			html = "";
			html += "<table width='100%' cellpadding='2' cellspacing='3' align='center' style='border-collapse:collapse; color:#660000;' border='1' bordercolor='#E0E0E0'>";
			html += "<tr align='center' bgcolor='grey'><td width='5%'>NO</td><td width='10%' NoWrap>TANGGAL PERIODE</td><td>KETERANGAN</td><td width='8%'>JUMLAH</td><td width='8%'>CALON</td><td width='3%'>AKTIF</td><td width='8%'>PROSES</td></tr>";
			if (idketetapan.length>0)
			{		
				for(a=0;a<idketetapan.length;a++)
				{
					no			= a+1;
					kode		= idketetapan.item(a).firstChild.data;
					keterangan	= keterangan_ketetapan.item(a).firstChild.data;
					jumlah		= jumlah_ketetapan.item(a).firstChild.data;
					calon		= calon_ketetapan.item(a).firstChild.data;
					
					slevel = saktif.item(a).firstChild.data;
					if(slevel==0) { glevel = "<a href='javascript: void(0)' onClick=\"return ubahlevel('"+kode+"',1);\"><img src='gambar/terkunci.gif' border='0' width='20' height='20'></a>"; } 
					else if(slevel==1) { glevel = "<a href='javascript: void(0)' onClick=\"return ubahlevel('"+kode+"',0);\"><img src='gambar/aktif.gif' border='0' width='20' height='20'></a>"; }
					else { glevel = "<img src='gambar/trash.png' border='0' width='15' height='15'>"; }
					
					ubah	= "<a href='javascript: void(0)' onClick=\"ubahdata('ubah','"+kode+"','"+tgketetapan.item(a).firstChild.data+"','"+keterangan+"','"+jumlah+"','"+calon+"');\"><img src='gambar/ubah.gif' border='0' width='16' height='16'><a>";
					hapus	= "<a href='javascript: void(0)' onClick=\"return hapuskode('"+kode+"','"+tgketetapan.item(a).firstChild.data+"','"+keterangan+"');\"><img src='gambar/hapus.png' border='0' width='16' height='16' alt='Hapus'><a>";
					
					html += "<tr><td align='center'>"+no+"</td><td align='left' NoWrap>"+l_tgketetapan.item(a).firstChild.data+"</td><td>"+keterangan+"</td><td align='center'>"+jumlah+"</td><td align='center'>"+calon+"</td><td align='center'>"+glevel+"</td><td NoWrap align='center'>"+ubah+"&nbsp"+hapus+"</td></tr>";
				}
				html += "<tr><td align='left' colspan='14'><br><b><u>Keterangan :</u></b><br><img src='gambar/aktif.gif' border='0' width='20' height='20'> : Periode Aktif<br><img src='gambar/terkunci.gif' border='0' width='20' height='20'> : Periode tidak aktif</td></tr>";
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
					alert('Gagal..! Terdapat kesalahan data');
					document.getElementById('ketetapan_tanggal').select();
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
					alert('GAGAL !!! \nData tidak dapat dihapus karena sedang digunakan.');
					tampil();
				} else
				if(nsimpan=='gagalubah')
				{
					alert('GAGAL !!! \nData tidak dapat diubah \nHarus ada ketetapan yang aktif.');
					tampil();
				} else
				if(nsimpan=='ubahketetapan')
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


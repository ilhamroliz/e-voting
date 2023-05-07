function tampil(){
	var param= "proses_php/barcode.php?tampil=sukses";
	xmlHttp.open("GET",param,true);
	xmlHttp.onreadystatechange = act_tampil;
	xmlHttp.send(null);
}

function cari()
{
	awal	= document.getElementById('awal').value;
	akhir	= document.getElementById('akhir').value;
	if(awal==""){alert('Tentukan Kode awal.'); document.getElementById("awal").focus(); return false;}
	if(akhir==""){alert('Tentukan Kode akhir.'); document.getElementById("akhir").focus(); return false;}
	var param= "proses_php/barcode.php?tampil=sukses&proses=cari&awal="+awal+"&akhir="+akhir;
	xmlHttp.open("GET",param,true);
	xmlHttp.onreadystatechange = act_tampil;
	xmlHttp.send(null);
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
			awal		= xmlRoot.getElementsByTagName("awal");
			akhir		= xmlRoot.getElementsByTagName("akhir");
			ada			= xmlRoot.getElementsByTagName("ada");
			idpemilih	= xmlRoot.getElementsByTagName("idpemilih");
			var ok="";
			var c_awal="";
			var c_akhir="";
			if(ada.length>0)
			{
				ok		= ada.item(0).firstChild.data;
			}

			c_awal	= awal.item(0).firstChild.data;
			c_akhir	= akhir.item(0).firstChild.data;

			html = "";
			html += "<table width='100%' cellpadding='2' cellspacing='3' align='center' style='border-collapse:collapse; color:#660000;' border='1' bordercolor='#E0E0E0'>";
			html += "<tr align='left' bgcolor='grey'><td>Cetak Barcode</td></tr><tr><td>";
			html += "<table width='100%' boder='0'><tr><td width='15%' NoWrap>Kode Pemilih</td><td>";
			html += "<input type='text' id='awal' value='"+c_awal+"'> sampai <input type='text' id='akhir' value='"+c_akhir+"'><input type='button' value='Cari' onclick=\"cari();\">";
			html += "</td></tr></table>";
			html += "</td></tr>";
			if(ok>0)
			{
				html += "<tr><td>";
				html += "Ada <b>"+ok+"</b> data ditemukan. <input type='button' value='Cetak' onclick=\"cetak('"+c_awal+"','"+c_akhir+"');\">";
				html += "</td></tr>";
			}
			html += "</table>";

			document.getElementById("fdata").innerHTML = html;
		}
		else {
			alert("Ada problem, method statusText adalah "+xmlHttp.statusText);
		}
	}
}

function cetak(awal,akhir)
{
	window.open("include/barcode.php?awal="+awal+"&akhir="+akhir+"");
}
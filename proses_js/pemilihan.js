function tampil(abstain){
	var param= "proses_php/pemilihan.php?tampil=sukses&abstain="+abstain;
//	alert(param);
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
			idcalon			= xmlRoot.getElementsByTagName("idcalon");
			namacalon		= xmlRoot.getElementsByTagName("namacalon");
			fotocalon		= xmlRoot.getElementsByTagName("fotocalon");
			inisial			= xmlRoot.getElementsByTagName("inisialcalon");
			urutan			= xmlRoot.getElementsByTagName("urutcalon");

			abstain			= xmlRoot.getElementsByTagName("abstain");
			n_abstain		= abstain.item(0).firstChild.data;
			a_calon			= xmlRoot.getElementsByTagName("a_calon");
			var jumlahpilih = a_calon.length;

			kcalon			= xmlRoot.getElementsByTagName("kcalon");
			var jcalon		= 0;
			var l_batal		= 0;
			if(n_abstain=='1')
			{
				l_batal = 1;
			}

			var ketentuan = 0;
			html = "";
			if (idcalon.length>0)
			{	
				jcalon		= kcalon.item(0).firstChild.data;
				kodepemilih = document.getElementById('kodepemilih').value;
				if(kodepemilih=="")
				{ 
					var kelabu = " style='opacity:0.2;' "; 
					var link = 0;
				}
				else 
				{ 
					var kelabu = ""; 
					var link = 1; 
					if(jumlahpilih<jcalon)
					{
						if(n_abstain=='1')
						{
							link = 1;
						} else
						{
							var kelabu = " style='opacity:0.2;' "; 
							link = 0;
						}
						ketentuan = 2;
					} else
					{
						ketentuan = 1;
						link = 0;
					}
				}
				

				var jml=idcalon.length;
				var peraturan = 10;
				if(jml<=peraturan) { var bagi = jml; } else { var bagi = peraturan; }

				html += "<table width='100%'  cellpadding='1' cellspacing='1' align='center' style='border-collapse:collapse; color:#660000;' border='0' bordercolor='#E0E0E0'>";
				var kolom = Math.ceil(jml/bagi);

				var persen = (100/bagi);
				var d = 0;
				for(a=0;a<kolom;a++)
				{
					html +=  "<tr>";
						for(s=0;s<bagi;s++)
						{
							if(d<jml)
							{
								kode		= idcalon.item(d).firstChild.data;
								nama		= namacalon.item(d).firstChild.data;
								foto		= fotocalon.item(d).firstChild.data;
								panggilan	= inisial.item(d).firstChild.data;
								n_urutan	= urutan.item(d).firstChild.data;
							} else
							{
								kode		= "";
								nama		= "";
								foto		= "";
								panggilan	= "";
								n_urutan	= "";
							}
							
							html +=  "<td align='center' width='"+persen+"%' valign='top'>";
								if(kode!='')
								{
									if(file_exists('photos/'+foto+'')==true)
									{
										gambar = "photos/"+foto+"";
									}
									else
									{
										gambar = "photos/none.jpg";
									}
									html += "<table width='100%' border='0'><tr><td align='center' valign='middle'>";
									

									var terpilih = "";
									var tumpuk = "";
									var tanda = "0";
									if(a_calon.length>0)
									{
										for(p=0;p<a_calon.length;p++)
										{
											if(kode==a_calon.item(p).firstChild.data)
											{
												terpilih = " style='opacity:0.6;' ";
												tumpuk = "<img src='gambar/mark.png' class='watermark' alt='Pilihan' width='100%' height='100%'";
												if(l_batal=='1'){ tumpuk += "onclick=\"pilih_calon('"+kode+"','1');\""; }
												tumpuk += " "+kelabu+">";
											}
										}
									}

									html += "<div id='penanda_nomor' align='center'>";		
									html += "<div id='watermark_box' align='center'>";
									html += "<img src='"+gambar+"' width='100' height='120' "+kelabu+" "+terpilih+" ";
									if(link==1)
									{
										html += " onclick=\"pilih_calon('"+kode+"','0');\") ";
									}

									html += ">";
									html += "<img src='gambar/"+n_urutan+".png' class='penanda' alt='Pilihan' width='35%' height='35%'>";
									html += tumpuk;
									html += "</div>";
									html += "</div>";

									
									html += "</td></tr><tr><td NoWrap align='center'>"+panggilan+"</td></tr></table>";
								} else
								{
									html += "&nbsp;";
								}
							html +=  "</td>";
							d++;
						}
					html +=  "</tr>";
				}
			} else
			{
				html += "Data Tidak Ada.";
			}
			html += "</table>";
			if(ketentuan>0)
			{
				html += "<table width='100%'  cellpadding='1' cellspacing='1' align='center' style='border-collapse:collapse; color:#660000;' border='1' bordercolor='#E0E0E0'>";
					html +=  "<tr><td height='40px;' style='font-size:16px;' align='center' align='middle'>";

					if(ketentuan==2)
					{
						if(n_abstain=='1') 
						{ 
							html +=  "Anda Memilih <b>"+jumlahpilih+"</b> dari <b>"+jcalon+"</b> Ketentuan calon.";
						} else 
						{ 
						html += "<input type='button' value='S I M P A N' class='button-primary' onclick=\"simpan_calon('"+n_abstain+"');\")>";					
						}
					} else if(ketentuan==1)
					{
						html += "<input type='button' value='S I M P A N' class='button-primary' onclick=\"simpan_calon('"+n_abstain+"');\")>";					
					}
					html +=  "</td>";
					if(ketentuan==2)
					{
						if(n_abstain=='1') { var ket = " A B S T A I N "; } else { var ket = " P I L I H "; }

						html +=  "<td width='3%'><input type='button' value='"+ket+"' class='button-primary' onclick=\"simpan_abstain('"+n_abstain+"');\")></td>";
					}
					html +=  "</tr>";
				html += "</table>";
			}

			document.getElementById("fdata").innerHTML = html;
		}
		else {
			alert("Ada Masalah, Mohon klik OK dan tunggu beberapa waktu.");
		}
	}
}


function file_exists (url) {
    // Returns true if filename exists  
    // 
    // version: 1009.2513
    // discuss at: http://phpjs.org/functions/file_exists    // +   original by: Enrique Gonzalez
    // +      input by: Jani Hartikainen
    // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // %        note 1: This function uses XmlHttpRequest and cannot retrieve resource from different domain.
    // %        note 1: Synchronous so may lock up browser, mainly here for study purposes.     // *     example 1: file_exists('http://kevin.vanzonneveld.net/pj_test_supportfile_1.htm');
    // *     returns 1: '123'
    
    var req = this.window.ActiveXObject ? new ActiveXObject("Microsoft.XMLHTTP") : new XMLHttpRequest();
    if (!req) {throw new Error('XMLHttpRequest not supported');}      
    // HEAD Results are usually shorter (faster) than GET
    req.open('HEAD', url, false);
    req.send(null);
    if (req.status == 200){        return true;
    }
    
    return false;
}

function pilih_calon(kode,status)
{
	param = "keterangan=pilih&kode="+kode+"&status="+status+"";
	xmlHttp.open("POST", "proses_php/pemilihan.php", true);
	xmlHttp.onreadystatechange = act_simpandata;
	xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xmlHttp.send(param);
}

function act_simpandata(){
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
			simpan	= xmlRoot.getElementsByTagName("simpan");
			masuk	= xmlRoot.getElementsByTagName("masuk");
			if (simpan.length>0)
			{
				simpan = simpan.item(0).firstChild.data;
				if(simpan=='PILIH')
				{
					tampil('');
				} 
				if(simpan=='SIMPAN')
				{
					//alert(masuk.item(0).firstChild.data);
					document.location.href ="main.php?keluar=ok";
				} 

			}
		}
	}
}


function simpan_calon(abstain)
{
	param = "keterangan=simpan&status="+abstain;
	xmlHttp.open("POST", "proses_php/pemilihan.php", true);
	xmlHttp.onreadystatechange = act_simpandata;
	xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xmlHttp.send(param);
}


function simpan_abstain(kode)
{
	tampil(kode);
}

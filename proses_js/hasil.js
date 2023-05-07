function number_format(number,num_decimal_places,dec_separator,thousand_separator)
{
	var decimal = '00000';
	var negatif = (number.substring(0,1) == '-' ? '-' : '');
	number = Math.abs(parseFloat(number)).toString().split('.');
	if (number.length == 2)
	number[1] = (number[1] + decimal).substring(0,num_decimal_places);
	else
	number[1] = decimal.substring(0,num_decimal_places);
	number[0] = stringreverse(number[0]);
	var strdigit = '';
	for (i=0;i<number[0].length;i++)
	{
	if (i % 3 == 0 && i !=0) strdigit += thousand_separator;
	strdigit += number[0].charAt(i);
	}
	return negatif + stringreverse(strdigit) + (num_decimal_places > 0 ? dec_separator + number[1] : '');
	}

	function stringreverse(str)
	{
	var strlen = str.length;
	var strrev = '';
	for (i=strlen-1;i>=0;i--)
	{
	strrev += str.charAt(i);
	}
	return strrev;
}

function tampil(){
	var param= "proses_php/hasil.php?tampil=sukses";
//	alert(param);
//	return false;
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
			kd_smu		= xmlRoot.getElementsByTagName("id_smu");
			nm_smu		= xmlRoot.getElementsByTagName("nm_smu");
			jm_smu		= xmlRoot.getElementsByTagName("jm_smu");

//			n_teratas	= xmlRoot.getElementsByTagName("teratas");
//			d_teratas	= n_teratas.item(0).firstChild.data;
			n_total		= xmlRoot.getElementsByTagName("total");
			d_total		= n_total.item(0).firstChild.data;


			html = "";
			html += "<BR>";
			html += "<table width='100%' border='0' align='center'><tr><td valign='top'>";
			if (kd_smu.length>0)
			{	
				html += "<table width='90%' cellpadding='1' cellspacing='1' align='center' style='border-collapse:collapse;' border='0' bordercolor='#94AFB4'>";
				html += "<tr><td NoWrap>HASIL PEROLEHAN SUARA DARI "+d_total+" CALON</td></tr>";
				html += "<tr><td><table width='100%' cellpadding='1' cellspacing='1' align='center' style='border-collapse:collapse;' border='1' bordercolor='#94AFB4' class='isigrafik'>";
				html += "<tr align='center' bgcolor='#CCFFFF'><td width='2%'>NO</td><td width='5%'>URUT</td><td>NAMA CALON PIMPINAN</td><td width='5%' NoWrap>PEROLEHAN SUARA</td></tr>";
				for(a=0;a<kd_smu.length;a++)
				{
					no=a+1;
					kode	= kd_smu.item(a).firstChild.data;
					nama	= nm_smu.item(a).firstChild.data;
					jumlah	= jm_smu.item(a).firstChild.data;
					html += "<tr><td align='center'>"+no+"</td><td align='center'>"+kode+"</td><td align='left'>"+nama+"</td><td align='center'>"+jumlah+"</td></tr>";
				}
				html += "</table></td></tr>";
				html += "</table></td>";

				html += "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
				
				
				html += "</tr></table>";
			} else
			{
				html += "<tr><td align='center' colspan='8'>Data Tidak Ada</td></tr>";
				html += "</table>";
			}
			document.getElementById("fdata").innerHTML = html;
			timedRefresh(3000);
		}
		else {
			alert("Ada problem, method statusText adalah "+xmlHttp.statusText);
		}
	}
}

function timedRefresh(timeoutPeriod) {
	setTimeout("tampil()",timeoutPeriod);
}
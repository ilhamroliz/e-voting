var xmlHttp = createXmlHttpRequestObject();
function createXmlHttpRequestObject(){
	var xmlHttp;
	if (window.ActiveXObject)
	{
		try
		{
			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP.3.0"); //IE 7
		}
		catch (e)
		{
			try
			{
				xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); // IE 6
			}
			catch (e)
			{
				try
				{
					xmlHttp=new ActiveXObject("Microsoft.XMLHTTP"); // IE Lama
				}
				catch (e)
				{
					xmlHttp=false;
				}
			}
		}
	}
	else 
	{
		try
		{
			xmlHttp=new XMLHttpRequest();
		}
		catch (e)
		{
			xmlHttp=false;
		}
	}

	if (!xmlHttp) alert("Object XMLHttpRequest failed !!!");
	else 
		return xmlHttp;
}

function resetall(){
	tampil();
}

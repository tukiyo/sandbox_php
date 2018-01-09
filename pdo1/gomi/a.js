<script type="text/javascript"> // 名前か文章にカーソルをフォーカス
if(document.getElementsByName("text")[0]) document.getElementsByName("text")[0].focus();
if(document.getElementsByName("name")[0]) document.getElementsByName("name")[0].focus();
function createXMLHttpRequest(){ var xmlHttpObject = null;
	if(window.XMLHttpRequest){ xmlHttpObject = new XMLHttpRequest();
	}else if(window.ActiveXObject){ try{ xmlHttpObject = new ActiveXObject("Msxml2.XMLHTTP");
	}catch(e){ try{ xmlHttpObject = new ActiveXObject("Microsoft.XMLHTTP");
	}catch(e){ return null;
	} } } if(xmlHttpObject) xmlHttpObject.onreadystatechange = displayHtml;
	return xmlHttpObject;
} function loadchatdata(){ httpObj = createXMLHttpRequest();
	if(httpObj){ httpObj.open("GET","/loadchatdata.php",true);
		httpObj.send(null);
	} } function displayHtml(){ if((httpObj.readyState == 4) && (httpObj.status == 200) && httpObj.responseText){ document.getElementById("board").innerHTML = httpObj.responseText + document.getElementById("board").innerHTML;
	} } // 2秒ごとにチャットの内容を取りに行く setInterval('loadchatdata()',2000);
</script> 

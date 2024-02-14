<script>
var url; 
var xmlHttp=null; 
function showPag(str) 
{  
xmlHttp=GetXmlHttpObject(); 
if (xmlHttp==null) 
  { 
  alert ("Your browser does not support AJAX!"); 
  return; 
  }  
url=str; 
xmlHttp.onreadystatechange=stateChanged; 
xmlHttp.open("GET",url,true); 
xmlHttp.send(null); 
if (xmlHttp.readyState == 1) {  
document.getElementById("conteudo").innerHTML="<img src='loader.gif'> <br> <font face = 'verdana' color = 'CC0000' size = '2'> <b>Carregando...</b></font>"; 
} 
return url; 
} 
 
 
function stateChanged()  
{  
if (xmlHttp.readyState==4 && xmlHttp.status == 200) 
{  
var resultado = document.getElementById("conteudo").innerHTML=xmlHttp.responseText; 
} 
}

</script>


var myConn = new XHConn();
if (!myConn) alert("deu erro aqui.");
var inclusao = function (oXML) { document.getElementById('include').innerHTML = oXML.responseText;}
function incluir (url)
{
document.getElementById('include').innerHTML = "<img src='../imagens/reloader.gif' width='50' height='50'><br><font color='#336699' face=Verdana  size='4'><b>&nbsp;Por favor<br>Aguarde....<br/></b></font>";
myConn.connect("include.php", "GET", "variavel="+url, inclusao);
}
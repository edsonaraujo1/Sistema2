var myConn = new XHConn();
if (!myConn) alert("deu erro aqui.");
var inclusao = function (oXML) { document.getElementById('include').innerHTML = oXML.responseText;}
function incluir (url)
{
document.getElementById('include').innerHTML = "<div align=center><table align=center border='15' bgcolor='#FFFFFF'  bordercolor ='#5A9CB1'><tr><td align=center><font face=arial size='4'><b>&nbsp;&nbsp;&nbsp;&nbsp;* * * Tratando Arquivos* * *&nbsp;&nbsp;&nbsp;&nbsp;<br><table align=center><img src='../imagens/ajax-loader.gif' width='70' height='70'><br></table><center><font color='#336699' face=Verdana  size='2'><b>&nbsp;Por favor Aguarde....<br/></b></font></center></td></tr></table></div>";
myConn.connect("include.php", "GET", "variavel="+url, inclusao);
}
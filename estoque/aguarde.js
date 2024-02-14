/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Funcoes Aguarde JavaScript
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 21/01/2009

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

var myConn = new XHConn();
if (!myConn) alert("deu erro aqui.");
var inclusao = function (oXML) { document.getElementById('include').innerHTML = oXML.responseText;}
function incluir (url)
{
document.getElementById('include').innerHTML = "<br><br><img src='../imagens/reloader.gif' width='50' height='50'><br><font color='#336699' face=Verdana  size='4'><b>&nbsp;Por favor<br>Aguarde....<br/></b></font>";
myConn.connect("include.php", "GET", "variavel="+url, inclusao);
}
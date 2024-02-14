<?
/*
 --------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Ficha de Cadastro
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 --------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");
$nome3 = $_SESSION["nome_log"];

setlocale(LC_TIME,"portuguese");
$mes_data = strftime("%B");

if (strftime("%B") == "January")   { $mes_data = "Janeiro"; }
if (strftime("%B") == "February")  { $mes_data = "Fevereiro"; }
if (strftime("%B") == "March")     { $mes_data = "Março"; }
if (strftime("%B") == "April")     { $mes_data = "Abril"; }
if (strftime("%B") == "May")       { $mes_data = "Maio"; }
if (strftime("%B") == "June")      { $mes_data = "Junho"; }
if (strftime("%B") == "July")      { $mes_data = "Julho"; }
if (strftime("%B") == "August")    { $mes_data = "Agosto"; }
if (strftime("%B") == "September") { $mes_data = "Setembro"; }
if (strftime("%B") == "October")   { $mes_data = "Outubro"; }
if (strftime("%B") == "November")  { $mes_data = "Novembro"; }
if (strftime("%B") == "December")  { $mes_data = "Dezembro"; }


?>

<style type="text/css" media="print">
div.invisivel {
visibility: hidden; 
}
</style>

<div class="invisivel">

          <form method="POST" action="javascript:window.close()">
          <td><input type=image name="socios" src="../imagens/botaoazul25.PNG"></td>
          </form>



</div>

<script language="JavaScript" type="text/javascript">
// Funcao Imprimir
function printit(){ 
if (NS) { 
window.print(); 
} else { 
var WebBrowser = '<OBJECT ID="WebBrowser1" WIDTH=0 HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>'; 
document.body.insertAdjacentHTML('beforeEnd', WebBrowser); 
WebBrowser1.ExecWB(6,11);//Use a 1 vs. a 2 for a prompting dialog box WebBrowser1.outerHTML = ""; 
} 
} 

// bloqueando a tecla Ctrl
if (document.all) {
    document.onkeydown = function() {
        var teclaCtrl = event.keyCode ? event.keyCode : (event.which ? event.which : event.charCode);
        if (teclaCtrl == 17) {
            alert('Opção Invalida !!!');
            return false;
        }
    }
}
// Bloqueia Botao direito do mouse
function click() { 
if (event.button==2||event.button==3) { 
alert('Botão desativado !!!') 
} 
} 
document.onmousedown=click 

</script>

<html>
<head>
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
</head>

<script language="javascript">

function fechar(){
	
	if(document.all){
		window.opener=window;
		window.close("#");
	}else{
		self.close();
	}
}

</script>

<body>
</html>

<style type=text/css>

<!--.cp {  font: bold 11px Arial; color: black}
<!--.ti {  font: 10px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
<!--.p  { line-height: 10pt}
<!--.edt {
	width: 350px;
	height: 26px;
	border: 0px;
}
@media screen{
	.nao_mostrar { display: none;}
    .nao_imprimir { display: block;}	
}

@media print{
	.nao_mostrar { display:block;}
    .nao_imprimir { display:none;}	
}
--></style> 


<?

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

mysql_select_db($db);
// retorna uma pesquisa

$data_fi = date("d/m/Y");
// Regata Secao
session_start();
$Cod_3 = $_SESSION['navega'];

$Cod_p = $Cod_2;


if ($Cod_3 != 0)
{
   $consulta  = "SELECT * FROM protocolo WHERE id = '$Cod_3' ORDER BY id";
}
else
{
   $consulta  = "SELECT * FROM protocolo WHERE CODIGO = '$Cod_p'";
}   

$resultado = mysql_query($consulta);

$row = mysql_fetch_array($resultado);

$id         = @$row["id"];

if (!empty($id)){

$id      = @$row["id"];
$Edit1   = @$row["CODIGO"];
$Edit2   = @$row["CONDOMINIO"];
$Edit3   = @$row["ENDERECO"];
$Edit4   = @$row["TELEFONE"];
$Edit5   = @$row["DATA"];
$Edit6   = @$row["HORA"];
$Edit7   = @$row["ACORDO"];
$Edit8   = @$row["RESP"];
$Edit9   = @$row["CHEGADA"];
$Edit10  = @$row["OBS"];
}else{

	
$consulta2  = "SELECT * FROM protocolo WHERE CODIGO = '$Cod_3' ORDER BY CODIGO";

$resultado2 = mysql_query($consulta2);

$row = mysql_fetch_array($resultado2);
	
$id      = @$row["id"];
$Edit1   = @$row["CODIGO"];
$Edit2   = @$row["CONDOMINIO"];
$Edit3   = @$row["ENDERECO"];
$Edit4   = @$row["TELEFONE"];
$Edit5   = @$row["DATA"];
$Edit6   = @$row["HORA"];
$Edit7   = @$row["ACORDO"];
$Edit8   = @$row["RESP"];
$Edit9   = @$row["CHEGADA"];
$Edit10  = @$row["OBS"];

}

			// Atualiza arquivo Log
			$data_log = date("d/m/Y");
			$hora_log = date("H:i:s"); 
			$even_log = "FICHA_CURSOS/".$Edit1;
			
			$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
			             VALUES
			             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
			
			@mysql_query($consulta_log, $link);
?>

<div class=nao_mostrar >
<html >
<head>
<title><?=$Titulo;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script type="text/javascript" src="vcl/js/common.js"></script>
</head>

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; "  >
<form style="margin-bottom: 0" id="Unit1" name="Unit1" method="post"  action="/Ficha_Cursos.php">
<table  width="760"   style="height:1056px"  border="0" cellpadding="0" cellspacing="0"  ><tr><td valign="top">

<div id="nao_mostrar"  style="Z-INDEX: 0; LEFT: 0px; WIDTH: 750px; POSITION: absolute; TOP: 8px; HEIGHT: 124px">
<div id="nao_mostrar"  style=" width: 750;  height: 124; overflow: hidden;" ><img id="Image1" src="../imagens/Logo_oficio2.bmp"  width="750"  height="124"  border="0"       /></div>
</div>
<div id="Label2_outer" style="Z-INDEX: 1; LEFT: 67px; WIDTH: 181px; POSITION: absolute; TOP: 286px; HEIGHT: 24px">
<div id="Label2" style=" font-family: Courier New; font-size: 14px;  height:24px;width:181px;"   >Nome do Condominio:</div>
</div>
<div id="Label4_outer" style="Z-INDEX: 2; LEFT: 67px; WIDTH: 149px; POSITION: absolute; TOP: 315px; HEIGHT: 24px">
<div id="Label4" style=" font-family: Courier New; font-size: 14px;  height:24px;width:149px;"   >Endereço:</div>
</div>
<div id="Label5_outer" style="Z-INDEX: 3; LEFT: 67px; WIDTH: 96px; POSITION: absolute; TOP: 348px; HEIGHT: 24px">
<div id="Label5" style=" font-family: Courier New; font-size: 14px;  height:24px;width:96px;"   >Telefone.:</div>
</div>
<div id="Label6_outer" style="Z-INDEX: 4; LEFT: 67px; WIDTH: 61px; POSITION: absolute; TOP: 380px; HEIGHT: 24px">
<div id="Label6" style=" font-family: Courier New; font-size: 14px;  height:24px;width:61px;"   >Data: </div>
</div>
<div id="Label7_outer" style="Z-INDEX: 5; LEFT: 265px; WIDTH: 55px; POSITION: absolute; TOP: 381px; HEIGHT: 24px">
<div id="Label7" style=" font-family: Courier New; font-size: 14px;  height:24px;width:55px;"   >Hora:</div>
</div>
<div id="Label31_outer" style="Z-INDEX: 6; LEFT: 238px; WIDTH: 440px; POSITION: absolute; TOP: 285px; HEIGHT: 24px">
<div id="Label31" style=" font-family: Arial; font-size: 14px;  height:24px;width:440px;"   ><STRONG><?=$Edit2;?></STRONG></div>
</div>
<div id="Label33_outer" style="Z-INDEX: 7; LEFT: 148px; WIDTH: 532px; POSITION: absolute; TOP: 315px; HEIGHT: 24px">
<div id="Label33" style=" font-family: Verdana; font-size: 14px;  height:24px;width:532px;"   ><STRONG><?=$Edit3;?></STRONG></div>
</div>
<div id="Label34_outer" style="Z-INDEX: 8; LEFT: 156px; WIDTH: 412px; POSITION: absolute; TOP: 348px; HEIGHT: 24px">
<div id="Label34" style=" font-family: Verdana; font-size: 14px;  height:24px;width:412px;"   ><STRONG><?=$Edit4;?></STRONG></div>
</div>
<div id="Label35_outer" style="Z-INDEX: 9; LEFT: 120px; WIDTH: 144px; POSITION: absolute; TOP: 380px; HEIGHT: 24px">
<div id="Label35" style=" font-family: Verdana; font-size: 14px;  height:24px;width:144px;"   ><STRONG><?=$Edit5;?></STRONG></div>
</div>
<div id="Label36_outer" style="Z-INDEX: 10; LEFT: 320px; WIDTH: 187px; POSITION: absolute; TOP: 381px; HEIGHT: 24px">
<div id="Label36" style=" font-family: Verdana; font-size: 14px;  height:24px;width:187px;"   ><STRONG><?=$Edit6;?></STRONG></div>
</div>
<div id="Edit1_outer" style="Z-INDEX: 11; LEFT: 162px; WIDTH: 392px; POSITION: absolute; TOP: 188px; HEIGHT: 40px">
<input type="text" id="Edit1" name="Edit1" value="" style=" font-family: Verdana; font-size: 10px;  height:39px;width:392px;"    tabindex="0"    />
</div>
<div id="Label57_outer" style="Z-INDEX: 12; LEFT: 170px; WIDTH: 379px; POSITION: absolute; TOP: 196px; HEIGHT: 24px">
<div id="Label57" style=" font-family: Courier New; font-size: 20px;  height:24px;width:379px;"  align="Center"   ><STRONG>PROTOCOLO&nbsp; DE&nbsp; ASSEMBLEIA</STRONG></div>
</div>
<div id="Edit2_outer" style="Z-INDEX: 13; LEFT: 67px; WIDTH: 597px; POSITION: absolute; TOP: 528px; HEIGHT: 480px">
<input type="text" id="Edit2" name="Edit2" value="" style=" font-family: Verdana; font-size: 10px;  height:479px;width:597px;"    tabindex="0"    />
</div>
<div id="Label1_outer" style="Z-INDEX: 14; LEFT: 67px; WIDTH: 133px; POSITION: absolute; TOP: 409px; HEIGHT: 24px">
<div id="Label1" style=" font-family: Courier New; font-size: 14px;  height:24px;width:133px;"   >Tipo de Acordo:</div>
</div>
<div id="Label3_outer" style="Z-INDEX: 15; LEFT: 198px; WIDTH: 440px; POSITION: absolute; TOP: 409px; HEIGHT: 24px">
<div id="Label3" style=" font-family: Arial; font-size: 14px;  height:24px;width:440px;"   ><STRONG><?=$Edit7;?></STRONG></div>
</div>
<div id="Label32_outer" style="Z-INDEX: 16; LEFT: 67px; WIDTH: 269px; POSITION: absolute; TOP: 441px; HEIGHT: 24px">
<div id="Label32" style=" font-family: Courier New; font-size: 14px;  height:24px;width:269px;"   >Responsavel&nbsp; pelo Condominio:</div>
</div>
<div id="Label58_outer" style="Z-INDEX: 17; LEFT: 320px; WIDTH: 302px; POSITION: absolute; TOP: 441px; HEIGHT: 24px">
<div id="Label58" style=" font-family: Arial; font-size: 14px;  height:24px;width:302px;"   ><STRONG><?=$Edit8;?></STRONG></div>
</div>
<div id="Label59_outer" style="Z-INDEX: 18; LEFT: 67px; WIDTH: 477px; POSITION: absolute; TOP: 473px; HEIGHT: 24px">
<div id="Label59" style=" font-family: Courier New; font-size: 14px;  height:24px;width:477px;"   >Hora de Chegada: _______________________________</div>
</div>
<div id="Label8_outer" style="Z-INDEX: 19; LEFT: 97px; WIDTH: 565px; POSITION: absolute; TOP: 545px; HEIGHT: 343px">
<div id="Label8" style=" font-family: Courier New; font-size: 14px;  height:343px;width:565px;"   >Observações: ______________________________________________________
___________________________________________________________________
___________________________________________________________________
___________________________________________________________________
___________________________________________________________________
___________________________________________________________________
___________________________________________________________________
___________________________________________________________________
___________________________________________________________________</div>
</div>
<div id="Label9_outer" style="Z-INDEX: 20; LEFT: 95px; WIDTH: 568px; POSITION: absolute; TOP: 921px; HEIGHT: 55px">
<div id="Label9" style=" font-family: Courier New; font-size: 14px;  height:55px;width:568px;"   >_____________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ___________________________<BR>&nbsp;&nbsp;&nbsp; Responsavel Sindicato&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; Visto Funcionario</div>
</div>
</td></tr></table>
</form></body>
</html>
</div>

<script Language="JavaScript">
window.print();
</script>

<script language="JavaScript"> 
<!--
window.opener = window;
window.close();
-->
 </script>

<script language="javascript">
setTimeout("fechar()",100);
</script>

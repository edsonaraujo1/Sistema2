<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Listagem na Tela por Codigo
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 02/07/2008 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

include("../config.php");

// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);
$Edif = $_SESSION['lista_soc'];

$Cod_2=  $Edif;

include("../logar.php");
$nome3 = $_SESSION["nome_log"];

include("menu.php");

include("funcoes2.php");

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

// retorna uma pesquisa

$consulta  = "SELECT * FROM vaga WHERE COD = '$Cod_2'";

$resultado = @mysql_query($consulta);

$row = @mysql_fetch_array($resultado);

$Edit1  = @$row["COD"];
$Edit2  = @$row["SITU"];
$Edit3  = @$row["DATA"];
$Edit4  = @$row["FUNCAO"];
$Edit5  = @$row["QTD"];
$Edit6  = @$row["ENCA"];
$Edit7  = @$row["NOME"];
$Edit8  = @$row["ENDERECO"];
$Edit9  = @$row["BAIRRO"];
$Edit10 = @$row["CIDADE"];
$Edit11 = @$row["ESTADO"]; 
$Edit12 = @$row["CEP"];
$Edit13 = @$row["TELEFONE"];
$Edit14 = @$row["CONTATO"];
$Edit15 = @$row["OBS"];
$Edit16 = @$row["IDADE"];

$menssagem = "* * * Imprimir * * *";


			// Atualiza arquivo Log
			$data_log = date("d/m/Y");
			$hora_log = date("H:i:s"); 
			$even_log = $menssagem."/".$Edit1;
			
			$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
			             VALUES
			             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
			
			@mysql_query($consulta_log, $link);

// MM_openBrWindow('janela.html','locador','width=730,height=585,top=10, left=30')">

?>

<script language="JavaScript">
<!-- Begin
nextfield = "Edit4";
netscape = "";
ver = navigator.appVersion; len = ver.length;
function keyDown(DnEvents) {
k = (netscape) ? DnEvents.which : window.event.keyCode;
if (k == 13) {
if (nextfield == '') {
return false;
} else {
eval('document.Form1.' + nextfield + '.focus()');
return false;}}}
document.onkeydown = keyDown;
if (netscape) document.captureEvents(Event.KEYDOWN|Event.KEYUP);
// End -->

function txtBoxFormat(objForm, strField, sMask, evtKeyPress) {
var i, nCount, sValue, fldLen, mskLen,bolMask, sCod, nTecla;

     if(document.all) { nTecla = evtKeyPress.keyCode; }
else if(document.getElementById) { nTecla = evtKeyPress.which; }

sValue = objForm[strField].value;
sValue = sValue.toString().replace( "-", "" );
sValue = sValue.toString().replace( "-", "" );
sValue = sValue.toString().replace( ".", "" );
sValue = sValue.toString().replace( ".", "" );
sValue = sValue.toString().replace( "/", "" );
sValue = sValue.toString().replace( "/", "" );
sValue = sValue.toString().replace( "(", "" );
sValue = sValue.toString().replace( "(", "" );
sValue = sValue.toString().replace( ")", "" );
sValue = sValue.toString().replace( ")", "" );
sValue = sValue.toString().replace( " ", "" );
sValue = sValue.toString().replace( " ", "" );
fldLen = sValue.length;
mskLen = sMask.length;
i = 0;
nCount = 0;
sCod = "";
mskLen = fldLen;
while (i <= mskLen) {
bolMask = ((sMask.charAt(i) == "-") || (sMask.charAt(i) == ".") || (sMask.charAt(i) == "/"))
bolMask = bolMask || ((sMask.charAt(i) == "(") || (sMask.charAt(i) == ")") || (sMask.charAt(i) == " "))
if (bolMask) {
sCod += sMask.charAt(i);
mskLen++; }
else {
sCod += sValue.charAt(nCount);
nCount++;
}
i++;
}
objForm[strField].value = sCod;
if (nTecla != 8) { 
if (sMask.charAt(i-1) == "9") { 
return ((nTecla > 47) && (nTecla < 58)); } 
else { 
return true;
} }
else {
return true;
}
}
// Fim
</script>


<script language="JavaScript"><!--

//document.onkeydown = keyCatcher;

function keyCatcher() 
{
   var e = event.srcElement.tagName;

   if (event.keyCode == 8 && e != "INPUT" && e != "TEXTAREA") 
   {
      event.cancelBubble = true;
      event.returnValue = false;
   }
   
   if (event.keyCode == 27) 
   {
		window.location="cadastro.php?cod_5=<?=$Edit1;?>";
   }
   
}
//-->
</script>

<html>
<head>
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
</head>

<style>

.normal {
	
	background-color: white;
}
.anormal {
		background-color: Lavender;
}

</style>

<div style="Z-INDEX: 500; LEFT: 00px; WIDTH: 616px; POSITION: absolute; TOP: 157px; HEIGHT: 19px">

<IFRAME src="../info/informes2.php" width="1" height="1" scrolling="no" frameborder="0" align="left"></IFRAME>

</div>

<br/>
<br/>

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; " onkeydown="javascript:if (event.KeyCode==13) event.KeyCode=9; javascript:document.onkeydown = keyCatcher();" onload="document.form1.Edit3.focus();" >
<form style="margin-bottom: 0" id="form1" name="form1" method="POST"  action="fichavagas.php?Cod_2=<?=$Edit1;?>" target="new">
<table  width="10"   style="height:10px"  border="0" cellpadding="0" cellspacing="0"   align="Center" ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 153px; WIDTH: 724px; POSITION: absolute; TOP: 44px; HEIGHT: 269px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(16, 16, 692 - 16, 237 - 16);
  Shape1_Canvas.fillRect(16, 16, 692 - 16 + 1, 237 - 16 + 1);
  Shape1_Canvas.setStroke(16);
  Shape1_Canvas.setColor("<?=$color_bor;?>");
  Shape1_Canvas.drawRect(16, 16, 692 - 16 + 1, 237 - 16 + 1);
  Shape1_Canvas.paint();
</script>

</div>
<div id="Shape2_outer" style="Z-INDEX: 1; LEFT: 186px; WIDTH: 658px; POSITION: absolute; TOP: 77px; HEIGHT: 55px">
<script type="text/javascript">
  var Shape2_Canvas = new jsGraphics("Shape2_outer");
  Shape2_Canvas.setColor("#FFFFFF");
  Shape2_Canvas.fillRect(1, 1, 656 - 1, 53 - 1);
  Shape2_Canvas.fillRect(1, 1, 656 - 1 + 1, 53 - 1 + 1);
  Shape2_Canvas.setStroke(1);
  Shape2_Canvas.setColor("<?=$color_bor;?>");
  Shape2_Canvas.drawRect(1, 1, 656 - 1 + 1, 53 - 1 + 1);
  Shape2_Canvas.paint();
</script>

</div>
<div id="Label1_outer" style="Z-INDEX: 2; LEFT: 195px; WIDTH: 449px; POSITION: absolute; TOP: 90px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: #5A9CB1; background-color: #FFFFFF;height:32px;width:449px;"   ><STRONG>Ficha Encaminhamento</STRONG>&nbsp;</div>
</div>
<div id="Menssage_outer" style="Z-INDEX: 3; LEFT: 626px; WIDTH: 208px; POSITION: absolute; TOP: 95px; HEIGHT: 24px">
<div id="Menssage" style=" font-family: Verdana; font-size: 14px;  height:24px;width:208px;"  align="Center"   ><STRONG><?=$menssagens;?></STRONG></div>
</div>
<div id="Shape3_outer" style="Z-INDEX: 4; LEFT: 186px; WIDTH: 658px; POSITION: absolute; TOP: 133px; HEIGHT: 147px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 656 - 1, 145 - 1);
  Shape3_Canvas.fillRect(1, 1, 656 - 1 + 1, 145 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("<?=$color_bor;?>");
  Shape3_Canvas.drawRect(1, 1, 656 - 1 + 1, 145 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 5; LEFT: 199px; WIDTH: 87px; POSITION: absolute; TOP: 147px; HEIGHT: 26px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:87px;"   ><STRONG>Matricula.:</STRONG></div>
</div>
<div id="Edit1_outer" style="Z-INDEX: 6; LEFT: 340px; WIDTH: 78px; POSITION: absolute; TOP: 143px; HEIGHT: 26px">
<input type="text" id="Edit1" name="Edit1" value="" style=" font-family: Verdana; font-size: 14px;  height:25px;width:78px;" style="text-transform: uppercase;" onfocus="this.className='anormal'; nextfield ='Edit3';" onblur="this.className='normal'"   tabindex="0"    />
</div>
<div id="Label11_outer" style="Z-INDEX: 8; LEFT: 199px; WIDTH: 89px; POSITION: absolute; TOP: 173px; HEIGHT: 24px">
<div id="Label11" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:89px;"   ><STRONG>CPF/RG.:</STRONG>&nbsp;</div>
</div>
<div id="Label12_outer" style="Z-INDEX: 9; LEFT: 199px; WIDTH: 103px; POSITION: absolute; TOP: 198px; HEIGHT: 26px">
<div id="Label12" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:103px;"   ><STRONG>Curso S/N..:</STRONG>&nbsp;</div>
</div>
<div id="Edit4_outer" style="Z-INDEX: 10; LEFT: 340px; WIDTH: 38px; POSITION: absolute; TOP: 192px; HEIGHT: 26px">
<input type="text" id="Edit4" name="Edit4" value="" style=" font-family: Verdana; font-size: 14px;  height:25px;width:38px;"  style="text-transform: uppercase;" onfocus="this.className='anormal'; nextfield ='Edit5';" onblur="this.className='normal'"   tabindex="2"    />
</div>
<div id="Label13_outer" style="Z-INDEX: 11; LEFT: 199px; WIDTH: 159px; POSITION: absolute; TOP: 224px; HEIGHT: 26px">
<div id="Label13" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:159px;"   ><STRONG>Nome Candidato.:</STRONG></div>
</div>
<div id="Edit5_outer" style="Z-INDEX: 12; LEFT: 340px; WIDTH: 466px; POSITION: absolute; TOP: 216px; HEIGHT: 26px">
<input type="text" id="Edit5" name="Edit5" value="" style=" font-family: Verdana; font-size: 14px;  height:25px;width:466px;"  style="text-transform: uppercase;" onfocus="this.className='anormal'; nextfield ='done';" onblur="this.className='normal'"  tabindex="4"    />
</div>
<div id="Edit3_outer" style="Z-INDEX: 13; LEFT: 340px; WIDTH: 193px; POSITION: absolute; TOP: 167px; HEIGHT: 26px">
<input type="text" id="Edit3" name="Edit3" value="" style=" font-family: Verdana; font-size: 14px;  height:25px;width:193px;"  style="text-transform: uppercase;" onfocus="this.className='anormal'; nextfield ='Edit4';" onblur="this.className='normal'"   tabindex="1"    />
</div>
</td></tr></table>
</body>
</html>

<div style="Z-INDEX: 34; LEFT: 200px; WIDTH: 544px; POSITION: absolute; TOP: 249px; HEIGHT: 80px">

<table border='0' aling=center>
          <td> </td>

          <td><input type=image name="guias" src="../imagens/botaoazul23.PNG"></td>

         </form>
         </body>

          <form method="POST" action="cadastro.php?cod_5=<?=$Edit1;?>">
          <td><input type=image name="socios" src="../imagens/botaoazul9.PNG"></td>
          </form>

</table>
</div>

<script language=javascript> 

function janelaSecundaria (URL){ 
   window.open(URL,"janela1","width=120,height=30,resizable=NO,status=NO,Scrollbars=NO,location=NO,menubar=NO,toolbar=NO"); 
} 

</script> 

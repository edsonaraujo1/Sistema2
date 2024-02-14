<?
/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Etiquetas de Empresas/Adms/Socios/Fenatec
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------
*/
include("../config.php");

include_once("../logar.php");

include_once("menu.php");

$nome3 = $_SESSION["nome_log"];

include("vaurls.php");

$deixar = acesso_url("FORM_ETIQUE");

if ($deixar == "SIM"){

// Resgata Sessao
session_name("Val_Etq_Edif");
session_start();

$Edit1  = $_SESSION['Edit1'];
$Edit2  = $_SESSION['Edit2'];
$Edit3  = $_SESSION['Edit3']; 
$Edit4  = $_SESSION['Edit4'];
$Edit5  = $_SESSION['Edit5'];
$Edit6  = $_SESSION['Edit6'];
$Edit7  = $_SESSION['Edit7'];
$receber  = $_SESSION['Edit8'];


Switch ($receber){

	Case 1: 

          ?>
          <div style="Z-INDEX: 34; LEFT: 240px; WIDTH: 544px; POSITION: absolute; TOP: 137px; HEIGHT: 80px">
          <table border='0' aling=center>
          <td>
          <input type='radio' Name='recerber'  Value='1' checked onchange="Salva_Etq_edif8(this)" onFocus="nextfield ='Edit1';"><b>Empresas</b>
          <input type='radio' Name='recerber'  Value='2'         onchange="Salva_Etq_edif8(this)" onFocus="nextfield ='Edit1';"><b>Socios</b>
          <input type='radio' Name='recerber'  Value='3'         onchange="Salva_Etq_edif8(this)" onFocus="nextfield ='Edit1';"><b>Contabilidade</b>
          <input type='radio' Name='recerber'  Value='4'         onchange="Salva_Etq_edif8(this)" onFocus="nextfield ='Edit1';"><b>Federação</b> 
          <input type='radio' Name='recerber'  Value='5'         onchange="Salva_Etq_edif8(this)" onFocus="nextfield ='Edit1';"><b>Outros</b>&nbsp;&nbsp;&nbsp;&nbsp; 
          </table>
          </div>          
          <?
          break;

	Case 2: 

          ?>
          <div style="Z-INDEX: 34; LEFT: 240px; WIDTH: 544px; POSITION: absolute; TOP: 137px; HEIGHT: 80px">
          <table border='0' aling=center>
          <td>
          <input type='radio' Name='recerber'  Value='1'         onchange="Salva_Etq_edif8(this)" onFocus="nextfield ='Edit1';"><b>Empresas</b>
          <input type='radio' Name='recerber'  Value='2' checked onchange="Salva_Etq_edif8(this)" onFocus="nextfield ='Edit1';"><b>Socios</b>
          <input type='radio' Name='recerber'  Value='3'         onchange="Salva_Etq_edif8(this)" onFocus="nextfield ='Edit1';"><b>Contabilidade</b>
          <input type='radio' Name='recerber'  Value='4'         onchange="Salva_Etq_edif8(this)" onFocus="nextfield ='Edit1';"><b>Federação</b> 
          <input type='radio' Name='recerber'  Value='5'         onchange="Salva_Etq_edif8(this)" onFocus="nextfield ='Edit1';"><b>Outros</b>&nbsp;&nbsp;&nbsp;&nbsp; 
          </table>
          </div>          
          <?
          break;

	Case 3: 

          ?>
          <div style="Z-INDEX: 34; LEFT: 240px; WIDTH: 544px; POSITION: absolute; TOP: 137px; HEIGHT: 80px">
          <table border='0' aling=center>
          <td>
          <input type='radio' Name='recerber'  Value='1'         onchange="Salva_Etq_edif8(this)" onFocus="nextfield ='Edit1';"><b>Empresas</b>
          <input type='radio' Name='recerber'  Value='2'         onchange="Salva_Etq_edif8(this)" onFocus="nextfield ='Edit1';"><b>Socios</b>
          <input type='radio' Name='recerber'  Value='3' checked onchange="Salva_Etq_edif8(this)" onFocus="nextfield ='Edit1';"><b>Contabilidade</b>
          <input type='radio' Name='recerber'  Value='4'         onchange="Salva_Etq_edif8(this)" onFocus="nextfield ='Edit1';"><b>Federação</b> 
          <input type='radio' Name='recerber'  Value='5'         onchange="Salva_Etq_edif8(this)" onFocus="nextfield ='Edit1';"><b>Outros</b>&nbsp;&nbsp;&nbsp;&nbsp; 
          </table>
          </div>          
          <?
          break;

	Case 4: 

          ?>
          <div style="Z-INDEX: 34; LEFT: 240px; WIDTH: 544px; POSITION: absolute; TOP: 137px; HEIGHT: 80px">
          <table border='0' aling=center>
          <td>
          <input type='radio' Name='recerber'  Value='1'         onchange="Salva_Etq_edif8(this)" onFocus="nextfield ='Edit1';"><b>Empresas</b>
          <input type='radio' Name='recerber'  Value='2'         onchange="Salva_Etq_edif8(this)" onFocus="nextfield ='Edit1';"><b>Socios</b>
          <input type='radio' Name='recerber'  Value='3'         onchange="Salva_Etq_edif8(this)" onFocus="nextfield ='Edit1';"><b>Contabilidade</b>
          <input type='radio' Name='recerber'  Value='4' checked onchange="Salva_Etq_edif8(this)" onFocus="nextfield ='Edit1';"><b>Federação</b> 
          <input type='radio' Name='recerber'  Value='5'         onchange="Salva_Etq_edif8(this)" onFocus="nextfield ='Edit1';"><b>Outros</b>&nbsp;&nbsp;&nbsp;&nbsp; 
          </table>
          </div>          
          <?
          break;

	Case 5: 

          ?>
          <div style="Z-INDEX: 34; LEFT: 240px; WIDTH: 544px; POSITION: absolute; TOP: 137px; HEIGHT: 80px">
          <table border='0' aling=center>
          <td>
          <input type='radio' Name='recerber'  Value='1'         onchange="Salva_Etq_edif8(this)" onFocus="nextfield ='Edit1';"><b>Empresas</b>
          <input type='radio' Name='recerber'  Value='2'         onchange="Salva_Etq_edif8(this)" onFocus="nextfield ='Edit1';"><b>Socios</b>
          <input type='radio' Name='recerber'  Value='3'         onchange="Salva_Etq_edif8(this)" onFocus="nextfield ='Edit1';"><b>Contabilidade</b>
          <input type='radio' Name='recerber'  Value='4'         onchange="Salva_Etq_edif8(this)" onFocus="nextfield ='Edit1';"><b>Federação</b> 
          <input type='radio' Name='recerber'  Value='5' checked onchange="Salva_Etq_edif8(this)" onFocus="nextfield ='Edit1';"><b>Outros</b>&nbsp;&nbsp;&nbsp;&nbsp; 
          </table>
          </div>          
          <?
          break;

     Default:

          ?>
          <div style="Z-INDEX: 34; LEFT: 240px; WIDTH: 544px; POSITION: absolute; TOP: 137px; HEIGHT: 80px">
          <table border='0' aling=center>
          <td> 
          <input type='radio' Name='recerber'  Value='1' onchange="Salva_Etq_edif8(this)" onFocus="nextfield ='Edit1';"><b>Empresas</b>
          <input type='radio' Name='recerber'  Value='2' onchange="Salva_Etq_edif8(this)" onFocus="nextfield ='Edit1';"><b>Socios</b>
          <input type='radio' Name='recerber'  Value='3' onchange="Salva_Etq_edif8(this)" onFocus="nextfield ='Edit1';"><b>Contabilidade</b>
          <input type='radio' Name='recerber'  Value='4' onchange="Salva_Etq_edif8(this)" onFocus="nextfield ='Edit1';"><b>Federação</b>
          <input type='radio' Name='recerber'  Value='5' onchange="Salva_Etq_edif8(this)" onFocus="nextfield ='Edit1';"><b>Outros</b>&nbsp;&nbsp;&nbsp;&nbsp; 
		  </table>
		  </div>
          <?

}

// Conta quantas guias vao ser impressas

include("funcoes2.php");


        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit1").focus();	
		}
		</script>
<?

if (!empty($Edit1)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit2").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit2)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit3").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit3)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit4").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit4)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit5").focus();	
		}
		
		</script>
		<?
}
?>

<html>
<script LANGUAGE="JavaScript">
<!-- Begin
nextfield = "Edit2";
netscape  = "";
ver = navigator.appVersion; len = ver.length;

function keyDown(DnEvents) {
k = (netscape) ? DnEvents.which : window.event.keyCode;
if (k == 13) {
if (nextfield == 'done') {
return false;
} else {
eval('document.form1.' + nextfield + '.focus()');
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
// End -->
</script>

<html>
<head>
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<body>


<style type=text/css>

body { background-image: url(<?="../".$logo_sis;?>);
       background-attachment: fixed }

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
-->

</style>	

</html>

</html>

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; " onload="foco();">
<form style="margin-bottom: 0" id="form1" name="form1" method="post"  action="imp_etq_edif.php" target='new' onSubmit="return checa(this);">
<table  width="1000"   style="height:520px"  border="0" cellpadding="0" cellspacing="0"   align="Center" ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 204px; WIDTH: 592px; POSITION: absolute; TOP: 44px; HEIGHT: 397px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(16, 16, 560 - 16, 365 - 16);
  Shape1_Canvas.fillRect(16, 16, 560 - 16 + 1, 365 - 16 + 1);
  Shape1_Canvas.setStroke(16);
  Shape1_Canvas.setColor("<?=$color_bor;?>");
  Shape1_Canvas.drawRect(16, 16, 560 - 16 + 1, 365 - 16 + 1);
  Shape1_Canvas.paint();
</script>

</div>
<div id="Shape2_outer" style="Z-INDEX: 1; LEFT: 237px; WIDTH: 526px; POSITION: absolute; TOP: 77px; HEIGHT: 55px">
<script type="text/javascript">
  var Shape2_Canvas = new jsGraphics("Shape2_outer");
  Shape2_Canvas.setColor("#FFFFFF");
  Shape2_Canvas.fillRect(1, 1, 524 - 1, 53 - 1);
  Shape2_Canvas.fillRect(1, 1, 524 - 1 + 1, 53 - 1 + 1);
  Shape2_Canvas.setStroke(1);
  Shape2_Canvas.setColor("<?=$color_bor;?>");
  Shape2_Canvas.drawRect(1, 1, 524 - 1 + 1, 53 - 1 + 1);
  Shape2_Canvas.paint();
</script>

</div>
<div id="Shape3_outer" style="Z-INDEX: 2; LEFT: 237px; WIDTH: 526px; POSITION: absolute; TOP: 133px; HEIGHT: 275px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 524 - 1, 273 - 1);
  Shape3_Canvas.fillRect(1, 1, 524 - 1 + 1, 273 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("<?=$color_bor;?>");
  Shape3_Canvas.drawRect(1, 1, 524 - 1 + 1, 273 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 3; LEFT: 246px; WIDTH: 169px; POSITION: absolute; TOP: 175px; HEIGHT: 26px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:169px;"   ><STRONG>Consultar por.:</STRONG></div>
</div>
<div id="Label11_outer" style="Z-INDEX: 4; LEFT: 245px; WIDTH: 193px; POSITION: absolute; TOP: 201px; HEIGHT: 26px">
<div id="Label11" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:193px;"   ><STRONG>Iniciar em.:</STRONG>&nbsp;</div>
</div>
<div id="Label15_outer" style="Z-INDEX: 5; LEFT: 248px; WIDTH: 508px; POSITION: absolute; TOP: 286px; HEIGHT: 26px">
<div id="Label15" style=" font-family: Verdana; font-size: 14px; color: #FF0000;font-weight: normal; height:26px;width:508px;"   ><STRONG>Imprimindo Apartir do <?=$Edit2;?></STRONG></div>
</div>
<div id="Label22_outer" style="Z-INDEX: 6; LEFT: 248px; WIDTH: 107px; POSITION: absolute; TOP: 313px; HEIGHT: 26px">
<div id="Label22" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:107px;"   > <STRONG>Empresa Nº</STRONG> </div>
</div>
<div id="Label26_outer" style="Z-INDEX: 7; LEFT: 248px; WIDTH: 139px; POSITION: absolute; TOP: 339px; HEIGHT: 26px">
<div id="Label26" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:139px;"   > <STRONG>Total a Imprimir.:</STRONG> </div>
</div>
<div id="Label4_outer" style="Z-INDEX: 8; LEFT: 345px; WIDTH: 284px; POSITION: absolute; TOP: 314px; HEIGHT: 18px">
<div id="Label4" style=" font-family: Verdana; font-size: 14px; color: #FF0000;font-weight: normal; height:18px;width:284px;"   > <STRONG><?=$Edit2;?></STRONG> </div>
</div>
<div id="Label68_outer" style="Z-INDEX: 9; LEFT: 388px; WIDTH: 196px; POSITION: absolute; TOP: 340px; HEIGHT: 24px">
<div id="Label68" style=" font-family: Verdana; font-size: 14px; color: #FF0000;font-weight: normal; height:24px;width:196px;"   > <STRONG>00</STRONG> </div>
</div>
<div id="Label1_outer" style="Z-INDEX: 10; LEFT: 247px; WIDTH: 370px; POSITION: absolute; TOP: 87px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: <?=$color_bor;?>; background-color: #FFFFFF;height:32px;width:370px;"   > <STRONG>Impressão de Etiquetas</STRONG> </div>
</div>

<div id="Edit1_outer" style="Z-INDEX: 11; LEFT: 415px; WIDTH: 110px; POSITION: absolute; TOP: 173px; HEIGHT: 27px">
<select id="Edit1" name="Edit1" value="<?=$Edit1;?>" style=" font-family: Verdana; font-size: 14px;  height:26px;width:110px; background-color: #FFFFFF;"  onchange="Salva_Etq_edif1(this)" onFocus="nextfield ='Edit2';"  tabindex="0"    >

<?

Switch ($receber){

Case 1: // Empresas

     if (!empty($Edit1))
     {
         ?>	
	        <option value="<?=$Edit1;?>"> <?=$Edit1;?> </option>
            <option value="CODIGO"> CODIGO </option>
            <option value="ATIVIDADE"> ATIVIDADE </option>
            <option value="NOME"> NOME </option>
            <option value="ENDEREÇO"> ENDEREÇO </option>
            <option value="CEP"> CEP </option>
         <?	

     }else{
	
         ?>	
            <option value=" ">  </option>
            <option value="CODIGO"> CODIGO </option>
            <option value="ATIVIDADE"> ATIVIDADE </option>
            <option value="NOME"> NOME </option>
            <option value="ENDEREÇO"> ENDEREÇO </option>
            <option value="CEP"> CEP </option>
         <?            
          }
          break;
          

Case 2: // Socios

     if (!empty($Edit1))
     {
         ?>	
	        <option value="<?=$Edit1;?>"> <?=$Edit1;?> </option>
            <option value="MATRICULA"> MATRICULA </option>
            <option value="RG"> RG </option>
            <option value="CPF"> CPF </option>
            <option value="NOME"> NOME </option>
            <option value="ENDERECO"> ENDERECO </option>
         <?	

     }else{
	
         ?>	
            <option value=" ">  </option>
            <option value="MATRICULA"> MATRICULA </option>
            <option value="RG"> RG </option>
            <option value="CPF"> CPF </option>
            <option value="NOME"> NOME </option>
            <option value="ENDERECO"> ENDERECO </option>
         <?            
          }
          break;

Case 3: // Administradora

     if (!empty($Edit1))
     {
         ?>	
	        <option value="<?=$Edit1;?>"> <?=$Edit1;?> </option>
            <option value="CODIGO"> CODIGO </option>
            <option value="ATIVIDADE"> ATIVIDADE </option>
            <option value="NOME"> NOME </option>
            <option value="ENDEREÇO"> ENDEREÇO </option>
            <option value="CEP"> CEP </option>
         <?	

     }else{
	
         ?>	
            <option value=" ">  </option>
            <option value="CODIGO"> CODIGO </option>
            <option value="ATIVIDADE"> ATIVIDADE </option>
            <option value="NOME"> NOME </option>
            <option value="ENDEREÇO"> ENDEREÇO </option>
            <option value="CEP"> CEP </option>
         <?            
          }
          break;

Case 4: // Fenatec

     if (!empty($Edit1))
     {
         ?>	
	        <option value="<?=$Edit1;?>"> <?=$Edit1;?> </option>
            <option value="CODIGO"> CODIGO </option>
            <option value="NOME"> NOME </option>
            <option value="ENDEREÇO"> ENDEREÇO </option>
            <option value="CEP"> CEP </option>
         <?	

     }else{
	
         ?>	
            <option value=" ">  </option>
            <option value="CODIGO"> CODIGO </option>
            <option value="NOME"> NOME </option>
            <option value="ENDEREÇO"> ENDEREÇO </option>
            <option value="CEP"> CEP </option>
         <?            
          }
          break;

          
Case 5: // Lorival

     if (!empty($Edit1))
     {
         ?>	
	        <option value="<?=$Edit1;?>"> <?=$Edit1;?> </option>
            <option value="CODIGO"> CODIGO </option>
            <option value="NOME"> NOME </option>
            <option value="CEP"> CEP </option>
         <?	

     }else{
	
         ?>	
            <option value=" ">  </option>
            <option value="CODIGO"> CODIGO </option>
            <option value="NOME"> NOME </option>
            <option value="CEP"> CEP </option>
         <?            
          }
          break;
     }    
?>

</select>


</div>
<div id="Edit2_outer" style="Z-INDEX: 12; LEFT: 415px; WIDTH: 340px; POSITION: absolute; TOP: 195px; HEIGHT: 27px">
<input type="text" id="Edit2" name="Edit2" value="<?=$Edit2;?>" style=" font-family: Verdana; font-size: 14px;  height:26px;width:340px; background-color: #FFFFFF;"  onchange="Salva_Etq_edif2(this)" onFocus="nextfield ='Edit3';"  tabindex="0"    />
</div>
<div id="Label3_outer" style="Z-INDEX: 13; LEFT: 245px; WIDTH: 169px; POSITION: absolute; TOP: 227px; HEIGHT: 26px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:169px;"   ><STRONG>Terminar em.:</STRONG></div>
</div>
<div id="Edit3_outer" style="Z-INDEX: 14; LEFT: 415px; WIDTH: 341px; POSITION: absolute; TOP: 221px; HEIGHT: 27px">
<input type="text" id="Edit3" name="Edit3" value="<?=$Edit3;?>" style=" font-family: Verdana; font-size: 14px;  height:26px;width:341px; background-color: #FFFFFF;"  onchange="Salva_Etq_edif3(this)" onFocus="nextfield ='Edit4';"  tabindex="0"    />
</div>
<div id="Label8_outer" style="Z-INDEX: 15; LEFT: 247px; WIDTH: 195px; POSITION: absolute; TOP: 252px; HEIGHT: 26px">
<div id="Label8" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:195px;"   ><STRONG>Condição.:</STRONG>&nbsp;</div>
</div>
<div id="Edit7_outer" style="Z-INDEX: 16; LEFT: 415px; WIDTH: 145px; POSITION: absolute; TOP: 247px; HEIGHT: 27px">
<select id="Edit4" name="Edit4" value="<?=$Edit4;?>" style=" font-family: Verdana; font-size: 14px;  height:26px;width:145px; background-color: #FFFFFF;"  onchange="Salva_Etq_edif4(this)" onFocus="nextfield ='Edit5';"  tabindex="0"    />

<?

if (!empty($Edit4))
{
?>	
	<option value="<?=$Edit4;?>"> <?=$Edit4;?> </option>
            <option value="CONTRIBUINTE"> CONTRIBUINTE     </option>
            <option value="NÃO CONTRIBUINTE"> NÃO CONTRIBUINTE </option>
            <option value="TERCEIRIZADO"> TERCEIRIZADO     </option>
<?	

}else{
	
?>	
            <option value=" ">  </option>
            <option value="CONTRIBUINTE"> CONTRIBUINTE     </option>
            <option value="NÃO CONTRIBUINTE"> NÃO CONTRIBUINTE </option>
            <option value="TERCEIRIZADO"> TERCEIRIZADO     </option>
<?            
 }
?>

</select>

</div>
</td></tr></table>
</form></body>

<div style="Z-INDEX: 34; LEFT: 380px; WIDTH: 544px; POSITION: absolute; TOP: 370px; HEIGHT: 80px">
<table border='0'>
         <td> </td>
         <form method="POST" action="imp_etq_edif.php" target='new'>
         <td><input type=image name="guias" src="../imagens/botaoazul23.PNG"></td>
         </form>

         <form method="POST" action="../avaleht.php?servletjs2=20$$20">
         <td><input type=image name="socios" src="../imagens/botaoazul9.PNG"></td>
         </form>

</table>
</div>

</html>
<script language="javascript">
<!--
 
//-->
</script>

<?
}else{
	
include("enaaurlnp.php");
	
}
?>
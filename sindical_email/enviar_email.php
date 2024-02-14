<?
/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Enviar E-mail Sindical
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 31/03/2009 

 DEUS SEJA LOUVADO
 ------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");

include("menu.php");

$nome3 = $_SESSION["nome_log"];

$mensagem = "  ";

include("funcoes2.php");


// salva Secao
session_start();
$Edit2_y = $_SESSION['Codigo_ed'];
$texto_3 = $_SESSION['Nome_ed'];


// Resgata Sessao
session_name("Val_Email");
session_start();

$Edit1   = $_SESSION['Edit1e'];
$Edit2   = $_SESSION['Edit2e'];
$Edit3   = $_SESSION['Edit3e']; 
$Edit4   = $_SESSION['Edit4e'];
$Edit5   = $_SESSION['Edit5e'];
$Edit6   = $_SESSION['Edit6e'];
$Edit7   = $_SESSION['Edit7e'];
$Edit8   = $_SESSION['Edit8e'];
$Edit9   = $_SESSION['Edit9e'];
$Edit10  = $_SESSION['Edit10e'];
$Edit11  = $_SESSION['Edit11e'];
$Edit12  = $_SESSION['Edit12e'];
$Edit13  = $_SESSION['Edit13e'];
$Edit14  = $_SESSION['Edit14e'];
$Edit15  = $_SESSION['Edit15e'];

//echo $Edit5;
//echo $Edit2;

if (empty($Edit2))
{
	$Edit2 = $Edit2_y;
}

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

if ($Edit1 == "EDIFICIOS")
{

   $consultaxx  = "SELECT * FROM edificios WHERE COD = '$Edit2'";
     
   $resultadoxx = @mysql_query($consultaxx);

   $rowxx = @mysql_fetch_array($resultadoxx);

   $id       = @$rowxx["id"];
   $cod_ED   = @$rowxx["COD"];
   $texto_1  = trim(@$rowxx["COND"].@$rowxx["NOME"]);
   $cnpj     = @$rowxx["CGC"];
	
}else{
	
   $consultaxx  = "SELECT * FROM adms WHERE cod = '$Edit2'";
	
   $resultadoxx = @mysql_query($consultaxx);

   $rowxx = @mysql_fetch_array($resultadoxx);

   $id_adms   = @$rowxx["id"];
   $cod_adms  = @$rowxx["cod"];
   $texto_1   = @$rowxx["nomeadm"];
   $cnpj_adms = @$rowxx["cgc"];

}

?>
<html>
<head>
<title><?=$Titulo;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
</head>

<style type=text/css>

body { background-image: url(<?="../".$logo_sis;?>);}

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
--></style> 

<?
include("help.php");
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

<script language="JavaScript">
<!-- Begin
nextfield = "Edit2";
netscape = "";
ver = navigator.appVersion; len = ver.length;
function keyDown(DnEvents) {
k = (netscape) ? DnEvents.which : window.event.keyCode;
if (k == 13) {
if (nextfield == 'done') {
return false;
} else {
eval('document.Unit5.' + nextfield + '.focus()');
return false;}}}
document.onkeydown = keyDown;
if (netscape) document.captureEvents(Event.KEYDOWN|Event.KEYUP);
// End -->

function txtBoxFormat(objForm, strField, sMask, evtKeyPress) {
var i, nCount, sValue, fldLen, mskLen,bolMask, sCod, nTecla;
if(document.all) { 
nTecla = evtKeyPress.keyCode; }
else if(document.layers) { 
nTecla = evtKeyPress.which;}
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

<script language="JavaScript">
var copytoclip=1
function HighlightAll(theField) {
var tempval=eval("document."+theField)
tempval.focus()
tempval.select()
 if (document.all&&copytoclip==1){
  therange=tempval.createTextRange()
  therange.execCommand("Copy")
  window.status="Conteúdo selecionado e copiado para a área de transferência!"
  setTimeout("window.status=''",2400);
  }
}

function highlight(field) {
       field.focus();
       field.select();
}

function goToURL() { window.location = "javascript:HighlightAll('forms[0].Edit1')"; }
</script>

<script LANGUAGE="JavaScript">
<!-- Begin
nextfield = "Edit1";
netscape = "";
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
</script>




<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; " onload="foco();" >
<form style="margin-bottom: 0" id="Unit5" name="Unit5" method="post"  action="exemplos.php">
<table  width="824"   style="height:456px"  border="0" cellpadding="0" cellspacing="0"  ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 264px; WIDTH: 488px; POSITION: absolute; TOP: 80px; HEIGHT: 352px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(15, 15, 458 - 15, 322 - 15);
  Shape1_Canvas.fillRect(15, 15, 458 - 15 + 1, 322 - 15 + 1);
  Shape1_Canvas.setStroke(15);
  Shape1_Canvas.setColor("#5a9cb1");
  Shape1_Canvas.drawRect(15, 15, 458 - 15 + 1, 322 - 15 + 1);
  Shape1_Canvas.paint();
</script>

</div>
<div id="Shape2_outer" style="Z-INDEX: 1; LEFT: 296px; WIDTH: 424px; POSITION: absolute; TOP: 112px; HEIGHT: 48px">
<script type="text/javascript">
  var Shape2_Canvas = new jsGraphics("Shape2_outer");
  Shape2_Canvas.setColor("#FFFFFF");
  Shape2_Canvas.fillRect(1, 1, 422 - 1, 46 - 1);
  Shape2_Canvas.fillRect(1, 1, 422 - 1 + 1, 46 - 1 + 1);
  Shape2_Canvas.setStroke(1);
  Shape2_Canvas.setColor("#5a9cb1");
  Shape2_Canvas.drawRect(1, 1, 422 - 1 + 1, 46 - 1 + 1);
  Shape2_Canvas.paint();
</script>

</div>
<div id="Label1_outer" style="Z-INDEX: 2; LEFT: 313px; WIDTH: 295px; POSITION: absolute; TOP: 119px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: #5a9cb1; height:32px;width:295px;"   >  <STRONG>Enviar Guias E-mail</STRONG>  </div>
</div>
<div id="Shape3_outer" style="Z-INDEX: 3; LEFT: 296px; WIDTH: 424px; POSITION: absolute; TOP: 162px; HEIGHT: 238px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 422 - 1, 236 - 1);
  Shape3_Canvas.fillRect(1, 1, 422 - 1 + 1, 236 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("#5a9cb1");
  Shape3_Canvas.drawRect(1, 1, 422 - 1 + 1, 236 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 4; LEFT: 318px; WIDTH: 198px; POSITION: absolute; TOP: 204px; HEIGHT: 24px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px;  height:24px;width:198px;"   >  <STRONG>Entre com o Codigo.:</STRONG>  </div>
</div>
<div id="Edit1_outer" style="Z-INDEX: 5; LEFT: 518px; WIDTH: 180px; POSITION: absolute; TOP: 177px; HEIGHT: 26px">
<select type="text" id="Edit1" name="Edit1" value="<?=$Edit1;?>" onchange="Salva_email_1(this)" style=" font-family: Verdana; font-size: 16px;  height:25px;width:180px;"    tabindex="0"    />

<?

if (!empty($Edit1))
{
?>	
	<option value="<?=$Edit1;?>"> <?=$Edit1;?> </option>
            <option value="EDIFICIOS">      EDIFICIOS   </option>
            <option value="ADMINISTRADORA"> ADMINISTRADORA </option>
<?	

}else{
	
?>	
            <option value=" ">  </option>
            <option value="EDIFICIOS">      EDIFICIOS   </option>
            <option value="ADMINISTRADORA"> ADMINISTRADORA </option>
<?            
 }
?>

</select>
</div>

<div id="Edit2_outer" style="Z-INDEX: 8; LEFT: 518px; WIDTH: 81px; POSITION: absolute; TOP: 201px; HEIGHT: 26px">
<input type="text" id="Edit2" name="Edit2" value="<?=$Edit2;?>" onchange="Salva_email_2(this)" onclick="document.execCommand('Refresh');"  style=" font-family: Verdana; font-size: 14px;  height:25px;width:81px;"    tabindex="0"    />
</div>

<div id="Label4_outer" style="Z-INDEX: 9; LEFT: 317px; WIDTH: 199px; POSITION: absolute; TOP: 231px; HEIGHT: 24px">
<div id="Label4" style=" font-family: Verdana; font-size: 14px;  height:24px;width:199px;"   >  <STRONG>Usar e-mail do Cadastro?</STRONG>  </div>
</div>
<div id="Edit3_outer" style="Z-INDEX: 10; LEFT: 518px; WIDTH: 65px; POSITION: absolute; TOP: 229px; HEIGHT: 26px">
<select type="text" id="Edit3" name="Edit3" value="<?=$Edit3;?>" onchange="Salva_email_3(this)" style=" font-family: Verdana; font-size: 16px;  height:25px;width:65px;"    tabindex="0"    />

<?

if (!empty($Edit3))
{
?>	
	<option value="<?=$Edit3;?>"> <?=$Edit3;?> </option>
            <option value="SIM"> SIM  </option>
            <option value="NAO"> NAO  </option>
<?	

}else{
	
?>	
            <option value=" ">  </option>
            <option value="SIM"> SIM  </option>
            <option value="NAO"> NAO  </option>
<?            
 }
?>

</select>

</div>
<div id="Edit4_outer" style="Z-INDEX: 11; LEFT: 314px; WIDTH: 384px; POSITION: absolute; TOP: 273px; HEIGHT: 26px">
<input type="text" id="Edit4" name="Edit4" value="<?=$Edit4;?>"  onchange="Salva_email_4(this)" style=" font-family: Verdana; font-size: 14px;  height:25px;width:384px;"    tabindex="0"    />
</div>
<div id="Label3_outer" style="Z-INDEX: 12; LEFT: 318px; WIDTH: 194px; POSITION: absolute; TOP: 178px; HEIGHT: 24px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px;  height:24px;width:194px;"   >  <STRONG>Enviar e-mail Para.:</STRONG>  </div>
</div>
<div id="Label5_outer" style="Z-INDEX: 13; LEFT: 319px; WIDTH: 199px; POSITION: absolute; TOP: 254px; HEIGHT: 18px">
<div id="Label5" style=" font-family: Verdana; font-size: 14px;  height:18px;width:199px;"   >  <STRONG>e-mail</STRONG>  </div>
</div>
<div id="Label6_outer" style="Z-INDEX: 14; LEFT: 606px; WIDTH: 70px; POSITION: absolute; TOP: 134px; HEIGHT: 20px">
<div id="Label6" style=" font-family: Verdana; font-size: 14px; font-weight: bold;font-style: normal; height:20px;width:70px;"   >  Sindical  </div>
</div>

<?

if ($Edit1 == "EDIFICIOS")
{
?>

<div id="Image1_outer" style="Z-INDEX: 15; LEFT: 602px; WIDTH: 17px; POSITION: absolute; TOP: 205px; HEIGHT: 18px">
<div id="Image1_container" style=" width: 17;  height: 18; overflow: hidden;" ><a href="javascript:janelaSecundaria4('edifconsulta.php')"><img id="Image1" src="../imagens/lupa.PNG"  width="17"  height="18"  border="0"       /></a></div>
</div>

<?
}else{
?>

<div id="Image1_outer" style="Z-INDEX: 15; LEFT: 602px; WIDTH: 17px; POSITION: absolute; TOP: 205px; HEIGHT: 18px">
<div id="Image1_container" style=" width: 17;  height: 18; overflow: hidden;" ><a href="javascript:janelaSecundaria4('admsconsulta.php')"><img id="Image1" src="../imagens/lupa.PNG"  width="17"  height="18"  border="0"       /></a></div>
</div>

<?
}
?>
<div id="Label7_outer" style="Z-INDEX: 16; LEFT: 319px; WIDTH: 105px; POSITION: absolute; TOP: 303px; HEIGHT: 24px">
<div id="Label7" style=" font-family: Verdana; font-size: 14px;  height:24px;width:105px;"   >  <STRONG>Enviar para.:</STRONG>  </div>
</div>
<div id="Label8_outer" style="Z-INDEX: 17; LEFT: 422px; WIDTH: 274px; POSITION: absolute; TOP: 306px; HEIGHT: 56px">
<div id="Label8" style=" font-family: Verdana; font-size: 12px; color: #FF0000; height:56px;width:274px;"   >  <STRONG><?=$texto_1;?></STRONG>  </div>
</div>
</td></tr></table>

<div id="Image3_outer" style="Z-INDEX: 7; LEFT: 409px; WIDTH: 92px; POSITION: absolute; TOP: 364px; HEIGHT: 22px">


          <input type=image name="guias" src="../imagens/botaoazul_enviar.PNG">

</div>

</form></body>


<div id="Image2_outer" style="Z-INDEX: 6; LEFT: 509px; WIDTH: 92px; POSITION: absolute; TOP: 364px; HEIGHT: 22px">
<div id="Image2_container" style=" width: 92;  height: 22; overflow: hidden;" ><a href='<?="../avaleht.php?servletjs2=20$$20";?>'><img id="Image2" src="../imagens/botaoazul33.PNG"  width="92"  height="22"  border="0"       /></a></div>
</div>

<?

Function retirar_ponto($var){

$var = str_replace(".",             "",$var);

return($var);
}

?>
<script>
function janelaSecundaria3 (URL){ 
   window.open(URL,"janela3","width=670,height=730,resizable=NO,status=NO,Scrollbars=NO,location=NO,menubar=NO,toolbar=NO"); 
} 

function janelaSecundaria4 (URL){ 
   window.open(URL,"janela2","width=690,height=235,resizable=NO,status=NO,Scrollbars=NO,location=NO,menubar=NO,toolbar=NO");
} 

</script>

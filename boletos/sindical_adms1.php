<?
/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Operador Aplicativos
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------
*/

include("../logar.php");

include("menu.php");

$nome3 = $_SESSION["nome_log"];

include_once('../sql_injection.php');

include("vaurls.php");

$deixar = acesso_url("GUIAS_SIND");

if ($deixar == "SIM"){

// Resgata Sessao
session_name("Val_Sind");
@session_start();

$Edit1   = addslashes($_SESSION['Edit1']);
$Edit2   = addslashes($_SESSION['Edit2']);
$Edit3   = addslashes($_SESSION['Edit3']); 
$Edit4   = addslashes($_SESSION['Edit4']);
$Edit5   = addslashes($_SESSION['Edit5']);
$nurecno = addslashes($_SESSION['nurecno']);

if (!empty($Edit3)){
	
}else{
	
    $Edit3 = 0;
}

if (!empty($Edit4)){
	
}else{
	
    $Edit4 = 0;
}
	

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

// Abrir tabela Administradora

$consulta2 = "SELECT * FROM Adms Where cod = '". anti_sql_injection($Edit3) ."'";

$resultado2 = @mysql_query($consulta2);

$row2 = @mysql_fetch_array($resultado2);

$cod_adm      = @$row2["cod"];
$nome_adm     = substr(@$row2["nomeadm"],0,38);

// Conta quantas guias vao ser impressas

include("../funcoes2.php");


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
if (!empty($Edit5)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("done").focus();	
		}
		
		</script>
		<?
}


?>

<html>
<head>
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="favicon.ico"/>
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

<script LANGUAGE="JavaScript">
<!-- Begin
nextfield = "Edit1";
netscape  = "";
ver = navigator.appVersion; len = ver.length;

function keyDown(DnEvents) {
k = (netscape) ? DnEvents.which : window.event.keyCode;
if (k == 13) {
if (nextfield == 'done') {
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

</HEAD>
<BODY text=#000000 bgColor=#ffffff topMargin=0 rightMargin=0 leftmargin=0 bottommargin=0 >
</html>

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; " onload="foco();">
<form style="margin-bottom: 0" id="form1" name="form1" method="post"  action="sind_pdf.php" onSubmit="return checa(this);">
<table  width="1000"   style="height:496px"  border="0" cellpadding="0" cellspacing="0"   align="Center" ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 279px; WIDTH: 460px; POSITION: absolute; TOP: 44px; HEIGHT: 379px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(16, 16, 428 - 16, 322 - 16);
  Shape1_Canvas.fillRect(16, 16, 428 - 16 + 1, 322 - 16 + 1);
  Shape1_Canvas.setStroke(16);
  Shape1_Canvas.setColor("<?=$color_bor;?>");
  Shape1_Canvas.drawRect(16, 16, 428 - 16 + 1, 322 - 16 + 1);
  Shape1_Canvas.paint();
</script>

</div>
<div id="Shape2_outer" style="Z-INDEX: 1; LEFT: 312px; WIDTH: 394px; POSITION: absolute; TOP: 77px; HEIGHT: 55px">
<script type="text/javascript">
  var Shape2_Canvas = new jsGraphics("Shape2_outer");
  Shape2_Canvas.setColor("#FFFFFF");
  Shape2_Canvas.fillRect(1, 1, 392 - 1, 53 - 1);
  Shape2_Canvas.fillRect(1, 1, 392 - 1 + 1, 53 - 1 + 1);
  Shape2_Canvas.setStroke(1);
  Shape2_Canvas.setColor("<?=$color_bor;?>");
  Shape2_Canvas.drawRect(1, 1, 392 - 1 + 1, 53 - 1 + 1);
  Shape2_Canvas.paint();
</script>

</div>
<div id="Shape3_outer" style="Z-INDEX: 2; LEFT: 312px; WIDTH: 394px; POSITION: absolute; TOP: 133px; HEIGHT: 257px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 392 - 1, 230 - 1);
  Shape3_Canvas.fillRect(1, 1, 392 - 1 + 1, 230 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("<?=$color_bor;?>");
  Shape3_Canvas.drawRect(1, 1, 392 - 1 + 1, 230 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 3; LEFT: 319px; WIDTH: 139px; POSITION: absolute; TOP: 146px; HEIGHT: 26px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:139px;"   ><STRONG>Vencimento.:</STRONG></div>
</div>
<div id="Label11_outer" style="Z-INDEX: 4; LEFT: 319px; WIDTH: 155px; POSITION: absolute; TOP: 171px; HEIGHT: 26px">
<div id="Label11" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:155px;"   ><STRONG>Ano Exercicio.:</STRONG>&nbsp;</div>
</div>
<div id="Label12_outer" style="Z-INDEX: 5; LEFT: 319px; WIDTH: 171px; POSITION: absolute; TOP: 196px; HEIGHT: 26px">
<div id="Label12" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:171px;"   ><STRONG>Iniciar&nbsp;em Adms.:</STRONG>&nbsp;</div>
</div>
<div id="Label13_outer" style="Z-INDEX: 6; LEFT: 319px; WIDTH: 171px; POSITION: absolute; TOP: 224px; HEIGHT: 26px">
<div id="Label13" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:171px;"   ><STRONG>Terminar em Adms.:</STRONG>&nbsp;</div>
</div>
<div id="Label15_outer" style="Z-INDEX: 7; LEFT: 319px; WIDTH: 379px; POSITION: absolute; TOP: 249px; HEIGHT: 26px">
<div id="Label15" style=" font-family: Verdana; font-size: 14px; color: #FF0000;font-weight: normal; height:26px;width:379px;"   ><STRONG><?=$nome_adm;?></STRONG></div>
</div>
<div id="Label22_outer" style="Z-INDEX: 9; LEFT: 319px; WIDTH: 107px; POSITION: absolute; TOP: 275px; HEIGHT: 26px">
<div id="Label22" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:107px;"   > <STRONG>Empresa Nº</STRONG> </div>
</div>
<div id="Label26_outer" style="Z-INDEX: 10; LEFT: 319px; WIDTH: 139px; POSITION: absolute; TOP: 300px; HEIGHT: 26px">
<div id="Label26" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:139px;"   > <STRONG>Total a Imprimir.:</STRONG> </div>
</div>
<div id="Label4_outer" style="Z-INDEX: 11; LEFT: 416px; WIDTH: 284px; POSITION: absolute; TOP: 275px; HEIGHT: 18px">
<div id="Label4" style=" font-family: Verdana; font-size: 14px; color: #FF0000;font-weight: normal; height:18px;width:284px;"   > <STRONG><?=$Edit3;?></STRONG> </div>
</div>
<div id="Label68_outer" style="Z-INDEX: 12; LEFT: 459px; WIDTH: 196px; POSITION: absolute; TOP: 302px; HEIGHT: 24px">
<div id="Label68" style=" font-family: Verdana; font-size: 14px; color: #FF0000;font-weight: normal; height:24px;width:196px;"   > <STRONG>&nbsp;&nbsp;&nbsp;<?=$nurecno;?></STRONG> </div>
</div>
<div id="Label1_outer" style="Z-INDEX: 13; LEFT: 325px; WIDTH: 370px; POSITION: absolute; TOP: 87px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: <?=$color_bor;?>; background-color: #FFFFFF;height:32px;width:370px;"   > <STRONG>Sindical Adms Geral</STRONG> </div>
</div>
<div id="Edit1_outer" style="Z-INDEX: 14; LEFT: 478px; WIDTH: 96px; POSITION: absolute; TOP: 142px; HEIGHT: 27px">
<input type="text" id="Edit1" name="Edit1" value="<?=$Edit1;?>" style=" font-family: Verdana; font-size: 14px;  height:26px;width:96px;" onkeypress="return txtBoxFormat(document.form1, 'Edit1', '99/99/9999', event);" onchange="Salva_sind1(this)" onFocus="nextfield ='Edit2';"  tabindex="1"    />
</div>
<div id="Edit2_outer" style="Z-INDEX: 15; LEFT: 478px; WIDTH: 61px; POSITION: absolute; TOP: 168px; HEIGHT: 27px">
<input type="text" id="Edit2" name="Edit2" value="<?=$Edit2;?>" style=" font-family: Verdana; font-size: 14px;  height:26px;width:61px;"  onchange="Salva_sind2(this)" onFocus="nextfield ='Edit3';"  tabindex="2"    />
</div>
<div id="Edit3_outer" style="Z-INDEX: 16; LEFT: 478px; WIDTH: 61px; POSITION: absolute; TOP: 195px; HEIGHT: 27px">
<input type="text" id="Edit3" name="Edit3" value="<?=$Edit3;?>" style=" font-family: Verdana; font-size: 14px;  height:26px;width:61px;"  onchange="Salva_sind3(this)" onFocus="nextfield ='Edit4';"  tabindex="3"    />
</div>
<div id="Edit4_outer" style="Z-INDEX: 17; LEFT: 478px; WIDTH: 61px; POSITION: absolute; TOP: 221px; HEIGHT: 27px">
<input type="text" id="Edit4" name="Edit4" value="<?=$Edit4;?>" style=" font-family: Verdana; font-size: 14px;  height:26px;width:61px;"  onchange="Salva_sind4(this)" onFocus="nextfield ='Edit1';"  tabindex="4"    />
</div>

<div id="Label13_outer" style="Z-INDEX: 6; LEFT: 540px; WIDTH: 171px; POSITION: absolute; TOP: 225px; HEIGHT: 26px">
<div id="Label13" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:171px;"   ><STRONG>Imp.Verso.:</STRONG>&nbsp;</div>
</div>

<div id="Edit5_outer" style="Z-INDEX: 17; LEFT: 637px; WIDTH: 61px; POSITION: absolute; TOP: 221px; HEIGHT: 27px">
<select type="text" id="Edit5" name="Edit5" value="<?=$Edit5;?>" style=" font-family: Verdana; font-size: 14px;  height:26px;width:61px;"  onchange="Salva_sind5(this)" onFocus="nextfield ='Edit5';"  tabindex="4"    />

            <option value="<?=$Edit5;?> "><?=$Edit5;?>  </option>
            <option value="SIM">  SIM </option>
            <option value="NAO">  NAO </option>

</select>

</div>


</td></tr></table>
</form></body>

<div style="Z-INDEX: 34; LEFT: 425px; WIDTH: 544px; POSITION: absolute; TOP: 330px; HEIGHT: 80px">
<table border='0'>
         <td> </td>
         <form method="POST" action="sind_pdf.php" target="new">
         <td><input type=image name="guias" src="../imagens/botaoazul23.PNG"></td>
         </form>

         <form method="POST" action="../avaleht.php?servletjs2=20$$20">
         <td><input type=image name="socios" src="../imagens/botaoazul9.PNG"></td>
         </form>

</table>
</div>


<div style="Z-INDEX: 35; LEFT: 670px; WIDTH: 25px; POSITION: absolute; TOP: 320px; HEIGHT: 35px" align="center">
<img id="Image3" src="../imagens/vacina.JPG"  width="25"  height="35"  border="0"       />
</div>

</html>
<?
}else{
	
include("enaaurlnp.php");
	
}
?>

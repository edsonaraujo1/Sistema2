<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Layout Cadastro Alterar
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 21/01/2009 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");
$nome3 = $_SESSION["nome_log"];

// Abre Conexão com o MySql
include("../conexao.php");
$link = @mysql_connect($host,$user,$pass);
@mysql_select_db($db);

$nome3a = strtolower($nome3);

// Abre Tabela Tenporaria

$consulta0  = "SELECT * FROM $nome3a WHERE Nome1 = '$nome3a'";
	
$resultado0 = @mysql_query($consulta0);

$row0 = @mysql_fetch_array($resultado0);

$Edit1      = @$row0["Edit1"];
$Edit2		= @$row0["Edit2"];
$Edit3		= @$row0["Edit3"];
$Edit4		= @$row0["Edit4"];
$Edit5		= @$row0["Edit5"];
$Edit6		= @$row0["Edit6"];
$Edit7		= @$row0["Edit7"];
$Edit8		= @$row0["Edit8"];
$Edit9		= @$row0["Edit9"];
$Edit10	    = @$row0["Edit10"];
$Edit11	    = @$row0["Edit11"];
$Edit12	    = @$row0["Edit12"];
$Edit13	    = @$row0["Edit13"];
$Edit14	    = @$row0["Edit14"];
$Edit15	    = @$row0["memo1"];
$alerta_1   = @$row0["mensage1"];
$nome_do_edif = @$row0["mensage2"];
$nome_da_adms = @$row0["mensage3"];

$menssagens = "* * * Alterar * * *";

// Abrir tabela Senha

$consulta3 = "SELECT * FROM tt_ser_01 Where login = '$nome3'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$lor1       = @$row3["botao1"];
$lor2       = @$row3["botao2"];
$lor3       = @$row3["botao3"];

?>

<script language="javascript">
function mudacor(campoatual){
var cor = "#EAEAEA"
document.getElementById(campoatual).style.background = cor;
}
function voltacor(campoatual){

document.getElementById(campoatual).style.background = '';
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
		document.getElementById("Edit6").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit6)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit7").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit7)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit8").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit8)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit9").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit9)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit10").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit10)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit11").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit11)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit12").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit12)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit13").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit13)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit14").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit14)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit15").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit15)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit16").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit16)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit17").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit17)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit18").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit18)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit19").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit19)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit20").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit20)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit20").focus();	
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

document.onkeydown = keyCatcher;

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
		window.location="cadastro.php";
   }
   
}
//-->
</script>


        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit2").focus();	
		}
		
		</script>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>

<style>

.normal {
	
	background-color: white;
}
.anormal {
		background-color: Lavender;
}

</style>

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; " onkeydown="javascript:if (event.KeyCode==13) event.KeyCode=9; javascript:document.onkeydown = keyCatcher();" onload="foco();" >
<form style="margin-bottom: 0" id="Form1" name="Form1" method="post"  action="atendisoclayout.php">
<table  width="1"   style="height:1px"  border="0" cellpadding="0" cellspacing="0"   align="Center" ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 141px; WIDTH: 724px; POSITION: absolute; TOP: 44px; HEIGHT: 541px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(16, 16, 692 - 16, 509 - 16);
  Shape1_Canvas.fillRect(16, 16, 692 - 16 + 1, 509 - 16 + 1);
  Shape1_Canvas.setStroke(16);
  Shape1_Canvas.setColor("<?=$color_bor;?>");
  Shape1_Canvas.drawRect(16, 16, 692 - 16 + 1, 509 - 16 + 1);
  Shape1_Canvas.paint();
</script>

</div>
<div id="Shape2_outer" style="Z-INDEX: 1; LEFT: 174px; WIDTH: 658px; POSITION: absolute; TOP: 77px; HEIGHT: 55px">
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
<div id="Label1_outer" style="Z-INDEX: 2; LEFT: 183px; WIDTH: 417px; POSITION: absolute; TOP: 90px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: <?=$color_bor;?>; background-color: #FFFFFF;height:32px;width:417px;"   ><STRONG>Controle de Atendimento</STRONG>&nbsp;</div>
</div>

<div id="Label5_outer" style="Z-INDEX: 52; LEFT: 555px; WIDTH: 64px; POSITION: absolute; TOP: 109px; HEIGHT: 16px">
<div id="Label5" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:16px;width:64px;"   > <STRONG>Socios</STRONG> </div>
</div>

<div id="Menssage_outer" style="Z-INDEX: 3; LEFT: 614px; WIDTH: 208px; POSITION: absolute; TOP: 95px; HEIGHT: 24px">
<div id="Menssage" style=" font-family: Verdana; font-size: 14px;  height:24px;width:208px;"  align="Center"   ><STRONG><?=$menssagens;?></STRONG></div>
</div>
<div id="Shape3_outer" style="Z-INDEX: 4; LEFT: 174px; WIDTH: 658px; POSITION: absolute; TOP: 133px; HEIGHT: 419px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 656 - 1, 417 - 1);
  Shape3_Canvas.fillRect(1, 1, 656 - 1 + 1, 417 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("<?=$color_bor;?>");
  Shape3_Canvas.drawRect(1, 1, 656 - 1 + 1, 417 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 5; LEFT: 181px; WIDTH: 64px; POSITION: absolute; TOP: 144px; HEIGHT: 26px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:64px;"   ><STRONG>Codigo.:</STRONG></div>
</div>
<div id="Edit1_outer" style="Z-INDEX: 6; LEFT: 278px; WIDTH: 63px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit1" name="Edit1" value="<?=$Edit1;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:63px; background-color: #FFFFFF;" disabled   tabindex="1"    />
</div>
<div id="Label3_outer" style="Z-INDEX: 7; LEFT: 352px; WIDTH: 114px; POSITION: absolute; TOP: 144px; HEIGHT: 18px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:114px;"   > <STRONG>Data Saida.:</STRONG> </div>
</div>
<div id="Edit2_outer" style="Z-INDEX: 8; LEFT: 470px; WIDTH: 93px; POSITION: absolute; TOP: 139px; HEIGHT: 26px">
<input type="text" id="Edit2" name="Edit2" value="<?=$Edit2;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:93px;" onfocus="this.className='anormal'; nextfield ='Edit4';" onblur="this.className='normal'" onkeypress="return txtBoxFormat(document.Form1, 'Edit2', '99/99/9999', event);" onchange="Salva2(this.value)"  style="text-transform: uppercase;"  tabindex="2"    />
</div>
<div id="Label4_outer" style="Z-INDEX: 9; LEFT: 676px; WIDTH: 47px; POSITION: absolute; TOP: 144px; HEIGHT: 18px">
<div id="Label4" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:47px;"   ><STRONG>Data.:</STRONG></div>
</div>
<div id="Edit3_outer" style="Z-INDEX: 10; LEFT: 729px; WIDTH: 93px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit3" name="Edit3" value="<?=$Edit3;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:93px; background-color: #FFFFFF;" disabled   tabindex="3"    />
</div>
<div id="Label11_outer" style="Z-INDEX: 11; LEFT: 181px; WIDTH: 89px; POSITION: absolute; TOP: 170px; HEIGHT: 26px">
<div id="Label11" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>R.G.:</STRONG>&nbsp;</div>
</div>
<div id="Edit4_outer" style="Z-INDEX: 28; LEFT: 278px; WIDTH: 193px; POSITION: absolute; TOP: 165px; HEIGHT: 26px">
<input type="text" id="Edit4" name="Edit4" value="<?=$Edit4;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:193px;" onfocus="this.className='anormal'; nextfield ='Edit5';" onblur="this.className='normal'" onchange="Salva4(this.value)"  style="text-transform: uppercase;"  tabindex="4"    />
</div>
<div id="Edit5_outer" style="Z-INDEX: 12; LEFT: 568px; WIDTH: 254px; POSITION: absolute; TOP: 165px; HEIGHT: 26px">
<input type="text" id="Edit5" name="Edit5" value="<?=$Edit5;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:254px;" onfocus="this.className='anormal'; nextfield ='Edit6';" onblur="this.className='normal'" onkeypress="return txtBoxFormat(document.Form1, 'Edit6', '999.999.999-99', event);" onchange="Salva5(this.value)"  style="text-transform: uppercase;"  tabindex="5"    />
</div>
<div id="Label12_outer" style="Z-INDEX: 13; LEFT: 181px; WIDTH: 89px; POSITION: absolute; TOP: 194px; HEIGHT: 26px">
<div id="Label12" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Matricula.:</STRONG>&nbsp;</div>
</div>
<div id="Edit6_outer" style="Z-INDEX: 14; LEFT: 278px; WIDTH: 98px; POSITION: absolute; TOP: 190px; HEIGHT: 26px">
<input type="text" id="Edit6" name="Edit6" value="<?=$Edit6;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:98px;" onfocus="this.className='anormal'; nextfield ='Edit7';" onblur="this.className='normal'" onchange="Salva6(this.value)"  style="text-transform: uppercase;"  tabindex="6"    />
</div>
<div id="Edit7_outer" style="Z-INDEX: 15; LEFT: 568px; WIDTH: 254px; POSITION: absolute; TOP: 192px; HEIGHT: 26px">
<select type="text" id="Edit7" name="Edit7" value="<?=$Edit7;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:254px;" onfocus="this.className='anormal'; nextfield ='Edit8';" onblur="this.className='normal'" onchange="Salva7(this.value)" tabindex="7"    />

<?

if (!empty($Edit7))
{
?>	
	<option value="<?=$Edit7;?>"> <?=$Edit7;?> </option>
            <option value="CONTRIBUINTE"> CONTRIBUINTE </option>
            <option value="REMIDO"> REMIDO </option>
            <option value="DESISTENTE"> DESISTENTE </option>
            <option value="CARTA - OPOSICAO"> CARTA - OPOSICAO </option>
            <option value="ISENTO CARENCIA"> ISENTO CARENCIA </option>
            <option value="FALECIDO"> FALECIDO </option>
<?	

}else{
	
?>	
            <option value=" ">  </option>
            <option value="CONTRIBUINTE"> CONTRIBUINTE </option>
            <option value="REMIDO"> REMIDO </option>
            <option value="DESISTENTE"> DESISTENTE </option>
            <option value="CARTA - OPOSICAO"> CARTA - OPOSICAO </option>
            <option value="ISENTO CARENCIA"> ISENTO CARENCIA </option>
            <option value="FALECIDO"> FALECIDO </option>
<?            
 }
?>

</select>

</div>
<div id="Label13_outer" style="Z-INDEX: 16; LEFT: 181px; WIDTH: 89px; POSITION: absolute; TOP: 218px; HEIGHT: 26px">
<div id="Label13" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Nome.:</STRONG>&nbsp;</div>
</div>
<div id="Edit8_outer" style="Z-INDEX: 17; LEFT: 278px; WIDTH: 434px; POSITION: absolute; TOP: 215px; HEIGHT: 26px">
<input type="text" id="Edit8" name="Edit8" value="<?=$Edit8;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:434px;" onfocus="this.className='anormal'; nextfield ='Edit9';" onblur="this.className='normal'" onchange="Salva8(this.value)"  tabindex="8"    />
</div>

<div id="Edit9_outer" style="Z-INDEX: 50; LEFT: 278px; WIDTH: 354px; POSITION: absolute; TOP: 240px; HEIGHT: 26px">
<input type="text" id="Edit9" name="Edit9" value="<?=$Edit9;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:354px;" onfocus="this.className='anormal'; nextfield ='Edit10';" onblur="this.className='normal'" onchange="Salva9(this.value)"  tabindex="9"    />
</div>

<div id="Label15_outer" style="Z-INDEX: 18; LEFT: 645px; WIDTH: 45px; POSITION: absolute; TOP: 242px; HEIGHT: 19px">
<div id="Label15" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:45px;"   ><STRONG>Cep.:</STRONG>&nbsp;</div>
</div>
<div id="Edit10_outer" style="Z-INDEX: 19; LEFT: 692px; WIDTH: 90px; POSITION: absolute; TOP: 240px; HEIGHT: 26px">
<input type="text" id="Edit10" name="Edit10" value="<?=$Edit10;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:90px;" onfocus="this.className='anormal'; nextfield ='Edit11';" onblur="this.className='normal'" onkeypress="return txtBoxFormat(document.Form1, 'Edit10', '99999-999', event);" onchange="Salva10(this.value)"   tabindex="10"    />
</div>
<div id="Label16_outer" style="Z-INDEX: 20; LEFT: 181px; WIDTH: 91px; POSITION: absolute; TOP: 267px; HEIGHT: 21px">
<div id="Label16" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:91px;"   ><STRONG>Cod. Edif.:</STRONG>&nbsp;</div>
</div>
<div id="Edit11_outer" style="Z-INDEX: 21; LEFT: 278px; WIDTH: 74px; POSITION: absolute; TOP: 265px; HEIGHT: 26px">
<input type="text" id="Edit11" name="Edit11" value="<?=$Edit11;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:74px;" onfocus="this.className='anormal'; nextfield ='Edit12';" onblur="this.className='normal'" onchange="Salva11(this.value)"  tabindex="11"    />
</div>
<div id="Label22_outer" style="Z-INDEX: 22; LEFT: 181px; WIDTH: 107px; POSITION: absolute; TOP: 292px; HEIGHT: 26px">
<div id="Label22" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:107px;"   ><STRONG>CNPJ Edif.:</STRONG>&nbsp;</div>
</div>
<div id="Edit12_outer" style="Z-INDEX: 23; LEFT: 278px; WIDTH: 193px; POSITION: absolute; TOP: 290px; HEIGHT: 26px">
<input type="text" id="Edit12" name="Edit12" value="<?=$Edit12;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:193px;" onfocus="this.className='anormal'; nextfield ='Edit13';" onblur="this.className='normal'" onkeypress="return txtBoxFormat(document.Form1, 'Edit12', '99.999.999/9999-99', event);" onchange="Salva12(this.value)"   tabindex="12"    />
</div>
<div id="Label26_outer" style="Z-INDEX: 24; LEFT: 181px; WIDTH: 103px; POSITION: absolute; TOP: 341px; HEIGHT: 26px">
<div id="Label26" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:103px;"   ><STRONG>CNPJ Adm.:</STRONG>&nbsp;</div>
</div>
<div id="Label68_outer" style="Z-INDEX: 25; LEFT: 180px; WIDTH: 103px; POSITION: absolute; TOP: 366px; HEIGHT: 24px">
<div id="Label68" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:103px;"   ><STRONG>Observacao:</STRONG></div>
</div>
<div id="Edit15_outer" style="Z-INDEX: 26; LEFT: 278px; WIDTH: 544px; POSITION: absolute; TOP: 365px; HEIGHT: 107px">
<textarea id="Edit15" name="Edit15" style=" font-family: Verdana; font-size: 14px;  height:106px;width:544px;" onfocus="this.className='anormal'; nextfield ='done';" onblur="this.className='normal'" onchange="Salva15(this.value)"  tabindex="15" wrap="virtual"><?=$Edit15;?></textarea>
</div>
<div id="Edit14_outer" style="Z-INDEX: 29; LEFT: 278px; WIDTH: 194px; POSITION: absolute; TOP: 340px; HEIGHT: 26px">
<input type="text" id="Edit14" name="Edit14" value="<?=$Edit14;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:194px;" onfocus="this.className='anormal'; nextfield ='Edit15';" onblur="this.className='normal'" onkeypress="return txtBoxFormat(document.Form1, 'Edit14', '99.999.999/9999-99', event);" onchange="Salva14(this.value)"  tabindex="14"    />
</div>
<div id="Label7_outer" style="Z-INDEX: 31; LEFT: 181px; WIDTH: 99px; POSITION: absolute; TOP: 317px; HEIGHT: 21px">
<div id="Label7" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:99px;"   ><STRONG>Cod. Adm.:</STRONG></div>
</div>
<div id="Edit13_outer" style="Z-INDEX: 32; LEFT: 278px; WIDTH: 74px; POSITION: absolute; TOP: 315px; HEIGHT: 26px">
<input type="text" id="Edit13" name="Edit13" value="<?=$Edit13;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:74px;" onfocus="this.className='anormal'; nextfield ='Edit14';" onblur="this.className='normal'" onchange="Salva13(this.value)"   tabindex="13"    />
</div>
<div id="Label9_outer" style="Z-INDEX: 47; LEFT: 512px; WIDTH: 56px; POSITION: absolute; TOP: 172px; HEIGHT: 18px">
<div id="Label9" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:56px;"   ><STRONG>C.P.F.:</STRONG></div>
</div>
<div id="Label10_outer" style="Z-INDEX: 48; LEFT: 478px; WIDTH: 87px; POSITION: absolute; TOP: 195px; HEIGHT: 18px">
<div id="Label10" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:87px;"   ><STRONG>Categoria.:</STRONG></div>
</div>
<div id="Label14_outer" style="Z-INDEX: 49; LEFT: 181px; WIDTH: 91px; POSITION: absolute; TOP: 243px; HEIGHT: 21px">
<div id="Label14" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:91px;"   ><STRONG>Endereco.:</STRONG>&nbsp;</div>
</div>

<div id="Edit16_outer" style="Z-INDEX: 54; LEFT: 352px; WIDTH: 464px; POSITION: absolute; TOP: 265px; HEIGHT: 26px">
<input type="text" id="Edit16" name="Edit16" value="<?=$nome_do_edif;?>" style=" font-family: Verdana; font-size: 14px; color: #0000FF; font-weight: bold; border-style: none;height:25px;width:464px;" readonly tabindex="20"    />
</div>
<div id="Edit17_outer" style="Z-INDEX: 55; LEFT: 352px; WIDTH: 464px; POSITION: absolute; TOP: 315px; HEIGHT: 26px">
<input type="text" id="Edit17" name="Edit17" value="<?=$nome_da_adms;?>" style=" font-family: Verdana; font-size: 14px; color: #0000FF; font-weight: bold; border-style: none;height:25px;width:464px;" readonly   tabindex="21"    />
</div>

<div id="Label70_outer" style="Z-INDEX: 27; LEFT: 788px; WIDTH: 37px; POSITION: absolute; TOP: 243px; HEIGHT: 18px">
<div id="Label70" style=" font-family: Verdana; font-size: 13px; color: #0000FF; height:18px;width:37px;"   ><A HREF="http://correios.com.br/servicos/dnec/menuAction.do?Metodo=menuCep" target="new" ><u> Cep </u></A></div>
</div>

<div id="Label8_outer" style="Z-INDEX: 52; LEFT: 478px; WIDTH: 85px; POSITION: absolute; TOP: 295px; HEIGHT: 18px">
<div id="Label8" style=" font-family: Verdana; font-size: 13px; color: #0000FF; height:18px;width:85px;"   ><A HREF="http://www.receita.fazenda.gov.br/PessoaJuridica/CNPJ/cnpjreva/Cnpjreva_Solicitacao.asp" target="new" ><u>click CNPJ</u></A></div>
</div>
<div id="Label17_outer" style="Z-INDEX: 53; LEFT: 478px; WIDTH: 85px; POSITION: absolute; TOP: 344px; HEIGHT: 18px">
<div id="Label17" style=" font-family: Verdana; font-size: 13px; color: #0000FF; height:18px;width:85px;"   ><A HREF="http://www.receita.fazenda.gov.br/PessoaJuridica/CNPJ/cnpjreva/Cnpjreva_Solicitacao.asp" target="new" ><u>click CNPJ</u></A></div>
</div>
</td></tr></table>
</form></body>
</html>
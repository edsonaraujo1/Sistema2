<?php
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Layout Cadastro Incluir
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 21/01/2009 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

// include("../logar.php");
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
$Edit15	    = @$row0["Edit15"];
$Edit16	    = @$row0["Edit16"];
$Edit17	    = @$row0["Edit17"];
$Edit18	    = @$row0["Edit18"];
$Edit19	    = @$row0["Edit19"];
$Edit20	    = @$row0["Edit20"];
$Edit21	    = @$row0["Edit21"];
$Edit22	    = @$row0["Edit22"];
$Edit23	    = @$row0["Edit23"];
$Edit24	    = @$row0["Edit24"];
$Edit25	    = @$row0["Edit25"];
$Edit26	    = @$row0["Edit26"];
$Edit27	    = @$row0["Edit27"];
$Edit28	    = @$row0["Edit28"];
$Edit29	    = @$row0["Edit29"];
$Edit30	    = @$row0["Edit30"];
$alerta_1   = @$row0["mensage1"];
$categ_1    = @$row0["mensage2"];
$nome_do_edif = @$row0["mensage3"];
$nome_cad_si  = @$row0["mensage4"];

$alerta_1 = $alerta_1;
$nome2_adms = $nome_do_edif; 

$menssagens = "* * * Incluir * * *";

// Abrir tabela Senha

$consulta3 = "SELECT * FROM tt_ser_01 Where login = '$nome3'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$aco1       = @$row3["aco1"];
$aco2       = @$row3["aco2"];
$aco3       = @$row3["aco3"];

?>

<!-- TinyMCE -->
<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
//	tinyMCE.init({
//		mode : "textareas",
//		theme : "simple"
//	});
</script>
<!-- /TinyMCE -->

<script language="javascript">
function mudacor(campoatual){
var cor = "#EAEAEA"
document.getElementById(campoatual).style.background = cor;
}
function voltacor(campoatual){

document.getElementById(campoatual).style.background = '';
}
</script>

<?php


if (!empty($Edit1)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit2").focus();	
		}
		
		</script>
		<?php
}
if (!empty($Edit2)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit3").focus();	
		}
		
		</script>
		<?php
}
if (!empty($Edit3)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit4").focus();	
		}
		
		</script>
		<?php
}
if (!empty($Edit4)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit5").focus();	
		}
		
		</script>
		<?php
}
if (!empty($Edit5)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit6").focus();	
		}
		
		</script>
		<?php
}
if (!empty($Edit6)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit7").focus();	
		}
		
		</script>
		<?php
}
if (!empty($Edit7)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit8").focus();	
		}
		
		</script>
		<?php
}
if (!empty($Edit8)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit9").focus();	
		}
		
		</script>
		<?php
}
if (!empty($Edit9)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit10").focus();	
		}
		
		</script>
		<?php
}
if (!empty($Edit10)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit11").focus();	
		}
		
		</script>
		<?php
}
if (!empty($Edit11)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit12").focus();	
		}
		
		</script>
		<?php
}
if (!empty($Edit12)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit13").focus();	
		}
		
		</script>
		<?php
}
if (!empty($Edit13)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit14").focus();	
		}
		
		</script>
		<?php
}
if (!empty($Edit14)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit15").focus();	
		}
		
		</script>
		<?php
}
if (!empty($Edit15)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit16").focus();	
		}
		
		</script>
		<?php
}
if (!empty($Edit16)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit17").focus();	
		}
		
		</script>
		<?php
}
if (!empty($Edit17)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit18").focus();	
		}
		
		</script>
		<?php
}
if (!empty($Edit18)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit19").focus();	
		}
		
		</script>
		<?php
}
if (!empty($Edit19)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit20").focus();	
		}
		
		</script>
		<?php
}
if (!empty($Edit20)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit21").focus();	
		}
		
		</script>
		<?php
}
if (!empty($Edit21)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit22").focus();	
		}
		
		</script>
		<?php
}
if (!empty($Edit22)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit23").focus();	
		}
		
		</script>
		<?php
}
if (!empty($Edit23)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit24").focus();	
		}
		
		</script>
		<?php
}
if (!empty($Edit24)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit25").focus();	
		}
		
		</script>
		<?php
}
if (!empty($Edit25)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit26").focus();	
		}
		
		</script>
		<?php
}
if (!empty($Edit26)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit27").focus();	
		}
		
		</script>
		<?php
}
if (!empty($Edit27)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit28").focus();	
		}
		
		</script>
		<?php
}
if (!empty($Edit28)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit29").focus();	
		}
		
		</script>
		<?php
}
if (!empty($Edit29)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit29").focus();	
		}
		
		</script>
		<?php
}

?>
<script language="JavaScript">
<!-- Begin
nextfield = "Edit1";
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
}
//-->
</script>

        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit1").focus();	
		}
		
		</script>

<html>
<head>
<title><?php echo $Titulo ?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
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

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; " onkeydown="javascript:if (event.KeyCode==13) event.KeyCode=9; javascript:document.onkeydown = keyCatcher();" onload="foco();">
<form style="margin-bottom: 0" id="Form1" name="Form1" method="post"  action="/acompanhalayout.php">
<table  width="10"   style="height:10px"  border="0" cellpadding="0" cellspacing="0"   align="Center" ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 141px; WIDTH: 724px; POSITION: absolute; TOP: 44px; HEIGHT: 541px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(16, 16, 692 - 16, 509 - 16);
  Shape1_Canvas.fillRect(16, 16, 692 - 16 + 1, 509 - 16 + 1);
  Shape1_Canvas.setStroke(16);
  Shape1_Canvas.setColor("<?php echo $color_bor ?>");
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
  Shape2_Canvas.setColor("<?php echo $color_bor ?>");
  Shape2_Canvas.drawRect(1, 1, 656 - 1 + 1, 53 - 1 + 1);
  Shape2_Canvas.paint();
</script>

</div>
<div id="Label1_outer" style="Z-INDEX: 2; LEFT: 183px; WIDTH: 449px; POSITION: absolute; TOP: 90px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 22px; color: <?php echo $color_bor ?>; background-color: #FFFFFF;height:32px;width:449px;"   ><STRONG>Cadastro de&nbsp;Acompanhamento</STRONG></div>
</div>
<div id="Menssage_outer" style="Z-INDEX: 3; LEFT: 614px; WIDTH: 208px; POSITION: absolute; TOP: 95px; HEIGHT: 24px">
<div id="Menssage" style=" font-family: Verdana; font-size: 14px;  height:24px;width:208px;"  align="Center"   ><STRONG><?php echo $menssagens ?></STRONG></div>
</div>
<div id="Shape3_outer" style="Z-INDEX: 4; LEFT: 174px; WIDTH: 658px; POSITION: absolute; TOP: 133px; HEIGHT: 419px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 656 - 1, 417 - 1);
  Shape3_Canvas.fillRect(1, 1, 656 - 1 + 1, 417 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("<?php echo $color_bor ?>");
  Shape3_Canvas.drawRect(1, 1, 656 - 1 + 1, 417 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 5; LEFT: 181px; WIDTH: 91px; POSITION: absolute; TOP: 144px; HEIGHT: 24px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:91px;"   > <STRONG>No Socio.:</STRONG> </div>
</div>
<div id="Edit1_outer" style="Z-INDEX: 6; LEFT: 278px; WIDTH: 77px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit1" name="Edit1" value="<?php echo $Edit1 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:77px;" onfocus="this.className='anormal'; nextfield ='Edit2';" onblur="this.className='normal'" onchange="Salva1(this.value)"  style="text-transform: uppercase;" tabindex="1"    />
</div>
<div id="Label3_outer" style="Z-INDEX: 7; LEFT: 359px; WIDTH: 57px; POSITION: absolute; TOP: 144px; HEIGHT: 18px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:57px;"   > <STRONG>R.G.:</STRONG> </div>
</div>
<div id="Edit2_outer" style="Z-INDEX: 8; LEFT: 400px; WIDTH: 163px; POSITION: absolute; TOP: 139px; HEIGHT: 26px">
<input type="text" id="Edit2" name="Edit2" value="<?php echo $Edit2 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:163px;" onfocus="this.className='anormal'; nextfield ='Edit3';" onblur="this.className='normal'" onchange="Salva2(this.value)" style="text-transform: uppercase;"  tabindex="2"    />
</div>
<div id="Label4_outer" style="Z-INDEX: 9; LEFT: 597px; WIDTH: 51px; POSITION: absolute; TOP: 144px; HEIGHT: 18px">
<div id="Label4" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:51px;"   ><STRONG>CPF.:</STRONG></div>
</div>
<div id="Edit3_outer" style="Z-INDEX: 10; LEFT: 640px; WIDTH: 182px; POSITION: absolute; TOP: 139px; HEIGHT: 26px">
<input type="text" id="Edit3" name="Edit3" value="<?php echo $Edit3 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:182px;" onfocus="this.className='anormal'; nextfield ='Edit4';" onblur="this.className='normal'" onkeypress="return txtBoxFormat(document.Form1, 'Edit3', '999.999.999-99', event);" onchange="Salva3(this.value)"   style="text-transform: uppercase;" tabindex="3"    />
</div>
<div id="Label5_outer" style="Z-INDEX: 25; LEFT: 181px; WIDTH: 91px; POSITION: absolute; TOP: 170px; HEIGHT: 24px">
<div id="Label5" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:91px;"   > <STRONG>CTPS.:</STRONG> </div>
</div>
<div id="Edit4_outer" style="Z-INDEX: 26; LEFT: 278px; WIDTH: 122px; POSITION: absolute; TOP: 166px; HEIGHT: 26px">
<input type="text" id="Edit4" name="Edit4" value="<?php echo $Edit4 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:122px;" onfocus="this.className='anormal'; nextfield ='Edit5';" onblur="this.className='normal'" onchange="Salva4(this.value)"   style="text-transform: uppercase;"  tabindex="1"    />
</div>
<div id="Label6_outer" style="Z-INDEX: 27; LEFT: 405px; WIDTH: 67px; POSITION: absolute; TOP: 169px; HEIGHT: 18px">
<div id="Label6" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:67px;"   ><STRONG>Nome.:</STRONG></div>
</div>
<div id="Edit5_outer" style="Z-INDEX: 28; LEFT: 462px; WIDTH: 360px; POSITION: absolute; TOP: 165px; HEIGHT: 26px">
<input type="text" id="Edit5" name="Edit5" value="<?php echo $Edit5 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:360px;" onfocus="this.className='anormal'; nextfield ='Edit6';" onblur="this.className='normal'" onchange="Salva5(this.value)"   style="text-transform: uppercase;"  tabindex="3"    />
</div>
<div id="Label7_outer" style="Z-INDEX: 29; LEFT: 184px; WIDTH: 104px; POSITION: absolute; TOP: 196px; HEIGHT: 18px">
<div id="Label7" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:104px;"   ><STRONG>Endereco.:</STRONG></div>
</div>
<div id="Edit6_outer" style="Z-INDEX: 30; LEFT: 278px; WIDTH: 370px; POSITION: absolute; TOP: 192px; HEIGHT: 26px">
<input type="text" id="Edit6" name="Edit6" value="<?php echo $Edit6 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:370px;" onfocus="this.className='anormal'; nextfield ='Edit7';" onblur="this.className='normal'" onchange="Salva6(this.value)"  style="text-transform: uppercase;" tabindex="3"    />
</div>
<div id="Label8_outer" style="Z-INDEX: 31; LEFT: 661px; WIDTH: 51px; POSITION: absolute; TOP: 196px; HEIGHT: 24px">
<div id="Label8" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:51px;"   > <STRONG>CEP.:</STRONG> </div>
</div>
<div id="Edit7_outer" style="Z-INDEX: 32; LEFT: 706px; WIDTH: 117px; POSITION: absolute; TOP: 192px; HEIGHT: 26px">
<input type="text" id="Edit7" name="Edit7" value="<?php echo $Edit7 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:117px;" onfocus="this.className='anormal'; nextfield ='Edit8';" onblur="this.className='normal'" onkeypress="return txtBoxFormat(document.Form1, 'Edit7', '99999-999', event);" onchange="Salva7(this.value)"  style="text-transform: uppercase;" tabindex="1"    />
</div>
<div id="Label9_outer" style="Z-INDEX: 33; LEFT: 184px; WIDTH: 88px; POSITION: absolute; TOP: 223px; HEIGHT: 18px">
<div id="Label9" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:88px;"   > <STRONG>Estado.:</STRONG> </div>
</div>
<div id="Edit8_outer" style="Z-INDEX: 34; LEFT: 278px; WIDTH: 182px; POSITION: absolute; TOP: 218px; HEIGHT: 26px">
<input type="text" id="Edit8" name="Edit8" value="<?php echo $Edit8 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:182px;" onfocus="this.className='anormal'; nextfield ='Edit9';" onblur="this.className='normal'" onchange="Salva8(this.value)"  style="text-transform: uppercase;" tabindex="3"    />
</div>
<div id="Label10_outer" style="Z-INDEX: 35; LEFT: 472px; WIDTH: 56px; POSITION: absolute; TOP: 223px; HEIGHT: 18px">
<div id="Label10" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:56px;"   > <STRONG>Fone:</STRONG> </div>
</div>
<div id="Edit9_outer" style="Z-INDEX: 36; LEFT: 520px; WIDTH: 303px; POSITION: absolute; TOP: 218px; HEIGHT: 26px">
<input type="text" id="Edit9" name="Edit9" value="<?php echo $Edit9 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:303px;" onfocus="this.className='anormal'; nextfield ='Edit10';" onblur="this.className='normal'" onchange="Salva9(this.value)"  style="text-transform: uppercase;" tabindex="3"    />
</div>
<div id="Label11_outer" style="Z-INDEX: 37; LEFT: 182px; WIDTH: 91px; POSITION: absolute; TOP: 248px; HEIGHT: 24px">
<div id="Label11" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:91px;"   > <STRONG>No Edif.:</STRONG> </div>
</div>
<div id="Edit10_outer" style="Z-INDEX: 38; LEFT: 278px; WIDTH: 77px; POSITION: absolute; TOP: 244px; HEIGHT: 26px">
<input type="text" id="Edit10" name="Edit10" value="<?php echo $Edit10 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:77px;" onfocus="this.className='anormal'; nextfield ='Edit11';" onblur="this.className='normal'" onchange="Salva10(this.value)"   style="text-transform: uppercase;" tabindex="1"    />
</div>
<div id="Label12_outer" style="Z-INDEX: 39; LEFT: 359px; WIDTH: 57px; POSITION: absolute; TOP: 248px; HEIGHT: 18px">
<div id="Label12" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:57px;"   > <STRONG>Nome.:</STRONG> </div>
</div>
<div id="Edit11_outer" style="Z-INDEX: 40; LEFT: 416px; WIDTH: 407px; POSITION: absolute; TOP: 244px; HEIGHT: 26px">
<input type="text" id="Edit11" name="Edit11" value="<?php echo $Edit11 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:407px;" onfocus="this.className='anormal'; nextfield ='Edit12';" onblur="this.className='normal'" onchange="Salva11(this.value)"  style="text-transform: uppercase;" tabindex="2"    />
</div>
<div id="Label13_outer" style="Z-INDEX: 41; LEFT: 184px; WIDTH: 104px; POSITION: absolute; TOP: 274px; HEIGHT: 18px">
<div id="Label13" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:104px;"   ><STRONG>Endereco.:</STRONG></div>
</div>
<div id="Edit12_outer" style="Z-INDEX: 42; LEFT: 278px; WIDTH: 370px; POSITION: absolute; TOP: 270px; HEIGHT: 26px">
<input type="text" id="Edit12" name="Edit12" value="<?php echo $Edit12 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:370px;" onfocus="this.className='anormal'; nextfield ='Edit13';" onblur="this.className='normal'" onchange="Salva12(this.value)"   style="text-transform: uppercase;" tabindex="3"    />
</div>
<div id="Label14_outer" style="Z-INDEX: 43; LEFT: 661px; WIDTH: 51px; POSITION: absolute; TOP: 274px; HEIGHT: 24px">
<div id="Label14" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:51px;"   > <STRONG>CEP.:</STRONG> </div>
</div>
<div id="Edit13_outer" style="Z-INDEX: 44; LEFT: 706px; WIDTH: 117px; POSITION: absolute; TOP: 270px; HEIGHT: 26px">
<input type="text" id="Edit13" name="Edit13" value="<?php echo $Edit13 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:117px;" onfocus="this.className='anormal'; nextfield ='Edit14';" onblur="this.className='normal'" onkeypress="return txtBoxFormat(document.Form1, 'Edit13', '99999-999', event);" onchange="Salva13(this.value)"   style="text-transform: uppercase;" tabindex="1"    />
</div>
<div id="Label15_outer" style="Z-INDEX: 45; LEFT: 184px; WIDTH: 102px; POSITION: absolute; TOP: 301px; HEIGHT: 18px">
<div id="Label15" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:102px;"   > <STRONG>Fone:</STRONG> </div>
</div>
<div id="Edit14_outer" style="Z-INDEX: 46; LEFT: 278px; WIDTH: 186px; POSITION: absolute; TOP: 296px; HEIGHT: 26px">
<input type="text" id="Edit14" name="Edit14" value="<?php echo $Edit14 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:186px;" onfocus="this.className='anormal'; nextfield ='Edit15';" onblur="this.className='normal'" onchange="Salva14(this.value)"   style="text-transform: uppercase;"  tabindex="3"    />
</div>
<div id="Label16_outer" style="Z-INDEX: 47; LEFT: 478px; WIDTH: 202px; POSITION: absolute; TOP: 301px; HEIGHT: 18px">
<div id="Label16" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:202px;"   > <STRONG>Objeto da Reclamacao.:</STRONG> </div>
</div>
<div id="Edit15_outer" style="Z-INDEX: 48; LEFT: 672px; WIDTH: 152px; POSITION: absolute; TOP: 296px; HEIGHT: 26px">
<input type="text" id="Edit15" name="Edit15" value="<?php echo $Edit15 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:152px;" onfocus="this.className='anormal'; nextfield ='Edit16';" onblur="this.className='normal'" onchange="Salva15(this.value)"  style="text-transform: uppercase;" tabindex="3"    />
</div>
<div id="Edit16_outer" style="Z-INDEX: 49; LEFT: 184px; WIDTH: 88px; POSITION: absolute; TOP: 322px; HEIGHT: 26px">
<input type="text" id="Edit16" name="Edit16" value="<?php echo $Edit16 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:88px;" onfocus="this.className='anormal'; nextfield ='Edit17';" onblur="this.className='normal'" onchange="Salva16(this.value)"   style="text-transform: uppercase;" tabindex="3"    />
</div>
<div id="Label17_outer" style="Z-INDEX: 50; LEFT: 272px; WIDTH: 144px; POSITION: absolute; TOP: 325px; HEIGHT: 18px">
<div id="Label17" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:144px;"   > <STRONG>o J.C.J. - Proc. no</STRONG> </div>
</div>
<div id="Edit17_outer" style="Z-INDEX: 51; LEFT: 416px; WIDTH: 64px; POSITION: absolute; TOP: 322px; HEIGHT: 26px">
<input type="text" id="Edit17" name="Edit17" value="<?php echo $Edit17 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:64px;" onfocus="this.className='anormal'; nextfield ='Edit18';" onblur="this.className='normal'" onchange="Salva17(this.value)"   style="text-transform: uppercase;" tabindex="3"    />
</div>
<div id="Label18_outer" style="Z-INDEX: 52; LEFT: 484px; WIDTH: 16px; POSITION: absolute; TOP: 325px; HEIGHT: 18px">
<div id="Label18" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:16px;"   > <STRONG>/</STRONG> </div>
</div>
<div id="Edit18_outer" style="Z-INDEX: 53; LEFT: 496px; WIDTH: 64px; POSITION: absolute; TOP: 322px; HEIGHT: 26px">
<input type="text" id="Edit18" name="Edit18" value="<?php echo $Edit18 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:64px;" onfocus="this.className='anormal'; nextfield ='Edit19';" onblur="this.className='normal'" onchange="Salva18(this.value)"   style="text-transform: uppercase;"  tabindex="3"    />
</div>
<div id="Label19_outer" style="Z-INDEX: 54; LEFT: 566px; WIDTH: 153px; POSITION: absolute; TOP: 326px; HEIGHT: 24px">
<div id="Label19" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:153px;"   > <STRONG>No Advogado(a).:</STRONG> </div>
</div>
<div id="Edit19_outer" style="Z-INDEX: 55; LEFT: 707px; WIDTH: 117px; POSITION: absolute; TOP: 322px; HEIGHT: 26px">
<input type="text" id="Edit19" name="Edit19" value="<?php echo $Edit19 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:117px;" onfocus="this.className='anormal'; nextfield ='Edit20';" onblur="this.className='normal'" onchange="Salva19(this.value)"   style="text-transform: uppercase;" tabindex="1"    />
</div>
<div id="Label20_outer" style="Z-INDEX: 56; LEFT: 182px; WIDTH: 91px; POSITION: absolute; TOP: 350px; HEIGHT: 24px">
<div id="Label20" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:91px;"   > <STRONG>T.R.T. no</STRONG> </div>
</div>
<div id="Edit20_outer" style="Z-INDEX: 57; LEFT: 278px; WIDTH: 58px; POSITION: absolute; TOP: 346px; HEIGHT: 26px">
<input type="text" id="Edit20" name="Edit20" value="<?php echo $Edit20 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:58px;" onfocus="this.className='anormal'; nextfield ='Edit21';" onblur="this.className='normal'" onchange="Salva20(this.value)"   style="text-transform: uppercase;" tabindex="1"    />
</div>
<div id="Label21_outer" style="Z-INDEX: 58; LEFT: 338px; WIDTH: 58px; POSITION: absolute; TOP: 350px; HEIGHT: 24px">
<div id="Label21" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:58px;"   > <STRONG>- em</STRONG> </div>
</div>
<div id="Edit21_outer" style="Z-INDEX: 59; LEFT: 375px; WIDTH: 102px; POSITION: absolute; TOP: 347px; HEIGHT: 26px">
<input type="text" id="Edit21" name="Edit21" value="<?php echo $Edit21 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:102px;" onfocus="this.className='anormal'; nextfield ='Edit22';" onblur="this.className='normal'" onkeypress="return txtBoxFormat(document.Form1, 'Edit21', '99/99/9999', event);" onchange="Salva21(this.value)"  style="text-transform: uppercase;"  tabindex="3"    />
</div>
<div id="Label22_outer" style="Z-INDEX: 60; LEFT: 480px; WIDTH: 56px; POSITION: absolute; TOP: 352px; HEIGHT: 18px">
<div id="Label22" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:56px;"   > <STRONG>Nome.:</STRONG> </div>
</div>
<div id="Edit22_outer" style="Z-INDEX: 61; LEFT: 536px; WIDTH: 288px; POSITION: absolute; TOP: 347px; HEIGHT: 26px">
<input type="text" id="Edit22" name="Edit22" value="<?php echo $Edit22 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:288px;" onfocus="this.className='anormal'; nextfield ='Edit23';" onblur="this.className='normal'" onchange="Salva22(this.value)"  style="text-transform: uppercase;"  tabindex="3"    />
</div>
<div id="Label23_outer" style="Z-INDEX: 62; LEFT: 182px; WIDTH: 91px; POSITION: absolute; TOP: 375px; HEIGHT: 24px">
<div id="Label23" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:91px;"   > <STRONG>T.R.T. no</STRONG> </div>
</div>
<div id="Edit23_outer" style="Z-INDEX: 63; LEFT: 278px; WIDTH: 58px; POSITION: absolute; TOP: 371px; HEIGHT: 26px">
<input type="text" id="Edit23" name="Edit23" value="<?php echo $Edit23 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:58px;" onfocus="this.className='anormal'; nextfield ='Edit24';" onblur="this.className='normal'" onchange="Salva23(this.value)"  style="text-transform: uppercase;" tabindex="1"    />
</div>
<div id="Label24_outer" style="Z-INDEX: 64; LEFT: 338px; WIDTH: 58px; POSITION: absolute; TOP: 375px; HEIGHT: 24px">
<div id="Label24" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:58px;"   > <STRONG>- em</STRONG> </div>
</div>
<div id="Edit24_outer" style="Z-INDEX: 65; LEFT: 375px; WIDTH: 102px; POSITION: absolute; TOP: 372px; HEIGHT: 26px">
<input type="text" id="Edit24" name="Edit24" value="<?php echo $Edit24 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:102px;" onfocus="this.className='anormal'; nextfield ='Edit25';" onblur="this.className='normal'" onkeypress="return txtBoxFormat(document.Form1, 'Edit24', '99/99/9999', event);" onchange="Salva24(this.value)"   style="text-transform: uppercase;" tabindex="3"    />
</div>
<div id="Label25_outer" style="Z-INDEX: 66; LEFT: 480px; WIDTH: 64px; POSITION: absolute; TOP: 377px; HEIGHT: 18px">
<div id="Label25" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:64px;"   > <STRONG>No Adv.</STRONG> </div>
</div>
<div id="Edit25_outer" style="Z-INDEX: 67; LEFT: 536px; WIDTH: 80px; POSITION: absolute; TOP: 372px; HEIGHT: 26px">
<input type="text" id="Edit25" name="Edit25" value="<?php echo $Edit25 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:80px;" onfocus="this.className='anormal'; nextfield ='Edit26';" onblur="this.className='normal'" onchange="Salva25(this.value)"  style="text-transform: uppercase;" tabindex="3"    />
</div>
<div id="Label26_outer" style="Z-INDEX: 68; LEFT: 182px; WIDTH: 91px; POSITION: absolute; TOP: 400px; HEIGHT: 24px">
<div id="Label26" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:91px;"   > <STRONG>Situacao.:</STRONG> </div>
</div>
<div id="Edit26_outer" style="Z-INDEX: 69; LEFT: 278px; WIDTH: 58px; POSITION: absolute; TOP: 396px; HEIGHT: 26px">
<input type="text" id="Edit26" name="Edit26" value="<?php echo $Edit26 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:58px;" onfocus="this.className='anormal'; nextfield ='Edit27';" onblur="this.className='normal'" onchange="Salva26(this.value)"  style="text-transform: uppercase;" tabindex="1"    />
</div>
<div id="Label27_outer" style="Z-INDEX: 70; LEFT: 338px; WIDTH: 58px; POSITION: absolute; TOP: 400px; HEIGHT: 24px">
<div id="Label27" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:58px;"   > <STRONG>- em</STRONG> </div>
</div>
<div id="Edit27_outer" style="Z-INDEX: 71; LEFT: 375px; WIDTH: 102px; POSITION: absolute; TOP: 397px; HEIGHT: 26px">
<input type="text" id="Edit27" name="Edit27" value="<?php echo $Edit27 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:102px;" onfocus="this.className='anormal'; nextfield ='Edit28';" onblur="this.className='normal'" onkeypress="return txtBoxFormat(document.Form1, 'Edit27', '99/99/9999', event);" onchange="Salva27(this.value)"   style="text-transform: uppercase;" tabindex="3"    />
</div>
<div id="Label28_outer" style="Z-INDEX: 72; LEFT: 480px; WIDTH: 56px; POSITION: absolute; TOP: 402px; HEIGHT: 18px">
<div id="Label28" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:56px;"   > <STRONG>Nome.:</STRONG> </div>
</div>
<div id="Edit28_outer" style="Z-INDEX: 73; LEFT: 536px; WIDTH: 288px; POSITION: absolute; TOP: 397px; HEIGHT: 26px">
<input type="text" id="Edit28" name="Edit28" value="<?php echo $Edit28 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:288px;" onfocus="this.className='anormal'; nextfield ='Edit29';" onblur="this.className='normal'" onchange="Salva28(this.value)"  style="text-transform: uppercase;" tabindex="3"    />
</div>
<div id="Label29_outer" style="Z-INDEX: 74; LEFT: 182px; WIDTH: 91px; POSITION: absolute; TOP: 425px; HEIGHT: 24px">
<div id="Label29" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:91px;"   > <STRONG>Assunto.:</STRONG> </div>
</div>
<div id="Edit29_outer" style="Z-INDEX: 75; LEFT: 278px; WIDTH: 546px; POSITION: absolute; TOP: 422px; HEIGHT: 42px">
<textarea  id="Edit29" name="Edit29" style=" font-family: Verdana; font-size: 14px;  height:41px;width:546px;" onfocus="this.className='anormal'; nextfield ='done';" onblur="this.className='normal'" onchange="Salva29(this.value)"  style="text-transform: uppercase;"  tabindex="1"  wrap="virtual" > <?php echo $Edit29 ?> </textarea>
</div>

<div id="Label71_outer" style="Z-INDEX: 300; LEFT: 400px; WIDTH: 544px; POSITION: absolute; TOP: 495px; HEIGHT: 80px">
<div id="Label71" style=" font-family: Verdana; font-size: 14px; color: #ff0000;font-weight: normal; height:24px;width:403px;"   ><b><?php echo $alerta_1 ?></b></STRONG></div>
</div>

</td></tr></table>
</form></body>
</html>
<script>
function janelaSecundaria (URL){ 
   window.open(URL,"janela2","width=690,height=235,resizable=NO,status=NO,Scrollbars=NO,location=NO,menubar=NO,toolbar=NO"); 
} 
</script>

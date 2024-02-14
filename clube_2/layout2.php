<?
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
$Edit15	    = @$row0["Edit15"];
$Edit16	    = @$row0["Edit16"];
$Edit17	    = @$row0["Edit17"];
$Edit18	    = @$row0["Edit18"];
$Edit19	    = @$row0["Edit19"];
$Edit20	    = @$row0["Edit20"];
$Edit21	    = @$row0["memo1"];
$alerta_1   = @$row0["mensage1"];
$nome_do_edif = @$row0["mensage2"];
$nome_da_adms = @$row0["mensage3"];

$menssagens = "* * * Inclusao * * *";

// Abrir tabela Senha

$consulta3 = "SELECT * FROM tt_ser_01 Where login = '$nome3'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$odo1       = @$row3["odo1"];
$odo2       = @$row3["odo2"];
$odo3       = @$row3["odo3"];

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
		document.getElementById("Edit21").focus();	
		}
		
		</script>
		<?
}

if (!empty($Edit21)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit21").focus();	
		}
		
		</script>
		<?
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

<form style="margin-bottom: 0" id="Form1" name="Form1" method="post"  action="layout.php">
<table  width="936"   style="height:528px"  border="0" cellpadding="0" cellspacing="0"   align="Center" ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 128px; WIDTH: 745px; POSITION: absolute; TOP: 44px; HEIGHT: 372px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFFF");
  Shape1_Canvas.fillRect(16, 16, 713 - 16, 340 - 16);
  Shape1_Canvas.fillRect(16, 16, 713 - 16 + 1, 340 - 16 + 1);
  Shape1_Canvas.setStroke(16);
  Shape1_Canvas.setColor("#5A9CB1");
  Shape1_Canvas.drawRect(16, 16, 713 - 16 + 1, 340 - 16 + 1);
  Shape1_Canvas.paint();
</script>

</div>
<div id="Shape2_outer" style="Z-INDEX: 1; LEFT: 161px; WIDTH: 679px; POSITION: absolute; TOP: 77px; HEIGHT: 55px">
<script type="text/javascript">
  var Shape2_Canvas = new jsGraphics("Shape2_outer");
  Shape2_Canvas.setColor("#FFFFFF");
  Shape2_Canvas.fillRect(1, 1, 677 - 1, 53 - 1);
  Shape2_Canvas.fillRect(1, 1, 677 - 1 + 1, 53 - 1 + 1);
  Shape2_Canvas.setStroke(1);
  Shape2_Canvas.setColor("#5A9CB1");
  Shape2_Canvas.drawRect(1, 1, 677 - 1 + 1, 53 - 1 + 1);
  Shape2_Canvas.paint();
</script>

</div>
<div id="Menssage_outer" style="Z-INDEX: 2; LEFT: 642px; WIDTH: 174px; POSITION: absolute; TOP: 95px; HEIGHT: 24px">
<div id="Menssage" style=" font-family: Verdana; font-size: 14px;  height:24px;width:174px;"  align="Center"   ><STRONG><?=$menssagens;?></STRONG></div>
</div>
<div id="Shape3_outer" style="Z-INDEX: 3; LEFT: 161px; WIDTH: 679px; POSITION: absolute; TOP: 133px; HEIGHT: 250px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 677 - 1, 248 - 1);
  Shape3_Canvas.fillRect(1, 1, 677 - 1 + 1, 248 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("#5A9CB1");
  Shape3_Canvas.drawRect(1, 1, 677 - 1 + 1, 248 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 4; LEFT: 171px; WIDTH: 141px; POSITION: absolute; TOP: 144px; HEIGHT: 26px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:141px;"   ><P><STRONG>Login.:</STRONG></P></div>
</div>
<div id="Label11_outer" style="Z-INDEX: 5; LEFT: 171px; WIDTH: 141px; POSITION: absolute; TOP: 171px; HEIGHT: 26px">
<div id="Label11" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:141px;"   ><STRONG>Tabela.:</STRONG>&nbsp;</div>
</div>
<div id="Label12_outer" style="Z-INDEX: 6; LEFT: 171px; WIDTH: 149px; POSITION: absolute; TOP: 195px; HEIGHT: 26px">
<div id="Label12" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:149px;"   ><STRONG>Incluir.:</STRONG>&nbsp;</div>
</div>
<div id="Edit3_outer" style="Z-INDEX: 7; LEFT: 311px; WIDTH: 73px; POSITION: absolute; TOP: 190px; HEIGHT: 26px">
<select type="text" id="Edit3" name="Edit3" value="<?=$Edit3;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:73px;" onfocus="this.className='anormal'; nextfield ='Edit4';" onblur="this.className='normal'"   onchange="Salva3(this.value)" style="text-transform: uppercase;"   tabindex="5"    />

	<option value="<?=$Edit3;?>"> <?=$Edit3;?> </option>
            <option value="SIM"> SIM </option>
            <option value="NAO"> NAO </option>

</select>

</div>
<div id="Edit2_outer" style="Z-INDEX: 8; LEFT: 311px; WIDTH: 233px; POSITION: absolute; TOP: 165px; HEIGHT: 26px">
<select type="text" id="Edit2" name="Edit2" value="<?=$Edit2;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:233px;"  onfocus="this.className='anormal'; nextfield ='Edit3';" onblur="this.className='normal'"   onchange="Salva2(this.value)" style="text-transform: uppercase;"   tabindex="3"    />


<?

// iniciando a query que irá mostrar as tabelas desta base
$executa="SHOW TABLES";
	
$query=mysql_query($executa,$link) or die(mysql_error());

if (!empty($Edit2)){
	
	?>
	<option value="<?=$Edit2;?>"><?=$Edit2;?></option>
	<?
	
	while ($dados=mysql_fetch_array($query))
	{
	    // imprimindo o nome das tabelas existentes no banco
		?>
		<option value="<?=$dados[0];?>"><?=$dados[0];?></option>
		<?
	
	}
}else{

	?>
	<option value="Selecione Tabela">Selecione Tabela</option>
	<?
	
	while ($dados=mysql_fetch_array($query))
	{
	    // imprimindo o nome das tabelas existentes no banco
		?>
		<option value="<?=$dados[0];?>"><?=$dados[0];?></option>
		<?
	
	}
}	
?>
</select>

</div>
<div id="Edit1_outer" style="Z-INDEX: 9; LEFT: 311px; WIDTH: 121px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit1" name="Edit1" value="<?=$Edit1;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:121px;" disabled   tabindex="0"    />
</div>
<div id="Label3_outer" style="Z-INDEX: 10; LEFT: 171px; WIDTH: 149px; POSITION: absolute; TOP: 220px; HEIGHT: 26px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:149px;"   ><P><STRONG>Alterar.:</STRONG></P></div>
</div>
<div id="Edit6_outer" style="Z-INDEX: 13; LEFT: 311px; WIDTH: 73px; POSITION: absolute; TOP: 268px; HEIGHT: 26px">
<select type="text" id="Edit6" name="Edit6" value="<?=$Edit6;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:73px;"  onfocus="this.className='anormal'; nextfield ='done';" onblur="this.className='normal'"   onchange="Salva6(this.value)" style="text-transform: uppercase;"   tabindex="5"    />

	<option value="<?=$Edit6;?>"> <?=$Edit6;?> </option>
            <option value="SIM"> SIM </option>
            <option value="NAO"> NAO </option>

</select>

</div>
<div id="Edit5_outer" style="Z-INDEX: 14; LEFT: 311px; WIDTH: 73px; POSITION: absolute; TOP: 242px; HEIGHT: 26px">
<select input type="text" id="Edit5" name="Edit5" value="<?=$Edit5;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:73px;"  onfocus="this.className='anormal'; nextfield ='Edit6';" onblur="this.className='normal'"   onchange="Salva5(this.value)" style="text-transform: uppercase;"   tabindex="5"    />

	<option value="<?=$Edit5;?>"> <?=$Edit5;?> </option>
            <option value="SIM"> SIM </option>
            <option value="NAO"> NAO </option>

</select>

</div>
<div id="Label5_outer" style="Z-INDEX: 15; LEFT: 171px; WIDTH: 133px; POSITION: absolute; TOP: 271px; HEIGHT: 26px">
<div id="Label5" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:133px;"   ><STRONG>Imprimir.:</STRONG>&nbsp;</div>
</div>
<div id="Edit4_outer" style="Z-INDEX: 16; LEFT: 311px; WIDTH: 73px; POSITION: absolute; TOP: 216px; HEIGHT: 26px">
<select type="text" id="Edit4" name="Edit4" value="<?=$Edit4;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:73px;" onfocus="this.className='anormal'; nextfield ='Edit5';" onblur="this.className='normal'"   onchange="Salva4(this.value)" style="text-transform: uppercase;"    tabindex="5"    />

	<option value="<?=$Edit4;?>"> <?=$Edit4;?> </option>
            <option value="SIM"> SIM </option>
            <option value="NAO"> NAO </option>

</select>


</div>
<div id="Label4_outer" style="Z-INDEX: 17; LEFT: 171px; WIDTH: 133px; POSITION: absolute; TOP: 245px; HEIGHT: 26px">
<div id="Label4" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:133px;"   ><STRONG>Excluir.:</STRONG>&nbsp;</div>
</div>
<div id="Label1_outer" style="Z-INDEX: 18; LEFT: 170px; WIDTH: 393px; POSITION: absolute; TOP: 86px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: #5A9CB1; background-color: #FFFFFF;height:32px;width:393px;"   ><STRONG>Cadastro de&nbsp;Permissões</STRONG></div>
</div>
<div id="Label6_outer" style="Z-INDEX: 19; LEFT: 522px; WIDTH: 70px; POSITION: absolute; TOP: 103px; HEIGHT: 17px">
<div id="Label6" style=" font-family: Verdana; font-size: 14px;  height:17px;width:70px;"  align="Center"   ><STRONG>Poderes&nbsp;</STRONG></div>
</div>
</td></tr></table>
</form></body>
</html>

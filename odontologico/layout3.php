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

$menssagens = "* * * Alterar * * *";

// Abrir tabela Senha

$consulta3 = "SELECT * FROM tt_ser_01 Where login = '$nome3'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$odo1       = @$row3["odo1"];
$odo2       = @$row3["odo2"];
$odo3       = @$row3["odo3"];

// Consulta Dependente
$consulta4 = "SELECT * FROM socios WHERE CODP = '$Edit1'";
	
$resultado4 = @mysql_query($consulta4);

$row4 = @mysql_fetch_array($resultado4);

$dep_[1]   = $row4["CONJUGE"];
$dep_[2]   = $row4["FILHO01"];
$ani_[2]   = $row4["DAT01"];
$dep_[3]   = $row4["FILHO02"];
$ani_[3]   = $row4["DAT02"];
$dep_[4]   = $row4["FILHO03"];
$ani_[4]   = $row4["DAT03"];
$dep_[5]   = $row4["FILHO04"];
$ani_[5]   = $row4["DAT04"];
$dep_[6]   = $row4["FILHO05"];
$ani_[6]   = $row4["DAT05"];
$dep_[7]   = $row4["FILHO06"];
$ani_[7]   = $row4["DAT06"];
$dep_[8]   = $row4["FILHO07"];
$ani_[8]   = $row4["DAT07"];
$dep_[9]   = $row4["FILHO08"];
$ani_[9]   = $row4["DAT08"];
$dep_[10]  = $row4["FILHO09"];
$ani_[10]  = $row4["DAT009"];
$dep_[11]  = $row4["FILHO10"];
$ani_[11]  = $row4["DAT10"];

$si = 0;

$consulta1 = "SELECT * FROM dentista ORDER BY NOME";
	
$resultado1 = @mysql_query($consulta1);

// Procedimentos
$consulta2 = "SELECT * FROM procedi_odonto ORDER BY id";
	
$resultado2 = @mysql_query($consulta2);

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
<table  width="10"   style="height:10px"  border="0" cellpadding="0" cellspacing="0"   align="Center" ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 128px; WIDTH: 760px; POSITION: absolute; TOP: 44px; HEIGHT: 420px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFFF");
  Shape1_Canvas.fillRect(16, 16, 728 - 16, 429 - 16);
  Shape1_Canvas.fillRect(16, 16, 728 - 16 + 1, 429 - 16 + 1);
  Shape1_Canvas.setStroke(16);
  Shape1_Canvas.setColor("<?=$color_bor;?>");
  Shape1_Canvas.drawRect(16, 16, 728 - 16 + 1, 429 - 16 + 1);
  Shape1_Canvas.paint();
</script>

</div>
<div id="Shape2_outer" style="Z-INDEX: 1; LEFT: 161px; WIDTH: 694px; POSITION: absolute; TOP: 77px; HEIGHT: 55px">
<script type="text/javascript">
  var Shape2_Canvas = new jsGraphics("Shape2_outer");
  Shape2_Canvas.setColor("#FFFFFF");
  Shape2_Canvas.fillRect(1, 1, 692 - 1, 53 - 1);
  Shape2_Canvas.fillRect(1, 1, 692 - 1 + 1, 53 - 1 + 1);
  Shape2_Canvas.setStroke(1);
  Shape2_Canvas.setColor("<?=$color_bor;?>");
  Shape2_Canvas.drawRect(1, 1, 692 - 1 + 1, 53 - 1 + 1);
  Shape2_Canvas.paint();
</script>

</div>
<div id="Label1_outer" style="Z-INDEX: 2; LEFT: 178px; WIDTH: 518px; POSITION: absolute; TOP: 86px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: <?=$color_bor;?>; background-color: #FFFFFF;height:32px;width:518px;"   ><P><STRONG>Atendimento Odontologico</STRONG></P></div>
</div>
<div id="Menssage_outer" style="Z-INDEX: 3; LEFT: 666px; WIDTH: 174px; POSITION: absolute; TOP: 95px; HEIGHT: 24px">
<div id="Menssage" style=" font-family: Verdana; font-size: 14px;  height:24px;width:174px;"  align="Center"   ><STRONG><?=$menssagens;?></STRONG></div>
</div>
<div id="Shape3_outer" style="Z-INDEX: 4; LEFT: 161px; WIDTH: 694px; POSITION: absolute; TOP: 133px; HEIGHT: 299px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 692 - 1, 337 - 1);
  Shape3_Canvas.fillRect(1, 1, 692 - 1 + 1, 337 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("<?=$color_bor;?>");
  Shape3_Canvas.drawRect(1, 1, 692 - 1 + 1, 337 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 5; LEFT: 171px; WIDTH: 141px; POSITION: absolute; TOP: 144px; HEIGHT: 26px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:141px;"   ><P><STRONG>Matricula.:</STRONG></P></div>
</div>
<div id="Edit1_outer" style="Z-INDEX: 10; LEFT: 311px; WIDTH: 89px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit1" name="Edit1" value="<?=$Edit1;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:89px;"  onfocus="this.className='anormal'; nextfield ='Edit2';" onblur="this.className='normal'"   onchange="Salva1(this.value)" style="text-transform: uppercase;" tabindex="0"    />
</div>
<div id="Label11_outer" style="Z-INDEX: 6; LEFT: 171px; WIDTH: 141px; POSITION: absolute; TOP: 171px; HEIGHT: 26px">
<div id="Label11" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:141px;"   ><STRONG>Titular Socio.:</STRONG>&nbsp;</div>
</div>
<div id="Edit2_outer" style="Z-INDEX: 9; LEFT: 311px; WIDTH: 441px; POSITION: absolute; TOP: 165px; HEIGHT: 26px">
<input type="text" id="Edit2" name="Edit2" value="<?=$Edit2;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:441px;"   onfocus="this.className='anormal'; nextfield ='Edit3';" onblur="this.className='normal'"   onchange="Salva2(this.value)" style="text-transform: uppercase;"  tabindex="3"    />
</div>
<div id="Label12_outer" style="Z-INDEX: 7; LEFT: 171px; WIDTH: 149px; POSITION: absolute; TOP: 195px; HEIGHT: 26px">
<div id="Label12" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:149px;"   ><STRONG>Ultimo Pagto.:</STRONG>&nbsp;</div>
</div>
<div id="Edit3_outer" style="Z-INDEX: 8; LEFT: 311px; WIDTH: 49px; POSITION: absolute; TOP: 190px; HEIGHT: 26px">
<input type="text" id="Edit3" name="Edit3" value="<?=$Edit3;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:49px;"   onfocus="this.className='anormal'; nextfield ='Edit4';" onblur="this.className='normal'"   onchange="Salva3(this.value)" style="text-transform: uppercase;" disabled tabindex="5"    />
</div>
<div id="Label3_outer" style="Z-INDEX: 11; LEFT: 171px; WIDTH: 149px; POSITION: absolute; TOP: 220px; HEIGHT: 26px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:149px;"   ><P><STRONG>Dependentes.:</STRONG></P></div>
</div>
<div id="Edit4_outer" style="Z-INDEX: 12; LEFT: 374px; WIDTH: 81px; POSITION: absolute; TOP: 190px; HEIGHT: 26px">
<input type="text" id="Edit4" name="Edit4" value="<?=$Edit4;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:81px;"   onfocus="this.className='anormal'; nextfield ='Edit5';" onblur="this.className='normal'"   onchange="Salva4(this.value)" style="text-transform: uppercase;" disabled tabindex="5"    />
</div>
<div id="Label13_outer" style="Z-INDEX: 15; LEFT: 361px; WIDTH: 13px; POSITION: absolute; TOP: 194px; HEIGHT: 26px">
<div id="Label13" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:13px;"   ><P><STRONG>/</STRONG></P></div>
</div>
<div id="Edit5_outer" style="Z-INDEX: 19; LEFT: 311px; WIDTH: 441px; POSITION: absolute; TOP: 216px; HEIGHT: 26px">

<select type="text" id="Edit5" name="Edit5" value="<?=$Edit5;?>"  style=" font-family: Verdana; font-size: 14px; height:26px;width:441px;"   onfocus="this.className='anormal'; nextfield ='Edit6';" onblur="this.className='normal'"  onchange="Salva5(this.value)" style="text-transform: uppercase;" tabindex="5"    />

<?

if (!empty($Edit5)){
	
	?>
	<option value="<?=$Edit5;?>"><?=$Edit5;?></option>
	<option value="<?=$dep_[1];?>"><?=$dep_[1];?></option>
	<?	
	
	for ($si = 2; $si < 11; $si++){
		
		$Edit5 = $dep_[$si];
		
		if (!empty($Edit5)){

           $soma1 = date('Y') - substr($ani_[$si],6,4);
           
           if ($soma1 >= 18){ 
           	
			   ?>
			   <option value="<?=$Edit5;?>"><?=$Edit5;?>|&nbsp;<b>e Maior de 18 anos</b></option>
			   <?
			   
			   
		   }else{
		   	
			   ?>
			   <option value="<?=$Edit5;?>"><?=$Edit5;?></option>
			   <?
		   	  
		   }

		}
	}

}else{

	?>
	<option value="TITULAR">TITULAR</option>
	<?	
	
	for ($si = 1; $si < 11; $si++){
		
		$Edit5 = $dep_[$si];
		
		if (!empty($Edit5)){
	    ?>
	      <option value="<?=$Edit5;?>"><?=$Edit5;?></option>
	    <?
		}
	}
	
}

?>

</select>

</div>
<div id="Edit6_outer" style="Z-INDEX: 17; LEFT: 311px; WIDTH: 441px; POSITION: absolute; TOP: 239px; HEIGHT: 26px">
<select type="text" id="Edit6" name="Edit6" value="<?=$Edit6;?>" style=" font-family: Verdana; font-size: 14px;  height:26px;width:441px;"   onfocus="this.className='anormal'; nextfield ='Edit7';" onblur="this.className='normal'"   onchange="Salva6(this.value)" style="text-transform: uppercase;"  tabindex="6"    />



<?

if (!empty($Edit6)){
	
	?>
	<option value="<?=$Edit6;?>"><?=$Edit6;?></option>
	<?	

	while ($linha1 = mysql_fetch_array($resultado1))
	{
	       $nome_de_0  = $linha1["NOME"];
	       ?>
	       <option value="<?=$nome_de_0;?>"><?=$nome_de_0;?></option>
	       <?
	}

}else{
	
	?>
	<option value="Selecione">Selecione</option>
	<?
	
	while ($linha1 = mysql_fetch_array($resultado1))
	{
	       $nome_de_0  = $linha1["NOME"];
	       ?>
	       <option value="<?=$nome_de_0;?>"><?=$nome_de_0;?></option>
	       <?
	}

}
?>
</select>




</div>

<div id="Edit7_outer" style="Z-INDEX: 16; LEFT: 311px; WIDTH: 441px; POSITION: absolute; TOP: 263px; HEIGHT: 26px">
<select type="text" id="Edit7" name="Edit7" value="<?=$Edit7;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:441px;"   onfocus="this.className='anormal'; nextfield ='done';" onblur="this.className='normal'"   onchange="Salva7(this.value)" style="text-transform: uppercase;" tabindex="7"    />

<?

if (!empty($Edit7)){
	
	?>
	<option value="<?=$Edit7;?>"><?=$Edit7;?></option>
	<?

	while ($linha2 = mysql_fetch_array($resultado2))
	{
	       $nome_de_2  = $linha2["procedimento"];
	       ?>
	       <option value="<?=$nome_de_2;?>"><?=$nome_de_2;?></option>
	       <?
	}
}else{
    ?>	
    <option value="Selecione">Selecione</option>
    <?
	while ($linha2 = mysql_fetch_array($resultado2))
	{
	       $nome_de_2  = $linha2["procedimento"];
	       ?>
	       <option value="<?=$nome_de_2;?>"><?=$nome_de_2;?></option>
	       <?
	}
}	
?>
</select>

</div>
<div id="Label5_outer" style="Z-INDEX: 18; LEFT: 171px; WIDTH: 133px; POSITION: absolute; TOP: 271px; HEIGHT: 26px">
<div id="Label5" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:133px;"   ><STRONG>Procedimentos.:</STRONG>&nbsp;</div>
</div>
<div id="Label4_outer" style="Z-INDEX: 20; LEFT: 171px; WIDTH: 133px; POSITION: absolute; TOP: 245px; HEIGHT: 26px">
<div id="Label4" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:133px;"   ><STRONG>Dentista.:</STRONG>&nbsp;</div>
</div>
<div id="Label6_outer" style="Z-INDEX: 21; LEFT: 171px; WIDTH: 181px; POSITION: absolute; TOP: 301px; HEIGHT: 26px">
<div id="Label6" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:181px;"   ><STRONG>Ultimo Atendimento.:</STRONG>&nbsp;</div>
</div>
</td></tr></table>
</form></body>
</html>

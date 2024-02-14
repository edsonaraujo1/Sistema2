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

// Abre Tabela Tenporaria

$nome3a = strtolower($nome3);

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
$Edit10		= @$row0["Edit10"];
$Edit11		= @$row0["Edit11"];
$Edit12		= @$row0["Edit12"];
$Edit13		= @$row0["Edit13"];
$Edit14		= @$row0["Edit14"];
$Edit15		= @$row0["Edit15"];
$Edit16		= @$row0["Edit16"];
$Edit17		= @$row0["Edit17"];
$Edit18		= @$row0["Edit18"];
$Edit19		= @$row0["Edit19"];
$Edit20		= @$row0["Edit20"];
$Edit21		= @$row0["Edit21"];
$Edit22	    = @$row0["memo1"];
$Edit24	    = @$row0["Edit24"];
$alerta_1   = @$row0["mensage1"];
$categ_1    = @$row0["mensage2"];
$nome_do_edif = @$row0["mensage3"];
$nome_cad_si  = @$row0["mensage4"];
$id           = @$row0["mensage6"];

$alerta_1 = $alerta_1;
$nome2_adms = $nome_do_edif; 

$new_fot = trim($Edit1.$Edit24);

$cami2 = '../imagens/fotos/Branco.bmp';  

$menssagens = "* * * Alterar * * *";

// Abrir tabela Senha

$tabela_1 = strtoupper('clube_tiete');

$consulta3 = "SELECT * FROM permissoes WHERE login = '$nome3' and tabela = '$tabela_1'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$per1       = @$row3["incluir"];
$per2       = @$row3["alterar"];
$per3       = @$row3["excluir"];
$per4       = @$row3["imprimir"];

// Consulta Dependente
$consulta4 = "SELECT * FROM socios WHERE CODP = '$Edit2'";
	
$resultado4 = @mysql_query($consulta4);

$row4 = @mysql_fetch_array($resultado4);

$dep_[1]   = $row4["CONJUGE"];
$dep_[2]   = trim($row4["FILHO01"]);
$ani_[2]   = trim($row4["DAT01"]);
$dep_[3]   = trim($row4["FILHO02"]);
$ani_[3]   = trim($row4["DAT02"]);
$dep_[4]   = trim($row4["FILHO03"]);
$ani_[4]   = trim($row4["DAT03"]);
$dep_[5]   = trim($row4["FILHO04"]);
$ani_[5]   = trim($row4["DAT04"]);
$dep_[6]   = trim($row4["FILHO05"]);
$ani_[6]   = trim($row4["DAT05"]);
$dep_[7]   = trim($row4["FILHO06"]);
$ani_[7]   = trim($row4["DAT06"]);
$dep_[8]   = trim($row4["FILHO07"]);
$ani_[8]   = trim($row4["DAT07"]);
$dep_[9]   = trim($row4["FILHO08"]);
$ani_[9]   = trim($row4["DAT08"]);
$dep_[10]  = trim($row4["FILHO09"]);
$ani_[10]  = trim($row4["DAT009"]);
$dep_[11]  = trim($row4["FILHO10"]);
$ani_[11]  = trim($row4["DAT10"]);

$si = 0;



$consulta10 = "SELECT * FROM tb_quarta WHERE codp = '$new_fot'";
	
$resultado10 = @mysql_query($consulta10);

$row10 = @mysql_fetch_array($resultado10);

$id_9 	   = @$row10["codp"];
$id_imagem = @$row10["id_imagem"];

if(!empty($id_imagem)){
	
   $mostra_branco = "faz";	
}else{
   $mostra_branco = "nao";	
	
}	

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
		document.getElementById("done").focus();	
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
		window.location="cadastro.php?cod_5=<?=$id;?>";
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
<title><?=$Titulo;?></title>
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

<form style="margin-bottom: 0" id="Form1" name="Form1" method="post"  action="layout2.php">
<table  width="10"   style="height:10px"  border="0" cellpadding="0" cellspacing="0"   align="Center" ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 141px; WIDTH: 724px; POSITION: absolute; TOP: 44px; HEIGHT: 540px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(16, 16, 692 - 16, 508 - 16);
  Shape1_Canvas.fillRect(16, 16, 692 - 16 + 1, 508 - 16 + 1);
  Shape1_Canvas.setStroke(16);
  Shape1_Canvas.setColor("<?=$color_bor;?>");
  Shape1_Canvas.drawRect(16, 16, 692 - 16 + 1, 508 - 16 + 1);
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
<div id="Label1_outer" style="Z-INDEX: 2; LEFT: 183px; WIDTH: 377px; POSITION: absolute; TOP: 90px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: <?=$color_bor;?>; background-color: #FFFFFF;height:32px;width:377px;"   ><P><STRONG>Cadastro Convenio Clube</STRONG></P></div>
</div>
<div id="Menssage_outer" style="Z-INDEX: 3; LEFT: 614px; WIDTH: 208px; POSITION: absolute; TOP: 95px; HEIGHT: 24px">
<div id="Menssage" style=" font-family: Verdana; font-size: 14px;  height:24px;width:208px;"  align="Center"   ><STRONG><?=$menssagens;?></STRONG></div>
</div>
<div id="Shape3_outer" style="Z-INDEX: 4; LEFT: 174px; WIDTH: 658px; POSITION: absolute; TOP: 133px; HEIGHT: 418px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 656 - 1, 416 - 1);
  Shape3_Canvas.fillRect(1, 1, 656 - 1 + 1, 416 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("<?=$color_bor;?>");
  Shape3_Canvas.drawRect(1, 1, 656 - 1 + 1, 416 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 5; LEFT: 184px; WIDTH: 99px; POSITION: absolute; TOP: 145px; HEIGHT: 23px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:23px;width:99px;"   ><STRONG>Codigo Nº.:</STRONG></div>
</div>
<div id="Edit1_outer" style="Z-INDEX: 6; LEFT: 305px; WIDTH: 95px; POSITION: absolute; TOP: 141px; HEIGHT: 26px">
<input type="text" id="Edit1" name="Edit1" value="<?=$Edit1.$Edit24;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:95px;" onfocus="this.className='anormal'; nextfield ='Edit2';" onblur="this.className='normal'"  disabled  tabindex="0"    />
</div>
<div id="Label3_outer" style="Z-INDEX: 7; LEFT: 412px; WIDTH: 108px; POSITION: absolute; TOP: 145px; HEIGHT: 23px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:23px;width:108px;"   ><STRONG>Matricula&nbsp;Nº.:</STRONG></div>
</div>
<div id="Edit2_outer" style="Z-INDEX: 8; LEFT: 521px; WIDTH: 95px; POSITION: absolute; TOP: 141px; HEIGHT: 26px">
<input type="text" id="Edit2" name="Edit2" value="<?=$Edit2;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:95px;" onfocus="this.className='anormal'; nextfield ='Edit3';" onblur="this.className='normal'"  onchange="Salva2(this.value)" style="text-transform: uppercase;" disabled tabindex="0"    />
</div>
<div id="Label4_outer" style="Z-INDEX: 9; LEFT: 644px; WIDTH: 60px; POSITION: absolute; TOP: 145px; HEIGHT: 23px">
<div id="Label4" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:23px;width:60px;"   ><STRONG>Data.:</STRONG></div>
</div>
<div id="Edit3_outer" style="Z-INDEX: 10; LEFT: 697px; WIDTH: 111px; POSITION: absolute; TOP: 141px; HEIGHT: 26px">
<input type="text" id="Edit3" name="Edit3" value="<?=$Edit3;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:111px;" onfocus="this.className='anormal'; nextfield ='Edit4';" onblur="this.className='normal'"  onchange="Salva3(this.value)" disabled  tabindex="0"    />
</div>
<div id="Label5_outer" style="Z-INDEX: 11; LEFT: 184px; WIDTH: 99px; POSITION: absolute; TOP: 171px; HEIGHT: 23px">
<div id="Label5" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:23px;width:99px;"   ><STRONG>Titular.:</STRONG></div>
</div>

<div id="Edit4_outer" style="Z-INDEX: 12; LEFT: 305px; WIDTH: 391px; POSITION: absolute; TOP: 167px; HEIGHT: 26px">
<input type="text" id="Edit4" name="Edit4" value="<?=$Edit4;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:391px;" onfocus="this.className='anormal'; nextfield ='Edit5';" onblur="this.className='normal'"  onchange="Salva4(this.value)" style="text-transform: uppercase;" tabindex="0"    />

</div>
<div id="Label6_outer" style="Z-INDEX: 13; LEFT: 184px; WIDTH: 115px; POSITION: absolute; TOP: 197px; HEIGHT: 23px">
<div id="Label6" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:23px;width:115px;"   ><STRONG>Sexo.:</STRONG></div>
</div>
<div id="Edit5_outer" style="Z-INDEX: 14; LEFT: 305px; WIDTH: 47px; POSITION: absolute; TOP: 193px; HEIGHT: 26px">
<select type="text" id="Edit5" name="Edit5" value="<?=$Edit5;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:47px;" onfocus="this.className='anormal'; nextfield ='Edit6';" onblur="this.className='normal'"  onchange="Salva5(this.value)" style="text-transform: uppercase;"  tabindex="0"    />

<?

if (!empty($Edit5))
{
?>	
	<option value="<?=$Edit5;?>"> <?=$Edit5;?> </option>
            <option value=".">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>

<?	

}else{
	
?>	
            <option value=" ">  </option>
            <option value=".">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>
<?            
 }
?>

</select>


</div>



<div id="Image2_outer" style="Z-INDEX: 16; LEFT: 711px; WIDTH: 92px; POSITION: absolute; TOP: 293px; HEIGHT: 22px">
<div id="Image2_container" style=" width: 92;  height: 22; overflow: hidden;" ><img id="Image2" src="../imagens/botaoazul17.PNG"  width="92"  height="22"  border="0"       /></div>
</div>

<?

// salva Secao
session_name("Photto1");
session_start();
$_SESSION['codp'] = $new_fot;
//$new_fot = $_SESSION['codp'];


   if($mostra_branco == "faz"){
   ?>	

<div id="Image1_outer" style="Z-INDEX: 15; LEFT: 704px; WIDTH: 104px; POSITION: absolute; TOP: 176px; HEIGHT: 112px">
<div id="Image1_container" style=" width: 104;  height: 112; overflow: hidden;" ><A href="cadastro.php?cod_5=<?=$id;?>"><img id="Image1" src="ver.php?new_fot=<?=$new_fot;?>"  width="104"  height="112"  border="0"       /></a></div>
</div>

<?
}else{
?>

<div id="Image1_outer" style="Z-INDEX: 15; LEFT: 704px; WIDTH: 104px; POSITION: absolute; TOP: 176px; HEIGHT: 112px">
<div id="Image1_container" style=" width: 104;  height: 112; overflow: hidden;" ><A href="cadastro.php?cod_5=<?=$id;?>"><img id="Image1" src="<?=$cami2;?>"  width="104"  height="112"  border="0"       /></a></div>
</div>

<?
}
?>


<div id="Label7_outer" style="Z-INDEX: 17; LEFT: 364px; WIDTH: 89px; POSITION: absolute; TOP: 197px; HEIGHT: 23px">
<div id="Label7" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:23px;width:89px;"   ><STRONG>Dat. Nasc.:</STRONG></div>
</div>
<div id="Edit6_outer" style="Z-INDEX: 18; LEFT: 453px; WIDTH: 120px; POSITION: absolute; TOP: 193px; HEIGHT: 26px">
<input type="text" id="Edit6" name="Edit6" value="<?=$Edit6;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:120px;" onfocus="this.className='anormal'; nextfield ='Edit7';" onblur="this.className='normal'" onkeypress="return txtBoxFormat(document.Form1, 'Edit6', '99/99/9999', event);" onchange="Salva6(this.value)" style="text-transform: uppercase;"  tabindex="0"    />
</div>
<div id="Label8_outer" style="Z-INDEX: 19; LEFT: 184px; WIDTH: 120px; POSITION: absolute; TOP: 222px; HEIGHT: 23px">
<div id="Label8" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:23px;width:120px;"   ><STRONG>Nacionalidade.:</STRONG></div>
</div>
<div id="Edit7_outer" style="Z-INDEX: 20; LEFT: 305px; WIDTH: 151px; POSITION: absolute; TOP: 218px; HEIGHT: 26px">
<input type="text" id="Edit7" name="Edit7" value="<?=$Edit7;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:151px;" onfocus="this.className='anormal'; nextfield ='Edit8';" onblur="this.className='normal'"  onchange="Salva7(this.value)" style="text-transform: uppercase;"  tabindex="0"    />
</div>
<div id="Label9_outer" style="Z-INDEX: 21; LEFT: 461px; WIDTH: 67px; POSITION: absolute; TOP: 223px; HEIGHT: 23px">
<div id="Label9" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:23px;width:67px;"   ><STRONG>Natural.:</STRONG></div>
</div>
<div id="Edit8_outer" style="Z-INDEX: 22; LEFT: 528px; WIDTH: 168px; POSITION: absolute; TOP: 217px; HEIGHT: 26px">
<input type="text" id="Edit8" name="Edit8" value="<?=$Edit8;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:168px;" onfocus="this.className='anormal'; nextfield ='Edit9';" onblur="this.className='normal'"  onchange="Salva8(this.value)" style="text-transform: uppercase;"  tabindex="0"    />
</div>
<div id="Label10_outer" style="Z-INDEX: 23; LEFT: 184px; WIDTH: 120px; POSITION: absolute; TOP: 247px; HEIGHT: 23px">
<div id="Label10" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:23px;width:120px;"   ><STRONG>Escolaridade.:</STRONG></div>
</div>
<div id="Edit9_outer" style="Z-INDEX: 24; LEFT: 305px; WIDTH: 151px; POSITION: absolute; TOP: 245px; HEIGHT: 26px">
<select type="text" id="Edit9" name="Edit9" value="<?=$Edit9;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:151px;" onfocus="this.className='anormal'; nextfield ='Edit10';" onblur="this.className='normal'"  onchange="Salva9(this.value)" style="text-transform: uppercase;"  tabindex="0"    />

<?

if (!empty($Edit9))
{
?>	
	<option value="<?=$Edit9;?>"> <?=$Edit9;?> </option>
            <option value=".">  </option>
            <option value="ENSINO FUNDAMENTAL"> ENSINO FUNDAMENTAL </option>
            <option value="FUNDAMENTAL INCOMPLETO"> FUNDAMENTAL INCOMPLETO</option>
            <option value="ENSINO MEDIO"> ENSINO MEDIO </option>
            <option value="MEDIO INCOMPLETO"> MEDIO INCOMPLETO </option>
            <option value="SUPERIOR"> SUPERIOR </option>
            <option value="SUPERIOR INCOMPLETO"> SUPERIOR INCOMPLETO </option>
            <option value="NAO ANALFABETIZADO"> NAO ANALFABETIZADO </option>

<?	

}else{
	
?>	
            <option value=" ">  </option>
            <option value=".">  </option>
            <option value="ENSINO FUNDAMENTAL"> ENSINO FUNDAMENTAL </option>
            <option value="FUNDAMENTAL INCOMPLETO"> FUNDAMENTAL INCOMPLETO</option>
            <option value="ENSINO MEDIO"> ENSINO MEDIO </option>
            <option value="MEDIO INCOMPLETO"> MEDIO INCOMPLETO </option>
            <option value="SUPERIOR"> SUPERIOR </option>
            <option value="SUPERIOR INCOMPLETO"> SUPERIOR INCOMPLETO </option>
            <option value="NAO ANALFABETIZADO"> NAO ANALFABETIZADO </option>
<?            
 }
?>

</select>

</div>
<div id="Label11_outer" style="Z-INDEX: 25; LEFT: 496px; WIDTH: 107px; POSITION: absolute; TOP: 248px; HEIGHT: 23px">
<div id="Label11" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:23px;width:107px;"   ><STRONG>Est. Civil.:</STRONG></div>
</div>
<div id="Edit10_outer" style="Z-INDEX: 26; LEFT: 576px; WIDTH: 120px; POSITION: absolute; TOP: 242px; HEIGHT: 26px">
<input type="text" id="Edit10" name="Edit10" value="<?=$Edit10;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:120px;" onfocus="this.className='anormal'; nextfield ='Edit11';" onblur="this.className='normal'"  onchange="Salva10(this.value)" style="text-transform: uppercase;"  tabindex="0"    />
</div>
<div id="Label12_outer" style="Z-INDEX: 27; LEFT: 184px; WIDTH: 120px; POSITION: absolute; TOP: 273px; HEIGHT: 23px">
<div id="Label12" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:23px;width:120px;"   ><STRONG>Endereco.:</STRONG></div>
</div>
<div id="Edit11_outer" style="Z-INDEX: 28; LEFT: 305px; WIDTH: 391px; POSITION: absolute; TOP: 269px; HEIGHT: 26px">
<input type="text" id="Edit11" name="Edit11" value="<?=$Edit11;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:391px;" onfocus="this.className='anormal'; nextfield ='Edit12';" onblur="this.className='normal'"  onchange="Salva11(this.value)" style="text-transform: uppercase;"  tabindex="0"    />
</div>
<div id="Label13_outer" style="Z-INDEX: 29; LEFT: 184px; WIDTH: 120px; POSITION: absolute; TOP: 299px; HEIGHT: 23px">
<div id="Label13" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:23px;width:120px;"   ><STRONG>Bairro.:</STRONG></div>
</div>
<div id="Edit12_outer" style="Z-INDEX: 30; LEFT: 305px; WIDTH: 151px; POSITION: absolute; TOP: 295px; HEIGHT: 26px">
<input type="text" id="Edit12" name="Edit12" value="<?=$Edit12;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:151px;" onfocus="this.className='anormal'; nextfield ='Edit13';" onblur="this.className='normal'"  onchange="Salva12(this.value)" style="text-transform: uppercase;" tabindex="0"    />
</div>
<div id="Label14_outer" style="Z-INDEX: 31; LEFT: 478px; WIDTH: 48px; POSITION: absolute; TOP: 299px; HEIGHT: 23px">
<div id="Label14" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:23px;width:48px;"   ><STRONG>CEP.:</STRONG></div>
</div>
<div id="Edit13_outer" style="Z-INDEX: 32; LEFT: 529px; WIDTH: 167px; POSITION: absolute; TOP: 295px; HEIGHT: 26px">
<input type="text" id="Edit13" name="Edit13" value="<?=$Edit13;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:167px;" onfocus="this.className='anormal'; nextfield ='Edit14';" onblur="this.className='normal'"  onkeypress="return txtBoxFormat(document.Form1, 'Edit13', '99999-999', event);" onchange="Salva13(this.value)" style="text-transform: uppercase;"  tabindex="0"    />
</div>
<div id="Label15_outer" style="Z-INDEX: 33; LEFT: 184px; WIDTH: 120px; POSITION: absolute; TOP: 325px; HEIGHT: 23px">
<div id="Label15" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:23px;width:120px;"   ><STRONG>Cidade.:</STRONG></div>
</div>
<div id="Edit14_outer" style="Z-INDEX: 34; LEFT: 305px; WIDTH: 151px; POSITION: absolute; TOP: 321px; HEIGHT: 26px">
<input type="text" id="Edit14" name="Edit14" value="<?=$Edit14;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:151px;" onfocus="this.className='anormal'; nextfield ='Edit15';" onblur="this.className='normal'"  onchange="Salva14(this.value)" style="text-transform: uppercase;"  tabindex="0"    />
</div>
<div id="Label16_outer" style="Z-INDEX: 35; LEFT: 481px; WIDTH: 48px; POSITION: absolute; TOP: 325px; HEIGHT: 23px">
<div id="Label16" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:23px;width:48px;"   ><STRONG>UF.:</STRONG></div>
</div>
<div id="Edit15_outer" style="Z-INDEX: 36; LEFT: 529px; WIDTH: 63px; POSITION: absolute; TOP: 323px; HEIGHT: 26px">
<select type="text" id="Edit15" name="Edit15" value="<?=$Edit15;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:63px;" onfocus="this.className='anormal'; nextfield ='Edit16';" onblur="this.className='normal'"  onchange="Salva15(this.value)" style="text-transform: uppercase;"  tabindex="0"    />

<?

if (!empty($Edit15))
{
?>	
	<option value="<?=$Edit15;?>"> <?=$Edit15;?> </option>
            <option value="SP"> SP </option>
            <option value="AC"> AC </option>
            <option value="AL"> AL </option>
            <option value="AM"> AM </option>
            <option value="AP"> AP </option>
            <option value="BA"> BA </option>
            <option value="CE"> CE </option>
            <option value="DF"> DF </option>
            <option value="ES"> ES </option>
            <option value="GO"> GO </option>
            <option value="MA"> MA </option>
            <option value="MG"> MG </option>
            <option value="MS"> MS </option>
            <option value="MT"> MT </option>
            <option value="PA"> PA </option>
            <option value="PB"> PB </option>
            <option value="PE"> PE </option>
            <option value="PI"> PI </option>
            <option value="PR"> PR </option>
            <option value="RN"> RN </option>
            <option value="RO"> RO </option>
            <option value="RR"> RR </option>
            <option value="RJ"> RJ </option>
            <option value="RS"> RS </option>
            <option value="SC"> SC </option>
            <option value="SE"> SE </option>
            <option value="TO"> TO </option>

<?	

}else{
	
?>	
            <option value=" ">  </option>
            <option value="SP"> SP </option>
            <option value="AC"> AC </option>
            <option value="AL"> AL </option>
            <option value="AM"> AM </option>
            <option value="AP"> AP </option>
            <option value="BA"> BA </option>
            <option value="CE"> CE </option>
            <option value="DF"> DF </option>
            <option value="ES"> ES </option>
            <option value="GO"> GO </option>
            <option value="MA"> MA </option>
            <option value="MG"> MG </option>
            <option value="MS"> MS </option>
            <option value="MT"> MT </option>
            <option value="PA"> PA </option>
            <option value="PB"> PB </option>
            <option value="PE"> PE </option>
            <option value="PI"> PI </option>
            <option value="PR"> PR </option>
            <option value="RN"> RN </option>
            <option value="RO"> RO </option>
            <option value="RR"> RR </option>
            <option value="RJ"> RJ </option>
            <option value="RS"> RS </option>
            <option value="SC"> SC </option>
            <option value="SE"> SE </option>
            <option value="TO"> TO </option>
<?            
 }
?>

</select>

</div>

<div id="Label17_outer" style="Z-INDEX: 37; LEFT: 599px; WIDTH: 120px; POSITION: absolute; TOP: 325px; HEIGHT: 23px">
<div id="Label17" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:23px;width:120px;"   ><STRONG>Fone.:</STRONG></div>
</div>
<div id="Edit16_outer" style="Z-INDEX: 38; LEFT: 656px; WIDTH: 152px; POSITION: absolute; TOP: 321px; HEIGHT: 26px">
<input type="text" id="Edit16" name="Edit16" value="<?=$Edit16;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:152px;" onfocus="this.className='anormal'; nextfield ='Edit17';" onblur="this.className='normal'"  onchange="Salva16(this.value)" style="text-transform: uppercase;"  tabindex="0"    />
</div>
<div id="Label18_outer" style="Z-INDEX: 39; LEFT: 185px; WIDTH: 48px; POSITION: absolute; TOP: 351px; HEIGHT: 23px">
<div id="Label18" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:23px;width:48px;"   ><STRONG>Cel.:</STRONG></div>
</div>
<div id="Edit17_outer" style="Z-INDEX: 40; LEFT: 305px; WIDTH: 151px; POSITION: absolute; TOP: 347px; HEIGHT: 26px">
<input type="text" id="Edit17" name="Edit17" value="<?=$Edit17;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:151px;" onfocus="this.className='anormal'; nextfield ='Edit18';" onblur="this.className='normal'"  onchange="Salva17(this.value)" style="text-transform: uppercase;"  tabindex="0"    />
</div>
<div id="Label19_outer" style="Z-INDEX: 41; LEFT: 468px; WIDTH: 72px; POSITION: absolute; TOP: 352px; HEIGHT: 23px">
<div id="Label19" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:23px;width:72px;"   ><STRONG>E-mail.:</STRONG></div>
</div>
<div id="Edit18_outer" style="Z-INDEX: 42; LEFT: 529px; WIDTH: 279px; POSITION: absolute; TOP: 347px; HEIGHT: 26px">
<input type="text" id="Edit18" name="Edit18" value="<?=$Edit18;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:279px;" onfocus="this.className='anormal'; nextfield ='Edit19';" onblur="this.className='normal'"  onchange="Salva18(this.value)" tabindex="0"    />
</div>
<div id="Label20_outer" style="Z-INDEX: 43; LEFT: 185px; WIDTH: 96px; POSITION: absolute; TOP: 377px; HEIGHT: 23px">
<div id="Label20" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:23px;width:96px;"   ><STRONG>CPF.:</STRONG></div>
</div>
<div id="Edit19_outer" style="Z-INDEX: 44; LEFT: 305px; WIDTH: 175px; POSITION: absolute; TOP: 373px; HEIGHT: 26px">
<input type="text" id="Edit19" name="Edit19" value="<?=$Edit19;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:175px;" onfocus="this.className='anormal'; nextfield ='Edit20';" onblur="this.className='normal'"    onkeypress="return txtBoxFormat(document.Form1, 'Edit19', '999.999.999-99', event);" onchange="Salva19(this.value)" style="text-transform: uppercase;"  tabindex="0"    />
</div>
<div id="Label21_outer" style="Z-INDEX: 45; LEFT: 494px; WIDTH: 38px; POSITION: absolute; TOP: 377px; HEIGHT: 23px">
<div id="Label21" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:23px;width:38px;"   ><STRONG>RG.:</STRONG></div>
</div>
<div id="Edit20_outer" style="Z-INDEX: 46; LEFT: 529px; WIDTH: 167px; POSITION: absolute; TOP: 373px; HEIGHT: 26px">
<input type="text" id="Edit20" name="Edit20" value="<?=$Edit20;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:167px;" onfocus="this.className='anormal'; nextfield ='Edit21';" onblur="this.className='normal'"  onchange="Salva20(this.value)" style="text-transform: uppercase;"  tabindex="0"    />
</div>
<div id="Label22_outer" style="Z-INDEX: 47; LEFT: 702px; WIDTH: 38px; POSITION: absolute; TOP: 377px; HEIGHT: 23px">
<div id="Label22" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:23px;width:38px;"   ><STRONG>Org.:</STRONG></div>
</div>
<div id="Edit21_outer" style="Z-INDEX: 48; LEFT: 737px; WIDTH: 71px; POSITION: absolute; TOP: 373px; HEIGHT: 26px">
<input type="text" id="Edit21" name="Edit21" value="<?=$Edit21;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:71px;" onfocus="this.className='anormal'; nextfield ='Edit22';" onblur="this.className='normal'"  onchange="Salva21(this.value)" style="text-transform: uppercase;"   tabindex="0"    />
</div>
<div id="Label23_outer" style="Z-INDEX: 49; LEFT: 185px; WIDTH: 38px; POSITION: absolute; TOP: 402px; HEIGHT: 23px">
<div id="Label23" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:23px;width:38px;"   ><STRONG>Obs.:</STRONG></div>
</div>
<div id="Edit22_outer" style="Z-INDEX: 50; LEFT: 305px; WIDTH: 503px; POSITION: absolute; TOP: 398px; HEIGHT: 58px">
<textarea id="Edit22" name="Edit22"  style=" font-family: Verdana; font-size: 14px;  height:57px;width:503px; " onfocus="this.className='anormal'; nextfield ='done';" onblur="this.className='normal'"  onchange="Salva22(this.value)" tabindex="0"    /><?=$Edit22;?></textarea>
</div>
</td></tr></table>
</form></body>
</html>
<script>
function janelaSecundaria (URL){ 
   window.open(URL,"janela2","width=690,height=235,resizable=NO,status=NO,Scrollbars=NO,location=NO,menubar=NO,toolbar=NO"); 
} 
</script>

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

$Edit0      = @$row0["Edit0"]; 
$Edit1      = @$row0["Edit1"]; 
$Edit2		= @$row0["Edit2"]; 
$Edit3		= @$row0["Edit3"]; 
$Edit4		= @$row0["Edit4"];
$Edit5		= @$row0["Edit5"];
$Edit6		= @$row0["Edit6"];
$Edit7		= @$row0["Edit7"];
$Edit8		= @$row0["Edit8"];
$Edit9		= @$row0["Edit9"];
$Edit10	    = @$row0["memo1"];
$Edit12		= @$row0["Edit12"]; // Codigo 2
$Edit13		= @$row0["Edit13"]; // Data
$alerta_1   = @$row0["mensage1"];
$categ_1    = @$row0["mensage2"];
$nome_do_edif = @$row0["mensage3"];
$nome_cad_si  = @$row0["mensage4"];

$menssagens = "* * * Alterar * * *";

// Abrir tabela Senha

$consulta3 = "SELECT * FROM tt_ser_01 Where login = '$nome3'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$lis1       = @$row3["lis1"];
$lis2       = @$row3["lis2"];
$lis3       = @$row3["lis3"];

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

if (!empty($Edit0)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit1").focus();	
		}
		
		</script>
		<?
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
		document.getElementById("Edit10").focus();	
		}
		
		</script>
		<?
}

?>
<script language="JavaScript">
<!-- Begin
nextfield = "Edit0";
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
		window.location="cadastro.php?cod_5=<?=$Edit12;?>";
   }
   
}
//-->
</script>


        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit0").focus();	
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
<form style="margin-bottom: 0" id="Form1" name="Form1" method="post"  action="/protocolo_layout.php">
<table  width="10"   style="height:10px"  border="0" cellpadding="0" cellspacing="0"   align="Center" ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 141px; WIDTH: 724px; POSITION: absolute; TOP: 44px; HEIGHT: 532px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(16, 16, 692 - 16, 500 - 16);
  Shape1_Canvas.fillRect(16, 16, 692 - 16 + 1, 500 - 16 + 1);
  Shape1_Canvas.setStroke(16);
  Shape1_Canvas.setColor("<?=$color_bor;?>");
  Shape1_Canvas.drawRect(16, 16, 692 - 16 + 1, 500 - 16 + 1);
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
<div id="Label1_outer" style="Z-INDEX: 2; LEFT: 183px; WIDTH: 361px; POSITION: absolute; TOP: 90px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: <?=$color_bor;?>; background-color: #FFFFFF;height:32px;width:361px;"   ><STRONG>Listagem de Socios</STRONG></div>
</div>
<div id="Menssage_outer" style="Z-INDEX: 3; LEFT: 614px; WIDTH: 208px; POSITION: absolute; TOP: 95px; HEIGHT: 24px">
<div id="Menssage" style=" font-family: Verdana; font-size: 14px;  height:24px;width:208px;"  align="Center"   ><STRONG><?=$menssagens;?></STRONG></div>
</div>
<div id="Shape3_outer" style="Z-INDEX: 4; LEFT: 174px; WIDTH: 658px; POSITION: absolute; TOP: 133px; HEIGHT: 409px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 656 - 1, 407 - 1);
  Shape3_Canvas.fillRect(1, 1, 656 - 1 + 1, 407 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("<?=$color_bor;?>");
  Shape3_Canvas.drawRect(1, 1, 656 - 1 + 1, 407 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 5; LEFT: 189px; WIDTH: 64px; POSITION: absolute; TOP: 145px; HEIGHT: 26px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:64px;"   ><STRONG>Codigo.:</STRONG></div>
</div>
<div id="Edit0_outer" style="Z-INDEX: 6; LEFT: 305px; WIDTH: 103px; POSITION: absolute; TOP: 141px; HEIGHT: 26px">
<input type="text" id="Edit0" name="Edit0" value="<?=$Edit0;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:103px;" onfocus="this.className='anormal'; nextfield ='Edit1';" onblur="this.className='normal'" onchange="Salva0(this.value)" style="text-transform: uppercase;"  tabindex="0"    />
</div>

<div id="Label13_outer" style="Z-INDEX: 41; LEFT: 417px; WIDTH: 127px; POSITION: absolute; TOP: 142px; HEIGHT: 22px">
<div id="Label13" style=" font-family: Verdana; font-size: 17px; color: <?=$color_bor;?>; background-color: #FFFFFF;height:22px;width:127px;"   > <STRONG>Lista do(a).:</STRONG> </div>
</div>
<div id="Label14_outer" style="Z-INDEX: 42; LEFT: 442px; WIDTH: 258px; POSITION: absolute; TOP: 143px; HEIGHT: 24px">
<div id="Label14" style=" font-family: Verdana; font-size: 14px;  height:24px;width:258px;"  align="Center"   ><STRONG><?=$nome3;?></STRONG> </div>
</div>

<div id="Label3_outer" style="Z-INDEX: 7; LEFT: 189px; WIDTH: 107px; POSITION: absolute; TOP: 170px; HEIGHT: 26px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:107px;"   ><STRONG>Nome Socio.:</STRONG></div>
</div>
<div id="Edit1_outer" style="Z-INDEX: 8; LEFT: 305px; WIDTH: 495px; POSITION: absolute; TOP: 166px; HEIGHT: 26px">
<input type="text" id="Edit1" name="Edit1" value="<?=$Edit1;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:495px;  " onfocus="this.className='anormal'; nextfield ='Edit2';" onblur="this.className='normal'" onchange="Salva1(this.value)"  style="text-transform: uppercase;"   tabindex="0"    />
</div>
<div id="Label4_outer" style="Z-INDEX: 9; LEFT: 189px; WIDTH: 107px; POSITION: absolute; TOP: 196px; HEIGHT: 26px">
<div id="Label4" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:107px;"   > <STRONG>Rua.:</STRONG> </div>
</div>
<div id="Edit2_outer" style="Z-INDEX: 10; LEFT: 305px; WIDTH: 167px; POSITION: absolute; TOP: 192px; HEIGHT: 26px">
<input type="text" id="Edit2" name="Edit2" value="<?=$Edit2;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:167px;  " onfocus="this.className='anormal'; nextfield ='Edit3';" onblur="this.className='normal'" onchange="Salva2(this.value)"  style="text-transform: uppercase;"  tabindex="0"    />
</div>
<div id="Label5_outer" style="Z-INDEX: 11; LEFT: 189px; WIDTH: 99px; POSITION: absolute; TOP: 221px; HEIGHT: 26px">
<div id="Label5" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:99px;"   > <STRONG>Endereco.:</STRONG> </div>
</div>
<div id="Edit3_outer" style="Z-INDEX: 12; LEFT: 305px; WIDTH: 495px; POSITION: absolute; TOP: 217px; HEIGHT: 26px">
<input type="text" id="Edit3" name="Edit3" value="<?=$Edit3;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:495px;  " onfocus="this.className='anormal'; nextfield ='Edit4';" onblur="this.className='normal'" onchange="Salva3(this.value)"  style="text-transform: uppercase;"  tabindex="0"    />
</div>
<div id="Label6_outer" style="Z-INDEX: 13; LEFT: 189px; WIDTH: 115px; POSITION: absolute; TOP: 247px; HEIGHT: 26px">
<div id="Label6" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:115px;"   ><STRONG>Numero.:</STRONG></div>
</div>
<div id="Edit4_outer" style="Z-INDEX: 14; LEFT: 305px; WIDTH: 167px; POSITION: absolute; TOP: 243px; HEIGHT: 26px">
<input type="text" id="Edit4" name="Edit4" value="<?=$Edit4;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:167px;  " onfocus="this.className='anormal'; nextfield ='Edit5';" onblur="this.className='normal'" onchange="Salva4(this.value)"  style="text-transform: uppercase;" tabindex="0"    />
</div>
<div id="Label7_outer" style="Z-INDEX: 15; LEFT: 189px; WIDTH: 115px; POSITION: absolute; TOP: 273px; HEIGHT: 26px">
<div id="Label7" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:115px;"   ><STRONG>Bairro.:</STRONG></div>
</div>
<div id="Edit5_outer" style="Z-INDEX: 16; LEFT: 305px; WIDTH: 223px; POSITION: absolute; TOP: 269px; HEIGHT: 26px">
<input type="text" id="Edit5" name="Edit5" value="<?=$Edit5;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:223px;  " onfocus="this.className='anormal'; nextfield ='Edit6';" onblur="this.className='normal'" onchange="Salva5(this.value)"  style="text-transform: uppercase;"  tabindex="0"    />
</div>
<div id="Label8_outer" style="Z-INDEX: 17; LEFT: 533px; WIDTH: 123px; POSITION: absolute; TOP: 275px; HEIGHT: 27px">
<div id="Label8" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:27px;width:123px;"   ><STRONG>CEP.:</STRONG></div>
</div>
<div id="Edit6_outer" style="Z-INDEX: 18; LEFT: 582px; WIDTH: 114px; POSITION: absolute; TOP: 269px; HEIGHT: 27px">
<input type="text" id="Edit6" name="Edit6" value="<?=$Edit6;?>" style=" font-family: Verdana; font-size: 14px;  height:26px;width:114px;  " onfocus="this.className='anormal'; nextfield ='Edit7';" onblur="this.className='normal'" onkeypress="return txtBoxFormat(document.Form1, 'Edit6', '99999-999', event);" onchange="Salva6(this.value)"  style="text-transform: uppercase;"  tabindex="0"    />
</div>
<div id="Label9_outer" style="Z-INDEX: 19; LEFT: 704px; WIDTH: 43px; POSITION: absolute; TOP: 275px; HEIGHT: 26px">
<div id="Label9" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:43px;"   ><STRONG>UF.:</STRONG></div>
</div>
<div id="Edit7_outer" style="Z-INDEX: 20; LEFT: 737px; WIDTH: 63px; POSITION: absolute; TOP: 271px; HEIGHT: 26px">
<select type="text" id="Edit7" name="Edit7" value="<?=$Edit7;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:63px;  " onfocus="this.className='anormal'; nextfield ='Edit8';" onblur="this.className='normal'" onchange="Salva7(this.value)"  style="text-transform: uppercase;"  tabindex="0"    />

<?

if (!empty($Edit7))
{
?>	
	<option value="<?=$Edit7;?>"> <?=$Edit7;?> </option>
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
<div id="Label10_outer" style="Z-INDEX: 35; LEFT: 191px; WIDTH: 97px; POSITION: absolute; TOP: 299px; HEIGHT: 26px">
<div id="Label10" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:97px;"   ><STRONG>Funcao.:</STRONG></div>
</div>
<div id="Edit8_outer" style="Z-INDEX: 36; LEFT: 305px; WIDTH: 391px; POSITION: absolute; TOP: 295px; HEIGHT: 26px">
<input type="text" id="Edit8" name="Edit8" value="<?=$Edit8;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:391px;  " onfocus="this.className='anormal'; nextfield ='Edit9';" onblur="this.className='normal'" onchange="Salva8(this.value)"  style="text-transform: uppercase;"  tabindex="0"    />
</div>
<div id="Label11_outer" style="Z-INDEX: 37; LEFT: 190px; WIDTH: 105px; POSITION: absolute; TOP: 325px; HEIGHT: 26px">
<div id="Label11" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:105px;"   ><STRONG>Condominio.:</STRONG></div>
</div>
<div id="Edit9_outer" style="Z-INDEX: 38; LEFT: 305px; WIDTH: 391px; POSITION: absolute; TOP: 321px; HEIGHT: 26px">
<input type="text" id="Edit9" name="Edit9" value="<?=$Edit9;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:391px;  " onfocus="this.className='anormal'; nextfield ='Edit10';" onblur="this.className='normal'" onchange="Salva9(this.value)"  style="text-transform: uppercase;"  tabindex="0"    />
</div>
<div id="Label12_outer" style="Z-INDEX: 39; LEFT: 190px; WIDTH: 113px; POSITION: absolute; TOP: 351px; HEIGHT: 26px">
<div id="Label12" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:113px;"   ><STRONG>Observacao.:</STRONG></div>
</div>
<div id="Edit10_outer" style="Z-INDEX: 40; LEFT: 305px; WIDTH: 495px; POSITION: absolute; TOP: 347px; HEIGHT: 77px">
<textarea type="text" id="Edit10" name="Edit10" style=" font-family: Verdana; font-size: 14px;  height:76px;width:495px;   " onfocus="this.className='anormal'; nextfield ='done';" onblur="this.className='normal'" onchange="Salva10(this.value)"  style="text-transform: uppercase;"  tabindex="0"    /><?=$Edit10;?></textarea>
</div>
<div id="Label15_outer" style="Z-INDEX: 43; LEFT: 188px; WIDTH: 131px; POSITION: absolute; TOP: 428px; HEIGHT: 20px">
<div id="Label15" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:20px;width:131px;"   ><STRONG>Total da Lista.:</STRONG></div>
</div>
<div id="Edit11_outer" style="Z-INDEX: 44; LEFT: 305px; WIDTH: 79px; POSITION: absolute; TOP: 424px; HEIGHT: 26px">
<input type="text" id="Edit11" name="Edit11" value="<?=$Edit11;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:79px;" disabled   tabindex="0"    />
</div>
</td></tr></table></form></body>
</html>
<script>
function janelaSecundaria (URL){ 
   window.open(URL,"janela2","width=690,height=235,resizable=NO,status=NO,Scrollbars=NO,location=NO,menubar=NO,toolbar=NO"); 
} 
</script>

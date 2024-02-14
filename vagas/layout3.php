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
$Edit16	    = @$row0["Edit16"];
$Edit17	    = @$row0["Edit17"];
$Edit18	    = @$row0["Edit18"];
$Edit19	    = @$row0["Edit19"];
$Edit20	    = @$row0["memo1"];
$alerta_1   = @$row0["mensage1"];
$categ_1    = @$row0["mensage2"];
$nome_do_edif = @$row0["mensage3"];
$nome_cad_si  = @$row0["mensage4"];

//$Edit15 = str_replace('.', chr(13),$Edit15);

$alerta_1 = $alerta_1;
$nome2_adms = $nome_do_edif; 

$menssagens = "* * * Alterar * * *";

// Abrir tabela Senha

$consulta3 = "SELECT * FROM tt_ser_01 Where login = '$nome3'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$vag1       = @$row3["vag1"];
$vag2       = @$row3["vag2"];
$vag3       = @$row3["vag3"];


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
		document.getElementById("Edit16").focus();	
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
		document.getElementById("Edit15").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit16)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit13").focus();	
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
nextfield = "done";
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
		document.getElementById("Edit2").focus();	
		}
		
		</script>

<html>
<head>
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
</head>

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
<form style="margin-bottom: 0" id="Form1" name="Form1" method="post"  action="pesquisa.php">
<table  width="10"   style="height:10px"  border="0" cellpadding="0" cellspacing="0"   align="Center" ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 145px; WIDTH: 724px; POSITION: absolute; TOP: 44px; HEIGHT: 532px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(16, 16, 692 - 16, 478 - 16);
  Shape1_Canvas.fillRect(16, 16, 692 - 16 + 1, 478 - 16 + 1);
  Shape1_Canvas.setStroke(16);
  Shape1_Canvas.setColor("<?=$color_bor;?>");
  Shape1_Canvas.drawRect(16, 16, 692 - 16 + 1, 478 - 16 + 1);
  Shape1_Canvas.paint();
</script>

</div>
<div id="Shape2_outer" style="Z-INDEX: 1; LEFT: 178px; WIDTH: 658px; POSITION: absolute; TOP: 77px; HEIGHT: 55px">
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
<div id="Label1_outer" style="Z-INDEX: 2; LEFT: 187px; WIDTH: 449px; POSITION: absolute; TOP: 90px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: <?=$color_bor;?>; background-color: #FFFFFF;height:32px;width:449px;"   ><strong>Cadastro de&nbsp;Vagas</strong></div>
</div>
<div id="Menssage_outer" style="Z-INDEX: 3; LEFT: 618px; WIDTH: 208px; POSITION: absolute; TOP: 95px; HEIGHT: 24px">
<div id="Menssage" style=" font-family: Verdana; font-size: 14px;  height:24px;width:208px;"  align="Center"   ><strong><?=$menssagens;?></strong></div>
</div>
<div id="Shape3_outer" style="Z-INDEX: 4; LEFT: 178px; WIDTH: 658px; POSITION: absolute; TOP: 133px; HEIGHT: 410px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 656 - 1, 386 - 1);
  Shape3_Canvas.fillRect(1, 1, 656 - 1 + 1, 386 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("<?=$color_bor;?>");
  Shape3_Canvas.drawRect(1, 1, 656 - 1 + 1, 386 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 5; LEFT: 185px; WIDTH: 64px; POSITION: absolute; TOP: 144px; HEIGHT: 26px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:64px;"   ><strong>Codigo.:</strong></div>
</div>
<div id="Edit1_outer" style="Z-INDEX: 6; LEFT: 282px; WIDTH: 56px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit1" name="Edit1" value="<?=$Edit1;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:56px; " disabled   tabindex="0"    />
</div>
<div id="Label3_outer" style="Z-INDEX: 7; LEFT: 356px; WIDTH: 152px; POSITION: absolute; TOP: 144px; HEIGHT: 18px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:152px;"   > <strong>Vaga Preenchida.:</strong> </div>
</div>
<div id="Edit2_outer" style="Z-INDEX: 8; LEFT: 498px; WIDTH: 34px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit2" name="Edit2" value="<?=$Edit2;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:34px; " onfocus="this.className='anormal'; nextfield ='Edit4';" onblur="this.className='normal'"  onchange="Salva2(this.value)"  style="text-transform: uppercase;" tabindex="1"    />
</div>
<div id="Label4_outer" style="Z-INDEX: 9; LEFT: 680px; WIDTH: 47px; POSITION: absolute; TOP: 144px; HEIGHT: 18px">
<div id="Label4" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:47px;"   ><strong>Data.:</strong></div>
</div>
<div id="Edit3_outer" style="Z-INDEX: 10; LEFT: 733px; WIDTH: 93px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit3" name="Edit3" value="<?=$Edit3;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:93px;  " onfocus="this.className='anormal'; nextfield ='Edit4';" onblur="this.className='normal'"  onchange="Salva3(this.value)"  style="text-transform: uppercase;" tabindex="2"  disabled  />
</div>
<div id="Label11_outer" style="Z-INDEX: 11; LEFT: 185px; WIDTH: 89px; POSITION: absolute; TOP: 170px; HEIGHT: 26px">
<div id="Label11" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><strong>Funcao.:</strong>&nbsp;</div>
</div>
<div id="Edit5_outer" style="Z-INDEX: 12; LEFT: 602px; WIDTH: 32px; POSITION: absolute; TOP: 164px; HEIGHT: 26px">
<input type="text" id="Edit5" name="Edit5" value="<?=$Edit5;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:32px; " onfocus="this.className='anormal'; nextfield ='Edit6';" onblur="this.className='normal'"  onchange="Salva5(this.value)" style="text-transform: uppercase;" tabindex="4"    />
</div>
<div id="Label12_outer" style="Z-INDEX: 13; LEFT: 185px; WIDTH: 89px; POSITION: absolute; TOP: 194px; HEIGHT: 26px">
<div id="Label12" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><strong>Adm./Edif..:</strong>&nbsp;</div>
</div>
<div id="Edit7_outer" style="Z-INDEX: 14; LEFT: 282px; WIDTH: 450px; POSITION: absolute; TOP: 189px; HEIGHT: 26px">
<input type="text" id="Edit7" name="Edit7" value="<?=$Edit7;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:450px; " onfocus="this.className='anormal'; nextfield ='Edit8';" onblur="this.className='normal'"  onchange="Salva7(this.value)"  style="text-transform: uppercase;" tabindex="5"    />
</div>
<div id="Label13_outer" style="Z-INDEX: 15; LEFT: 185px; WIDTH: 89px; POSITION: absolute; TOP: 218px; HEIGHT: 26px">
<div id="Label13" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><strong>Endereco.:</strong>&nbsp;</div>
</div>
<div id="Edit8_outer" style="Z-INDEX: 16; LEFT: 282px; WIDTH: 450px; POSITION: absolute; TOP: 213px; HEIGHT: 26px">
<input type="text" id="Edit8" name="Edit8" value="<?=$Edit8;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:450px; " onfocus="this.className='anormal'; nextfield ='Edit9';" onblur="this.className='normal'"  onchange="Salva8(this.value)"  style="text-transform: uppercase;" tabindex="7"    />
</div>
<div id="Label14_outer" style="Z-INDEX: 17; LEFT: 187px; WIDTH: 62px; POSITION: absolute; TOP: 243px; HEIGHT: 26px">
<div id="Label14" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:62px;"   ><strong>Bairro.:</strong>&nbsp;</div>
</div>
<div id="Edit9_outer" style="Z-INDEX: 18; LEFT: 282px; WIDTH: 180px; POSITION: absolute; TOP: 238px; HEIGHT: 26px">
<input type="text" id="Edit9" name="Edit9" value="<?=$Edit9;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:180px; " onfocus="this.className='anormal'; nextfield ='Edit10';" onblur="this.className='normal'"  onchange="Salva9(this.value)"  style="text-transform: uppercase;" tabindex="9"    />
</div>
<div id="Label15_outer" style="Z-INDEX: 19; LEFT: 185px; WIDTH: 89px; POSITION: absolute; TOP: 268px; HEIGHT: 26px">
<div id="Label15" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><strong>Cep.:</strong>&nbsp;</div>
</div>
<div id="Edit12_outer" style="Z-INDEX: 20; LEFT: 282px; WIDTH: 83px; POSITION: absolute; TOP: 263px; HEIGHT: 26px">
<input type="text" id="Edit12" name="Edit12" value="<?=$Edit12;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:83px; " onfocus="this.className='anormal'; nextfield ='Edit16';" onblur="this.className='normal'" onkeypress="return txtBoxFormat(document.Form1, 'Edit12', '99999-999', event);"  onchange="Salva12(this.value)"  style="text-transform: uppercase;" tabindex="8"    />
</div>

<div id="Label15_outer" style="Z-INDEX: 19; LEFT: 474px; WIDTH: 89px; POSITION: absolute; TOP: 268px; HEIGHT: 26px">
<div id="Label15" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><strong>Idade.:</strong>&nbsp;</div>
</div>

<div id="Edit16_outer" style="Z-INDEX: 20; LEFT: 531px; WIDTH: 201px; POSITION: absolute; TOP: 263px; HEIGHT: 26px">
<input type="text" id="Edit16" name="Edit16" value="<?=$Edit16;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:201px; "  onfocus="this.className='anormal'; nextfield ='Edit13';" onblur="this.className='normal'"   onchange="Salva16(this.value)"  style="text-transform: uppercase;" tabindex="9"    />
</div>


<div id="Label16_outer" style="Z-INDEX: 21; LEFT: 185px; WIDTH: 139px; POSITION: absolute; TOP: 293px; HEIGHT: 21px">
<div id="Label16" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:139px;"   ><strong>Telefone.:</strong>&nbsp;</div>
</div>
<div id="Edit13_outer" style="Z-INDEX: 22; LEFT: 282px; WIDTH: 218px; POSITION: absolute; TOP: 288px; HEIGHT: 26px">
<input type="text" id="Edit13" name="Edit13" value="<?=$Edit13;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:218px; " onfocus="this.className='anormal'; nextfield ='Edit14';" onblur="this.className='normal'"  onchange="Salva13(this.value)"  style="text-transform: uppercase;" tabindex="11"    />
</div>
<div id="Label17_outer" style="Z-INDEX: 23; LEFT: 757px; WIDTH: 36px; POSITION: absolute; TOP: 244px; HEIGHT: 26px">
<div id="Label17" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:36px;"   ><strong>Uf.:</strong>&nbsp;</div>
</div>
<div id="Edit11_outer" style="Z-INDEX: 24; LEFT: 787px; WIDTH: 39px; POSITION: absolute; TOP: 238px; HEIGHT: 26px">
<select id="Edit11" name="Edit11" value="<?=$Edit11;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:39px; " onfocus="this.className='anormal'; nextfield ='Edit12';" onblur="this.className='normal'"  onchange="Salva11(this.value)"  style="text-transform: uppercase;" tabindex="10"    />

<?

if (!empty($Edit11))
{
?>	
	<option value="<?=$Edit11;?>"> <?=$Edit11;?> </option>
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
<div id="Label18_outer" style="Z-INDEX: 25; LEFT: 505px; WIDTH: 82px; POSITION: absolute; TOP: 293px; HEIGHT: 20px">
<div id="Label18" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:20px;width:82px;"   ><strong>Contato.:</strong>&nbsp;</div>
</div>
<div id="Edit14_outer" style="Z-INDEX: 26; LEFT: 581px; WIDTH: 244px; POSITION: absolute; TOP: 288px; HEIGHT: 26px">
<input type="text" id="Edit14" name="Edit14" value="<?=$Edit14;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:244px; " onfocus="this.className='anormal'; nextfield ='Edit15';" onblur="this.className='normal'"  onchange="Salva14(this.value)"  tabindex="12"    />
</div>
<div id="Label68_outer" style="Z-INDEX: 27; LEFT: 184px; WIDTH: 103px; POSITION: absolute; TOP: 317px; HEIGHT: 24px">
<div id="Label68" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:103px;"   ><strong>Observacao:</strong></div>
</div>
<div id="Edit15_outer" style="Z-INDEX: 28; LEFT: 282px; WIDTH: 542px; POSITION: absolute; TOP: 315px; HEIGHT: 182px">
<textarea  wrap="VIRTUAL" name="Edit15" rows="15" cols="50" style=" font-family: Verdana; font-size: 14px;  height:130px;width:542px; " onfocus="this.className='anormal'; nextfield ='done';" onblur="this.className='normal'"  onchange="Salva15(this.value)"  tabindex="17"   >
 <?=$Edit15;?>	</textarea>


</div>
<div id="Label70_outer" style="Z-INDEX: 29; LEFT: 367px; WIDTH: 100px; POSITION: absolute; TOP: 269px; HEIGHT: 18px">
<div id="Label70" style=" font-family: Verdana; font-size: 13px; color: #0000FF; height:18px;width:100px;"   ><A HREF="http://correios.com.br/servicos/dnec/menuAction.do?Metodo=menuCep" target="new" ><strong><font color="#0000ff"><u>Procurar Cep</u></font></strong></A></div>
</div>
<div id="Edit4_outer" style="Z-INDEX: 30; LEFT: 282px; WIDTH: 193px; POSITION: absolute; TOP: 164px; HEIGHT: 26px">
<input type="text" id="Edit4" name="Edit4" value="<?=$Edit4;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:193px; " onfocus="this.className='anormal'; nextfield ='Edit5';" onblur="this.className='normal'"  onchange="Salva4(this.value)"  style="text-transform: uppercase;" tabindex="3"    />
</div>
<div id="Label6_outer" style="Z-INDEX: 31; LEFT: 481px; WIDTH: 120px; POSITION: absolute; TOP: 168px; HEIGHT: 18px">
<div id="Label6" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:120px;"   > <strong>Qtd. de Vagas.:</strong> </div>
</div>
<div id="Label7_outer" style="Z-INDEX: 32; LEFT: 662px; WIDTH: 120px; POSITION: absolute; TOP: 168px; HEIGHT: 18px">
<div id="Label7" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:120px;"   > <strong>Encaminhados.:</strong> </div>
</div>
<div id="Edit6_outer" style="Z-INDEX: 33; LEFT: 788px; WIDTH: 38px; POSITION: absolute; TOP: 164px; HEIGHT: 26px">
<input type="text" id="Edit6" name="Edit6" value="<?=$Edit6;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:38px; " onfocus="this.className='anormal'; nextfield ='Edit7';" onblur="this.className='normal'"  onchange="Salva6(this.value)"  style="text-transform: uppercase;"  tabindex="4"    />
</div>
<div id="Label8_outer" style="Z-INDEX: 34; LEFT: 467px; WIDTH: 62px; POSITION: absolute; TOP: 243px; HEIGHT: 26px">
<div id="Label8" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:62px;"   ><strong>Cidade.:</strong>&nbsp;</div>
</div>
<div id="Edit10_outer" style="Z-INDEX: 35; LEFT: 531px; WIDTH: 201px; POSITION: absolute; TOP: 238px; HEIGHT: 26px">
<input type="text" id="Edit10" name="Edit10" value="<?=$Edit10;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:201px; " onfocus="this.className='anormal'; nextfield ='Edit11';" onblur="this.className='normal'"  onchange="Salva10(this.value)" style="text-transform: uppercase;" tabindex="9"    />
</div>


<div id="Label71_outer" style="Z-INDEX: 35; LEFT: 390px; WIDTH: 544px; POSITION: absolute; TOP: 485px; HEIGHT: 80px">
<div id="Label71" style=" font-family: Verdana; font-size: 14px; color: #ff0000;font-weight: normal; height:24px;width:403px;"   ><b><?=$alerta_1;?></b></STRONG></div>
</div>

</td></tr></table>
</form>
</body>
</html>
<script>
function janelaSecundaria (URL){ 
   window.open(URL,"janela2","width=690,height=235,resizable=NO,status=NO,Scrollbars=NO,location=NO,menubar=NO,toolbar=NO"); 
} 
</script>

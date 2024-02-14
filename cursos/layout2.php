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
$Edit21	    = @$row0["memo1"];
$alerta_1   = @$row0["mensage1"];
$alerta_2   = @$row0["mensage2"];
$nome_do_edif = @$row0["mensage2"];
$nome_da_adms = @$row0["mensage3"];

$menssagens = "* * * Inclusao * * *";

// Abrir tabela Senha

$tabela_1 = strtoupper('cursos');

$consulta3 = "SELECT * FROM permissoes WHERE login = '$nome3' and tabela = '$tabela_1'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$per1       = @$row3["incluir"];
$per2       = @$row3["alterar"];
$per3       = @$row3["excluir"];
$per4       = @$row3["imprimir"];

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
		document.getElementById("Edit21").focus();	
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
<div id="Label1_outer" style="Z-INDEX: 2; LEFT: 183px; WIDTH: 417px; POSITION: absolute; TOP: 90px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: <?php echo $color_bor ?>; background-color: #FFFFFF;height:32px;width:417px;"   ><STRONG>Cadastro de&nbsp;Cursos</STRONG></div>
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
<div id="Label2_outer" style="Z-INDEX: 5; LEFT: 181px; WIDTH: 107px; POSITION: absolute; TOP: 144px; HEIGHT: 26px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:107px;"   ><STRONG>Matricula.:</STRONG></div>
</div>
<div id="Edit1_outer" style="Z-INDEX: 6; LEFT: 278px; WIDTH: 77px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit1" name="Edit1" value="<?php echo $Edit1 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:77px;" onfocus="this.className='anormal'; nextfield ='Edit2';" onblur="this.className='normal'"   onchange="Salva1(this.value)" style="text-transform: uppercase;" tabindex="1"  maxlength="11"  />
</div>
<div id="Label3_outer" style="Z-INDEX: 7; LEFT: 359px; WIDTH: 114px; POSITION: absolute; TOP: 144px; HEIGHT: 18px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:114px;"   > <STRONG>Inicio Curso.:</STRONG> </div>
</div>
<div id="Edit2_outer" style="Z-INDEX: 8; LEFT: 470px; WIDTH: 93px; POSITION: absolute; TOP: 139px; HEIGHT: 26px">
<input type="text" id="Edit2" name="Edit2" value="<?php echo $Edit2 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:93px;" onfocus="this.className='anormal'; nextfield ='Edit3';" onblur="this.className='normal'"  onkeypress="return txtBoxFormat(document.Form1, 'Edit2', '99/99/9999', event);" onchange="Salva2(this.value)" style="text-transform: uppercase;"  tabindex="2"   maxlength="10" />
</div>
<div id="Label4_outer" style="Z-INDEX: 9; LEFT: 597px; WIDTH: 139px; POSITION: absolute; TOP: 144px; HEIGHT: 18px">
<div id="Label4" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:139px;"   ><STRONG>Termino Curso.:</STRONG></div>
</div>
<div id="Edit3_outer" style="Z-INDEX: 10; LEFT: 729px; WIDTH: 93px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit3" name="Edit3" value="<?php echo $Edit3 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:93px;" onfocus="this.className='anormal'; nextfield ='Edit4';" onblur="this.className='normal'"  onkeypress="return txtBoxFormat(document.Form1, 'Edit3', '99/99/9999', event);" onchange="Salva3(this.value)"  style="text-transform: uppercase;"  tabindex="3"   maxlength="10" />
</div>
<div id="Label11_outer" style="Z-INDEX: 11; LEFT: 181px; WIDTH: 89px; POSITION: absolute; TOP: 170px; HEIGHT: 26px">
<div id="Label11" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Curso.:</STRONG>&nbsp;</div>
</div>
<div id="Edit14_outer" style="Z-INDEX: 12; LEFT: 692px; WIDTH: 94px; POSITION: absolute; TOP: 265px; HEIGHT: 26px">
<input type="text" id="Edit14" name="Edit14" value="<?php echo $Edit14 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:94px;" onfocus="this.className='anormal'; nextfield ='Edit15';" onblur="this.className='normal'"  onchange="Salva14(this.value)" style="text-transform: uppercase;" readonly tabindex="14" maxlength="10"   />
</div>
<div id="Label12_outer" style="Z-INDEX: 13; LEFT: 181px; WIDTH: 89px; POSITION: absolute; TOP: 194px; HEIGHT: 26px">
<div id="Label12" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Periodo.:</STRONG>&nbsp;</div>
</div>

<div id="Edit6_outer" style="Z-INDEX: 14; LEFT: 278px; WIDTH: 194px; POSITION: absolute; TOP: 190px; HEIGHT: 26px">
<select type="text" id="Edit6" name="Edit6" value="<?php echo $Edit6 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:194px;" onfocus="this.className='anormal'; nextfield ='Edit7';" onblur="this.className='normal'"  onchange="Salva6(this.value)" style="text-transform: uppercase;"   tabindex="6"  />

<?php

if (!empty($Edit6))
{
?>	
	<option value="<?php echo $Edit6 ?>"> <?php echo $Edit6 ?> </option>
            <option value="MANHA"> MANHA </option>
            <option value="TARDE"> TARDE </option>
            <option value="NOITE"> NOITE </option>
<?php	

}else{
	
?>	
            <option value=" ">  </option>
            <option value="MANHA"> MANHA </option>
            <option value="TARDE"> TARDE </option>
            <option value="NOITE"> NOITE </option>
<?php            
 }
?>

</select>

</div>

<div id="Label13_outer" style="Z-INDEX: 15; LEFT: 181px; WIDTH: 89px; POSITION: absolute; TOP: 218px; HEIGHT: 26px">
<div id="Label13" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Nome.:</STRONG>&nbsp;</div>
</div>
<div id="Edit8_outer" style="Z-INDEX: 16; LEFT: 278px; WIDTH: 314px; POSITION: absolute; TOP: 215px; HEIGHT: 26px">
<input type="text" id="Edit8" name="Edit8" value="<?php echo $Edit8 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:314px;" onfocus="this.className='anormal'; nextfield ='Edit9';" onblur="this.className='normal'"  onchange="Salva8(this.value)" style="text-transform: uppercase;"  tabindex="8"  maxlength="85"  />
</div>
<div id="Label15_outer" style="Z-INDEX: 17; LEFT: 569px; WIDTH: 119px; POSITION: absolute; TOP: 244px; HEIGHT: 19px">
<div id="Label15" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:119px;"   ><STRONG>Nacionalidade.:</STRONG>&nbsp;</div>
</div>
<div id="Edit12_outer" style="Z-INDEX: 18; LEFT: 692px; WIDTH: 129px; POSITION: absolute; TOP: 240px; HEIGHT: 26px">
<input type="text" id="Edit12" name="Edit12" value="<?php echo $Edit12 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:129px;" onfocus="this.className='anormal'; nextfield ='Edit13';" onblur="this.className='normal'"  onchange="Salva12(this.value)" style="text-transform: uppercase;"   tabindex="9"  maxlength="11"  />
</div>
<div id="Label16_outer" style="Z-INDEX: 19; LEFT: 181px; WIDTH: 91px; POSITION: absolute; TOP: 267px; HEIGHT: 21px">
<div id="Label16" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:91px;"   ><STRONG>Sexo.:</STRONG>&nbsp;</div>
</div>
<div id="Edit13_outer" style="Z-INDEX: 20; LEFT: 278px; WIDTH: 146px; POSITION: absolute; TOP: 265px; HEIGHT: 26px">
<input type="text" id="Edit13" name="Edit13" value="<?php echo $Edit13 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:146px;" onfocus="this.className='anormal'; nextfield ='Edit14';" onblur="this.className='normal'"  onchange="Salva13(this.value)" style="text-transform: uppercase;"  tabindex="12"  maxlength="10"  />
</div>
<div id="Label22_outer" style="Z-INDEX: 21; LEFT: 181px; WIDTH: 107px; POSITION: absolute; TOP: 292px; HEIGHT: 26px">
<div id="Label22" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:107px;"   ><STRONG>Endereco.:</STRONG>&nbsp;</div>
</div>
<div id="Edit15_outer" style="Z-INDEX: 22; LEFT: 278px; WIDTH: 394px; POSITION: absolute; TOP: 290px; HEIGHT: 26px">
<input type="text" id="Edit15" name="Edit15" value="<?php echo $Edit15 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:394px;" onfocus="this.className='anormal'; nextfield ='Edit16';" onblur="this.className='normal'"  onchange="Salva15(this.value)"  style="text-transform: uppercase;"   tabindex="15"  maxlength="85"  />
</div>
<div id="Label26_outer" style="Z-INDEX: 23; LEFT: 181px; WIDTH: 103px; POSITION: absolute; TOP: 341px; HEIGHT: 26px">
<div id="Label26" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:103px;"   ><STRONG>Formacao.:</STRONG>&nbsp;</div>
</div>
<div id="Label68_outer" style="Z-INDEX: 24; LEFT: 180px; WIDTH: 103px; POSITION: absolute; TOP: 366px; HEIGHT: 24px">
<div id="Label68" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:103px;"   ><STRONG>Observacao:</STRONG></div>
</div>
<div id="Edit21_outer" style="Z-INDEX: 25; LEFT: 278px; WIDTH: 544px; POSITION: absolute; TOP: 365px; HEIGHT: 107px">
<textarea id="Edit21" name="Edit21" style=" font-family: Verdana; font-size: 14px;  height:106px;width:544px;" onfocus="this.className='anormal'; nextfield ='done';" onblur="this.className='normal'"  onchange="Salva21(this.value)"  style="text-transform: uppercase;"  tabindex="21"    wrap="virtual"><?php echo $Edit21 ?></textarea>
</div>
<div id="Label70_outer" style="Z-INDEX: 26; LEFT: 388px; WIDTH: 37px; POSITION: absolute; TOP: 321px; HEIGHT: 18px">
<div id="Label70" style=" font-family: Verdana; font-size: 13px; color: #0000FF; height:18px;width:37px;"   ><A HREF="http://correios.com.br/servicos/dnec/menuAction.do?Metodo=menuCep"  ><STRONG>Cep </STRONG></A></div>
</div>
<div id="Edit4_outer" style="Z-INDEX: 27; LEFT: 278px; WIDTH: 194px; POSITION: absolute; TOP: 165px; HEIGHT: 26px">
<select type="text" id="Edit4" name="Edit4" value="<?php echo $Edit4 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:194px;" onfocus="this.className='anormal'; nextfield ='Edit5';" onblur="this.className='normal'"  onchange="Salva4(this.value)" style="text-transform: uppercase;" tabindex="4"  />

<?php

if (!empty($Edit4))
{
?>	
	<option value="<?php echo $Edit4 ?>"> <?php echo $Edit4 ?> </option>
            <option value="ZELADORIA"> ZELADORIA </option>
            <option value="ASCENSORISTA"> ASCENSORISTA </option>
            <option value="CIPA"> CIPA </option>
            <option value="ESPANHOL"> ESPANHOL </option>
            <option value="INGLES"> INGLES </option>
            <option value="MICROINFORMATICA"> MICROINFORMATICA </option>
            <option value="SUPLETIVO"> SUPLETIVO </option>
            <option value="GERENTE"> GERENTE </option>
            <option value="PORTEIRO"> PORTEIRO </option>

<?php	

}else{
	
?>	
            <option value=" ">  </option>
            <option value="ZELADORIA"> ZELADORIA </option>
            <option value="ASCENSORISTA"> ASCENSORISTA </option>
            <option value="CIPA"> CIPA </option>
            <option value="ESPANHOL"> ESPANHOL </option>
            <option value="INGLES"> INGLES </option>
            <option value="MICROINFORMATICA"> MICROINFORMATICA </option>
            <option value="SUPLETIVO"> SUPLETIVO </option>
            <option value="GERENTE"> GERENTE </option>
            <option value="PORTEIRO"> PORTEIRO </option>


<?php            
 }
?>

</select>

</div>
<div id="Edit19_outer" style="Z-INDEX: 28; LEFT: 278px; WIDTH: 194px; POSITION: absolute; TOP: 340px; HEIGHT: 26px">
<input type="text" id="Edit19" name="Edit19" value="<?php echo $Edit19 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:194px;" onfocus="this.className='anormal'; nextfield ='Edit20';" onblur="this.className='normal'"  onchange="Salva19(this.value)" style="text-transform: uppercase;"  tabindex="19"  maxlength="20"  />
</div>
<div id="Label7_outer" style="Z-INDEX: 29; LEFT: 181px; WIDTH: 99px; POSITION: absolute; TOP: 317px; HEIGHT: 21px">
<div id="Label7" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:99px;"   ><STRONG>Cep.:</STRONG></div>
</div>
<div id="Edit16_outer" style="Z-INDEX: 30; LEFT: 278px; WIDTH: 106px; POSITION: absolute; TOP: 315px; HEIGHT: 26px">
<input type="text" id="Edit16" name="Edit16" value="<?php echo $Edit16 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:106px;" onfocus="this.className='anormal'; nextfield ='Edit17';" onblur="this.className='normal'"  onkeypress="return txtBoxFormat(document.Form1, 'Edit16', '99999-999', event);" onchange="Salva16(this.value)" style="text-transform: uppercase;" tabindex="16"  maxlength="9"  />
</div>
<div id="Label9_outer" style="Z-INDEX: 45; LEFT: 640px; WIDTH: 51px; POSITION: absolute; TOP: 269px; HEIGHT: 18px">
<div id="Label9" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:51px;"   ><STRONG>Data.:</STRONG></div>
</div>
<div id="Label14_outer" style="Z-INDEX: 46; LEFT: 181px; WIDTH: 91px; POSITION: absolute; TOP: 243px; HEIGHT: 21px">
<div id="Label14" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:91px;"   ><STRONG>Dt.Nasc.:</STRONG>&nbsp;</div>
</div>
<div id="Edit10_outer" style="Z-INDEX: 47; LEFT: 278px; WIDTH: 93px; POSITION: absolute; TOP: 240px; HEIGHT: 26px">
<input type="text" id="Edit10" name="Edit10" value="<?php echo $Edit10 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:93px;" onfocus="this.className='anormal'; nextfield ='Edit11';" onblur="this.className='normal'"  onkeypress="return txtBoxFormat(document.Form1, 'Edit10', '99/99/9999', event);" onchange="Salva10(this.value)" style="text-transform: uppercase;"   tabindex="10"  maxlength="10"  />
</div>
<div id="Label5_outer" style="Z-INDEX: 48; LEFT: 601px; WIDTH: 91px; POSITION: absolute; TOP: 219px; HEIGHT: 18px">
<div id="Label5" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:91px;"   ><STRONG>Ocupacao.:</STRONG></div>
</div>
<div id="Edit9_outer" style="Z-INDEX: 49; LEFT: 692px; WIDTH: 130px; POSITION: absolute; TOP: 215px; HEIGHT: 26px">
<input type="text" id="Edit9" name="Edit9" value="<?php echo $Edit9 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:130px;" onfocus="this.className='anormal'; nextfield ='Edit10';" onblur="this.className='normal'"  onchange="Salva9(this.value)" style="text-transform: uppercase;"   tabindex="9"  maxlength="28"  />
</div>
<div id="Label6_outer" style="Z-INDEX: 50; LEFT: 371px; WIDTH: 112px; POSITION: absolute; TOP: 245px; HEIGHT: 18px">
<div id="Label6" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:112px;"   > <STRONG>Estado Civil.:</STRONG> </div>
</div>
<div id="Edit11_outer" style="Z-INDEX: 51; LEFT: 472px; WIDTH: 93px; POSITION: absolute; TOP: 240px; HEIGHT: 26px">
<input type="text" id="Edit11" name="Edit11" value="<?php echo $Edit11 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:93px;" onfocus="this.className='anormal'; nextfield ='Edit12';" onblur="this.className='normal'"  onchange="Salva11(this.value)" style="text-transform: uppercase;"  tabindex="11"  maxlength="8"  />
</div>
<div id="Label10_outer" style="Z-INDEX: 52; LEFT: 531px; WIDTH: 53px; POSITION: absolute; TOP: 170px; HEIGHT: 22px">
<div id="Label10" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:22px;width:53px;"   ><STRONG>R.G.:</STRONG>&nbsp;</div>
</div>
<div id="Edit5_outer" style="Z-INDEX: 53; LEFT: 592px; WIDTH: 230px; POSITION: absolute; TOP: 165px; HEIGHT: 26px">
<input type="text" id="Edit5" name="Edit5" value="<?php echo $Edit5 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:230px;" onfocus="this.className='anormal'; nextfield ='Edit6';" onblur="this.className='normal'"  onchange="Salva5(this.value)" style="text-transform: uppercase;"   tabindex="5" maxlength="15"   />
</div>
<div id="Label18_outer" style="Z-INDEX: 54; LEFT: 531px; WIDTH: 61px; POSITION: absolute; TOP: 195px; HEIGHT: 17px">
<div id="Label18" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:17px;width:61px;"   ><STRONG>C.P.F.:</STRONG>&nbsp;</div>
</div>
<div id="Edit7_outer" style="Z-INDEX: 55; LEFT: 592px; WIDTH: 230px; POSITION: absolute; TOP: 190px; HEIGHT: 26px">
<input type="text" id="Edit7" name="Edit7" value="<?php echo $Edit7 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:230px;" onfocus="this.className='anormal'; nextfield ='Edit8';" onblur="this.className='normal'"  onkeypress="return txtBoxFormat(document.Form1, 'Edit7', '999.999.999-99', event);" onchange="Salva7(this.value)"  style="text-transform: uppercase;" tabindex="7"   maxlength="15" />
</div>
<div id="Label8_outer" style="Z-INDEX: 56; LEFT: 431px; WIDTH: 64px; POSITION: absolute; TOP: 320px; HEIGHT: 19px">
<div id="Label8" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:64px;"   ><STRONG>Bairro.:</STRONG></div>
</div>
<div id="Edit17_outer" style="Z-INDEX: 57; LEFT: 495px; WIDTH: 106px; POSITION: absolute; TOP: 315px; HEIGHT: 26px">
<input type="text" id="Edit17" name="Edit17" value="<?php echo $Edit17 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:106px;" onfocus="this.className='anormal'; nextfield ='Edit18';" onblur="this.className='normal'"  onchange="Salva17(this.value)" style="text-transform: uppercase;"  tabindex="17" maxlength="35"   />
</div>
<div id="Label19_outer" style="Z-INDEX: 58; LEFT: 604px; WIDTH: 64px; POSITION: absolute; TOP: 320px; HEIGHT: 19px">
<div id="Label19" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:64px;"   ><STRONG>Fone.:</STRONG></div>
</div>
<div id="Edit18_outer" style="Z-INDEX: 59; LEFT: 668px; WIDTH: 154px; POSITION: absolute; TOP: 315px; HEIGHT: 26px">
<input type="text" id="Edit18" name="Edit18" value="<?php echo $Edit18 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:154px;" onfocus="this.className='anormal'; nextfield ='Edit19';" onblur="this.className='normal'"  onchange="Salva18(this.value)" style="text-transform: uppercase;"   tabindex="18"   maxlength="20" />
</div>
<div id="Label17_outer" style="Z-INDEX: 60; LEFT: 537px; WIDTH: 56px; POSITION: absolute; TOP: 345px; HEIGHT: 19px">
<div id="Label17" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:56px;"   ><STRONG>CTPS.:</STRONG></div>
</div>
<div id="Edit20_outer" style="Z-INDEX: 61; LEFT: 600px; WIDTH: 222px; POSITION: absolute; TOP: 340px; HEIGHT: 26px">
<input type="text" id="Edit20" name="Edit20" value="<?php echo $Edit20 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:222px;" onfocus="this.className='anormal'; nextfield ='Edit21';" onblur="this.className='normal'"  onchange="Salva20(this.value)" style="text-transform: uppercase;"   tabindex="21"  maxlength="35"  />
</div>

<div id="Label71_outer" style="Z-INDEX: 35; LEFT: 380px; WIDTH: 450px; POSITION: absolute; TOP: 485px; HEIGHT: 80px">
<div id="Label71" style=" font-family: Verdana; font-size: 13px; color: #ff0000;font-weight: normal; height:24px;width:450px;"   ><center><b><?php echo $alerta_2 ?></b></center></STRONG></div>
</div>


</td></tr></table>
</form></body>
</html>

<?php
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
@session_start();
$path = strtoupper($_SESSION['Path1']);

// include("../logar.php");
$nome3 = $_SESSION["nome_log"];

include_once("funcoes2.php");

$deixar_1 = acesso("ESTOQUE");

if ($deixar_1 == "NAO"){
	
    echo "  <html>
			<head>
			<title>ERRO AO CONECTAR</title>
            <link rel='shortcut icon' href='../imagens/favicon.ico'/>
			</head>
			<body>
			<style type=text/css>
			body { background-image: url('../$logo_sis');
                   background-attachment: fixed }
            </style> 
			</html>
			<br><br><br><br>
			<div align=center>
			<table align=center border='15' bgcolor='#FFF8DC'  bordercolor ='$color_bor'>
			<tr>
			<td align=center>
			     <font face=arial><b>*** ERRO ACESSO NÃO PERMITIDO PARA USUARIO !!! ***<br>
				                     Entre em Contato com o Administrador do Programa <br>
									 erro: TENTATIVA DE ACESSO</b>
			<table align=center>
			<form method='POST' action='../index.php'>
			<td><input type=image name='voltar' src='../imagens/botao_voltar.PNG'></td>
			</form></table></td></tr></table>
			</div>";
	        exit();
}	

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
$Edit13	    = @$row0["memo1"];
$alerta_1   = @$row0["mensage1"];
$categ_1    = @$row0["mensage2"];
$nome_do_edif = @$row0["mensage3"];
$nome_cad_si  = @$row0["mensage4"];

$cami2 = '../imagens/fotos/Branco.bmp';  

$menssagens = "* * * Alterar * * *";

// Abrir tabela Senha

$tabela_1 = strtoupper('estoque');

$consulta3 = "SELECT * FROM permissoes WHERE login = '$nome3a' and tabela = '$tabela_1'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$per1       = @$row3["incluir"];
$per2       = @$row3["alterar"];
$per3       = @$row3["excluir"];
$per4       = @$row3["imprimir"];


$hostname_conn = $host;
$database_conn = $db;
$username_conn = $user;
$password_conn = $pass;

// Conectamos ao nosso servidor MySQL
if(!($conn = @mysql_connect($hostname_conn,$username_conn,$password_conn))) 
{
   echo "<b><center><font color='#FFFFFF'>Erro ao conectar ao DB.</font></center><b>";
   //exit;
}
// Selecionamos nossa base de dados MySQL
if(!($con = @mysql_select_db($database_conn,$conn))) 
{
   echo "<b><center><font color='#FFFFFF'>Erro ao conectar ao DB.</font></center><b>";
   //exit;
}


$query_Recordset1 = "SELECT * FROM fornecedor";
$Recordset1 = @mysql_query($query_Recordset1, $conn); // or die(mysql_error());
$row_Recordset1 = @mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = @mysql_num_rows($Recordset1);


$query_Recordset2 = "SELECT * FROM classe";
$Recordset2 = @mysql_query($query_Recordset2, $conn); // or die(mysql_error());
$row_Recordset2 = @mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = @mysql_num_rows($Recordset2);

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
		document.getElementById("Edit20").focus();	
		}
		
		</script>
		<?php
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

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; " onkeydown="javascript:if (event.KeyCode==13) event.KeyCode=9; javascript:document.onkeydown = keyCatcher();" onload="foco();"    >
<form style="margin-bottom: 0" id="Unit2" name="Unit2" method="post"  action="/estoque_lay.php">
<table  width="1000"   style="height:648px"  border="0" cellpadding="0" cellspacing="0"   align="Center" ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 141px; WIDTH: 724px; POSITION: absolute; TOP: 44px; HEIGHT: 519px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(16, 16, 692 - 16, 487 - 16);
  Shape1_Canvas.fillRect(16, 16, 692 - 16 + 1, 487 - 16 + 1);
  Shape1_Canvas.setStroke(16);
  Shape1_Canvas.setColor("#5A9CB1");
  Shape1_Canvas.drawRect(16, 16, 692 - 16 + 1, 487 - 16 + 1);
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
  Shape2_Canvas.setColor("#5A9CB1");
  Shape2_Canvas.drawRect(1, 1, 656 - 1 + 1, 53 - 1 + 1);
  Shape2_Canvas.paint();
</script>

</div>
<div id="Label1_outer" style="Z-INDEX: 2; LEFT: 183px; WIDTH: 441px; POSITION: absolute; TOP: 90px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: #5A9CB1; background-color: #FFFFFF;height:32px;width:441px;"   ><STRONG>Cadastro de&nbsp;Estoque</STRONG></div>
</div>
<div id="Menssage_outer" style="Z-INDEX: 3; LEFT: 614px; WIDTH: 208px; POSITION: absolute; TOP: 95px; HEIGHT: 24px">
<div id="Menssage" style=" font-family: Verdana; font-size: 14px;  height:24px;width:208px;"  align="Center"   ><STRONG><?php echo $menssagens ?> </STRONG></div>
</div>
<div id="Shape3_outer" style="Z-INDEX: 4; LEFT: 174px; WIDTH: 658px; POSITION: absolute; TOP: 133px; HEIGHT: 397px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 656 - 1, 395 - 1);
  Shape3_Canvas.fillRect(1, 1, 656 - 1 + 1, 395 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("#5A9CB1");
  Shape3_Canvas.drawRect(1, 1, 656 - 1 + 1, 395 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 5; LEFT: 181px; WIDTH: 91px; POSITION: absolute; TOP: 144px; HEIGHT: 26px">
<div id="Label2" style=" font-family: Verdana; font-size: 12px; color: #000000;font-weight: normal; height:26px;width:91px;"   ><STRONG>Codigo.:</STRONG></div>
</div>
<div id="Edit1a_outer" style="Z-INDEX: 6; LEFT: 278px; WIDTH: 90px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit1a" name="Edit1" value="<?php echo $Edit1 ?>" style=" font-family: Verdana; font-size: 14px;  background-color: #FFFFFF;height:25px;width:90px;" readonly   tabindex="1"    />
</div>
<div id="Label3_outer" style="Z-INDEX: 7; LEFT: 382px; WIDTH: 106px; POSITION: absolute; TOP: 144px; HEIGHT: 18px">
<div id="Label3" style=" font-family: Verdana; font-size: 12px; color: #000000;font-weight: normal; height:18px;width:106px;"   ><STRONG>Data.:</STRONG></div>
</div>
<div id="Edit2a_outer" style="Z-INDEX: 8; LEFT: 430px; WIDTH: 98px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit2a" name="Edit2" value="<?php echo $Edit2 ?>" style=" font-family: Verdana; font-size: 14px;  background-color: #FFFFFF;height:25px;width:98px;" readonly   tabindex="2"    />
</div>
<div id="Label11_outer" style="Z-INDEX: 9; LEFT: 181px; WIDTH: 123px; POSITION: absolute; TOP: 170px; HEIGHT: 26px">
<div id="Label11" style=" font-family: Verdana; font-size: 12px; color: #000000;font-weight: normal; height:26px;width:123px;"   ><STRONG>Descrição.:</STRONG>&nbsp;</div>
</div>
<div id="Label12_outer" style="Z-INDEX: 10; LEFT: 181px; WIDTH: 115px; POSITION: absolute; TOP: 194px; HEIGHT: 26px">
<div id="Label12" style=" font-family: Verdana; font-size: 12px; color: #000000;font-weight: normal; height:26px;width:115px;"   ><STRONG>Unidade.:</STRONG>&nbsp;</div>
</div>
<div id="Edit4a_outer" style="Z-INDEX: 11; LEFT: 278px; WIDTH: 74px; POSITION: absolute; TOP: 189px; HEIGHT: 26px">
<input type="text" id="Edit4a" name="Edit4" onchange="Salva4(this.value)" value="<?php echo $Edit4 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:74px;" onfocus="this.className='anormal'" onblur="this.className='normal'"    tabindex="4"    />
</div>
<div id="Label13_outer" style="Z-INDEX: 12; LEFT: 181px; WIDTH: 89px; POSITION: absolute; TOP: 218px; HEIGHT: 26px">
<div id="Label13" style=" font-family: Verdana; font-size: 12px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Classe.:</STRONG>&nbsp;</div>
</div>
<div id="Edit7a_outer" style="Z-INDEX: 13; LEFT: 278px; WIDTH: 162px; POSITION: absolute; TOP: 213px; HEIGHT: 26px">
<select type="text" id="Edit7a" name="Edit7" onchange="Salva7(this.value)" value="<?php echo $Edit7 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:162px;" onfocus="this.className='anormal'" onblur="this.className='normal'"   tabindex="7"    />

<?php


if (!empty($Edit7))
{
	
?>
    <option value="<?php echo $Edit7 ?>"> <?php echo $Edit7 ?> </option>

<?php
	
}


?>


                                                      <?php
Do {  
?>
                                                      <option value="<?php echo $row_Recordset2['nome']?>"><?php echo $row_Recordset2['nome']?></option>
                                                      <?php

}
while ($row_Recordset2 = @mysql_fetch_assoc($Recordset2));
      $rows2 = @mysql_num_rows($Recordset2);
      if($rows2 > 0) {
         @mysql_data_seek($Recordset2, 0);
	     $row_Recordset2 = @mysql_fetch_assoc($Recordset2);
      }
          
?>

</select>


</div>
<div id="Label68_outer" style="Z-INDEX: 14; LEFT: 180px; WIDTH: 132px; POSITION: absolute; TOP: 346px; HEIGHT: 24px">
<div id="Label68" style=" font-family: Verdana; font-size: 12px; color: #000000;font-weight: normal; height:24px;width:132px;"   ><STRONG>Observação:</STRONG></div>
</div>
<div id="Edit3a_outer" style="Z-INDEX: 16; LEFT: 278px; WIDTH: 410px; POSITION: absolute; TOP: 164px; HEIGHT: 26px">
<input type="text" id="Edit3a" name="Edit3" onchange="Salva3(this.value)" value="<?php echo $Edit3 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:410px;" onfocus="this.className='anormal'" onblur="this.className='normal'"   tabindex="3"    />
</div>
<div id="Label4_outer" style="Z-INDEX: 32; LEFT: 359px; WIDTH: 113px; POSITION: absolute; TOP: 194px; HEIGHT: 26px">
<div id="Label4" style=" font-family: Verdana; font-size: 12px; color: #000000;font-weight: normal; height:26px;width:113px;"   ><STRONG>Qtd.Estoq.:</STRONG>&nbsp;</div>
</div>
<div id="Edit5a_outer" style="Z-INDEX: 33; LEFT: 456px; WIDTH: 72px; POSITION: absolute; TOP: 189px; HEIGHT: 26px">
<input type="text" id="Edit5a" name="Edit5" onchange="Salva5(this.value)" value="<?php echo $Edit5 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:72px;" onfocus="this.className='anormal'" onblur="this.className='normal'"   tabindex="5"    />
</div>
<div id="Label5_outer" style="Z-INDEX: 34; LEFT: 537px; WIDTH: 103px; POSITION: absolute; TOP: 194px; HEIGHT: 26px">
<div id="Label5" style=" font-family: Verdana; font-size: 12px; color: #000000;font-weight: normal; height:26px;width:103px;"   ><STRONG>Qtd.Min.:</STRONG>&nbsp;</div>
</div>
<div id="Edit6a_outer" style="Z-INDEX: 35; LEFT: 616px; WIDTH: 72px; POSITION: absolute; TOP: 189px; HEIGHT: 26px">
<input type="text" id="Edit6a" name="Edit6" onchange="Salva6(this.value)" value="<?php echo $Edit6 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:72px;" onfocus="this.className='anormal'" onblur="this.className='normal'"   tabindex="6"    />
</div>
<div id="Label6_outer" style="Z-INDEX: 36; LEFT: 451px; WIDTH: 133px; POSITION: absolute; TOP: 218px; HEIGHT: 26px">
<div id="Label6" style=" font-family: Verdana; font-size: 12px; color: #000000;font-weight: normal; height:26px;width:133px;"   ><STRONG>Vencimento.:</STRONG>&nbsp;</div>
</div>
<div id="Edit8a_outer" style="Z-INDEX: 37; LEFT: 548px; WIDTH: 140px; POSITION: absolute; TOP: 213px; HEIGHT: 26px">
<input type="text" id="Edit8a" name="Edit8" onchange="Salva8(this.value)" value="<?php echo $Edit8 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:140px;" onfocus="this.className='anormal'" onblur="this.className='normal'"   tabindex="8"    />
</div>
<div id="Label7_outer" style="Z-INDEX: 38; LEFT: 181px; WIDTH: 139px; POSITION: absolute; TOP: 243px; HEIGHT: 26px">
<div id="Label7" style=" font-family: Verdana; font-size: 12px; color: #000000;font-weight: normal; height:26px;width:139px;"   ><STRONG>Fornecedor.:</STRONG>&nbsp;</div>
</div>
<div id="Edit9a_outer" style="Z-INDEX: 39; LEFT: 278px; WIDTH: 410px; POSITION: absolute; TOP: 237px; HEIGHT: 26px">
<select type="text" id="Edit9a" name="Edit9" onchange="Salva9(this.value)" value="<?php echo $Edit9 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:410px;" onfocus="this.className='anormal'" onblur="this.className='normal'"   tabindex="9"    />

<?php


if (!empty($Edit9))
{
	
?>
    <option value="<?php echo $Edit9 ?>"> <?php echo $Edit9 ?> </option>

<?php
	
}


?>


                                                      <?php
Do {  
?>
                                                      <option value="<?php echo $row_Recordset1['nome']?>"><?php echo $row_Recordset1['nome']?></option>
                                                      <?php

}
while ($row_Recordset1 = @mysql_fetch_assoc($Recordset1));
      $rows1 = @mysql_num_rows($Recordset1);
      if($rows1 > 0) {
         @mysql_data_seek($Recordset1, 0);
	     $row_Recordset1 = @mysql_fetch_assoc($Recordset1);
      }
          
?>

</select>


</div>
<div id="Label8_outer" style="Z-INDEX: 40; LEFT: 181px; WIDTH: 123px; POSITION: absolute; TOP: 267px; HEIGHT: 26px">
<div id="Label8" style=" font-family: Verdana; font-size: 12px; color: #000000;font-weight: normal; height:26px;width:123px;"   ><STRONG>Referência.:</STRONG>&nbsp;</div>
</div>
<div id="Edit10a_outer" style="Z-INDEX: 41; LEFT: 278px; WIDTH: 250px; POSITION: absolute; TOP: 261px; HEIGHT: 26px">
<input type="text" id="Edit10a" name="Edit10" onchange="Salva10(this.value)" value="<?php echo $Edit10 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:250px;" onfocus="this.className='anormal'" onblur="this.className='normal'"   tabindex="10"    />
</div>
<div id="Label9_outer" style="Z-INDEX: 42; LEFT: 181px; WIDTH: 91px; POSITION: absolute; TOP: 291px; HEIGHT: 26px">
<div id="Label9" style=" font-family: Verdana; font-size: 12px; color: #000000;font-weight: normal; height:26px;width:91px;"   ><STRONG>Saldo.:</STRONG></div>
</div>
<div id="Edit11a_outer" style="Z-INDEX: 43; LEFT: 278px; WIDTH: 114px; POSITION: absolute; TOP: 287px; HEIGHT: 26px">
<input type="text" id="Edit11a" name="Edit11" onchange="Salva11(this.value)" value="<?php echo $Edit11 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:114px;" onfocus="this.className='anormal'" onblur="this.className='normal'"   tabindex="11"    />
</div>
<div id="Label10_outer" style="Z-INDEX: 44; LEFT: 406px; WIDTH: 84px; POSITION: absolute; TOP: 291px; HEIGHT: 18px">
<div id="Label10" style=" font-family: Verdana; font-size: 12px; color: #000000;font-weight: normal; height:18px;width:84px;"   ><STRONG>Valor.:</STRONG></div>
</div>
<div id="Edit12a_outer" style="Z-INDEX: 45; LEFT: 463px; WIDTH: 105px; POSITION: absolute; TOP: 287px; HEIGHT: 26px">
<input type="text" id="Edit12a" name="Edit12" onchange="Salva12(this.value)" value="<?php echo $Edit12 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:105px;" onfocus="this.className='anormal'" onblur="this.className='normal'"   tabindex="12"    />
</div>
<div id="Edit13a_outer" style="Z-INDEX: 15; LEFT: 278px; WIDTH: 544px; POSITION: absolute; TOP: 344px; HEIGHT: 104px">
<textarea id="Edit13a" name="Edit13" style=" font-family: Verdana; font-size: 14px;  height:103px;width:544px;" onfocus="this.className='anormal'" onblur="this.className='normal'"  onchange="Salva13(this.value)"  tabindex="13"    wrap="virtual"><?php echo $Edit13 ?></textarea>
</div>

<div id="Image1_outer" style="Z-INDEX: 31; LEFT: 704px; WIDTH: 112px; POSITION: absolute; TOP: 147px; HEIGHT: 125px">
<div id="Image1_container" style=" width: 112;  height: 125; overflow: hidden;" ><img id="Image1" src="../imagens/Fotobranco.jpg"  width="112"  height="125"  border="1"  style=" border-color: #000000 "       /></div>
</div>

<div id="Image2_outer" style="Z-INDEX: 46; LEFT: 712px; WIDTH: 92px; POSITION: absolute; TOP: 279px; HEIGHT: 22px">
<div id="Image2_container" style=" width: 92;  height: 22; overflow: hidden;" ><img id="Image2" src="../imagens/botaoazul1.PNG"  width="92"  height="22"  border="0"       /></div>
</div>
</td></tr></table>
	  
	       
</div>
</body>




</html>
<script>
function janelaSecundaria (URL){ 
   window.open(URL,"janela2","width=690,height=235,resizable=NO,status=NO,Scrollbars=NO,location=NO,menubar=NO,toolbar=NO"); 
} 
</script>

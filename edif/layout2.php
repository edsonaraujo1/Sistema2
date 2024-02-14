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
@session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");
$nome3 = $_SESSION["nome_log"];

include_once('../sql_injection.php');

include_once("funcoes2.php");

$deixar_1 = acesso("FORM_EDIF");

if ($deixar_1 == "NAO"){
	
    echo "              <html>
			<head>
			<title>ERRO AO CONECTAR</title>
            <link rel='shortcut icon' href='../imagens/favicon.ico'/>
			</head>
			<body>
						
			<style type=text/css>
			
			body { background-image: url('../$logo_sis');
                   background-attachment: fixed }
			
			<!--.cp {  font: bold 10px Arial; color: black}
			<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
			<!--.ld { font: bold 15px Arial; color: #000000}
			<!--.ct { FONT: 9px 'Arial Narrow'; COLOR: #000033}
			<!--.cn { FONT: 9px Arial; COLOR: black }
			<!--.bc { font: bold 22px Arial; color: #000000 }
			--></style> 
			
			</HEAD>
			

			</html>
			
			<br><br><br><br>
				
			<div align=center>
			
			<table align=center border='15' bgcolor='#FFF8DC'  bordercolor ='$color_bor'>
			<tr>
			<td align=center>
			     <font face=arial><b>*** <font color = #FF0000> ERRO ACESSO NÃO PERMITIDO !!!</font> ***<br>
				                     
									 <font face=arial>Usuário sem Permissão</b>
			<table align=center>
			<form method='POST' action='../avaleht.php'>
			<td><input type=image name='voltar' src='../imagens/botao_voltar.PNG'></td>
			</form>
			</table>
			</td>
			</tr>
			</table>
			</div>
";
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
$Edit13	    = @$row0["Edit13"];
$Edit14	    = @$row0["Edit14"];
$Edit15	    = @$row0["Edit15"];
$Edit16	    = @$row0["Edit16"];
$Edit17	    = @$row0["Edit17"];
$Edit18	    = @$row0["Edit18"];
$Edit19	    = @$row0["Edit19"];
$Edit20	    = @$row0["memo1"];
$alerta_1   = @$row0["mensage1"];
$categ_1    = @$row0["mensage2"];
$nome_do_edif = @$row0["mensage3"];
$nome_cad_si  = @$row0["mensage4"];

$alerta_1 = $alerta_1;
$nome2_adms = $nome_do_edif; 

$menssagens = "* * * Incluir * * *";

// Abrir tabela Senha

$tabela_1 = strtoupper('edificios');

$consulta3 = "SELECT * FROM permissoes WHERE login = '". anti_sql_injection($nome3) ."' and tabela = '". anti_sql_injection($tabela_1) ."'";

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

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px;" onkeydown="javascript:if (event.KeyCode==13) event.KeyCode=9; javascript:document.onkeydown = keyCatcher();" onload="foco();">
<form style="margin-bottom: 0" id="Form1" name="Form1" method="post"  action="pesquisa.php">
<table  width="10"   style="height:10px"  border="0" cellpadding="0" cellspacing="0"   align="Center" ><tr><td valign="top">
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
<div id="Label1_outer" style="Z-INDEX: 2; LEFT: 183px; WIDTH: 329px; POSITION: absolute; TOP: 90px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: <?=$color_bor;?>; background-color: #FFFFFF;height:32px;width:329px;"   ><STRONG>Cadastro de&nbsp;Empresas</STRONG></div>
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
<div id="Edit1_outer" style="Z-INDEX: 6; LEFT: 278px; WIDTH: 56px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit1" name="Edit1" value="<?=$Edit1;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:56px; background-color: #FFFFFF;" disabled tabindex="1"   />
</div>
<div id="Label3_outer" style="Z-INDEX: 7; LEFT: 382px; WIDTH: 84px; POSITION: absolute; TOP: 144px; HEIGHT: 18px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:84px;"   ><STRONG>Atividade.:</STRONG></div>
</div>
<div id="Edit2_outer" style="Z-INDEX: 8; LEFT: 470px; WIDTH: 137px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<select id="Edit2" name="Edit2" value="<?=$Edit2;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:137px;" onfocus="this.className='anormal'; nextfield ='Edit4';" onblur="this.className='normal'" onchange="Salva2(this.value)" style="text-transform: uppercase;"  tabindex="2"    />

<?

if (!empty($Edit2))
{
?>	
	<option value="<?=$Edit2;?>"> <?=$Edit2;?> </option>
            <option value="CONTRIBUINTE">     CONTRIBUINTE     </option>
            <option value="NAO CONTRIBUINTE"> NAO CONTRIBUINTE </option>
            <option value="TERCEIRIZADO">     TERCEIRIZADO     </option>
<?	

}else{
	
?>	
            <option value=" ">  </option>
            <option value="CONTRIBUINTE">     CONTRIBUINTE     </option>
            <option value="NAO CONTRIBUINTE"> NAO CONTRIBUINTE </option>
            <option value="TERCEIRIZADO">     TERCEIRIZADO     </option>
<?            
 }
?>

</select>

</div>
<div id="Label4_outer" style="Z-INDEX: 9; LEFT: 676px; WIDTH: 47px; POSITION: absolute; TOP: 144px; HEIGHT: 18px">
<div id="Label4" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:47px;"   ><STRONG>Data.:</STRONG></div>
</div>
<div id="Edit3_outer" style="Z-INDEX: 10; LEFT: 729px; WIDTH: 93px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit3" name="Edit3" value="<?=$Edit3;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:93px;" onfocus="this.className='anormal'; nextfield ='Edit4';" onblur="this.className='normal'" disabled   tabindex="3"    />
</div>
<div id="Edit4_outer" style="Z-INDEX: 36; LEFT: 278px; WIDTH: 193px; POSITION: absolute; TOP: 166px; HEIGHT: 26px">
<select id="Edit4" name="Edit4" value="<?=$Edit4;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:193px;" onfocus="this.className='anormal'; nextfield ='Edit5';" onblur="this.className='normal'" onchange="Salva4(this.value)" tabindex="4"    />

<?

if (!empty($Edit4))
{
?>	
	<option value="<?=$Edit4;?>"> <?=$Edit4;?> </option>
			<option value="EMPRESA"> EMPRESA </option>
			<option value="FILIADO"> FILIADO </option>
			<option value="ASSOCIAÇÃO"> ASSOCIAÇÃO </option>
			<option value="COND."> COND. </option>
			<option value="COND. COMERCIAL"> COND. COMERCIAL </option>
			<option value="COND. CONJ."> COND. CONJ. </option>
			<option value="COND. CONJ. HABIT."> COND. CONJ. HABIT. </option>
			<option value="COND. CONJ. RESID."> COND. CONJ. RESID. </option>
			<option value="COND. EDIF."> COND. EDIF. </option>
			<option value="COND. EDIF. CONJ."> COND. EDIF. CONJ. </option>
			<option value="COND. EDIF. CONJ. RESID."> COND. EDIF. CONJ. RESID. </option>
			<option value="COND. EDIF. RESID."> COND. EDIF. RESID. </option>
			<option value="COND. FLAT HOTEL"> COND. FLAT HOTEL </option>
			<option value="COND. PQ. RESID."> COND. PQ. RESID. </option>
			<option value="COND. RESID."> COND. RESID. </option>
			<option value="COND. RESID. EDIF."> COND. RESID. EDIF. </option>
			<option value="COND. RESID. FLAT"> COND. RESID. FLAT </option>
			<option value="CONJ."> CONJ. </option>
			<option value="CONJ. HABIT."> CONJ. HABIT. </option>
			<option value="CONJ. RESID."> CONJ. RESID. </option>
			<option value="COOPERATIVA"> COOPERATIVA </option>
			<option value="EDIF."> EDIF. </option>
			<option value="EDIF. COMERCIAL"> EDIF. COMERCIAL </option>
			<option value="EDIF. COND. RESID."> EDIF. COND. RESID. </option>
			<option value="EDIF. FLAT HOTEL"> EDIF. FLAT HOTEL </option>
			<option value="EDIF. RESID."> EDIF. RESID. </option>
			<option value="EDIF. RESID. FLAT"> EDIF. RESID. FLAT </option>
			<option value="EDIF. SHOPPING"> EDIF. SHOPPING </option>
			<option value="EMPRESA"> EMPRESA </option>
			<option value="FABRICA"> FABRICA </option>
			<option value="FLAT. HOTEL"> FLAT. HOTEL </option>
			<option value="GALERIA"> GALERIA </option>
			<option value="HOTEL"> HOTEL </option>
			<option value="HOTEL FLAT"> HOTEL FLAT </option>
			<option value="IGREJA"> IGREJA </option>
			<option value="PREDIO"> PREDIO </option>
			<option value="SHOPPING"> SHOPPING </option>
			<option value="SOC."> SOC. </option>

<?	

}else{
	
?>	
            <option value=" ">  </option>
			<option value="EMPRESA"> EMPRESA </option>
			<option value="FILIADO"> FILIADO </option>
			<option value="ASSOCIAÇÃO"> ASSOCIAÇÃO </option>
			<option value="COND."> COND. </option> 
			<option value="COND. COMERCIAL"> COND. COMERCIAL </option>
			<option value="COND. CONJ."> COND. CONJ. </option>
			<option value="COND. CONJ. HABIT."> COND. CONJ. HABIT. </option>
			<option value="COND. CONJ. RESID."> COND. CONJ. RESID. </option>
			<option value="COND. EDIF."> COND. EDIF. </option>
			<option value="COND. EDIF. CONJ."> COND. EDIF. CONJ. </option>
			<option value="COND. EDIF. CONJ. RESID."> COND. EDIF. CONJ. RESID. </option>
			<option value="COND. EDIF. RESID."> COND. EDIF. RESID. </option>
			<option value="COND. FLAT HOTEL"> COND. FLAT HOTEL </option>
			<option value="COND. PQ. RESID."> COND. PQ. RESID. </option>
			<option value="COND. RESID."> COND. RESID. </option>
			<option value="COND. RESID. EDIF."> COND. RESID. EDIF. </option>
			<option value="COND. RESID. FLAT"> COND. RESID. FLAT </option>
			<option value="CONJ."> CONJ. </option>
			<option value="CONJ. HABIT."> CONJ. HABIT. </option>
			<option value="CONJ. RESID."> CONJ. RESID. </option>
			<option value="COOPERATIVA"> COOPERATIVA </option>
			<option value="EDIF."> EDIF. </option>
			<option value="EDIF. COMERCIAL"> EDIF. COMERCIAL </option>
			<option value="EDIF. COND. RESID."> EDIF. COND. RESID. </option>
			<option value="EDIF. FLAT HOTEL"> EDIF. FLAT HOTEL </option>
			<option value="EDIF. RESID."> EDIF. RESID. </option>
			<option value="EDIF. RESID. FLAT"> EDIF. RESID. FLAT </option>
			<option value="EDIF. SHOPPING"> EDIF. SHOPPING </option>
			<option value="EMPRESA"> EMPRESA </option>
			<option value="FABRICA"> FABRICA </option>
			<option value="FLAT. HOTEL"> FLAT. HOTEL </option>
			<option value="GALERIA"> GALERIA </option>
			<option value="HOTEL"> HOTEL </option>
			<option value="HOTEL FLAT"> HOTEL FLAT </option>
			<option value="IGREJA"> IGREJA </option>
			<option value="PREDIO"> PREDIO </option>
			<option value="SHOPPING"> SHOPPING </option>
			<option value="SOC."> SOC. </option>
<?            
 }
?>

</select>

</div>
<div id="Label11_outer" style="Z-INDEX: 11; LEFT: 181px; WIDTH: 89px; POSITION: absolute; TOP: 170px; HEIGHT: 26px">
<div id="Label11" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Nome.:</STRONG>&nbsp;</div>
</div>
<div id="Edit5_outer" style="Z-INDEX: 12; LEFT: 470px; WIDTH: 352px; POSITION: absolute; TOP: 165px; HEIGHT: 26px">
<input type="text" id="Edit5" name="Edit5" value="<?=$Edit5;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:352px;" onfocus="this.className='anormal'; nextfield ='Edit6';" onblur="this.className='normal'" onchange="Salva5(this.value)" style="text-transform: uppercase;"    tabindex="5"    />
</div>
<div id="Label12_outer" style="Z-INDEX: 13; LEFT: 181px; WIDTH: 89px; POSITION: absolute; TOP: 194px; HEIGHT: 26px">
<div id="Label12" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Endereco.:</STRONG>&nbsp;</div>
</div>
<div id="Edit6_outer" style="Z-INDEX: 14; LEFT: 278px; WIDTH: 192px; POSITION: absolute; TOP: 189px; HEIGHT: 26px">
<input type="text" id="Edit6" name="Edit6" value="<?=$Edit6;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:192px;" onfocus="this.className='anormal'; nextfield ='Edit7';" onblur="this.className='normal'"  onchange="Salva6(this.value)" style="text-transform: uppercase;"  tabindex="6"  />
</div>
<div id="Edit7_outer" style="Z-INDEX: 15; LEFT: 470px; WIDTH: 352px; POSITION: absolute; TOP: 189px; HEIGHT: 26px">
<input type="text" id="Edit7" name="Edit7" value="<?=$Edit7;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:352px;" onfocus="this.className='anormal'; nextfield ='Edit8';" onblur="this.className='normal'"  onchange="Salva7(this.value)"   style="text-transform: uppercase;"  tabindex="7"    />
</div>
<div id="Label13_outer" style="Z-INDEX: 16; LEFT: 181px; WIDTH: 89px; POSITION: absolute; TOP: 218px; HEIGHT: 26px">
<div id="Label13" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Numero.:</STRONG>&nbsp;</div>
</div>
<div id="Edit8_outer" style="Z-INDEX: 17; LEFT: 278px; WIDTH: 193px; POSITION: absolute; TOP: 213px; HEIGHT: 26px">
<input type="text" id="Edit8" name="Edit8" value="<?=$Edit8;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:193px;" onfocus="this.className='anormal'; nextfield ='Edit9';" onblur="this.className='normal'"  onchange="Salva8(this.value)"  style="text-transform: uppercase;"    tabindex="8"    />
</div>
<div id="Label14_outer" style="Z-INDEX: 18; LEFT: 468px; WIDTH: 62px; POSITION: absolute; TOP: 242px; HEIGHT: 26px">
<div id="Label14" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:62px;"   ><STRONG>Bairro.:</STRONG>&nbsp;</div>
</div>
<div id="Edit10_outer" style="Z-INDEX: 19; LEFT: 532px; WIDTH: 180px; POSITION: absolute; TOP: 237px; HEIGHT: 26px">
<input type="text" id="Edit10" name="Edit10" value="<?=$Edit10;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:180px;" onfocus="this.className='anormal'; nextfield ='Edit11';" onblur="this.className='normal'"  onchange="Salva10(this.value)"  style="text-transform: uppercase;"  tabindex="10"    />
</div>
<div id="Label15_outer" style="Z-INDEX: 20; LEFT: 181px; WIDTH: 89px; POSITION: absolute; TOP: 242px; HEIGHT: 26px">
<div id="Label15" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Cep.:</STRONG>&nbsp;</div>
</div>
<div id="Edit9_outer" style="Z-INDEX: 21; LEFT: 278px; WIDTH: 83px; POSITION: absolute; TOP: 237px; HEIGHT: 26px">
<input type="text" id="Edit9" name="Edit9" value="<?=$Edit9;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:83px;" onfocus="this.className='anormal'; nextfield ='Edit10';" onblur="this.className='normal'"  onkeypress="return txtBoxFormat(document.Form1, 'Edit9', '99999-999', event);" onchange="Salva9(this.value)"   tabindex="9"    />
</div>
<div id="Label16_outer" style="Z-INDEX: 22; LEFT: 181px; WIDTH: 70px; POSITION: absolute; TOP: 267px; HEIGHT: 21px">
<div id="Label16" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:70px;"   ><STRONG>CNPJ.:</STRONG>&nbsp;</div>
</div>
<div id="Edit12_outer" style="Z-INDEX: 23; LEFT: 278px; WIDTH: 193px; POSITION: absolute; TOP: 262px; HEIGHT: 26px">
<input type="text" id="Edit12" name="Edit12" value="<?=$Edit12;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:193px;" onfocus="this.className='anormal'; nextfield ='Edit13';" onblur="this.className='normal'"  onkeypress="return txtBoxFormat(document.Form1, 'Edit12', '99.999.999/9999-99', event);" onchange="Salva12(this.value)"  tabindex="12"    />
</div>
<div id="Label17_outer" style="Z-INDEX: 24; LEFT: 718px; WIDTH: 70px; POSITION: absolute; TOP: 243px; HEIGHT: 26px">
<div id="Label17" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:70px;"   ><STRONG>Estado.:</STRONG>&nbsp;</div>
</div>
<div id="Edit11_outer" style="Z-INDEX: 25; LEFT: 783px; WIDTH: 39px; POSITION: absolute; TOP: 240px; HEIGHT: 26px">
<select id="Edit11" name="Edit11" value="<?=$Edit11;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:39px;" onfocus="this.className='anormal'; nextfield ='Edit12';" onblur="this.className='normal'"  onchange="Salva11(this.value)"  style="text-transform: uppercase;"  tabindex="11"    />


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
<div id="Label18_outer" style="Z-INDEX: 26; LEFT: 478px; WIDTH: 52px; POSITION: absolute; TOP: 267px; HEIGHT: 20px">
<div id="Label18" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:20px;width:52px;"   ><STRONG>Fone.:</STRONG>&nbsp;</div>
</div>
<div id="Edit13_outer" style="Z-INDEX: 27; LEFT: 532px; WIDTH: 153px; POSITION: absolute; TOP: 262px; HEIGHT: 26px">
<input type="text" id="Edit13" name="Edit13" value="<?=$Edit13;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:153px;" onfocus="this.className='anormal'; nextfield ='Edit14';" onblur="this.className='normal'"  onchange="Salva13(this.value)"   style="text-transform: uppercase;"  tabindex="13"    />
</div>
<div id="Edit14_outer" style="Z-INDEX: 38; LEFT: 783px; WIDTH: 39px; POSITION: absolute; TOP: 263px; HEIGHT: 26px">
<input type="text" id="Edit14" name="Edit14" value="<?=$Edit14;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:39px;" onfocus="this.className='anormal'; nextfield ='Edit15';" onblur="this.className='normal'"  onchange="Salva14(this.value)"    tabindex="14"    />
</div>


<div id="Label22_outer" style="Z-INDEX: 28; LEFT: 181px; WIDTH: 107px; POSITION: absolute; TOP: 292px; HEIGHT: 26px">
<div id="Label22" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:107px;"   ><STRONG>Tp. Imovel.:</STRONG>&nbsp;</div>
</div>
<div id="Edit15_outer" style="Z-INDEX: 29; LEFT: 278px; WIDTH: 193px; POSITION: absolute; TOP: 289px; HEIGHT: 26px">
<select id="Edit15" name="Edit15" value="<?=$Edit15;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:193px; background-color: #FFFFFF;" onchange="Salva15(this.value)" onFocus="nextfield ='Edit16';" style="text-transform: uppercase;"  tabindex="15"    />

<?

if (!empty($Edit15))
{
?>	
	<option value="<?=$Edit15;?>"> <?=$Edit15;?> </option>
            <option value="RESIDENCIAL">  RESIDENCIAL </option>
            <option value="COMERCIAL"> COMERCIAL </option>
            <option value="MISTO"> MISTO </option>
            <option value="FLAT"> FLAT </option>
<?	

}else{
	
?>	
            <option value=" ">  </option>
            <option value="RESIDENCIAL">  RESIDENCIAL </option>
            <option value="COMERCIAL"> COMERCIAL </option>
            <option value="MISTO"> MISTO </option>
            <option value="FLAT"> FLAT </option>
<?            
 }
?>

</select>

</div>
<div id="Label23_outer" style="Z-INDEX: 30; LEFT: 477px; WIDTH: 52px; POSITION: absolute; TOP: 292px; HEIGHT: 21px">
<div id="Label23" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:52px;"   ><STRONG>Zona.:</STRONG>&nbsp;</div>
</div>
<div id="Edit16_outer" style="Z-INDEX: 31; LEFT: 532px; WIDTH: 153px; POSITION: absolute; TOP: 287px; HEIGHT: 26px">
<select id="Edit16" name="Edit16" value="<?=$Edit16;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:153px; background-color: #FFFFFF;" onchange="Salva16(this.value)" onFocus="nextfield ='Edit17';" style="text-transform: uppercase;" tabindex="16"    />

<?

if (!empty($Edit16))
{
?>	
	<option value="<?=$Edit16;?>"> <?=$Edit16;?> </option>
            <option value="CENTRO"> CENTRO </option>
            <option value="NORTE"> NORTE </option>
            <option value="SUL"> SUL </option>
            <option value="LESTE"> LESTE </option>
            <option value="OESTE"> OESTE </option>
<?	

}else{
	
?>	
            <option value=" ">  </option>
            <option value="CENTRO"> CENTRO </option>
            <option value="NORTE"> NORTE </option>
            <option value="SUL"> SUL </option>
            <option value="LESTE"> LESTE </option>
            <option value="OESTE"> OESTE </option>
<?            
 }
?>

</select>

</div>




<div id="Label26_outer" style="Z-INDEX: 32; LEFT: 181px; WIDTH: 103px; POSITION: absolute; TOP: 341px; HEIGHT: 26px">
<div id="Label26" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:103px;"   ><STRONG>Cod.CONT.:</STRONG>&nbsp;</div>
</div>
<div id="Label68_outer" style="Z-INDEX: 33; LEFT: 180px; WIDTH: 103px; POSITION: absolute; TOP: 366px; HEIGHT: 24px">
<div id="Label68" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:103px;"   ><STRONG>Observacao:</STRONG></div>
</div>
<div id="obs_outer" style="Z-INDEX: 34; LEFT: 278px; WIDTH: 544px; POSITION: absolute; TOP: 362px; HEIGHT: 110px">
<textarea id="Edit20" name="Edit20" style=" font-family: Verdana; font-size: 14px;  height:109px;width:544px;" onfocus="this.className='anormal'; nextfield ='done';" onblur="this.className='normal'"   onchange="Salva20(this.value)" style="text-transform: uppercase;" tabindex="17"    wrap="virtual"><?=$Edit20;?></textarea>
</div>
<div id="Label70_outer" style="Z-INDEX: 35; LEFT: 363px; WIDTH: 100px; POSITION: absolute; TOP: 243px; HEIGHT: 18px">
<div id="Label70" style=" font-family: Verdana; font-size: 13px; color: #0000FF; height:18px;width:100px;"   ><A HREF="http://www.buscacep.correios.com.br/servicos/dnec/menuAction.do?Metodo=menuEndereco" target="new" ><STRONG>Procurar Cep </STRONG></A></div>
</div>
<div id="Label5_outer" style="Z-INDEX: 37; LEFT: 697px; WIDTH: 90px; POSITION: absolute; TOP: 268px; HEIGHT: 26px">
<div id="Label5" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:90px;"   ><STRONG>N. Empre.:</STRONG>&nbsp;</div>
</div>
<div id="Edit19_outer" style="Z-INDEX: 39; LEFT: 278px; WIDTH: 81px; POSITION: absolute; TOP: 337px; HEIGHT: 26px">
<input type="text" id="Edit19" name="Edit19" value="<?=$Edit19;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:81px;" onfocus="this.className='anormal'; nextfield ='Edit20';" onblur="this.className='normal'"  onchange="Salva19(this.value)"  tabindex="19"    />
</div>
<div id="Label6_outer" style="Z-INDEX: 40; LEFT: 361px; WIDTH: 459px; POSITION: absolute; TOP: 341px; HEIGHT: 18px">
<div id="Label6" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:459px;"   ><STRONG><FONT color=#0000ff><?=substr($nome2_adms,0,30);?></FONT></STRONG></div>
</div>
<div id="Label7_outer" style="Z-INDEX: 41; LEFT: 181px; WIDTH: 70px; POSITION: absolute; TOP: 317px; HEIGHT: 21px">
<div id="Label7" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:70px;"   ><STRONG>E-Mail.:</STRONG>&nbsp;</div>
</div>
<div id="Edit17_outer" style="Z-INDEX: 42; LEFT: 278px; WIDTH: 346px; POSITION: absolute; TOP: 312px; HEIGHT: 26px">
<input type="text" id="Edit17" name="Edit17" value="<?=$Edit17;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:346px;" onfocus="this.className='anormal'; nextfield ='Edit18';" onblur="this.className='normal'"  onchange="Salva17(this.value)"  tabindex="17"    />
</div>
<div id="Label8_outer" style="Z-INDEX: 43; LEFT: 640px; WIDTH: 147px; POSITION: absolute; TOP: 321px; HEIGHT: 18px">
<div id="Label8" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:147px;"   ><STRONG>Guias por E-mail.:</STRONG></div>
</div>
<div id="Edit18_outer" style="Z-INDEX: 44; LEFT: 783px; WIDTH: 39px; POSITION: absolute; TOP: 317px; HEIGHT: 26px">
<select id="Edit18" name="Edit18" value="<?=$Edit18;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:39px;" onfocus="this.className='anormal'; nextfield ='Edit19';" onblur="this.className='normal'"  onchange="Salva18(this.value)"  tabindex="18"    />

<?

if (!empty($Edit18))
{
?>	
	<option value="<?=$Edit18;?>"> <?=$Edit18;?> </option>
            <option value="SIM">  SIM </option>
            <option value="NAO">  NAO </option>
<?	

}else{
	
?>	
            <option value=" ">  </option>
            <option value="SIM">  SIM </option>
            <option value="NAO">  NAO </option>
<?            
 }
?>

</select>

</div>


<div id="Image1_outer" style="Z-INDEX: 45; LEFT: 696px; WIDTH: 56px; POSITION: absolute; TOP: 291px; HEIGHT: 22px">
<div id="Image1_container" style=" width: 92;  height: 22; overflow: hidden;" ><img alt="Consulta Contribuições." id="Image1" src="../imagens/botaoazul11.PNG"  width="92"  height="22"  border="0" /></div>
</div>

<!--
<div id="Image2_outer" style="Z-INDEX: 46; LEFT: 759px; WIDTH: 56px; POSITION: absolute; TOP: 290px; HEIGHT: 21px">
<div id="Image2_container" style=" width: 56;  height: 21; overflow: hidden;" ><a href="../sindical/mostra_grid.php?Cod_Edif=<?=$Edit1;?>&empr=1"><img alt="Consulta Sindical" id="Image2" src="../imagens/sind1.PNG"  width="56"  height="21"  border="0" /></a></div>
</div>
-->


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

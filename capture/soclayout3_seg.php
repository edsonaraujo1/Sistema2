<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Layout Cadastro Socios Alteracao
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

$deixar_1 = acesso("FORM_ASOC");

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
			<form method='POST' action='../avaleht.php?servletjs2=20$$20'>
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

$cami2 = '../imagens/fotos/Branco.bmp'; 

// Abre Conexão com o MySql
include("../conexao.php");
$link = @mysql_connect($host,$user,$pass);
@mysql_select_db($db);

$nome3a = strtolower($nome3);
// Abri Tabela Temp

$add4  = "SELECT * FROM $nome3a Where Nome1 = '$nome3a'";
		
$resultado4 = @mysql_query($add4);
		
$row4 = mysql_fetch_array($resultado4);
		
$Edit1		= @$row4["Edit1"];
$Edit2		= @$row4["Edit2"];
$Edit3		= @$row4["Edit3"];
$Edit4		= @$row4["Edit4"];
$Edit5		= @$row4["Edit5"];
$Edit6		= @$row4["Edit6"];
$Edit7		= @$row4["Edit7"];
$Edit8		= @$row4["Edit8"];
$Edit9		= @$row4["Edit9"];
$Edit10  	= @$row4["Edit10"];
$Edit11  	= @$row4["Edit11"];
$Edit12  	= @$row4["Edit12"];
$Edit13  	= @$row4["Edit13"];
$Edit14  	= @$row4["Edit14"];
$Edit15  	= @$row4["Edit15"];
$Edit16  	= @$row4["Edit16"];
$Edit17  	= @$row4["Edit17"];
$Edit18  	= @$row4["Edit18"];
$Edit19  	= @$row4["Edit19"];
$Edit20  	= @$row4["Edit20"];
$Edit21  	= @$row4["Edit21"];
$Edit22  	= @$row4["Edit22"];
$Edit23  	= @$row4["Edit23"];
$Edit24  	= @$row4["Edit24"];
$Edit25  	= @$row4["Edit25"];
$Edit26  	= @$row4["Edit26"];
$Edit27  	= @$row4["Edit27"];
$Edit28  	= @$row4["Edit28"];
$Edit29  	= @$row4["Edit29"];
$Edit30  	= @$row4["Edit30"];
$Edit31  	= @$row4["Edit31"];
$Edit32  	= @$row4["Edit32"];
$Edit33  	= @$row4["Edit33"];
$Edit34  	= @$row4["Edit34"];
$Edit35  	= @$row4["Edit35"];
$Edit36  	= @$row4["Edit36"];
$Edit37  	= @$row4["Edit37"];
$Edit38  	= @$row4["Edit38"];
$Edit39  	= @$row4["Edit39"];
$Edit40  	= @$row4["Edit40"];
$Edit41  	= @$row4["Edit41"];
$Edit42  	= @$row4["Edit42"];
$Edit43  	= @$row4["Edit43"];
$Edit44  	= @$row4["Edit44"];
$Edit45  	= @$row4["Edit45"];
$Edit46  	= @$row4["Edit46"];
$Edit47  	= @$row4["Edit47"];
$Edit48  	= @$row4["Edit48"];
$Edit49  	= @$row4["Edit49"];
$Edit50  	= @$row4["Edit50"];
$Edit51  	= @$row4["Edit51"];
$Edit52  	= @$row4["Edit52"];
$Edit53  	= @$row4["Edit53"];
$Edit54  	= @$row4["Edit54"];
$Edit55  	= @$row4["Edit55"];
$Edit56  	= @$row4["Edit56"];
$Edit57  	= @$row4["Edit57"];
$Edit58  	= @$row4["Edit58"];
$Edit59  	= @$row4["Edit59"];
$Edit60  	= @$row4["Edit60"];
$Edit61  	= @$row4["Edit61"];
$Edit62  	= @$row4["Edit62"];
$Edit63  	= @$row4["Edit63"];
$Edit64  	= @$row4["Edit64"];
$Edit65  	= @$row4["Edit65"];
$Edit66  	= @$row4["Edit66"];
$Edit67  	= @$row4["Edit67"];
$Edit68  	= @$row4["Edit68"];
$Edit69  	= @$row4["Edit69"];
$Edit70  	= @$row4["memo1"];
$nome_do_edif = substr(@$row4["mensage3"],0,47);
$categ_1      = @$row4["mensage2"];
$nome_cad_si  = @$row4["mensage4"];

// Abrir tabela Senha

$tabela_1 = strtoupper('socios');

$consulta3 = "SELECT * FROM permissoes WHERE login = '". anti_sql_injection($nome3) ."' and tabela = '". anti_sql_injection($tabela_1) ."'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$per1       = @$row3["incluir"];
$per2       = @$row3["alterar"];
$per3       = @$row3["excluir"];
$per4       = @$row3["imprimir"];

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
		document.getElementById("Edit22").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit22)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit23").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit23)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit24").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit24)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit25").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit25)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit26").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit26)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit29").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit29)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit30").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit30)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit31").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit31)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit32").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit32)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit33").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit33)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit34").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit34)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit35").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit35)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit36").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit36)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit37").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit37)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit38").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit38)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit39").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit39)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit40").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit40)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit41").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit41)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit42").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit42)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit43").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit43)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit44").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit44)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit45").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit45)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit46").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit46)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit47").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit47)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit48").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit48)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit49").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit49)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit50").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit50)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit51").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit51)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit52").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit52)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit53").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit53)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit54").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit54)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit55").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit55)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit56").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit56)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit57").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit57)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit58").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit58)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit59").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit59)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit60").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit60)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit61").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit61)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit62").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit62)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit63").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit63)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit64").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit64)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit65").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit65)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit66").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit66)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit67").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit67)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit68").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit68)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit69").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit69)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit70").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit70)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit3").focus();	
		}
		
		</script>
		<?
}

?>

<script language="JavaScript">
<!-- Begin
nextfield = "Edit3";
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

<html>
<head>
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; " onload="foco();">
<form style="margin-bottom: 0" id="Form1" name="Form1" method="post"  action="socupdate.php">
<table  width="794"   style="height:188px"  border="0" cellpadding="0" cellspacing="0"   align="Center" ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 91px; WIDTH: 819px; POSITION: absolute; TOP: 45px; HEIGHT: 55px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(16, 16, 787 - 16, 884 - 16);
  Shape1_Canvas.fillRect(16, 16, 787 - 16 + 1, 884 - 16 + 1);
  Shape1_Canvas.setStroke(16);
  Shape1_Canvas.setColor("<?=$color_bor;?>");
  Shape1_Canvas.drawRect(16, 16, 787 - 16 + 1, 884 - 16 + 1);
  Shape1_Canvas.paint();
</script>

</div>
<div id="Shape2_outer" style="Z-INDEX: 1; LEFT: 124px; WIDTH: 752px; POSITION: absolute; TOP: 79px; HEIGHT: 55px">
<script type="text/javascript">
  var Shape2_Canvas = new jsGraphics("Shape2_outer");
  Shape2_Canvas.setColor("#FFFFFF");
  Shape2_Canvas.fillRect(1, 1, 750 - 1, 53 - 1);
  Shape2_Canvas.fillRect(1, 1, 750 - 1 + 1, 53 - 1 + 1);
  Shape2_Canvas.setStroke(1);
  Shape2_Canvas.setColor("<?=$color_bor;?>");
  Shape2_Canvas.drawRect(1, 1, 750 - 1 + 1, 53 - 1 + 1);
  Shape2_Canvas.paint();
</script>

</div>
<div id="Label1_outer" style="Z-INDEX: 2; LEFT: 135px; WIDTH: 283px; POSITION: absolute; TOP: 90px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: <?=$color_bor;?>; background-color: #FFFFFF;height:32px;width:283px;"   ><strong>Cadastro de&nbsp;Socios</strong></div>
</div>
<div id="Menssage_outer" style="Z-INDEX: 3; LEFT: 613px; WIDTH: 208px; POSITION: absolute; TOP: 95px; HEIGHT: 24px">
<div id="Menssage" style=" font-family: Verdana; font-size: 14px;  height:24px;width:208px;"  align="Center"   ><strong><?=$menssagens;?> </strong></div>
</div>
<div id="Shape3_outer" style="Z-INDEX: 4; LEFT: 124px; WIDTH: 752px; POSITION: absolute; TOP: 136px; HEIGHT: 792px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 750 - 1, 790 - 1);
  Shape3_Canvas.fillRect(1, 1, 750 - 1 + 1, 790 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("<?=$color_bor;?>");
  Shape3_Canvas.drawRect(1, 1, 750 - 1 + 1, 790 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 5; LEFT: 131px; WIDTH: 64px; POSITION: absolute; TOP: 155px; HEIGHT: 26px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:64px;"   ><STRONG>Codigo</STRONG></div>
</div>
<div id="Edit1_outer" style="Z-INDEX: 6; LEFT: 225px; WIDTH: 56px; POSITION: absolute; TOP: 151px; HEIGHT: 26px">
<input type="text" id="Edit1" name="Edit1" value="<?=$Edit1;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:56px; background-color: #FFFFFF;" readonly="readonly" tabindex="1" maxlength="11"  />
</div>
<div id="Edit2_outer" style="Z-INDEX: 7; LEFT: 283px; WIDTH: 33px; POSITION: absolute; TOP: 151px; HEIGHT: 26px">
<input type="text" id="Edit2" name="Edit2" value="<?=$Edit2;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:33px; background-color: #FFFFFF;" onchange="Salva2(this.value)"  onFocus="nextfield ='Edit3';" style="text-transform: uppercase;"   tabindex="2" readonly="readonly" maxlength="1"  />
</div>
<div id="Label3_outer" style="Z-INDEX: 8; LEFT: 384px; WIDTH: 32px; POSITION: absolute; TOP: 155px; HEIGHT: 18px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:32px;"   ><STRONG>RG:.</STRONG></div>
</div>

<div id="Edit3_outer" style="Z-INDEX: 9; LEFT: 417px; WIDTH: 137px; POSITION: absolute; TOP: 151px; HEIGHT: 26px">
<input type="text" id="Edit3" name="Edit3" value="<?=$Edit3;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:137px; background-color: #FFFFFF;" onchange="Salva3(this.value)"  onFocus="nextfield ='Edit4';"  tabindex="3" maxlength="14"    />
</div>



<div id="Label4_outer" style="Z-INDEX: 10; LEFT: 592px; WIDTH: 47px; POSITION: absolute; TOP: 155px; HEIGHT: 18px">
<div id="Label4" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:47px;"   ><STRONG>CPF:.</STRONG></div>
</div>
<div id="Edit4_outer" style="Z-INDEX: 11; LEFT: 634px; WIDTH: 137px; POSITION: absolute; TOP: 151px; HEIGHT: 26px">
<input type="text" id="Edit4" name="Edit4" value="<?=$Edit4;?>"  style=" font-family: Verdana; font-size: 14px;  height:25px;width:137px; background-color: #FFFFFF;"  onkeypress="return txtBoxFormat(document.Form1, 'Edit4', '999.999.999-99', event);"  onchange="Salva4(this.value)"  onFocus="nextfield ='Edit6';"  tabindex="4" maxlength="14"   />
</div>
<div id="Label5_outer" style="Z-INDEX: 12; LEFT: 131px; WIDTH: 96px; POSITION: absolute; TOP: 179px; HEIGHT: 26px">
<div id="Label5" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:96px;"   > <STRONG>Data Insc.:</STRONG> </div>
</div>

<?
if($permissao == "14"){
?>	
	<div id="Edit5_outer" style="Z-INDEX: 13; LEFT: 225px; WIDTH: 91px; POSITION: absolute; TOP: 175px; HEIGHT: 26px">
	<input type="text" id="Edit5" name="Edit5" value="<?=$Edit5;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px; background-color: #FFFFFF;" onkeypress="return txtBoxFormat(document.Form1, 'Edit5', '99/99/9999', event);" onchange="Salva5(this.value)"  onFocus="nextfield ='Edit6';"  tabindex="5"  maxlength="10"  />
	</div>
<?
}else{
?>	
	<div id="Edit5_outer" style="Z-INDEX: 13; LEFT: 225px; WIDTH: 91px; POSITION: absolute; TOP: 175px; HEIGHT: 26px">
	<input type="text" id="Edit5" name="Edit5" value="<?=$Edit5;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px; background-color: #FFFFFF;" onkeypress="return txtBoxFormat(document.Form1, 'Edit5', '99/99/9999', event);" onchange="Salva5(this.value)"  onFocus="nextfield ='Edit6';" readonly="readonly" tabindex="5"  maxlength="10"  />
	</div>
<?
}
?>	
<div id="Label6_outer" style="Z-INDEX: 14; LEFT: 320px; WIDTH: 96px; POSITION: absolute; TOP: 179px; HEIGHT: 26px">
<div id="Label6" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:96px;"   > <STRONG>Data Saida.:</STRONG> </div>
</div>
<div id="Edit6_outer" style="Z-INDEX: 15; LEFT: 417px; WIDTH: 91px; POSITION: absolute; TOP: 175px; HEIGHT: 26px">
<input type="text" id="Edit6" name="Edit6" value="<?=$Edit6;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px; background-color: #FFFFFF;" onkeypress="return txtBoxFormat(document.Form1, 'Edit6', '99/99/9999', event);" onchange="Salva6(this.value)"  onFocus="nextfield ='Edit7';" style="text-transform: uppercase;"  tabindex="6"  maxlength="10"  />
</div>
<div id="Label7_outer" style="Z-INDEX: 16; LEFT: 515px; WIDTH: 128px; POSITION: absolute; TOP: 179px; HEIGHT: 26px">
<div id="Label7" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:128px;"   > <STRONG>Data Retorno.:</STRONG> </div>
</div>
<div id="Edit7_outer" style="Z-INDEX: 17; LEFT: 634px; WIDTH: 91px; POSITION: absolute; TOP: 175px; HEIGHT: 26px">
<input type="text" id="Edit7" name="Edit7" value="<?=$Edit7;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px; background-color: #FFFFFF;" onkeypress="return txtBoxFormat(document.Form1, 'Edit7', '99/99/9999', event);" onchange="Salva7(this.value)"  onFocus="nextfield ='Edit8';" style="text-transform: uppercase;"  tabindex="7"  maxlength="10"  />
</div>

<?
//Criar Sessecao
session_start();
unset ($_SESSION['Photto1']);

// salva Secao
session_name("Photto1");
session_start();
$_SESSION['id'] = $id;
$_SESSION['codp'] = $new_fot;
$new_fot = $_SESSION['codp'];

?>

<?
   if($mostra_branco == "faz"){
   ?>	
   <div id="Image1_outer" style="Z-INDEX: 18; LEFT: 749px; WIDTH: 112px; POSITION: absolute; TOP: 179px; HEIGHT: 146px">
   <div id="Image1_container" style=" width: 112;  height: 146; overflow: hidden;" ><img id="Image1" src="ver.php?new_fot=<?=$new_fot;?>"  width="107"  height="137"  border="1"  style=" border-color: #000000 "       /></div>
   </div>
   <?
   }else{
   ?>	
   <div id="Image1_outer" style="Z-INDEX: 18; LEFT: 749px; WIDTH: 112px; POSITION: absolute; TOP: 179px; HEIGHT: 146px">
   <div id="Image1_container" style=" width: 112;  height: 146; overflow: hidden;" ><img id="Image1" src="<?=$cami2;?>"  width="107"  height="137"  border="1"  style=" border-color: #000000 "       /></div>
   </div>
   <?
   }

?>

<div id="Label71_outer" style="Z-INDEX: 150; LEFT: 387px; WIDTH: 359px; POSITION: absolute; TOP: 203px; HEIGHT: 20px">
<div id="Label71" style=" font-family: Verdana; font-size: 14px; color: #0000FF;font-weight: normal; height:20px;width:359px;"   ><STRONG><FONT color=#ff0000><?=$alerta_1;?></FONT></STRONG>&nbsp;</div>
</div>


<div id="Label8_outer" style="Z-INDEX: 19; LEFT: 131px; WIDTH: 96px; POSITION: absolute; TOP: 203px; HEIGHT: 26px">
<div id="Label8" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:96px;"   > <STRONG>Sede.:</STRONG> </div>
</div>
<div id="Edit8_outer" style="Z-INDEX: 20; LEFT: 225px; WIDTH: 159px; POSITION: absolute; TOP: 201px; HEIGHT: 26px">
<select id="Edit8" name="Edit8" value="<?=$Edit8;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:159px; background-color: #FFFFFF;"  onchange="Salva8(this.value)"  onFocus="nextfield ='Edit9';"    style="text-transform: uppercase;"  tabindex="8"  maxlength="20"  />

<?

if (!empty($Edit8))
{
?>	
	<option value="<?=$Edit8;?>"> <?=$Edit8;?> </option>
            <option value="SETE DE ABRIL">  SETE DE ABRIL </option>
            <option value="SANTO AMARO"> SANTO AMARO </option>
            <option value="SANTANA"> SANTANA </option>
            <option value="TATUAPE"> TATUAPE </option>
<?	

}else{
	
?>	
            <option value=" ">  </option>
            <option value="SETE DE ABRIL">  SETE DE ABRIL </option>
            <option value="SANTO AMARO"> SANTO AMARO </option>
            <option value="SANTANA"> SANTANA </option>
            <option value="TATUAPE"> TATUAPE </option>
<?            
 }
?>

</select>

</div>
<div id="Label9_outer" style="Z-INDEX: 21; LEFT: 130px; WIDTH: 89px; POSITION: absolute; TOP: 228px; HEIGHT: 26px">
<div id="Label9" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Categoria.:</STRONG>&nbsp;</div>
</div>
<div id="Edit9_outer" style="Z-INDEX: 22; LEFT: 225px; WIDTH: 28px; POSITION: absolute; TOP: 223px; HEIGHT: 26px">
<input type="text" id="Edit9" name="Edit9" value="<?=$Edit9;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:28px; background-color: #FFFFFF;"  onchange="Salva9(this.value)" onFocus="nextfield ='Edit10';" style="text-transform: uppercase;"  tabindex="9"  maxlength="1"  />
</div>
<div id="Label10_outer" style="Z-INDEX: 23; LEFT: 130px; WIDTH: 89px; POSITION: absolute; TOP: 252px; HEIGHT: 26px">
<div id="Label10" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Cod. Edif.:</STRONG>&nbsp;</div>
</div>
<div id="Edit10_outer" style="Z-INDEX: 24; LEFT: 225px; WIDTH: 55px; POSITION: absolute; TOP: 247px; HEIGHT: 26px">
<input type="text" id="Edit10" name="Edit10" value="<?=$Edit10;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:55px; background-color: #FFFFFF;"  onchange="Salva10(this.value)" onclick="Salva1x(this.value)" onFocus="nextfield ='Edit11';" style="text-transform: uppercase;" tabindex="10" maxlength="11"    />
</div>
<div id="Label11_outer" style="Z-INDEX: 25; LEFT: 130px; WIDTH: 89px; POSITION: absolute; TOP: 276px; HEIGHT: 26px">
<div id="Label11" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Nome.:</STRONG>&nbsp;</div>
</div>
<div id="Edit11_outer" style="Z-INDEX: 26; LEFT: 225px; WIDTH: 423px; POSITION: absolute; TOP: 271px; HEIGHT: 26px">
<input type="text" id="Edit11" name="Edit11" value="<?=$Edit11;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:423px; background-color: #FFFFFF;"  onchange="Salva11(this.value)"  onFocus="nextfield ='Edit12';" style="text-transform: uppercase;" tabindex="11"  maxlength="60"   />
</div>
<div id="Label12_outer" style="Z-INDEX: 27; LEFT: 130px; WIDTH: 89px; POSITION: absolute; TOP: 300px; HEIGHT: 26px">
<div id="Label12" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Endereco.:</STRONG>&nbsp;</div>
</div>
<div id="Edit12_outer" style="Z-INDEX: 28; LEFT: 225px; WIDTH: 127px; POSITION: absolute; TOP: 295px; HEIGHT: 26px">
<input type="text" id="Edit12" name="Edit12" value="<?=$Edit12;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:127px; background-color: #FFFFFF;"  onchange="Salva12(this.value)"  onFocus="nextfield ='Edit13';" style="text-transform: uppercase;" tabindex="12"  maxlength="20"   />
</div>
<div id="Edit13_outer" style="Z-INDEX: 29; LEFT: 352px; WIDTH: 385px; POSITION: absolute; TOP: 295px; HEIGHT: 26px">
<input type="text" id="Edit13" name="Edit13" value="<?=$Edit13;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:385px; background-color: #FFFFFF;"  onchange="Salva13(this.value)"  onFocus="nextfield ='Edit14';" style="text-transform: uppercase;" tabindex="13"  maxlength="75"   />
</div>
<div id="Label13_outer" style="Z-INDEX: 30; LEFT: 130px; WIDTH: 89px; POSITION: absolute; TOP: 324px; HEIGHT: 26px">
<div id="Label13" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Numero.:</STRONG>&nbsp;</div>
</div>
<div id="Edit14_outer" style="Z-INDEX: 31; LEFT: 225px; WIDTH: 127px; POSITION: absolute; TOP: 319px; HEIGHT: 26px">
<input type="text" id="Edit14" name="Edit14" value="<?=$Edit14;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:127px; background-color: #FFFFFF;" onchange="Salva14(this.value)"  onFocus="nextfield ='Edit15';" style="text-transform: uppercase;"  tabindex="14"  maxlength="40"   />
</div>
<div id="Label14_outer" style="Z-INDEX: 32; LEFT: 351px; WIDTH: 62px; POSITION: absolute; TOP: 324px; HEIGHT: 26px">
<div id="Label14" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:62px;"   ><STRONG>Bairro.:</STRONG>&nbsp;</div>
</div>
<div id="Edit15_outer" style="Z-INDEX: 33; LEFT: 416px; WIDTH: 216px; POSITION: absolute; TOP: 319px; HEIGHT: 26px">
<input type="text" id="Edit15" name="Edit15" value="<?=$Edit15;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:216px; background-color: #FFFFFF;"  onchange="Salva15(this.value)"  onFocus="nextfield ='Edit16';" style="text-transform: uppercase;" tabindex="15"  maxlength="35"   />
</div>
<div id="Label15_outer" style="Z-INDEX: 34; LEFT: 130px; WIDTH: 89px; POSITION: absolute; TOP: 348px; HEIGHT: 26px">
<div id="Label15" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Cep.:</STRONG>&nbsp;</div>
</div>
<div id="Edit16_outer" style="Z-INDEX: 35; LEFT: 225px; WIDTH: 83px; POSITION: absolute; TOP: 343px; HEIGHT: 26px">
<input type="text" id="Edit16" name="Edit16" value="<?=$Edit16;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:83px; background-color: #FFFFFF;" onkeypress="return txtBoxFormat(document.Form1, 'Edit16', '99999-999', event);" onchange="Salva16(this.value)"  onFocus="nextfield ='Edit17';" style="text-transform: uppercase;" tabindex="16"  maxlength="9"   />
</div>
<div id="Label16_outer" style="Z-INDEX: 36; LEFT: 351px; WIDTH: 70px; POSITION: absolute; TOP: 348px; HEIGHT: 26px">
<div id="Label16" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:70px;"   ><STRONG>Cidade.:</STRONG>&nbsp;</div>
</div>
<div id="Edit17_outer" style="Z-INDEX: 37; LEFT: 416px; WIDTH: 216px; POSITION: absolute; TOP: 343px; HEIGHT: 26px">
<input type="text" id="Edit17" name="Edit17" value="<?=$Edit17;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:216px; background-color: #FFFFFF;"  onchange="Salva17(this.value)"  onFocus="nextfield ='Edit18';" style="text-transform: uppercase;" tabindex="17"  maxlength="15"   />
</div>
<div id="Label17_outer" style="Z-INDEX: 38; LEFT: 634px; WIDTH: 70px; POSITION: absolute; TOP: 347px; HEIGHT: 26px">
<div id="Label17" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:70px;"   ><STRONG>Estado.:</STRONG>&nbsp;</div>
</div>
<div id="Edit18_outer" style="Z-INDEX: 39; LEFT: 699px; WIDTH: 36px; POSITION: absolute; TOP: 345px; HEIGHT: 26px">
<select type="text" id="Edit18" name="Edit18" value="<?=$Edit18;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:46px; background-color: #FFFFFF;"  onchange="Salva18(this.value)"  onFocus="nextfield ='Edit19';" style="text-transform: uppercase;" tabindex="18"  maxlength="2"   />

<?

if (!empty($Edit18))
{
?>	
	<option value="<?=$Edit18;?>"> <?=$Edit18;?> </option>
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
<div id="Label18_outer" style="Z-INDEX: 40; LEFT: 130px; WIDTH: 89px; POSITION: absolute; TOP: 372px; HEIGHT: 26px">
<div id="Label18" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Fone.:</STRONG>&nbsp;</div>
</div>
<div id="Edit19_outer" style="Z-INDEX: 41; LEFT: 225px; WIDTH: 117px; POSITION: absolute; TOP: 367px; HEIGHT: 26px">
<input type="text" id="Edit19" name="Edit19" value="<?=$Edit19;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:117px; background-color: #FFFFFF;"  onchange="Salva19(this.value)"  onFocus="nextfield ='Edit20';" style="text-transform: uppercase;" tabindex="19"  maxlength="25"   />
</div>
<div id="Label19_outer" style="Z-INDEX: 42; LEFT: 363px; WIDTH: 55px; POSITION: absolute; TOP: 372px; HEIGHT: 21px">
<div id="Label19" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:55px;"   ><STRONG>CTPS.:</STRONG>&nbsp;</div>
</div>
<div id="Edit20_outer" style="Z-INDEX: 43; LEFT: 416px; WIDTH: 116px; POSITION: absolute; TOP: 367px; HEIGHT: 26px">
<input type="text" id="Edit20" name="Edit20" value="<?=$Edit20;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:116px; background-color: #FFFFFF;"  onchange="Salva20(this.value)"  onFocus="nextfield ='Edit21';" style="text-transform: uppercase;" tabindex="20"  maxlength="10"   />
</div>
<div id="Label20_outer" style="Z-INDEX: 44; LEFT: 583px; WIDTH: 55px; POSITION: absolute; TOP: 372px; HEIGHT: 21px">
<div id="Label20" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:55px;"   ><STRONG>Serie.:</STRONG>&nbsp;</div>
</div>
<div id="Edit21_outer" style="Z-INDEX: 45; LEFT: 634px; WIDTH: 102px; POSITION: absolute; TOP: 367px; HEIGHT: 26px">
<input type="text" id="Edit21" name="Edit21" value="<?=$Edit21;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:102px; background-color: #FFFFFF;"  onchange="Salva21(this.value)"  onFocus="nextfield ='Edit22';" style="text-transform: uppercase;" tabindex="21"  maxlength="5"   />
</div>
<div id="Label21_outer" style="Z-INDEX: 46; LEFT: 741px; WIDTH: 70px; POSITION: absolute; TOP: 371px; HEIGHT: 26px">
<div id="Label21" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:70px;"   ><STRONG>Emissor.:</STRONG>&nbsp;</div>
</div>
<div id="Edit22_outer" style="Z-INDEX: 47; LEFT: 815px; WIDTH: 42px; POSITION: absolute; TOP: 369px; HEIGHT: 26px">
<select type="text" id="Edit22" name="Edit22" value="<?=$Edit22;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:45px; background-color: #FFFFFF;"  onchange="Salva22(this.value)"  onFocus="nextfield ='Edit23';" style="text-transform: uppercase;" tabindex="22"  maxlength="2"   />

<?

if (!empty($Edit22))
{
?>	
	<option value="<?=$Edit22;?>"> <?=$Edit22;?> </option>
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
<div id="Label22_outer" style="Z-INDEX: 48; LEFT: 130px; WIDTH: 89px; POSITION: absolute; TOP: 396px; HEIGHT: 26px">
<div id="Label22" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Funcao.:</STRONG>&nbsp;</div>
</div>
<div id="Edit23_outer" style="Z-INDEX: 49; LEFT: 225px; WIDTH: 117px; POSITION: absolute; TOP: 391px; HEIGHT: 26px">
<input type="text" id="Edit23" name="Edit23" value="<?=$Edit23;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:117px; background-color: #FFFFFF;"  onchange="Salva23(this.value)"  onFocus="nextfield ='Edit24';" style="text-transform: uppercase;" tabindex="23"  maxlength="15"   />
</div>
<div id="Label23_outer" style="Z-INDEX: 50; LEFT: 347px; WIDTH: 75px; POSITION: absolute; TOP: 396px; HEIGHT: 21px">
<div id="Label23" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:75px;"   ><STRONG>Dt.Adm.:</STRONG>&nbsp;</div>
</div>
<div id="Edit24_outer" style="Z-INDEX: 51; LEFT: 416px; WIDTH: 91px; POSITION: absolute; TOP: 391px; HEIGHT: 26px">
<input type="text" id="Edit24" name="Edit24" value="<?=$Edit24;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px; background-color: #FFFFFF;"  onkeypress="return txtBoxFormat(document.Form1, 'Edit24', '99/99/9999', event);" onchange="Salva24(this.value)"  onFocus="nextfield ='Edit25';" style="text-transform: uppercase;" tabindex="24"  maxlength="10"   />
</div>
<div id="Edit25_outer" style="Z-INDEX: 52; LEFT: 225px; WIDTH: 117px; POSITION: absolute; TOP: 416px; HEIGHT: 26px">
<input type="text" id="Edit25" name="Edit25" value="<?=$Edit25;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:117px; background-color: #FFFFFF;" onchange="Salva25(this.value)"  onFocus="nextfield ='Edit26';" style="text-transform: uppercase;" tabindex="25"  maxlength="10"   />
</div>
<div id="Label24_outer" style="Z-INDEX: 53; LEFT: 349px; WIDTH: 69px; POSITION: absolute; TOP: 420px; HEIGHT: 21px">
<div id="Label24" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:69px;"   ><STRONG>No.Dep.:</STRONG>&nbsp;</div>
</div>
<div id="Edit26_outer" style="Z-INDEX: 54; LEFT: 416px; WIDTH: 34px; POSITION: absolute; TOP: 415px; HEIGHT: 26px">
<input type="text" id="Edit26" name="Edit26" value="<?=$Edit26;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:34px; background-color: #FFFFFF;"  onchange="Salva26(this.value)"  onFocus="nextfield ='Edit29';" style="text-transform: uppercase;" tabindex="26"  maxlength="2"   />
</div>
<div id="Label25_outer" style="Z-INDEX: 55; LEFT: 459px; WIDTH: 179px; POSITION: absolute; TOP: 419px; HEIGHT: 21px">
<div id="Label25" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:179px;"   ><STRONG>Mes/Ano Pagamento.:</STRONG>&nbsp;</div>
</div>

<?

if ($per3 == "SIM"){

?>

<div id="Edit27_outer" style="Z-INDEX: 56; LEFT: 634px; WIDTH: 34px; POSITION: absolute; TOP: 416px; HEIGHT: 26px">
<input type="text" id="Edit27" name="Edit27" value="<?=$Edit27;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:34px; background-color: #FFFFFF;"  onchange="Salva27(this.value)"  onFocus="nextfield ='Edit28';" style="text-transform: uppercase;" tabindex="27"  maxlength="2"   />
</div>
<div id="Edit28_outer" style="Z-INDEX: 57; LEFT: 668px; WIDTH: 62px; POSITION: absolute; TOP: 416px; HEIGHT: 26px">
<input type="text" id="Edit28" name="Edit28" value="<?=$Edit28;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:62px; background-color: #FFFFFF;" onchange="Salva28(this.value)"  onFocus="nextfield ='Edit29';" style="text-transform: uppercase;" tabindex="28"  maxlength="4"   />
</div>
<?
}else{
?>
	
<div id="Edit27_outer" style="Z-INDEX: 56; LEFT: 634px; WIDTH: 34px; POSITION: absolute; TOP: 416px; HEIGHT: 26px">
<input type="text" id="Edit27" name="Edit27" value="<?=$Edit27;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:34px; background-color: #FFFFFF;"  readonly  onFocus="nextfield ='Edit28';" style="text-transform: uppercase;" tabindex="27"  maxlength="2"   />
</div>
<div id="Edit28_outer" style="Z-INDEX: 57; LEFT: 668px; WIDTH: 62px; POSITION: absolute; TOP: 416px; HEIGHT: 26px">
<input type="text" id="Edit28" name="Edit28" value="<?=$Edit28;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:62px; background-color: #FFFFFF;" readonly  onFocus="nextfield ='Edit29';" style="text-transform: uppercase;" tabindex="28"  maxlength="4"   />
</div>
	
<?	
}
?>

<div id="Label26_outer" style="Z-INDEX: 58; LEFT: 130px; WIDTH: 89px; POSITION: absolute; TOP: 420px; HEIGHT: 26px">
<div id="Label26" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Est.Civil.:</STRONG>&nbsp;</div>
</div>
<div id="Label27_outer" style="Z-INDEX: 59; LEFT: 128px; WIDTH: 182px; POSITION: absolute; TOP: 445px; HEIGHT: 22px">
<div id="Label27" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:22px;width:182px;"   ><STRONG>Situacao do Cadastro.:</STRONG>&nbsp;</div>
</div>
<div id="Edit29_outer" style="Z-INDEX: 60; LEFT: 313px; WIDTH: 29px; POSITION: absolute; TOP: 441px; HEIGHT: 26px">
<input type="text" id="Edit29" name="Edit29" value="<?=$Edit29;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:29px; background-color: #FFFFFF;"  onchange="Salva29(this.value)"  onFocus="nextfield ='Edit30';" style="text-transform: uppercase;" tabindex="29"  maxlength="1"   />
</div>
<div id="Label28_outer" style="Z-INDEX: 61; LEFT: 128px; WIDTH: 75px; POSITION: absolute; TOP: 469px; HEIGHT: 22px">
<div id="Label28" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:22px;width:75px;"   ><STRONG>Saldo.:</STRONG>&nbsp;</div>
</div>
<div id="Edit30_outer" style="Z-INDEX: 62; LEFT: 225px; WIDTH: 117px; POSITION: absolute; TOP: 466px; HEIGHT: 26px">
<input type="text" id="Edit30" name="Edit30" value="<?=$Edit30;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:117px; background-color: #FFFFFF;"  onchange="Salva30(this.value)"  onFocus="nextfield ='Edit31';" style="text-transform: uppercase;" tabindex="30"  maxlength="14"   />
</div>
<div id="Label29_outer" style="Z-INDEX: 63; LEFT: 384px; WIDTH: 35px; POSITION: absolute; TOP: 469px; HEIGHT: 22px">
<div id="Label29" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:22px;width:35px;"   ><STRONG>de.:</STRONG>&nbsp;</div>
</div>
<div id="Edit31_outer" style="Z-INDEX: 64; LEFT: 416px; WIDTH: 34px; POSITION: absolute; TOP: 466px; HEIGHT: 26px">
<input type="text" id="Edit31" name="Edit31" value="<?=$Edit31;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:34px; background-color: #FFFFFF;"  onchange="Salva31(this.value)"  onFocus="nextfield ='Edit32';" style="text-transform: uppercase;" tabindex="31"  maxlength="4"   />
</div>
<div id="Label30_outer" style="Z-INDEX: 65; LEFT: 543px; WIDTH: 92px; POSITION: absolute; TOP: 470px; HEIGHT: 23px">
<div id="Label30" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:23px;width:92px;"   ><STRONG>x / Pagos.:</STRONG>&nbsp;</div>
</div>
<div id="Edit32_outer" style="Z-INDEX: 66; LEFT: 634px; WIDTH: 92px; POSITION: absolute; TOP: 463px; HEIGHT: 28px">
<input type="text" id="Edit32" name="Edit32" value="<?=$Edit32;?>" style=" font-family: Verdana; font-size: 14px;  height:27px;width:92px; background-color: #FFFFFF;"  onchange="Salva32(this.value)"  onFocus="nextfield ='Edit33';" style="text-transform: uppercase;" tabindex="32"  maxlength="14"   />
</div>
<div id="Label31_outer" style="Z-INDEX: 67; LEFT: 128px; WIDTH: 99px; POSITION: absolute; TOP: 494px; HEIGHT: 22px">
<div id="Label31" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:22px;width:99px;"   ><STRONG>Natural de.:</STRONG>&nbsp;</div>
</div>
<div id="Edit33_outer" style="Z-INDEX: 68; LEFT: 225px; WIDTH: 117px; POSITION: absolute; TOP: 491px; HEIGHT: 26px">
<input type="text" id="Edit33" name="Edit33" value="<?=$Edit33;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:117px; background-color: #FFFFFF;"  onchange="Salva33(this.value)"  onFocus="nextfield ='Edit34';" style="text-transform: uppercase;" tabindex="33"  maxlength="20"   />
</div>
<div id="Label32_outer" style="Z-INDEX: 69; LEFT: 347px; WIDTH: 75px; POSITION: absolute; TOP: 496px; HEIGHT: 21px">
<div id="Label32" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:75px;"   ><STRONG>Dt.Nasc.:</STRONG>&nbsp;</div>
</div>
<div id="Edit34_outer" style="Z-INDEX: 70; LEFT: 416px; WIDTH: 91px; POSITION: absolute; TOP: 491px; HEIGHT: 26px">
<input type="text" id="Edit34" name="Edit34" value="<?=$Edit34;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px; background-color: #FFFFFF;"  onkeypress="return txtBoxFormat(document.Form1, 'Edit34', '99/99/9999', event);"  onchange="Salva34(this.value)"  onFocus="nextfield ='Edit35';" style="text-transform: uppercase;" tabindex="34"  maxlength="10"   />
</div>
<div id="Label33_outer" style="Z-INDEX: 71; LEFT: 509px; WIDTH: 127px; POSITION: absolute; TOP: 497px; HEIGHT: 23px">
<div id="Label33" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:23px;width:127px;"   ><STRONG>Nacionalidade.:</STRONG>&nbsp;</div>
</div>
<div id="Edit35_outer" style="Z-INDEX: 72; LEFT: 634px; WIDTH: 179px; POSITION: absolute; TOP: 490px; HEIGHT: 28px">
<input type="text" id="Edit35" name="Edit35" value="<?=$Edit35;?>" style=" font-family: Verdana; font-size: 14px;  height:27px;width:179px; background-color: #FFFFFF;"  onchange="Salva35(this.value)"  onFocus="nextfield ='Edit36';" style="text-transform: uppercase;" tabindex="35"  maxlength="10"   />
</div>
<div id="Label34_outer" style="Z-INDEX: 73; LEFT: 130px; WIDTH: 89px; POSITION: absolute; TOP: 521px; HEIGHT: 26px">
<div id="Label34" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Pai.:</STRONG>&nbsp;</div>
</div>
<div id="Edit36_outer" style="Z-INDEX: 74; LEFT: 225px; WIDTH: 409px; POSITION: absolute; TOP: 516px; HEIGHT: 27px">
<input type="text" id="Edit36" name="Edit36" value="<?=$Edit36;?>" style=" font-family: Verdana; font-size: 14px;  height:26px;width:409px; background-color: #FFFFFF;"  onchange="Salva36(this.value)"  onFocus="nextfield ='Edit37';" style="text-transform: uppercase;" tabindex="36"  maxlength="45"   />
</div>
<div id="Label35_outer" style="Z-INDEX: 75; LEFT: 130px; WIDTH: 89px; POSITION: absolute; TOP: 546px; HEIGHT: 26px">
<div id="Label35" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Mae.:</STRONG>&nbsp;</div>
</div>
<div id="Edit37_outer" style="Z-INDEX: 76; LEFT: 225px; WIDTH: 409px; POSITION: absolute; TOP: 541px; HEIGHT: 26px">
<input type="text" id="Edit37" name="Edit37" value="<?=$Edit37;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:409px; background-color: #FFFFFF;"  onchange="Salva37(this.value)"  onFocus="nextfield ='Edit38';" style="text-transform: uppercase;" tabindex="37"  maxlength="45"   />
</div>
<div id="Label36_outer" style="Z-INDEX: 77; LEFT: 129px; WIDTH: 89px; POSITION: absolute; TOP: 571px; HEIGHT: 26px">
<div id="Label36" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Conjugue.:</STRONG>&nbsp;</div>
</div>
<div id="Edit38_outer" style="Z-INDEX: 78; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 566px; HEIGHT: 26px">
<input type="text" id="Edit38" name="Edit38" value="<?=$Edit38;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px; background-color: #FFFFFF;"  onchange="Salva38(this.value)"  onFocus="nextfield ='Edit39';" style="text-transform: uppercase;" tabindex="38"  maxlength="35"   />
</div>
<div id="Label37_outer" style="Z-INDEX: 79; LEFT: 564px; WIDTH: 75px; POSITION: absolute; TOP: 574px; HEIGHT: 21px">
<div id="Label37" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:75px;"   ><STRONG>Dt.Nasc.:</STRONG>&nbsp;</div>
</div>
<div id="Edit39_outer" style="Z-INDEX: 80; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 566px; HEIGHT: 26px">
<input type="text" id="Edit39" name="Edit39" value="<?=$Edit39;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px; background-color: #FFFFFF;"  onkeypress="return txtBoxFormat(document.Form1, 'Edit39', '99/99/9999', event);" onchange="Salva39(this.value)"  onFocus="nextfield ='Edit40';" style="text-transform: uppercase;" tabindex="39"  maxlength="10"   />
</div>
<div id="Label38_outer" style="Z-INDEX: 81; LEFT: 129px; WIDTH: 89px; POSITION: absolute; TOP: 599px; HEIGHT: 26px">
<div id="Label38" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>1o Filho.:</STRONG>&nbsp;</div>
</div>
<div id="Edit40_outer" style="Z-INDEX: 82; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 591px; HEIGHT: 26px">
<input type="text" id="Edit40" name="Edit40" value="<?=$Edit40;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px; background-color: #FFFFFF;"  onchange="Salva40(this.value)"  onFocus="nextfield ='Edit41';" style="text-transform: uppercase;" tabindex="40"  maxlength="35"   />
</div>
<div id="Label39_outer" style="Z-INDEX: 83; LEFT: 564px; WIDTH: 75px; POSITION: absolute; TOP: 600px; HEIGHT: 21px">
<div id="Label39" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:75px;"   ><STRONG>Dt.Nasc.:</STRONG>&nbsp;</div>
</div>
<div id="Edit41_outer" style="Z-INDEX: 84; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 591px; HEIGHT: 26px">
<input type="text" id="Edit41" name="Edit41" value="<?=$Edit41;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px; background-color: #FFFFFF;" onkeypress="return txtBoxFormat(document.Form1, 'Edit41', '99/99/9999', event);"   onchange="Salva41(this.value)"  onFocus="nextfield ='Edit42';" style="text-transform: uppercase;" tabindex="41"  maxlength="10"   />
</div>
<div id="Label40_outer" style="Z-INDEX: 85; LEFT: 761px; WIDTH: 52px; POSITION: absolute; TOP: 599px; HEIGHT: 21px">
<div id="Label40" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:52px;"   ><STRONG>Sexo.:</STRONG>&nbsp;</div>
</div>
<div id="Edit42_outer" style="Z-INDEX: 86; LEFT: 815px; WIDTH: 41px; POSITION: absolute; TOP: 594px; HEIGHT: 26px">
<select type="text" id="Edit42" name="Edit42" value="<?=$Edit42;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:41px; background-color: #FFFFFF;" onchange="Salva42(this.value)"  onFocus="nextfield ='Edit43';" style="text-transform: uppercase;" tabindex="42"  maxlength="1"   />

<?

if (!empty($Edit42))
{
?>	
	<option value="<?=$Edit42;?>"> <?=$Edit42;?> </option>
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
<div id="Label41_outer" style="Z-INDEX: 87; LEFT: 129px; WIDTH: 89px; POSITION: absolute; TOP: 624px; HEIGHT: 26px">
<div id="Label41" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>2o Filho.:</STRONG>&nbsp;</div>
</div>
<div id="Edit43_outer" style="Z-INDEX: 88; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 616px; HEIGHT: 26px">
<input type="text" id="Edit43" name="Edit43" value="<?=$Edit43;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px; background-color: #FFFFFF;"  onchange="Salva43(this.value)"  onFocus="nextfield ='Edit44';" style="text-transform: uppercase;" tabindex="43"  maxlength="35"   />
</div>
<div id="Label42_outer" style="Z-INDEX: 89; LEFT: 564px; WIDTH: 75px; POSITION: absolute; TOP: 625px; HEIGHT: 21px">
<div id="Label42" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:75px;"   ><STRONG>Dt.Nasc.:</STRONG>&nbsp;</div>
</div>
<div id="Edit44_outer" style="Z-INDEX: 90; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 616px; HEIGHT: 26px">
<input type="text" id="Edit44" name="Edit44" value="<?=$Edit44;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px; background-color: #FFFFFF;" onkeypress="return txtBoxFormat(document.Form1, 'Edit44', '99/99/9999', event);"   onchange="Salva44(this.value)"  onFocus="nextfield ='Edit45';" style="text-transform: uppercase;" tabindex="44"  maxlength="10"   />
</div>
<div id="Label43_outer" style="Z-INDEX: 91; LEFT: 761px; WIDTH: 52px; POSITION: absolute; TOP: 625px; HEIGHT: 21px">
<div id="Label43" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:52px;"   ><STRONG>Sexo.:</STRONG>&nbsp;</div>
</div>
<div id="Edit45_outer" style="Z-INDEX: 92; LEFT: 815px; WIDTH: 41px; POSITION: absolute; TOP: 619px; HEIGHT: 26px">
<select type="text" id="Edit45" name="Edit45" value="<?=$Edit45;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:41px; background-color: #FFFFFF;"  onchange="Salva45(this.value)"  onFocus="nextfield ='Edit46';" style="text-transform: uppercase;" tabindex="45"  maxlength="1"   />

<?

if (!empty($Edit45))
{
?>	
	<option value="<?=$Edit45;?>"> <?=$Edit45;?> </option>
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
<div id="Image3_outer" style="Z-INDEX: 93; LEFT: 702px; WIDTH: 112px; POSITION: absolute; TOP: 526px; HEIGHT: 24px">
<div id="Image3_container" style=" width: 112;  overflow: hidden;" ><A HREF="<?=$path;?>ts2.php" target="new"  ><img id="Image3" src="../imagens/botaoazul21.PNG"     border="0"       /></A></div>
</div>


<div id="Image2_outer" style="Z-INDEX: 94; LEFT: 761px; WIDTH: 112px; POSITION: absolute; TOP: 331px; HEIGHT: 24px">
<div id="Image2_container" style=" width: 112;   overflow: hidden;" ><img id="Image2" src="../imagens/botaoazul17.PNG"  border="0"       /></div>
</div>


<div id="Label44_outer" style="Z-INDEX: 95; LEFT: 129px; WIDTH: 89px; POSITION: absolute; TOP: 674px; HEIGHT: 24px">
<div id="Label44" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:89px;"   ><STRONG>4o Filho.:</STRONG>&nbsp;</div>
</div>
<div id="Label45_outer" style="Z-INDEX: 96; LEFT: 564px; WIDTH: 75px; POSITION: absolute; TOP: 674px; HEIGHT: 19px">
<div id="Label45" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:75px;"   ><STRONG>Dt.Nasc.:</STRONG>&nbsp;</div>
</div>
<div id="Label46_outer" style="Z-INDEX: 97; LEFT: 761px; WIDTH: 52px; POSITION: absolute; TOP: 673px; HEIGHT: 19px">
<div id="Label46" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:52px;"   ><STRONG>Sexo.:</STRONG>&nbsp;</div>
</div>
<div id="Label47_outer" style="Z-INDEX: 98; LEFT: 129px; WIDTH: 89px; POSITION: absolute; TOP: 649px; HEIGHT: 24px">
<div id="Label47" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:89px;"   ><STRONG>3o Filho.:</STRONG>&nbsp;</div>
</div>
<div id="Label48_outer" style="Z-INDEX: 99; LEFT: 564px; WIDTH: 75px; POSITION: absolute; TOP: 650px; HEIGHT: 19px">
<div id="Label48" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:75px;"   ><STRONG>Dt.Nasc.:</STRONG>&nbsp;</div>
</div>
<div id="Label49_outer" style="Z-INDEX: 100; LEFT: 761px; WIDTH: 52px; POSITION: absolute; TOP: 650px; HEIGHT: 19px">
<div id="Label49" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:52px;"   ><STRONG>Sexo.:</STRONG>&nbsp;</div>
</div>
<div id="Label50_outer" style="Z-INDEX: 101; LEFT: 129px; WIDTH: 89px; POSITION: absolute; TOP: 774px; HEIGHT: 24px">
<div id="Label50" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:89px;"   ><STRONG>8o Filho.:</STRONG>&nbsp;</div>
</div>
<div id="Label51_outer" style="Z-INDEX: 102; LEFT: 564px; WIDTH: 75px; POSITION: absolute; TOP: 772px; HEIGHT: 19px">
<div id="Label51" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:75px;"   ><STRONG>Dt.Nasc.:</STRONG>&nbsp;</div>
</div>
<div id="Label52_outer" style="Z-INDEX: 103; LEFT: 761px; WIDTH: 52px; POSITION: absolute; TOP: 772px; HEIGHT: 19px">
<div id="Label52" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:52px;"   ><STRONG>Sexo.:</STRONG>&nbsp;</div>
</div>
<div id="Label53_outer" style="Z-INDEX: 104; LEFT: 129px; WIDTH: 89px; POSITION: absolute; TOP: 749px; HEIGHT: 24px">
<div id="Label53" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:89px;"   ><STRONG>7o Filho.:</STRONG>&nbsp;</div>
</div>
<div id="Label54_outer" style="Z-INDEX: 105; LEFT: 564px; WIDTH: 75px; POSITION: absolute; TOP: 747px; HEIGHT: 19px">
<div id="Label54" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:75px;"   ><STRONG>Dt.Nasc.:</STRONG>&nbsp;</div>
</div>
<div id="Label55_outer" style="Z-INDEX: 106; LEFT: 761px; WIDTH: 52px; POSITION: absolute; TOP: 747px; HEIGHT: 19px">
<div id="Label55" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:52px;"   ><STRONG>Sexo.:</STRONG>&nbsp;</div>
</div>
<div id="Label56_outer" style="Z-INDEX: 107; LEFT: 129px; WIDTH: 89px; POSITION: absolute; TOP: 724px; HEIGHT: 24px">
<div id="Label56" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:89px;"   ><STRONG>6o Filho.:</STRONG>&nbsp;</div>
</div>
<div id="Label57_outer" style="Z-INDEX: 108; LEFT: 761px; WIDTH: 52px; POSITION: absolute; TOP: 723px; HEIGHT: 19px">
<div id="Label57" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:52px;"   ><STRONG>Sexo.:</STRONG>&nbsp;</div>
</div>
<div id="Label58_outer" style="Z-INDEX: 109; LEFT: 761px; WIDTH: 52px; POSITION: absolute; TOP: 698px; HEIGHT: 19px">
<div id="Label58" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:52px;"   ><STRONG>Sexo.:</STRONG>&nbsp;</div>
</div>
<div id="Label59_outer" style="Z-INDEX: 110; LEFT: 564px; WIDTH: 70px; POSITION: absolute; TOP: 698px; HEIGHT: 19px">
<div id="Label59" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:70px;"   ><STRONG>Dt.Nasc.:</STRONG>&nbsp;</div>
</div>
<div id="Label60_outer" style="Z-INDEX: 111; LEFT: 129px; WIDTH: 89px; POSITION: absolute; TOP: 698px; HEIGHT: 24px">
<div id="Label60" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:89px;"   ><STRONG>5o Filho.:</STRONG>&nbsp;</div>
</div>
<div id="Label61_outer" style="Z-INDEX: 112; LEFT: 564px; WIDTH: 68px; POSITION: absolute; TOP: 722px; HEIGHT: 19px">
<div id="Label61" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:68px;"   ><STRONG>Dt.Nasc.:</STRONG>&nbsp;</div>
</div>
<div id="Label62_outer" style="Z-INDEX: 113; LEFT: 129px; WIDTH: 89px; POSITION: absolute; TOP: 797px; HEIGHT: 24px">
<div id="Label62" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:89px;"   ><STRONG>9o Filho.:</STRONG>&nbsp;</div>
</div>
<div id="Label63_outer" style="Z-INDEX: 114; LEFT: 129px; WIDTH: 89px; POSITION: absolute; TOP: 821px; HEIGHT: 24px">
<div id="Label63" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:89px;"   ><STRONG>10o Filho.:</STRONG>&nbsp;</div>
</div>
<div id="Label64_outer" style="Z-INDEX: 115; LEFT: 564px; WIDTH: 75px; POSITION: absolute; TOP: 796px; HEIGHT: 19px">
<div id="Label64" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:75px;"   ><STRONG>Dt.Nasc.:</STRONG>&nbsp;</div>
</div>
<div id="Label65_outer" style="Z-INDEX: 116; LEFT: 564px; WIDTH: 75px; POSITION: absolute; TOP: 821px; HEIGHT: 19px">
<div id="Label65" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:75px;"   ><STRONG>Dt.Nasc.:</STRONG>&nbsp;</div>
</div>
<div id="Label66_outer" style="Z-INDEX: 117; LEFT: 761px; WIDTH: 52px; POSITION: absolute; TOP: 798px; HEIGHT: 19px">
<div id="Label66" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:52px;"   ><STRONG>Sexo.:</STRONG>&nbsp;</div>
</div>
<div id="Label67_outer" style="Z-INDEX: 118; LEFT: 761px; WIDTH: 52px; POSITION: absolute; TOP: 822px; HEIGHT: 19px">
<div id="Label67" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:52px;"   ><STRONG>Sexo.:</STRONG>&nbsp;</div>
</div>
<div id="Label68_outer" style="Z-INDEX: 119; LEFT: 127px; WIDTH: 103px; POSITION: absolute; TOP: 843px; HEIGHT: 24px">
<div id="Label68" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:103px;"   ><STRONG>Observacao:</STRONG></div>
</div>
<div id="Memo1_outer" style="Z-INDEX: 120; LEFT: 225px; WIDTH: 501px; POSITION: absolute; TOP: 842px; HEIGHT: 78px">
<textarea id="Edit70" name="Edit70" style=" font-family: Verdana; font-size: 14px;  height:77px;width:501px; background-color: #FFFFFF;"  onchange="Salva70(this.value)"  onFocus="nextfield ='done';" style="text-transform: uppercase;" tabindex="70"    wrap="virtual"><?=$Edit70;?></textarea>
</div>
<div id="Label69_outer" style="Z-INDEX: 121; LEFT: 774px; WIDTH: 77px; POSITION: absolute; TOP: 156px; HEIGHT: 20px">
<div id="Label69" style=" font-family: Verdana; font-size: 13px; color: #4682B4; height:20px;width:77px;"   ><A HREF="http://www.receita.fazenda.gov.br/Aplicacoes/ATCTA/cpf/ConsultaPublica.asp" target="new" >Clique Aqui</A></div>
</div>
<div id="Label70_outer" style="Z-INDEX: 122; LEFT: 310px; WIDTH: 31px; POSITION: absolute; TOP: 349px; HEIGHT: 18px">
<div id="Label70" style=" font-family: Verdana; font-size: 13px; color: #4682B4; height:18px;width:31px;"   ><A HREF="http://correios.com.br/servicos/dnec/menuAction.do?Metodo=menuCep" target="new" ><STRONG>Cep </STRONG></A></div>
</div>

<div id="Label72_outer" style="Z-INDEX: 123; LEFT: 305px; WIDTH: 442px; POSITION: absolute; TOP: 249px; HEIGHT: 20px">
<div id="Label72" style=" font-family: Verdana; font-size: 14px; color: #0000FF;font-weight: normal; height:20px;width:442px;"   ><strong><?=$nome_do_edif;?></strong>&nbsp;</div>
</div>
<div id="Label73_outer" style="Z-INDEX: 124; LEFT: 257px; WIDTH: 462px; POSITION: absolute; TOP: 227px; HEIGHT: 20px">
<div id="Label73" style=" font-family: Verdana; font-size: 14px; color: #4682B4;font-weight: normal; height:20px;width:462px;"   ><STRONG><?=$categ_1;?></STRONG>&nbsp;</div>
</div>
<div id="Label74_outer" style="Z-INDEX: 125; LEFT: 345px; WIDTH: 511px; POSITION: absolute; TOP: 445px; HEIGHT: 20px">
<div id="Label74" style=" font-family: Verdana; font-size: 14px; color: #4682B4;font-weight: normal; height:20px;width:511px;"   ><STRONG><?=$nome_cad_si;?></STRONG>&nbsp;</div>
</div>           
<div id="Edit46_outer" style="Z-INDEX: 126; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 641px; HEIGHT: 26px">
<input type="text" id="Edit46" name="Edit46" value="<?=$Edit46;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px;"  onchange="Salva46(this.value)"  onFocus="nextfield ='Edit47';" style="text-transform: uppercase;" tabindex="46" maxlength="35"    />
</div>
<div id="Edit47_outer" style="Z-INDEX: 127; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 641px; HEIGHT: 26px">
<input type="text" id="Edit47" name="Edit47" value="<?=$Edit47;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px;" onkeypress="return txtBoxFormat(document.Form1, 'Edit47', '99/99/9999', event);"  onchange="Salva47(this.value)"  onFocus="nextfield ='Edit48';" style="text-transform: uppercase;" tabindex="47"  maxlength="10"   />
</div>
<div id="Edit48_outer" style="Z-INDEX: 128; LEFT: 815px; WIDTH: 41px; POSITION: absolute; TOP: 644px; HEIGHT: 26px">
<select type="text" id="Edit48" name="Edit48" value="<?=$Edit48;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:41px; background-color: #FFFFFF;" onchange="Salva48(this.value)"  onFocus="nextfield ='Edit49';" style="text-transform: uppercase;" tabindex="48"  maxlength="1"   />

<?

if (!empty($Edit48))
{
?>	
	<option value="<?=$Edit48;?>"> <?=$Edit48;?> </option>
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
<div id="Edit49_outer" style="Z-INDEX: 129; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 666px; HEIGHT: 26px">
<input type="text" id="Edit49" name="Edit49" value="<?=$Edit49;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px; background-color: #FFFFFF;"  onchange="Salva49(this.value)"  onFocus="nextfield ='Edit50';" style="text-transform: uppercase;" tabindex="49"  maxlength="35"   />
</div>
<div id="Edit50_outer" style="Z-INDEX: 130; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 666px; HEIGHT: 26px">
<input type="text" id="Edit50" name="Edit50" value="<?=$Edit50;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px; background-color: #FFFFFF;" onkeypress="return txtBoxFormat(document.Form1, 'Edit50', '99/99/9999', event);"   onchange="Salva50(this.value)"  onFocus="nextfield ='Edit51';" style="text-transform: uppercase;" tabindex="50"  maxlength="10"   />
</div>
<div id="Edit51_outer" style="Z-INDEX: 131; LEFT: 815px; WIDTH: 41px; POSITION: absolute; TOP: 669px; HEIGHT: 26px">
<select type="text" id="Edit51" name="Edit51" value="<?=$Edit51;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:41px; background-color: #FFFFFF;"  onchange="Salva51(this.value)"  onFocus="nextfield ='Edit52';" style="text-transform: uppercase;" tabindex="51" maxlength="1"    />

<?

if (!empty($Edit51))
{
?>	
	<option value="<?=$Edit51;?>"> <?=$Edit51;?> </option>
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
<div id="Edit52_outer" style="Z-INDEX: 132; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 691px; HEIGHT: 26px">
<input type="text" id="Edit52" name="Edit52" value="<?=$Edit52;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px; background-color: #FFFFFF;"  onchange="Salva52(this.value)"  onFocus="nextfield ='Edit53';" style="text-transform: uppercase;" tabindex="52"  maxlength="35"   />
</div>
<div id="Edit53_outer" style="Z-INDEX: 133; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 691px; HEIGHT: 26px">
<input type="text" id="Edit53" name="Edit53" value="<?=$Edit53;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px; background-color: #FFFFFF;" onkeypress="return txtBoxFormat(document.Form1, 'Edit53', '99/99/9999', event);"   onchange="Salva53(this.value)"  onFocus="nextfield ='Edit54';" style="text-transform: uppercase;" tabindex="53"  maxlength="10"   />
</div>
<div id="Edit54_outer" style="Z-INDEX: 134; LEFT: 815px; WIDTH: 41px; POSITION: absolute; TOP: 694px; HEIGHT: 26px">
<select type="text" id="Edit54" name="Edit54" value="<?=$Edit54;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:41px; background-color: #FFFFFF;"  onchange="Salva54(this.value)"  onFocus="nextfield ='Edit55';" style="text-transform: uppercase;" tabindex="54"  maxlength="1"   />

<?

if (!empty($Edit54))
{
?>	
	<option value="<?=$Edit54;?>"> <?=$Edit54;?> </option>
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
<div id="Edit55_outer" style="Z-INDEX: 135; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 716px; HEIGHT: 26px">
<input type="text" id="Edit55" name="Edit55" value="<?=$Edit55;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px; background-color: #FFFFFF;"  onchange="Salva55(this.value)"  onFocus="nextfield ='Edit56';" style="text-transform: uppercase;" tabindex="55"  maxlength="35"   />
</div>
<div id="Edit56_outer" style="Z-INDEX: 136; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 716px; HEIGHT: 26px">
<input type="text" id="Edit56" name="Edit56" value="<?=$Edit56;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px; background-color: #FFFFFF;" onkeypress="return txtBoxFormat(document.Form1, 'Edit56', '99/99/9999', event);"   onchange="Salva56(this.value)"  onFocus="nextfield ='Edit57';" style="text-transform: uppercase;" tabindex="56"  maxlength="10"   />
</div>
<div id="Edit57_outer" style="Z-INDEX: 137; LEFT: 815px; WIDTH: 41px; POSITION: absolute; TOP: 719px; HEIGHT: 26px">
<select type="text" id="Edit57" name="Edit57" value="<?=$Edit57;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:41px; background-color: #FFFFFF;" onchange="Salva57(this.value)"  onFocus="nextfield ='Edit58';" style="text-transform: uppercase;" tabindex="57"  maxlength="1"   />

<?

if (!empty($Edit57))
{
?>	
	<option value="<?=$Edit57;?>"> <?=$Edit57;?> </option>
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
<div id="Edit58_outer" style="Z-INDEX: 138; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 741px; HEIGHT: 26px">
<input type="text" id="Edit58" name="Edit58" value="<?=$Edit58;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px; background-color: #FFFFFF;" onchange="Salva58(this.value)"  onFocus="nextfield ='Edit59';" style="text-transform: uppercase;" tabindex="58"  maxlength="35"   />
</div>
<div id="Edit59_outer" style="Z-INDEX: 139; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 741px; HEIGHT: 26px">
<input type="text" id="Edit59" name="Edit59" value="<?=$Edit59;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px; background-color: #FFFFFF;" onkeypress="return txtBoxFormat(document.Form1, 'Edit59', '99/99/9999', event);"  onchange="Salva59(this.value)"  onFocus="nextfield ='Edit60';" style="text-transform: uppercase;" tabindex="59"  maxlength="10"   />
</div>
<div id="Edit60_outer" style="Z-INDEX: 140; LEFT: 815px; WIDTH: 41px; POSITION: absolute; TOP: 744px; HEIGHT: 26px">
<select type="text" id="Edit60" name="Edit60" value="<?=$Edit60;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:41px; background-color: #FFFFFF;" onchange="Salva60(this.value)"  onFocus="nextfield ='Edit61';" style="text-transform: uppercase;" tabindex="60"  maxlength="1"   />

<?

if (!empty($Edit60))
{
?>	
	<option value="<?=$Edit60;?>"> <?=$Edit60;?> </option>
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
<div id="Edit61_outer" style="Z-INDEX: 141; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 766px; HEIGHT: 26px">
<input type="text" id="Edit61" name="Edit61" value="<?=$Edit61;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px; background-color: #FFFFFF;" onchange="Salva61(this.value)"  onFocus="nextfield ='Edit62';" style="text-transform: uppercase;" tabindex="61"  maxlength="35"   />
</div>
<div id="Edit62_outer" style="Z-INDEX: 142; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 766px; HEIGHT: 26px">
<input type="text" id="Edit62" name="Edit62" value="<?=$Edit62;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px; background-color: #FFFFFF;"  onkeypress="return txtBoxFormat(document.Form1, 'Edit62', '99/99/9999', event);"  onchange="Salva62(this.value)"  onFocus="nextfield ='Edit63';" style="text-transform: uppercase;" tabindex="62"  maxlength="10"   />
</div>
<div id="Edit63_outer" style="Z-INDEX: 143; LEFT: 815px; WIDTH: 41px; POSITION: absolute; TOP: 769px; HEIGHT: 26px">
<select type="text" id="Edit63" name="Edit63" value="<?=$Edit63;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:41px; background-color: #FFFFFF;" onchange="Salva63(this.value)"  onFocus="nextfield ='Edit64';" style="text-transform: uppercase;" tabindex="63"  maxlength="1"   />

<?

if (!empty($Edit63))
{
?>	
	<option value="<?=$Edit63;?>"> <?=$Edit63;?> </option>
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
<div id="Edit64_outer" style="Z-INDEX: 144; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 791px; HEIGHT: 26px">
<input type="text" id="Edit64" name="Edit64" value="<?=$Edit64;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px; background-color: #FFFFFF;" onchange="Salva64(this.value)"  onFocus="nextfield ='Edit65';" style="text-transform: uppercase;" tabindex="64"  maxlength="35"   />
</div>
<div id="Edit65_outer" style="Z-INDEX: 145; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 791px; HEIGHT: 26px">
<input type="text" id="Edit65" name="Edit65" value="<?=$Edit65;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px; background-color: #FFFFFF;" onkeypress="return txtBoxFormat(document.Form1, 'Edit65', '99/99/9999', event);"   onchange="Salva65(this.value)"  onFocus="nextfield ='Edit66';" style="text-transform: uppercase;" tabindex="65"  maxlength="10"   />
</div>
<div id="Edit66_outer" style="Z-INDEX: 146; LEFT: 815px; WIDTH: 41px; POSITION: absolute; TOP: 794px; HEIGHT: 26px">
<select type="text" id="Edit66" name="Edit66" value="<?=$Edit66;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:41px; background-color: #FFFFFF;" onchange="Salva66(this.value)"  onFocus="nextfield ='Edit67';" style="text-transform: uppercase;" tabindex="66"  maxlength="1"   />

<?

if (!empty($Edit66))
{
?>	
	<option value="<?=$Edit66;?>"> <?=$Edit66;?> </option>
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
<div id="Edit67_outer" style="Z-INDEX: 147; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 816px; HEIGHT: 26px">
<input type="text" id="Edit67" name="Edit67" value="<?=$Edit67;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px; background-color: #FFFFFF;" onchange="Salva67(this.value)"  onFocus="nextfield ='Edit68';" style="text-transform: uppercase;" tabindex="67"  maxlength="35"   />
</div>
<div id="Edit68_outer" style="Z-INDEX: 148; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 816px; HEIGHT: 26px">
<input type="text" id="Edit68" name="Edit68" value="<?=$Edit68;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px; background-color: #FFFFFF;" onkeypress="return txtBoxFormat(document.Form1, 'Edit68', '99/99/9999', event);"   onchange="Salva68(this.value)"  onFocus="nextfield ='Edit69';" style="text-transform: uppercase;" tabindex="68"  maxlength="10"   />
</div>
<div id="Edit69_outer" style="Z-INDEX: 149; LEFT: 815px; WIDTH: 41px; POSITION: absolute; TOP: 819px; HEIGHT: 26px">
<select type="text" id="Edit69" name="Edit69" value="<?=$Edit69;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:41px; background-color: #FFFFFF;" onchange="Salva69(this.value)"  onFocus="nextfield ='Edit70';" style="text-transform: uppercase;" tabindex="69"  maxlength="1"   />

<?

if (!empty($Edit69))
{
?>	
	<option value="<?=$Edit69;?>"> <?=$Edit69;?> </option>
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
<div id="Image4_outer" style="Z-INDEX: 150; LEFT: 283px; WIDTH: 17px; POSITION: absolute; TOP: 250px; HEIGHT: 18px">
<div id="Image4_container" style=" width: 17;  height: 18; overflow: hidden;" ><a href="javascript:janelaSecundaria('edifconsulta_up.php')"><img id="Image4" src="../imagens/lupa.PNG"  width="17"  height="18"  border="0"       /></a></div>
</div>

</td></tr></table>
</form></body>
</html>
<script>
function janelaSecundaria (URL){ 
   window.open(URL,"janela2","width=690,height=235,resizable=NO,status=NO,Scrollbars=NO,location=NO,menubar=NO,toolbar=NO"); 
} 
</script>

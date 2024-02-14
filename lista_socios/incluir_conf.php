<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Listagem na Tela por Codigo
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/
// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);
$id1  = $_SESSION['navega'];
$Cod_2 = $_SESSION['lista_soc'];

include("../logar.php");

include("menu.php");

$nome3 = $_SESSION["nome_log"];

include_once("funcoes2.php");

$deixar_1 = acesso("FORM_ADM");

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
			<table align=center border='15' bgcolor='#FFFFFF'  bordercolor ='$color_bor'>
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

$titulo_tabela = "'CONF/ASSIST.' Incluir";
?>

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
}
//-->
</script>

<html>
<head>
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
</head>

<style type=text/css>

body { background-image: url(<?="../".$logo_sis;?>);}

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
--></style> 

</html>

<?

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

// retorna uma pesquisa

$sql  = "SELECT * FROM conf LIMIT 0,1";

$resultado = @mysql_query($sql);
	
$row = mysql_fetch_array($resultado);

$Edit1 = $Cod_1;
$Edit2 = "05/06/2009";
$Edit4 = "SIND";
$Edit5 = "CONFEDERATIVA";

$dat_ins = date("d/m/Y");

        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit1").focus();	
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
?>
<script LANGUAGE="JavaScript">
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
eval('document.form1.' + nextfield + '.focus()');
return false;}}}
document.onkeydown = keyDown;
if (netscape) document.captureEvents(Event.KEYDOWN|Event.KEYUP);
// End -->
</script>

        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit3").focus();	
		}
		
		</script>

<br>
<br>
          
<table border=0  align=center>
<tr align=left colspan=2> 
<td><b><?=$titulo_tabela;?></b></td>
<div align=center>
<body onload="foco();">
<form id="form1" name="form1" method="POST" action="cadastrar_grid.php?Acao=insert">

<table align=center border='15' bgcolor='#FFFFFF' bordercolor ='<?=$color_bor;?>'>
<tr>
<td>
<table border='1' align=center>

<td valign=top><b>COD</b>
<th><b>VENCTO</b>
<th><b>VALOR</b>
<th><b>AGENCIA</b>
<th><b>DESCRICAO</b>
<th><b>DAT_BAI</b>
</td>

<tr> 
<td align='left'> <font style=' font-family: Verdana; font-size: 12px;'> <input type="text"    name="Edit1" value="<?=$Edit1;?>" maxlength="11"  readonly  style=" font-family: Verdana; font-size: 14px;  height:25px;width:70px;" onFocus="nextfield ='Edit2';">
<td align='right'> <font style=' font-family: Verdana; font-size: 12px;'> <input type="text"   name="Edit2" value="<?=$Edit2;?>" maxlength="10"  readonly  onkeypress="return txtBoxFormat(document.form1, 'Edit2', '99/99/9999', event);"  style=" font-family: Verdana; font-size: 14px;  height:25px;width:100px;" onFocus="nextfield ='Edit3';">
<td align='right'> <font style=' font-family: Verdana; font-size: 12px;'> <input type="text"    name="Edit3" value="<?=$Edit3;?>" maxlength="12"    style=" font-family: Verdana; font-size: 14px;  height:25px;width:100px;" onFocus="nextfield ='Edit4';">
<td align='left'> <font style=' font-family: Verdana; font-size: 12px;'> <input type="text"    name="Edit4" value="<?=$Edit4;?>" maxlength="4"   readonly  style=" font-family: Verdana; font-size: 14px;  height:25px;width:75px;" onFocus="nextfield ='Edit5';">
<td align='left'> <font style=' font-family: Verdana; font-size: 12px;'> <input type="text"    name="Edit5" value="<?=$Edit5;?>" maxlength="15"  readonly  style=" font-family: Verdana; font-size: 14px;  height:25px;width:132px;" onFocus="nextfield ='Edit6';">
<td align='left'> <font style=' font-family: Verdana; font-size: 12px;'> <input type="text"    name="Edit6"  maxlength="10" value="<?=$dat_ins;?>"  readonly  style=" font-family: Verdana; font-size: 14px;  height:25px;width:100px;">
<td>
<input type=image name="Incluir" src='../imagens/cadastrar.gif'><td>
<a href="admsedif.php?Cod_2=<?=$Cod_2;?>"><img alt='Cancelar' id='Image2' src='../imagens/cancelar.gif' border='0'></a><td>

</form>
</body>
</font>
</td>
</table>
<?

echo "
		      
	</table>
	</td>
	</tr>
	</table>
	</div>";

?>
<div align="center">
</div>

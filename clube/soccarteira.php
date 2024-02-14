<?
/*
 --------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Proposta de Associados
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 --------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");
$nome3 = $_SESSION["nome_log"];

include_once("funcoes2.php");

$deixar_1 = acesso("FORM_TIETE");

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
			<form method='POST' action='../avaleht.php?servletjs2=20$$20'>
			<td><input type=image name='voltar' src='../imagens/botao_voltar.PNG'></td>
			</form></table></td></tr></table>
			</div>";
	        exit();
}	

setlocale(LC_TIME,"portuguese");
$mes_data = strftime("%B");

?>

<style type="text/css" media="print">
div.invisivel {
visibility: hidden; 
}
</style>

<div class="invisivel">

<form method="POST" action="javascript:window.close()">
<td><input type=image name="socios" src="../imagens/botaoazul25.PNG"></td>
</form>

</div>

<script language="JavaScript" type="text/javascript">
// Funcao Imprimir
function printit(){ 
if (NS) { 
window.print(); 
} else { 
var WebBrowser = '<OBJECT ID="WebBrowser1" WIDTH=0 HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>'; 
document.body.insertAdjacentHTML('beforeEnd', WebBrowser); 
WebBrowser1.ExecWB(6,11);//Use a 1 vs. a 2 for a prompting dialog box WebBrowser1.outerHTML = ""; 
} 
} 

// bloqueando a tecla Ctrl
if (document.all) {
    document.onkeydown = function() {
        var teclaCtrl = event.keyCode ? event.keyCode : (event.which ? event.which : event.charCode);
        if (teclaCtrl == 17) {
            alert('Opção Invalida !!!');
            return false;
        }
    }
}
// Bloqueia Botao direito do mouse
function click() { 
if (event.button==2||event.button==3) { 
alert('Botão desativado !!!') 
} 
} 
document.onmousedown=click 

</script>

<html>
<head>
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
</head>

<script language="javascript">

function fechar(){
	
	if(document.all){
		window.opener=window;
		window.close("#");
	}else{
		self.close();
	}
}

</script>

<body>
</html>

<style type=text/css>

<!--.cp {  font: bold 11px Arial; color: black}
<!--.ti {  font: 10px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
<!--.p  { line-height: 10pt}
<!--.edt {
	width: 350px;
	height: 26px;
	border: 0px;
}

@media screen{
	.nao_mostrar { display: none;}
    .nao_imprimir { display: block;}	
}

@media print{
	.nao_mostrar { display:block;}
    .nao_imprimir { display:none;}	
}
--></style> 


<?

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

mysql_select_db($db);
// retorna uma pesquisa

// Regata Secao
session_start();
$Cod_3 = $_SESSION['navega'];

$Cod_p = $Cod_2;

if ($Cod_3 != 0)
{
   $consulta  = "SELECT * FROM clube_tiete WHERE id = '$Cod_3' ORDER BY id";
}
else
{
   $consulta  = "SELECT * FROM clube_tiete WHERE MATRICULA = '$Cod_p'";
}   

$resultado = mysql_query($consulta);

$row = mysql_fetch_array($resultado);

$id         = @$row["id"];

if (!empty($id)){

$id      = @$row["id"];
$Edit1   = @$row["CODIGO"];    
$Edit2   = @$row["MATRICULA"]; 
$Edit3   = @$row["DATA"];  
$Edit4   = @$row["NOME"];  
$Edit5   = @$row["SEXO"];  
$Edit6   = @$row["DATNASC"];  
$Edit7   = @$row["NACION1"];  
$Edit8   = @$row["NATURA1"];  
$Edit9   = @$row["ESCOLA"];  
$Edit10  = @$row["CIVIL"];  
$Edit11  = @$row["ENDER"];  
$Edit12  = @$row["BAIRRO"];  
$Edit13  = @$row["CEP"];  
$Edit14  = @$row["CIDADE"];  
$Edit15  = @$row["UF"];  
$Edit16  = @$row["FONE"];  
$Edit17  = @$row["CEL"];  
$Edit18  = @$row["EMAIL"];  
$Edit19  = @$row["CPF"];  
$Edit20  = @$row["RG"];  
$Edit21  = @$row["ORG"];  
$Edit22  = @$row["OBS"];  
$Edit23  = @$row["LOG"]; 
$Edit24  = @$row["LETRA"];
}else{

	
$consulta2  = "SELECT * FROM clube_tiete WHERE MATRICULA = '$Cod_3' ORDER BY MATRICULA";

$resultado2 = mysql_query($consulta2);

$row2 = mysql_fetch_array($resultado2);
	
$id      = @$row2["id"];
$Edit1   = @$row2["CODIGO"];    
$Edit2   = @$row2["MATRICULA"]; 
$Edit3   = @$row2["DATA"];  
$Edit4   = @$row2["NOME"];  
$Edit5   = @$row2["SEXO"];  
$Edit6   = @$row2["DATNASC"];  
$Edit7   = @$row2["NACION1"];  
$Edit8   = @$row2["NATURA1"];  
$Edit9   = @$row2["ESCOLA"];  
$Edit10  = @$row2["CIVIL"];  
$Edit11  = @$row2["ENDER"];  
$Edit12  = @$row2["BAIRRO"];  
$Edit13  = @$row2["CEP"];  
$Edit14  = @$row2["CIDADE"];  
$Edit15  = @$row2["UF"];  
$Edit16  = @$row2["FONE"];  
$Edit17  = @$row2["CEL"];  
$Edit18  = @$row2["EMAIL"];  
$Edit19  = @$row2["CPF"];  
$Edit20  = @$row2["RG"];  
$Edit21  = @$row2["ORG"];  
$Edit22  = @$row2["OBS"];  
$Edit23  = @$row2["LOG"]; 
$Edit24  = @$row2["LETRA"];
	
}

$cad_catego_01 = "        "; 

If ($categoria == "I")
{
	$cad_catego_01 = "(ISENTO)";
}
If ($categoria == "R")
{
	$cad_catego_01 = "(REMIDO)";
}

$del_2 = $cam_foto;
$ext2  = '.bmp';
$cami2 = "'".Trim($del_2.$cod.$nu.$ext2)."'";
$cami3 = Trim(" ".$del_2.$cod.$nu.$ext2);


			// Atualiza arquivo Log
			$data_log = date("d/m/Y");
			$hora_log = date("H:i:s"); 
			$even_log = "CARTEIRINHA CLUBE TIETE/".$cod.$nu;
			
			$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
			             VALUES
			             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
			
			@mysql_query($consulta_log, $link);


?>


<html>
<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; "  background="../imagens/logo4.PNG" >

<div class=nao_mostrar style="Z-INDEX: 1; LEFT: 0px; POSITION: absolute; TOP: 0px;">

<table width="349" border="0">
  <tr>
    <td width="91" align="center" valign="top"><img src="../imagens/reg_1.png" width="48" height="52"/></td>
    <td width="280" align="left" valign="middle"><table width="220" border="0">
      <tr>
        <td width="160"><div align="left" style=" font-family: Verdana; font-size: 9px;"><b><i>Clube de Regatas do Ti&ecirc;te</i></b></div></td>
        <td width="63"><b><font size="1" face="Verdana"><img src="../imagens/logo_sind.PNG" width="40" height="40"/></font></b></td>
      </tr>
    </table>      </td>
  </tr>
  <tr>
    <td align="center"><img src="../imagens/px1.gif" width="1" height="1"/><img src="ver.php?new_fot=<?=$id;?>" width="72" height="80" border="1"/></td>
    <td align="left"><table width="228" border="0">
      <tr>
        <td width="273"><div align="center" style=" font-family: Verdana; font-size: 8px;"><b><?=$Edit4;?></b></div></td>
      </tr>
      <tr>
        <td><div align="center"><font size="2"><b><?=$Edit1.$Edit24;?></b></font></div></td>
      </tr>
      <tr>
        <td><div align="center"><font size="2"><b><?=$Edit2;?></b></font></div></td>
      </tr>
      <tr>
        <td><div align="center"><font size="2"><b><?=$Edit3;?></b></font></div></td>
      </tr>
    </table></td>
  </tr>
</table>
</div>
</body>
</html>
<script Language="JavaScript">
window.print();
</script>

<script language="javascript">
setTimeout("fechar()",100);
</script>

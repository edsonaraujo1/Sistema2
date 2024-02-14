<?
/*
 -----------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Index do Sistema
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 12/06/2010 

 DEUS SEJA LOUVADO
 -----------------------------------------
*/
?>

<?
@session_start();
$servletjs2 = ($_SESSION["servletjs2"]);

include_once('sql_injection.php');

include("config.php");

include("logar.php");

$nome3       = addslashes(strtoupper($_SESSION["nome_log"]));
$inf1        = addslashes($_SESSION["informes_log"]);
$servletjs2  = addslashes($_SESSION["servletjs2"]);


if ($servletjs2 == '20$$20'){
	
?>

<script>
x=screen.width; 
if (x < 800)
{
	//window.location = "error2.php";
}
</script>


<script language="JavaScript">
<!--

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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html>
<head>
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="imagens/favicon.ico"/>
</head>

<body>

<?
// Abre Conexão com o MySql
include("conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass)

    or die( include("login.php"));

@mysql_select_db($db);


// Abrir tabela Senha

$consulta3 = "SELECT * FROM tt_ser_01 Where login = '". anti_sql_injection($nome3) ."'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$conta      = strtoupper(trim(@$row3['conta']));

if ($conta == "BLOQUEADA" or $conta == "BLOQUEADO"){
            	
            	
            	
    echo "<html>
						<head>
						<title>ERRO AO CONECTAR</title>
			            <link rel='shortcut icon' href='favicon.ico'/>
						</head>
						<body>
									
						<style type=text/css>
						
						
						<!--.cp {  font: bold 10px Arial; color: black}
						<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
						<!--.ld { font: bold 15px Arial; color: #000000}
						<!--.ct { FONT: 9px 'Arial Narrow'; COLOR: #000033}
						<!--.cn { FONT: 9px Arial; COLOR: black }
						<!--.bc { font: bold 22px Arial; color: #000000 }
						--></style> 
						
						</HEAD>
						<BODY text=#000000 bgColor=#ffffff topMargin=0 rightMargin=0 leftmargin=0 bottommargin=0 background='$logo_sis'>
						</html>
						
						<br><br><br><br>
							
						<div align=center>
						
						<table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
						<tr>
						<td align=center>
						     <font face=arial><b>*** SUA CONTA ESTA BLOQUEADA  !!! ***<br>
							                     Tentativa de acesso ultrapassou 3 tentativas,<br> entre em contato com o <br>
												 ADMINISTRADOR DO SISTEMA</b>
						<table align=center>
						<form method='POST' action='login.php'>
						<td><input type=image name='consulta' src='imagens/botao_voltar.PNG'></td>
						</form>  
						</table>
						</td>
						</tr>
						</table>
						</div>";
    exit;
}



include("menu.php");

//include("info/informes.php");

?>
</html>


<?
}else{
	
	include('index.htm');
}	

?>

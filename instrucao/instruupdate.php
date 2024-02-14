<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Update Cadastro Instrucao
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/


// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

include("menu.php");

include("../logar.php");
$nome3 = $_SESSION["nome_log"];

?>

<html>
<head>
<title><?=$Titulo;?></title>
</head>
<body>

<?

$Edit1        = strtoupper($_POST['Edit1']);
$Edit2        = strtoupper($_POST['Edit2']);
$Edit3        = strtoupper($_POST['Edit3']);
$Edit4        = strtoupper($_POST['Edit4']);
$Edit5        = strtoupper($_POST['Edit5']);
$Edit6        = strtoupper($_POST['Edit6']);
$Edit7        = strtoupper($_POST['Edit7']);
$Edit8        = strtoupper($_POST['Edit8']);
$Edit9        = strtoupper($_POST['Edit9']);
$Edit10       = strtoupper($_POST['Edit10']);
$Edit11       = strtoupper($_POST['Edit11']);
$Edit12       = $_POST['Edit12'];
$Edit13       = strtoupper($_POST['Edit13']);
$Edit14       = strtoupper($_POST['Edit14']);
$Edit15       = strtoupper($_POST['Edit15']);
$Edit16       = strtoupper($_POST['Edit16']);
$Edit17       = strtoupper($_POST['Edit17']);
$Edit18       = strtoupper($_POST['Edit18']);

$menssagem = "* * * Alterado * * *";

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass)
        or

die("
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Não foi possivel conectar !!! ***</b>
     <table align=center>
     <form method='POST' action='login.php'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

@mysql_select_db($db)
        or 

die("
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Não Foi possivel selecionar o banco de dados !!! ***</b>
     <table align=center>
     <form method='POST' action='login.php'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

// retorna uma pesquisa

$consulta = "UPDATE instrucao SET Edit1        = '$Edit1',
                                  Edit2        = '$Edit2',
                                  Edit3        = '$Edit3',
                                  Edit4        = '$Edit4',
                                  Edit5        = '$Edit5',
                                  Edit6        = '$Edit6',
                                  Edit7        = '$Edit7',
                                  Edit8        = '$Edit8',
                                  Edit9        = '$Edit9',
                                  Edit10       = '$Edit10',
                                  Edit11       = '$Edit11',
                                  Edit12       = '$Edit12',
                                  Edit13       = '$Edit13',
                                  Edit14       = '$Edit14',
                                  Edit15       = '$Edit15',
                                  Edit16       = '$Edit16',
								  Edit17       = '$Edit17',
								  Edit18       = '$Edit18'  WHERE Edit1 = '$Edit1'";


@mysql_query($consulta, $link) or


die("
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Falha na Alteração !!! ***</b>
     <table align=center>
     <form method='POST' action='cadinstrucao.php'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

			// Atualiza arquivo Log
			$data_log = date("d/m/Y");
			$hora_log = date("H:i:s"); 
			$even_log = $menssagem."/".$Edit1;
			
			$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
			             VALUES
			             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
			
			@mysql_query($consulta_log, $link);

?>

<html>


<style type=text/css>

body { background-image: url(<?="../".$logo_sis;?>);}

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
--></style>

</HEAD>
<BODY text=#000000 bgColor=#ffffff topMargin=0 rightMargin=0 leftmargin=0 bottommargin=0>

<?
include("instrulayout.php");
?>

<div style="Z-INDEX: 34; LEFT: 190px; WIDTH: 544px; POSITION: absolute; TOP: 525px; HEIGHT: 80px">

<table border='0' aling=center>
          <td> </td>

          <form method="POST" action="cadinstrucao.php?Cod_xxx=<?=$Edit1;?>">
          <td><input type=image name="socios" src="../imagens/botao_voltar.PNG"></td>
          </form>

</table>
</div>

</body>
</html>

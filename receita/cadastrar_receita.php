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

include("../logar.php");

$nome3 = $_SESSION["nome_log"];

include("menu.php");

?>

<html>
<head>
<title>Tabela 'RECEITA'</title>
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

<body>
</html>

<?

$codigo      = $_POST['codigo'];
$data        = strtoupper($_POST['data']);
$operadora   = strtoupper($_POST['operadora']);
$semana      = strtoupper($_POST['semana']);
$semana1     = strtoupper($_POST['semana1']);
$semana2     = strtoupper($_POST['semana2']);
$semana3     = strtoupper($_POST['semana3']);
$semana4     = strtoupper($_POST['semana4']);
$semana5     = strtoupper($_POST['semana5']);
$semana6     = strtoupper($_POST['semana6']);
$semana7     = strtoupper($_POST['semana7']);

include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);
        
@mysql_select_db($db);

// retorna uma pesquisa

if ($Acao == "insert"){

   $consulta = "INSERT INTO receita (CODIGO, DATA,  OPERADORA,  SEMANA, SEMANA1, SEMANA2, SEMANA3, SEMANA4, SEMANA5, SEMANA6, SEMANA7)
                           VALUES ('$codigo', '$data', '$operadora', '$semana', '$semana1', '$semana2', '$semana3', '$semana4', '$semana5', '$semana6', '$semana7')";
$Acao = " ";                           

@mysql_query($consulta, $link) or

die("
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Falha na Inclusão !!! ***</b>
     <table align=center>
     <form method='POST' action='receita_grid.php'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

}

if ($Acao == "update"){


   $consulta = "UPDATE receita SET DATA       = '$data',
                                   OPERADORA  = '$operadora',
                                   SEMANA     = '$semana',
                                   SEMANA1    = '$semana1',
								   SEMANA2    = '$semana2',
								   SEMANA3    = '$semana3',
								   SEMANA4    = '$semana4',
                                   SEMANA5    = '$semana5',
								   SEMANA6    = '$semana6',
								   SEMANA7    = '$semana7' WHERE CODIGO = '$codigo'";
								   $Acao = " ";                           

@mysql_query($consulta, $link) or

die("
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Falha na Alteracao !!! ***</b>
     <table align=center>
     <form method='POST' action='receita_grid.php'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

}

if ($Acao == "deletar"){


   $consulta = "DELETE FROM receita WHERE CODIGO = '$codigo'";
   $Acao = " ";                           

@mysql_query($consulta, $link) or

die("
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Falha na Exclusao !!! ***</b>
     <table align=center>
     <form method='POST' action='receita_grid.php'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

}

include("receita_grid.php");

?>
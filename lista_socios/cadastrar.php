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

<body>
</html>

<?
$id          = strtoupper($_POST['id']);
$nome        = strtoupper($_POST['nome']);
$salario     = strtoupper($_POST['salario']);
$desconto    = strtoupper($_POST['desconto']);
$cnpj        = strtoupper($_POST['cnpj']);
$codigo      = strtoupper($_POST['codigo']);
$data        = date("d/m/Y"); 

$salario     = str_replace(",",".",$salario);
$desconto    = str_replace(",",".",$desconto);

include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);
        
@mysql_select_db($db);

// retorna uma pesquisa

if ($Acao == "insert"){

   $consulta = "INSERT INTO lis_fun_sind2 (cnpj,
                                           nome,
								           salario,
									       desconto,
										   codigo,
										   data)
								   
                           VALUES ('$cnpj',
						           '$nome',
								   '$salario',
								   '$desconto',
								   '$codigo',
								   '$data')";
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
     <form method='POST' action='javascript:history.go(-1)'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

}

if ($Acao == "update"){


   $consulta = "UPDATE lis_fun_sind2 SET   nome     = '$nome',
								           salario  = '$salario',
									       desconto = '$desconto' WHERE id = '$id'";
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
     <form method='POST' action='javascript:history.go(-2)'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

}

if ($Acao == "deletar"){


   $consulta = "DELETE FROM lis_fun_sind2 WHERE id = '$id'";
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
     <form method='POST' action='javascript:history.go(-2)'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

}

?>
<script>

javascript:history.go(-2)

</script>



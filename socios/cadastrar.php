<?php
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Listagem na Tela por Codigo
 Criado em Data.....: 07/12/2007
 Ultima Atualiza��o : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/
// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);

// include("../logar.php");

$nome3 = $_SESSION["nome_log"];

include_once('../sql_injection.php');

include("menu.php");

?>

<html>
<head>
<title><?php echo $Titulo ?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
</head>

<style type=text/css>

body { background-image: url(<?php echo "../".$logo_sis ?>);}

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
--></style> 

<body>
</html>

<?php
$id          = addslashes(strtoupper($_POST['id']));
$Edit1       = addslashes(strtoupper($_POST['Edit1']));
$Edit2       = addslashes(strtoupper($_POST['Edit2']));
$Edit3       = addslashes(strtoupper($_POST['Edit3']));
$Edit5       = addslashes(strtoupper($_POST['Edit5']));
$PARCELA1    = addslashes(strtoupper($_POST['PARCELA1']));
$Edit6       = addslashes(strtoupper($_POST['Edit6']));
$data        = date("d/m/Y");

$Edit3  = str_replace(",",".",$Edit3);

include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);
        
@mysql_select_db($db);

// retorna uma pesquisa

if ($Acao == "insert"){

   $consulta = "INSERT INTO debito   (CODP,
                                      DESCRICAO,
								      VALOR,
									  VENCIMENTO,
									  DATA,
									  PARCELA)
								   
                           VALUES ('$Edit1',
						           '$Edit2',
								   '$Edit3',
								   '$Edit6',
								   '$data',
								   '$PARCELA1')";
$Acao = " ";                           

@mysql_query($consulta, $link) or

die("
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Falha na Inclus�o !!! ***</b>
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


   $consulta = "UPDATE debito SET   CODP       = '$Edit1',
									DESCRICAO  = '$Edit2',
									VALOR      = '$Edit3',
									VENCIMENTO = '$Edit6',
									DATA       = '$data',
									PARCELA    = '$PARCELA1'   WHERE id = '". anti_sql_injection($id) ."'";                                     		   $Acao = " ";                           


@mysql_query($consulta, $link) or

die("
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
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


   $consulta = "DELETE FROM debito WHERE id = '". anti_sql_injection($id) ."'";
   $Acao = " ";                           

@mysql_query($consulta, $link) or

die("
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
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



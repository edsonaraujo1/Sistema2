<?
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
session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");

$nome3 = $_SESSION["nome_log"];

include("menu.php");

$titulo_tabela = "'CONF/ASSIST. - EDIFICIOS'";

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

$id         = ($_POST['id']);
$Edit1      = strtoupper($_POST['Edit1']);
$Edit2      = strtoupper($_POST['Edit2']);
$Edit3      = $_POST['Edit3'];
$Edit4      = strtoupper($_POST['Edit4']);
$Edit5      = strtoupper($_POST['Edit5']);
$Edit6      = strtoupper($_POST['Edit6']);

$data_sys   = date("d/m/Y");


//echo $Edit1."<br>";
//echo $Edit2."<br>";
//echo $Edit3."<br>";
//echo $Edit4."<br>";
//echo $Edit5."<br>";
//echo $Edit6."<br>";
//echo $Acao."<br>";

include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);
        
@mysql_select_db($db);

// retorna uma pesquisa

if ($Acao == "insert"){

   $consulta = "INSERT INTO conf       (CONFCOD,
                                        VENCTO,
										TOTAL,
										AGENCIA,
										DESCRICAO,
										DAT_BAI,
                                        DATA,
                                        PAGTO)
										
                           VALUES ('$Edit1',
						           '$Edit2',
								   '$Edit3',
								   '$Edit4',
								   '$Edit5',
								   '$Edit6',
								   '$data_sys',
								   '$data_sys')";
$Acao = " ";                           

@mysql_query($consulta, $link) or

die("
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Falha na Inclus�o !!! ***</b>
     <table align=center>
     <form method='POST' action='mostra_grid.php'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

}

if ($Acao == "update"){

   $consulta = "UPDATE conf    SET    CONFCOD   = '$Edit1',
                                      VENCTO    = '$Edit2',
									  TOTAL     = '$Edit3',
									  AGENCIA   = '$Edit4',
									  DESCRICAO = '$Edit5',
									  DAT_BAI   = '$Edit6' WHERE id = '$id'";
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
     <form method='POST' action='mostra_grid.php'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

}

if ($Acao == "deletar"){

   $consulta = "DELETE FROM conf WHERE id = '$id'";
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
     <form method='POST' action='mostra_grid.php'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

}

include("admsedif.php");

?>
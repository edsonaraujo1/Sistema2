<?php
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
@session_start();
$path = strtoupper($_SESSION['Path1']);

// include("../logar.php");

$nome3 = $_SESSION["nome_log"];

include("menu.php");

$titulo_tabela = "'PERMISSOES DE USO - TABELAS'";

?>

<html>
<head>
<title><?php echo $titulo_tabela ?></title>
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

$id         = ($_POST['id']);
$Edit1      = strtoupper($_POST['Edit1']);
$Edit2      = strtoupper($_POST['Edit2']);
$Edit3      = strtoupper($_POST['Edit3']);
$Edit4      = strtoupper($_POST['Edit4']);
$Edit5      = strtoupper($_POST['Edit5']);
$Edit6      = strtoupper($_POST['Edit6']);

$data_sys   = date("d/m/Y");
$inst_sys   = "PERMISSOES DE USO";
$agen_sys   = "SIND";
$i_cod      = 0;

include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);
        
@mysql_select_db($db);

// retorna uma pesquisa

if ($_GET['Acao'] == "insert"){

   $consulta = "INSERT INTO permissoes (login,
                                        tabela,
										incluir,
										alterar,
										excluir,
										imprimir)
										
                           VALUES ('$Edit1',
								   '$Edit2',
								   '$Edit3',
								   '$Edit4',
								   '$Edit5',
								   '$Edit6')";
$Acao = " ";                           

@mysql_query($consulta, $link) or

die("
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Falha na Inclusão !!! ***</b>
     <table align=center>
     <form method='POST' action='mostra_grid.php?var_w2=$Edit1'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

}

if ($_GET['Acao'] == "update"){

   $consulta = "UPDATE permissoes SET login     = '$Edit1',
                                      tabela    = '$Edit2',
                                      incluir   = '$Edit3',
									  alterar   = '$Edit4',
									  excluir   = '$Edit5', 
									  imprimir  = '$Edit6'  WHERE id = '$id'";
								      $Acao = " ";                    
									         

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
     <form method='POST' action='mostra_grid.php?var_w2=$Edit1'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

}

if ($_GET['Acao'] == "deletar"){


   $consulta = "DELETE FROM permissoes WHERE id = '$id'";
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
     <form method='POST' action='mostra_grid.php?var_w2=$Edit1'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

}

include("mostra_grid.php");

?>
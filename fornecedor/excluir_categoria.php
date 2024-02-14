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

include_once("funcoes2.php");

$deixar_1 = acesso("FORNECEDOR");

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


$titulo_tabela = "Tabela 'FORNECEDOR' Excluir";
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

</html>

<?php

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

// retorna uma pesquisa

$sql  = "SELECT * FROM fornecedor WHERE codigo = '". $_GET['Cod_2'] . "'";

$resultado = @mysql_query($sql);
	
$row = mysql_fetch_array($resultado);

$codigo    = @$row["codigo"];
$data      = @$row["data"];
$nome      = @$row["nome"];
$fone      = @$row["fone"];
$endereco  = @$row["endereco"];

$faz = 1;

?>
<br>
<br>
          
<table border=0  align=center>
<tr align=left colspan=2> 
<td><b><?php echo $titulo_tabela ?></b></td> 

<div align=center>

<form type="hidden" method="POST" action="cadastrar_categoria.php?Acao=deletar">

<table align=center border='15' bgcolor='#FFFFFF' bordercolor ='<?php echo $color_bor ?>'>
<tr>
<td>
<table border='1' align=center>

          
<td valign=top><b>COD</b>
<th align='left'><b>DATA</b>
<th align='left'><b>NOME</b>
<th align='left'><b>FONE/CONTATO</b>
<th align='left'><b>ENDEREÇO</b>
</td>

<tr> 
<td align='left'> <font style=' font-family: Verdana; font-size: 14px;'> <b><input type="text" name="codigo" value="<?php echo $codigo ?>"  style=" font-family: Verdana; font-size: 14px;  height:25px;width:78px;"></b>
<td align='left'> <font style=' font-family: Verdana; font-size: 12px;'> <input type="text" name="data"  value="<?php echo $data ?>"      style=" font-family: Verdana; font-size: 14px;  height:25px;width:100px;">
<td align='left'> <font style=' font-family: Verdana; font-size: 12px;'> <input type="text" name="nome" value="<?php echo $nome ?>"  style=" font-family: Verdana; font-size: 14px;  height:25px;width:220px;">
<td align='left'> <font style=' font-family: Verdana; font-size: 12px;'> <input type="text" name="fone" value="<?php echo $fone ?>"  style=" font-family: Verdana; font-size: 14px;  height:25px;width:220px;">
<td align='left'> <font style=' font-family: Verdana; font-size: 12px;'> <input type="text" name="endereco" value="<?php echo $endereco ?>"  style=" font-family: Verdana; font-size: 14px;  height:25px;width:220px;">
<td>
<input type=image name="excluir" src='../imagens/excluir.gif'><td>
<A HREF='javascript:history.go(-1)'><img alt='Cancelar' id='Image2' src='../imagens/cancelar.gif' border='0'></A><td>

</form>
</font>
</td>
</table>
<?php

echo "
		      
	</table>
	</td>
	</tr>
	</table>
	</div>";

?>
<div align="center">
</div>

<?php
?>
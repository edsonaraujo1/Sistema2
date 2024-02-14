<?
/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Cadastro de Vagas
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 02/07/2008 

 DEUS SEJA LOUVADO
 ------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

require("../logar.php");

require("menu.php");

$nome3 = $_SESSION["nome_log"];
?>

<html>
<head>
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
</head>
<body>
</html>

<?

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass)
        or

die("
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolordark='$color_bor' bordercolorlight='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Não foi possivel conectar !!! ***</b>
     <table align=center>
     <form method='POST' action='login.php'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form></p>
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

     <table align=center border='15' bgcolor='#FFFFFF' bordercolordark='$color_bor' bordercolorlight='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Não Foi possivel selecionar o banco de dados !!! ***</b>
     <table align=center>
     <form method='POST' action='login.php'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form></p>
     </table>
     </td>
     </tr>
     </table>
     </div>");

// Abrir tabela Vagas

if ($Cod_xxx != 0)
{
$consulta2 = "SELECT * FROM vaga WHERE COD = '$Cod_xxx' ORDER BY cod";

}else{
	
$consulta2 = "SELECT * FROM vaga ORDER BY COD LIMIT 0,100";
}

// Função Navegar pelo registro Proximo e Anterior
If ($Cod_Anterior != 0){
	
	$id = $Cod_Anterior;

    if($Cod_Anterior != 0){
       $id = $id -1;
       }
       else{
           $id = $id +1;
           }

       if ($id) {
       $consulta2 = "SELECT * FROM vaga ORDER BY id LIMIT $id,1";
	
}
}
If ($Cod_Proximo != 0){
	
	$id = $Cod_Proximo;

    if($Cod_Proximo != 0){
       $id = $id -0;
       }
       else{
           $id = $id -1;
           }

       if ($id) {
       $consulta2 = "SELECT * FROM vaga ORDER BY id LIMIT $id,1";
	
}
}

If ($Cod_fim != 0){
	
       $consulta2 = "SELECT * FROM vaga ORDER BY COD DESC LIMIT 0,1";
	
}

If ($Cod_inicio != 0){
	
       $consulta2 = "SELECT * FROM vaga ORDER BY COD ASC LIMIT 0,1";
	
}
// Fim da Função Navegar pelo registro


$resultado2 = @mysql_query($consulta2);

$row2 = @mysql_fetch_array($resultado2);

$id     = @$row2["id"];
$Edit1  = @$row2["COD"];
$Edit2  = @$row2["SITU"];
$Edit3  = @$row2["DATA"];
$Edit4  = @$row2["FUNCAO"];
$Edit5  = @$row2["QTD"];
$Edit6  = @$row2["ENCA"];
$Edit7  = @$row2["NOME"];
$Edit8  = @$row2["ENDERECO"];
$Edit9  = @$row2["BAIRRO"];
$Edit10 = @$row2["CIDADE"];
$Edit11 = @$row2["ESTADO"]; 
$Edit12 = @$row2["CEP"];
$Edit13 = @$row2["TELEFONE"];
$Edit14 = @$row2["CONTATO"];
$Edit15 = @$row2["OBS"];

$menssagens = "* * * Visualizar * * *";

// Abrir tabela Senha

$consulta3 = "SELECT * FROM tt_ser_01 Where login = '$nome3'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$vag1       = @$row3["vag1"];
$vag2       = @$row3["vag2"];
$vag3       = @$row3["vag3"];

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
-->
</style> 

<?
include("help.php");
?>

<?
require("vagaslayout.php");
?>

</body>
</html>
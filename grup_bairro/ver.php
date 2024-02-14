<?
/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Rotina mostra foto na tela Cadastro de Socios
 Criado em Data.....: 07/12/2007
 Ultima Atualizaчуo : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------
*/

// Resgata a Sessao
session_start();
$path    = strtoupper($_SESSION['Path1']);
$new_fot = $_SESSION['codp'];

// Abre Conexуo com o MySql
include('../conexao.php');
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

//$sql = @mysql_query("SELECT * FROM tb_segunda WHERE cod_foto = '$new_fot' ORDER BY RAND()",$link);
$sql = @mysql_query("SELECT * FROM tb_terceira  WHERE codp = '$new_fot' ORDER BY RAND()",$link);

Header("Content-Type:".@mysql_result($sql,0,"tipo_imagem"));
$foto_tela  = @mysql_result($sql,0,"dados_imagem");
echo $foto_tela.'<br>';

?>
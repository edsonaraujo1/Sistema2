<?
/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Rotina mostra foto na tela Cadastro de Socios
 Criado em Data.....: 07/12/2007
 Ultima Atualiza��o : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------
*/

// Resgata a Sessao
@session_start();
$path    = strtoupper($_SESSION['Path1']);
$new_fot = $_SESSION['codp'];

// Abre Conex�o com o MySql
include('../conexao.php');
// Chama o Banco de Dados

include_once('../sql_injection.php');

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

//$sql = @mysql_query("SELECT * FROM tb_segunda WHERE cod_foto = '$new_fot' ORDER BY RAND()",$link);
$sql = @mysql_query("SELECT * FROM tb_segunda WHERE codp = '". anti_sql_injection($new_fot) ."' ORDER BY RAND()",$link);

Header("Content-Type:".@mysql_result($sql,0,"tipo_imagem"));
$foto_tela  = @mysql_result($sql,0,"dados_imagem");
echo $foto_tela.'<br>';

?>
<?php

/**
 * @author holodek
 * @copyright 2008
 */

// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);


// Abre Conex�o com o MySql
include("../conexao.php");
// Chama o Banco de Dados

include_once('../sql_injection.php');

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

$new_fot = 8;

// Visualizar fotos gravadas no Banco de Dados
$sql = @mysql_query("SELECT * FROM tb_segunda WHERE Codigo_foto = '". anti_sql_injection($new_fot) ."' ORDER BY RAND()",$link)
or die("erro no SQL: ".mysql_error());

Header("Content-Type:".@mysql_result($sql,0,"tipo_imagem"));
$foto_tela = @mysql_result($sql,0,"dados_imagem");


echo 'teste de teste.<br>';
echo 'teste de teste.<br>';
echo 'teste de teste.<br>';
echo 'teste de teste'

?>

<img src='<?php echo $foto_tela ?>'/>

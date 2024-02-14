<?php

/**
 * @author holodek
 * @copyright 2008
 */

//$new_fot = 8;

// Abre Conexão com o MySql
include('../conexao.php');
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

//$sql = @mysql_query("SELECT * FROM tb_segunda WHERE cod_foto = '$new_fot' ORDER BY RAND()",$link);
$sql = @mysql_query("SELECT * FROM fotos_site WHERE codp = '$new_fot' ORDER BY RAND()",$link);

Header("Content-Type:".@mysql_result($sql,0,"tipo_imagem1"));
$foto_tela  = @mysql_result($sql,0,"dados_imagem1");

echo $foto_tela.'<br>';

?>

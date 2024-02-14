<?php

/**
 * @author holodek
 * @copyright 2008
 */

$acao = 'cadastrar';

//$imagem = $_POST['imagem'];

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

// Abre Conexão com o MySql
include($path."conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);


if($acao == 'cadastrar') { // Cadastra a imagem no banco de dados
$fp = fopen($imagem,"rb");
$imagem_temp = fread($fp,filesize($imagem));
fclose($fp);
$imagem_temp = addslashes($imagem_temp);
$sql = mysql_query("INSERT INTO tb_segunda(cod_foto,imagem,tipo_imagem,bytes_imagem,dados_imagem)
VALUES('$id_9','$imagem_name','$imagem_type','$imagem_size','$imagem_temp')",$link)
or die("Erro no SQL: ".mysql_error());
echo "<br><br><div align=center><font face=Arial size=2>Imagem cadastrada com SUCESSO!!<br><br>
<a href='javascript:history.go(-1)'><< Voltar</a></font></div>";

}/*fecha acao=entrar */?>


<?php

/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Cadastro de Adms
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------
*/


// Resgata a Sessao
session_start();
$fot_id = $_SESSION['Photto1'];

session_start();
$path = strtoupper($_SESSION['Path1']);

require($path."logar.php");

// Abre Conexão com o MySql
include($path."conexao.php");
// Chama o Banco de Dados

require("menu.php");

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

if($acao == 'cadastrar') {

$consulta = "SELECT * FROM tb_segunda WHERE cod_foto = '$fot_id'";
	
$resultado = @mysql_query($consulta);

$row = @mysql_fetch_array($resultado);

$id_9 	   = @$row["cod_foto"];
$id_imagem = @$row["id_imagem"];

if(!empty($id_imagem)){

$consulta2 = "DELETE FROM tb_segunda WHERE id_imagem = '$id_imagem'";

@mysql_query($consulta2, $link);
	
}
}
      
$id_9 = $fot_id;     

?>
<html>
<head>
<title><?=$Titulo;?></title>
</head>
<body bgcolor="#FFFFFF" text="#000000">

<style type=text/css>

body { background-image: url(<?=$logo_sis;?>);}

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
--></style> 


<?
if($acao == 'cadastrar') { // Cadastra a imagem no banco de dados
$fp = fopen($imagem,"rb");
$imagem_temp = fread($fp,filesize($imagem));
fclose($fp);
$imagem_temp = addslashes($imagem_temp);
$sql = @mysql_query("INSERT INTO tb_segunda(cod_foto,imagem,tipo_imagem,bytes_imagem,dados_imagem)
VALUES('$id_9','$imagem_name','$imagem_type','$imagem_size','$imagem_temp')",$link)
or die("Erro no SQL: ".@mysql_error());
echo "<br><br><div align=center><font face=Arial size=2>Imagem cadastrada com SUCESSO!!<br><br>
<a href='javascript:history.go(-2)'><< Voltar</a></font></div>";
}else{
/*fecha acao=entrar */?>


<div align="center">
<br/><br/><br/>

<form name="frm_imagem" method="POST" action="<?echo $PHP_SELF;?>?acao=cadastrar" enctype="multipart/form-data">
<table width="50" border="15" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" bordercolor ='#4682B4'>
<tr>
<td colspan="2" height="30">
<div align="center"><font face="Arial" size="2"><b><font size="4">Incluir Foto do Associado</font></b></font></div></td>
</tr>

<tr>
<td width="25" height="30"><font face="Arial" size="2">Foto:</font></td>
<td width="75" height="30"> <font face="Arial" size="2"><input type="file" name="imagem"></font></td>
</tr>

<tr>
<td colspan="2" height="30"><div align="center"><font face="Arial" size="2">
<input type="submit" name="enviar" value="Cadastrar Foto">
<input type="submit" name="enviar" value="Voltar >>">
</font></div></td>
</tr>
</table>
</form>



</div>
<?}/* fecha acao=entrar */?>
</body>
</html>


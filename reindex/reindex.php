<?
/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Reindex do Sistema
 Criado em Data.....: 19/12/2008
 Ultima Atualização : 19/12/2008 

 DEUS SEJA LOUVADO
 ------------------------------------------
*/
?>

<script language="JavaScript"><!--

document.onkeydown = keyCatcher;

function keyCatcher() 
{
   var e = event.srcElement.tagName;

   if (event.keyCode == 8 && e != "INPUT" && e != "TEXTAREA") 
   {
      event.cancelBubble = true;
      event.returnValue = false;
   }
}
//-->
</script>


<?

$index_1 = "index.php";

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

//$faz0 = 0;  // Fotos
//$faz1  = 1;  // Socios
//$faz2  = 1;  // Edificios
//$faz3  = 1;  // Adms
//$faz4  = 1;  // Oposicao3
//$faz5  = 1;  // Vaga
//$faz6  = 1;  // Lorival
//$faz7  = 1;  // Cursos
//$faz8  = 1;  // Acompanhamento
//$faz9  = 1;  // Protocolo
//$faz10 = 1;  // Cadadv
//$faz11 = 1;  // Cadadv
//$faz12 = 1;  // Cadadv
$faz13 = 1;  // log_visita

// Organizar id da Foto Socios

if ($faz0 == 1){

//$sql2 = 'ALTER TABLE `tb_segunda` ADD `codp` VARCHAR(8) NOT NULL AFTER `id_imagem`';
//$res2 = mysql_query($sql2);

}

// Organizar id Socios

if ($faz1 == 1){

$sql0 = 'ALTER TABLE `socios` ORDER BY `COD`';
$res0 = mysql_query($sql0);

$sql1 = 'ALTER TABLE `socios` DROP `id`';
$res1 = mysql_query($sql1);

$sql2 = 'ALTER TABLE `socios` ADD `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST';
$res2 = mysql_query($sql2);

}

// Organizar id Edificios

if ($faz2 == 1){

$sql0 = 'ALTER TABLE `edificios` ORDER BY `COD`';
$res0 = mysql_query($sql0);

$sql3 = 'ALTER TABLE `edificios` DROP `id`';
$res3 = mysql_query($sql3);

$sql4 = 'ALTER TABLE `edificios` ADD `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST';
$res4 = mysql_query($sql4);

}

// Organizar id Adms

if ($faz3 == 1){

$sql0 = 'ALTER TABLE `adms` ORDER BY `cod`';
$res0 = mysql_query($sql0);

$sql5 = 'ALTER TABLE `adms` DROP `id`';
$res5 = mysql_query($sql5);

$sql6 = 'ALTER TABLE `adms` ADD `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST';
$res6 = mysql_query($sql6);

}


// Organizar id Oposicao3

if ($faz4 == 1){

$sql0 = 'ALTER TABLE `oposicao3` ORDER BY `COD`';
$res10 = mysql_query($sql0);

$sql7 = 'ALTER TABLE `oposicao3` DROP `id`';
$res7 = mysql_query($sql7);

$sql8 = 'ALTER TABLE `oposicao3` ADD `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST';
$res8 = mysql_query($sql8);

$sql8op = 'UPDATE `oposicao3` SET COD =`id`';
$res8op = mysql_query($sql8op);

}

// Organizar id Vaga

if ($faz5 == 1){

$sql11 = 'ALTER TABLE `vaga` ORDER BY `COD`';
$res11 = mysql_query($sql11);

$sql12 = 'ALTER TABLE `vaga` DROP `id`';
$res12 = mysql_query($sql12);

$sql13 = 'ALTER TABLE `vaga` ADD `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST';
$res13 = mysql_query($sql13);

}

// Organizar id Lorival

if ($faz6 == 1){

$sql14 = 'ALTER TABLE `atendimento_soc` ORDER BY `COD`';
$res14 = mysql_query($sql14);

$sql15 = 'ALTER TABLE `atendimento_soc` DROP `id`';
$res15 = mysql_query($sql15);

$sql16 = 'ALTER TABLE `atendimento_soc` ADD `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST';
$res16 = mysql_query($sql16);

}

// Organizar id Cursos

if ($faz7 == 1){

$sql17 = 'ALTER TABLE `cursos` ORDER BY `COD`';
$res17 = mysql_query($sql17);

$sql18 = 'ALTER TABLE `cursos` DROP `id`';
$res18 = mysql_query($sql18);

$sql19 = 'ALTER TABLE `cursos` ADD `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST';
$res19 = mysql_query($sql19);

}

// Organizar id Acompanhamento

if ($faz8 == 1){

$sql20 = 'ALTER TABLE `acompa` DROP `id`';
$res20 = mysql_query($sql20);

$sql21 = 'ALTER TABLE `acompa` ADD `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST';
$res21 = mysql_query($sql21);

}


// Organizar id Protocolo

if ($faz9 == 1){

$sql22 = 'ALTER TABLE `protocolo` ORDER BY `CODIGO`';
$res22 = mysql_query($sql22);

$sql23 = 'ALTER TABLE `protocolo` DROP `id`';
$res23 = mysql_query($sql23);

$sql24 = 'ALTER TABLE `protocolo` ADD `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST';
$res24 = mysql_query($sql24);

}

// Organizar id Cadastro de Advogado

if ($faz10 == 1){

$sql25 = 'ALTER TABLE `cadadv` ORDER BY `CODIGO`';
$res25 = mysql_query($sql25);

$sql26 = 'ALTER TABLE `cadadv` DROP `id`';
$res26 = mysql_query($sql26);

$sql27 = 'ALTER TABLE `cadadv` ADD `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST';
$res27 = mysql_query($sql27);

}


// Organizar id Cadastro de Senhas

if ($faz11 == 1){

$sql28 = 'ALTER TABLE `tt_ser_01` ORDER BY `login`';
$res28 = mysql_query($sql28);

$sql29 = 'ALTER TABLE `tt_ser_01` DROP `id`';
$res29 = mysql_query($sql29);

$sql30 = 'ALTER TABLE `tt_ser_01` ADD `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST';
$res30 = mysql_query($sql30);

}


if ($faz12 == 1){

// Organiza Tabela apos a Exclusao
$sql31 = 'ALTER TABLE `aposentados` ORDER BY `NOME`';
$res31 = mysql_query($sql31);

$sql32 = 'ALTER TABLE `aposentados` DROP `id`';
$res32 = mysql_query($sql32);

$sql34 = 'ALTER TABLE `aposentados` ADD `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST';
$res34 = mysql_query($sql34);

}

if ($faz13 == 1){
	
// Organiza Tabela apos a Exclusao	
$sql32 = 'ALTER TABLE `log_visita` ORDER BY `id`';
$res32 = mysql_query($sq32);

$sql33 = 'ALTER TABLE `log_visita` DROP `id`';
$res33 = mysql_query($sql33);

$sql34 = 'ALTER TABLE `log_visita` ADD `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST';
$res34 = mysql_query($sql34);

$sql35 = 'UPDATE `log_visita` SET `QTD` = `id`';
$res35 = mysql_query($sql35);
	
	
	
}
?>

<html>
<head>
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
</head>
<body>

<style type=text/css>

body { background-image: url(<?="../".$logo_sis;?>);
       background-attachment: fixed }

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
-->
</style> 

</body>

<table align="center" border="15" bgcolor="#FFFFFF" bordercolor ='<?=$color_bor;?>'>

<td align="center">

<div align=center>

<img src="../imagens/exclam.gif" width="100" height="100" align="center"/>



<br />
<font color="#336699" face=Verdana  size="4">
<b>Tabelas<br/>&nbsp;&nbsp;Organizadas com Susseso&nbsp;&nbsp;<br/></b>
</font>


</div>
<br/>
<div align="center">
          <table border=0  align=center>
          <tr align=center colspan=2> 

	      <a href="../index.php">
	      <img alt="sair" src="../imagens/botaoazul25.PNG" border="0"></a>
	      </tr>
	      </table>
</div>
</td>
</table>
</html>

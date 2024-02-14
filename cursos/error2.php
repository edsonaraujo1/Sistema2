<?php
/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Mensagem de Erro na Tela
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------
*/

include("config.php");

define("logo_sis", "$logo_sis");

?>

<html>
<head>
<title><?php echo $Titulo ?></title>
<link rel="shortcut icon" href="imagens/favicon.ico"/>
<style type="text/css">
<!--
body {
	background-image:  url(imagens/logo2.PNG);
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style1 {
	font-family: Verdana;
	font-weight: bold;
	font-size: 14px;
}
.style2 {font-family: Verdana}
.style4 {font-size: 12px}
.style6 {font-family: Verdana; font-size: 14; }
.style7 {font-size: 14px}
.style8 {font-size: 14}
-->
</style></head>

<body>
<table width="231" border="0">
  <tr>
    <td width="227"><table width="227" height="263" border="16" bordercolor="<?php echo $color_bor ?>" bgcolor="#FFFFFF">
      <tr>
        <td><div align="center"><span class="style1"><img src="imagens/sindificios.gif" width="32" height="32"/><br/>
          *** OBRIGADO ***<br/>
            POR ACESSAR NOSSO SISTEMA</span><br/>
            <span class="style2"><span class="style4"><span class="style7"><span class="style8">Estamos em fase de termino de um layout
  para Dispositivos moveis como PockePC, PDA,
  celulares e portateis...<br/>
  <strong>AGUARDE EM BREVE !!</strong></span></span></span></span><span class="style6"><br/>
  <strong>*** Sindificios ***</strong></span><span class="style8"><strong></strong></span><strong><br/>
  OBRIGADO !!<br/>
  <a href="javascript:window.close()">
  <img alt="sair" src="imagens/botaoazul25.PNG" width="92" height="22" border="0"/></a>
  <br/>
     
  </strong></div></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>

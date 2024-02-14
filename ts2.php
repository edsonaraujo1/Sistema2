<?php
/*
 -----------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Informações do Sistema
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 -----------------------------------------
*/

include("logar.php");
$nome3 = addslashes($_SESSION["nome_log"]);

// <bgsound src="imagens/onestop.mid" Delay=5 Loop=2 Volume=0 Balance=0>

?>
<style type=text/css>
<!--

body { background-image: url(<?php echo $logo_sis ?>);}

.style6{
	
	color: #336699;
	font-family: Verdana, Arial;
	font-weight: bold;
}	

-->
</style>
<html>
<head>
<title><?php echo $Titulo ?></title>
<link rel="shortcut icon" href="favicon.ico"/>
</head>

<body>
<div align=center>
<br/>
<br/>
<br/>
<br/>
<br/>

<img src="imagens/stop.gif" width="98" height="98" align="center"/>


<table align="center">

<td align="center">
<font color="#336699" face=Verdana  size="4">
<b>Em desenvolvimento<br/>Aguardem em breve estaremos disponibilizando um<br/>novo sistemas</b>
</font>
</table>

</td>
</div>
<br/>
<div align="center">
          <table border=0  align=center>
          <tr align=center colspan=2> 

	      <a href="javascript:window.close()">
	      <img alt="sair" src="imagens/botaoazul25.PNG" border="0"/></a>
	      </tr>
	      </table>

</div>
</body>
</html>

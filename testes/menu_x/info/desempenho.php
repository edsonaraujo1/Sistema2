<?
/*
 ----------------------------------------------------
 Desenvolvido por...: Kemper Alves de Castro Carlos
 Programador........: Edson de Araujo
 Finalidade.........: Testar Desempenho da Rede
 Criado em Data.....: 23/09/2010
 Ultima Atualização : 23/09/2010 

 DEUS SEJA LOUVADO
 ----------------------------------------------------
*/

// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);
include('../config.php');

include("../logar.php");

include("menu.php");

$nome3  = addslashes($_SESSION["nome_log"]);
$rede_x = $_SESSION['server_sq2']

?>
<br/>
<br/>
<html>

<style type=text/css>
			
body { background-image: url('../<?=$logo_sis;?>');
       background-attachment: fixed }
			
</style> 

<body style=" margin-left: 0px;  margin-top: 12px;  margin-right: 0px;  margin-bottom: 0px; " >
<div style="Z-INDEX: 0; LEFT: 290px; WIDTH: 400px; POSITION: absolute; TOP: 62px; HEIGHT: 381px">

<table width="400" border="16" align="center" bordercolor="<?=$color_bor;?>" bgcolor="#FFFFFF">
  <tr>
    <td width="100%" align="center" bgcolor="#FFF8DC">
    <h1 align="center" id=titulo>&nbsp;Teste de Desempenho</font></h1></td>
  </tr>
  <tr>
    <td align="center" valign="top" bgcolor="#FFFFFF">
	<div style="width:100%; border-style:solid; border-color:rgb(200,200,200); border-width:0px">
      
      
	  <b><p align="center" id=aguarde style="text-align: center; color: blue; font-weight: bold">
	  Aguarde enquanto o teste &eacute; efetuado!
	  
      <div id=barraprogresso style="width:96%;left: 2%; position: relative; border-style:solid; border-color:rgb(200,200,200); border-width:1px; margin-bottom:3px">
      <hr align=center style="width:0%; height:20px; border-style: none; background-color:blue;" id=barra>
	  
    </div>
        <?
   /*
      Aqui definimos qual a quantidade de kbytes
      ser&aacute; utilizada no teste, 
      Utilizo 256 porque &eacute; o que mais faz o resultado
      se aproximar da verdade.
      Valores muito altos consomem muita cpu, provocando
      atraso no processamento e consequentemente, perda de precis&atilde;o.
      valores muito baixos a transfer&ecirc;ncia ocorre muito rapidamente,
      provocando tamb&eacute;m baixa precis&atilde;o no resultado.
   */

   $tamanho=256;
   $tamanho=1024*$tamanho;


   /*
      Agora vamos gerar uma string com a quantidade de dados necess&aacute;rio.
      Note que a string &eacute; aleat&oacute;ria para evitar que o browser do
      usu&aacute;rio armazene no cache.
      Veja tamb&eacute;m que a cada 256 bytes &eacute; escrito o c&oacute;digo que atualiza
      a barra de progresso, e, logicamente, a quantidade de bytes
      utilizado por esse c&oacute;digo &eacute; descontado, pois ele vai junto da
      string de 256K, assim continuamos enviando dados e atualizamos a barra
      de progresso ao mesmo tempo  :)
   */

   for ($i=0; $i<$tamanho; $i++){
      if ($i % 256 == 0){
         $addstr="--> <script>";
         $addstr.="document.getElementById(\"barra\").style.width=\"".number_format(100/$tamanho*$i,0)."\%\";";
         $addstr.="</script><!-- ";
         $i+=strlen($addstr);   //&eacute; a quantidade de caracteres gastos para atualizar a barra
         $str.=$addstr;
      }else{
         //Gera uma string aleat&oacute;ria, para evitar cache dos navegadores
         $str.=chr(rand(97, 97+20));
      }
   }
?>
        <?
   /*
      O script abaixo exibe a frase "aguarde o fim do teste!"
      e armazena o momento exato do in&iacute;cio do teste...
   */
?>
        <script>
   document.getElementById("aguarde").innerHTML="Aguarde o fim do teste!";
   time=new Date();
   starttime=time.getTime();
      </script>
        <?
   /*
      AGORA &Eacute; TRANSFERIDA A STRING GERADA PARA O BROWSER DO USU&Aacute;RIO,
      LEMBRE-SE, ELA POSSUI 256 KBYTES E EST&Aacute; INCLU&Iacute;DO O C&Oacute;DIGO
      JAVASCRIPT PARA ATUALIZAR A BARRA DE PROGRESSO.
   */
?>
        <!-- <? echo $str ?> -->
        <?
   /*
      PRONTO! TRANSFER&Ecirc;NCIA CONCLU&Iacute;DA!

      AGORA ARMAZENA A HORA QUE CONCLUIU, CALCULA A TAXA DE 
      TRANSFER&Ecirc;NCIA E CHAMA O SCRIPT:

      grafico_desempenho.php

      PARA GERAR O RESULTADO...
   */
?>
        <script>
   time = new Date();
   endtime = time.getTime();
   if (endtime == starttime) {
      downloadtime = 0;
   } else {
      downloadtime = (endtime - starttime);
   }

   kbits = <?echo $tamanho?>*8;
   kbitssegundo = kbits/downloadtime;

   document.getElementById("aguarde").innerHTML="<a href=desempenho.php>Obtendo o Gr&aacute;fico</a>";
   document.getElementById("titulo").innerHTML="<font size='4' face='Arial'>* * Teste Desempenho Conclu&iacute;do * *</font>";
   document.getElementById("barraprogresso").innerHTML="";
   document.getElementById("barraprogresso").style.borderStyle="none";

   //AQUI &Eacute; DESENHADO O GR&Aacute;FICO DA VELOCIDADE...
   document.write("<align=center><img align=center src=grafico_desempenho.php?velocidade="+kbitssegundo+">");
   document.getElementById("aguarde").innerHTML="Rede: <?=$rede_x;?>";
      </script>
    </div></td>
  </tr>
  <tr>
    <td align="center" valign="top" bgcolor="#FFF8DC">
	  <table width="170" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td align="center"><img src="../imagens/px1.gif" width="1" height="6"></td>
          <td align="center"><img src="../imagens/px1.gif" width="1" height="6"></td>
          <td align="center"><img src="../imagens/px1.gif" width="1" height="6"></td>
        </tr>
        <tr>
          <td align="center"><a href=desempenho.php><img id="Image3" src="../imagens/start.PNG"  width="92"  height="22"  border="0"       /></a></td>
          <td align="center">&nbsp;</td>
          <td align="center"><a href="../avaleht.php?servletjs2=20$$20"  ><img id="Image3" src="../imagens/botaoazul33.PNG"  width="92"  height="22"  border="0"       /></a></td>
        </tr>
        <tr>
          <td align="center"><img src="../imagens/px1.gif" width="1" height="6"></td>
          <td align="center"><img src="../imagens/px1.gif" width="1" height="6"></td>
          <td align="center"><img src="../imagens/px1.gif" width="1" height="6"></td>
        </tr>
      </table>
	</td>
  </tr>
</table>
</div>
</body>
</html> 
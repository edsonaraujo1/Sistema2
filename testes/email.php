<?
$entrar = 's';
?>
<html>
  <head>
     <title>Teste de Email </title>
  </head> 

  <body bgcolor="#FFFFFF" text="#000000">

    <?if($entrar == 's') {  // Vamos montar o formulário de email  ?> 
      <form name="form" method="post" action="<?echo $PHP_SELF;?>?mandar=s">
         <table width="95%" border="0" cellspacing="2" cellpadding="0" align="center">
         <tr bgcolor="ebebeb">
             <td width="31%" height="30"><font face="Arial" size="2">Email do remetente:</font></td>
             <td width="69%" height="30"><font face="Arial" size="2">
             <input type="text" name="email_rem" maxlength="80" size="35"></font></td>
         </tr>

         <tr bgcolor="ebebeb">
           <td width="31%" height="30"><font face="Arial" size="2">Nome do destinat&aacute;rio:</font></td>
           <td width="69%" height="30"><font face="Arial" size="2">
           <input type="text" name="nome_dest" maxlength="60" size="25"></font></td>
         </tr>

         <tr bgcolor="ebebeb">
          <td width="31%" height="30"><font face="Arial" size="2">Email do destinat&aacute;rio:</font></td>
          <td width="69%" height="30"><font face="Arial" size="2">
          <input type="text" name="email_dest" maxlength="80" size="35"></font></td>
         </tr>

         <tr bgcolor="ebebeb">
           <td colspan="2" height="30">
           <div align="center"><font face="Arial" size="2">Mensagem</font></div></td>
         </tr>

         <tr bgcolor="ebebeb">
           <td colspan="2" height="30">
          <div align="center"><font face="Arial" size="2">
          <textarea name="mensagem" rows="3" cols="50"></textarea></font></div></td>
         </tr>

         <tr bgcolor="ebebeb">
           <td colspan="2" height="30"><div align="center">
           <input type="submit" name="enviar" value="Enviar email"></div></td>
         </tr>
       </table>
     </form>
 <?
  }  //fecha if entrar=s (fim do formulário) 
//Rotina que envia o email conforme os parâmetros informados
  if($mandar == 's')   { 

   $nome = "Para: <b>$nome_dest</b>,<br><br>";

  mail($email_dest,"Coluna PHP/MySQL - iMasters",$nome.$mensagem,"From:$email_rem Content-Type: text/html; charset=us-ascii");

  echo "<br><br><div align=center><font face=Arial size=2>E-mail enviado com SUCESSO!</font></div>";
  }
 ?>
</body>
</html>


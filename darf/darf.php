<?php
/*
 -----------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Acesso ao Sistema
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 -----------------------------------------
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"></meta>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
<link type="text/css" rel="stylesheet" href="../menu.css"/>
<style type="text/css" media="screen">
.style1 {	font-family: Arial;
	font-weight: bold;
	font-size: 18px;
}
.style3 {	color: <?=$color_bor;?>;
	font-size: 21px;
}
.style4 {font-size: 16px}
.style6 {font-family: Arial; font-weight: bold; font-size: 14px; }
.style7 {	font-size: 23px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
</style>
		
<script language="JavaScript"><!--

//document.onkeydown = keyCatcher;

function keyCatcher() 
{
   var e = event.srcElement.tagName;

   if (event.keyCode == 8 && e != "INPUT" && e != "TEXTAREA") 
   {
      event.cancelBubble = true;
      event.returnValue = false;
   }

}

</script>
		
<?php

include("../config.php");

include_once('../sql_injection.php');

// Resgata a Sessao
@session_start();
$nome3 = $_SESSION["nome_log"];
$servletjs2 = $_SESSION["servletjs2"];
$_SESSION["tela_2"] = 2;

if(!empty($nome3)){

	include("vaurls.php");
	
	$tabela_1 = strtoupper('tt_ser_01');
	
	$deixar = acesso_url("FORM_SENHAS");
	
	if ($deixar == "SIM"){
	
		include_once('../senha/java2_js.php');
		
		include('../menu_sub2.php');

        include('../conexao.php');
			
		$hostname_conn = $host;
		$database_conn = $db;
		$username_conn = $user;
		$password_conn = $pass;
		
		// Conectamos ao nosso servidor MySQL
		if(!($conn = mysql_connect($hostname_conn,$username_conn,$password_conn))) 
		{
		   echo "Erro ao conectar ao MySQL.";
		   exit;
		}
		// Selecionamos nossa base de dados MySQL
		if(!($con = mysql_select_db($database_conn,$conn))) 
		{
		   echo "Erro ao selecionar ao MySQL.";
		   exit;
		}
		
		$con = mysql_connect($hostname_conn,$username_conn,$password_conn);
		$bd  = mysql_select_db($database_conn);
		
		
		$query_Recordset1 = "SELECT usuario FROM useronline";
		$Recordset1 = @mysql_query($query_Recordset1, $con); // or die(mysql_error());
		$row_Recordset1 = @mysql_fetch_assoc($Recordset1);
		$totalRows_Recordset1 = @mysql_num_rows($Recordset1);
 	
		// Tabela de Permissão
		$consulta3 = "SELECT * FROM permissoes WHERE login = '$nome3' and tabela = '$tabela_1'";
				
		$resultado3 = @mysql_query($consulta3);
				
		$row3 = @mysql_fetch_array($resultado3);
				
		$per1       = @$row3["incluir"];
		$per2       = @$row3["alterar"];
		$per3       = @$row3["excluir"];
		$per4       = @$row3["imprimir"];
	 
	    // inclui menu no cadastro
	    //include('../menu_sub2.php');
        $menssagens = " ";
		?>
		<body background="../<?php echo $logo_sis ?>" style=" margin-left: 0px;  margin-top: 3px;  margin-right: 0px;  margin-bottom: 0px; " onkeydown="javascript:if (event.KeyCode==13) event.KeyCode=9; javascript:document.onkeydown = keyCatcher();" onload="document.form1.campo1x.focus();">
		<div align="center">
        <form style="margin-bottom: 0" id="form1" name="form1" method="post"  action="printer_darf.php" target="new">

		  <table width="750" height="202" border="15" align="center" cellspacing="0" bordercolor="<?=$color_bor;?>" bgcolor="#FFFFFF">
            <tr>
              <td valign="top"><div align="center">
                  <table width="100%" border="1" cellspacing="0" bordercolor="<?=$color_bor;?>">
                    <tr>
                      <td height="45" valign="top"><div align="left">
                          <table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                              <td height="41"><img src="../imagens/px1.gif" width="9" height="8" /><b><font color="#5A9CB1" size="5" face="Verdana">Preenchimento - DARF<font size="3">(Comum)</font></font></b></td>
                            </tr>
                          </table>
                      </div></td>
                    </tr>
                    <tr>
                      <td height="426" align="center" valign="top"><table width="100%" border="0">
                          <tr>
                            <td width="35%"><div align="left"><span class="style6">Nome ou raz&atilde;o social : </span></div></td>
                            <td width="65%"><div align="left">
                                <input type="text" name="Edit1" value="<?=$Edit1;?>" maxlength="85" onfocus="this.className='anormal'; nextfield ='Edit2';" onblur="this.className='normal'"   style=" font-family: Verdana; font-size: 14px;  height:25px;width:356px;"/>
                      (obrigat&oacute;rio)</div></td>
                          </tr>
                          <tr>
                            <td><div align="left"><span class="style6">Telefone: </span></div></td>
                            <td><div align="left">
                                <input type="text" name="Edit2" value="<?=$Edit2;?>" maxlength="85" onfocus="this.className='anormal'; nextfield ='Edit3';" onblur="this.className='normal'"  style=" font-family: Verdana; font-size: 14px;  height:25px;width:190px;" />
                      (n&atilde;o obrigat&oacute;rio)</div></td>
                          </tr>
                          <tr>
                            <td><div align="left"><span class="style6">Periodo de apura&ccedil;&atilde;o .: </span></div></td>
                            <td>
                              <div align="left">
                                <input name="Edit3" type="text" value="<?=$Edit3;?>" size="13" onfocus="this.className='anormal'; nextfield ='Edit4';" onblur="this.className='normal'"   onkeypress="return txtBoxFormat(document.form1, 'Edit3', '99/99/9999', event);"/>
                      (obrigat&oacute;rio)</div></td>
                          </tr>
                          <tr>
                            <td align="left"><div align="left"><span class="style6">N&uacute;mero do CPF ou CNPJ .:</span></div></td>
                            <td align="left"><div align="left"> </div>
                                <div align="left">
                                  <input type="text" name="Edit4" value="<?=$Edit4;?>" onfocus="this.className='anormal'; nextfield ='Edit5';" onblur="this.className='normal'" />
                      (obrigat&oacute;rio)</div></td>
                          </tr>
                          <tr>
                            <td align="left"><span class="style6">C&oacute;digo da receita .:</span></td>
                            <td align="left">
                              <input name="Edit5" type="text" value="<?=$Edit5;?>" onfocus="this.className='anormal'; nextfield ='Edit6';" onblur="this.className='normal'"  style=" font-family: Verdana; font-size: 14px;  height:25px;width:56px;" />
                              <a href="http://www.receita.fazenda.gov.br/Aplicacoes/ATSPO/CodigoReceita/default.asp" target="new"><img src="../imagens/lupa.PNG" width="17" height="18" border="0" /></a> (consultar receita) </td>
                          </tr>
                          <tr>
                            <td align="left"><span class="style6">N&uacute;mero de referencia.: </span></td>
                            <td align="left"><input type="text" name="Edit6" value="<?=$Edit6;?>" onfocus="this.className='anormal'; nextfield ='Edit7';" onblur="this.className='normal'" />
                    (n&atilde;o obrigat&oacute;rio) </td>
                          </tr>
                          <tr>
                            <td height="24" align="left"><span class="style6">Data de Vencimento.:</span></td>
                            <td align="left"><input type="text" name="Edit7" value="<?=$Edit7;?>" onfocus="this.className='anormal'; nextfield ='Edit7';" onblur="this.className='normal'"   onkeypress="return txtBoxFormat(document.form1, 'Edit7', '99/99/9999', event);" />
                    (obrigat&oacute;rio)</td>
                          </tr>
                          <tr>
                            <td align="left"><span class="style6">Valor do principal .:</span></td>
                            <td align="left"><input type="text" name="Edit8" value="<?=$Edit8;?>" onfocus="this.className='anormal'; nextfield ='Edit9';" onblur="this.className='normal'" />
                    (obrigat&oacute;rio)</td>
                          </tr>
                          <tr>
                            <td align="left"><span class="style6">Valor da multa .:</span></td>
                            <td align="left"><input type="text" name="Edit9" value="<?=$Edit9;?>" onfocus="this.className='anormal'; nextfield ='Edit10';" onblur="this.className='normal'" />
                    (n&atilde;o obrigat&oacute;rio)</td>
                          </tr>
                          <tr>
                            <td align="left"><span class="style6">Valor do juros e/ou encargos .:</span></td>
                            <td align="left"><input type="text" name="Edit10" value="<?=$Edit10;?>" onfocus="this.className='anormal'; nextfield ='Edit11';" onblur="this.className='normal'" />
                    (n&atilde;o obrigat&oacute;rio)</td>
                          </tr>
                        </table>
                          <table width="100%" border="0">
                            <tr>
                              <td><div align="left"><span class="style6">Destinatario.:</span></div></td>
                            </tr>
                            <tr>
                              <td>                                <div align="left">
                                <input name="Edit11" type="text" value="<?=$Edit11;?>" size="95" onfocus="this.className='anormal'; nextfield ='Edit12';" onblur="this.className='normal'" />
                              </div></td>
                            </tr>
                            <tr>
                              <td><div align="left"><span class="style6">Observa&ccedil;&otilde;es.:</span></div></td>
                              <input name="Edit15" type="hidden" value="<?=$texto_1;?>" onfocus="this.className='anormal'; nextfield ='Edit16';" onblur="this.className='normal'" />
                            </tr>
                            <tr>
                              <td>                                <div align="left">
                                <input name="Edit12" type="text" value="<?=$Edit12;?>" size="95" onfocus="this.className='anormal'; nextfield ='Edit13';" onblur="this.className='normal'" />
                              </div></td>
                            </tr>
                          </table>
                          <br/>
                          <input type="image" name="guias" src="../imagens/botaoazul23.PNG" width="92" height="22"/>
                          <img src="../imagens/px1.gif" width="10" height="1"/> <a href='../menu_1.php'><img src="../imagens/botaoazul33.PNG" width="92" height="22" border="0" /></a><br />
                      <img src="../imagens/px1.gif" width="10" height="12"/></td>
                    </tr>
                  </table>
              </div></td>
            </tr>
          </table>
        </form>
		<div align="center"><a href="<?php echo $website ?>" class='linkmenu2' ><b>Web Site</b></a></div><br>
		</div>
		<script> window.focus();</script>
		</body>
		<script> window.focus();</script>
        <script type="text/javascrip">document.form1.campo1x.focus(); </script>

	<?php
	
	}else{
		
	include("enaaurlnp.php");
		
	}


}else{
	include("../login2.php");
	//exit;
}
?>	
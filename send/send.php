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
        <form style="margin-bottom: 0" id="form1" name="form1" method="post"  action="salva_send.php">

		  <table width="473" border="16" bordercolor="#5A9CB1" bgcolor="#FFFFFF">
            <tr>
              <td><div align="center">
                  <table width="99%" border="0">
                    <tr>
                      <td width="82%" height="42"><div align="left"><b><font size="5" face="Verdana" color="#5A9CB1"><img src="../imagens/px1.gif" width="10" height="10" />Enviar Mensagem</font></b></div></td>
                      <td width="18%"><div align="center"><b><font size="2" face="Verdana">
                          <?php echo $menssagens ?>
                      </font></b></div></td>
                    </tr>
                  </table>
              </div></td>
            </tr>
            <tr>
              <td valign="top">
                <div align="center">
                  <table width="75%" border="0">
                    <tr>
                      <td><div align="center">
                          <table width="100%" border="0" cellpadding="0">
                            <tr>
                              <td width="23%"><div align="right"><b><font size="2" face="Verdana">Usuario.:</font></b></div></td>
                              <td width="77%"><select name="Edit1" type="text" id="Edit1" style=" font-family: Verdana; font-size: 14px;  height:23px;width:296px;  " onfocus="this.className='anormal'"  onblur="this.className='normal'" value="" />

								<option value="Todos">Todos</option>
								
								<?
								Do {  
								?>
									  <option value="<?php echo $row_Recordset1['usuario']?>"><?php echo $row_Recordset1['usuario']?></option>
								<?
								}
								while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
									  $rows = mysql_num_rows($Recordset1);
									  if($rows > 0) {
										 mysql_data_seek($Recordset1, 0);
										 $row_Recordset1 = mysql_fetch_assoc($Recordset1);
									  }
								?>
								</select>


                              </td>
                            </tr>
                            <tr>
                              <td><div align="right"><b><font size="2" face="Verdana">Mensagem.:</font></b></div></td>
                              <td>&nbsp;</td>
                            </tr>
                          </table>
                          <table width="85%" border="0" cellpadding="0">
                            <tr>
                              <td width="19%" valign="top"><div align="center"><b>
                                  <textarea name="Edit2" cols="10" rows="10" id="Edit2" style=" font-family: Verdana; font-size: 14px;  width:400px;  " onfocus="this.className='anormal'"  onblur="this.className='normal'" ></textarea>
                              </b></div></td>
                            </tr>
                          </table>
                      </div></td>
                    </tr>
                  </table>
                  <img src="../imagens/px1.gif" width="10" height="4" />
                  <table width="417" border="0">
                    <tr>
                      <td width="15"><img src="../imagens/px1.gif" width="15" height="8" /></td>
                      <td width="460"><div align="center">
                          <!-- Inicio do Botoes de chamada -->
                          <table width="242" border="0">
                            <tr>
                              <td width="313"><div align="center">
                               <input type=image name="guias" src="../imagens/botaoazul_enviar.PNG" width="92" height="22" border="0" />
                               </div></td>
                              <td width="263"><div align="center"><a href="../menu_1.php" ><img src="../imagens/botaoazul25.PNG" width="92" height="22" border="0" /></a></div></td>
                            </tr>
                          </table>
                          <!--  Fim dos Botoes de chamada -->
                      </div></td>
                      <td width="27" valign="bottom"><img src="../imagens/vacina.JPG" width="27" height="38" /></td>
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
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
<style type="text/css" media="screen"></style>
		
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

        $get_pes = $_GET['id_up_ar'];
        $consulta = "SELECT * FROM cracha WHERE id = '$get_pes' ORDER BY id ASC LIMIT 0,1";

        $resultado = @mysql_query($consulta);
			
		$row = @mysql_fetch_array($resultado);
			
		$id             = @$row["id"];
		$id_1           = @$row["id"];
		$matricula      = @$row["id"];
		$campo1  	    = @$row["nome_guera"];
		$campo2   		= @$row["nome"];

 	
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
        <form method="post" action="subir.php?id_up_fim=<?php echo $id_1 ?>" enctype="multipart/form-data">


		  <table width="473" border="16" bordercolor="#5A9CB1" bgcolor="#FFFFFF">
            <tr>
              <td><div align="center">
                  <table width="99%" border="0">
                    <tr>
                      <td width="82%" height="42"><div align="left"><b><font size="5" face="Verdana" color="#5A9CB1"><img src="../imagens/px1.gif" width="10" height="10" />Incluir Foto(cracha)</font></b></div></td>
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
                      <td><div align="center"><b><font color="#0033FF"><?php echo $campo2 ?></font></b></div></td>
                    </tr>
                    <tr>
                      <td><div align="center">


				  
                          <div align="center">
                              <strong><font color="#FFFFFF" size="2" face="Verdana">Imagem: </font>
                              </strong>
                              
                              
                             

                              <input name="file" type="file" size="50" style=" font-family: Verdana; font-size: 14px;  height:25px;width:293px; background-color: #CCCCCC;" />
                              <br /><br />
                              <input type="submit" id='x' value=" Enviar Arquivo " />
                             
							  
                          </div>




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
                              <td width="10"><div align="center">
                               </div></td>
                              <td width="222"><div align="center"><a href="cadastro.php?Cod_xxx=<?php echo $id ?>" ><img src="../imagens/botaoazul25.PNG" width="92" height="22" border="0" /></a></div></td>
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
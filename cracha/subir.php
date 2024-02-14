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

		// Abre Conexão com o MySql
		include("../conexao.php");
		// Chama o Banco de Dados
		$link = @mysql_connect($host,$user,$pass);
				
		@mysql_select_db($db);

        $get_pes = $_GET['id_up_fim'];
        
        $consulta = "SELECT * FROM cracha WHERE id = $get_pes ORDER BY id ASC LIMIT 0,1";

        $resultado = @mysql_query($consulta);
			
		$row = @mysql_fetch_array($resultado);
			
		$id             = @$row["id"];
		$id_1           = @$row["id"];
		$matricula      = @$row["id"];
		$campo1  	    = @$row["nome_guera"];
		$campo2   		= @$row["nome"];
        $campo3         = trim(@$row["url_foto"]);

 	
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
        <form method="post" action="subir.php?id_up_fim=<?=$id_up;?>" enctype="multipart/form-data">


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


				  
	  
	<table width="300" border="0">
	
            <tr>
              <td width="294" valign="top">
                  <div align="center">
                    <p>
					  
					  <?php
					
					// Pasta onde o arquivo vai ser salvo
					$_UP['pasta'] = 'fotos/';
					
					// Tamanho máximo do arquivo (em Bytes)
					$_UP['tamanho'] = 1024 * 1024 * 2; // 2Mb
					
					// Array com as extensões permitidas
					$_UP['extensoes'] = array('jpg', 'png', 'gif', 'bmp');
					
					// Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e um nome único)
					$_UP['renomeia'] = false;
					
					// Array com os tipos de erros de upload do PHP
					$_UP['erros'][0] = 'Não houve erro';
					$_UP['erros'][1] = 'O arquivo no upload é maior do que o limite';
					$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
					$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
					$_UP['erros'][4] = 'Não foi feito o upload do arquivo';
					
					// Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
					if ($_FILES['file']['error'] != 0) {
						
					echo "<strong><font color='#FFCC00' size='3' face='Verdana'>Não foi possível fazer o upload erro: </br>". $_UP['erros'][$_FILES['file']['error']] . "</font>";
					 // Para a execução do script

					?>
					<br />
					    <strong><font color="#FFCC00" size="3" face="Verdana">O arquivo enviado é muito grande, envie arquivos de até 2Mb.</font><br />
					    <?
                     //return;
					}
					
					// Caso script chegue a esse ponto, não houve erro com o upload e o PHP pode continuar
					
					// Faz a verificação da extensão do arquivo
					$extensao = strtolower(end(explode('.', $_FILES['file']['name'])));
					if (array_search($extensao, $_UP['extensoes']) === false) {
					?>
					    <strong><font color="#FFCC00" size="3" face="Verdana">Por favor, envie arquivos com as seguintes extensões: jpg, png, gif<br /> 
					    </font>

                        <br />
                        
					    <?
					}
					
					// Faz a verificação do tamanho do arquivo
					else if ($_UP['tamanho'] < $_FILES['file']['size']) {
					?>
					    <strong><font color="#FFCC00" size="3" face="Verdana">O arquivo enviado é muito grande, envie arquivos de até 2Mb.</font><br />
					    <br />
					    
					    <?
					}
					
					// O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
					else {
					// Primeiro verifica se deve trocar o nome do arquivo
					if ($_UP['renomeia'] == true) {
					// Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
					$nome_final = $id_up_2.time().'.arq';
					} else {
					// Mantém o nome original do arquivo
					$nome_final = $id_1.$_FILES['file']['name'];
					//$nome_novo_up = $campo3.$nome_final.',';
					$nome_novo_up = $nome_final.',';
					}
					
					// Depois verifica se é possível mover o arquivo para a pasta escolhida
					if (move_uploaded_file($_FILES['file']['tmp_name'], $_UP['pasta'] . $nome_final)) {
					// Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
					?>
                    </p>
                    <p>
					    <center><font color="#000000" size="3" face="Verdana"><b>* Upload de Arquivos * </b></font></center><br />
                          Upload efetuado com sucesso!<br /><br>
                          Nome do Arquivo: <font color="#0000CC"><b><?=$nome_final;?></b></font>
                          <br />
                          
    
					
					      <?
						  	//query string
							$query_2 = "UPDATE cracha SET url_foto = '$nome_novo_up' WHERE id = $id_1";
						
						    //store query results in a new variable
							$result_2 = @mysql_query($query_2) or die ("Erro na query: $query. " .mysql_error());
						

			  
										
					} else {
					// Não foi possível fazer o upload, provavelmente a pasta está incorreta
					?>
					      <strong><font color="#FFCC00" size="3" face="Verdana">Não foi possível enviar o arquivo, tente novamente<br />
					      <br />
					      </font>
					      <?
					}
					
					}
					
					?>
					    
					
                        
                          </font></strong>
                    </p>
                  </div>
			    </td></tr>
	
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
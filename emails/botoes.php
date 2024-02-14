<?php
/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Botoes de eventos
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------
*/

// Resgata Secao
session_start();
$id1  = $_SESSION['navega'];
$Edif = $_SESSION['lista_soc'];


if (!empty($Acao)){
	// OK
}else{
	$Acao = $Edit1; 
}
?>

                <table width="590" border="0">
                  <tr>
                    <td width="92"><div align="center"><img src="../imagens/botaoazul01.PNG" width="92" height="22" border="0"></div></td>
                    <td width="92"><div align="center"><a href="lis_grid.php?Cod_2=<?php echo $Acao ?>"  ><img src="../imagens/botaoazul3.PNG" width="92" height="22" border="0"></a></div></td>

                    <td width="92"><div align="center">
					
					<?php
					if ($per3 == "SIM"){
					?>
					
						<a href="excluir.php?Cod_2=<?php echo $id1 ?>">
						<img src="../imagens/botaoazul4.PNG" width="92" height="22" border="0"></a>
					<?php
					}else{
					?>
					
						<img src="../imagens/botaoazul01.PNG" width="92" height="22" border="0">
					
					<?php
					}
					?>
					</div></td>
                    <td width="92"><div align="center">

					<?php
					if ($per2 == "SIM"){
					?>
					
					<a href="alterar.php?Cod_2=<?php echo $id1 ?>">
					<img src="../imagens/botaoazul5.PNG" width="92" height="22" border="0"></a>
                       
					<?php
					}else{
					?>
					
						<img src="../imagens/botaoazul01.PNG" width="92" height="22" border="0">
					
					<?php
					}
					?>	
					
					</div></td>
                    <td width="92"><div align="center">

					<?php
					if ($per1 == "SIM"){
					?>
					
					<a href="incluir.php?edi1=<?php echo $edi1 ?>">
					<img src="../imagens/botaoazul6.PNG" width="92" height="22" border="0"></a>

					<?php
					}else{
					?>

						<img src="../imagens/botaoazul01.PNG" width="92" height="22" border="0">
					
					<?php	
					}
					?>
										
					</div></td>
                    <td width="200"><div align="center"><a href="consulta.php"  ><img src="../imagens/botaoazul7.PNG" width="92" height="22" border="0"></a></div></td>
                  </tr>
                  <tr>
                    <td><div align="center">
                        <table width="89" border="0" cellpadding="1" cellspacing="0">
                          <tr>
                            <td width="39"><a href="Javascript:Inicio(<?php echo $Edit1 ?>);" ><img src="../imagens/inicio.PNG" width="39" height="32" border="0"></a></td>
                            <td width="94"><a href="Javascript:Anterior(<?php echo $id1-1 ?>);"  ><img src="../imagens/anterior.PNG" width="39" height="32" border="0"></a></td>
                          </tr>
                        </table>
                    </div></td>
                    <td><div align="center">
                        <table width="76" border="0" cellpadding="1" cellspacing="0">
                          <tr>
                            <td width="40"><a href="Javascript:Proximo(<?php echo $id1+1 ?>);" ><img src="../imagens/proximo.PNG" width="40" height="32" border="0"></a></td>
                            <td width="26"><a href="Javascript:Fim(<?php echo $id1 ?>)"><img src="../imagens/fim.PNG" width="39" height="32" border="0"></a></td>
                          </tr>
                        </table>
                    </div></td>
                    <td><div align="center"><a href="<?php echo $path ?>ts2.php" target="new" ><img src="../imagens/botaoazul01.PNG" width="92" height="22" border="0"></a></div></td>
                    <td><div align="center"><a href="<?php echo $path ?>ts2.php" target="new" ><img src="../imagens/botaoazul01.PNG" width="92" height="22" border="0"></a></div></td>
                    <td><div align="center"><a href="<?php echo $path ?>ts2.php" target="new" ><img src="../imagens/botaoazul01.PNG" width="92" height="22" border="0"></a></div></td>
                    <td><div align="center"><a href="<?php echo $path ?>avaleht.php?servletjs2=20$$20"  ><img src="../imagens/botaoazul24.PNG" width="92" height="22" border="0"></a></div></td>
                  </tr>
                </table>


<script>
function janelaSecundaria3 (URL){ 
   window.open(URL,"janela3","width=560,height=390,resizable=NO,status=NO,Scrollbars=NO,location=NO,menubar=NO,toolbar=NO"); 
} 

function janelaSecundaria6 (URL){ 
   window.open(URL,"janela6","width=770,height=490,resizable=NO,status=NO,Scrollbars=NO,location=NO,menubar=NO,toolbar=NO"); 
} 

</script>

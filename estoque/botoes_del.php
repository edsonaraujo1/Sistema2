<?php
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Botoes Incluir Cadastro 
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 21/01/2009 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/
?>


<table width="194" border="0" align="left">
                  <tr>
                    <td width="288"><div align="left">
					
          <form type="hidden" method="POST" action="delete.php?Cod_2=<?php echo $id ?>">
          <td><input type=image name="Deletar" src="../imagens/botaoazul4.PNG"></td>
          </form>
          </div>
					</td>
                    <td width="92"><div align="center">
					
          <form method="POST" action="cadastro.php?Cod_xx=<?php echo $id_navega ?>">
          <td><input type=image name="Descartar" src="../imagens/botaoazul9.PNG"></td>
          </form>
		          </div>
			
					</td>
                    </tr>
                </table>


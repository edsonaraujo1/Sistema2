<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Botoes Update Cadastro 
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 21/01/2009 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/
?>

<div style="Z-INDEX: 34; LEFT: 185px; WIDTH: 544px; POSITION: absolute; TOP: 275px; HEIGHT: 80px">
<table border="0">
          <td> </td>
          <form method="POST" action="update.php?Cod_P=<?=$id;?>">
          <td><input type=image name="Incluir" src="../imagens/botaoazul10.PNG"></td>
          </form>

          <form method="POST" action="cadastro.php?cod_5=<?=$id;?>">
          <td><input type=image name="Descartar" src="../imagens/botaoazul9.PNG"></td>
          </form>

</table>
</div>

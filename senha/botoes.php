<?
/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Cadastro de Adms
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------
*/

// Resgata a Sessao
@session_start();
$login_2 = $_SESSION['var_w1'];

?>

<div style="Z-INDEX: 34; LEFT: 215px; WIDTH: 244px; POSITION: absolute; TOP: 453px; HEIGHT: 70px">


<table border='0' colspan="2" >
<tr>
<td colspan="2">

<div id="Image3_container" style=" width: 92;  height: 22; overflow: hidden;" ><a href="../senha_2/mostra_grid.php?var_w1=<?=$login_2;?>"  ><img id="Image3" src="../imagens/botaoazul46.PNG"  width="92"  height="22"  border="0"/></a></div>

</td>


<?
if (!empty($Acao)){
	// OK
}else{
	$Acao = $id; 
}

?>

<td colspan="2">
<div id="Image3_container" style=" width: 92;  height: 22; overflow: hidden;" ><a href="senhalis_grid.php?Cod_2=<?=$Acao;?>"  ><img id="Image3" src="../imagens/botaoazul3.PNG"  width="92"  height="22"  border="0"       /></a></div>

</td>
<td>

<div id="Image3_container" style=" width: 92;  height: 22; overflow: hidden;" ><a href="senhaexcluir.php?Cod_2=<?=$login;?>"  ><img id="Image3" src="../imagens/botaoazul4.PNG"  width="92"  height="22"  border="0"       /></a></div>


</td>

<td>

<div id="Image3_container" style=" width: 92;  height: 22; overflow: hidden;" ><a href="senhaalterar.php?Cod_2=<?=$login;?>"  ><img id="Image3" src="../imagens/botaoazul5.PNG"  width="92"  height="22"  border="0"       /></a></div>


</td>

<td>

<div id="Image3_container" style=" width: 92;  height: 22; overflow: hidden;" ><a href="senhaincluir.php"  ><img id="Image3" src="../imagens/botaoazul6.PNG"  width="92"  height="22"  border="0"       /></a></div>

</td>

<td>

<div id="Image3_container" style=" width: 92;  height: 22; overflow: hidden;" ><a href="senhaconsulta.php"  ><img id="Image3" src="../imagens/botaoazul7.PNG"  width="92"  height="22"  border="0"       /></a></div>

</td>

</tr>

<tr>
<td colspan="1" align="right">

<div id="Image13_container" style=" width: 39;  height: 32; overflow: hidden;" ><a href="cadsenha.php?Cod_inicio=<?=$Edit1;?>" ><img id="Image13" src="../imagens/inicio.PNG"  width="39"  height="32"  border="0"       /></a></div>

</td>

<td align="left">

<div id="Image13_container" style=" width: 39;  height: 32; overflow: hidden;" ><a href="cadsenha.php?Cod_Anterior=<?=$id-1;?>"  ><img id="Image13" src="../imagens/anterior.PNG"  width="39"  height="32"  border="0"       /></a></div>

</td>

<td colspan="1" align="right">

<div id="Image13_container" style=" width: 39;  height: 32; overflow: hidden;" ><a href="cadsenha.php?Cod_Proximo=<?=$id+0;?>" ><img id="Image13" src="../imagens/proximo.PNG"  width="39"  height="32"  border="0"       /></a></div>

</td>

<td align="left">

<div id="Image13_container" style=" width: 39;  height: 32; overflow: hidden;" ><a href="cadsenha.php?Cod_fim=<?=$id;?>"  ><img id="Image13" src="../imagens/fim.PNG"  width="39"  height="32"  border="0"       /></a></div>


<td>

<div id="Image3_container" style=" width: 92;  height: 22; overflow: hidden;" ><a href="<?=$path;?>ts2.php" target="new" ><img id="Image3" src="../imagens/botaoazul01.PNG"  width="92"  height="22"  border="0"       /></a></div>

</td>


<td>

<div id="Image3_container" style=" width: 92;  height: 22; overflow: hidden;" ><a href="<?=$path;?>ts2.php" target="new" ><img id="Image3" src="../imagens/botaoazul01.PNG"  width="92"  height="22"  border="0"       /></a></div>

</td>

<td>

<div id="Image3_container" style=" width: 92;  height: 22; overflow: hidden;" ><a href="<?=$path;?>ts2.php" target="new" ><img id="Image3" src="../imagens/botaoazul01.PNG"  width="92"  height="22"  border="0"       /></a></div>

</td>

<td>

<div id="Image3_container" style=" width: 92;  height: 22; overflow: hidden;" ><a href="<?=$path;?>avaleht.php?servletjs2=20$$20"  ><img id="Image3" src="../imagens/botaoazul24.PNG"  width="92"  height="22"  border="0"       /></a></div>

</td>

</td>


</tr>


</table>

</div>

<div style="Z-INDEX: 34; LEFT: 470px; WIDTH: 300px; POSITION: absolute; TOP: 544px; HEIGHT: 10px">
<table>
<td Align="center"><a href=<?=$website;?> target="new"><u><b>Web Site</b></u></a></td>
</table> 
</div>

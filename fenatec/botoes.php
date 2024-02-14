<?
/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Cadastro de Fenatec
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------
*/
?>

<div style="Z-INDEX: 34; LEFT: 215px; WIDTH: 544px; POSITION: absolute; TOP: 378px; HEIGHT: 80px">


<table border='0' colspan="2" >
<tr>
<td colspan="2">

<div id="Image3_container" style=" width: 92;  height: 22; overflow: hidden;" ><a href="<?=$path;?>ts2.php" target="new" ><img id="Image3" src="../imagens/botaoazul01.PNG"  width="92"  height="22"  border="0"/></a></div>

</td>


<?

if (!empty($Acao)){
	// OK
}else{
	$Acao = $Edit1; 
}

?>

<td colspan="2">

<div id="Image3_container" style=" width: 92;  height: 22; overflow: hidden;" ><a href="fenalis_grid.php?Cod_2=<?=$Acao;?>"  ><img id="Image3" src="../imagens/botaoazul3.PNG"  width="92"  height="22"  border="0"       /></a></div>

</td>


<td>

<?
if ($adm3 == "SIM"){
?>

<div id="Image3_container" style=" width: 92;  height: 22; overflow: hidden;" ><a href="fenaexcluir.php?Cod_2=<?=$Edit1;?>"  ><img id="Image3" src="../imagens/botaoazul4.PNG"  width="92"  height="22"  border="0"       /></a></div>

<?
}
?>

</td>

<td>
<?
if ($adm2 == "SIM"){
?>

<div id="Image3_container" style=" width: 92;  height: 22; overflow: hidden;" ><a href="fenaalterar.php?Cod_2=<?=$Edit1;?>"  ><img id="Image3" src="../imagens/botaoazul5.PNG"  width="92"  height="22"  border="0"       /></a></div>

<?
}
?>

</td>

<td>

<?
if ($adm1 == "SIM"){
?>

<div id="Image3_container" style=" width: 92;  height: 22; overflow: hidden;" ><a href="fenaincluir.php?adm1=<?=$adm1;?>"  ><img id="Image3" src="../imagens/botaoazul6.PNG"  width="92"  height="22"  border="0"       /></a></div>

<?
}
?>

</td>

<td>

<div id="Image3_container" style=" width: 92;  height: 22; overflow: hidden;" ><a href="fenaconsulta.php"  ><img id="Image3" src="../imagens/botaoazul7.PNG"  width="92"  height="22"  border="0"       /></a></div>

</td>


</tr>

<tr>
<td colspan="1" align="right">

<div id="Image13_container" style=" width: 39;  height: 32; overflow: hidden;" ><a href="cadfenatec.php?Cod_inicio=<?=$Edit1;?>" ><img id="Image13" src="../imagens/inicio.PNG"  width="39"  height="32"  border="0"       /></a></div>

</td>

<td align="left">

<div id="Image13_container" style=" width: 39;  height: 32; overflow: hidden;" ><a href="cadfenatec.php?Cod_Anterior=<?=$Edit1-1;?>"  ><img id="Image13" src="../imagens/anterior.PNG"  width="39"  height="32"  border="0"       /></a></div>


</td>


<td colspan="1" align="right">

<div id="Image13_container" style=" width: 39;  height: 32; overflow: hidden;" ><a href="cadfenatec.php?Cod_Proximo=<?=$Edit1+0;?>" ><img id="Image13" src="../imagens/proximo.PNG"  width="39"  height="32"  border="0"       /></a></div>

</td>

<td align="left">

<div id="Image13_container" style=" width: 39;  height: 32; overflow: hidden;" ><a href="cadfenatec.php?Cod_fim=<?=$Edit1;?>"  ><img id="Image13" src="../imagens/fim.PNG"  width="39"  height="32"  border="0"       /></a></div>


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

<div style="Z-INDEX: 34; LEFT: 470px; WIDTH: 544px; POSITION: absolute; TOP: 460px; HEIGHT: 80px">
<table>
<td Align="center"><a href=<?=$website;?> target="new"><u><b>Web Site</b></u></a></td> 
</table>
</div>

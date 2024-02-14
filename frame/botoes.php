<?
/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Botoes de eventos
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------
*/

?>

<div style="Z-INDEX: 34; LEFT: 80px; WIDTH: 0px; POSITION: absolute; TOP: 440px; HEIGHT: 0px">
<table border='0' colspan="2" >
<tr>
<td colspan="2">
<div id="Image3_container" style=" width: 92;  height: 22; overflow: hidden;" ><a href="javascript:janelaSecundaria3('<?=$path;?>ts2.php')"><img id="Image3" src="../imagens/botaoazul01.PNG"  width="92"  height="22"  border="0"/></a></div>
</td>
<?
if (!empty($Acao)){
	// OK
}else{
	$Acao = $Edit1; 
}
?>
<td colspan="2">
<div id="Image3_container" style=" width: 92;  height: 22; overflow: hidden;" ><a href="lis_grid.php?Cod_2=<?=$Acao;?>"  ><img id="Image3" src="../imagens/botaoazul3.PNG"  width="92"  height="22"  border="0"       /></a></div>
</td><td>
<?
if ($opo3 == "SIM"){
   ?>
   <div id="Image3_container" style=" width: 92;  height: 22; overflow: hidden;" ><a href="excluir.php?Cod_2=<?=$id1;?>"  ><img id="Image3" src="../imagens/botaoazul4.PNG"  width="92"  height="22"  border="0"       /></a></div>
   <?
}
?>
</td>
<td>
<?
if ($opo2 == "SIM"){
   ?>
   <div id="Image3_container" style=" width: 92;  height: 22; overflow: hidden;" ><a href="alterar.php?Cod_2=<?=$id1;?>"  ><img id="Image3" src="../imagens/botaoazul5.PNG"  width="92"  height="22"  border="0"       /></a></div>
   <?
}
?>
</td>
<td>
<?
if ($opo1 == "SIM"){
   ?>
   <div id="Image3_container" style=" width: 92;  height: 22; overflow: hidden;" ><a href="incluir.php?edi1=<?=$edi1;?>"  ><img id="Image3" src="../imagens/botaoazul6.PNG"  width="92"  height="22"  border="0"       /></a></div>
   <?
}
?>
</td><td>
<div id="Image3_container" style=" width: 92;  height: 22; overflow: hidden;" ><a href="consulta.php"  ><img id="Image3" src="../imagens/botaoazul7.PNG"  width="92"  height="22"  border="0"       /></a></div>
</td></tr><tr>
<td colspan="1" align="right">
<div id="Image13_container" style=" width: 39;  height: 32; overflow: hidden;" ><a href="Javascript:Inicio(<?=$Edit1;?>);" ><img id="Image13" src="../imagens/inicio.PNG"  width="39"  height="32"  border="0"       /></a></div>
</td>
<td align="left">
<div id="Image13_container" style=" width: 39;  height: 32; overflow: hidden;" ><a href="Javascript:Anterior(<?=$id1-1;?>);"  ><img id="Image13" src="../imagens/anterior.PNG"  width="39"  height="32"  border="0"       /></a></div>
</td>
<td colspan="1" align="right">
<div id="Image13_container" style=" width: 39;  height: 32; overflow: hidden;" ><a href="Javascript:Proximo(<?=$id1+1;?>);" ><img id="Image13" src="../imagens/proximo.PNG"  width="39"  height="32"  border="0"       /></a></div>
</td>
<td align="left">
<div id="Image13_container" style=" width: 39;  height: 32; overflow: hidden;" ><a href="Javascript:Fim(<?=$id1;?>)"><img id="Image13" src="../imagens/fim.PNG"  width="39"  height="32"  border="0"       /></a></div>
<td>
<div id="Image3_container" style=" width: 92;  height: 22; overflow: hidden;" ><a href="javascript:janelaSecundaria3('<?=$path;?>ts2.php')"><img id="Image3" src="../imagens/botaoazul01.PNG"  width="92"  height="22"  border="0"       /></a></div>
</td><td>
<div id="Image3_container" style=" width: 92;  height: 22; overflow: hidden;" ><a href="javascript:janelaSecundaria3('<?=$path;?>ts2.php')"><img id="Image3" src="../imagens/botaoazul01.PNG"  width="92"  height="22"  border="0"       /></a></div>
</td><td>
<div id="Image3_container" style=" width: 92;  height: 22; overflow: hidden;" ><a href="javascript:janelaSecundaria3('<?=$path;?>ts2.php')"><img id="Image3" src="../imagens/botaoazul01.PNG"  width="92"  height="22"  border="0"       /></a></div>
</td><td>
<div id="Image3_container" style=" width: 92;  height: 22; overflow: hidden;" ><a href="javascript:history.back(1)"><img id="Image3" src="../imagens/botaoazul24.PNG"  width="92"  height="22"  border="0"       /></a></div>
</td></td></tr>
</table>
</div>

<script>
function janelaSecundaria3 (URL){ 
   window.open(URL,"janela3","width=560,height=390,resizable=NO,status=NO,Scrollbars=NO,location=NO,menubar=NO,toolbar=NO"); 
} 
</script>

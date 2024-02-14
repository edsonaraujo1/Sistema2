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

// Resgata Secao
session_start();
$id1  = $_SESSION['navega'];
$Edif = $_SESSION['lista_soc'];

?>

<div style="Z-INDEX: 34; LEFT: 215px; WIDTH: 544px; POSITION: absolute; TOP: 400px; HEIGHT: 80px">
<table border='0' colspan="2" >
<tr>
<td colspan="2">

<?
if ($per4 == "SIM"){
   ?>
    <div id="Image3_container" style=" width: 92;  height: 22; overflow: hidden;" ><a href="rel_frm.php"><img id="Image3" src="../imagens/botaoazul23.PNG"  width="92"  height="22"  border="0"/></a></div>
   <?
   }else{
   ?>
   <div id="Image3_container" style=" width: 92;  height: 22; overflow: hidden;" ><a href="javascript:janelaSecundaria3('<?=$path;?>ts2.php')"><img id="Image3" src="../imagens/botaoazul01.PNG"  width="92"  height="22"  border="0"/></a></div>
   <?
   }
   ?>
</td>
<?
if (!empty($Acao)){
	// OK
}else{
	$Acao = $Edit1; 
}
?>
<td colspan="2">
<div id="Image3_container" style=" width: 92;  height: 22; overflow: hidden;" ><a href="lis_grid.php?Cod_2=<?=$id1;?>"  ><img id="Image3" src="../imagens/botaoazul3.PNG"  width="92"  height="22"  border="0"       /></a></div>
</td><td>
<?
if ($per3 == "SIM"){
   ?>
   <div id="Image3_container" style=" width: 92;  height: 22; overflow: hidden;" ><a href="excluir.php?Cod_2=<?=$id1;?>"  ><img id="Image3" src="../imagens/botaoazul4.PNG"  width="92"  height="22"  border="0"       /></a></div>
   <?
}
?>
</td>
<td>
<?
if ($per2 == "SIM"){
   ?>
   <div id="Image3_container" style=" width: 92;  height: 22; overflow: hidden;" ><a href="alterar.php?Cod_2=<?=$id1;?>"  ><img id="Image3" src="../imagens/botaoazul5.PNG"  width="92"  height="22"  border="0"       /></a></div>
   <?
}
?>
</td>
<td>
<?
if ($per1 == "SIM"){
   ?>
   <div id="Image3_container" style=" width: 92;  height: 22; overflow: hidden;" ><a href="incluir.php?edi1=<?=$edi1;?>"  ><img id="Image3" src="../imagens/botaoazul6.PNG"  width="92"  height="22"  border="0"       /></a></div>
   <?
}
?>
</td><td>
<div id="Image3_container" style=" width: 92;  height: 22; overflow: hidden;" ><a href="consulta.php"  ><img id="Image3" src="../imagens/botaoazul7.PNG"  width="92"  height="22"  border="0"       /></a></div>
</td></tr><tr>
<td colspan="1" align="right">
<div id="Image13_container" style=" width: 39;  height: 32; overflow: hidden;" ><a href="Javascript:Inicio(<?=$id1;?>);" ><img id="Image13" src="../imagens/inicio.PNG"  width="39"  height="32"  border="0"       /></a></div>
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
<div id="Image3_container" style=" width: 92;  height: 22; overflow: hidden;" ><a href="<?=$path;?>avaleht.php?servletjs2=20$$20"  ><img id="Image3" src="../imagens/botaoazul24.PNG"  width="92"  height="22"  border="0"       /></a></div>
</td></td></tr>
</table>

</div>
<div style="Z-INDEX: 34; LEFT: 225px; WIDTH: 544px; POSITION: absolute; TOP: 490px; HEIGHT: 5px" align="center">
<table border='0' align="center">
<td align="center"><a href=<?=$website;?> target="new"><b>Web Site</b></a></td> 
</table>
</div>

<script>
function janelaSecundaria3 (URL){ 
   window.open(URL,"janela3","width=560,height=390,resizable=NO,status=NO,Scrollbars=NO,location=NO,menubar=NO,toolbar=NO"); 
} 
</script>

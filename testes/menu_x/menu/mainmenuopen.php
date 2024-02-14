<div id="Layer1" style="position:absolute; width:621px; height:24px; z-index:1; left: 3px; top: 50px"> 
<?
setlocale(LC_TIME,"portuguese");
$bomdia = "Bom Dia, hoje e  ".strftime("%A, %d de %B de %Y"); 

?>

<font face="Verdana, Arial, Helvetica, sans-serif" size="2"><b><?=$bomdia;?></b></font>
  <table width="600" border="1" align="center" cellpadding="0" cellspacing="0">
    <tr> 
      <td width="95" bgcolor="#99CCFF"> 
        <div align="center"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><a href="index.php?cntrl=1">&nbsp;&nbsp;Sair&nbsp;&nbsp;</a></font></b></div>
      </td>

      <td width="95" bgcolor="#99CCFF"> 
        <div align="center"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><a href="index.php?cntrl=2">&nbsp;&nbsp;Cadastros&nbsp;&nbsp;</a></font></b></div>
      </td>

      <td width="95" bgcolor="#99CCFF"> 
        <div align="center"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><a href="index.php?cntrl=3">&nbsp;&nbsp;Contribuições&nbsp;&nbsp;</a></font></b></div>
      </td>

      <td width="95" bgcolor="#99CCFF"> 
        <div align="center"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><a href="index.php?cntrl=4">&nbsp;&nbsp;Relatórios/Etiquetas&nbsp;&nbsp;</a></font></b></div>
      </td>

      <td width="95" bgcolor="#99CCFF"> 
        <div align="center"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><a href="index.php?cntrl=5">&nbsp;&nbsp;Saúde&nbsp;&nbsp;</a></font></b></div>
      </td>

      </td>
      <td width="95" bgcolor="#99CCFF"> 
        <div align="center"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><a href="index.php?cntrl=6">&nbsp;&nbsp;Caixa&nbsp;&nbsp;</a></font></b></div>
      </td>


      </td>
      <td width="95" bgcolor="#99CCFF"> 
        <div align="center"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><a href="index.php?cntrl=7">&nbsp;&nbsp;Vagas&nbsp;&nbsp;</a></font></b></div>
      </td>

      </td>
      <td width="95" bgcolor="#99CCFF"> 
        <div align="center"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><a href="index.php?cntrl=8">&nbsp;&nbsp;Juridico&nbsp;&nbsp;</a></font></b></div>
      </td>

      </td>
      <td width="95" bgcolor="#99CCFF"> 
        <div align="center"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><a href="index.php?cntrl=9">&nbsp;&nbsp;Operador&nbsp;&nbsp;</a></font></b></div>
      </td>

    </tr>
  </table>
</div>

<? if ($cntrl==2){ 
	echo " 
	<div id='Layer1' style='position:absolute; width:111px; height:78px; z-index:2; left: 50px; top: 93px'> 
	  <table border=0 cellspacing=0 cellpadding=0 width=215>
    	<tr bgcolor=#CCFFFF> 
    	  <td width=15>&nbsp;</td>
    	  <td width=205> <font color=#333399 size=2><font face=Verdana, Arial, Helvetica, sans-serif>Cadastro de Administradora</font></font></td>
    	</tr>
    	<tr bgcolor=#CCFFFF> 
    	  <td width=15>&nbsp;</td>
    	  <td width=205> <font color=#333399 size=2><font face=Verdana, Arial, Helvetica, sans-serif>Cadastro de Associados</font></font></td>
    	</tr>
    	<tr bgcolor=#CCFFFF> 
    	  <td width=15>&nbsp;</td>
    	  <td width=205> <font color=#333399 size=2><font face=Verdana, Arial, Helvetica, sans-serif><a href=cadedif.php>Cadastro de Edificios</a></font></font></td>
    	</tr>
    	<tr bgcolor=#CCFFFF> 
    	  <td width=15>&nbsp;</td>
    	  <td width=105> <font face=Verdana, Arial, Helvetica, sans-serif size=2 color=#333399>Cota&ccedil;&otilde;es</font></td>
    	</tr>
	  </table>
	  <font color=#CCFFFF><b><i><font face=Verdana, Arial, Helvetica, sans-serif size=2></font></i></b></font>
	</div>";

} 
if ($cntrl==3){ 
	echo "
<div id='Layer2' style='position:absolute; width:120px; height:96px; z-index:3; left: 143px; top: 93px'> 
  <table width=120 border=0 cellspacing=0 cellpadding=0>
    <tr bgcolor=#CCFFFF> 
      <td width=21>&nbsp;</td>
      <td width=99> <font color=#333399 size=2><font face=Verdana, Arial, Helvetica, sans-serif>Di&aacute;ria</font></font></td>
    </tr>
    <tr bgcolor=#CCFFFF> 
      <td width=21>&nbsp;</td>
      <td width=99> <font color=#333399 size=2><font face=Verdana, Arial, Helvetica, sans-serif>Semanal</font></font></td>
    </tr>
    <tr bgcolor=#CCFFFF> 
      <td width=21>&nbsp;</td>
      <td width=99> <font color=#333399 size=2><font face=Verdana, Arial, Helvetica, sans-serif>Mensal</font></font></td>
    </tr>
    <tr bgcolor=#CCFFFF> 
      <td width=21>&nbsp;</td>
      <td width=99> <font face=Verdana, Arial, Helvetica, sans-serif size=2 color=#333399>Anual</font></td>
    </tr>
    <tr bgcolor=#CCFFFF> 
      <td width=21>&nbsp;</td>
      <td width=99> <font color=#CCCCCC size=2><font face=Verdana, Arial, Helvetica, sans-serif color=#333399>Contatos</font></font></td>
    </tr>
  </table>
</div>";
}

if ($cntrl==4){ 
	echo "
<div id='Layer3' style='position:absolute; width:119px; height:193px; z-index:4; left: 260px; top: 93px'> 
  <table width=120 border=0 cellspacing=0 cellpadding=0 height=100>
    <tr bgcolor=#CCFFFF> 
      <td width=20>&nbsp;</td>
      <td width=115> <font color=#333399 size=2><font face=Verdana, Arial, Helvetica, sans-serif>Liga&ccedil;&otilde;es</font></font></td>
    </tr>
    <tr bgcolor=#CCFFFF> 
      <td width=20>&nbsp;</td>
      <td width=115 height=20> <font color=#333399 size=2><font face=Verdana, Arial, Helvetica, sans-serif>Dinheiro</font></font></td>
    </tr>
    <tr bgcolor=#CCFFFF> 
      <td width=20>&nbsp;</td>
      <td width=115> <font color=#333399 size=2><font face=Verdana, Arial, Helvetica, sans-serif>Contas</font></font></td>
    </tr>
    <tr bgcolor=#CCFFFF> 
      <td width=20>&nbsp;</td>
      <td width=115> <font color=#333399 size=2><font face=Verdana, Arial, Helvetica, sans-serif>Sugest&otilde;es</font></font></td>
    </tr>
    <tr bgcolor=#CCFFFF> 
      <td width=20>&nbsp;</td>
      <td width=115> <font face=Verdana, Arial, Helvetica, sans-serif size=2 color=#333399>Custos</font></td>
    </tr>
    <tr bgcolor=#CCFFFF> 
      <td width=20>&nbsp;</td>
      <td width=115> <font color=#333399 size=2><font face=Verdana, Arial, Helvetica, sans-serif>Listagens</font></font></td>
    </tr>
    <tr bgcolor=#CCFFFF> 
      <td width=20>&nbsp;</td>
      <td width=115> <font color=#333399 size=2><font face=Verdana, Arial, Helvetica, sans-serif>&Agrave; 
        Receber</font></font></td>
    </tr>
    <tr bgcolor=#CCFFFF> 
      <td width=20>&nbsp;</td>
      <td width=115> <font color=#333399 size=2><font face=Verdana, Arial, Helvetica, sans-serif>&Agrave; 
        Pagar</font></font></td>
    </tr>
    <tr bgcolor=#CCFFFF> 
      <td width=20>&nbsp;</td>
      <td width=115><font color=#333399 size=2><font face=Verdana, Arial, Helvetica, sans-serif><a href=lista_cliente.php>Clientes</a></font></font></td>
    </tr>
    <tr bgcolor=#CCFFFF> 
      <td width=20>&nbsp;</td>
      <td width=115><font color=#333399 size=2><font face=Verdana, Arial, Helvetica, sans-serif><a href=lista_fornecedor.php>Fornecedores</a></font></font></td>
    </tr>
  </table>
</div>";
}

if ($cntrl==5){ 
	echo "
<div id='Layer4' style='position:absolute; width:110px; height:97px; z-index:5; left: 430px; top: 93px'> 
  <table width=110 border=0 cellspacing=0 cellpadding=0>
    <tr bgcolor=#CCFFFF> 
      <td width=21>&nbsp;</td>
      <td width=99> <font color=#333399 size=2><font face=Verdana, Arial, Helvetica, sans-serif>Di&aacute;ria</font></font></td>
    </tr>
    <tr bgcolor=#CCFFFF> 
      <td width=21>&nbsp;</td>
      <td width=99> <font color=#333399 size=2><font face=Verdana, Arial, Helvetica, sans-serif>Semanal</font></font></td>
    </tr>
    <tr bgcolor=#CCFFFF> 
      <td width=21>&nbsp;</td>
      <td width=99> <font color=#333399 size=2><font face=Verdana, Arial, Helvetica, sans-serif>Mensal</font></font></td>
    </tr>
    <tr bgcolor=#CCFFFF> 
      <td width=21>&nbsp;</td>
      <td width=99> <font face=Verdana, Arial, Helvetica, sans-serif size=2 color=#333399>Anual</font></td>
    </tr>
    <tr bgcolor=#CCFFFF> 
      <td width=21>&nbsp;</td>
      <td width=99> <font color=#CCCCCC size=2><font face=Verdana, Arial, Helvetica, sans-serif color=#333399>Contatos</font></font></td>
    </tr>
  </table>
</div>";
}

if ($cntrl==6){ 
	echo "
	<div id='Layer5' style='position:absolute; width:121px; height:115px; z-index:6; left: 495px; top: 93px'> 
	  <table width=120 border=0 cellspacing=0 cellpadding=0>
    	<tr bgcolor=#CCFFFF> 
    	  <td width=20>&nbsp;</td>
    	  <td><font color=#333399 size=2><font face=Verdana, Arial, Helvetica, sans-serif>Empresa</font></font></td>
    	</tr>
    	<tr bgcolor=#CCFFFF> 
    	  <td width=20>&nbsp;</td>
    	  <td> <font color=#333399 size=2><font face=Verdana, Arial, Helvetica, sans-serif>Datas</font></font></td>
    	</tr>
    	<tr bgcolor=#CCFFFF> 
    	  <td width=20>&nbsp;</td>
    	  <td> <font color=#333399 size=2><font face=Verdana, Arial, Helvetica, sans-serif>Produtos</font></font></td>
    	</tr>
    	<tr bgcolor=#CCFFFF> 
    	  <td width=20>&nbsp;</td>
    	  <td> <font color=#333399 size=2><font face=Verdana, Arial, Helvetica, sans-serif>Servi&ccedil;os</font></font></td>
    	</tr>
    	<tr bgcolor=#CCFFFF> 
    	  <td width=20>&nbsp;</td>
    	  <td> <font face=Verdana, Arial, Helvetica, sans-serif size=2 color=#333399>Arquivos</font></td>
    	</tr>
    	<tr bgcolor=#CCFFFF> 
    	  <td width=20>&nbsp;</td>
      <td> <font color=#333399 size=2><font face=Verdana, Arial, Helvetica, sans-serif>Bancos</font></font></td>
    	</tr>
    	<tr bgcolor=#CCFFFF> 
    	  <td width=20>&nbsp;</td>
    	  <td> <font color=#333399 size=2><font face=Verdana, Arial, Helvetica, sans-serif>Categorias</font></font></td>
    	</tr>
    	<tr bgcolor=#CCFFFF> 
    	  <td width=20>&nbsp;</td>
    	  <td> <font color=#333399 size=2><font face=Verdana, Arial, Helvetica, sans-serif>Plano 
    	    de Contas</font></font></td>
    	</tr>
    	<tr bgcolor=#CCFFFF> 
    	  <td width=20>&nbsp;</td>
    	  <td> <font color=#333399 size=2><font face=Verdana, Arial, Helvetica, sans-serif>Pagamentos</font></font></td>
    	</tr>
    	<tr bgcolor=#CCFFFF> 
      <td width=20>&nbsp;</td>
      <td> <font color=#333399 size=2><font face=Verdana, Arial, Helvetica, sans-serif>Juros</font></font></td>
    	</tr>
    	<tr bgcolor=#CCFFFF> 
    	  <td width=20>&nbsp;</td>
    	  <td> <font color=#333399 size=2><font face=Verdana, Arial, Helvetica, sans-serif>Feriados</font></font></td>
    	</tr>
    		<tr bgcolor=#CCFFFF> 
    		  <td width=20>&nbsp;</td>
    	  <td> <font color=#333399 size=2><font face=Verdana, Arial, Helvetica, sans-serif>Prazos</font></font></td>
    	</tr>
    	<tr bgcolor=#CCFFFF> 
    	  <td width=20>&nbsp;</td>
    	  <td> <font face=Verdana, Arial, Helvetica, sans-serif size=2 color=#333399>D&oacute;lar</font></td>
    	</tr>
    	<tr bgcolor=#CCFFFF> 
    	  <td width=20>&nbsp;</td>
    	  <td> <font color=#333399 size=2><font face=Verdana, Arial, Helvetica, sans-serif>Pre&ccedil;os</font></font></td>
    	</tr>
  	</table>
	</div>";
}
?>

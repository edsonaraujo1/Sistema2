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
<style type="text/css" media="screen">
.style1 {	font-family: Arial;
	font-weight: bold;
	font-size: 18px;
}
.style3 {	color: <?=$color_bor;?>;
	font-size: 21px;
}
.style4 {font-size: 16px}
.style6 {font-family: Arial; font-weight: bold; font-size: 14px; }
.style7 {	font-size: 23px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
</style>
		
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
			
		$hostname_conn = $host;
		$database_conn = $db;
		$username_conn = $user;
		$password_conn = $pass;
		
		// Conectamos ao nosso servidor MySQL
		if(!($conn = mysql_connect($hostname_conn,$username_conn,$password_conn))) 
		{
		   echo "Erro ao conectar ao MySQL.";
		   exit;
		}
		// Selecionamos nossa base de dados MySQL
		if(!($con = mysql_select_db($database_conn,$conn))) 
		{
		   echo "Erro ao selecionar ao MySQL.";
		   exit;
		}
		
		$con = mysql_connect($hostname_conn,$username_conn,$password_conn);
		$bd  = mysql_select_db($database_conn);
		
		
		$query_Recordset1 = "SELECT usuario FROM useronline";
		$Recordset1 = @mysql_query($query_Recordset1, $con); // or die(mysql_error());
		$row_Recordset1 = @mysql_fetch_assoc($Recordset1);
		$totalRows_Recordset1 = @mysql_num_rows($Recordset1);
 	
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

<BODY  TEXT="#00000" bgcolor="#FFFFFF" bordercolor ='<?=$color_bor;?>'>
	<CENTER>
	<FORM NAME="form">
	
<TABLE BORDER="1" CELLSPACING="0" CELLPADDING="10" bgcolor="#FFFFFF" bordercolor ='<?=$color_bor;?>'>
		
<TR>
			
<TD COLSPAN="3" ALIGN="CENTER" BGCOLOR="#FFCC00">
				<FONT FACE="VERDANA" SIZE="2"><B>
				</b></font>
<FONT FACE="VERDANA" SIZE="2"><B><MARQUEE>C&aacute;lculo do C&oacute;digo de Barras  do Boleto Banc&aacute;rio - Padr&atilde;o FEBRABAN</MARQUEE><br>
</b><font size="1">Calcula a &quot;Linha Digit&aacute;vel&quot; atrav&eacute;z do &quot;C&oacute;digo das Barras&quot;<br>
ou<br>
Visualiza o &quot;C&oacute;digo de Barras&quot; atrav&eacute;s do &quot;Linha Digit&aacute;vel&quot;</font></font>  
</TD>
</TR>
		
<TR>
<TD BGCOLOR="#4A9CE4" ALIGN="CENTER" VALIGN="MIDDLE" ONMOUSEOVER="this.bgColor='#D0D0D0'" ONMOUSEOUT="this.bgColor='#4A9CE4'">Linha Digit&aacute;vel</TD>
<TD BGCOLOR="#4A9CE4" ALIGN="CENTER" VALIGN="MIDDLE" ONMOUSEOVER="this.bgColor='#D0D0D0'" ONMOUSEOUT="this.bgColor='#4A9CE4'">
<!--input type="text" name="linha" maxlength="154" size="57" value='39992.73885 30652.529220 91004.000021 2 000'-->
<input type="text" name="linha" maxlength="154" size="57" value=''>
</TD>
<TD BGCOLOR="#4A9CE4" ALIGN="CENTER" VALIGN="MIDDLE" ONMOUSEOVER="this.bgColor='#D0D0D0'" ONMOUSEOUT="this.bgColor='#4A9CE4'">
<input onClick="f_barra();" type="BUTTON" value="Calcular Barra" style="font-family: verdana; font-size: 8 pt; font-weight: bold; color: #0000DD; background: #d0d0d0;" onMouseOver="this.style.background='#f0f0f0'" onMouseOut="this.style.background='#d0d0d0'">
</TD>
</TR>
		
<TR>
<TD BGCOLOR="#4A9CE4" ALIGN="CENTER" VALIGN="MIDDLE" ONMOUSEOVER="this.bgColor='#D0D0D0'" ONMOUSEOUT="this.bgColor='#4A9CE4'">C&oacute;digo&nbsp;da&nbsp;Barra</TD>
<TD BGCOLOR="#4A9CE4" ALIGN="CENTER" VALIGN="MIDDLE" ONMOUSEOVER="this.bgColor='#D0D0D0'" ONMOUSEOUT="this.bgColor='#4A9CE4'">
<input type="text" name="barra" maxlength="144" size="57" value="">
</TD>
<TD BGCOLOR="#4A9CE4" ALIGN="CENTER" VALIGN="MIDDLE" ONMOUSEOVER="this.bgColor='#D0D0D0'" ONMOUSEOUT="this.bgColor='#4A9CE4'">
<input onClick="f_linha();" type="BUTTON" value="Calcular Linha" onMouseOver="this.style.background='#f0f0f0'" onMouseOut="this.style.background='#d0d0d0'">
</TD>
</TR>

<TR>
<TD BGCOLOR="#4A9CE4" ALIGN="CENTER" VALIGN="MIDDLE" ONMOUSEOVER="this.bgColor='#D0D0D0'" ONMOUSEOUT="this.bgColor='#4A9CE4'">Vencimento da Barra:</TD>
<TD BGCOLOR="#4A9CE4" ALIGN="CENTER" VALIGN="MIDDLE" ONMOUSEOVER="this.bgColor='#D0D0D0'" ONMOUSEOUT="this.bgColor='#4A9CE4'">
<input readonly type="text" name="venc" maxlength="100" size="57">
</TD>
<TD BGCOLOR="#4A9CE4" ALIGN="CENTER" VALIGN="MIDDLE" ONMOUSEOVER="this.bgColor='#D0D0D0'" ONMOUSEOUT="this.bgColor='#4A9CE4'">
<input onClick="f_venc();" type="BUTTON" value="Vencimento" style="font-family: verdana; font-size: 8 pt; font-weight: bold; color: #0000DD; background: #d0d0d0;" onMouseOver="this.style.background='#f0f0f0'" onMouseOut="this.style.background='#d0d0d0'">
</TD>
</TR>

<TR>
<TD BGCOLOR="#4A9CE4" ALIGN="CENTER" VALIGN="MIDDLE" ONMOUSEOVER="this.bgColor='#D0D0D0'" ONMOUSEOUT="this.bgColor='#4A9CE4'">Valor:</TD>
<TD BGCOLOR="#4A9CE4" ALIGN="CENTER" VALIGN="MIDDLE" ONMOUSEOVER="this.bgColor='#D0D0D0'" ONMOUSEOUT="this.bgColor='#4A9CE4'">
<input readonly type="text" name="valor" maxlength="100" size="57">
</TD>
<TD BGCOLOR="#4A9CE4" ALIGN="CENTER" VALIGN="MIDDLE" ONMOUSEOVER="this.bgColor='#D0D0D0'" ONMOUSEOUT="this.bgColor='#4A9CE4'">
<INPUT TYPE="reset" value=Limpar>
<INPUT TYPE="button" value=Imagem onclick="document.getElementById('barras').innerHTML='<img src=http://200.242.242.2/boleto/barcode.cgi?'+form.barra.value+'>';">
</TD>
</TR>

<TR bgcolor="#FFFFFF">
<TD ALIGN="CENTER" COLSPAN="3">
  <div align="right"></div>
  <div align="right">
  <table width="678" border="0" cellspacing="9">
    <tr>
      <td width="525">
<div id=barras></div>
      </td>
      <td valign="top"><div align="center"><a href="../menu_1.php"><img src="../imagens/botaoazul24.PNG" width="92" height="22" border="0" /></a></div></td>
    </tr>
  </table>
  
  </div>
  <div align="center">
  <table border="0">
  
</table>
    </div></TD>
</TR>

<?
function motra_barras()
{
?>
<table cellSpacing=0 cellPadding=0 width=666 border=0><tr><br/><td align=bottom align=left height=50>&nbsp;&nbsp;&nbsp;<?CodigoDeBarra(ltrim(Sonumeros(barras)));?></td></tr></table>
<?
}
?>	
	
</table>
<!-- TEXTAREA NAME="t" ROWS="24" COLS="80"  style="font-family: verdana; font-size: 8 pt; font-weight: bold; color: #0000DD; background: #d0d0d0;"></TEXTAREA--></FORM>
</center>
<div id=barras></div>
<SCRIPT LANGUAGE="javascript">
	function f_barra() {
		var antes  = form.barra.value;
		var depois = calcula_barra(form.linha.value);
		form.barra.value=depois;
		antes = antes.replace(/[^0-9]/g,'')
		if ((antes != depois) && antes != '') alert('Código de Barras digitado não conferem:\n'+antes+'\n'+depois);
		f_venc();
		return(false);
	}
	
	function f_linha() {
		var antes  = form.linha.value.replace(/[^0-9]/g,'');
		var depois = calcula_linha(form.barra.value);
		form.linha.value=depois;
		depois = depois.replace(/[^0-9]/g,'')
		if ((antes != depois) && antes != '') alert('Código de Barras digitado não conferem:\n'+antes+'\n'+depois);
		f_venc();
		return(false);
	}
	function f_venc() {
		if ( form.barra.value.substr(5,4) == 0 )
			form.venc.value='Boleto pode ser pago em qualquer data';
		else
			form.venc.value=fator_vencimento(form.barra.value.substr(5,4));
		form.valor.value=(form.barra.value.substr(9,8)*1)+','+form.barra.value.substr(17,2);
		return(false);
	}
	function calcula_barra(linha)
	{
		//var linha = form.linha.value;	// Linha Digitável
		barra  = linha.replace(/[^0-9]/g,'');
		//
		// CÁLCULO DO DÍGITO DE AUTOCONFERÊNCIA (DAC)   -   5ª POSIÇÃO
		if (modulo11_banco('34191000000000000001753980229122525005423000') != 1) alert('Função "modulo11_banco" está com erro!');
		//
		//if (barra.length == 36) barra = barra + '00000000000';
		if (barra.length < 47 ) barra = barra + '00000000000'.substr(0,47-barra.length);
		if (barra.length != 47) alert ('A linha do Código de Barras está incompleta!'+barra.length);
		//
		barra  = barra.substr(0,4)
				+barra.substr(32,15)
				+barra.substr(4,5)
				+barra.substr(10,10)
				+barra.substr(21,10)
				;
		//form.barra.value = barra;
		if (modulo11_banco(barra.substr(0,4)+barra.substr(5,39)) != barra.substr(4,1))
			alert('Digito verificador '+barra.substr(4,1)+', o correto é '+modulo11_banco(barra.substr(0,4)+barra.substr(5,39))+'\nO sistema não altera automaticamente o dígito correto na quinta casa!');
		//if (form.barra.value != form.barra2.value) alert('Barras diferentes');
		return(barra);
	}
	function calcula_linha(barra)
	{
		//var barra = form.barra.value;	// Codigo da Barra
		linha = barra.replace(/[^0-9]/g,'');
		//
		if (modulo10('399903512') != 8) alert('Função "modulo10" está com erro!');
		if (linha.length != 44) alert ('A linha do Código de Barras está incompleta!');
		//
		var campo1 = linha.substr(0,4)+linha.substr(19,1)+'.'+linha.substr(20,4);
		var campo2 = linha.substr(24,5)+'.'+linha.substr(24+5,5);
		var campo3 = linha.substr(34,5)+'.'+linha.substr(34+5,5);
		var campo4 = linha.substr(4,1);		// Digito verificador
		var campo5 = linha.substr(5,14);	// Vencimento + Valor
		//
		if (  modulo11_banco(  linha.substr(0,4)+linha.substr(5,99)  ) != campo4 )
			alert('Digito verificador '+campo4+', o correto é '+modulo11_banco(  linha.substr(0,4)+linha.substr(5,99)  )+'\nO sistema não altera automaticamente o dígito correto na quinta casa!');
		//
		if (campo5 == 0) campo5 = '000';
		//
		linha =	 campo1 + modulo10(campo1)
				+' '
				+campo2 + modulo10(campo2)
				+' '
				+campo3 + modulo10(campo3)
				+' '
				+campo4
				+' '
				+campo5
				;
		//if (form.linha.value != form.linha2.value) alert('Linhas diferentes');
		return(linha);
	}
	function fator_vencimento (dias) {
		//Fator contado a partir da data base 07/10/1997
		//*** Ex: 04/07/2000 fator igual a = 1001
		//alert(dias);
		var currentDate, t, d, mes;
		t = new Date();
		currentDate = new Date();
		currentDate.setFullYear(1997,9,7);//alert(currentDate.toLocaleString());
		t.setTime(currentDate.getTime() + (1000 * 60 * 60 * 24 * dias));//alert(t.toLocaleString());
		mes = (currentDate.getMonth()+1); if (mes < 10) mes = "0" + mes;
		dia = (currentDate.getDate()+1); if (dia < 10) dia = "0" + dia;
		//campo.value = dia +"."+mes+"."+currentDate.getFullYear();campo.select();campo.focus();
		return(t.toLocaleString());
	}
	function modulo10(numero)
	{
		/*
			  select @peso = '121212121212121212121212'
			  select @max  = datalength(@numero)
			  select @peso = right(@peso, @max)
			  set @contador = @max+1
			  set @soma     = 0
			  loop:
					set @contador = @contador-1
					set @valor    = isnull((ascii(substring(@peso, @contador, 1))-48) * 
			(ascii(substring(@numero, @contador, 1))-48), 0)
					set @soma     = isnull((select (case when (@valor<10) then 
			@valor when  (@valor>9) then @valor-10 end)), 0)+@soma
					set @soma     = isnull((select (case when  (@valor<10) then 
			null when  (@valor>9) then 1 end)), 0)+@soma
					if (@contador >1) goto loop
			  select @resto= sum(@soma)%10
			  select @retorno = case @resto when 0 then 0 else 10-@resto end
			  return(Convert(char(1), @retorno))	
		*/
		numero = numero.replace(/[^0-9]/g,'');
		var soma  = 0;
		var peso  = 2;
		var contador = numero.length-1;
		//alert(contador);
		//numero = '00183222173';
		//for (var i=0; i <= contador - 1; i++) {
		//alert(10);
		//for (contador=10; contador >= 10 - 1; contador--) {
		while (contador >= 0) {
			//alert(contador);
			//alert(numero.substr(contador,1));
			multiplicacao = ( numero.substr(contador,1) * peso );
			if (multiplicacao >= 10) {multiplicacao = 1 + (multiplicacao-10);}
			soma = soma + multiplicacao;
			//alert(numero.substr(contador,1)+' * '+peso+' = '+multiplicacao + ' =>' + soma) ;
			//alert(soma);
			if (peso == 2) {
				peso = 1;
			} else {
				peso = 2;
			}
			contador = contador - 1;
		}
		var digito = 10 - (soma % 10);
		//alert(numero + '\n10 - (' + soma + ' % 10) = ' + digito);
		if (digito == 10) digito = 0;
		return digito;
	}

	function debug(txt)
	{
		form.t.value = form.t.value + txt + '\n';
	}
	function modulo11_banco(numero)
	{
		/*
		  SET @SOMA  = 0
		  SET @PESO  = 2
		  SET @BASE  = 9
		  SET @RESTO = 0
		  SET @CONTADOR = Len(@VALOR)

		  LOOP:
			BEGIN
			  SET @SOMA = @SOMA + (Convert(int, SubString(@VALOR, @CONTADOR, 1)) *	@PESO)
			  IF (@PESO < @BASE)
				SET @PESO = @PESO + 1
			  ELSE
				SET @PESO = 2
			  SET @CONTADOR = @CONTADOR-1
			END
		  IF @CONTADOR >= 1 GOTO LOOP

		  IF (@RESTO = 1)
			BEGIN
			  SET @RETORNO = (@SOMA % 11)
			END
		  ELSE
			BEGIN
			  SET @DIGITO = 11 - (@SOMA % 11)
			  IF (@DIGITO > 9) SET @DIGITO = 0
			  SET @RETORNO = @DIGITO
			END
		  -- A UNICA DIFERENCA EH NO RETORNO, SE FOR 0, RETORNA 1
		  IF @RETORNO = '0' SET @RETORNO='1'
		  RETURN @RETORNO
		*/
		numero = numero.replace(/[^0-9]/g,'');
		//debug('Barra: '+numero);
		var soma  = 0;
		var peso  = 2;
		var base  = 9;
		var resto = 0;
		var contador = numero.length - 1;
		//debug('tamanho:'+contador);
		// var numero = "12345678909";
		for (var i=contador; i >= 0; i--) {
			//alert( peso );
			soma = soma + ( numero.substring(i,i+1) * peso);
			//debug( i+': '+numero.substring(i,i+1) + ' * ' + peso + ' = ' +( numero.substring(i,i+1) * peso)+' soma='+ soma);
			if (peso < base) {
				peso++;
			} else {
				peso = 2;
			}
		}
		var digito = 11 - (soma % 11);
		//debug( '11 - ('+soma +'%11='+(soma % 11)+') = '+digito);
		if (digito >  9) digito = 0;
		/* Utilizar o dígito 1(um) sempre que o resultado do cálculo padrão for igual a 0(zero), 1(um) ou 10(dez). */
		if (digito == 0) digito = 1;
		return digito;
	}
	

</SCRIPT>

        
			<div align="center"><a href="<?php echo $website ?>" class='linkmenu2' ><b>Web Site</b></a>
			</div>
        <br>
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
<?php
/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Etiquetas de Empresas/Adms/Socios/Fenatec
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------
*/
include("../config.php");

// @ereg_replace

include_once("menu.php");

$nome3 = $_SESSION["nome_log"];

include("vaurls.php");

$deixar = acesso_url("FORM_ETIQUE3");

if ($deixar == "SIM"){

// Resgata Sessao
session_name("Val_Etq_Edif");
session_start();

$Edit1  = $_SESSION['Edit1'];
$Edit2  = $_SESSION['Edit2'];
$Edit3  = $_SESSION['Edit3']; 
$Edit4  = $_SESSION['Edit4'];
$Edit5  = $_SESSION['Edit5'];
$Edit6  = $_SESSION['Edit6'];
$Edit7  = $_SESSION['Edit7'];
//$receber  = $_SESSION['Edit8'];

// Conta quantas guias vao ser impressas

include("funcoes2.php");


        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit1").focus();	
		}
		</script>
<?php

if (!empty($Edit1)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit2").focus();	
		}
		
		</script>
		<?php
}
if (!empty($Edit2)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit3").focus();	
		}
		
		</script>
		<?php
}
if (!empty($Edit3)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("done").focus();	
		}
		
		</script>
		<?php
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<br />
<br />
<br />
<style>

.normal {
	
	background-color: white;
}
.anormal {
		background-color: Lavender;
}

</style>

<body onkeydown="javascript:if (event.KeyCode==13) event.KeyCode=9; javascript:document.onkeydown = keyCatcher();" onload="document.form1.nome_log.focus();">

<div align=center>

<table width="429" height="233"  border="15" align="center" bordercolor ='<?php echo $color_bor ?>' bgcolor="#FFFFFF">

<tr>
<td width="391" height="28" bgcolor="#FFFFFF">

      <font face=arial>
      <div align="left"><b><font size="4" face="Verdana" color="<?php echo $color_bor ?>">&nbsp;<b> ETIQUETAS APOSNTADOS</font></b>
    
    </div></td>
</tr>

<!--      <form name="form1" method="post" action="info/info.php?inf=345">  -->
      <form name="form1" method="post" action="Label_apos.php" target='new'>

<tr>
    <th height="101" bgcolor="#FFFFFF"><table width="376" border="0">
      <tr>
        <td width="108"><b>Ordem de.: </b></td>
        <td width="241"><select type="text" name="Edit1" value="<?php echo $Edit1 ?>" style=" font-family: Verdana; font-size: 14px;  height:26px;width:110px;" onfocus="this.className='anormal'; nextfield ='Edit2';" onblur="this.className='normal'">
		
			<option value="<?php echo $Edit1 ?>"> <?php echo $Edit1 ?> </option>
            <option value="CODIGO"> CODIGO </option>
            <option value="ATIVIDADE"> ATIVIDADE </option>
            <option value="NOME"> NOME </option>
            <option value="ENDEREÇO"> ENDEREÇO </option>
            <option value="CEP"> CEP </option>

		</select>
		</td>
      </tr>
      <tr>
        <td><b>Iniciar em.: </b></td>
        <td><input type="text" name="Edit2" value="<?php echo $Edit2 ?>" style=" font-family: Verdana; font-size: 14px;  height:26px;width:250px;" onfocus="this.className='anormal'; nextfield ='Edit3';" onblur="this.className='normal'"></td>
      </tr>
      <tr>
        <td><b>Terminar em.: </b></td>
        <td><input type="text" name="Edit3" value="<?php echo $Edit3 ?>" style=" font-family: Verdana; font-size: 14px;  height:26px;width:250px;" onfocus="this.className='anormal'; nextfield ='Edit4';" onblur="this.className='normal'"></td>
      </tr>
      <tr>
      <td><b>Tipo Etiqueta.:</b>       </td>
      <td><input type='radio' name='recerber'  value='1' checked ><b>3 colunas</b>
          <input type='radio' name='recerber'  value='2'         ><b>2 Colunas</b>

	  
	  </td>
      </tr>
    </table>	</th>
</tr>
<tr>
  <th height="66" valign="top" bgcolor="#FFFFFF"><br>    <table width="224" border="0" align="center">
    <tr><font face=arial>
	  
	     <form method="POST" action="../avaleht.php?servletjs2=20$$20">
         <td><input type=image name="Imprimir" src="../imagens/botaoazul23.PNG"></td>
         </form>

         <form method="POST" action="../avaleht.php?servletjs2=20$$20">
         <td><input type=image name="Sair" src="../imagens/botaoazul9.PNG"></td>
         </form>

      </font></tr>
  </table></th></tr>
        

</table >
</div>

</body>
</html>
<?php
}else{
	
include("enaaurlnp.php");
	
}
?>
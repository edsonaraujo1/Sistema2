<?php
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Listagem na Tela por Codigo
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);

// include("../logar.php");
$nome3 = addslashes($_SESSION["nome_log"]);

include("menu.php");

include_once('../sql_injection.php');

include_once("funcoes2.php");

include("vaurls.php");

$deixar = acesso_url("GRID_DEBITO");

if ($deixar == "SIM"){


// Regata Secao
@session_start();
$id_navega = addslashes($_SESSION['navega']);

if (!empty($id_navega)){
	
   $id_navega = $_SESSION['navega'];
	
}else{
	
   $id_navega = $Cod_2;	
}

$titulo_tabela = "DEBITOS E PROMISSÓRIAS - SOCIOS -";
?>

<html>
<head>
<title><?php echo $Titulo ?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
<body>

<script language="JavaScript"><!--

document.onkeydown = keyCatcher;

function keyCatcher() 
{
   var e = event.srcElement.tagName;

   if (event.keyCode == 8 && e != "INPUT" && e != "TEXTAREA") 
   {
      event.cancelBubble = true;
      event.returnValue = false;
   }
   
   if (event.keyCode == 27) 
   {
		window.location="cadsocios.php?cod_3=<?php echo $id_navega ?>";
   }
   
}
//-->
</script>

<style type=text/css>

body { background-image: url(<?php echo "../".$logo_sis ?>);
       background-attachment: fixed }

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
-->
</style> 

</body>
</html>

<?php

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass)
        or

die("
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Não foi possivel conectar !!! ***</b>
     <table align=center>
     <form method='POST' action='login.php'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");


@mysql_select_db($db)
        or

die("
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Não Foi possivel selecionar o banco de dados !!! ***</b>
     <table align=center>
     <form method='POST' action='login.php'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");



// Abrir tabela Senha

$tabela_1 = strtoupper('debito');

$consulta3 = "SELECT * FROM permissoes WHERE login = '". anti_sql_injection($nome3) ."' and tabela = '". anti_sql_injection($tabela_1) ."'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$per1       = @$row3["incluir"];
$per2       = @$row3["alterar"];
$per3       = @$row3["excluir"];
$per4       = @$row3["imprimir"];

// retorna uma pesquisa


$consulta2  = "SELECT * FROM socios WHERE id = '". anti_sql_injection($id_navega) ."'";
	
$resultado2 = @mysql_query($consulta2);

$row2 = @mysql_fetch_array($resultado2);

$id_soc		= @$row2["id"];
$Edit1		= @$row2["COD"];
$new_fot    = @$row2["CODP"];
$Edit2	    = @$row2["NU"];


			// Atualiza arquivo Log
			$data_log = date("d/m/Y");
			$hora_log = date("H:i:s"); 
			$even_log = "CONSULTA DEBITOS/".$new_fot;
			
			$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
			             VALUES
			             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
			
			@mysql_query($consulta_log, $link);


// Resgata Secao
@session_start();

$volta_1 = addslashes($_SESSION['volta_mensa']);

if(!empty($volta_1)){
	
	$new_fot = $volta_1;
}

$sql  = "SELECT * FROM debito     WHERE CODP = '". anti_sql_injection($new_fot) ."' ORDER BY str_to_date( DATA, '%d/%m/%Y') ASC";

$faz = 1;

// Número de registros por página
$registros_pagina = "15";

$lista = (int)$_GET["lista"];

if(!$lista) {
	$pc = "1";
}
else {
	$pc = $lista;
}

$inicio = $pc - 1;
$inicio = $inicio * $registros_pagina;

$resultado = @mysql_query("$sql LIMIT $inicio, $registros_pagina");

$todos = @mysql_query("$sql");

$tr = @mysql_num_rows($todos);

$tp = $tr / $registros_pagina;

if(@mysql_num_rows($resultado) < 1) {

if ($per1 == "SIM"){
	echo "
	
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
     <tr>
     <td><center>
     <font face=arial><b>*** Não existe Debito para esse Socio !!! ***</b>
     <table align=center>
     <form method='POST' action='incluir_segt.php?cod_6=$new_fot'>
     <td><input type=image name='Voltar' src='../imagens/botaoazul6.PNG'></td>
     </form> 

     <form method='POST' action='cadsocios.php?cod_3=$id_soc'>
     <td><input type=image name='Voltar' src='../imagens/botao_voltar.PNG'></td>
     </form> 

     </table>
     </td>
     </tr>
     </table>
     </div>";
}
else{

	echo "
	
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
     <tr>
     <td><center>
     <font face=arial><b>*** Não existe Debito para esse Socio !!! ***</b>
     <table align=center>

     <form method='POST' action='cadsocios.php?cod_3=$id_soc'>
     <td><input type=image name='Voltar' src='../imagens/botao_voltar.PNG'></td>
     </form> 

     </table>
     </td>
     </tr>
     </table>
     </div>";
	
	
}
	 @session_start();
	 $_SESSION['volta_mensa'] = ''; 

}
else {
	
      echo "
          <br>
          <br>
          
          <table border=0  align=center>
          <tr align=center colspan=2>
		  <td><b>$titulo_tabela</b></td> 
          <div align=center>

          <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
          <tr>
          <td>
          <table border='1' align=center>";


       while ($linha = @mysql_fetch_array($resultado))
       {

        $id         = $linha["id"];
		$Edit1      = $linha["CODP"];
		$Edit2	  	= $linha["DESCRICAO"];
		$Edit3      = $linha["VALOR"];
		$Edit4      = $linha["DATA"];
		$Edit5      = $linha["PARCELA"];

        $PARCELA    = $linha["VALOR"]/$linha["PARCELA"];
        $PARCELA1   = number_format($PARCELA,2,",",".");

		$Edit6      = $linha["VENCIMENTO"];

        if ($faz == 1){
           ?>
           
		   <td valign=top><b>MATRICULA</b>
		   <th><b>DESCRIÇÃO</b>
		   <th><b>VALOR</b>
		   <th><b>PARCELA</b>
		   <th><b>VALOR TOTAL</b>
		   <th><b>VENCIMENTO</b>
		   <th><b>DATA</b>
		   </td>
          
           <?php
           $faz = 0;
        }


					  if ($negrita==1){
		                 ?>	
		                 <tr bgcolor="#C0C0C0"> 
						 <td align='center'>           <font style=' font-family: Verdana; font-size: 12px;'><b><?php echo $Edit1 ?></b>
						 <td align='left'>            <font style=' font-family: Verdana; font-size: 12px;'>   <?php echo $Edit2 ?>
						 <td align='right'>            <font style=' font-family: Verdana; font-size: 12px;'>   <?php echo $Edit3 ?>
						 <td align='center'>            <font style=' font-family: Verdana; font-size: 12px;'>   <?php echo $Edit5 ?>
						 <td align='right'>            <font style=' font-family: Verdana; font-size: 12px;'>   <?php echo $PARCELA1 ?>
						 <td align='center'>            <font style=' font-family: Verdana; font-size: 12px;'>   <?php echo $Edit6 ?>
						 <td align='left'>            <font style=' font-family: Verdana; font-size: 12px;'>   <?php echo $Edit4 ?>
                         <td  bgcolor="#FFFFFF">
                         <?php
                         if ($per3 == "SIM"){
                         ?>	
						     <A HREF='alterar_segt.php?Cod_2=<?php echo $id ?>'><img alt='Alterar' id='Image2' src='../imagens/editar.gif' border='0'></A>
						 <?php
						 }
						 ?>    
						 <td  bgcolor="#FFFFFF">
						 <?php
                         if ($per2 == "SIM"){
                         ?>	
						     <A HREF='excluir_segt.php?Cod_2=<?php echo $id ?>'><img alt='Excluir' id='Image3' src='../imagens/excluir.gif' border='0'></A>
						 <?php
						 }
						 ?>    
						 </font>
						 </td>
						 <?php 
			             $conta_p = $conta_p + 1;
			             $rec_nu = $rec_nu + 1;
	                    
						 $negrita = 0;		            
			             }else{
			             ?>	
		                 <tr> 
						 <td align='center'>           <font style=' font-family: Verdana; font-size: 12px;'><b><?php echo $Edit1 ?></b>
						 <td align='left'>            <font style=' font-family: Verdana; font-size: 12px;'>   <?php echo $Edit2 ?>
						 <td align='right'>            <font style=' font-family: Verdana; font-size: 12px;'>   <?php echo $Edit3 ?>
						 <td align='center'>            <font style=' font-family: Verdana; font-size: 12px;'>   <?php echo $Edit5 ?>
						 <td align='right'>            <font style=' font-family: Verdana; font-size: 12px;'>   <?php echo $PARCELA1 ?>
						 <td align='center'>            <font style=' font-family: Verdana; font-size: 12px;'>   <?php echo $Edit6 ?>
						 <td align='left'>            <font style=' font-family: Verdana; font-size: 12px;'>   <?php echo $Edit4 ?>
                         <td>
                         <?php
                         if ($per3 == "SIM"){
                         ?>	
						     <A HREF='alterar_segt.php?Cod_2=<?php echo $id ?>'><img alt='Alterar' id='Image2' src='../imagens/editar.gif' border='0'></A>
						 <?php
						 }
						 ?>
						 <td bgcolor="#FFFFFF">
						 <?php
                         if ($per2 == "SIM"){
                         ?>	
						     <A HREF='excluir_segt.php?Cod_2=<?php echo $id ?>'><img alt='Excluir' id='Image3' src='../imagens/excluir.gif' border='0'></A>
						 <?php
						 }
						 ?>    
						 </font>
						 </td>
						 <?php 
			             $conta_p = $conta_p + 1;
			             $rec_nu = $rec_nu + 1;
	                    
						 $negrita = 1;		            
			             }
                         ?> 
			             <?php
					     $conta_p = 0;		
				         }
	

if ($per1 == "SIM"){

     echo "
     
			<table border=0  align=left>
			<tr align=center colspan=2> 
			
			<form method='POST' action='incluir_segt.php?cod_6=$Edit1'>
			<td><input type=image name='Sair' src='../imagens/novo.gif'></td>
			</form>
			          
			</table>			 
		      
		      
		      
		     </table>
		     </td>
		     </tr>
		     </table>
		     </div>


			 <table border=0  align=center>
			 <tr align=center colspan=2> 
				
			 <form method='POST' action='cadsocios.php?cod_3=$id_soc'>
			 <td><input type=image name='Sair' src='../imagens/botao_voltar.PNG'></td>
			 </form>
				          
			 </table>";
}else{
	
     echo "
     
			<table border=0  align=left>
			<tr align=center colspan=2> 
			
			          
			</table>			 
		      
		      
		      
		     </table>
		     </td>
		     </tr>
		     </table>
		     </div>


			 <table border=0  align=center>
			 <tr align=center colspan=2> 
				
			 <form method='POST' action='cadsocios.php?cod_3=$id_soc'>
			 <td><input type=image name='Sair' src='../imagens/botao_voltar.PNG'></td>
			 </form>
				          
			 </table>";
	
}

@session_start();
$_SESSION['volta_mensa'] = ''; 

?>
<div align="center">
<?php
	$tp = ceil($tp);
	if($pc>1) {
		$anterior = $pc - 1;
		echo "<a href=\"?lista=$anterior\">[Anterior]</a>";
	}
	for($i=$pc-5;$i<$pc;$i++) {
		if($i<=0) {
		}
		else {
			echo "<a href=\"?lista=$i\">";
			if($i=="$pc") {
				echo "<b>[$i]</b>";
			}
			else {
				echo "[$i]";
			}
			echo "</a> ";
		}
	}
	for($i=$pc;$i<=$pc+5;$i++) {
		if($i==$tp) {
			echo "<a href=\"?lista=$i\">";
			if($i=="$pc") {
				echo "<b>[$i]</b>";
			}
			else {
				echo "[$i]";
			}

			echo "</a> ";
			break;
		}
		else {
			echo "<a href=\"?lista=$i\">";
			if($i=="$pc") {
				echo "<b>[$i]</b>";
			}
			else {
				echo "[$i]";
			}
			echo "</a> ";

			if($i==$pc+5 && $tp>$pc+5) {
				echo " ... <a href=\"?lista=$tp\">[$tp]</a>";
			}
		}
	}
	if($pc<$tp) {
		$proxima = $pc + 1;
		echo " <a href=\"?lista=$proxima\">[Próxima]</a>";
	}
}
?>
</div>
<?php
}else{
	
include("enaaurlnp.php");
	
}
?>

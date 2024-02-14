<?php
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Grid Editavel
 Criado em Data.....: 14/01/2009
 Ultima Atualização : 30/01/2009 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/
// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");

$nome3 = $_SESSION["nome_log"];

include("menu.php");

include_once('../sql_injection.php');

include("vaurls.php");

$deixar = acesso_url("GRID_CONF");

if ($deixar == "SIM"){


$titulo_tabela = "'CONTRIBUIÇÕES - EMPRESAS'";
?>

<html>
<head>
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
</head>

<style type=text/css>

body { background-image: url(<?="../".$logo_sis;?>);}

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
--></style> 

<body>
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

$tabela_1 = strtoupper('conf');

$consulta3 = "SELECT * FROM permissoes WHERE login = '". anti_sql_injection($nome3) ."' and tabela = '". anti_sql_injection($tabela_1) ."'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$per1       = @$row3["incluir"];
$per2       = @$row3["alterar"];
$per3       = @$row3["excluir"];
$per4       = @$row3["imprimir"];


$pathsaida = "../"."avaleht.php?servletjs2=20$$20";

// retorna uma pesquisa

// Resgata a Sessao
@session_start();
$Procura = strtoupper($_SESSION['Procura']);
$Opcao   = strtoupper($_SESSION['Opcao']);


//$sql  = "SELECT * FROM conf WHERE id >= 300000 ORDER BY id";
         

if ($empr == 1){

	if (!empty($Cod_Edif)){
	
	   $sql  = "SELECT * FROM conf WHERE CONFCOD = '". anti_sql_injection($Cod_Edif) ."' AND TOTAL != 0 ORDER BY str_to_date( VENCTO, '%d/%m/%Y')";
		
	}
	
	
}else{

if (empty($Opcao)){
	
   $Procura = 1; 
   $Opcao   = "CODIGO";
	
}
if ($Opcao == "CODIGO"){

   $sql  = "SELECT * FROM conf WHERE CONFCOD = '". anti_sql_injection($Procura) ."' ORDER BY CONFCOD ASC";
	
}
if (!empty($Acao)){

   $sql  = "SELECT * FROM conf WHERE id >= 300000 ORDER BY id ASC";
	
}

if (!empty($Cod_xx)){

   $sql  = "SELECT * FROM conf WHERE CONFCOD = '". anti_sql_injection($Cod_xx) ."' ORDER BY CONFCOD ASC";
	
}
if ($Opcao == 'EXCLUIDO'){
	
   $sql  = "SELECT * FROM conf WHERE CONFCOD = '". anti_sql_injection($Procura) ."' ORDER BY str_to_date( VENCTO, '%d/%m/%Y') ASC";
	
}
}

$faz = 1;

// Número de registros por página
$registros_pagina = "12";

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

	echo "
	
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
     <tr>
     <td>
     <?=include('incluir_grid.php');?>     
     
     
     <font face=arial><b>*** Registro Não Encontrado !!! ***</b>
     <table align=center>
     <form method='POST' action='incluir_grid.php?cod_incl=$Cod_Edif'>
     <td><input type=image name='Consulta' src='../imagens/botaoazul6.PNG'></td>
     </form> 

     <form method='POST' action='../edif/cadastro.php?Cod_xx=$Cod_Edif'>
     <td><input type=image name='voltar' src='../imagens/botaoazul9.PNG'></td>
     </form> 


     </table>
     </td>
     </tr>
     </table>
     </div>";
	
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

$negrita = 1;

       while ($linha = @mysql_fetch_array($resultado))
       {

		$id     = $linha["id"];
	    $Edit1  = $linha["CONFCOD"];
	    $Edit2  = $linha["VENCTO"];
	    $Edit3  = $linha["TOTAL"]; 
	    $Edit4 	= $linha["AGENCIA"];  
	    $Edit5 	= $linha["DESCRICAO"];
	    $Edit6 	= $linha["DAT_BAI"];

        if ($faz == 1){
           ?>
           
		   <td valign=top><b>COD</b>
		   <th><b>VENCTO</b>
		   <th><b>VALOR</b>
		   <th><b>AGENCIA</b>
		   <th><b>DESCRICAO</b>
		   <th><b>DAT_BAI</b>
		   <th>
		   <th>
           </td>
           
           <?php
           $faz = 0;
        }


					  if ($negrita==1){
		                 ?>	
		                 <tr> 
						 <td align='right'>  		  <font style=' font-family: Verdana; font-size: 12px;'><b><?=$Edit1;?></b>
						 <td align='right'>   		  <font style=' font-family: Verdana; font-size: 12px;'>   <?=$Edit2;?>
						 <td align='right'>  		  <font style=' font-family: Verdana; font-size: 12px;'>   <?=$Edit3;?>
						 <td align='center'>  		  <font style=' font-family: Verdana; font-size: 12px;'>   <?=$Edit4;?>
						 <td align='center'>  		  <font style=' font-family: Verdana; font-size: 12px;'>   <?=$Edit5;?>
						 <td align='center'>  		  <font style=' font-family: Verdana; font-size: 12px;'>   <?=$Edit6;?>
                         <td>
                         
                         <?php
                         if ($per2 == "SIM"){
                         ?>
                         
						 <A HREF='alterar_grid.php?Cod_2=<?=$id;?>'><img alt='Alterar' id='Image2' src='../imagens/editar.gif' border='0'></A><td>
						 
						 <?php
						 }
                         if ($per3 == "SIM"){
                         ?>
						 
						 <A HREF='excluir_grid.php?Cod_2=<?=$id;?>'><img alt='Excluir' id='Image3' src='../imagens/excluir.gif' border='0'></A>
						 
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
		                 <tr bgcolor="#C0C0C0"> 
						 <td align='right'>  		  <font style=' font-family: Verdana; font-size: 12px;'><b><?=$Edit1;?></b>
						 <td align='right'>  		  <font style=' font-family: Verdana; font-size: 12px;'>   <?=$Edit2;?>
						 <td align='right'>  		  <font style=' font-family: Verdana; font-size: 12px;'>   <?=$Edit3;?>
						 <td align='center'>  		  <font style=' font-family: Verdana; font-size: 12px;'>   <?=$Edit4;?>
						 <td align='center'>  		  <font style=' font-family: Verdana; font-size: 12px;'>   <?=$Edit5;?>
						 <td align='center'>  		  <font style=' font-family: Verdana; font-size: 12px;'>   <?=$Edit6;?>
                         <td  bgcolor="#FFFFFF">
                         
                         <?php
                         if ($per2 == "SIM"){
                         ?>
                         
						 <A HREF='alterar_grid.php?Cod_2=<?=$id;?>'><img alt='Alterar' id='Image2' src='../imagens/editar.gif' border='0'></A>
						 
						 
						 <?php
						 }
                         if ($per3 == "SIM"){
                         ?>
						 
						 <td  bgcolor="#FFFFFF">
						 <A HREF='excluir_grid.php?Cod_2=<?=$id;?>'><img alt='Excluir' id='Image3' src='../imagens/excluir.gif' border='0'></A>
						 
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
			
			<form method='POST' action='incluir_grid.php'>
			<td><input type=image name='Sair' src='../imagens/novo.gif'></td>
			</form>

			<form method='POST' action='consulta.php'>
			<td><input type=image name='Sair' src='../imagens/consultar.PNG'></td>
			</form>
			          
			</table>			 
		      
		      
		      
		     </table>
		     </td>
		     </tr>
		     </table>
		     </div>


			 <table border=0  align=center>
			 <tr align=center colspan=2>"; 
				
if ($empr == 1){
			  

            echo "
				
			 <form method='POST' action='../edif/cadastro.php?Cod_xx=$Cod_Edif'>
			 <td><input type=image name='Sair' src='../imagens/botaoazul24.PNG'></td>
			 </form>";

}else{
	
	
            echo "
				
			 <form method='POST' action='$pathsaida'>
			 <td><input type=image name='Sair' src='../imagens/botaoazul24.PNG'></td>
			 </form>";
	
	
}


			echo "	          
				          
			 </table>";
}else{
	
     echo "
		      
			<table border=0  align=left>
			<tr align=center colspan=2> 
			
			<form method='POST' action='consulta.php'>
			<td><input type=image name='Sair' src='../imagens/consultar.PNG'></td>
			</form>
			          
			</table>			 

			</table>			 
		    </table>
		    </td>
		    </tr>
		    </table>
		    </div>";
		   
		   
if ($empr == 1){
		    
	 echo "	    
            <table border=0  align=center>
		    <tr align=center colspan=2> 
			<form method='POST' action='../edif/cadastro.php?Cod_xx=$Cod_Edif'>
			<td><input type=image name='Sair' src='../imagens/botaoazul24.PNG'></td>
			</form>
			</table>";
}else{
	
	 echo "	    
            <table border=0  align=center>
		    <tr align=center colspan=2> 
			<form method='POST' action='$pathsaida'>
			<td><input type=image name='Sair' src='../imagens/botaoazul24.PNG'></td>
			</form>
			</table>";
	
	
	
}	
		
}

?>
<div align="center">
<?php
	$tp = ceil($tp);
	if($pc>1) {
		$anterior = $pc - 1;
		echo "<a href=mostra_grid.php?lista=$anterior>[Anterior]</a>";
	}
	for($i=$pc-5;$i<$pc;$i++) {
		if($i<=0) {
		}
		else {
			echo "<a href=mostra_grid.php?lista=$i>";
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
			echo "<a href=mostra_grid.php?lista=$i>";
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
			echo "<a href=mostra_grid.php?lista=$i>";
			if($i=="$pc") {
				echo "<b>[$i]</b>";
			}
			else {
				echo "[$i]";
			}
			echo "</a> ";

			if($i==$pc+5 && $tp>$pc+5) {
				echo " ... <a href=mostra_grid.php?lista=$tp>[$tp]</a>";
			}
		}
	}
	if($pc<$tp) {
		$proxima = $pc + 1;
		echo " <a href=mostra_grid.php?lista=$proxima>[Próxima]</a>";
	}
	}
?>

</div>
<?php
}else{
	
include("enaaurlnp.php");
	
}
?>

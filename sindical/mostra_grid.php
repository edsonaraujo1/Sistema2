<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Grid Editavel
 Criado em Data.....: 14/01/2009
 Ultima Atualiza��o : 30/01/2009 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/
// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");

$nome3 = $_SESSION["nome_log"];

include("menu.php");

include("vaurls.php");

$deixar = acesso_url("GRID_SINDICAL");

if ($deixar == "SIM"){


$titulo_tabela = "'SINDICAL - EMPRESAS'";
?>

<html>
<head>
<title><?=$titulo_tabela;?></title>
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

<?

// Abre Conex�o com o MySql
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
     <font face=arial><b>*** N�o foi possivel conectar !!! ***</b>
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
     <font face=arial><b>*** N�o Foi possivel selecionar o banco de dados !!! ***</b>
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

$consulta3 = "SELECT * FROM tt_ser_01 Where login = '$nome3'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$edi1       = @$row3["edi1"];
$edi2       = @$row3["edi2"];
$edi3       = @$row3["edi3"];


$pathsaida = "../"."avaleht.php?servletjs2=20$$20";

// retorna uma pesquisa

// Resgata a Sessao
session_start();
$Procura = strtoupper($_SESSION['Procura']);
$Opcao   = strtoupper($_SESSION['Opcao']);

$sql  = "SELECT * FROM sindical WHERE id >= 150000 ORDER BY id";
         

if ($empr == 1){

	if (!empty($Cod_Edif)){
	
	   $sql  = "SELECT * FROM sindical WHERE SINDCOD = '". anti_sql_injection($Cod_Edif) ."' AND TOTAL != 0 ORDER BY str_to_date( VENCTO, '%d/%m/%Y')";
		
	}
	
	
}else{


if (!empty($Opcao)){
}else{
	
   $Procura = 1; 
   $Opcao   = "CODIGO";
	
}
if ($Opcao == "CODIGO"){

   $sql  = "SELECT * FROM sindical WHERE id >= 150000 ORDER BY id";
	
}
if (!empty($Acao)){

   $sql  = "SELECT * FROM sindical WHERE id >= 150000 ORDER BY id";
	
}
}

$faz = 1;

// N�mero de registros por p�gina
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

$resultado = mysql_query("$sql LIMIT $inicio, $registros_pagina");

$todos = mysql_query("$sql");

$tr = mysql_num_rows($todos);

$tp = $tr / $registros_pagina;

if(mysql_num_rows($resultado) < 1) {

	echo "
	
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
     <tr>
     <td>
     <?=include('incluir_grid.php');?>     
     
     
     <font face=arial><b>*** Registro N�o Encontrado !!! ***</b>
     <table align=center>
     <form method='POST' action='incluir_grid.php'>
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

       while ($linha = mysql_fetch_array($resultado))
       {

		$id     = $linha["id"];
	    $Edit1  = $linha["SINDCOD"];
	    $Edit2  = $linha["TOTAL"];
	    $Edit3  = $linha["VENCTO"]; 
	    $Edit4 	= $linha["EXER"];  
	    $Edit5 	= $linha["DESCRICAO"];
	    $Edit6 	= $linha["PAGTO"];

        if ($faz == 1){
           ?>
           
		   <td valign=top><b>COD</b>
		   <th><b>VALOR</b>
		   <th><b>VENCTO</b>
		   <th><b>EXER</b>
		   <th><b>DESCRICAO</b>
		   <th><b>PAGTO</b>
		   <th>
		   <th>
           </td>
           
           <?
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
                         
                         <?
                         if ($edi2 == "SIM"){
                         ?>
                         
						 <A HREF='alterar_grid.php?Cod_2=<?=$id;?>'><img alt='Alterar' id='Image2' src='../imagens/editar.gif' border='0'></A><td>
						 
						 <?
						 }
                         if ($edi3 == "SIM"){
                         ?>
						 
						 <A HREF='excluir_grid.php?Cod_2=<?=$id;?>'><img alt='Excluir' id='Image3' src='../imagens/excluir.gif' border='0'></A>
						 
						 <?
						 }
						 ?>
						 
						 </font>
						 </td>
						 <? 
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
                         
                         <?
                         if ($edi2 == "SIM"){
                         ?>
                         
						 <A HREF='alterar_grid.php?Cod_2=<?=$id;?>'><img alt='Alterar' id='Image2' src='../imagens/editar.gif' border='0'></A>
						 
						 
						 <?
						 }
                         if ($edi3 == "SIM"){
                         ?>
						 
						 <td  bgcolor="#FFFFFF">
						 <A HREF='excluir_grid.php?Cod_2=<?=$id;?>'><img alt='Excluir' id='Image3' src='../imagens/excluir.gif' border='0'></A>
						 
						 <?
						 }
						 ?>
						 </font>
						 </td>
						 <? 
			             $conta_p = $conta_p + 1;
			             $rec_nu = $rec_nu + 1;
	                    
						 $negrita = 1;		            
			             }
                         ?> 
			             <?
					     $conta_p = 0;		
				         }


if ($edi1 == "SIM"){
                      
     echo "
		      
			<table border=0  align=left>
			<tr align=center colspan=2> 
			
			<form method='POST' action='incluir_grid.php'>
			<td><input type=image name='Sair' src='../imagens/novo.gif'></td>
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
<?
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
		echo " <a href=\"?lista=$proxima\">[Pr�xima]</a>";
	}
		}
?>
</div>
<?
}else{
	
include("enaaurlnp.php");
	
}
?>
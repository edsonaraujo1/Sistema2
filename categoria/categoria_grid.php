<?php
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Grid Editavel
 Criado em Data.....: 14/01/2009
 Ultima Atualização : 14/01/2009 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/
// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

// include("../logar.php");

$nome3 = $_SESSION["nome_log"];

include("menu.php");

include_once("funcoes2.php");

$deixar_1 = acesso("FORM_CATEG");

if ($deixar_1 == "NAO"){
	
    echo "  <html>
			<head>
			<title>ERRO AO CONECTAR</title>
            <link rel='shortcut icon' href='../imagens/favicon.ico'/>
			</head>
			<body>
			<style type=text/css>
			body { background-image: url('../$logo_sis');
                   background-attachment: fixed }
            </style> 
			</html>
			<br><br><br><br>
			<div align=center>
			<table align=center border='15' bgcolor='#FFFFFF'  bordercolor ='$color_bor'>
			<tr>
			<td align=center>
			     <font face=arial><b>*** ERRO ACESSO NÃO PERMITIDO PARA USUARIO !!! ***<br>
				                     Entre em Contato com o Administrador do Programa <br>
									 erro: TENTATIVA DE ACESSO</b>
			<table align=center>
			<form method='POST' action='../index.php'>
			<td><input type=image name='voltar' src='../imagens/botao_voltar.PNG'></td>
			</form></table></td></tr></table>
			</div>";
	        exit();
}	

$titulo_tabela = "Tabela 'CATEG'";
?>

<html>
<head>
<title><?php echo $Titulo ?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
</head>

<style type=text/css>

body { background-image: url(<?php echo "../".$logo_sis ?>);}

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

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
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

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
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

$pathsaida = "../avaleht.php?servletjs2=20$$20";

// retorna uma pesquisa

// Resgata a Sessao
session_start();
$Procura = strtoupper($_SESSION['Procura']);
$Opcao   = strtoupper($_SESSION['Opcao']);


$sql  = "SELECT * FROM categ ORDER BY codigo ASC";
   
if (!empty($Opcao)){
}else{
	
   $Procura = 1; 
   $Opcao   = "CODIGO";
	
}
if ($Opcao == "CODIGO"){

   $sql  = "SELECT * FROM categ ORDER BY codigo ASC";
	
}
if (!empty($Acao)){

   $sql  = "SELECT * FROM categ ORDER BY codigo ASC";
	
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

$resultado = mysql_query("$sql LIMIT $inicio, $registros_pagina");

$todos = mysql_query("$sql");

$tr = mysql_num_rows($todos);

$tp = $tr / $registros_pagina;

if(mysql_num_rows($resultado) < 1) {

	echo "
	
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Registro Não Encontrado !!! ***</b>
     <table align=center>
     <form method='POST' action='../avaleht.php?servletjs2=20$$20'>
     <td><input type=image name='Consulta' src='../imagens/botao_voltar.PNG'></td>
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

		$Edit1      = $linha["id"];
		$Edit2	  	= $linha["CODIGO"];
		$Edit3 	    = $linha["DATA"];
	    $Edit4  	= $linha["DESCRICAO"];
	    $semana1  	= $linha["SEMANA1"];
	    $semana2  	= $linha["SEMANA2"];
	    $semana3  	= $linha["SEMANA3"];
	    $semana4  	= $linha["SEMANA4"];
	    $semana5  	= $linha["SEMANA5"];
	    $semana6  	= $linha["SEMANA6"];
	    $semana7  	= $linha["SEMANA7"];
	    $semana8  	= $linha["campo1"];

        if ($faz == 1){
           ?>
           
		   <td valign=top><b>COD</b>
		   <th><b>DATA</b>
		   <th><b>DESCRICAO</b>
		   </td>
           
           <?php
           $faz = 0;
        }


					  if ($negrita==1){
		                 ?>	
		                 <tr> 
						 <td align='center'>           <font style=' font-family: Verdana; font-size: 12px;'><b><?php echo $Edit2 ?></b>
						 <td align='left'>            <font style=' font-family: Verdana; font-size: 12px;'>   <?php echo $Edit3 ?>
						 <td align='center'>   		  <font style=' font-family: Verdana; font-size: 12px;'>   <?php echo $Edit4 ?>
                         <td>
						 <A HREF='incluir_categoria.php?Cod_2=$cod'><img alt='Incluir' id='Image1' src='../imagens/b_insrow.png' border='0'></A><td>
						 <A HREF='alterar_categoria.php?Cod_2=<?php echo $Edit2 ?>'><img alt='Alterar' id='Image2' src='../imagens/b_edit.png' border='0'></A><td>
						 <A HREF='excluir_categoria.php?Cod_2=<?php echo $Edit2 ?>'><img alt='Excluir' id='Image3' src='../imagens/b_drop.png' border='0'></A>
						 </font>
						 </td>
						 <?php 
			             $conta_p = $conta_p + 1;
			             $rec_nu = $rec_nu + 1;
	                    
						 $negrita = 0;		            
			             }else{
			             ?>	
		                 <tr bgcolor="#C0C0C0"> 
						 <td align='center'>           <font style=' font-family: Verdana; font-size: 12px;'><b><?php echo $Edit2 ?></b>
						 <td align='left'>            <font style=' font-family: Verdana; font-size: 12px;'>   <?php echo $Edit3 ?>
						 <td align='center'>   		  <font style=' font-family: Verdana; font-size: 12px;'>   <?php echo $Edit4 ?>
                         <td>
						 <A HREF='incluir_categoria.php?'>                <img alt='Incluir' id='Image1' src='../imagens/b_insrow.png' border='0'></A><td>
						 <A HREF='alterar_categoria.php?Cod_2=<?php echo $Edit2 ?>'><img alt='Alterar' id='Image2' src='../imagens/b_edit.png' border='0'></A><td>
						 <A HREF='excluir_categoria.php?Cod_2=<?php echo $Edit2 ?>'><img alt='Excluir' id='Image3' src='../imagens/b_drop.png' border='0'></A>
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
	}

     echo "
		      
		     </table>
		     </td>
		     </tr>
		     </table>
		     </div>


	<table border=0  align=center>
	<tr align=center colspan=2> 
	
	<form method='POST' action='../avaleht.php?servletjs2=20$$20'>
	<td><input type=image name='Sair' src='../imagens/botaoazul24.PNG'></td>
	</form>
	          
	</table>			 

";


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
?>
</div>

<?php
?>
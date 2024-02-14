<?
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
session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");

$nome3 = $_SESSION["nome_log"];

include("menu.php");

include("vaurls.php");

$deixar = acesso_url("GRID_MENSALIDADE");

if ($deixar == "SIM"){


$titulo_tabela = "'DEPENDENTES - TABELAS'";
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


$pathsaida = "../"."index.php";

$var_w2  = strtoupper($var_w1);
$soc1    = "SIM";
$soc2    = "SIM";
$soc3    = "SIM";

// retorna uma pesquisa

// Resgata a Sessao
session_start();
$Procura = strtoupper($_SESSION['Procura']);
$Opcao   = strtoupper($_SESSION['Opcao']);

$sql  = "SELECT * FROM dep_clube WHERE login = '$var_w2' ORDER BY tabela ASC";

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

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
     <tr>
     <td>
     <?=include('incluir_grid.php');?>     
     
     
     <font face=arial><b>*** Nenhuma Dependente Cadastrado !!! ***</b>
     <table align=center>
     <form method='POST' action='incluir_grid.php?var_w2=$var_w2'>
     <td><input type=image name='Consulta' src='../imagens/botaoazul6.PNG'></td>
     </form> 
     <form method='POST' action='../clube/cadastro.php?Cod_xxx=$var_w2'>
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

       while ($linha = @mysql_fetch_array($resultado))
       {

		$id     = $linha["id"];
		$Edit1  = $linha["login"];
		$Edit2  = $linha["tabela"];
		$Edit3  = $linha["incluir"];
		$Edit4  = $linha["alterar"];
		$Edit5  = $linha["excluir"];
		$Edit6  = $linha["imprimir"];

        if ($faz == 1){
           ?>
           
		   <td valign=top><b>LOGIN</b>
		   <th><b>TABELA</b>
		   <th><b>INCLUIR</b>
		   <th><b>ALTERAR</b>
		   <th><b>EXCLUIR</b>
		   <th><b>IMPRIMIR</b>
		   <th>
           </td>
           
           <?
           $faz = 0;
        }


					  if ($negrita==1){
		                 ?>	
		                 <tr> 
						 <td align='center'>  		  <font style=' font-family: Verdana; font-size: 12px;'><b><?=$Edit1;?></b>
						 <td align='right'>  		  <font style=' font-family: Verdana; font-size: 12px;'>   <?=$Edit2;?>
						 <td align='center'>  		  <font style=' font-family: Verdana; font-size: 12px;'>   <?=$Edit3;?>
						 <td align='center'>  		  <font style=' font-family: Verdana; font-size: 12px;'>   <?=$Edit4;?>
						 <td align='center'>  		  <font style=' font-family: Verdana; font-size: 12px;'>   <?=$Edit5;?>
						 <td align='center'>  		  <font style=' font-family: Verdana; font-size: 12px;'>   <?=$Edit6;?>
                         <td>
                         
                         <?
                         if ($soc2 == "SIM"){
                         ?>
                         
						 <A HREF='alterar_grid.php?Cod_2=<?=$id;?>'><img alt='Alterar' id='Image2' src='../imagens/editar.gif' border='0'></A><td>
						 
						 <?
						 }
                         if ($soc3 == "SIM"){
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
						 <td align='center'>  		  <font style=' font-family: Verdana; font-size: 12px;'><b><?=$Edit1;?></b>
						 <td align='right'>  		  <font style=' font-family: Verdana; font-size: 12px;'>   <?=$Edit2;?>
						 <td align='center'>  		  <font style=' font-family: Verdana; font-size: 12px;'>   <?=$Edit3;?>
						 <td align='center'>  		  <font style=' font-family: Verdana; font-size: 12px;'>   <?=$Edit4;?>
						 <td align='center'>  		  <font style=' font-family: Verdana; font-size: 12px;'>   <?=$Edit5;?>
						 <td align='center'>  		  <font style=' font-family: Verdana; font-size: 12px;'>   <?=$Edit6;?>
                         <td  bgcolor="#FFFFFF">
                         
                         <?
                         if ($soc2 == "SIM"){
                         ?>
                         
						 <A HREF='alterar_grid.php?Cod_2=<?=$id;?>'><img alt='Alterar' id='Image2' src='../imagens/editar.gif' border='0'></A>
						 
						 
						 <?
						 }
                         if ($soc3 == "SIM"){
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


if ($soc1 == "SIM"){
                      
     echo "
		      
			<table border=0  align=left>
			<tr align=center colspan=2> 
			
			<form method='POST' action='incluir_grid.php?var_w2=$var_w2'>
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
				
			 <form method='POST' action='../senha/cadsenha.php?Cod_xxx=$var_w2'>
			 <td><input type=image name='Sair' src='../imagens/botaoazul24.PNG'></td>
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
			<form method='POST' action='../senha/cadsenha.php?Cod_xxx=$var_w2'>
			<td><input type=image name='Sair' src='../imagens/botaoazul24.PNG'></td>
			</form>
			</table>";
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
		echo " <a href=\"?lista=$proxima\">[Próxima]</a>";
	}
	}	
?>
</div>
<?
}else{
	
include("enaaurlnp.php");
	
}
?>
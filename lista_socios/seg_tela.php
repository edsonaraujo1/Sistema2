<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Segunda tela Grid Editavel
 Criado em Data.....: 14/01/2009
 Ultima Atualização : 21/01/2009 

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

$deixar = acesso_url("FORM_LIS_SIND");

if ($deixar == "SIM"){


$titulo_tabela = "2ª Tela de 'Funcionarios' - ".$cod_2;
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

// retorna uma pesquisa

// Resgata a Sessao
session_start();
$Procura = strtoupper($_SESSION['Procura']);
$Opcao   = strtoupper($_SESSION['Opcao']);

if(empty($cod_2)){

  $cod_2   = $_SESSION['lista_soc'];
	
}
if(empty($proc_2)){

  $proc_2  = $_SESSION['id_PROC'];
	
}


$sql  = "SELECT * FROM lis_fun_sind2  WHERE cnpj = '$cod_2'";
   
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
     <td><center>
     <font face=arial><b>*** Não existe Funcionario para esse CNPJ !!! ***</b>
     <table align=center>
     <form method='POST' action='incluir_segt.php?cod_7=$cod_2'>
     <td><input type=image name='Voltar' src='../imagens/botaoazul6.PNG'></td>
     </form> 

     <form method='POST' action='cadastro.php?cod_7=$cod_2'>
     <td><input type=image name='Voltar' src='../imagens/botao_voltar.PNG'></td>
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


        $idg        = $linha["id"];
        $Codigo     = $linha["codigo"];
		$Edit1g     = $linha["nome"];
		$Edit2g	  	= $linha["salario"];
		$Edit3g     = $linha["desconto"];

        $tot_sal    = $tot_sal + $Edit2g;
        $tot_des    = $tot_des + $Edit3g;
        
        if ($faz == 1){
           ?>
           
		   <td valign=top><b>Codigo</b>
		   <th><b>Funcionario</b>
		   <th><b>Salario</b>
		   <th><b>Desconto</b>
		   </td>
          
           <?
           $faz = 0;
        }


					  if ($negrita==1){
		                 ?>	
		                 <tr> 
						 <td align='center'>  <font style=' font-family: Verdana; font-size: 12px;'><b><?=$Codigo;?></b>
						 <td align='left'>    <font style=' font-family: Verdana; font-size: 12px;'>   <?=$Edit1g;?>
						 <td align='right'>    <font style=' font-family: Verdana; font-size: 12px;'>   <?=$Edit2g;?>
						 <td align='right'>    <font style=' font-family: Verdana; font-size: 12px;'>   <?=$Edit3g;?>
                         <td>
						 <A HREF='alterar_segt.php?Cod_2=<?=$idg;?>'><img alt='Alterar' id='Image2' src='../imagens/editar.gif' border='0'></A><td>
						 <A HREF='excluir_segt.php?Cod_2=<?=$idg;?>'><img alt='Excluir' id='Image3' src='../imagens/excluir.gif' border='0'></A>
						 </font>
						 </td>
						 <? 
			             $conta_p = $conta_p + 1;
			             $rec_nu = $rec_nu + 1;
	                    
						 $negrita = 0;		            
			             }else{
			             ?>	
		                 <tr bgcolor="#C0C0C0"> 
						 <td align='center'>  <font style=' font-family: Verdana; font-size: 12px;'><b><?=$Codigo;?></b>
						 <td align='left'>    <font style=' font-family: Verdana; font-size: 12px;'>   <?=$Edit1g;?>
						 <td align='right'>    <font style=' font-family: Verdana; font-size: 12px;'>   <?=$Edit2g;?>
						 <td align='right'>    <font style=' font-family: Verdana; font-size: 12px;'>   <?=$Edit3g;?>
                         <td bgcolor="#FFFFFF">
						 <A HREF='alterar_segt.php?Cod_2=<?=$idg;?>'><img alt='Alterar' id='Image2' src='../imagens/editar.gif' border='0'></A>
						 <td bgcolor="#FFFFFF">
						 <A HREF='excluir_segt.php?Cod_2=<?=$idg;?>'><img alt='Excluir' id='Image3' src='../imagens/excluir.gif' border='0'></A>
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
	
?>


		                 <tr> 
						 <td align='center'>  <font style=' font-family: Verdana; font-size: 12px;'></b>
						 <td align='right'>   <font style=' font-family: Verdana; font-size: 12px;'><b>Total.:</b>
						 <td align='right'>    <font style=' font-family: Verdana; font-size: 12px;'><b><?=number_format($tot_sal,2,",",".");?></b>
						 <td align='right'>    <font style=' font-family: Verdana; font-size: 12px;'><b><?=number_format($tot_des,2,",",".");?></b>
                         </tr>

<?

     echo "
     
			<table border=0  align=left>
			<tr align=center colspan=2> 
			
			<form method='POST' action='incluir_segt.php?cod_6=$proc_2&cod_7=$cod_2'>
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
				
			 <form method='POST' action='cadastro.php?cod_7=$cod_2'>
			 <td><input type=image name='Sair' src='../imagens/botao_voltar.PNG'></td>
			 </form>
				          
			 </table>";


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

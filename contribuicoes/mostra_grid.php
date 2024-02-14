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
<!--.th {  font: 1px Arial, Helvetica, sans-serif}
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

$tabela_1 = strtoupper('gerador_conf');

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
$Procura  = strtoupper($_SESSION['Procura']);
$Opcao    = strtoupper($_SESSION['Opcao']);
$empr     = $_SESSION['empr'];
$Cod_Edif = $_SESSION['cod_incl'];

//echo "<br><br>".$Procura."<br>";
//echo $Opcao."<br>";
//echo $Cod_Edif."<br>";
//echo $empr."<br>";

//$sql  = "SELECT * FROM conf WHERE id >= 300000 ORDER BY id";

if ($empr == 1){

	@session_start();
	$_SESSION['empr'] = 1;

	if (!empty($Cod_Edif)){
	
	   $sql  = "SELECT * FROM gerador_conf WHERE COD = '". anti_sql_injection($Cod_Edif) ."' ORDER BY str_to_date( VENCTO, '%d/%m/%Y')";
		//echo 'entrei aqui';
	}else{
		
	   $sql  = "SELECT * FROM gerador_conf WHERE COD = '". anti_sql_injection($Procura) ."' ORDER BY str_to_date( VENCTO, '%d/%m/%Y')";
		//echo 'entrei aqui 2';
	}
	

	if (!empty($Acao)){
	
	   $sql  = "SELECT * FROM gerador_conf WHERE COD = '". anti_sql_injection($Cod_Edif) ."' ORDER BY str_to_date( VENCTO, '%d/%m/%Y') ASC";
		
	}
	
}else{

	@session_start();
	$_SESSION['empr'] = 0;

if (empty($Opcao)){
	
   $Procura = 1; 
   $Opcao   = "CODIGO";
	
}

if ($Opcao == "CODIGO"){

   $sql  = "SELECT * FROM gerador_conf WHERE COD = '". anti_sql_injection($Procura) ."' ORDER BY str_to_date( VENCTO, '%d/%m/%Y') ASC";
	
}
if (!empty($Acao)){

   $sql  = "SELECT * FROM gerador_conf WHERE COD = '". anti_sql_injection($Procura) ."' ORDER BY str_to_date( VENCTO, '%d/%m/%Y') ASC";
	
}

if (!empty($Cod_xx)){

   $sql  = "SELECT * FROM gerador_conf WHERE COD = '". anti_sql_injection($Procura) ."' ORDER BY str_to_date( VENCTO, '%d/%m/%Y') ASC";
	
}
if ($Opcao == 'EXCLUIDO'){
	
   $sql  = "SELECT * FROM gerador_conf WHERE COD = '". anti_sql_injection($Procura) ."' ORDER BY str_to_date( VENCTO, '%d/%m/%Y') ASC";
	
}
if ($Opcao == "CNPJ"){

    //echo 'entrei aqui no cnpj';
    
    $sql  = "SELECT * FROM gerador_conf WHERE CGC = '$Procura' ORDER BY str_to_date( VENCTO, '%d/%m/%Y') ASC";
}

if ($Opcao == "CONTRIBUICAO"){

    //echo 'entrei aqui no cnpj';
    
    $sql  = "SELECT * FROM gerador_conf WHERE controle = '$Procura' ORDER BY str_to_date( VENCTO, '%d/%m/%Y') ASC";
}

//if (!empty($Cod_Edif)){

//    $sql  = "SELECT * FROM gerador_conf WHERE COD = '$Cod_Edif' ORDER BY str_to_date( VENCTO, '%d/%m/%Y') ASC";
//}

//echo 'olha eu qui';
}

$resul_trans = @mysql_query($sql);
	
$rowtr = @mysql_fetch_array($resul_trans);

$id        = @$rowtr["controle"];
$cod_incl  = @$rowtr["COD"];
$cgc1      = @$rowtr["CGC"];
$cgc2      = @$rowtr["CGC"];


//echo "<br>id = ".$id."<br>";
//echo $cgc2."<br>";
//echo $cod_incl."<br>";

if (empty($id)){
	
	$sql2  = "SELECT * FROM edificios WHERE COD = '". anti_sql_injection($Cod_Edif)."'";

	$resul_trans2 = @mysql_query($sql2);
		
	$rowtr2 = @mysql_fetch_array($resul_trans2);
	
	$id        = @$rowtr2["controle"];
	$cod_incl  = @$rowtr2["COD"];
	$cgc1      = @$rowtr2["CGC"];
	//echo 'entrei aqui no primeiro<br>';

}else{

	$sql3  = "SELECT * FROM edificios WHERE COD = '$cod_incl'";

	$resul_trans3 = @mysql_query($sql3);
		
	$rowtr3 = @mysql_fetch_array($resul_trans3);
	
	$id        = @$rowtr3["controle"];
	$cod_incl  = @$rowtr3["COD"];
	$cgc1      = @$rowtr3["CGC"];
	//echo 'entrei aqui no segundo<br>'.$cgc1."<br>";
	
}
if (empty($cgc2)){
	
	$cgc2 = $cgc1;
}

//echo 'ultimo cgc '.$cgc1."<br>";
//echo 'ultimo cgc2 '.$cgc2;

$faz = 1;

// Número de registros por página
$registros_pagina = "50000";

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
     
     
     <font face=arial><b>*** Menhuma Contribuição Encontrado !!! ***</b>
     <table align=center>
     <form method='POST' action='incluir_grid.php?cod_incl3=$Cod_Edif'>
     <td><input type=image name='Consulta' src='../imagens/botaoazul6.PNG'></td>
     </form>";
	 
if ($empr == 1){
			  

            echo "
				
			 <form method='POST' action='../edif/cadastro.php?Cod_xx2=$Cod_Edif'>
			 <td><input type=image name='Sair' src='../imagens/botaoazul24.PNG'></td>
			 </form>";

}else{
	
	
            echo "
				
			 <form method='POST' action='$pathsaida'>
			 <td><input type=image name='Sair' src='../imagens/botaoazul24.PNG'></td>
			 </form>";
	
	
}
	  
    echo "

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
		  <td><b>$titulo_tabela CNPJ $cgc2</b></td> 
          <div align=center>

          <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
          <tr>
          <td>
          <table border='1' align=center>";

$negrita = 1;

       while ($linha = @mysql_fetch_array($resultado))
       {

		$id     = $linha["controle"];
	    $Edit1  = $linha["COD"];
	    $Edit2  = $linha["VENCTO"];
	    $Edit3  = $linha["CGC"]; 
	    $Edit4 	= $linha["TIPO_CONT"];  
	    $Edit5 	= $linha["SITUACAO"];
	    $Edit6 	= $linha["PRORROGA"];
	    $Edit7 	= $linha["VALOR"];
	    $Edit8 	= $linha["DATA_BAI"];
	    $Edit9  = $linha["EXEC"];
	    
	    if (empty($Edit6)){
	    	
	    	$Edit6 = "00/00/0000";
	    }

        if ($faz == 1){
           ?>
           
           <font size="1" face="Arial">
		   <td valign=top><b>Cod</b>
		   <th>Contribuição</th>
		   <th><b>Ano</b>
		   <th><b>Vencto</b>
		   <th><b>CNPJ</b>
		   <th><font color="#FF0000"><b>Tipo</b></font>
		   <th><b>Situação</b>
		   <th><b>Valor Pago</b>
		   <th>
		   <th>
		   <th>
		   <th>
           </td>
           </font>
           <?
           $faz = 0;
        }


					  if ($negrita==1){
		                 ?>	
		                 <tr> 
						 <td align='right'>  		  <font style=' font-family: Verdana; font-size: 12px;'><b><?=$Edit1;?></b>
						 <td align='right'>   		  <font style=' font-family: Verdana; font-size: 12px;'>   <?=$id;?>
						 <td align='right'>   		  <font style=' font-family: Verdana; font-size: 12px;'>   <?=$Edit9;?>
						 <td align='right'>   		  <font style=' font-family: Verdana; font-size: 12px;'>   <?=$Edit2;?>
						 <td align='right'>  		  <font style=' font-family: Verdana; font-size: 12px;'>   <?=$Edit3;?>
						 <td align='center'>  		  <font style=' font-family: Verdana; font-size: 12px;'>  <b><?=$Edit4;?></b> 
						 <td align='center'>  		  <font style=' font-family: Verdana; font-size: 12px;'>  <b><?=$Edit5;?></b>
						 <td align='right'>  		  <font style=' font-family: Verdana; font-size: 12px;'>   <?=$Edit7;?>
                         <td>
                         
                         <?
                         if ($per2 == "SIM"){
                         ?>
                         
						 <A HREF='alterar_grid.php?Cod_2=<?=$id;?>&cod_incl=<?=$Edit1;?>'><img alt='Alterar' id='Image2' src='../imagens/editar.gif' border='0'></A><td>
						 
						 <?
						 }
                         if ($per3 == "SIM"){
                         ?>
						 
						 <A HREF='cadastrar_grid.php?Acao=deletar&Cod_2=<?=$id;?>'><img alt='Excluir' id='Image3' src='../imagens/excluir.gif' border='0'></A><td>
						 
						 <?
						 }
                         if ($per4 == "SIM"){
                         ?>
						 
						 <A HREF='../boletos/conf_avul2_pdf.php?Cod_2=<?=$id;?>' target='new'><img alt='Imprimir' id='Image3' src='../imagens/printer.jpg' height='20' width='20' border='0'></A><td>

						 <A HREF='../boletos/conf_avul2_pdf.php?Cod_2=<?=$id;?>' target='new'><img alt='email' id='Image3' src='../imagens/email.jpg' height='20' width='25' border='0'></A>
						 
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
						 <td align='right'>   		  <font style=' font-family: Verdana; font-size: 12px;'>   <?=$id;?>
						 <td align='right'>   		  <font style=' font-family: Verdana; font-size: 12px;'>   <?=$Edit9;?>
						 <td align='right'>   		  <font style=' font-family: Verdana; font-size: 12px;'>   <?=$Edit2;?>
						 <td align='right'>  		  <font style=' font-family: Verdana; font-size: 12px;'>   <?=$Edit3;?>
						 <td align='center'>  		  <font style=' font-family: Verdana; font-size: 12px;'>  <b><?=$Edit4;?></b> 
						 <td align='center'>  		  <font style=' font-family: Verdana; font-size: 12px;'>  <b><?=$Edit5;?></b>
						 <td align='right'>  		  <font style=' font-family: Verdana; font-size: 12px;'>   <?=$Edit7;?>
                         <td  bgcolor="#FFFFFF">
                         
                         <?
                         if ($per2 == "SIM"){
                         ?>
                         
						 <A HREF='alterar_grid.php?Cod_2=<?=$id;?>&cod_incl=<?=$Edit1;?>'><img alt='Alterar' id='Image2' src='../imagens/editar.gif' border='0'></A><td   bgcolor="#FFFFFF">
						 
						 
						 <?
						 }
                         if ($per3 == "SIM"){
                         ?>
						 
						 <A HREF='cadastrar_grid.php?Acao=deletar&Cod_2=<?=$id;?>'><img alt='Excluir' id='Image3' src='../imagens/excluir.gif' border='0'></A><td   bgcolor="#FFFFFF">
						 
						 <?
						 }
                         if ($per4 == "SIM"){
                         ?>
						 
						 <A HREF='../boletos/conf_avul2_pdf.php?Cod_2=<?=$id;?>' target='new' ><img alt='Imprimir' id='Image3' src='../imagens/printer.jpg' height='20' width='20' border='0'></A><td>

						 <A HREF='../boletos/conf_avul2_pdf.php?Cod_2=<?=$id;?>' target='new'><img alt='email' id='Image3' src='../imagens/email.jpg' height='20' width='25' border='0'></A>
						 
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
	
if ($per1 == "SIM"){
                      
     echo "
		      
			<table border=0  align=left>
			<tr align=center colspan=2> 
			
			<form method='POST' action='incluir_grid.php?cod_incl3=$Edit1&crc=$cgc2'>
			<td><input type=image name='Sair' src='../imagens/novo.gif'></td>
			</form>";
			
	if ($empr == 1){		


	}else{
		
	     echo " <form method='POST' action='consulta.php'>
				<td><input type=image name='Sair' src='../imagens/consultar.PNG'></td>
				</form>";
				
	}			
		echo "		          
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
				
			 <form method='POST' action='../edif/cadastro.php?Cod_xx2=$Edit1'>
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
	
	
	if ($empr == 1){
		
		
	}else{
		

	     echo "
			      
				<table border=0  align=left>
				<tr align=center colspan=2> 
				
				<form method='POST' action='consulta.php'>
				<td><input type=image name='Sair' src='../imagens/consultar.PNG'></td>
				</form>
				          
				</table>";
		
	}	
			
	 echo " </table>			 
		    </table>
		    </td>
		    </tr>
		    </table>
		    </div>";
		   
		   
if ($empr == 1){
		    
	 echo "	    
            <table border=0  align=center>
		    <tr align=center colspan=2> 
			<form method='POST' action='../edif/cadastro.php?Cod_xx2=$Edit1'>
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
<?
}else{
	
include("enaaurlnp.php");
	
}
?>

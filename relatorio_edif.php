<?php
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Relatorio de Edificios no formato Excel
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/


// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);

include_once("logar.php");
$nome3  = $_SESSION["nome_log"];

$Titulo_rel2 = "Cadastro de Empresas Contribuintes";
$Pagina      = 1;
$conta_p     = 0;
$data_rel    = date("d/m/Y");


//include("menu.php");

include("vaurls.php");

$deixar = acesso_url("REL_EDIF");

if ($deixar == "SIM"){

?>
<html>
<head>
<title><?php echo $Titulo ?></title>
<link rel="shortcut icon" href="favicon.ico"/>
</head>
</html>
<?php
// Abre Conexão com o MySql
include("conexao.php");
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
     <td><input type=image name='consulta' src='imagens/botao_voltar.PNG'></td>
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
     <td><input type=image name='consulta' src='imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

// retorna uma pesquisa

//     1 ate  5000 OK
//  5001 ate 10000 OK 
// 10001 ate 15000 OK
// 15001 ate 20000 OK
// 20001 ate 25000 OK
// 25001 ate 30000
// 30001 ate 35000

$Cod_2a = $Cod_2 + 300;

$consulta  = "SELECT * FROM edificios WHERE id >= 25001 AND id <= 30000";

$resultado = @mysql_query($consulta)
        or 

die("
     <br>
     <br> 

     <div align=center>

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Registro Não Encontrado !!! ***</b>
     <table align=center>
     <form method='POST' action='cadedif.php'>
     <td><input type=image name='Consulta' src='imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

$faz = 1;
$negrita = 1;


     ?>	
     <td></td>
     <td><b><?php echo $Titulo ?></b></td><br/><br/>
     <td><b><?php echo $data_rel ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $Titulo_rel2 ?></b></td>

     <table border='0' bgcolor='#FFFFFF' bordercolor ='<?php echo $color_bor ?>'>
     <table border='0' >
     <?php	 
     while ($linha = @mysql_fetch_array($resultado))
       {
       	

		     $cod      = $linha["COD"];
			 $cond     = Trim($linha["COND"]);
			 $nome     = Trim($linha["NOME"]);
			 $rua      = $linha["RUA"];
			 $endereco = $linha["ENDERECO"];
			 $numero   = $linha["NUMERO"];
			 $bairro   = $linha["BAIRRO"];
			 $cep      = $linha["CEP"];
			 $adms     = $linha["ADM"];


	       	 // retorna uma pesquisa Sindical
	
			 $consultaZ  = "SELECT * FROM sindical WHERE SINDCOD = '$cod' AND EXER >= 2003 AND EXER <= 2008";
			
			 $resultadoZ = @mysql_query($consultaZ);
		
			 $rowZ       = @mysql_fetch_array($resultadoZ);
			
			 $Exercici   = @$rowZ["EXER"];
			 
			 if (!empty($Exercici)){
			 	

			     if ($faz == 1){
			        ?>
				    <td valign=top width=6px>     <b>Codigo</b>
					<td width=350px align="left">  <b>Nome</b>
					<td width=280px>               <b>Endereço</b>
					<td width=100px>               <b>Bairro</b>
					<th>                           <b>Adms</b></td>
			        <?php
			        $faz = 0;
			     }
	      
						  if ($negrita==1){
			                 ?>	
			                 <tr> 
							 <td align='right'>           <font style=' font-family: Verdana; font-size: 8px;'><b><?php echo $cod ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
							 <td align='left'>            <font style=' font-family: Verdana; font-size: 8px;'>   <?php echo $cond ?>&nbsp;&nbsp;<?php echo $nome ?>
							 <td>               		  <font style=' font-family: Verdana; font-size: 8px;'>   <?php echo $rua ?>&nbsp;&nbsp;<?php echo $endereco ?>,<?php echo $numero ?>
							 <td align='left'>  		  <font style=' font-family: Verdana; font-size: 8px;'>   <?php echo $bairro ?>
							 <td align='right'> 		  <font style=' font-family: Verdana; font-size: 8px;'>   <?php echo $adms ?>
							 </font>
							 </td>
							 <?php 
				             $conta_p = $conta_p + 1;
				             $rec_nu = $rec_nu + 1;
		                    
							 $negrita = 0;		            
				             }else{
				             ?>	
			                 <tr bgcolor="#C0C0C0"> 
				             <td align='right'>           <font style=' font-family: Verdana; font-size: 8px;'><b><?php echo $cod ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
							 <td align='left'>            <font style=' font-family: Verdana; font-size: 8px;'>   <?php echo $cond ?>&nbsp;&nbsp;<?php echo $nome ?>
							 <td>               		  <font style=' font-family: Verdana; font-size: 8px;'>   <?php echo $rua ?>&nbsp;&nbsp;<?php echo $endereco ?>,<?php echo $numero ?>
							 <td align='left'>  		  <font style=' font-family: Verdana; font-size: 8px;'>   <?php echo $bairro ?>
							 <td align='right'> 		  <font style=' font-family: Verdana; font-size: 8px;'>   <?php echo $adms ?>
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
	       <table border=0  >
	       <tr align=center colspan=2>  ";
           ?>
		   <table>
		   <tr>
		   <td style=' font-family: Verdana; font-size: 1px;  height:1px;' width:500px;><img height=1 src="imagens/2.gif" width=978 border=0>
		   </tr>
		   <tr>
		   <td style=' font-family: Verdana; font-size: 1px;  height:1px;' width:500px;><img height=1 src="imagens/2.gif" width=978 border=0>
		   </tr>
		   </table>
		   <td></td>
           <td>Total de Registros Pesquisado.:   <?php echo $rec_nu ?></td>
</div>
</body>

<?php
}else{
	
include("enaaurlnp.php");
	
}
?>
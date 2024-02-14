<?php
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Relatorio na Tela Socios
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

include_once("logar.php");
@session_start();
$nome3  = $_SESSION["nome_log"];

include("vaurls.php");

$deixar = acesso_url("REL_SOCIOS");

if ($deixar == "SIM"){

$Titulo_rel2 = "Cadastro de Associados";
$Pagina      = 1;
$conta_p     = 0;
$data_rel    = date("d/m/Y");

header('Content-type: application/vnd.ms-excel');
header('Content-type: application/force-download');
header('Content-Disposition: attachment; filename=rel_edif.xls');
header('Pragma: no-cache');

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

$link = @mysql_connect($host,$user,$pass) or

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

@mysql_select_db($db)  or

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

$Cod_2a = $Cod_2 + 300;

$consulta  = "SELECT * FROM socios WHERE COD >= 2 and COD <= 340  ORDER BY COD";

$resultado = @mysql_query($consulta)  or 

die("
     <br>
     <br> 

     <div align=center>

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Registro Não Encontrado !!! ***</b>
     <table align=center>
     <form method='POST' action='cadsocios.php'>
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
     <table border='1' >
     <?php	 
     while ($linha = @mysql_fetch_array($resultado))
       {

		     $cod      = $linha["COD"];
		     $nu       = $linha['NU'];
			 $nome     = Trim($linha["NOMEASSOC"]);
			 $rua      = $linha["RUA"];
			 $endereco = $linha["ENDRESID"];
			 $numero   = $linha["NUMERO"];
			 $bairro   = substr($linha["BAIRRORES"],1,25);
			 $cep      = $linha["CEPRES"];
			 $categ    = $linha["CATEGORIA"];


		     if ($faz == 1){
		        ?>
			    <td valign=top width=50px>     <b>Matricula</b>
				<td width=280px align="left">  <b>Nome Sócio</b>
				<td width=280px>               <b>Endereço</b>
				<td width=100px>               <b>Bairro</b>
				<td width=100px align="center"><b>Cep</b>
				<td>                           <b>Categ</b>
		        <?php
		        $faz = 0;
		     }
      
                       if ($negrita==1){ 
                         ?>
		                 <tr> 
			             <td  align='right'><font style=' font-family: Verdana; font-size: 8px;'><b><?php echo $cod ?><?php echo $nu ?>&nbsp;&nbsp;&nbsp;&nbsp;</b>
						 <td align='left'>            <font style=' font-family: Verdana; font-size: 8px;'>   <?php echo $cond ?>&nbsp;&nbsp;<?php echo $nome ?>
						 <td>               		  <font style=' font-family: Verdana; font-size: 8px;'>   <?php echo $rua ?>&nbsp;&nbsp;<?php echo $endereco ?>,<?php echo $numero ?>
						 <td align='left'>  		  <font style=' font-family: Verdana; font-size: 8px;'>   <?php echo $bairro ?>
						 <td align='center'>		  <font style=' font-family: Verdana; font-size: 8px;'>   <?php echo $cep ?>
						 <td align='center'> 		  <font style=' font-family: Verdana; font-size: 8px;'>   <?php echo $categ ?>
						 </font>
						 </td>
						 <?php 
			            $conta_p = $conta_p + 1;
			            $rec_nu = $rec_nu + 1;
			            
			            $negrita = 0;
			            }else{
                        ?>
		                 <tr bgcolor="#C0C0C0"> 
			             <td  align='right'><font style=' font-family: Verdana; font-size: 8px;'><b><?php echo $cod ?><?php echo $nu ?>&nbsp;&nbsp;&nbsp;&nbsp;</b>
						 <td align='left'>            <font style=' font-family: Verdana; font-size: 8px;'>   <?php echo $cond ?>&nbsp;&nbsp;<?php echo $nome ?>
						 <td>               		  <font style=' font-family: Verdana; font-size: 8px;'>   <?php echo $rua ?>&nbsp;&nbsp;<?php echo $endereco ?>,<?php echo $numero ?>
						 <td align='left'>  		  <font style=' font-family: Verdana; font-size: 8px;'>   <?php echo $bairro ?>
						 <td align='center'>		  <font style=' font-family: Verdana; font-size: 8px;'>   <?php echo $cep ?>
						 <td align='center'> 		  <font style=' font-family: Verdana; font-size: 8px;'>   <?php echo $categ ?>
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

     echo "
	        
	       </table>
	       </td>
	       </tr>
	       </table>
	       </div>
	       <table border=0  align=center>
	       <tr align=center colspan=2>  ";
           ?>
		   <table>
		   <tr>
		   <td style=' font-family: Verdana; font-size: 1px;  height:1px;' width:500px;><img height=1 src="imagens/2.gif" width=978 border=0/>
		   </tr>
		   <tr>
		   <td style=' font-family: Verdana; font-size: 1px;  height:1px;' width:500px;><img height=1 src="imagens/2.gif" width=978 border=0/>
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
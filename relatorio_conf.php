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

header('Content-type: application/vnd.ms-excel');
header('Content-type: application/force-download');
header('Content-Disposition: attachment; filename=rel_conf.xls');
header('Pragma: no-cache');

include_once("logar.php");
@session_start();
$nome3  = $_SESSION["nome_log"];

$Titulo_rel2 = "Cadastro de Empresas";
$Pagina      = 1;
$conta_p     = 0;
$data_rel    = date("d/m/Y");

//include("index.php");
?>
<html>
<head>
<title><?php echo $Titulo ?></title>
<link rel="shortcut icon" href="favicon.ico"/>
</head>
</html>
<?php
// Abre Conexão com o MySql
include_once("conexao.php");
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

$Cod_2a = $Cod_2 + 300;

//$consulta  = "SELECT * FROM edificios WHERE ADM = 64 ORDER BY COD";

$consulta = "SELECT `CONFCOD`,`TOTAL`,`PAGTO`,`VENCTO`,`AGENCIA` FROM `conf` WHERE `CONFCOD` = 191 AND `VENCTO` = '05/02/2009'  AND `AGENCIA` = 'SIND' ORDER BY `CONFCOD` ASC";

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

		     $Edit1    = $linha["CONFCOD"];
			 $Edit2    = $linha["TOTAL"];
			 $Edit3    = converte ($linha["PAGTO"],'BR','false');
			 $Edit4    = converte ($linha["VENCTO"],'BR','false');
			 $Edit5    = $linha["AGENCIA"];
			 $numero   = $linha["CEP"];
			 $bairro   = $linha["BAIRRO"];
			 $cep      = $linha["CEP"];
			 $adms     = $linha["ADM"];


		     if ($faz == 1){
		        ?>
			    <td valign=top width=6px>     <b>Codigo</b>
				<td width=350px align="left">  <b>Valor Pago</b>
				<td width=280px>               <b>Pagamento</b>
				<td width=100px>               <b>Vencimento</b>
				<td width=100px align="center"><b>Agencia</b>
				<th>                           <b></b></td>
		        <?php
		        $faz = 0;
		     }
      
					  if ($negrita==1){
		                 ?>	
		                 <tr> 
						 <td align='right'>           <font style=' font-family: Verdana; font-size: 8px;'><b><?php echo $Edit1 ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
						 <td align='left'>            <font style=' font-family: Verdana; font-size: 8px;'>   <?php echo $Edit2 ?>
						 <td>               		  <font style=' font-family: Verdana; font-size: 8px;'>   <?php echo $Edit3 ?>
						 <td align='left'>  		  <font style=' font-family: Verdana; font-size: 8px;'>   <?php echo $Edit4 ?>
						 <td align='center'>		  <font style=' font-family: Verdana; font-size: 8px;'>   <?php echo $Edit5 ?>
						 <td align='right'> 		  <font style=' font-family: Verdana; font-size: 8px;'>   <?php echo $Edit5 ?>
						 </font>
						 </td>
						 <?php 
			             $conta_p = $conta_p + 1;
			             $rec_nu = $rec_nu + 1;
	                    
						 $negrita = 0;		            
			             }else{
			             ?>	
		                 <tr bgcolor="#C0C0C0"> 
						 <td align='right'>           <font style=' font-family: Verdana; font-size: 8px;'><b><?php echo $Edit1 ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
						 <td align='left'>            <font style=' font-family: Verdana; font-size: 8px;'>   <?php echo $Edit2 ?>
						 <td>               		  <font style=' font-family: Verdana; font-size: 8px;'>   <?php echo $Edit3 ?>
						 <td align='left'>  		  <font style=' font-family: Verdana; font-size: 8px;'>   <?php echo $Edit4 ?>
						 <td align='center'>		  <font style=' font-family: Verdana; font-size: 8px;'>   <?php echo $Edit5 ?>
						 <td align='right'> 		  <font style=' font-family: Verdana; font-size: 8px;'>   <?php echo $Edit5 ?>
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

function converte ($data_ori,$tipo='BR',$hora='true'){
$data = explode(' ',$data_ori);
if ($tipo == 'BR'){
   $resul = explode("-",$data[0]);
   $resul = $resul[2].'/'.$resul[1].'/'.$resul[0];
}elseif ($tipo == 'EN'){
         $resul = explode("/",$data[0]);
         $resul = $resul[2].'-'.$resul[1].'-'.$resul[0];
}

if ($hora)
return $resul.' '.$data[1];
else
return $resul;
}


?>

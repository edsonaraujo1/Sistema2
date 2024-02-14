<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Relatorio de Vagas no formato Excel
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

header('Content-type: application/vnd.ms-excel');
header('Content-type: application/force-download');
header('Content-Disposition: attachment; filename=rel_vagas.xls');
header('Pragma: no-cache');

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

require("../logar.php");

$nome3  = $_SESSION["nome_log"];

$Titulo_rel2 = "Relatorio de Vagas Disponivel";
$Pagina      = 1;
$conta_p     = 0;
$data_rel    = date("d/m/Y");

//require("index.php");
?>
<html>
<head>
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
</head>


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

// retorna uma pesquisa

$Cod_2a = $Cod_2 + 300;

$consulta  = "SELECT * FROM vaga ORDER BY COD";

$resultado = @mysql_query($consulta)
        or 

die("
     <br>
     <br> 

     <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Registro Não Encontrado !!! ***</b>
     <table align=center>
     <form method='POST' action='cadvagas.php'>
     <td><input type=image name='Consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

			// Atualiza arquivo Log
			$data_log = date("d/m/Y");
			$hora_log = date("H:i:s"); 
			$even_log = $Titulo_rel2;
			
			$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
			             VALUES
			             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
			
			@mysql_query($consulta_log, $link);


$faz = 1;
$negrita = 1;

     ?>	
     <td></td>
     <td><b><?=$Titulo;?></b></td><br/><br/>
     <td><b><?=$data_rel;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$Titulo_rel2;?></b></td>

     <table border='0' bgcolor='#FFFFFF' bordercolor ='<?=$color_bor;?>'>
     <table border='0' >
     <?	 
     while ($linha = @mysql_fetch_array($resultado))
       {


		     $id       = $linha["COD"];
			 $cod      = $linha["DATA"];
			 $cpf      = $linha["FUNCAO"];
			 $cond     = $linha["NOME"];
			 $nome     = $linha["ENDERECO"];
			 $rua      = $linha["TELEFONE"];
			 $endereco = $linha["CONTATO"];
			 $numero   = $linha["OBS"];
			 $qtd      = $linha["QTD"];
			 
			 if ($qtd == 0){
			 	$desc = "Vaga Preenchida";
			 }else{
			 	$desc = "Vaga Disponivel";
			 }

		     if ($faz == 1){
		        ?>
		        
                <td align='left' width=150px><b>COD</b>
				<td width=18px align='left'><b>DATA</b>
				<td width=14px align='left'><b>FUNCAO</b>
				<td width=14px align='center'><b>QTD</b>
				<td width=45px align='left'><b>NOME</b>
				<td align='left'><b>ENDERECO</b>
				<td align='center'><b>Obs</b></td>		        
		        
		        <?
		        $faz = 0;
		     }
      
					  if ($negrita==1){
		                 ?>	
		                 
		                 <tr> 
			             <td align='right'>  <font style=' font-family: Verdana; font-size: 8px;'><b><?=$id;?></b>
						 <td align='left'>   <font style=' font-family: Verdana; font-size: 8px;'><?=$cod;?>
						 <td align='left'>   <font style=' font-family: Verdana; font-size: 8px;'><b><?=$cpf;?></b>
						 <td align='center'> <font style=' font-family: Verdana; font-size: 8px;'><?=$qtd;?>
						 <td align='left'>   <font style=' font-family: Verdana; font-size: 8px;'><?=$cond;?>
						 <td align='left'>   <font style=' font-family: Verdana; font-size: 8px;'><?=$nome;?>
						 <td align='center'> <font style=' font-family: Verdana; font-size: 8px;'><?=$numero;?></td> 
		                 
						 </font>
						 </td>
						 <? 
			             $conta_p = $conta_p + 1;
			             $rec_nu = $rec_nu + 1;
	                    
						 $negrita = 0;		            
			             }else{
			             ?>	
		                 <tr bgcolor="#C0C0C0"> 
			             <td align='right'>   <font style=' font-family: Verdana; font-size: 8px;'><b><?=$id;?></b>
						 <td align='left'>   <font style=' font-family: Verdana; font-size: 8px;'><?=$cod;?>
						 <td align='left'>   <font style=' font-family: Verdana; font-size: 8px;'><b><?=$cpf;?></b>
						 <td align='center'> <font style=' font-family: Verdana; font-size: 8px;'><?=$qtd;?>
						 <td align='left'>   <font style=' font-family: Verdana; font-size: 8px;'><?=$cond;?>
						 <td align='left'>   <font style=' font-family: Verdana; font-size: 8px;'><?=$nome;?>
						 <td align='center'> <font style=' font-family: Verdana; font-size: 8px;'><?=$numero;?></td> 
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
		   <td style=' font-family: Verdana; font-size: 1px;  height:1px;' width:500px;><img height=1 src="../imagens/2.gif" width=978 border=0>
		   </tr>
		   <tr>
		   <td style=' font-family: Verdana; font-size: 1px;  height:1px;' width:500px;><img height=1 src="../imagens/2.gif" width=978 border=0>
		   </tr>
		   </table>
		   <td></td>
           <td>Total de Registros Pesquisado.:   <?=$rec_nu;?></td>
</div>
</body>
</html>

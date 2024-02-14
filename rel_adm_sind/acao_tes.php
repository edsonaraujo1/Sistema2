<?
/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Operador Aplicativos
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");

$nome3 = $_SESSION["nome_log"];

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

$receber      = $_POST['recerber'];

Switch ($receber){

	Case 1: // Relatorio HTML

		$Titulo_rel2 = "Relatorio de Pagamentos de Sindical da Administradora";
		$Pagina      = 1;
		$conta_p     = 0;
		$dat_rel     = $hora = date("d/m/Y"); 
		$tot_cod_fim = 0;
		//include("index.php");
		
		?>
		
		<html>
		<head>
		<title><?=$Titulo;?></title>
		</head>
		<body bgcolor="#FFFFFF">
		</html>
		
		<?
		
		$codigo      = $_POST['Edit1'];
		$venc_x1     = $_POST['Edit2'];

		// Abrir Table de Adms
		
		$consulta4  = "SELECT * FROM adms Where cod = '$codigo'";
		
		$resultado4 = @mysql_query($consulta4);
		
		$row4 = @mysql_fetch_array($resultado4);
		
		$cod_adm   = @$row4["cod"];
		$cond      = trim(@$row4["nomeadm"]);
		$cgc       = trim(@$row4["cgc"]);
		
		if (!empty($cgc)){
			$cgc1 = $cgc;
		}else{
			$cgc1 = " ";
		}
		// retorna uma pesquisa
		
		$consulta  = "SELECT * FROM edificios WHERE ADM = '$cod_adm'";
		
		$resultado = @mysql_query($consulta);
				
		$faz = 1;
		
		echo "
		
		     <table border=0  align=center>
		     <tr align=center colspan=2> 
		     <form method='POST' action='rel_frm.php'>
		     <td>";
		?>	
		     <div align='left'>
			 <table  border=0  collspan='2' height=3px align='left' >
			 <tr>
			 <td style=' font-family: Verdana; font-size: 1px;  height:1px;' width:500px;><img height=1 src="../imagens/2.gif" width=978 border=0>
			 </tr>
			 <tr>
			 <td style=' font-family: Verdana; font-size: 1px;  height:1px;' width:500px;><img height=1 src="../imagens/2.gif" width=978 border=0>
			 <table  border=0  collspan='2' align='left' >
			 <td width=500px >
			 <font style=' font-family: Verdana; font-size: 10px;'><?=$Titulo;?></font>
			 </td>
			 <td width=473px align='right'>
			 <font style=' font-family: Verdana; font-size: 10px;'>Data.:<?=$dat_rel;?></font>
			 </td>
			 </table>
			 <tr>
			 <td style=' font-family: Verdana; font-size: 1px;  height:1px;' width:500px;><img height=1 src="../imagens/2.gif" width=978 border=0>
			 </tr>
			 <tr>
			 <td style=' font-family: Verdana; font-size: 1px;  height:1px;' width:500px;><img height=1 src="../imagens/2.gif" width=978 border=0>
			 <table  border=0  collspan='3' align='center' >
			 <td width=800px align='center'>
			 <b><?=$Titulo_rel2;?><br/><br/>
			 <?=$cod_adm;?> - <?=$cond;?>  -  <?=$cgc1;?> </b>
			 </td>
			 </table>
			 <tr>
			 <td style=' font-family: Verdana; font-size: 1px;  height:1px;' width:500px;><img height=1 src="../imagens/2.gif" width=978 border=0>
			 </tr>
			 <tr>
			 <td style=' font-family: Verdana; font-size: 1px;  height:1px;' width:500px;><img height=1 src="../imagens/2.gif" width=978 border=0>
			 </tr>
			 </table>
		     </div>
			 <input type=image name='incluir' src='../imagens/botao_voltar.PNG'></td>
		     </form>
		     <div align=center>
		     <table align=center border='0' bgcolor='#FFFFFF' bordercolor ='<?=$color_bor;?>'>
		     <tr>
		     <td>
		     <table border='1' align=center>
		<?	 
		     while ($linha = mysql_fetch_array($resultado))
		       {
		
				    $id_conf   = $linha["id"];
					$cod       = $linha["COD"];
					$nome      = ltrim($linha["COND"]).ltrim($linha["NOME"]);
					$rua       = trim(strtoupper($linha["RUA"]));
					$endereco  = trim(strtoupper($linha["ENDERECO"]));
					$numero    = trim(strtoupper($linha["NUMERO"]));
					$categoria = $linha["ATIV"];
					$adm       = $linha["ADM"];



                     //--- Consulta Contribuicoes
                     
                     
					$consulta4x  = "SELECT * FROM sindical WHERE SINDCOD = '$cod' AND VENCTO = '$venc_x1'";
					                     
					$resultado4x = @mysql_query($consulta4x);
							
					$row4x = @mysql_fetch_array($resultado4x);
							
					$tot_cod = @$row4x["TOTAL"];
					
					if (!empty($tot_cod)){
						
						$tipg = "Pago";
					}else{
						
						$tipg = "<font color='#FF0000'>Não Pago</font>";
						$tot_cod = "0.00";
					}
					
					$tot_cod_fim = $tot_cod_fim + $tot_cod;
                     
                     //BREAK;

				     if ($faz == 1){
				        ?>
					    <td valign=top width=75px align="center"><b>Codigo</b>
						<td width=50% align="center">           <b>Nome</b>
						<td width=50% align="center">           <b>Endereco</b>
						<td width=50% align="center">           <b>Atividade</b>
						<td width=100% align="center">         <b>Ref.&nbsp;<?=$venc_x1;?></b>
						<td width=100% align="center">         <b>Val. Pago</b>
						
				        <?
				        $faz = 0;
				     }
		      
			            if ($negrita==1){ 
		                   ?>
			                 <tr> 
					             <td valign=top align='center'><font style=' font-family: Verdana; font-size: 10px;'><b><?=$cod;?>&nbsp;</b>
								 <td align='left'>             <font style=' font-family: Verdana; font-size: 10px;'>  <?=$nome;?>&nbsp;
								 <td align='left'>             <font style=' font-family: Verdana; font-size: 10px;'>  <?=$rua;?>&nbsp;&nbsp;<?=$endereco;?>,<?=$numero;?>&nbsp;
								 <td align='center'>           <font style=' font-family: Verdana; font-size: 10px;'>  <?=$categoria;?>
								 <td align='center'>  		   <font style=' font-family: Verdana; font-size: 10px;'>   <?=$tipg;?>
								 <td align='right'>  		   <font style=' font-family: Verdana; font-size: 10px;'>   &nbsp;&nbsp;&nbsp;&nbsp;<?=$tot_cod;?>
								 </font>
								 </td> 
								 <? 
					            $conta_p = $conta_p + 1;
					            $rec_nu = $rec_nu + 1;
					            
					            $negrita = 0;
					            }else{
					            ?>	
				                 <tr bgcolor="#C0C0C0"> 
					             <td valign=top align='center'><font style=' font-family: Verdana; font-size: 10px;'><b><?=$cod;?>&nbsp;</b>
								 <td align='left'>             <font style=' font-family: Verdana; font-size: 10px;'>  <?=$nome;?>&nbsp;
								 <td align='left'>             <font style=' font-family: Verdana; font-size: 10px;'>  <?=$rua;?>&nbsp;&nbsp;<?=$endereco;?>,<?=$numero;?>&nbsp;
								 <td align='center'>           <font style=' font-family: Verdana; font-size: 10px;'>  <?=$categoria;?>
								 <td align='center'>  		   <font style=' font-family: Verdana; font-size: 10px;'>   <?=$tipg;?>
								 <td align='right'>  		   <font style=' font-family: Verdana; font-size: 10px;'>   &nbsp;&nbsp;&nbsp;&nbsp;<?=$tot_cod;?>
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
			       <table border=0  align=center>
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
		           <table border=0  align=left>  
		           <tr>
		              <td>Total de Predios Pesquisado.:   <?=$rec_nu;?></td>
		           </tr>
				   <tr>   
		           <td>Total Contribuicao&nbsp; <?=$venc_x1;?>.:&nbsp;&nbsp;  R$&nbsp;&nbsp; <?=number_format($tot_cod_fim,2,",",".");?></td>
		           </tr>
		           </table>
		</div>
		</body>

<?
          break;

	Case 2:  // Relatorio Excel 

		header('Content-type: application/vnd.ms-excel');
		header('Content-type: application/force-download');
		header('Content-Disposition: attachment; filename=rel_conf.xls');
		header('Pragma: no-cache');
		
		$Titulo_rel2 = "Relatorio de Predios Administrados por";
		$Pagina      = 1;
		$conta_p     = 0;
		$dat_rel     = $hora = date("d/m/Y"); 
		
		//include("index.php");
		
		$codigo      = $_POST['Edit1'];
		
		// Abrir Table de Edificios
		
		// Abrir Table de Adms
		
		$consulta4  = "SELECT * FROM adms Where cod = '$codigo'";
		
		$resultado4 = @mysql_query($consulta4);
		
		$row4 = @mysql_fetch_array($resultado4);
		
		$cod_adm   = @$row4["cod"];
		$cond      = trim(@$row4["nomeadm"]);
		$cgc       = trim(@$row4["cgc"]);
		
		if (!empty($cgc)){
			$cgc1 = $cgc;
		}else{
			$cgc1 = " ";
		}
		// retorna uma pesquisa
		
		$consulta  = "SELECT * FROM edificios WHERE ADM = '$cod_adm'";
		
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
		     <form method='POST' action='rel_frm.php'>
		     <td><input type=image name='Consulta' src='../imagens/botao_voltar.PNG'></td>
		     </form> 
		     </table>
		     </td>
		     </tr>
		     </table>
		     </div>");
		
		$faz = 1;
		$negrita = 1;
		
		?>	
		     <div align='left'>
			 <table  border=0  collspan='2' height=3px align='left' >
			 <tr>
			 <td style=' font-family: Verdana; font-size: 1px;  height:1px;' width:100px;><img height=1 src="../imagens/2.gif" width=650 border=0>
			 </tr>
			 <tr>
			 <td style=' font-family: Verdana; font-size: 1px;  height:1px;' width:100px;><img height=1 src="../imagens/2.gif" width=650 border=0>
			 <table  border=0  collspan='2' align='left' >
			 <td width=500px >
			 <font style=' font-family: Verdana; font-size: 10px;'><?=$Titulo;?></font>
			 </td>
			 <td>
			 <td><td>
			 <td width=473px align='right'>
			 <font style=' font-family: Verdana; font-size: 10px;'>Data.:<?=$dat_rel;?></font>
			 </td>
			 </table>
			 <tr>
			 <td style=' font-family: Verdana; font-size: 1px;  height:1px;' width:500px;><img height=1 src="../imagens/2.gif" width=650 border=0>
			 </tr>
			 <tr>
			 <td style=' font-family: Verdana; font-size: 1px;  height:1px;' width:500px;><img height=1 src="../imagens/2.gif" width=650 border=0>
			 <table  border=0  collspan='3' align='center' >
			 <td width=800px align='center'>
			 <b><?=$Titulo_rel2;?><br/><br/>
			 <?=$cod_adm;?> - <?=$cond;?>  -  <?=$cgc1;?> </b>
			 </td>
			 <td>         </td>
			 </table>
			 <tr>
			 <td style=' font-family: Verdana; font-size: 1px;  height:1px;' width:500px;><img height=1 src="../imagens/2.gif" width=650 border=0>
			 </tr>
			 <tr>
			 <td style=' font-family: Verdana; font-size: 1px;  height:1px;' width:500px;><img height=1 src="../imagens/2.gif" width=650 border=0>
			 </tr>
			 </table>
		     </div>
		     </form>
		     <div align=center>
		     <table align=center border='0' bgcolor='#FFFFFF' bordercolor ='<?=$color_bor;?>'>
		     <tr>
		     <td>
		     <table border='1' align=center>
		<?	 
		     while ($linha = mysql_fetch_array($resultado))
		       {
		
				    $id_conf   = $linha["id"];
					$cod       = $linha["COD"];
					$nome      = ltrim($linha["COND"]).ltrim($linha["NOME"]);
					$rua       = trim(strtoupper($linha["RUA"]));
					$endereco  = trim(strtoupper($linha["ENDERECO"]));
					$numero    = trim(strtoupper($linha["NUMERO"]));
					$categoria = $linha["ATIV"];
					$adm       = $linha["ADM"];

				     if ($faz == 1){
				        ?>
					    <td valign=top width=75px align="center"><b>Codigo</b>
						<td width=50% align="center">           <b>Nome</b>
						<td width=50% align="center">           <b>Endereco</b>
						<td width=150px align="center">           <b>Ativ.</b>
						<td width=150px align="center">           <b>Adm.</b>
				        <?
				        $faz = 0;
				     }
		      
			            if ($negrita==1){ 
		                   ?>
			                 <tr> 
					             <td valign=top align='center'><font style=' font-family: Verdana; font-size: 10px;'><b><?=$cod;?>&nbsp;</b>
								 <td align='left'>             <font style=' font-family: Verdana; font-size: 10px;'>  <?=$nome;?>&nbsp;
								 <td align='left'>             <font style=' font-family: Verdana; font-size: 10px;'>  <?=$rua;?>&nbsp;&nbsp;<?=$endereco;?>,<?=$numero;?>&nbsp;
								 <td align='center'>  		   <font style=' font-family: Verdana; font-size: 10px;'>   <?=$categoria;?>
								 <td align='center'>  		   <font style=' font-family: Verdana; font-size: 10px;'>   <?=$adm;?>
								 </font>
								 </td> 
								 <? 
					            $conta_p = $conta_p + 1;
					            $rec_nu = $rec_nu + 1;
					            
					            $negrita = 0;
					            }else{
					            ?>	
				                 <tr bgcolor="#C0C0C0"> 
					             <td valign=top align='center'><font style=' font-family: Verdana; font-size: 10px;'><b><?=$cod;?>&nbsp;</b>
								 <td align='left'>             <font style=' font-family: Verdana; font-size: 10px;'>  <?=$nome;?>&nbsp;
								 <td align='left'>             <font style=' font-family: Verdana; font-size: 10px;'>  <?=$rua;?>&nbsp;&nbsp;<?=$endereco;?>,<?=$numero;?>&nbsp;
								 <td align='center'>  		   <font style=' font-family: Verdana; font-size: 10px;'>   <?=$categoria;?>
								 <td align='center'>  		   <font style=' font-family: Verdana; font-size: 10px;'>   <?=$adm;?>
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
			       <table border=0  align=center>
			       <tr align=center colspan=2>  ";
		           ?>
				   <table>
				   <tr>
				   <td style=' font-family: Verdana; font-size: 1px;  height:1px;' width:500px;><img height=1 src="../imagens/2.gif" width=650 border=0>
				   </tr>
				   <tr>
				   <td style=' font-family: Verdana; font-size: 1px;  height:1px;' width:500px;><img height=1 src="../imagens/2.gif" width=650 border=0>
				   </tr>
				   </table>
		           <table border=0  align=left>  
		           <td>Total de Predios Pesquisado.:   <?=number_format($rec_nu,2,",",".");?></td>
		           
		           
		</div>
		</body>

<?
          break;

	Case 3: // Relatorio em PDF


    break;


    Default:

}

/*
  ---------------------------
  Função para Subtrair Data
  ---------------------------
*/

function SubtraiData($data, $dias, $meses, $ano)
{
   //passe a data no formato dd/mm/yyyy 
   $data = explode("/", $data);
   $newData = date("d/m/Y", mktime(0, 0, 0, $data[1] - $meses,
    $data[0] - $dias, $data[2] - $ano) );
   return $newData;
}

/*
  ------------------------
  Função para Somar Data
  ------------------------
*/

function SomarData($data, $dias, $meses, $ano)
{
   //passe a data no formato dd/mm/yyyy 
   $data = explode("/", $data);
   $newData = date("d/m/Y", mktime(0, 0, 0, $data[1] + $meses,
    $data[0] + $dias, $data[2] + $ano) );
   return $newData;
}

/*
  ------------------------------------------
  Função Soma Quantidade de meses em atraso
  ------------------------------------------
*/

function qtd_mes_x($mesz,$anoz)
{
$qtd1    = 0;
$faz     = 0;
$som_qtd = 0;
$i_mes1  = $mesz;
$i_ano1  = $anoz;
						
While($i_mes1 <= 12 and $i_ano1 <= date("Y"))
{
     $i_mes1++;
     $qtd1++;
     $som_qtd++;
     $valor_2 = $som_qtd * 8.00;
}
return($som_qt);
return($valor_2);

echo $som_qtd;
}
 
?>
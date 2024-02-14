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

		$Titulo_rel2 = "Relacao de Empregados";
		$Pagina      = 1;
		$conta_p     = 0;
		$dat_rel     = $hora = date("d/m/Y"); 
		
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
		
		// Abrir Table de Edificios
		
		$consulta4  = "SELECT * FROM edificios Where COD = '$Edit1'";
		
		$resultado4 = @mysql_query($consulta4);
		
		$row4 = @mysql_fetch_array($resultado4);
		
		$cod_edif   = @$row4["COD"];
		$cond  = trim(@$row4["COND"].@$row4["NOME"]);
		$edif  = trim(@$row4["NOME"]);
		$cgc   = trim(@$row4["CGC"]);
		
		// retorna uma pesquisa
		
		$consulta  = "SELECT * FROM socios WHERE CODEDIF = '$cod_edif'";
		
		$resultado = @mysql_query($consulta)
		        or 
		
		die("
		     <br>
		     <br> 
		
		     <div align=center>
		
		     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='#4682B4'>
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
			 <?=$cod_edif;?>  -  <?=$cond;?> - <?=$cgc;?> </b>
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
		     <table align=center border='0' bgcolor='#FFFFFF' bordercolor ='#4682B4'>
		     <tr>
		     <td>
		     <table border='1' align=center>
		<?	 
		     while ($linha = mysql_fetch_array($resultado))
		       {
		
				    $id_conf   = $linha["id"];
					$cod       = $linha["CODP"];
					$nome      = $linha["NOMEASSOC"];
					$rua       = trim(strtoupper($linha["RUA"]));
					$endereco  = trim(strtoupper($linha["ENDRESID"]));
					$numero    = trim(strtoupper($linha["NUMERO"]));
					$categoria = $linha["CATEGORIA"];
					$inscricao = $linha["DATINSC"];
					$mes_i     = $linha["MES"];
					$ano_i     = $linha["ANO"];
	
                    // Pesquiza quantidade de mensalidades devedora
                    $sql  = "SELECT * FROM aberto_soc WHERE CODP = '$cod' ORDER BY ANO ASC, MES ASC";	
	
	                $resultado2 = @mysql_query($sql);

                    $row2 = @mysql_fetch_array($resultado2);

                    $mes_ano_soc = @$row2["MESANO"];

					$valor_3 = "0.00";
					$som_qtd = 0;
					
					if ($categoria == "C"){
					
					if (!empty($mes_ano_soc)){
					   $mes_x = substr("$mes_ano_soc", 0, 2);
					   $ano_x = substr("$mes_ano_soc", 3, 4);
					}else{
					   $mes_x = $mes_i;
					   $ano_x = $ano_i;
					}	
					
					$ano_hj = date("Y");
					$mes_hj = date("m");
					
					if ($mes_x == 0 and $ano_x == 0){
						
						$mes_x = substr("$inscricao",3,2);
						$ano_x = substr("$inscricao",6,4);
					}
					
					$som_qtd = 0;	
					$valor_2 = 0;
						
					while($ano_x < $ano_hj){
						$mes_x++;
						if ($mes_x >= 13){
							$mes_x = 1;
							$ano_x++;
						}
						$som_qtd++;
						$valor_2 = $som_qtd * 8.00;
						if ($ano_x == $ano_hj){
							break;
						}
					}
					$valor_3 = $valor_2.",00"; 
					}

				     if ($faz == 1){
				        ?>
					    <td valign=top width=75px align="center"><b>Matric.</b>
						<td width=50% align="center">           <b>Nome</b>
						<td width=50% align="center">           <b>Endereco</b>
						<td width=150px align="center">           <b>Categ.</b>
						<td width=80px align="center">            <b>Inscri</b>
						<td width=80px align="center">            <b>Ult.Pag.</b>
						<td width=80px align="center">            <b>Qtd</b>
						<td width=80px align="center">            <b>Vlr</b>
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
								 <td align='center'>		   <font style=' font-family: Verdana; font-size: 10px;'>   <?=$inscricao;?> 
								 <td align='center'>		   <font style=' font-family: Verdana; font-size: 10px;'>   <?=$mes_i;?>/<?=$ano_i;?> 
								 <td align='center'>		   <font style=' font-family: Verdana; font-size: 10px;'>   <?=$som_qtd;?> 
								 <td align='center'>		   <font style=' font-family: Verdana; font-size: 10px;'>   <?=$valor_3;?> 
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
								 <td align='center'>		   <font style=' font-family: Verdana; font-size: 10px;'>   <?=$inscricao;?> 
								 <td align='center'>		   <font style=' font-family: Verdana; font-size: 10px;'>   <?=$mes_i;?>/<?=$ano_i;?> 
								 <td align='center'>		   <font style=' font-family: Verdana; font-size: 10px;'>   <?=$som_qtd;?> 
								 <td align='center'>		   <font style=' font-family: Verdana; font-size: 10px;'>   <?=$valor_3;?> 
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
		           <td>Total de Socios Pesquisado.:   <?=$rec_nu;?></td>
		</div>
		</body>

<?
          break;

	Case 2:  // Relatorio Excel 

		header('Content-type: application/vnd.ms-excel');
		header('Content-type: application/force-download');
		header('Content-Disposition: attachment; filename=rel_conf.xls');
		header('Pragma: no-cache');
		
		$Titulo_rel2 = "Relacao de Empregados";
		$Pagina      = 1;
		$conta_p     = 0;
		$dat_rel     = $hora = date("d/m/Y"); 
		
		//include("index.php");
		
		$codigo      = $_POST['Edit1'];
		
		// Abrir Table de Edificios
		
		$consulta4  = "SELECT * FROM edificios Where COD = '$Edit1'";
		
		$resultado4 = @mysql_query($consulta4);
		
		$row4 = @mysql_fetch_array($resultado4);
		
		$cod_edif   = @$row4["COD"];
		$cond  = trim(@$row4["COND"].@$row4["NOME"]);
		$edif  = trim(@$row4["NOME"]);
		$cgc   = trim(@$row4["CGC"]);
		
		// retorna uma pesquisa
		
		$consulta  = "SELECT * FROM socios WHERE CODEDIF = '$cod_edif'";
		
		$resultado = @mysql_query($consulta)
		        or 
		
		die("
		     <br>
		     <br> 
		
		     <div align=center>
		
		     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='#4682B4'>
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
			 <?=$cod_edif;?>  -  <?=$cond;?><td><b> - <?=$cgc;?> </b>
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
		     <table align=center border='0' bgcolor='#FFFFFF' bordercolor ='#4682B4'>
		     <tr>
		     <td>
		     <table border='1' align=center>
		<?	 
		     while ($linha = mysql_fetch_array($resultado))
		       {
		
				    $id_conf   = $linha["id"];
					$cod       = $linha["CODP"];
					$nome      = $linha["NOMEASSOC"];
					$rua       = trim(strtoupper($linha["RUA"]));
					$endereco  = trim(strtoupper($linha["ENDRESID"]));
					$numero    = trim(strtoupper($linha["NUMERO"]));
					$categoria = $linha["CATEGORIA"];
					$inscricao = $linha["DATINSC"];
					$mes_i     = $linha["MES"];
					$ano_i     = $linha["ANO"];
	
                    // Pesquiza quantidade de mensalidades devedora
                    $sql  = "SELECT * FROM aberto_soc WHERE CODP = '$cod' ORDER BY ANO ASC, MES ASC";	
	
	                $resultado2 = @mysql_query($sql);

                    $row2 = @mysql_fetch_array($resultado2);

                    $mes_ano_soc = @$row2["MESANO"];

					$valor_3 = "0.00";
					$som_qtd = 0;
					
					if ($categoria == "C"){
					
					if (!empty($mes_ano_soc)){
					   $mes_x = substr("$mes_ano_soc", 0, 2);
					   $ano_x = substr("$mes_ano_soc", 3, 4);
					}else{
					   $mes_x = $mes_i;
					   $ano_x = $ano_i;
					}	
					
					$ano_hj = date("Y");
					$mes_hj = date("m");
					
					if ($mes_x == 0 and $ano_x == 0){
						
						$mes_x = substr("$inscricao",3,2);
						$ano_x = substr("$inscricao",6,4);
					}
					
					$som_qtd = 0;	
					$valor_2 = 0;
						
					while($ano_x < $ano_hj){
						$mes_x++;
						if ($mes_x >= 13){
							$mes_x = 1;
							$ano_x++;
						}
						$som_qtd++;
						$valor_2 = $som_qtd * 8.00;
						if ($ano_x == $ano_hj){
							break;
						}
					}
					$valor_3 = $valor_2.",00"; 
					}

				     if ($faz == 1){
				        ?>
					    <td valign=top width=200px align="center"><b>Matric.</b>
						<td width=50px align="center">           <b>Nome</b>
						<td width=50px align="center">           <b>Endereco</b>
						<td width=150px align="center">           <b>Categ.</b>
						<td width=80px align="center">            <b>Inscri</b>
						<td width=80px align="center">            <b>Ult.Pag.</b>
						<td width=80px align="center">            <b>Qtd</b>
						<td width=80px align="center">            <b>Vlr</b>
				        <?
				        $faz = 0;
				     }
		      
			            if ($negrita==1){ 
		                   ?>
			                 <tr> 
					             <td valign=top align='center'><font style=' font-family: Verdana; font-size: 10px;'><b><?=$cod;?></b>
								 <td align='left'>             <font style=' font-family: Verdana; font-size: 10px;'>  <?=$nome;?>
								 <td align='left'>             <font style=' font-family: Verdana; font-size: 10px;'>  <?=$rua;?>&nbsp;&nbsp;<?=$endereco;?>,<?=$numero;?>&nbsp;
								 <td align='center'>  		   <font style=' font-family: Verdana; font-size: 10px;'>   <?=$categoria;?>
								 <td align='center'>		   <font style=' font-family: Verdana; font-size: 10px;'>   <?=$inscricao;?> 
								 <td align='center'>		   <font style=' font-family: Verdana; font-size: 10px;'>   <?=$mes_i;?>/<?=$ano_i;?> 
								 <td align='center'>		   <font style=' font-family: Verdana; font-size: 10px;'>   <?=$som_qtd;?> 
								 <td align='center'>		   <font style=' font-family: Verdana; font-size: 10px;'>   <?=$valor_3;?> 
								 </font>
								 </td> 
								 <? 
					            $conta_p = $conta_p + 1;
					            $rec_nu = $rec_nu + 1;
					            
					            $negrita = 0;
					            }else{
					            ?>	
				                 <tr bgcolor="#C0C0C0"> 
					             <td valign=top align='center'><font style=' font-family: Verdana; font-size: 10px;'><b><?=$cod;?></b>
								 <td align='left'>             <font style=' font-family: Verdana; font-size: 10px;'>  <?=$nome;?>
								 <td align='left'>             <font style=' font-family: Verdana; font-size: 10px;'>  <?=$rua;?>&nbsp;&nbsp;<?=$endereco;?>,<?=$numero;?>&nbsp;
								 <td align='center'>  		   <font style=' font-family: Verdana; font-size: 10px;'>   <?=$categoria;?>
								 <td align='center'>		   <font style=' font-family: Verdana; font-size: 10px;'>   <?=$inscricao;?> 
								 <td align='center'>		   <font style=' font-family: Verdana; font-size: 10px;'>   <?=$mes_i;?>/<?=$ano_i;?> 
								 <td align='center'>		   <font style=' font-family: Verdana; font-size: 10px;'>   <?=$som_qtd;?> 
								 <td align='center'>		   <font style=' font-family: Verdana; font-size: 10px;'>   <?=$valor_3;?> 
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
		           <td>Total de Registros Pesquisado.:   <?=$rec_nu;?></td>
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
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


if (empty($_POST['Edit1'])){
	
	echo "
	
	<html>
			<head>
			<title>ERRO AO CONECTAR</title>
            <link rel='shortcut icon' href='../imagens/favicon.ico'/>
			</head>
			<body>
						
			<style type=text/css>
			
			body { background-image: url('../$logo_sis');
                   background-attachment: fixed }
			
			<!--.cp {  font: bold 10px Arial; color: black}
			<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
			<!--.ld { font: bold 15px Arial; color: #000000}
			<!--.ct { FONT: 9px 'Arial Narrow'; COLOR: #000033}
			<!--.cn { FONT: 9px Arial; COLOR: black }
			<!--.bc { font: bold 22px Arial; color: #000000 }
			--></style> 
			
			</HEAD>
			

			</html>
		     <br>
		     <br> 
		
		     <div align=center>
		
		     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
		     <tr>
		     <td>
		     <font face=arial><b>*** Registro Não Encontrado !!! ***</b>
		     <table align=center>
		     <form method='POST' action='javascript:window.close();'>
		     <td><input type=image name='Consulta' src='../imagens/botao_voltar.PNG'></td>
		     </form> 
		     </table>
		     </td>
		     </tr>
		     </table>
		     </div>";
		     exit;
	
}
Switch ($receber){

	Case 1: // Relatorio HTML

		$Titulo_rel2 = "Relacao de Empregados";
		$Pagina      = 1;
		$conta_p     = 0;
		$dat_rel     = $hora = date("d/m/Y"); 
		
		//include("index.php");
		//include("../pdml/pdml.php");     

		?>
		
		<html>
		<head>
		<title><?=$Titulo;?></title>
		</head>
		<body bgcolor="#FFFFFF">
		
		<?
		
		$codigo      = $_POST['Edit1'];

        // Limpar tabela rel_conj

        $consulta0 = "TRUNCATE TABLE `rel_conj`";

        @mysql_query($consulta0, $link);

	
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
		
		$resultado = @mysql_query($consulta);
		
		     while ($linha = @mysql_fetch_array($resultado))
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

					$mes_x     = 0;
					$ano_x     = 0;
					$qtd_fim   = 0;
					$valor_3   = "0.00";
	
                    // Pesquiza quantidade de mensalidades devedora
                    $sql  = "SELECT * FROM aberto_soc WHERE CODP = '$cod' ORDER BY ANO DESC, MES DESC";	
	
	                $resultado2 = @mysql_query($sql);

                    $row2 = @mysql_fetch_array($resultado2);

                    $id          = @$row2["id"];
					$mes_aber    = @$row2["MES"];
					$ano_aber    = @$row2["ANO"];
					
					
					if (!empty($id)){
						
					

						if ($categoria == "C"){
						
							if (!empty($id)){
							   $mes_x = $mes_aber;
							   $ano_x = $ano_aber;
							}else{
							   $mes_x = $mes_i;
							   $ano_x = $ano_i;
							}	
	
							$qtd        = 0;
							$qtd_fim    = 0;
							$valor_3    = 0;
							$mes_inicio = $mes_x;
							$ano_inicio = $ano_x;
							$mes_hj     = intval(date("m"));
							$ano_hj     = intval(date("Y"));
							
							//echo "Mes e ano pagos = ".trim($mes_inicio)."/".trim($ano_inicio)."<br><br>";
							
							while ($ano_inicio < $ano_hj)
							{
								$qtd++;
								If($mes_inicio != 12)
								{
								    $mes_inicio++;
								}else{
									$mes_inicio = 1;
									$ano_inicio++;
								}
							}
							while($ano_inicio == $ano_hj)
							{
								if($ano_inicio == $ano_hj and $mes_inicio >= $mes_hj)
								{
								   $qtd = 0;
								   break;
								}
								$mes_inicio++;
								$qtd++;
								if($mes_inicio == $mes_hj)
								{
									break;
								}
							}
							if ($qtd > 0)
							{
							   $qtd_fim = $qtd - 1;
							   $valor_3 = $qtd_fim * 8.00;
							}
	
						}else{
							$mes_inicio = 0;
							$ano_inicio = 0;
							$valor_3    ="0";
						}
						
				}else{
					
					// Calcula com datas em branco
					
							$qtd        = 0;
							$qtd_fim    = 0;
							$valor_3    = 0;
							
							$mes_x_1 = substr($inscricao,3,2);
							$ano_x_1 = substr($inscricao,6,4);
							
							$mes_inicio = $mes_x_1;
							$ano_inicio = $ano_x_1;
							$mes_hj     = intval(date("m"));
							$ano_hj     = intval(date("Y"));
							
							//echo "Mes e ano pagos = ".trim($mes_inicio)."/".trim($ano_inicio)."<br><br>";
							
							while ($ano_inicio < $ano_hj)
							{
								$qtd++;
								If($mes_inicio != 12)
								{
								    $mes_inicio++;
								}else{
									$mes_inicio = 1;
									$ano_inicio++;
								}
							}
							while($ano_inicio == $ano_hj)
							{
								if($ano_inicio == $ano_hj and $mes_inicio >= $mes_hj)
								{
								   $qtd = 0;
								   break;
								}
								$mes_inicio++;
								$qtd++;
								if($mes_inicio == $mes_hj)
								{
									break;
								}
							}
							if ($qtd > 0)
							{
							   $qtd_fim = $qtd - 1;
							   $valor_3 = $qtd_fim * 8.00;
							}
					
				}		

$ano_inscri_x = substr("$inscricao",6,4);
if ($qtd_fim > 400)
{
   if($ano_hj == $ano_inscri_x)
     {
		$qtd_fim   = 0;
		$valor_3   = "0";
		$categoria = "C";
     	
     }else{
	      $qtd_fim   = 0;
	      $valor_3   = "0";
	      $categoria = "D";
	}
}
$Edit1  = trim(strtoupper(retirar_carac($cod)));
$Edit2  = trim(strtoupper(retirar_carac($nome)));
$Edit3  = trim(strtoupper(retirar_carac($rua)));
$Edit4  = trim(strtoupper(retirar_carac($endereco)));
$Edit5  = trim(strtoupper(retirar_carac($numero)));
$Edit6  = trim(strtoupper(retirar_carac($categoria)));
$Edit7  = trim(strtoupper(retirar_carac($inscricao)));
$Edit8  = trim(strtoupper(retirar_carac($mes_x)));
$Edit9  = trim(strtoupper(retirar_carac($ano_x)));
$Edit10 = trim(strtoupper(retirar_carac($qtd_fim)));
$Edit11 = $valor_3.".00";

//echo "Quantidade de mensalidades devedora  = ".$qtd_fim." valor devedor = ".$valor_3.".00";

//echo $Edit1."<br>";
//echo $Edit2."<br>";
//echo $Edit3."<br>";
//echo $Edit4."<br>";
//echo $Edit5."<br>";
//echo $Edit6."<br>";
//echo $Edit7."<br>";
//echo $Edit8."<br>";
//echo $Edit9."<br>";
//echo $Edit10."<br>";
//echo $Edit11."<br>";

		
		$consulta5 = "INSERT INTO rel_conj (COD,
											NOME,
		                                    RUA,
		                                    ENDERECO,
		                                    NUMERO,
											CATEGORIA,
											INSCRICAO,
											MES_1,
											ANO_1,
											SOM_QTD,
											VALOR)
		                VALUES
		                                  ('$Edit1',
										   '$Edit2',
										   '$Edit3',
										   '$Edit4',
										   '$Edit5',
										   '$Edit6',
										   '$Edit7',
										   '$Edit8',
										   '$Edit9',
										   '$Edit10',
										   '$Edit11')";
		
		@mysql_query($consulta5, $link)
		or
		die("
		     <br>
		     <br> 
		
		     <div align=center>
		
		     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='#4682B4'>
		     <tr>
		     <td>
		     <font face=arial><b>*** Falha na Inclusão !!! ***</b>
		     <table align=center>
		     <form method='POST' action='rel_frm.php'>
		     <td><input type=image name='Consulta' src='../imagens/botao_voltar.PNG'></td>
		     </form> 
		     </table>
		     </td>
		     </tr>
		     </table>
		     </div>");

$qtd        = 0;
$qtd_fim    = 0;
$valor_3    = 0;
$mes_inicio = 0;
$ano_inicio = 0;
		     

}				


		$consulta6  = "SELECT * FROM rel_conj";
		
		$resultado6 = @mysql_query($consulta6);

	
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
		     while ($linha = mysql_fetch_array($resultado6))
		       {

		
				    $id_conf   = $linha["id"];
					$cod       = $linha["COD"];
					$nome      = $linha["NOME"];
					$rua       = trim(strtoupper($linha["RUA"]));
					$endereco  = trim(strtoupper($linha["ENDERECO"]));
					$numero    = trim(strtoupper($linha["NUMERO"]));
					$categoria = $linha["CATEGORIA"];
					$inscricao = $linha["INSCRICAO"];
					$mes_i     = $linha["MES_1"];
					$ano_i     = $linha["ANO_1"];
					$som_qtd2  = $linha["SOM_QTD"];
					$valor_3   = $linha["VALOR"];
				
		      
			            if ($negrita==1){ 
		                   ?>
			                 <tr> 
					             <td valign=top align='center'><font style=' font-family: Verdana; font-size: 10px;'><b><?=$cod;?>&nbsp;</b>
								 <td align='left'>             <font style=' font-family: Verdana; font-size: 10px;'>  <?=$nome;?>&nbsp;
								 <td align='left'>             <font style=' font-family: Verdana; font-size: 10px;'>  <?=$rua;?>&nbsp;&nbsp;<?=$endereco;?>,<?=$numero;?>&nbsp;
								 <td align='center'>  		   <font style=' font-family: Verdana; font-size: 10px;'>   <?=$categoria;?>
								 <td align='center'>		   <font style=' font-family: Verdana; font-size: 10px;'>   <?=$inscricao;?> 
								 <td align='center'>		   <font style=' font-family: Verdana; font-size: 10px;'>   <?=$mes_i;?>/<?=$ano_i;?> 
								 <td align='center'>		   <font style=' font-family: Verdana; font-size: 10px;'>   <?=$som_qtd2;?> 
								 <td align='right'>		   <font style=' font-family: Verdana; font-size: 10px;'>   <?=$valor_3;?> 
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
								 <td align='center'>		   <font style=' font-family: Verdana; font-size: 10px;'>   <?=$som_qtd2;?> 
								 <td align='right'>		   <font style=' font-family: Verdana; font-size: 10px;'>   <?=$valor_3;?> 
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
	
					$mes_x     = 0;
					$ano_x     = 0;
					$qtd_fim   = 0;
					$valor_3   = "0.00";
	
                    // Pesquiza quantidade de mensalidades devedora
                    $sql  = "SELECT * FROM aberto_soc WHERE CODP = '$cod' ORDER BY ANO DESC, MES DESC";	
	
	                $resultado2 = @mysql_query($sql);

                    $row2 = @mysql_fetch_array($resultado2);

                    $id          = @$row2["id"];
					$mes_aber    = @$row2["MES"];
					$ano_aber    = @$row2["ANO"];

					if ($categoria == "C"){
					
						if (!empty($id)){
						   $mes_x = $mes_aber;
						   $ano_x = $ano_aber;
						}else{
						   $mes_x = $mes_i;
						   $ano_x = $ano_i;
						}	

						$qtd        = 0;
						$qtd_fim    = 0;
						$valor_3    = 0;
						$mes_inicio = $mes_x;
						$ano_inicio = $ano_x;
						$mes_hj     = intval(date("m"));
						$ano_hj     = intval(date("Y"));
						
						//echo "Mes e ano pagos = ".trim($mes_inicio)."/".trim($ano_inicio)."<br><br>";
						
						while ($ano_inicio < $ano_hj)
						{
							$qtd++;
							If($mes_inicio != 12)
							{
							    $mes_inicio++;
							}else{
								$mes_inicio = 1;
								$ano_inicio++;
							}
						}
						while($ano_inicio == $ano_hj)
						{
							if($ano_inicio == $ano_hj and $mes_inicio >= $mes_hj)
							{
							   $qtd = 0;
							   break;
							}
							$mes_inicio++;
							$qtd++;
							if($mes_inicio == $mes_hj)
							{
								break;
							}
						}
						if ($qtd > 0)
						{
						   $qtd_fim = $qtd - 1;
						   $valor_3 = $qtd_fim * 8.00;
						}

					}else{
						$mes_inicio = 0;
						$ano_inicio = 0;
						$valor_3    ="0";
					}

if ($qtd_fim > 400)
{
	$qtd_fim   = 0;
	$valor_3   = "0";
	$categoria = "D";
}

$Edit1  = trim(strtoupper(retirar_carac($cod)));
$Edit2  = trim(strtoupper(retirar_carac($nome)));
$Edit3  = trim(strtoupper(retirar_carac($rua)));
$Edit4  = trim(strtoupper(retirar_carac($endereco)));
$Edit5  = trim(strtoupper(retirar_carac($numero)));
$Edit6  = trim(strtoupper(retirar_carac($categoria)));
$Edit7  = trim(strtoupper(retirar_carac($inscricao)));
$Edit8  = trim(strtoupper(retirar_carac($mes_x)));
$Edit9  = trim(strtoupper(retirar_carac($ano_x)));
$Edit10 = trim(strtoupper(retirar_carac($qtd_fim)));
$Edit11 = $valor_3.".00";

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
					             <td valign=top align='center'><font style=' font-family: Verdana; font-size: 10px;'><b><?=$Edit1;?></b>
								 <td align='left'>             <font style=' font-family: Verdana; font-size: 10px;'>  <?=$Edit2;?>
								 <td align='left'>             <font style=' font-family: Verdana; font-size: 10px;'>  <?=$Edit3;?>&nbsp;&nbsp;<?=$Edit4;?>,<?=$Edit5;?>&nbsp;
								 <td align='center'>  		   <font style=' font-family: Verdana; font-size: 10px;'>   <?=$Edit6;?>
								 <td align='center'>		   <font style=' font-family: Verdana; font-size: 10px;'>   <?=$Edit7;?> 
								 <td align='center'>		   <font style=' font-family: Verdana; font-size: 10px;'>   <?=$Edit8;?>/<?=$Edit9;?> 
								 <td align='center'>		   <font style=' font-family: Verdana; font-size: 10px;'>   <?=$Edit10;?> 
								 <td align='right'>		   <font style=' font-family: Verdana; font-size: 10px;'>   <?=$Edit11;?> 
								 </font>
								 </td> 
								 <? 
					            $conta_p = $conta_p + 1;
					            $rec_nu = $rec_nu + 1;
					            
					            $negrita = 0;
					            }else{
					            ?>	
				                 <tr bgcolor="#C0C0C0"> 
					             <td valign=top align='center'><font style=' font-family: Verdana; font-size: 10px;'><b><?=$Edit1;?></b>
								 <td align='left'>             <font style=' font-family: Verdana; font-size: 10px;'>  <?=$Edit2;?>
								 <td align='left'>             <font style=' font-family: Verdana; font-size: 10px;'>  <?=$Edit3;?>&nbsp;&nbsp;<?=$Edit4;?>,<?=$Edit5;?>&nbsp;
								 <td align='center'>  		   <font style=' font-family: Verdana; font-size: 10px;'>   <?=$Edit6;?>
								 <td align='center'>		   <font style=' font-family: Verdana; font-size: 10px;'>   <?=$Edit7;?> 
								 <td align='center'>		   <font style=' font-family: Verdana; font-size: 10px;'>   <?=$Edit8;?>/<?=$Edit9;?> 
								 <td align='center'>		   <font style=' font-family: Verdana; font-size: 10px;'>   <?=$Edit10;?> 
								 <td align='right'>		   <font style=' font-family: Verdana; font-size: 10px;'>   <?=$Edit11;?> 
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
?>


<pdml>
<body>

					    <td valign=top width=200px align="center"><b>Matric.</b>
						<td width=50px align="center">           <b>Nome</b>
						<td width=50px align="center">           <b>Endereco</b>
						<td width=150px align="center">           <b>Categ.</b>
						<td width=80px align="center">            <b>Inscri</b>
						<td width=80px align="center">            <b>Ult.Pag.</b>
						<td width=80px align="center">            <b>Qtd</b>
						<td width=80px align="center">            <b>Vlr</b>




</body>
</pdml>

<?
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

/*
 --------------------------------
 Funcao para Retirar os caracter
 estranhos e acentos na hora de
 atualizar Table 
---------------------------------
*/

Function retirar_carac($var){

$var = ereg_replace("[ÁÀÂÃ]",      "A",$var);
$var = ereg_replace("[áàâãª]",     "a",$var);
$var = ereg_replace("[ÉÈÊ]",       "E",$var);
$var = ereg_replace("[éèê]",       "e",$var);
$var = ereg_replace("[ÓÒÔÕ]",      "O",$var);
$var = ereg_replace("[óòôõº]",     "o",$var);
$var = ereg_replace("[ÚÙÛ]",       "U",$var);
$var = ereg_replace("[úùû]",       "u",$var);
$var = ereg_replace("[?*#'´`!$%¨]"," ",$var);
$var = str_replace("Ç",            "C",$var);
$var = str_replace("ç",            "c",$var);

return($var);
}


 
?>
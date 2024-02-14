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

		$Titulo_rel2 = "Relatorio de Sindical Pagas";
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
		
		$consulta4  = "SELECT * FROM edificios Where COD = '$codigo'";
		
		$resultado4 = @mysql_query($consulta4);
		
		$row4 = @mysql_fetch_array($resultado4);
		
		$cod_edif   = @$row4["COD"];
		$cond  = trim(@$row4["COND"].@$row4["NOME"]);
		$edif  = trim(@$row4["NOME"]);
		$cgc   = trim(@$row4["CGC"]);
		
		// retorna uma pesquisa
		
		$consulta  = "SELECT * FROM sindical WHERE SINDCOD = '$codigo' ORDER BY str_to_date( VENCTO, '%d/%m/%Y')";
		
		$resultado = @mysql_query($consulta)
		        or 
		
		die("
		     <style type=text/css>

             body { background-image: url(../$logo_sis);}
             
             </style>

		     <br>
		     <br> 
		
		     <div align=center>
		
		     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
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
		     <table align=center border='0' bgcolor='#FFFFFF' bordercolor ='<?=$color_bor;?>'>
		     <tr>
		     <td>
		     <table border='1' align=center>
		<?	 
		     while ($linha = mysql_fetch_array($resultado))
		       {
		
				    $id_conf  = $linha["id"];
					$cod      = $linha["SINDCOD"];
					$vencto   = $linha["VENCTO"];
					$total    = $linha["TOTAL"];
					$descri   = trim(strtoupper($linha["DESCRICAO"]));
					$emissao  = $linha["DATA"];
					$dat_bai  = $linha["DAT_BAI"];
					$dat_pag  = $linha["PAGTO"];
					$qtd      = $linha["QTD"];
					$local    = $linha["AGENCIA"];
					$acordo   = $linha["ACORDO"];
		
		
				     if ($faz == 1){
				        ?>
					    <td valign=top width=200px align="center">     <b>Descrição</b>
						<td width=150px align="center">  <b>Vencimento</b>
						<td width=105px align="center">               <b>Valor Pago</b>
						<td width=150px align="center">               <b>Data Baixa</b>
						<td width=80px align="center"><b>Local Pago</b>
				        <?
				        $faz = 0;
				     }
		      
			            if ($negrita==1){ 
		                   ?>
			                 <tr> 
					             <td valign=top align='center'><font style=' font-family: Verdana; font-size: 14px;'><b><?=$descri;?>&nbsp;</b>
								 <td align='center'>            <font style=' font-family: Verdana; font-size: 14px;'>  <?=$vencto;?>&nbsp;
								 <td align='right'>               		  <font style=' font-family: Verdana; font-size: 14px;'>  <?=$total;?> &nbsp;
								 <td align='center'>  		  <font style=' font-family: Verdana; font-size: 14px;'>   <?=$emissao;?>
								 <td align='center'>		  <font style=' font-family: Verdana; font-size: 14px;'>   <?=$local;?> 
								 </font>
								 </td> 
								 <? 
					            $conta_p = $conta_p + 1;
					            $rec_nu = $rec_nu + 1;
					            
					            $negrita = 0;
					            }else{
					            ?>	
				                 <tr bgcolor="#C0C0C0"> 
					             <td valign=top align='center'><font style=' font-family: Verdana; font-size: 14px;'><b><?=$descri;?>&nbsp;</b>
								 <td align='center'>            <font style=' font-family: Verdana; font-size: 14px;'>   <?=$vencto;?>&nbsp;
								 <td align='right'>               		  <font style=' font-family: Verdana; font-size: 14px;'>   <?=$total;?> &nbsp;
								 <td align='center'>  		  <font style=' font-family: Verdana; font-size: 14px;'>   <?=$emissao;?>
								 <td align='center'>		  <font style=' font-family: Verdana; font-size: 14px;'>   <?=$local;?> 
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
		           <td>Total de Registros Pesquisado.:   <?=$rec_nu;?></td>
		</div>
		</body>

<?
          break;

	Case 2:  // Relatorio Excel 

		header('Content-type: application/vnd.ms-excel');
		header('Content-type: application/force-download');
		header('Content-Disposition: attachment; filename=rel_conf.xls');
		header('Pragma: no-cache');
		
		$Titulo_rel2 = "Relatorio de Contribuições Pagas";
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
		
		$consulta  = "SELECT * FROM sindical WHERE SINDCOD = '$codigo' ORDER BY str_to_date( VENCTO, '%d/%m/%Y')";
		
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
			 <?=$cod_edif;?>  -  <?=$cond;?><td><b> - <?=$cgc;?> </b>
			 </td>
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
		
				    $id_conf  = $linha["id"];
					$cod      = $linha["SINDCOD"];
					$vencto   = $linha["VENCTO"];
					$total    = $linha["TOTAL"];
					$descri   = trim(strtoupper($linha["DESCRICAO"]));
					$emissao  = $linha["DATA"];
					$dat_bai  = $linha["DAT_BAI"];
					$dat_pag  = $linha["PAGTO"];
					$qtd      = $linha["QTD"];
					$local    = $linha["AGENCIA"];
					$acordo   = $linha["ACORDO"];
		
		
				     if ($faz == 1){
				        ?>
					    <td valign=top width=200px align="center">     <b>Descrição</b>
						<td width=150px align="center">  <b>Vencimento</b>
						<td width=105px align="center">               <b>Valor Pago</b>
						<td width=150px align="center">               <b>Data Baixa</b>
						<td width=80px align="center"><b>Local Pago</b>
				        <?
				        $faz = 0;
				     }
		      
			            if ($negrita==1){ 
		                   ?>
			                 <tr> 
					             <td valign=top align='center'><font style=' font-family: Verdana; font-size: 14px;'><b><?=$descri;?>&nbsp;</b>
								 <td align='center'>            <font style=' font-family: Verdana; font-size: 14px;'>  <?=$vencto;?>&nbsp;
								 <td align='right'>               		  <font style=' font-family: Verdana; font-size: 14px;'>  <?=$total;?> &nbsp;
								 <td align='center'>  		  <font style=' font-family: Verdana; font-size: 14px;'>   <?=$dat_bai;?>
								 <td align='center'>		  <font style=' font-family: Verdana; font-size: 14px;'>   <?=$local;?> 
								 </font>
								 </td> 
								 <? 
					            $conta_p = $conta_p + 1;
					            $rec_nu = $rec_nu + 1;
					            
					            $negrita = 0;
					            }else{
					            ?>	
				                 <tr bgcolor="#C0C0C0"> 
					             <td valign=top align='center'><font style=' font-family: Verdana; font-size: 14px;'><b><?=$descri;?>&nbsp;</b>
								 <td align='center'>            <font style=' font-family: Verdana; font-size: 14px;'>   <?=$vencto;?>&nbsp;
								 <td align='right'>               		  <font style=' font-family: Verdana; font-size: 14px;'>   <?=$total;?> &nbsp;
								 <td align='center'>  		  <font style=' font-family: Verdana; font-size: 14px;'>   <?=$dat_bai;?>
								 <td align='center'>		  <font style=' font-family: Verdana; font-size: 14px;'>   <?=$local;?> 
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


//          include("../ts2.php");


		$Titulo_rel2 = "Relatorio de Contribuições Pagas";
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
		
		$consulta  = "SELECT * FROM conf WHERE CONFCOD = '$codigo' AND TOTAL != 0 ORDER BY str_to_date( VENCTO, '%d/%m/%Y')";
		
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

	include('fpdf.php');
	// Inicia Codigo dos Boletos
	include('i25.php');
	
	$cont_linha = 0;
	
	ini_set("max_execution_time", 7200); // Setado para 1 hora
	
	// Inicio do Boleto
	
	$pdf = new PDF_i25();
	$pdf->Open();
	$pdf->SetAutoPageBreak(0, 0);
	$pdf->SetTopMargin(0);
	$pdf->AddPage();
	$pdf->SetDisplayMode(fullwidth, continuous);
	
	// Inicio do Loop
	while($linha = @mysql_fetch_array($resultado1)) {
	
	//$conta_pag = $conta_pg++;
	
	$pdf->ln();
	
	// x = horizontal y = vertical z = largura w = altura
	
	//$pdf->image("../imagens/cef.png",0,0,211,303);
	//$total++;
	
	
	$codigo       = $linha["CONFCOD"];
	$val_sindi    = $linha["TOTAL"];
	$venc_to      = $linha["VENCTO"];
	$exer         = $linha["EXER"];
	$loc_pag      = $linha["LOCALP"];
	$val_cred     = $linha["TOTAL"]-1.80;
		
	$consulta_cgc  = "SELECT * FROM edificios WHERE COD = '$codigo'";
							
							// Retorno o Resultado da Pesquisa
							
	@mysql_query($consulta_cgc, $link);
							     
	$resultado_cgc = @mysql_query($consulta_cgc);
							
	$row_cgc = @mysql_fetch_array($resultado_cgc);
							
	$id_cgc    = @$row_cgc["id"];
	$edif_cgc  = @$row_cgc["COD"];
	$emp_edif  = @$row_cgc["NU_EMP"];
	$nome_edif = trim(@$row_cgc["COND"])." ".trim(@$row_cgc["NOME"]);
	$end_edif  = trim(@$row_cgc["RUA"])." ".trim(@$row_cgc["ENDERECO"]).",".trim(@$row_cgc["NUMERO"]);
	$adm_edif  = @$row_cgc["ADM"];
	
	
	if ($cont_linha == 0){
		// Cabecalho do Relatorio
		$pdf->SetFont('Arial', 'B', 7);
		$pdf->Text(12,10, '_____________________________________________________________________________________________________________________________________');
		$pdf->Text(12,11, '_____________________________________________________________________________________________________________________________________');
		$pdf->Text(14,16, 'Sindificios - Sind. Empreg. Edif. SP');
		$pdf->Text(97,16, $data);
		$pdf->Text(182,16, 'Pagina.: '.$Pagina);
		$pdf->Text(12,18, '_____________________________________________________________________________________________________________________________________');
		$pdf->Text(12,19, '_____________________________________________________________________________________________________________________________________');
		$pdf->SetFont('Arial', 'B', 10);
		$pdf->SetXY(12,20);
		
	
		$pdf->MultiCell(182,5, 'Relatorio Contribuições Nao Pagas de '.$inicio." ate ".$fim, 0, 'C',0); // J Justificado
		$pdf->SetFont('Arial', 'B', 7);
		$pdf->Text(12,25, '_____________________________________________________________________________________________________________________________________');
		$pdf->Text(12,26, '_____________________________________________________________________________________________________________________________________');
			//               012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890
			//               1         2         3         4         5         6         7         8         9         10        11        12        13        14        15          
			//                   Codigo      
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(12,30, 'Codigo');
		$pdf->Text(25,30, 'Nome Edificio');
		$pdf->Text(75,30, 'Endereco');
		$pdf->SetXY(14,27);
		$pdf->MultiCell(130,5, 'Valor', 0, 'R',0); // J Justificado

		$pdf->SetXY(14,27);
		$pdf->MultiCell(150,5, 'Val.Cred.', 0, 'R',0); // J Justificado

		$pdf->Text(165,30, 'Adms');
		$pdf->Text(177,30, 'Vencto');
	}
	
	
	// Conta numero de linha
	if ($lin == 0){
		$lin = 33;
	}else{
		$lin = $lin + 3;
	}
	
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(14,$lin, $edif_cgc);
		
		
	$pdf->Text(25,$lin, substr($nome_edif,0,32));
		
	$pdf->Text(75,$lin, substr($end_edif,0,30));
		
	$pdf->SetXY(14,$lin-3);
	$pdf->MultiCell(130,5, number_format($val_sindi,2,",","."), 0, 'R',0); // J Justificado

	$pdf->SetXY(14,$lin-3);
	$pdf->MultiCell(149,5, number_format($val_cred,2,",","."), 0, 'R',0); // J Justificado
		
	$pdf->Text(166,$lin, $adm_edif);
		
	$pdf->Text(175,$lin, $venc_to);
	
	
	$valor_fim = $valor_fim + $val_sindi;
	$valor_fim2 = $valor_fim2 + $val_cred;
		
	$conta_pag++;
	$total++;
	
	
	// Verifica Numero de linha e cria outra pagina
	if ($conta_pag == 80){  // 80 em Retrato 54 em Paisagem
	   $cont_linha = 0;	
	   $conta_pag  = 1;
	   $Pagina++;
	   $pdf->SetFont('Arial', 'B', 7);
	   $pdf->Text(12,$lin+3, '_____________________________________________________________________________________________________________________________________');
	   $pdf->Text(12,$lin+4, '_____________________________________________________________________________________________________________________________________');
	   $lin = 0;
	   $pdf->AddPage();
		
	}
	
	}
	
	// Final do Relatorio
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Text(12,$lin+3, '_____________________________________________________________________________________________________________________________________');
	$pdf->Text(12,$lin+4, '_____________________________________________________________________________________________________________________________________');
	$pdf->SetFont('Arial', 'B', 9);
	
	
		$pdf->Text(15,$lin+8, 'Qtd.: '.$total);
	
		$pdf->Text(70,$lin+8, 'Total.:');
		
		$pdf->SetXY(14,$lin+5);
		$pdf->MultiCell(100,5, number_format($valor_fim,2,",","."), 0, 'R',0); // J Justificado

		$pdf->Text(120,$lin+8, 'Total Cred.:');
	
		$pdf->SetXY(14,$lin+5);
		$pdf->MultiCell(155,5, number_format($valor_fim2,2,",","."), 0, 'R',0); // J Justificado
	
	$pdf->AutoPrint(true);
	$pdf->Output();
	
	@mysql_close();   

}

?>
<?
/*
/**
 *  -----------------------------------------------------
 *  Desenvolvido por...: Edson de Araujo
 *  Finalidade.........: Tratar Retorno Banco do Brasil
 *  Criado em Data.....: 05/02/2010
 *  Ultima Alteracao...: 05/02/2010
 *  
 *  DEUS SEJA LOUVADO
 *  -----------------------------------------------------
**/ 
include("../config.php");

include("../logar.php");

// Abre Conexao com MySql
include("../conexao.php");
// Chama o Banco de Dados
$link = @mysql_connect($hot,$user,$pass);

@mysql_select_db($db);


// Salva Sessao
session_start();

$vencto1  = $_SESSION['vencto1_bb'];
$exec1    = $_SESSION['exec1_bb'];
$recebe   = $_SESSION['recebe3_bb']; 
$cont_rec = 0;
$data_b   = date("d/m/Y");

$mensa_sun  = 0;
$contri_sun = 0;
$duplic     = 0;

$tipo_vencto   = $vencto1;
$tipo_vencto2  = str_replace("/","",$vencto1);

if ($exec1 == 1){
	
   $tipo_contri = "CONFEDERATIVA";
	
}
if ($exec1 == 2){
	
   $tipo_contri = "ASSITENCIAL";
	
}
if ($exec1 >= 1000){
	
   $tipo_contri = "SINDICAL";
	
}

if ($recebe == 2){  // Retorno Banco do Brasil Contribuicao e Mensalidades

//    echo $tipo_vencto."<br>";
//    echo $tipo_vencto2."<br>";
//    echo $tipo_contri."<br>";
//    echo "entrei aqui na confederativa/assistencial -- Banco do Brasil --";
    //break;
    
	for ($iv_t = 289; $iv_t < 500; $iv_t++){
		
	    if($iv_t < 10){
	    	$i_conp == "00";
	    }
	    if($iv_t >= 10 and $iv_t < 100){
	    	$i_conp == "0";
	    }
	    if($iv_t >= 100 and $iv_t < 1000){
	    	$i_conp == "";
	    }
	    $i_sequenc = $i_conp.$iv_t;
	
		$linha = @file("txt/CBR64".trim($i_sequenc).".RET");
		
		$total = count($linha);
		
		for ($si = 0; $si < $total; $si++ ){
			
			list($dados1,$dados2,$dados3,$dados4,$dados5,) = explode("\t", $linha[$si]);
		
			// Manupula Dados
			
			// Mensalidades Socios
			if(substr($dados1,31,7) == "1449863"){
				$mensa_sun++;
				$cont_rec++;
			
			   if(substr($dados1,77,1) == "1"){
			   	$iv_comple_cod = "A";
			   }
			   if(substr($dados1,77,1) == "2"){
			   	$iv_comple_cod = "B";
			   }
			   if(substr($dados1,77,1) == "3"){
			   	$iv_comple_cod = "C";
			   }
			   if(substr($dados1,77,1) == "4"){
			   	$iv_comple_cod = "D";
			   }
			   if(substr($dados1,77,1) == "5"){
			   	$iv_comple_cod = "E";
			   }
			
				$ivDATA_VENCTO = substr($dados1,110,7);
				$dv1           = substr($ivDATA_VENCTO,0,2);
				$dv2           = substr($ivDATA_VENCTO,2,2);
				$dv3           = "20".substr($ivDATA_VENCTO,4,2);
				$ivDATA_VENCTO = $dv1+"/"+$dv2+"/"+$dv3;
				$ivMESANO      = substr($dados1,78,2)."/".$dv3;
				if (substr($dados1,78,2) == "02"){
					$iv_Vencto_mes = "28/".substr($dados1,78,2)."/".$dv3;
				}else{
				  	$iv_Vencto_mes = "30/".substr($dados1,78,2)."/".$dv3;
				}
	/*			  
				echo "i_IDENTIFICACAO = ".substr($dados1,31,7)."<br>";
				echo "ivCOD_soc		  = ".substr($dados1,70,7).$iv_comple_cod."<br>";
				echo "iv_NU 		  = ".substr($dados1,77,1)."<br>";
				echo "iv_MES_PG 	  = ".substr($dados1,78,2)."<br>";
				echo "ivDATA_VENCTO   = ".substr($dados1,110,7)."<br>";
				echo "ivVALOR 		  = ".substr($dados1,146,19)."<br>";
				echo "ivAGENCIA 	  = ".substr($dados1,165,4)."<br>";
				echo "ivDATA_PAGTO    = ".substr($dados1,175,6)."<br>";
				echo "Vencimento      = ".$iv_Vencto_mes."<br>";
				echo "Mes e Ano       = ".$ivMESANO."<br>";
				echo $dados54."fim da linha  ASSOCIADOS<br><br><br>";
	*/
			    $isVALOR       = substr($dados1,146,19);
			    $isV1          = substr($isVALOR,17,2);
			    $isV2          = substr($isVALOR,0,17);
			    $isVALOR       = $isV2.".".$isV1;
	
	
	            $i_cod    = substr($dados1,70,7);
	            $Edit1    = intval(substr($dados1,70,7)).$iv_comple_cod;
	            $data_sys = date("d/m/Y");
	            $Edit2    = $isVALOR;
	            $Edit3    = $iv_Vencto_mes;
	            $agen_sys = substr($dados1,165,4);
	            $inst_sys = "MENSALIDADE";
	            $Edit4    = $ivMESANO;
	            $Edit5    = substr($dados1,78,2);
	            $Edit6    = $dv3;
	            
	            if ($Edit2 == '10.00'){
	            	
	            	
	            	$inst_sys = "MENSA. TIETE";
	            	
		            // Atualiza Mensalidade Clube Tiete
					$consulta_t = "INSERT INTO aberto_soc_tiete (COD,
						                                       CODP,
															   DATA,
															   TOTAL,
															   PAGTO,
															   VENCTO,
															   AGENCIA,
															   DAT_BAI,
															   DESCRICAO,
															   VENC_DATA,
															   MESANO,
															   MES,
															   ANO)
															
					                           VALUES ('$i_cod',
											           '$Edit1',
													   '$data_sys',
													   '$Edit2',
													   '$data_sys',
													   '$Edit3',
													   '$agen_sys',
													   '$data_sys',
													   '$inst_sys',
													   '$Edit3',
													   '$Edit4',
													   '$Edit5',
													   '$Edit6')";
					
					@mysql_query($consulta_t, $link);
	            	
	            }else{
	            	

	            $consulta_mens_p  = "SELECT * FROM aberto_soc WHERE CODP = '$Edit1' AND TOTAL = '$Edit2' AND MESANO = '$Edit4'";
						
				$resultado_mens_p = @mysql_query($consulta_mens_p);
						
				$row_mens_p = @mysql_fetch_array($resultado_mens_p);
						
				$conf_id_cod     = @$row_mens_p["id"];

                if (!empty($conf_id_cod)){

                    // Ja Cadastrado
                    $duplic++;
                    
	            }else{
		            // Atualiza Arquivo Aberto_soc
					$consulta = "INSERT INTO aberto_soc (COD,
					                                     CODP,
														 DATA,
														 TOTAL,
														 PAGTO,
														 VENCTO,
														 AGENCIA,
														 DAT_BAI,
														 DESCRICAO,
														 VENC_DATA,
														 MESANO,
														 MES,
														 ANO)
															
					                           VALUES ('$i_cod',
											           '$Edit1',
													   '$data_sys',
													   '$Edit2',
													   '$data_sys',
													   '$Edit3',
													   '$agen_sys',
													   '$data_sys',
													   '$inst_sys',
													   '$Edit3',
													   '$Edit4',
													   '$Edit5',
													   '$Edit6')";
					
					@mysql_query($consulta, $link);
				}	
	           }
				
			}
			// Pagamentos de Conf/Assist
			if(substr($dados1,31,7) == "284723 "){
			    $contri_sun++;
				$cont_rec++;
				 
				// Achar Vencimento
				$var_dias = "";
				$var_dia  = 07;
				$var_mes  = 10;
				$var_ano  =1997;
				$data_fim = mktime(24*$var_dias, 0, 0, $var_mes, $var_dia, $var_ano);
				$data_ven = date('d/m/Y', $data_fim); 
				 
				 
				 
				$iv_DATA_PACTO = substr($dados1,175,6);
				$dt1           = substr($iv_DATA_PACTO,0,2);
				$dt2           = substr($iv_DATA_PACTO,2,2);
				$dt3           = "20".substr($iv_DATA_PACTO,4,2);
				$ivDATA_VENCTO = $dt1."/".$dt2."/".$dt3;
				$ivMESANO      = "  /  ";
				$iv_comple_cod = " ";
			
			    $ivVALOR       = substr($dados1,146,19);
			    $ivV1          = substr($ivVALOR,17,2);
			    $ivV2          = substr($ivVALOR,0,17);
			    $ivVALOR       = $ivV2.".".$ivV1;
	/*		
				echo "i_IDENTIFICACAO = ".substr($dados1,31,7)."<br>";
				echo "ivCOD_edif	  = ".substr($dados1,68,5)."<br>";
				echo "iv_NU 		  = ".substr($dados1,77,1)."<br>";
				echo "iv_MES_PG 	  = ".substr($dados1,78,2)."<br>";
				echo "ivDATA_VENCTO   = ".substr($dados1,110,7)."<br>";
				echo "ivVALOR 		  = ".substr($dados1,146,19)."<br>";
				echo "ivAGENCIA 	  = ".substr($dados1,165,4)."<br>";
				echo "ivDATA_PAGTO    = ".substr($dados1,175,6)."<br>";
				echo "Vencimento      = ".$ivDATA_VENCTO."<br>";
				echo "Valor           = ".$ivVALOR."<br>";
			
			    echo $dados54."fim da linha CONTRIBUICAO<br><br><br>";
	*/
	            $Edit1    = intval(substr($dados1,68,5));
	            $Edit2    = $tipo_vencto;
	            $Edit3    = $ivVALOR;
	            $Edit4    = substr($dados1,165,4);
	            $Edit5    = $tipo_contri;
	            $Edit6    = $ivDATA_VENCTO;
	            $data_sys = date("d/m/Y");
	            //$Edit7    = date($tipo_vencto);
	            

	            $consulta_sind_p  = "SELECT * FROM conf WHERE CONFCOD = '$Edit1' AND TOTAL = '$Edit3' AND VENCTO = '$Edit2'";
						
				$resultado_sind_p = @mysql_query($consulta_sind_p);
						
				$row_sind_p = @mysql_fetch_array($resultado_sind_p);
						
				$conf_id_cod     = @$row_sind_p["id"];

                if (!empty($conf_id_cod)){


                    // Ja Cadastrado
                    $duplic++;
                        	
                    // Grava Informacoes na Tabela
					$consulta1_d = "INSERT INTO conf_duplic    (CONFCOD,
					                                     		VENCTO,
														 		TOTAL,
														 		AGENCIA,
														 		DESCRICAO,
														 		DAT_BAI,
					                                     		DATA,
					                                     		PAGTO)
															
					                           VALUES ('$Edit1',
											           '$Edit2',
													   '$Edit3',
													   '$Edit4',
													   '$Edit5',
													   '$data_sys',
													   '$data_sys',
													   '$Edit6')";
					
					@mysql_query($consulta1_d, $link);

	            
	            }else{
	            	
	            	
					$consulta1 = "INSERT INTO conf      (CONFCOD,
					                                     VENCTO,
														 TOTAL,
														 AGENCIA,
														 DESCRICAO,
														 DAT_BAI,
					                                     DATA,
					                                     PAGTO)
															
					                           VALUES ('$Edit1',
											           '$Edit2',
													   '$Edit3',
													   '$Edit4',
													   '$Edit5',
													   '$data_sys',
													   '$data_sys',
													   '$Edit6')";
					
					@mysql_query($consulta1, $link)
					
	                or 
							die("
							     <br>
							     <br>
							     
								 <div align=center>
							
							     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
							     <tr>
							     <td>
							     <font face=arial><b>*** Falha ao exportar Arquivo !!! ***</b>
							     <table align=center>
							     <form method='POST' action='../avaleht.php?servletjs2=20$$20'>
							     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
							     </form> 
							     </table>
							     </td>
							     </tr>
							     </table>
							     </div>");				
	            	
	            	
	            	
	            }
			
			}
	}	
	}
}

if ($recebe == 1){  // Retorno Caixa Economica Nossa Caixa

//    echo $tipo_vencto."<br>";
//    echo $tipo_vencto2."<br>";
//    echo $tipo_contri."<br>";
//    echo "entrei aqui na Sindical -- Caixa Economica --"."<br>";
//    break;


	for ($iv_t = 0; $iv_t < 99999; $iv_t++){
		
	    if($iv_t < 10){
	    	$i_conp == "0000";
	    }
	    if($iv_t >= 10 and $iv_t < 100){
	    	$i_conp == "000";
	    }
	    if($iv_t >= 100 and $iv_t < 1000){
	    	$i_conp == "0";
	    }
	    if($iv_t >= 1000 and $iv_t < 10000){
	    	$i_conp == "";
	    }
	    $i_sequenc = $i_conp.$iv_t;
	
		$linha = @file("retorno/T10".trim($i_sequenc).".RET");
		
/*		
		T1000001
		T1000010
		T1000100
		T1001000
		T1010000
*/		
		$total = count($linha);
		
		for ($si = 0; $si < $total; $si++ ){
			
			list($dados1,$dados2,$dados3,$dados4,$dados5,$dados6,$dados7,$dados8,) = explode("\t", $linha[$si]);


            //echo "d 1 = ".$dados1."<br>";
            //echo "d 2 = ".$dados2."<br>";
            //echo "d 3 = ".$dados3."<br>";
            //echo "d 4 = ".$dados4."<br>";
            //echo "d 5 = ".$dados5."<br>";
            //echo "d 6 = ".$dados6."<br>";
            
			$indt_lin = substr($dados1,13,1);

	        if ($indt_lin == "T"){	
	        	$cont_rec++;
				// Manipula Dados
				
				// CNPJ
				$cnpj_sind1    = substr($dados1,133,15);
				$cnp_2         = substr($dados1,136,2);
				$cnp_3         = substr($dados1,138,3);
				$cnp_4         = substr($dados1,141,3);
				$cnp_5         = substr($dados1,144,4);
				
	            $cnpj_sind = $cnp_2.".".$cnp_3.".".$cnp_4."/".$cnp_5;
	            $wcgc      = $cnp_2.$cnp_3.$cnp_4.$cnp_5;
	
				$v = preg_replace ('/[^0-9]/', '', $cnpj_sind);
				
				$ok = false;
				if (strlen($v) == 9) {
				  $novo_cnpj = cpf_calc($v);
				  $ok = true;
				}
				if (strlen($v) == 12) {
				  $novo_cnpj = cnpj_calc($v);
				  $ok = true;
				}
	
	            // Vencimento
	            $venc_sind = substr($dados1,73,8);
	            $_dia      = substr($dados1,73,2);
	            $_mes      = substr($dados1,75,2);
	            $_ano      = substr($dados1,77,4);
	            
	            $venc_sind = trim($_dia)."/".trim($_mes)."/".trim($_ano);


            }
             
           
		        if ($indt_lin == "U"){
		        	
		        	$i_valor = substr($dados1,80,12);
					$i_valor = substr($i_valor,0,10).".".substr($i_valor,10,2);
					
					$i_credi  = substr($dados1,95,12);
					$i_credi  = substr($i_credi,0,10).".".substr($i_credi,10,2); 

					$i_locpag = substr($dados1,180,18);

                    // echo "<br>";
                    // echo "Vencto ".$venc_sind."<br>";
                    // echo "CNPJ ".$novo_cnpj."<br>";
	 		        // echo "Valor pago ..".$i_valor."<br>"; 
			        // echo "Valor Credi..".$i_credi."<br>"; 
			        // echo "Local Pago...".$i_locpag."<br>"; 

                    // Consulta Edificio para ver se esta cadastrado
                    
                    $consulta_cgc  = "SELECT * FROM edificios WHERE CGC = '$novo_cnpj'";
					
					// Retorno o Resultado da Pesquisa
					
					@mysql_query($consulta_cgc, $link);
					     
					$resultado_cgc = @mysql_query($consulta_cgc);
					
					$row_cgc = @mysql_fetch_array($resultado_cgc);
					
					$id_cgc   = @$row_cgc["id"];
					$edif_cgc = @$row_cgc["COD"];
					$emp_edif = @$row_cgc["NU_EMP"];
					
			        // echo "Edif.....".$edif_cgc."<br>";
			        
			        
			        // Atualiza Baixas Gerador_conf
			        $consulta_sind_px  = "SELECT * FROM gerador_cof WHERE COD = '$edif_cgc' AND VENCTO = '$venc_sind' AND TIPO_CONT = '$tipo_cont_1'";
					 
					$resultado_sind_px = @mysql_query($consulta_sind_px);
						
					$row_sind_px = @mysql_fetch_array($resultado_sind_px);
						
					$sind_id_codx     = @$row_sind_px["controle"];

                    if (!empty($sind_id_codx)){
                    	
                    	
						$so_qt_nov = $QTD + 1;
						$date_3x   = date('d/m/Y');
						
						$consulta_upd = "UPDATE gerador_conf  SET DATA_BAI	  = '$date_3x',
					                                              VALOR 	  = '$i_valor',
																  SITUACAO    = 'PAGO' WHERE controle = '$sind_id_codx'";
						@mysql_query($consulta_upd, $link);
                    	
                        	//  COD = '$edif_cgc' AND VENCTO = '$venc_sind'  AND TIPO_CONT = '$tipo_cont_1'
                    }	
                    // Fim Atualizacao Gerador_conf
			        

					if (!empty($id_cgc)){
						
						if(strlen($emp_edif)<=0){
						  $emp_edif   = 0; 	
						}


	                    $consulta_sind_p  = "SELECT * FROM sindical WHERE SINDCOD = '$edif_cgc' AND TOTAL  = '$i_valor' AND VENCTO = '$venc_sind'";
					 
						$resultado_sind_p = @mysql_query($consulta_sind_p);
						
						$row_sind_p = @mysql_fetch_array($resultado_sind_p);
						
						$sind_id_cod     = @$row_sind_p["id"];

                        if (!empty($sind_id_cod)){
                        	
                        	// Ja Cadastrado
                        	$duplic++;
                        	
                        			                    // Grava Informacoes na Tabela
							$consulta_cgc1 = "INSERT INTO sindical_duplica ( SINDCOD,
							                                                TOTAL,
																			VENCTO,
																			EXER,
																			DESCRICAO,
																			PAGTO,
									                                        DATA,
																			EMPR_E,
																			LOCALP,
																			VALOR_CRED)
																	
							                           VALUES ('$edif_cgc',
													           '$i_valor',
															   '$venc_sind',
															   '$_ano',
															   'SINDICAL',
															   '$data_b',
															   '$data_b',
															   '$emp_edif',
															   '$i_locpag',
															   '$i_credi')";
	
							
							 @mysql_query($consulta_cgc1, $link);
                        	
                        	
                        }else{
                        	
		                    // Grava Informacoes na Tabela
							$consulta_cgc2 = "INSERT INTO sindical  (SINDCOD,
							                                        TOTAL,
																	VENCTO,
																	EXER,
																	DESCRICAO,
																	PAGTO,
							                                        DATA,
																	EMPR_E,
																	LOCALP,
																	VALOR_CRED)
																	
							                           VALUES ('$edif_cgc',
													           '$i_valor',
															   '$venc_sind',
															   '$_ano',
															   'SINDICAL',
															   '$data_b',
															   '$data_b',
															   '$emp_edif',
															   '$i_locpag',
															   '$i_credi')";
	
							
							 @mysql_query($consulta_cgc2, $link)
							              or 
							
							 die("
							      <br>
							      <br>
							     
							 	  <div align=center>
							
							      <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
							      <tr>
							      <td>
							      <font face=arial><b>*** Falha ao exportar Arquivo !!! ***</b>
							      <table align=center>
							      <form method='POST' action='../avaleht.php?servletjs2=20$$20'>
							      <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
							      </form> 
							      </table>
							      </td>
							      </tr>
							      </table>
							      </div>");
						 }    
	
	                }else{
	                	 // Grava arquivo CNPJ nao cadastrado
	                	
	                	 $consulta_sav = "INSERT INTO sind_cnpj_nao (CNPJ,
											                         VALOR,
		                                                             VENCIMENTO,
											                         EXER,
											                         DESCRICAO,
											                         PAGTO,
											                         DATA,
											                         NUMERO,
																	 LOCAL,
																	 VALOR_CRED)
		                                           VALUES
		                                                  ('$novo_cnpj',
												           '$i_valor',
														   '$venc_sind',
														   '$_ano',
														   'SINDICAL',
														   '$data_b',
														   '$data_b',
														   '$emp_edif',
														   '$i_locpag',
														   '$i_credi')";
		
		               @mysql_query($consulta_sav, $link);

	                	
	                	
	                }
		        }	

			
        }
        
    }
}
    
if ($recebe == 3){  // Retorno Bradesco


//    echo $tipo_vencto."<br>";
//    echo $tipo_vencto2."<br>";
//    echo $tipo_contri."<br>";
//    echo "entrei aqui -- Bradesco -- ";
//    break;

}
/**
 * 
 * Renomeia Arquivos ja processados
 * 
**/

function Retira_Hifem($str){
if(strlen($str) > 0) {
//$str=trim(str_replace("-","",$str)); 
$str=trim(str_replace("RET",date("d-m-Y"),$str));
return $str;
}
}


function Retira_Hifem2($str){
if(strlen($str) > 0) {
//$str=trim(str_replace("-","",$str)); 
$str=trim(str_replace("RET",date("d-m-Y"),$str));
return $str;
}
}


if ($recebe == 2){
$dir = "txt";

if ($handle = opendir($dir)) {
$contador = 0;
while (false !== ($file = readdir($handle))) {
@rename("txt/".$file."","txt/".Retira_Hifem($file).$contador."");

$contador++;
}
$total = $contador - 2 ;
//echo "<center><b>Foram Tratados(s) ".$total." arquivos.</b></center>";
}
}


if ($recebe == 1){
$dir = "retorno";

if ($handle = opendir($dir)) {
$contador = 0;
while (false !== ($file = readdir($handle))) {
@rename("retorno/".$file."","retorno/".Retira_Hifem2($file).$contador."");

$contador++;
}
$total = $contador - 2 ;
//echo "<center><b>Foram Tratados(s) ".$total." arquivos.</b></center>";
}
}

closedir($handle);


?>

<html>
<head>
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
</head>
<body>

<style type=text/css>

body { background-image: url(<?='../'.$logo_sis;?>);
       background-attachment: fixed }

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
-->
</style> 

</body>

<div align=center>




<table width="336" height="202"  align="center" border="15" bgcolor="#FFFFFF" bordercolor ='<?=$color_bor;?>'>

<td align="center"><br />
<img src="../imagens/exclam.gif" width="100" height="100" align="center"/><br />
<img src="../imagens/px1.gif" width="10" height="10" align="center"/><br />
<font color="#336699" face=Verdana  size="4">
<b>Arquivos do Banco<br>Tratados com Susseso<br/></font><?=$tipo_contri;?><br /><font size="4">No Reg.:&nbsp;&nbsp;&nbsp;<?=$cont_rec;?>


<?
if ($recebe == 2){
?>

	<br />
	Mensalidades:&nbsp;&nbsp;&nbsp;<?=$mensa_sun;?><br />
	Contribuição:&nbsp;&nbsp;&nbsp;<?=$contri_sun;?><br />
	Reg. Duplicados:&nbsp;&nbsp;&nbsp;<?=$duplic;?>

<?
}else{
?>

	<br />
	Reg. Duplicados:&nbsp;&nbsp;&nbsp;<?=$duplic;?>

<?
}
?>

</b></font>

<br/>
<div align="center">
          <table border=0  align=center>
          <tr align=center colspan=2><br /> 

	      <a href="../avaleht.php?servletjs2=20$$20">
	      <img alt="sair" src="../imagens/botaoazul25.PNG" border="0"></a>
	      </tr>
	      </table>
</div>
</td>
</table>
</div>

</html>

<?


function cpf_calc ($cpf) {
  if (strlen($cpf) != 9) {
    return "xxx.xxx.xxx-xx";
  }
  for ($vez = 0; $vez < 2; $vez++) {
    $mult = 10 + $vez;
    $soma = 0;
    for ($indice = 0; $indice < 9; $indice++) {
      $soma += $mult * intval(substr($cpf,$indice,1));
      $mult--;
    }
    if ($vez) {
      $soma += $digito[0] * 2;
    }
    $valint = intval($soma/11) * 11;
    $res = $soma - $valint;
    if ($res <= 1) {
      $digito[$vez] = 0;
    } else {
      $digito[$vez] = 11 - $res;
    }
  }
  return substr($cpf,0,3).".".substr($cpf,3,3).".".substr($cpf,6).
    "-".$digito[0].$digito[1]; 
}

function cnpj_calc ($cnpj) {
  if (strlen($cnpj) != 12) {
    return "xx.xxx.xxx/xxxx-xx";
  }
  for ($vez = 0; $vez < 2; $vez++) {
    $mult = 5 + $vez;
    $soma = 0;
    for ($indice = 0; $indice < 12; $indice++) {
      $soma += $mult * intval(substr($cnpj,$indice,1));
      $mult--;
      if ($mult == 1) { $mult = 9; }
    }
    if ($vez) {
      $soma += $digito[0] * 2;
    }
    $valint = intval($soma/11) * 11;
    $res = $soma - $valint;
    if ($res <= 1) {
      $digito[$vez] = 0;
    } else {
      $digito[$vez] = 11 - $res;
    }
  }
  return substr($cnpj,0,2).".".substr($cnpj,2,3).".".substr($cnpj,5,3).
    "/".substr($cnpj,8,4)."-".$digito[0].$digito[1]; 
}



?>
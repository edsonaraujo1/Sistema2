<?php

/**
 * @author holodek
 * @copyright 2011
 */

// Abre Conexão com o MySql
include("conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

$consulta  = "SELECT * FROM socios WHERE id >= 1 ORDER BY id ASC";
		
$resultado = @mysql_query($consulta);

$contr_0    = 0;
$contr_1    = 0;
		
while ($linha = mysql_fetch_array($resultado))
{
		
				    $id_conf   = $linha["id"];
					$cod_ag    = $linha["CODP"];
					$nome      = $linha["NOMEASSOC"];
					
					$Edit1		= trim(strtoupper(retirar_carac($linha["COD"])));
					$new_fot    = trim(strtoupper(retirar_carac($linha["CODP"])));
					$Edit2	    = trim(strtoupper(retirar_carac($linha["NU"])));
					$Edit3      = trim(strtoupper(retirar_carac($linha["RGASSOC"])));
					$Edit4  	= trim(strtoupper(retirar_carac($linha["CPF"])));
					$Edit5  	= trim(strtoupper(retirar_carac($linha["DATINSC"])));
					$Edit6		= trim(strtoupper(retirar_carac($linha["DAT2"])));
					$Edit7		= trim(strtoupper(retirar_carac($linha["DAT3"])));
					$Edit8		= trim(strtoupper(retirar_carac($linha["SEDE"])));
					$Edit9		= trim(strtoupper(retirar_carac($linha["CATEGORIA"])));
					$Edit10		= trim(strtoupper(retirar_carac($linha["CODEDIF"])));
					$Edit11		= trim(strtoupper(retirar_carac($linha["NOMEASSOC"])));
					$Edit12		= trim(strtoupper(retirar_carac($linha["RUA"])));
					$Edit13 	= trim(strtoupper(retirar_carac($linha["ENDRESID"])));
					$Edit14		= trim(strtoupper(retirar_carac($linha["NUMERO"])));
					$Edit15		= trim(strtoupper(retirar_carac($linha["BAIRRORES"])));
					$Edit16		= trim(strtoupper(retirar_carac($linha["CEPRES"])));
					$Edit17		= trim(strtoupper(retirar_carac($linha["CIDADERES"])));
					$Edit18		= trim(strtoupper(retirar_carac($linha["ESTADORES"])));
					$Edit19		= trim(strtoupper(retirar_carac($linha["TELEFONE"])));
					$Edit20		= trim(strtoupper(retirar_carac($linha["CARTTRAB"])));
					$Edit21		= trim(strtoupper(retirar_carac($linha["SERIE"])));
					$Edit22		= trim(strtoupper(retirar_carac($linha["EMISCART"])));
					$Edit23		= trim(strtoupper(retirar_carac($linha["CARGOASSOC"])));
					$Edit24		= trim(strtoupper(retirar_carac($linha["DATADIMIS"])));
					$Edit25		= trim(strtoupper(retirar_carac($linha["ESTCIVIL"])));
					$Edit26		= trim(strtoupper(retirar_carac($linha["NUMDEP"])));
					$Edit27		= trim(strtoupper(retirar_carac($linha["MES"])));
					$Edit28		= trim(strtoupper(retirar_carac($linha["ANO"])));
					$Edit29		= trim(strtoupper(retirar_carac($linha["CAD_SI"])));
					$Edit30		= trim(strtoupper(retirar_carac($linha["SALDO"])));
					$Edit31		= trim(strtoupper(retirar_carac($linha["PREST"])));
					$Edit32		= trim(strtoupper(retirar_carac($linha["PAGO"])));
					$Edit33		= trim(strtoupper(retirar_carac($linha["NATURAL1"])));
					$Edit34		= trim(strtoupper(retirar_carac($linha["DATNASC"])));
					$Edit35		= trim(strtoupper(retirar_carac($linha["NASCION"])));
					$Edit36		= trim(strtoupper(retirar_carac($linha["PAI"])));
					$Edit37		= trim(strtoupper(retirar_carac($linha["MAE"])));
					$Edit38		= trim(strtoupper(retirar_carac($linha["CONJUGE"])));
					$Edit39		= trim(strtoupper(retirar_carac($linha["DATCONJ"])));
					$Edit40		= trim(strtoupper(retirar_carac($linha["FILHO01"])));
					$Edit41		= trim(strtoupper(retirar_carac($linha["DAT01"])));
					$Edit42		= trim(strtoupper(retirar_carac($linha["SEXO01"])));
					$Edit43		= trim(strtoupper(retirar_carac($linha["FILHO02"])));
					$Edit44		= trim(strtoupper(retirar_carac($linha["DAT02"])));
					$Edit45		= trim(strtoupper(retirar_carac($linha["SEXO02"])));
					$Edit46		= trim(strtoupper(retirar_carac($linha["FILHO03"])));
					$Edit47		= trim(strtoupper(retirar_carac($linha["DAT03"])));
					$Edit48		= trim(strtoupper(retirar_carac($linha["SEXO03"])));
					$Edit49		= trim(strtoupper(retirar_carac($linha["FILHO04"])));
					$Edit50		= trim(strtoupper(retirar_carac($linha["DAT04"])));
					$Edit51		= trim(strtoupper(retirar_carac($linha["SEXO04"])));
					$Edit52		= trim(strtoupper(retirar_carac($linha["FILHO05"])));
					$Edit53		= trim(strtoupper(retirar_carac($linha["DAT05"])));
					$Edit54		= trim(strtoupper(retirar_carac($linha["SEXO05"])));
					$Edit55		= trim(strtoupper(retirar_carac($linha["FILHO06"])));
					$Edit56		= trim(strtoupper(retirar_carac($linha["DAT06"])));
					$Edit57		= trim(strtoupper(retirar_carac($linha["SEXO06"])));
					$Edit58		= trim(strtoupper(retirar_carac($linha["FILHO07"])));
					$Edit59		= trim(strtoupper(retirar_carac($linha["DAT07"])));
					$Edit60		= trim(strtoupper(retirar_carac($linha["SEXO07"])));
					$Edit61		= trim(strtoupper(retirar_carac($linha["FILHO08"])));
					$Edit62		= trim(strtoupper(retirar_carac($linha["DAT08"])));
					$Edit63		= trim(strtoupper(retirar_carac($linha["SEXO08"])));
					$Edit64 	= trim(strtoupper(retirar_carac($linha["FILHO09"])));
					$Edit65		= trim(strtoupper(retirar_carac($linha["DAT09"])));
					$Edit66		= trim(strtoupper(retirar_carac($linha["SEXO09"])));
					$Edit67		= trim(strtoupper(retirar_carac($linha["FILHO10"])));
					$Edit68		= trim(strtoupper(retirar_carac($linha["DAT10"])));
					$Edit69		= trim(strtoupper(retirar_carac($linha["SEXO10"])));
					$Edit70		= trim(strtoupper(retirar_carac($linha["OBS"])));
					$Edit71		= trim(strtoupper(retirar_carac($linha["SEXO_SOC"])));
					$Edit72		= trim(strtoupper(retirar_carac($linha["ESCOLARIDADE"])));
					$Edit73		= trim(strtoupper(retirar_carac($linha["USUARIO"])));
					
					$nome_do_edif	= trim(strtoupper(retirar_carac($linha["CAMPO_EDIF"])));
					$categ_1	    = trim(strtoupper(retirar_carac($linha["CAMPO_CATEG"])));

                    //echo "Retornado<br><br>";
					//echo $cod."<br>";
                    //echo $nome."<br>";
                    //echo $cod_edif."<br>";


                   // Pesquiza Edificio
                    $sql  = "SELECT * FROM socios_agile WHERE CODP = '$cod_ag'";	
	
	                $resultado5 = @mysql_query($sql);

                    $row5 = @mysql_fetch_array($resultado5);

                    $id_edif     = @$row5["id"];
                    $edif_cgc    = @$row5["CGC"];
                    
                    //echo "Codigo achado...".$cod_ag."<br>";
                    
                    if (empty($id_edif)){
                    	
                    	// Atualiza Socios
                    	
                    	
						$consulta_up = "INSERT INTO socios_agile (COD,
															NU,
															CODP,
															RGASSOC,
															CPF,
															DATINSC,
															DAT2,
															DAT3,
															SEDE,
															CATEGORIA,
															CODEDIF,
															NOMEASSOC,
															RUA,
															ENDRESID,
															NUMERO,
															BAIRRORES,
															CEPRES,
															CIDADERES,
															ESTADORES,
															TELEFONE,
															CARTTRAB,
															SERIE,
															EMISCART,
															CARGOASSOC,
															DATADIMIS,
															ESTCIVIL,
															NUMDEP,
															MES,
															ANO,
															CAD_SI,
															SALDO,
															PREST,
															PAGO,
															NATURAL1,
															DATNASC,
															NASCION,
															PAI,
															MAE,
															CONJUGE,
															DATCONJ,
															FILHO01,
															DAT01,
															SEXO01,
															FILHO02,
															DAT02,
															SEXO02,
															FILHO03,
															DAT03,
															SEXO03,
															FILHO04,
															DAT04,
															SEXO04,
															FILHO05,
															DAT05,
															SEXO05,
															FILHO06,
															DAT06,
															SEXO06,
															FILHO07,
															DAT07,
															SEXO07,
															FILHO08,
															DAT08,
															SEXO08,
															FILHO09,
															DAT09,
															SEXO09,
															FILHO10,
															DAT10,
															SEXO10,
															OBS,
															CAMPO_EDIF,
															CAMPO_CATEG,
															CAMPO_SIT,
															SEXO_SOC,
															ESCOLARIDADE,
															USUARIO)
						 
						 
						VALUES ('$Edit1',
								'$Edit2',
								'$new_fot',
								'$Edit3',
								'$Edit4',
								'$Edit5',
								'$Edit6',      
								'$Edit7',      
								'$Edit8',
								'$Edit9',
								'$Edit10',    
								'$Edit11',
								'$Edit12',        
								'$Edit13',
								'$Edit14',
								'$Edit15',     
								'$Edit16',        
								'$Edit17',     
								'$Edit18',         
								'$Edit19',
								'$Edit20',       
								'$Edit21',      
								'$Edit22',    
								'$Edit23',     
								'$Edit24',   
								'$Edit25',      
								'$Edit26', 
								'$Edit27',        
								'$Edit28',
								'$Edit29',
								'$Edit30',
								'$Edit31',
								'$Edit32',
								'$Edit33',
								'$Edit34',
								'$Edit35',  
								'$Edit36',        
								'$Edit37',
								'$Edit38',   
								'$Edit39',    
								'$Edit40',     
								'$Edit41',     
								'$Edit42',
								'$Edit43',     
								'$Edit44',     
								'$Edit45',
								'$Edit46',     
								'$Edit47',     
								'$Edit48',
								'$Edit49',     
								'$Edit50',     
								'$Edit51',
								'$Edit52',     
								'$Edit53',     
								'$Edit54',
								'$Edit55',     
								'$Edit56',     
								'$Edit57',
								'$Edit58',     
								'$Edit59',     
								'$Edit60',
								'$Edit61',     
								'$Edit62',     
								'$Edit63',
								'$Edit64',     
								'$Edit65',     
								'$Edit66',
								'$Edit67',    
								'$Edit68',     
								'$Edit69',
								'$Edit70',
								'$nome_do_edif',
								'$categ_1',
								'$nome_cad_si',
								'$Edit71',
								'$Edit72',
								'$Edit73')";
							
						@mysql_query($consulta_up, $link);
                    	
                    	$contr_0++;
                    	
                    	echo "Atualizado<br><br>";
						echo $cod."<br>";
                    	echo $nome."<br>";
                    	
                    }else{
                    	
                    	//echo "Socio ja Consta na Tabela!!<br><br>";
                    	$contr_1++;
                    }
                    

}

echo "Total Atualizado = ".$contr_0."<br>";
echo "Total Não Atualizado = ".$contr_1."<br>";

/*
 --------------------------------
 Funcao para Retirar os caracter
 estranhos e acentos na hora de
 atualizar Table 
---------------------------------
*/

Function retirar_carac($var){

$var = ereg_replace("[ÁÀÂÃ]",        "A",$var);
$var = ereg_replace("[áàâãª]",       "a",$var);
$var = ereg_replace("[ÉÈÊ]",         "E",$var);
$var = ereg_replace("[éèê]",         "e",$var);
$var = ereg_replace("[ÓÒÔÕ]",        "O",$var);
$var = ereg_replace("[óòôõº]",       "o",$var);
$var = ereg_replace("[ÚÙÛ]",         "U",$var);
$var = ereg_replace("[úùû]",         "u",$var);
$var = ereg_replace("[?*#'´`!$%¨]",  " ",$var);
$var = str_replace("Ç",              "C",$var);
$var = str_replace("ç",              "c",$var);
$var = str_replace("\\",             " ",$var);
$var = str_replace(" or ",           " ",$var);
$var = str_replace("select ",        " ",$var);
$var = str_replace("delete ",        " ",$var);
$var = str_replace("create ",        " ",$var);
$var = str_replace("drop ",          " ",$var);
$var = str_replace("update ",        " ",$var);
$var = str_replace("drop table",     " ",$var);
$var = str_replace("show table",     " ",$var);
$var = str_replace("applet",         " ",$var);
$var = str_replace("objetc",         " ",$var);
$var = str_replace("where",          " ",$var);

return($var);
}


?>
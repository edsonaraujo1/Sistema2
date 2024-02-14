<?php

/**
 * @author holodek
 * @copyright 2010
 */

$consulta = "SELECT * FROM socios WHERE DATINSC LIKE '%$ano_base%'";
	
$resultado = @mysql_query($consulta);


while ($linha = mysql_fetch_array($resultado))
{


$id			= $linha["id"];
$Edit1		= $linha["COD"];
$Edit1s		= $linha["COD"];
$new_fot    = encode5t_se($linha["CODP"]);
$Edit2	    = encode5t_se($linha["NU"]);
$Edit3      = encode5t_se(Trim($linha["RGASSOC"]));
$Edit4  	= encode5t_se($linha["CPF"]);
$Edit5  	= encode5t_se($linha["DATINSC"]);
$Edit6		= encode5t_se($linha["DAT2"]);
$Edit7		= encode5t_se($linha["DAT3"]);
$Edit8		= encode5t_se($linha["SEDE"]);
$Edit9		= encode5t_se($linha["CATEGORIA"]);
$Edit10		= $linha["CODEDIF"];
$Edit11		= encode5t_se($linha["NOMEASSOC"]);
$Edit12		= encode5t_se($linha["RUA"]);
$Edit13 	= encode5t_se($linha["ENDRESID"]);
$Edit14		= encode5t_se($linha["NUMERO"]);
$Edit15		= encode5t_se($linha["BAIRRORES"]);
$Edit16		= encode5t_se($linha["CEPRES"]);
$Edit17		= encode5t_se($linha["CIDADERES"]);
$Edit18		= encode5t_se($linha["ESTADORES"]);
$Edit19		= encode5t_se($linha["TELEFONE"]);
$Edit20		= encode5t_se($linha["CARTTRAB"]);
$Edit21		= encode5t_se($linha["SERIE"]);
$Edit22		= encode5t_se($linha["EMISCART"]);
$Edit23		= encode5t_se($linha["CARGOASSOC"]);
$Edit24		= encode5t_se($linha["DATADIMIS"]);
$Edit25		= encode5t_se($linha["ESTCIVIL"]);
$Edit26		= $linha["NUMDEP"];
$Edit27		= $linha["MES"];
$Edit28		= $linha["ANO"];
$Edit29		= encode5t_se($linha["CAD_SI"]);
$Edit30		= $linha["SALDO"];
$Edit31		= $linha["PREST"];
$Edit32		= $linha["PAGO"];
$Edit33		= encode5t_se($linha["NATURAL1"]);
$Edit34		= encode5t_se($linha["DATNASC"]);
$Edit35		= encode5t_se($linha["NASCION"]);
$Edit36		= $linha["PAI"];
$Edit37		= $linha["MAE"];
$Edit38		= $linha["CONJUGE"];
$Edit39		= $linha["DATCONJ"];
$Edit40		= $linha["FILHO01"];
$Edit41		= $linha["DAT01"];
$Edit42		= $linha["SEXO01"];
$Edit43		= $linha["FILHO02"];
$Edit44		= $linha["DAT02"];
$Edit45		= $linha["SEXO02"];
$Edit46		= $linha["FILHO03"];
$Edit47		= $linha["DAT03"];
$Edit48		= $linha["SEXO03"];
$Edit49		= $linha["FILHO04"];
$Edit50		= $linha["DAT04"];
$Edit51		= $linha["SEXO04"];
$Edit52		= $linha["FILHO05"];
$Edit53		= $linha["DAT05"];
$Edit54		= $linha["SEXO05"];
$Edit55		= $linha["FILHO06"];
$Edit56		= $linha["DAT06"];
$Edit57		= $linha["SEXO06"];
$Edit58		= $linha["FILHO07"];
$Edit59		= $linha["DAT07"];
$Edit60		= $linha["SEXO07"];
$Edit61		= $linha["FILHO08"];
$Edit62		= $linha["DAT08"];
$Edit63		= $linha["SEXO08"];
$Edit64 	= $linha["FILHO09"];
$Edit65		= $linha["DAT09"];
$Edit66		= $linha["SEXO09"];
$Edit67		= $linha["FILHO10"];
$Edit68		= $linha["DAT10"];
$Edit69		= $linha["SEXO10"];
$Edit70		= $linha["OBS"];
$Edit71		= $linha["SEXO_SOC"];
$Edit72		= $linha["ESCOLARIDADE"];



}
?>
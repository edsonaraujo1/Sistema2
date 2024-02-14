<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Alterar Cadastro Socios
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 21/01/2009 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");
$nome3 = $_SESSION["nome_log"];

include_once('../sql_injection.php');

include_once("funcoes2.php");

$deixar_1 = acesso("FORM_ASOC");

if ($deixar_1 == "NAO"){
	
    echo "  <html>
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
			
			<br><br><br><br>
				
			<div align=center>
			
			<table align=center border='15' bgcolor='#FFF8DC'  bordercolor ='$color_bor'>
			<tr>
			<td align=center>
			     <font face=arial><b>*** <font color = #FF0000> ERRO ACESSO NÃO PERMITIDO !!!</font> ***<br>
				                     
									 <font face=arial>Usuário sem Permissão</b>
			<table align=center>
			<form method='POST' action='../avaleht.php?servletjs2=20$$20'>
			<td><input type=image name='voltar' src='../imagens/botao_voltar.PNG'></td>
			</form>
			</table>
			</td>
			</tr>
			</table>
			</div>";
	        exit();
}	

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados
	
$link = @mysql_connect($host,$user,$pass);
		
@mysql_select_db($db);

?>

<html>
<head>
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
</head>
<body>

<style type=text/css>

body { background-image: url(<?="../".$logo_sis;?>);
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
</html>


<?
		
// Resgata Secao
@session_start();
$id_navega = $_SESSION['navega'];

if (!empty($id_navega)){
	$Cod_3 = $_SESSION['navega'];
	$consulta  = "SELECT * FROM socios Where id = '". anti_sql_injection($Cod_3) ."'";

}else{
			
	$consulta  = "SELECT * FROM socios Where id = '". anti_sql_injection($Cod_3) ."'";
			
}
	
$resultado = @mysql_query($consulta);
		
$row = @mysql_fetch_array($resultado);
		
$id			= trim(strtoupper(retirar_carac(@$row["id"])));
$Edit1		= trim(strtoupper(retirar_carac(@$row["COD"])));
$new_fot    = trim(strtoupper(retirar_carac(@$row["CODP"])));
$Edit2	    = trim(strtoupper(retirar_carac(@$row["NU"])));
$Edit3      = trim(strtoupper(retirar_carac(@$row["RGASSOC"])));
$Edit4  	= trim(strtoupper(retirar_carac(@$row["CPF"])));
$Edit5  	= trim(strtoupper(retirar_carac(@$row["DATINSC"])));
$Edit6		= trim(strtoupper(retirar_carac(@$row["DAT2"])));
$Edit7		= trim(strtoupper(retirar_carac(@$row["DAT3"])));
$Edit8		= trim(strtoupper(retirar_carac(@$row["SEDE"])));
$Edit9		= trim(strtoupper(retirar_carac(@$row["CATEGORIA"])));
$Edit10		= trim(strtoupper(retirar_carac(@$row["CODEDIF"])));
$Edit11		= trim(strtoupper(retirar_carac(@$row["NOMEASSOC"])));
$Edit12		= trim(strtoupper(retirar_carac(@$row["RUA"])));
$Edit13 	= trim(strtoupper(retirar_carac(@$row["ENDRESID"])));
$Edit14		= trim(strtoupper(retirar_carac(@$row["NUMERO"])));
$Edit15		= trim(strtoupper(retirar_carac(@$row["BAIRRORES"])));
$Edit16		= trim(strtoupper(retirar_carac(@$row["CEPRES"])));
$Edit17		= trim(strtoupper(retirar_carac(@$row["CIDADERES"])));
$Edit18		= trim(strtoupper(retirar_carac(@$row["ESTADORES"])));
$Edit19		= trim(strtoupper(retirar_carac(@$row["TELEFONE"])));
$Edit20		= trim(strtoupper(retirar_carac(@$row["CARTTRAB"])));
$Edit21		= trim(strtoupper(retirar_carac(@$row["SERIE"])));
$Edit22		= trim(strtoupper(retirar_carac(@$row["EMISCART"])));
$Edit23		= trim(strtoupper(retirar_carac(@$row["CARGOASSOC"])));
$Edit24		= trim(strtoupper(retirar_carac(@$row["DATADIMIS"])));
$Edit25		= trim(strtoupper(retirar_carac(@$row["ESTCIVIL"])));
$Edit26		= trim(strtoupper(retirar_carac(@$row["NUMDEP"])));
$Edit27		= trim(strtoupper(retirar_carac(@$row["MES"])));
$Edit28		= trim(strtoupper(retirar_carac(@$row["ANO"])));
$Edit29		= trim(strtoupper(retirar_carac(@$row["CAD_SI"])));
$Edit30		= trim(strtoupper(retirar_carac(@$row["SALDO"])));
$Edit31		= trim(strtoupper(retirar_carac(@$row["PREST"])));
$Edit32		= trim(strtoupper(retirar_carac(@$row["PAGO"])));
$Edit33		= trim(strtoupper(retirar_carac(@$row["NATURAL1"])));
$Edit34		= trim(strtoupper(retirar_carac(@$row["DATNASC"])));
$Edit35		= trim(strtoupper(retirar_carac(@$row["NASCION"])));
$Edit36		= trim(strtoupper(retirar_carac(@$row["PAI"])));
$Edit37		= trim(strtoupper(retirar_carac(@$row["MAE"])));
$Edit38		= trim(strtoupper(retirar_carac(@$row["CONJUGE"])));
$Edit39		= trim(strtoupper(retirar_carac(@$row["DATCONJ"])));
$Edit40		= trim(strtoupper(retirar_carac(@$row["FILHO01"])));
$Edit41		= trim(strtoupper(retirar_carac(@$row["DAT01"])));
$Edit42		= trim(strtoupper(retirar_carac(@$row["SEXO01"])));
$Edit43		= trim(strtoupper(retirar_carac(@$row["FILHO02"])));
$Edit44		= trim(strtoupper(retirar_carac(@$row["DAT02"])));
$Edit45		= trim(strtoupper(retirar_carac(@$row["SEXO02"])));
$Edit46		= trim(strtoupper(retirar_carac(@$row["FILHO03"])));
$Edit47		= trim(strtoupper(retirar_carac(@$row["DAT03"])));
$Edit48		= trim(strtoupper(retirar_carac(@$row["SEXO03"])));
$Edit49		= trim(strtoupper(retirar_carac(@$row["FILHO04"])));
$Edit50		= trim(strtoupper(retirar_carac(@$row["DAT04"])));
$Edit51		= trim(strtoupper(retirar_carac(@$row["SEXO04"])));
$Edit52		= trim(strtoupper(retirar_carac(@$row["FILHO05"])));
$Edit53		= trim(strtoupper(retirar_carac(@$row["DAT05"])));
$Edit54		= trim(strtoupper(retirar_carac(@$row["SEXO05"])));
$Edit55		= trim(strtoupper(retirar_carac(@$row["FILHO06"])));
$Edit56		= trim(strtoupper(retirar_carac(@$row["DAT06"])));
$Edit57		= trim(strtoupper(retirar_carac(@$row["SEXO06"])));
$Edit58		= trim(strtoupper(retirar_carac(@$row["FILHO07"])));
$Edit59		= trim(strtoupper(retirar_carac(@$row["DAT07"])));
$Edit60		= trim(strtoupper(retirar_carac(@$row["SEXO07"])));
$Edit61		= trim(strtoupper(retirar_carac(@$row["FILHO08"])));
$Edit62		= trim(strtoupper(retirar_carac(@$row["DAT08"])));
$Edit63		= trim(strtoupper(retirar_carac(@$row["SEXO08"])));
$Edit64 	= trim(strtoupper(retirar_carac(@$row["FILHO09"])));
$Edit65		= trim(strtoupper(retirar_carac(@$row["DAT09"])));
$Edit66		= trim(strtoupper(retirar_carac(@$row["SEXO09"])));
$Edit67		= trim(strtoupper(retirar_carac(@$row["FILHO10"])));
$Edit68		= trim(strtoupper(retirar_carac(@$row["DAT10"])));
$Edit69		= trim(strtoupper(retirar_carac(@$row["SEXO10"])));
$Edit70		= trim(strtoupper(retirar_carac(@$row["OBS"])));
$Edit71		= trim(strtoupper(retirar_carac(@$row["SEXO_SOC"])));
$Edit72		= trim(strtoupper(retirar_carac(@$row["ESCOLARIDADE"])));

$nome_do_edif	= trim(strtoupper(retirar_carac(@$row["CAMPO_EDIF"])));
$categ_1	    = trim(strtoupper(retirar_carac(@$row["CAMPO_CATEG"])));

$nome3a = strtolower($nome3);

// Elimina a Tabela Temp
$add0 = "DROP TABLE `$nome3a`";
@mysql_query($add0, $link);

// Cria Tablea Temp
$add1 = "CREATE TABLE `$nome3a` ( `Nome1`    VARCHAR(100) DEFAULT '$nome3a', 
                                 `Edit1`    VARCHAR(100), 
                                 `Edit2`    VARCHAR(100), 
                                 `Edit3`    VARCHAR(100), 
                                 `Edit4`    VARCHAR(100), 
                                 `Edit5`    VARCHAR(100), 
                                 `Edit6`    VARCHAR(100), 
                                 `Edit7`    VARCHAR(100), 
                                 `Edit8`    VARCHAR(100), 
                                 `Edit9`    VARCHAR(100), 
                                 `Edit10`   VARCHAR(100), 
                                 `Edit11`   VARCHAR(100), 
                                 `Edit12`   VARCHAR(100), 
                                 `Edit13`   VARCHAR(100), 
                                 `Edit14`   VARCHAR(100), 
                                 `Edit15`   VARCHAR(100), 
                                 `Edit16`   VARCHAR(100), 
                                 `Edit17`   VARCHAR(100), 
                                 `Edit18`   VARCHAR(100), 
                                 `Edit19`   VARCHAR(100), 
                                 `Edit20`   VARCHAR(100), 
                                 `Edit21`   VARCHAR(100), 
                                 `Edit22`   VARCHAR(100), 
                                 `Edit23`   VARCHAR(100), 
                                 `Edit24`   VARCHAR(100), 
                                 `Edit25`   VARCHAR(100), 
                                 `Edit26`   VARCHAR(100), 
                                 `Edit27`   VARCHAR(100), 
                                 `Edit28`   VARCHAR(100), 
                                 `Edit29`   VARCHAR(100), 
                                 `Edit30`   VARCHAR(100), 
                                 `Edit31`   VARCHAR(100), 
                                 `Edit32`   VARCHAR(100), 
                                 `Edit33`   VARCHAR(100), 
                                 `Edit34`   VARCHAR(100), 
                                 `Edit35`   VARCHAR(100), 
                                 `Edit36`   VARCHAR(100), 
                                 `Edit37`   VARCHAR(100), 
                                 `Edit38`   VARCHAR(100), 
                                 `Edit39`   VARCHAR(100), 
                                 `Edit40`   VARCHAR(100), 
                                 `Edit41`   VARCHAR(100), 
                                 `Edit42`   VARCHAR(100), 
                                 `Edit43`   VARCHAR(100), 
                                 `Edit44`   VARCHAR(100), 
                                 `Edit45`   VARCHAR(100), 
                                 `Edit46`   VARCHAR(100), 
                                 `Edit47`   VARCHAR(100), 
                                 `Edit48`   VARCHAR(100), 
                                 `Edit49`   VARCHAR(100), 
                                 `Edit50`   VARCHAR(100), 
                                 `Edit51`   VARCHAR(100), 
                                 `Edit52`   VARCHAR(100), 
                                 `Edit53`   VARCHAR(100), 
                                 `Edit54`   VARCHAR(100), 
                                 `Edit55`   VARCHAR(100), 
                                 `Edit56`   VARCHAR(100), 
                                 `Edit57`   VARCHAR(100), 
                                 `Edit58`   VARCHAR(100), 
                                 `Edit59`   VARCHAR(100), 
                                 `Edit60`   VARCHAR(100), 
                                 `Edit61`   VARCHAR(100), 
                                 `Edit62`   VARCHAR(100), 
                                 `Edit63`   VARCHAR(100), 
                                 `Edit64`   VARCHAR(100), 
                                 `Edit65`   VARCHAR(100), 
                                 `Edit66`   VARCHAR(100), 
                                 `Edit67`   VARCHAR(100), 
                                 `Edit68`   VARCHAR(100), 
                                 `Edit69`   VARCHAR(100), 
                                 `Edit70`   VARCHAR(100), 
                                 `Edit71`   VARCHAR(100), 
                                 `Edit72`   VARCHAR(100), 
                                 `Edit73`   VARCHAR(100), 
                                 `Edit74`   VARCHAR(100), 
                                 `Edit75`   VARCHAR(100), 
                                 `Edit76`   VARCHAR(100), 
                                 `Edit77`   VARCHAR(100), 
                                 `Edit78`   VARCHAR(100), 
                                 `Edit79`   VARCHAR(100), 
                                 `Edit80`   VARCHAR(100), 
                                 `memo1`    TEXT,
                                 `mensage1` VARCHAR(100), 
                                 `mensage2` VARCHAR(100), 
                                 `mensage3` VARCHAR(100), 
                                 `mensage4` VARCHAR(100), 
                                 `mensage5` VARCHAR(100), 
                                 `mensage6` INT(11) ) TYPE = innodb";
@mysql_query($add1, $link);

// Incluir nome do usuario na Tabela
$add2 = "INSERT INTO $nome3a (Nome1) VALUES ('$nome3a')";
@mysql_query($add2, $link);


            $add3 = "UPDATE $nome3a SET     Edit1    = '$Edit1',
											Edit2    = '$Edit2',
											Edit3    = '$Edit3',
											Edit4    = '$Edit4',
											Edit5    = '$Edit5',
											Edit6    = '$Edit6',
											Edit7    = '$Edit7',
											Edit8    = '$Edit8',
											Edit9    = '$Edit9',
											Edit10   = '$Edit10',
											Edit11   = '$Edit11',
											Edit12   = '$Edit12',
											Edit13   = '$Edit13',
											Edit14   = '$Edit14',
											Edit15   = '$Edit15',
											Edit16   = '$Edit16',
											Edit17   = '$Edit17',
											Edit18   = '$Edit18',
											Edit19   = '$Edit19',
											Edit20   = '$Edit20',
											Edit21   = '$Edit21',
											Edit22   = '$Edit22',
											Edit23   = '$Edit23',
											Edit24   = '$Edit24',
											Edit25   = '$Edit25',
											Edit26   = '$Edit26',
											Edit27   = '$Edit27',
											Edit28   = '$Edit28',
											Edit29   = '$Edit29',
											Edit30   = '$Edit30',
											Edit31   = '$Edit31',
											Edit32   = '$Edit32',
											Edit33   = '$Edit33',
											Edit34   = '$Edit34',
											Edit35   = '$Edit35',
											Edit36   = '$Edit36',
											Edit37   = '$Edit37',
											Edit38   = '$Edit38',
											Edit39   = '$Edit39',
											Edit40   = '$Edit40',
											Edit41   = '$Edit41',
											Edit42   = '$Edit42',
											Edit43   = '$Edit43',
											Edit44   = '$Edit44',
											Edit45   = '$Edit45',
											Edit46   = '$Edit46',
											Edit47   = '$Edit47',
											Edit48   = '$Edit48',
											Edit49   = '$Edit49',
											Edit50   = '$Edit50',
											Edit51   = '$Edit51',
											Edit52   = '$Edit52',
											Edit53   = '$Edit53',
											Edit54   = '$Edit54',
											Edit55   = '$Edit55',
											Edit56   = '$Edit56',
											Edit57   = '$Edit57',
											Edit58   = '$Edit58',
											Edit59   = '$Edit59',
											Edit60   = '$Edit60',
											Edit61   = '$Edit61',
											Edit62   = '$Edit62',
											Edit63   = '$Edit63',
											Edit64   = '$Edit64',
											Edit65   = '$Edit65',
											Edit66   = '$Edit66',
											Edit67   = '$Edit67',
											Edit68   = '$Edit68',
											Edit69   = '$Edit69',
											Edit71   = '$Edit71',
											Edit72   = '$Edit72',
											memo1    = '$Edit70',
											mensage3 = '$nome_do_edif',
											mensage2 = '$categ_1',
											mensage4 = '$nome_cad_si',
											mensage6 = '$id' WHERE Nome1 = '$nome3a'";
		 
		@mysql_query($add3, $link);

// Abrir tabela Senha

$tabela_1 = strtoupper('socios');

$consulta3 = "SELECT * FROM permissoes WHERE login = '". anti_sql_injection($nome3) ."' and tabela = '". anti_sql_injection($tabela_1) ."'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$per1       = @$row3["incluir"];
$per2       = @$row3["alterar"];
$per3       = @$row3["excluir"];
$per4       = @$row3["imprimir"];

if ($per2 == "NAO")
{
	
    include("cadsocios.php");
   
}
else

{

$consulta7 = "SELECT * FROM tb_segunda WHERE codp = '". anti_sql_injection($new_fot) ."'";
	
$resultado7 = @mysql_query($consulta7);

$row7 = @mysql_fetch_array($resultado7);

$id_9 	   = @$row7["cod_foto"];
$id_imagem = @$row7["id_imagem"];

if(!empty($id_imagem)){
    $mostra_branco = "faz";	
}else{
    $mostra_branco = "nao";	
	
}	

include("menu.php");

$menssagens = "* * * Alterar * * *";

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<style type="text/css" media="print">
div.invisivel {
visibility: hidden; 
}
</style>
<script src="script.js"></script>
<script src="function_salva_up.js"></script>
</head>
<body>

<?
include("botoes_up.php");
include("soclayout3.php");
?>
<tr><td><!-- AQUI SERÁ APRESENTADO O RESULTADO DA BUSCA DINÂMICA.. OU SEJA OS NOMES -->
<div id="pagina" class="invisivel"></div></td></tr>
</body>
</html><?
}

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


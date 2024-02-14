<?php
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Alterar Cadastro
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 21/01/2009 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

// include("../logar.php");
$nome3 = $_SESSION["nome_log"];

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados
	
$link = @mysql_connect($host,$user,$pass);
		
@mysql_select_db($db);

include("funcoes2.php");

?>

<html>
<head>
<title><?php echo $Titulo ?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
</head>
<body>

<style type=text/css>

body { background-image: url(<?php echo "../".$logo_sis ?>);
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

<?php

		
// Resgata Secao
session_start();
$id_navega = $_SESSION['navega'];
		
if (!empty($id_navega)){
	$Cod_3 = $_SESSION['navega'];
	$consulta0  = "SELECT * FROM acompa Where id = '$Cod_3'";

}else{
			
	$consulta0  = "SELECT * FROM acompa Where id = '$Cod_2'";
			
}
	
$resultado0 = @mysql_query($consulta0);
		
$row0 = mysql_fetch_array($resultado0);


$id     = @$row0["id"];
$Edit1  = trim(strtoupper(retirar_carac(@$row0["N_SOCIO"])));
$Edit2  = trim(strtoupper(retirar_carac(@$row0["RG"])));
$Edit3  = trim(strtoupper(retirar_carac(@$row0["CIC"])));
$Edit4  = trim(strtoupper(retirar_carac(@$row0["CART_TRAB"])));
$Edit5  = trim(strtoupper(retirar_carac(@$row0["NOME_SOC"])));
$Edit6  = trim(strtoupper(retirar_carac(@$row0["END_SOC"])));
$Edit7  = trim(strtoupper(retirar_carac(@$row0["CEP_SOC"])));
$Edit8  = trim(strtoupper(retirar_carac(@$row0["EST_SOC"])));
$Edit9  = trim(strtoupper(retirar_carac(@$row0["FONE_SOC"])));
$Edit10 = trim(strtoupper(retirar_carac(@$row0["N_EDIF"])));
$Edit11 = trim(strtoupper(retirar_carac(@$row0["NOME_EDI"])));
$Edit12 = trim(strtoupper(retirar_carac(@$row0["END_EDI"])));
$Edit13 = trim(strtoupper(retirar_carac(@$row0["CEP_EDI"])));
$Edit14 = trim(strtoupper(retirar_carac(@$row0["FONE_EDI"])));
$Edit15 = trim(strtoupper(retirar_carac(@$row0["OBJETO"])));
$Edit16 = trim(strtoupper(retirar_carac(@$row0["JCJ"])));
$Edit17 = trim(strtoupper(retirar_carac(@$row0["PROC_N"])));
$Edit18 = trim(strtoupper(retirar_carac(@$row0["ANO_N"])));
$Edit19 = trim(strtoupper(retirar_carac(@$row0["N_ADV_1"])));
$Edit20 = trim(strtoupper(retirar_carac(@$row0["TRT"])));
$Edit21 = trim(strtoupper(retirar_carac(@$row0["EM_TRT"])));
$Edit22 = trim(strtoupper(retirar_carac(@$row0["NO_AD_1"])));
$Edit23 = trim(strtoupper(retirar_carac(@$row0["TST"])));
$Edit24 = trim(strtoupper(retirar_carac(@$row0["EM_TST"])));
$Edit25 = trim(strtoupper(retirar_carac(@$row0["N_ADV_2"])));
$Edit26 = trim(strtoupper(retirar_carac(@$row0["SOLUCAO"])));
$Edit27 = trim(strtoupper(retirar_carac(@$row0["SOL_EM"])));
$Edit28 = trim(strtoupper(retirar_carac(@$row0["NO_AD_2"])));
$Edit29 = trim(strtoupper(retirar_carac(@$row0["ASSUNTO"])))." ".trim(strtoupper(retirar_carac(@$row0["ASSU_1"])));
$Edit30 = trim(strtoupper(retirar_carac(@$row0["ASSU_1"])));
		
$nome_adm   = trim(strtoupper(retirar_carac(@$row0["CAMPO_ADM"])));

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


            $add3 = "UPDATE $nome3a SET      Edit1    = '$Edit1',
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
											memo1    = '$Edit29',
											mensage6 = '$id' WHERE Nome1 = '$nome3a'";
		 
		@mysql_query($add3, $link);

// Abrir tabela Senha

$consulta3 = "SELECT * FROM tt_ser_01 Where login = '$nome3'";

$resultado3 = @mysql_query($consulta3);

$row3 = mysql_fetch_array($resultado3);

$aco1       = @$row3["aco1"];
$aco2       = @$row3["aco2"];
$aco3       = @$row3["aco3"];

if ($aco2 == "NAO")
{
   include("cadastro.php");
}

else
{

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

<?php
include("botoes_up.php");
include("layout3.php");
?>
<tr><td><!-- AQUI SERÁ APRESENTADO O RESULTADO DA BUSCA DINÂMICA.. OU SEJA OS NOMES -->
<div id="pagina" class="invisivel"></div></td></tr>
</body>
</html><?php
}



?>


<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Alterar Cadastro
 Criado em Data.....: 07/12/2007
 Ultima Atualiza��o : 21/01/2009 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

require($path."logar.php");
$nome3 = $_SESSION["nome_log"];

// Abre Conex�o com o MySql
include($path."conexao.php");
// Chama o Banco de Dados
	
$link = @mysql_connect($host,$user,$pass);
		
@mysql_select_db($db);

?>

<html>
<head>
<title><?=$Titulo;?></title>
</head>
<body>

<style type=text/css>

body { background-image: url(<?=$logo_sis;?>);
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
include("funcoes2.php");

// Resgata Secao
session_start();
$id_navega = $_SESSION['navega'];
		
if (!empty($id_navega)){
	$Cod_3 = $_SESSION['navega'];
	$consulta0  = "SELECT * FROM oposicao3 Where id = '$Cod_3'";

}else{
			
	$consulta0  = "SELECT * FROM oposicao3 Where id = '$Cod_2'";
			
}
	
$resultado0 = @mysql_query($consulta0);
		
$row0 = mysql_fetch_array($resultado0);

$id     = @$row0["id"];
$Edit1  = trim(strtoupper(retirar_carac2(@$row0["COD"])));
$Edit2  = trim(strtoupper(retirar_carac2(@$row0["DAT2"])));
$Edit3  = trim(strtoupper(retirar_carac2(@$row0["DATINSC"])));
$Edit4  = trim(strtoupper(retirar_carac2(@$row0["RGASSOC"])));
$Edit5  = trim(strtoupper(retirar_carac2(@$row0["CPF"])));
$Edit6  = trim(strtoupper(retirar_carac2(@$row0["CODP"])));
$Edit7  = trim(strtoupper(retirar_carac2(@$row0["CATEGORIA"])));
$Edit8  = trim(strtoupper(retirar_carac2(@$row0["NOMEASSOC"])));
$Edit9  = trim(strtoupper(retirar_carac2(@$row0["ENDRESID"])));
$Edit10 = trim(strtoupper(retirar_carac2(@$row0["CEPRES"])));
$Edit11 = trim(strtoupper(retirar_carac2(@$row0["CODEDIF"])));
$Edit12 = trim(strtoupper(retirar_carac2(@$row0["CNPJ"])));
$Edit13 = trim(strtoupper(retirar_carac2(@$row0["ADMS"])));
$Edit14 = trim(strtoupper(retirar_carac2(@$row0["CNPJ2"])));
$Edit15 = trim(retirar_carac2(@$row0["OBS"]));
$nome_do_edif = trim(strtoupper(retirar_carac2(@$row0["NOMEEDIF"])));
$nome2_adms = trim(strtoupper(retirar_carac2(@$row0["NOMEADMS"])));

// Elimina a Tabela Temp
$add0 = "DROP TABLE `$nome3`";
@mysql_query($add0, $link);

// Cria Tablea Temp
$add1 = "CREATE TABLE `$nome3` ( `Nome1`    VARCHAR(100) DEFAULT '$nome3', 
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
$add2 = "INSERT INTO $nome3 (Nome1) VALUES ('$nome3')";
@mysql_query($add2, $link);


            $add3 = "UPDATE $nome3 SET      Edit1    = '$Edit1',
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
											memo1    = '$Edit15',
											mensage3 = '$nome2_adms',
											mensage2 = '$nome_do_edif',
											mensage6 = '$id' WHERE Nome1 = '$nome3'";
		 
		@mysql_query($add3, $link);

// Abrir tabela Senha

$consulta3 = "SELECT * FROM tt_ser_01 Where login = '$nome3'";

$resultado3 = @mysql_query($consulta3);

$row3 = mysql_fetch_array($resultado3);

$opo1       = @$row3["opo1"];
$opo2       = @$row3["opo2"];
$opo3       = @$row3["opo3"];

if ($opo1 == "NAO")
{
   require("cadastro.php");
}

else
{

require("menu.php");

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
require("botoes_up.php");

require("layout3.php");
?>
<tr><td><!-- AQUI SER� APRESENTADO O RESULTADO DA BUSCA DIN�MICA.. OU SEJA OS NOMES -->
<div id="pagina" class="invisivel"></div></td></tr>
</body>
</html><?
}


?>


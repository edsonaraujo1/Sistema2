<?php
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Insert Cadastro
 Criado em Data.....: 07/12/2007
 Ultima Atualiza��o : 21/01/2009

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

session_cache_expire(180); //5 minutos por exemplo...

// include("../logar.php");
$nome3 = $_SESSION["nome_log"];

include("menu.php");

include("vaurls.php");

$deixar = acesso_url("CAD_CURSOS");

if ($deixar == "SIM"){

$log_ssoc = $nome3;
$hora = date("d/m/Y"); 

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

$menssagens = "* * * Incluido * * *";

// Abre Conex�o com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

$nome3a = strtolower($nome3);

// Abre Tabela Tenporaria

$consulta0  = "SELECT * FROM $nome3a WHERE Nome1 = '$nome3a'";
	
$resultado0 = @mysql_query($consulta0);

$row0 = @mysql_fetch_array($resultado0);

$Edit1      = trim(strtoupper(retirar_carac3(@$row0["Edit1"])));
$Edit2		= trim(strtoupper(retirar_carac3(@$row0["Edit2"])));
$Edit3		= trim(strtoupper(retirar_carac3(@$row0["Edit3"])));
$Edit4		= trim(strtoupper(retirar_carac3(@$row0["Edit4"])));
$Edit5		= trim(strtoupper(retirar_carac3(@$row0["Edit5"])));
$Edit6		= trim(strtoupper(retirar_carac3(@$row0["Edit6"])));
$Edit7		= trim(strtoupper(retirar_carac3(@$row0["Edit7"])));
$Edit8		= trim(strtoupper(retirar_carac3(@$row0["Edit8"])));
$Edit9		= trim(strtoupper(retirar_carac3(@$row0["Edit9"])));
$Edit10	    = trim(strtoupper(retirar_carac3(@$row0["Edit10"])));
$Edit11	    = trim(strtoupper(retirar_carac3(@$row0["Edit11"])));
$Edit12	    = trim(strtoupper(retirar_carac3(@$row0["Edit12"])));
$Edit13	    = trim(strtoupper(retirar_carac3(@$row0["Edit13"])));
$Edit14	    = trim(strtoupper(retirar_carac3(@$row0["Edit14"])));
$Edit15	    = trim(strtoupper(retirar_carac3(@$row0["Edit15"])));
$Edit16	    = trim(strtoupper(retirar_carac3(@$row0["Edit16"])));
$Edit17	    = trim(strtoupper(retirar_carac3(@$row0["Edit17"])));
$Edit18	    = trim(strtoupper(retirar_carac3(@$row0["Edit18"])));
$Edit19	    = trim(strtoupper(retirar_carac3(@$row0["Edit19"])));
$Edit20	    = trim(strtoupper(retirar_carac3(@$row0["Edit20"])));
$Edit21	    = trim(retirar_carac3(@$row0["memo1"]));
$alerta_1   = trim(strtoupper(retirar_carac3(@$row0["mensage1"])));
$nome_do_edif = trim(strtoupper(retirar_carac3(@$row0["mensage2"])));
$nome_da_adms = trim(strtoupper(retirar_carac3(@$row0["mensage3"])));
$id           = @$row0["mensage6"];

if ($Edit1  == '.'){	$Edit1  = '';}
if ($Edit2  == '.'){	$Edit2  = '';}
if ($Edit3  == '.'){	$Edit3  = '';}
if ($Edit4  == '.'){	$Edit4  = '';}
if ($Edit5  == '.'){	$Edit5  = '';}
if ($Edit6  == '.'){	$Edit6  = '';}
if ($Edit7  == '.'){	$Edit7  = '';}
if ($Edit8  == '.'){	$Edit8  = '';}
if ($Edit9  == '.'){	$Edit9  = '';}
if ($Edit10 == '.'){	$Edit10 = '';}
if ($Edit11 == '.'){	$Edit11 = '';}
if ($Edit12 == '.'){	$Edit12 = '';}
if ($Edit13 == '.'){	$Edit13 = '';}
if ($Edit14 == '.'){	$Edit14 = '';}
if ($Edit15 == '.'){	$Edit15 = '';}
if ($Edit16 == '.'){	$Edit16 = '';}
if ($Edit17 == '.'){	$Edit17 = '';}
if ($Edit18 == '.'){	$Edit18 = '';}
if ($Edit19 == '.'){	$Edit19 = '';}
if ($Edit20 == '.'){	$Edit20 = '';}
if ($Edit21 == '.'){	$Edit21 = '';}

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
//echo $Edit12."<br>";
//echo $Edit13."<br>";
//echo $Edit14."<br>";
//echo $Edit15."<br>";
//echo $Edit16."<br>";
//echo $Edit17."<br>";
//echo $Edit18."<br>";
//echo $Edit19."<br>";
//echo $Edit20."<br>";
//echo $Edit21."<br>";

$consulta00  = "SELECT * FROM cursos ORDER BY COD DESC LIMIT 0,1";

$resultado00 = @mysql_query($consulta00);

// Incrementa novo codigo

$row00 = mysql_fetch_array($resultado00);

$id_2     = @$row00["id"];
$cod_2    = @$row00["COD"];

$novo_cod = $cod_2+1;

$consulta = "INSERT INTO cursos     (COD,
                                     CODP,
                                     DATINI,
								     DATTER,
								     CURSOS_1,
								     RG,
								     PERI,
								     CPF,
								     NOME,
							 	  	 OCUPA,
							 		 DATNASC,
									 CIVIL,
									 NACIONAL,
									 SEXO,
									 DATA,
									 ENDERECO,
									 CEP,
									 BAIRRO,
									 FONE,
									 ESCOLA,
									 TECNICO,
									 OBS)
                VALUES
                                   ('$novo_cod',
								    '$Edit1',
								    '$Edit2',
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
									'$Edit21')";
	
		@mysql_query($consulta, $link) or
		
		die("
		     <br>
		     <br>
		     
			 <div align=center>
		
		     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
		     <tr>
		     <td>
		     <font face=arial><b>*** Falha na Inclus�o !!! ***</b>
		     <table align=center>
		     <form method='POST' action='cadastro.php'>
		     <td><input type=image name='voltar' src='../imagens/botao_voltar.PNG'></td>
		     </form> 
		     </table>
		     </td>
		     </tr>
		     </table>
		     </div>");
     
			// Atualiza arquivo Log
			$data_log = date("d/m/Y");
			$hora_log = date("H:i:s"); 
			$even_log = $menssagens."/".$Edit1;
			
			$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
			             VALUES
			             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
			
			@mysql_query($consulta_log, $link);
     

// Elimina Tabela temp
$add0 = "DROP TABLE `$nome3a`";
@mysql_query($add0, $link);

// Abrir tabela edificios

$consulta_z  = "SELECT * FROM cursos ORDER BY id DESC LIMIT 0,1";

$resultado_z = @mysql_query($consulta_z);

// Incrementa novo codigo

$row_z = mysql_fetch_array($resultado_z);

$id       = @$row_z["id"];

// Salva Secao
session_start();
$_SESSION['navega'] = $Edit1;
     
?>

<html>
<body  style=" margin-left: 0px;  margin-top: 21px;  margin-right: 0px;  margin-bottom: 0px; ">

<?php
include("layout.php");
?>

<div style="Z-INDEX: 34; LEFT: 185px; WIDTH: 544px; POSITION: absolute; TOP: 495px; HEIGHT: 80px">
<table border='0' aling=center>
          <td> </td>

          <form method="POST" action="cadastro.php?cod_5=<?php echo $id ?>">
          <td><input type=image name="Voltar" src="../imagens/botao_voltar.PNG"></td>
          </form>

</table>
</div>
</body>
</html>

<?php

}else{
	
include("enaaurlnp.php");
	
}
?>

<?php
/*
 --------------------------------
 Funcao para Retirar os caracter
 estranhos e acentos na hora de
 atualizar Table 
---------------------------------
*/

Function retirar_carac3($var){

$var = @ereg_replace("[����]",      "A",$var);
$var = @ereg_replace("[����]",     "a",$var);
$var = @ereg_replace("[���]",       "E",$var);
$var = @ereg_replace("[���]",       "e",$var);
$var = @ereg_replace("[����]",      "O",$var);
$var = @ereg_replace("[�����]",     "o",$var);
$var = @ereg_replace("[���]",       "U",$var);
$var = @ereg_replace("[���]",       "u",$var);
$var = @ereg_replace("[���]",       "i",$var);
$var = @ereg_replace("[���]",       "I",$var);
$var = @ereg_replace("[?*#'�`!$%�]"," ",$var);
$var = str_replace("�",            "C",$var);
$var = str_replace("�",            "c",$var);

return($var);
}
?>
